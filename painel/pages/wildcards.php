<div class="box-content">
    <div class="cards">
        <?php 
            $cards = Painel::selectAll("wildcards");
            foreach ($cards as $key => $value) {
        ?>
            <div class="wildcard">
                <div class="image">
                    <?php echo $value['icon']; ?>
                </div>
                <h1><?php echo $value['name']; ?></h1>
                <div class="text">
                    <p><?php echo $value['description']; ?></p>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    
</div>