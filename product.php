<?php include('db.inc.php'); ?>
<?php $_SESSION['page'] = "cats"; ?>
<?php 
if ($_GET['id']) {
	include('header.php');
	
	$getProd = $_GET['id'];
	$ProdID = $getProd;
	$getProd = mysql_real_escape_string($getProd);
	
	function getProdName($getProd)
	{
		$itemQuery = mysql_query("SELECT * from products WHERE prodid=".$getProd);
		while($result = mysql_fetch_array($itemQuery)) {
			echo $result['prodname'];
		}
	}
	
	function getProdID($getProd)
	{
		$itemQuery = mysql_query("SELECT * from products WHERE prodid=".$getProd);
		while($result = mysql_fetch_array($itemQuery)) {
			echo $result['catid'];
		}
	}
	
	function getProdImg($getProd)
	{
		$itemQuery = mysql_query("SELECT * from products WHERE prodid=".$getProd);
		while($result = mysql_fetch_array($itemQuery)) {
			echo $result['prodimg'];
		}
	}
	
	function getProdDesc($getProd)
	{
		$itemQuery = mysql_query("SELECT * from products WHERE prodid=".$getProd);
		while($result = mysql_fetch_array($itemQuery)) {
			echo $result['proddesc'];
		}
	}
	
	function getCatName($getProd)
	{
		$itemQuery = mysql_query("SELECT * from products WHERE prodid=".$getProd);
		while($result = mysql_fetch_array($itemQuery)) 
		{
			$catQuery = mysql_query("SELECT * from categories WHERE catid=".$result['catid']);
			while($result1 = mysql_fetch_array($catQuery)) {
				echo $result1['catname'];
			}
		}
	}
?>	
	<div id="content">
		<div id="maincontent" class="products">
			<h1><a href="products.php?cat=<?php getProdID($getProd); ?>" title="Go to <?php getCatName($getProd); ?>"><?php getCatName($getProd); ?></a> -  <?php getProdName($getProd); ?></h1>
			<a href="./images/products/<?php getProdImg($getProd); ?>" class="popup" title="<?php getProdName($getProd); ?>"><img src="./images/products/<?php getProdImg($getProd); ?>" alt="<?php getProdName($getProd); ?>" class="imgleft imgframe" /></a>
			<?php getProdDesc($getProd); ?>
			<div class="clear"></div>
			<div id="extracontent">
				<ul>
					<?php $itemQuery = mysql_query("SELECT * FROM items WHERE prodid=".$ProdID) or die('Error, Query failed'); ?>
					<?php while($resulti = mysql_fetch_array($itemQuery)) { ?>
							<li><a href="./images/products/<?php echo $resulti['itemimg']; ?>" class="popup" title="<?php echo $resulti['itemdesc']; ?>"><img src="./images/products/thumb_<?php echo $resulti['itemimg']; ?>" alt="<?php echo $resulti['itemdesc']; ?>" class="imgleft imgframe imgframe2" /></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<div id="nav">
			<div class="boxnav">
				<h3 class="titlenav">Contact Details</h3>
				<div class="boxnavcontent">
					<h3>In-Lite Products</h3><br />
					<p><strong>Mr. Naresh Shahri</strong><br />
					Shop No. 2, A S Dias Building,<br />
					272, Dr. Cawasji Hormusji Street,<br />
					Dhobi Talao, Mumbai - 400 002,<br />
					Maharashtra, India.</p>
					<p><strong>Email</strong><br />
					contact@inlite.biz / 
					support@inlite.biz<br /></p>
					<p><strong>Telephone</strong><br />
					+(91)-(22)-22010207 / 39562155<br /></p>
					<p><strong>Mobile</strong><br />
					+(91)-9820220984<br /></p>
					<p><strong>Fax</strong><br />
					+(91)-(22)-39562166<br /></p>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
<?php include('footer.php'); } ?>