<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    .formulario{
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 50px;
    }  
</style>
<section class="linha-formulario">
    <div class="formulario" class="text-center"9>


<?php
$id_aluno_alterar = $_GET['id_aluno_alterar'];
var_dump($id_aluno_alterar);

//peguei essas informaçoes da ficha que já existe; 

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


$select = 'SELECT tb_info_alunos.*, tb_alunos.nome FROM tb_info_alunos INNER JOIN tb_alunos ON tb_alunos.id = tb_info_alunos.id_alunos WHERE tb_info_alunos.id_alunos =' .$id_aluno_alterar ;

//variavel banco -> consulta a variavel select -> e agora vc vai me retorno;
//e toda  vez que consulta ele vai guardar dentro da minha variavel dados;
$dados= $banco->query($select)->fetch();

?>


        <!-- metodo de envio -> GET: manda informações atraves da url E POST: manda informações atraves do corpo -->
        <!-- Action: ele é para onde deve enviar os dados -->
        <form action="./aluno-editar.php" method="POST">

            <h2>Editar Cadastro</h2>
<!-- Dentro de value é o placeholder -->
            <img src=" ./img/<?= $dados ['img'] ?>" alt="">
            <!-- type hidden é para ficar oculto para o usuario, informaçoes auxiliares estao no formulario de forma oculta para facilitar;  -->
            <input type="hidden" placeholder="id" name="id" value="<?= $dados ['id']?>"><br>
            <input type="text" placeholder="nome" name="nome" value="<?= $dados ['nome']?>"><br>
            <input type="number" placeholder="Telefone" name="telefone" value ="<?= $dados ['telefone']?>"><br>
            <input type="email" placeholder="Email" name="email" value ="<?= $dados ['email']?>"><br>
            <input type="date" placeholder="Nascimento" name="nascimento" value ="<?= $dados ['nascimento']?>"><br>
            <div>
                <label>Frequente?</label>
                <input type="checkbox" placeholder="Frequente" name="frequente"><br>
            </div>
            <input type="file" accept="imagem/*" name="img"><br>
            <input type="submit">
        </form>
    </div>
</section>