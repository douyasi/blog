# Xshell backspace按键无法实现删除字符串

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [Linux](http://douyasi.com/category/linux/) |
>| 链接： | http://douyasi.com/linux/xshell_backspace.html |
>| 标签： | [xshell](http://douyasi.com/tag/xshell)  |
>| 发布日期： | 2014-11-12 |

## 问题描述

>    `Xshell` 登录进入 `linux` 后，在普通模没问题，在某些输入（如操作数据库、`shell` 脚本交互等模式）按`delete`、 `backspace` 键时会产生 `^H` 等乱码问题。

如下图所示：

![20141112131453.jpg][1]





## 解决办法

选择 **文件**(File)---->**属性**(Propertise)，在弹出的对话框中，选择**终端**(Terminal)下的**键盘**(Keyboard)，然后如下设置：  

![20141112132039.jpg][2]


  [1]: http://douyasi.com/usr/uploads/2014/11/1778896880.jpg
  [2]: http://douyasi.com/usr/uploads/2014/11/2436502037.jpg