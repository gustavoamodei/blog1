<div class="container">
<?php $validation = \Config\Services::validation();?>
    <form method="post"  action="<?php echo site_url('salvar_user');?>">
    
        <h2 class="align-self-center d-flex justify-content-center mt-3"><?= isset($id)? " Edição de Assinates":"Cadastro de Assinates" ?></h2>
        
            <div class="row  align-self-center d-flex justify-content-center">
                <div class="col-10 col-md-5">
                    
                <?=$validation->listErrors(); ?>
                
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome" value="<?= isset($nome)? $nome : set_value('nome') ?>"  required>
                    </div>
                        
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control"  name="email" value="<?= isset($email)? $email : set_value('email') ?>" required>
                    </div>
                    <div class="form-group">
                        <label>CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf"  value="<?= isset($cpf)? $cpf : set_value('cpf') ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Estado</label>
                        <select name="uf" id="uf" class="form-control"  required>
                        <option value="<?= isset($uf)? $uf : set_value('uf') ?>"  selected><?= isset($uf)? $uf : set_value('uf') ?></option>
                            
                            <?php foreach($estado as $item){?>
                            <option value="<?= $item->uf ?>"><?= $item->uf ?></option>
                            
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Cidade</label>
                        <select name="cidade" id="cidade" class="form-control"  required>
                            <option value="<?= isset($cidade)? $cidade : set_value('cidade') ?>" ><?= isset($cidade)? $cidade : set_value('cidade') ?></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Endereco</label>
                        <input type="text" class="form-control"   name="endereco" value="<?= isset($endereco)? $endereco : set_value('endereco') ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" class="form-control"   name="senha" value="<?= isset($senha)? $senha : set_value('senha') ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Repita a Senha</label>
                        <input type="password" class="form-control"   name="senha2" value="<?= isset($senha)? $senha : set_value('senha') ?>" required>
                    </div>
               
                    <input type="hidden"  name="id" value="<?= isset($id)? $id : set_value('id') ?>" >        
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary  btn-block" id="btn"><?= isset($id)? " Atualizar":"Cadastrar" ?></button>
                    </div>  
                </div>  
            </div>      
    </form>
</div>   
    
<script>
    $("#uf").click(function(){
        $("#cidade").empty();
        var uf_estado =$('#uf').val();

        $.ajax({
                type:'POST',
                url:'<?= base_url()?>/User_controller/getCidades',
                dataType: "JSON",
                data:{uf:uf_estado},
                success: function(data) {
                    
                    $.each(data, function(i, v){
                         
                        $("#cidade").append(`<option value="${v.nome}">${v.nome}</option>`);
                        
                    })
                 
                },error: function(){
                    alert('Ocorreu um erro parece que não há conexão com a internet');
                    //window.location.href = "/clinica_ci/pacientes";
                   
                }
        });
    });

    $("#cidade").focus(function(){
       
        $("#cidade").empty();
        
        var uf_estado= $('#uf').val();
       
       $.ajax({
               type:'POST',
               url:'<?= base_url()?>/User_controller/getCidades',
               dataType: "JSON",
               data:{uf:uf_estado},
               success: function(data) {
                   
                   $.each(data, function(i, v){
                        
                       $("#cidade").append(`<option value="${v.nome}">${v.nome}</option>`);
                       
                   })
                
               },error: function(){
                   alert('Ocorreu um erro parece que não há conexão com a internet');
                   //window.location.href = "/clinica_ci/pacientes";
                  
               }
       });
       
    
    });
    $("#uf").blur(function(){
        $("#cidade").empty();
        var uf_estado =$('#uf').val();

        $.ajax({
                type:'POST',
                url:'<?= base_url()?>/User_controller/getCidades',
                dataType: "JSON",
                data:{uf:uf_estado},
                success: function(data) {
                    
                    $.each(data, function(i, v){
                         
                        $("#cidade").append(`<option value="${v.nome}">${v.nome}</option>`);
                        
                    })
                 
                },error: function(){
                    alert('Ocorreu um erro parece que não há conexão com a internet');
                    //window.location.href = "/clinica_ci/pacientes";
                   
                }
        });
    });

</script>