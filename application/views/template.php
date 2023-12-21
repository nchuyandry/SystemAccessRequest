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
  <link href="<?=base_url()?>assets/css/font.css" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="<?=base_url()?>assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="<?=base_url()?>assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?=base_url()?>assets/demo/demo.css" rel="stylesheet" />
  <link href="<?=base_url()?>assets/css/dataTables.bootstrap4.css" rel="stylesheet" /><!--
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" />-->
  <link href="<?=base_url()?>assets/css/sweetalert.css" rel="stylesheet">		
  <script type="text/javascript" src="<?=base_url() ?>assets/js/plugins/sweetalert.min.js"> </script> 
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"> </script>
  <script>
  	$(document).ready(function () {
	    $('#dataTable').DataTable();
	}); 
  </script>
  <style>
  	.dataTables_length label, .dataTables_filter label  {
  		display: inline-flex;
  		margin-bottom: 0.5rem;
  		vertical-align: middle;
  		line-height: 2;
  	}
  	.dataTables_length .form-control{
		vertical-align: middle;
	}
  	.dataTables_filter {
  		text-align: right;	
  	}
  	.paginate_button .page-link{
		color: #000;
	}
	.modal{
		top: -87px!important;
	}
  </style>
</head>

<body class="white-content body" onload="dataapproval()">
  <div class="wrapper">
    <?php $this->load->view('layout/sidebar')?>
    <div class="main-panel" data="blue">
      <!-- Navbar -->
      <?php $this->load->view('layout/navbar')?>
      <!-- End Navbar -->
      <div class="content">
        <?php echo $contents?>
      </div>
      <?php $this->load->view('layout/footer')?>
    </div>
  </div>


  <!--   Core JS Files   -->
  <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
  <!--<script src="<?=base_url()?>assets/js/core/jquery.min.js"></script>-->
  <script src="<?=base_url()?>assets/js/core/popper.min.js"></script>
  <script src="<?=base_url()?>assets/js/core/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?=base_url()?>assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?=base_url()?>assets/js/black-dashboard.min.js?v=1.0.0"></script>
<?php if ($this->session->flashdata('welcome')) { ?>
	<script>
		$.notify({
			icon: "fa fa-check-circle",
			message: "<?=$this->session->flashdata('welcome')?>"
		},{
			type: "success",
			allow_dismiss: false,
			placement: {
				from: "top",
				align: "right"
			},
			animate: {
				enter: 'animated fadeInDown',
				exit: 'animated fadeOutUp'
			},
		});
   </script>
<?php }elseif ($this->session->flashdata('saved')) {?>
	<script>
		$.notify({
			icon: "fa fa-check-circle",
			message: "<?=$this->session->flashdata('saved')?>"
		},{
			type: "success",
			allow_dismiss: false,
			placement: {
				from: "top",
				align: "right"
			},
			animate: {
				enter: 'animated fadeInDown',
				exit: 'animated fadeOutUp'
			},
		});
   </script>
<?php } ?>
  
<script>

$('#showdata').on('click','#editdata',function()
{
	var id=$(this).attr('data');
	$.ajax({
		type : "GET",
		url  : "<?php echo base_url()?>home/getupdate",
		dataType : "JSON",
		data : {id:id},
		success: function(data){
			$.each(data,function(id,nik, nama, lokasi, dept, jabatan, system, reason,status, approval){
				$('#modal_update').modal('show');
	            $('[name="nomor"]').val(data.nomor);
	            $('[name="nik"]').val(data.nik);
	            $('[name="nama"]').val(data.nama);
	            $('[name="lokasi"]').val(data.lokasi);
	            $('[name="dept"]').val(data.dept);
	            $('[name="jabatan"]').val(data.jabatan);
	            $('[name="email"]').val(data.email);
	            $('[name="system"]').val(data.system);
	            $('[name="reason"]').val(data.reason);
	            $('[name="status"]').val(data.status);
	            $('[name="approval"]').val(data.approval);
	            $('#id').val(data.id);
	        });
	    }
	});
});

$(document).on('click','#updatedata',function(e){
        e.preventDefault()
        var nomor=$('[name="nomor"]').val();
        var nik=$('[name="nik"]').val();
        var nama=$('[name="nama"]').val();
        var lokasi=$('[name="lokasi"]').val();
        var dept=$('[name="dept"]').val();
        var jabatan=$('[name="jabatan"]').val();
        var email=$('[name="email"]').val();
        var system=$('[name="system"]').val();
        var status=$('[name="status"]').val();
        var approval=$('[name="approval"]').val();
        var id=$('[name="id"]').val();
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url()?>home/updaterequest",
            data : {nomor:nomor,nik:nik,nama:nama,lokasi:lokasi,dept:dept,jabatan:jabatan,email:email,system:system,status:status,approval:approval,id:id},
            success: function(data){
                $('.modal').modal('hide');	
                location.reload();
            }
        });
        /*$.notify({
			icon: "fa fa-check-circle",
			message: "Data Updated!"
		},{
			type: "success",
			allow_dismiss: false,
			placement: {
				from: "top",
				align: "right"
			},
			animate: {
				enter: 'animated fadeInDown',
				exit: 'animated fadeOutUp'
			},
		});*/
    });
    

</script> 
</body>

</html>