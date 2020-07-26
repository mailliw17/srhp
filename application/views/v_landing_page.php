<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Sistem Pemilihan Kandidat</title>
	<meta charset="UTF-8">
	<meta name="description" content="SolMusic HTML Template">
	<meta name="keywords" content="music, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon -->
	<link href="<?php echo base_url().'assets/img/favicon.ico'?>" rel="shortcut icon" />
	<!-- Google font -->
	<link
		href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap"
		rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" />
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/font-awesome.min.css'?>" />
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/owl.carousel.min.css'?>" />
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/slicknav.min.css'?>" />

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>" />

</head>

<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section clearfix" style="background-color: white;">
		<a href="#" class="site-logo">
			<img src="<?php echo base_url().'assets/img/logo1.png'?>" style ="height: auto; margin-top: -100px; margin-bottom: -100px;" alt="" width = '25%'>
		</a>
		<div class="header-right">
			<div class="user-panel">
				<?php if ($this->session->userdata('masuk') == TRUE) : ?>
				<h6 style="color: black;">Selamat Datang <strog><?= $this->session->userdata('nama') ?></strog> !</h6>
				<?php else :?>
				<button class="btn btn-success">
					<a href="<?php echo base_url().'C_Login'?>" class="login"> <b>Login</b> </a>
				</button>
				<?php endif; ?>
			</div>
		</div>
		<ul class="main-menu">
			
		</ul>
	</header>
	<!-- Header section end -->

	<!-- Hero section -->
	<div class="alert alert-info text-center" role="alert" id="pilih" style="margin-top: 17px">
        
    </div>
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="hs-text">
								<h2><span>Selamat Datang </span> di Sistem Pemilihan Dewan Pastoral</h2>
								<a href="<?php echo base_url()?>" class="site-btn">Home</a>
								<?php if($this->session->userdata('masuk') != TRUE): ?>
									<a href="#" class="site-btn sb-c2" style="color: white">
										<!-- Button trigger modal -->
										<button type="button" class="btn btn-link btn-sm" data-toggle="modal"
											data-target="#loginModal" style="color: white">
											PILIH
										</button>
									</a>
								<?php elseif ($this->session->userdata('masuk') == TRUE && $this->session->userdata('akses') == 'pemilih') : ?>
									<a href="<?php echo base_url().'C_DashboardPemilih'?>" class="site-btn sb-c2">
										<!-- Button trigger modal -->
										<button type="button" class="btn btn-link btn-sm" style="color: white">
											Pilih
										</button>
									</a>
								<?php elseif ($this->session->userdata('masuk') == TRUE && $this->session->userdata('akses') == 'admin') : ?>
									<a href="<?php echo base_url().'C_DashboardAdmin'?>" class="site-btn sb-c2" >
										<!-- Button trigger modal -->
										<button type="button" class="btn btn-link btn-sm" style="color: white">
											Dashboard
										</button>
									</a>
								<?php endif; ?>
							</div>
						</div>
						<div class="col-lg-6" >
							<div class="hr-img" style="margin-top: 90px;">
								<img src="<?php echo base_url().'assets/img/pemiliihan_logo.jpg'?>" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->

	<!-- Intro section -->
	<section class="intro-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="section-title">
						<h2>Memilih dengan cara #dirumahaja</h2>
					</div>
				</div>
				<div class="col-lg-6">
					<p>Para Pemilih yang terhormat, anda dapat memilih kandidat dari DPH, Wilayah, dan Lingkungan
						melalui sistem ini. Kandidat dari lingkup ini sudah melalui pemilihan oleh para panitia di
						Gereja Katolik - Kristus Raja Ungaran</p>
					<a href="#" class="site-btn">Ayo Memilih</a>
				</div>
			</div>
		</div>
	</section>
	<!-- Intro section end -->

	<!-- How section -->
	<section class="how-section spad set-bg" data-setbg="<?php echo base_url().'assets/img/how-to-bg.jpg'?>">
		<div class="container text-white">
			<div class="section-title">
				<h2>Bagaimana caranya ?</h2>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="how-item">
						<div class="hi-icon">
							<img src="<?php echo base_url().'assets/img/icons/brain.png'?>" alt="">
						</div>
						<h4>Login</h4>
						<p>Orang yang dapat memilih adalah jemaat dari Gereja Katolik - Kristus Raja Ungaran. Oleh sebab
							itu silahkan anda melakukan login agar dapat memilih</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="how-item">
						<div class="hi-icon">
							<img src="<?php echo base_url().'assets/img/icons/pointer.png'?>" alt="">
						</div>
						<h4>Silahkan Memilih</h4>
						<p>Setelah anda melakukan login, anda dapat memilih calon pilihan anda mulai dari lingkung DPH,
							Wilayah, dan Lingkungan. Ingat tetap pada asas LUBER (Langsung, Umum, Bebas, dan Rahasia)
							dan JURDIL (Jujur dan Adil) ya</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="how-item">
						<div class="hi-icon">
							<img src="<?php echo base_url().'assets/img/icons/smartphone.png'?>" alt="">
						</div>
						<h4>Logout</h4>
						<p>Setelah selesai memilih, anda dapat keluar dari sistem. Terima kasih sudah memilih dengan
							#dirumahaja</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Footer section -->
	<footer class="footer-section">
		<div class="container">
			<div class="row">
				<div class="col-xl-4 col-lg-5 order-lg-1">
					<b><span style="color: white;">Paroki Kristus Raja Ungaran</span></b>
					<div class="copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>
							document.write(new Date().getFullYear());
						</script> All rights reserved <br> This template is made with <i class="fa fa-heart-o"
							aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
					<div class="social-links">
						<a href=""><i class="fa fa-instagram"></i></a>
						<a href=""><i class="fa fa-pinterest"></i></a>
						<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-twitter"></i></a>
						<a href=""><i class="fa fa-youtube"></i></a>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer section end -->

	<!--====== Javascripts & Jquery ======-->
	<script src="<?php echo base_url().'assets/scripts/jquery-3.2.1.min.js'?>"></script>
	<script src="<?php echo base_url().'assets/scripts/bootstrap.min.js'?>"></script>
	<script src="<?php echo base_url().'assets/scripts/jquery.slicknav.min.js'?>"></script>
	<script src="<?php echo base_url().'assets/scripts/owl.carousel.min.js'?>"></script>
	<script src="<?php echo base_url().'assets/scripts/mixitup.min.js'?>"></script>
	<script src="<?php echo base_url().'assets/scripts/main.js'?>"></script>

	<!-- untuk countdown pemilihan -->
	<script>
		// Set the date we're counting down to
		var countDownDate = new Date("Jul 13, 2020 14:00:00").getTime();
		var pilih=document.getElementById('pilih');
		// Update the count down every 1 second
		var x = setInterval(function() {

		  // Get today's date and time
		  var now = new Date().getTime();

		  // Find the distance between now and the count down date
		  var distance = countDownDate - now;
		  // Time calculations for days, hours, minutes and seconds
		  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

		  // Display the result in the element with id="demo"
		  var time_left = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
		  pilih.innerHTML = "Pemilihan Dimulai dalam : <br>" + time_left;
		  console.log(time_left);
		  // If the count down is finished, write some text
		  if (distance < 0) {
		    clearInterval(x);
		    pilih.style.display='none';
		  }
		}, 1000);
	</script>

</body>

</html>

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ingin Memilih ?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Silahkan melakukan login terlebih dahulu ya..
			</div>
			<div class="modal-footer">
				<a href="<?php echo base_url().'C_Login'?>" class="login"><button type="button" class="btn btn-info">Login</button></a>
				<!-- <button type="button" class="btn btn-primary">Login</button> -->
			</div>
		</div>
	</div>
</div>