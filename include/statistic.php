<?php
    $directoryEmployees = "data/employees.txt";
    if ( file_exists($directoryEmployees) ){
        $totalEmployee;
        $totalFullTimeEmployee = $totalPartTimeEmployee = $totalContractEmployee = 0;
        
        $employees = file($directoryEmployees); // get employees array
        $totalEmployee = count($employees);
        foreach($employees as $employee){
            $employee = explode("| ", $employee); // get employee array
            $ePosition = $employee[8];

            if(stripos($ePosition, "Full Time") !== false){
                $totalFullTimeEmployee += 1;
            }
            if(stripos($ePosition, "Part Time") !== false){
                $totalPartTimeEmployee += 1;
            }
            if(stripos($ePosition, "Contract") !== false){
                $totalContractEmployee += 1;
            }
            

        }


    }else{
        $totalEmployee = $totalFullTimeEmployee = $totalPartTimeEmployee = $totalContractEmployee = "unknown";
    }
?>