<?php require_once('header.php') ;
 
 if(isset($_POST['add_teacher_btn'])){
    $sub_name= $_POST['sub_name'];
    $sub_code= $_POST['sub_code'];
    $sub_type= $_POST['sub_type'];

    // Count Subject Code 
    $codeCount = getCount('subjects','code',$sub_code);

    if(empty($sub_name)){
        $error = "Subject Name is Required!";
    }
    else if(empty($sub_code)){
        $error = "Subject Code is Required!";
    }
    else if(empty($sub_type)){
        $error = "Subject Type is Required!";
    }  
    else if($codeCount != 0){
        $error = "Subject Code Allready Used,Try Another Code!";
    }
    else{
        $insert=$pdo->prepare("INSERT INTO subjects(name,code,type) VALUES (?,?,?)" );
        $insert->execute(array(
            $sub_name,
            $sub_code,
            $sub_type,
        ));
        $success = "Subject Create Succedssfully!";

    }

 }


?>


<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-airballoon "></i>                 
    </span>
    Add New Routine
  </h3>
</div>
   <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <?php if(isset($error)) :?>
                <div class="alert alert-danger">
                    <?php echo $error ;?>
                </div>   
            <?php endif;?>
            <?php if(isset($success)) :?>
                <div class="alert alert-success">
                    <?php echo $success ;?>
                </div>   
            <?php endif;?>
            <form class="forms-sample" method="POST" action="">
            <div class="form-group">
                <label for="class_name">Select Class:</label>
                <?php 
                 $stm=$pdo->prepare("SELECT id,class_name FROM class");
                 $stm->execute();
                 $lists=$stm->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <select name="class_name" id="class_name" class="form-control">
                    <?php 
                     foreach($lists as $list):
                    ?>
                    <option value="<?php echo $list['id'];?>"><?php echo $list['class_name'];?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label for="class_name">Select Subject:</label>
                <?php 
                 $stm=$pdo->prepare("SELECT id,class_name FROM class");
                 $stm->execute();
                 $lists=$stm->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <select name="class_name" id="class_name" class="form-control">
                    <?php 
                     foreach($lists as $list):
                    ?>
                    <option value="<?php echo $list['id'];?>"><?php echo $list['class_name'];?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label for="time_from">Time From:</label><br>
                <input type="text" name="time_from" id="time_from" class="form-control">
            </div>
            <div class="form-group">
                <label for="time_to">Time To:</label><br>
                <input type="text" name="time_to" id="time_to" class="form-control">
            </div>
            <div class="form-group">
                <label for="room_no">Room No:</label><br>
                <input type="text" name="room_no" id="room_no" class="form-control">
            </div>
            <button type="submit" name="add_teacher_btn" class="btn btn-gradient-primary mr-2">Create Subject </button>
            </form>
        </div>
        </div>
    </div>
 </div>


<?php require_once('footer.php') ;?>  