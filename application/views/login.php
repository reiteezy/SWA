<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SWA Login</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background: linear-gradient(to bottom right, #58a6e1, #1e173e);
        background-attachment: fixed;
        overflow: hidden;
    }

    .login-container {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 15px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        overflow: hidden;
        width: 320px;
        max-width: 100%;
        padding: 30px 20px;
    }

    .login-header {
        margin-bottom: 20px;
        color: white;
        text-align: center;
        padding: 20px 0;
        font-size: 24px;
        font-weight: bold;
    }

    .login-form {
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .form-field {
        position: relative;
        margin-bottom: 30px;
    }

    .login-form input {
        color: black;
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        background: rgba(255, 255, 255, 0.1);
        /* color: white; */
        outline: none;
    }

    .login-form input::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }

    .login-form label {
        position: absolute;
        top: 10px;
        left: 10px;
        pointer-events: none;
        transition: 0.3s ease;
        color: rgba(255, 255, 255, 0.8);
        font-size: 16px;
    }

    .login-form input:focus+label,
    .login-form input:not(:placeholder-shown)+label {
        top: -20px;
        left: 10px;
        font-size: 12px;
        color: white;
    }

    .login-form button {
        background-color: black;
        color: white;
        padding: 10px;
        font-size: 16px;
        border: none;
        margin: 20px 0 20px 0;
        border-radius: 5px;
        cursor: pointer;
    }

    .login-form button:hover {
        background-color: #333;
    }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-header">
            LOGIN
        </div>
        <form class="login-form" id="loginForm">
            <div class="form-field">
                <input type="text" id="username" name="username" placeholder="" autocomplete="off" required>
                <label for="username">Username</label>
            </div>
            <div class="form-field">
                <input type="password" id="password" name="password" placeholder="" autocomplete="off" required>
                <label for="password">Password</label>
            </div>
            <button type="button" id="loginBtn">SIGN IN</button>
        </form>
        <!-- <div class="forgot-password">
            <a href="#">Forgot password?</a>
        </div> -->
    </div>
</body>
<script type="text/javascript" src="<?= base_url('assets/'); ?>bower_components/jquery/js/jquery-3.7.1.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/'); ?>assets/js/toastr.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    function submitLoginForm() {
        var formData = $('#loginForm').serialize();

        $.ajax({
            url: '<?php echo base_url() ?>LoginController/valafclog/',
            type: 'post',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    toastr.success(response.message);
                    window.location.href = response.redirect_url;
                } else {
                    toastr.error(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log('An error occurred while processing your request.');
                toastr.error('An error occurred while processing your request.');
            }
        });
    }

    $('#loginForm').on('keypress', function(event) {
        if (event.which === 13) {
            event.preventDefault();
            submitLoginForm();
        }
    });

    $('#loginBtn').on('click', function(event) {
        event.preventDefault();
        submitLoginForm();
    });
});
</script>

</html>