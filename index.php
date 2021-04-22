<?php
    require_once 'classePessoa.php';
    $p = new Pessoa("db_crud", "localhost", "root", "");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Pessoa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section id="esquerda">
        <form action="">
            <h2>CADASTRAR PESSOA</h2>
            <label for="nome">Nome</label>
            <input type="text" name="nome " id="nome">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone">
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email">
            <input type="submit" value="Cadastrar">
        </form>
    </section>

    <section id="direita">
        <table>
            <tr id="titulo">
                <td>NOME</td>
                <td>TELEFONE</td>
                <td colspan="2">E-MAIL</td>
            </tr>
            <?php
                $dado = $p->buscarDados();      
                if(count($dado)>0)
                {
                    for ($i=0; $i < count($dado) ; $i++) 
                    { 
                        echo "<tr>";
                            foreach ($dado[$i] as $key => $value)
                            {
                                if($key != "cd_usuario")
                                { 
                                    echo "<td>" . $value ."</td>";
                                }
                            }
                            ?> 
                                <td> <a href="">Editar</a> <a href="">Excluir</a> </td> 
                            <?php
                        echo "</tr>";
                    }
                }
            ?>
        </table>
    </section>

</body>
</html>