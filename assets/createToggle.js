//Create
function createVisibilityPassword() {
    var passwordInput = document.getElementById("createPassword");
    var iconEye = document.getElementById("iconEyeCreate");
    
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

var showPasswordButton = document.getElementById("showCreatePassword");
showPasswordButton.addEventListener("click", createVisibilityPassword);


