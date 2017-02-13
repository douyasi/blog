# 使用PhantomJS实现网页截图

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [Linux](http://douyasi.com/category/linux/) |
>| 链接： | http://douyasi.com/linux/phantomjs.html |
>| 标签： | [PhantomJS](http://douyasi.com/tag/PhantomJS)  |
>| 发布日期： | 2014-11-13 |

[PhantomJS](http://phantomjs.org) 是一个无界面的 `Webkit` 内核浏览器，对 `DOM` 操作、`CSS` 选择器、`JSON`、 `Canvas` 和 `SVG` 等 `WEB` 标准有非常快的、原生的支持。总之 `PhantomJS` 就是一个有 `API` 的浏览器，可以用来进行网页截图、自动化测试等。

## 安装依赖

```shell
//debian/ubuntu
sudo apt-get install build-essential chrpath libssl-dev libfontconfig1-dev
//centos
sudo yum install gcc gcc-c++ make openssl-devel freetype-devel fontconfig-devel
```




## 下载源码编译安装

```shell
wget https://bitbucket.org/ariya/phantomjs/downloads/phantomjs-1.9.8-source.zip
unzip phantomjs-1.9.8-source.zip && cd phantomjs-1.9.8
./build.sh
sudo cp phantomjs /usr/bin/phantomjs
```

## 使用PhantomJS截图

```shell
wget https://raw.github.com/ariya/phantomjs/master/examples/rasterize.js
phantomjs rasterize.js http://douyasi.com dys.png
```

如果中文显示不出来的话说明没有安装对应的字体，`debian/ubuntu` 可以安装 `xfonts-wqy`， `centos` 的话可以安装 `wqy-bitmapfont` (需下载）或者 `bitmap -fonts` 和 `bitmap-fonts-cjk`，安装完之后中文应该就可以正常显示了。

安装 `xfonts-wqy` 命令：

```shell
sudo apt-get install xfonts-wqy
```

参考来源：<http://phantomjs.org/build.html>