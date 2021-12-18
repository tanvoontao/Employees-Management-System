<?php 

class UserValidator {
    // ---------- fields ---------- //
    private $data; 
    private $errors = []; // error: associative array 

    
    // ---------- constructor ---------- //
    public function __construct($post_data){
        $this->data = $post_data; // all $_POST variable: associative array
    }

    
    // ---------- methods ---------- //
    public function validateForm(){ // validate all form input value
        $this->iseNameOk();
        $this->iseGenderOk();
        $this->iseAddressOk();
        $this->iseEmailOk();
        $this->isDobOk();
        $this->iseDepartmentOk();
        $this->isePositionOk();
        $this->isSIDok();
        $this->iseProfileOk();
        return $this->errors;
    }

    private function val($eData){ // remove backslash, strim the data
        $eData = trim($eData);
        $eData = stripslashes($eData);
        $eData = htmlspecialchars($eData);
        return $eData;
    }

    private function addError($key, $val){ // add error to the associative array
        $this->errors[$key] = $val;
    }

    private function iseNameOk(){
        $val = $this->val($this->data['employee_name']); // remove unnecessary symbols

        if(empty($val)){
            $this->addError('employee_name', '*Cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z ]{0,20}$/', $val)){
                $this->addError('employee_name','*Only alphabets, whitespace, and 20 characters allowed');
            }
        }
    }

    private function iseGenderOk(){
        $val = $this->val($this->data['employee_gender']); // remove unnecessary symbols
        if ($val == "undefined") {
            $this->addError('employee_gender', '*Cannot be empty');
        }
    }

    private function iseAddressOk(){
        $val = $this->val($this->data['employee_address']); // remove unnecessary symbols
        if (empty($val)) {
            $this->addError('employee_address', '*Cannot be empty');
        }else{
            if(!preg_match('/^[\w .,()-]{0,100}+$/', $val)){
                $this->addError('employee_address','Invalid address. 100 characters allowed and do include symbols');
            }
        }
    }

    private function iseEmailOk(){
        $val = $this->val($this->data['employee_email']); // remove unnecessary symbols
        if(empty($val)){
            $this->addError('employee_email', '*Cannot be empty');
        }else{
            if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
                $this->addError('employee_email', '*Invalid email address');
            }
        }
    }

    private function isDobOk(){
        $val = $this->val($this->data['employee_dob']);
        $date_now = date("Y-m-d"); // get current date
        if(empty($val)){
            $this->addError('employee_dob', '*Cannot be empty');
        }else{
            if ($date_now < $val) { // if greater than current date
                $this->addError('employee_dob', '*Invalid date');
            }else{

                // convert to date time object
                $val = date_create($val);
                $date_now = date_create($date_now);

                // calculate the different
                $age = date_diff($val,$date_now);
                $age = $age->y; // get the number of years
                if ($age < 20){
                    $this->addError('employee_dob', '*Input denied. Under age');
                }
            }
        }
        
    }

    private function iseDepartmentOk(){
        $val = $this->val($this->data['employee_department']);
        if (empty($val)){
            $this->addError('employee_department', '*Cannot be empty');
        }
    }

    private function isePositionOk(){
        $val = $this->val($this->data['employee_position']); // remove unnecessary symbols
        if ($val == "undefined" || empty($val)) {
            $this->addError('employee_position', '*Cannot be empty');
        }
    }

    private function isSIDok(){
        $directoryEmployees = "data/employees.txt";

        $val = $this->val($this->data['staff_id']); // remove unnecessary symbols
        if (empty($val)){
            $this->addError('staff_id', '*Cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z0-9]{8}$/', $val)){
                $this->addError('staff_id', 'Invalid staff id');
            }else{

                
                
                if (substr($val,0,3) != "SID"){
                    $this->addError('staff_id', 'Must start with an uppercase "SID"');
                }else if(!is_numeric(substr($val,3,-1))){
                    $this->addError('staff_id', 'Must contain 4 digit id');
                }else if( (substr($this->data['employee_department'], 0, 1)) != substr($val, -1) ){
                    $this->addError('staff_id', 'Must end with the department code');
                }else{
                    if (file_exists($directoryEmployees)){ 
                        $filecontent = file_get_contents($directoryEmployees); // get all the contents
                        if(strpos($filecontent, $val) !== false){ // if there is no repeated same ID
                            $this->addError('staff_id', 'Please enter an unique ID');
                        }
                    }
                }
            }
        }
        
    }


    private function iseProfileOk(){
        $types = ["image/jpeg", "image/jpg", "image/png"]; // valid img ext 

        $val = $this->data['employee_profile_ext']; // get img extension 

        if(empty($val)){
            $this->addError('employee_profile_ext', '*Cannot be empty');
        }else{
            if(in_array($val, $types) === false){ // if not a valid img type
                $this->addError('employee_profile_ext', 'Please upload an image file - jpeg, png, jpg');
            }
        }
    }
        
}

