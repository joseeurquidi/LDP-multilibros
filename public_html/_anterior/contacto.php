<?php


$success = false;
$error = false;

date_default_timezone_set('America/Monterrey');

//require 'phpmailer/PHPMailerAutoload.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer2/src/Exception.php';
require 'phpmailer2/src/PHPMailer.php';
require 'phpmailer2/src/SMTP.php';




if(!empty($_POST)) {
    
   
	

$data = array('secret' => '6LeItxATAAAAAP9ernyWGJ-59zwxTKMgobsRXXQY', 'response' => @$_POST['g-recaptcha-response']);	
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec ($ch);
curl_close ($ch);
$server_output = json_decode($server_output);


if (!@$server_output->success) {
//if (1==2) {
    	
$error = "El código reCaptcha es incorrecto, por favor intenta de nuevo.";

} else {
	

$mensaje = '';
$mail = new PHPMailer(true);


$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->isSMTP();
$mail->Host       = 'mail.multilibrosdistribuidora.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'smtp1@multilibrosdistribuidora.com';
$mail->Password   = 'KBWn!-(Ib4(v';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port       = 587;

$mail->setFrom($_POST['Email'], $_POST['Nombre']);

//$mail->addAddress('asistente.multilibros@gmail.com');
$mail->addAddress('malu_glez456@hotmail.com');
//$mail->addAddress('edgar@ldp.mx');
$mail->AddBCC('edgar@ldp.mx');


$mensaje = '
<h3>Comentario recibido</h3>
<table>
<tr>
<td>Fecha del mensaje: </td><td>'. date('Y-m-d: h:i:s') .'</td>
</tr>
<tr>
<td>Nombre: </td><td>'.@$_POST['Nombre'].'</td>
</tr>
<tr>
<td>Email</td><td>'.@$_POST['Email'].'</td>
</tr>
<tr>
<td>Escuela</td><td>'.@$_POST['Escuela'].'</td>
</tr>
<tr>
<td>Mensaje</td><td>'.@$_POST['Mensaje'].'</td>
</tr>
<tr>
<td></td><td></td>
</tr>
</table>';


$mail->isHTML(true);
$mail->Subject = utf8_decode('[Multilibros] Nuevo comentario recibido desde sitio web');
$mail->Body    = utf8_decode($mensaje);

if ($mail->send()) {
	$success = true;    
} else {
	//echo "Mailer Error: " . $mail->ErrorInfo;	
	$error = true;
}
		
	
} // IF Captcha

	
} // IF POST


?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="gb18030">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Multilibros Distribuidora</title>

<!-- main styling file  -->
<link rel="stylesheet" href="css/site.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/yellow.css">
<link rel="icon" type="image/png" href="img/LOGOTIPOS/logito png.png">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body data-spy="scroll" data-target=".scrolly" data-offset="50">

<!--Preloader-->    
<div class="loader">
   <div class="loader-inner">
      <div class="thecube">
			<div class="cube c1"></div>
			<div class="cube c2"></div>
			<div class="cube c4"></div>
			<div class="cube c3"></div>
		</div>
   </div>
</div>
<!-- Preloader ends-->
<div class="wrapper">

  <style>

    :root {
      --selectColor: #f2c900
    }

    img.carrouselMain {
      width: 100% !important; 
      height: 680px !important;
    }

    img.carrouselNosotros1{
      width: 100% !important; 
      height: 763px !important;
    }

    img.carrouselNosotros2{
      width: 100% !important; 
      height: 871px !important;
    }

    

    .carousel-indicators > li{
      border-radius: 0px;
    }

    ol.carousel-indicators {
      position: absolute;
      bottom: 0;
      margin: 0;
      left: 0;
      right: 0;
      width: auto;
    }

    ol.carousel-indicators li,
    ol.carousel-indicators li.active {
      float: center;
      width: 5%;
      height: 5px;
      margin: 0;
      border-radius: 0;
      border: 0;
      background: transparent;
    }

    ol.carousel-indicators li.active {
      background: var(--selectColor);
    }

    .moveSlider{
      color: var(--selectColor);
    }

    .carousel-inner h2,
    .carousel-inner p{
      text-shadow: 1px 1px 2px #000000;
    }
  </style>

