# 使用artTemplate模版引擎

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [Javascript](http://douyasi.com/category/javascript/) |
>| 链接： | http://douyasi.com/javascript/art_template.html |
>| 标签： | [arttemplate](http://douyasi.com/tag/arttemplate)  |
>| 发布日期： | 2014-10-20 |

[artTemplate](https://github.com/aui/artTemplate) 是腾讯公司出品的js模版引擎。`laytpl` 号称比 `artTemplate` 还快，这姑且不论了。在使用过 `laytpl` 和 `artTemplate` 之后，发现2者都有自己的优缺点。

## artTemplate模板中不支持全局函数，官方说这是为了安全规范考虑，而laytpl就支持。

![20141021101830.jpg][1]

`artTemplate` 模版不支持全局函数，意味着某些js方法不能直接使用，只能使用 `helper` 来定义自定义函数。

```javascript
template.helper('curTop', function (cur_top, i) {
    i = isNaN(parseInt(cur_top))?0:parseInt(cur_top);  //在artTemplate模版中无法使用js原生的isNaN、parseInt等方法
    return i;
});
```

在模版中这样使用。

```
<% var i = curTop(cur_top);%>
```

## artTemplate模版解析存在某种缺陷和bug，同样问题也存在于laytpl中。存在if else是大括号匹配闭合问题。

比如：

```
<% if(a) { %>
a is true
<% } %>
<% else { %>
a is false
<% } %>
```

这样会报模版引擎错误，只能这样折中解决：

```
<% if(a) { %>
a is true
<% } else {%>
a is false
<% } %>
```



下面列出使用 `artTemplate` 一个demo页面代码：

```html
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>basic-demo</title>
<script src="../../dist/template-native.js"></script>
</head>

<body>
<div id="content"></div>
<script id="test" type="text/html">
<ul class="nav_list">
	<% var i = curTop(cur_top); %>
	<% for (var m = 0; m < list[i].submenu.length; m++) { %>
		<li>
			<% if (list[i].submenu[m].sub !== "none") { %>
				<h3><%= list[i].submenu[m].name %><i class="fa fa-angle-down"></i></h3>
				<ul class="submenu">
					<% for(var n = 0; n <  list[i].submenu[m].sub.length; n++) { %>
						<li><a href="<%= list[i].submenu[m].sub[n].sublink %>"><%= list[i].submenu[m].sub[n].subname %></a></li>
					<% } %>
				</ul>
			<% } else { %>
				<a href="<%= list[i].submenu[m].link %>"><h3><%= list[i].submenu[m].name %><h3></a>
			<% } %>
		</li>
	<% } %>
</ul>
</script>
<script type="text/javascript">
var data = {
	desc: '顶级导航区域',
	list: [
		{
			anchor: '#1', icon: 'fa-home', title: '控制台', 
			submenu: [
				{link: '#gy', name: '概要', sub: 'none'},
				{
					link: '#zx', name: '杂项', sub: [
						{sublink: '#wg', subname: '外观'},
						{sublink: '#cj', subname: '插件'},
						{sublink: '#mb', subname: '模版'}
					]
				}
			]
		},
		{
			anchor: '#2', icon: 'fa-edit', title: '内容管理', 
			submenu: [
				{
					link: '#wz', name: '文章管理', sub: [
						{sublink: '#lb', subname: '文章列表'},
						{sublink: '#zxxwz', subname: '撰写新文章'},
						{sublink: '#tag', subname: '标签'},
						{sublink: '#cat', subname: '分类'}
					]
				},
				{
					link: '#zx', name: '杂项', sub: [
						{sublink: '#wg', subname: '外观'},
						{sublink: '#cj', subname: '插件'},
						{sublink: '#mb', subname: '模版'}
					]
				},
				{link: '#dy', name: '单页', sub: 'none'},
				{link: '#yl', name: '友链', sub: 'none'},
				{link: '#ht', name: '幻图', sub: 'none'}
			]
		}, 
		{anchor: '#3', icon: 'fa-user', title: '用户管理'}, 
		{anchor: '#4', icon: 'fa-cog', title: '系统设置'}
	],
	cur_top:1
};
template.helper('curTop', function (cur_top, i) {
	i = isNaN(parseInt(cur_top))?0:parseInt(cur_top);
	return i;
});

var html = template('test', data);
document.getElementById('content').innerHTML = html;
</script>
</body>
</html>
```

  [1]: http://douyasi.com/usr/uploads/2014/10/21254362.jpg