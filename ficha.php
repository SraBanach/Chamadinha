<?php

$id_aluno = $_GET['id_aluno'];

//Parametros de conexao, pego esses valores da documentacao;
//127.0.0.1 = local 
////as vezes precisa de parametro para funcionar a extensao php debug mostra o que falta se passar mouse em cima; 
$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';
$user = 'root';
$password = '';

//PDO =  biblioteca no padrao de uma classe; sempre que tiver a palavra new é pq estou fazendo uma conexao; 
//quando tivet type null não é obrigatorio ; 
//variavel banco recebe conexao com o banco ( as informacoes estao la; )
//$banco esta na rua(dsn), numero(user), chave(password)
$banco = new PDO($dsn, $user, $password);

//variavel sempre tem $ 
//variavel select, o que eu quero que liste a tabela de informação;  


$select = 'SELECT tb_info_alunos.*, tb_alunos.nome FROM tb_info_alunos INNER JOIN tb_alunos ON tb_alunos.id = tb_info_alunos.id_alunos WHERE tb_info_alunos.id_alunos =' .$id_aluno ;

//variavel banco -> consulta a variavel select -> e agora vc vai me retorno;
//e toda  vez que consulta ele vai guardar dentro da minha variavel dados;
$dados= $banco->query($select)->fetch();




?>












<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    main{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    form{
        width: 600px;
    }
    img{
        width: 200px;
        object-fit: cover;
    }
</style>
<main class="container text-center my-5">
    <img src="./img/<?= $dados['img'] ?>" alt="imagem de perfil" class="img-thumbnail">
    <form action="#">
        <label for="nome">Nome</label>
        <input type="text" value= "<?= $dados['nome'] ?>" disabled class="form-control">
        <div class="row mt-2">
            <div class="col">
                <label for="telefone">Telefone</label>
                <input type="number" value= "<?php echo $dados ['telefone'] ?>" disabled class="form-control">
            </div>
            <div class="col">
                <label for="email">Email</label>
                <input type="email" value= "<?= $dados ['email'] ?>" disabled class="form-control">
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label for="data_nascimento">Data Nascimento</label>
                    <input type="date" value= "<?= $dados ['nascimento'] ?>" disabled class="form-control">
                </div>
            </div>
            <div class="col my-4 pt-2">
            <input type="checkbox" class="form-check-input">
                <label for="frequente">Frequente</label>
            </div>
        </div>
    </form>
</main>