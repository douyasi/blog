# GHOST CVE-2015-0235漏洞及紧急修复方法

>|  属性  |  值  |
>| ----- | ----- |
>| 分类： | [Linux](http://douyasi.com/category/linux/) |
>| 链接： | http://douyasi.com/linux/ghost.html |
>| 标签： | [linux](http://douyasi.com/tag/linux) [ghost](http://douyasi.com/tag/ghost)  |
>| 发布日期： | 2015-01-30 |

### 关于该漏洞

安全研究人员近日曝出一个名为幽灵（GHOST）的严重安全漏洞，这个漏洞可以允许攻击者远程获取操作系统的最高控制权限，影响市面上大量Linux操作系统及其发行版。该漏洞CVE编号为CVE-2015-0235。

### 什么是glibc

`glibc` 是 `GNU` 发布的 `libc` 库，即c运行库。`glibc` 是 `linux` 系统中最底层的api，几乎其它任何运行库都会依赖于`glibc` 。`glibc` 除了封装 `linux` 操作系统所提供的系统服务外，它本身也提供了许多其它一些必要功能服务的实现。`glibc` 囊括了几乎所有的 `UNIX` 通行的标准。

### 漏洞概述

代码审计公司 *Qualys* 的研究人员在 `glibc` 库中的 `__nss_hostname_digits_dots()` 函数中发现了一个缓冲区溢出的漏洞，这个 bug 可以经过 `gethostbyname*()` 函数被本地或者远程的触发。

应用程序主要使用 `gethostbyname*()` 函数发起 `DNS` 请求，这个函数会将主机名称转换为ip地址。

### 影响范围

该漏洞影响 `glibc` 库版本 2.2-2.17 的 `Linux`操作系统

操作系统类型包括 `CentOS 6 & 7`、 `Debian 7`、 `Red Hat Enterprise Linux 6 & 7` 与 `Ubuntu 10.04 & 12.04` 各 `Linux` 发行版。




### 漏洞测试

将以下代码文件保存为文件，文件名为GHOST.c（注意严格区分字母大小写）。

```c
#include <netdb.h> 
#include <stdio.h> 
#include <stdlib.h> 
#include <string.h> 
#include <errno.h> 
   
#define CANARY "in_the_coal_mine"  
   
struct {  
char buffer[1024];  
char canary[sizeof(CANARY)];  
} temp = { "buffer", CANARY };  
   
int main(void) {  
struct hostent resbuf;  
struct hostent *result;  
int herrno;  
int retval;  
   
  /*** strlen (name) = size_needed - sizeof (*host_addr) - sizeof (*h_addr_ptrs) - 1; ***/  
size_t len = sizeof(temp.buffer) - 16*sizeof(unsigned char) - 2*sizeof(char *) - 1;  
char name[sizeof(temp.buffer)];  
memset(name, '0', len);  
name[len] = '\0';  
   
retval = gethostbyname_r(name, &resbuf, temp.buffer, sizeof(temp.buffer), &result, &herrno);  
   
if (strcmp(temp.canary, CANARY) != 0) {  
    puts("vulnerable");  
exit(EXIT_SUCCESS);  
}  
if (retval == ERANGE) {  
    puts("not vulnerable");  
exit(EXIT_SUCCESS);  
}  
  puts("should not happen");  
exit(EXIT_FAILURE);  
} 
```

执行以下命令，检测是否存在漏洞。

```shell
gcc GHOST.c -o GHOST
./GHOST
```

如果输出 `vulnerable` 表明存在漏洞。

### 修复方案

执行 `glibc` 升级命令。

`RedHat`、 `Fedora`、 `CentOS` 系统：

```shell
yum install glibc && reboot
```

`Debian`、 `Ubuntu` 系统：

```shell
apt-get clean && apt-get update && apt-get upgrade
```