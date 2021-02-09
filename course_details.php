<?php

    class CourseDetail {

        public $institution;
        public $course_code;
        public $credit_unit;
        public $grade;
        public $semester;
        public $point;

        public function CourseDetail($institution, $course_code, $credit_unit, $grade, $semester) {
            $this->institution = $institution;
            $this->course_code = $course_code;
            $this->credit_unit = $credit_unit;
            $this->grade = $grade;
            $this->semester = $semester;

            if (strtolower($institution) == "polytechnic") {
                switch ($grade) {
                    case 'A':
                        $this->point = 4;
                        break;

                    case 'AB':
                        $this->point = 3.5;
                        break;

                    case 'B':
                        $this->point = 3;
                        break;

                    case 'BC':
                        $this->point = 2.5;
                        break;

                    case 'C':
                        $this->point = 2;
                        break;

                    case 'CD':
                        $this->point = 1.5;
                        break;

                    case 'D':
                        $this->point = 1;
                        break;

                    case 'E':
                        $this->point = 0.5;
                        break;

                    case 'F':
                        $this->point = 0;
                        break;
                }
            }
            else {
                switch ($grade) {
                    case 'A':
                        $this->point = 5;
                        break;

                    case 'B':
                        $this->point = 4;
                        break;

                    case 'C':
                        $this->point = 3;
                        break;

                    case 'D':
                        $this->point = 2;
                        break;

                    case 'E':
                        $this->point = 1;
                        break;

                    case 'F':
                        $this->point = 0;
                        break;
                }  //  end of switch
            }
        }  //end of constructor

    }  //  end of class

?>