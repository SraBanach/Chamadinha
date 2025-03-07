<?php
// abrindo a tag php 

echo '<h1>Cadastro de aluno</h1>';
// ordem importa o <pre> precisa estar encima do vardump
echo '<pre>';

//var_dump ele faz um debug da variavel, lembrar de colocar (), mostra tipo de elemento; mas aparece tudo sem organizar, tudo confuso; 
var_dump($_POST);
 
// $_post -> variavel global, ela funciona em todo o projeto.
 //metodo de envio -> GET: manda informações atraves da url E POST: manda informações atraves do corpo
 //Action: ele é para onde deve enviar os dados 
$nomeFormulario = $_POST['nome'];
$telefoneFormulario = $_POST['telefone'];
$emailFormulario = $_POST['email'];
$nascimentoFormulario = $_POST['nascimento'];
$frequenteFormulario = $_POST['frequente'];
$imgFormulario = $_POST['img'];
 

//criando conexao com o banco: 
$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';
$user = 'root';
$password = '';
$banco = new PDO($dsn, $user, $password);
//PDO =  biblioteca no padrao de uma classe; sempre que tiver a palavra new é pq estou fazendo uma conexao; 
//quando tivet type null não é obrigatorio ; 
//variavel banco recebe conexao com o banco ( as informacoes estao la; )
//$banco esta na rua(dsn), numero(user), chave(password)
 
//inserindo dados tabela alunos
$insert = 'INSERT INTO tb_alunos (nome) VALUES (:nome)' ;
 
// o box vai guardar o banco preparado.
$box = $banco->prepare($insert);
 
// o box vai executar
$box->execute([
    ':nome' => $nomeFormulario
]);
 
//para inserir o id do aluno automaticamente, mesmo adc diretamente do site; 
$id_aluno = $banco -> lastInsertId();
 
//aparecer na tela o id do aluno; 
echo $id_aluno;
 
// ---------------------------------------------------------------
//inserindo dados tabela info_alunos
$insert = 'INSERT INTO tb_info_alunos (telefone,email,nascimento,frequente,id_alunos,img)  VALUES (:telefone,:email,:nascimento,:frequente,:id_alunos,:img)';
 
// o box vai guardar o banco preparado. deixo preparado para poder ultizar 
$bancoprepara = $banco->prepare($insert);
 

$bancoprepara->execute([
    ':telefone' => $telefoneFormulario,
    ':email' => $emailFormulario,
    ':nascimento' => $nascimentoFormulario,
    ':frequente' => $frequenteFormulario,
    ':id_alunos' => $id_aluno,
    ':img' => $imgFormulario,
]);