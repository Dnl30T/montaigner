<?php
    class Management{

        protected $id;

        public function infoExists($table)
        {
            $sql = MySql::conectar()->query(
                "SELECT * FROM `$table`"
            );
            $answer = $sql->fetchAll();
            //print_r($answer);
            if ($answer != null) {
                //echo "real";
                return true;     
            }else{
                //echo "faiki";
                return false;
            }
        }
    }
    
?>