# webhook实现git代码自动部署

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [PHP](http://douyasi.com/category/php/) |
>| 链接： | http://douyasi.com/php/webhook.html |
>| 标签： | [webhook](http://douyasi.com/tag/webhook)  |
>| 发布日期： | 2015-11-04 |

偷些懒吧，如果参考以下博文能成功部署的，后面就不用看了。

[利用WebHook实现PHP自动部署Git代码][1]

[使用PHP脚本远程部署git项目][2]

如果自动部署失败，请检查以下情况：

* `git ssh` 密钥是否正确
* `hook` 文件是否能从外网地址访问到，是否有可执行权限
* `php.ini` 配置文件中是否禁用 `shell_exec` 方法（查找 `disable_functions` 关键词）
* 绑定的 `web` 目录所属的用户及组是否与 `git` 执行命令时所使用的用户组一致



`php hook` 文件参考示例：

```php
<?php
    error_reporting(1);

    $target = '/home/wwwroot/example.com';
    $token = 'coding_example';

    $json = json_decode(file_get_contents('php://input'), true);

    if (empty($json['token']) || $json['token'] !== $token) {
        exit('error request');
    }

    //$output = shell_exec("sudo -Hu www cd $target && git pull");
    $output = shell_exec("cd $target && git pull");

    //echo '<pre>'.$output.'</pre>';
```


  [1]: http://m.aoh.cc/149.html
  [2]: http://overtrue.me/articles/2015/01/how-to-deploy-project-with-git-hook.html