class Employee {
    // ---------- fields ---------- //
    private $data;
    private $profileImg;
    

    // ---------- constructor ---------- //
    public function __construct($post_data, $profileImg){
        $this->data = $post_data; // all $_POST variable
        $this->profileImg = $profileImg; // all $_FILES variable
    }
      
    public function getDetails() { // getter for employee details, these are $_POST variable
        return $this->data;
    }

    public function getProfileImg(){ // getter for profile img, these are $_FILES variable
        return $this->profileImg;
    }

    

    
}

class Admin{
    // ---------- fields ---------- //
    private $employees; // admin get a list of employees
    private $searchedEmployees = [];


    // ---------- constructor ---------- //
    public function __construct(){
        $this->employees = array();
    }


    // ---------- methods ---------- //
    public function AddEmployee($employee){ // add employee to txt file
        array_push($this->employees, $employee); // append employee into array

        foreach ($this->employees as $employee){ // foreach loop here is to ensure if Add multiple employees at once in the future
            $directoryEmployees = "data/employees.txt"; // directory for the txt file

            $employeeDetails = $employee->getDetails(); // getter for employee details
            $employeeProfile = $employee->getProfileImg(); // getter for employee profile
            $tmp_name = $employeeProfile['employee_profile']['tmp_name']; // get the temperature name which ltr use to upload into folder called: employeesProfile


            // ---------- unique name for profile img ---------- //
            $time = time();
            $new_img_name = $time.$employeeProfile['employee_profile']['name']; // get new img name using time thus it will not have repeated img name inside folder while storing

            move_uploaded_file($tmp_name,"employeesProfile/".$new_img_name); // upload image to this directory: "employeesProfile/ followed by the new img name"

            $val = date_create($employeeDetails['employee_dob']);
            $date_now = date_create(date("Y-m-d"));

            // calculate the different
            $age = date_diff($val,$date_now);
            $age = $age->y; // get the number of years
      
            $data = $employeeDetails['employee_name'] . "| " .
                    $employeeDetails['employee_gender'] . "| " .
                    $employeeDetails['employee_address'] . "| " .
                    $employeeDetails['employee_email'] . "| " .
                    $employeeDetails['employee_dob'] . "| " .
                    $age . "| " .
                    $employeeDetails['staff_id'] . "| " .
                    $employeeDetails['employee_department'] . "| " .
                    $employeeDetails['employee_position'] . "| " .
                    $new_img_name . "\n";

            $data = addslashes($data);


            if ( file_exists($directoryEmployees) ){
                $this->saveTxtFile($directoryEmployees, $data);  
            }else{
                mkdir("data");
                $this->saveTxtFile($directoryEmployees, $data);  
            }
   
        }
    }

    private function saveTxtFile($directoryEmployees, $data){ // save data into txt file
        $handle = fopen($directoryEmployees, "a");

        if (is_writable($directoryEmployees)){
            fwrite($handle, $data);
            fclose($handle);
        }else{
            echo "The file is not writable.";
        }
    }

    

    private function addSearchedEmployee($eDetails){ // add search results (the employee) to the associative array
        array_push($this->searchedEmployees, $eDetails);
    }

    public function SearchEmployee($search_word, $searchBy = ""){ // search employee
        $directoryEmployees = "data/employees.txt"; // directory for the txt file
        $search_word = strtolower($search_word);

        $departments = ["it support", "finance", "sales", "operations", "marketing"]; // valid department
        $positions = ["full time", "part time", "contract"]; // valid position

        if($searchBy == "Department" && !in_array($search_word, $departments)){
            echo "Derror";
        }else if($searchBy == "Position" && !in_array($search_word, $positions)){
            echo "Perror";
        }else{
            if ( file_exists($directoryEmployees) ){
    
                $employees = file($directoryEmployees); // get employees array
                foreach($employees as $employee){
                    $employee = explode("| ", $employee); // get employee array
                    $eName = $employee[0];
                    $eDepartment = $employee[7];
                    $ePosition = $employee[8];
                    $eProfile = end($employee);
                    $eProfile = str_replace("\n", "", $eProfile);
                    $eDetails = array($eName, $eDepartment, $eProfile);
                    
                    if ($searchBy == "Department" && stripos($eDepartment, $search_word) !== false){
                        $this->addSearchedEmployee($eDetails);
                    }else if($searchBy == "Position" && stripos($ePosition, $search_word) !== false){
                        $this->addSearchedEmployee($eDetails);
                    }else{
                        if ( stripos($eName, $search_word) !== false ){ // stripos - non sensitive 
                            $this->addSearchedEmployee($eDetails);
                        }
                    }
                    
    
                }
                return $this->searchedEmployees; // return results
            }else{
                return $this->searchedEmployees; // no data return empty array
            }
        }

        
        
        
        
        
    }
}

?>