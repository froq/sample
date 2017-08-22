Notice: All Froq! files / modules dependent on [Composer](https://getcomposer.org/).

### Install Skeleton

```bash
~$ mkdir -p /var/www/froq && cd /var/www/froq \
   && git clone git@github.com:froq/skeleton.git . \
   && composer install
```

### Local Test
```bash
# as current user
~$ php -S localhost:8080 bin/server.php

# as another user
~$ sudo -u www-data php -S localhost:8080 bin/server.php
```

### Virtual Host

```
# Apache
<VirtualHost *:80>
  ServerName froq.local
  DocumentRoot /var/www/froq/pub
  <Directory /var/www/froq/pub>
    Options +FollowSymLinks
    AllowOverride All
    Require all granted
  </Directory>
</VirtualHost>

# Nginx
server {
  index index.php;
  server_name froq.local;
  root /var/www/froq/pub;
  location / {
    try_files $uri $uri/ /index.php?$args;
  }
  # ... rest of config stuff
}
```

And add following line to `/etc/hosts` file.

```
127.0.0.100 froq.local
```

And just open http://froq.local link.
