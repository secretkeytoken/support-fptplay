FROM harbor.fptplay.net/image-base/wordpress-6.1.1-php8.2-apache:master-build-87697

COPY --chown=www-data:www-data --chmod=0777 ./ /var/www/html/

# CMD ["apache2-foreground"]