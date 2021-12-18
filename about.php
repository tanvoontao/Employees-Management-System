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

    <div class="row">
        <div class="col ">
            <div class="blue_bg p-3 m-2">
                <p class="grey_word big">The PHP Version used is <?php echo phpversion(); ?>.</p>

                <p class="grey_word big">Task Listed</p>
                <div class="table-responsive-md">
                    <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Task</th>
                            <th scope="col">Description</th>
                            <th scope="col">Degree of Completion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>
                                <p class="grey_word midle"><strong class="orange_word">Process Add Employee Page</strong> (index.php)</p>
                                <ul>
                                    <li>Page contains information shown in screenshot</li>
                                    <li>Links are working and using relative addressing</li>
                                </ul>
                            </td>
                            <td>
                                <p>✔️ Statement</p>
                                <p>✔️ Real profile image</p>
                                <p>✔️ Name, Student id, student email address</p>
                                <p>✔️ All links are provided at the <strong class="orange_word"> side bar menu</strong> and using relative addressing</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>
                                <p class="grey_word midle"><strong class="orange_word">Process Add Employee Page</strong> (employeeForm.php)</p>
                                <ul>
                                    <li>Form contains all information shown in screenshot</li>
                                    <li>Date field contains the server date</li>
                                    <li>Web page using the POST method</li>
                                    <li>Links are working and using relative addressing</li>
                                </ul>
                            </td>
                            <td>
                                <p>✔️ All form input properly implement</p>
                                <p>✔️ Date field contains the server date</p>
                                <p>
                                    ✔️ ⭐ POST Method: under <strong class="orange_word">javascript/nav.js, line 54</strong>. 
                                    All the $_POST and $_FILES will send to <strong class="orange_word">run.php (which act as main program for OOP)</strong> to process.
                                </p>
                                <p>✔️ All links are provided at the <strong class="orange_word"> side bar menu</strong> and using relative addressing</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>
                                <p class="grey_word midle"><strong class="orange_word">Process Add Employee Page</strong> (employeeprocess.php)</p>
                                <ul>
                                    <li>Directory/file existence checked before directory creation</li>
                                    <li>Directory created using the correct path</li>
                                    <li>Data saved with appropriate delimiter and line break</li>
                                    <li>File opened and closed properly</li>
                                    <li>Input data validated</li>
                                    <li>Position ID is verified to be unique</li>
                                    <li>Appropriate error messages generated if errors occur</li>
                                    <li>Links are working and using relative addressing</li>
                                </ul>
                            </td>
                            <td>
                                <p>✔️ ⭐ Directory/file existence checked before directory creation: under <strong class="orange_word">employeeprocess.php, line 245</strong> in a function called 'AddEmployee()' </p>
                                <p>✔️ ⭐ Directory created using the correct path：under <strong class="orange_word">employeeprocess.php, line 211</strong> in a function called 'AddEmployee()' </p>
                                <p>✔️ ⭐ Data saved with appropriate delimiter and line break: under <strong class="orange_word">employeeprocess.php, line 231</strong> in a function called 'AddEmployee()'</p>
                                <p>✔️ ⭐ File opened and closed properly: under <strong class="orange_word">employeeprocess.php, line 255</strong> in a function called 'saveTxtFile()'</p>
                                <p>✔️ Input data validated: under <strong class="orange_word">employeeprocess.php, line 3, class userValidator</strong>.<br/>Step to understand the validation process: <strong class="orange_word">javascript/nav.js, line 55 ➡️ run.php, line 10 ➡️ employeeprocess.php</strong></p>
                                <p>✔️ ⭐ Position ID is verified to be unique: under <strong class="orange_word">employeeprocess.php, line 120, a function called 'isSIDok()'</strong></p>
                                <p>✔️ ⭐ Error generated: under <strong class="orange_word">employeeprocess.php, line 3, class userValidator</strong></p>
                                <p>✔️ All links are provided at the <strong class="orange_word"> side bar menu</strong> and using relative addressing</p>
                                
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">4</th>
                            <td>
                                <p class="grey_word midle"><strong>Search Employee Form Page</strong> (searchForm.php)</p>
                                <ul>
                                    <li>Form contains information similar to the screenshot</li>
                                    <li>Web page using the GET method</li>
                                    <li>Links are working and using relative addressing</li>
                                </ul>
                            </td>
                            <td>
                                <p>✔️ Input text field for entering staff name</p>
                                <p>✔️ ⭐ GET Method: under <strong class="orange_word">javascript/nav.js, line 177</strong>.</p>
                                <p>✔️ All links are provided at the <strong class="orange_word"> side bar menu</strong> and using relative addressing</p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">5</th>
                            <td>
                                <p class="grey_word midle"><strong>Process Search Employee Page</strong> (employeeprocess.php)</p>
                                <ul>
                                    <li>Search string and file existence validated</li>
                                    <li>Search performed correctly and result listed correctly</li>
                                    <li>File opened and closed properly</li>
                                    <li>Appropriate error messages generated if errors occur</li>
                                    <li>Links are working and using relative addressing</li>
                                    <li>Employee’s information is displayed correctly</li>
                                </ul>
                            </td>
                            <td>
                                <p>⭐ Step: <strong class="orange_word">javascript/nav.js, line 171 ➡️ run.php, line 25 ➡️ employee.php, line 272 ➡️ return results to ajax</strong></p>
                                <p>✔️ ⭐ Search string and file existence validated: under <strong class="orange_word">employeeprocess.php, line 272</strong>. </p>
                                <p>✔️ ⭐ If search performed correctly: <strong class="orange_word"> javascript/nav.js, line 205 will load the php page ➡️ include/searchResult.php, start from line 60 </strong></p>
                                <p>✔️ ⭐ File opened and closed properly：under <strong class="orange_word">employeeprocess.php, line 286 using built-in file() function</strong></p>
                                <p>✔️ ⭐ Appropriate error messages generated if errors occur: under <strong class="orange_word">include/searchedResult.php, line 16 (first load this page, if file not existed, do not show at the first time) OR employeeprocess.php, line 308 (if no file existed while first search, then return empty array, means no result)</strong></p>
                                <p>✔️ All links are provided at the <strong class="orange_word"> side bar menu</strong> and using relative addressing</p>
                                <p>✔️ ⭐ Employee’s information is displayed correctly: <strong class="orange_word">displayInfo.php using GET Method</strong> </p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">6</th>
                            <td>
                                <p class="grey_word midle"><strong>About Page</strong> (about.php)</p>
                                <ul>
                                    <li>All questions answered</li>
                                    <li>Links are working and using relative addressing</li>
                                </ul>
                            </td>
                            <td>
                                <p>✔️ All questions answere</p>
                                <p>✔️ All links are provided at the <strong class="orange_word"> side bar menu</strong> and using relative addressing</p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">7</th>
                            <td>
                                <p class="grey_word midle"><strong>Advanced Search Employee Page</strong> (advancedSearchForm.php)</p>
                                <ul>
                                    <li>By Staff Name</li>
                                    <li>By Position</li>
                                    <li>By Department</li>
                                    <li>Appropriate error messages generated if errors occur</li>
                                </ul>
                            </td>
                            <td>
                                <p>✔️ Search by department, position</p>
                                <p>✔️ Appropriate error messages generated if errors occur: under <strong class="orange_word">(run.php call) employeeprocess.php, line 279 & 281 (go back to nav.js, line 195)</strong></p>
                            </td>
                        </tr>
                    </tbody>
                    </table>
                </div>

                <p class="grey_word big">Extra Special Feature</p>
                <div class="table-responsive-md">
                    <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Extra feature</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">File upload - employee profile (employeeForm.php)</th>

                            <td>
                                <p>✔️ File type validation</p>
                                <p>✔️ upload image to folder: employessimage/</p>
                                <p>✔️ unique image name generated</p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">Sorting (searchForm.php)</th>
                            <td>
                                <p>✔️ sort in ascending and descending order using ajax Post method: javascript/nav.js, line 238 & searchResult.php, line 19 (sort 2 dimensional array)</p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">Showing statistic (searchForm.php & advancedSearchForm.php)</th>
                            <td>
                                <p>✔️ calculate the total of employees, and the total of full time, part time and contract</p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">Display error/search results without refresh the page</th>
                            <td>
                                <p>✔️ using Ajax</p>
                            </td>
                        </tr>


                    </tbody>
                    </table>
                </div>
            </div>
    </div>
    </div>


</article>

<script src="javascript/nav.js"></script>
</body>
</html>