<?php loadPartial("head"); ?>
<?php loadPartial("header"); ?>

<div class="container create-course-form">
    <h1>Create Course</h1>
    <form method="POST" action="/courses">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" id="" name="name">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <input type="text" class="form-control" id="" name="description">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Teacher</label>
            <input type="text" class="form-control" id="" name="teacher">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Lessons</label>
            <input type="text" class="form-control" id="" name="lessons">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Hours On-Demand Video</label>
            <input type="text" class="form-control" id="" name="hours_video">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Image</label>
            <input type="text" class="form-control" id="" name="img_url">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


<?php loadPartial("footer"); ?>