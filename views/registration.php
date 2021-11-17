<?php
use app\core\Application;

/** @var $params \app\models\AuthModel */


if (Application::$app->session->getFlash("success")) {
    $message = Application::$app->session->getFlash("success");

    echo "<script>";
    echo "toastr.success('$message')";
    echo "</script>";
}

if (Application::$app->session->getFlash("error")) {
    $message = Application::$app->session->getFlash("error");
    echo "<script>";
    echo "toastr.error('$message')";
    echo "</script>";
}
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
                <a href="news" class="logo d-flex align-items-center w-auto">
                    <img src="assets/img/logo.png" alt="">
                    <span class="d-none d-lg-block">News</span>
                </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

                <div class="card-body">

                    <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                        <p class="text-center small">Enter your personal details to create account</p>
                    </div>

                    <form method="post" action="registrationProcess" class="row g-3 needs-validation" novalidate>
                        <div class="col-12">
                            <label for="yourUsername" class="form-label">Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="text" name="email" class="form-control" id="email" required>
                                <?php
                                if (isset($params) and $params->errors !== null and isset($params->errors['email']))
                                {
                                    echo "<ul style='padding-top: 10px !important; margin: 0px !important; list-style-type: none;'>";
                                    foreach ($params->errors['email'] as $errorMessage)
                                        echo "<li class='text-danger'>$errorMessage</li>";
                                    echo "</ul>";
                                }
                                ?>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="yourPassword" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                            <?php
                            if (isset($params) and $params->errors !== null and isset($params->errors['password']))
                            {
                                echo "<ul style='padding-top: 10px !important; margin: 0px !important; list-style-type: none;'>";
                                foreach ($params->errors['password'] as $errorMessage)
                                    echo "<li class='text-danger'>$errorMessage</li>";
                                echo "</ul>";
                            }
                            ?>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">Create Account</button>
                        </div>
                        <div class="col-12">
                            <p class="small mb-0">Already have an account? <a href="login">Log in</a></p>
                        </div>
                    </form>

                </div>
            </div>

            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>

        </div>
    </div>
</div>
