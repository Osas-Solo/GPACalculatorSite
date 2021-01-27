class Course {
    constructor(courseCode, creditUnit, grade, semester) {
        this.courseCode = courseCode;
        this.creditUnit = creditUnit;
        this.grade = grade;
        this.semester = semester;
    }   //  end of constructor
}   //  end of class

//  get course details form table
let courseCodes = document.getElementsByClassName("course-code");
let creditUnits = document.getElementsByClassName("credit-unit");
let grades = document.getElementsByClassName("grade");
let semesters = document.getElementsByClassName("semester");

//  set courses to objects
let courses = new Array(courseCodes.length);

for (let i = 0; i < courses.length; i++) {
    courses[i] = new Course(courseCodes[i].innerHTML,
                            Number(creditUnits[i].innerHTML),
                            grades[i].innerHTML,
                            semesters[i].innerHTML);
}

let areCourseCodesAscending = false;
let areCreditUnitsAscending = false;
let areGradesAscending = false;

sortResultByCourseCode();

function sortResultByCourseCode() {
    areCreditUnitsAscending = false;
    areGradesAscending = false;

    if (!areCourseCodesAscending) {
        for (let i = 0; i < courses.length; i++) {
            for (let j = 0; j < courses.length - 1; j++)
            if ((courses[j].semester >= courses[j + 1].semester) && 
                (courses[j].courseCode.toUpperCase() > courses[j + 1].courseCode.toUpperCase())) {
                    swapCoursesPosition(courses[j], courses[j + 1]);
            }
        }

        areCourseCodesAscending = true;
        refreshTable();
    }   else if (areCourseCodesAscending) {
        courses.reverse();
        areCourseCodesAscending = false;
        refreshTable();
    }
}   //  end of sortResultByCourseCode()

function sortResultByCreditUnit() {
    areCourseCodesAscending = false;
    areGradesAscending = false;

    if (!areCreditUnitsAscending) {
        for (let i = 0; i < courses.length; i++) {
            for (let j = 0; j < courses.length - 1; j++)
            if (courses[j].creditUnit > courses[j + 1].creditUnit) {
                swapCoursesPosition(courses[j], courses[j + 1]);
            }
        }

        areCreditUnitsAscending = true;
        refreshTable();
    }   else if (areCreditUnitsAscending) {
        courses.reverse();
        areCreditUnitsAscending = false;
        refreshTable();
    }
}   //  end of sortResultByCreditUnit()

function sortResultByGrade() {
    areCourseCodesAscending = false;
    areCreditUnitsAscending = false;

    if (!areGradesAscending) {
        for (let i = 0; i < courses.length; i++) {
            for (let j = 0; j < courses.length - 1; j++)
            if (courses[j].grade.toUpperCase() > courses[j + 1].grade.toUpperCase()) {
                swapCoursesPosition(courses[j], courses[j + 1]);
            }
        }

        areGradesAscending = true;
        refreshTable();
    }   else if (areGradesAscending) {
        courses.reverse();
        areGradesAscending = false;
        refreshTable();
    }
}   //  end of sortResultByGrade()

function swapCoursesPosition(firstCourse, secondCourse) {
    let temporaryCourse = new Course("", 0, "", "");

    temporaryCourse.courseCode = firstCourse.courseCode;
    temporaryCourse.creditUnit = firstCourse.creditUnit;
    temporaryCourse.grade = firstCourse.grade;
    temporaryCourse.semester = firstCourse.semester;

    firstCourse.courseCode = secondCourse.courseCode;
    firstCourse.creditUnit = secondCourse.creditUnit;
    firstCourse.grade = secondCourse.grade;
    firstCourse.semester = secondCourse.semester;

    secondCourse.courseCode = temporaryCourse.courseCode;
    secondCourse.creditUnit = temporaryCourse.creditUnit;
    secondCourse.grade = temporaryCourse.grade;
    secondCourse.semester = temporaryCourse.semester;
}   //  end of swapCoursesPosition()

function refreshTable() {
    for (let i = 0; i < courseCodes.length; i++) {
        courseCodes[i].innerHTML = courses[i].courseCode;
        creditUnits[i].innerHTML = courses[i].creditUnit;
        grades[i].innerHTML = courses[i].grade;
        semesters[i].innerHTML = courses[i].semester;
    }
}   //  end of refreshTable()