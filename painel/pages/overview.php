<div class="box-null">
    <?php 
        $sql = MySql::conectar()->prepare(
            "SELECT * FROM `character-player` c INNER JOIN `user` u ON c.player = u.id"
        );
        $sql->execute();
        $infoCharacter = $sql->fetchAll();

        //print_r($infoCharacter);
        if ($infoCharacter == null) {
    ?>
        <h2>You don't have a character yet</h2>
        <h2><a href="<?php echo INCLUDE_PATH_PAINEL."characterCreator" ?>">Create character</a></h2>
    <?php
        }else{
    ?>
        <h1>Mostrar personagem</h1>
    <?php 
        }
    ?>
</div>