# Composer 国内镜像

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [PHP](http://douyasi.com/category/php/) |
>| 链接： | http://douyasi.com/php/composer_mirrors.html |
>| 标签： | [composer](http://douyasi.com/tag/composer)  |
>| 发布日期： | 2015-05-22 |

## 镜像网站：

http://pkg.phpcomposer.com/

https://toran.reimu.io/

http://packagist.cn/

## 使用说明：

如何使用请看各种镜像网站说明，下面给出第一个镜像的使用说明：

将以下配置信息添加到 `Composer` 的配置文件 `config.json` 中（系统全局配置）。
将以下配置信息添加到你的项目的 `composer.json` 文件中（针对单个项目配置）。
为了避免安装包的时候都要执行两次查询，切记要添加禁用 `packagist` 的设置，如下：

```json
{
    "repositories": [
        {"type": "composer", "url": "http://pkg.phpcomposer.com/repo/packagist/"},
        {"packagist": false}
    ]
}
```