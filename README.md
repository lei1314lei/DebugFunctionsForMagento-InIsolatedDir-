# DebugFunctionsForMagento-InIsolatedDir-

1：轻松开启调试模式  

2：用一种更加友好的方式添加调试代码（复制，然后直接编辑），且使用运行时替换的原则，从而不用担心将‘坏’代码引入项目导致项目难以维护  



兼容性：项目基于Magento企业版1.4开发  



使用方法：  

1：如果你只对“使用时替换”感兴趣，希望调试代码完全自主开发  
      1.1： 找到项目根目录下的.htaccess，将下面的配置追加到  RewriteRule .* index.php [L] 之后, 追加完的效果如下   

             RewriteRule .* index.php [L]  
             RewriteCond %{QUERY_STRING}  debug  
             RewriteRule .* MartinDebug/indexForDebug.php [L]  
    
     1.2：在您的项目根目录创建“MartinDebug”目录，并将本项目的"indexForDebug.php"和“Magento/app/Mage.php”拷贝到刚刚创建的“MartinDebug”目录下。  
     目录结构参考：  
       /RootOfYourProject  
             indexForDebug.php  
             /MartinDebug  
                  /app  
                      Mage.php  
             


2：如果你对本项目的调试功能感兴趣，完成步骤“1.1”之后，在您的项目根目录下创建“MartinDebug”，然后将本项目直接拷贝到“MartinDebug”下即可
