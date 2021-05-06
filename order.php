<?
/*セッション利用の宣言
------------------------*/
session_start();

/*送信ボタンが押されたら
------------------------------------*/
if($_SERVER["REQUEST_METHOD"]==="GET"){
	if(isset($_GET["kakutei"]) && isset($_SESSION["name"])){
	
	//セッションからデータを取り出す
		$name=$_SESSION["name"];
		
		//受信した日付けと時間を変数に代入
		$hiduke = date('Y-n-d H:i:s');
		
		//入力データを一つにまとめる
		$data = '';
		$data .= $hiduke      . ',';
		$data .= $name        . ",";
		
		
		$sinakazu = count($_SESSION["kart"]);
		$kingaku = 0;
		$total   = 0;
		for($i=0; $i<$sinakazu;$i++){
			$data .= $_SESSION["kart"][$i]["code"]   . ",";
			$data .= $_SESSION["kart"][$i]["hinmei"] . ",";
			$data .= $_SESSION["kart"][$i]["price"]  . ",";
			$data .= $_SESSION["kart"][$i]["kosu"]   . ",";
			
			$kingaku = $_SESSION["kart"][$i]["price"]*$_SESSION["kart"][$i]["kosu"];
			
			$total = $total + $kingaku;
		}
		$data .= $total . "\n";
		//ファイルに保存する
		$file = fopen('data.csv','a')
		 or die('ファイルオープンエラー');
		
		//ファイルを開く
		//$file = fopen('data.csv','a')or die('ファイルを開く');
		
		//ファイルをロックする
		//fwrite($file,$data);
		
		//ロックを解除する
		//flock($file,LOCK_UN);
		
		//ファイルを閉じる
		//fclose($file);
		
		//fopen⇒fwrite⇒fclose
		file_put_contents('data.csv',$data,FILE_APPEND | LOCK_EX);
		
		
		
		$_SESSION = array();
		$session_name = session_name();
		if(isset($_COOKIE[$session_name])===TRUE){
		 setcookie($session_name,'',time()-9600);
		}
		session_destroy();
		}
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
		<link rel="stylesheet" href="css/order.css">
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
	<main>
		<h2>注文確認画面</h2>
		<p>購入ありがとうございました。</p>
		<p><a href="item.php">商品一覧に戻る</a></p>
	</main>
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