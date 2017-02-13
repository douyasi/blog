# linux cron计划任务

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [Linux](http://douyasi.com/category/linux/) |
>| 链接： | http://douyasi.com/linux/linux_cron.html |
>| 标签： | [cron](http://douyasi.com/tag/cron)  |
>| 发布日期： | 2014-09-26 |

```bash
$select-editor
export EDITOR=vim 
$crontab -e
    
* * * * *                  # 每隔一分钟执行一次任务   
0 * * * *                  # 每小时的0点执行一次任务，比如6:00，10:00   
6,10 * 2 * *            # 每个月2号，每小时的6分和10分执行一次任务  
*/3,*/5 * * * *          # 每隔3分钟或5分钟执行一次任务，比如10:03，10:05，10:06
```

