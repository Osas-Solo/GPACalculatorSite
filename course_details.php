<?php

    class CourseDetail {

        public $course_code;
        public $credit_unit;
        public $grade;
        public $point;

        public function CourseDetail($course_code, $credit_unit, $grade) {
            $this->course_code = $course_code;
            $this->credit_unit = $credit_unit;
            $this->grade = $grade;

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
        }  //end of constructor

    }  //  end of class

?>