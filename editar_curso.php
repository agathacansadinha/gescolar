<?php
try
{
    include 'includes/conexao.php';

    if(isset($_REQUEST['atualizar']))
    {
        $sql = "UPDATE curso SET nome = ? where ID = ? ";

        $stmt = $conexao->prepare($sql);
        $stmt->bindparam(1, $_REQUEST['nome']);
        $stmt->bindparam(2, $_REQUEST['id_curso']);
        $stmt->execute();
    }

    if(isset($_REQUEST['excluir']))
    {
        $stmt = $conexao->prepare("DELETE FROM curso WHERE id = ?");
        $stmt->bindparam(1,$_REQUEST['id_curso']);
        $stmt->execute();
        header("location: lista_cursos.php");
    }

    $stmt = $conexao->prepare("SELECT * FROM curso WHERE id = ?");
    $stmt->bindparam(1, $_REQUEST['id_curso']);
    $stmt->execute();

    $curso = $stmt->fetchObject();

} catch(Exception $e) {
    echo $e->getmessage();
}
?>
<link href="css/estilo.css" type="text/css" rel="stylesheet" />
<?php include_once 'includes/cabecalho.php' ?>
<div>
<fieldset>
     <legend>Cdastro de Curso </legend>
       <form action="editar_curso.php?atualizar=true">
        <label> Nome:
          <input type="text" name="nome" required value="<?= $curso->nome ?>" />
        </label>

        <a href="editar_curso.php?excluir-true&id=<?= $curso->id ?>">Excluir</a>

        <button type="submit">Salvar</button>
       </form>
    </legend>
</div>