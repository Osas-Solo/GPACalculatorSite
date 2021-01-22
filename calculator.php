<?php

    session_start();
	$page_title = "Calculator";
	require_once("header.php");
	require_once("navigation.php");
	
?>

    <article>
      
        <?php
            //  connect to database
            require_once("database_connection.php");
            $department = $_GET["department"];
            $table_name = $department;
            
            //  prepare where clause
            $where_clause = "";
            for ($i = 1; $i <= 5; $i++) {
                for ($j = 1; $j <= 2; $j++) {
                    if(isset($_GET[$i . $j])) {
                        if (!empty($where_clause)) {
                            $where_clause .= " OR ";
                        }  //  end of if !empty

                        $selected = $_GET[$i . $j];
                        $level_and_semester = explode(" ", $selected);

                        $where_clause .= " level = '" . $level_and_semester[0] . "'";
                        $where_clause .= " AND semester = '" . $level_and_semester[1] . "'";
                    }  //  end of if isset
                }  //  end of for j
            }  //  end of for i

            //  prepare query
            $query = "SELECT * FROM $table_name WHERE";
            $query .= (!empty($where_clause)) ? ("". $where_clause) : " course_code = '600'";
            $query .= " ORDER BY level ASC, semester ASC, course_code ASC";

        ?>

        <form id = "calculator_form" action = "result.php" method = "GET">

        <div id = "courses-fieldsets-container">
            
        <?php
        
            $data = mysqli_query($database_connector, $query);
            $first_semester = "";

            if (!empty($data)) {
                $_SESSION['valid_course'] = true;
                $row_count = 0;
                while ($row = mysqli_fetch_array($data)) {
                    $row_count++;

                    if ($row_count == 1) {
                        $first_semester = $row['level'] . "-" . $row['semester'];
                    }

                    echo "\t\t\t<fieldset class = 'courses-input " . $row['level'] . "-" . $row['semester'] . "'>\n";
                    echo "\t\t\t\t<legend>" . $row['level'] . " Level: " . $row['semester'] . " Semester</legend>\n";

                    echo "\t\t\t\t<div class = 'inputs-container'>\n";
                    echo "\t\t\t\t\t<label>Course Code:</label>\n";
                    echo "\t\t\t\t\t<input type = 'text' name = 'course_codes[]' value = '" . $row["course_code"] . "'>" . "\n";
                    echo "\t\t\t\t</div>\n";

                    echo "\t\t\t\t<div class = 'inputs-container'>\n";
                    echo "\t\t\t\t\t<label>Credit Unit:</label>\n";
                    echo "\t\t\t\t\t<input type = 'number' name = 'credit_units[]' value = '" . $row["credit_unit"] . "' min = '0'>" . "\n";
                    echo "\t\t\t\t</div>\n";

                    echo "\t\t\t\t<div class = 'inputs-container'>\n";
                    echo "\t\t\t\t\t<label>Grade:</label>\n";
                    echo "\t\t\t\t\t<select name = 'grades[]'>\n";
                    echo "\t\t\t\t\t\t<option value='A'>A</option>\n";
                    echo "\t\t\t\t\t\t<option value='B'>B</option>\n";
                    echo "\t\t\t\t\t\t<option value='C'>C</option>\n";
                    echo "\t\t\t\t\t\t<option value='D'>D</option>\n";
                    echo "\t\t\t\t\t\t<option value='E'>E</option>\n";
                    echo "\t\t\t\t\t\t<option value='F'>F</option>\n";
                    echo "\t\t\t\t\t</select>\n";
                    echo "\t\t\t\t</div>\n";

                    echo "\t\t\t\t<input type = 'text' name = 'levels[]' value = '" . $row["level"] . "' style = 'display: none;'>\n";

                    echo "\t\t\t\t<input type = 'text' name = 'semesters[]' value = '" . $row["semester"] . "' style = 'display: none;'>\n";
                    echo "\t\t\t</fieldset>\n\n";
                }
            } else {
                $_SESSION['valid_course'] = false;
                echo "\t\t\t<p>You've entered an invalid course in the URL</p>\n";
            }
            ?>
            </div>

        <?php
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