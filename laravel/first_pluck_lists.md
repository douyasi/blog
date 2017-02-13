# Laravel SQL查询中first, pluck与lists方法的使用

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [Laravel](http://douyasi.com/category/laravel/) |
>| 链接： | http://douyasi.com/laravel/first_pluck_lists.html |
>| 标签： | none |
>| 发布日期： | 2015-03-24 |

![20150324140951.jpg][1]

看到说明文档上面介绍，难免有些迷惑，还是亲自动手试试吧。





### `sql`测试数据表

```sql
-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '张三', 'zhangsan@example.com', '$2y$10$DNXpTLallazQRUTfFjsmx.qe0lr8SjoM1f2B5muNFB6Fn4Ay/DVIa', null, '2015-03-24 14:48:37', '2015-03-24 14:48:41');
INSERT INTO `users` VALUES ('2', '李四', 'lisi@example.com', '$2y$10$6sK8ZZjHgK8kYxnceIrmoO1RdrXdOxZxbxFyFgpNlZI83ZHI9nO6y', null, '2015-03-24 14:49:39', '2015-03-24 14:49:42');
```

### 控制器测试方法

```php
	public function test()
	{
		$users = DB::table('users')->get();
		$user = DB::table('users')->where('name', '张三')->first();
		$name = DB::table('users')->where('name', '张三')->pluck('name');
		$names = DB::table('users')->lists('name');
		$name_email = DB::table('users')->lists('name','email');
		var_dump($users, $user, $name, $names, $name_email);
	}
```

### 运行结果

![20150324150659.jpg][2]

### 说明与总结

由运行结果截图我们不能得出这3个方法的区别。

- `first` 方法是取得结果集数组中第一列数据，如果结果集为空则返回 `null` 。
- `pluck` 方法是取得结果集第一列特定字段，它返回是字符串；
- `lists` 方法是按照 `key=>value` 对的方式返回数组；它的参数最多两个，第一个参数作为键值（`value`），第二个参数作为键名（`key`）。

  [1]: http://douyasi.com/usr/uploads/2015/03/2941679459.jpg
  [2]: http://douyasi.com/usr/uploads/2015/03/4071188560.jpg