<?php 
function HostUrl(){
	$protocole = $_SERVER['REQUEST_SCHEME'].'://';
	$host = $_SERVER['HTTP_HOST'] . '/';
	$project = explode('/', $_SERVER['REQUEST_URI'])[1];
	return $protocole . $host . 'PendaftaranEskul';
}

include 'func/db.php';
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta http-equiv="refresh" content="20"> -->

    <title>SMK TELEKOMUNIKASI TELESANDI BEKASI</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo HostUrl(); ?>/assest/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo HostUrl(); ?>/assest/css/animate.css">
    <link rel="stylesheet" href="<?php echo HostUrl(); ?>/assest/css/bootstrap.min.css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Baloo|Fredoka+One" rel="stylesheet"> -->
   <!--  <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700|Poppins:400,600,700" rel="stylesheet"> -->
    <!-- <link rel="ico" type="" href=""> -->

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    	.spacer{
			width: 100%;
			height: 100px;
		}
		.card img{
			height: 200px;
			max-height: 200px;
		}
		.fs{
    		height: 100%;
    		width: 100%;
            overflow: hidden;
    	}
    	.opc{
    		width: 100%;
    		height: 100%;
    		background-color: rgba(0,0,0,0.6);
    	}
      #danger{
          display: none;  
      }
    </style>

  </head>
  <body>
  	<!-- NAVBAR -->
  	<section class="fs" id="header">
           <nav class="navbar fixed-top navbar-inverse navbar-expand-lg navbar-light" id="navbar" style="background-color: #fff;">
                <div class="container">
                    <a href="https://telesandifestival.com" class="navbar-brand" style="position: relative; margin-left:20px">
                        PENDAFTARAN EKSTRAKURIKULER
                    </a>
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        
                        <i class="fas fa-bars" id="navbar-toggler-icon" style="color: #fff;"></i>
                    </button>
                    

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
			        <a class="nav-link" href="<?php echo HostUrl(); ?>/index.php">Home</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="<?php echo HostUrl(); ?>/index.php#eskul">Eskul</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="<?php echo HostUrl(); ?>/index.php#contact">Contact</a>
			      </li>
                                                        </ul>
                    </div>
                </div>
            </nav>
	</section>

  	
  	<!-- Akhir Navbar -->