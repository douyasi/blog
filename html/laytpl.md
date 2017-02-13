# laytpl v1.1使用说明

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [HTML](http://douyasi.com/category/html/) |
>| 链接： | http://douyasi.com/html/laytpl.html |
>| 标签： | [laytpl](http://douyasi.com/tag/laytpl)  |
>| 发布日期： | 2014-10-01 |

>    此段文字都是来自laytpl官网，如有吹嘘或错误，概不负责。
>    laytpl官网：http://sentsin.com/layui/laytpl/ 。

### laytpl优势

- 性能卓绝，执行速度比号称性能王的`artTemplate` 、`doT` 还要快将近1倍，比`baiduTemplate` 、`kissyTemplate` 等快20-40倍，数据规模和渲染频率越大越明显；
- 体积小到极致，只有1kb；
- 具备转义等安全机制，比较科学的报错功能；
- 模版中可任意书写Native JavaScript，充分确保模版的灵活度；
- 支持应用在Node.js平台；
- 支持所有古代或现代的主流浏览器。





```javascript
//假设你得到了这么一段数据
var data = {
    title: '前端圈',
    intro: '一群码js的骚年，幻想改变世界，却被世界改变。',
    list: [
        {name: '贤心', city: '杭州'}, 
        {name: '谢亮', city: '北京'}, 
        {name: '浅浅', city: '杭州'}, 
        {name: 'Dem', city: '北京'}
    ]
};
```

```html
<h3>{{ d.title }} {{ d.title ? ' - 群/176047036' : '' }}</h3>
<p class="intro">{{ d.intro }}</p>
<ul>
{{# for(var i = 0, len = d.list.length; i < len; i++){ }}
    <li>
        <span>{{ d.list[i].name }}</span>
        <span>所在城市：{{ d.list[i].city }}</span>
    </li>
{{# } }}
</ul>
```

### 使用说明

```html
//第一步：编写模版。你可以使用一个script标签存放模板，如：
<script id="demo" type="text/html">
<h1>{{ d.title }}</h1>
<ul>
{{# for(var i = 0, len = d.list.length; i < len; i++){ }}
    <li>
        <span>姓名：{{ d.list[i].name }}</span>
        <span>城市：{{ d.list[i].city }}</span>
    </li>
{{# } }}
</ul>
</script>

//第二步：建立视图。用于呈现渲染结果。
<div id="view"></div>

//第三步：渲染模版
var data = {
    title: '前端攻城师',
    list: [
        {name: '贤心', city: '杭州'}, 
        {name: '谢亮', city: '北京'}, 
        {name: '浅浅', city: '杭州'}, 
        {name: 'Dem', city: '北京'}
    ]
};
var gettpl = document.getElementById('demo').innerHTML;
laytpl(gettpl).render(data, function(html){
    document.getElementById('view').innerHTML = html;
});
```

### 文档说明

```
一、模版语法
输出一个普通字段，不转义html：   {{ d.field }}
输出一个普通字段，并转义html：   {{= d.field }}
JavaScript脚本： {{# JavaScript statement }}

二、内置方法
1)：laytpl(template);   //核心函数，返回一个对象
    
    var tpl = laytpl(template);
    tpl.render(data, callback);   
    //渲染方法，返回渲染结果，支持异步和同步两种模式
        a)：异步
        tpl.render(data, function(result){
            console.log(result);
        });
        
        b)：同步
        var result = tpl.render(data);
        console.log(result);

    
2)：laytpl.config(options); //初始化配置
    options是一个对象
    {open: '开始标签', close: '闭合标签'}
    
3)：laytpl.v    //获取版本号
```
  