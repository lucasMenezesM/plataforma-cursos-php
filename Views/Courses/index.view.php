<?php loadPartial("head"); ?>
<?php loadPartial("header"); ?>

<div class="container">

    <div class="px-4 pt-5 my-5 text-center border-bottom">
        <h1 class="display-4 fw-bold text-body-emphasis">See all available courses</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Choose a course the prepare yourself with the most popular technologies of the world</p>

            <?php if (!Session::has("user")): ?>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
                    <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3">Login now</button>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">Create your account</button>
                </div>
            <?php endif ?>

        </div>
        <div class="overflow-hidden" style="max-height: 30vh;">
            <div class="container px-5">
                <img src="/images/all-courses-banner.jpg" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" height="500" loading="lazy">
            </div>
        </div>
        <?php loadPartial("flashMessage"); ?>
    </div>

    <div id="container-all-courses">
        <?php if (isset($courses)): ?>
            <?php foreach ($courses as $course): ?>
                <div class="card" style="width: 18rem;">
                    <?php if (isset($course["img_url"])): ?>
                        <img src="<?= $course["img_url"] ?>" class="card-img-top" alt="...">
                    <?php endif ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= $course["name"] ?></h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Teacher: <?= $course["teacher"] ?></li>
                        <li class="list-group-item"><?= $course["lessons"] ?> Lessons</li>
                        <li class="list-group-item">Hours video on demand: <?= $course["hours_video"] ?></li>
                    </ul>
                    <div class="card-body">
                        <a href="/courses/<?= $course["id"] ?>" class="card-link">See details</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif ?>

    </div>

</div>

<?php loadPartial("footer"); ?>