<?php
    if(function_exists(getUser)) {
        if (!getUser($_SESSION['autUser']['id'], '1')) {
            echo '<span class="ms al">Desculpe, você não tem permissao para gerenciar as categorias!</span>';
        }else{
?>
<div class="bloco form" style="display:block">
    <div class="titulo">Formulário:</div>

    <form name="formulario" action="" method="post">
        <label class="line">
            <span class="data">Campo:</span>
            <input type="text" name="" value="" />
        </label>


        <label class="line">
            <span class="data">Texto:</span>
            <textarea name="" class="editor" rows="10"></textarea>
        </label>

        <label class="line">
            <span class="data">Select:</span>
            <select name="">
                <option value="">Selecione uma opção &nbsp;&nbsp;</option>
            </select>
        </label>

        <label class="line">
            <span class="data">Arquivo:</span>
            <input type="file" class="fileinput" name="img" size="60"
                   style="cursor:pointer; background:#FFF;" />
        </label>

        <div class="check">
            <span class="data">CheckBox:</span>
            <ul>
                <li><label><input type="checkbox" value="1" /> Valor</label></li>
                <li><label><input type="checkbox" value="1" /> Valor</label></li>
                <li class="last"><label><input type="checkbox" value="1" />
                        Valor</label></li>
                <li><label><input type="checkbox" value="1" /> Valor</label></li>
                <li><label><input type="checkbox" value="1" /> Valor</label></li>
                <li class="last"><label><input type="checkbox" value="1" />
                        Valor</label></li>
            </ul>
        </div>

        <div class="check">
            <span class="data">RadioButton:</span>
            <ul>
                <li><label><input type="radio" value="1" name="0" /> Valor</label></li>
                <li><label><input type="radio" value="1" name="0" /> Valor</label></li>
                <li class="last"><label><input type="radio" value="1" name="0" />
                        Valor</label></li>
            </ul>
        </div>

        <input type="reset" value="clear" class="btnalt" />
        <input type="submit" value="send" name="sena" class="btn" />

    </form>

</div><!-- /bloco form -->
<?php
        }
    }else{
        header('Location: ..index2.php');
    }
?>