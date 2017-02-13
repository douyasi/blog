# JSONPath的使用

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [Javascript](http://douyasi.com/category/javascript/) |
>| 链接： | http://douyasi.com/javascript/jsonpath.html |
>| 标签： | [jsonpath](http://douyasi.com/tag/jsonpath)  |
>| 发布日期： | 2015-02-02 |

某些情况下，我们需要查询`json`对象特定属性值下的结果，通过`JSONPath`可以很方便我们查询。

> 关于 `JsonPath` 的介绍，<http://goessner.net/articles/JsonPath/>，`JsonPath` 对于 `JSON` 来说相当于 `XPATH` 对于 `XML` 。这是一个简单的从文档中抽取指定信息的工具，提供多种语言实现版本，包括：`Javascript`, `Java`, `Python` 和 `PHP` 等。

这里我要演示的是 `javascript` 实现版本，使用的 `jsonpath` 类库来自 `GitHub` 上 [jQuery-JSONPath](https://github.com/wilhelm-murdoch/jQuery-JSONPath) ，注意该类库依赖于 `jQuery` 。




```html
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>JSONPath演示</title>
    <script type="text/javascript" src="jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="jsonpath.jquery.min.js"></script>
</head>
<body>
    <script type="text/javascript">
var json = {
  "store": {
    "book": [
      { "category": "reference",
        "author": "Nigel Rees",
        "title": "Sayings of the Century",
        "price": 8.95
      },
      { "category": "fiction",
        "author": "Evelyn Waugh",
        "title": "Sword of Honour",
        "price": 12.99
      },
      { "category": "fiction",
        "author": "Herman Melville",
        "title": "Moby Dick",
        "isbn": "0-553-21311-3",
        "price": 8.99
      },
      { "category": "fiction",
        "author": "J. R. R. Tolkien",
        "title": "The Lord of the Rings",
        "isbn": "0-395-19395-8",
        "price": 22.99
      }
    ],
    "bicycle": {
      "color": "red",
      "price": 19.95
    }
  }
}

var path = $.JSONPath({data: json, keepHistory: false});
var authors = path.query('$.store.book[*].author');  // returns all authors
var cheapier_books = path.query('$..book[?(@.price<10)]');  // filter all books cheapier than 10 
var isbn_books = path.query('$..book[?(@.isbn)]');  // filter all books with isbn number
var reference_books = path.query('$..book[?(@.category == "reference")]');  // filter 'reference' books
console.log(authors);
console.log(cheapier_books);
console.log(isbn_books);
console.log(reference_books);
    </script>
</body>
</html>
```