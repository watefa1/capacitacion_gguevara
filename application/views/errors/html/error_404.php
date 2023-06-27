<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$ci = new CI_Controller();
$ci =& get_instance();
$ci->load->helper('url');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<link href='http://fonts.googleapis.com/css?family=Amarante' rel='stylesheet' type='text/css'>
<style type="text/css">
body {
    background: url(<?php echo base_url(); ?>application/image/404.png);
    background-size: cover;
}

.wrap{
    margin:0 auto;
    width:1000px;
}
.logo{
    text-align:center;
}   
.logo p span{
    color:lightgreen;
}   
.sub a{
    color:#180000;
    background-color: #ffffff;
    border: 3px solid #4ac4a9;
    padding:5px 10px;
    font-size:13px;
    font-family: arial, serif;
    font-weight:bold;
}   
.sub a:hover {
		animation: borderAnimation 4s infinite;
		background-color:  #4ac4a9;
		color: #ffffff;
	  }
.footer{
    color:#555;
    position:absolute;
    right:10px;
    bottom:10px;
    font-weight:bold;
    font-family:arial, serif;
}   
.footer a{
    font-size:16px;1
    color:#ff4800;
}   
</style>
</head>
<body>
               <div class="sub">
                 <p><a href="<?php echo base_url(); ?>">Volver al inicio</a></p>
               </div>
        </div>
     </div>
</body>
</html>
