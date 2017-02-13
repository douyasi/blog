# 告警，请勿轻易升级typecho到1.0新版

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [默认分类](http://douyasi.com/category/default/) |
>| 链接： | http://douyasi.com/default/typecho_bug.html |
>| 标签： | [typecho](http://douyasi.com/tag/typecho)  |
>| 发布日期： | 2014-10-11 |

告警，请勿轻易升级typecho到1.0新版，刚刚手贱按照官网升级方法升级了。结果出现诸多问题：

## 主题错位：

本站主题其实就是官方主题，只不过把评论换成多说的了，结果出现错位。
  
## markdown解析二级三级标题原样输出：
  
0.9版可以正确解析下面二级和三级标题：  `##标题2` 和 `###标题3`；

1.0版直接原样输出了，估计跟官方换用新markdown解析库有关。  

![20141011195707.jpg][1]

  [1]: http://douyasi.com/usr/uploads/2014/10/3442491548.jpg

