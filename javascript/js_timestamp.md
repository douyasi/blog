# js处理时间戳

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [Javascript](http://douyasi.com/category/javascript/) |
>| 链接： | http://douyasi.com/javascript/js_timestamp.html |
>| 标签： | [timestamp](http://douyasi.com/tag/timestamp)  |
>| 发布日期： | 2014-11-10 |

废话少说，直接上代码。

```html
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>JS timestamp</title>
</head>
<body>
	<script type="text/javascript">
		function formatDate(ts) {
			var now = new Date(parseInt(ts) * 1000);
			console.log(now);
			var year = now.getFullYear();
			var month = ((now.getMonth()+1)<10)?('0'+(now.getMonth()+1)):(now.getMonth()+1);
			var date = (now.getDate()<10)?('0'+now.getDate()):(now.getDate());
			var hour = (now.getHours()<10)?('0'+now.getHours()):(now.getHours());
			var minute = (now.getMinutes()<10)?('0'+now.getMinutes()):(now.getMinutes());
			var second = (now.getSeconds()<10)?('0'+now.getSeconds()):(now.getSeconds());
			return   year+"-"+month+"-"+date+"   "+hour+":"+minute+":"+second;
		}
		console.log(formatDate(1415433769));
	</script>
</body>
</html>
```

引申知识：

`getYear()` 获取的年份为"当前年份-1900" 的值，使用 `getFullYear()` 能获取到完整的年份值。