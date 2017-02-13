# 判断Laravel Eloquent获取数据结果集是否为空

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [Laravel](http://douyasi.com/category/laravel/) |
>| 链接： | http://douyasi.com/laravel/eloquent_collection_detect_empty.html |
>| 标签： | [laravel](http://douyasi.com/tag/laravel) [orm](http://douyasi.com/tag/orm) [eloquent](http://douyasi.com/tag/eloquent)  |
>| 发布日期： | 2015-01-28 |

在使用 `Laravel Eloquent` 模型时，我们可能要判断取出的结果集是否为空，但我们发现直接使用 `is_null` 或 `empty` 是无法判段它结果集是否为空的。

`var_dump` 之后我们很容易发现，即使取到的空结果集， `Eloquent` 仍然会返回 `Illuminate\Database\Eloquent\Collection` 对象实例。
其实，`Eloquent` 已经给我们封装几个判断方法。

```php
$result = Model::where(...)->get();
//不为空则
if ($result->first()) { } 
if (!$result->isEmpty()) { }
if ($result->count()) { }
```

参考网站：http://stackoverflow.com/questions/20563166/eloquent-collection-counting-and-detect-empty