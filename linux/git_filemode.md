# git 文件权限修改冲突及其忽略文件办法

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [Linux](http://douyasi.com/category/linux/) |
>| 链接： | http://douyasi.com/linux/git_filemode.html |
>| 标签： | [git](http://douyasi.com/tag/git) [filemode](http://douyasi.com/tag/filemode)  |
>| 发布日期： | 2015-07-04 |

`git` 中可以加入忽略文件权限的配置，具体如下：

```shell
$ git config core.filemode false
```

这样就设置了忽略文件权限。查看下配置：

```shell
$ cat .git/config
```

`git` 忽略文件权限的配置

![git filemode][1]

这时候再更新代码就OK了。


  [1]: http://douyasi.com/usr/uploads/2015/07/9806686.png