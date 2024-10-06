<!DOCTYPE html>
<html>
  <body>
    <h1>Estamos aprendendo PHP!</h1>
    <p>Ola, agora vamos aprender php!</p>
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

      ?> <!-- fecha php -->
      </body>
    </html>










<!--
//Variáveis no PHP
  $name = "Guilherme";
  $age = 20;

  echo $name; // Guilherme
  echo "</br>";
  echo $age; // 20



  $a = "mundo!";
  echo "Olá, $a"; // Olá, mundo!
  echo 'Olá, $a'; // Olá, $a



  echo "Olá," . " mundo!";
  //Olá, mundo!

//Constantes no PHP

define("PHP", "Linguagem Open - Source");

const HTML = "Linguagem de marcação";

echo PHP; // Linguagem Open - Source

echo HTML; // Linguagem de marcação

//Arrays no PHP
$php = array("Zend" => "CERTIFICAÇÃO", 6 => false);
echo $php["Zend"]; // CERTIFICAÇÃO
echo $php[6]; // 0

// Zend é nossa chave e CERTIFICAÇÃO nosso valor
// 6 é nossa chave e false(0) é nosso valor

//Conversão de tipos
$var = 100;
$type_casting = (bool) $var; // torna – se booleano
$type_casting = (int) $var; // torna – se inteiro
$type_casting = (float) $var; // torna – se float
$type_casting = (string) $var; // torna – se string
$type_casting = (array) $var; // torna – se array
echo $type_casting = (bool)$var; // 1

//Operadores Aritméticos no PHP
$a = 3;
$b = 3;
$c = $a * $b; // resultado é 9
$d = $a + $b; // resultado é 6
$e = $c - $d; // resultado é 3

$f = "5"; // string
echo $f + 2; // 7, integer
echo $f + '5 carros'; // 10, integer

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