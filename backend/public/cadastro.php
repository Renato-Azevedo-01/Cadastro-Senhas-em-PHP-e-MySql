<?php
include "module/conexao.php";

if(!isset($_SESSION)){
    session_start();
}

if(isset($_POST['nome']) || isset(($_POST['email'])) || isset(($_POST['senha']))){
    if(strlen($_POST['nome']) == 0){
        echo "Digite seu nome";
    }
    else if(strlen($_POST['email']) == 0){
        echo "Digite seu email";
    }
    else if(strlen($_POST['senha']) == 0){
            echo "Digite sua senha";
        }
    else{    
        $nome = $conexao->real_escape_string($_POST['nome']);
        $email = $conexao->real_escape_string($_POST['email']);
        $senha = password_hash($_POST['senha'],PASSWORD_DEFAULT);

        $sql_code = "select * from usuarios where email='$email' limit 1";
        $sql_query = $conexao->query($sql_code) or die("Erro ao conectar o BD :" . $conexao->error );
        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){
            echo "<p style=\"color:red\">Usuário já cadastrado !</p>";
        }
        else{
            try{
            $sql_code = "INSERT INTO cadastro.usuarios (nome , email , senha ) VALUES('$nome' , '$email' , '$senha') ";
            $sql_query = $conexao->query($sql_code);
            echo "<p style=\"color:green\">Usuário cadastrado com sucesso !</p>" ;
            }
            catch(Exception $e){
                print_r($e->getMessage());
                echo " - ";
                print_r($e->getCode());
            }
        } 
    }  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style/style.css">
    
    
</head>
<body>
    <form action="" method="POST">
        <fieldset class="form">Cadastro de Usuários
        <br>
        <hr>
        <label for id="nome">Nome</label>
        <input type="text" name="nome" id="nome" placeholder="Digite seu nome">
        <br>
        <label for id="email">E-mail</label>
        <input type="text" name="email" id="email" placeholder="Digite seu email">
        <br>
        <label for id="nome">Senha</label>
        <input type="text" name="senha" id="senha" placeholder="Digite sua senha">
        <br>
        <button type="submit">Cadastrar</button>
        </fieldset>
    </form>
    
</body>
</html>