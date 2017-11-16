# gammu-e2s
Package Laravel for Gammu(SMSD) through a Web interface that allows sending SMS via email.

![Dashboard](http://s16.radikal.ru/i190/1711/ce/5cdeb242ff4b.png "Dashboard")
All screenshots at the end of this manual

<i>Required: PHP + PHP-IMAP</i><br>
<i>Locale: EN,RU</i>

1) Install Gammu<br>
<code>sudo apt-get install gammu</code>

2) Install Gammu-SMSD<br>
<code>sudo apt-get install gammu-smsd</code>

3) Add setting SMSD<br>
<code>nano /etc/gammu-smsdrc</code><br>

4) Now adjust<br>
```code
[gammu]
port = /dev/ttyACM0
connection = at

[smsd]
service = sql
driver = native_mysql
host = localhost
logfile = /var/log/gammu-smsd

user = Your Name
password = Your Password

pc = localhost
database = Your Name DataBase

inboxpath = /var/spool/gammu/inbox/
outboxpath = /var/spool/gammu/outbox/
sentsmspath = /var/spool/gammu/sent/
errorsmspath = /var/spool/gammu/error/
```
5) Restart SMSD service<br>
<code>sudo systemctl restart gammu-smsd.service</code>

6) Install Laravel 5.5
<ul>
<li><code>composer create-project --prefer-dist laravel/laravel blog</code></li>
<li><code>php artisan serve</code></li>
<li><code>php artisan make:auth</code></li>
</ul>

7) Install Gammu-E2S<br>
<code>composer require dealaxer/gammu-e2s:dev-master</code>

8) Add Provider to config\app.php<br>
```php
Dealaxer\GammuE2S\GammuE2SProvider::class,
```

9) Publish a package<br>
<code>php artisan vendor:publish</code> or <code>php artisan vendor:publish --provider="Dealaxer/GammuE2S/GammuE2SProvider"</code>

10) Migrate Database<br>
<code>php artisan migrate</code>

11) Open access interface
<ul>
<li><code>chgrp -R www-data storage bootstrap/cache</code></li>
<li><code>chmod -R ug+rwx storage bootstrap/cache</code></li>
</ul>

12) You are now ready to use the Web interface!


**Screenshots of Web interface:**

![GammuE2S](http://s018.radikal.ru/i512/1711/37/c037be18f6ef.png "GammuE2S")

![GammuE2S](http://s41.radikal.ru/i094/1711/02/af1fdce591f1.png "GammuE2S")

![GammuE2S](http://s019.radikal.ru/i631/1711/4d/188f66ed819e.png "GammuE2S")

![GammuE2S](http://s012.radikal.ru/i320/1711/63/eb63e587491a.png "GammuE2S")

![GammuE2S](http://s008.radikal.ru/i303/1711/d7/9dee60f4eff8.png "GammuE2S")

![GammuE2S](http://s019.radikal.ru/i606/1711/2f/ec399b2e0abd.png "GammuE2S")

![GammuE2S](http://s41.radikal.ru/i091/1711/bb/58f79bebc0ca.png "GammuE2S")

![GammuE2S](http://s019.radikal.ru/i629/1711/f0/ebfea55f4f5d.png "GammuE2S")

![GammuE2S](http://s019.radikal.ru/i627/1711/1d/f0ef082b564d.png "GammuE2S")

![GammuE2S](http://s019.radikal.ru/i636/1711/ab/7407f93af231.png "GammuE2S")
