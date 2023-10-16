# Inquiry-Management

## Outline

PHP のフレームワーク Laravel で作成された Web アプリケーション（お問合せ管理システム）です。<br />
アプリケーションの詳細は Notion でまとめておりますので、[そちら](https://h-yamasita.notion.site/958a744eda5341dc81a2f86a215c244f?pvs=4) をご覧ください。

## Architecture

![](./img/architecture.drawio.svg)

### Requirement

-   nginx: 1.21.1
-   php: 7.4.9
-   Laravel 8.x
-   MySQL: 8.0.26

## Setup Instructions

1.  リポジトリをクローンします。

    ```bash
    git clone https://github.com/yahiro0110/Inquiry-Management.git
    ```

2.  プロジェクトディレクトリに移動します。

    ```bash
    cd　Inquiry-Management
    ```

3.  環境変数用のファイルを用意します。

    ```bash
    cp ./src/.env.example ./src/.env
    ```

-   .env ファイル内のデータベース接続設定を次のように書きかえてください。

    ```markdown
    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=laravel_db
    DB_USERNAME=laravel_user
    DB_PASSWORD=laravel_pass
    ```

4.  Docker コンテナを起動します。

    ```bash
    docker-compose up -d --build
    ```

5.  PHP コンテナ(Application server)へログインし、Laravel アプリケーションの準備をします。

    ```bash
    # PHPコンテナ(Application server)へのログイン
    docker-compose exec php bash

    # Laravelアプリケーションの依存関係をインストール
    composer update

    # アプリケーションキーの生成
    php artisan key:generate

    # データベーステーブルの作成
    php artisan migrate

    # 初期データの投入
    php artisan db:seed
    ```

6.  以下の URL にアクセスし、トップページを表示します。

    http://localhost
