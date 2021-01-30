let collegeOfScienceContainer = document.getElementById("college-of-science-container");
let collegeOfTechnologyContainer = document.getElementById("college-of-technology-container");

function showDepartments() {
    let collegeSelector = document.getElementById("college");
    let collegeName = collegeSelector.value;
    console.log(collegeName);

    switch(collegeName) {
        case "College of Science":
            showCollegeDepartments(collegeOfScienceContainer);
            hideCollegeDepartment(collegeOfTechnologyContainer);
            break;

        case "College of Technology":
            showCollegeDepartments(collegeOfTechnologyContainer);
            hideCollegeDepartment(collegeOfScienceContainer);
            break;

        default:
            hideCollegeDepartment(collegeOfScienceContainer);
            hideCollegeDepartment(collegeOfTechnologyContainer);
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