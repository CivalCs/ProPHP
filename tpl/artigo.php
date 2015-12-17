<?php
    $artigoUrl = mysql_real_escape_string($url[1]);
    $readArtigo = read('up_posts',"WHERE url = '$artigoUrl'");
    if(!$readArtigo){
        header('Location: '.BASE.'/404');
    }else
        foreach($readArtigo as $art);
        setViews($art['id']);
?>

<title><?php echo $art['titulo'].'|'.SITENAME;?></title>
<meta name="title" content="<?php echo $art['titulo'].'|'.SITENAME;?>" />
<meta name="description" content="<?php echo lmWord($art['content'],100);?>" />
<meta name="keywords" content="<?php echo $art['tags'];?>" />
<meta name="author" content="Studio UpInside" />
<meta name="url" content="<?php echo BASE.'/artigo/'.$art['url'];?>" />
<meta name="language" content="pt-br" /> 
<meta name="robots" content="INDEX,FOLLOW" /> 
</head>
<body>

<div id="site">

<?php setArq('tpl/header'); ?>

<div id="content">

<div class="single">
	<h1 class="pgtitulo"><?php echo $art['titulo'];?></h1>
      
    <div class="content">
      <?php echo $art['content'];?>
        <?php
            $readArtGb = read('up_posts_gb',"WHERE post_id = '$art[id]'");
            if($readArtGb) {
                echo '<ul class="gallery">';
                    foreach($readArtGb as $gb):
                        $gbnum ++;
                        echo '<li';
                        if($gbnum%5==0) echo ' class="last" ';
                        echo '>';
                        getThumb($gb['img'],$art['titulo'].'( imagem'.$gbnum.')', $art['titulo'], '100', '65',$art['id'], '', '', '#');
                        echo '</li>';
                    endforeach;
                echo '</ul><!-- //gallery -->';
            }
        ?>
        <div class="metadata">
            <?php
                $autor = getAutor($art['autor']);
                $avatar = ($autor['avatar'] != ''? BASE.'/tim.php?src='.BASE.'/uploads/avatars'.$autor['avatar'].'&w=50&h=50&zc=1&q=100&a=t':$autor['foto']);

            ?>
        	<img src="<?php echo $avatar?>" width="50" height="50" title="<?php echo $autor['nome']?>" alt="Avatar de <?php echo $autor['nome']?>">
            <span class="autor">Por: <strong><?php echo $autor['nome']?></strong></span>
            <span class="data">dia: <strong><?php echo date('d/m/Y H:i:s',strtotime($art['data']))?></strong></span>
            <span class="cat">em: <a href="<?php setHome();?>/categoria/<?php echo getCat($art['categoria'],'url')?>"><?php echo getCat($art['categoria'],'nome')?></a></span>
            <span class="tags"><?php echo $art['tags'];?></span>
            <span class="views"><?php echo $art['visitas'];?></span>
        </div><!-- /metadata -->
    
    </div><!-- // content -->
    
    <div class="sidebar">
    	<?php setArq('tpl/sidebar'); ?>
    </div><!-- //sidebar -->
   </div><!-- /single -->
</div><!-- //content -->