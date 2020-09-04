# 開発環境構築手順

```sh
git@github.com:SugiShio/wordpress.git
```

今いるディレクトリに`wordpress`というディレクトリができるので、移動します

```sh
cd wordpress
```

Docker をバックグラウンドで起動

```sh
docker-compose up -d
```

http://localhost:9000

にアクセスするとサイトが表示されると思います

# アセットファイルの生成

初回や、package.json に変更があったは先に下記コマンドを実行してください

```
npm i
```

## 全テーマのコンパイル

```
npm run dev
```

## 全テーマのウォッチ

```
npm run watch
```

## 特定のテーマのウォッチ

```
npm run watch -- --env.theme=[theme]
```

## バージョン

|      | バージョン |
| :--- | :--------- |
| node | v12.11.1   |
| npm  | 6.14.8     |
