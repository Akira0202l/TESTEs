<?php
session_start();
if (isset($_POST['submit'])) {

    $CPF = isset($_POST['CPF']) ? $_POST['CPF'] : '';
    $Senha = isset($_POST['Senha']) ? $_POST['Senha'] : '';

    // Verifica se ambos os campos estão preenchidos
    if (!empty($CPF) && !empty($Senha)) {

        include_once('config.php');

        $sql = "SELECT * FROM usuarios WHERE CPF = '$CPF' and Senha = '$Senha'";
        $result = $conexao->query($sql);

        if (mysqli_num_rows($result) < 1) {
        unset ($_SESSION['CPF']);
        unset ($_SESSION['Senha']);
            header('Location: Login.php');

        } else {

            $_SESSION['CPF']=$CPF;
            $_SESSION['Senha']=$Senha;  
            header('Location: PaginaUsuario.php');
        }

        } else {

            header('Location: Login.php');
        }
    }
?>
