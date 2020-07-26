<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->

	<link rel="icon" type="image/png" href="<?php echo base_url().'assets/images/icons/favicon.ico'?>" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/vendor/bootstrap/css/bootstrap.min.css'?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css'?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/vendor/animate/animate.css'?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/vendor/css-hamburgers/hamburgers.min.css'?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/vendor/select2/select2.min.css'?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/util.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/main.css'?>">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo base_url().'assets/images/img-01.png'?>" alt="IMG">
				</div>

				<form method="POST" class="login100-form validate-form" action="<?php echo base_url().'C_Login/auth'?>">
					<span class="login100-form-title">
						Silahkan Login
					</span>
					<?php if($this->session->flashdata('msg')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><?= $this->session->flashdata('msg'); ?> !</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username" id="username" placeholder="Masukan Username..." autocomplete="off" required
						>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="password" id="password" placeholder="Masukan Password..."
							autocomplete="off" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							Memilih #dirumahaja
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>




	<!--===============================================================================================-->

	<script src="<?php echo base_url().'assets/vendor/jquery/jquery-3.2.1.min.js'?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url().'assets/vendor/bootstrap/js/popper.js'?>"></script>
	<script src="<?php echo base_url().'assets/vendor/bootstrap/js/bootstrap.min.js'?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url().'assets/vendor/select2/select2.min.js'?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url().'assets/vendor/tilt/tilt.jquery.min.js'?>"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>


	<!--===============================================================================================-->
	<script src="<?php echo base_url().'assets/scripts/main2.js'?>"></script>

</body>

</html>