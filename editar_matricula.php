<?php
try 
{
    include 'includes/conexao.php';

    // lista de alunos
    $stmt_alunos = $conexao->prepare("SELECT * FROM aluno ORDER BY nome ASC");
    $stmt_alunos->execute();

    // lista de turmas
    $stmt_turmas = $conexao->prepare("SELECT * FROM turma");
    $stmt_turmas->execute();

    // dados de matricula antes de editar 
    $stmt_matricula = $conexao->prepare("SELECT * FROM matricula WHERE id_turma  = ? AND id_aluno = ?");
    $stmt_matricula->bindparam(1, $_REQUEST['id_turma']);
    $stmt_matricula->bindparam(2, $_REQUEST['id_aluno']);
    $stmt_matricula->execute();

    $dados_matricula = $stmt_matricula->fetchObject();

    // para atualizar a matricula
    if(isset($_REQUEST['atualizar']))
    {
        $sql = "UPDATE matricula SET id_turma = ?, id_aluno = ?, data_matricula = ?
        WHERE id_turma = ? AND id_aluno = ?";
        
    $stmt = $conexao->prepare($sql);
    $stmt->bindparam(1, $_REQUEST['id_turma']);
    $stmt->bindparam(2, $_REQUEST['id_aluno']);
    $stmt->bindparam(3, $_REQUEST['data_matricula']);
    $stmt->bindparam(4, $_REQUEST['id_turma']);
    $stmt->bindparam(5, $_REQUEST['id_aluno']);
    $stmt->execute();

    echo "Matricula atualizada com sucesso!";
}

} catch(Exception $e) {
    echo $e->Getmessage();
} 
?>
<link href="css/estilo.css" type="text/css" rel="stylesheet" />

<?php include_Once 'includes/cabecalho.php' ?>

<div>
<fieldset>
  <Legend> Editar Matricula </legend>
   <form action= "editar_matricula.php?atualizar=true" method="post">
    <label> Selecione uma turma:
     <select name="id_turma">
      <?php while($turma = $stmt_turmas->fetchObject()): ?>
      <Option value="<?= $turma->id ?>"
              <?= ($dados_matricula->id_turma == $turma->id) ? "selected" : "" ?>>
            <?= $turma->descricao ?>
      </option>
      <?php endwhile ?>
      </select>
    </label>
    <label>Selecione o aluno:
     <select name="id_aluno">
       <?php while($aluno = $stmt_alunos->fetchobject()): ?>
       <option value="<? $aluno->id ?>"
       <?= ($dados_matricula->id_aluno -- $aluno->id) ? "selected" : "" ?>>>
       <?= $$aluno->nome ?>
    </option>
    <?php endwhile ?>
</select>
</label>
<button type="submit">Salvar Matrícula</button>
</form>
</legend>
</fieldset>
</div>






