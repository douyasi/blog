# Sublime Text 2编辑器配置与插件

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [Windows](http://douyasi.com/category/win/) |
>| 链接： | http://douyasi.com/win/about_sublime_text2.html |
>| 标签： | [sublime](http://douyasi.com/tag/sublime) [配置](http://douyasi.com/tag/config) [插件](http://douyasi.com/tag/plugin)  |
>| 发布日期： | 2014-09-27 |

`Sublime Text` 是一个轻量、简洁、高效、跨平台的编辑器，方便的配色以及兼容vim快捷键等各种优点博得了很多开发人员的喜爱。

下面列出本人的 `Sublime Text 2` 编辑器配置（适用于 `Sublime Text 2/3` 系列请自行测试）。  



```json
{
	"auto_indent": true,    
	"default_encoding": "UTF-8",
	"detect_indentation": true,
	"draw_indent_guides": true,
	"draw_white_space": "all",
	"ensure_newline_at_eof_on_save": true,
	"font_face": "YaHei Consolas Hybrid",
	"font_size": 12, 
	"highlight_line": true,
	"ignored_packages":
	[
		"Vintage",
		"BracketHighlighter"
	],
	"indent_guide_options": 
        [
            "draw_active"
        ],
	"tab_completion": true,
	"tab_size": 4,
	"translate_tabs_to_spaces": false,
	"trim_trailing_white_space_on_save": false,
	"word_wrap": "auto",
	"wrap_width": 100
}
```

这里特别指出一些配置项：

`detect_indentation` 表示是否自动侦测缩进格式（如TAB缩进、空格缩进等）。 
    
`draw_white_space` 表示是否显示不可见字符（如换行符，TAB符，空格符等），本人比较追求代码缩进的工整型，故设置为 `all` 显示，可选还有 `selection`（只显示选中状态下的点和线）或 `none`（始终不显示）。    

`ensure_newline_at_eof_on_save` 表示是否保证文件结尾在新一行。

`tab_size` 值表示一个TAB缩进所对应的空格数，一般设置为4。

`trim_trailing_white_space_on_save` 表示是否移除每行行尾空白符，一般设置为 `false`。

`word_wrap`表示自动换行，`wrap_width`值表示自动换行的宽度，这个具体可以根据显示器屏幕宽度来设置。
    
下面列出本人 `Sublime Text 2` 编辑器常用插件，`Sublime` 插件安装方法见 [这里](https://sublime.wbond.net/installation) 。`OSChina` 推荐一些插件，可以点击 [此处](http://www.oschina.net/translate/20-powerful-sublimetext-plugins) 查看。


    Emmet
    Alignment
    DocBlockr
    ConvertToUTF8
    GBK Encoding Support
    HexViewer
    IMESupport
    Laravel Blade Highlighter
    FileDiffs
    SFTP
    SublimeCodeIntel
    CTags
    CTags for PHP
    BracketHighlighter
    SublimeLinter


这里指出一些插件功用：    

- `Emmet` 快捷写HTML代码的神器，不解释。
- `ConvertToUTF8` 与 `GBK Encoding Support` 编码转换与支持相关。    
- `IMESupport` 解决 `Sublime` 与东亚文字输入法候选字不兼容冲突问题。    
- `SFTP` 通过 `SFTP` 通道直接编辑远端服务器文件。    
- `SublimeCodeIntel` 提供 `HTML`、 `JavaScript` 相关标签上下文提示功能。   
- `CTags` 以及 `CTags for PHP` 则提供对其它语言（如 `PHP`， `C`等） 代码函数分析查找功能。    