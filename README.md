# PHP & MySQL環境をDockerで構築する 

## Install Docker

* Mac: https://docs.docker.jp/docker-for-mac/install.html
* Windows: https://docs.docker.jp/docker-for-windows/install.html

※docker-composeは同梱されているので別途インストールの必要はない

## Create Project Assets

※以下、Windowsの場合は、WSL2もしくはGitBashの使用を前提とする（実行はMacのためWindows環境は未検証）

```bash
mkdir docker-php-mysql # 任意のディレクトリにプロジェクト用のディレクトリを作成
cd docker-php-mysql
mkdir -p docker/app # mkdir -p オブションについて: https://eng-entrance.com/linux-command-mkdir#-p--parents
mkdir docker/db
mkdir docker/db/data
mkdir src
touch docker/app/Dockerfile # Dockerfileについて: https://docs.docker.jp/engine/reference/builder.html
touch docker/app/php.ini # php.iniについて: https://www.php.net/manual/ja/configuration.file.php
touch docker/app/000-default.conf # Apacheの設定ファイルについて: https://httpd.apache.org/docs/2.4/ja/mod/core.html
touch docker/db/my.cnf # MySQLの構成ファイルについて: https://dev.mysql.com/doc/refman/5.6/ja/option-files.html
touch docker-compose.yml # docker-compose.ymlについて: https://docs.docker.jp/compose/compose-file.html
```

* docker/app/php.iniを次のようにする

```ini
[Date]
date.timezone = "Asia/Tokyo"
[mbstring]
mbstring.internal_encoding = "UTF-8"
mbstring.language = "Japanese"
```

* docker/app/000-default.confを次のようにする

```conf
<VirtualHost *:80>
       ServerAdmin webmaster@localhost
       DocumentRoot /var/www/html
       ErrorLog ${APACHE_LOG_DIR}/error.log
       CustomLog ${APACHE_LOG_DIR}/access.log combined
       <Directory /var/www/html>
           AllowOverride All
       </Directory>
</VirtualHost>
```

* docker/db/my.cnfを次のようにする

```cnf
[mysqld]
character-set-server=utf8mb4
collation-server=utf8mb4_unicode_ci
[client]
default-character-set=utf8mb4
```

* docker/app/Dockerfileを次のようにする

```Dockerfile
FROM php:7.4-apache
ADD php.ini /usr/local/etc/php/
ADD 000-default.conf /etc/apache2/sites-enabled/
RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer
RUN apt-get update \
    && apt-get install -y \
    git \
    zip \
    unzip \
    vim \
    libpng-dev \
    libpq-dev \
    && docker-php-ext-install pdo_mysql
```

* FROM命令について: https://docs.docker.jp/engine/reference/builder.html#from
* ADD命令について: https://docs.docker.jp/engine/reference/builder.html#add
* RUN命令について: https://docs.docker.jp/engine/reference/builder.html#run

* docker-compose.ymlを次のようにする

```yml
version: '3'
services:
  app:
    ports:
      - "8000:80"
    build: ./docker/app
    container_name: php_app
    volumes:
      - "./src:/var/www/html"
    depends_on:
      - db
  db:
    image: mysql:5.7
    container_name: php_db
    environment:
      MYSQL_ROOT_PASSWORD: root
      MYSQL_DATABASE: php_db
      MYSQL_USER: root
      MYSQL_ALLOW_EMPTY_PASSWORD: 'yes'
      TZ: 'Asia/Tokyo'
    volumes:
      - ./docker/db/data:/var/lib/mysql
      - ./docker/db/my.cnf:/etc/mysql/conf.d/my.cnf    
    ports:
      - 3306:3306
```

* buildについて
    * dockerイメージをビルドするために使用するDockerfileの場所を示す
    * 指定したパス下にあるDockerfileを使用してdockerイメージが構築される
* container_nameについて
    * dockerコンテナの名前
        * 重複する名前のコンテナがある場合 docker run 時にこける
        * docker ps -a で現在あるdockerコンテナを確認し、重複しない名前を指定すること
* portsについて
    * "${ホストマシーン側のポート}:${dockerコンテナのポート}"として記述する
        * services:appの場合「ホストマシーンの8000番ポートをdockerコンテナの80番ポートにつなぐ」ことになる
        * ホストマシーンからブラウザでlocalhost:8000に接続すると、dockerコンテナの80に立っているwebサーバーを見ることができるということ（今回の場合）
    * ホスト側で8000が使われている場合うまくいかない
    * その場合 `lsof -i:8000` などで使用されているかどうか調べる
    * 使用されている場合は他のポートを割り当てる
        * 例： - "8001:80" などとする
        * ホスト側のポートは任意で問題ない（プロトコルごとのデフォルトポートやその他のアプリで使用されているもの以外）
