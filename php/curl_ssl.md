# php curl获取https网站内容

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [PHP](http://douyasi.com/category/php/) |
>| 链接： | http://douyasi.com/php/curl_ssl.html |
>| 标签： | [curl](http://douyasi.com/tag/curl) [ssl](http://douyasi.com/tag/ssl)  |
>| 发布日期： | 2015-12-24 |

有时候我们需要跟安全的 `https` 网站交互，获取对方内容，如果使用 `curl` 需要设置额外的选项。

下面给出php示例代码：

>    其中 `cacert.pem` 根CA证书文件可以去 `http://curl.haxx.se/docs/caextract.html` 下载。

```php
$url = 'https://github.com/';  

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);

// Set so curl_exec returns the result instead of outputting it.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//verify ssl server
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

//set CA Certs file path
curl_setopt($ch, CURLOPT_CAINFO, '/home/ssl/cacert.pem');

// Get the response and close the channel.
$response = curl_exec($ch);
curl_close($ch);

return $response;
```