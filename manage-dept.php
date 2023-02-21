<?php 
    require_once "include/header.php";
?>

<?php 
 
//  database connection
require_once "../connection.php";

$sql = "SELECT * FROM department";
$result = mysqli_query($conn , $sql);

$i = 1;
?>

<style>
table, th, td {
  border: 1px solid black;
  padding: 15px;
  align-items:centre;
}
table {
  border-spacing: 10px;
}
</style>

<div class="container bg-white shadow">
    <div class="py-4 mt-5"> 
    <div class='text-center pb-2'><h4>Manage Department</h4></div>
    <table style="width:100%" class="table table-responsive-lg table-bordered table-hover text-center ">
    <tr class="bg-dark">
        <th>Department No</th>
        <th>Department Name</th>
        <th>Action</th>
    </tr>
    <?php 
    
    if( mysqli_num_rows($result) > 0){
        while( $rows = mysqli_fetch_assoc($result) ){
            $name= $rows["dname"];
            $dept= $rows["dnum"];
            ?>
        <tr>
        <td><?php echo $dept; ?></td>
        <td> <?php echo $name ; ?></td>
        <td> <?php 
                $edit_icon = "<a href='edit-dept.php? id= {$dept}' class='btn-sm btn-primary ml-3 '> <span ><i class='fa fa-edit '></i></span> </a>";
                $delete_icon = " <a href='delete-dept.php?id={$dept}' id='bin' class='btn-sm btn-primary'> <span ><i class='fa fa-trash '></i></span> </a>";
               echo $edit_icon . $delete_icon;
             ?>
        </td>

    <?php 
            $i++;
            }
        }else{
        echo "No department found";
        }
    ?>
     </tr>
    </table>
    </div>
</div>

<?php 
    require_once "include/footer.php";
?>