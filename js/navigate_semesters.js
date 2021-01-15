let currentSemester = document.getElementById("current-semester").innerHTML;
setCurrentSemesterInSpan();

let previousButton = document.getElementById("previous-semester");
let nextButton = document.getElementById("next-semester");

hideNavigationButton(previousButton);

let availableSemesters = [];
availableSemesters.push(currentSemester);

let coursesInputFieldsets = document.getElementsByClassName("courses-input");

//  get availableSemesters
for (let i = 0; i < coursesInputFieldsets.length; i++) {
    let semester = coursesInputFieldsets[i].getAttribute("class");
    semester = semester.substring(semester.lastIndexOf(" ") + 1);

    if (!availableSemesters.includes(semester)) {
        availableSemesters.push(semester);
    }   //  end of if availableSemesters includes semester
}   //  end of for

//  hide other semesters
let currentSemesterFieldsets = document.getElementsByClassName(currentSemester);

hideFieldsetsOtherThanCurrentSemesterFieldsets();

function showPreviousSemester() {
    changeCurrentSemester(-1);
    hideFieldsetsOtherThanCurrentSemesterFieldsets();
    window.scrollTo(0, 0);
}

function showNextSemester() {
    changeCurrentSemester(1);
    hideFieldsetsOtherThanCurrentSemesterFieldsets();
    window.scrollTo(0, 0);
}

function changeCurrentSemester(semesterChangeIndex) {
    newCurrentSemesterIndex = availableSemesters.indexOf(currentSemester) + semesterChangeIndex;
    
    if (newCurrentSemesterIndex >= 0 && newCurrentSemesterIndex < availableSemesters.length) {
        currentSemester = availableSemesters[newCurrentSemesterIndex];
        setCurrentSemesterInSpan();
    }

    if (newCurrentSemesterIndex == 0) {
        hideNavigationButton(previousButton);
    }   else if (newCurrentSemesterIndex > 0) {
        showNavigationButton(previousButton);
    }
    
    if (newCurrentSemesterIndex == availableSemesters.length - 1) {
        hideNavigationButton(nextButton);
    }   else if (newCurrentSemesterIndex < availableSemesters.length - 1) {
        showNavigationButton(nextButton);
    }
}

function hideFieldsetsOtherThanCurrentSemesterFieldsets() {
    for (let i = 0; i < coursesInputFieldsets.length; i++) {
        if (coursesInputFieldsets[i].getAttribute("class").search(currentSemester) < 0) {
            coursesInputFieldsets[i].style.display = "none";
        }   else {
            coursesInputFieldsets[i].style.display = "inline-block";
        }
    }
}

function setCurrentSemesterInSpan() {
    currentSemesterSpan = document.getElementById("current-semester");
    currentSemesterSpan.innerHTML = currentSemester;
}

function hideNavigationButton(navigationButton) {
    navigationButton.style.display = "none";
}

function showNavigationButton(navigationButton) {
    navigationButton.style.display = "";
}