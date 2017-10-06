FROM ubuntu:16.04

RUN apt-get update && apt-get -y upgrade && apt-get -y install \
 apache2 php7.0 php7.0-cgi php7.0-curl php7.0-mysql php7.0-xml php7.0-json php7.0-mbstring php7.0-zip php7.0-gd libapache2-mod-php php-mcrypt php-mysql curl php-cli php-mbstring git unzip php-xml \
 libcurl4-openssl-dev pkg-config libssl-dev libsslcommon2-dev php-pear php-dev vim

RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer


RUN a2enmod rewrite
RUN a2enmod headers


ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid


RUN apt-get -y install nodejs npm git
RUN npm install -g bower
RUN npm install --global gulp-cli
RUN apt-get install -y ruby-full rubygems
RUN gem install sass
RUN ln -s /usr/bin/nodejs /usr/bin/node

RUN mkdir /app
WORKDIR /app


EXPOSE 80


ADD conf.d/vhosts.conf /etc/apache2/sites-enabled/000-default.conf


CMD systemctl restart apache2
CMD /usr/sbin/apache2ctl -D FOREGROUND
COPY apache2-foreground /usr/local/bin/
