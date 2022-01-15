const email = document.getElementById("email");
const password = document.getElementById("password");
const repeatPassword = document.getElementById("repeatPassword");
const emailRegex = "[a-z0-9]+@[a-z]+.[a-z]{2,3}";
const passwordRegex = `(?=.{8,})`;

function formSignup() {
  if (emailValidate() && passwordValidate() && passwordMatching()) {
    return true;
  } else {
    return false;
  }
}

function emailValidate() {
  const msgEmail = document.getElementById("msgEmail");
  if (email.value.match(emailRegex)) {
    msgEmail.innerHTML = "Valid";
    msgEmail.style.color = "green";
    return true;
  } else {
    msgEmail.innerHTML = "Invalid Email";
    msgEmail.style.color = "red";
    return false;
  }
}

function passwordValidate() {
  const msgPassword = document.getElementById("msgPassword");
  if (password.value.match(passwordRegex)) {
    msgPassword.innerHTML = "Valid";
    msgPassword.style.color = "green";
    return true;
  } else {
    msgPassword.innerHTML = "Password should be at least 8 characters";
    msgPassword.style.color = "red";
    return false;
  }
}

function passwordMatching() {
  const msgMatch = document.getElementById("msgMatch");
  if (password.value === repeatPassword.value) {
    msgMatch.innerHTML = "Password Matched";
    msgMatch.style.color = "green";
    return true;
  } else {
    msgMatch.innerHTML = "Password Didn't Match";
    msgMatch.style.color = "red";
    return false;
  }
}
