<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <!-- Basico -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#1C1C1C">
    <!-- Site Metas -->
    <title>Biblioteca Online - ALEXANDRINA</title>
    <link rel="icon" type="imagem/ico" href="/imagens/favicon.ico" />
    <link href="css/estilo.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div class="container">

        <!-- menu inicio -->
        <div class="header">
            <div id="menu">
                <a href="http://www.proflobo.com.br/"><img class="logo" src="imagens/favicon.png" width="100" height="100" /></a>
                <h1 id="textLogo" class="TextLogo">Bliblioteca Online</h1>
                <ul class="navbar">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="sobre.html">Sobre</a></li>
                    <li><a href="biblioteca.php">Biblioca</a></li>
                    <li><a href="contato.html">Contato</a></li>
                </ul>
            </div>
        </div>
        <!-- menu FIM -->
        <div class="content">
            <h1>Inicio</h1>

            <h2>BIBLIOTECA PÚBLICA</h2>
            <p>Abre a conexão com phpmyadmin para puxar a tabela livros.</p>
</br>
            <?php
            include 'php/conexao.php';

            ?>
        <div class="consultabiblioteca">
          <form action="formdelivros" method="post">
    <div>
        <label for="titulolivro">Titulo do Livro :</label>
        <input type="text" id="titulolivro" />
    </div>
    <div>
        <label for="genero">Genero :</label>
        <input type="text" id="genero" />
    </div>
    <div>
        <label for="descricao">Descrição :</label>
        <textarea id="descricao"></textarea>
    </div>
    <button>Cadastrar</button> <!-- vai mandar pro cadastra.php -->
    <button>Pesquisar</button><!-- vai mandar pro pesquisa.php -->
    <button>Excluir</button><!-- vai mandar pro exclui.php -->
</form>
        </div>

 
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <br>

            <!-- Fim do COnteudo -->
        </div>

        <div class="footer">
            <p>Todos os direitos reservado á Matheus Lobo | <a href="http://www.proflobo.com.br">www.proflobo.com.br</a></p>
            <!-- FIM .footer -->
        </div>
        <!-- FIM .container -->
    </div>
</body>

</html>