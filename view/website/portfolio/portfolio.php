


<?php

    $select = "SELECT port.id, port.titulo, port.subtitulo_1, port.subtitulo_2, port.link_video FROM portfolio port WHERE port.tipo_registro IN (2) AND port.id_statusregistro IN (1) ORDER BY port.id ASC";
    $portfolio_array = sqlQueries($conn, $select, true);
?>


<link rel="stylesheet" type="text/css" href="style/css/website/portfolio.css">
<script type="text/javascript" src="style/js/website/portfolio.js"></script>


<div class="col s12 sector slider-margin" data-scrolltop="portfolio">
    <span class="title"> PORTFÓLIO </span>
    <span class="subtitle"> Conheça um pouco de meu trabalho em alguns projetos realizados com outros clientes! </span>

    <div class="portfoliolist">
        
        <?php

            foreach ($portfolio_array as $portfolio) {
                $html_item = "";

                if (!empty($portfolio['link_video'])) {
                    $html_item = "<div class='item hide'>
                                    <iframe src='{$portfolio['link_video']}'> </iframe>
                                </div>";
                }

                else {
                    $imagem_url = "uploads/website/portfolio_{$portfolio['id']}.jpeg";

                    $html_item = "<div class='item hide' style='background-image: url({$imagem_url});'>
                                    <div class='informations'>
                                        <span class='title'> {$portfolio['titulo']} </span>
                                        <span class='subtitle'> {$portfolio['subtitulo_1']} </span>
                                        <span class='subtitle'> {$portfolio['subtitulo_2']} </span>
                                    </div>
                                </div>";
                }


                echo $html_item;
            }

        ?>

    </div>

    <div class="col s12 show-more hide">
        <span> Mostrar Mais </span>
    </div>
</div>



<div class="col s12 sector">
    <span class="title"> OQUE OS CLIENTES DIZEM? </span>

    <div class="col l4 m6 s12">
        <span class="subtitle">
            Texto do cliente 1
        </span>

        <br>
        
        <span class="subtitle"> <b> Nome Cliente 1 </b> </span>
    </div>

    <div class="col l4 m6 s12">
        <span class="subtitle">
            Texto do Cliente 2
        </span>

        <br>
        
        <span class="subtitle"> <b> Nome Cliente 2 </b> </span>
    </div>

    <div class="col l4 m6 s12">
        <span class="subtitle">
            Texto do Cliente 3
        </span>

        <br>
        
        <span class="subtitle"> <b> Nome Cliente 3 </b> </span>
    </div>
</div>