<?php 
    session_start();
    if( empty($_SESSION["email"]) ){
        header("Location: ./login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> MineIt</title>
    
    <link href="../resorce/css/style.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>

</head>

<body> 

    <!--Main wrapper start-->
    <div id="main-wrapper">

        <!--Nav header start-->
        <div class="nav-header">
             <div class="brand-logo">
                <a>
                    <span class="brand-title"><strong style="color:black; font-size:30px;">MineIt</strong></span>
                </a>
            </div> 
        </div>
        <!--Nav header end-->

        <!-- header -->
        <div class="header">  
            <div class="header-content">   
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="text-center">
                    <h2 class="pt-3">ADMIN DASHBOARD</h2>
                </div>    
            </div>
        </div>
        <!-- Header end -->

        <!-- Sidebar -->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                   <br> <br>       
                    <li>
                        <a href="./dashboard.php"  >
                            <i class="icon-home menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>


                    <li>
                    <a class="has-arrow" href="javascript:void()">
                            <i class="fa fa-address-card-o menu-icon"></i><span class="nav-text">Employee</span>
                        </a>
                        <ul>
                            <li><a href="./add-employee.php"> <i class="icon-plus menu-icon"></i><span class="nav-text">Add Employee</span></a></li>
                            <li><a href="./manage-employee.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">View Employees</span></a></li>
                            <li><a href="./manage-leave.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">Manage Employee Leave</span></a></li>

                        </ul>
                    </li>

                    <li>
                    <a class="has-arrow" href="javascript:void()">
                            <i class="fa fa-address-card-o menu-icon"></i><span class="nav-text">Department</span>
                        </a>
                        <ul>
                            <li><a href="./add-dept.php"> <i class="icon-plus menu-icon"></i><span class="nav-text">Add Department</span></a></li>
                            <li><a href="./manage-dept.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">Manage Departments</span></a></li>
                        </ul>
                    </li>

                    
                    <li>
                    <a class="has-arrow" href="javascript:void()">
                            <i class="fa fa-address-card-o menu-icon"></i><span class="nav-text">Mining</span>
                        </a>
                        <ul>
                            <li><a href="./minesdata.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">View Mining data</span></a></li>
                            <li><a href="./add mines.php"> <i class="icon-plus menu-icon"></i><span class="nav-text">Add Mining data</span></a></li>
                            <li><a href="./minesemp.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">View Employees</span></a></li>
                        </ul>
                    </li>
                    
                    <li>
                    <a class="has-arrow" href="javascript:void()">
                            <i class="fa fa-address-card-o menu-icon"></i><span class="nav-text">Finance</span>
                        </a>
                        <ul>
                            <li><a href="./financedata.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">View Finance data</span></a></li>
                            <li><a href="./add finance.php"> <i class="icon-plus menu-icon"></i><span class="nav-text">Add Finance data</span></a></li>
                            <li><a href="./financeemp.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">View Employees</span></a></li>
                           
                        </ul>
                    </li>

                    <li>
                    <a class="has-arrow" href="javascript:void()">
                            <i class="fa fa-address-card-o menu-icon"></i><span class="nav-text">Environment</span>
                        </a>
                        <ul>
                            <li><a href="./environmentdata.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">View Environment data</span></a></li>
                            <li><a href="./add envi.php"> <i class="icon-plus menu-icon"></i><span class="nav-text">Add Environment data</span></a></li>
                            <li><a href="./environmentemp.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">View Employees</span></a></li>
                        </ul>
                    </li>

                    <li>
                    <a class="has-arrow" href="javascript:void()">
                            <i class="fa fa-address-card-o menu-icon"></i><span class="nav-text">Sales</span>
                        </a>
                        <ul>
                            <li><a href="./salesdata.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">View Sales data</span></a></li>
                            <li><a href="./add sales.php"> <i class="icon-plus menu-icon"></i><span class="nav-text">Add Sales data</span></a></li>
                            <li><a href="./salesemp.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">View Employees</span></a></li>
                        </ul>
                    </li>

                    <li>
                    <a class="has-arrow" href="javascript:void()">
                            <i class="fa fa-address-card-o menu-icon"></i><span class="nav-text">Geology</span>
                        </a>
                        <ul>
                            <li><a href="./geologydata.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">View Geology data</span></a></li>
                            <li><a href="./add geology.php"> <i class="icon-plus menu-icon"></i><span class="nav-text">Add Geology data</span></a></li>
                            <li><a href="./geologyemp.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">View Employees</span></a></li>
                        </ul>
                    </li>

                    <li>
                    <a class="has-arrow" href="javascript:void()">
                            <i class="fa fa-address-card-o menu-icon"></i><span class="nav-text">Admin</span>
                        </a>
                        <ul>
                            <li><a href="./add-admin.php"> <i class="icon-plus menu-icon"></i><span class="nav-text">Add Admin</span></a></li>
                            <li><a href="./manage-admin.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">Manage Admins</span></a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="./logout.php" >
                            <i class="icon-logout menu-icon"></i><span class="nav-text">Logout</span>
                        </a>
                    </li>                
                </ul>
            </div>
        </div>
        <!-- Sidebar end-->

        <!--Content body start-->
        <div class="content-body">


        <!-- modal - bootstrap -->
        <div class="modal fade" id="showModal" data-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div id="modalHead" class="modal-header">
                    <button id="modal_cross_btn" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span  aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="addMsg" class="text-center font-weight-bold"></p>
                </div>
                <div class="modal-footer ">
                    <div class="mx-auto">
                        <a type="button" id="linkBtn" href="#" class="btn btn-primary" ></a>
                        <a type="button" id="closeBtn" href="#" data-dismiss="modal" class="btn btn-primary">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>