<?php
require 'config.php';
$sql1 = "Select * from about_me";
$about_me = mysqli_fetch_array(mysqli_query($conn, $sql1));
$sql2 = "Select * from message";
$message = mysqli_fetch_array(mysqli_query($conn, $sql2));
$sql3 = "Select * from services";
$services = mysqli_fetch_all(mysqli_query($conn, $sql3));
$sql4 = "Select * from educaton";
$education = mysqli_fetch_array(mysqli_query($conn, $sql4));
$sql5 = "Select * from work_skills";
$workskill = mysqli_fetch_array(mysqli_query($conn, $sql5));
$age = date_diff(date_create($about_me[3]), date_create('today'))->y;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="icon" href="favicon.ico">
  <title><?php echo $about_me[1] ?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> <!-- Animation -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" /> <!-- Owl Carousel -->
  <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="css/lightcase.min.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
  <div class="wrapper-page">
    <!-- Header -->
    <header class="header">
      <div class="header-content">
        <div class="profile-picture-block">
          <div class="my-photo">
            <img src="<?php echo $about_me[9] ?>" class="img-fluid" alt="image">
          </div>
        </div>
        <!-- Header Head -->
        <div class="site-title-block">
          <div class="site-title"><?php echo $about_me[1] ?></div>
          <div class="type-wrap">
            <div class="typed-strings">
              <span>Photographer</span>
              <span>Mobile Developer</span>
              <span>Web Developer</span>
            </div>
            <span class="typed"></span>
          </div>
        </div>
        <!-- /Header Head -->

        <!-- Navigation -->
        <div class="site-nav">
          <!-- Main menu -->
          <ul class="header-main-menu" id="header-main-menu">
            <li><a class="active" href="#home"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="#about-me"><i class="fas fa-user-tie"></i> About Me</a></li>
            <li><a href="#resume"><i class="fas fa-award"></i> Resume</a></li>
            <li><a href="#portfolio"><i class="fas fa-business-time"></i> Project</a></li>
            <li><a href="#blog"><i class="fas fa-book-reader"></i> Blog</a></li>
            <li><a href="#contact"><i class="fas fa-paper-plane"></i> Contact</a></li>
          </ul>
          <!-- /Main menu -->
          <!-- Copyrights -->
          <div class="copyrights">© 2019 All rights reserved.</div>
          <!-- / Copyrights -->
        </div>
        <!-- /Navigation -->
      </div>
    </header>
    <!-- /Header -->

    <!-- Mobile Header -->
    <div class="responsive-header">
      <div class="responsive-header-name">
        <img class="responsive-logo" src="images/avatar.jpeg" alt="" />
        <?php echo $about_me[1] ?>
      </div>
      <span class="responsive-icon"><i class="fas fa-bars"></i></span>
    </div>
    <!-- /Mobile Header -->

    <!-- Main Content Pages -->
    <div class="content-pages">
      <!-- Subpages -->
      <div class="sub-home-pages">
        <!-- Start Page home -->
        <section id="home" class="sub-page start-page">
          <div class="sub-page-inner" style="<?php echo "background-image: url('$about_me[10]'); " ?>">
            <div class="mask"></div>
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="title-block">
                  <h2>Hello I'm <?php echo $about_me[1] ?></h2>
                  <div class="type-wrap">
                    <div class="typed-strings">
                      <span>Photographer</span>
                      <span>Mobile Developer</span>
                      <span>Web Developer</span>
                    </div>
                    <span class="typed"></span>
                  </div>
                  <div class="home-buttons">
                    <a href="#contact" class="bt-submit"><i class="lnr lnr-envelope"></i> Contact Me</a>
                    <a href="" class="bt-submit"><i class="lnr lnr-briefcase"></i> Download CV</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- /Start Page home -->

        <!-- About Me Subpage -->
        <section id="about-me" class="sub-page">
          <div class="sub-page-inner">
            <div class="section-title">
              <div class="main-title">
                <div class="title-main-page">
                  <h4>About me</h4>
                </div>
              </div>
            </div>
            <div class="section-content">
              <!-- about me -->
              <div class="row pb-30">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <h3><?php echo $about_me[1] ?></h3>
                  <p class="about-content">
                    <?php echo $about_me[2] ?> </p>
                </div>

                <div class="col-xs-6 col-sm-12 col-md-6 col-lg-6">
                  <h3>Basic Information</h3>
                  <div class="row mt-2">
                    <div class=" col-sm-4">
                      <h4>Age:</h4>
                    </div>
                    <div class="  col-sm-8">
                      <p><?php echo $age ?></p>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class=" col-sm-4">
                      <h4>Email:</h4>
                    </div>
                    <div class="  col-sm-8">
                      <p><?php echo $about_me[6] ?></p>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class=" col-sm-4">
                      <h4>Phone:</h4>
                    </div>
                    <div class="  col-sm-8">
                      <p><?php echo $about_me[5] ?></p>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class=" col-sm-4">
                      <h4>Address:</h4>
                    </div>
                    <div class="  col-sm-8">
                      <p><?php echo $about_me[4] ?></p>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class=" col-sm-4">
                      <h4>Language:</h4>
                    </div>
                    <div class=" col-sm-8">
                      <p><?php echo $about_me[8] ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /about me -->

              <!-- services -->
              <div class="special-block-bg">
                <div class="section-head">
                  <h4>
                    <span>What Actually I Do</span>
                    My Services
                  </h4>
                </div>
                <div class="row">
                  <?php
                  foreach ($services as $row) {
                  ?>
                    <div class="col-md-6">
                      <div class="services-list">
                        <!-- Service Item 1 -->
                        <div class="service-block">
                          <div class="service-icon">
                            <i class="lnr lnr-code"></i>
                          </div>
                          <div class="service-text">
                            <h4><?php echo $row[1] ?></h4>
                            <p><?php echo $row[2] ?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- About Me Subpage -->

        <!-- Resume Subpage -->
        <section id="resume" class="sub-page">
          <div class="sub-page-inner">
            <div class="section-title">
              <div class="main-title">
                <div class="title-main-page">
                  <h4>Resume</h4>
                </div>
              </div>
            </div>

            <div class="section-content">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">

                  <!-- Education History -->
                  <div class="pt-30">
                    <div class="section-head">
                      <h4>
                        <span>My Education</span>
                        Background History
                      </h4>
                    </div>
                    <div class="main-timeline">
                      <div class="timeline currecnt">
                        <div class="timeline-icon">
                          <img src="images/resume/1.png" alt="">
                        </div>
                        <div class="timeline-content">
                          <span class="date">Apr 2015 - Till Now</span>
                          <h5 class="title">Software Engineer</h5>
                          <p class="description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum mattis felis vitae risus pulvinar tincidunt. Nam ac venenatis enim. Aenean hendrerit justo sed.

                          </p>
                        </div>
                      </div>

                      <div class="timeline">
                        <div class="timeline-icon">
                          <img src="images/resume/1.png" alt="">
                        </div>
                        <div class="timeline-content">
                          <span class="date">Apr 2016 - Mar 2017</span>
                          <h5 class="title">Web Developer</h5>
                          <p class="description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum mattis felis vitae risus pulvinar tincidunt. Nam ac venenatis enim. Aenean hendrerit justo sed.
                          </p>
                        </div>
                      </div>

                      <div class="timeline">
                        <div class="timeline-icon">
                          <img src="images/resume/1.png" alt="">
                        </div>
                        <div class="timeline-content">
                          <span class="date">May 2017 - Mar 2018</span>
                          <h5 class="title">Frontend Developer</h5>
                          <p class="description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum mattis felis vitae risus pulvinar tincidunt. Nam ac venenatis enim. Aenean hendrerit justo sed.

                          </p>
                        </div>
                      </div>

                    </div>
                  </div>
                  <!-- /Education History -->

                  <!-- Skills -->
                  <!-- <div class="pb-30 pt-30">
                    <div class="row list-skills"> -->
                  <!-- Work Skills -->
                  <div>
                    <div class="special-block-bg">
                      <div class="section-head">
                        <h4>
                          <span>My Professional </span>
                          Work Skills
                        </h4>
                      </div>
                      <div class="skills-items skills-progressbar">
                        <div class="skill-item">
                          <h4>PHP</h4>
                          <div class="progress">
                            <div class="progress-bar wow fadeInLeft" data-progress="95%" style="width: 95%;" data-wow-duration="1.5s" data-wow-delay="1.2s"> </div>
                          </div>
                          <span>95%</span>
                        </div>
                        <div class="skill-item">
                          <h4>Java</h4>
                          <div class="progress">
                            <div class="progress-bar wow fadeInLeft" data-progress="85%" style="width: 85%;" data-wow-duration="1.5s" data-wow-delay="1.2s"> </div>
                          </div>
                          <span>85%</span>
                        </div>
                        <div class="skill-item">
                          <h4>C#</h4>
                          <div class="progress">
                            <div class="progress-bar wow fadeInLeft" data-progress="75%" style="width: 75%;" data-wow-duration="1.5s" data-wow-delay="1.2s"> </div>
                          </div>
                          <span>75%</span>
                        </div>
                        <div class="skill-item">
                          <h4>C++</h4>
                          <div class="progress">
                            <div class="progress-bar wow fadeInLeft" data-progress="70%" style="width: 70%;" data-wow-duration="1.5s" data-wow-delay="1.2s"> </div>
                          </div>
                          <span>70%</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /Work Skills -->

                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End of Resume Subpage -->

        <!-- Portfolio Subpage -->
        <section id="portfolio" class="sub-page">
          <div class="sub-page-inner">
            <div class="section-title">
              <div class="main-title">
                <div class="title-main-page">
                  <h4>Portfolio</h4>
                </div>
              </div>
            </div>

            <div class="section-content">
              <div class="filter-tabs">
                <button class="fil-cat" data-rel="all"><span>0</span> All</button>
                <button class="fil-cat" data-rel="photography"><span>05</span> Websites</button>
                <button class="fil-cat" data-rel="web-design"><span>07</span> Decorations</button>
                <button class="fil-cat" data-rel="branding"><span>12</span> Business Logo</button>
              </div>

              <div class="portfolio-grid portfolio-trigger" id="portfolio-page">
                <div class="label-portfolio"><span class="rotated-sub">project</span><span class="project-count">8</span></div>
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 portfolio-item branding photography all">
                    <div class="portfolio-img">
                      <img src="images/portfolio/portfolio-img-1.jpeg" class="img-responsive" alt="">
                    </div>
                    <div class="portfolio-data">
                      <h4><a href="portfolio-single.html">Company Branding</a></h4>
                      <p class="meta">Branding + Photography</p>
                      <div class="portfolio-attr">
                        <a href="portfolio-single.html"><i class="lnr lnr-link"></i></a>
                        <a href="images/portfolio/portfolio-img-1.jpeg" data-rel="lightcase:gal" title="Image Caption"><i class="lnr lnr-move"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 portfolio-item web-design branding all">
                    <div class="portfolio-img"><img src="images/portfolio/portfolio-img-2.jpeg" class="img-responsive" alt=""></div>
                    <div class="portfolio-data">
                      <h4><a href="portfolio-single.html">Home Decoration</a></h4>
                      <p class="meta">Web design + Branding</p>
                      <div class="portfolio-attr">
                        <a href="portfolio-single.html"><i class="lnr lnr-link"></i></a>
                        <a href="images/portfolio/portfolio-img-2.jpeg" data-rel="lightcase:gal" title="Image Caption"><i class="lnr lnr-move"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 portfolio-item branding all">
                    <div class="portfolio-img"><img src="images/portfolio/portfolio-img-3.jpeg" class="img-responsive" alt=""></div>
                    <div class="portfolio-data">
                      <h4><a href="portfolio-single.html">Photography</a></h4>
                      <p class="meta">Branding</p>
                      <div class="portfolio-attr">
                        <a href="portfolio-single.html"><i class="lnr lnr-link"></i></a>
                        <a href="images/portfolio/portfolio-img-3.jpeg" data-rel="lightcase:gal" title="Image Caption"><i class="lnr lnr-move"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 portfolio-item web-design branding all">
                    <div class="portfolio-img"><img src="images/portfolio/portfolio-img-4.jpeg" class="img-responsive" alt=""></div>
                    <div class="portfolio-data">
                      <h4><a href="portfolio-single.html">Furniture branding</a></h4>
                      <p class="meta">Web design + Branding</p>
                      <div class="portfolio-attr">
                        <a href="portfolio-single.html"><i class="lnr lnr-link"></i></a>
                        <a href="images/portfolio/portfolio-img-4.jpeg" data-rel="lightcase:gal" title="Image Caption"><i class="lnr lnr-move"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 portfolio-item branding all">
                    <div class="portfolio-img"><img src="images/portfolio/portfolio-img-5.jpeg" class="img-responsive" alt=""></div>
                    <div class="portfolio-data">
                      <h4><a href="portfolio-single.html">Flowers power</a></h4>
                      <p class="meta">Branding</p>
                      <div class="portfolio-attr">
                        <a href="portfolio-single.html"><i class="lnr lnr-link"></i></a>
                        <a href="images/portfolio/portfolio-img-5.jpeg" data-rel="lightcase:gal" title="Image Caption"><i class="lnr lnr-move"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 portfolio-item web-design branding all">
                    <div class="portfolio-img"><img src="images/portfolio/portfolio-img-6.jpeg" class="img-responsive" alt=""></div>
                    <div class="portfolio-data">
                      <h4><a href="portfolio-single.html">Furniture branding</a></h4>
                      <p class="meta">Web design + Branding</p>
                      <div class="portfolio-attr">
                        <a href="portfolio-single.html"><i class="lnr lnr-link"></i></a>
                        <a href="images/portfolio/portfolio-img-6.jpeg" data-rel="lightcase:gal" title="Image Caption"><i class="lnr lnr-move"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 portfolio-item branding all">
                    <div class="portfolio-img"><img src="images/portfolio/portfolio-img-7.jpeg" class="img-responsive" alt=""></div>
                    <div class="portfolio-data">
                      <h4><a href="portfolio-single.html">Flowers power</a></h4>
                      <p class="meta">Branding</p>
                      <div class="portfolio-attr">
                        <a href="portfolio-single.html"><i class="lnr lnr-link"></i></a>
                        <a href="images/portfolio/portfolio-img-7.jpeg" data-rel="lightcase:gal" title="Image Caption"><i class="lnr lnr-move"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 portfolio-item web-design branding all">
                    <div class="portfolio-img"><img src="images/portfolio/portfolio-img-8.jpeg" class="img-responsive" alt=""></div>
                    <div class="portfolio-data">
                      <h4><a href="portfolio-single.html">Furniture branding</a></h4>
                      <p class="meta">Web design + Branding</p>
                      <div class="portfolio-attr">
                        <a href="portfolio-single.html"><i class="lnr lnr-link"></i></a>
                        <a href="images/portfolio/portfolio-img-8.jpeg" data-rel="lightcase:gal" title="Image Caption"><i class="lnr lnr-move"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- /Portfolio Subpage -->

        <!-- Blog Subpage -->
        <section id="blog" class="sub-page">
          <div class="sub-page-inner">
            <div class="section-title">
              <div class="main-title">
                <div class="title-main-page">
                  <h4>Blog</h4>
                  <p>We share our news and blog</p>
                </div>
              </div>
            </div>

            <div class="section-content">
              <div class="row blog-grid-flex">
                <div class="col-md-4 col-sm-6 blog-item-quote blog-item">
                  <div class="blog-article">
                    <div class="post-format"> <span class="post-format-icon"><i class="fas fa-quote-right"></i></span> </div>
                    <div class="comment-like"> <span><i class="fas fa-comment" aria-hidden="true"></i> 30</span> <span><i class="fas fa-heart" aria-hidden="true"></i> 15</span> </div>
                    <div class="article-img">
                      <a href="blog-single.html"><img src="images/blog/1.jpeg" class="img-responsive" alt=""></a>
                    </div>
                    <div class="article-content">
                      <div>
                        <h4><a href="blog-single.html">Design is not just what it looks like .Design is how it works .</a></h4>
                        <div class="meta"> <span><i>Feb</i> 16,2016</span> <span><i>In</i> <a href="#">Shopping</a></span> <span><i>Tags</i> <a href="#">Trends</a></span> </div>
                        <div class="article-link"> <a href="blog-single.html"><i class="lnr lnr-arrow-right"></i></a> </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8 col-sm-6 blog-item">
                  <div class="blog-article">
                    <div class="post-format"> <span class="post-format-icon"><i class="lnr lnr-picture"></i></span> </div>
                    <div class="comment-like"> <span><i class="fas fa-comment" aria-hidden="true"></i> 30</span> <span><i class="fas fa-heart" aria-hidden="true"></i> 15</span> </div>
                    <div class="article-img">
                      <a href="blog-single.html"> <img src="images/blog/2.jpeg" class="img-responsive" alt=""></a>
                    </div>
                    <div class="article-link"> <a href="blog-single.html"><i class="lnr lnr-arrow-right"></i></a> </div>
                    <div class="article-content">
                      <h4><a href="blog-single.html">The new clear bolg </a></h4>
                      <div class="meta"> <span><i>Feb</i> 16,2016</span> <span><i>In</i> <a href="#">Shopping</a></span> <span><i>Tags</i> <a href="#">Trends</a></span> </div>
                      <p>There are many variations of passages of Lorem Ipsum available, but the majority .</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 blog-item">
                  <div class="blog-article">
                    <div class="post-format"> <span class="post-format-icon"><i class="lnr lnr-film-play"></i></span> </div>
                    <div class="comment-like"> <span><i class="fas fa-comment" aria-hidden="true"></i> 30</span> <span><i class="fas fa-heart" aria-hidden="true"></i> 15</span> </div>
                    <div class="article-img">
                      <a href="blog-single.html"> <img src="images/blog/3.jpeg" class="img-responsive" alt=""></a>
                    </div>
                    <div class="article-link"> <a href="blog-single.html"><i class="lnr lnr-arrow-right"></i></a> </div>
                    <div class="article-content">
                      <h4><a href="blog-single.html">Content builder posts</a></h4>
                      <div class="meta"> <span><i>Feb</i> 16,2016</span> <span><i>In</i> <a href="#">Shopping</a></span> <span><i>Tags</i> <a href="#">Trends</a></span> </div>
                      <p>There are many variations of passages of Lorem Ipsum available, but the majority .</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 blog-item">
                  <div class="blog-article">
                    <div class="post-format"> <span class="post-format-icon"><i class="lnr lnr-picture"></i></span> </div>
                    <div class="comment-like"> <span><i class="fas fa-comment" aria-hidden="true"></i> 30</span> <span><i class="fas fa-heart" aria-hidden="true"></i> 15</span> </div>
                    <div class="article-img">
                      <a href="blog-single.html"> <img src="images/blog/4.jpeg" class="img-responsive" alt=""></a>
                    </div>
                    <div class="article-link"> <a href="blog-single.html"><i class="lnr lnr-arrow-right"></i></a> </div>
                    <div class="article-content">
                      <h4><a href="blog-single.html">Transitions In Design</a></h4>
                      <div class="meta"> <span><i>Feb</i> 16,2016</span> <span><i>In</i> <a href="#">Shopping</a></span> <span><i>Tags</i> <a href="#">Trends</a></span> </div>
                      <p>There are many variations of passages of Lorem Ipsum available, but the majority .</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 blog-item">
                  <div class="blog-article">
                    <div class="post-format"> <span class="post-format-icon"><i class="lnr lnr-picture"></i></span> </div>
                    <div class="comment-like"> <span><i class="fas fa-comment" aria-hidden="true"></i> 30</span> <span><i class="fas fa-heart" aria-hidden="true"></i> 15</span> </div>
                    <div class="article-img">
                      <a href="blog-single.html"> <img src="images/blog/5.jpeg" class="img-responsive" alt=""></a>
                    </div>
                    <div class="article-link"> <a href="blog-single.html"><i class="lnr lnr-arrow-right"></i></a> </div>
                    <div class="article-content">
                      <h4><a href="blog-single.html">Comfort classy outfits</a></h4>
                      <div class="meta"> <span><i>Feb</i> 16,2016</span> <span><i>In</i> <a href="#">Shopping</a></span> <span><i>Tags</i> <a href="#">Trends</a></span> </div>
                      <p>There are many variations of passages of Lorem Ipsum available, but the majority .</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 blog-item">
                  <div class="blog-article">
                    <div class="post-format"> <span class="post-format-icon"><i class="lnr lnr-film-play"></i></span> </div>
                    <div class="comment-like"> <span><i class="fas fa-comment" aria-hidden="true"></i> 30</span> <span><i class="fas fa-heart" aria-hidden="true"></i> 15</span> </div>
                    <div class="article-img">
                      <a href="blog-single.html"> <img src="images/blog/6.jpeg" class="img-responsive" alt=""></a>
                    </div>
                    <div class="article-link"> <a href="blog-single.html"><i class="lnr lnr-arrow-right"></i></a> </div>
                    <div class="article-content">
                      <h4><a href="blog-single.html">Recent trends in story</a></h4>
                      <div class="meta"> <span><i>Feb</i> 16,2016</span> <span><i>In</i> <a href="#">Shopping</a></span> <span><i>Tags</i> <a href="#">Trends</a></span> </div>
                      <p>There are many variations of passages of Lorem Ipsum available, but the majority .</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 blog-item">
                  <div class="blog-article">
                    <div class="post-format"> <span class="post-format-icon"><i class="lnr lnr-music-note"></i></span></div>
                    <div class="comment-like"> <span><i class="fas fa-comment" aria-hidden="true"></i> 30</span> <span><i class="fas fa-heart" aria-hidden="true"></i> 15</span> </div>
                    <div class="article-img">
                      <a href="blog-single.html"> <img src="images/blog/7.jpeg" class="img-responsive" alt=""></a>
                    </div>
                    <div class="article-link"> <a href="blog-single.html"><i class="lnr lnr-arrow-right"></i></a> </div>
                    <div class="article-content">
                      <h4><a href="blog-single.html">Social media websites</a></h4>
                      <div class="meta"> <span><i>Feb</i> 16,2016</span> <span><i>In</i> <a href="#">Shopping</a></span> <span><i>Tags</i> <a href="#">Trends</a></span> </div>
                      <p>There are many variations of passages of Lorem Ipsum available, but the majority .</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 blog-item-quote blog-item">
                  <div class="blog-article">
                    <div class="post-format"> <span class="post-format-icon"><i class="lnr lnr-picture"></i></span> </div>
                    <div class="comment-like"> <span><i class="fas fa-comment" aria-hidden="true"></i> 30</span> <span><i class="fas fa-heart" aria-hidden="true"></i> 15</span> </div>
                    <div class="article-img">
                      <a href="blog-single.html"> <img src="images/blog/8.jpeg" class="img-responsive" alt=""></a>
                    </div>
                    <div class="article-content">
                      <div>
                        <h4><a href="blog-single.html">Design is not just what it looks like .Design is how it works .</a></h4>
                        <div class="meta"> <span><i>Feb</i> 16,2016</span> <span><i>In</i> <a href="#">Shopping</a></span> <span><i>Tags</i> <a href="#">Trends</a></span> </div>
                        <div class="article-link"> <a href="blog-single.html"><i class="lnr lnr-arrow-right"></i></a> </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="pagination-nav nav-center">
                <a href="#" class="btn btn-prev"><i class="lnr lnr-arrow-left"></i> prev</a>
                <a href="#" class="btn btn-next">next <i class="lnr lnr-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </section>
        <!-- /Blog Subpage -->

        <!-- Contact Subpage -->
        <section id="contact" class="sub-page">
          <div class="sub-page-inner">
            <div class="section-title">
              <div class="main-title">
                <div class="title-main-page">
                  <h4>Contact</h4>
                  <p>NEED SOME HELP?</p>
                </div>
              </div>
            </div>
            <!-- Contact Form -->
            <div class="row contact-form pb-30">
              <div class="col-sm-12 col-md-5 col-lg-5 left-background">
                <img src="images/mailbox.png" alt="image" />
              </div>
              <div class="col-sm-12 col-md-7 col-lg-7">
                <div class="form-contact-me">
                  <div id="show_contact_msg"></div>
                  <form method="post" id="contact-form">
                    <input name="ct-name" id="ct-name" type="text" placeholder="Name:" required autocomplete="off">
                    <input name="ct-email" id="ct-email" type="email" placeholder="Email:" required autocomplete="off">
                    <textarea name="ct-comment" id="ct-comment" placeholder="Message:" required rows="6"></textarea>
                    <input class="bt-submit text-center" id="btn-contact" name="btn-contact" type="submit" value="Send Message">
                  </form>
                  <div id="status"></div>
                </div>
              </div>
            </div>
            <!-- /Contact Form -->
            <!-- Social Media -->
            <div class="pt-50">
              <div class="social-media-block">
                <ul class="social-media-links">
                  <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fab fa-github"></i></a></li>
                  <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                  <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>
              </div>
            </div>
            <!-- /Social Media -->
            <!-- Contact Details -->
            <div class="pt-50 pb-30">
              <div class="section-head">
                <h4>
                  <span>Contact Information</span>
                  Find me here
                </h4>
              </div>

              <!-- Contact Info -->
              <div class="sidebar-textbox row pb-50">
                <div class="contact-info d-flex col-md-4">
                  <div class="w-25">
                    <div class="contact-icon">
                      <i class="fas fa-phone"></i>
                    </div>
                  </div>
                  <div class="contact-text w-75">
                    <h2>Phone</h2>
                    <p><?php echo $about_me[5] ?></p>
                  </div>
                </div>
                <div class="contact-info d-flex col-md-4">
                  <div class="w-25">
                    <div class="contact-icon">
                      <i class="far fa-envelope-open"></i>
                    </div>
                  </div>
                  <div class="contact-text w-75">
                    <h2>Email</h2>
                    <p><?php echo $about_me[6] ?></p>
                  </div>
                </div>
                <div class="contact-info d-flex col-md-4">
                  <div class="w-25">
                    <div class="contact-icon">
                      <i class="fas fa-map-marker-alt"></i>
                    </div>
                  </div>
                  <div class="contact-text w-75">
                    <h2>Address</h2>
                    <p><?php echo $about_me[4] ?></p>
                  </div>
                </div>
              </div>
              <!-- /Contact info -->

              <!-- Map Container -->
              <div class="contact-map pt-50">
                <!-- GOOGLE MAP -->
                <div id="google-map"></div>
              </div>
              <!-- /Map Container -->
            </div>
            <!-- /Contact Details -->
          </div>
        </section>
        <!-- End Contact Subpage -->

      </div>
      <!-- /Page changer wrapper -->
    </div>
    <!-- /Main Content -->
  </div>

  <!--JS Files-->
  <script src="js/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!--Owl Coursel-->
  <script src="js/owl.carousel.min.js"></script>
  <!-- Typing Text -->
  <script src="js/typed.min.js"></script>
  <!--Images LightCase-->
  <script src="js/lightcase.min.js"></script>
  <!-- Portfolio filter -->
  <script src="js/jquery.isotope.min.js"></script>
  <!-- Wow Animation -->
  <script src="js/wow.min.js"></script>
  <!-- Map -->
  <script src="https://maps.google.com/maps/api/js?key=AIzaSyBkdsK7PWcojsO-o_q2tmFOLBfPGL8k8Vg&amp;language=en"></script>
  <!-- Main Script -->
  <script src="js/script.js"></script>
</body>

</html>
<form action="">
  input2
</form>