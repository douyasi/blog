# linux下nodejs编译与安装

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [Linux](http://douyasi.com/category/linux/) |
>| 链接： | http://douyasi.com/linux/nodejs_make_on_linux.html |
>| 标签： | [linux](http://douyasi.com/tag/linux) [nodejs](http://douyasi.com/tag/nodejs) [gcc](http://douyasi.com/tag/gcc) [make](http://douyasi.com/tag/make)  |
>| 发布日期： | 2014-09-29 |

从 [nodejs官网](http://nodejs.org/download/) 获取最新源码包地址，在 `linux shell` 下输入以下命令：
    
![20140929233155.jpg][1]    

```shell
wget http://nodejs.org/dist/v0.10.32/node-v0.10.32.tar.gz
tar zxvf node-v0.10.32.tar.gz 
cd node-v0.10.32 
./configure
```

上面几行命令是通过 `wget` 命令下载最新版本的代码，并解压之。 `./configure` 命令将会检查环境是否符合 `Nodejs` 的编译需要，之后会屏显一些信息。





如果检查没有通过，请确认预装依赖是否完整满足(如 `gcc`, `python`, `libssl` 等），具体可以看 `nodejs` 官方 [github wiki](https://github.com/joyent/node/wiki/Installation) 。如果 `configure` 命令执行成功，就可以进行编译了：

```shell
make 
make install
```

`Nodejs` 通过 `make` 工具进行编译和安装（如果 `make install` 不成功，请使用 `sudo` 以确保拥有权限）。完成以上两步后，检查一下是否安装成功：

```bash
node -v 
```

检查是否返回类似于 `v0.10.32` 版本信息。

至此，Nodejs已经编译并安装完成。如需卸载，可以执行 `make uninstall` 进行卸载。

[1]: http://douyasi.com/usr/uploads/2014/09/801728202.jpg