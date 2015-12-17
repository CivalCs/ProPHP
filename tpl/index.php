<title><?php echo SITENAME;?> - Entretenimento, games, internet e tecnologia</title>
<meta name="title" content="<?php echo SITENAME;?>Pró Noticias - Entretenimento, games, internet e tecnologia" />
<meta name="description" content="<?php echo SITEDESC;?>" />
<meta name="keywords" content="<?php echo SITETAGS;?>" />
<meta name="author" content="Francisval" />
<meta name="url" content="<?php echo BASE;?>" />
<meta name="language" content="pt-br" /> 
<meta name="robots" content="INDEX,FOLLOW" /> 
</head>
<body>

<div id="site">

<?php setArq('tpl/header'); ?>

<div id="content">

<div class="home">
	<div class="slide">
    	<ul>
            <?php
                $readSlide =  read('(SELECT * FROM up_posts ORDER BY data DESC)up_posts',"WHERE tipo='post' AND status='1' GROUP BY cat_pai
                ORDER BY data DESC LIMIT 4");
                foreach($readSlide as $slide):
                    echo '<li>';
                        getThumb($slide['thumb'], $slide['tags'], $slide['titulo'], '866', '254', '', '', '#');
                        echo '<div class="info">';
                            echo '<p class="titulo"><a href="'.BASE.'/artigo/'.$slide['url'].'" title="ver mais de '.$slide['titulo'].'">'.getCat($slide['cat_pai'],'nome').'-'.$slide['titulo'].'</a></p>';
                            echo '<p class="resumo"><a href="'.BASE.'/artigo/'.$slide['url'].'" title="ver mais de '.$slide['titulo'].'">'.lmWord($slide['content'],300).'</a></p>';
                        echo '</div>';
                    echo '</li>';
                endforeach;
            ?>
        </ul>
        <div class="slidenav"></div><!-- /slide nav-->
    </div><!-- /slide -->
    
    <ul class="entretenimeto">
    	<?php
            $readBloco = read('up_posts',"WHERE tipo = 'post' AND status = '1' AND cat_pai = '27' ORDER BY data DESC LIMIT 1,5");
            foreach($readBloco as $bl):
                $i++;
                echo '<li';
                if($i==4) echo '  class="last"';
                echo '>';
                    getThumb($bl['thumb'], $bl['tags'], $bl['titulo'], '168', '234', '', '', '#');
                    echo '<div class="info">';
                            echo '<p class="data">'.date('d/m/Y H:i',strtotime($bl['data'])).'</p>';
                            echo '<p class="titulo"><a href="'.BASE.'/artigo/'.$bl['url'].'" title="ver mais de '.$bl['titulo'].'">'.$bl['titulo'].'</a></p>';
                    echo '</div>';
                echo '</li>';
            endforeach;
        ?>
    </ul><!-- /entretenimento -->
    
    <div class="bl-games-tec">
    	<div class="games">
        	<h2>games</h2>
        	<ul class="ulgames">
            	<?php
                    $readBloco = read('up_posts',"WHERE tipo = 'post' AND status = '1' AND cat_pai = '31' ORDER BY data DESC LIMIT 1,3");
                    foreach($readBloco as $bl):
                        echo '<li class="gli">';
                            getThumb($bl['thumb'], $bl['tags'], $bl['titulo'], '180', '100', '', '', '#');
                            echo '<p class="titulo"><a href="'.BASE.'/artigo/'.$bl['url'].'" title="ver mais de '.$bl['titulo'].'">'.$bl['titulo'].'</a></p>';
                            echo '<p class="data">'.date('d/m/Y H:i',strtotime($bl['data'])).'</p>';
                            echo '<span class="link"><a href="'.BASE.'/artigo/'.$bl['url'].'" title="ver mais de '.$bl['titulo'].'" class="radius bsshadow">continue lendo...</a></span>';
                        echo '</li>';
                    endforeach;
                ?>
            </ul><!-- /ulgames -->
        </div><!-- /games -->
        
        <div class="tec">
        	<h2>tecnologia</h2>
        	<ul class="ultec">
            	<?php
                    $readBloco = read('up_posts',"WHERE tipo = 'post' AND status = '1' AND cat_pai = '24' ORDER BY data DESC LIMIT 1,3");
                    foreach($readBloco as $bl):
                        $t++;
                        echo '<li';
                        if($t==2) echo '  class="last"';
                        echo '>';
                            getThumb($bl['thumb'], $bl['tags'], $bl['titulo'], '133', '237', '', '', '#');
                            echo '<span class="info">';
                                echo '<p class="titulo"><a href="'.BASE.'/artigo/'.$bl['url'].'" title="ver mais de '.$bl['titulo'].'">'.$bl['titulo'].'</a></p>';
                                echo '<p class="data">'.date('d/m/Y H:i',strtotime($bl['data'])).'</p>';
                            echo ' </span>';
                        echo ' </li>';
                    endforeach;
                ?>
            </ul>
            
            <ul class="ultecover">
                <?php
                    $readBloco = read('up_posts',"WHERE tipo = 'post' AND status = '1' AND cat_pai = '24' ORDER BY data DESC LIMIT 4,2");
                    foreach($readBloco as $bl):
                        $al++;
                        $class = ($al == '1' ? 'tp':'bt');
                        echo '<li class="'.$class.' bsshadow">';
                            echo '<span class="data">'.date('d/m/',strtotime($bl['data'])).'</span>';
                        echo '<p class="titulo"><a href="'.BASE.'/artigo/'.$bl['url'].'" title="ver mais de '.$bl['titulo'].'">'.$bl['titulo'].'</a></p>';
                        echo '</li>';
                    endforeach;
                ?>
            </ul>
        </div><!-- /tec -->
    </div><!-- /bloco games + tecnologia -->
    
    <div class="internet">
    	<h2>internet</h2>
        <ul class="inter">
        	<?php
                $readBloco = read('up_posts',"WHERE tipo = 'post' AND status = '1' AND cat_pai = '22' ORDER BY data DESC LIMIT 1,4");
                foreach($readBloco as $bl):
                    $n++;
                    echo '<li class="bsshadow radius';
                    if($n==3) echo '  last';
                    echo '">';
                        getThumb($bl['thumb'], $bl['tags'], $bl['titulo'], '200', '150', '', '',BASE.'/artigo/'.$bl['url']);
                        echo '<p class="data">'.date('d/m/Y H:i',strtotime($bl['data'])).'</p>';
                        echo '<p class="titulo">'.$bl['titulo'].'</p>';
                    echo '</li>';
                endforeach;
            ?>
        </ul>
    </div>
    
</div><!-- /home -->
</div><!-- //content -->