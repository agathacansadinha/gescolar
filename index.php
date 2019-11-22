 <?php

 //caso o usuario clique em sair 
 if(isset($_REQUEST['sair'])) {

    unset($_SESSION['gescolar_dados_usuario']) //destroí a sessão de autenticação do usúario.
    header("location: login.php"); //redireciona para o login.
 }

//protegendo a página contra acesso sem autenticação
if(isset($_SESSION['gescolar_dados_usuario'])) {
    header("location: login.php"); //redireciona para o login.
}

//abreviando o nome da variável que contém os dados do usúario.
$usuario = $_SESSION['gescolar_dados_usuario'];

?>
<!DOCTYPE html>
<html>
    <head>
        <link href="css/estilos.css" type="text/css" rel="stylesheet" />
    <head>
    <body>
        <div id="global">
        
            <h1>GESCOLAR <small>, Bem-vindo <?= $usuario['nome'] ?> </small> </h1>

            <?php include_once 'includes/cabecalho.php' ?>
           
        </div>
    </body>
</html>
                    
            