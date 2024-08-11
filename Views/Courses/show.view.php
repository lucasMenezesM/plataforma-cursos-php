<?php loadPartial("head"); ?>
<?php loadPartial("header"); ?>
<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="<?= $course["img_url"] ?>" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><?= $course["name"] ?></h1>
            <p class="lead"><?= $course["description"] ?></p>
            <p class="lead my-0">Teacher: <?= $course["teacher"] ?></p>
            <p class="lead my-0">Lessons: <?= $course["lessons"] ?></p>
            <p class="lead my-0"><?= $course["hours_video"] ?> hours video</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-4">

                <a class="btn btn-primary btn-lg px-4 me-md-2">Enroll Now</a>
                <a class="btn btn-outline-secondary btn-lg px-4">Default</a>
            </div>

            <?php if (Session::has("user") && Session::get("user")["user_type"] === "admin"): ?>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-4">
                    <a href="/courses/edit/<?= $course["id"] ?>" class="btn btn-success btn-lg px-4 me-md-2">Edit</a>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-2">
                    <form action="/courses/<?= $course["id"] ?>" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-lg px-4 me-md-2">Delete</button>
                    </form>

                </div>
            <?php endif ?>
        </div>
    </div>

    <div class="mt-3">
        <h4>Comments:</h4>
    </div>
</div>
<?php loadPartial("footer"); ?>