<!-- ARQUIVOS -->
<script type="text/javascript" src="<?php setHome();?>/js/jquery.js" /></script>
<script type="text/javascript" src="<?php setHome();?>/js/cycle.js" /></script>
<script type="text/javascript" src="<?php setHome();?>/js/shadowbox/shadowbox.js"></script>
<script type="text/ecmascript" src="<?php setHome();?>/js/mascara.js"></script>

<!--Caso for utilizar a facybox recolocar as chamadas-->

<!-- ESTILOS -->
<link rel="stylesheet" type="text/css" href="<?php setHome();?>/js/shadowbox/shadowbox.css"/>

<!-- FUNÇÕES -->
<script type="text/javascript">

    Shadowbox.init();

    /*$(document).ready(function() {
        $("a.openmodal").fancybox({
            'overlayShow'	: false,
            'transitionIn'	: 'elastic',
            'transitionOut'	: 'elastic',
            'titlePosition'	: 'over'
        });
    });

    $(document).ready(function() {
        $("a[rel=openmodal]").fancybox({
            'overlayShow'	: false,
            'transitionIn'	: 'elastic',
            'transitionOut'	: 'elastic',
            'titlePosition'	: 'over',
            'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
                return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
            }
        });
    });

    $('.small img').click(function() {
        $('.gbimgimg').attr('src', $(this).attr('src'));
        $('.gblink').attr('href', $(this).attr('src'));
    });*/

    $(function(){
        $('.slide ul').cycle({
            fx: 'fade',
            speed: 1000,
            timeout: 3000,
            pager: '.slidenav'
        })
    });

    jQuery(function($){
        $(".formDate").mask("99/99/9999 99:99:99");
        $(".formFone").mask("(99) 9999-9999");
        $(".formCep").mask("99.999-999");
        $(".formCpf").mask("999.999.999-99");
       // $("#tin").mask("99-9999999");
       // $("#ssn").mask("999-99-9999");
    });

</script>