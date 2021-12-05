<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL?>css/style.css">
    	<link rel="icon" href="<?php echo INCLUDE_PATH; ?>favicon.ico" type="image/x-icon" />
        <title>Painel de controle</title>
    </head>
        <body>
            <div class="box-login">
                <?php
                    if (isset($_POST['acao'])) {
                        $user = $_POST['user'];
                        $password = $_POST['password'];
                        $sql = MySql::conectar()->prepare("SELECT * FROM `user` WHERE `username` = ? AND `password` = ?");
                        $sql->execute(array($user,$password));
                        if ($sql->rowCount() == 1) {
                            //logamos

                            $info = $sql->fetch();

                            $_SESSION['login'] = true;
                            $_SESSION['user'] = $user;
                            $_SESSION['password'] = $password;
                            $_SESSION['nome'] = $info['name'];
                            $_SESSION['mail'] = $info['mail'];
                            $_SESSION['img'] = $info['img'];
                            $_SESSION['ID'] = $info['id'];
                            $_SESSION['permission'] = $info['permission'];
                            header('Location: '.INCLUDE_PATH_PAINEL);
                            die();
                        }else{
                            //falho
                            echo 'usuário ou senha incorretos';
                        }
                    }
                ?>
                <h2>Efetue o Login</h2>
                <form action="" method="post">
                    <input type="text" name="user" placeholder="usuário" required>
                    <input type="password" name="password" placeholder="Senha" required>
                    <input type="submit" name="acao" value="logar">
                </form>
                <h2><a href="<?php echo INCLUDE_PATH ?>">Home</a></h2>
            </div>
        </body>
</html>