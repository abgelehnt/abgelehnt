---
title: 更改apache2站点目录
categories: Linux
abbrlink: 17047
date: 2017-07-29 19:30:23
tags:
---
一般apache2的站点目录都是在/var/www目录下，但是很多时候我们会更想把站点目录放在用户目录下，这样可以更好的把用户间分隔开。

更改主配置文件中的配置
``` bash
$ sudo vi /etc/apache2/apache2.conf
```
找到/var/www/html并更改为/home/
大概在第165行的样子
``` bash
<Directory /home/>
	Options Indexes FollowSymLinks
	AllowOverride None
	Require all granted
</Directory>
```

接着是http的配置文件
``` bash
$ sudo vi /etc/apache2/sites-available/000-default.conf
```
找到DocumentRoot后的/var/www/html，改成/home/chi
 
让apache2重新加载一下配置文件
``` bash
$ sudo service apache2 reload
```
 
网站打不开
因为我们没有权限读取网站文件
``` bash
$ chmod 701 /home/chi/www/
```

网站能打开了
