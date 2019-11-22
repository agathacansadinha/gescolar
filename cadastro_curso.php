<?php
/**
 * Arquivo para registrar os dados de um curso banco de dados.
 */
if(isset($_REQUEST['cadastrar']))
{
    try
    {
      include 'includes/conexao.php';

      $sql = "INSERT INTO curso (nome) VALUES (?)";

      $stmt = $conexao->prepare($sql);
      $stmt->bindparam(1, $_REQUEST['nome']);
      $stmt->execute();

    }catch(Exception $e){
        echo $e->getmessage();
    }

}
?>
<link href="css/estilo.css" type="text/css" rel="stylesheet" />

<?php include_once 'includes/cabecalho.php' ?>

<div>
<fieldset>
     <legend>Cadastro de curso </legend>
      <form action="cadastro_curso.php?cadastrar=true">
        <label>Nome: <input type="text" name="nome" required /> </label>
        <button type="submit">Salvar</button>
</form>
</legend>
</div>
