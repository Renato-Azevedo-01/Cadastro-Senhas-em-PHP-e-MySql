<?php
include 'conexao.php';
if (!isset($_SESSION)){
    session_start();
}
if(isset($_POST['email']) || isset($_POST['senha']) || isset($_POST['nome'])){
    if(strlen($_POST['nome']) == 0){
        echo "Digite o nome";
    }
    else if(strlen($_POST['email']) == 0){
        echo "Digite a email";
    }
    else if(strlen($_POST['senha']) == 0){
        echo "Digite o senha";
    }
    else{
        $nome = $conexao->real_escape_string($_POST['nome']);
        $email = $conexao->real_escape_string($_POST['email']);
        $senha = password_hash($_POST['senha'],PASSWORD_DEFAULT);    

        $sql_code = "select * from usuarios where email='$email' limit 1";
        $sql_query = $conexao->query($sql_code) or die("Falha na execução do Sql : " . $conexao->error);
        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){
            echo "<p style=\"color:red\">Usuário já cadastrado !</p>";
        }
        else{
            $sql_code = "insert into usuarios (nome , email , senha) values ('$nome', '$email' , '$senha')"; 
            $sql_query = $conexao->query($sql_code) or die("Falha na execução do Sql : " . $conexao->error);
            echo "<p style=\"color:green\">Usuário cadastrado com sucesso !</p>" ;
        }
    }
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Senhas</title>
</head>
<body>
    <form style = "width:300px" action="" method="POST">
        <fieldset style="text-align:center; color:blue" >Cadastros
            <br>
            <label for id="nome">Nome</label>
            <input type="text" name="nome" id="nome">
            <br>
            <label for id="email">E-mail</label>
            <input type="text" name="email" id="email">
            <br>
            <label for id="senha">Senha</label>
            <input type="password" name="senha" id="senha">
            <br>
            <button type="submit">Cadastrar</button>
        </fieldset>
    </form>
</body>
</html>