let institution = document.getElementById("institution").innerHTML;

function addCourses() {
    let coursesNumberField = document.getElementById("number_of_new_courses");
    let numberOfCourses = coursesNumberField.value;

    for (let i = 1; i <= numberOfCourses; i++) {
        addCourse();
    }

    coursesNumberField.value = "";
}  //  end of addCourses()

function addCourse() {
    //  create fieldset
    let fieldSet = document.createElement("fieldSet");
    let currentSemester = document.getElementById("current-semester").innerHTML;
    fieldSet.setAttribute("class", "courses-input " + currentSemester);

    //  create legend
    let legend = document.createElement("legend");
    let level = currentSemester.substring(0, currentSemester.indexOf("-"));
    let semester = currentSemester.substring(currentSemester.indexOf("-") + 1);

    if (institution.toLowerCase() == "university") {
        legend.innerHTML = level + " Level: " + semester + " Semester";
    }
    
    else if (institution.toLowerCase() == "polytechnic") {
        let polytechnicLevel = "";

        switch (level) {
            case "100":
                polytechnicLevel = "OND 1";
                break;

            case "200":
                polytechnicLevel = "OND 2";
                break;

            case "300":
                polytechnicLevel = "HND 1";
                break;

            case "400":
                polytechnicLevel = "HND 2";
                break;
        }

        legend.innerHTML = polytechnicLevel + ": " + semester + " Semester";
    }

    else if (institution.toLowerCase() == "college of education") {
        let collegeOfEducationLevel = "";

        switch (level) {
            case "100":
                collegeOfEducationLevel = "Year 1";
                break;

            case "200":
                collegeOfEducationLevel = "Year 2";
                break;

            case "300":
                collegeOfEducationLevel = "Year 3";
                break;
        }

        legend.innerHTML = collegeOfEducationLevel + ": " + semester + " Semester";
    }

    //  create inputs container
    let inputsContainers = [];
    for (let i = 0; i < 3; i++) {
        let inputsContainer = document.createElement("div");
        inputsContainer.setAttribute("class", "inputs-container");
        inputsContainers.push(inputsContainer);
    }

    //  create course code input
    let courseCodeLabel = document.createElement("label");
    courseCodeLabel.innerHTML = "Course Code:";
    let courseCodeInput = document.createElement("input");
    courseCodeInput.setAttribute("type", "text");
    courseCodeInput.setAttribute("name", "course_codes[]");
    inputsContainers[0].appendChild(courseCodeLabel);
    inputsContainers[0].appendChild(courseCodeInput);

    //  create credit unit input
    let creditUnitLabel = document.createElement("label");
    creditUnitLabel.innerHTML = "Credit Unit:";
    let creditUnitInput = document.createElement("input");
    creditUnitInput.setAttribute("type", "number");
    creditUnitInput.setAttribute("min", "0");
    creditUnitInput.setAttribute("name", "credit_units[]");
    inputsContainers[1].appendChild(creditUnitLabel);
    inputsContainers[1].appendChild(creditUnitInput);

    //  create grade selector
    let gradeLabel = document.createElement("label");
    gradeLabel.innerHTML = "Grade:";
    let gradeSelector = document.createElement("select");
    gradeSelector.setAttribute("name", "grades[]");
    let options = [];

    let gradeValues = [];

    if (institution.toLowerCase() == "polytechnic") {
        gradeValues = ['A', 'AB', 'B', 'BC', 'C', 'CD', 'D', 'E', 'F'];
    }   else {
        gradeValues = ['A', 'B', 'C', 'D', 'E', 'F'];
    }

    for (let i = 0; i < gradeValues.length; i++) {
        options[i] = document.createElement("option");
        options[i].setAttribute("value", gradeValues[i]);
        options[i].innerHTML = gradeValues[i];
        gradeSelector.appendChild(options[i]);
    }

    inputsContainers[2].appendChild(gradeLabel);
    inputsContainers[2].appendChild(gradeSelector);

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
    fieldSet.appendChild(inputsContainers[0]);
    fieldSet.appendChild(inputsContainers[1]);
    fieldSet.appendChild(inputsContainers[2]);
    fieldSet.appendChild(levelInput);
    fieldSet.appendChild(semesterInput);

    //  append fieldset to body
    let coursesFieldsetContainer = document.getElementById("courses-fieldsets-container");
    coursesFieldsetContainer.appendChild(fieldSet);
}  //  end of addCourse()