<!DOCTYPE html>
<html>
  <body>
    <h1>Estamos aprendendo PHP!</h1>
    <p>Ola, agora vamos aprender php!</p>
  <!-- link simples para navegação, sem ele voce fica preso na tela do exercicio -->
    <p>Volte para o inicio <a href="../index.html">cliando aqui</a> .</p>

    <!-- abre php -->
    <?php
      echo "Vamos prosseguir aprendendo PHP. </br>";
      echo"</br>"; //comando para pular linha

      echo "Oi, Eu serei visto na sua tela.</br>";
      // Eu não! Sou apenas um comentário.
    
      echo "Oi, Eu também serei visto por você </br>";
      # Já eu não serei!
    
      echo "E eu aqui novamente na sua tela, rs </br>";
      /* Eu não aparecerei na sua tela novamente
      pois sou um comentário */
      echo "</br>";
      //Variáveis no PHP
        $name = "Guilherme"; //coloca seu nome
        $age = 20;           //sua idade

        echo $name; // Guilherme
        echo "</br>";
        echo $age; // 20
        echo "</br>";
        $a = "mundo!";
        echo "Olá, $a </br>"; // Olá, mundo! usando aspas duplas
        echo 'Olá, $a </br>'; // Olá, $a    usando aspas simples
        echo "olá $name , hoje você tem $age anos. </br>";
       
        //Constantes no PHP
        define('Marcos', ' QUEM ROUBOU PÃO ');
        const ONDE = "na casa do joão?";
        echo Marcos; // chama a constante marcos
        echo ONDE; //  chama a constante ONDE
        echo "</br>";

      //Arrays no PHP
      $matriz = array("Porta" => "Encontrou a Porta", 4 => false);
      echo $matriz["Porta"];//busca a porta para entrar
      echo $matriz[7]; // 0 >= 4 valor bloqueia a chave
      echo $matriz["Porta"]; // Zend é nossa chave e CERTIFICAÇÃO nosso valor
      echo $matriz[4]; // =6 valor que libera a chave
      // 4 é nossa chave e false(0) é nosso valor
      echo "</br>";
      echo "</br>";
      //Conversão de tipos
      $var = 100;
      echo $var; echo "</br>";
      echo $type_casting = (bool) $var;echo "</br>"; // torna – se booleano V ou F 0 ou 1
      echo $type_casting = (int) $var;echo "</br>"; // torna – se inteiro
      echo $type_casting = (float) $var;echo "</br>"; // torna – se float
      echo $type_casting = (string) $var;echo "</br>"; // torna – se string
      $type_casting = (array) $var;echo "</br>"; // torna – se array
      echo $type_casting = (bool)$var;echo "</br>"; // 1
      echo "</br>";
      $numero = 1332224455; //variavel simulando um nº tel e colocando os simbulos
      echo $type_casting = (string) $numero;//converção normal de tipo
      echo "</br>";
      /* CRINDO UMA FUNÇÃO PARA CRIAR UMA MASCARA NO NUMERO DO TELEFONE (13)32224455 */ 
      function formataTelefone($telefone){
        if(strlen($telefone)==10){
          $novoTel = substr_replace($telefone,'(',0,0);
          $novoTel = substr_replace($novoTel,'9',2,0);//se for cel acrescenta o 9
          $novoTel = substr_replace($telefone,'-',6,0);
          $novoTel = substr_replace($novoTel,')',2,0);
        }else{
          $novoTel = substr_replace($telefone,'(',0,0);
          $novoTel = substr_replace($telefone,'-',6,0);
          $novoTel = substr_replace($novoTel,')',2,0);
        }
        return $novoTel;
      }
      echo formataTelefone($numero);

      //Operadores Aritméticos no PHP
      $a = 3;
      $b = 3;
      $multiplica = $a * $b; // resultado é 9
      $soma = $a + $b; // resultado é 6
      $subtrai = $a - $b; // resultado é 3
      echo "</br> $a VEZES $b : $multiplica </br>";
      echo " $a + $b = $soma </br>";

      $d = 5; // string
      echo "$d + 2 </br>"; // 7, integer
      echo $type_casting = (int) $d +2 ;//mesmo tipo inteiro
      echo "</br>";//pula linha
      echo $d + '5 carros </br>'; // não sera aceito soma de dois tipo diferentes
      echo $d+5 ." $d carros."; // maneira correta de colocar um texto
      
      ?> <!-- fecha php -->
      </body>
    </html>









<!--






//Operadores de Atribuição no PHP

$a = 1; // A variável $a é igual a 1
$a += 2; // Somamos 2 ao valor da $a;
echo $a;


$a -= 2; // Subtraímos 2 ao valor da variável $a;
$a *= 2; // Multiplicamos o valor da variável $a por 2;
$a /= 2; // Dividimos o valor da variável $a por 2.


$a = 1;
echo ++$a; // Incrementamos 1 e retornamos o valor
echo $a++; // Retornamos o valor e incrementamos 1
echo --$a; // Decrementamos 1 e retornamos o valor
echo $a--; // Retornamos o valor e decrementamos 1

//Estrutura de Decisão if/else
$idade = 17;

if($idade < 18) {
  echo 'Você não pode entrar aqui!';
} else {
  echo 'Seja bem – vindo';
}

$idade1 = 21;
$identidade = true;

if($idade1 > 18 && $identidade == true) {
  echo 'Seja bem-vindo!';
}


//Estruturas de Decisão (elseif/switch)

$nome = 'Till Lindemann';

if($nome == 'Richard Kruspe') {
  echo 'E ae Richard Kruspe!';
} elseif ($nome == 'Oliver Riedel') {
  echo 'E ae Oliver Riedel!';
} elseif ($nome == 'Till Lindemann') {
  echo 'E ae Till Lindemann!';
} else {
  echo "E ae $nome!";
}


$nome = 'Fulano';

switch($nome) {
  case 'Fulano':
    echo 'E ai Fulano!';
    break;

  case 'Sicrano':
    echo 'E ai Sicrano!';
    break;

  case 'Beltrano':
    echo 'E ai Beltrano!';
    break;

  default:
    echo 'Qual é o seu nome?';
    break;
}

// Resultado é: E ai Fulano!
-->