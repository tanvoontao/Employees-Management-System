let sidebar = document.querySelector(".dashboard_sidebar");
let closeBtn = document.querySelector("#menu_btn");

let errorObj = {};

function closeMenuq(){
    sidebar.classList.toggle("closeNav");
    menuBtnChange();
}



function menuBtnChange() {
    if(sidebar.classList.contains("closeNav")){
        closeBtn.classList.replace("bx-menu-alt-right","bx-menu");

    }else {
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
    }
}






// ---------- Add new employee ---------- //
$(document).on('submit', '.addEmployeeForm', function(e){
    
    e.preventDefault(); //  prevent refresh the page after click submit btn


    // prevent user from clicking the button again to avoid repeated data
    $("#submit_btn").text("Loading..."); 
    $("#submit_btn").attr("disabled", true);
    
    let data = new FormData(this)

    // ---------- append these because FormData won't include these input tag ---------- //
    data.append("employee_gender", $('input[name="employee_gender"]:checked').val());
    data.append("employee_position", $('input[name="employee_position"]:checked').val());
    
    if ($('input[type=file]')[0].files[0] != undefined){
        data.append("employee_profile_ext", $('input[type=file]')[0].files[0].type);
    }else{
        data.append("employee_profile_ext", "");
    }

    data.append('employee_profile', $('input[type=file]')[0].files[0]); 



    $.ajax({
        type: "POST",
        url: "run.php",

        // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        data: data,

        // The content type used when sending data to the server.
        contentType: false,

        // To unable request pages to be cached
        cache: false, 

        // To send DOMDocument or non processed data file it is set to false
        processData: false,
        
        success: function(response){

            $("#submit_btn").text("Add");
            $("#submit_btn").attr("disabled", false);

            console.log(response)
            errorObj = JSON.parse(response); // JSON here is to ensure it connvert to associative array which same as in the php
            console.log(errorObj)

            if (isEmpty(errorObj)){ // if error array is empty
                showNotice()
                //console.log("submit");
                notify(errorObj)
                $(".addEmployeeForm").trigger("reset"); // reset the form
            }else{
                notify(errorObj);
            }

            
            
            
        }
    });
});

function notify(errorObj){
    // syntas followed by: keyExist(errorObj, propertyName, element, closestElement)
    keyExist(errorObj, "employee_name", "#employee_name", ".inputText");
    keyExist(errorObj, "employee_gender", "#employee_gender", "div");
    keyExist(errorObj, "employee_address", "#employee_address", "div");
    keyExist(errorObj, "employee_email", "#employee_email", ".inputText");
    keyExist(errorObj, "employee_dob", "#employee_dob", "div");
    keyExist(errorObj, "employee_department", "#employee_department", "div");
    keyExist(errorObj, "employee_position", "#contractPosition", "div");
    keyExist(errorObj, "staff_id", "#staff_id", "div");
    keyExist(errorObj, "employee_profile_ext", "#profile_img", ".col-md-4");
}


function isEmpty(obj) {
    for(var key in obj) {
        if(obj.hasOwnProperty(key))
            return false;
    }
    return true;
}

function keyExist(errorObj, propertyName, element, closestElement){
    if(errorObj.hasOwnProperty(propertyName)){ // if got error, then display
        $(element).closest(closestElement).find(".error").text(errorObj[propertyName]);
    }else{ // if not, clear the error
        $(element).closest(closestElement).find(".error").text(" ");
    }
}

// reset the form via reset button will clear all the error also
$(document).on('click', '.addEmployeeForm .cancel_btn', function(e){
    notify(errorObj);
})


// help to preview image before upload
$(".upload_profile_area").on("click", function(){
    let area = $(this).closest(".col-md-4");
    let area2 = $(this);
    let img_Input = area.find("input");
    area.addClass("active");
    img_Input.click() // click the input file type

    let icon_Input = $(".icon", this);
    let text_Input = $(".dragText", this);

    icon_Input.css("display", "none");
    text_Input.css("display", "none");


    img_Input.change(function (){
        if (this.files && this.files[0]){
            var reader = new FileReader(); // web API to help preview image
            reader.onload = function (e){
                area.find(".img_thumbnail").remove();
                area2.append($('<img class="img_thumbnail" src="'+e.target.result+'"/>'));
            }
        }
        reader.readAsDataURL(this.files[0]);

    });
});


function closeModal(){
    let notification = document.querySelector(".notification");
    notification.classList.add("close");
}


function showNotice(){
    let notification = document.querySelector(".notification");
    notification.classList.remove("close");
}

// ---------- Search employee ---------- //
$(document).on('submit', '#searchForm', function(e){
    e.preventDefault(); //  prevent refresh the page after click submit btn
    let searchWord = $('#searchForm input[name="search_word"]').val();
    let searhByList = $('#searchForm option:selected').val();
    $(".search_result_employee").html("<p class='results_no'>Loading....</p")
    $.ajax({
        type: "GET",
        url: "run.php",

        // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        data: "search_word="+searchWord+'&'+"search_by_list="+searhByList,

        // The content type used when sending data to the server.
        contentType: false,

        // To unable request pages to be cached
        cache: false, 

        // To send DOMDocument or non processed data file it is set to false
        processData: false,
        
        success: function(response){
            

            if (response == "Derrornull"){ // if not valid department
                $(".search_result_employee").html("<p class='results_no'>Invalid department. Please enter the existing department.</p><ul class='results_no'><li>Marketing</li><li>Sales</li><li>Operations</li><li>Finance</li><li>IT Support</li></ul>");
            }else if(response == "Perrornull"){ // if not valid position
                $(".search_result_employee").html("<p class='results_no'>Invalid Position. Please enter the existing position.</p><ul class='results_no'><li>Full time</li><li>Part time</li><li>Contract</li></ul>");
            }else{
                results = JSON.parse(response) // convert back to associative array
                
                if (results.length == 0) { // if no results in array
                    $(".search_result_employee").html("<p class='results_no'>0 results found</p>");
                }else{
                    $(".search_result_employee").load("include/searchedResult.php", {result: response});
                }
            }


            
            
            
            

            
            
            
        }
    });
})



let load = false;
let sort = true;

$(document).ready(function(){
    $(".sorting_btn").click(function(){
        if (load == false){
            sort = "SORT_DESC";
            load = true;
            $(".sorting_btn span").html("Descending order <i class='bx bx-sort-z-a'></i>");
        }else{
            sort = "SORT_ASC";
            load = false;
            $(".sorting_btn span").html("Ascending order <i class='bx bx-sort-a-z'></i>");
        }
        $(".search_result_employee").load("include/searchedResult.php", {sort: sort});
      
    });
});
