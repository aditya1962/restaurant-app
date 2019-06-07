var email = document.getElementById("email");
var emailValidation = document.getElementById("emailvalidation");
email.onchange = handleEmail;
var username = document.getElementById("username");
var usernameValidation = document.getElementById("usernamevalidation");
username.onchange = handleUsername;
var password = document.getElementById("password");
var passwordValidation = document.getElementById("passwordvalidation");
password.onchange = handlePassword;
var confirmpassword = document.getElementById("confirmpassword");
var confirmpasswordValidation = document.getElementById("confirmpasswordvalidation");
confirmpassword.onchange = handleConfPassword;

function handleEmail(event)
{
  var emailValid = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(String(event.target.value).toLowerCase());
  if(!(emailValid))
  {
    emailValidation.textContent = "Invalid email";
  }
  else {
    emailValidation.textContent = " ";
  }
}

function handleUsername(event)
{
  let username = event.target.value;
  var error = false;
  if(username.length<7)
  {
    usernameValidation.textContent = "Username should be at least 7 characters";
    error = true;
  }
  if(String(username).toLowerCase === username)
  {
    usernameValidation.textContent = "Username should contain at least one capital character";
    error= true;
  }
  if(!(/\d/.test(username)))
  {
    usernameValidation.textContent = "Username should contain at least one number";
    error = true;
  }
  if(!(/[@#&*]/.test(username)))
  {
    usernameValidation.textContent = "Username should contain at least one special symbol (&*@#)";
    error = true;
  }
  if(!error)
  {
    usernameValidation.textContent=" ";
  }
}

function handlePassword(event)
{
  let password = event.target.value;
  var error = false;
  if(password.length<7)
  {
    passwordValidation.textContent = "Password should be at least 7 characters";
    error = true;
  }
  if(String(password).toLowerCase === password)
  {
    usernameValidation.textContent = "Passsword should contain at least one capital character";
    error= true;
  }
  if(!(/\d/.test(password)))
  {
    passwordValidation.textContent = "Password should contain at least one number";
    error = true;
  }
  if(!(/[@#&*]/.test(password)))
  {
    passwordValidation.textContent = "Password should contain at least one special symbol (&*@#)";
    error = true;
  }
  if(!error)
  {
    passwordValidation.textContent=" ";
  }
}

function handleConfPassword(event)
{
  let confirmpassword = event.target.value;
  var error = false;
  if(confirmpassword.length<7)
  {
    confirmpasswordValidation.textContent = "Confirm password should be at least 7 characters";
    error = true;
  }
  if(String(confirmpassword).toLowerCase === confirmpassword)
  {
    confirmpasswordValidation.textContent = "Confirm password should contain at least one capital character";
    error= true;
  }
  if(!(/\d/.test(confirmpassword)))
  {
    confirmpasswordValidation.textContent = "Confirm password should contain at least one number";
    error = true;
  }
  if(!(/[@#&*]/.test(confirmpassword)))
  {
    confirmpasswordValidation.textContent = "Confirm password should contain at least one special symbol (&*@#)";
    error = true;
  }
  if(!error)
  {
    confirmpasswordValidation.textContent=" ";
  }
}
