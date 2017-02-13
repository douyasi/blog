# 实现CKEDITOR图像浏览与上传

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [PHP](http://douyasi.com/category/php/) |
>| 链接： | http://douyasi.com/php/ckeditor_img_browse_upload.html |
>| 标签： | [ckeditor](http://douyasi.com/tag/ckeditor)  |
>| 发布日期： | 2014-10-18 |

`CKEditor` 编辑器一款不错的互联网在线编辑器，但其图像上传功能，这里提供2个官方插件实现 `CKEditor` 的图像浏览与上传功能。

## Image Browse

http://ckeditor.com/addon/imgbrowse

## Image Uploader

http://ckeditor.com/addon/imgupload

下载之后，将他们放到 `ckeditor` 的 `plugins` 目录下，注意各自配置下他们文件路径。

配置 `imgupload` 的图片上传路径：

```php
$upload_dir = '/uploads/images/';
```

配置 `imgbrowse` 的图片浏览路径：

```php
protected $root = '/uploads/images/';
```

完成之后，再配置一下 `ckeditor` 的 `config.js`，位于 `/ckeditor/config.js` 文件中：

```javascript
CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.image_previewText=' ';
	config.filebrowserImageUploadUrl = "/assets/lib/ckeditor/plugins/imgupload/imgupload.php"; 
	config.filebrowserBrowseUrl = "/assets/lib/ckeditor/plugins/imgbrowse/imgbrowse.html?imgroot=/uploads/images/";
};
```