<?php include('db.inc.php'); ?>
<?php $_SESSION['page'] = "cats"; ?>
<?php 
if ($_GET['cat']) {
	include('header.php');
	
	$getCat = $_GET['cat'];
	$getCat = mysql_real_escape_string($getCat);
	
	function getCatName($categoryID)
	{
		$itemQuery = mysql_query("SELECT * from categories WHERE catid=".$categoryID);
		while($result = mysql_fetch_array($itemQuery)) {
			echo $result['catname'];
		}
	}
	
	function catHasChild($getCat)
	{
		$prodQuery = mysql_query("SELECT * from categories where parent=".$getCat);
		if ( mysql_num_rows($prodQuery) != 0 )
			return true;
		else
			return false;
	}
	
	if(catHasChild($getCat))
	{ ?>
		<div id="content">
			<div id="fullwidth">
				<h1><?php getCatName($getCat); ?></h1>
				<div id="container">		
					<ul id="portfolio">
					<?php //Fetching list of sub-categories from database
					$catQuery = mysql_query("SELECT * from categories where parent=".$getCat);
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
	<?php }	
	else { ?>
	<div id="content">
		<div id="fullwidth">
			<h1><?php getCatName($getCat); ?></h1>
			<div id="container">		
				<ul id="portfolio">
				<?php //Fetching list of categories from database
				$prodQuery = mysql_query("SELECT * from products where catid=".$getCat);
				while($result = mysql_fetch_array($prodQuery)) {				
				?>
					<li>
						<a href="product.php?id=<?php echo $result['prodid']; ?>" title="Product 1 Description">
							<img src="images/products/thumb_<?php echo $result['prodimg']; ?>" alt="<?php echo $result['prodname']; ?>" />
							<?php echo $result['prodname']; ?>
						</a>
					</li>
				<?php } ?>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<?php } 
	include('footer.php');
}?>