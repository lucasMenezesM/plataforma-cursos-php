<?php loadPartial("head") ?>
<?php loadPartial("header") ?>
<div class="px-4 pt-5 my-1 text-center border-bottom">
    <h3 class="display-4 fw-bold text-body-emphasis">Error <?= $statusCode ?></h3>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4"><?= $message ?></p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
            <a href="/" class="btn btn-primary btn-lg px-4 me-sm-3">Go back to home</a>
        </div>
    </div>
    <div class="overflow-hidden" style="max-height: 55vh;">
        <div class="container px-5">
            <img src="/images/error-image.jpg" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" height="500" loading="lazy">
        </div>
    </div>
</div>
<?php loadPartial("footer") ?>