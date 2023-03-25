<?php
session_start();
include 'dbconnect.php';

?>

<!DOCTYPE html>
<html>

<head>
	<title>TAEKWONDO - Profil Dojang</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Falenda Flora, Ruben Agung Santoso" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //for-mobile-apps -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome icons -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome icons -->
	<!-- js -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<!-- //js -->
	<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- start-smoth-scrolling -->
</head>

<body>
	<!-- header -->
	<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				<p>www.taekwondo-elemen.org</p>
			</div>
			<div class="agile-login">
				<ul>
					<?php
					if (!isset($_SESSION['log'])) {
					} else {

						if ($_SESSION['role'] == 'Admin') {
							echo '
					<li style="color:white">Halo, ' . $_SESSION["name"] . '
					<li><a href="admin">Admin Panel</a></li>
					<li><a href="logout.php">Keluar?</a></li>
					';
						} else {
						};
					}
					?>

				</ul>
			</div>
			<div class="product_list_header">
				<p>Powered by PHP</p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="logo_products" style="margin-top: -35px; margin-bottom: -32px;">
		<div class="">
			<img src="images/gambar_header.jpg" width="100%" alt="">
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //header -->
	<!-- navigation -->
	<div class="navigation-agileits" style="padding: 0px;">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php" class="act">Home</a></li>
						<!-- Mega Menu -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Manajemen Dojang<b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="multi-gd-img">
										<ul class="multi-column-dropdown">
											<li>
												<a href="program.php" class="dropdown-toggle">
													<h6>Program Latihan</h6>
												</a>
											</li>
											<li>
												<a href="kepengurusan.php" class="dropdown-toggle">
													<h6>Kepengurusan Dojang</h6>
												</a>
											</li>
											<li>
												<a href="profil.php" class="dropdown-toggle">
													<h6>Profil Dojang</h6>
												</a>
											</li>
										</ul>
									</div>

								</div>
							</ul>
						</li>
						<li>
							<a href="jadwal.php" class="dropdown-toggle">Jadwal Latihan</a>
						</li>
						<li>
							<a href="data_anak.php" class="dropdown-toggle">Data</a>
						</li>

					</ul>
				</div>
			</nav>
		</div>
	</div>
	<!-- //navigation -->
	<!-- //top-header and slider -->
	<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
			<h2>Profil Dojang</h2>
			<div class="grid_3 grid_5">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
							<div class="agile_top_brands_grids">
								<?php
								$profil = mysqli_query($conn, "SELECT * from profil");
								$no = 1;
								while ($p = mysqli_fetch_array($profil)) {

								?>
									<div class="col-md-6 top_brand_left" style="margin-bottom: 5px;">
										<div class="hover14 column" style="height: 500px;">
											<div class="agile_top_brand_left_grid" style="height: 500px;">
												<div class="agile_top_brand_left_grid1">
													<figure>
														<div class="snipcart-item block">
															<div class="snipcart-details top_brand_home_details">
																<fieldset>
																	<button class="" style="background-color: darkblue; width: 100%; height: 30px;"></button>
																</fieldset>
															</div>
															<div class="snipcart-thumb">
																<a href="profil.php"><img alt=" " src="<?= $p['logo'] ?>" width="200px" height="200px" /></a>
															</div>
														</div>
													</figure>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6 top_brand_left" style="margin-bottom: 5px; height: 400px;">
										<div class="hover14 column" style="height: 500px;">
											<div class="agile_top_brand_left_grid" style="height: 500px;">
												<div class="agile_top_brand_left_grid1 text-left">
													<figure>
														<div class="snipcart-item block">
															<div class="snipcart-details top_brand_home_details">
																<fieldset>
																	<button class="" style="background-color: darkblue; width: 100%; height: 30px;"></button>
																</fieldset>
															</div>
															<div class="snipcart-thumb">
																<p class="text-left"><strong>Perguruan <?= $p['nama'] ?></strong> <br>( Berdiri Tahun <?= $p['berdiri'] ?>)</p>
																<p class="text-left"><?= $p['alamat'] ?></p>
																<p class="">Lokasi Google Maps</p>
																<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63245.983635747136!2d110.33982518506804!3d-7.803163972425459!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5787bd5b6bc5%3A0x21723fd4d3684f71!2sYogyakarta%2C%20Kota%20Yogyakarta%2C%20Daerah%20Istimewa%20Yogyakarta!5e0!3m2!1sid!2sid!4v1645588839876!5m2!1sid!2sid" width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
															</div>
														</div>
													</figure>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
								<div class="clearfix"> </div>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //top-brands -->





	<!-- //footer -->
	<div class="footer">
		<div class="container">
			<div class="w3_footer_grids">
				<div class="col-md-4 w3_footer_grid">
					<h3>Hubungi Kami</h3>

					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Taekwondo, Yogyakarta.</li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@email">info@email</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+62 8113 2322</li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>

		<div class="footer-copy">

			<div class="container">
				<p>© 2021 Taekwondo. All rights reserved</p>
			</div>
		</div>

	</div>
	<div class="footer-botm">
		<div class="container">
			<div class="w3layouts-foot">
				<ul>
					<li><a href="#" class="w3_agile_instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					<li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //footer -->
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

	<!-- top-header and slider -->
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {

			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 4000,
				easingType: 'linear'
			};


			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //here ends scrolling icon -->

	<!-- main slider-banner -->
	<script src="js/skdslider.min.js"></script>
	<link href="css/skdslider.css" rel="stylesheet">
	<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery('#demo1').skdslider({
				'delay': 5000,
				'animationSpeed': 2000,
				'showNextPrev': true,
				'showPlayButton': true,
				'autoSlide': true,
				'animationType': 'fading'
			});

			jQuery('#responsive').change(function() {
				$('#responsive_wrapper').width(jQuery(this).val());
			});

		});
	</script>
	<!-- //main slider-banner -->
</body>

</html>