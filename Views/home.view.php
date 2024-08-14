<?php loadPartial("head"); ?>
<?php loadPartial("header"); ?>

<?php loadPartial("flashMessage"); ?>

<?php loadPartial("showcase"); ?>
<?php loadPartial("features"); ?>


<div class="container" id="carousel-container">


    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/home-image-1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Stay Updated</h5>
                    <p>Subscribe to DevLearn and access up-to-date courses with the latest tech trends. Stay ahead in your field with fresh, relevant content.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/home-image-2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Exclusive Resources</h5>
                    <p>Gain access to advanced tutorials, expert webinars, and exclusive materials. Benefit from premium content to further enhance your skills.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/home-image-3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Priority Support</h5>
                    <p>As a subscriber, enjoy fast support and connect with an active community. Get help when you need it and network with other professionals.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<?php loadPartial("footer"); ?>