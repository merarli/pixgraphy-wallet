# pixgraphy-walletはWordPressにお小遣い管理システムを加えたものです
元のテーマ https://ja.wordpress.org/themes/pixgraphy/

フォームデザインなどを頂いた方https://github.com/hashcc/Usable-form

固定テンプレートを２つ追加しました。１つ目は出金情報を入れるフォームと多少のデータ確認ができる画面(wallet.php)です。
２つ目はデータ表示・確認に特化した画面です(wallet-view.php)。

wp_walletのテーブルを作ってアクセスできるようにする(db.phpかwp-db.phpを編集)
 
```wp_wallet.sql
CREATE TABLE `wp_wallet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `jpy` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;
```

wallet.phpを固定ページにテンプレートを当てて以下のサンプルコードを投稿に貼り付ける

```sample.html
<div class="container">
[sc_useJpy]
[sc_getAvgEat]
[sc_form_post]
最近の書き込み
[sc_getTableLimit]
  <div class="jumbotron">
    <h1>支払い情報</h1>
    <nav class="col-sm-10" role="navigation">
      <button type="button" class="btn btn-default btn-lg" onclick="window.location.reload();"><span class="glyphicon glyphicon-chevron-left"></span>再読込</button>
</nav>
<a href="https://mera.tokyo/view/">詳細データはこちら</a>
  </div>

  <form class="form-horizontal" role="form" action = "./" method = "post">


    <section class="contact">
      <div class="form-group">

        <label for="name_kanji_family" class="col-sm-2 control-label">支払日</label>
        <div class="input-group col-sm-3">
          <input type="date" class="form-control" name="date" id="datepicker" required value="YYYY-MM-DD">
        </div>

        <label for="name_kanji_family" class="col-sm-2 control-label">何を買った？</label>
        <div class="input-group col-sm-3">
          <span class="input-group-addon">おやつ・昼飯・機材</span>
          <input type="text" class="form-control" name="name_" x-autocompletetype="surname" required>
        </div>

        <label for="name_kanji_family" class="col-sm-2 control-label">どこで買った？</label>
        <div class="input-group col-sm-3">
          <span class="input-group-addon">マクドナルド・セブンイレブン・三和</span>
          <input type="text" class="form-control" name="place" x-autocompletetype="surname" required>
        </div>

        <div class="input-group col-sm-3">
          <select name="class" id="timepicker" class="form-control" required>
            <option value="">分類</option>
            <option value="食費">食費</option>
            <option value="光熱費">光熱費</option>
            <option value="通信費">通信費</option>
            <option value="交通費">交通費</option>
            <option value="遊興費">遊興費</option>
            <option value="美容費">美容費</option>
            <option value="医療費">医療費</option>
            <option value="被服費">被服費</option>
            <option value="日用品">日用品</option>
            <option value="教育費">教育費</option>
            <option value="住宅費">住宅費</option>
            <option value="税金">税金</option>
            <option value="保険">保険</option>
            <option value="社会保険">社会保険</option>
          </select>
        </div>

        <label for="name_kanji_family" class="col-sm-2 control-label">お値段</label>
        <div class="input-group col-sm-3">
          <span class="input-group-addon">例:1000</span>
          <input type="tel" class="form-control" name="jpy" x-autocompletetype="surname" required>
        </div>

      </div>
    </section>

    <hr>

    <nav class="col-sm-10" role="navigation">
      <button type = "submit" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-chevron-left"></span>送信</button>
    </nav>
  </form>
</div>
```

wallet_view.phpを固定ページにテンプレートに当てて以下のソースコードを貼り付ける
```sample2.html
[sc_useJpy]
[sc_getAvgEat]
[sc_form_post]
[sc_getTable]
```
