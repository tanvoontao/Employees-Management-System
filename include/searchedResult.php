<?php


if ((!isset($_POST['result'])) || (isset($_POST['sort']))){

    
    if (isset($_POST['sort'])){
        $directoryEmployees = "../data/employees.txt"; // directory for the txt file
    }else{
        $directoryEmployees = "data/employees.txt"; // directory for the txt file
    }
    // References: https://stackoverflow.com/questions/69433225/jquery-load-cant-load-php-page-with-text-file/69433439#69433439


    
    if ( file_exists($directoryEmployees) ){
        $array = file($directoryEmployees); // read and store in array

        if (isset($_POST['sort']) && $_POST['sort'] == "SORT_DESC"){ // sorting
            array_multisort($array, SORT_DESC);
        }else{
            array_multisort($array, SORT_ASC);
        }
        
    
        $row = intdiv(count($array), 4); // calculate to write no of elements
        if (count($array)%4 != 0){
            $row++;
        }
    
        $x = $z = 0;
        for ($x; $x < $row; $x++){
            echo '<div class="row my-4">';
            for ($y=0; $y <= 3; $y++){
                if (isset($array[$z])) {
                    $name = explode("| ", $array[$z]);
                    $eName = $name[0];
                    $eDepartment = $name[7];
                    $eProfile = end($name);
    
                    echo '
                    <div class="col-md">
                        <a href="displayInfo.php?name='."$eName".'" class="grey_bg p-2 m-1 employeeCard">
                            <img src="employeesProfile/'."$eProfile".'" alt="profile" class="profile"/>
                            '."$eName".'<br/>
                                <span>'."$eDepartment".'</span>
                        </a>
                    
                    </div>
                    ';
                }
                $z++;
                
            }
            echo '</div>';
        }
    }
    
}else{
    $results = json_decode($_POST['result']);
    array_multisort($results, SORT_ASC);

    $row = intdiv(count($results), 4);
    $count = count($results);

    if (count($results)%4 != 0){
        $row++;
    }
    $x = $z = 0;
    echo "<p class='results_no'>$count results found</p>";

    for ($x; $x < $row; $x++){
        echo '<div class="row my-4">';
        for ($y=0; $y <= 3; $y++){
            if (isset($results[$z])){
                $eName = $results[$z][0];
                $eDepartment = $results[$z][1];
                $eProfile = $results[$z][2];
    
                echo '
                <div class="col-md">
                    <a href="displayInfo.php?name='."$eName".'" class="grey_bg p-2 m-1 employeeCard">
                        <img src="employeesProfile/'."$eProfile".'" alt="profile" class="profile"/>
                        '."$eName".'<br/>
                            <span>'."$eDepartment".'</span>
                    </a>
                
                </div>
                ';
            }
            
            $z++;
            
        }
        echo '</div>';
    }
}

?>