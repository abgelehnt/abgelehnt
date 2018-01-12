---
title: putty密钥远程连接linux系统
categories: Linux
time: 13215640
abbrlink: 24587
date: 2017-08-26 17:30:22
tags:
---

有的时候我们需要通过win远程连接linux的服务器，而桌面链接的等待时间又过长，所以用ssh进行远程连接就是一个不错的选择。

首先服务器下载ssh
``` bash
apt install openssh-server
```

在win平台上下载putty

安装并打开putty，输入ip地址后点击右下方的open就可以用了。

输入ip后在Saved Sessions后输入一个场景名，点击Save，方便以后使用。

但是，每次都输入用户名和密码太过于麻烦，putty是支持用密钥连接的，我们可以利用一下。

Data中设置自动登入的用户名

用puttygen生成一个密钥
如果是puttygen直接导出公钥的话需要把公钥处理一下，删除头部和尾部并把公钥处理成一行，在头部增加ssh-rsa
然后公钥拷贝到服务器中的~/.ssh/authorized_keys文件中去。
没有的话新建一个，把权限该成600

putty里connection->ssh->auth->private key file for auth添加密钥

成功
