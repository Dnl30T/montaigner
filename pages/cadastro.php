<?php
    include("classes/Mysql.php");
    include("classes/user.php");
    include("classes/signUp.php");
?>
<div class="contato-container">
	<div class="center">
		<form method="post" action="">
			<input required type="text" name="nome" placeholder="Nome...">
			<div></div>
			<input required type="mail" name="email" placeholder="E-mail.." value="<?php if(isset($_POST['redirect'])){$hMail = $_POST['emailR'];echo $hMail;}?>">
			<div></div>
			<input required type="password" name="senha" placeholder="crie sua senha">
            <div></div>
            <input required type="password" name="senhaC" placeholder="confirme sua senha">
            <div></div>
            <input required type="text" name="usuario" placeholder="crie seu nome de usuário">
            <div></div>
            <input type="submit" value="Enviar" name="acao">
            <div class="check-user">
                <?php
                    if (isset($_POST['acao'])) { 
                        $usuario = new Usuario();
                        $nome = $_POST['nome'];
                        $email = $_POST['email'];
                        $senha = $_POST['senha'];
                        $senhaC = $_POST['senhaC'];
                        $user = $_POST['usuario'];

                        if ($senhaC === $senha) {
                            $check = new Validation();
                            if ($check->strongPassword($senha)) {
                                $sql = MySql::conectar()->query("SELECT * FROM `user` WHERE username = '$user'");
                                $info = $sql->fetch();
                                if($info == true){
                                    echo 'nome de usuário indisponível';
                                }
                                else{
                                    if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha']) && $_POST['usuario']){
                                        $usuario->cadastrarUsuario($nome,$email,$senha,$user);
                                        header('Location: '.INCLUDE_PATH_PAINEL);
                                    }else{
                                        echo 'Faltam informações';
                                    }
                                }
                            }
                            
                        }else{
                            echo "senhas não coincidem";
                        }
                        
                        
                    }
                    
                ?>
            </div>
		</form>
	</div><!--center-->
</div><!--contato-container-->