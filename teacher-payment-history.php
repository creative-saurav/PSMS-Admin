<?php require_once('header.php') ;

  $stm = $pdo->prepare("SELECT * FROM teacher_payment_history ORDER BY id DESC");
  $stm->execute();
  $i=1;
  $amountList=$stm->fetchAll(PDO::FETCH_ASSOC);

?>


<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-account-multiple-plus "></i>                 
    </span>
    Teacher Payment History
  </h3>
</div>
   <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
              <?php if(isset($_GET['del'])=='success'):?>
                <div class="alert alert-success">Data Delete Successfully</div>
              <?php endif;?>
            <table class="table table-bordered" id="data_table_control">
                    <thead>
                      <tr>
                        <th> # </th>
                        <th> Name </th>
                        <th> Amount </th>
                        <th> Payment method </th>
                        <th> Account Number </th>
                        <th> Created  At </th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach($amountList as $single_amount) :?>
                       <tr>
                         <td><?php echo $i; $i++;?></td>
                         <td><?php echo getTeacherInfo($single_amount['teacher_id'],'name')  ;?></td>
                         <td><?php echo $single_amount['amount']."tk" ;?></td>
                         <td><?php echo $single_amount['payment_method'] ;?></td>
                         <td><?php echo $single_amount['account_number'] ;?></td>
                         <td><?php echo $single_amount['create_at'] ;?></td>
                       </tr> 
                       <?php endforeach ;?>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
 </div>


<?php require_once('footer.php') ;?>  