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
	<h1 class="pgtitulo">Participe:</h1>
    
    <div class="left">
    	<h2>Cadastre-se e participe de nossa rede de leitores.</h2>
        <p>Sendo um leitor cadastrado você tem acesso liberado a maioria dos nossos artigos e novidades.</p>
        <p>Alem de participar da rede e poder interagir em todos os artigos, expressando sua opnião e interagindo com os outros leitores!</p>
        <p>Existe ainda a conta premium. Onde você tem acesso a 100% do conteúdo do site, Colabora com a expansão do site e 
        tem coteúdo especial liberado para você!</p>
        <p><strong>Cadastre-se agora mesmo!</strong></p>
        <p>Tenha acesso ao melhor conteúdo informativo da internet!</p>
        <img src="<?php setHome();?>/tpl/images/premium.png" title="Conta Premium" alt="Conta Premium">
    </div><!-- //left -->
    
    <div class="right">
    	<form name="cadastro" action="" method="post">
        	<fieldset>
            	<legend>Identificação:</legend>
            	<label>
                	<span class="tt">Nome completo:</span>
                    <input type="text" name="nome" value="">
                </label>
                <label>
                	<span class="tt">CPF:</span>
                    <input type="text" name="cpf" value="">
                </label>
                <label>
                	<span class="tt">E-mail:</span>
                    <input type="text" name="email" value="">
                </label>
                <label>
                	<span class="tt">Senha:</span>
                    <input type="password" name="senha" value="">
                </label>
            </fieldset>
            
            <fieldset>
            	<legend>Endereço:</legend>
            	<label>
                	<span class="tt">Rua + Número + Bairro:</span>
                    <input type="text" name="endereco" value="">
                </label>
                <label>
                	<span class="tt">Cidade + UF:</span>
                    <input type="text" name="local" value="">
                </label>
                <label>
                	<span class="tt">CEP:</span>
                    <input type="text" name="cep" value="">
                </label>
            </fieldset>
            
            <fieldset>
            	<legend>Contato:</legend>
            	<label>
                	<span class="tt">Telefone:</span>
                    <input type="text" name="telefone" value="">
                </label>
                <label>
                	<span class="tt">Celular:</span>
                    <input type="text" name="celular" value="">
                </label>
            </fieldset>
            <input type="reset" value="Limpar Campos" class="reset">
            <input type="submit" value="Cadastrar meus dados" name="sendform" class="btn">
        </form>
    </div><!-- //right -->
    
</div><!-- /form -->
</div><!-- //content -->