<?php

include "conexao.php";
include "cabecalho.php";
?>

<div class="base">
    QUESTÕES CADASTRADAS
</div>
<div class="container-cadastradas">

    <?php
    $query = "select * from questoes order by id desc";
    $resultado = mysqli_query($conexao, $query);

    while ($linha = mysqli_fetch_array($resultado)) {
    ?>


        <div class="card-a">

            <div class="cad-header">
                <h2 class="black-1516"> ID: <?php echo $linha["id"]; ?></h2>
            </div>

            <div style="background-color: #ededf4;">
                <h2 class="preto-1516j"> Questão:
                    <?php echo $linha["pergunta"]; ?>
                </h2>
            </div>


            <div>
                <h2 class="cinza-1514">a) <?php echo $linha["a"]; ?></h2>
                <h2 class="cinza-1514">b) <?php echo $linha["b"]; ?></h2>
                <h2 class="cinza-1514">c) <?php echo $linha["c"]; ?></h2>
                <h2 class="cinza-1514">d) <?php echo $linha["d"]; ?></h2>
                <h2 class="cinza-1514">e) <?php echo $linha["e"]; ?></h2>
            </div>

            <div class="cad-resp">
                <h2 class="cinza-1514b">Resposta <?php echo $linha["correta"]; ?> </h2>
            </div>

        </div>



    <?php
    }

    ?>
</div>


<?php
    include "rodape.php";

    ?>