# Laravel 5 下使用 HTML 和 Form

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [Laravel](http://douyasi.com/category/laravel/) |
>| 链接： | http://douyasi.com/laravel/laravel_5_with_html_form.html |
>| 标签： | [laravel](http://douyasi.com/tag/laravel)  |
>| 发布日期： | 2015-02-09 |

>    Laravel 5 已于不久前正式发布，新版目录结构发生很多变化，也移除一些4中存在的包，比如 HTML与Form。
>    本文来自 https://phphub.org/topics/249 。

Laravel 5 因为采用了另一套不同的架构, 而把 HTML 和 Form 类从核心里面移除.

如果还想继续使用这两个类的话, 可以使用以下方法:

## 1. Composer 安装

编辑 composer.json 文件, require 节点下增加:

```json
"illuminate/html": "~5.0"
```

然后执行：

```shell
composer install
```

## 2. 添加 providers

修改 `config/app.php` 文件, 在 `providers` 数组里面添加:

```php
'Illuminate\Html\HtmlServiceProvider'
```



## 3. 添加 aliases

```php
'Form'  => 'Illuminate\Html\FormFacade',
'HTML'  => 'Illuminate\Html\HtmlFacade'
```