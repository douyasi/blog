# PHP sscanf() 函数

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [PHP](http://douyasi.com/category/php/) |
>| 链接： | http://douyasi.com/php/sscanf.html |
>| 标签： | [php](http://douyasi.com/tag/php)  |
>| 发布日期： | 2014-12-10 |

### 定义和用法

`sscanf()` 函数根据指定的格式解析来自一个字符串的输入。
如果只向该函数传递两个参数，数据将以数组的形式返回。否则，如果传递了额外的参数，那么被解析的数据会存储在这些参数中。如果区分符的数目大于包含它们的变量的数目，则会发生错误。不过，如果区分符少于变量，则额外的变量包含 NULL。

### 语法

```
sscanf(string,format,arg1,arg2,arg++)
参数	描述
string	必需。规定要读取的字符串。
format	必需。规定要使用的格式。
arg1	可选。存储数据的第一个变量。
arg2	可选。存储数据的第二个变量。
arg++	可选。存储数据的第三、四个变量。依此类推。
```



### 说明

```
参数 format 是转换的格式，以百分比符号 ("%") 开始到转换字符结束。下面的可能的 format 值：
%% - 返回百分比符号
%b - 二进制数
%c - 依照 ASCII 值的字符
%d - 带符号十进制数
%e - 可续计数法（比如 1.5e+3）
%u - 无符号十进制数
%f - 浮点数(local settings aware)
%F - 浮点数(not local settings aware)
%o - 八进制数
%s - 字符串
%x - 十六进制数（小写字母）
%X - 十六进制数（大写字母）
```

### 示例

```php
<?php
$string = "age:30 weight:60kg";
sscanf($string,"age:%d weight:%dkg",$age,$weight);
// show types and values
var_dump($age,$weight);
?>
```

输出：

```
int(30)
int(60)
```