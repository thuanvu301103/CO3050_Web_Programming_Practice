function submit() {
    var fname = document.getElementById("fname").value;
    if (fname.length === 0) {
        return alert("Please enter your first name");
    }
    if (fname.length < 2 || fname.length > 30) {
        return alert("First Name should have 2-30 characters");
    }

    var lname = document.getElementById("lname").value;
    if (lname.length === 0) {
        return alert("Please enter your last name");
    }
    if (lname.length < 2 || lname.length > 30) {
        return alert("Last Name should have 2-30 characters");
    }

    var email = document.getElementById("email").value;
    if (email.length === 0) {
        return alert("Please enter your email address");
    }
    var reg = /^[a-zA-Z0-9\.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)*/;
    if (!email.match(reg)) {
        return alert("Invalid email address!");
    }

    var password = document.getElementById("password").value;
    if (password.length === 0) {
        return alert("Please set your password ");
    }
    if (password.length < 2 || password.length > 30) {
        return alert("Password's length should be 2-30 characters");
    ]

    var dd = document.getElementById("dd").value;
    var mm = document.getElementById("mm").value;
    var yyyy = document.getElementById("yyyy").value;
    if (dd == "dd" || mm == "mm" || yyyy == "yyyy") {
        return alert("Please choose your birthday!");
    }
    if ((mm == "2" && (dd == "30" || dd == "31")) ||
        ((mm == "4" || mm == "6" || mm == "9" || mm == "11") && dd == "31")) {
        return alert("Invalid birthday");
    }

    var genderele = document.getElementsByName("gender");
    var gender;
    var flag = false;
    for (var i = 0; i < genderele.length; i++) {
        if (genderele[i].checked) {
            gender = genderele[i].value;
            flag = true;
        }
    }
    if (flag == false) {
        return alert("Please choose your gender!");
    }

    var country = document.getElementById("country").value;
    if (country == "Choose country") {
        return alert("Please choose your Country!");
    }

    var about = document.getElementById("about").value;
    if (about.length === 0) {
        return alert("Please fill in About section!");
    }
    if (about.length > 10000) {
        return alert("The About section contains maximum of 10,000 characters!");
    }

    // All data has been filled in
    return alert("Complete!");
}

function reset() {
    document.getElementById("sign-up").reset();
}