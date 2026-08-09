
FROM php:8.3-apache
RUN docker-php-ext-install pdo_mysql
COPY app/ /var/www/html
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh
RUN chown -R www-data:www-data /var/www/html
ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
