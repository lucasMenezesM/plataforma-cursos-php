<?php loadPartial("head"); ?>
<?php loadPartial("header"); ?>

<div class="container create-course-form">
    <form method="POST" action="users/register">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input type="email" class="form-control" placeholder="name@example.com" name="email">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" placeholder="Type your name" name="name">
            <label for="floatingInput">Name</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" placeholder="Country" name="country">
            <label for="floatingPassword">Country</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" placeholder="City" name="city">
            <label for="floatingPassword">City</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" placeholder="Password" name="passowrd">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" placeholder="Confirme password" name="confirm_passowrd">
            <label for="floatingPassword">Confirm Password</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
    </form>
</div>

<?php loadPartial("footer"); ?>