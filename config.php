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


        //count any column value from student table
        // function stRowcount($col,$val){
        //     global $pdo;
        //     $stm= $pdo->prepare("SELECT $col FROM students WHERE $col=? ");
        //     $stm->execute(array($val));
        //     $count=$stm->rowCount();
        //     return $count;     
        //  } 
        //  Teacher Add
        // function teacherCount($col,$val){
        //     global $pdo;
        //     $stm= $pdo->prepare("SELECT $col FROM teacher WHERE $col=? ");
        //     $stm->execute(array($val));
        //     $count=$stm->rowCount();
        //     return $count;     
        //  } 
          // Global All table Create
        function getCount($tbl,$col,$val){
            global $pdo;
            $stm= $pdo->prepare("SELECT $col FROM $tbl WHERE $col=? ");
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
        
        // // Get Subject Name and Code
        function getSubjectName($id){
            global $pdo;
            $stm=$pdo->prepare("SELECT name,code FROM subjects WHERE id=?");
            $stm->execute(array($id));
            $results = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $results[0]['name'] .'-'.$results[0]['code'];
        }
        // //  teacher data update 
        function teacher($col,$id){
            global $pdo;
            $stm=$pdo->prepare("SELECT $col FROM teacher WHERE id=?");
            $stm->execute(array($id));
            $results = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $results[0][$col];
        }
        // //  Admin data update 
        function admin($col,$id){
            global $pdo;
            $stm=$pdo->prepare("SELECT $col FROM admin WHERE id=?");
            $stm->execute(array($id));
            $results = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $results[0][$col];
        }

?>
