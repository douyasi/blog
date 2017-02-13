# Laravel 4 项目开发与命名规范

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [Laravel](http://douyasi.com/category/laravel/) |
>| 链接： | http://douyasi.com/laravel/laravel_project_rules.html |
>| 标签： | [laravel](http://douyasi.com/tag/laravel) [project](http://douyasi.com/tag/project) [rule](http://douyasi.com/tag/rule)  |
>| 发布日期： | 2015-01-14 |

>    为了便于后期维护，现对使用 `Laravel 4.2.x` 的项目做出开发与命名上的约束。本文只对某些重点做出具体约束，可能存在遗漏的地方，欢迎补充说明。

## 自动加载

`Laravel` 使用 `Composer` 进行源码管理，自动加载推荐遵循 `PSR-4` 规范，可以到此查阅相关文档：

[PSR-4中译文](https://github.com/hfcorriez/fig-standards/blob/zh_CN/%E6%8E%A5%E5%8F%97/PSR-4-autoloader.md) 

[Composer Autoload不完全中译文](https://github.com/5-say/composer-doc-cn/blob/master/cn-introduction/04-schema.md#autoload) 

## 数据库命名规范

参照 `Laravel` 模型相关内容，我们可以看出，`Laravel` 倾向于使用复数名词作为表名，`Laravel` 框架自带了一个 `User` 模型操作 `users` 用户表。

推荐使用三个小写字母以上的字符串作为数据库表前缀，如芽丝内容管理框架就使用`yascmf_`作为表前缀。

数据库表默认使用`utf8_unicode_ci`作为排序规则。

数据表名与表字段推荐使用全小写英文字母，单词之间采用下划线 (`_`) 作为分隔符；数据库字段应避免使用 `MySQL` 关键字（如`desc` 、 `null` 、 `count` 与 `order` 等 ）；数据库表及字段在设计时应添加与保留注释（即 `COMMENT` ）内容。

使用`Laravel ORM`时，可能还需要添加额外的字段，如自动时间戳记录的字段 `created_at` 、 `updated_at` 与 `deleted_at` 等。

在 `SQL` 语句的编写中，凡是 `SQL` 语句的关键字一律大写，如：`SELECT`、`ORDER BY`、 `GROUP BY`、 `FROM`、 `WHERE`、 `UPDATE`、 `INSERT INTO`、 `SET`、 `BEGIN`、 `END` 等。

遵守第三范式 `3NF` 标准的规定：
  
>    A.表内的每一个值都只能被表达一次。 

>    B.表内的每一行都应该被唯一的标识(有唯一键)。 

>    C.表内不应该存储依赖于其他键的非键信息。 

主键（包括联合主键）与索引名应表义清晰明确，唯一索引建议带上`_unique`缀名，以与其它普通索引区别。





这里列出一份数据表示例：

```sql
DROP TABLE IF EXISTS `yascmf_users`;
CREATE TABLE `yascmf_users` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户登录名',
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户密码',
  `nickname` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户屏显昵称，可以不同用户登录名',
  `email` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '用户邮箱',
  ......
  `deleted_at` datetime DEFAULT NULL COMMENT '被软删除时间',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改更新时间',
  `is_lock` tinyint(3) NOT NULL DEFAULT '0' COMMENT '是否锁定限制用户登录，1锁定,0正常',
  `user_type` tinyint(3) NOT NULL DEFAULT '0' COMMENT '用户类型：0游客用户1管理型用户2投资客户',
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '确认码',
  `confirmed` tinyint(1) DEFAULT '0' COMMENT '是否已通过验证 0：未通过 1：通过',
  `remember_token` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Laravel 追加的记住令牌',
  PRIMARY KEY (`id`),
  KEY `nickname_index` (`nickname`),
  UNIQUE KEY `user_username_unique` (`username`),
  UNIQUE KEY `user_email_unique` (`email`),
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='用户表';
```

## Laravel常规命名规范

参照`Laravel`官方规范，下面具体对项目目录与文件命名做出说明：

### 控制器文件命名

默认控制器放置在 `app/controllers` 目录下，控制器文件与类命名遵循官方约束。可根据业务需求不同，在此目录下新建子目录。芽丝内容管理框架就采用这种，它的控制器结构大致如下：

```
app/
    controllers/
        Admin/  /*用于存放管理员操作相关控制器*/
            AdminArticleController.php
            AdminCategoryController.php
             ......
       BaseController.php
       HomeController.php
    
```
### 控制器类方法命名

① `RESTful资源控制器`

对于 `RESTful资源控制器` ，相应的方法采用其默认命名规则，如：

```
index() //index方法对应资源列表页面
create() //create方法对应创建资源页面
show($id) //show方法对应特定id资源页面
......
```

如在资源控制器上有其它扩展方法，比如批量删除，请遵循下面普通控制器方法命名规范。

②普通控制器

对于其它普通控制器方法名，推荐使用 `HTTP动作` ( 如 `get|post|delete` ) + 资源|行为 的驼峰命名规范。如：

```php
......
    public function getLogin(){
        return View::make('login');
    }
    public function getUpload(){
        return View::make('upload');
    }
    public function postUpload(){
        //处理upload过来的数据
    }
......
```

### 视图文件命名

默认视图文件放置在 `app/views` 目录下，视图文件或文件夹采用全小写英文命名，单词之间采用下划线 (`_`) 作为分隔符。`Blade`视图模版请带上 `blade` 点缀作为文件名。

对于 `RESTful资源控制器` 相关视图文件，遵循官方默认命名，如：

```
app/
    views/
        article/
            create.blade.php
            index.blade.php
            show.blade.php
        setting_type/
            create.blade.php
            ......    
        
```

在控制器中调用视图遵循点分调用规则，如：

```php
......
    public function getCustomerList(){
        return View::make('customer.index'); 
        //返回位于`app/views/customer/index.blade.php`的视图
    }
    public function index(){
        return View::make('setting_type.index'); 
        //返回位于`app/views/setting_type/index.blade.php`的视图
    }
......
```

### `Blade` 标签的使用

`Blade` 标签使用双或三大括号作为界定符，为了避免模版编译 `compiled` 失败，现约定大括号标签中的变量或函数应与界定符之间空一格，如：

```php
Hello, {{{ $name }}}.
The current UNIX timestamp is {{{ time() }}}.
```

`Blade` 标签应注意(括号或表达式)匹配，不匹配可能会造成模版输出错误。

如使用 `@if` 语句之后，必须使用 `@endif` 结束该标签。

```
@if (count($records) === 1)
    I have one record!
@elseif (count($records) > 1)
    I have multiple records!
@else
    I don't have any records!
@endif

@unless (Auth::check())
    You are not signed in.
@endunless
```

### 常规模型（`Model`）文件命名

这里所说的常规模型是指业务不复杂的数据表模型，针对业务复杂的模型需要自行扩展中间层模型。

`Laravel` 默认的 `Eloquent ORM` 模型放置在 `app/models` 目录下，`Laravel`
模型默认会操作对应名称为**「类名称的小写复数形态」**的数据库表，如名为 `User.php` 的模型默认会操作名为 `users` 的数据表。

常规模型命名遵循 `Laravel` 默认规范,如操作 `setting_type` 数据表的模型，我们可以这样定义：

```php
class SettingType extends Eloquent {
	
	protected $table = 'setting_type';
	
	public $timestamps = false;  //关闭自动更新时间戳

	public function setting()
	{
		return $this->hasMany('Setting');
	}

}
```

### 复杂业务逻辑模型的文件命名

根据业务需求，某些复杂的模型需要自行扩展中间层模型，以便更好地项目管理。项目的扩展其实只要遵循`Composer`相关自动加载规范即可，这里推荐使用 `PSR-4` 规范。

芽丝内容管理框架把核心业务层剥离出来了，具体是在`app`目录下独立新建一个目录（目录名为中文 `豆芽丝` 的汉语拼音`Douyasi`），采用命名空间分组的方式进行扩展开发。

这种扩展开发方式可以参考 `Laravel` 某些著名的项目，如 [`laravel.io`](https://github.com/LaravelIO/laravel.io) 、 [`LaraBook`](https://github.com/foxted/Larabook/) 等。

它的具体目录结构如下：

```
app/
    Douyasi/
        Account/  /*处理投资客户的账户资金相关业务逻辑*/
            Account.php
            AccountLog.php
            ......
        Customer/  /*处理投资客户开户登记，个人信息变更等业务逻辑*/
            Customer.php 
            CustomerCreator.php
```

### 自定义函数（`helper`）

芽丝内容管理框架扩展一些帮助函数，它位于`app/functions.php`文件里，是在 `bootstrap/autoload.php` 中手动引入加载的。

```php
......
require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../app/functions.php'; // 引入自定义函数库
......
```

下面列出一个示例`helper`函数。

```php
/**
 * 静态文件cdn部署
 * 如果设置过app.cdn_url参数，则启用它作为静态资源根目录，否则使用默认的app.url作为静态资源根目录
 * 如果cdn_url = 'http://ystatic.cn'
 * 则cdn('assets/css/style.css')实际表示的路径为
 *      http://ystatic.cn/assets/css/style.css
 */
function cdn( $filepath, $q = '' )
{
    $qstring = (is_string($q) && !empty($q)) ? '?'.$q:'';
    if (Config::get('app.cdn_url'))
    {
        $root = Config::get('app.cdn_url');
        return rtrim($root,'/').'/'.trim($filepath, '/').$qstring;
    }
    else
    {
        return app('url')->asset($filepath).$qstring;
    }
}

```

该helper函数可直接用于视图模版中。

```html
......
	<link rel="stylesheet" href="{{ cdn('assets/css/yas_style.css') }}" />{{-- 引入cdn静态资源 --}}
	<link rel="stylesheet" href="{{ asset('assets/lib/font-awesome/css/font-awesome.min.css') }}" />{{-- 可以到此查看fontawesome图标
......
```