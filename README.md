🗃️ **UDC Server: Step-by-Step Installation & Configuration Guide**

📖 **Project Overview**
The User Data Collector (UDC) is a PHP-based web application for securely collecting user data (name, age, country) and file uploads, saving them into a MySQL database. Deployed on two VMs: one as the web server, one as the database server.

⚙️ **Prerequisites**
2 CentOS 8/RHEL 8 VMs (Web and DB server)
Sudo/root privileges
Internet access
![WhatsApp Image 2025-07-28 at 13 10 06_5032658d](https://github.com/user-attachments/assets/1ee46c19-13ea-46da-a009-fe8b0bdaf62e)

1️⃣ **Web Server Setup (Apache + PHP)**
Step 1: Install and Start Apache
yum install httpd -y
systemctl enable --now httpd

Step 2: Install PHP (and PHP-MySQL extension)
bash
dnf module -y enable php:8.1
dnf module -y install php:8.1/common
yum install php-mysqli -y
php -v

Step 3: Test PHP with a "Hello World" Page
bash
echo "<?php echo 'Hello World!'; ?>" > /var/www/html/php_test.php
In browser, visit: http://<Web-Server-IP>/php_test.php
![WhatsApp Image 2025-07-28 at 13 10 07_af7cbd1b](https://github.com/user-attachments/assets/c4b3a96b-b2dd-40cc-b205-2910242e89c5)

