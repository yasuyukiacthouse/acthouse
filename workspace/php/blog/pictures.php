<?php $page_title = "画像一覧";
	include "parts/header.php" ?>
	<?php foreach(get_all_posts() as $row) : ?>
		<?php if (is_valid_image($row['image_path'])) : ?>
				<a href="show.php?id=<?php echo $row['id']; ?>">
<!-- 			<div class="blog-image-size" style="clear: both;margin-right: 10px"> -->
				<img src="image.php?id=<?php echo $row['id']; ?>" alt="<?php echo $row['title']; ?>">
			<!-- </div> -->
				</a>
		<?php endif; ?>
	<?php endforeach; ?>
	<?php include "parts/footer.php"; ?>