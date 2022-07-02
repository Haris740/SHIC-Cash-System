<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="images/faces/MMLogo.jpg" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <?php
         $aid= $_SESSION['sturecmscid'];
$sql="SELECT * from tblclass where ID=:aid";

$query = $dbh -> prepare($sql);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                  <p class="profile-name"><?php  echo htmlentities($row->ClassName);?></p><?php $cnt=$cnt+1;}} ?>
                </div>
               
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Dashboard</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic1">
                <span class="menu-title">Students</span>
                <i class="icon-people menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic1">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-students.php">Add Students</a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage-students.php">Manage Students</a></li>
                </ul>
              </div>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Notice</span>
                <i class="icon-doc menu-icon"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-notice.php"> Add Notice </a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage-cash-list.php"> Manage Notice </a></li>
                </ul>
              </div>
            </li><li class="nav-item">
              <a class="nav-link" href="search.php">
                <span class="menu-title">Search</span>
                <i class="icon-magnifier menu-icon"></i>
              </a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="add-cash.php">
                <span class="menu-title">Add Cash</span>
                <i class="icon-notebook menu-icon"></i>
              </a>
            </li>
            </li>
          </ul>
        </nav>