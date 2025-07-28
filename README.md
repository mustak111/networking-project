🗃️ **UDC Server: Step-by-Step Installation & Configuration Guide**

📖 **Project Overview**
The User Data Collector (UDC) is a PHP-based web application for securely collecting user data (name, age, country) and file uploads, saving them into a MySQL database. Deployed on two VMs: one as the web server, one as the database server.

⚙️ **Prerequisites**
<pre>2 CentOS 8/RHEL 8 VMs (Web and DB server)
Sudo/root privileges
Internet access</pre>

![WhatsApp Image 2025-07-28 at 13 10 06_5032658d](https://github.com/user-attachments/assets/1ee46c19-13ea-46da-a009-fe8b0bdaf62e)

1️⃣ **Web Server Setup (Apache + PHP)**

Step 1: Install and Start Apache
<pre>yum install httpd -y
systemctl enable --now httpd</pre>

Step 2: Install PHP (and PHP-MySQL extension)
bash
dnf module -y enable php:8.1
dnf module -y install php:8.1/common
yum install php-mysqli -y
php -v
<img width="782" height="880" alt="image" src="https://github.com/user-attachments/assets/4148c768-ccdf-4b9d-a8b3-cc5168839721" />

Step 3: Test PHP with a "Hello World" Page
bash
echo "<?php echo 'Hello World!'; ?>" > /var/www/html/php_test.php
In browser, visit: http://<Web-Server-IP>/php_test.php
![WhatsApp Image 2025-07-28 at 13 10 09_fb23e799](https://github.com/user-attachments/assets/aba8850a-8f5d-425a-9e01-abb721df4535)



2️⃣ **Database Server Setup (MySQL)**
Step 4: Install and Start MySQL Server
bash
dnf install -y mysql-server
systemctl enable --now mysqld
mysql --version

Step 5: Create Application Database and User
bash
mysql -u root -p

In MySQL shell:
sql
CREATE DATABASE udc;
CREATE USER 'udc'@'%' IDENTIFIED BY 'Welcome@123';
GRANT ALL PRIVILEGES ON udc.* TO 'udc'@'%';
exit;

Step 6: Test Remote MySQL Access from Web Server
bash
mysql -h <DB-SERVER-IP> -u udc -p

3️⃣ **UDC Application Configuration**
Step 7: Test Database Connection from PHP
Create /var/www/html/db_check.php as described.

Visit: http://<Web-Server-IP>/db_check.php

Step 8: Create users Table
From MySQL shell on DB server:

sql
USE udc;
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  age INT,
  country VARCHAR(100),
  file VARCHAR(255)
);

![WhatsApp Image 2025-07-28 at 13 30 39_3f6f9a3d](https://github.com/user-attachments/assets/ed27d766-adf3-458c-afef-3793b9b0a684)


Step 9: Upload Directory on DB Server
bash
mkdir -p /var/udc/uploads
chmod -R 777 /var/udc
ls -ld /var/udc/uploads
![WhatsApp Image 2025-07-28 at 13 33 42_b855ab9c](https://github.com/user-attachments/assets/357ffd50-7436-4a3f-847d-041fd7ec1ce7)


Step 10: Deploy and Use UDC main.php
Edit /var/www/html/main.php (see earlier for code).
In browser, visit: http://<Web-Server-IP>/main.php
Fill out the form and submit.
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
<img width="782" height="880" alt="image" src="https://github.com/user-attachments/assets/4148c768-ccdf-4b9d-a8b3-cc5168839721" />

Step 3: Test PHP with a "Hello World" Page
bash
echo "<?php echo 'Hello World!'; ?>" > /var/www/html/php_test.php
In browser, visit: http://<Web-Server-IP>/php_test.php
![WhatsApp Image 2025-07-28 at 13 10 09_fb23e799](https://github.com/user-attachments/assets/aba8850a-8f5d-425a-9e01-abb721df4535)



2️⃣ **Database Server Setup (MySQL)**
Step 4: Install and Start MySQL Server
bash
dnf install -y mysql-server
systemctl enable --now mysqld
mysql --version

Step 5: Create Application Database and User
bash
mysql -u root -p
In MySQL shell:

sql
CREATE DATABASE udc;
CREATE USER 'udc'@'%' IDENTIFIED BY 'Welcome@123';
GRANT ALL PRIVILEGES ON udc.* TO 'udc'@'%';
exit;

Step 6: Test Remote MySQL Access from Web Server
bash
mysql -h <DB-SERVER-IP> -u udc -p

3️⃣ **UDC Application Configuration**
Step 7: Test Database Connection from PHP
Create /var/www/html/db_check.php as described.

Visit: http://<Web-Server-IP>/db_check.php

Step 8: Create users Table
From MySQL shell on DB server:

sql
USE udc;
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  age INT,
  country VARCHAR(100),
  file VARCHAR(255)
);

![WhatsApp Image 2025-07-28 at 13 30 39_3f6f9a3d](https://github.com/user-attachments/assets/ed27d766-adf3-458c-afef-3793b9b0a684)


Step 9: Upload Directory on DB Server
bash
mkdir -p /var/udc/uploads
chmod -R 777 /var/udc
ls -ld /var/udc/uploads
![WhatsApp Image 2025-07-28 at 13 33 42_b855ab9c](https://github.com/user-attachments/assets/357ffd50-7436-4a3f-847d-041fd7ec1ce7)


Step 10: Deploy and Use UDC main.php
Edit /var/www/html/main.php (see earlier for code).
In browser, visit: http://<Web-Server-IP>/main.php
Fill out the form and submit.
<img width="767" height="385" alt="Screenshot_2025-07-25_130152 1" src="https://github.com/user-attachments/assets/be33d88e-773c-4bab-98cf-869cfb83f6de" />



