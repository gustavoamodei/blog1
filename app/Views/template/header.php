<html>
<head>
        <title>blog</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- <link rel="stylesheet" href="app/sp/dist/picker.min.css"> -->
        <!--<script type="text/javascript" src="app/sp/dist/picker.min.js"></script>-->
       
    </head>
    <body>
       
     
        <nav class="navbar navbar-expand-lg  navbar-light" style="background-color: #42f5b9;">
        
          <a class="navbar-brand" href="#">Blog</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">
             
            <?php if( isset(session()->nome_session)){?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span style ="color:white;">Cadastro/Simulação</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href=<?=site_url('listar_users');?>>Listar Usuários</a>
                    <a class="dropdown-item" href=<?=site_url('listar_noticias');?>>Listar Notícias</a>
                    <a class="dropdown-item" href=<?=site_url('cadastro_usuario');?>>Cadastro de Usuários</a>
                    <a class="dropdown-item" href=<?=site_url("cadastro_noticia")?>>Cadastro de notícias</a>
                </div>
              </li>
              <?php } ?> 
              <span style=" margin-left: 600px"><?php echo isset(session()->nome_session)? 'olá: '.session()->nome_session:"" ?>
              <?php if(isset(session()->nome_session)){?>
                <a style=" margin-left: 20px" href=<?=site_url("deslogar")?>>Logout</a>
              <?php } ?>
              
              <span>
             
          </div> 
                              
          
        </nav>
        
    <style>
         @media only screen and (max-width:  992px) {
      #u {
          position: absolute;
          margin-left: 300px;
      
      }
    }
    </style>