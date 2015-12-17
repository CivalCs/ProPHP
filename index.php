<?php
    ob_start(); session_start();
    require('dts/dbaSis.php');
    require('dts/getSis.php');
    require('dts/setSis.php');
    require('dts/outSis.php');
    viewManager('600');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php setHome();?>/tpl/style.css" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/png" href="<?php setHome();?>/tpl/images/favicon.png" />
    <!--[if IE]>
        <style type="text/css">
            #header .hnav li{margin-right:15px;}
            #header .hnav li a{padding:8px}
            #header .hnav li a:hover{background:#E21F26;}
            #header .hnav .last{margin:0; float:right;}
        </style>
    <![endif]-->
</head>
<body>
    <?php
        getHome();
    ?>

    <div style="clear:both"></div><!-- /clear -->
    </div><!-- ///site -->

    <div id="footer">
        <img src="<?php setHome();?>/tpl/images/bglogo.png" alt="SITENAME" title="SITENAME" />
        <p>2012 - <?php echo date('Y');?> © ProNotícias - Todos os direitos reservados</p>
    </div><!-- footer -->

</body>
<?php include('js/jscSis.php'); ob_end_flush(); ?>
</html>













