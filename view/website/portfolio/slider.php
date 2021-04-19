

<?php

    $cortexto_array = ['white-text', 'black-text'];
    $posicaotexto_array = ['left-align', 'center-align', 'right-align'];

    $select = "SELECT port.id, port.titulo, port.subtitulo_1, port.cor_texto, port.posicao_texto FROM portfolio port WHERE port.tipo_registro IN (1) AND port.id_statusregistro IN (1) ORDER BY port.id ASC";
    $slider_array = sqlQueries($conn, $select, true);
?>


<div class="slider fullscreen" data-scrolltop="slider">
    <ul class="slides">

      <?php

        foreach ($slider_array as $slider) {
            $cor_texto = $cortexto_array[$slider['cor_texto'] - 1];
            $posicao_texto = $posicaotexto_array[$slider['posicao_texto'] - 1];
            $li_properties = '';

            if ($cor_texto == 'white-text') {
                $li_properties = "data-darktheme='true'";
            }


            $imagem_url = "uploads/website/slider_{$slider['id']}.jpeg";


            echo "<li {$li_properties}>
                    <img src='$imagem_url'>
                
                    <div class='caption {$posicao_texto}'>
                        <h3 class='{$cor_texto}'> {$slider['titulo']} </h3>
                        <h5 class='{$cor_texto}'> {$slider['subtitulo_1']} </h5>
                    </div>
                </li>";
        }

      ?>

    </ul>
</div>