<!-- ################################################################################################  -->
<!-- Main-Navigation -->
<header id="main-navigation" class="lighttransparent darkcolor">
   <div id="navigation" style="background: #fff !important;position: fixed;">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="side-item pull-right">
                  <a href="#" id="toggle-slide" class="pushbtn">Menu<i></i></a>
               </div>
               <nav class="navbar navbar-default">
                  <div class="navbar-header">
                     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#fixed-collapse-navbar" aria-expanded="true"> 
                        <span class="icon-bar top-bar"></span> <span class="icon-bar middle-bar"></span> <span class="icon-bar bottom-bar"></span> 
                     </button>
                     <a class="navbar-brand" href="javascript:;" style="width: 110px;padding-top: 0px;">
                        <img src="img/LOGOTIPOS/logito png.png" alt="logo">
                     </a>
                  </div>
                  <div id="fixed-collapse-navbar" class="navbar-collapse collapse navbar-right">
                     <ul class="nav navbar-nav">
                        <li><a href="index.html">Inicio</a></li>
                        <li><a href="servicios.html">Servicios</a></li>
                        <li><a href="productos.html">Productos</a></li>
                        <li class="active"><a href="contacto.php">Contacto</a></li>
                     </ul>
                  </div>
               </nav>
            </div>
         </div>
      </div>
      <div class="navbar navbar-default sidebar-nav right" id="navslidy">
         <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
                <img src="img/LOGOTIPOS/logito.jpg" alt="logo">
            </a>
         </div>
         <div id="fixed-collapse-navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="index.html">Inicio</a></li>
              <li><a href="servicios.html">Servicios</a></li>
              <li><a href="productos.html">Productos</a></li>
              <li class="active"><a href="contacto.php">Contacto</a></li>
            </ul>
         </div>
         <ul class="social top50">
            <li><a href="https://www.facebook.com/Multilibros-Distribuidora-108974974142936"><i class="fa fa-facebook"></i> </a> </li>
            <li><a href="mailto:ventas@multilibrosdistribuidora.com"><i class="fa fa-envelope"></i> </a> </li>
            <li><a href="tel:6188263804"><i class="fa fa-phone"></i> </a> </li>
            <li><a href="https://wa.me/5216188263804/?text=Me gustaria cotizar estos libros"><i class="fa fa-whatsapp"></i> </a> </li>
         </ul>
      </div>
   </div>
</header>
<br /><br />


<!-- ################################################################################################  -->
<div id="map-address"></div>
<br><br>
<section class="padding_top bgdefault" style="padding-bottom: 1em">
   <div class="container">
      <div class="row">
         <div class="col-md-6 col-sm-6 padding_bottom_half">
            <div class="floated-counter darkcolor wow fadeInLeft">
               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <h2>Contacto</h2>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-sm-6 padding_bottom_half">
         </div>
      </div>
   </div>
</section>
<section id="contact-form" class="padding">
   <div class="container text-center">
      <div class="row">
         <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
            <h3 class="darkcolor text-uppercase bottom35 wow fadeInUp">Ponte en contacto con nosotros</h3>
         </div>
      </div>
      <div class="row">
         <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
             
             
             <?php if(@$success): ?>
             <div class="alert alert-success">Mensaje enviado correctamente.</div>
             <?php endif; ?>
             
             <?php if(@$error): ?>
             <div class="alert alert-danger">Hubo un error al enviar el mensaje.</div>
             <?php endif; ?>
             
             
             
            <form class="contactus wow fadeInUp" method="post" action="#contact-form">
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <div class="form-group bottom45">
                        <input class="form-control" type="text" placeholder="Nombre" name="Nombre" required>
                     </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                     <div class="form-group bottom45">
                        <input class="form-control" type="email" placeholder="Email" name="Email" required>
                     </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                     <div class="form-group bottom45">
                        <input class="form-control" type="text" placeholder="Escuela" name="Escuela">
                     </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                     <div class="form-group bottom45">
                        <textarea class="form-control" placeholder="Libros que desea cotizar" name="Mensaje"></textarea>
                     </div>
                  </div>
                  
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group bottom45">
                        <div class="g-recaptcha" data-sitekey="6LeItxATAAAAAI5LZZlaq_utFh8BcamsEpTTqQ4B"></div>
                    </div>
                  </div>
                  
                  <div class="col-sm-12">
                     <button type="submit" class="button defaulthole">Enviar mensaje</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>
<!-- ################################################################################################  -->

