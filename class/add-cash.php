<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmscid']==0)) {
  header('location:logout.php');
  } else{
    $cid=$_SESSION['sturecmscid'];
   if(isset($_POST['submit']))
  {
      $classid=$cid;
      $stuid=$_POST['stuid'];
      $subject=$_POST['subject'];
      $cash=$_POST['cash'];
$sql="insert into tblnotice(Cash,ClassId,Subject,StuID)values(:cash,:classid,:subject,:stuid)";
$query=$dbh->prepare($sql);
$query->bindParam(':cash',$cash,PDO::PARAM_STR);
$query->bindParam(':classid',$classid,PDO::PARAM_STR);
$query->bindParam(':stuid',$stuid,PDO::PARAM_STR);
$query->bindParam(':subject',$subject,PDO::PARAM_STR);
 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Cash has been added.")</script>';
echo "<script>window.location.href ='add-cash.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>SHIC Cash System|| Add Notice</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css" />
    
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     <?php include_once('includes/header.php');?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
      <?php include_once('includes/sidebar.php');?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Add Cash </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Add Cash</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Add Cash</h4>
                   
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                     
                     <!-- <div class="form-group">
                       <label for="exampleInputEmail3">Select Class</label>
                       <select  name="classid" class="form-control" required='true'>
                         <option value="">Select Class</option>
                         <?php 
$sql4 = "SELECT * from    tblclass";
$query4 = $dbh -> prepare($sql4);
$query4->execute();
$result4=$query4->fetchAll(PDO::FETCH_OBJ);

foreach($result4 as $row3)
{          
    ?>  
<option value="<?php echo htmlentities($row3->ID);?>"><?php echo htmlentities($row3->ClassName);?></option>
 <?php } ?> 
                        </select>
                      </div> -->
                     
                     <!-- <div class="form-group">
                       <label for="exampleInputEmail3">Select Student</label>
                       <select  name="stuid" class="form-control" required='true'>
                         <option value="">Select Student</option>
                         <?php 

$sql3 = "SELECT * from    tblstudent ";
$query3 = $dbh -> prepare($sql3);
$query3->execute();
$result3=$query3->fetchAll(PDO::FETCH_OBJ);

foreach($result3 as $row2)
{          
    ?>  
<option value="<?php echo htmlentities($row2->StuID);?>"><?php echo htmlentities($row2->StudentName);?></option>
 <?php } ?> 
                        </select>
                      </div> -->
                      
                      <div class="form-group">
                        <label for="exampleInputEmail3">AD No.</label>
                        <input type="text" name="stuid" value="" class="form-control" required='true'>
                      </div>

                         <div class="form-group">
                           <label for="exampleInputName1">Cash Issue</label>
                           <textarea name="subject" value="" class="form-control" required='true'></textarea>
                         </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Type Cash</label>
                        <input type="text" name="cash" value="" class="form-control" required='true'>
                      </div>
                   
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Add</button>
                     
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         <?php include_once('includes/footer.php');?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/select2/select2.min.js"></script>
    <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/typeahead.js"></script>
    <script src="js/select2.js"></script>
    <!-- End custom js for this page -->
  </body>
</html><?php }  ?>