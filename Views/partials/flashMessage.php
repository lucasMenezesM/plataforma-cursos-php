<?php if (Session::has("success_messages")): ?>
    <?php foreach (Session::get("success_messages") as $message): ?>
        <div class="alert alert-success" role="alert">
            <?= $message["message"] ?>
        </div>
    <?php endforeach ?>
    <?php Session::clearOne("success_messages") ?>
<?php endif; ?>

<?php if (Session::has("error_messages")): ?>
    <?php foreach (Session::get("error_messages") as $error): ?>
        <div class="alert alert-danger" role="alert">
            <?= $error["message"] ?>
        </div>
    <?php endforeach ?>
    <?php Session::clearOne("error_messages") ?>

<?php endif; ?>