## 概要
Discordでログイン出来るサービスを増やしたいという思いで作ったリポジトリです。
Oauth2の実装部分は[こちらのリポジトリ](https://github.com/JakyeRU/Laravel-Discord-Authentication)をフォーク元として使わせて頂きました。クライアントIDやトークンなどを.envから直接読み取る形だったので、configを介するように変更しています。
詳しい利用方法などはフォーク元のreadmeを御覧ください。
フォーク元のリポジトリを拡張し、当リポジトリではTailwindCss,Vue2,Inertia.jsなどを導入しています。
今時の開発をちゃっちゃと始めたい方におすすめです。

## SSR対応
Inertia.jsにSSR機能が追加されていたので試しに当リポジトリにも導入しました。

## Laravel 9
Laravel 9に対応しました。