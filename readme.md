

## 文字游戏

###导入mysl表 gameapp.msql

配置

apache   apache2.4.18\conf\extra\httpd-vhosts.conf

C:\Windows\System32\drivers\etc

127.0.0.1       www.gameworld.com

        <VirtualHost *:80>
            ServerName www.gameworld.com
            DocumentRoot D:/wamp/wamp64/www/gameapp
            <Directory  "D:/wamp/wamp64/www/gameapp/">
                Options +Indexes +FollowSymLinks +MultiViews
                AllowOverride All
                Require local
            </Directory>
        </VirtualHost>
        
