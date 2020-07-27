<?php

    session_start();
	$page_title = "Calculator";
	require_once("header.php");
	require_once("navigation.php");
	
?>

    <div class = "container">
  
        <img src = "images/fupre_logo.png" alt = "FUPRE Logo"/>
    
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

            //  get number of courses
            $number_of_courses = 0;
            $database_connector = mysqli_connect(DATABASE_URL, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
            $new_query = str_replace("*", "COUNT('course_code')", $query);
            $data = mysqli_query($database_connector, $new_query);
            if (!empty($data)) {
                $row = mysqli_fetch_row($data);
                $number_of_courses = $row[0];
            }

            //  select arrangement of fieldsets based on number of courses
            $class_name = "";

            if ($number_of_courses % 5 == 0) {
                $class_name = "fives";
            } else if ($number_of_courses % 4 == 0) {
                $class_name = "fours";
            } else if ($number_of_courses % 3 == 0) {
                $class_name = "threes";
            } else if ($number_of_courses % 2 == 0) {
                $class_name = "twos";
            } else {
                $class_name = "threes";
            }

        ?>

        <form id = "calculator_form" action = "result.php" method = "GET">
            
        <?php
        
            $data = mysqli_query($database_connector, $query);

            if (!empty($data)) {
                $_SESSION['valid_course'] = true;

                while ($row = mysqli_fetch_array($data)) {
                    echo "\t\t<fieldset class = '$class_name'>\n";
                    echo "\t\t\t<legend>" . $row['level'] . " Level: " . $row['semester'] . " Semester</legend>\n";
                    echo "\t\t\t<label>Course Code:</label>\n";
                    echo "\t\t\t<input type = 'text' name = 'course_codes[]' value = '" . $row["course_code"] . "'>" . "<br>\n";
                    echo "\t\t\t<label>Credit Unit:</label>\n";
                    echo "\t\t\t<input type = 'number' name = 'credit_units[]' value = '" . $row["credit_unit"] . "' min = '0'>" . "<br>\n";
                    echo "\t\t\t<label>Grade:</label>\n";
                    echo "\t\t\t<select name = 'grades[]'>\n";
                    echo "\t\t\t\t<option value='A'>A</option>\n";
                    echo "\t\t\t\t<option value='B'>B</option>\n";
                    echo "\t\t\t\t<option value='C'>C</option>\n";
                    echo "\t\t\t\t<option value='D'>D</option>\n";
                    echo "\t\t\t\t<option value='E'>E</option>\n";
                    echo "\t\t\t\t<option value='F'>F</option>\n";
                    echo "\t\t\t</select>\n";
                    echo "\t\t</fieldset>\n\n";
                }
            } else {
                $_SESSION['valid_course'] = false;
                echo "\t\t<p>You've entered an invalid course in the URL</p>\n";
            }

        ?>
            
            <input id = "submit" type = "submit" name = "submit" value = "Calculate">

        </form>

        <script src = "js/add_courses.js"></script>
        <fieldset>
            <label>Number of Courses:</label>
            <input id = "number_of_new_courses" type = "number" name = "number_of_new_courses" min = "0">
            <button onclick = "addCourses(<?php echo '\'' . $class_name . '\''?>)">Add Course(s)</button>
        </fieldset>

    </div>  <!-- end of container -->

<?php  
	require_once("footer.php");
?>