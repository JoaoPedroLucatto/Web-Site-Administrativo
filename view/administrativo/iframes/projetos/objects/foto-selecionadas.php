
<div id="photos-selected" style="display: none;"><?php echo $listar['fotos_selecionadas']?></div>
<div class="id_"></div>
<div class="row">
    <div class=" col s12">
        <div class="col s12">
            <button class="waves-effect btn photos_list_padrao" data-modaltrigger="lightroom" style="background-color: rgba(0, 30, 54, .8);"><img src="../../../../images/icons/lightroom.png" style="height: 25px; margin: 5px 5px 5px 0px; vertical-align: top;">Lightroom</button>
        </div>
    </div>

    <!-- MODAL LIGHTROOM -->
<div class="modal-background" data-modal='lightroom'> </div>
    <div class="my-modal" data-modal='lightroom'>
        <span class="title">
            Padrão Lightroom
            <img src="../../../../images/icons/close-black.png" class="mymodal-close">
        </span>
        <div class="content">
            <div class="row">
                <div class="col s12">
                    <span class="value">Importe as fotos selecionada pelo cliente de maneira fácil e rápida !</span></br></br>
                    <span class="value">1 - Clique no botão "Copia".</span></br>
                    <span class="value">2 - Abre seu editor de fotos(Lightroom).</span></br>
                    <span class="value">3 - Por fim, realize a importação das imagens copiadas.</span>
                </div>
                <div class=" col s12 textareabox">
                    <textarea id="lightroom" cols="100" rows="100"></textarea>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="col s12">
                <button id="copy" class="blue darken-2 waves-effect right">Copiar</button>
            </div>
        </div>
    </div>  


    <div class="col s12 no-padding list-photos">

        <?php

        $photo = json_decode($listar['fotos_selecionadas'], true);

            if(count($photo) > 0){
                foreach($photo as $photo_selected){

                    echo  "<div class='photos-item'>".
                             "<img src='$caminho_projeto$photo_selected'>".
                           "</div>";
    
                }
            }
            else{
        ?>  
                <div class="col s12 datatable-null">
                    <span>Nenhuma foto selecionada...</span>
                </div>
        <?php

            }

        ?>

    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {    
    
    let textarea = $('div.my-modal').find('div.textareabox > textarea');

    

    /* MOSTRA A LISTA DE FOTOS NO PADRAO DOS EDITORES (LIGHTROOM)*/
    $('button.photos_list_padrao').on('click', function() {

        let modal_click = $(this).attr('data-modaltrigger');
        let json_photo = $('div#photos-selected').html();
        
        if(modal_click == 'lightroom'){

             textarea.val(padraoLightroom(json_photo));

        }

    });
    
    
    
    /* COPIAR TEXTO */
    $('button#copy').on('click', function() {

        $('div.textareabox > textarea').select();

        if(document.execCommand('copy')){
            window.parent.showToast(1, 'Dados Copiados !');
        }
        else{
            window.parent.showToast(2, 'Ao Copiar os Dados, contate o suporte para análise !');
        }
    });


    /* PADRAO DE ABRIR FOTOS DO EDITOR LIGHTROOM */
    function padraoLightroom(json_photos,){
        
        let json = JSON.parse(json_photos);
        let resultado= '';
        let padrao = '., ';

        for(let photo of json){

             resultado += photo.split(".")[0].concat(padrao);

        }

        return resultado;
    }

});




</script>
