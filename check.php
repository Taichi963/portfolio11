<?php
  session_start();
//repuireで外部ファイルの読み込み
  require('dbconnect.php');
//$_SESSIONのjoinがセットされていない場合にifを実行
if(!isset($_SESSION['join'])) {
    header('Location: index.php');
    exit();
}
//データベースへ記録
if (!empty($_POST)) {
    $statement = $db->prepare('INSERT INTO contact_bbs SET name=?, email=?, contact=?');
    $statement->execute(array(
        $_SESSION['join']['name'],
        $_SESSION['join']['email'],
        $_SESSION['join']['contact']
    ));
//nusetでSESSION変数を空にする
    unset($_SESSION['join']);

    header('Location: thanks.php');
    exit();
}
//データベースへの登録
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせ内容確認画面</title>
    <link rel="stylesheet" href="css/common.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/check.css">
</head>
<body>
<!-- header start -->
<header>
	<div class="logo">
		<h1>Goo</h1>
	</div>
	<div class="sp-menu">
	  <span class="material-icons" id="open">menu</span>
	</div>
	<div class="pc-menu">
		<nav>
			<ul>
				<li><a href="index.html">トップ</a></li>
				<li><a href="item.php">商品一覧</a></li>
				<li><a href="rank.html">ランキング</a></li>
				<li><a href="sreep.html">睡眠の重要性</a></li>
			</ul>
		</nav>
		</div>
	
</header>
<!-- header end -->
<div class="overlay">
	<span class="material-icons" id="close">close</span>
	<nav>
		<ul>
			<li><a href="index.html">トップ</a></li>
			<li><a href="item.php">商品一覧</a></li>
			<li><a href="rank.html">ランキング</a></li>
			<li><a href="sreep.html">睡眠の重要性</a></li>
		</ul>
	</nav>
	</div>
<!-- header end -->

    <div id="wrap">
        <div id="head">
        </div>
        <div id="content">
            <p>記入した内容を確認して、「送信する」ボタンをクリックしてください</p>
            <form action="" method="post">
                <input type="hidden" name="action" value="submit" />
                <dl>
                    <dt>お名前</dt>
                    <dd><?php print(htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES)); ?></dd>
                    <dt>メールアドレス</dt>
                    <dd><?php print(htmlspecialchars($_SESSION['join']['email'], ENT_QUOTES)); ?></dd>
                    <dt>お問い合わせ内容</dt>
                    <dd><?php print(htmlspecialchars($_SESSION['join']['contact'], ENT_QUOTES)); ?></dd>
                </dl>
                <div><a href="contact.php?action=rewrite">&laquo;&nbsp;書き直す</a> | <input type="submit" value="送信する" /></div>
            </form>
        </div>
    </div>
	<!-- footer start -->
	<footer>
    <div class="icons">
			<a href="#"><i class="fab fa-facebook-square fa-lg"></i></a>
			<a href="#"><i class="fab fa-twitter-square fa-lg"></i></a>
			<a href="#"><i class="fab fa-youtube-square fa-lg"></i></a>
		</div>
		<ul class="footer-nav">
			<li><a href="index.html">HOMEトップ</a></li>
			<li><a href="item.php">SHOPトップ</a></li>
			<li><a href="contact.php">CONTACTトップ</a></li>
			<li><a href="tokutei.html">特定商取引に基づく表記</a></li>
		</ul>
			<p class="copyright"><small>(c)清水太一</small></p>
	</footer>
	<!-- footer end -->
	<script src="js/main.js" charset="UTF-8"></script>
</body>
</html>