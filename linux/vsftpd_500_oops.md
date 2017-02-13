# vsftpd 服务器报错：500 OOPS: vsftpd: refusing to run with writable root inside chroot()

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [Linux](http://douyasi.com/category/linux/) |
>| 链接： | http://douyasi.com/linux/vsftpd_500_oops.html |
>| 标签： | none |
>| 发布日期： | 2014-10-07 |

今天安装 `vsftp` 服务器，在修改了 `chroot_local_user` 属性以后，发现进行客户端访问的时候会报错：`500 OOPS: vsftpd: refusing to run with writable root inside chroot()` 。

到网上查了资料,得到解决问题方法如下：

如果启用 `chroot`，必须保证 `ftp` 根目录不可写，这样对于 `ftp` 根直接为网站根目录的用户不方便，所以建议假如 `ftp` 根目录是 `/home/wwwroot`，则将访问权限改写如下：

```shell
chmod a-w /home/wwwroot
```

> 来源参考：<http://kisuntech.blog.51cto.com/8003773/1308314>