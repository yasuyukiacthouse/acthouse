<?php $page_title = "投稿された"; ?>
<?php include "parts/header.php"; ?>
	<?php
		$title = $_POST['title'];
		$content = $_POST['content'];
		$id = $_POST['id'];
		if (empty($id)) {
			/*新規作成*/
			$sql = "insert into posts (title, content) values (?, ?)";
			$success = get_db()->prepare($sql)->execute(array($title, $content));
			/*画像更新時にidを使用するので、最新のレコードのidを取得*/
			$sql = "select * from posts order by id desc limit 1";
			$post = get_db()->query($sql)->fetch();
			$id = $post['id'];
		} else {
			/*編集時処理*/
			$sql = "update posts set title = ?, content = ? where id = ?";
			$params = array($title, $content, $id);
			$success = get_db()->prepare($sql)->execute($params);/*編集時はidが	$_POSTで送られてきているの$idをそのまま使う。*/
		}

		$image = $_FILES['image'];
		if ($image['error'] == 0) {
			$path = "uploads/${id}";
			@mkdir($path, 0777, true);/*mkdir　ディレクトリを作る*//*ディレクトリとファイルを一気に作るのを可能にしているのがtrue*/

			$image_name = $image['name'];
			$image_type = $image['type'];
			$image_path = "${path}/${image_name}";
			move_uploaded_file($image['tmp_name'], $image_path);/*tmp_name一時的に保存されたファイルの名前。*//*一時的に保存しているところからmoveしていている。*/
			$sql = "update posts set image_path = ?, image_type = ? where id = ?";
			$params = array($image_path, $image_type, $id);
			$success = get_db()->prepare($sql)->execute($params);
		}

		if (isset($_POST['draft'])) {
		$sql = "update posts set status = 'draft' where id = ${id}";
		get_db()->query($sql);
		}
		?>
	<p>投稿されました</p>
	<a href="index.php">TOPに戻る</a>
<?php include "parts/footer.php"; ?>