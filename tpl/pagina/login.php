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
	
    <!--
    <div id="modal" class="modal">
    	<div class="label">
                <a href="#" class="close" title="fechar" onClick="document.getElementById('modal').style.display='none';">
                    <img title="fechar" src="<?php //setHome();?>/tpl/images/ac_del.png">
                </a>
                <p>
                	<strong>Mensagem a ser exibida:</strong>
                    Seus dados foram enviados para seu e-email. Confira e acesse o link no corpo da mensagem recebida!
                </p>
        </div><!-- //label -->
    <!--</div><!-- //modal -->
    

<div id="site">
<?php setArq('tpl/header'); ?>

<div id="content">

<div class="form">
	<h1 class="pgtitulo">Minha conta:</h1>
       
    <div class="left">
    	<h2>Informe seus dados ao lado para acessar sua conta Leitor ou Premium.</h2>
        <p>Lembre-se de manter seus dados em segurança. Sua conta é de uso próprio e intranferivel, você pode alterar seus dados e migrar sua
        conta quando quiser. Basta acessar o sistema e interagir com o mesmo.</p>
        <p>Caso tenha esquecido seus dados basta <a class="link" href="<?php setHome();?>/pagina/login/recover" title="Recuperar senha">clicar aqui</a>
         para recuperar sua senha!</p>
    </div><!-- //left -->
    
    <div class="right">
    	<form name="contato" action="" method="post">
        	<fieldset>
            	<legend>Acessar:</legend>
            	<label>
                	<span class="tt">E-mail:</span>
                    <input type="text" name="email" value="">
                </label>
                <label>
                	<span class="tt">Senha:</span>
                    <input type="password" name="senha" value="">
                </label>
            </fieldset>
            <input type="submit" value="Entrar agora" name="sendform" class="btn">
        </form>
    </div><!-- //right -->
    
</div><!-- /form -->

<div class="form">
	<h1 class="pgtitulo">Recuperar senha:</h1>
    
    <div class="left">
    	<h2>Veja como é fácil recuperar sua senha:</h2>
        <p>Informe ao lado seu e-mail de acesso a nosso sistema e seu CPF e clique em recuperar dados.</p>
        <p>Se os dados forem corretos enviaremos um e-mail no endereço informado!</p>
        <p>Basta acessar seu e-mail e acessar o link contido no corpo da mensagem para redefinir sua senha.</p>
    </div><!-- //left -->
    
    <div class="right">
        <form name="contato" action="" method="post">
        	<fieldset>
            	<legend>Recuperar:</legend>
            	<label>
                	<span class="tt">E-mail:</span>
                    <input type="text" name="email" value="">
                </label>
                <label>
                	<span class="tt">CPF:</span>
                    <input type="text" name="cpf" value="">
                </label>
            </fieldset>
            <input type="submit" value="Receber dados" name="sendform" class="btn">
        </form>
    </div><!-- //right -->
    
</div><!-- /form -->

<div class="form">
	<h1 class="pgtitulo">Alterar senha:</h1>
    
    <div class="left">
    	<h2>Olá, você deve informar uma nova senha:</h2>
        <p>Está página está sendo exibida porque você solicitou uma recuperação de dados.</p>
        <p>Para concluir essa alteração você deve informar sua nova senha ao lado!</p>
        <p>Lemre-se. A senha deve ter de 8 a 12 caracteres.</p>
    </div><!-- //left -->
    
    <div class="right">
        <form name="contato" action="" method="post">
        	<fieldset>
            	<legend>Alterar senha:</legend>
            	<label>
                	<span class="tt">Nova senha:</span>
                    <input type="password" name="senha" value="">
                </label>
                <label>
                	<span class="tt">Repita a nova senha:</span>
                    <input type="password" name="resenha" value="">
                </label>
            </fieldset>
            <input type="submit" value="Alterar minha senha" name="sendform" class="btn">
        </form>
    </div><!-- //right -->
    
</div><!-- /form -->
</div><!-- //content -->