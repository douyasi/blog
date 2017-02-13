# 修改Eclipse的默认charset 为utf-8  

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [Windows](http://douyasi.com/category/win/) |
>| 链接： | http://douyasi.com/win/eclipse_default_charset.html |
>| 标签： | [eclipse](http://douyasi.com/tag/eclipse) [charset](http://douyasi.com/tag/charset)  |
>| 发布日期： | 2014-11-20 |

使用 `eclipse` 打开 `php` 项目，所有项目文件均是 `utf-8` 编码，但打开项目某些文件老是乱码，纠结了半天。搜索一番之后，找到设置的办法：

选择 `eclipse` 菜单栏里 `Windows->Preferences=>General=>Content Types`，选择特定的文件扩展名，在下方 `Default encoding` 输入框输入 `UTF-8`。

![20141120100634.jpg][1]

另搜索到了，在 `eclipse.ini` 文件里添加一行 `-Dfile.encoding=utf-8` 也可，这个没具体尝试，应该有效果。

  [1]: http://douyasi.com/usr/uploads/2014/11/32119459.jpg