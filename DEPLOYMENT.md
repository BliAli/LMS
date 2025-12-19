# 🌐 Deployment Guide - LMS MPPL

Panduan deployment aplikasi LMS ke server production.

---

## 🎯 Pre-Deployment Checklist

### 1. Environment Configuration
- [ ] Set `APP_ENV=production` di `.env`
- [ ] Set `APP_DEBUG=false` di `.env`
- [ ] Generate secure `APP_KEY`
- [ ] Configure database credentials
- [ ] Set correct `APP_URL`

### 2. Security
- [ ] Review all `.env` values
- [ ] Ensure no sensitive data in version control
- [ ] Configure HTTPS/SSL
- [ ] Set up firewall rules
- [ ] Configure CORS if needed

### 3. Optimization
- [ ] Run `composer install --optimize-autoloader --no-dev`
- [ ] Run `php artisan config:cache`
- [ ] Run `php artisan route:cache`
- [ ] Run `php artisan view:cache`
- [ ] Optimize images and assets

---

## 🚀 Deployment Options

### Option 1: Shared Hosting (Niagahoster, Hostinger, dll)

#### Requirements
- PHP 8.2+
- MySQL/MariaDB
- SSH Access (recommended)
- At least 512MB RAM

#### Steps
1. **Upload Files**
   ```bash
   # Via FTP/SFTP, upload semua files kecuali:
   - .git/
   - .env (akan dibuat manual)
   - storage/ dan bootstrap/cache/ (permissions)
   ```

2. **Setup .env**
   - Copy `.env.example` ke `.env`
   - Edit database credentials
   - Set production values

3. **Install Dependencies**
   ```bash
   composer install --optimize-autoloader --no-dev
   ```

4. **Set Permissions**
   ```bash
   chmod -R 775 storage
   chmod -R 775 bootstrap/cache
   ```

5. **Run Migrations**
   ```bash
   php artisan migrate --force
   php artisan db:seed
   ```

6. **Configure Web Server**
   - Point document root ke `/public` folder
   - Setup `.htaccess` for Apache
   
7. **Optimize**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

---

### Option 2: VPS (DigitalOcean, Vultr, AWS EC2)

#### Requirements
- Ubuntu 22.04 LTS (recommended)
- Nginx or Apache
- PHP 8.2 + extensions
- MySQL 8.0+
- Composer
- Git

#### Initial Server Setup

1. **Update System**
   ```bash
   sudo apt update && sudo apt upgrade -y
   ```

2. **Install Nginx**
   ```bash
   sudo apt install nginx -y
   ```

3. **Install PHP 8.2**
   ```bash
   sudo apt install php8.2-fpm php8.2-mysql php8.2-mbstring php8.2-xml php8.2-curl php8.2-zip php8.2-gd -y
   ```

4. **Install MySQL**
   ```bash
   sudo apt install mysql-server -y
   sudo mysql_secure_installation
   ```

5. **Install Composer**
   ```bash
   curl -sS https://getcomposer.org/installer | php
   sudo mv composer.phar /usr/local/bin/composer
   ```

6. **Install Git**
   ```bash
   sudo apt install git -y
   ```

#### Deploy Application

1. **Clone Repository**
   ```bash
   cd /var/www
   sudo git clone [YOUR_REPO_URL] lms
   cd lms
   ```

2. **Install Dependencies**
   ```bash
   composer install --optimize-autoloader --no-dev
   ```

3. **Setup Environment**
   ```bash
   cp .env.example .env
   nano .env  # Edit with your values
   php artisan key:generate
   ```

4. **Create Database**
   ```bash
   sudo mysql
   CREATE DATABASE lms_mppl;
   CREATE USER 'lmsuser'@'localhost' IDENTIFIED BY 'strong_password';
   GRANT ALL PRIVILEGES ON lms_mppl.* TO 'lmsuser'@'localhost';
   FLUSH PRIVILEGES;
   EXIT;
   ```

5. **Run Migrations**
   ```bash
   php artisan migrate --force
   php artisan db:seed
   ```

6. **Set Permissions**
   ```bash
   sudo chown -R www-data:www-data /var/www/lms
   sudo chmod -R 775 /var/www/lms/storage
   sudo chmod -R 775 /var/www/lms/bootstrap/cache
   ```

