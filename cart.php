<?php
//セッション利用の宣言
session_start();
//session_destroy();

//$_SESSION["cart"]の有無を確認
if(!isset($_SESSION["cart"])){
	$_SESSION["cart"] = array();
}

//カートに商品を入れたとき
if(isset($_GET["code"])){
	$code   = $_GET["code"];
	$hinmei = $_GET["hinmei"];
	$price  = $_GET["price"];
	$kosu   = $_GET["kosu"];
	
	//同一商品がカートの中にある場合は個数のみ加算する
	$umu = 0;     //0:同一商品なし　1：同一商品あり
	$sinakazu = count($_SESSION["cart"]);
	for($i=0; $i<$sinakazu; $i++){
		if($_SESSION["cart"][$i]["code"] === $code){
			$_SESSION["cart"][$i]["kosu"]
					 = $_SESSION["cart"][$i]["kosu"] + $kosu;
			$umu = 1;
			break;
		}
	}
	
	//セッションにデータを保存
	if($umu === 0){
		$i = count($_SESSION["cart"]);
		$_SESSION["cart"][$i]["code"]   = $code;
		$_SESSION["cart"][$i]["hinmei"] = $hinmei;
		$_SESSION["cart"][$i]["price"]  = $price;
		$_SESSION["cart"][$i]["kosu"]   = $kosu;
	}
	
	//リロード対策
	header("Location: cart.php");
	exit;
}

//カートの中を空にする
if(isset($_GET["delete"])){
	$_SESSION["cart"] = array();
	
	/* リロード対策 */
	header("Location: cart.php");
	exit;
}


//指定した商品を削除する
if(isset($_GET["delno"])){
	$delno = $_GET["delno"];
	unset($_SESSION["cart"][$delno]);
	$_SESSION["cart"]
							 = array_values($_SESSION["cart"]);
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
		<link rel="stylesheet" href="css/cart.css">
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

	<!-- main start -->
<main>
  <div class="wrapper">
			<h2>ショッピングカート</h2>
			<?php
			$sinakazu = count($_SESSION["cart"]);
			if($sinakazu === 0){
			?>
			<p>現在、カートの中には商品が入っておりません。<br>
			買い物を続けるには下の「買い物を続ける」ボタンを
			クリックしてください。
			</p>
			<?php }else{ 
				$total = 0;
			?>
			<table border="1">
				<tr>
					<th>商品コード</th>
					<th>商品名</th>
					<th>商品価格（税込）</th>
					<th>個数</th>
					<th>金額</th>
					<th>削除</th>
				</tr>
			<?php for($i=0; $i<$sinakazu; $i++){ ?>	
				<tr>
					<td><?php print($_SESSION["cart"][$i]["code"]); ?></td>
					<td><?php print($_SESSION["cart"][$i]["hinmei"]); ?></td>
					<td><?php print($_SESSION["cart"][$i]["price"]); ?>円</td>
					<td><?php print($_SESSION["cart"][$i]["kosu"]); ?>個</td>
					<td><?php
							$kingaku = $_SESSION["cart"][$i]["kosu"] * $_SESSION["cart"][$i]["price"];
							$total = $total + $kingaku;
					?>円</td>
					<td><a href="cart.php?delno=<?php print($i); ?>">削除</a></td>
				</tr>
				<?php } ?>
				<tr>
					<th colspan="4">小計</th>
					<td><?php print($total); ?>円</td>
					<td></td>
				</tr>
			</table>
			<p>上記内容で
			<?php } ?>よろしければ「レジに進む」ボタンをクリックしてください。</p>
				<a class="anker" href="cart.php?delete=yes">カートの中を空にする</a>
				<div class="btn-wrapper">
				<a href="item.php"><img src="images/btn/shopping.png" alt="買い物を続ける"></a>
				<a href="regi.html"><img src="images/btn/reji.png" alt="買い物を続ける"></a>
				</div>
  </div>
</main>
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