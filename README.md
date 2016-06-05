### Virtual Froq

```
# Apache
<VirtualHost *:80>
  ServerName froq.local
  DocumentRoot /var/www/.dev/froq/pub
  <Directory /var/www/.dev/froq/pub>
    Options +FollowSymLinks
    AllowOverride All
    Require all granted
  </Directory>
</VirtualHost>
```

### Install Skeleton

```
~$ mkdir -p /var/www/froq \
   && cd /var/www/froq \
   && git clone git@github.com:froq/froq-skeleton.git . \
   && composer install
```
