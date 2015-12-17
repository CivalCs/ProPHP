<?php
if(function_exists(getUser)) {
    if (!getUser($_SESSION['autUser']['id'], '1')) {
        echo '<span class="ms al">Desculpe, você não tem permissao para gerenciar as categorias!</span>';
    }else{
        $urlpai = $_GET['idpai'];
        $prefix = $_GET['url'];
        $readPai = read('up_cat',"WHERE id = '$urlpai'");
        if(!$readPai){
            header('Location: index2.php?exe=posts/categorias');
        }else
            foreach($readPai as $catpai);

?>
<div class="bloco form" style="display:block">
    <div class="titulo">
        Criar sub categoria para <strong style="color: #990000"><?php echo $catpai['nome'];?></strong>
        <a href="index2.php?exe=posts/categorias" title="voltar" class="btnalt" style="float: right">Voltar</a>
    </div>
    <?php
        if(isset($_POST['sendForm'])){
            $f['nome'] = htmlspecialchars(mysql_real_escape_string($_POST['nome']));
            $f['content'] = htmlspecialchars(mysql_real_escape_string($_POST['content']));
            $f['tags'] = htmlspecialchars(mysql_real_escape_string($_POST['tags']));
            $f['date'] = htmlspecialchars(mysql_real_escape_string($_POST['data']));

            if(in_array('',$f)){
                echo '<span class="ms in">Para uma boa alimentação, preencha todos os campos!</span>';
            }else{
                $f['id_pai'] = $urlpai;
                $f['data'] = formDate($f['date']); unset($f['date']);
                $f['url'] = $prefix.'-'.setUri($f['nome']);
                $readCatUri = read('up_cat',"WHERE url LIKE '%$f[url]%'");
                if($readCatUri){
                    $f['url'] = $f['url'].'-'.count($readCatUri);
                    $readCatUri = read('up_cat',"WHERE url = '$f[url]'");
                    if($readCatUri){
                        $f['url'] = $f['url'].'_'.time();
                    }
                }
                create('up_cat',$f);
                $_SESSION['return'] =  '<span class="ms ok">Categoria criada com sucesso!</span>';
                header('Location: index2.php?exe=posts/categorias-subcriate&idpai='.$urlpai.'&uri='.$prefix);
            }
        }elseif(!empty($_SESSION['return'])){
            echo $_SESSION['return'];
            unset ($_SESSION['return']);
        }
    ?>
    <form name="formulario" action="" method="post">
        <label class="line">
            <span class="data">Nome:</span>
            <input type="text" name="nome" value="<?php if($f['nome']) echo $f['nome'];?>" />
        </label>

        <label class="line">
            <span class="data">Descrição:</span>
            <textarea name="content" rows="3"><?php if($f['content']) echo $f['content'];?></textarea>
        </label>

        <label class="line">
            <span class="data">Tags:</span>
            <input type="text" name="tags" value="<?php if($f['tags']) echo $f['tags'];?>" />
        </label>

        <label class="line">
            <span class="data">Data:</span>
            <input type="text" class="formDate" name="data" value="<?php if($f['date']){echo $f['date'];}else{echo date('d/m/Y H:i:s');}?>"/>
        </label>

        <input type="submit" value="Criar sub categoria" name="sendForm" class="btn" />
    </form>

</div><!-- /bloco form -->
<?php
        }
    }else{
        header('Location: ..index2.php');
    }
?>