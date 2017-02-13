# Windows cmd dir命令

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [Windows](http://douyasi.com/category/win/) |
>| 链接： | http://douyasi.com/win/cmd_dir_help.html |
>| 标签： | [cmd](http://douyasi.com/tag/cmd) [dir](http://douyasi.com/tag/dir)  |
>| 发布日期： | 2014-09-28 |

昨天在群里，有人问到如何获取当前目录下MKLINK目录或文件。WIN7的一个新工具 `MKLINK`，能够对系统文件或文件夹进行链接或联接，具体请参考[这篇文章](http://llloo.cn/archives/1018.html)。

可以使用下面命令创建符号链接(`symbolic link`)：

```bash
mklink /d "F:/cmd/111" "F:/cmd/222"
```

其中 `F:/cmd/111` 为链接目录，到 `F:/cmd/222` 为原始目录。

发现可以通过dir命令获取到目录属性，见下图1。 

![20140929095102.jpg][1]



本人对cmd之类的批处理不是很了解，结果在群里，有玩dos的高手给我指出了获取各种命令帮助的方法。如果你不了解dir的命令结构，可以输入下面代码：

```bash
dir /?
```

命令行窗会回显 `dir` 相关帮助，见下图2。
 
![20140929095625.jpg][2]

根据命令行给出的帮助我们能够很快找到 `MKLINK` 的目录或文件。


下面命令可以把结果输出到文件（txt.txt）里面。

```bash
dir F:\cmd /al /b /s>txt.txt
```
 
![20140929103325.jpg][3]

[1]: http://douyasi.com/usr/uploads/2014/09/3366931916.jpg
[2]: http://douyasi.com/usr/uploads/2014/09/164577313.jpg
[3]: http://douyasi.com/usr/uploads/2014/09/2039339280.jpg