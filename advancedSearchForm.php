<!DOCTYPE html>
<html lang="en">

<?php include("include/HeadTagTemplate.php"); ?>

<body>

<header class="dashboard_sidebar closeNav">
    <?php include("include/navBar.php"); ?>
</header>

<article>
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col">
                <h1>Welcome to Employees Management System! 👋</h1>
            </div>
            
        </div>
        
    </div>

    <hr/>

    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-lg-8 ">
                <div class="blue_bg p-3 m-2">
                    <div class="search_area">
                    <form method="GET" id="searchForm">
                        <div class="searchForm" >
                            <input type="text" placeholder="Search by..." name="search_word">
                            <button type="submit"><i class='bx bx-search-alt'></i></button>


                        </div>
                        
                        
                        <select name="searchByList" id="searchByList" >
                            <option value="">Choose option</option>
                            <option value="StaffName" selected>Staff Name</option>
                            <option value="Department">Department</option>
                            <option value="Position">Position</option>
                            
                        </select>


                    </form>

                    </div>
                    


                    <div class="search_result_employee">
                        <?php include("include/searchedResult.php"); ?>
                    </div>
                    
                </div>
                
            </div>
            <?php include("include/statistic.php"); ?>

            
            <div class="col-lg-4 ">
                <div class="blue_bg p-3 m-2">
                    <p class="grey_word big">Statistic</p>
                    <div class="row">
                        <div class="col test">
                            <div class="testsss">
                            <div class="circle">
                                <p><?php echo $totalEmployee; ?><br/><span>people</span></p>

                            </div>
                            </div>
                            
                        </div>
                    </div>

                    <hr/>

                    <p class="grey_word big">Total Job</p>

                    <div class="row my-2">
                        <div class="col-lg m-2 p-3 black_bg">
                            <p>Total</p>
                            <p><?php echo $totalEmployee; ?></p>
                        </div>

                        <div class="col-lg m-2 p-3 black_bg">
                            <p>Full Time</p>
                            <p><?php echo $totalFullTimeEmployee; ?></p>
                        </div>

                    </div>
                    <div class="row my-2">
                        <div class="col-lg m-2 p-3 black_bg">
                            <p>Part Time</p>
                            <p><?php echo $totalPartTimeEmployee; ?></p>
                        </div>

                        <div class="col-lg m-2 p-3 black_bg">
                            <p>Contract</p>
                            <p><?php echo $totalContractEmployee; ?></p>
                        </div>

                    </div>
                        
                </div>
            </div>
        </div>
    </div>


</article>

<script src="javascript/nav.js"></script>

</body>
</html>