<!-- ################################################################################################  -->
<section id="wehere" class="blocklayout">
   <h3 class="hidden"> hidden</h3>
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-8 col-sm-8 nopadding">
            <div class="col-md-10 col-sm-12">
               <div class="find-us padding container-padding equalheight wow fadeInLeft">

                  <a href="javascript:void(0)" class="bottom35 top30 ourlogo"><img alt="image" src="img/LOGOTIPOS/logito.jpg"></a>

                  <span class="addr bottom10" style="font-size:1em;"><i class="fa fa-phone"></i> Teléfono de oficina</span>
                  <p class="bottom30">
                    <a style="text-decoration: underline;" href="tel:6188263804">618 154 64 65</a>
                  </p>


                  <span class="addr bottom10" style="font-size:1em;"><i class="fa fa-whatsapp"></i> Whatsapp</span>
                  <p class="bottom30">
                    <a style="text-decoration: underline;" href="https://wa.me/5216188263804/?text=Me gustaria cotizar estos libros">618 154 64 65 </a>
                  </p>


                  <span class="addr bottom10" style="font-size:1em;"><i class="fa fa-envelope"></i>  Correo</span>
                  <p class="bottom30">
                    <a style="text-decoration: underline;" href="mailto:ventas@multilibrosdistribuidora.com">ventas@multilibrosdistribuidora.com</a>
                  </p>

                  <span class="addr bottom10" style="font-size:1em;"><i class="fa fa-facebook"></i> Facebook Multilibros Distribuidora</span>
                  <p class="bottom30"><a style="text-decoration: underline;" href="https://www.facebook.com/Multilibros-Distribuidora-108974974142936/"> https://www.facebook.com/Multilibros-Distribuidora/ </a> </p>

               </div>
            </div>
         </div>
         <div class="col-md-4 col-sm-4 equalheight nopadding">
            <!--div id="map-dark"></div-->
            <div>
              <img src="img/recortar2/libros1.jpg"  />
            </div>
         </div>
      </div>
   </div>
</section>
<!-- ################################################################################################  -->
<!--Contact form ends-->


<!--Footer-->
<footer class="bgdefault padding_half">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-sm-12 text-center">
            <ul class="social dark wow bounceIn">
               <li><a href="https://www.facebook.com/Multilibros-Distribuidora-108974974142936"><i class="fa fa-facebook"></i> </a> </li>
               <li><a href="mailto:ventas@multilibrosdistribuidora.com"><i class="fa fa-envelope"></i> </a> </li>
               <li><a href="tel:6188263804"><i class="fa fa-phone"></i> </a> </li>
               <li><a href="https://wa.me/5216188263804/?text=Me gustaria cotizar estos libros"><i class="fa fa-whatsapp"></i> </a> </li>
            </ul>
            <p class="darkcolor top30 wow fadeInUp">Copyright &copy; 2020 todos lo derechos reservados.<br />Desarrollado por <strong><a href="https://www.ldp.mx" target="_blank">LDP®</a></strong></p>
         </div>
      </div>
   </div>
</footer>

</div>

<!-- jQuery Files -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!--to view items on reach-->
<script src="js/jquery.appear.js"></script>

<!--Swiper slider-->
<script src="js/swiper.jquery.min.js"></script>

<!--Owl slider-->
<script src="js/owl.carousel.min.js"></script>

<!--number counters-->
<script src="js/jquery-countTo.js"></script>

<!--equalize the same heights of block-->
<script src="js/jquery.matchHeight-min.js"></script>

<!--for parallax bgs-->
<script src="js/parallaxie.js"></script>

<!--for CountDown Timer-->
<script src="js/dscountdown.min.js"></script>

<!--Open popup fancybox on images-->
<script src="js/jquery.fancybox.min.js"></script>

<!--Portfolio galleries-->
<script src="js/jquery.cubeportfolio.min.js"></script>

<!--Progressbar s in circle forms-->
<script src="js/circle-progress.min.js"></script>

<!--scrollbar on blocks-->
<script src="js/simplebar.js"></script>

<!--Video Pops support for youtube, viemo etc-->
<script src="js/viedobox_video.js"></script>

<!--youtube background video-->
<script src="js/jquery.mb.YTPlayer.min.js"></script>

<!-- Type It -->
<script src="https://cdn.jsdelivr.net/jquery.typeit/4.4.0/typeit.min.js"></script>

<!-- WOW Transitions -->
<script src="js/wow.min.js"></script>
    
<!--Revolution SLider-->
<script src="js/revolution/jquery.themepunch.tools.min.js"></script>
<script src="js/revolution/jquery.themepunch.revolution.min.js"></script>
<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="js/revolution/extensions/revolution.extension.actions.min.js"></script>
<script src="js/revolution/extensions/revolution.extension.carousel.min.js"></script>
<script src="js/revolution/extensions/revolution.extension.kenburn.min.js"></script>
<script src="js/revolution/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="js/revolution/extensions/revolution.extension.migration.min.js"></script>
<script src="js/revolution/extensions/revolution.extension.navigation.min.js"></script>
<script src="js/revolution/extensions/revolution.extension.parallax.min.js"></script>
<script src="js/revolution/extensions/revolution.extension.slideanims.min.js"></script>
<script src="js/revolution/extensions/revolution.extension.video.min.js"></script>
   

<!--Synx scripts-->
<script src="js/functions.js"></script>
    
<!--Google map API-->
<script src="http://maps.google.com/maps/api/js?key=AIzaSyAOBKD6V47-g_3opmidcmFapb3kSNAR70U"></script>
<script src="js/map.js"></script>

</body>
</html>