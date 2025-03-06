<?php

echo '<h1> Aluno Editar </h1>';

var_dump($_POST);

$editarId = $_POST ['id'];
$editarNome = $_POST ['nome'];

$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';
$user = 'root';
$password = '';
$banco = new PDO($dsn, $user, $password);


// criei para preparar depois:  mistura para um bolo, coloquei todos os ingredientes a mesa
$update = 'UPDATE tb_alunos SET nome = :nome WHERE id = :id' ;
 
// o box vai guardar o banco preparado. deixo preparado para poder ultizar 
$banco->prepare($update) -> execute([
    ':id' => $editarId,
    ':nome' => $editarNome
]);
 
// o box vai executar todos aqueles que eu quero editar; 






echo '<h1> Editar Info Alunos</h1>';

var_dump($_POST);

$editarId = $_POST ['id'];
$editarTelefone = $_POST ['telefone'];
$editarEmail = $_POST ['email'];
$editarNascimento = $_POST ['nascimento'];

$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';
$user = 'root';
$password = '';
$banco = new PDO($dsn, $user, $password);


// criei para preparar depois:  mistura para um bolo, coloquei todos os ingredientes a mesa
$update = 'UPDATE tb_info_alunos SET telefone = :telefone, email = :email, nascimento = :nascimento WHERE id = :id' ;
 
// o box vai guardar o banco preparado. deixo preparado para poder ultizar 
$banco->prepare($update) -> execute([
    ':id' => $editarId,
    ':telefone' => $editarTelefone,
    ':email' => $editarEmail,
    ':nascimento' => $editarNascimento
]);
 
// o box vai executar todos aqueles que eu quero editar; 
