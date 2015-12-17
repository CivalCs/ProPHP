<?php
if(function_exists(getUser)) {
    if (!getUser($_SESSION['autUser']['id'], '1')) {
        echo '<span class="ms al">Desculpe, você não tem permissão para gerenciar as páginas!</span>';
    }else{
?>
<div class="bloco form" style="display:block">
    <div class="titulo">
        Publicar nova página:
        <a href="index2.php?exe=paginas/paginas" title="Páginas" class="btnalt" style="float: right">Listar Páginas</a>
    </div>
    <?php
        if(isset($_POST['sendForm'])){
            $f['titulo']    = htmlspecialchars(mysql_real_escape_string($_POST['titulo']));
            $f['tags']      = htmlspecialchars(mysql_real_escape_string($_POST['tags']));
            $f['content']   = mysql_real_escape_string($_POST['content']);
            $f['date']      = htmlspecialchars(mysql_real_escape_string($_POST['data']));
            $f['categoria'] = '0';
            $f['nivel']     = '0';
            $f['status']    = '1';
            $f['autor']     = $_SESSION['autUser']['id'];
            $f['tipo']      = 'pagina';

            if(in_array('',$f)){
                echo '<span class="ms in">Para uma boa alimentação, informe todos os campos!</span>';
            }else{
                $f['data'] = formDate($f['date']); unset($f['date']);
                $f['url'] = setUri($f['titulo']);
                $readPostUri = read('up_posts',"WHERE url LIKE '%$f[url]%'");
                if($readPostUri){
                    $f['url'] = $f['url'].'-'.count($readPostUri);
                    $readPostUri = read('up_posts',"WHERE url = '$f[url]'");
                    if($readPostUri){
                        $f['url'] = $f['url'].'_'.time();
                    }
                }

                create('up_posts',$f);
                echo '<span class="ms ok">Página cadastrada com sucesso, você pode visualizá-la <a href="'.BASE.'/sessao/'.$f['url'].'" target="_blank" title="Ver Página">aqui!</a></span>';
            }

        }
    ?>

    <form name="formulario" action="" method="post" enctype="multipart/form-data">
        <label class="line">
            <span class="data">Nome da página:</span>
            <input type="text" name="titulo" value="<?php if($f['titulo']) echo $f['titulo'];?>" />
        </label>

        <label class="line">
            <span class="data">Tags:</span>
            <input type="text" name="tags" value="<?php if($f['tags']) echo $f['tags'];?>" />
        </label>

        <label class="line">
            <span class="data">Conteúdo:</span>
            <textarea name="content" class="editor" rows="15"><?php if($f['content']) echo htmlspecialchars(stripslashes($f['content']));?></textarea>
        </label>

        <label class="line">
            <span class="data">Data:</span>
            <input type="text" name="data" class="formDate" value="<?php if($f['date']) echo $f['date']; else echo date('d/m/Y H:i:s');?>" />
        </label>

        <!--<input type="submit" value="Salvar" name="sendForm" class="btnalt" />-->
        <input type="submit" value="Publicar página" name="sendForm" class="btn" />

    </form>

</div><!-- /bloco form -->
<?php
        }
    }else{
        header('Location: ..index2.php');
    }
?>