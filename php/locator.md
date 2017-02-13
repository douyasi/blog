# 浏览器语言偏好侦测器

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [PHP](http://douyasi.com/category/php/) |
>| 链接： | http://douyasi.com/php/locator.html |
>| 标签： | [locator](http://douyasi.com/tag/locator)  |
>| 发布日期： | 2016-07-16 |

`Laravel` 框架侦测浏览器语言偏好，某些情况下存在 `BUG` ，它依赖于 `Symfony\Component\HttpFoundation\Request` 的 `getPreferredLanguage` 方法。

问题主要表现为：在优先简体中文（其它非英语也有可能）偏好（`Accept-Language:zh-CN,zh;q=0.8,en;q=0.6,zh-TW;q=0.4`）的`Chrome` 浏览器下，仍会返回英文，即使存在可用的简体中文语言版本。在 `stackoverflow` 网站上有相关问题的讨论，部分答者建议使用不同语言对应不同 `url` 的方案。



通过审阅 `Symfony` 相关代码，发现它对 `locale` 语言 以 `_` 切分分段，可能遵循于 `linux` 的 `i18n` 表述方案（如简体中文UTF8编码，(`zh_CN.utf8`)）吧。但实际上，浏览器发送过来的 `Accept-Language` 都是以 `-` 切分。故存在对偏好语言的判断错误。


为此，本人参考 [http-accept-language](https://github.com/BaguettePHP/http-accept-language)，写了个侦测器，可以更好更准确地获取浏览器语言偏好信息。

>    源码：https://github.com/douyasi/locator