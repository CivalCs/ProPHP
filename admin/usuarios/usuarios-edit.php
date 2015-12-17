<?php
    if(function_exists(getUser)) {
        if (!getUser($_SESSION['autUser']['id'], '2')) {
            echo '<span class="ms al">Desculpe, você não tem permissao para gerenciar os usuários!</span>';
        }else{
            $userEditId = $_GET['userid'];
            $readEditId = read('up_users',"WHERE id = '$userEditId'");
            if(!$readEditId){
                header('Locaton: index2.php?exe=usuarios/usuarios');
            }elseif($_SESSION['autUser']['nivel']!='1'){
                foreach($readEditId as $user);
                if($_SESSION['autUser']['nivel']!= $user['id']){
                    header('Locaton: index2.php?exe=usuarios/usuarios');
                }
            }else
                foreach($readEditId as $user);
                $status = ($user['status']=='1'?$user['status']:'-1');

?>
<div class="bloco form" style="display:block">
    <div class="titulo">
        Editar Usuário:<strong style="color:red"><?php echo $user['nome'];?></strong>
        <?php if($_SESSION['autUser']['nivel'] == '1'){ ?>
        <a href="index2.php?exe=usuarios/usuarios" style="float: right" class="btnalt" title="voltar">Voltar</a>
        <?php }else{?>
        <a href="index2.php" style="float: right" class="btnalt" title="voltar">Voltar</a>
        <?php }?>
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
                    if(!empty($_FILES['avatar']['tmp_name'])) {
                        $imagem = $_FILES['avatar'];
                        $pasta = '../uploads/avatars/';
                        if(file_exists($pasta.$user['avatar'])&& !is_dir($pasta.$user['avatar'])){
                            unlink($pasta.$user['avatar']);
                        }
                        $tmp = $imagem['tmp_name'];
                        $ext = substr($imagem['name'],-3);
                        $nome = md5(time()).'.'.$ext;
                        $f['avatar'] = $nome;
                        uploadImage($tmp, $nome, 200, $pasta);
                    }
                    unset($f['date']);
                    unset($f['statusS']);
                    update('up_users',$f,"id = '$userEditId'");
                    $_SESSION['return'] =  '<span class="ms ok">Usuário atualizado com sucesso!</span>';
                    header('Location: index2.php?exe=usuarios/usuarios-edit&userid='.$userEditId);
            }
        }elseif(!empty($_SESSION['return'])){
            echo $_SESSION['return'];
            unset ($_SESSION['return']);
        }
    ?>
    <form name="formulario" action="" method="post" enctype="multipart/form-data">
        <label class="line">
            <span class="data">Nome:</span>
            <input type="text" name="nome" value="<?php echo $user['nome'];?>" />
        </label>
        <?php if($_SESSION['autUser']['nivel'] == '1'){ ?>
        <label class="line">
            <span class="data">CPF:</span>
            <input type="text"class="formCpf" name="cpf" value="<?php echo $user['cpf'];?>" />
        </label>

        <label class="line">
            <span class="data">Email:</span>
            <input type="text" name="email" value="<?php echo $user['email'];?>" />
        </label>
        <?php } ?>
        <label class="line">
            <span class="data">Senha:</span>
            <input type="password" name="senha" value="<?php echo $user['code'];?>" />
        </label>

        <label class="line">
            <span class="data">Rua, número:</span>
            <input type="text" name="rua" value="<?php echo $user['rua'];?>" />
        </label>

        <label class="line">
            <span class="data">Cidade/UF:</span>
            <input type="text" name="cidade" value="<?php echo $user['cidade'];?>" />
        </label>

        <label class="line">
            <span class="data">CEP:</span>
            <input type="text"class="formCep" name="cep" value="<?php echo $user['cep'];?>" />
        </label>

        <label class="line">
            <span class="data">Telefone:</span>
            <input type="text" class="formFone" name="telefone"  value="<?php echo $user['telefone'];?>" />
        </label>

        <label class="line">
            <span class="data">Celular:</span>
            <input type="text" class="formFone" name="celular" value="<?php echo $user['celular'];?>" />
        </label>

        <label class="line">
            <?php
                if($user['avatar'] != '' && file_exists('../uploads/avatars/'.$user['avatar'])){
                    echo '<a href="../uploads/avatars/'.$user['avatar'].'" title="ver avatar" rel="ShadowBox">
                    <img src="../tim.php?src=../uploads/avatars/'.$user['avatar'].'&w=50&h=50&zc=1&q=100" title="Avatar do usuário" alt="Avatar do usuário">
                    </a>';
                }else{
                    echo 'Avatar:';
                }
            ?>
            <input type="file" class="fileinput" name="avatar" size="60"
                   style="cursor:pointer; background:#FFF;" />
        </label>
        <?php if($_SESSION['autUser']['nivel'] == '1'){ ?>
        <label class="line">
            <select name="nivel">
                <option value="">Selecione o nível deste usuário &nbsp;&nbsp;</option>
                <option <?php if($user['nivel'] && $user['nivel']=='4') echo 'selected="selected"';?> value="4">Leitor &nbsp;&nbsp;</option>
                <option <?php if($user['nivel'] && $user['nivel']=='3') echo 'selected="selected"';?> value="3">Premium &nbsp;&nbsp;</option>
                <option <?php if($user['nivel'] && $user['nivel']=='2') echo 'selected="selected"';?> value="2">Editor &nbsp;&nbsp;</option>
                <option <?php if($user['nivel'] && $user['nivel']=='1') echo 'selected="selected"';?> value="1">Administrador &nbsp;&nbsp;</option>
            </select>
        </label>

        <label class="line">
            <select name="status">
                <option value="">Selecione o status &nbsp;&nbsp;</option>
                <option <?php if($status && $status =='1') echo 'selected="selected"';?> value="1">Ativo &nbsp;&nbsp;</option>
                <option <?php if($status && $status =='-1') echo 'selected="selected"';?> value="-1">Inativo &nbsp;&nbsp;</option>
            </select>
        </label>

        <label class="line">
            <span class="data">Data do Cadastro:</span>
            <input type="text" name="cadData" class="formDate" value="<?php echo date('d/m/Y H:i:s',strtotime($user['cadData']));?>" />
        </label>
        <?php }?>

        <input type="submit" value="Atualizar Usuário" name="sendForm" class="btn" />

    </form>

</div><!-- /bloco form -->
<?php
        }
    }else{
        header('Location: ..index2.php');
    }
?>