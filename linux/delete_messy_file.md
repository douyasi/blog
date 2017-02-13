# linux删除乱码文件

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [Linux](http://douyasi.com/category/linux/) |
>| 链接： | http://douyasi.com/linux/delete_messy_file.html |
>| 标签： | [linux](http://douyasi.com/tag/linux)  |
>| 发布日期： | 2014-09-26 |

一些乱码文件不可以通过普通的rm命令进行管理。可以通过删除i节点的方式删除。

```shell
[root@192_168_100_35 musicwap]# ls
??,?K?k?ͨa*.?J]?k?Φ??P???Z?b?A?R???X??u??.?????*H@B?T???xS*<?X?h??N?TR4˫?!?H
```

查看乱码文件的i结点

```shell
[root@192_168_100_35 musicwap]# ls -liaha
54263996 -rw-rw-r-- 1 musicwap musicwap    0 Sep 20 16:57 ??,?K?k?ͨa*.?J]?k?Φ??P???Z?b?A?R???X??u??.?????*H@B?T???xS*<?X?h??N?TR4˫?!?H
```

使用find命令找文件删除

```
[root@192_168_100_35 musicwap]# find . -inum 54263996 -exec rm {} -rf \;
[root@192_168_100_35 musicwap]# ls -a
. ..
```

现在已经删除了。