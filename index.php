
<?php
include "conexao.php" ;

if(isset($_POST['email']) || isset($_POST['senha'])) {
    
    if(strlen($_POST['email']) == 0){
        echo "Preencha seu e-mail";
    }
    else if(strlen($_POST['senha']) == 0){
            echo "Preencha sua senha";
        }
    
    else{
        
        $email = $conexao->real_escape_string($_POST['email']);
        echo "email : $email";
        $senha = $conexao->real_escape_string($_POST['senha']);
        echo "<br> senha : $senha";
        
        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' limit 1";

        $sql_query = $conexao->query($sql_code) or die('Falha na execução do código Sql: ' . $conexao->error);

        #$quantidade = $sql_query->num_rows;
        #if ($quantidade == 1) {
        $usuario = $sql_query->fetch_assoc();
        echo "<br>";
        var_dump($usuario);

        if(password_verify($senha,$usuario['senha'])){

            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION["id"]= $usuario['id'];
            $_SESSION["nome"] = $usuario['nome'];
            $_SESSION["email"] = $usuario['email'];

        header("Location: painel.php");}
        
        else {
            echo "Falha ao logar! E-mail ou senha incorretos. ";
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
    <form action="" method="POST">
        <fieldset style="width:400px;text-align: center">Login
        <br><br>
        <label for="email">E-mail: </label>
        <input type="text" name="email" id="email">
        <br>
        <label for="senha">Senha: </label>
        <input type="password" name="senha" id="senha">
        <br><br>
        <button type="submit">Entrar</button> 
        </fieldset>
    </form>



</body>
</html>