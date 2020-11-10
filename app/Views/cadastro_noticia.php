

<div class="container">
<?php $validation = \Config\Services::validation();?>

    <form method="post"  enctype="multipart/form-data" action="<?php echo site_url('salvar_noticia');?>">
    
        <h2 class="align-self-center d-flex justify-content-center mt-3"><?= isset($id)? " Edição de Notícias":"Cadastro de Noticias" ?></h2>
        
            <div class="row  align-self-center d-flex justify-content-center">
                <div class="col-10 col-md-5">
                    
                <?=$validation->listErrors(); ?>
                
                    <div class="form-group">
                        <label>Titulo</label>
                        <input type="text" class="form-control" name="titulo" value="<?=isset($titulo)? $titulo : set_value('titulo')?>"  required>
                    </div>
                        
                    <div class="form-group">
                        <label>Data</label>
                        <input type="date" class="form-control"  name="data" value="<?=isset($data)? $data : set_value('data')?>" required>
                    </div>
                    <div class="form-group">
                        <label>Resumo</label>
                        <input type="text" class="form-control"  name="resumo"  value="<?=isset($resumo)? $resumo : set_value('resumo')?>" required>
                    </div>
                    <div class="form-group">
                        <label>Imagem</label>
                        <br>
                        <spam id="input_file"></spam>
                        <?php if(isset($id)){?>
                        <spam id="mostra_imagem"> <?=isset($imagem)? $imagem : set_value('imagem')?><button type="button" class="btn btn-primary  btn-block" id="altera">alterar</button>
                        <input type="hidden"  name="conteudo_mostra_imagem" value="<?=isset($imagem)? $imagem : set_value('imagem')?>" >
                        <?php }else{?>
                        
                            <input type="file" class="form-control"    name="imagem" value="" required>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                    <label>Conteúdo</label>
                    <textarea id="conteudo" name="conteudo" class="form-control"  rows="5" cols="50">
                        <?=isset($conteudo)? $conteudo : set_value('conteudo')?>
                    </textarea>
                    </div>
                    <input type="hidden"  name="id" value="<?=isset($id)? $id : set_value('id')?>" >
                    <input type="hidden"  name="user_id" value="<?= session()->id_session; ?>" >          
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary  btn-block" id="btn"><?= isset($id)? "Atualizar":"Cadastrar" ?></button>
                    </div>  
                </div>  
            </div>      
    </form>
</div>   
    
    <script>
        $("#altera").click(function(){
        $("#input_file").html( '<input type="file" class="form-control"    name="imagem" value=""required>');
        $('#mostra_imagem').remove();
       
    });
    </script>