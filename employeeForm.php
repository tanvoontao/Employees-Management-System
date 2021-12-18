
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
        <form method="POST" class="row p-3 blue_bg addEmployeeForm" enctype="multipart/form-data">

            <div class="col">
                <div class="row">
                    <div class="notification close">
                        <p id="notice">
                            <span><i class='bx bxs-check-circle'></i></span>
                            Record is saved!
                        </p>
                        <p id="notification" onclick="closeModal()"><i class='bx bx-x'></i></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col grey_bg my-2">

                        <div class="row p-2">
                            <h2>Personal Information</h2>
                            <hr/>

                            <div class="col-md-4">

                                <!-- Profile Image -->
                                <span class="inputHeading">Profile Image: <span class="error"></span></span>
                                <div class="upload_profile_area">
                                    <!--<img class="img_thumbnail" src="images/profile.jpeg"/>-->
                                    <div class="icon"><i class='bx bx-cloud-upload'></i></div>
                                    <p class="dragText">Click to upload your profile</p>
                                </div>
                                <input type="file" id="profile_img" name="employee_profile"  class="image_input"  />
                                
                            </div>

                            




                            <div class="col-md-8 inputForm">
                                <div class="group_form_input">

                                    <!-- Name -->
                                    <div class="inputText">
                                        <input type="text" id="employee_name" name="employee_name"/>
                                        <span></span>
                                        <label for="employee_name">👔 Name <span class="error"></span></label>
                                    </div>
                                    



                                    <!-- Gender -->
                                    <div>
                                        <label class="inputHeading" id="employee_gender">🧑‍🤝‍🧑 Gender: <span class="error"></span></label>
                                        
                                        <input type="radio" id="employee_gender_male" name="employee_gender" value="Male" />
                                        <label for="employee_gender_male"> Male </label>

                                        <input type="radio" id="employee_gender_female" name="employee_gender" value="Female"/>
                                        <label for="employee_gender_female"> Female </label>
                                    </div>
                                </div>


                                <!-- Address -->
                                <div>
                                    <label for="employee_address" class="inputHeading">🏠 Address: <span class="error"></span></label><br/>
                                    <textarea id="employee_address" name="employee_address" >Your address...</textarea>
                                </div>



                                <div class="group_form_input">

                                    <!-- Email -->
                                    <div class="inputText">
                                        <input type="text" id="employee_email" name="employee_email"  />
                                        <span></span>
                                        <label for="employee_email">📧 Email <span class="error"></span></label>

                                    </div>

                                    <!-- DOB -->
                                    <div>
                                        <label class="inputHeading">🎂 Date of birth: <span class="error"></span></label>
                                        <input type="date" name="employee_dob" id="employee_dob" />
                                        
                                    </div>
                                </div>
                                


                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col grey_bg my-2">

                        <div class="row p-2">
                            <h2>Job Information</h2>
                            <hr/>


                            <div class="col mx-0">
                                <div class="group_form_input">


                                    <!-- Staff ID -->
                                    <div class="inputText">
                                        <input type="text" id="staff_id" name="staff_id" placeholder="SID0001F"/>
                                        <span></span>
                                        <label for="staff_id">🆔 Staff ID <span class="error"></span></label>

                                    </div>


                                    <!-- Department -->
                                    <div>
                                        <label for="employee_department" class="inputHeading">🏬 Department: <span class="error"></span></label>
                                        <select name="employee_department" id="employee_department" >
                                            <option value="">Choose option</option>
                                            <option value="IT Support">IT Support</option>
                                            <option value="Finance">Finance</option>
                                            <option value="Sales">Sales</option>
                                            <option value="Operation">Operation</option>
                                            <option value="Marketing">Marketing</option>
                                            
                                        </select>
                                    </div>


                                    <!-- Position -->
                                    <div>
                                        <label class="inputHeading">🧘‍♂️ Position: <span class="error"></span></label><br/>
                                            
                                        <input type="radio" id="fullTimePosition" name="employee_position" value="Full Time" >
                                        <label for="fullTimePosition"> Full Time </label>

                                        <input type="radio" id="partTimePosition" name="employee_position" value="Part Time">
                                        <label for="partTimePosition"> Part Time </label>

                                        <input type="radio" id="contractPosition" name="employee_position" value="Contract">
                                        <label for="contractPosition"> Contract </label>

                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>

                <div class="row form_btn">
                    <button type="reset" class="cancel_btn">Reset</button>

                    <button type="submit" id="submit_btn">Add</button>
                </div>
            </div>


            

            
        </form>

    </div>
</article>

<script src="javascript/nav.js"></script>

<!-- Bootstrap Jquery library -->
</body>
</html>