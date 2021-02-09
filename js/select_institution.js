let semestersFieldsetsContainer = document.getElementById("semesters-fieldsets-container")
let levels = document.getElementsByClassName("levels");
let levelNames = document.getElementsByClassName("level-names");

hideSemestersFieldsetContainer();

function showLevels() {
    let institutionSelector = document.getElementById("institution");
    let institution = institutionSelector.value;

    switch(institution) {
        case "University":
            switchToUniversityLevels();
            showSemestersFieldsetContainer();
            break;

        case "Polytechnic":
            switchToPolytechnicLevels();
            showSemestersFieldsetContainer();
            break;

        case "College of Education":
            switchToCollegeOfEducationLevels()
            showSemestersFieldsetContainer();
            break;

        default:
            hideSemestersFieldsetContainer();
    }
}

function hideSemestersFieldsetContainer() {
    semestersFieldsetsContainer.style.display = "none";
}

function showSemestersFieldsetContainer() {
    semestersFieldsetsContainer.style.display = "";
}

function switchToUniversityLevels() {
    for (let i = 0; i < levelNames.length; i++) {
        levelNames[i].innerHTML = (i + 1) + "00 Level";
        levels[i].style.display = "";
    }
}

function switchToPolytechnicLevels() {
    let numberOfPolytechnicLevels = 4;

    for (let i = 0; i < numberOfPolytechnicLevels; i++) {
        if (i < 2) {
            levelNames[i].innerHTML = "OND " + (i + 1);
        }   else if (i >= 2) {
            levelNames[i].innerHTML = "HND " + (i - 1);
        }
    }

    for (let i = 4; i < levels.length; i++) {
        levels[i].style.display = "none";
    }
}

function switchToCollegeOfEducationLevels() {
    let numberOfCollegeLevels = 3;

    for (let i = 0; i < numberOfCollegeLevels; i++) {
        levelNames[i].innerHTML = "Year " + (i + 1);
    }

    for (let i = 3; i < levels.length; i++) {
        levels[i].style.display = "none";
    }
}

function hideSemestersFieldsetContainer() {
    semestersFieldsetsContainer.style.display = "none";
}

function showSemestersFieldsetContainer() {
    semestersFieldsetsContainer.style.display = "";
}