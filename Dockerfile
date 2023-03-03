FROM harbor.fptplay.net/image-base/wordpress-6.1.1-php8.2-apache:master-build-87814

COPY --chown=www-data:www-data --chmod=777 ./ /var/www/html/
RUN rm -rf /var/www/html/wp-content
COPY --chown=www-data:www-data --chmod=755 ./wp-content /var/www/html/

# CMD ["apache2-foreground"]
