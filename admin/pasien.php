<!-- Fungsi Session -->
<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../koneksi.php";
?>
<!-- End -->

<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>BIP Klinik</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.11.1.min.js" type="text/javascript"></script>

        <script src="lib/jQuery-Knob/js/jquery.knob.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $(".knob").knob();
        });
    </script>


    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/premium.css">

</head>
<body class=" theme-blue">

				<!-- Fungsi Waktu Session -->
				<?php
				$timeout = 10; // Set timeout minutes
				$logout_redirect_url = "../index.php"; // Set logout URL

				$timeout = $timeout * 60; // Converts minutes to seconds
				if (isset($_SESSION['start_time'])) {
					$elapsed_time = time() - $_SESSION['start_time'];
					if ($elapsed_time >= $timeout) {
						session_destroy();
						echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
					}
				}
				$_SESSION['start_time'] = time();
				?>
				<?php } ?>
				<!-- End -->

    <!-- Demo page code -->

    <script type="text/javascript">
        $(function() {
            var match = document.cookie.match(new RegExp('color=([^;]+)'));
            if(match) var color = match[1];
            if(color) {
                $('body').removeClass(function (index, css) {
                    return (css.match (/\btheme-\S+/g) || []).join(' ')
                })
                $('body').addClass('theme-' + color);
            }

            $('[data-popover="true"]').popover({html: true});
            
        });
    </script>
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .navbar-default .navbar-brand, .navbar-default .navbar-brand:hover { 
            color: #fff;
        }
    </style>

    <script type="text/javascript">
        $(function() {
            var uls = $('.sidebar-nav > ul > *').clone();
            uls.addClass('visible-xs');
            $('#main-menu').append(uls.clone());
        });
    </script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
   
  <!--<![endif]-->

    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="" href="index.php"><span class="navbar-brand"><span class="fa fa-medkit"></span> BIP Klinik</span></a></div>

        <div class="navbar-collapse collapse" style="height: 1px;">
          <ul id="main-menu" class="nav navbar-nav navbar-right">
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $_SESSION['fullname']; ?>
                    <i class="fa fa-caret-down"></i>
                </a>

              <ul class="dropdown-menu">
                <li><a tabindex="-1" href="../logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>

        </div>
      </div>
    </div>
    

    <div class="sidebar-nav">
    <ul>
    <li><a href="index.php" class="nav-header"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a></li>
    

    <li><a href="#" data-target=".legal-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i> Pasien<i class="fa fa-collapse"></i></a></li>
        <li><ul class="legal-menu nav nav-list collapse">
            <li ><a href="pasien.php"><span class="fa fa-caret-right"></span> Data Pasien</a></li>
            <li ><a href="tambah-pasien.php"><span class="fa fa-caret-right"></span> Tambah Pasien</a></li>
    </ul></li>

        <li><a href="#" data-target=".dokter-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i> Dokter<i class="fa fa-collapse"></i></a></li>
        <li><ul class="dokter-menu nav nav-list collapse">
            <li ><a href="dokter.php"><span class="fa fa-caret-right"></span> Data Dokter</a></li>
            <li ><a href="tambah-dokter.php"><span class="fa fa-caret-right"></span> Tambah Dokter</a></li>
    </ul></li>

              <li><a href="#" data-target=".obat-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i> Obat<i class="fa fa-collapse"></i></a></li>
        <li><ul class="obat-menu nav nav-list collapse">
            <li ><a href="obat.php"><span class="fa fa-caret-right"></span> Data Obat</a></li>
            <li ><a href="tambah-obat.php"><span class="fa fa-caret-right"></span> Tambah Obat</a></li>
    </ul></li>
	
	 <li><a href="#" data-target=".rekap-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i> Rekap Medis<i class="fa fa-collapse"></i></a></li>
        <li><ul class="rekap-menu nav nav-list collapse">
            <li ><a href="rekap.php"><span class="fa fa-caret-right"></span> Data Rekap Medis</a></li>
            <li ><a href="tambah-rekap.php"><span class="fa fa-caret-right"></span> Tambah Rekap Medis</a></li>
    </ul></li>
            	
             <li><a href="user.php" class="nav-header"><i class="fa fa-fw fa-comment"></i> User</a></li>
			 
				 <li><a href="#" data-target=".cetak-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-desktop"></i> Cetak Laporan<i class="fa fa-collapse"></i></a></li>
        <li><ul class="cetak-menu nav nav-list collapse">
            <li ><a href="cetak-rekap.php"><span class="fa fa-caret-right"></span> Laporan Rekap Medis</a></li>
            <li ><a href="cetak-pasien.php"><span class="fa fa-caret-right"></span> Laporan Data Pasien</a></li>
			<li ><a href="cetak-dokter.php"><span class="fa fa-caret-right"></span> Laporan Data Dokter</a></li>
            <li ><a href="cetak-obat.php"><span class="fa fa-caret-right"></span> Laporan Data Obat</a></li>
    </li> </ul>
    </div>

    <div class="content">
        <div class="header">
            <div class="stats">
    <p class="stat"><span class="label label-info">
	
	<!-- Fungsi Menampilkan Total Pasien dari Database -->
	<b><?php $tampil=mysqli_query($koneksi, "select * from tb_pasien order by id_pasien desc");
		$total=mysqli_num_rows($tampil);
		?>
		<?php echo "$total"; ?>
		<!-- End --></span> Pasien</p>
		
    <p class="stat"><span class="label label-success">
	<!-- Fungsi Menampilkan Total Dokter dari Database -->
	<b><?php $tampil=mysqli_query($koneksi, "select * from tb_dokter order by id_dokter desc");
		$total=mysqli_num_rows($tampil);
		?>
		<?php echo "$total"; ?>
		<!-- End --></span> Dokter</p>
		
    <p class="stat"><span class="label label-danger">
	<!-- Fungsi Menampilkan Total Obat dari Database -->
	<b><?php $tampil=mysqli_query($koneksi, "select * from tb_obat order by id_obat desc");
		$total=mysqli_num_rows($tampil);
		?>
		<?php echo "$total"; ?>
		<!-- End --></span> Obat</p>
