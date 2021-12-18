<?php
    $link = array(
        array("employeeForm.php", "<i class='bx bxs-user-plus'></i>", "Add Employee"),
        array("searchForm.php", "<i class='bx bx-search-alt'></i>", "Search Employee"),
        array("advancedSearchForm.php", "<i class='bx bxs-search'></i>", "Advanced Search"),
        array("about.php", "<i class='bx bx-info-circle' ></i>", "About Assignment")
        
    );

    function active_link($currect_page){
        $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
        $url = end($url_array);  
        if($currect_page == $url){
            return 'active'; //class name in css 
        }else{
            return "";
        }
    }

    echo
	"<div class='manager_logo'>
        <a href='index.php'>
            <img src='images/logo.png' alt='logo'/>
        <div class='logo_name'>Manager</div>
        </a>
        <i class='bx bx-menu'  id='menu_btn' onclick='closeMenuq()'></i>
    </div>
    <ul class='navBarlist'>";
    foreach ($link as $single_link){
        $active = active_link($single_link[0]);
        
        echo "
        <li>
            <a href='" . $single_link[0] . "' id='" . $active . "'>"
                . $single_link[1] . 
                "<span>" . $single_link[2] . "</span>
            </a>
            <span class='tooltip'>" . $single_link[2] . "</span>
        </li>
        ";
    }
    echo "</ul>";

	
?>