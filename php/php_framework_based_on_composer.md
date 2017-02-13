# 利用 Composer 一步一步构建自己的 PHP 框架（一）

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [PHP](http://douyasi.com/category/php/) |
>| 链接： | http://douyasi.com/php/php_framework_based_on_composer.html |
>| 标签： | [php](http://douyasi.com/tag/php) [framework](http://douyasi.com/tag/framework) [composer](http://douyasi.com/tag/composer)  |
>| 发布日期： | 2014-12-19 |

>    参考来源：岁寒博客 [PHP系列教程](http://lvwenhan.com/sort/php)，可以认为本文是其系列文章的实践、概要与总结。


### 基础

>    详细请阅读：http://lvwenhan.com/php/405.html

关于`FIG`（`Framework Interoperability Group`/框架可互用性小组）的 `PSR-0` 到 `PSR-4` 五套 PHP 非官方规范 请自行查阅相关资料。

`Composer`的简介、安装与使用也不再赘述。

在合适的地方新建一个文件夹，命名为 `MFFC`（My First Framework based on Composer），在文件夹下新建文件 `composer.json`：

```json
{
  "require": {
  }
}
```

命令行切换到 MFFC 目录下，运行：

```bash
composer update
```





稍等片刻，会出现如下文件及文件夹：

![20141219232719.jpg][1]

如果以上内容成功出现，恭喜你，Composer 初始化成功！

### 构建路由

>    详细请阅读：http://lvwenhan.com/php/406.html

下面我们就开始自己来构建路由，先去 `GitHub` 搜一下：[点此查看搜索结果](https://github.com/search?l=PHP&o=desc&q=router&ref=searchresults&s=stars&type=Repositories&utf8=%E2%9C%93)

推荐 `https://github.com/NoahBuscher/Macaw`，对应的 Composer 包为 `codingbean/macaw` ，作者应该是在 `GitHub` 上改名了，这可能会造成一定的困扰。下面开始安装 `Macaw` 包，更改 composer.json：

```json
{
  "require": {
    "codingbean/macaw": "dev-master"
  }
}
```

运行 `composer update`，成功之后将得到以下目录：

![20141219233741.jpg][2]

下面，就是见证奇迹的时刻！我们将赋予 MFFC 生命力，让它真正地跑起来！


新建 `MFFC/public` 文件夹，这个文件夹将是用户唯一可见的部分。在文件夹下新建 `index.php` 文件：

```php
<?php

// Autoload 自动载入
require '../vendor/autoload.php';

// 路由配置
require '../config/routes.php';

```

上面一行表示引入 `Composer` 的自动载入功能，下面一行表示载入路由配置文件。新建 `MFFC/config` 文件夹，在里面新建 `routes.php` 文件，内容如下：

```php
<?php

use NoahBuscher\Macaw\Macaw;

Macaw::get('hello', function() {
  echo "成功！";
});

Macaw::get('(:all)', function($fu) {
  echo '未匹配到路由<br>'.$fu;
});

Macaw::dispatch();
```

HTTP 服务软件请自行设置伪静态，伪静态代码可参考 `Macaw` 本身提供的范例。

![20141219234754.jpg][3]

也可以使用 PHP 内置 HTTP 服务器：

```bash
cd public && php -S 127.0.0.1:3000
```

>    注意PHP内置的HTTP服务器可能不支持伪静态（即使存在`.htaccess`之类的伪静态配置文件），跟真实的 **Apache** 有所出入。上述配置中 `Macaw::get('hello'...);` 写成 
`Macaw::get('/hello'...);` 更好使。

访问 `http://127.0.0.1:3000/index.php/hello` （此为未伪静态化地址）可以看到：

![20141219235707.jpg][4]

访问 `http://127.0.0.1:3000/index.php/world` （此为未伪静态化地址）可以看到：

![20141220000354.jpg][5]

如果页面乱码，请调整编码为 UTF-8。如果你成功看到以上页面，那么恭喜你，路由配置成功！

`Macaw` 只有一个文件，去除空行总共也就一百行多一点，通过代码我们能直接看明白它是怎么工作的。下面我简略分析一下：


1. Composer 的自动加载在每次 URL 驱动 MFFC/public/index.php 之后会在内存中维护一个全量命名空间类名到文件名的数组，这样当我们在代码中使用某个类的时候，将自动载入该类所在的文件。

2. 我们在路由文件中载入了 Macaw 类：“`use NoahBuscher\Macaw\Macaw;`”，接着调用了两次静态方法 `::get()`，这个方法是不存在的，将由 `MFFC/vendor/codingbean/macaw/Macaw.php` 中的 `__callstatic()` 接管。

3. 这个函数接受两个参数，`$method` 和 `$params`，前者是具体的 `function` 名称，在这里就是 `get`，后者是这次调用传递的参数，即 `Macaw::get('hello',function(){...})` 中的两个参数。第一个参数是我们想要监听的 URL 值，第二个参数是一个 PHP 闭包，作为回调，代表 URL 匹配成功后我们想要做的事情。

4. `__callstatic()` 做的事情也很简单，分别将目标URL（即 `/hello`）、HTTP方法（即 `GET`）和回调代码压入 `$routes`、`$methods` 和 `$callbacks` 三个 `Macaw` 类的静态成员变量（数组）中。

5. 路由文件最后一行的 `Macaw::dispatch()`; 方法才是真正处理当前 URL 的地方。能直接匹配到的会直接调用回调，不能直接匹配到的将利用正则进行匹配。


[1]: http://douyasi.com/usr/uploads/2014/12/489299001.jpg
[2]: http://douyasi.com/usr/uploads/2014/12/1641783586.jpg
[3]: http://douyasi.com/usr/uploads/2014/12/1828075964.jpg
[4]: http://douyasi.com/usr/uploads/2014/12/2816586220.jpg
[5]: http://douyasi.com/usr/uploads/2014/12/2908602743.jpg