//Update
function updateVisibilityPassword() {
    var passwordInput = document.getElementById("password");
    var iconEye = document.getElementById("iconEyeUpdate");
    
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

var showPasswordButton = document.getElementById("showUpdatePassword");
showPasswordButton.addEventListener("click", updateVisibilityPassword);