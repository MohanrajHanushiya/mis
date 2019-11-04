
<!--Block#1 start dont change the order-->
<?php 
$title="Home | SLGTI";    
include_once ("config.php");
include_once ("head.php");
include_once ("menu.php");
include_once ("attendancenav.php");
?>
<!-- end dont change the order-->


<!-- search coding -->



<!-- Block#2 start your code -->

<div class="container" style="margin-top:30px">
<div class="card">
<div class="card-header">
<div class="row">
<div class="col-md-9">Overall Student Attendance Status</div>
<div class="col-md-3" align="right">
</div>
</div>
</div>

<div class="row">
<div class="col-sm-9 " ></div>
<div class="col-sm-3 " > 
<form class="example" action=".php" style="margin:auto;max-width:300px">
  <input type="text" placeholder="Search.." name="search2">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
</div>
</div>

<div class="card-body">
<div class="table-responsive">
<table class="table table-striped table-bordered" id="student_table"> <thead>
<tr>
<th>A ID</th>
<th>Roll Number</th>
<th>Module</th>
<th>Module head</th>
<th>Attendance Percentage</th>
<th>option</td>
<!-- <th>Report</th>  -->
</tr>

<?php

if(isset($_GET['delete']))
{
    $attendance_id = $_GET['delete'];
    // echo 'Your sql code is here'.$result_id;
    $sql = "Delete From `attendance` where attendance_id = $attendance_id ";
    if(mysqli_query($con,$sql)){
        echo"Record has been deleted succesfully";
    }
    else {
        echo "Error deleting" . mysqli_error($con);
    }
}
?>

<?php

//for insert

$sql = "SELECT attendance_id,student_id,module_name,staff_name,attendance_status FROM attendance";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{ //output data of each row
    while($row = mysqli_fetch_assoc($result))
    {
        echo '
        <tr>
        <td>'. $row["attendance_id"] . "<br>" .'</td>
        <td>'. $row["student_id"] . "<br>" .'</td>
        <td>'. $row["module_name"]."<br>".'</td>
          <td>'. $row["staff_name"]."<br>".'</td>
          <td>'. $row["attendance_status"]."<br>".'</td>
          <td>   
                   
                    <button class="btn btn-sm btn-danger" data-href="?delete='.$row["attendance_id"].'" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash"></i> </button>     
            </td>  
   
        </tr>';
    }
}
else {
        echo "0 results";
    }
?>
  





</tbody>
</table>
 

<nav aria-label="Page navigation example">

<ul class="pagination justify-content-end">



<li class="page-item ">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Report</button>
<!-- <a class="page-link" href="#" tabindex="-1">Previous</a>
</li>
<li class="page-item"><a class="page-link" href="#">1</a></li>
<li class="page-item"><a class="page-link" href="#">2</a></li>
<li class="page-item"><a class="page-link" href="#">3</a></li>
<li class="page-item">
<a class="page-link" href="#">Next</a>
</li>
</ul>
</nav> -->

</div>
</div>
</div>
</div>
</body>
</html>
<!-- end your code -->


<!--Block#3 start dont change the order-->
<?php include_once ("Footer.php"); ?>  
<!--  end dont change the order-->
