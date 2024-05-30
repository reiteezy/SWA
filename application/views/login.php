<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <style>
        .floating-label {
            position: relative;
            margin-bottom: 1rem;
        }
        .floating-label input {
            border: 1px solid #ccc;
            border-radius: 0.25rem;
            padding: 1rem;
            width: 100%;
            font-size: 1rem;
            outline: none;
        }
        .floating-label label {
            position: absolute;
            top: 1rem;
            left: 1rem;
            font-size: 1rem;
            color: #999;
            pointer-events: none;
            transition: all 0.2s ease;
        }
        .floating-label input:focus ~ label,
        .floating-label input:not(:placeholder-shown) ~ label {
            top: -0.75rem;
            left: 0.75rem;
            font-size: 0.75rem;
            color: #1d4ed8;
            background-color: #fff;
            padding: 0 0.25rem;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col items-center justify-center bg-cover bg-center" style="background-image: url('<?php echo base_url();?>assets/backend/img/logo/loginbg.jpg');">
    <div class="w-full max-w-sm bg-white bg-opacity-90 p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Login</h2>
        <form id="loginForm" class="space-y-6">
            <div class="floating-label">
                <input id="username" name="username" type="text" placeholder=" " required>
                <label for="username">Username</label>
            </div>
            <div class="floating-label">
                <input id="password" name="password" type="password" placeholder=" " required>
                <label for="password">Password</label>
            </div>
            <div>
                <button type="submit" id="loginBtn" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Sign in
                </button>
            </div>
        </form>
    </div>
    <footer class="mt-8 text-white">
        <p>&copy; 2024 AGC. All rights reserved.</p>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
</body>
</html>
