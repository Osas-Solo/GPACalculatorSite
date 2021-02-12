let coursesFieldsetsContainer = document.getElementById("courses-fieldsets-container");

function removeCourse(event) {
    let coursesInputFieldSet = event.target.parentElement;
    coursesFieldsetsContainer.removeChild(coursesInputFieldSet);
}