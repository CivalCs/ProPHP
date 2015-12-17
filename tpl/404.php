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

	<div class="notfound">
    
    	<h1 class="pgtitulo">Opppppssss, não conseguimos encontrar o que você procura!</h1>
        <p class="pgtext">A url que você informou não retornou nem um resultado. Talvez a página tenha sido removida ou o artigo não 
        existe mais. Você pode tentar navegar pelo nosso menu ou pesquisar pelo sistema Ou ainda voltar á 
        <a class="pglink" href="<?php setHome();?>" title="Voltar ao início | <?php echo SITENAME;?>">Home</a>.</p>
         <p class="pgtext"><strong>Você pode conferir nossas últimas atualizações. Elas estão logo abaixo!</strong></p>
    
    
    <div class="bloco entre">
    	<h2>entretenimento</h2>
        <ul class="inter">
        	<?php
                $readBloco = read('up_posts',"WHERE tipo='post' AND status = '1' AND cat_pai = '27' ORDER BY data DESC LIMIT 4");
                foreach($readBloco as $bl):
                    $e++;
                    echo '<li class="bsshadow radius';
                    if($e==3)echo ' last';
                    echo '">';
                        getThumb($bl['thumb'], $bl['tags'], $bl['titulo'], '200', '150', '', '',BASE.'/artigo/'.$bl['url']);
                        echo '<p class="data">'.date('d/m/Y H:i',strtotime($bl['data'])).'</p>';
                        echo '<p class="titulo">'.lmWord($bl['titulo'],50).'</p>';
                    echo '</li>';
                endforeach;
            ?>
        </ul>
    </div>
    
    <div class="bloco games">
    	<h2>games</h2>
        <ul class="inter">
            <?php
            $readBloco = read('up_posts',"WHERE tipo='post' AND status = '1' AND cat_pai = '31' ORDER BY data DESC LIMIT 4");
            foreach($readBloco as $bl):
                $g++;
                echo '<li class="bsshadow radius';
                if($g==3)echo ' last';
                echo '">';
                getThumb($bl['thumb'], $bl['tags'], $bl['titulo'], '200', '150', '', '',BASE.'/artigo/'.$bl['url']);
                echo '<p class="data">'.date('d/m/Y H:i',strtotime($bl['data'])).'</p>';
                echo '<p class="titulo">'.lmWord($bl['titulo'],50).'</p>';
                echo '</li>';
            endforeach;
            ?>
        </ul>
    </div>
    
    <div class="bloco tecno">
    	<h2>tecnologia</h2>
        <ul class="inter">
            <?php
            $readBloco = read('up_posts',"WHERE tipo='post' AND status = '1' AND cat_pai = '24' ORDER BY data DESC LIMIT 4");
            foreach($readBloco as $bl):
                $t++;
                echo '<li class="bsshadow radius';
                if($t==3)echo ' last';
                echo '">';
                getThumb($bl['thumb'], $bl['tags'], $bl['titulo'], '200', '150', '', '',BASE.'/artigo/'.$bl['url']);
                echo '<p class="data">'.date('d/m/Y H:i',strtotime($bl['data'])).'</p>';
                echo '<p class="titulo">'.lmWord($bl['titulo'],50).'</p>';
                echo '</li>';
            endforeach;
            ?>
        </ul>
    </div>
    
    <div class="bloco">
    	<h2>internet</h2>
        <ul class="inter">
            <?php
            $readBloco = read('up_posts',"WHERE tipo='post' AND status = '1' AND cat_pai = '22' ORDER BY data DESC LIMIT 4");
            foreach($readBloco as $bl):
                $i++;
                echo '<li class="bsshadow radius';
                if($i==3)echo ' last';
                echo '">';
                getThumb($bl['thumb'], $bl['tags'], $bl['titulo'], '200', '150', '', '',BASE.'/artigo/'.$bl['url']);
                echo '<p class="data">'.date('d/m/Y H:i',strtotime($bl['data'])).'</p>';
                echo '<p class="titulo">'.lmWord($bl['titulo'],50).'</p>';
                echo '</li>';
            endforeach;
            ?>
        </ul>
    </div>
    
    </div><!-- //notfound -->

</div><!-- //content -->