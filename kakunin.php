<?php
session_start();

$name = $_SESSION["name"];
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
		<link rel="stylesheet" href="css/kakunin.css">
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
	<!-- header end --><div class="wrapper">
		<nav>
			<ul id="gnav" class="clearfix">
				<li><a href="item.php">商品一覧へ戻る</a></li>
			</ul>
		</nav>
		
		<main>
			<h2>確認画面</h2>
			<p>内容を確認してお間違いなければ、「注文を確定する」をクリックしてください。</p>
			<h3>購入商品</h3>
			<?php
				$total = 0;
				$sinakazu = count($_SESSION["cart"]);
			?>
			<table border="1">
				<tr>
					<th>商品コード</th>
					<th>商品名</th>
					<th>商品価格（税込）</th>
					<th>個数</th>
					<th>金額</th>
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
							print($total);
					?>円</td>
				</tr>
				<?php } ?>
				<tr>
					<th colspan="4">小計</th>
					<td><?php print($total); ?>円</td>
				</tr>
			</table>
			<p><a href="cart.php">変更する</a></p>

			<h3>購入者情報</h3>
			<table border="1">
				<tr>
					<th>氏名</th>
					<td><?php print($name); ?></td>
				</tr>
			</table>
			<p><a href="regi.php?henkou=yes">変更する</a></p> 
			

			<form method="get" action="order.php">
				<button type="submit" name="kakutei">
					<img src="images/btn/order.png" alt="注文を確定する">
				</button>
			</form>
			
			<form method="get" action="cancel.php">
				<button type="submit" name="cancel">
					<img src="images/btn/cancel.png" alt="キャンセル">
				</button>
			</form>
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