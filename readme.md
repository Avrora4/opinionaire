# アンケートフォーラム
簡単にアンケートを作成でき、ボタン一つで結果を表示できるアンケートフォーラムです。

# DEMO
![](doc/image/sample1.gif)
![](doc/image/sample2.gif)
![](doc/image/sample3.gif)
![](doc/image/sample4.gif)
# Features
アンケートを簡単に作成することができます。
このアンケートフォームのポイントはボタン一つでいろいろな操作ができるという点です。
アンケートの設問数や選択肢の数をボタン一つで追加したり削除したりがお手軽にできます。
結果をボタン一つで表示できます。
あとからでもアンケートの内容を再編集できるようになっています。

# Requirement
- PHP 7.4.4
- Laravel Framework 7.21.0
- MySQL
- Bootstrap 4.5
- composer 1.10.5


# setup
- git clone https://github.com/Avrora4/opinionaire.git
- cd opinionaire
- composer install
- cp .env.example .env
- php artisan db:migrate


# Usage
- php artisan serve でサーバーを起動
- http://localhost:8000/ にアクセス
- 右上のregisterより新規でユーザー情報を登録し、http://localhost:8000/mypage sへ

    - createを選択し、簡単なアンケートを作成しよう
    - listを選択すると、今まで作成したアンケートを見ることができ、それぞれ編集や削除が行えます。

# Note
アンケートの作成には必ずユーザー登録が必要です。
アンケートへの解答にはユーザー登録は必要ありません。