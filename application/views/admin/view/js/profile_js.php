
<script>
document.addEventListener('DOMContentLoaded', function() {
    //modal password update
    $("#modalButton1").on("click", function() {
        $('#changePassModal').modal('show');
    });
    $(".toggle-password-icon").on("click", function() {
        var passwordInput = $(this).closest(".input-group").find("input");
        var isPasswordType = passwordInput.attr("type") === "password";
        passwordInput.attr("type", isPasswordType ? "text" : "password");
        $(this).toggleClass("fa-eye-slash", isPasswordType).toggleClass("fa-eye", !isPasswordType);
    });


    $("#currentpassword").on("blur", function() {
        var currentPassword = $(this).val();
        var oldPassword = $('#password').val();
        var currentPasswordValidation = document.getElementById('currentPasswordValidation');

        if (currentPassword !== oldPassword) {
            currentPasswordValidation.textContent = 'Incorrect password';
        } else {
            currentPasswordValidation.textContent = '';
        }
    });

    $("#new_password").on("keyup", function() {
        var new_password = $(this).val();
        var passwordLengthValidation = document.getElementById('passwordLengthValidation');

        if (new_password.length < 6) {
            passwordLengthValidation.textContent = 'Must contain at least 6 characters';
        } else {
            passwordLengthValidation.textContent = '';
        }
    });
    $("#confirm_password").on("blur", function() {
        var confirmPassword = $(this).val();
        var new_password = $('#new_password').val();
        var passwordMatchValidation = document.getElementById('passwordMatchValidation');

        if (confirmPassword !== new_password) {
            passwordMatchValidation.textContent = 'Passwords do not match';
        } else {
            passwordMatchValidation.textContent = '';
        }
    });
    var savePasswordButton = document.getElementById('savePasswordButton');
    var validationMessage = document.getElementById('validationMessage');

    savePasswordButton.addEventListener('click', function() {
        event.preventDefault();
        console.log(savePasswordButton);
        var currentPassInput = document.querySelector('[name="currentpassword"]');
        var newPassInput = document.querySelector('[name="new_password"]');
        var confirmPassInput = document.querySelector('[name="confirm_password"]');
        if (currentPassInput.value.trim() === '' || newPassInput.value.trim() === '' || confirmPassInput
            .value.trim() === '') {
            validationMessage.textContent = 'Please fill in all required fields.';
            //   setTimeout(function () {
            //   validationMessage.textContent = '';
            // }, 3000);
            return;
        } else {
            validationMessage.textContent = '';
        }
        if (currentPasswordValidation.textContent !== '') {
            return;
        }
        if (passwordLengthValidation.textContent !== '') {
            return;
        }
        if (passwordMatchValidation.textContent !== '') {
            return;
        }
        Swal.fire({
            title: 'Confirm Changes',
            text: 'Are you sure you want to save these changes?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: document.getElementById('passForm').action,
                    type: document.getElementById('passForm').method,
                    data: new FormData(document.getElementById('passForm')),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log("Response:", response);
                        var responseData = response;

                        Swal.fire({
                            title: responseData.status === 'success' ?
                                'Success' : 'Error',
                            text: responseData.message,
                            icon: responseData.status === 'success' ?
                                'success' : 'error'
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function(error) {
                        console.log("Error: " + error);
                    }
                });
            }
        });
    });
});

function togglePassword() {
    var passwordField = document.getElementById('passwordDisplay');
    var toggleButton = document.getElementById('togglePassword');
    if (passwordField.style.webkitTextSecurity == 'disc') {
        passwordField.style.webkitTextSecurity = 'none';
        toggleButton.innerHTML = '<i class="fa fa-eye-slash"></i>';
    } else {
        passwordField.style.webkitTextSecurity = 'disc';
        toggleButton.innerHTML = '<i class="fa fa-eye"></i>';
    }
}
</script>