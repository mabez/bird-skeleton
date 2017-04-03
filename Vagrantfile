# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = '2'

@script = <<SCRIPT
DOCUMENT_ROOT_ZEND="/var/www/bird-skeleton/public"

echo "configurando o servidor...\n";

apt-get update
apt-get install -y language-pack-en-base
LC_ALL=en_US.UTF-8 add-apt-repository ppa:ondrej/php
apt-get update

apt-get -y install apache2 git curl php7.0 php7.0-mysql php7.0-mbstring php7.0-dom php7.0-libsodium zip unzip
apt-get -y install postgresql php7.0-pgsql 
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
psql < /var/www/e-commerce/data/postgresql/install.sql
EOF

echo "Configurando a pasta de imagens"
cd /var/www/bird-skeleton
mkdir /var/img
ln -s /var/img public/img
chmod 777 -R /var/img

echo "Configurando a pasta de cache"
cd /var/www/bird-skeleton
mkdir /var/cache
rm -R data/cache
ln -s /var/cache data/cache
chmod 777 -R /var/cache

echo "** [ZEND] Visit http://localhost:8086 in your browser for to view the bird-skeleton application **"
SCRIPT

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = 'ubuntu/xenial64'
  config.vm.network "forwarded_port", guest: 80, host: 8090
  config.vm.hostname = "bird-skeleton"
  config.vm.synced_folder '.', '/var/www/bird-skeleton'
  config.vm.provision 'shell', inline: @script
  config.vm.boot_timeout = 9999999999 
  config.vm.provider "virtualbox" do |vb|
    vb.customize ["modifyvm", :id, "--memory", "1024"]
  end

end
