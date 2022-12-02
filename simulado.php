<?php
include "./conexao.php";
include "./cabecalho.php";
if (isset($_GET["mensagem"]) && !empty($_GET["mensagem"])) {
?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $_GET["mensagem"]; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php

}
?>

<div class="base">
    SIMULADO
</div>


<form class="container-cadastradas" action="./resposta.php" method="POST">
    <?php

    $query = "select * from questoes order by rand() limit 10";
    $resultado = mysqli_query($conexao, $query);

    while ($linha = mysqli_fetch_array($resultado)) {
    ?>
        <div class="card-a" style="width: 60% ;">
            <div style="background-color: #ededf4;">
                <h2 class="preto-1516j">
                    <?php echo $linha["pergunta"] ?>
                </h2>
            </div>

            <div style="margin-left: 15px; margin-right: 15px; margin-bottom: 15px;">
                <h2 class="cinza-1514"><input type="radio" name="<?php echo $linha["id"] ?>" value="A">
                    <?php echo "A) " .  $linha["a"] ?>
                </h2>

                <h2 class="cinza-1514"><input type="radio" name="<?php echo $linha["id"] ?>" value="B">
                    <?php echo "B) " .  $linha["b"] ?>
                </h2>

                <h2 class="cinza-1514"><input type="radio" name="<?php echo $linha["id"] ?>" value="C">
                    <?php echo "C) " .  $linha["c"] ?>
                </h2>

                <h2 class="cinza-1514"><input type="radio" name="<?php echo $linha["id"] ?>" value="D">
                    <?php echo "D) " .  $linha["d"] ?>
                </h2>

                <h2 class="cinza-1514"><input type="radio" name="<?php echo $linha["id"] ?>" value="E">
                    <?php echo "E) " .  $linha["e"] ?>
                </h2>
            </div>

        </div>
    <?php
    }
    ?>
    <div style="width: 100%;">
        <button class="m-3 btn btn-success" type="submit">Enviar Resposta</button>
    </div>
</form>


<?php include "./rodape.php"; ?>