# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = '2'

@script = <<SCRIPT
DOCUMENT_ROOT_ZEND="/var/www/bird-skeleton/public"

echo "configurando o servidor...\n";
apt-get update
apt-get install -y apache2 git curl php5-cli php5 php5-intl libapache2-mod-php5
apt-get -y install postgresql php5-pgsql 
apt-get install -y expect

echo "criando o banco de dados...\n";
su postgres << EOF 
psql -c "create user bird_skeleton with password 'bird_skeleton'"
psql -c "create database bird_skeleton owner bird_skeleton"
EOF

echo "configurando o apache...\n"
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

echo "Importando o banco de dados"
useradd bird_skeleton -p bird_skeleton
su bird_skeleton << EOF
psql < /var/www/bird-skeleton/data/postgresql/install.sql
EOF

echo "Configurando a pasta de imagens"
cd /var/www/bird-skeleton
mkdir /var/img
ln -s /var/img public/img
chmod 777 -R /var/img

echo "Configurando a pasta de cache"
cd /var/www/bird-skeleton
mkdir /var/cachei
rm -R data/cache
ln -s /var/cache data/cache
chmod 777 -R /var/cache

curl -Ss https://getcomposer.org/installer | php
COMPOSER_PROCESS_TIMEOUT=600000 php composer.phar --no-interaction install --no-progress
COMPOSER_PROCESS_TIMEOUT=600000 php composer.phar --no-interaction update --no-progress
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
