<?php 
// get functin file
function getTotalcount($table){
    global $pdo;
    $stm = $pdo->prepare("SELECT id FROM $table");
    $stm ->execute();
    $count=$stm->rowCount();
    return $count;
   }

?>