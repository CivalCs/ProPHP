<?php
    if(function_exists(getUser)) {
        if (!getUser($_SESSION['autUser']['id'], '1')) {
            echo '<span class="ms al">Desculpe, você não tem permissao para gerenciar os usuários!</span>';
        }else{
?>
<div class="bloco form" style="display:block">
    <div class="titulo">
        Cadastrar Usuário:
        <a href="index2.php?exe=usuarios/usuarios" style="float: right" class="btnalt" title="voltar">Listar usuários</a>
    </div>
    <?php
        if(isset($_POST['sendForm'])){
            $f['nome']      = strip_tags(trim(mysql_real_escape_string($_POST['nome'])));
            $f['cpf']       = strip_tags(trim(mysql_real_escape_string($_POST['cpf'])));
            $f['email']     = strip_tags(trim(mysql_real_escape_string($_POST['email'])));
            $f['code']      = strip_tags(trim(mysql_real_escape_string($_POST['senha'])));
            $f['senha']     = md5($f['code']);
            $f['rua']       = strip_tags(trim(mysql_real_escape_string($_POST['rua'])));
            $f['cidade']    = strip_tags(trim(mysql_real_escape_string($_POST['cidade'])));
            $f['cep']       = strip_tags(trim(mysql_real_escape_string($_POST['cep'])));
            $f['telefone']  = strip_tags(trim(mysql_real_escape_string($_POST['telefone'])));
            $f['celular']   = strip_tags(trim(mysql_real_escape_string($_POST['celular'])));
            $f['nivel']     = strip_tags(trim(mysql_real_escape_string($_POST['nivel'])));
            $f['statusS']   = strip_tags(trim(mysql_real_escape_string($_POST['status'])));
            $f['status']    = ($f['statusS'] == '1' ? $f['statusS'] : '0');
            $f['date']      = strip_tags(trim(mysql_real_escape_string($_POST['cadData'])));
            $f['cadData']   = formDate($f['date']);

            if(in_array('',$f)){
                echo '<span class="ms in">Você deixou campos em branco, sugerimos que preencha todos os campos para uma boa alimentação!</span>';
            }elseif(!valMail($f['email'])){
                echo '<span class="ms al">Atenção: O e-mail informado nao tem um formato válido!</span>';
            }elseif(strlen($f['code']) < 8 || strlen($f['code']) > 12){
                echo '<span class="ms no">Erro: A senha deve ter entre 8 e 12 caracteres!</span>';
            }else{
                $readUserMail = read('up_users',"WHERE email = '$f[email]'");
                $readUserCpf = read('up_users',"WHERE cpf = '$f[cpf]'");
                if($readUserMail){
                    echo '<span class="ms no">Erro: Você não pode cadastrar dois usuários com o mesmo e-mail!</span>';
                }elseif($readUserCpf){
                    echo '<span class="ms no">Erro: Você não pode cadastrar dois usuários com o mesmo cpf!</span>';
                }else{
                    if(!empty($_FILES['avatar']['tmp_name'])) {
                        $imagem = $_FILES['avatar'];
                        $pasta = '../uploads/avatars/';
                        $tmp = $imagem['tmp_name'];
                        $ext = substr($imagem['name'],-3);
                        $nome = md5(time()).'.'.$ext;
                        $f['avatar'] = $nome;
                        uploadImage($tmp, $nome, 200, $pasta);
                    }
                    unset($f['date']);
                    unset($f['statusS']);
                    create('up_users',$f);
                    echo '<span class="ms ok">Usuário cadastrado com sucesso!</span>';
                    unset($f);
                }
            }
        }
    ?>
    <form name="formulario" action="" method="post" enctype="multipart/form-data">
        <label class="line">
            <span class="data">Nome:</span>
            <input type="text" name="nome" value="<?php if($f['nome']) echo $f['nome'];?>" />
        </label>

        <label class="line">
            <span class="data">CPF:</span>
            <input type="text"class="formCpf" name="cpf" value="<?php if($f['cpf']) echo $f['cpf'];?>" />
        </label>

        <label class="line">
            <span class="data">Email:</span>
            <input type="text" name="email" value="<?php if($f['email']) echo $f['email'];?>" />
        </label>

        <label class="line">
            <span class="data">Senha:</span>
            <input type="password" name="senha" value="<?php if($f['code']) echo $f['code'];?>" />
        </label>

        <label class="line">
            <span class="data">Rua, número:</span>
            <input type="text" name="rua" value="<?php if($f['rua']) echo $f['rua'];?>" />
        </label>

        <label class="line">
            <span class="data">Cidade/UF:</span>
            <input type="text" name="cidade" value="<?php if($f['cidade']) echo $f['cidade'];?>" />
        </label>

        <label class="line">
            <span class="data">CEP:</span>
            <input type="text"class="formCep" name="cep" value="<?php if($f['cep']) echo $f['cep'];?>" />
        </label>

        <label class="line">
            <span class="data">Telefone:</span>
            <input type="text" class="formFone" name="telefone"  value="<?php if($f['telefone']) echo $f['telefone'];?>" />
        </label>

        <label class="line">
            <span class="data">Celular:</span>
            <input type="text" class="formFone" name="celular" value="<?php if($f['celular']) echo $f['celular'];?>" />
        </label>

        <label class="line">
            <span class="data">Avatar:</span>
            <input type="file" class="fileinput" name="avatar" size="60"
                   style="cursor:pointer; background:#FFF;" />
        </label>

        <label class="line">
            <!--<span class="data">Select:</span>-->
            <select name="nivel">
                <option value="">Selecione o nível deste usuário &nbsp;&nbsp;</option>
                <option <?php if($f['nivel']&&$f['nivel']=='4') echo 'selected="selected"';?> value="4">Leitor &nbsp;&nbsp;</option>
                <option <?php if($f['nivel']&&$f['nivel']=='3') echo 'selected="selected"';?> value="3">Premium &nbsp;&nbsp;</option>
                <option <?php if($f['nivel']&&$f['nivel']=='2') echo 'selected="selected"';?> value="2">Editor &nbsp;&nbsp;</option>
                <option <?php if($f['nivel']&&$f['nivel']=='1') echo 'selected="selected"';?> value="1">Administrador &nbsp;&nbsp;</option>
            </select>
        </label>

        <label class="line">
            <select name="status">
                <option value="">Selecione o status &nbsp;&nbsp;</option>
                <option <?php if($f['statusS'] && $f['statusS']=='1') echo 'selected="selected"';?> value="1">Ativo &nbsp;&nbsp;</option>
                <option <?php if($f['statusS'] && $f['statusS']=='-1') echo 'selected="selected"';?> value="-1">Inativo &nbsp;&nbsp;</option>
            </select>
        </label>

        <label class="line">
            <span class="data">Data do Cadastro:</span>
            <input type="text" name="cadData" class="formDate" value="<?php if($f['date']) echo $f['date']; else echo date('d/m/Y H:i:s');?>" />
        </label>

        <!--<input type="reset" value="clear" class="btnalt" />-->
        <input type="submit" value="Cadastrar Novo Usuário" name="sendForm" class="btn" />

    </form>

</div><!-- /bloco form -->
<?php
        }
    }else{
        header('Location: ..index2.php');
    }
?>