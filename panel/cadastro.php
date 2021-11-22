<?php
session_start();
include("../functions/connection.php");
include("../functions/fun.php");

//coletando dados do formulario
if($_POST){
    
    $dados = $_POST;

    //criando o ID_ITEM
    $sql_cont = "SELECT * FROM `itens`";
    $sql_controle = mysqli_query($conn, $sql_cont);
    $total = mysqli_num_rows($sql_controle);
    $controle = $total + 1;
    if($controle < 10){
        $ctrl = $_SESSION['usuario']['id_usuario']."0000".$controle; 
    
    }elseif($controle < 100){
        $ctrl = $_SESSION['usuario']['id_usuario']."000".$controle; 
        
    }elseif($controle < 1000){
        $ctrl = $_SESSION['usuario']['id_usuario']."00".$controle; 
        
    }elseif($controle < 10000){
        $ctrl = $_SESSION['usuario']['id_usuario']."0".$controle; 
    }


    //Fazendo upload dos dados pro BD
    $upload_item = "INSERT INTO itens (id_item, identificador, tipo, data_compra, loja, modelo) 
    VALUES('" .$ctrl. "','" .$dados['identificador']. "','" .$dados['tipo']. "',
    '" .$dados['data_c']. "','R" .$dados['loja']. "','" .$dados['modelo']. "');";
    $upload = mysqli_query($conn, $upload_item);

    if(mysqli_insert_id($conn)){
        $_SESSION['msg'] = "Item ".$dados['tipo']." cadastrado com sucesso";
    }

    $aux = 'qr_img0.50j/php/qr_img.php?';   
    $aux .= 'd='.$ctrl.'&';
    $aux .= 'e=H$';
    $aux .= 's=10$';
    $aux .= 't=P';
}




?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Painel de Edição</title>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <center>

        <div >
            <?php
            if(isset($_SESSION['msg'])){
                msg_sistem($_SESSION['msg']);
                unset($_SESSION['msg']);
            }
        ?>

            <a class="text-decoration-none text-reset" href="../">
                <button type="button" class="btn btn-danger">
                    Voltar
                </button>
            </a>
            <br><br>
            

            <div class="jumbotron form-group">
                <form method="POST" action="" enctype="multipart/form-data">

                    <label>Identificador</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="identificador"
                            placeholder="Digite um codigo identificador">
                        <small id="emailHelp" class="form-text text-muted">Siga nessa ordem de preferencia:
                            Numero MAC, Serial ou codigo exclusivo do item que esteja fisicamente visível.</small>
                    </div>
                    <br>
                    <br>

                    <label>Número da loja</label>
                    <div class="col-md-4">
                        <input class="form-control" type="number" name="loja" placeholder="Digite o codigo da loja">
                        <small id="emailHelp" class="form-text text-muted">Sempre insira 4 digitos. Exemplo:
                            0015</small>
                    </div>
                    <br>

                    <label>Modelo</label>
                    <div class="col-md-4">
                        <input class="form-control" type="text" name="tipo" placeholder="Digite o modelo do item">
                        <small id="emailHelp" class="form-text text-muted">O modelo será padronizado em marca + modelo.
                            Ex: hp officejet pro 6970 | lg flatron 24bl550j-b</small>
                    </div>
                    <br>

                    <label>Tipo</label>
                    <div>
                        <select name="modelo">
                            <option value="">Selecione o modelo</option>
                            <option value="desktop">Desktop</option>
                            <option value="monitpr">Monitor</option>
                            <option value="equipamento_rede">Equipamento de Rede</option>
                            <option value="nobrake">Nobrake</option>
                            <option value="leitor">Leitor</option>
                            <option value="impressora">Impressora</option>
                            <option value="equipamento_audiovisual">Equipamento Audiovisual</option>
                        </select>
                    </div>




                    <label>Data Aquisição/Registro</label>
                    <div class="col-md-4">
                        <input class="form-control" type="date" name="data_c" placeholder="Digite a data de nascimento">
                        <small id="emailHelp" class="form-text text-muted">Opcional</small>
                    </div>

                    <br><br>
                    <input class="btn btn-primary" type="submit" name="btnCadUsuario" value="Cadastrar"><br>

                </form>
            </div>

            <div>
                <img id='qr' src="<?php echo $aux; ?>" />
            </div>
            <br>


    </center>
</body>

</html>

<?php