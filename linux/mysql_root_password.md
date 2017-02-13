# Linux下修改mysql数据库root密码

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [Linux](http://douyasi.com/category/linux/) |
>| 链接： | http://douyasi.com/linux/mysql_root_password.html |
>| 标签： | [mysql](http://douyasi.com/tag/mysql)  |
>| 发布日期： | 2014-11-06 |


```shell
mysqladmin -uroot -p{oldpassword}  password  {newpassword}
```

注意：`{oldpassword}` 即您 `mysql` 的 `root` 用户当前的密码，`{newpassword}` 即您修改后的密码。 -p跟 `{newpassword}` 之间没有空格。 `{newpassword}` 跟 `password` 之间有空格，`password` 跟 `{newpassword}` 之间有空格。

执行此命令可能在MySQL 5.6版本下出现警告：`Using a password on the command line interface can be insecure.`
