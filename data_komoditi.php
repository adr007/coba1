<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Linkarin - Data Permohonan</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>
 <style type="text/css">
    .preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background-color: #FFF;
    }
    .preloader .loading {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%,-50%);
      font: 14px arial;
    }
    </style>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<?php 
		session_start();
	 ?>
<div class="preloader">
      <div class="loading">
        <img src="images/loading_animation2.gif" width="300">
        <p style="text-align: center;">Harap Tunggu</p>
      </div>
 </div>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>LINKARIN</span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg><span class="caret"></span></a>
						
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			
			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Data Permohonan 
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="data_komoditi.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>Berdasarkan Komoditi
						</a>
					</li>
					<li>
						<a class="" href="data_status.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>Berdasarkan Status
						</a>
					</li>
					<li>
						<a class="" href="data_user.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>Pemohonan User
						</a>
					</li>
				</ul>
			</li>


		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Data Permohonan User</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<br>
			</div>
		</div><!--/.row-->
				
		<?php 
			include 'koneksi/koneksi.php';
			//$email = $_SESSION['user'];
			//$pass = $_SESSION['passuser'];
			$perintah = "SELECT * FROM `data_komoditi`";
			$p1=mysqli_query($con, $perintah);
			//cari data komoditi
		?>
		<div class="row" id="load1">
			<div class="col-lg-12" id="isiload">
				<div class="panel panel-default">
					<div class="panel-heading">Data Permohonan</div>
					<div class="panel-body">
					<div class="col-md-12">
						<form method="POST" action="#">
							<div class="col-md-1" style="float: right;">
							<div class="form-group">
								<input type="submit" name="tombol" value="Cari" class="btn btn-primary">
							</div>
							</div>
							<div class="col-md-3" style="float: right;">
							<div class="form-group">
							<select name="komod" class="form-control">
								<option value="0">-- Cari Komoditi --</option>
								<?php 
									while ($komod=mysqli_fetch_array($p1)) {
										echo "<option value='$komod[id_komoditi]'>$komod[nama_umum]</option>";
									}
								?>
							</select>
							</div>
							</div>
						</form>
					</div>
		<?php 
		if (isset($_POST['tombol'])) {
			$id = $_POST['komod'];
			$perintah2 = "SELECT u.nama_user, u.alamat_user, k.nama_umum 
			FROM data_user u, 
			data_komoditi k, 
			data_permohonan p 
			WHERE p.id_komoditi = '$id' 
			AND k.id_komoditi = '$id' 
			AND u.id_user = p.id_user";
			$exucute = mysqli_query($con, $perintah2);
			$perintah3 = "SELECT COUNT(u.nama_user)as jumlah FROM data_user u, data_komoditi k, data_permohonan p WHERE p.id_komoditi = '$id' AND k.id_komoditi = '$id' AND u.id_user = p.id_user ";
			$exec = mysqli_query($con, $perintah3);
			$jumlah = mysqli_fetch_array($exec);
			//cari nama
			$perintah4 = "SELECT k.nama_umum FROM data_user u, data_komoditi k, data_permohonan p WHERE p.id_komoditi = '$id' AND k.id_komoditi = '$id' AND u.id_user = p.id_user ";
			$exec4 = mysqli_query($con, $perintah4);
			$nama = mysqli_fetch_row($exec4);
		 ?>
			<div class="col-xs-12 col-md-6 col-lg-4">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-4 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-8 widget-right">
							<div class="large"><?php echo "$jumlah[jumlah]"; ?></div>
							<div class="text-muted">Permohonan <?php echo "$nama[0]"; ?></div>
						</div>
					</div>
				</div>
			</div>
						<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="nomor">
						    <thead>
						    <tr>
						        <th>#</th>
						        <th>Nama User</th>
						        <th>Alamat User</th>
						        <th>Nama Komoditi</th>	
						    </tr>
						    </thead>
						    <tbody>
						    	<?php 
						    		$No = 1;
						    		while ($permohonan=mysqli_fetch_array($exucute)) {
						    	?>
						    	<tr>
						    		<td><?php echo $No++; ?></td>
						    		<td><?php echo "$permohonan[nama_user]"; ?></td>
						    		<td><?php echo "$permohonan[alamat_user]"; ?></td>
						    		<td><?php echo "$permohonan[nama_umum]"; ?></td>
						    		
						    	</tr>
						    	<?php 
						    		}
						    	 ?>
						    </tbody>
						</table>
						<?php 
					}
						 ?>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
	</div><!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<script>	
	 $(document).ready(function(){
      $(".preloader").fadeOut();
    })	
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
