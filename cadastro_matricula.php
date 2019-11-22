<?php
/**
 * Arquivo para registrarod dados de um aluno no banco de dados
 */
try
{
    include 'includes/conexao.php';

    //lista de alunos 
    $stmt_alunos = $conexao-> PREPARE("SELECT * from aluno order by nome ASC ");
    $stmt_alunos->execute();

    //Lista de Turmas
    $stmt_turmas -> $conexao->prepare("SELECT * FROM turma");
    $stmt_turmas->execute();

    if(isset($_REQUEST['cadastrar']))
    {
        $sql = "INSERT INTO matricula (id_turma, id_aluno, data_matricula)
        VALUES (?, ?, NOW())";

        $stmt -> conexao->prepare($sql);
        $stmt->bindparam(1, $_REQUEST['id_turma']);
        $stmt->bindparam(2, $_REQUEST['id_aluno']);
        $stmt->execute();

        echo "Matricula realizada com sucesso!";
    }
}   catch(Exception $e) {
    echo $e->getmessage();
}
    ?>
    <link href="css/estilo.css" type="text/css" rel="stylesheet" />

    <?php include_once 'includes/cabecalho.php' ?>

    <div>
     <fieldset>
       <legend> Nova Matricula </legend>
         <form action="cadastro_matricula.php?cadastrar=true" method="post">
          <label>
             <select name="id turma">
               <?php while($turma = $stmt_turmas->fetchObject()): ?>
               <option value="<?= $turma->id ?>"> <?=$turma->descricao ?> </option>
               <?php endwhile ?>
        </select>
        </label>
        <label>
        <select name="id turma">
               <?php while($aluno = $stmt_aluno->fetchObject()): ?>
               <option value="<?= $aluno->id ?>"> <?=$aluno->nome ?> </option>
               <?php endwhile ?>
        </select>
        </label>
        <button type="submit">Salvar Matricula</button>
        </form>
        </legend>
        </fieldset>
        </div>

