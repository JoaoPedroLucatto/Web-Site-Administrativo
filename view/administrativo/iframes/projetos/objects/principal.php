

    <div class="row">
        <div class="col s12 no-padding">
            <div class="col s12 m10 l10">
                <div class="col s12 m3 l3 inputbox no-padding">
                    <input type="text" class="browser-default" disabled value="<?php echo empty($listar['id']) ? '' : $listar['id']; ?>">
                    <label>ID</label>
                </div>

                <div class="col s12 m10 l9 inputbox">
                    <input type="text" class="browser-default" maxlength="100" autocomplete="off" name="titulo" required value="<?php echo empty($listar['titulo']) ? '' : $listar['titulo']; ?>">
                    <label>Titulo</label>
                </div> 

                <div class="col s8 m5 l3 selectbox">
                    <label>Status Registro</label>
                    <select class="browser-default" name="statusregistro">
                        <?php

                        $sql = "SELECT * FROM status_registros WHERE id !=3";
                        $array_return = true;
                        $row2 = sqlQueries($conn, $sql, $array_return);


                        if (count($row2) > 0) {
                            foreach ($row2 as $row_two) {
                                $selected = $listar['id_statusregistro'] == $row_two['id'] ? 'selected' : '';
                                echo "<option value='" . $row_two['id'] . "'$selected>" . $row_two['descricao'] . " </option>";
                            }
                        } 
                        else {
                            echo '<option> Nenhum Status de Registro cadastrado... </option>';
                        }

                        ?>
                    </select>
                </div>

                <div class="col s12 m6 l4 offset-l1 offset-m1 upload-arquivo">
                    <label for="arquivo"><img src="../../../../images/icons/file-upload-white.png">Upload</label>
                    <input type="file" name="upload-imagem[]" id="arquivo" multiple="multiple" accept=".jpg, .jpeg, .png">
                    <span class="num-img"></span>
                </div>

                <div class="col s12 textareabox">
                    <textarea name="descricao" class="browser-default" maxlength="100" autocomplete="off" cols="100 " rows="100"><?php echo empty($listar['descricao']) ? '' : $listar['descricao']; ?></textarea>
                    <label>Descrição</label>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){

            $('input:file').on('change', function(){

                var inputSize = $(this)[0].files.length;
                $('span.num-img').text(inputSize > 1 ? 'Selecionados: '+inputSize : 'Selecionado: '+inputSize);

            });
        });
    </script>
