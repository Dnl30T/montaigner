<?php

    class Usuario{
        
        public function atualizarUsuario($nome,$email,$senha,$imagem){
            $sql = Mysql::conectar()->prepare(
                "UPDATE `usuario` 
                SET `name` =?, `mail` = ?, `password` = ?, `img` =?
                WHERE user_usu = ?
                ");
            if ($sql->execute(array($nome,$email,$senha,$imagem,$_SESSION['user']))) {
                $_SESSION['nome'] = $nome;
                $_SESSION['mail'] = $email;
                $_SESSION['password'] = $senha;
                $_SESSION['img'] = $imagem;
                return true;
            }
            else{
                return false;
            }
        }
        public function cadastrarUsuario($nome,$email,$senha,$usuario){
            $img = '';
            $sql = Mysql::conectar()->prepare(
                "INSERT INTO `user` (`name`,mail,`password`,username,img,id) VALUES (?,?,?,?,?,null)"
            );
            if ($sql->execute(array($nome,$email,$senha,$usuario,$img))) {
                return true;
            }else{
                return false;
            }
        }

    }
    

?>