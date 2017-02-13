# MySQL join用法小结

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [MySQL](http://douyasi.com/category/mysql/) |
>| 链接： | http://douyasi.com/mysql/mysql_jion.html |
>| 标签： | [mysql](http://douyasi.com/tag/mysql)  |
>| 发布日期： | 2014-12-26 |

>    本文参阅了：http://www.5idev.com/p-php_mysql_inner_join.shtml

### MySQL JOIN 语法概述

`SQL(MySQL) JOIN` 用于根据两个或多个表中的字段之间的关系，从这些表中得到数据。

`JOIN` 通常与 `ON` 关键字搭配使用，基本语法如下：

```sql
... FROM table1 INNER|LEFT|RIGHT JOIN table2 ON condition
```

`table1` 通常称为左表，`table2` 称为右表。`ON` 关键字用于设定匹配条件，用于限定在结果集合中想要哪些行。如果需要指定其他条件，后面可以加上 `WHERE` 条件 或者 `LIMIT` 以限制记录返回数目等。

### MySQL JOIN 分类

`JOIN` 按照功能大致分为如下三类：

`INNER JOIN`（内连接）：取得两个表中存在连接匹配关系的记录。
`LEFT JOIN`（左连接）：取得左表（`table1`）完全记录，即使右表（`table2`）并无对应匹配记录。
`RIGHT JOIN`（右连接）：与 `LEFT JOIN` 相反，即使右表（`table2`）完全记录，即是左表（`table1`）并无匹配对应记录。





### Typecho Join查询示例

感兴趣的话，可以下载安装`typecho`，分析分析下它的数据库表。

![20141226222339.jpg][1]

`typecho` 只有7张表，7张表就已容纳常规 `cms` 所有必要内容，如附件、文章、评论、配置、分类、标签与用户等。
如果之简，注定其表关联度要复杂多了。

下面简单写几个查询功能语句。

**1.**查询分类名为 '默认分类'下的文章总数

```sql
SELECT 
COUNT(meta.mid)
FROM
	typecho_metas AS meta
JOIN typecho_relationships AS relationship ON relationship.mid = meta.mid
WHERE
	meta.`type` = 'category'
AND meta.`name` = '默认分类'

```

**2.**查询2014年12月发布的所有文章（`post`）

```sql
SELECT
typecho_contents.*
FROM
typecho_contents
WHERE
typecho_contents.type = 'post' AND
typecho_contents.created >= UNIX_TIMESTAMP('2014-12-01 00:00:00') AND
typecho_contents.created <= UNIX_TIMESTAMP('2014-12-31 23:59:59')
```

3.查询标签为'Laravel'的所有文章

```sql
SELECT
	c.*,m.`name`
FROM
	typecho_contents AS c
JOIN typecho_relationships AS r ON c.cid = r.cid
JOIN typecho_metas AS m ON m.mid = r.mid
WHERE
	m.type = 'tag'
AND m.`name` = 'laravel'
```

  [1]: http://douyasi.com/usr/uploads/2014/12/484210490.jpg