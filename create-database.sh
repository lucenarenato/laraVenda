#!/usr/bin/env bash

mysql --user=root --password="$MYSQL_ROOT_PASSWORD" <<-EOSQL
    CREATE DATABASE IF NOT EXISTS mega;
    GRANT ALL PRIVILEGES ON \`mega%\`.* TO '$MYSQL_USER'@'%';

    GRANT ALL PRIVILEGES
    ON mega.*
    TO 'sail'@'%'
    WITH GRANT OPTION;

    FLUSH PRIVILEGES;

EOSQL
