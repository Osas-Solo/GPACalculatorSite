<?php
    
    session_start();

	$page_title = "Result";
	require_once("header.php");
	require_once("navigation.php");

    function getRemark($gpa) {

        $remark = "";

        if ($gpa >= 4.50) {
            $remark = "First Class";
        } else if ($gpa >= 3.50 && $gpa <= 4.49) {
            $remark = "Second Class Upper";
        } else if ($gpa >= 2.40 && $gpa <= 3.49) {
            $remark = "Second Class Lower";
        } else if ($gpa >= 1.50 && $gpa <= 2.39) {
            $remark = "Third Class";
        }

        return $remark;

    }  //  end of getRemark()

    function compare_course_codes($first_course_detail, $second_course_detail) {

        if (!empty($first_course_detail->course_code) && !empty($second_course_detail->course_code)) {
            $splitted_course_code = explode(" ", $first_course_detail->course_code);
            $first_course_level_and_semester = $splitted_course_code[1];
            $splitted_course_code = explode(" ", $second_course_detail->course_code);
            $second_course_level_and_semester = $splitted_course_code[1];
        } else {
            $first_course_level_and_semester = 0;
            $second_course_level_and_semester = 0;
        }

        return $first_course_level_and_semester - $second_course_level_and_semester;
    }

    function compare_credit_units($first_course_detail, $second_course_detail) {
        return $first_course_detail->credit_unit - $second_course_detail->credit_unit;
    }

    function compare_grades($first_course_detail, $second_course_detail) {
        return strcmp($first_course_detail->grade, $second_course_detail->grade);
    }

?>

    <div class = "container">

        <img src = "images/fupre_logo.png" alt = "FUPRE Logo"/>

        <?php

            require_once("course_details.php");
            $is_course_valid = $_SESSION['valid_course'];

            if ($is_course_valid) {

                $course_details = [];
                $number_of_courses = count($_GET["course_codes"]);
                $course_codes = [];
                $credit_units = [];
                $semesters = [];
                $grades = [];
    
    
                foreach($_GET["course_codes"] as $course_code) {
                    if (!isset($course_code)) {
                        $course_code = " ";
                    }
                    array_push($course_codes, $course_code);
                }
    
                foreach($_GET["credit_units"] as $credit_unit) {
                    if (!isset($credit_unit)) {
                        $credit_unit = 0;
                    }
                    array_push($credit_units, $credit_unit);
                }
                
                foreach($_GET["grades"] as $grade) {
                    array_push($grades, $grade);
                }

                for($i = 0; $i < count($_GET["levels"]); $i++) {
                    $semester = $_GET["levels"][$i] . " Level " . $_GET["semesters"][$i] . " Semester";
                    array_push($semesters, $semester);
                }
                
                for ($i = 0; $i < $number_of_courses; $i++) {
                    array_push($course_details, new CourseDetail($course_codes[$i],
                                                                $credit_units[$i],
                                                                $grades[$i],
                                                                $semesters[$i]));
                }
    
            }  //  end of if course is valid

        ?>


            <table>

                <tr>
                    <th id = "course-code-header">Course Code</th>
                    <th id = "credit-unit-header">Credit Unit</th>
                    <th id = "grade-header">Grade</th>
                    <th style = 'display: none'>Semester</th>
                </tr>

                <?php

                    if ($is_course_valid) {
                        $total_number_of_units = 0;
                        $total_credit_points = 0;
                        $current_course_number = 0;
                        $row_class = "";
                        usort($course_details, "compare_course_codes");
    
                        foreach ($course_details as $course_detail) {
                            
                            if (!empty($course_detail->credit_unit)) {
                                $total_number_of_units += $course_detail->credit_unit;
                                $total_credit_points += ($course_detail->credit_unit * $course_detail->point);
                            } else {
                                $total_number_of_units += 0;
                                $total_credit_points += 0;
                            }
    
                            if ($current_course_number % 2 == 0) {
                                $row_class = "even_row";
                            } else {
                                $row_class = "odd_row";
                            }
    
                            echo "\t\t\t\t\t<tr class = '$row_class'>\n";
                            echo "\t\t\t\t\t\t<td class = 'course-code'>" . $course_detail->course_code . "</td>\n";
                            echo "\t\t\t\t\t\t<td class = 'credit-unit'>" . $course_detail->credit_unit . "</td>\n";
                            echo "\t\t\t\t\t\t<td class = 'grade'>" . $course_detail->grade . "</td>\n";
                            echo "\t\t\t\t\t\t<td class = 'semester' style = 'display: none'>" . $course_detail->semester . "</td>\n";
                            echo "\t\t\t\t\t</tr>\n";
    
                            $current_course_number++;
                        }  //  end of for
                    }  //  end of if course is valid

                ?>

            </table>

        <?php

            if ($is_course_valid) {
                $grade_point_average = $total_credit_points / $total_number_of_units;
                print("\t\t\t<p>Total Number of Units: $total_number_of_units</p>\n");
                print("\t\t\t<p>Total Credit Points: $total_credit_points</p>\n");
                printf("\t\t\t<p>GPA: %.2f</p>\n", $grade_point_average);
                print("\t\t\t<p>Remark: " . getRemark($grade_point_average) . "</p>\n");
            }

        ?>

    </div>  <!-- end of container -->

<?php  
	require_once("footer.php");
?>    
