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
    courses[i] = new Course(courseCodes[i].innerHTML, Number(creditUnits[i].innerHTML), grades[i].innerHTML, semesters[i].innerHTML);
}

function sortCourseCodes() {
    courses.sort((firstCourse, secondCourse) => {
        const firstCourseSemester = firstCourse.semester.toUpperCase();
        const secondCourseSemester = secondCourse.semester.toUpperCase();
        const firstCourseCode = firstCourse.courseCode.toUpperCase();
        const secondCourseCode = secondCourse.courseCode.toUpperCase();

        if (firstCourseSemester > secondCourseSemester) {
            return 1;
        }   else if (secondCourseSemester > firstCourseSemester) {
            return -1;
        }
    });
    console.log(courses);
}   //  end of sortCourseCode()

