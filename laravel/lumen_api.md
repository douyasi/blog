# 使用Lumen构建API服务

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [Laravel](http://douyasi.com/category/laravel/) |
>| 链接： | http://douyasi.com/laravel/lumen_api.html |
>| 标签： | [lumen](http://douyasi.com/tag/lumen) [api](http://douyasi.com/tag/api)  |
>| 发布日期： | 2016-01-27 |

`Lumen` 是微框架，由 `Laravel` 全栈型框架精简而来，目前 `5.2` 版已经移除 `session` 和 `view` 组件，特别适合做无状态的 `API` 服务。

## 参考资源

[理解OAuth 2.0](http://www.ruanyifeng.com/blog/2014/05/oauth_2_0.html)

[lucadegasperi/oauth2-server-laravel](https://github.com/lucadegasperi/oauth2-server-laravel)

[oauth2-server-laravel docs](https://github.com/lucadegasperi/oauth2-server-laravel/tree/master/docs#readme)

[讲讲我最近用 Laravel 做的一个 App 后端项目](https://phphub.org/topics/610)

[JSON API：用 JSON 构建 API 的标准指南中文版](https://phphub.org/topics/179)

## 错误处理

`APP API` 可能返回以下错误:





错误状态码 | 含义
----- | -----
400 Bad Request | 请求格式错误，请查阅对应的文档条目
401 Unauthorized | `access token` 过期，或请求的API超过授权
403 Forbidden | 权限不足，禁止访问，一般为客户端 `app-key` 错误造成的
404 Not Found | 调用的 API 不存在，请查看本文档
405 Method Not Allowed | 请求方式 `method` 错误， 请查阅对应的文档条目
406 Not Acceptable | 请求不是 `json` 格式
500 Internal Server Error | 服务器错误，请联系开发者
503 Service Unavailable | 服务器暂时下线，请稍候重试

## 名词解释

名词 | 解释
----- | -----
URI | Uniform Resource Identifier (统一资源定位符)
Request Header | 请求头部
Request Body | 请求主体
Response Header | 响应头部
Response Body | 响应主体
Access Token | 令牌，`OAuth` 常用它作为访问用户或受限资源的凭证
TTL | Time To Live (生存时间值)，文档中表示某个令牌的有效期

