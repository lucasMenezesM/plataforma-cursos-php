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
                <form action="/enrollments" method="POST">
                    <input type="hidden" name="courseId" value="<?= $course["id"] ?>">
                    <input type="hidden" name="userId" value="<?= Session::get("user")["id"] ?>">
                    <button type="submit" class="btn btn-primary btn-lg px-4 me-md-2">Enroll Now</button>
                </form>

            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-4">
                <?php loadPartial("flashMessage") ?>
            </div>

            <?php if (Session::has("user") && Session::get("user")["user_type"] === "admin"): ?>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-4">
                    <a href="/courses/edit/<?= $course["id"] ?>" class="btn btn-success btn-md px-4 me-md-2">Edit</a>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-2">
                    <form action="/courses/<?= $course["id"] ?>" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-md px-4 me-md-2">Delete</button>
                    </form>

                </div>
            <?php endif ?>
        </div>
    </div>

    <div class="mt-5">
        <h4>Comments section:</h4>

        <?php if (Session::has("user")): ?>
            <form action="/comments" method="post">
                <input type="hidden" name="courseId" value="<?= $course["id"] ?>">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                    <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Add comment</button>
            </form>

        <?php endif; ?>
    </div>

    <div class="mt-5">
        <?php if (isset($comments) && sizeof($comments) > 0): ?>
            <?php foreach ($comments as $comment): ?>
                <div class="my-5">
                    <?php
                    $timestamp = strtotime($comment['created_at']);
                    $created = date("Y/m/d", $timestamp);
                    $owned = $comment["user_id"] === Session::get("user")["id"];
                    ?>
                    <h5 class=""><?= $comment["title"] ?></h5>
                    <p class="blog-post-meta"><?= $created ?> by <?= $owned ? "you" : $comment["name"] ?></p>
                    <p><?= $comment["content"] ?></p>

                    <?php if ($owned || Session::get("user")["user_type"] === "admin"): ?>
                        <div class="comment-btns">
                            <form action="/comments" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="commentId" value="<?= $comment["id"] ?>">
                                <input type="hidden" name="userId" value="<?= $comment["user_id"] ?>">
                                <input type="hidden" name="courseId" value="<?= $course["id"] ?>">
                                <button type="submit" class="btn btn-danger btn-sm px-4 me-md-2">Delete</button>
                            </form>
                        </div>
                    <?php endif ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <h5>No comments yet</h5>
        <?php endif; ?>


    </div>
</div>
<?php loadPartial("footer"); ?>