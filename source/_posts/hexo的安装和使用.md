---
title: hexo的安装和使用
categories: hexo
abbrlink: 17084
date: 2017-12-03 10:46:52
tags:
---

不得不说，hexo为我们提供了一个非常简单快捷的静态网站解决方式。而且它还支持文章分类的常用功能
hexo用的md的语法极大的方便了我们的写作
****
<!--more-->
### 安装hexo
hexo的安装在[官网]( https://hexo.io/docs/ )上已经有了明确的说明，这里就简单介绍一下。
``` bash
$ sudo apt install git
$ npm install nvm //这步之后要重启一下终端
$ nvm install stable
$ npm install -g hexo-cli
```

### 创建自己的网站目录
``` bash
$ mkdir www
$ cd www
$ hexo init
```

### 发表自己的第一篇blog
``` bash
$ hexo n "my-new-blog"
```
md文件在./source/_post/目录下，我们需要通过修改md文件来制作网页。
``` bash
$ hexo g
$ hexo s
```
通过在浏览器内访问http://localhost:4000/ ,我们能看到我们发表的第一篇blog和原始的hello-world

### 部署到git
``` bash
$ npm install hexo-deployer-git --save
```
修改站点的_config.yml配置文件

``` yml
deploy:
  type: git
  repo: {$你的仓库}
```
然后输入``` bash $ hexo d ```即可自动部署