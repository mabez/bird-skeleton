# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = '2'

@script = <<SCRIPT
DOCUMENT_ROOT_ZEND="/var/www/bird-skeleton/public"
apt-get update
apt-get install -y apache2 git curl php5-cli php5 php5-intl libapache2-mod-php5

MYSQL_ROOT_PASS='bird_skeleton'

echo "mysql-server mysql-server/root_password password $MYSQL_ROOT_PASS" | debconf-set-selections
echo "mysql-server mysql-server/root_password_again password $MYSQL_ROOT_PASS" | debconf-set-selections
apt-get -y install mysql-server php5-mysql

echo "
<VirtualHost *:80>
    ServerName bird-skeleton 
    DocumentRoot $DOCUMENT_ROOT_ZEND
    <Directory $DOCUMENT_ROOT_ZEND>
        DirectoryIndex index.php
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>
</VirtualHost>
" > /etc/apache2/sites-available/bird-skeleton.conf
a2enmod rewrite
a2dissite 000-default
a2ensite bird-skeleton 
service apache2 restart
cd /var/www/bird-skeleton
mysql -u root -pbird_skeleton < data/mysql/install.sql
mkdir public/img
curl -Ss https://getcomposer.org/installer | php
COMPOSER_PROCESS_TIMEOUT=600000 php composer.phar --no-interaction install --no-progress
echo "** [ZEND] Visit http://localhost:8086 in your browser for to view the bird-skeleton application **"
SCRIPT

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = 'bento/ubuntu-14.04'
  config.vm.network "forwarded_port", guest: 80, host: 8086
  config.vm.hostname = "bird-skeleton"
  config.vm.synced_folder '.', '/var/www/bird-skeleton'
  config.vm.provision 'shell', inline: @script

  config.vm.provider "virtualbox" do |vb|
    vb.customize ["modifyvm", :id, "--memory", "1024"]
  end

end
