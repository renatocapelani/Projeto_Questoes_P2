<?php
include "./conexao.php";
include "./cabecalho.php";

?>
<div class="base">
    RESULTADO
</div>
<div class="container-cadastradas">
    <?php
        $pontuacao = 0;
        if (isset($_POST) && !empty($_POST)) {

        $valoresArray = array_keys($_POST);

        for ($i = 0; $i < count($valoresArray); $i++) {

            $alternativaSelecionada = lcfirst($_POST[$valoresArray[$i]]); //alternativa que o usuário selecionou
            quebraLinha();

            $query = "select * from questoes where id =" . $valoresArray[$i];
            $resultado = mysqli_query($conexao, $query);

            while ($linha = mysqli_fetch_array($resultado)) {
                $alternativaCorreta = lcfirst($linha["correta"]);
    ?>

                <div class="card-a">
                    <div style="background-color: #ededf4;">
                        <h2 class="preto-1516j"> <?php echo $linha["pergunta"] ?> </h2>
                    </div>

                    <?php
                    if (
                        $alternativaCorreta == $alternativaSelecionada
                    ) {
                    ?>
                        <div style="margin-left: 15px; margin-right: 15px; margin-bottom: 15px;">

                            <p>Voce Acertou!!!</p>
                            <p>Sua Resposta: <?php echo $_POST[$valoresArray[$i]] . ") " . $linha[$alternativaSelecionada] ?></p>
                            <p>Resposta Certa: <?php echo $linha["correta"] . ") " . $linha[$alternativaCorreta] ?></p>
                            <div class="acertos">
                                <img src="./img/certo.png" style="height: 32px;" alt="">
                            </div>
                        </div>
                    <?php
                        $pontuacao++;
                    } else {
                    ?>
                        <div style="margin-left: 15px; margin-right: 15px; margin-bottom: 15px;">

                            <p>Voce Errou!</p>
                            <p>Sua Resposta: <?php echo $_POST[$valoresArray[$i]] . ") " . $linha[$alternativaSelecionada] ?></p>
                            <p>Resposta Certa: <?php echo $linha["correta"] . ") " . $linha[$alternativaCorreta] ?></p>
                            <div class="acertos">
                                <img src="./img/errado.png" style="height: 32px;" alt="">
                            </div>

                        </div>
                    <?php
                    }
                    ?>

                </div>

            <?php
            }
        }

        if ($pontuacao < 5) {
            ?>
            <div class="bg-danger texto-centro" style="width: 100%; color: white;">
                <h2 class="text-center">Sua pontuação: <?php echo $pontuacao ?></h2>
                <br />
            </div>
        <?php
        } else {
        ?>
            <div class="bg-success texto-centro" style="width: 100%;  color: white;">
                <h2 class="text-center">Sua pontuação: <?php echo $pontuacao ?></h2>
                <br />
            </div>
        <?php
        }
    } else {
        header("Location: ./simulado.php?mensagem=Por favor responda pelo menos uma pergunta!!!");
        exit();
    }

    function quebraLinha()
    {
        ?>
        <br />
    <?php
    }

    ?>