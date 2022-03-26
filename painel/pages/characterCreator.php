<div class="box-content">
    <form action="" method="post">
        <div class="pathInfo">
            <h1>Path information</h1>
            <label for="classCharacter">See paths</label>
            <select name="chooseClass" id="chooseClass">
                <?php 
                    $classes = Painel::selectAll('paths');
                    foreach ($classes as $key => $value) {
                ?>
                    <option value="<?php echo $value['id']; ?>">
                        <?php echo $value['name']; ?>
                    </option>
                <?php
                    }
                ?>
            </select>
            <input type="submit" name="sendDesc" value="info">
        </div>
        <div class="raceInfo">
            <label for="raceCharacter">See possible races (choose 1 to raise your chances)</label>
            <select name="chooseRace" id="chooseRace">
                <option value="0">Random</option>
                <?php 
                    $races = Painel::selectAll('races');
                    foreach ($races as $key => $value) {
                ?>
                    <option value="<?php echo $value['id']; ?>">
                        <?php echo $value['name'].' 33%'; ?>
                    </option>
                <?php
                    }
                ?>
            </select>
            <input type="submit" name="sendDescR" value="info">
        </div>
    </form>
</div>
<div class="box-content">
    <hr></hr>
    <div class="create-Character">
        <?php 
            if (isset($_POST['sendDesc'])) {
                $op = 'paths';
                $desc = $_POST['chooseClass'];
                //echo $op.$desc;
                $description = Management::selectFilter($op,null,1,'id',$desc);
                foreach ($description as $key => $value) {
        ?>
        <div class="box-desc">
        <?php
                    echo "<img src='".INCLUDE_PATH."images/classes/".Painel::getClassName($value['id']).".png' class='pathImg'"."<br>";
                    echo "<p><b>Path Analyzed:</b></p>";
                    echo "<p>".$value['name']."</p>";
                    echo "<p><b>Daniel D. description:</b></p>";
                    echo "<p>".$value['description']."</p>";
                    echo "<p><b>Bonus</b></p>";
                    echo "<p>".$value['bonus']."</p>";
                }
        ?>
    </div>
    <?php
        }
    ?>
    <?php 
        if (isset($_POST['sendDescR'])) {
            $op = 'races';
            $desc = $_POST['chooseRace'];
            //echo $op.$desc;
            $description = Management::selectFilter($op,null,1,'id',$desc);
            foreach ($description as $key => $value) {
    ?>
    <div class="box-desc">
    <?php
                echo "<img src='".INCLUDE_PATH."images/races/".Painel::getRaceName($value['id']).".png' class='pathImg'"."<br>";
                echo "<p><b>Path Analyzed:</b></p>";
                echo "<p>".$value['name']."</p>";
                echo "<p><b>Daniel D. description:</b></p>";
                echo "<p>".$value['description']."</p>";
                echo "<p><b>Bonus</b></p>";
                echo "<p>".$value['bonus']."</p>";
            }
    ?>
    </div>
    <?php
        }
    ?>
    </div>
