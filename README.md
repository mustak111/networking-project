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
