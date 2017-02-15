<?php

require 'medoo.php';
date_default_timezone_set('Asia/Shanghai');

class Typecho {

    protected $db;

    protected $cfg = [
        // required
        'database_type' => 'mysql',
        'database_name' => 'typecho',
        'server'        => 'localhost',
        'username'      => 'root',
        'password'      => 'root',
        'charset'       => 'utf8',
        // [optional]
        'port'          => 3306,
        // [optional] Table prefix
        'prefix'        => 'typecho_',
        // [optional] driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
        'option'        => [
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        ]
    ];

    protected $website = [
        'author' => 'douyasi',
        'slogan' => '即使再渺小，也要不顾一切地成长',
        'base' => 'http://douyasi.com/',
    ];

    public function getDatabase() {
        if (!isset($this->db)) {
            $database = new medoo($this->cfg);
            $this->db = $database;
        }
        return $this->db;
    }

    public function getTags() {
        $metas = [];
        $tags = $this->db->select('metas', '*', ['type' => 'tag']);
        foreach ($tags as $tag) {
            $tmp = [
                'name'        => $tag['name'],
                'slug'        => $tag['slug'],
                'description' => $tag['description'],
                'count'       => $tag['count'],
            ];
            $metas[$tag['mid']] = serialize($tmp);
        }
        return $metas;
    }


    public function getCategories() {
        $metas = [];
        $categories = $this->db->select('metas', '*', ['type' => 'category']);
        foreach($categories as $category) {
            $tmp = [
                'name'        => $category['name'],
                'slug'        => $category['slug'],
                'description' => $category['description'],
                'count'       => $category['count'],
            ];
            $metas[$category['mid']] = serialize($tmp);
        }
        return $metas;
    }

    public function exportBlog() {
        $db = $this->getDatabase();
        $articles = $db->select('contents', '*', ['AND' => ['type' => 'post', 'password' => null], 'ORDER' => ['created' => 'DESC']]);
        $tags = $this->getTags();
        $categories = $this->getCategories();
        $base = rtrim($this->website['base'], '/');
        $markdown_articles = [];
        foreach ($articles as $article) {
            $tm = [];
            $cid = $article['cid'];
            $trs = $db->select('relationships', '*', ['cid' => $cid]);
            foreach ($trs as $tr) {
                if (array_key_exists($tr['mid'], $categories)) {
                    $cm = $tr['mid'];
                }
                if (array_key_exists($tr['mid'], $tags)) {
                    $tm[] = $tr['mid'];
                }
            }
            $category = unserialize($categories[$cm]);
            $category_str = '['.$category['name'].']('.$base.'/category/'.$category['slug'].'/)';
            $tags_str = '';
            foreach ($tm as $t) {
                $tag = unserialize($tags[$t]);
                $tags_str .= '['.$tag['name'].']('.$base.'/tag/'.$tag['slug'].') ';
                $tags_arr[$tag['slug']] = $tag['name'];
            }
            $title = $article['title'];
            $url = $base.'/'.$category['slug'].'/'.$article['slug'].'.html';
            //移除掉Typecho专用的注释标记 如 <!--markdown--> 和 <!--more--> ， 以免造成 `markdown` 解析问题
            $text = str_replace('<!--markdown-->', '', $article['text']);
            $text = str_replace('<!--more-->', '', $text);
            $created = date('Y-m-d', $article['created']);
            $markdown_articles[] = [
                'title'         => $title,
                'url'           => $base.'/'.$category['slug'].'/'.$article['slug'].'.html',
                'file_path'     => $category['slug'].'/'.$article['slug'].'.md',
                'category_name' => $category['name'],
                'category_url'  => $base.'/category/'.$category['slug'].'/',
                'tags'          => $tags_arr,
                'created'       => $created,
                'text'          => $text,
            ];
            if ($tags_str === '') {
                $tags_str = 'none';
            }
            $markdown = <<<EOT
# $title

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | $category_str |
>| 链接： | $url |
>| 标签： | $tags_str |
>| 发布日期： | $created |

$text
EOT;
            $tags_str = '';
            $dir = __DIR__.'/'.$category['slug'];
            if (!file_exists($dir)) {
                mkdir($dir);
            }
            $file = $dir.'/'.$article['slug'].'.md';
            if (file_exists($file)) {
                unlink($file);
            }
            file_put_contents($dir.'/'.$article['slug'].'.md', $markdown);
            $index_str = '';
            foreach ($markdown_articles as $key => $md_article) {
                $index_str .= '* ['.$md_article['title'].']('.$md_article['file_path'].')'.PHP_EOL;
            }

            $readme_content = <<<EOT
# BLOG

>   [豆芽丝](http://douyasi.com) 博客备份。

## Typecho博文导出脚本使用说明

本 [导出脚本](https://github.com/douyasi/blog) 只支持使用 `markdown` 编辑的文章。

请自行修改 `Typecho` 数据库与站点配置等参数，然后在命令行执行 `php export.php` ，导出代码见 `typecho.php` ，源码依赖于 `medoo` 数据库框架。

EOT;

            $index_content = <<<EOD
博文列表
$index_str
EOD;

            $readme_file = __DIR__.'/readme.md';
            if (file_exists($readme_file)) {
                unlink($readme_file);
            }
            file_put_contents($readme_file, $readme_content);

            $index_file = __DIR__.'/index.md';
            if (file_exists($index_file)) {
                unlink($index_file);
            }
            file_put_contents($index_file, $index_content);

        }
    }
}
