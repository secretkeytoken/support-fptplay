FROM harbor.fptplay.net/image-base/wordpress-6.1.1-php8.2-apache:master-build-87697

COPY ./ /var/www/html/
RUN chown -R www-data:www-data /var/www/html/
RUN chmod 777 -R /var/www/html/

# CMD ["apache2-foreground"]