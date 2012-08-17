<?php include('db.inc.php'); ?>
<?php $_SESSION['page'] = "admin"; ?>
<?php include('header.php'); ?>
<?php if(isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == '1') { ?>
	<div id="content">
		<div id="fullwidth">
			<h1>Product Description Manager</h1>
			<hr />
			<h2>Add/Edit Product Description</h2>
			<?php 				
				if(isset($_POST['getProductDesc'])) 
				{ 
					$item = mysql_real_escape_string($_POST['prentitem']);
					if($item == '')
						echo "<div style='font-size:12px; color:#CC0000;'>Please Select Product</div>";
					else if(isset($_POST['prodDesc'])) {
						$desc = mysql_real_escape_string($_POST['prodDesc']);
						$query = "UPDATE products SET proddesc='$desc' WHERE prodid = '$item'";
						$result = mysql_query($query) or die('Error, Update query failed');
						echo "<div style='font-size:12px; color:#008C00;'>Description Updated Successfully</div>"; 
					}
					if($item != '')
					{
						$getProductInfo = "SELECT * FROM products WHERE prodid = ".$item;
						$result = mysql_query($getProductInfo) or die('Error, Select query failed');
						while($row = mysql_fetch_array($result)) {
							$prodID = $row['prodid'];
							$description = $row['proddesc'];
						}
					}
				}
			?>
			<?php //Fetching list of categories from database
				$catQuery = mysql_query("SELECT * from categories");			
			?>
			<form method="post" name="getProductDescForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="frmcontact" enctype="multipart/form-data" >
				<div>
					<label for="prentitem">Parent Item:</label> 
						<select name="prentitem" id="prentitem" class="textboxcontact">
							<option value="">--- Please Select Item ---</option>
						<?php while($result = mysql_fetch_array($catQuery)) { ?>
							<option value=""><?php echo $result['catname']; ?></option>
							<?php $prodQuery = mysql_query("SELECT * from products WHERE catid=".$result['catid']); ?>
							<?php while($result1 = mysql_fetch_array($prodQuery)) { ?>
								<option value="<?php echo $result1['prodid']; ?>" <?php if(isset($prodID) && $prodID==$result1['prodid']) echo "selected='selected'" ?> >+---<?php echo $result1['prodname']; ?></option>
							<?php } ?>
							<option value="" ></option>
						<?php } ?>
						</select>
					<div class="editor">
					<?php 
					if(isset($_POST['getProductDesc']) && isset($description)) { 
						require_once("ckeditor/ckeditor.php");
						$CKEditor = new CKEditor();
						$CKEditor->basePath = 'ckeditor/';
						$CKEditor->config['width'] = 900;
						$CKEditor->config['height'] = 400;
						$CKEditor->config['EditorAreaStyles'] = 'p {font-size:17px; text-align:justify;}';
						$CKEditor->editor('prodDesc', $description);
					} 
					?>
					</div>
					<label></label>
						<input type="submit" name="getProductDesc" value="Submit" class="submitcontact" />
				</div>
			</form>
			<div class="clear"></div>
		</div>
	</div>
<?php 
}
else 
echo "<META HTTP-EQUIV=Refresh CONTENT='0; URL=./admin.php'>";
include('footer.php');
?>