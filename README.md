# illi
A 二次元式 Typecho theme

[主题预览链接](http://icry.info/)

Usage

主题命名illi扔到themes文件夹下，然后到后台启用.
提供 '归档，友联，留言板'均为独立页面模板，自行切换

#### 介绍

 - 喵
 - 简约风格（不要因为图片就觉得花里胡哨的，不喜欢可以关闭缩略图或者自行替换图片）  
 - 全站pjax支持（可能有点生硬，后续加入动画改善）
 - 不如下载试试吧
 - 咕咕咕

#### 添加友链的方法
 

> 新建独立页面，选择 ‘友链模板’ 然后编辑内容 插入以下代码
(!!!为typecho输出html的方法!!! [ html代码 ] !!!)
> 
      <a class="linkCard" href="指向连接">
        <div class="linkIcon" style="background-image: url('头像连接')"></div>
          <div class="linkData">
             <h3>友联名称</h3>
             <p>描述</p>
          </div>
      </a>
