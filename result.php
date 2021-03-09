<?php
    
    session_start();

	$page_title = "Result";
	require_once("header.php");
	require_once("navigation.php");

    function getRemark($institution, $gpa) {
        $remark = "";

        if (strtolower($institution) == "polytechnic") {
            if ($gpa >= 3.50) {
                $remark = "First Class";
            } else if ($gpa >= 3 && $gpa <= 3.49) {
                $remark = "Second Class Upper";
            } else if ($gpa >= 2 && $gpa <= 2.99) {
                $remark = "Second Class Lower";
            } else if ($gpa >= 1 && $gpa <= 1.99) {
                $remark = "Third Class";
            }
        }

        else if (strtolower($institution) == "university" || strtolower($institution) == "college of education") {
            if ($gpa >= 4.50) {
                $remark = (strtolower($institution) == "university") ? "First Class" : "Distinction";
            } else if ($gpa >= 3.50 && $gpa <= 4.49) {
                $remark = (strtolower($institution) == "university") ? "Second Class Upper" : "Credit";
            } else if ($gpa >= 2.40 && $gpa <= 3.49) {
                $remark = (strtolower($institution) == "university") ? "Second Class Lower" : "Merit";
            } else if ($gpa >= 1.50 && $gpa <= 2.39) {
                $remark = (strtolower($institution) == "university") ? "Third Class" : "Pass";
            }
        }

        return $remark;
    }  //  end of getRemark()

?>

    <article>

        <?php

            require_once("course_details.php");
            $is_course_valid = $_SESSION['valid_course'];
            $institution = $_SESSION['institution'];

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
                    if (!isset($credit_unit) || !is_numeric($credit_unit)) {
                        $credit_unit = 0;
                    }
                    array_push($credit_units, $credit_unit);
                }
                
                foreach($_GET["grades"] as $grade) {
                    array_push($grades, $grade);
                }

                for($i = 0; $i < count($_GET["levels"]); $i++) {
                    $semester = "";

                    if (strtolower($institution) == "university") {
                        $semester = $_GET["levels"][$i] . " Level " . $_GET["semesters"][$i] . " Semester";
                    }

                    else if (strtolower($institution) == "polytechnic") {
                        $polytechnic_level = "";

                        switch ($_GET["levels"][$i]) {
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

                        $semester = $polytechnic_level . " " . $_GET["semesters"][$i] . " Semester";
                    }

                    else if (strtolower($institution) == "college of education") {
                        $college_of_education_level = "";

                        switch ($_GET["levels"][$i]) {
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

                        $semester = $college_of_education_level . " " . $_GET["semesters"][$i] . " Semester";
                    }

                    array_push($semesters, $semester);
                }
                
                for ($i = 0; $i < $number_of_courses; $i++) {
                    array_push($course_details, new CourseDetail($institution,
                                                                $course_codes[$i],
                                                                $credit_units[$i],
                                                                $grades[$i],
                                                                $semesters[$i]));
                }
    
            }  //  end of if course is valid

        ?>

            <table id = "result-table">

                <tr class = "table-header">
                    <th id = "course-code-header" title = "Sort table by course code" onclick = "sortResultByCourseCode()">
                        Course Code
                        <div class = "sort-indicator">
                            <span id = "course-code-ascending">&#8593;</span>
                            <span id = "course-code-descending">&#8595;</span>
                        </div>
                    </th>

                    <th id = "credit-unit-header" title = "Sort table by credit unit" onclick = "sortResultByCreditUnit()">
                        Credit Unit
                        <div class = "sort-indicator">
                            <span id = "credit-unit-ascending">&#8593;</span>
                            <span id = "credit-unit-descending">&#8595;</span>
                        </div>
                    </th>

                    <th id = "grade-header" title = "Sort table by grade" onclick = "sortResultByGrade()">
                        Grade
                        <div class = "sort-indicator">
                            <span id = "grade-ascending">&#8593;</span>
                            <span id = "grade-descending">&#8595;</span>
                        </div>
                    </th>
                    
                    <th>Semester</th>
                </tr>

                <?php

                    if ($is_course_valid) {
                        $total_number_of_units = 0;
                        $total_credit_points = 0;
                        $current_course_number = 0;
                        $row_class = "";
    
                        foreach ($course_details as $course_detail) {
                            
                            if (!empty($course_detail->credit_unit)) {
                                $total_number_of_units += $course_detail->credit_unit;
                                $total_credit_points += ($course_detail->credit_unit * $course_detail->point);
                            } else {
                                $total_number_of_units += 0;
                                $total_credit_points += 0;
                            }
    
                            echo "\t\t\t\t\t<tr>\n";
                            echo "\t\t\t\t\t\t<td class = 'course-code'>" . $course_detail->course_code . "</td>\n";
                            echo "\t\t\t\t\t\t<td class = 'credit-unit'>" . $course_detail->credit_unit . "</td>\n";
                            echo "\t\t\t\t\t\t<td class = 'grade'>" . $course_detail->grade . "</td>\n";
                            echo "\t\t\t\t\t\t<td class = 'semester'>" . $course_detail->semester . "</td>\n";
                            echo "\t\t\t\t\t</tr>\n";
    
                            $current_course_number++;
                        }  //  end of for
                    }  //  end of if course is valid

                ?>

            </table>

            <script src = "js/sort_result_table.js"></script>

            <div id = "gpa-report">
        <?php

            if ($is_course_valid) {
                $grade_point_average = $total_credit_points / $total_number_of_units;
                print("\t\t\t\t<p>Total Number of Units: $total_number_of_units</p>\n");
                print("\t\t\t\t<p>Total Credit Points: $total_credit_points</p>\n");
                printf("\t\t\t\t<p>GPA: %.2f</p>\n", $grade_point_average);
                print("\t\t\t\t<p>Remark: " . getRemark($institution, $grade_point_average) . "</p>\n");
            }

        ?>
            </div>

    </article>

<?php  
	require_once("footer.php");
?>    
