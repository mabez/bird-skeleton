# Bird Skeleton #
Esqueleto de um site de e-commerce feito com Zend Framework 2.

## Instalação ##
Para instalar é necessário:
- Modificar e executar a query do arquivo [install.sql](data/mysql/install.sql).
- Modificar as infomações de banco de dados no arquivo [module.config.php](module/Application/config/module.config.php) conforme a necessidade.
- Garantir que o driver do pdo_mysql está habilitado para o php do servidor onde a aplicação vai rodar, [mais informações](http://php.net/manual/pt_BR/ref.pdo-mysql.php).