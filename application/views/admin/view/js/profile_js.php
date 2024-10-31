<script>
document.addEventListener('DOMContentLoaded', function() {
    //modal password update
    document.getElementById('togglePassword').addEventListener('change', function() {
        const newPasswordField = document.getElementById('new_password');
        const confirmPasswordField = document.getElementById('confirm_password');

        if (this.checked) {
            newPasswordField.type = 'text';
            confirmPasswordField.type = 'text';
        } else {
            newPasswordField.type = 'password';
            confirmPasswordField.type = 'password';
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
        // var currentPassInput = document.querySelector('[name="currentpassword"]');
        var newPassInput = document.querySelector('[name="new_password"]');
        var confirmPassInput = document.querySelector('[name="confirm_password"]');
        if (newPassInput.value.trim() === '' || confirmPassInput
            .value.trim() === '') {
            validationMessage.textContent = 'Please fill in all required fields.';
            //   setTimeout(function () {
            //   validationMessage.textContent = '';
            // }, 3000);
            return;
        } else {
            validationMessage.textContent = '';
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


    var saveEmailBtn = document.getElementById('saveEmailInfoBtn');
    var emailValidationMessage = document.getElementById('emailValidationMessage');

    saveEmailBtn.addEventListener('click', function() {
        event.preventDefault();
        console.log(saveEmailBtn);
        // var currentPassInput = document.querySelector('[name="currentpassword"]');
        var emailAddInput = document.querySelector('[name="email_add"]');
        var emailPassInput = document.querySelector('[name="app_email_pass"]');
        if (emailAddInput.value.trim() === '' || emailPassInput
            .value.trim() === '') {
                emailValidationMessage.textContent = 'Please fill in all required fields.';
            //   setTimeout(function () {
            //   validationMessage.textContent = '';
            // }, 3000);
            return;
        } else {
            emailValidationMessage.textContent = '';
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
                    url: document.getElementById('emailInfoForm').action,
                    type: document.getElementById('emailInfoForm').method,
                    data: new FormData(document.getElementById('emailInfoForm')),
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
</script>