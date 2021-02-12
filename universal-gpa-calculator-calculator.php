<?php

    session_start();
  	$page_title = "Universal GPA Calculator";
	require_once("header.php");
	require_once("navigation.php");
	
?>

    <article>
      
        <?php
            //  connect to database
            $institution = $_GET["institution"];
            $_SESSION['institution'] = $institution;
            $maximum_number_of_levels = 6;
            $maximum_number_of_semesters = 2;
            $selected_semesters = [];

            for ($i = 1; $i <= $maximum_number_of_levels; $i++) {
                for ($j = 1; $j <= $maximum_number_of_semesters; $j++) {
                    if(isset($_GET[$i . $j])) {
                        array_push($selected_semesters, $_GET[$i . $j]);
                    }  //  end of if isset
                }  //  end of for j
            }  //  end of for i

        ?>

        <form id = "calculator_form" action = "result.php" method = "GET">

        <div id = "courses-fieldsets-container">
            
        <?php
        
            $first_semester = "";
            
            for ($i = 0; $i < count($selected_semesters); $i++) {
                $level_and_semester = explode(" ", $selected_semesters[$i]);
                $level = $level_and_semester[0];
                $semester = $level_and_semester[1];

                if ($i == 0) {
                    $first_semester = $level . "-" . $semester;
                }

                for ($j = 1; $j <= 9; $j++) {                    
                    echo "\t\t\t<fieldset class = 'courses-input " . $level . "-" . $semester . "'>\n";

                    if (strtolower($institution) == "university") {
                        echo "\t\t\t\t<legend>" . $level . " Level: " . $semester . " Semester</legend>\n";
                    }   //  end of if institution is University
                    
                    else if (strtolower($institution) == "polytechnic") {
                        $polytechnic_level = "";

                        switch ($level) {
                            case "100":
                                $polytechnic_level = "OND 1";
                                break;

                            case "200":
                                $polytechnic_level = "OND 2";
                                break;

                            case "300":
                                $polytechnic_level = "HND 1";
                                break;

                            case "400":
                                $polytechnic_level = "HND 2";
                                break;
                        }

                        echo "\t\t\t\t<legend>" . $polytechnic_level . ": " . $semester . " Semester</legend>\n";
                    }   //  end of if institution is Polytechnic
                    
                    else if (strtolower($institution) == "college of education") {
                        $college_of_education_level = "";

                        switch ($level) {
                            case "100":
                                $college_of_education_level = "Year 1";
                                break;

                            case "200":
                                $college_of_education_level = "Year 2";
                                break;

                            case "300":
                                $college_of_education_level = "Year 3";
                                break;
                        }

                        echo "\t\t\t\t<legend>" . $college_of_education_level . ": " . $semester . " Semester</legend>\n";
                    }   //  end of if institution is College of Education

                    echo "\t\t\t\t<div class = 'inputs-container'>\n";
                    echo "\t\t\t\t\t<label>Course Code:</label>\n";
                    echo "\t\t\t\t\t<input type = 'text' name = 'course_codes[]'>" . "\n";
                    echo "\t\t\t\t</div>\n";

                    echo "\t\t\t\t<div class = 'inputs-container'>\n";
                    echo "\t\t\t\t\t<label>Credit Unit:</label>\n";
                    echo "\t\t\t\t\t<input type = 'number' name = 'credit_units[]' min = '0'>" . "\n";
                    echo "\t\t\t\t</div>\n";

                    echo "\t\t\t\t<div class = 'inputs-container'>\n";
                    echo "\t\t\t\t\t<label>Grade:</label>\n";
                    echo "\t\t\t\t\t<select name = 'grades[]'>\n";

                    if (strtolower($institution) == "polytechnic") {
                        echo "\t\t\t\t\t\t<option value='A'>A</option>\n";
                        echo "\t\t\t\t\t\t<option value='AB'>AB</option>\n";
                        echo "\t\t\t\t\t\t<option value='B'>B</option>\n";
                        echo "\t\t\t\t\t\t<option value='BC'>BC</option>\n";
                        echo "\t\t\t\t\t\t<option value='C'>C</option>\n";
                        echo "\t\t\t\t\t\t<option value='CD'>CD</option>\n";
                        echo "\t\t\t\t\t\t<option value='D'>D</option>\n";
                        echo "\t\t\t\t\t\t<option value='E'>E</option>\n";
                        echo "\t\t\t\t\t\t<option value='F'>F</option>\n";
                    }   else {
                        echo "\t\t\t\t\t\t<option value='A'>A</option>\n";
                        echo "\t\t\t\t\t\t<option value='B'>B</option>\n";
                        echo "\t\t\t\t\t\t<option value='C'>C</option>\n";
                        echo "\t\t\t\t\t\t<option value='D'>D</option>\n";
                        echo "\t\t\t\t\t\t<option value='E'>E</option>\n";
                        echo "\t\t\t\t\t\t<option value='F'>F</option>\n";
                    }

                    echo "\t\t\t\t\t</select>\n";
                    echo "\t\t\t\t</div>\n";

                    echo "\t\t\t\t<input type = 'text' name = 'levels[]' value = '" . $level . "' style = 'display: none;'>\n";

                    echo "\t\t\t\t<input type = 'text' name = 'semesters[]' value = '" . $semester . "' style = 'display: none;'>\n";

                    echo "\t\t\t\t<div class = 'remove-course-button' title = 'Remove course' onclick = 'removeCourse(event)'>X</div>\n";
                    echo "\t\t\t</fieldset>\n\n";
                }   //  end for j
            }   //  end for i
            ?>
            </div>

        <?php
            echo "\t<span id = 'institution' style = 'display: none'>" . $institution . "</span>\n";
            echo "\t<span id = 'current-semester' style = 'display: none'>" . $first_semester . "</span>\n";
        ?>

            <div id = "navigation-buttons">
                <button id = "previous-semester" type = "button" onclick = "showPreviousSemester()">
                    &larr; Previous Semester
                </button>
                
                <button id = "next-semester" type = "button" onclick = "showNextSemester()">
                    Next Semester &rarr;
                </button>
            </div>

            <button id = "calculate" type = "submit" name = "submit">
                Calculate
            </button>

            <script src = "js/navigate_semesters.js"></script>

        </form>

        <script src = "js/add_courses.js"></script>
        <script src = "js/remove_courses.js"></script>

        <fieldset id = "extra-courses">
            <legend>Extra Courses</legend>

            <label>Number of Courses:</label>
            <input id = "number_of_new_courses" type = "number" name = "number_of_new_courses" min = "0">
            <button onclick = "addCourses()">Add Course(s)</button>
        </fieldset>

    </article>

<?php  
	require_once("footer.php");
?>