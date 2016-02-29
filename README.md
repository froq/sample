### Virtual Froq

```
# Apache
<VirtualHost *:80>
   ServerName froq.local
   DocumentRoot /var/www/froq/pub
   <Directory /var/www/froq/pub>
      Options +FollowSymLinks
      Require all granted

      RewriteEngine On
      RewriteBase /
      RewriteCond %{REQUEST_FILENAME} !-f
      RewriteCond %{REQUEST_FILENAME} !-l
      RewriteCond %{REQUEST_FILENAME} !-d
      RewriteRule . index.php [L]
   </Directory>
</VirtualHost>
```

### Install Service

```
~$ cd /var/www/froq && git clone git@github.com:froq/service.git . && composer install
```

### Import Mock Database

Source file: `.mock/book.sql`.

### Test Mock (Book) Service

```
# request
~$ curl -i -XGET froq.local/book/1

# response
HTTP/1.1 200 OK
...
Content-Type: application/json; charset=utf-8
Content-Length: 48
X-Load-Time: 0.0209240913

{"id":1,"name":"PHP in Action","price":16.55}
```
