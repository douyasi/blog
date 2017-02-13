# 更改cmd代码页，修正中文显示

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [Laravel](http://douyasi.com/category/laravel/) |
>| 链接： | http://douyasi.com/laravel/codepgae.html |
>| 标签： | [codepage](http://douyasi.com/tag/codepage)  |
>| 发布日期： | 2015-01-27 |

最近在使用 `Laravel` 单元测试 `phpunit` ，发现在命令行下，打印某些网页字符串会显示乱码，经搜索后，知晓这是因为命令行代码页与网页编码不一致造成的。

`Windows` 简体中文系统，默认命令行代码页为936（简体中文），而网页编码一般为UTF-8（65001）。
可以尝试在命令行下输入以下命令，切换代码页：

```shell
rem utf-8
chcp 65001
```

如需切换回简体中文，请输入

```shell
rem 简体中文
chcp 936
```



这里列出其它语言的代码页：

```
rem 英文
chcp 437

rem 日文
chcp 932
 
rem 简体中文
chcp 936
 
rem 韩文
chcp 949
 
rem 繁体中文
chcp 950
 
rem utf-8
chcp 65001
```