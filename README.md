# Bird Skeleton #
Esqueleto de um site de e-commerce feito com Zend Framework 2.

## Instalação ##
Para instalar é necessário:
- Modificar e executar a query do arquivo [install.sql](data/mysql/install.sql).
- Modificar as infomações de banco de dados no arquivo [module.config.php](module/Application/config/module.config.php) conforme a necessidade.
- Garantir que o driver do pdo_pgsql está habilitado para o php do servidor onde a aplicação vai rodar, [mais informações](http://php.net/manual/pt_BR/ref.pdo-pgsql.php).
- Caso a aplicação suba utilizando o zendserver, é necessário criar a pasta /var/img no servidor e dar permissão para a aplicação. Caso contrtário, é necessário criar a pasta {diretorioProjeto}/public/img onde serão incluidas as imagens pelos formulários administrativos

## Vagrant server ##
Esse projeto suporta uma configuração básica de [Vagrant](http://docs.vagrantup.com/v2/getting-started/index.html) com um script shell para executar o Bird Skeleton no [VirtualBox](https://www.virtualbox.org/wiki/Downloads).

Execute o comando vagrant up:
```
vagrant up
```

Acesse [http://localhost:8086](http://localhost:8086) no seu navegador.

Veja [Vagrantfile](https://github.com/mabez/bird-skeleton/blob/master/Vagrantfile) para mais detalhes.
