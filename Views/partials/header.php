<header class="p-3 text-bg-dark" id="header">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                DevLearn
                <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="currentColor" class="bi bi-code-slash mx-2" viewBox="0 0 16 16">
                    <path d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0m6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0" />
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 text-white">Home</a></li>
                <li><a href="/courses" class="nav-link px-2 text-white">All Courses</a></li>
                <li><a href="/" class="nav-link px-2 text-white">About</a></li>
                <?php if (Session::has("user")): ?>
                    <li><a href="/enrollments" class="nav-link px-2 text-white">My Courses</a></li>
                <?php endif; ?>
            </ul>


            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control form-control-dark text-bg-white" placeholder="Search Course" aria-label="Search">
            </form>

            <div class="text-end">
                <?php if (Session::has("user") && Session::get("user")["user_type"] === "admin"): ?>
                    <a href="/users/logout" class="btn btn-outline-light me-2">Logout</a>
                    <a href="/users/register" class="btn btn-primary">Register new user</a>
                    <a href="/courses/create" class="btn btn-primary mx-2">Create Course</a>
                <?php elseif (Session::has("user")): ?>
                    <a href="/users/logout" class="btn btn-outline-light me-2">Logout</a>
                <?php else: ?>
                    <a href="/users/login" class="btn btn-outline-light me-2">Login</a>
                    <a href="/users/register" class="btn btn-primary">Sign-up</a>
                <?php endif ?>



            </div>
        </div>
    </div>
</header>