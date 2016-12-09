<?php
	$a = <<<EOT
この記事は半保護されています。（半保護の方針による半保護）
EOT;
	 /*変数は$で始まる*//*大文字小文字を認識*//*EOT;のあとはコメントすら入れちゃダメ*/
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		$db = new PDO('mysql:host=localhost;dbname=acthouse;charset=utf8mb4','root', '');/*php data objects　これがなかったら、データベースごとにいろいろ変えなければいけない。言語を翻訳してくれる。*/
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		/*これはエラーが出てわかるように書いている。*/
	/*->　は関すうを呼び出し。dbのsetattributeという関すうを呼び出している。*/

		if (isset($_POST['name'])) {/*issetはこの変数があればtrue*/
			$insert_sql = "insert into students (name, gender, age) value (?, ?, ?)";
			$name = $_POST['name'];
			$gender = $_POST['gender'];
			$age = $_POST['age'];
			$stmt = $db->prepare($insert_sql);
			$success = $stmt->execute(array($name, $gender, $age));
		}
		$sql = "select * from students";
		$stmt = $db->query($sql);
	?>
		<!-- newはインスタンスを生成する -->
		<!-- 今データベースmysQLにアクセスしようとしている -->
		<style>
			table { border-collapse: collapse; }
			table td {
				border:1px solid gray;
			}
		</style>
	<table>
		<tr>
			<td>id</td>
			<td>名前</td>
			<td>性別</td>
			<td>年齢</td>
			<td></td>
		</tr>
		<?php foreach($stmt as $row) { ?><!-- stmtを一行進めると次の行が帰ってくる。 -->
			<tr>
				<td><?php echo $row['id'];?></td>
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row['gender'];?></td>
				<td><?php echo $row['age'];?></td>
				<td>
					<a href="edit.php?id=<?php echo $row['id']; ?>">編集</a>
					<a href="delete.php?id=<?php echo $row['id']; ?>">削除</a>
				</td>
			</tr>
		<?php } ?>
	</table>

	<div>
		<form action="" method="post">
			名前：<input type="text" name="name">
			性別：<input type="text" name="gender">
			年齢：<input type="text" name="age">
			<button>作成</button>
		</form>
	</div>

	<pre>
		<?php
		$arr = array(
			'red' => array('apple', 'cherry'),
			'yellow' => array('banana', 'mango'),
			'purple' => 'grape'
		);
		print_r($arr);
		?><!-- 配列の配列　の事を多次元配列 -->
	</pre>

	<pre>
	<?php
		$arr = array('red' => 'apple', 'yellow' => 'banana', 'orange' => 'orange');
		print_r($arr);
		?>
	</pre>

	<pre>
	<?php
		$arr = array('apple', 'banana', 'cherry');
		print_r($arr);/*print_r　命令。メソッド。配列を表示する。*/
	?>
	</pre>

	<hr>
		<!-- スーパーグローバル変数。PHPのどこからでもアクセスできる -->
	<h4>$_SERVER</h4><!-- サーバーの反対はクライアント -->
		<pre><?php print_r($_SERVER); ?></pre>
	<h4>$_GET</h4>
		<pre><?php print_r($_GET); ?></pre>/
	<h4>$_POST</h4>	
		<pre><?php print_r($_POST); ?></pre>
	<h4>$_FILES</h4>
		<pre><?php print_r($_FILES); ?></pre>
	<h4>$_COOKIE</h4>
		<pre><?php print_r($_COOKIE); ?></pre>
		<!-- cookie webサーバーがそれぞれのブラウザに保存される facebookなどのログイン情報。-->
		<!-- sessino いろんなページをまたいで使える変数 -->

	<form action="" method="post" enctype="multipart/form-data"><!-- 画像を送る際はfromにmultipart/form-dataをつける -->
		<input type="text" name="test1" value="テスト">
		<input type="radio" name="radio1" value="r1">R1
		<input type="radio" name="radio2" value="r2">R2
		<input type="radio" name="radio3" value="r3">R3
		<input type="file" name="file">
		<button type="botton">送信</button>
	</form>
	<?php echo($a); ?>
</body>
</html>
