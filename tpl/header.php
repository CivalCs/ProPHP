<div id="header">

    <div class="logo">
        <a href="<?php setHome();?>" title="<?php echo SITENAME; ?> - Entretenimento, games, internet e tecnologia">
            <img src="<?php setHome();?>/tpl/images/logo.png" alt="Logo <?php echo SITENAME; ?>" title="<?php echo SITENAME; ?> - Entretenimento, games, internet e tecnologia" />
        </a>
    </div><!-- /header-logo -->
    
    <div class="search">
    	<form name="search" action="<?php setHome();?>/pesquisa/" method="post">
        	<label><input type="text" name="s" value="" /></label>
            <input type="submit" class="btn" value="" />
        </form>
    </div><!-- /headr-search -->
    
    <ul class="hnav">
    	<li><a title="<?php echo SITENAME; ?> | Home" href="<?php setHome();?>">Home</a></li>
        <?php
            $readCatMenu = read('up_cat',"WHERE id_pai IS NULL ORDER BY nome ASC");
            foreach($readCatMenu as $catMenu):
                echo '<li><a title="'.$catMenu['nome'].' | '.SITENAME.'" href="'.BASE.'/categoria/'.$catMenu['url'].'">'.$catMenu['nome'].'</a>';
                $readSubCatMenu = read('up_cat',"WHERE id_pai = '$catMenu[id]' ORDER BY nome ASC");
                echo '<ul class="sub">';
                foreach($readSubCatMenu as $catSubMenu):
                        echo '<li><a title="'.$catSubMenu['nome'].' | '.SITENAME.'" href="'.BASE.'/categoria/'.$catSubMenu['url'].'">'.$catSubMenu['nome'].'</a></li>';
                endforeach;
                echo '</ul>';
                echo '</li>';
            endforeach;
        ?>

        <li><a title="<?php echo SITENAME; ?> | Cadastre-se" href="<?php setHome();?>/pagina/cadastro">Cadastre-se</a></li>
        <li><a title="<?php echo SITENAME; ?> | Logar-se" href="<?php setHome();?>/pagina/login">Logar-se</a></li>
        <li class="last"><a title="<?php echo SITENAME; ?> | Logar-se" href="<?php setHome();?>/pagina/contato">Contato</a></li>
    </ul><!-- /hnav -->
    
</div><!-- /header -->