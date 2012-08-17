<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="google-site-verification" content="pDXHEd4c14JbYej0MNJMlWm0McTSeTPjZ9A4v9P0quE" />
	<meta name="description" content="Leading business entity involved in trading and supplying of LED Light Fittings as well as Indoor - Outdoor Light Fittings & Accessories . Our products are easy to install, have excellent back up."/>
	<meta name="keywords" content="led, metal halides, halogen, downlight, inlite"/>
	<title>In Lite - Innovative Ideas</title>
	<style type="text/css" media="all">@import "./style/style.css";</style>
	<style type="text/css" media="all">@import "./style/s3Slider.css";</style>
	<style type="text/css" media="all">@import "./style/right.css";</style>
	<!--[if IE 7]>
	<style type="text/css">@import "./style/ie7.css";</style>
	<![endif]-->
	<script src="./script/jquery.js" type="text/javascript"></script>
	<script src="./script/jquery-ui.js" type="text/javascript"></script>
	<script src="./script/lightbox.js" type="text/javascript"></script>
	<script src="./script/cufon-yui.js" type="text/javascript"></script>
	<script src="./script/easing.js" type="text/javascript"></script>
	<script src="./script/jcarousel.js" type="text/javascript"></script>
	<script src="./script/slideshow.js" type="text/javascript"></script>
	<script src="./script/chunkfive_400.font.js" type="text/javascript"></script>
	<script src="./script/twitter.js" type="text/javascript"></script>
	<script src="./script/gettwitter.js" type="text/javascript"></script>
	<script src="./script/s3Slider.js" type="text/javascript"></script>
	<script src="./script/framework.js" type="text/javascript"></script>
	<script src="./script/jquery.imgareaselect.min.js" type="text/javascript"></script>
	<script src="./script/jquery.pikachoose.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			Cufon.replace('#maincontent h1, #listcontentslide li h3, .boxfrontsmall h2, .titletestimonial, .titlenav, .titlefooter, #fullwidth h1');
			$('a.popup').lightBox({fixedNavigation:true});
			$('#placetabs').tabs({ fx: { opacity: 'toggle' } }).tabs({ fx: { opacity: 'toggle' }});
		});
	</script>	
	<script language="javascript">
		$(document).ready(function (){
			$("#pikame").PikaChoose({carousel:true, carouselVertical:true, transition:[2]});
		});
	</script>
	
	<meta charset="UTF-8">
</head>
<body>
<p>
	<a class="skiplink" href="#maincontent">Skip over navigation</a>
</p>
<div id="wrapper">
	<div id="toparea">
		<ul id="menusocial">
			<li><a href="#" class="replace" id="iconsmallfacebook"><span></span>Facebook</a></li>			
			<li><a href="#" class="replace" id="iconsmalltwitter"><span></span>Twitter</a></li>
			<li><a href="#" class="replace" id="iconsmalllinkedin"><span></span>Linkedin</a></li>
		</ul>
	</div>
	<div id="header">
		<a href="./index.php" class="replace" id="logo"><span></span>In Lite - Innovative Ideas</a>
		<a href="./web-catalogue.pdf" class="brochure">Download Our Brochure</a>
	</div>
	<div id="placemainmenu">
		<ul id="mainmenu">
			<li <?php if($_SESSION['page'] == "home") echo "class='active'"; ?>><a href="./index.php" >Home</a></li>
			<li <?php if($_SESSION['page'] == "about") echo "class='active'"; ?>><a href="./aboutus.php">About Us</a></li>
			<li <?php if($_SESSION['page'] == "cats") echo "class='active'"; ?>><a href="./categories.php" >Products</a>
				<ul>
				<?php //Fetching list of categories from database
				$catQuery = mysql_query("SELECT * from categories WHERE parent='0'");
				while($result = mysql_fetch_array($catQuery)) {				
				?>
					<li <?php if($_SESSION['page'] == "prod") echo "class='active'"; ?>><a href="products.php?cat=<?php echo $result['catid']; ?>" ><?php echo $result['catname']; ?></a></li>
				<?php } ?>
				</ul>
			</li>
			<li <?php if($_SESSION['page'] == "testimonial") echo "class='active'"; ?>><a href="./testimonial.php" >Testimonial</a></li>
			<li <?php if($_SESSION['page'] == "media") echo "class='active'"; ?>><a href="./media.php">Media</a></li>
			<li <?php if($_SESSION['page'] == "contact") echo "class='active'"; ?>><a href="./contactus.php" >Contact Us</a></li>
			<?php 
			if(isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == '1') { ?>
			<li style="float:right;"><a href="./admin.php?task=logout" >Logout</a></li>
			<li <?php if($_SESSION['page'] == "admin") echo "class='active'"; ?> style="float:right;"><a href="./admin.php">Admin</a>
				<ul>
					<li><a href="./admin-cat.php">Manage Categories</a></li>
					<li><a href="./admin-prod.php">Manage Products</a></li>
					<li><a href="./admin-item.php">Manage Image</a></li>
					<li><a href="./admin-desc.php">Manage Product Description</a></li>
				</ul>
			</li>
						
			<?php } ?>
		</ul>
	</div>