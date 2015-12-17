<title>Pró Noticias - Entretenimento, games, internet e tecnologia</title>
<meta name="title" content="TITULO DA PÁGINA" />
<meta name="description" content="DESCRIÇÃO DA PÁGINA" />
<meta name="keywords" content="PALAVRAS CHAVE DA PÁGINA" />
<meta name="author" content="AUTOR DO SITE" />   
<meta name="url" content="URL DO SITE" />  
<meta name="language" content="pt-br" /> 
<meta name="robots" content="INDEX,FOLLOW" /> 
</head>
<body>

<div id="site">

<?php setArq('tpl/header'); ?>

<div id="content">

<div class="single">
	<h1 class="pgtitulo">Pesquisa por: UPINSIDE TECNOLOGIA</h1>
    <div class="content">
    	<p style="margin:0;">Sua pesquisa retornou <strong>22</strong> resultados!</p>
        
        <ul class="searchlist">
        	<?php for($i=1; $i<=10; $i++){
			?>
            	<li>
                	<img src="<?php setHome();?>/midias/9.jpg" title="Resultado" width="110px">
                    <a href="#">Com luvas de boxe, Gracyanne Barbosa posa como ring girl</a>
                </li>
            <?php
			}?>
        </ul><!-- /searchlist -->
        
        <div class="paginator" style="width:540px;">
            <a href="#">Primeira página</a>&nbsp;&nbsp;&nbsp;
            <a href="#">1</a>&nbsp;&nbsp;&nbsp;
            <span class="atv">2</span>&nbsp;&nbsp;&nbsp;
            <a href="#">3</a>&nbsp;&nbsp;&nbsp;
            <a href="#">Última página</a>
        </div>
          
    </div><!-- // content -->
    
    <div class="sidebar">
    	<?php setArq('tpl/sidebar'); ?>
    </div><!-- //sidebar -->
   </div><!-- /single -->
</div><!-- //content -->