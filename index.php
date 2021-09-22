
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Embaralhador</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="box">
        <h2>Embaralhador</h2>
        <form action="/resultado.php" method="POST" >
            <div class="inputBox">
                <input type="number" name="numeroAlunos" id="numeroAlunos" min="0" max="2097152" required>
                <label>Alunos<label>
            </div>
            <div class="inputBox">
                <input type="number" name="numeroEquipes" id="numeroEquipes" min="0" max="2097152" required>
                <label>Equipes</label>
            </div>
            <div class="inputBox">
                <input type="text" name="disciplina" id="disciplina" required maxlength="64">
                <label>Disciplina</label>
            </div>
            <div class="inputBox">
                <input type="text" name="conteudo" id="conteudo" required maxlength="64">
                <label>Conteúdo</label>
            </div>
            <div class="inputBox">
                <input type="text" name="turma" id="turma" required maxlength="64">
                <label>Turma</label>
            </div>
            <div class="inputBox">
                <input type="text" name="descricao" id="descricao" required maxlength="256">
                <label>Descrição</label>
            </div>
            <input type="submit" value="Gerar Equipes">
        </form>
    </div>
</body>
</html>