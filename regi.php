<?php
session_start();

$name = "";
$name_err = "";
$errflg = 0;

if($_SERVER["REQUEST_METHOD"]==="POST"){
	$name = htmlspecialchars($_POST["name"],ENT_QUOTES);
	$name = mb_convert_kana($name,'KV','UTF-8');
	if(mb_strlen($name) === 0){
		$name_err
					 = '<p class="err">名前が未入力です</p>';
		$errflg = 1;
	}	
	
	if($errflg === 0){
		$_SESSION["name"] = $name;
		header("Location: kakunin.php");
		exit;
	}
}

//修正
if(isset($_GET["henkou"])){
	$name = $_SESSION["name"];
}

?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>Goo</title>	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/common.css">
		<link rel="stylesheet" href="css/rigi.css">
	</head>
	<body>
<!-- header start -->
<div class="header">
    <div class="nav">
      <ul>
        <li><a href="index.html">トップ</a></li>
        <li><a href="item.php">商品一覧</a></li>
        <li><a href="rank.html">ランキング</a></li>
        <li><a href="sreep.html">睡眠の重要性</a></li>
      </ul>
    </div>
  </div>
	<!-- header end -->
	<main>
	<div class="wrapper">
		<h2>購入者情報</h2>
				<form method="post" action="regi.php">
					<table border="1">
						<tr>
							<th>氏名</th>
							<td>
							<?php print($name_err); ?>
							<input type="text" name="name" value="<?php print($name); ?>"></td>
						</tr>
					</table>
					<button type="submit">
						<img src="images/btn/kakunin.png"
							alt="注文情報の確認へリンク">
					</button>
				</form>
	</div>
	</main>
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