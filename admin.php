<?php include('db.inc.php'); ?>
<?php $_SESSION['page'] = "admin"; ?>
<?php include('header.php'); ?>
	<div id="content">
		<div id="maincontent">
			<h1>Administration</h1>
			<?php
			if(isset($_GET['task']) && $_GET['task'] == 'logout') {
				unset($_SESSION['isadmin']);
				echo "<META HTTP-EQUIV=Refresh CONTENT='0; URL=./admin.php'>";
			}
			if(isset($_POST['adminsubmit'], $_POST['username'], $_POST['password'])) {
				$user = "admin"; $pass = "inlite.biz";
				if(mysql_real_escape_string($_POST['username']) == $user && mysql_real_escape_string($_POST['password']) == $pass) {
					$_SESSION['isadmin'] = '1'; // store session data
					echo "<META HTTP-EQUIV=Refresh CONTENT='0; URL=./admin.php'>";
				}
				else
				{ ?>
				<div class="errordiv">Invalid Username/Password Entered!</div>
				<?php }
			}
			if(isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == '1') { ?>
			<div>
				<ul>
					<li><a href="./admin-cat.php">Manage Categories</a></li>
					<li><a href="./admin-prod.php">Manage Products</a></li>
					<li><a href="./admin-item.php">Manage Image</a></li>
					<li><a href="./admin-desc.php">Manage Product Description</a></li>
				</ul>
			</div>
			<?php
			} else { ?>
			<form name ="adminlogin" id="frmcontact" method="post" action="#" >
				<div>
					<label for="username">Username</label> <input type="text" name="username" class="textboxcontact" id="username" /> <br />
					<label for="password">Password</label> <input type="password" name="password" class="textboxcontact" id="password" /> <br />
					<label></label><input type="submit" name="adminsubmit" id="adminsubmit" value="Submit" class="submitcontact" />
				</div>
			</form>
			<?php } ?>
		</div>
		<div class="clear"></div>
	</div>
<?php include('footer.php'); ?>