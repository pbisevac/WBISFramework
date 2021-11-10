<?php
/** @var $params \app\models\UserModel */
?>

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Dodavanje korisnika</h5>
            <!-- Vertical Form -->
            <form method="post" action="createUserProcess" class="row g-3">
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Ime i prezime</label>
                    <input type="text" class="form-control" id="inputNanme4" name="full_name">
                    <?php
                    if ($params->errors['full_name'] !== null)
                    {
                        echo "<ul>";
                        foreach ($params->errors['full_name'] as $errorMessage)
                            echo "<li class='text-danger'>$errorMessage</li>";
                        echo "</ul>";
                    }
                    ?>
                </div>
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail4"  name="email">
                    <?php
                    if ($params->errors !== null)
                    {
                        echo "<ul>";
                        foreach ($params->errors['email'] as $errorMessage)
                            echo "<li class='text-danger'>$errorMessage</li>";
                        echo "</ul>";
                    }
                    ?>
                </div>
                <div class="col-12">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword4" name="password">
                    <?php
                        if ($params->errors !== null)
                        {
                            echo "<ul>";
                                foreach ($params->errors['password'] as $passwordErrors)
                                    echo "<li class='text-danger'>$passwordErrors</li>";
                            echo "</ul>";
                        }
                    ?>
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form><!-- Vertical Form -->
        </div>
    </div>
</div>