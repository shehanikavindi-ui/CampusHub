function showToast(msg, type = 'error') {
    const t = document.getElementById('toast-msg');
    const text = document.getElementById('toast-text');
    const icon = document.getElementById('toast-icon');

    text.textContent = msg;

    if (type === 'success') {
        t.style.backgroundColor = '#15803D';
        t.style.boxShadow = '0 8px 24px rgba(21,128,61,0.28)';
        icon.className = 'bi bi-check-circle-fill';
    } else if (type === 'warning') {
        t.style.backgroundColor = '#D97706';
        t.style.boxShadow = '0 8px 24px rgba(217,119,6,0.28)';
        icon.className = 'bi bi-exclamation-triangle-fill';
    } else {
        t.style.backgroundColor = '#DC2626';
        t.style.boxShadow = '0 8px 24px rgba(220,38,38,0.28)';
        icon.className = 'bi bi-x-circle-fill';
    }

    t.classList.add('show');
    setTimeout(() => t.classList.remove('show'), 3000);
}

function saveChanges() {
    var fname = document.getElementById('firstName');
    var lname = document.getElementById('lastName');
    var phone = document.getElementById('phone');
    var dob = document.getElementById('dob');
    var year = document.getElementById('year');

    var form = new FormData();
    form.append("fn", fname.value);
    form.append("ln", lname.value);
    form.append("p", phone.value);
    form.append("dob", dob.value);
    form.append("y", year.value);


    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText.trim();
            if (response === "success") {
                showToast("Account details updated successfully!", "success");
                setTimeout(() => {
                    window.location.reload();
                }, 1500);
            } else {
                showToast("Something went wrong. Please try again.");
            }
        }
    }
    request.open("POST", "/CampusHub/process/updateProfile.php", true);
    request.send(form);
}