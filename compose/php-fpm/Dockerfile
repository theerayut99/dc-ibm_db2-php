FROM php:7.2-fpm

RUN apt-get update && apt-get install -y && \
	apt-get install libldap2-dev libmcrypt-dev -y && \
	docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ && \
	docker-php-ext-install ldap && \
    docker-php-ext-install pdo_mysql

# FROM http://repos.zend.com/cloudfoundry/clidriver.tar.gz
# FROM https://public.dhe.ibm.com/ibmdl/export/pub/software/data/db2/drivers/odbc_cli/linuxx64_odbc_cli.tar.gz 
ADD resources/clidriver.tar.gz /

# https://pecl.php.net/get/PDO_IBM-1.3.5.tgz
ADD resources/PDO_IBM-1.3.5.tgz /

# IBM DB2 is easy as pie
RUN yes '/clidriver' | pecl install ibm_db2 && docker-php-ext-enable ibm_db2

# for IBM_PDO we have have to do it manually
RUN cd /PDO_IBM-1.3.5 && phpize && ./configure --with-pdo-ibm=/clidriver && make install && docker-php-ext-enable pdo_ibm

CMD ["php-fpm"]

EXPOSE 9000