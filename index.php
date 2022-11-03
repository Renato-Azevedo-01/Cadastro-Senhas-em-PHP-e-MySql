<?php
include "module/conexao.php";

if(isset($_POST['email']) || isset($_POST['senha'])){
    if(strlen($_POST['email'])== 0){
        echo "Digite seu e-mail";
    }
    else if(strlen($_POST['senha']) == 0) {
        $placeholder = $_POST['email'];
        echo "Digite sua senha";
    }
    else{
        $email = $conexao->real_escape_string($_POST['email']);
        $senha = $conexao->real_escape_string($_POST['senha']);

        $sql = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";        
        #$sql_query = mysqli_query($conexao,$sql) or die($conexao->error);
        $sql_query = $conexao->query($sql) or die($conexao->error);
        $quantidade = $sql_query->num_rows;
        
        if($quantidade == 1){
            $usuario = mysqli_fetch_assoc($sql_query);
            #$usuario = $sql_query->fetch_assoc();
            if(password_verify($senha,$usuario['senha'])){
                if(!isset($_SESSION)){
                    session_start();
                }
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];
                $_SESSION['email'] = $usuario['email'];

                header('Location: painel.php');
            }
            else{
                echo "Senha incorreta !";
            }
        }
        else{
            echo "Usuário não cadastrado !";
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
    <title>Login</title>
</head>
<body>
    <form style="display:flex;text-align:center;margin:auto" action="" method="post">
        <fieldset style="width: 400px">
            Login
            <br><br>
            <label for id="email">Email </label>
            <input type="text" id = "email" name = "email" placeholder="Digite seu email">
            <br>
            <label for id="senha">Senha </label>
            <input type="text" id = "senha" name = "senha" placeholder="Digite sua senha">
            <br><br>
            <button type="submit" >Entrar</button>

        </fieldset>
    </form>
</body>
</html>