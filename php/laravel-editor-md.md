# editor.md for laravel

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [PHP](http://douyasi.com/category/php/) |
>| 链接： | http://douyasi.com/php/laravel-editor-md.html |
>| 标签： | [laravel](http://douyasi.com/tag/laravel) [editor.md](http://douyasi.com/tag/editor-md)  |
>| 发布日期： | 2016-08-27 |

传送门： https://github.com/douyasi/laravel-editor-md


>  `editor.md` 是一款高度可定制化的 `markdown` 编辑器，官方网站：https://pandao.github.io/editor.md/ 。

## 兼容版本

本扩展包经过测试，适配 `Laravel 5.1` 以上稳定版本（`5.0` 版本理论上也是可行的，但未经测试）。

>   特别说明：
>   `composer` 分析某些依赖时可能会出现问题：比如在 `Laravel 5.2` 主项目中，安装本扩展包，可能会装上 `5.3` 版本的 `illuminate/support` 与 `illuminate/contracts` 相关依赖包，这样可能会造成 `5.2` 主项目出现错误。为此，本包在 `composer.json` 特别移除对 `"illuminate/support": "~5.1"` 的依赖。



## 安装与配置

在 `composer.json` 新增 `"douyasi/laravel-editor-md": "dev-master"` 依赖，然后执行： `composer update` 操作。

依赖安装完毕之后，在 `app.php` 中添加：

```php
'providers' => [
        'Douyasi\Editor\EditorServiceProvider',
],
```

然后，执行下面 `artisan` 命令，发布该扩展包配置等项。

```bash
php artisan vendor:publish --force
```

现在您可以访问 `/laravel-editor-md/example` 路由，不出意外，您可以看到扩展包提供的示例页面。

![editor.md.jpg][1]

编辑器图片默认会上传到 `public/uploads/content` 目录下；编辑器相关功能配置位于 `config/editor.php` 文件中。

## 使用说明

在 `blade` 模版里面使用下面三个方法：`editor_css()` 、`editor_js()` 和 `editor_config()` 。

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>editor.md example</title>
    {!! editor_css() !!}
</head>
<body>
<h2>editor.md example</h2>
<div id="mdeditor">
  <textarea class="form-control" name="content" style="display:none;">
# editor.md for Laravel
>   editor.md example
  </textarea>
</div>

{!! editor_js() !!}
{!! editor_config('mdeditor') !!}
</body>
</html>
```

  [1]: http://douyasi.com/usr/uploads/2016/08/2512199115.jpg