</div>

		<?php
             if(isset($_GET['hal']) == 'hapus'){
				$id_pasien = $_GET['kd'];
				$cek = mysqli_query($koneksi, "SELECT * FROM tb_pasien WHERE no_badge='$no_badge'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM tb_pasien WHERE id_pasien='$id_pasien'");
					if($delete){
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
					}
				}
			}
			?>

            <h1 class="page-title">Data Pasien</h1>
                    <ul class="breadcrumb">
            <li><a href="index.php">Home</a> </li>
            <li class="active">Data Pasien</li>
        </ul>

       <!-- Small boxes (Stat box) -->
                    <div class="row">
                    
              <div class="col-lg-4">
              <form action='pasien.php' method="POST">
          
	       <input type='text' class="form-control" style="margin-bottom: 4px;" name='qcari' placeholder='Cari No.Badge & Nama Pasien ' required /> 
           <input type='submit' value='Cari Data' class="btn btn-sm btn-primary" /> <a href='pasien.php' class="btn btn-sm btn-success" >Refresh</i></a>
          	</div>
              </div>

        </div>    
		

					<!-- Fungsi Menampikan Isi dari Database -->
					<?php
                    $query1="select * from tb_pasien order by id_pasien DESC";
                    
					// Fungsi Search
                    if(isset($_POST['qcari'])){
	               $qcari=$_POST['qcari'];
	               $query1="SELECT * FROM  tb_pasien 
	               where no_badge like '%$qcari%' or nama_pasien like '%$qcari%' ";
                    }
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
						
					 <!-- End -->		
						  
						  <p><a class="btn btn-primary icon-btn" href="tambah-pasien.php"><i class="fa fa-plus"></i> Tambah Pasien	</a></p>

<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading no-collapse">Data Pasien</div>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th><center>No.</center></th>
                  <th><center>No.Badge</center></th>
                  <th><center>Nama Pasien</center></th>
                  <th><center>Usia</center></th>
				  <th><center>No. HP</center></th>
				  <th><center>Tools</center></th>
                </tr>
              </thead>
              <tbody>
			  <!-- Fungsi Menampilkan data dari database -->	
				<?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>
                              
								<td><center><?php echo $no; ?></center></td>
								<td><center><a href="detail_pasien.php?hal=edit&kd=<?php echo $data['id_pasien'];?>"><span class="fa fa-user fa-lg"></span> <?php echo $data['no_badge'];?></span></td>
								<td><center><?php echo $data['nama_pasien'];?></center></td>
								<td><center><?php echo $data['usia'];?> Tahun</center></td>
								<td><center><?php echo $data['no_hp']; ?></center></td>
								
								<td><center><div id="thanks"><a class="btn btn-sm btn-info" data-placement="bottom" data-toggle="tooltip" title="Edit Pasien" href="edit-pasien.php?hal=edit&kd=<?php echo $data['id_pasien'];?>"><span class="fa fa-pencil"> Edit</span></a>  
                        <a onclick="return confirm ('Yakin hapus <?php echo $data['nama_pasien'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Pasien" href="hapus-pasien.php?hal=hapus&kd=<?php echo $data['id_pasien'];?>"><span class="fa fa-trash-o"> Delete</span></a></center></td></tr></div>
                 <?php   
              } 
              ?>   
            <!-- End -->  
                
              </tbody>
            </table>
        </div>
    </div>
   
</div>



            <footer>
                <hr>

                <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
                <p class="pull-right"> <a href="index.php" target="_blank">Created </a> by <a href="http://www.span-community.com" target="_blank">SPAN Community</a></p>
                <p>© 2017 <a href="index.php" target="_blank">Sistem Rawat Jalan</a></p>
            </footer>
        </div>
    </div>


    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  
</body></html>
