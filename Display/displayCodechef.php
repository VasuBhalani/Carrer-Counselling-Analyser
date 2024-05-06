<?php
session_start();
if (!(isset($_SESSION['logedin'])) || $_SESSION['logedin'] != true) {
    header('Location:index.php');
    exit; // Added exit to stop further execution
} else {
    include('connection.php');
    // $id = $_GET['id'];
}
?>
<?php
include('connection.php');

if(isset($_POST['displaySend'])) {
    $table='<table class="table">
    <thead class="thead" style="background-color: lightgrey;">
      <tr>
        <th scope="col">Sr.No</th>
        <th scope="col">Language</th>
        <th scope="col">Rank</th>
        <th scope="col">Points</th>
        <th scope="col">No. of Solved Problems</th>
        <th scope="col">Operations</th>
      </tr>
    </thead>';

    $sql='select * from codechef where student_id="'.$_SESSION['account'].'"';
    $result=mysqli_query($conn,$sql);
    $i=1;
    while($row = mysqli_fetch_assoc($result)) {
        $language=$row['clanguages'];
        $rank=$row['crank'];
        $point=$row['cpoint'];
        $number=$row['cnumber'];
        $id=$row['sr_no'];

        $table.=' <tr>
        <td scope="row">'.$i.'</td>
        <td>'.$language.'</td>
        <td>'.$rank.'</td>
        <td>'.$point.'</td>
        <td>'.$number.'</td>
        <td>
        <button type="button" class="btn btn-dark" onclick="updateCodechef('.$id.')">Update</button>
        <button type="button" class="btn btn-danger" onclick="deleteCodechef('.$id.')">Delete</button>
   </td>
  

      </tr>';
      
      $i++;
}
       $table.='</table>';
       echo $table; //it not print in this page it goes to editcodingplatform.php  success:function(data,status){   in data variable
}
?>
