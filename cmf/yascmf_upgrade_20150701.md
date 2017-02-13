# 更新YASCMF，新增文章推荐位，模板服务注入

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [CMF](http://douyasi.com/category/cmf/) |
>| 链接： | http://douyasi.com/cmf/yascmf_upgrade_20150701.html |
>| 标签： | [yascmf](http://douyasi.com/tag/yascmf)  |
>| 发布日期： | 2015-07-01 |

### 2015-07-01

**`YASCMF` 更新日志**

`Github` 开启 `tag releases` ，发布 YASCMF `v5.1.0` 版

* 增加文章推荐位( `flags` )，数据库结构有变动，多出 `yascmf_flags` 表，请重新导入 `yascmf_app.sql`，有二开的请自行比较数据变化，手动升级迁移；

![20150622113009.jpg][1]

* 增加 `ArticleService` 类，并将内容相关的 SLUG 链接生成方法放置于此，模板中使用 `@inject` （`Laravel 5.1 LTS` 新增功能）服务注入，注意本版前台模板（位于 `/resource/front` 目录）文件有较大变化，可查询对比 `commit` 记录；
* 其他一些bug修复，增加自定义扩展标签等。

  [1]: http://douyasi.com/usr/uploads/2015/07/821240977.jpg