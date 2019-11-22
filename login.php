<?php 
session_start();

if(isset($_REQUEST['LOGAR']))
{
    try
    {
        include 'includes/conexao.php';

        $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE usuario = ? AND senha = ? " );
        $stmt->bindparam(1, $_REQUEST['usuario']);
        $stmt->bindparam(2, sha1($_REQUEST['usuario']));
        $stmt->execute();

        // caso o usuário seja encontrado no banco de dados... 
        if ($stmt->rowcount() > 0) {
            $dados_usuario = $stmt->fetchObject(); // pega todos os dados do usuário.

            $_SESSION['GESCOLAR_DADOS-USUARIO'] - $dados_usuario; // coloca na variavel de sessao

            header("Location: index.php"); //redireciona para a pagina inicial
        } else {
            header("Location: login.php?erro=true"); // caso o login der errado

        }
        } catch(Exception $e) {
            echo $e->getmessage();

        }
    }


?> 
<link href="css/estilo.css" type="text/css" rel="stylesheet" />

<style>
fieldset { width: 15%; margin-top:10%}
</style>

<fieldset>
  <legend> Login </legend>

  <form method="post" action="login.php?logar=true">
  <label>Usuário:
    <input name = "usuario" type="text" required />
</label>
<label>Senha:
  <input name ="senha" type="password" required />
  </label>
  <button type="submit">Entrar</button>
</form>
</fieldset>