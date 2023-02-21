<?php 
    require_once "include/header.php";
    
?>

<?php 
 
//  database connection
require_once "../connection.php";

$sql = "SELECT * FROM salesdata ORDER BY SerialNo";
$result = mysqli_query($conn , $sql);

$i = 1;
$you = "";


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
    <div class='text-center pb-2'><h4>Sales Data</h4></div>
    <table style="width:100%" class="table table-responsive-lg table-bordered table-hover text-center ">
    <tr class="bg-dark">
        <th>Serial No</th>
        <th>Month - Year</th>
        <th>Domestic Market(in Tonnes)</th>
        <th>Export(in Tonnes)</th>
        <th>Action</th>
    </tr>
    <?php 
    
    if( mysqli_num_rows($result) > 0){
        while( $rows = mysqli_fetch_assoc($result) ){
            $Sno=$rows["SerialNo"];
            $month= $rows["Month"];
            $exp= $rows["Domestic Market (in tonnes)"];
            $rev= $rows["Export (in tonnes)"];
            ?>
        <tr>
        <td><?php echo $Sno; ?></td>
        <td><?php echo $month; ?></td>
        <td><?php echo $exp; ?></td>
        <td><?php echo $rev; ?></td>
        <td> <?php 
               $edit_icon = "<a href='edit-sales.php? id={$Sno}' class='btn-sm btn-primary  ml-3 editicon'> <span ><i class='fa fa-edit '></i></span> </a>";
               $delete_icon = " <a href='delete-sales.php?id={$Sno}' id='bin' class='btn-sm btn-primary editicon'> <span ><i class='fa fa-trash '></i></span> </a>";
               echo $edit_icon . $delete_icon;
             ?>
        </td>

    <?php 
            $i++;
            }
        }else{
        echo "no minesdata found";
        }
    ?>
     </tr>
    </table>
    </div>
</div>

<?php 
    require_once "include/footer.php";
?>