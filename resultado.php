<?php
date_default_timezone_set('America/Sao_Paulo');
if(isset($_POST)){
    $numeroAlunos = filter_input(INPUT_POST, 'numeroAlunos',FILTER_SANITIZE_NUMBER_INT);
    $numeroEquipes = filter_input(INPUT_POST, 'numeroEquipes',FILTER_SANITIZE_NUMBER_INT);
    $disciplina = filter_input(INPUT_POST, 'disciplina',FILTER_SANITIZE_SPECIAL_CHARS);
    $conteudo = filter_input(INPUT_POST, 'conteudo',FILTER_SANITIZE_SPECIAL_CHARS);
    $turma = filter_input(INPUT_POST, 'turma',FILTER_SANITIZE_SPECIAL_CHARS);
    $descricao = filter_input(INPUT_POST, 'descricao',FILTER_SANITIZE_SPECIAL_CHARS);
    $data = date("d/m/Y")." às ".date("H:i");

    echo "<div class='box'>Sorteio realizado no dia $data<br><br>Disciplina: $disciplina <br>Conteúdo: $conteudo<br>Turma: $turma<br>Descrição: $descricao<br></div>";

    $equipes = range(1, $numeroEquipes);
    $alunos = range(1, $numeroAlunos);
    shuffle($alunos);

    $resto = $numeroAlunos % $numeroEquipes;
    $alunosPorEquipe = intval($numeroAlunos / $numeroEquipes);
    $sobraram = array_slice($alunos, count($alunos) - $resto, $resto);

    if ($resto == 0){
        for($i = 0; $i < $numeroEquipes; $i++) {
            echo "<div class='box'>Equipe ".($i + 1)."<br>";
            $array = array_slice($alunos, $alunosPorEquipe * $i, $alunosPorEquipe);
            foreach ($array as $key => $a){
                if ($key == count($array) - 1){
                    echo $a."<br>";
                }
                else{
                    echo $a.", ";
                }
                if ($key == count($array) - 1 ){
                    echo "</div>";
                }
                
            }
        }
    }
    else{
        for($i = 0; $i < $numeroEquipes; $i++) {
            echo "<div class='box'>Equipe ".($i + 1)."<br>";
            $array = array_slice($alunos, $alunosPorEquipe * $i, $alunosPorEquipe);
            foreach ($array as $key => $a){
                if ($key == count($array) - 1 AND $i >= $numeroEquipes - 1){
                    echo $a;
                }
                else{
                    echo $a.", ";
                }

            }
            if (count($sobraram) != 0){
                echo $sobraram[0]."</div>";
                $pop = array_shift($sobraram);
            }else{
                echo "</div>";
            }
            
        }
    }
}
      
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="./css/styleResultado.css">
</head>
<body>
    <div style="text-align:center">
        <button onclick="window.location='./'">Voltar</button>
        <button onclick="salvar()">Salvar no WhatsApp</button>
    </div>
        
    <script>
        function salvar(){
            var element = document.getElementsByClassName('box')
            var texto = ""
            for(var i = 0; i < element.length; i++){
                texto += element[i].innerHTML + "%0A%0A"
            }
            var textoCorrigido = texto.replace(/<br>/g, "%0A")
            window.location = `whatsapp:\/\/send?text=${textoCorrigido}`
        }
    </script>

</body>
</html>
