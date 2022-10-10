require('./bootstrap');

const form_register = document.getElementById("form-register");
if (form_register) {
    form_register.onsubmit = function () { return validationRegister() };
}

const form_edit = document.getElementById("form-edit");
if (form_edit) {
    form_edit.onsubmit = function () { return validationEdit() };
}

const delete_js = document.getElementById('delete-js');
if (delete_js) {
    delete_js.addEventListener('click', function () {
        const delete_popup = document.querySelector('div.my-delete');
        delete_popup.classList.remove('d-none');
        document.getElementById('cancel-btn').addEventListener('click', function () {
            document.getElementById('password').value = "";
            delete_popup.classList.add('d-none');
        });

    });
}

function validationRegister() {
    const name = document.getElementById('name').value;
    const lastname = document.getElementById('lastname').value;
    const address = document.getElementById('address').value;
    const city = document.getElementById('city').value;
    const postal_code = document.getElementById('postal_code').value;
    const mySpecializations = document.getElementById('mySpecialization');
    const specializations = mySpecializations.querySelectorAll('input');
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const password_confirm = document.getElementById('password-confirm').value;
    let mySpecialization;
    specializations.forEach(specialization => {
        if (specialization.checked) {
            mySpecialization = true;
        }
    });
    if (name != "" & lastname != "" & address != "" & city != "" & postal_code != "" & mySpecialization & email != "" & password != "" & password_confirm != "") {
        if (password.length < 8) {
            swal('password troppo corta');
            return false;
        }
        if (password != password_confirm) {
            swal('le due password non coincidono');
            return false;
        }
        if (!email.includes('@') || !email.includes('.')) {
            swal('email non corretta');
            return false;
        }
    } else {
        swal('compila tutti i campi obbligatori');
        return false;
    }
    return true;
}

function validationEdit() {
    const name = document.getElementById('name').value;
    const lastname = document.getElementById('lastname').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const service = document.getElementById('service').value;
    const address = document.getElementById('address').value;
    const city = document.getElementById('city').value;
    const postal_code = document.getElementById('postal_code').value;
    const cv = document.getElementById('cv').value;
    const mySpecializations = document.getElementById('mySpecialization');
    const specializations = mySpecializations.querySelectorAll('input');
    let mySpecialization;

    specializations.forEach(specialization => {
        if (specialization.checked) {
            mySpecialization = true;
        }
    });
    if (name != "" & lastname != "" & email != "" & service != "" & address != "" & city != "" & postal_code != "" & cv != "" & mySpecialization) {
        if (!email.includes('@') || !email.includes('.')) {
            swal('email non corretta');
            return false;
        }
        if (cv.length < 10) {
            swal('cv troppo corto');
            return false;
        }
        if (cv.length > 10000) {
            swal('cv troppo lungo');
            return false;
        }
    } else {
        swal('compila tutti i campi obbligatori');
        return false;
    }
    return true;
}