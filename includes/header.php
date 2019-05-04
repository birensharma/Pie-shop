<header>
	<script src="https://www.gstatic.com/firebasejs/5.11.0/firebase.js"></script>
	<script>
			let config = {
				apiKey: "AIzaSyBHJ9vrRyAd034N9gZk1bBalIqd67ZEA84",
				authDomain: "localpieshop.firebaseapp.com",
				databaseURL: "https://localpieshop.firebaseio.com",
				projectId: "localpieshop",
				storageBucket: "localpieshop.appspot.com",
				messagingSenderId: "460778532674"
			};
			firebase.initializeApp(config);
			firebase.auth().onAuthStateChanged(function(user) {
				if (user) {
					console.log('Welcome ', user.email)
				} else {
					location.href = 'index.php'
				}
			});
	</script>
	<div class="nav_toggle" onclick="toggle_class();">

		<span class="toggle_icon"></span>

	</div>

	<div onclick="remove_class()">

		<div class="main_nav">
			<!-- <img src="pie.	png" style="height:30px;width:30px;"/> -->
			<h4><a href="dashboard.php">Local Pie Shop</a></h4>

			<ul class="default_links">

				<li><a href="dashboard.php">Home</a></li>
				<li><a href="menu.php">Menu</a></li>
				<li><a href="gallery.php">Gallery</a></li>
				<li><a href="basket.php">Order</a></li>
				<li>
					<a href="logout.php" style="color: #bbdefb;">
						Log out
					</a>
				</li>
			</ul>

			<p class="_clear"></p>

		</div>

		<p class="_clear"></p>

	</div>

</header>

<div class="responive_nav">

	<div class="nav_section_img">

		<div class="nav_section_div">

			<h3>Local Pie Shop</h3>

		</div>

	</div>

	<div class="nav_section">

		<ul>

			<li><a href="dashboard.php"><span class="home">Home</span></a></li>
			<li><a href="menu.php"><span class="menu">Menu</span></a></li>
			<li><a href="gallery.php"><span class="gallery">Gallery</span></a></li>
			<li><a href="basket.php"><span class="order">Order</span></a></li>
			<li>
				<a href="logout.php" style="color: #f44336;">
					Log out
				</a>
			</li>
		</ul>

	</div>

</div>