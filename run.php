<?php
require('employeeProcess.php');

$errors = [];


if(isset($_POST['employee_name'])){
    // validate input data
    $validation = new UserValidator($_POST);
    $errors = $validation->validateForm();

    
    if (empty($errors)){ // if errors is empty --> save data to txt file
        $employeeDetails = new Employee($_POST, $_FILES);
        
        $admin = new Admin();
        $admin->AddEmployee($employeeDetails);

        echo json_encode($errors); // reply to ajax to let ajax know this is empty which means saved successfully
    }else{
        echo json_encode($errors);
    }
}

if ( isset($_GET['search_word']) ){
    $searchWord = $_GET['search_word'];
    $searchBy = $_GET['search_by_list'];
    $admin = new Admin();
    $results = $admin->SearchEmployee($searchWord, $searchBy);
    echo json_encode($results);
}
?>