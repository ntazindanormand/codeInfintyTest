function postData() {
    var name = document.getElementById("name").value;
    var surname = document.getElementById("surname").value;
    var idNumber = document.getElementById("idNumber").value;
    var dob = document.getElementById("dob").value;

    if (!validateName(name) || !validateName(surname) || !validateIdNumber(idNumber) || !validateDOB(dob, idNumber)) {
        alert("Please check your input and try again.");
        return;
    }

    fetch("/postData", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            name: name,
            surname: surname,
            idNumber: idNumber,
            dob: dob,
        }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            alert(data.error);
            // Repopulate the form or handle the error as needed
        } else if (data.success) {
            showSuccessMessage(data.message);
            clearForm();
        }
    });
}
