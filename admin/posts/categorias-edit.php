<?php
if(function_exists(getUser)) {
    if (!getUser($_SESSION['autUser']['id'], '1')) {
        echo '<span class="ms al">Desculpe, você não tem permissao para gerenciar as categorias!</span>';
    }else{
        $urledit = $_GET['edit'];
        $readEdit = read('up_cat',"WHERE id = '$urledit'");
        if(!$readEdit){
            header('Location: index2.php?exe=posts/categorias');
        }else
            foreach($readEdit as $catedit);
?>
<div class="bloco form" style="display:block">
    <div class="titulo">
        Editar categoria <strong style="color: #990000"><?php echo $catedit['nome'];?></strong>
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
                $f['data'] = formDate($f['date']); unset($f['date']);
                if($catedit['nome']!= $f['nome']){
                    $prefix = $_GET['url'];
                    if($prefix){
                        $f['url'] = $prefix.'-'.setUri($f['nome']);
                        $readCatUri = read('up_cat',"WHERE url LIKE '%$f[url]%'AND id_pai IS NOT null AND id != '$urledit'");
                        if($readCatUri){
                            $f['url'] = $f['url'].'-'.count($readCatUri);
                            $readCatUri = read('up_cat',"WHERE url = '$f[url]'AND id_pai IS NOT null AND id != '$urledit'");
                            if($readCatUri){
                                $f['url'] = $f['url'].'_'.time();
                            }
                        }
                    }else{
                        $f['url'] = setUri($f['nome']);
                        $readCatUri = read('up_cat',"WHERE url LIKE '%$f[url]%'AND id_pai IS null AND id != '$urledit'");
                        if($readCatUri){
                            $f['url'] = $f['url'].'-'.count($readCatUri);
                            $readCatUri = read('up_cat',"WHERE url = '$f[url]'AND id_pai IS null AND id != '$urledit'");
                            if($readCatUri){
                                $f['url'] = $f['url'].'_'.time();
                            }
                        }
                    }
                    /*$readCatUri = read('up_cat',"WHERE url LIKE '%$f[url]%'");
                    if($readCatUri){
                        $f['url'] = $f['url'].'-'.count($readCatUri);
                        $readCatUri = read('up_cat',"WHERE url = '$f[url]'");
                        if($readCatUri){
                            $f['url'] = $f['url'].'_'.time();
                        }
                    }*/
                }else{
                    $f['url'] = $catedit['url'];
                }

                /*$readCatUri = read('up_cat',"WHERE url = '$f[url]'");
                if(count($readCatUri) > 1){
                    $f['url'] = $catedit['url'].'-'.time();
                }*/
                update('up_cat',$f,"id = '$urledit'");
                $_SESSION['return'] = '<span class="ms ok">Categoria atualizada com sucesso!</span>';
                if($prefix) {
                    header('Location: index2.php?exe=posts/categorias-edit&edit=' . $urledit.'&uri='.$prefix);
                }else{
                    header('Location: index2.php?exe=posts/categorias-edit&edit=' . $urledit);
                }
            }
        }elseif(!empty($_SESSION['return'])){
            echo $_SESSION['return'];
            unset ($_SESSION['return']);
        }

    ?>
    <form name="formulario" action="" method="post">
        <label class="line">
            <span class="data">Nome:</span>
            <input type="text" name="nome" value="<?php echo $catedit['nome'];?>" />
        </label>

        <label class="line">
            <span class="data">Descrição:</span>
            <textarea name="content" rows="3"><?php echo $catedit['content'];?></textarea>
        </label>

        <label class="line">
            <span class="data">Tags:</span>
            <input type="text" name="tags" value="<?php echo $catedit['tags'];?>" />
        </label>

        <label class="line">
            <span class="data">Data:</span>
            <input type="text" class="formDate" name="data" value="<?php echo date('d/m/Y H:i:s',strtotime($catedit['data']));?>"/>
        </label>

        <input type="submit" value="Atualizar categoria" name="sendForm" class="btn" />
    </form>

</div><!-- /bloco form -->
<?php
        }
    }else{
        header('Location: ..index2.php');
    }
?>