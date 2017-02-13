# PHP可选参数与可变参数

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [PHP](http://douyasi.com/category/php/) |
>| 链接： | http://douyasi.com/php/parameters.html |
>| 标签： | none |
>| 发布日期： | 2015-03-19 |

>    参考文档：http://php.net/manual/zh/functions.arguments.php

### 可选参数函数

我们尝试计算3个或2个数字之和，可以使用下面示例代码：

```php
function sum($a, $b, $c = 0){
    return $a + $b + $c;
}
echo sum(1, 2);  //计算1+2=3
echo sum(1, 2, 3);  //计算1+2+3=6
```

其中，`sum(1, 2)`只传入 2 个变量 $a 与 $b ，第三个变量 $c 是可选的，因为它存在默认值 0 。



### 可变参数

我们试想一下，如果我想计算多个数字之和，不一定是 2 个、3 个 或 4个，那如何实现呢？你可以传入一个数组作为参数，但是不够清晰直观。

```php
function sum($params){
    $total = 0;
    foreach ($params as $i){
        $total += $i;
    }
    return $total;
}
$array = [1,3,5,7,9];
echo sum($array);  //计算1+3+5+7+9=25
```

实际上我们还可以使用可变参数，可变参数是指传入的参数个数不限定，`php` 有些内置函数就是这种，如 `var_dump()`。下面，我们用可变参数来实现计算和功能：

```php
function sum(){
    $total = 0;
    //使用func_get_args()来获取当前函数的所有实际传递参数，返回值为array类型
    $varArray = func_get_args();
    foreach ($varArray as $var){
        $total += $var;
    }
    return $total;
}
echo sum(1, 3, 5);  //计算1+3+5=9
echo sum(1, 2);  //计算1+2=3
echo sum(1, 2, 3, 4);  //计算1+2+3+4=10
```