function loginVisibilityPassword() {
  var passwordInput = document.getElementById("password");
  var iconEye = document.getElementById("iconEyeLogin");
  
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    iconEye.classList.remove("bi-eye");
    iconEye.classList.add("bi-eye-slash");
  } else {
    passwordInput.type = "password";
    iconEye.classList.remove("bi-eye-slash");
    iconEye.classList.add("bi-eye");
  }
  }
  

  function signupVisibilityPassword() {
    var passwordInput = document.getElementById("cpassword");
    var iconEye = document.getElementById("iconEyeSignup");
    
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      iconEye.classList.remove("bi-eye");
      iconEye.classList.add("bi-eye-slash");
    } else {
      passwordInput.type = "password";
      iconEye.classList.remove("bi-eye-slash");
      iconEye.classList.add("bi-eye");
    }
  }
  

var showPasswordButton = document.getElementById("showLoginPassword");
showPasswordButton.addEventListener("click", loginVisibilityPassword);

var showPasswordButton = document.getElementById("showSignupPassword");
showPasswordButton.addEventListener("click", signupVisibilityPassword);