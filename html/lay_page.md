# JS前端分页组件layPage

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [HTML](http://douyasi.com/category/html/) |
>| 链接： | http://douyasi.com/html/lay_page.html |
>| 标签： | [laypage](http://douyasi.com/tag/laypage)  |
>| 发布日期： | 2015-01-05 |

>    新年第一篇博文。

layPage是作者贤心为其layui体系所写的一款前端JS分页插件。layPage官网为<http://sentsin.com/layui/laypage/>，layPage依赖于jQuery，在引用它之前必须先引入jquery。



示例代码：

```html
<!doctype html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<title>layPage演示</title>
	<script type="text/javascript" src="http://upcdn.b0.upaiyun.com/libs/jquery/jquery-1.8.3.min.js"></script>
	
	<script type="text/javascript" src="layPage/laypage.js"></script>
</head>
<body>
	<div class="view" style="margin: 10px auto;"></div>
	<div class="page"></div>
<script type="text/javascript">
laypage({
	cont: $('.page'), //容器。值支持id名、原生dom对象，jquery对象,
	pages: 100, //总页数
	skip: false, //是否开启跳页
	skin: 'molv',
	groups: 3, //连续显示分页数
	first: '首页', //若不显示，设置false即可
	last: '尾页', //若不显示，设置false即可
	prev: '<', //若不显示，设置false即可
	next: '>', //若不显示，设置false即可
	hash: true, //开启hash
	jump: function(obj){ //触发分页后的回调
        $('.view').html('目前正在第'+ obj.curr +'页，一共有：'+ obj.pages +'页');
    }
});
</script>
</body>
</html>
```

处理分页之后数据的逻辑主要在jump function里面，可以配合后端回调json数据插入。
