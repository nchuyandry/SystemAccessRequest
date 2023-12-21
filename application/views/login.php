<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>assets/img/cctv.png">
  <link rel="icon" type="image/png" href="<?=base_url()?>assets/img/tvip.png">
  <title>
    System Access Request (SAR)
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="<?=base_url()?>assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="<?=base_url()?>assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
</head>
<body class="white-content body">
		<div class="container">
			<!-- Outer Row -->
			<div class="row justify-content-center">
				<div class="col-xl-5 col-lg-12 col-md-9">
					<div class="card my-5">
						<div class="card-body p-0">
							<!-- Nested Row within Card Body -->
							<div class="row">
								
								<div class="col-lg-12">
									<div class="p-5">
										<div class="text-center">
											<img class="mb-4" src="<?=base_url() ?>assets/img/tvip.png" alt="" width="72" height="72">
											<h1 class="h4 text-gray-900 mb-4">System Access Request (SAR)</h1>
										</div>
										<form class="user" method="post" action="<?=base_url().'login/dologin' ?>">
											<div class="form-group">
												<input type="text" class="form-control form-control-user" name="username" placeholder="NIK" required>
											</div>
											<div class="form-group">
												<input type="password" class="form-control form-control-user" name="password" placeholder="Password" required>
											</div>
											
											<button class="btn btn-primary btn-block" type="submit">
												Login
											</button>
											<hr>
										</form>	
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>

		</div>

		<!-- Bootstrap core JavaScript-->
		<script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
		<script src="<?=base_url()?>assets/js/core/jquery.min.js"></script>
  <!--<script src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
  		<script src="<?=base_url()?>assets/js/core/popper.min.js"></script>
  		<script src="<?=base_url()?>assets/js/core/bootstrap.min.js"></script>
  		
  <!--  Notifications Plugin    -->
  		<script src="<?=base_url()?>assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  		<script src="<?=base_url()?>assets/js/black-dashboard.min.js?v=1.0.0"></script>
		
<!--		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"> </script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"> </script>
		<script src="<?=base_url() ?>assets/js/bootstrap-notify.min.js"> </script>
		<script src="<?=base_url() ?>assets/js/app.js"> </script>-->
		<?php
		if ($this->session->flashdata('failed')) { ?>
		<script>
		$.notify({
			icon: "fa fa-exclamation-triangle fa-2x",
			message: "<?=$this->session->flashdata('failed')?>"
		},{
			type: 'danger',
			allow_dismiss: false,
			placement: {
				from: 'top',
				align: 'right'
			},
			animate: {
				enter: 'animated bounceIn',
				exit: 'animated bounceOut'
			},
		});
		</script>
		<?php } ?>
	</body>
</html>