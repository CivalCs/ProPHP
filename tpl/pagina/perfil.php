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
	<h1 class="pgtitulo">Bem vindo [CLIENTE] ao seu perfil.</h1>
    
    <div class="left" style="float:right;">
    	<h2>Confira e atualize seu avatar:</h2>
        <p>Sua cara em nosso site atualmente é:</p>
        <img src="<?php setHome();?>/tpl/images/noavatar.jpg" title="Avatar">
        <p>Deseja alterar este avatar?</p>
        <form name="avatar" action="" method="post" enctype="multipart/form-data">
        	<input type="file" name="img" onchange="document.avatar.submit();">
        </form>
        <br />
        <h2>Atualmente sua conta é:</h2>
        <p style="font:bold 20px Verdana, Geneva, sans-serif; color:#0CF; margin:0;">LEITOR</p>
        <p>Para alterar sua conta basta selecionar abaixo.</p>
        <form name="contatipo" action="" method="post">
        	<label style="width:320px;">
                <select name="conta" onChange="document.contatipo.submit();">
                	<option value="">Selecione seu tipo de conta:</option>
                    <option value="leitor">Conta leitor ( FREE )</option>
                    <option value="leitor">Conta Premium ( R$ 9,90/Mês )</option>
                </select>
            </label>
        </form>
        <p style="float:left;"><strong>ATENÇÂO:</strong> Ao alterar para conta premium uma fatura de R$ 9,90 é gerada em seu nome.</p>
    </div><!-- //left -->
    
    <div class="right" style="float:left;">
    	<form name="cadastro" action="" method="post">
        	<fieldset>
            	<legend>Identificação:</legend>
            	<label>
                	<span class="tt">Nome completo:</span>
                    <span class="campos">Robson V. Leite</span>
                </label>
                <label>
                	<span class="tt">CPF:</span>
                     <span class="campos">xxx.xxx.xxx-43</span>
                </label>
                <label>
                	<span class="tt">E-mail:</span>
                    <span class="campos">contato@upinside.com.br</span>
                </label>
            </fieldset>
            
            <fieldset>
            	<legend>Endereço:</legend>
            	<label>
                     <span class="campos">Rua Emilio Gaundencio de Moraes 1207, Soledade/RS - CEP: 99.300-000</span>
                </label>
            </fieldset>
            
            <fieldset>
            	<legend>Contato:</legend>
            	<label>
                	<span class="tt">Telefone / Celular:</span>
                    <span class="campos">(54) 3381.2185 / (54) 8408.3448</span>
                </label>
            </fieldset>
            <fieldset>
            	<legend>Alterar Senha:</legend>
            	<label>
                	<span class="tt">Nova senha:</span>
                    <input type="password" name="senha">
                </label>
                <label>
                	<span class="tt">Repita sua nova senha:</span>
                    <input type="password" name="senha">
                </label>
            </fieldset>
            <input type="submit" value="Atualizar senha" name="sendform" class="btn">
        </form>
    </div><!-- //right -->
    
</div><!-- /form -->
</div><!-- //content -->