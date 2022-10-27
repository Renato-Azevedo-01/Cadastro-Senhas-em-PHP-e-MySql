# Cadastro Senhas em PHP e MySql
 . Cuidados ao gravar senhas no BD e Bloqueio de acesso a páginas sem permissão.
 . É necessário criar um Banco de dados no MySql (ou o que preferir) para que a conexão seja feita.
 . O arquivo é o conexão.php sendo necessário 4 itens para o acesso:
    - Hostname
    - User
    - Password
    - Database
. O acesso via PHP é pelo "mysqli_connect($h, $u, $p, $bd ) ou "new mysqli($h, $u, $p, $bd)", dá no mesmo !
. Lembrar sempre de criptografar sua senha. No PHP usar: "$senha = password_hash($_POST['senha'],PASSWORD_DEFAULT);"
. Para verificar a senha, em caso de acesso a uma nova SESSÃO, utilize: password_verify($senha,$usuario['senha'])) -> A primeira é a que você digitou ao logar e a segunda é a criptografada no MySql.


