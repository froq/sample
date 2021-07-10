Notice: All Froq! files / modules dependent on [Composer](https://getcomposer.org/).

### Install Sample

```bash
~$ mkdir -p /to/the/froq-project ; cd /to/the/froq-project \
   ; git clone git@github.com:froq/sample.git . \
   ; rm -rf ./.git/ ./LICENSE ./README.md \
   ; composer install
```

### Local Test
```bash
# as current user
~$ php -S localhost:8080 bin/server.php
# or with public (static) directory
~$ php -S localhost:8080 -t pub/ bin/server.php

# as another user
~$ sudo -u www-data php -S localhost:8080 bin/server.php
# or with public (static) directory
~$ sudo -u www-data php -S localhost:8080 -t pub/ bin/server.php
```

### Virtual Host

```
# Apache
<VirtualHost *:80>
  ServerName froq-project.local
  DocumentRoot /to/the/froq-project/pub
  <Directory /to/the/froq-project/pub>
    Options +FollowSymLinks
    AllowOverride All
    Require all granted
  </Directory>
</VirtualHost>

# Nginx
server {
  index index.php;
  server_name froq-project.local;
  root /to/the/froq-project/pub;
  location / {
    try_files $uri $uri/ /index.php?$args;
  }
  # ... rest of config stuff
}
```

And add following line to `/etc/hosts` file.

```
127.0.0.100 froq-project.local
```

And just open http://froq-project.local link.
