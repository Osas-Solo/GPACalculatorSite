function addCourses(className) {

    let numberOfCourses = document.getElementById("number_of_new_courses").value;

    for (let i = 1; i <= numberOfCourses; i++) {
        addCourse(className);
    }
    
}  //  end of addCourses()

function addCourse(className) {

    //  create fieldset
    let fieldSet = document.createElement("fieldSet");
    fieldSet.setAttribute("class", className);

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

    //  append children to fieldset
    fieldSet.appendChild(courseCodeLabel);
    fieldSet.appendChild(courseCodeInput);
    fieldSet.appendChild(creditUnitLabel);
    fieldSet.appendChild(creditUnitInput);
    fieldSet.appendChild(gradeLabel);
    fieldSet.appendChild(gradeSelector);
    fieldSet.style.margin = "20px auto 10px auto";

    //  append fieldset to body
    let submit = document.getElementById("submit");
    let calculatorForm = document.getElementById("calculator_form");
    calculatorForm.removeChild(submit);
    calculatorForm.appendChild(fieldSet);
    calculatorForm.appendChild(submit);

}  //  end of addCourse()