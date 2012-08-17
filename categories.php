<?php include('db.inc.php'); ?>
<?php $_SESSION['page'] = "cats"; ?>
<?php include('header.php'); ?>
	<div id="content">
		<div id="fullwidth">
			<h1>Our Product Categories</h1>
			<div id="container">		
				<ul id="portfolio">
				<?php //Fetching list of categories from database
				$catQuery = mysql_query("SELECT * from categories WHERE parent=0");
				while($result = mysql_fetch_array($catQuery)) {				
				?>
					<li>
						<a href="products.php?cat=<?php echo $result['catid']; ?>">
							<img src="images/products/thumb_<?php echo $result['catimg']; ?>" alt="<?php echo $result['catname']; ?>" />
							<?php echo $result['catname']; ?>
						</a>
					</li>
				<?php } ?>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>
<?php include('footer.php'); ?>