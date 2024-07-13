<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/styles.css" />
    <link rel="icon" href="<?php echo URLROOT; ?>/assets/images/favicon.png" />
    <title>Free E-Book | Start Your Own Blog</title>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container">
            <a href="<?php echo URLROOT; ?>/pages" class="navbar-brand">
                <img src="<?php echo URLROOT; ?>/assets/images/logo.png" alt="" width="225" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="<?php echo URLROOT; ?>/users/login" class="nav-link fw-semibold">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo URLROOT; ?>/users/register" class="nav-link fw-semibold">Register</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo URLROOT; ?>/pages/about" class="nav-link btn btn-outline-light fw-semibold px-4 mx-4">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="header">
        <!-- Hero -->
        <div class="hero text-white pt-7">
            <div class="container-xl">
                <div class="row">
                    <div class="col-md-6">
                        <div class="image-container mb-5 px-4">
                            <img src="<?php echo URLROOT; ?>/assets/images/header-ebook.png" alt="" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-container p-4 d-flex flex-column justify-content-center h-100 mb-5">
                            <h1 class="display-3 fw-bold">Welcome to <?php echo SITENAME; ?></h1>
                            <p class="lead">
                                Your Professional Online Business Solution For Small And Medium Scale Business Enterprise
                            </p>

                            <!-- Form -->
                            <div class="form-container text-center">
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-lg text-white">
                                        Register Your Business
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <svg class="frame-decoration" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1920 192.275">
            <defs>
                <style>
                    .cls-1 {
                        fill: #f3f6f9;
                    }
                </style>
            </defs>
            <title>frame-decoration</title>
            <path class="cls-1" d="M0,158.755s63.9,52.163,179.472,50.736c121.494-1.5,185.839-49.738,305.984-49.733,109.21,0,181.491,51.733,300.537,50.233,123.941-1.562,225.214-50.126,390.43-50.374,123.821-.185,353.982,58.374,458.976,56.373,217.907-4.153,284.6-57.236,284.6-57.236V351.03H0V158.755Z" transform="translate(0 -158.755)" />
        </svg>
    </header>

    <!-- Icons -->
    <section class="icons bg-light pb-5">
        <div class="container-xl">
            <div class="row hstack g-4">
                <div class="col-md-4 d-flex gap-4">
                    <i class="fas fa-user fa-3x text-primary"></i>
                    <div>
                        <h5 class="fw-bold">Unlock Your Blogging Potential</h5>
                        <p class="text-muted">
                            Discover the key to unleashing your true blogging potential. Our
                            ebook provides expert guidance on creating compelling content
                        </p>
                    </div>
                </div>

                <div class="col-md-4 d-flex gap-4">
                    <i class="fas fa-rocket fa-3x text-secondary"></i>
                    <div>
                        <h5 class="fw-bold">Skyrocket Your Blog's Success</h5>
                        <p class="text-muted">
                            Take your blog to new heights with our proven strategies for
                            driving traffic and increasing your blog's visibility.
                        </p>
                    </div>
                </div>

                <div class="col-md-4 d-flex gap-4">
                    <i class="fas fa-dollar fa-3x text-primary"></i>
                    <div>
                        <h5 class="fw-bold">Monetize Your Blog</h5>
                        <p class="text-muted">
                            Turn your passion for blogging into a profitable venture. Our
                            ebook reveals tried-and-tested monetization strategies
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Details -->
    <section id="details" class="details my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container d-flex flex-column justify-content-center h-100">
                        <h2 class="display-6">Unlock Your Blogging Potential</h2>
                        <p>
                            Are you ready to unleash your true blogging potential? Our
                            ebook, "Blog Mastery," provides you with the tools and knowledge
                            to take your blog to the next level.
                        </p>
                        <ul class="list-group list-group-flush lh-lg">
                            <li class="list-group-item">
                                <i class="fas fa-square text-primary"></i>
                                <strong>Unleash Your Creativity:</strong> Our ebook empowers
                                you to unleash your creativity and express your unique voice
                                through your blog.
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-square text-primary"></i>
                                <strong>Maximize Your Reach:</strong> Learn how to optimize
                                your blog for search engines.
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-square text-primary"></i>
                                <strong>Monetization Strategies:</strong> Discover various
                                monetization strategies, such as sponsored content & affiliate
                                marketing.
                            </li>
                        </ul>
                        <a class="btn btn-primary text-white mt-4 align-self-start" data-bs-toggle="modal" data-bs-target="#modal1">Get Your Copy Now</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="image-container p-5">
                        <img src="<?php echo URLROOT; ?>/assets/images/description.png" alt="" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal 1 -->
    <div id="modal1" class="modal fade">
        <div class="modal-dialog modal-lg mt-7">
            <div class="modal-content p-5">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="image-container">
                            <img src="<?php echo URLROOT; ?>/assets/images/description.png" alt="" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-container">
                            <h2 class="display-6">Unlock Your Blogging Potential</h2>
                            <p>
                                Are you ready to unleash your true blogging potential? Our
                                ebook, "Blog Mastery," provides you with the tools and
                                knowledge to take your blog to the next level.
                            </p>
                            <ul class="list-group list-group-flush lh-lg">
                                <li class="list-group-item">
                                    <i class="fas fa-square text-primary"></i>
                                    <strong>Unleash Your Creativity:</strong> Our ebook empowers
                                    you to unleash your creativity and express your unique voice
                                    through your blog.
                                </li>
                                <li class="list-group-item">
                                    <i class="fas fa-square text-primary"></i>
                                    <strong>Maximize Your Reach:</strong> Learn how to optimize
                                    your blog for search engines.
                                </li>
                                <li class="list-group-item">
                                    <i class="fas fa-square text-primary"></i>
                                    <strong>Monetization Strategies:</strong> Discover various
                                    monetization strategies, such as sponsored content &
                                    affiliate marketing.
                                </li>
                            </ul>
                            <a href="" class="btn btn-primary text-white">Free Download</a>
                            <button class="btn btn-light" data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statement -->
    <section class="statement mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-container bg-light p-5 rounded-5">
                        <h2>Master the Art of Blogging Excellence</h2>
                        <p>
                            Transform your blog from a mere hobby to a thriving online
                            business with our ebook, "Blog Mastery: Monetize Your Passion."
                            This invaluable resource is your roadmap to turning your blog
                            into a profitable venture. Learn how to monetize your content
                            through various strategies such as sponsored posts, affiliate
                            marketing, and product creation. Gain insights into building a
                            strong brand, attracting lucrative partnerships, and maximizing
                            your earning potential. Take the leap and unlock the financial
                            rewards of your blogging journey.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Details 2 -->
    <section class="details my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="image-container p-5">
                        <img src="images/author.png" alt="" class="img-fluid" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-container d-flex flex-column justify-content-center h-100">
                        <h2 class="display-6">Craft Remarkable Content</h2>
                        <p>
                            Discover techniques for effective storytelling, engaging
                            visuals, and compelling calls-to-action. Unlock the secrets of
                            creating a consistent and authentic brand voice that sets you
                            apart from the competition.
                        </p>
                        <ul class="list-group list-group-flush lh-lg">
                            <li class="list-group-item">
                                <i class="fas fa-square text-primary"></i>
                                <strong>Embrace Your Unique Voice:</strong> Learn how to
                                harness the power of your unique voice.
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-square text-primary"></i>
                                <strong>Spark Creativity:</strong> Explore techniques to spark
                                creativity and overcome writer's block.
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-square text-primary"></i>
                                <strong>Engage Your Readers:</strong> Discover strategies for
                                creating content that engages your readers on a deeper level.
                            </li>
                        </ul>
                        <a class="btn btn-primary text-white mt-4 align-self-start" data-bs-toggle="modal" data-bs-target="#modal2">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal 2 -->
    <div id="modal2" class="modal fade">
        <div class="modal-dialog modal-lg mt-7">
            <div class="modal-content p-5">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="image-container">
                            <img src="images/author.png" alt="" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-container">
                            <h3 class="display-6">Craft Remarkable Content</h3>

                            <p>
                                Discover techniques for effective storytelling, engaging
                                visuals, and compelling calls-to-action. Unlock the secrets of
                                creating a consistent and authentic brand voice that sets you
                                apart from the competition.
                            </p>
                            <ul class="list-group list-group-flush lh-lg mb-3">
                                <li class="list-group-item">
                                    <i class="fas fa-square text-primary"></i>
                                    <strong>Embrace Your Unique Voice:</strong> Learn how to
                                    harness the power of your unique voice.
                                </li>
                                <li class="list-group-item">
                                    <i class="fas fa-square text-primary"></i>
                                    <strong>Spark Creativity:</strong> Explore techniques to
                                    spark creativity and overcome writer's block.
                                </li>
                                <li class="list-group-item">
                                    <i class="fas fa-square text-primary"></i>
                                    <strong>Engage Your Readers:</strong> Discover strategies
                                    for creating content that engages your readers on a deeper
                                    level.
                                </li>
                            </ul>
                            <a href="" class="btn btn-primary text-white">Free Download</a>
                            <button class="btn btn-light" data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials -->
    <section class="testimonials mb-8">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="" class="rounded-circle mb-3" />
                    <p class="lead fst-italic">
                        "This ebook completely transformed my blogging journey. The
                        practical strategies and valuable insights helped me take my blog
                        to new heights. I highly recommend it!"
                    </p>
                    <p class="fw-bold">Kenny Smith - Portland, ME</p>
                </div>

                <div class="col-md-4 text-center">
                    <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="" class="rounded-circle mb-3" />
                    <p class="lead fst-italic">
                        "I'm so grateful for this ebook! It provided me with the guidance
                        and inspiration I needed to create engaging content and build a
                        loyal readership. It's a game-changer!"
                    </p>
                    <p class="fw-bold">Laurie Mitchell - Miami, FL</p>
                </div>

                <div class="col-md-4 text-center">
                    <img src="https://randomuser.me/api/portraits/men/31.jpg" alt="" class="rounded-circle mb-3" />
                    <p class="lead fst-italic">
                        "I can't recommend this ebook enough. It's a treasure of blogging
                        wisdom. It helped me unlock my creativity, connect with my
                        audience, and achieve remarkable results."
                    </p>
                    <p class="fw-bold">Henry White - Boston, MA</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Download -->
    <section class="download">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="image-container mt-n6 mb-5">
                        <img src="images/download-ebook.png" alt="" class="img-fluid" />
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="text-container text-white d-flex flex-column justify-content-center h-100 mb-5">
                        <h2 class="fw-bold">Get Your Free Ebook Now</h2>
                        <p>
                            Unlock the power of knowledge and take your blogging journey to
                            the next level. Our ebook, "Blog Mastery: The Ultimate Guide to
                            Blogging Success," is your key to success.
                        </p>

                        <!-- Form -->
                        <form>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Email Address" />
                                <button class="btn btn-primary text-white rounded-end">
                                    Download
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Social -->
    <section class="social text-bg-dark py-6 overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center fs-4">
                    <p>
                        Stay connected and join our vibrant community. For any inquiries
                        or assistance, feel free to reach out to us
                    </p>
                    <div class="social-icons d-flex justify-content-center gap-4">
                        <i class="fab fa-facebook fa-2x"></i>
                        <i class="fab fa-twitter fa-2x"></i>
                        <i class="fab fa-instagram fa-2x"></i>
                        <i class="fab fa-linkedin fa-2x"></i>
                        <i class="fab fa-pinterest fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="border-top border-primary bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="index.html" class="nav-link link-light">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#details" class="nav-link link-light">Details</a>
                        </li>
                        <li class="nav-item">
                            <a href="contact.html" class="nav-link link-light">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <p class="text-end d-none d-md-block">
                        Copyright &copy; Blog Mastery 2023
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="<?php echo URLROOT; ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets/js/script.js"></script>
</body>

</html>