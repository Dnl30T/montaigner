<?php 
    if (isset($_GET['logout'])) {
        Painel::logout();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	    <link rel="icon" href="<?php echo INCLUDE_PATH; ?>favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL?>css/style.css">
        <title>Painel de controle</title>
    </head>
        <body>
            <aside>
                <div class="menu">
                    <div class="menu-wraper">
                        <div class="box-usuario">
                            <?php 
                                if ($_SESSION['img'] == '') {
                            ?>
                            <div class="avatar-usuario">
                                <a href="<?php echo INCLUDE_PATH_PAINEL ?>"><i class="fas fa-dice-d20"></i></a>
                            </div>
                            <?php }else{ ?>
                            <div class="imagem-usuario">
                                <a href="<?php echo INCLUDE_PATH_PAINEL ?>">
                                    <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img']; ?>" alt="">
                                </a>
                            </div>
                            <?php } ?>
                            <div class="nome-usuario">
                                <p><?php echo $_SESSION['nome'] ?></p>
                                <p>
                                    <?php 
                                    if($_SESSION['permission'] == 1){
                                            echo 'Administrador';
                                    }elseif ($_SESSION['path'] != null) {
                                        echo Painel::getClassName($_SESSION['path']);
                                    }else{
                                        echo 'player';
                                    }
                                    
                                    ?>
                                </p>
                                <p>Id da Sessão: <?php echo $_SESSION['ID']; ?></p>
                            </div>
                        </div>
                        <div class="itens-menu">
                            
                        </div><!--items-menu-->
                    </div>
                </div>
            </aside>
                <header>
                    <div class="center">
                        <div class="menu-btn">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </div>
                       
                        <div class="logout">
                            <a href="<?php echo INCLUDE_PATH_PAINEL?>?logout">
                            <span>Sair</span>
                            <i class="fas fa-sign-out-alt"></i>
                            </a>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="navMenu">
                        <?php 
                            if ($_SESSION['permission'] == 0) {
                        ?>
                            <div class="buttonMenu">
                                <h2>
                                    <a <?php selecionadoMenu('home'); ?> href="home">Home</a>
                                </h2>
                            </div>
                            <div class="buttonMenu">
                                <h2>
                                    <a <?php selecionadoMenu('lore'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>lore">Lore</a>
                                </h2>
                            </div>
                            <div class="buttonMenu">
                                <h2>
                                    <a <?php selecionadoMenu('rules'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>rules">Rules</a>
                                </h2>
                            </div>
                            <div class="buttonMenu">
                                <h2>
                                    <a <?php selecionadoMenu('wildcards'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>wildcards">Wildcards</a>
                                </h2>
                            </div>
                            <div class="buttonMenu">
                                <h2>
                                    <a <?php selecionadoMenu('team'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>team">Team stats</a>
                                </h2>
                            </div>
                        <?php 
                            }
                            
                        ?>
                    </div>
                </header>
                    <div class="content">
                        <?php 
                        Painel::carregarPagina();
                        ?>
                    </div>
                
                <script src="<?php echo INCLUDE_PATH?>js/jquery.js"></script>
                <script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>
        </body>
</html>