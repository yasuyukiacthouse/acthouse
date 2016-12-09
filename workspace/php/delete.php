<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>delele</title>
</head>
<body>
	
	<?php
		$db = new PDO('mysql:host=localhost;dbname=acthouse;charset=utf8mb4','root', '');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$id = $_GET['id'];
			$sql = "delete from students where id = ?";
			$stmt = $db->prepare($sql);
			$success = $stmt->execute(array($id));/*executeでパラメーターを実行する*/
			header("Location: index.php");/*その場所にブラウザーが飛ばす。*/
			exit();

/*URLの？以下のIDを取得できる。*/
			// $sql = "select * from students where id = ${id}";/*シングルコーテーションだと変数が埋め込まれない。注意。*/
			// $student = $db->query($sql)->fetch();/*fetchはforeacの一度だけ進めるやつ*//*queryを実行し結果セットを返す*/
	?>

</body>
</html>