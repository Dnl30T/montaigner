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
        public static function selectFilter($table,$info = null,$op, $arg1 = null, $arg2 = null)
        {
            if ($op == 1) {
                $sql = MySql::conectar()->prepare(
                    "SELECT * FROM `$table` WHERE $arg1 = $arg2"
                );
                $sql->execute();
            }elseif($op == 2){
                $sql = MySql::conectar()->prepare(
                    "SELECT $info FROM `$table` WHERE $arg1 = $arg2"
                );
                $sql->execute();
            }elseif ($op == 3) {
                $sql = MySql::conectar()->prepare(
                    "SELECT $info FROM `$table`"
                );
                $sql->execute();
            }
            try {
                return $sql->fetchAll();
            } catch (\Throwable $th) {
                return null;
            }
        }
    }
    
?>