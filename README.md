# Group1 PHP Signup & Login System

A simple and secure PHP + MySQL signup/login application for the group assignment.

## Features
- User registration (signup)
- User login with session
- Password hashing using `password_hash()` and `password_verify()`
- Dashboard showing all registered group members
- Uses PDO + prepared statements

## Database
- Database name: `GROUP1`
- Table: `users` (id, username, email, password_hash, created_at)
- User: `group1_user`

## How to use after cloning

```bash
cd /var/www/html
sudo git clone https://github.com/YOUR_USERNAME/group1-php-login.git group1
sudo chown -R derrickkoros:www-data /var/www/html/group1
sudo chmod -R 750 /var/www/html/group1
sudo chmod 640 /var/www/html/group1/config.php
```

Then open:
- http://YOUR-VM-IP/group1/signup.php
- http://YOUR-VM-IP/group1/login.php