* volumesについて
    * "${ホストマシーン側のディレクトリ}:${dockerコンテナのディレクトリ}"として記述する
        * services:appの場合「ホストマシーンの./srcディレクトリとdockerコンテナの/var/www/htmlが同期される」ことになる
        * ./src内にファイルを配置したり./src内のファイルを変更するとdockerコンテナ内の/var/www/htmlに反映される
* imageについて
    * dockerイメージを指定する
        * dockerイメージとは、dockerコンテナのもととなる雛形のこと
        * dockerイメージはDockerHubで配布されている https://hub.docker.com/
* environmentについて
    * dockerコンテナ内の環境変数を指定する
        * 環境変数について: https://wa3.i-3-i.info/word11027.html
* commandについて
    * dockerコンテナが起動したときに実行したいコマンドを指定

## Build Docker Image

```bash
docker-compose build
docker images # dockerイメージの一覧を表示
```

* docker-compose buildについて
    * ディレクトリ配下にあるdocker-compose.ymlを使用してdockerイメージを作成する
        * https://docs.docker.jp/compose/reference/build.html

## Create Docker Container

```bash
docker-compose up -d
docker ps
```

* docker ps を実行して下記のように表示されていればコンテナが正常に動いている（CONTAINER IDはランダムで割り振られるので違っていて問題ない）

```bash
CONTAINER ID   IMAGE                  COMMAND                  CREATED         STATUS         PORTS                                        NAMES
0839dfe73933   mysql:5.7              "docker-entrypoint.s…"   2 minutes ago   Up 2 seconds   3306/tcp, 33060/tcp, 0.0.0.0:3306->330/tcp   php_db
fbccefb64c14   docker-php-mysql_app   "docker-php-entrypoi…"   2 minutes ago   Up 2 seconds   0.0.0.0:8000->80/tcp                         php_app
```

* docker-compose upについて
    * ディレクトリ配下にあるdocker-compose.ymlを使用してdockerコンテナの構築、作成、起動、アタッチをする
        * https://docs.docker.jp/compose/reference/up.html
    * -d オプション（デタッチモード）はバックグランドでコンテナを走らせる場合に使用する
        * docker-compose downを実行してdockerコンテナを停止してから -d をつけない場合どうなるかもあわせて確認する
        * -d をつけないで実行した場合、Ctrl+Cで停止できる

## ファイルを作成して確認してみる

```bash
touh src/index.php
```

* src/index.phpの内容を次のようにする

```php
<?php
echo 'Hello, World!';
```

* ブラウザでlocalhost:8000（もしくは指定したポート）を確認
    * Hello, World!と表示されていればOK

## Dockerコンテナ内で作業が必要な場合

* services:dbを例にMySQLでコマンド実行が必要な場合を解説する

```bash
docker exec -it php_db bash
```

* docker execについて
    * dockerコンテナ対して何らかのコマンド実行を行う
    * docker exec -it ${dockerコンテナ名} ${実行するコマンド}
        * http://docs.docker.jp/engine/reference/commandline/exec.html
        * -it オプションはコンテナをアタッチした上で擬似ターミナルを割り当てる
    * 今回の場合はphp_dbコンテナに対して、アタッチしたうえで擬似ターミナル上でbashを実行している

* 上記コマンドの実行により、以降はdockerコンテナ内にいる状態となる

```bash
mysql -u root -p # パスワードの入力はなしでOK
```

* 下記のコマンドでの実行の場合、すぐにmysqlを実行できる

```bash
docker exec -it php_db mysql -u root -p
```

## Trable Shootings

* docker-compose build時にエラーが出てdockerイメージが正常に作成できない
    * Dockerfile, docker-compose.yml、他設定ファイルを見直した上で下記コマンドを実行してみる

```bash
docker-compose build --no-cache
```

* docker-compose upをしてもdockerコンテナが立ち上がっていないぽい
    * docker ps -a でコンテナのステータスを確認
    * STATUSがExitになっている場合はコンテナを消してから設定ファイルを見直して再度実行する

```bash
docker ps -a
# コンテナのSTATUSを確認
docker rm ${docker_container_name}
docker-compose up -d
```
