# Git在开发中换行符相关配置

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [Windows](http://douyasi.com/category/win/) |
>| 链接： | http://douyasi.com/win/autocrlf_safecrlf.html |
>| 标签： | [git](http://douyasi.com/tag/git) [autocrlf](http://douyasi.com/tag/autocrlf) [safecrlf](http://douyasi.com/tag/safecrlf)  |
>| 发布日期： | 2015-04-02 |

## 不同操作系统下的换行符

不可显示的换行符在各操作系统中是不一样的：

```
CR回车 LF换行
Windows/Dos CRLF \r\n
Linux/Unix LF \n
MacOS CR \r
```

`Git` 默认是以 `LF \n` 作为换行符的，为了保证代码提交与拉取时一致，需要对 `Git` 相关 `autocrlf` 与 `safecrlf` 设置。

打开命令行，进行设置，如果你是在 `Windows` 下开发居多，建议设置 `autocrlf` 为 `true`。

```
git config --global core.autocrlf true
git config --global core.safecrlf warn
```

如果你的文件编码是 `UTF8` 并且包含中文文字，且需要多用户协作在不同平台环境下并行开发，那还是把 `autocrlf` 设置为 `false` ，并且把所有文件转换为 `Linux` 编码（即 `LF \n` ），并开启 `safecrlf` 检查。




请将编辑器或 `IDE` 设置换行符（档案格式）为 `LF \n`，`Sublime Text` 编辑器可以修改用户配置，添加下面代码：

```json
	"default_encoding": "UTF-8",
	"default_line_ending": "unix"
```

一些 `sublime` 技巧请参考：http://www.zhihu.com/question/19976788
然后使用 `Git` 推荐配置：

```bash
git config --global core.autocrlf false
git config --global core.safecrlf true
```

## `AutoCRLF` 设置

```bash
#提交时转换为LF，检出时转换为CRLF
git config --global core.autocrlf true   

#提交时转换为LF，检出时不转换
git config --global core.autocrlf input   

#提交检出均不转换
git config --global core.autocrlf false
```

## `SafeCRLF` 设置

```bash
#拒绝提交包含混合换行符的文件
git config --global core.safecrlf true   

#允许提交包含混合换行符的文件
git config --global core.safecrlf false   

#提交包含混合换行符的文件时给出警告
git config --global core.safecrlf warn
```