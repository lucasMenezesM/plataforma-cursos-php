<?php loadPartial("head"); ?>
<?php loadPartial("header"); ?>

<div class="container create-course-form">
    <h1>Edit Course</h1>
    <?php loadPartial("flashMessage"); ?>
    <form method="POST" action="/courses/<?= $course["id"] ?? '' ?>">
        <input type="hidden" name="_method" value="PUT">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" id="" name="name" value="<?= $course["name"] ?? '' ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <input type="text" class="form-control" id="" name="description" value="<?= $course["description"] ?? '' ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Teacher</label>
            <input type="text" class="form-control" id="" name="teacher" value="<?= $course["teacher"] ?? '' ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Lessons</label>
            <input type="text" class="form-control" id="" name="lessons" value="<?= $course["lessons"] ?? '' ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Hours On-Demand Video</label>
            <input type="text" class="form-control" id="" name="hours_video" value="<?= $course["hours_video"] ?? '' ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Image</label>
            <input type="text" class="form-control" id="" name="img_url" value="<?= $course["img_url"] ?? '' ?>">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


<?php loadPartial("footer"); ?>