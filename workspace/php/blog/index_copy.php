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
		<div class="container">
			<div class="article">
				<p class="blog-date">16 Nov, 2016</p>
				<div class="blog-image-size">
					<img src="images/image1.jpg" class="blog-image">
				</div>
				<div class="blog-container">
					<h2 class="blog-title">リデザインされた木製Vespaが美しい</h2>
					<p class="blog-honbun">職人のCarlos
					Albertoさんが娘のために作り上げたVespa Danielaの完成度がすごい。</p>
				</div>
			</div>

			<div class="article" style="clear: both;">
				<p class="blog-date">02 Nov, 2016</p>
				<div class="blog-image-size">
					<img src="images/image2.jpg" class="blog-image">
				</div>
				<div class="blog-container">
					<h2 class="blog-title">ユニークなデザインの日本の家 #2</h2>
					<p class="blog-honbun">すごい綺麗。いい。</p>
				</div>
			</div>

			<div class="article" style="clear: both;">
				<p class="blog-date">28 Oct, 2016</p>
				<div class="blog-image-size">
					<img src="images/image3.jpg" class="blog-image">
				</div>
				<div class="blog-container">
					<h2 class="blog-title">パグ犬Normの日常</h2>
					<p class="blog-honbun">シアトル在住のアーティストJeremy Veachさんが撮る、バグの愛犬Normくんのポートレート。</p>
				</div>
			</div>

			<div class="article" style="clear: both;">
				<p class="blog-date">13 Oct, 2016</p>
				<div class="blog-image-size">
					<img src="images/image4.jpg" class="blog-image">
				</div>
				<div class="blog-container">
					<h2 class="blog-title">光を操るジェームズ・タレル、3つの展覧会</h2>
					<p class="blog-honbun">光と空間をテーマにしたインスタレーションを数多く制作し、今年70歳を迎えるアメリカ人アーティスト、ジェームズ・タレル。そんな彼の作品が観られる展示が、今年はアメリカ国内で相次いでいます。</p>
				</div>
			</div>

			<div class="article" style="clear: both;">
				<p class="blog-date">09 Sep, 2016</p>
				<div class="blog-image-size">
					<img src="images/image5.jpg" class="blog-image">
				</div>
				<div class="blog-container">
					<h2 class="blog-title">時間とともに流れ落ちるポートレート写真</h2>
					<p class="blog-honbun">ポートランド在住のフォトグラファー、Ben DeHaanが写す一風変わったポートレート写真。</p>
				</div>
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
						<img src="image.php?id=<?php echo $main['id']; ?>" alt="	<?php echo $main['title']; ?>">
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
					<div class="blog-image-size">
						<img src="image.php?id=<?php echo $row['id']; ?>" alt="	<?php echo $row['title']; ?>">
					</div>
					<a href="show.php?id=<?php echo $row['id']; ?>">
					<div>投稿日時:<?php echo $row['created_at']; ?></div>
					<div><?php echo $row['title']; ?></div>
					<?php
						$content = $row['content'];
						if (mb_strlen($content) >= 50) {/*strlenは文字数を判断*//*mbはマルチバイト*/
							$content = substr($content, 0, 50);/*substrは文字を抜き出す。0から50文字*/
							$content .= '...';/*.は繋げているだけ*/
						}
					?>
					<div><?php echo $content; ?></div>
					</a>
				</article>
				<hr>
			<?php endforeach; ?>
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