# Laravel 4开发人员必用扩展包

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [Laravel](http://douyasi.com/category/laravel/) |
>| 链接： | http://douyasi.com/laravel/la_packages.html |
>| 标签： | [laravel](http://douyasi.com/tag/laravel) [package](http://douyasi.com/tag/package)  |
>| 发布日期： | 2014-10-15 |

>    提供一些Laravel 4开发人员必用扩展包，后续会有补充。  
>    参考来源：<http://blog.csdn.net/iefreer/article/details/37542395>


### HTML压缩器（Laravel HTML Minify）

压缩模版页面空白符，配合gzip，有效减少页面大小，提升页面加载速度。  

```json
"require": {
    "fitztrev/laravel-html-minify": "1.*"
}
```

[Laravel HTML Minify](https://github.com/fitztrev/laravel-html-minify)

### 代码生成器（Laravel Generators）

使用简单的命令行就可以自动根据代码模板生成 `Model/View/Controller` 代码以及模块（Module）。  

```json
"require-dev": {
    "way/generators": "~2.0"
}
```



```shell
composer update --dev
```

[Laravel-4-Generators](https://github.com/JeffreyWay/Laravel-4-Generators)

### 调试栏（Laravel Debug Bar）

PHP调试栏项目无疑是一个巨大的成功，你无需到处编写var_dump。Laravel调试栏对该组件作了扩展，包含了路由、视图、事件以及更多信息。这使得调试变得更加简单、快速，提高你的开发效率。  
```
"require": {
	"barryvdh/laravel-debugbar": "~1.7"
}
```

[Laravel Debug Bar](https://github.com/barryvdh/laravel-debugbar)

### 数据填充（Faker）

`Laravel Generators` 默认使用 `Faker\Factory` 作为随机数据生成器( `db seeder` )，使用 `Faker` 可以很方便的生成数据库随机或测试数据。

```
"require-dev": {
    "fzaninotto/faker": "1.5.*@dev"
}
```

[Faker](https://github.com/fzaninotto/Faker)


### 备注

`Linux`安装 `composer` 方法  

```shell
$ curl -sS https://getcomposer.org/installer | php
$ sudo mv composer.phar /usr/local/bin/composer
```
