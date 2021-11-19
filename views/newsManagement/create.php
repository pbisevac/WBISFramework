<?php
use app\core\Application;

/** @var $params \app\models\NewsManagementModel */


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

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Create news</h5>
        <!-- General Form Elements -->
        <form action="/newsmanagement/createProcess" method="post">
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" name="title_news" class="form-control">
                    <?php
                    if (isset($params) and $params->errors !== null and isset($params->errors['title_news']))
                    {
                        echo "<ul style='padding-top: 10px !important; margin: 0px !important; list-style-type: none;'>";
                        foreach ($params->errors['title_news'] as $errorMessage)
                            echo "<li class='text-danger'>$errorMessage</li>";
                        echo "</ul>";
                    }
                    ?>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Image path</label>
                <div class="col-sm-10">
                    <input type="text" name="multimedia_path" class="form-control">
                    <?php
                    if (isset($params) and $params->errors !== null and isset($params->errors['multimedia_path']))
                    {
                        echo "<ul style='padding-top: 10px !important; margin: 0px !important; list-style-type: none;'>";
                        foreach ($params->errors['multimedia_path'] as $errorMessage)
                            echo "<li class='text-danger'>$errorMessage</li>";
                        echo "</ul>";
                    }
                    ?>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Content</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="content_news" style="height: 100px"></textarea>
                    <?php
                    if (isset($params) and $params->errors !== null and isset($params->errors['content_news']))
                    {
                        echo "<ul style='padding-top: 10px !important; margin: 0px !important; list-style-type: none;'>";
                        foreach ($params->errors['content_news'] as $errorMessage)
                            echo "<li class='text-danger'>$errorMessage</li>";
                        echo "</ul>";
                    }
                    ?>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <select class="form-select" multiple="multiple" name="categories[]" id="categories" aria-label="multiple select example">
                        <option selected="">Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <?php
                    if (isset($params) and $params->errors !== null and isset($params->errors['category']))
                    {
                        echo "<ul style='padding-top: 10px !important; margin: 0px !important; list-style-type: none;'>";
                        foreach ($params->errors['category'] as $errorMessage)
                            echo "<li class='text-danger'>$errorMessage</li>";
                        echo "</ul>";
                    }
                    ?>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Culture Code</label>
                <div class="col-sm-10">
                    <select class="form-select" name="culture_code" aria-label="multiple select example">
                        <option value="sr">Serbian</option>
                        <option value="en">English</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Create News</button>
                </div>
            </div>
        </form><!-- End General Form Elements -->
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#categories").selectpicker({
            liveSearch: true,
            size: 7,
            maxOptions: 7
        }).ajaxSelectPicker({
            ajax: {
                url: "/api/categories/getall",
                type: "get",
                data: function () {
                    var params = {
                        data: '{{{q}}}'
                    };
                    return params;
                }
            },
            preprocessData: function (data) {
                var dataArray = [];
                for (var i = 0; i < data.length; i++) {
                    var curr = data[i];
                    dataArray.push(
                        {
                            'value': curr.id,
                            'text': curr.category_name,
                            'disabled': false
                        }
                    );
                }
                return dataArray;
            },
            preserveSelected: true
            // minLength: 3
        });
    });
</script>