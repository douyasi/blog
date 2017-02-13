# Autohotkey相关资源

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [Autohotkey](http://douyasi.com/category/ahk/) |
>| 链接： | http://douyasi.com/ahk/autohotkey.html |
>| 标签： | [autohotkey](http://douyasi.com/tag/autohotkey) [ahkscript](http://douyasi.com/tag/ahkscript)  |
>| 发布日期： | 2015-10-17 |

`Autohotkey` 官网下载速度较慢，此文列出 `Autohotkey` 相关资源镜像下载地址。

>    
[http://ystatic.cn/ahk][1]

`Autohotkey` 在使用正则处理文档、机械化操作方面具有很大优势。这里放出我使用正则来处理离线网页文档并从中抓取信息生成特定 `sql` 语句的示例。



```ahk
/*
脚本名称：	ibt
脚本编码：	UTF-8(with BOM)
脚本说明：	处理文档数据
脚本版本：	v1.0
脚本作者：	飞扬网络工作室 (fysoft)
作者官网：	http://raoyc.com/fysoft/
交流Q群：	260655062
运行环境：	Windows 10(64bit) + AutoHotkey(L) v1.1.22.07，其它相异于此运行环境的，请自行测试脚本兼容性问题
版权申明：	仅供学习与演示
备注信息：	暂无
*/

#NoEnv  ; Recommended for performance and compatibility with future AutoHotkey releases.
; #Warn  ; Enable warnings to assist with detecting common errors.
SendMode Input  ; Recommended for new scripts due to its superior speed and reliability.
SetWorkingDir %A_ScriptDir%  ; Ensures a consistent starting directory.

n := 1
Loop, Files, %A_ScriptDir%\html\*.html
{
	Filepath = %A_LoopFileFullPath%
	Filename = %A_LoopFileName%
	slug := RTrim(Filename, ".html")
	;MsgBox, %slug%
	FileRead, html, *P65001 %Filepath%
	;MsgBox, %html%
	RegExMatch(html, "imsS)<blockquote>(.*)</blockquote>", _c)
	RegExMatch(html, "imsS)<ul type=circle>(.*)</ul>", _w)
	StringReplace, _c, _c, `r`n, \r\n, All
	StringReplace, _c, _c, `t, %A_SPACE%%A_SPACE%%A_SPACE%%A_SPACE%, All
	StringReplace, _c, _c, ', \', All
	StringReplace, _w, _w, `r`n, \r\n, All
	StringReplace, _w, _w, `t, %A_SPACE%%A_SPACE%%A_SPACE%%A_SPACE%, All
	StringReplace, _w, _w, ', \', All
	StringReplace, _w, _w, `", \", All
	;MsgBox, %_w%
tplt = 
(
INSERT INTO ``ibt_unit`` VALUES ('#no', '#slug', '#slug', 'Unit #slug', '#contents', '#words', '#time', '#time');

)
	StringReplace, _str, tplt, #no, %n%, All
	StringReplace, _str, _str, #slug, %slug%, All
	StringReplace, _str, _str, #contents, %_c%, All
	StringReplace, _str, _str, #words, %_w%, All
	now_time = %A_YYYY%-%A_MM%-%A_DD%%A_Space%%A_Hour%:%A_Min%:%A_Sec%
	StringReplace, _str, _str, #time, %now_time%, All
	;MsgBox, %_str%
	FileAppend, %_str%, sql.txt, UTF-8
	n++
}
```


  [1]: http://ystatic.cn/ahk