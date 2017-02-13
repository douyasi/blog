# 利用 Composer 一步一步构建自己的 PHP 框架（二）

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [PHP](http://douyasi.com/category/php/) |
>| 链接： | http://douyasi.com/php/php_framework_based_on_composer-2.html |
>| 标签： | [php](http://douyasi.com/tag/php) [framework](http://douyasi.com/tag/framework) [composer](http://douyasi.com/tag/composer)  |
>| 发布日期： | 2014-12-20 |

>    参考来源：岁寒博客 [PHP系列教程](http://lvwenhan.com/sort/php)，可以认为本文是其系列文章的实践、概要与总结。

### 设计 MVC

新建 `MFFC/app` 文件夹，在 `app` 中创建 `controllers`、`models`、`views` 三个文件夹，开始正式开始踏上 MVC 的征程。

新建 `controllers/BaseController.php` 文件：

#### 使用命名空间

```php
<?php
/**
* BaseController
*/
class BaseController
{
  public function __construct()
  {
  }
}
```

新建 `controllers/HomeController.php` 文件：

```php
<?php
/**
* \HomeController
*/
class HomeController extends BaseController
{
  public function home()
  {
    echo "<h1>控制器成功！</h1>";
  }
}
```



增加一条路由： `Macaw::get('', 'HomeController@home');`，打开浏览器直接访问 `http://127.0.0.1:3000/`，可能出现诸如`服务器500内部错误` 、`HomeController类未找到` 等错误。

为什么没找到 `HomeController` 类？因为我们没有让他自动加载，修改 `composer.json` 为：

```json
{
  "require": {
    "codingbean/macaw": "dev-master"
  },
  "autoload": {
    "classmap": [
      "app/controllers",
      "app/models"
    ]
  }
}
```

运行 `composer dump-autoload`，稍等片刻，刷新，你将看到以下内容（别忘了调节编码哦~）：

![20141220092643.jpg][1]

#### 连接数据库

新建 `models/Article.php` 文件，内容为（数据库密码请自行更改）：

>    注：原博客使用 `php_mysql.dll` 扩展函数`mysql_connect`来连接数据库，但现在PHP5已不推荐使用 `mysql` 扩展了。故这里使用pdo来连接：

```php
<?php
/**
* Article Model
*/
class Article
{
	public static function first()
	{
		$pdo = new PDO("mysql:host=localhost;dbname=mffc","root","root"); 
		$rs = $pdo -> query("SELECT * FROM articles limit 0,1");
		while($row = $rs -> fetch())
		{
			echo '<h1>'.$row["title"].'</h1>';
			echo '<p>'.$row["content"].'</p>';
		}
	}
}
```

修改 `controllers/HomeController.php` 文件：

```php
<?php
/**
* \HomeController
*/
class HomeController extends BaseController
{
  public function home()
  {
    Article::first();
  }
}
```

刷新，这时候会得到 `Article` 类未找到的信息，因为我们没有更新自动加载配置：

```bash
composer dump-autoload
```

在等待的时间里，我们去建立数据库 `mffc`，在里面建立表 `articles`，设计两个字段 `title`、`content` 用于记录信息，并填充进至少一条数据。你也可以在建立完成 `mffc` 数据库以后运行以下 `SQL` 语句：

```sql
DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;

INSERT INTO `articles` (`id`, `title`, `content`)
VALUES
	(1,'Hello World','<p>你好世界内容！</p>'),
	(2,'你好世界','<p>Hello World Content！</p>');

/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;
```

然后，刷新！你将看到以下页面：

![20141220110906.jpg][2]

#### 调用视图

修改 `models/Article.php` 为：

```php
<?php
/**
* Article Model
*/
class Article
{
	public static function first()
	{
		$pdo = new PDO("mysql:host=localhost;dbname=mffc","root","root"); 
		$rs = $pdo -> query("SELECT * FROM articles limit 0,1");
		while($row = $rs -> fetch())
		{
			return $row;
		}
	}
}
```

将包含查询结果的数组返回。修改 `HomeController`：

```php
<?php
/**
* \HomeController
*/
class HomeController extends BaseController
{
  public function home()
  {
    $article = Article::first();
    require dirname(__FILE__).'/../views/home.php';
  }
}
```

其中`home.php`看起来像这样的：

```php
<!doctype html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<title><?php echo $article['title'];?></title>
</head>
<body>
	<h3><?php echo $article['title'];?></h3>
	<div class="content">
		<?php echo $article['content'];?>
	</div>
</body>
</html>
```

保存，刷新，你将得到跟上面一模一样的页面，视图调用成功！

![20141220112539.jpg][3]

>    几乎所有人都是通过学习某个框架来了解 `MVC` 的，这样可能框架用的很熟，一旦离了框架一个简单的页面都写不了，更不要说自己设计 `MVC` 架构了，其实这里面也没有那么多门道，原理非常清晰，我说说我的感悟：

>    1. PHP 框架再牛逼，他也是 PHP，也要遵循 PHP 的运行原理和基本哲学。抓住这一点我们就能很容易地理解很多事情。

>    2. PHP 做的网站从逻辑上说，跟 `php test.php` 没有任何区别，都只是一段字符串作为参数传递给 PHP 解释器而已。无非就是复杂的网站会根据 URL 来调用需要运行的文件和代码，然后返回相应的结果。

>    3. 无论我们看到的是 `CodeIgniter` 这样 180 个文件组成的“小框架”，还是 `Laravel` 这样加上 `vendor` 一共 3700 多个文件的 “大框架”，他们都会在每一个 `URL` 的驱动下，组装一段可以运行的字符串，传给 PHP 解释器，再把从 PHP 解释器返回的字符串传给访客的浏览器。

>    4. `MVC` 是一种逻辑架构，本质上是为了让人脑这样的超低 `RAM` 的计算机能够制造出远超人脑 `RAM` 的大型软件，其实 `MVC` 架构在 `GUI` 软件出现以前就已经成形，命令行输出也是视图嘛。

>    5. 在 `MFFC` 里，一个 `URL` 驱动框架做的事情基本是这样的：入口文件 `require` 控制器，控制器 `require` 模型，模型和数据库交互得到数据返回给控制器，控制器再 `require` 视图，把数据填充进视图，返回给访客，流程结束。

[1]: http://douyasi.com/usr/uploads/2014/12/1369311167.jpg
[2]: http://douyasi.com/usr/uploads/2014/12/1810608154.jpg
[3]: http://douyasi.com/usr/uploads/2014/12/3081262780.jpg