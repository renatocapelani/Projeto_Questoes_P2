    <?php

include "conexao.php";
include "cabecalho.php";

if (!isset($_POST['correta'])) {
    ?>
    <div class="alert alert-danger" role="alert">
        Uma opção como alternativa deverá ser selecionada.
    </div>
    <?php
} else {


if (isset($_POST) && !empty($_POST)) {
$pergunta = $_POST["pergunta"];
$a = $_POST["A"];
$b = $_POST["B"];
$c = $_POST["C"];
$d = $_POST["D"];
$e = $_POST["E"];
$correta = $_POST["correta"];

if (empty($pergunta) || empty($a) || empty($b) || empty($c) || empty($d) || empty($e)) {
?>
    <div class="alert alert-danger" role="alert">
        Todos os Campos deveram ser preenchidos.
    </div>
    <?php

}else{




$query = "insert into questoes (pergunta,a,b,c,d,e,correta) ";
$query = $query . " values('$pergunta','$a','$b','$c','$d','$e','$correta')";
$resultado = mysqli_query($conexao, $query);
}
}
}
?>
            <div class="container">
                <div>

                <form action="./index.php" method="post">

                    <label>Registre sua pergunta</label>
                    <br>
                    <textarea class="form-label form-control" name="pergunta"></textarea>


                    

                    <label>A)</label>
                    <input class="form-check-input" type="radio" name="correta" value="A" />
                    <input class="form-control" type="text" name="A" />

                    

                    <label>B)</label>
                    <input class="form-check-input" type="radio" name="correta" value="B" />
                    <input class="form-control" type="text" name="B" />

                   

                    <label>C)</label>
                    <input class="form-check-input" type="radio" name="correta" value="C" />
                    <input class="form-control" type="text" name="C" />

                    

                    <label>D)</label>
                    <input class="form-check-input" type="radio" name="correta" value="D" />
                    <input class="form-control" type="text" name="D" />

                    

                    <label>E)</label>
                    <input class="form-check-input" type="radio" name="correta" value="E" />
                    <input class="form-control" type="text" name="E" />

                    <br><br>

                    <button class="btn btn-success" type="submit">Salvar Pergunta</button>
                </form>
                </div>
            </div>

<?php
include "rodape.php";
?> 

