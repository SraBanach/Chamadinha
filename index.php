<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<?php

//Parametros
////as vezes precisa de parametro para funcionar a extensao php debug mostra o que falta se passar mouse em cima; 
$dsn = 'mysql:dbname=bd_chamadinha;host=127.0.0.1';
$user = 'root';
$password = '';

//no php tem uma biblioteca no padrao de uma classe; semore que tiver a palavra new é pq estou fazendo uma conexao; 
//quando tivet type null não é obrigatorio ; 
//variavel banco recebe conexao com o banco ( as informacoes estao la; )
$banco = new PDO($dsn, $user, $password);

//variavel sempre tem $ 
//variavel select, o que eu quero que liste  
$select = 'SELECT * FROM tb_alunos';

//comando para executar, para rodar; 
//varivel resultado com a junção de banco com select; 
//fetchAll para buscar todas as informaçoes; 
$resultado = $banco->query($select)->fetchAll();

//para organizar o arquivo abaixo, sempre colocar antes do var_dump;
//somente para eu ver, nao no projeto; 
//echo '<pre>';

//comando echo apenas exibe o resultado de tudo; 
//var_dump ele faz um debug da variavel, lembrar de colocar (), mostra tipo de elemento; mas aparece tudo sem organizar, tudo confuso; 
//var_dump($resultado);
?>
<!-- my-5 para dar um espaço margin -->
<main class="container my-5"> 
    <table class="table table-striped">
        <tr>
            <td>
                id
            </td>
            <td>
                nome
            </td>
            <td class="text-center">
                Ações
            </td>
        </tr>
        <!-- 
    //foreach = para laço(de procura) de repetição automatico em array; 
    as - para atribuir; só usa a seta dentro do foreach-->
        <?php foreach ($resultado as $lista) { ?>
            <tr>
                <td> <?php echo $lista['id'] ?> </td>
                <!--  -->
                <td> <?= $lista['nomeCompleto'] ?> </td>
                <td class="text-center"> 
                <a class="btn btn-primary" href="#" role="button">Abrir</a>
                <a class="btn btn-warning" href="#" role="button">Editar</a>
                <a class="btn btn-danger" href="#" role="button">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</main>