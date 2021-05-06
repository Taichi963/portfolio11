<?php

session_start();
//formが送信されているかを確認
  if (!empty($_POST)) {
  if ($_POST['name'] === '') {
    $error['name'] = 'blank';
  }

  if ($_POST['email'] === '') {
    $error['email'] = 'blank';
  }

  if ($_POST['contact'] === '') {
      $error['contact'] = 'blank';
  }

//emptyで配列を指定すると配列の内容が空かどうかを判断する
  if (empty($error)) {

    //エラーが無かったらセッションに値を保存する
    $_SESSION['join'] = $_POST;
    header('Location: check.php');
  exit();
  }
}

if ($_REQUEST['action'] === 'rewrite' && isset($_SESSION['join'])) {
//$_POSTに$_SESSIONの内容を保存する
  $_POST = $_SESSION['join'];
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>お問い合わせ</title>
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/contact.css">
</head>
<body id="contact">
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
<div class="top-img">
		<img src="images/image01.jpg">
		</div>
<!-- main start -->
<main>
      <h1>Contact</h1>
  <div class="contact-form">
    <form action="" method="post" enctype="multipart/form-data">
      <input type="text" placeholder="お名前" name="name" maxlength="255" value="<?php print(htmlspecialchars($_POST['name'])); ?>">
      <?php if($error['name'] === 'blank'): ?>
      <p id="error-text">お名前を入力してください。</p>
      <?php endif; ?>
      <input type="email" placeholder="メールアドレス" name="email"  value="<?php print(htmlspecialchars($_POST['email'])); ?>">
      <?php if($error['email'] === 'blank'): ?>
      <p id="error-text">メールアドレスを入力してください。</p>
      <?php endif; ?>
      <textarea placeholder="お問い合わせ内容"  name="contact"><?php print(htmlspecialchars($_POST['contact'])); ?></textarea>
      <?php if($error['contact'] === 'blank'): ?>
      <p id="error-text">お問い合わせ内容を入力してください。</p>
      <?php endif; ?>
      <input class="contact-submit" type="submit" value="送信">
    </form>
  </div>
</main>
<!-- main end -->
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