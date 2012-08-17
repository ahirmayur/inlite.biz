<?php include('db.inc.php'); ?>
<?php $_SESSION['page'] = "contact"; ?>
<?php include('header.php'); ?>
	<div id="content">
		<div id="maincontent">
			<script src="./script/contact.js" type="text/javascript"></script>
			<h1>Contact Us</h1>
			<p>We promise to address your enquires within two business days.</p>
				<div class="errordiv"></div>
				<div class="correctdiv" id="correctdiv">
					Thanks, we will reply your message very soon.
				</div>
				<form name ="contactform" id="frmcontact" method="post" action="#" >
					<div>
						<label for="cname">Your Name<span>*</span></label> <input type="text" name="cname" class="textboxcontact" id="cname" /> <br />
						<label for="cemail">Email<span>*</span></label> <input type="text" name="cemail" class="textboxcontact" id="cemail" /> <br />
						<label for="cphone">Contact<span>*</span></label> <input type="text" name="cphone" class="textboxcontact" id="cphone" /> <br />
						<label for="ccomp">Company</label> <input type="text" name="ccomp" class="textboxcontact" id="ccomp" /><br />
						<label for="caddr">Address</label> <textarea cols="50" rows="5" name="caddr" id="caddr" class="textareacontact"></textarea><br />
						<label for="cmsg">Message<span>*</span></label> <textarea cols="50" rows="10" name="cmsg" id="cmsg" class="textareacontact"></textarea> <br />
						<label></label><input type="submit" name="submit" id="submit" value="Submit" class="submitcontact" />
					</div>
				</form>
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
			<div class="boxnav">
				<h3 class="titlenav">Reach to Us</h3>
				<!-- Google Maps Element Code -->
				<iframe frameborder=0 marginwidth=0 marginheight=0 border=0 style="border:0;margin:0;width:260px;height:260px;" src="http://www.google.com/uds/modules/elements/mapselement/iframe.html?maptype=hybrid&latlng=18.94487239301223%2C72.82663106918335&mlatlng=18.944671%2C72.826668&maddress1=Dr%20Cawasji%20Hormusji%20St%2C%20Kalbadevi&maddress2=Mumbai%2C%20Maharashtra%2C%20India&zoom=16&mtitle=In%20Lite%20Products&element=true" scrolling="no" allowtransparency="true"></iframe>			
			</div>
			<!--
			<div class="boxnav">
				<h3 class="titlenav">Testimonial</h3>
				<div class="boxnavcontent">
					<ul class="listtestimonialnav">
						<li>
							<img src="./images/avatar_1.png" alt="John Doe" />
							<div class="contenttestinav">
								<h4>Mayur Ahir</h4>
								<h5><a href="#">http://www.eantrix.net</a></h5>
								<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec ornare augue ante, vel faucibus sem.</p>
							</div>
						</li>
						<li>
							<img src="./images/avatar_2.png" alt="Jane Doe" />
						<div class="contenttestinav">
								<h4>Jagruti Ahir</h4>
								<h5><a href="#">http://www.eantrix.net</a></h5>
						<p>Donec ornare augue ante, vel faucibus sem. Pellentesque.</p>
						</div>
						</li>
					</ul>
					<div class="clear"></div>
					<a href="testimonial.php" class="butmore">Read More</a>
					<div class="clear"></div>
				</div>
			</div>
			-->
		</div>
		<div class="clear"></div>
	</div>
<?php include('footer.php'); ?>