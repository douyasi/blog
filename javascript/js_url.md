# Javascript获取当前URL相关参数

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [Javascript](http://douyasi.com/category/javascript/) |
>| 链接： | http://douyasi.com/javascript/js_url.html |
>| 标签： | [url](http://douyasi.com/tag/url)  |
>| 发布日期： | 2014-12-03 |

### 演示代码：

```javascript
var search = window.location.search; //获取url中"?"符后的字串
var hash = window.location.hash; //获取url中"#"锚点符
		
		var parser = document.createElement('a');
		//var parser = {};
		parser.href = "http://example.com:3000/pathname/?search=test#hash";
		parser.protocol; // => "http:"
		parser.hostname; // => "example.com"
		parser.port;     // => "3000"
		parser.pathname; // => "/pathname/"
		parser.search;   // => "?search=test"
		parser.hash;     // => "#hash"
		parser.host;     // => "example.com:3000"
		/*
		hash	 从井号 (#) 开始的 URL（锚）
		host	 主机名和当前 URL 的端口号
		hostname	 当前 URL 的主机名
		href	 完整的 URL
		pathname	 当前 URL 的路径部分
		port	 当前 URL 的端口号
		protocol	 当前 URL 的协议
		search	 从问号 (?) 开始的 URL（查询部分）
		*/
	console.log(search);
	console.log(hash);
 
```





### 相关资源

解析URL的JS类库：

- [jquery.url.js](https://github.com/allmarkedup/purl)（不再更新维护）
- [URI.js](https://github.com/medialize/URI.js)