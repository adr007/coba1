<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Linkarin - Beranda</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>
<script src="Chart.bundle.js"></script>


<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<?php 
		session_start();
	 ?>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Linkarin</span> Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <span class="caret"></span></a>
						
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
			<li class="active"><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>

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
				<li class="active"> Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div style="height: 10px;"></div>

			</div>
		</div><!--/.row-->	

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Data Perkembangan Permintaan</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							
<?php
include 'koneksi/koneksi.php';
	$query1 = "SELECT COUNT(id_permohonan) as jumlah FROM data_permohonan WHERE YEAR(tgl_permohonan) = '2016' GROUP BY id_komoditi";
	$query2 = "SELECT COUNT(id_permohonan) as jumlah FROM data_permohonan WHERE YEAR(tgl_permohonan) = '2017' GROUP BY id_komoditi";
	$query3 = "SELECT COUNT(id_permohonan) as jumlah FROM data_permohonan WHERE YEAR(tgl_permohonan) = '2018' GROUP BY id_komoditi";
	$exec1 = mysqli_query($con, $query1);
	$exec2 = mysqli_query($con, $query2);
	$exec3 = mysqli_query($con, $query3);
	$d2016 = mysqli_fetch_row($exec1);
	$d2017 = mysqli_fetch_row($exec2);
	$d2018 = mysqli_fetch_row($exec3); 
?>
<script src="chart/Chart.bundle.js"></script>

        <style type="text/css">
            .container {
                width: 100%;
                margin: 15px auto;
            }
        </style>
        <div class="container">
            <canvas id="myChart" width="100" height="40"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["2016","2017","2018"],
                    datasets: [
                    	{
                            label: 'Kurapu',
                            data: [<?php echo "$d2016[0]"; ?>,<?php echo "$d2017[0]"; ?>,<?php echo "$d2018[0]"; ?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',//1
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 99, 132, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(255,99,132,1)',
                                'rgba(255,99,132,1)'
                            ],
                            borderWidth: 1
                        },
                        <?php 
                        	$d2016 = mysqli_fetch_row($exec1);
							$d2017 = mysqli_fetch_row($exec2);
							$d2018 = mysqli_fetch_row($exec3); 
                         ?>
                        {
                            label: 'Tuna Loin',
                            data: [<?php echo "$d2016[0]"; ?>,<?php echo "$d2017[0]"; ?>,<?php echo "$d2018[0]"; ?>],
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.2)',//2
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(54, 162, 235, 0.2)'
                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(54, 162, 235, 1)'
                            ],
                            borderWidth: 1
                        },
                        <?php 
                        	$d2016 = mysqli_fetch_row($exec1);
							$d2017 = mysqli_fetch_row($exec2);
							$d2018 = mysqli_fetch_row($exec3); 
                         ?>
                        {
                            label: 'Ikan Lele',
                            data: [<?php echo "$d2016[0]"; ?>,<?php echo "$d2017[0]"; ?>,<?php echo "$d2018[0]"; ?>],
                            backgroundColor: [
                                'rgba(255, 206, 86, 0.2)',//3
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(255, 206, 86, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 206, 86, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(255, 206, 86, 1)'
                            ],
                            borderWidth: 1
                        }

                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>




						</div>
					
					</div>
				</div>
			</div>
		</div><!--/.row-->



	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="Chart.bundle.js"></script>

	<script>
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
