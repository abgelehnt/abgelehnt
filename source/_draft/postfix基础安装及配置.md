---
title: postfix基础安装及配置
date: 2017-12-29 02:22:47
tags:
categories: [Linux, Postfix]
---

postfix是一个较为主流的邮箱服务器，其配置方式和sendmail比较为简单，所以对于新手建站而免费服务不能满足要求的人来说，是一个不错的选择。

### 安装postfix
``` bash
apt install postfix
```

### 配置postfix
postfix的配置文件主要有main.cf和master.cf两个，对于新手来说master.cf里的默认配置已经满足绝大多数收发邮件的需要，所以可以不用管他
我们现在认为邮箱服务器是mail.abgelehnt.tk，而发出去的邮件

接着打开main.cf

``` myorigin = $mydomain ```


myhostname = mail.abgelehnt.tk

smtpd_banner = $myhostname ESMTP $mail_name (Ubuntu)
biff = no

append_dot_mydomain = no



readme_directory = no


mynetworks = 127.0.0.1 [::ffff:127.0.0.0]/104 [::1]/128 202.5.17.39 [2602:ffc5:60::1:b3af]
mynetworks_style = host
inet_interfaces = all
inet_protocols = all
mydestination = $myhostname, $mydomain, localhost, localhost.$mydomain