7. **Configure Nginx**
   ```bash
   sudo nano /etc/nginx/sites-available/lms
   ```
   
   Add this configuration:
   ```nginx
   server {
       listen 80;
       server_name your-domain.com;
       root /var/www/lms/public;

       add_header X-Frame-Options "SAMEORIGIN";
       add_header X-Content-Type-Options "nosniff";

       index index.php;

       charset utf-8;

       location / {
           try_files $uri $uri/ /index.php?$query_string;
       }

       location = /favicon.ico { access_log off; log_not_found off; }
       location = /robots.txt  { access_log off; log_not_found off; }

       error_page 404 /index.php;

       location ~ \.php$ {
           fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
           fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
           include fastcgi_params;
       }

       location ~ /\.(?!well-known).* {
           deny all;
       }
   }
   ```

8. **Enable Site**
   ```bash
   sudo ln -s /etc/nginx/sites-available/lms /etc/nginx/sites-enabled/
   sudo nginx -t
   sudo systemctl restart nginx
   ```

9. **Install SSL with Let's Encrypt**
   ```bash
   sudo apt install certbot python3-certbot-nginx -y
   sudo certbot --nginx -d your-domain.com
   ```

10. **Optimize Application**
    ```bash
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    ```

---

### Option 3: Docker

#### Dockerfile Example
```dockerfile
FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy application
COPY . .

# Install dependencies
RUN composer install --optimize-autoloader --no-dev

# Set permissions
RUN chown -R www-data:www-data /var/www

CMD ["php-fpm"]
```

#### docker-compose.yml
```yaml
version: '3.8'
services:
  app:
    build: .
    container_name: lms_app
    volumes:
      - .:/var/www
    networks:
      - lms_network

  nginx:
    image: nginx:alpine
    container_name: lms_nginx
    ports:
      - "80:80"
    volumes:
      - .:/var/www
      - ./nginx.conf:/etc/nginx/conf.d/default.conf
    networks:
      - lms_network

  mysql:
    image: mysql:8.0
    container_name: lms_mysql
    environment:
      MYSQL_ROOT_PASSWORD: rootpassword
      MYSQL_DATABASE: lms_mppl
      MYSQL_USER: lmsuser
      MYSQL_PASSWORD: password
    volumes:
      - mysql_data:/var/lib/mysql
    networks:
      - lms_network

networks:
  lms_network:
    driver: bridge

volumes:
  mysql_data:
```

---

## 🔒 Security Best Practices

1. **Environment Variables**
   - Never commit `.env` to version control
   - Use strong passwords
   - Rotate secrets regularly

2. **HTTPS**
   - Always use SSL/TLS in production
   - Force HTTPS redirect
   - Use HSTS headers

3. **Database**
   - Use separate database user (not root)
   - Restrict database access by IP
   - Regular backups

4. **File Permissions**
   - Set correct ownership (www-data)
   - Restrict write permissions
   - Protect sensitive directories

5. **Laravel Security**
   - Keep Laravel updated
   - Use CSRF protection
   - Sanitize user inputs
   - Use prepared statements (Eloquent does this)

---

## 📊 Monitoring & Maintenance

### Performance Monitoring
- Use Laravel Telescope for debugging
- Monitor server resources (CPU, RAM, Disk)
- Set up error logging (Sentry, Bugsnag)

### Regular Maintenance
- Database backups (daily)
- Update dependencies monthly
- Monitor logs regularly
- Security patches immediately

### Useful Commands
```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Re-cache
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Check application status
php artisan about

# Maintenance mode
php artisan down
php artisan up
```

---

## 🆘 Troubleshooting

### Issue: 500 Internal Server Error
- Check storage permissions: `chmod -R 775 storage`
- Check `.env` configuration
- Check Laravel logs: `storage/logs/laravel.log`

### Issue: Mix/Vite errors
- Run `npm install && npm run build`
- Check vite.config.js

### Issue: Database connection failed
- Verify database credentials in `.env`
- Check MySQL service: `sudo systemctl status mysql`
- Check firewall rules

### Issue: File upload fails
- Check storage permissions
- Check `php.ini` upload limits
- Check `post_max_size` and `upload_max_filesize`

---

## 📞 Support Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Laravel Deployment Guide](https://laravel.com/docs/deployment)
- [DigitalOcean Tutorials](https://www.digitalocean.com/community/tutorials)
- [Laravel Forums](https://laracasts.com/discuss)

---

**Good luck with your deployment! 🚀**
