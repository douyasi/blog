# json对象的遍历

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [Javascript](http://douyasi.com/category/javascript/) |
>| 链接： | http://douyasi.com/javascript/json_foreach.html |
>| 标签： | [json](http://douyasi.com/tag/json) [foreach](http://douyasi.com/tag/foreach)  |
>| 发布日期： | 2015-02-03 |

在写内容管理框架时，需要实现根据当前路由 `url` 自动对导航栏特定项目予以高亮。由于，原有 `cmf` 是使用 `json` 结合 `laytpl` 模版引擎生成导航栏。

这个过程中需要使用到 `json` 对象遍历，下面简单学习下对如何对`json`数据遍历。
这里主要使用到 `for ( var d in data )` 语句，对于复杂结构的 `json` 数据比较好用。



```html
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>route_map</title>
</head>
<body>
    <script type="text/javascript">
//假设你得到了这么一段数据
var data = {
	desc: '导航区域',
	list: [
		{
			index: 0,
			anchor: 'admin.console.index', icon: 'fa-home', title: '控制台', 
			submenu: [
				{link: 'admin.console.index', name: '概要'}
			]
		},
		{
			index: 1,
			anchor: 'admin.article.index', icon: 'fa-edit', title: '内容管理', 
			submenu: [
				{link: 'admin.article.index', name: '文章'},
				{link: 'admin.page.index', name: '单页'},
				{link: 'admin.fragment.index', name: '碎片'},
				{link: 'admin.category.index', name: '分类'},
				{link: 'admin.tag.index', name: '标签'}
			]
		},
		{
			index: 2,
			anchor: 'admin.user.index', icon: 'fa-user', title: '用户管理', 
			submenu: [
				{link: 'admin.me.index', name: '我的账户'},
				{
					link: '#jsqx', name: '角色权限', sub: [
						{sublink: 'admin.role.index', subname: '角色(用户组)'},
						{sublink: 'admin.permission.index', subname: '权限'}
					]
				}
			]
		},
		{
			index: 3,
			anchor: 'admin.business.index', icon: 'fa-coffee', title: '业务管理', 
			submenu: [
				{link: 'admin.flow', name: '业务流程'},
				{link: 'admin.customer.index', name: '我的客户'}
			]
		},
		{
			index: 4,
			anchor: 'admin.system_option.index', icon: 'fa-cog', title: '系统管理',
			submenu: [
				{link: 'admin.system_option.index', name: '系统配置'},
				{
					link: '#dtszgl', name: '动态设置', sub: [
						{sublink: 'admin.setting_type.index', subname: '动态设置分组'},
						{sublink: 'admin.setting.index', subname: '动态设置'}
					]
				},
				{link: 'admin.system_log.index', name: '系统日志'}
			]
		}
	],
	cur_top:0  //顶级导航高亮索引
};
var list = data.list;
var map = {};
var i = 0;
for(var listIndex in list){
	for(var submenuIndex in list[listIndex]['submenu']){
		map[i] = { 'url': list[listIndex]['submenu'][submenuIndex]['link'], 'index': listIndex };
		i++;
		if(list[listIndex]['submenu'][submenuIndex]['sub'] !== undefined){
			for(var subIndex in list[listIndex]['submenu'][submenuIndex]['sub'])
			{
				map[i] = { 'url': list[listIndex]['submenu'][submenuIndex]['sub'][subIndex]['sublink'], 'index': listIndex };
				i++;
			}
		}
	}
}
console.log(map);
    </script>
</body>
</html>
```