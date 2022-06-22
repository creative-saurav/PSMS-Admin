<?php 

    $host = "localhost";
    $db_name = "psms";
    $user = "root";
    $password = "";
    date_default_timezone_set("Asia/Dhaka");

    try{
        $pdo = new PDO("mysql:host=$host;dbname=$db_name", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    // $statement = $pdo->prepare("INSERT INTO students(name,roll, mobile) VALUES (?, ?, ?)");
    // $result = $statement->execute(array("Alex","20","08190409890"));
    // if($result == true){
    //         echo "Data Insert Success";
    //     } 



        //count any column value from student table
        // function stRowcount($col,$val){
        //     global $pdo;
        //     $stm= $pdo->prepare("SELECT $col FROM students WHERE $col=? ");
        //     $stm->execute(array($val));
        //     $count=$stm->rowCount();
        //     return $count;     
        //  } 
        //  Teacher Add
        function teacherCount($col,$val){
            global $pdo;
            $stm= $pdo->prepare("SELECT $col FROM teacher WHERE $col=? ");
            $stm->execute(array($val));
            $count=$stm->rowCount();
            return $count;     
         } 
        // //  Student Data Count 
        // function Student($col,$id){
        //     global $pdo;
        //     $stm=$pdo->prepare("SELECT $col FROM students WHERE id=?");
        //     $stm->execute(array($id));
        //     $results = $stm->fetchAll(PDO::FETCH_ASSOC);
        //     return $results[0][$col];
        // }

?>

