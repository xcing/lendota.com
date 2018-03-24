README

Setting Up Your VHOST
=====================

The following is a sample VHOST you might want to consider for your project.

<VirtualHost *:80>
   DocumentRoot "C:/Workspace/Benz/PHP/7Dot/7Dot/public"
   ServerName .local

   # This should be omitted in the production environment
   SetEnv APPLICATION_ENV development
    
   <Directory "C:/Workspace/Benz/PHP/7Dot/7Dot/public">
       Options Indexes MultiViews FollowSymLinks
       AllowOverride All
       Order allow,deny
       Allow from all
   </Directory>
    
</VirtualHost>


===========
การขึ้น host ทีเป็น linux ต้องเพิ่ม write permission ของ directory ต่อไปนี้
- /application/logs
- /public/upload/replay
- /public/images/logoTeam

