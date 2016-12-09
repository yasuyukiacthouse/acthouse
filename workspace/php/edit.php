<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>編集</title>
</head>
<body>
	<?php
		$db = new PDO('mysql:host=localhost;dbname=acthouse;charset=utf8mb4','root', '');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if (isset($_POST['id'])) {
			$sql = "update students set name = ?, gender = ?, age = ? where id = ?";
			$id = $_POST['id'];
			$name = $_POST['name'];
			$gender = $_POST['gender'];
			$age = $_POST['age'];
			$stmt = $db->prepare($sql);
			$success = $stmt->execute(array($name, $gender, $age, $id));/*executeでパラメーターを実行する*/
			header("Location: index.php");/*その場所にブラウザーが飛ばす。*/
			exit();
		}

		$id = $_GET['id'];/*URLの？以下のIDを取得できる。*/
		$sql = "select * from students where id = ${id}";/*シングルコーテーションだと変数が埋め込まれない。注意。*/
		$student = $db->query($sql)->fetch();/*fetchはforeacの一度だけ進めるやつ*//*queryを実行し結果セットを返す*/
		?>
		<?php echo $sql; ?>
			<form action="" method="post">
				<input type="text" name="name" value="<?php echo $student['name']; ?>">
				<input type="text" name="gender" value="<?php echo $student['gender']; ?>">
				<input type="text" name="age" value="<?php echo $student['age']; ?>">
				<input type="hidden" name="id" value="<?php echo $student['id']; ?>">
				<button>変更</button>
			</form>

</body>
</html>