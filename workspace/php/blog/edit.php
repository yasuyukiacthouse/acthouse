<?php $page_title = "編集"; ?>
<?php include "parts/header.php"; ?>
	<?php
		$id = $_GET['id'];
		$post = get_post($id);
	?>
	<div class="container">
		<?php include "parts/form.php"; ?>
	</div>
<?php include "parts/footer.php"; ?>