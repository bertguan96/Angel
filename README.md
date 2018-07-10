本套框架是基于PHP的个人博客，下面是对应的目录结构

1、application  //应用程序目录

    config  //配置文件目录
    
    controllers  //控制器目录
    
        admin  //后台控制器目录
        
        home  //前台控制器目录
        
    models  //数据库模型目录
   
    views  //视图目录
    
        admin
        
        home


2、framework  //框架目录

    core  //框架核心类
    
    databases  //数据库驱动类
    
    helpers  //辅助函数目录
    
    libraries  //类库目录
    

3、public  //前台静态资源目录

    css 
    
    images
    
    js
    
    uploads  //文件上传目录
    

4、index.php  //入口文件

新增controller解析器