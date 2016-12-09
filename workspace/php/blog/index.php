<?php $page_title = "ブログ"; ?>
<?php include "parts/header.php"; ?>

	<div class="all">
		<h1 id="title">やすのつぶやき</h1>
			<div class="header">
				<a href="#">Home</a>
				<a href="#">contact</a>
				<a href="#">about</a>
			</div>

			<div id="first-image1" class="image-selection active"></div>
			<div id="first-image2" class="image-selection"></div>
			<div id="first-image3" class="image-selection"></div>
			<div id="first-image4" class="image-selection"></div>
			<div class="full-btn">
				<div class="btn">1</div>
				<div class="btn">2</div>
				<div class="btn">3</div>
				<div class="btn">4</div>
			</div>
			<br style="clear:both;">
<div style="overflow:hidden">

			<div class="article" style="clear: both;">
	<div class="container">

		<?php
			if (!isset($_GET['o'])
				or empty($_GET['o'])
				or $_GET['o'] < 0) {
				$offset = 0;
			} else {
				$offset = $_GET['o'];
			}
			if(isset($_GET['draft'])) {
				$posts = get_drafts($offset);
				$count = get_drafts_count();
				$params = ["draft" => ""];
			} else {
				$posts = get_posts($offset);
				$count = get_posts_count();
				$params = [];
			}
		?>
		<div class="container">
			<a href="new.php">新規投稿</a>
			<a href="index.php?draft">下書き一覧</a>
			<a href="pictures.php">写真一覧</a>
		<ul class="pagination">
			<li>
				<?php
					$limit = get_limit();
					$prev_offset = $offset - $limit;
					$next_offset = $offset + $limit;
				?>
				<?php if ($prev_offset >= 0) : ?>
					<?php
						$params["o"] = $prev_offset;
						link_tag("index.php", "前へ", $params);
					?>
					<?php endif; ?>
				</li>
				<li>
					<?php
					for($i =0; $i<$count; $i++) {
						if ( $i % $limit == 0) {
							$page = $i / $limit;
							$page_offset = $page * $limit;
							$params["o"] = $page_offset;
							link_tag("index.php", $page + 1, $params);
							}
						}
					?>
				<?php if ($next_offset < $count) : ?>
				</li>
				<li>
					<a href="index.php?o=<?php echo $next_offset; ?>">次へ</a>
				</li>
				<?php endif; ?>
				</ul>

				<div style="border: 1px solid red;">
					<?php $main = $posts->fetch(); ?>
					<?php
						$likes = $main['likes'];
						if ($likes == 0) : ?>
						<p>いいねはまだありません</p>
					<?php else : ?>
						<p><?php echo $likes; ?>回いいね	！されています。</p>
					<?php endif; ?>

					<h2>メイン記事<h2>
					<div class="blog-image-size">
						<img class="blog-image" src="image.php?id=<?php echo $main['id']; ?>" alt="	<?php echo $main['title']; ?>">
					</div>
					<a href="show.php?id=<?php echo $main['id']; ?>">
						<div>投稿日時:<?php echo $main['created_at']; ?></div>
						<h3><?php echo $main['title']; ?></h3>
						<h3><?php echo $main['content']; ?></h3>
					</a>
				</div>
				<?php foreach($posts as $row) : ?>

				<article>
					<?php
						$likes = $row['likes'];
						if ($likes == 0) : ?>
						<p>いいねはまだありません</p>
					<?php else : ?>
						<p><?php echo $likes; ?>回いいね	！されています。</p>
					<?php endif; ?>
					<a href="show.php?id=<?php echo $row['id']; ?>">
						<div class="blog-date"><?php echo $row['created_at']; ?></div><!-- 投稿日時 -->
					</a>
					<div class="blog-image-size">
						<img class="blog-image" src="image.php?id=<?php echo $row['id']; ?>" alt="	<?php echo $row['title']; ?>">
					</div>
					<div class="blog-container">
						<a href="show.php?id=<?php echo $row['id']; ?>">
							<div class="blog-title"><?php echo $row['title']; ?></div>
							<?php
								$content = $row['content'];
								if (mb_strlen($content) >= 50) {/*strlenは文字数を判断*//*mbはマルチバイト*/
									$content = substr($content, 0, 50);/*substrは文字を抜き出す。0から50文字*/
									$content .= '...';/*.は繋げているだけ*/
								}
							?>
						<div class="blog-honbun"><?php echo $content; ?></div>
						</a>
					</div>
				</article>
				<hr>
			<?php endforeach; ?>
		</div>
	</div>

		<div class="sidebar-right">
			<h3>最近の記事</h3>
			<ul>
				<li>l</li>
				<li>k</li>
				<li>k</li>
				<li>k</li>
				<li>j</li>
			</ul>
			<h3>カテゴリー</h3>
			<ul>
				<li>l</li>
				<li>k</li>
				<li>k</li>
				<li>k</li>
				<li>j</li>
			</ul>
			<h3>アーカイブ</h3>
			<ul>
				<li>l</li>
				<li>k</li>
				<li>k</li>
				<li>k</li>
				<li>j</li>
			</ul>
		</div>

	</div>
		<div class="menu-bottom">
			<a href="#">Home</a>
			<a href="#">contact</a>
			<a href="#">about</a>
		</div>
		<div class="line"></div>
		<a href="#" class="nextpage">Next Page>></a>
		<div class="top"><a href="#"></a></div>
</div>

	<div class="copyright">© yasu oppai all rights reserved.</div>

<script src="jquery/jquery-3.1.1.js"></script>
<script src="jquery/index.js"></script>
<?php include "parts/footer.php"; ?>