# Cadastro Senhas em PHP e MySql e Login com verificação de senha para entrar na página painel.php
 __Cuidados ao gravar senhas no BD e Bloqueio de acesso a páginas sem permissão__
* É necessário criar um Banco de dados no MySql (ou o que preferir) para que a conexão seja feita.
* O arquivo é o conexão.php sendo necessário 4 itens para o acesso:
    * Hostname
    * User
    * Password
    * Database
* O acesso via PHP é pelo "mysqli_connect($hostname, $username, $password, $bancodedados) ou "new mysqli($hostname, $username, $password, $bancodedados)", dá no mesmo !
* Lembrar sempre de criptografar sua senha. No PHP usar: "$senha = password_hash($_POST['senha'],PASSWORD_DEFAULT);"
* Para verificar a senha, em caso de acesso a uma nova SESSÃO, utilize: password_verify($senha,$usuario['senha'])) -> A primeira é a que você digitou ao logar e a segunda é a criptografada no MySql.
* Se tentar entrar na página painel.php sem estar logado, haverá uma proteção(protect.php) que impedirá, caso não esteja logado.
* Ao clicar em "Sair", as Sessões serão destruídas.
#Espero que gostem !!!


