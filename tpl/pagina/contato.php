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

<div class="form">
	<h1 class="pgtitulo">Fale conosco:</h1>
    
    <div class="left">
    	<h2>Dúvidas, criticas ou sugestões?</h2>
        <p>Nosso setor de atendimento está sempre pronto para ouvir você. Contudo pedimos que envie sua mensagem e aguarde!</p>
        <p>Temos uma grande quantidade de mensagens por dia. Mas damos a você a garantia do atendimento mais ágil possível. Nossas respostas
        são dadas em no máximo 48horas úteis.</p>
        <p>Deixe sua dúvida, critica ou sugestão aqui. Nossa equipe vai dar o melhor para lhe reponder com a melhor solução.</p>
        <p><strong>Você ainda pode entrar em contato por outros canais:</strong></p>
        <p><strong>Telefone:</strong> (00) 0000.0000</p>
        <p><strong>Endereço:</strong>  Rua nome da rua tal 0000, Cidade / UF. CEP: 00.000-0000</p>
    </div><!-- //left -->
    
    <div class="right">
    	<form name="contato" action="" method="post">
        	<fieldset>
            	<legend>Entre em contato:</legend>
            	<label>
                	<span class="tt">Nome:</span>
                    <input type="text" name="nome" value="">
                </label>
                <label>
                	<span class="tt">E-mail:</span>
                    <input type="text" name="email" value="">
                </label>
                <label>
                	<span class="tt">Assunto:</span>
                    <input type="text" name="assunto" value="">
                </label>
                <label>
                	<span class="tt">Mensagem:</span>
                    <textarea name="mensagem" rows="8"></textarea>
                </label>
            </fieldset>
            <input type="reset" value="Limpar Campos" class="reset">
            <input type="submit" value="Enviar Contato" name="sendform" class="btn">
        </form>
    </div><!-- //right -->
    
</div><!-- /form -->
</div><!-- //content -->