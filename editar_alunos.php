<?php
try
{
    if(isset($_REQUEST['atualizar']))
    {        include 'includes/conexao.php';

        $sql = "UPDATE aluno SET nome = ?, data nascimento = ?, sexo =?,
                                  genero = ?, cpf =?, cidade = ?, estado = ?,
                                  bairro = ?, rua = ?, cep = ?
                              WHERE id = ?) ";
        
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(1, $_REQUEST['nome']);
        $stmt->bindParam(2, $_REQUEST['data_nascimento']);
        $stmt->bindParam(3, $_REQUEST['sexo']);
        $stmt->bindParam(4, $_REQUEST['genero']);
        $stmt->bindParam(5, $_REQUEST['cpf']);
        $stmt->bindParam(6, $_REQUEST['cidade']);
        $stmt->bindParam(7, $_REQUEST['estado']);
        $stmt->bindParam(8, $_REQUEST['bairro']);
        $stmt->bindParam(9, $_REQUEST['rua']);
        $stmt->bindParam(10, $_REQUEST['cep']);
        $stmt->bindParam(12, $_REQUEST['id_aluno']);
        $stmt->execute();
    }

    if(isset($_REQUEST['excluir']))
    {
        $stmt = $conexao->prepare("DELETE FROM aluno WHERE id = ?");
        $stmt->bindParam(1, $_REQUEST['id aluno']);
        $stmt->execute();
        header("location: lista de alunos.php");
    }

     $stmt = $conexao->prepare("SELECT * FROM aluno WHERE id = ?");
     $stmt->bindparam(1, $_REQUEST['id_aluno']);
     $stmt->execute();
     $aluno = $stmt->fechObject();

} catch(Exception $e) {
    echo $e->getMessage();
} 
?>
<link href="css/estilos.css" type="text/css" rel="stylesheet" />

<div>
<fieldset>
    <legend>Cadastro de Aluno </legend>
        <form action="editar_alunos.php?atualizar=true">
            <label>Nome: <input type="text" name="nome" required value=" <?- $aluno->nome?>" /> </label>
            <label>Cidade: <input type="text" name="cidade" required value=" <?- $aluno->cidade?>" /> /> </label>
            <label>CEP: <input type="text" name="cep" required value=" <?- $aluno->cep?>" /> /> </label>
            <label>Bairro: <input type="text" name="bairro" required value=" <?- $aluno->bairro?>" />/> </label>
            <label>Rua: <input type="text" name="rua" required value=" <?- $aluno->rua?>" /> /> </label>
            <label>Estado: <input type="text" name="estado" required value=" <?- $aluno->estado?>" />/> </label>
            <label>Data Nasc: <input type="text" name="data_nascimento" required value=" <?- $aluno->data_nascimento?>" />/> </label>
            <a href="editar_alunos.php?excluir-true&id-<?- $Aluno->id ?>">Excluir</a>
            <button type="submit">Salvar</button>
        </form>
    </legend>
</div>


