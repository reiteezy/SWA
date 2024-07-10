<section class="login-block">

    <!-- <div class="container-fluid">
<div class="row">
<div class="col-sm-12"> -->

    <form class="md-float-material form-material" id="loginForm">
        <!-- <div class="text-center">
<img src="https://colorlib.com//polygon/admindek/files/assets/images/logo.png" alt="logo.png">
</div> -->
        <div class="auth-box card" style="margin-top: 100px;">
            <div class="card-block">
                <div class="row m-b-20">
                    <div class="col-md-12">
                        <h3 class="text-center txt-primary">Sign In</h3>
                    </div>
                </div>

                <p class="text-muted text-center p-b-5">Welcome Back!</p>
                <div class="form-group form-primary">
                    <input type="text" id="username" name="username" class="form-control" required>
                    <span class="form-bar"></span>
                    <label class="float-label">Username</label>
                </div>
                <div class="form-group form-primary">
                    <input type="password" id="password" name="password" class="form-control" required>
                    <span class="form-bar"></span>
                    <label class="float-label">Password</label>
                </div>
                <!-- <div class="row m-t-25 text-left">
<div class="col-12">
<div class="checkbox-fade fade-in-primary">
<label>
<input type="checkbox" value>
<span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
<span class="text-inverse">Remember me</span>
</label>
</div>
<div class="forgot-phone text-right float-right">
<a href="https://colorlib.com//polygon/admindek/default/auth-reset-password.html" class="text-right f-w-600"> Forgot Password?</a>
</div>
</div>
</div> -->
                <div class="row m-t-30">
                    <div class="col-md-12">
                        <button type="submit" id="loginBtn"
                            class="btn btn-primary btn-md waves-effect text-center m-b-20"
                            style="width: 100%;">LOGIN</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- </div>

</div>

</div> -->


</section>

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
                // if (response.status === 'success') {
                //     toastr.success(response.message);
                window.location.href = response.redirect_url;
                // } else {
                //     toastr.error(response.message);
                // }
            },
            error: function(xhr, status, error) {
                console.log('An error occurred while processing your request.');
                // toastr.error('An error occurred while processing your request.');
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