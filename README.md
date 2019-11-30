# Royal-Jewellery-Store

## 更新日志 2019/10/28 by Yao
### 1.借鉴SWAROVSKI重新写了一个 设计了icon和名字 整个网站的基调为金、白、黑
### 2.home page
   - ***pre-header***
   - ***header***
      ```diff
      + 已完成功能：可以drop down显示Cart, drop down显示Search       
      - 未完成功能: Cart单独页面，Log in（account）页面，Search功能
      ```
   - ***Main menu***
      ```diff
      + 已完成功能：home page, products page, Contact page, About us可以drop down
      - 未完成功能：About us的四个单独子页面
      ```
   - ***slider***
   - ***Product items***
      ```diff
      + 已完成功能：缩放        
      - 未完成功能：add wishlist，add cart, 商品单独显示页面
      ```
   - ***Footer***
### 3.Products

   ```diff
   + 已完成功能：页面布局
   - 未完成功能：sort by, 翻页
   ```    
### 4.Contact us
   ```diff
   + 已完成功能：页面布局
   - 未完成功能：邮件发送功能
   ```
### NEED TO DO（粗略） 
   - 页面：Cart单独页面, login(account)页面, About Us四个子页面，product single page, Checkout, Chat page
   - 功能：view cart, checkout ,login(account)相关功能，change language, add wishlist, add cart， sort by, update
   <br><br><br><br>
   
## 更新日志 2019/10/28 by ZZH
   ### 1 Login page
   做了login 的php界面。删去了冗余文件。并且连接了index.html 和 login.php
   
   <br><br><br><br>
   
## 更新日志 2019/10/31 by Yao
   
   ### 1 添加商品单独页面product-single page
   ```diff
   +上传product-single.html及多个相关css和js文件 建议使用前重新下载整体更新项目文件
   +已完成功能：single product page 实现zoom， slide等功能
   -未完成功能：图片及产品信息为死数据， related product的zoom有bug
   ```
   <br><br><br>
   
## 更新日志 2019/11/1 by Yao
   
   ### 1 添加页面FAQ page, About us page， Developer等
   ```diff
   +上传多个.html文件 建议使用前重新下载整体更新项目文件
   ```
<br><br><br><br>
## 更新日志 2019/11/10 by xxmscat
   
   ### 1 Cart page
  
## 更新日志 2019/11/27 by zzh
数据库已经搭建好了，大家直接导入那个mysql同步文件夹的文件就ok了。
然后登陆注册功能彻底弄好了，优化了js和php之间的数据交流方式，用json。
然后创建了head.html footer.html 模块复用，不需要每次都写一大堆。


## 更新日志 2019/11/30 by Yao
上传product.sql、product_image.sql、product_cate.sql<br>
product_image的url地址是相对地址 使用时按需修改
