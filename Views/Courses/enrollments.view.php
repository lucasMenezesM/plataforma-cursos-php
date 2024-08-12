<?php loadPartial("head") ?>
<?php loadPartial("header") ?>


<div class="container mt-5" id="enrollments-container">
    <h2>Enrolled Courses</h2>
    <p>See and manage all enrolled courses you have currently</p>
    <?php if (isset($enrollments) && sizeof($enrollments) > 0): ?>
        <?php foreach ($enrollments as $enrollment): ?>
            <?php
            // $timestamp = $enrollment['created_at'];
            $timestamp = strtotime($enrollment['created_at']);
            $created = date("Y/m/d", $timestamp);

            ?>

            <div class="card mb-3 mx-0" style="max-width: 540px; ">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= $enrollment['img_url'] ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $enrollment['course_name'] ?></h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-body-secondary">Enrollment date: <?= $created ?></small></p>
                        </div>
                    </div>
                </div>
                <div>
                    <form action="/enrollments" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="enrollmentId" value="<?= $enrollment['id'] ?>">
                        <button type="submit" class="btn btn-danger btn-sm m-2">Delete enrollment</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <h3>You don't have any course enrolled yet.</h3>
    <?php endif ?>
</div>

<?php loadPartial("footer") ?>