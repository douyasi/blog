# 基于 Laravel 5 构建的博客

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [CMF](http://douyasi.com/category/cmf/) |
>| 链接： | http://douyasi.com/cmf/yascmf_for_laravel_5.html |
>| 标签： | none |
>| 发布日期： | 2015-03-12 |

此前已发过类似的贴子，但当时是 `Laravel 4` 版且没有公布源码，故关注的人较少。现在源码初版已发布到 GitHub ，欢迎大家关注，Star，Fork，希望本源码能起到抛砖引玉的作用。有任何问题可发起 [Issue](https://github.com/douyasi/yascmf/issues) 或加群交流。

GitHub 地址：https://github.com/douyasi/yascmf  
演示网站：http://www.yas.so/

![20150312113729.jpg][1]

安装说明请看 [readme 文档](https://github.com/douyasi/yascmf/blob/master/README.md)。





通过阅读本源码结合 `Laravel 5`  [中文文档](http://laravel-china.org/docs/5.0)，您能学习、理解或掌握框架自身功能、架构与服务，加强  `Laravel`  的实践操作能力：

① 实现[自定义验证扩展](https://github.com/douyasi/yascmf/blob/master/app/Extensions/DouyasiValidator.php)，如验证国内手机号、身份证证号等；  
② 实现[自定义分页样式扩展](https://github.com/douyasi/yascmf/blob/master/app/Extensions/DouyasiPresenter.php)，不是那种类似 Bootstrap 分页样式；  
③ 了解仓库（Repository）设计模式（注意本系统后台使用了[仓库](https://github.com/douyasi/yascmf/tree/master/app/Repositories)，前台没有）;  
④ 理解 Laravel [事件](https://github.com/douyasi/yascmf/blob/master/app/Handlers/Events/UserEventHandler.php) 以及其[监听触发方法](https://github.com/douyasi/yascmf/blob/master/app/Http/Controllers/AuthorityController.php#L42)；  
⑤ 掌握使用 `Entrust` （[Laravel 5适配版本](https://github.com/Zizaco/entrust/tree/laravel-5)）包来实现角色与权限的控制；
⑥ 理解 `Http` 层 中间件（`Middleware`） 、 请求（`Request`） 与 控制器（`Controller`） 三者之间的关系；  
⑦ 在控制器中结合 [Request](https://github.com/douyasi/yascmf/blob/master/app/Http/Requests/ArticleRequest.php)  实现[表单验证](https://github.com/douyasi/yascmf/blob/master/app/Http/Controllers/Admin/AdminArticleController.php#L94)；  
⑧ [缓存](https://github.com/douyasi/yascmf/blob/master/app/Cache/DataCache.php#L80)的使用；  
⑨ `Blade` 模版继承、嵌套与[扩展](https://github.com/douyasi/yascmf/blob/master/app/Extensions/DouyasiBlade.php)等；  
⑩ 服务容器、自动注入等概念的了解；  
......

前端方面知识或技术要点：

① `Javascript` 模版引擎   [laytpl](http://sentsin.com/layui/laytpl/)  
② `Ajax` 与 `JSON`    
③  `jQuery` 响应事件及其使用  
④ `CKEditor` 网页编辑器   
⑤ `Bootstrap` 前端框架   
⑥ `JS` 弹窗组件 [Layer](http://sentsin.com/jquery/layer/)    
⑦ `CSS` 与 `JS` 静态资源的压缩与合并（使用 [minify](https://github.com/douyasi/yascmf/blob/master/app/functions.php#L76) ）  
......

[第三方文档参考](https://github.com/douyasi/yascmf/wiki/%E8%8A%BD%E4%B8%9D%E5%86%85%E5%AE%B9%E7%AE%A1%E7%90%86%E6%A1%86%E6%9E%B6%E9%83%A8%E5%88%86%E6%8A%80%E6%9C%AF%E6%96%87%E6%A1%A3%E5%8F%82%E8%80%83)


  [1]: http://douyasi.com/usr/uploads/2015/03/3488851921.jpg