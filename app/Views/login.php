
<html>
<head>
    <title>blog</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
</head>
    <body>
    
        <div id="fundo">
            
        </div>
            <div class="container">
            <?php $session = session();?>
                    <?php if($session->getFlashdata('erro')){?>
                        <div>
                            <div class="alert alert-danger" role="alert">
                                <?=$session->getFlashdata('erro');?>
                            </div>
                        </div>
                    <?php } ?>
                <div class="row align-self-center d-flex justify-content-center  ">
                    <div class="col-8 col-md-4 mt-5 ">
                    <br><br><br><br><br>
                    <form action="<?php echo site_url('Home/login');?>" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Usuário</label>

                            <input type="text" class="form-control" name="email"  placeholder="usuário" required>

                        </div>

                        <div class="form-group ">

                            <label for="exampleInputPassword1">Senha</label>

                            <input type="password" class="form-control" name="senha" placeholder="Senha">

                        </div>
                        <a  href=<?=site_url("cadastro_usuario")?>>Clique para Cadastrar</a>
                        
                        <div class="form-group">
                        <br>
                              <button type="submit" class="btn btn-primary form-control btn-block">Logar</button>
                        </div>
                
                                    
                    </div>         
                </div>	
            </div>
    <body>
<html>

<style>
	#fundo img {
    width: 100%; /* com isso imagem ocupará toda a largura da tela. Se colocarmos height: 100% também, a imagem irá distorcer */
    position: absolute;
	height: 100%;
	}
	label {
		color: black;
		font-size: 16pt;
	}
	
	
</style>
