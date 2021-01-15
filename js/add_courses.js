function addCourses(className) {
    let numberOfCourses = document.getElementById("number_of_new_courses").value;

    for (let i = 1; i <= numberOfCourses; i++) {
        addCourse(className);
    }
}  //  end of addCourses()

function addCourse(className) {
    //  create fieldset
    let fieldSet = document.createElement("fieldSet");
    let currentSemester = document.getElementById("current-semester").innerHTML;
    fieldSet.setAttribute("class", "courses-input " + className + " " + currentSemester);

    //  create legend
    let legend = document.createElement("legend");
    let level = currentSemester.substring(0, currentSemester.indexOf("-"));
    let semester = currentSemester.substring(currentSemester.indexOf("-") + 1);
    legend.innerHTML = level + " Level: " + semester + " Semester";

    //  create course code input
    let courseCodeLabel = document.createElement("label");
    courseCodeLabel.innerHTML = "Course Code:";
    let courseCodeInput = document.createElement("input");
    courseCodeInput.setAttribute("type", "text");
    courseCodeInput.setAttribute("name", "course_codes[]");

    //  create credit unit input
    let creditUnitLabel = document.createElement("label");
    creditUnitLabel.innerHTML = "Credit Unit:";
    let creditUnitInput = document.createElement("input");
    creditUnitInput.setAttribute("type", "number");
    creditUnitInput.setAttribute("min", "0");
    creditUnitInput.setAttribute("name", "credit_units[]");

    //  create grade selector
    let gradeLabel = document.createElement("label");
    gradeLabel.innerHTML = "Grade:";
    let gradeSelector = document.createElement("select");
    gradeSelector.setAttribute("name", "grades[]");
    let options = [];

    let i = 0;
    let values = ['A', 'B', 'C', 'D', 'E', 'F'];

    for (i = 0; i < 6; i++) {
        options[i] = document.createElement("option");
        options[i].setAttribute("value", values[i]);
        options[i].innerHTML = values[i];
        gradeSelector.appendChild(options[i]);
    }

    //  create course level
    let levelInput = document.createElement("input");
    levelInput.setAttribute("type", "text");
    levelInput.setAttribute("name", "levels[]");
    levelInput.setAttribute("value", level);
    levelInput.style.display = "none";

    //  create course semester
    let semesterInput = document.createElement("input");
    semesterInput.setAttribute("type", "text");
    semesterInput.setAttribute("name", "semesters[]");
    semesterInput.setAttribute("value", semester);
    semesterInput.style.display = "none";

    //  append children to fieldset
    fieldSet.appendChild(legend);
    fieldSet.appendChild(courseCodeLabel);
    fieldSet.appendChild(courseCodeInput);
    fieldSet.appendChild(creditUnitLabel);
    fieldSet.appendChild(creditUnitInput);
    fieldSet.appendChild(gradeLabel);
    fieldSet.appendChild(gradeSelector);
    fieldSet.appendChild(levelInput);
    fieldSet.appendChild(semesterInput);
    fieldSet.style.margin = "20px auto 10px auto";

    //  append fieldset to body
    let previousButton = document.getElementById("previous-semester");
    let nextButton = document.getElementById("next-semester");
    let submit = document.getElementById("submit");
    let calculatorForm = document.getElementById("calculator_form");
    calculatorForm.removeChild(previousButton);
    calculatorForm.removeChild(nextButton);
    calculatorForm.removeChild(submit);
    calculatorForm.appendChild(fieldSet);
    calculatorForm.appendChild(previousButton);
    calculatorForm.appendChild(nextButton);
    calculatorForm.appendChild(submit);
}  //  end of addCourse()