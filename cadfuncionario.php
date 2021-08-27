<?php

include_once(dirname(__FILE__)."/inc/MySQL.php");



if (isset($_POST['cadastro'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $formacao = $_POST['formacao'];
    $telefone = $_POST['telefone'];
    $descricao = $_POST['descricao'];
    $senha = md5($_POST['senha']);
      //acentuação da erro 
    $sql = $pdo->prepare("INSERT INTO funcionario (id,nome,email,formacao,telefone,descricao,senha) values (null,?,?,?,?,?,?)");
    if ($sql->execute(array($nome, $email, $formacao, $telefone, $descricao, $senha))) {
        echo 'Dados cadastrados com sucesso.';
       //header, faz o redcionamento das páginas//
        header('location:/GetJob-ProjetoIntegrador/login.php');
    } else {
        echo 'Dados não cadastrados!';
    }
}
?>

<?php

include_once(dirname(__FILE__)."/inc/header.php");

include_once(dirname(__FILE__)."/inc/menu.php");


?>


    <main class="container">
      <form action="" method="POST">
            <fieldset>
                <h1>Cadastro de Funcionário</h1>
                <br>
                <p>Dados Pessoais</p>
                <div class="input-field">
                    <input type="text" name="nome" id="nome" placeholder="Nome Completo" required>
                    <div class="efeito"></div>
                </div>
                <br>
                <div class="input-field">
                    <input type="email" name="email" id="email" placeholder="Email" required>
                    <div class="efeito"></div>
                </div>
                <br>
                <div class="input-field">
                    <input type="text" name="telefone" id="telefone" maxlength="10" required placeholder="Telefone">
                    <div class="efeito"></div>
                </div>
                <br>
                <div>
                    <label>Formação</label>
                    <input type="radio" name="formacao" id="formacao" value="fundamental" required>Fundamental
                    <input type="radio" name="formacao" id="formacao" value="médio" required>Ensino-Médio
                    <input type="radio" name="formacao" id="formacao" value="superior" required>Ensino-Superior
                </div>
                <br>
                <br>
                <div>
                    <textarea name="experiencia" id="experiencia" cols="45" rows="5" placeholder="Experiência" maxlength="500"></textarea>
                </div>
                <br>
                <div>
                    <textarea name="descricao" id="descricao" cols="45" rows="8" placeholder="Descrição" maxlength="500"></textarea>
                </div>
                <label for="img">Imagem de Perfil:</label>
            <input type="file" name="img" />
                <br>
                <br>
                <div class="input-field">
                    <input type="password" name="senha" id="senha" placeholder="Senha" minlength="5" maxlength="15">
                    <div class="efeito"></div>
                </div>

                <input type="submit" name="cadastro" value="Cadastrar Funcionário">
            </fieldset>
        </form>
    </main>
 <?php
include_once(dirname(__FILE__)."/inc/footer.php");
?>