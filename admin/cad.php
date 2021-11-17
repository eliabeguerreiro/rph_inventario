<?php
include_once("../functions/connection.php");
include_once("../functions/fun.php");

$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
//coletando dados da pagina html
if($btnCadUsuario){
    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $erro = false;

//limpeza da string
    $dados_st = array_map('strip_tags', $dados_rc);
    $dados = array_map('trim', $dados_st);

    if(in_array('',$dados)){
        $erro = true;
            $_SESSION['msg'] = "Necessário preencher todos os campos";
    }elseif((strlen($dados['senha'])) < 6){
        $erro = true;
        $_SESSION['msg'] = "A senha deve ter no minímo 6 caracteres";
    }elseif(stristr($dados['senha'], "'")) {
        $erro = true;
        $_SESSION['msg'] = "Caracter ( ' ) utilizado na senha é inválido";
    }else{

        $result_usuario = "SELECT idusuario FROM usuarios WHERE usuario='". $dados['usuario'] ."'";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
            $erro = true;
            $_SESSION['msg'] = "Esse nome já consta no sistema!";
        }

    
    }

//encriptação da senha
    if(!$erro){
        $tipo = $dados['turma'];
        $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
        $result_usuario = "INSERT INTO usuarios (usuario, senha, tipo) VALUES ('" .$dados['usuario']. "','" .$dados['senha']. "','$tipo')";
    var_dump($result_usuario);
            $resultado_usario = mysqli_query($conn, $result_usuario);
        if(mysqli_insert_id($conn)){
            $_SESSION['msg'] = "Usuário cadastrado com sucesso";
        }else{
            $_SESSION['msg'] = "Erro ao cadastrar o usuário";
        }
            
    }
}

?>
    <!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="utf-8">
            <title>Cadastrar</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
                integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        </head>

        <body>
        
            <center>
                <h2>Cadastro de Agentes</h2>
                <?php
                
                if(isset($_SESSION['msg'])){
                    echo "<div class='alert alert-danger' role='alert'>";
                    echo$_SESSION['msg'];
                    echo"</div>";
                    unset($_SESSION['msg']);
                }
                
                ?>
                <p>
                <form method="POST" action="">
                
                    <label>Usuario</label>
                    <input type="usuario" name="usuario" placeholder="Digite o loguin">
                        
                    <label>Tipo</label>
                    <select>
                        <option value="">--</option>
                        <option value="admin">Adminstrador</option>
                        <option value="agent">Agente</option>
                        
                    </select>
                    
                    <label>Senha</label>
                    <input type="password" name="senha" placeholder="Digite uma senha" />
                    <br>
                    <input type="submit" name="btnCadUsuario" value="Cadastrar"><br>
                </form>
            </center>
            <script src="//cdnjs.cloudflare.com/ajax/libs/min.js/0.2.3/$.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
                integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
            </script>
        </body>
    </html>
<?php