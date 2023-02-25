function loginVisibilityPassword() {
    var passwordField = document.querySelector("#password");
    var icon = document.querySelectorAll(".glyphicon");
    if (passwordField.type === "password") {
      passwordField.type = "text";
      icon.classList.remove("glyphicon-eye-open");
      icon.classList.add("glyphicon-eye-close");
    } else {
      passwordField.type = "password";
      icon.classList.remove("glyphicon-eye-close");
      icon.classList.add("glyphicon-eye-open");
    }
  }
  

  function signupVisibilityPassword() {
    var passwordInput = document.getElementById("cpassword");
    var iconEye = document.getElementById("iconEye");
    
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
  
  var showPasswordButton = document.getElementById("showPassword");
  showPasswordButton.addEventListener("click", signupVisibilityPassword);