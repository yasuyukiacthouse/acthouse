<?php
	function get_db() {
		$db = new PDO('mysql:host=localhost;dbname=blog_l;charset=utf8mb4', 'root', '');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $db;
	}
	/*PDOデータベースにアクセスするためのオブジェクトを取ってくる。*/
	function get_post($id) {
	$sql = "select * from posts where id = '${id}'";
	$post = get_db()->query($sql)->fetch();
	return $post;
	}
	/*idを渡して、レコーどを取得している。*/
	function get_limit() {
		return 5;
	}
	function get_posts($offset) {
		$limit = get_limit();
		if ($offset <0) {
			$offset = 0;
		}
		$sql = "select * from posts where status !='draft' order by created_at desc limit ${limit} offset ${offset}";
		$stmt = get_db()->query($sql);
		return $stmt;
	}

	function get_all_posts() {
		$sql = "select * from posts order by created_at desc";
		return get_db()->query($sql);
	}

	function get_drafts($offset) {
		$limit = get_limit();
		$sql = "select * from posts where status = 'draft' order by created_at desc limit ${limit} offset ${offset}";
		return get_db()->query($sql);
		/*statusがdraftなのを取ってくる。*/
	}

	function get_drafts_count() {
		$sql = "select count(*) as count from posts where status = 'draft'";
		$result = get_db()->query($sql)->fetch();
		return $result['count'];
	}
	/*下書きの件数をカウント。件数取る時、count(*)*/

	function get_posts_count() {
		$sql = "select count(*) as count from posts where status != 'draft'";
		$result = get_db()->query($sql)->fetch();
		return $result['count'];
	}

	function link_tag($url, $label, $params) {
		$qs = "?";
		foreach($params as $key => $param) {
			$qs = "${qs}${key}=${param}&";
		}
		$url = "${url}${qs}";
		$tag = "<a href='${url}'>${label}</a>";
		echo $tag;
	}

	function is_valid_image($image_path) {
		return(!empty($image_path) and file_exists($image_path) and !ends_with($image_path));
	}

	function ends_with($str) {
	$end = substr($str, strlen($str) - 1);/*最後の文字を抜き出している。*/
	return $end == '/';
	/*substr指定した位置以降を抜き出す。 strlen文字の長さ。以降の文字を*/
	}
?>