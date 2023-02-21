<?php 
    require_once "include/header.php";
?>

<?php 
 
//  database connection
require_once "../connection.php";

$sql = "SELECT * FROM employee order by salary desc";
$result = mysqli_query($conn , $sql);

$i = 1;
?>

<style>
table, th, td {
  border: 1px solid black;
  padding: 15px;
}
table {
  border-spacing: 10px;
}
</style>

<div class="container bg-white shadow">
    <div class="py-4 mt-5"> 
    <div class='text-center pb-2'><h4>Employees</h4></div>
    <table style="width:100%" class="table table-responsive-lg table-bordered table-hover text-center ">
    <tr class="bg-dark">
        <th>Emp Id</th>
        <th>Name</th>
        <th>Email</th> 
        <th>Gender</th>
        <th>Date of Birth</th>
        <th>Hire date</th>
        <th>Designation</th>
        <th>Salary</th>
        <th>Address</th>
        <th>Action</th>
    </tr>
    <?php 
    
    if( mysqli_num_rows($result) > 0){
        while( $rows = mysqli_fetch_assoc($result) ){
            $name= $rows["ename"];
            $email= $rows["email"];
            $dob = $rows["dob"];
            $gender = $rows["gender"];
            $id = $rows["eid"];
            $salary = $rows["salary"];
            
            $dob = date('d-m-Y' , strtotime($dob));
            $date1=date_create($dob);
            $date2=date_create("now");
            $diff=date_diff($date1,$date2);
            $age = $diff->format("%Y"); 

            $jobs = $rows["job"];
 
            $address = $rows["addresses"];
            $hire = $rows["hiredate"];
            $hire = date('d-m-Y' , strtotime($hire));

            ?>
        <tr>
        <td><?php echo $id; ?></td>
        <td> <?php echo $name ; ?></td>
        <td><?php echo $email; ?></td>
        <td><?php echo $gender; ?></td>
        <td><?php echo $dob; ?></td>
        <td><?php echo $hire; ?></td>
        <td><?php echo $jobs; ?></td>
        <td><?php echo $salary; ?></td>
        <td><?php echo $address;?></td>

        <td>  <?php 
                $edit_icon = "<a href='edit-employee.php?id={$id}' class='btn-sm btn-primary'> <span ><i class='fa fa-edit '></i></span> </a>";
                $delete_icon = " <a href='delete-employee.php?id={$id}' id='bin' class='btn-sm btn-primary mt-3'> <span ><i class='fa fa-trash '></i></span> </a>";
                echo $edit_icon.$delete_icon;
             ?> 
        </td>
        

    <?php 
            $i++;
            }
        }else{
            echo "<script>
            $(document).ready( function(){
                $('#showModal').modal('show');
                $('#linkBtn').attr('href', 'add-employee.php');
                $('#linkBtn').text('Add Employee');
                $('#addMsg').text('No Employees Found!');
                $('#closeBtn').text('Remind Me Later!');
            })
         </script>
         ";
        }
    ?>
     </tr>
    </table>
    </div>
</div>

<?php 
    require_once "include/footer.php";
?>