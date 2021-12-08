# PHP敏捷框架设计

-------------------

[PHP | 敏捷开发 | 框架] 

**PHP**：是除了JAVA，python和javascript之外，我比较喜欢的一门语言了。我一直有设计一款框架的想法，就在我完成这学期课设之后我就打算开始了我的设计了。
####  主要模块
>- **数据库层次** ：数据库封装了常用SQL语句在，封装了查询器（用于执行字写书写的SQL语句），XML解析器（用于解析XML文件中的SQL语句，再注入进入方法）；
>- **常用工具层次** ：提供字符串转换工具，时间转换工具，通用XML解析工具，待新增更多工具
>- **热门依赖整合** ：整合PHP热门依赖。
>- **前端** ：采用主流前端框架vue设计搭建，整合通用组件。

-------------------

##### ChangeLog
>- **v1.0** ：完成框架的数据库操作部分
>- **v1.1** ：新增时间转换工具，字符串转换工具
>- **v1.2** ：SQLXMLUtil xml解析工具完成（暂时不提供使用）
>- **v1.3** ：新增登陆后台代码（逻辑处理未实现）
>- **v1.4** ：删除普通的html代码，转入用php代码嵌入方式开发，同时新增百度API接口
>- **v1.5** ：新增一个通用sql查询接口(baseExcuteQuery)，删除原来写的基于angular的html的demo
-------------------

##### 反馈与建议
- github：[@个人主页](https://github.com/1163236754)
- 邮箱：<1163236754@qq.com>
