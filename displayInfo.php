<!DOCTYPE html>
<html lang="en">

<?php include("include/HeadTagTemplate.php"); ?>

<body>

<header class="dashboard_sidebar closeNav">
    <?php include("include/navBar.php"); ?>
</header>

<article>
    <?php
        $name = $_GET['name'];
        $directoryEmployees = "data/employees.txt";
        if (file_exists($directoryEmployees)){
            $employees = file($directoryEmployees); // get employees array
            
            foreach($employees as $employee){

                $employees = file($directoryEmployees);
                $employee = explode("| ", $employee); // get employee array
                $eName = $employee[0];
                if ( stripos($eName, $name) !== false ){
                    $eGender = $employee[1];
                    $eAddress = $employee[2];
                    $eEmail = $employee[3];
                    $eDob = $employee[4];
                    $eAge = $employee[5];
                    $eStaffID = $employee[6];
                    $eDepartment = $employee[7];
                    $ePosition = $employee[8];
                    $eProfile = $employee[9];
                    break;
                }
            }
        }else{
            echo "<p>no such file. error.</p>";
        }
    ?>
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col">
                <h1>Welcome to Employees Management System! 👋</h1>
            </div>
        </div>
    </div>

    <hr/>

    <div class="container-fluid pt-3">
        <div class="row ">
            <div class="col-lg-4 ">
                <div class="blue_bg p-3 m-2">
                    <div class="employeeDetailCard">
                        <img src="employeesProfile/<?php echo $eProfile;?>" alt="profile" class="profile"/>
                            <p><?php echo $eName;?><br/>
                            <span><?php echo $eStaffID;?></span></p>
                    </div>
                    <hr class="grey_line"/>

                    <div class="eJob">
                        <p class="heading">Applied Job</p>
                        <div class="grey_bg p-2">
                            <p class="jobDetails">
                            <?php echo $eDepartment;?> &bull; 
                                <span><?php echo $ePosition;?></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 ">
                <div class="blue_bg p-3 m-2">
                    <p class="heading">Personal Details</p>
                    <div class="row my-2">
                        <div class="col-lg">
                            <p class="grey_word">Name:</p>
                            <p class="grey_word strong"><?php echo $eName;?></p>

                        </div>
                        <div class="col-lg">
                            <p class="grey_word">Age:</p>
                            <p class="grey_word strong"><?php echo $eAge;?></p>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-lg">
                            <p class="grey_word">Gender:</p>
                            <p class="grey_word strong"><?php echo $eGender;?></p>

                        </div>
                        <div class="col-lg">
                            <p class="grey_word">Date of birth:</p>
                            <p class="grey_word strong"><?php echo $eDob;?></p>
                        </div>
                    </div>

                    <hr class="grey_line"/>

                    <p class="heading">Contact Details</p>

                    <p class="grey_word">Email: <span class="grey_word strong"><?php echo $eEmail;?></span></p>
                    <p class="grey_word">Address: <span class="grey_word strong"><?php echo $eAddress;?></span></p>
                </div>
            </div>
        </div>
    </div>


</article>

<script src="javascript/nav.js"></script>

</body>
</html>