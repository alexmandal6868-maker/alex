# 🛠️ Setup & Installation Guide

## System Requirements

- **PHP:** 7.4 or higher
- **MySQL:** 5.7 or higher  
- **Server:** Apache with mod_rewrite enabled
- **Browser:** Modern browser (Chrome, Firefox, Safari, Edge)
- **RAM:** Minimum 512MB
- **Disk Space:** Minimum 100MB

---

## Installation Steps

### Option 1: Local Development (XAMPP)

#### Step 1: Install XAMPP
1. Download XAMPP from [apachefriends.org](https://www.apachefriends.org/)
2. Install on your computer
3. Launch XAMPP Control Panel

#### Step 2: Start Services
1. Click **Start** next to Apache
2. Click **Start** next to MySQL
3. Both should show green status

#### Step 3: Clone Repository
```bash
# Navigate to XAMPP htdocs folder
cd C:\xampp\htdocs\          # Windows
cd /Applications/XAMPP/htdocs # Mac
cd /opt/lampp/htdocs/        # Linux

# Clone the repository
git clone https://github.com/alexmandal6868-maker/alex.git
cd alex
```

#### Step 4: Create Database
Database creates automatically on first page load via `config/config.php`

#### Step 5: Access Application
```
http://localhost/alex/public/
```

---

### Option 2: Online Hosting

#### Step 1: Upload Files
1. Use FTP/SFTP to upload files to `/public_html/`
2. Maintain the directory structure

#### Step 2: Create Database
1. Go to cPanel → Databases
2. Create new MySQL database
3. Update `config/config.php` with credentials

#### Step 3: Configure Permissions
```bash
chmod 755 config/
chmod 755 public/
chmod 755 utils/
```

#### Step 4: Access Application
```
https://yourdomain.com/
```

---

### Option 3: Docker

#### Step 1: Create Dockerfile
```dockerfile
FROM php:7.4-apache
RUN docker-php-ext-install pdo pdo_mysql
COPY . /var/www/html/
RUN a2enmod rewrite
```

#### Step 2: Create docker-compose.yml
```yaml
version: '3.8'
services:
  web:
    build: .
    ports:
      - "80:80"
    volumes:
      - .:/var/www/html/
  db:
    image: mysql:5.7
    environment:
      MYSQL_ROOT_PASSWORD: root
      MYSQL_DATABASE: nepal_tourism
    ports:
      - "3306:3306"
```

#### Step 3: Run Docker
```bash
docker-compose up -d
# Access at http://localhost
```

---

## Configuration

### config/config.php

Update database credentials if using external database:

```php
$servername = "localhost";     // Database host
$username = "root";             // MySQL username
$password = "";                 // MySQL password
$dbname = "nepal_tourism";      // Database name
```

### Important Settings
- **Display Errors:** Set to `0` in production
- **Session Timeout:** Default 30 minutes
- **Password Default:** `nepal123` (change in production!)

---

## Database Setup

### Auto-Setup (On First Load)
1. Visit `http://localhost/alex/public/`
2. `config.php` automatically:
   - Creates database `nepal_tourism`
   - Creates tables: `hotels`, `bookings`, `users`
   - Inserts sample hotels

### Manual Setup
```sql
-- Create database
CREATE DATABASE IF NOT EXISTS nepal_tourism;
USE nepal_tourism;

-- Create tables
CREATE TABLE hotels (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    place VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    link VARCHAR(500),
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(100) NOT NULL,
    place VARCHAR(100) NOT NULL,
    hotel VARCHAR(100) NOT NULL,
    date DATE NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    status ENUM('pending','confirmed','cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    role ENUM('user','admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## Testing

### Test Database Connection
1. Visit: `http://localhost/alex/utils/test.php`
2. Should show: ✓ Connected to MySQL! ✓ Database ready!

### Test Admin Login
1. Visit: `http://localhost/alex/public/admin/login.php`
2. Username: `admin`
3. Password: `nepal123`
4. Should redirect to dashboard

### Test Booking
1. Visit homepage
2. Click "Quick Book" on any hotel
3. Fill form and submit
4. Check admin dashboard for new booking

---

## Troubleshooting

### Error: "Connection refused"
**Solution:** 
- Start MySQL service
- Check database credentials in `config/config.php`
- Verify MySQL is running

### Error: "404 Not Found"
**Solution:**
- Check file paths
- Enable Apache mod_rewrite
- Verify `.htaccess` exists

### Error: "Permission denied"
**Solution:**
```bash
chmod -R 755 /path/to/alex/
chmod -R 777 public/images/generated/
```

### Sessions not working
**Solution:**
- Create `sessions/` directory
- Set `session.save_path` in php.ini
- Ensure write permissions

### Database not created
**Solution:**
- Check MySQL is running
- Verify user has CREATE DATABASE privilege
- Check `config/config.php` credentials

---

## Performance Optimization

### Enable Caching
```php
// In config/config.php
header('Cache-Control: max-age=3600, public');
```

### Compress Assets
```php
// Enable gzip compression in .htaccess
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/html text/plain text/css text/javascript
</IfModule>
```

### Database Optimization
```sql
-- Add indexes
ALTER TABLE hotels ADD INDEX idx_place (place);
ALTER TABLE bookings ADD INDEX idx_user_name (user_name);
ALTER TABLE bookings ADD INDEX idx_status (status);
```

---

## Security Hardening

### 1. Change Default Credentials
Edit `public/admin/login.php` and update:
```php
// Change from 'nepal123' to strong password
$storedHash = password_hash('YOUR_STRONG_PASSWORD', PASSWORD_DEFAULT);
```

### 2. Create .htaccess
```apache
# Disable directory listing
Options -Indexes

# Remove PHP extensions
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [QSA,L]

# Prevent access to config files
<FilesMatch "^(config|utils|docs)">
    Order allow,deny
    Deny from all
</FilesMatch>
```

### 3. Update Security Settings
```php
// In config/config.php
// Set production mode
error_reporting(0);
ini_set('display_errors', 0);

// Set secure session options
session_set_cookie_params([
    'httponly' => true,
    'secure' => true,     // HTTPS only
    'samesite' => 'Strict'
]);
```

---

## Deployment Checklist

- ✅ Database created and tables initialized
- ✅ Credentials updated in `config/config.php`
- ✅ .htaccess configured
- ✅ File permissions set (755/777)
- ✅ Admin password changed from default
- ✅ Error reporting disabled (`display_errors = 0`)
- ✅ SSL certificate installed (HTTPS)
- ✅ Backup created
- ✅ Tested all main pages
- ✅ Tested admin login
- ✅ Tested booking system

---

## Maintenance

### Regular Tasks
- Backup database weekly
- Check error logs monthly
- Update PHP/MySQL
- Review security settings
- Clean temporary files

### Backup Database
```bash
# Using mysqldump
mysqldump -u root -p nepal_tourism > backup.sql

# Restore from backup
mysql -u root -p nepal_tourism < backup.sql
```

---

## Support

For detailed information, see:
- **README.md** - Project overview
- **manifest.json** - File inventory
- **FILE_CONNECTIONS.md** - Architecture

---

**Last Updated:** June 11, 2026  
**Version:** 2.0
