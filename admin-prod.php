<?php include('db.inc.php'); ?>
<?php $_SESSION['page'] = "admin"; ?>
<?php 
	include('header.php');
	function getCatName($categoryID)
	{
		$itemQuery = mysql_query("SELECT * from categories WHERE catid=".$categoryID);
		while($result = mysql_fetch_array($itemQuery)) {
			echo $result['catname'];
		}
	}
?>
<?php if(isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == '1') { ?>
	<div id="content">
		<div id="fullwidth">
			<h1>Product Manager</h1>
			<hr />
			<h2>Add New Product</h2>
			<?php 				
				if(isset($_POST['submitnewprod'])) 
				{ 
					$newprodcat = mysql_real_escape_string($_POST['prodcat']);
					$newprodname = mysql_real_escape_string($_POST['prodname']);
					if($_POST['proddesc'] != '')
						$newproddesc = mysql_real_escape_string($_POST['proddesc']);
					else
						$newproddesc = "Coming Soon...";
					
					if($newprodcat != '' && $newprodname != '' && $newproddesc != '')
					{
						define ("MAX_SIZE","64"); 
						// define the width and height for the thumbnail
						define ("WIDTH","200"); 
						define ("HEIGHT","115"); 
						
						// this is the function that will create the thumbnail image from the uploaded image
						function make_thumb($img_name,$filename,$new_w,$new_h)
						{
							$ext = getExtension($img_name);
							if(!strcmp("jpg",$ext) || !strcmp("jpeg",$ext))
								$src_img = imagecreatefromjpeg($img_name);
						
							if(!strcmp("png",$ext))
								$src_img = imagecreatefrompng($img_name);
						
							//gets the dimmensions of the image
							$old_x = imageSX($src_img);
							$old_y = imageSY($src_img);
						
							// next we will calculate the new dimmensions for the thumbnail image
							$ratio1 = $old_x/$new_w;
							$ratio2 = $old_y/$new_h;
							if($ratio1>$ratio2)	{
								$thumb_w = $new_w;
								$thumb_h = $old_y/$ratio1;
							}
							else {
								$thumb_h = $new_h;
								$thumb_w = $old_x/$ratio2;
							}
						
							// we create a new image with the new dimmensions
							$dst_img = ImageCreateTrueColor($thumb_w,$thumb_h);
						
							// resize the big image to the new created one
							imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y); 
							
							// output the created image to the file. Now we will have the thumbnail into the file named by $filename
							if(!strcmp("png",$ext))
								imagepng($dst_img,$filename); 
							else
								imagejpeg($dst_img,$filename); 
						
							//destroys source and destination images. 
							imagedestroy($dst_img); 
							imagedestroy($src_img); 
						}
						
						// This function reads the extension of the file. 
						// It is used to determine if the file is an image by checking the extension. 
						function getExtension($str) {
							$i  =  strrpos($str,".");
							if (!$i) { return ""; }
							$l  =  strlen($str) - $i;
							$ext  =  substr($str,$i+1,$l);
							return $ext;
						}
						
						$errors = 0;
						//reads the name of the file the user submitted for uploading
						$image = $_FILES['prodimg']['name'];
						// if it is not empty
						if ($image) {
							// get the original name of the file from the clients machine
							$filename  =  stripslashes($_FILES['prodimg']['name']);
							// get the extension of the file in a lower case format
							$extension  =  getExtension($filename);
							$extension  =  strtolower($extension);
							if (($extension !=  "jpg") && ($extension !=  "jpeg") && ($extension !=  "png")) {
								echo '<h1>Unknown extension!</h1>';
								$errors = 1;
							}
							else {
								// get the size of the image in bytes
								// $_FILES[\'image\'][\'tmp_name\'] is the temporary filename of the file in which the uploaded file was stored on the server
								$size = getimagesize($_FILES['prodimg']['tmp_name']);
								$sizekb = filesize($_FILES['prodimg']['tmp_name']);
								
								//compare the size with the maxim size we defined and print error if bigger
								if ($sizekb > MAX_SIZE*1024*1024) {
									echo '<h1>You have exceeded the size limit!</h1>';
									$errors = 1;
								}
								//we will give an unique name, for example the time in unix time format
								$image_name = time().'.'.$extension;
								//the new name will be containing the full path where will be stored (images folder)
								$newname = "images/products/".$image_name;
								$copied  =  copy($_FILES['prodimg']['tmp_name'], $newname);
								//we verify if the image has been uploaded, and print error instead
								if (!$copied) {
									echo '<h1>Copy unsuccessfull!</h1>';
									$errors = 1;
								}
								else {
									// the new thumbnail image will be placed in images/thumbs/ folder
									$thumb_name = 'images/products/thumb_'.$image_name;
									// call the function that will create the thumbnail. The function will get as parameters 
									//the image name, the thumbnail name and the width and height desired for the thumbnail
									$thumb = make_thumb($newname,$thumb_name,WIDTH,HEIGHT);
								}
							}	
						}
						if(!$errors) {
							$addnewprodquery = "INSERT INTO products (catid,prodname,proddesc,prodimg) VALUES ('".$newprodcat."','".$newprodname."','".$newproddesc."','".$image_name."')";
							mysql_query($addnewprodquery) or die('Error, insert query failed');
							echo "<div style='font-size:12px; color:#008C00;'>New Product added successfully</div>"; 
						}
					}
					else
						echo "<div style='font-size:12px; color:#CC0000;'>Please fill all details</div>";
				}
			?>
			<?php //Fetching list of categories from database
				$catQuery = mysql_query("SELECT * from categories");				
			?>
			<form method="post" name="addnewprod" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="frmcontact" enctype="multipart/form-data" >
				<div>
					<label for="prodcat">Select Category:</label>
						<select name="prodcat" id="prodcat" class="textboxcontact">
							<option value="">Please select category</option>
						<?php while($result = mysql_fetch_array($catQuery)) { ?>
							<option value="<?php echo $result['catid']; ?>"><?php echo $result['catname']; ?></option>
						<?php } ?>
						</select> <br />
					<label for="prodname">Product Name:</label> 
						<input type="text" name="prodname" id="prodname" class="textboxcontact" /><br />
					<label for="prodimg">Product Image:</label> 
						<input type="file" name="prodimg" id="prodimg" class="textboxcontact" /><br />
					<label>Product Description:</label> 
					<div class="editor" style="padding-left:150px;">
					<?php 
						require_once("ckeditor/ckeditor.php");
						$CKEditor = new CKEditor();
						$CKEditor->basePath = 'ckeditor/';
						$CKEditor->config['width'] = 800;
						$CKEditor->config['height'] = 200;
						$CKEditor->config['EditorAreaStyles'] = 'p {font-size:17px; text-align:justify;}';
						$CKEditor->editor('proddesc', $description);
					?>
					</div><br />
					<label></label>
						<input type="submit" name="submitnewprod" value="Submit" class="submitcontact" />
				</div>
			</form>
			<hr />
		</div>
	</div>
<?php 
}
else 
echo "<META HTTP-EQUIV=Refresh CONTENT='0; URL=./admin.php'>";
include('footer.php');
?>