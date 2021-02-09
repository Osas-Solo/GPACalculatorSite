let collegeOfScienceContainer = document.getElementById("college-of-science-container");
let collegeOfTechnologyContainer = document.getElementById("college-of-technology-container");
let semestersFieldsetsContainer = document.getElementById("semesters-fieldsets-container")
let fiveHundredLevelFieldset = document.getElementById("500-level");

hideSemestersFieldsetContainer();

function showDepartments() {
    let collegeSelector = document.getElementById("college");
    let collegeName = collegeSelector.value;

    switch(collegeName) {
        case "College of Science":
            showCollegeDepartments(collegeOfScienceContainer);
            hideCollegeDepartment(collegeOfTechnologyContainer);
            showSemestersFieldsetContainer();
            hideFiveHundredLevelFieldset();
            break;

        case "College of Technology":
            showCollegeDepartments(collegeOfTechnologyContainer);
            hideCollegeDepartment(collegeOfScienceContainer);
            showSemestersFieldsetContainer();
            showFiveHundredLevelFieldset();
            break;

        default:
            hideCollegeDepartment(collegeOfScienceContainer);
            hideCollegeDepartment(collegeOfTechnologyContainer);
            hideSemestersFieldsetContainer();
    }
}

function showCollegeDepartments(collegeContainer) {
    collegeContainer.childNodes[3].setAttribute("name", "department");
    collegeContainer.style.display = "";
}

function hideCollegeDepartment(collegeContainer) {
    collegeContainer.childNodes[3].removeAttribute("name");
    collegeContainer.style.display = "none";
}

function hideSemestersFieldsetContainer() {
    semestersFieldsetsContainer.style.display = "none";
}

function showSemestersFieldsetContainer() {
    semestersFieldsetsContainer.style.display = "";
}

function hideFiveHundredLevelFieldset() {
    fiveHundredLevelFieldset.style.display = "none";
}

function showFiveHundredLevelFieldset() {
    fiveHundredLevelFieldset.style.display = "";
}

function changeFinalYearForCollegeOfScience() {
    let collegeOfScienceDepartmentsSelector = document.getElementById("college-of-science");

    if (collegeOfScienceDepartmentsSelector.value == "environmental_management_and_toxicology") {
        showFiveHundredLevelFieldset();
    }   else {
        hideFiveHundredLevelFieldset();
    }
}