</div>
<div class="box-content">
    <div class="create-Character">
        <form action="" method="post">
        <h1>Make your character</h1>
            <div class="inputInfo">
                <div class="name">
                    <label for="nameCharacter">Choose your name</label>
                    <input type="text" name="characterName" id="characterName">
                </div>
                <div class="loreCharacter">
                    <label for="classCharacter">Write your own lore (drag to free space)</label>
                    <textarea name="loreCharacter" id="" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div class="contentView">
                <div class="attr">
                <h3>Set your skills (max: 5) </h3>
                    <div class="attributes-Character">
                        <div class="abilities">
                            <label for="strenght">Strenght</label>
                            1 <input type="radio" name="strAttr" id="strAttr" value="1">
                            2 <input type="radio" name="strAttr" id="strAttr" value="2">
                            3 <input type="radio" name="strAttr" id="strAttr" value="3">
                            4 <input type="radio" name="strAttr" id="strAttr" value="4">
                            5 <input type="radio" name="strAttr" id="strAttr" value="5">
                        </div>
                        <div class="abilities">
                            <label for="strenght">Mind</label>
                            1 <input type="radio" name="mndAttr" id="mndAttr" value="1">
                            2 <input type="radio" name="mndAttr" id="mndAttr" value="2">
                            3 <input type="radio" name="mndAttr" id="mndAttr" value="3">
                            4 <input type="radio" name="mndAttr" id="mndAttr" value="4">
                            5 <input type="radio" name="mndAttr" id="mndAttr" value="5">
                        </div>
                        <div class="abilities">
                            <label for="strenght">Dexterity</label>
                            1 <input type="radio" name="dxtAttr" id="dxtAttr" value="1">
                            2 <input type="radio" name="dxtAttr" id="dxtAttr" value="2">
                            3 <input type="radio" name="dxtAttr" id="dxtAttr" value="3">
                            4 <input type="radio" name="dxtAttr" id="dxtAttr" value="4">
                            5 <input type="radio" name="dxtAttr" id="dxtAttr" value="5">
                        </div>
                        <div class="abilities">
                            <label for="strenght">Power</label>
                            1 <input type="radio" name="pwrAttr" id="pwrAttr" value="1">
                            2 <input type="radio" name="pwrAttr" id="pwrAttr" value="2">
                            3 <input type="radio" name="pwrAttr" id="pwrAttr" value="3">
                            4 <input type="radio" name="pwrAttr" id="pwrAttr" value="4">
                            5 <input type="radio" name="pwrAttr" id="pwrAttr" value="5">
                        </div>
                        <div class="abilities">
                            <label for="strenght">Constituition</label>
                            1 <input type="radio" name="cnsAttr" id="cnsAttr" value="1">
                            2 <input type="radio" name="cnsAttr" id="cnsAttr" value="2">
                            3 <input type="radio" name="cnsAttr" id="cnsAttr" value="3">
                            4 <input type="radio" name="cnsAttr" id="cnsAttr" value="4">
                            5 <input type="radio" name="cnsAttr" id="cnsAttr" value="5">
                        </div>
                    </div>
                    <div class="submit-attr">
                            <button class="button" id="btn" type="button" onclick="setAttributes(strAttr,pwrAttr,dxtAttr,mndAttr,cnsAttr)">Set Attributes</button>
                            <button class="button" type="button" onclick="resetAttributes() ">Reset</button>
                            <div id="show"></div>
                            <input type="hidden" name="attrSet" id="showCurrent">
                        </div>
                    <div class="semi-attributes">
                        <div class="lifeAttr">
                            <label for="lifePoints">Life points</label>
                            <div class="appr" id="fde1"></div>
                            <input type="hidden" name="lifeSend" id="lifeSend">
                        </div>
                        <div class="skillAttr">
                            <label for="skillPoints">Skill points</label>
                            <div class="appr" id="fde2"></div>
                            <input type="hidden" name="skillSend" id="skillSend">
                        </div>
                        <div class="dodgeAttr">
                            <label for="ddgPoints">Dodging skill</label>
                            <div class="appr" id="fde3"></div>
                            <input type="hidden" name="ddgSend" id="ddgSend">
                        </div>
                        <div class="speedAttr">
                            <label for="speedPoints">Speed</label>
                            <div class="appr" id="fde4"></div>
                            <input type="hidden" name="speedSend" id="speedSend">
                        </div>
                    </div>
                </div>
                <div class="classInfo">
                </div>
            </div>
            <div class="hiddenInput">
                    <input type="hidden" name="str" id="strS" value="">
                    <input type="hidden" name="mnd" id="mndS" value="">
                    <input type="hidden" name="dxt" id="dxtS" value="">
                    <input type="hidden" name="pwr" id="pwrS" value="">
                    <input type="hidden" name="cns" id="cnsS" value="">
                </div>
            <div class="newMontaigner">
                <input type="submit" name="sendInfo" value="New Montaigner">
            </div>
        </form>
    </div>
</div>