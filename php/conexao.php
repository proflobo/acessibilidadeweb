<?php
/*criando arquivo para se conectar ao banco de dados
subistitua as informações pelas do ser SQL Server
 ou PHPmyadmin */
$servername = "localhost";
$database = "u289605890_biblio";
$username = "u289605890_biblio";//nome do USER de login no banco
$password = "Controle23$";//senha do usuario do banco
//criando conexão com o banco
$conecta = mysqli_connect($servername,$username,$password,$database);
//verificando a conexão, se ta OK ou deu ERROr
if(!$conecta){
    die("conexao com o banco falhou: ".mysqli_connect_error());
}
echo "conexão com o banco bem sucedida";
mysqli_close($conecta);

?>