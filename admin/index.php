<?php
session_start();
if (!isset($_SESSION['email'])) {
  header('Location: controller/login.php');
}
require '../databases/config.php';
$sql1 = "Select * from about_me";
$about_me = mysqli_fetch_array(mysqli_query($conn, $sql1));
$sql2 = "Select * from message";
$message = mysqli_fetch_all(mysqli_query($conn, $sql2));
$sql3 = "Select * from services";
$services = mysqli_fetch_all(mysqli_query($conn, $sql3));
$sql4 = "Select * from education";
$education = mysqli_fetch_all(mysqli_query($conn, $sql4));
$sql5 = "Select * from work_skills ORDER by skill DESC";
$workskill = mysqli_fetch_all(mysqli_query($conn, $sql5));
$age = date_diff(date_create($about_me[3]), date_create('today'))->y;
$services = mysqli_fetch_all(mysqli_query($conn, $sql3));
$sql6 = "Select * from projects";
$projects = mysqli_fetch_all(mysqli_query($conn, $sql6));
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
  <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="../css/lightcase.min.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>

<body>
  <div class="wrapper-page">
    <!-- Header -->
    <header class="header">
      <div class="header-content">
        <div class="profile-picture-block">
          <div class="my-photo">
            <img src=<?php echo "../$about_me[9]" ?> id="avatar" class="img-fluid" alt="image">
          </div>
        </div>
        <!-- Header Head -->
        <div class="site-title-block">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#changeavatar">Change Avatar</button>
          <a href="controller/logout.php" class="btn btn-primary">Logout</a>

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
            <li><a href="#portfolio"><i class="fas fa-business-time"></i> Portfolio</a></li>
            <!-- <li><a href="#blog"><i class="fas fa-book-reader"></i> Blog</a></li> -->
            <li><a href="#contact"><i class="fas fa-paper-plane"></i> Message</a></li>
          </ul>
          <!-- /Main menu -->
          <!-- Copyrights -->
          <!-- <div class="copyrights">You Know Who</div> -->
          <!-- / Copyrights -->
        </div>
        <!-- /Navigation -->
      </div>
    </header>
    <!-- /Header -->

    <!-- Mobile Header -->
    <div class="responsive-header">
      <div class="responsive-header-name">
        <img class="responsive-logo" src="<?php echo "../" . $about_me[9] ?>" alt="" />
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
          <div class="sub-page-inner" id="home-bg" style="<?php echo "background-image: url('../$about_me[10]'); " ?>">

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
                    <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#changehomebg">Change Backgound</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <div class="modal fade" id="changehomebg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container">
                  <div class="panel panel-success">
                    <div class="panel-body">
                      <form action="" method="POST" role="form">
                        <legend>Upload</legend>
                        <div class="form-group">
                          <label for="file">Chọn file</label>
                          <input id="image" type="file" name="sortpic" required="" />
                        </div>
                        <div class="form-group">
                          <button id="upload" name="upimg" class="btn btn-primary">Upload</button>
                        </div>
                      </form>
                      <div class="status"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="changeavatar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container">
                  <div class="panel panel-success">
                    <div class="panel-body">
                      <form action="" method="POST" role="form">
                        <legend>Upload</legend>
                        <div class="form-group">
                          <label for="file">Chọn file</label>
                          <input id="myavatar" type="file" name="sortpic" required="" />
                        </div>
                        <div class="form-group">
                          <button id="upavatar" name="upimg" class="btn btn-primary">Upload</button>
                        </div>
                      </form>
                      <div class="status"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /Start Page home -->

        <!-- ----------------------------------------------------------------------------------------------------------------------------------------------- -->

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
                  <h3 id="txtname"><?php echo $about_me[1] ?></h3>
                  <p class="about-content" id="txtabme">
                    <?php echo $about_me[2] ?>
                  </p>
                </div>

                <div class="col-xs-6 col-sm-12 col-md-6 col-lg-6">
                  <h3>Basic Information</h3>
                  <div class="row mt-2">
                    <div class=" col-sm-4">
                      <h4>Age:</h4>
                    </div>
                    <div class="  col-sm-8">
                      <p id="txtage"><?php echo $age ?></p>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class=" col-sm-4">
                      <h4>Email:</h4>
                    </div>
                    <div class="  col-sm-8">
                      <p id="txtemail"><?php echo $about_me[6] ?></p>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class=" col-sm-4">
                      <h4>Phone:</h4>
                    </div>
                    <div class="  col-sm-8">
                      <p id="txtphone"><?php echo $about_me[5] ?></p>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class=" col-sm-4">
                      <h4>Address:</h4>
                    </div>
                    <div class="  col-sm-8">
                      <p id="txtaddress"><?php echo $about_me[4] ?></p>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class=" col-sm-4">
                      <h4>Language:</h4>
                    </div>
                    <div class=" col-sm-8">
                      <p id="txtlanguage"><?php echo $about_me[8] ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class='loading text-primary'>Saved</div>
              <button class="btn btn-primary mb-4 ml-5" id="editaboutme">Edit Profile</button>
              <div class="row">
                <form action="" method="POST" role="form" id="formaboutme" class="col-md-6">
                  <div class="form-group">
                    <input type="text" name="myname" id="myname" placeholder="Name" value="<?php echo $about_me[1] ?>">
                    <textarea class="form-control" name="aboutme" id="aboutme" rows="3"><?php echo $about_me[2] ?></textarea>
                  </div>
                </form>
                <form action="" method="POST" role="form" id="formprofile" class="col-md-6">
                  <div class="form-group">
                    Email: <input type="text" name="" id="myemail" placeholder="Email" class="w-75 ml-3" value="<?php echo $about_me[6] ?>"></div>
                  <div class="form-group">
                    Phone: <input type="text" name="" id="myphone" placeholder="Phone" class="w-75 ml-3" value="<?php echo $about_me[5] ?>"></div>
                  <div class="form-group">
                    Address: <input type="text" name="" id="myaddress" placeholder="Address" class="w-75 ml-3" value="<?php echo $about_me[4] ?>"></div>
                  <div class="form-group">
                    Language: <input type="text" name="" id="mylanguage" placeholder="Language" class="w-75 ml-2" value="<?php echo $about_me[8] ?>">
                  </div>
                </form>
              </div>
              <button id="saveaboutme" name="" class="btn btn-primary mb-5 ml-5">Save</button>
              <button id="backaboutme" name="" class="btn btn-danger mb-5 ml-2">Back</button>
              <!-- /about me -->

              <!-- services -->
              <div class="special-block-bg">
                <div class="section-head">
                  <h4>
                    <span>What Actually I Do</span>
                    My Services
                  </h4>
                </div>
                <button id="addservices" name="" class="btn btn-primary mb-5 ml-4">Add Services</button>
                <form action="" method="POST" role="form" id="formaddsv" class="col-md-6">
                  <div class="form-group">
                    Title: <input type="text" name="" id="title_add" placeholder="Title" class=" ml-3 " value=""></div>
                  <div class="form-group">
                    Content: <textarea type="text" name="" id="content_add" placeholder="Content" class=" ml-3" value="" style="height: 200px;"></textarea></div>
                </form>
                <button id="saveservices" name="" class="btn btn-primary mb-5 ml-5">Save</button>
                <button id="backservices" name="" class="btn btn-danger mb-5 ml-2">Back</button>

                <div class="row services">
                  <?php
                  foreach ($services as $row) {
                  ?>
                    <div class=" col-md-6 " id="sv_<?php echo $row[0] ?>">
                      <div class="services-list">
                        <!-- Service Item 1 -->
                        <div class="service-block">
                          <div class="service-icon">
                            <i class="lnr lnr-code"></i>
                          </div>
                          <div class="service-text">
                            <h4 id="1title_<?php echo $row[0] ?>"><?php echo $row[1] ?></h4>
                            <p id="1content_<?php echo $row[0] ?>"><?php echo $row[2] ?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                  <div id="services"></div>
                  <button id="editservices" name="" class="btn btn-primary mb-5 ml-5">Edit Services</button>
                  <table class="table table-striped table-inverse table-responsive tblservice ml-5" border="1">
                    <thead class="thead-inverse">
                      <tr>
                        <th class="text-center">Title</th>
                        <th class="w-100 text-center">Content</th>
                        <th class=" text-center">Delete</th>
                      </tr>
                    </thead>
                    <tbody id="tblsv">
                      <?php
                      foreach ($services as $row) {
                      ?>
                        <tr id="rowsv_<?php echo $row[0] ?>">
                          <td scope='row'>
                            <div contentEditable='true' class='editsv' id="title_<?php echo $row[0] ?>"> <?php echo $row[1] ?> </div>
                          </td>
                          <td>
                            <div contenteditable="true" class='editsv' id="content_<?php echo $row[0] ?>"> <?php echo $row[2] ?> </div>
                          </td>
                          <td class="text-center">
                            <i class="fas fa-trash-alt deletesv" id="delete_<?php echo $row[0] ?>"></i>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
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
                      <button id="addedu" name="" class="btn btn-primary mb-5 ml-4 mt-5">Add</button>
                      <button id="editedu" name="" class="btn btn-primary mb-5 ml-4 mt-5">Edit</button>
                      <form action="" method="POST" role="form" id="formaddedu" class="col-md-6 mt-3">
                        <div class="form-group">
                          Title: <input type="text" name="" id="title_edu" placeholder="Title" class=" ml-3 " value="">
                        </div>
                        <div class="form-group">
                          Content: <textarea type="text" name="" id="content_edu" placeholder="Content" class=" ml-3" value="" style="height: 200px;"></textarea>
                        </div>
                        <div class="form-group">
                          Time: <input type="text" name="" id="time_edu" placeholder="Time" class=" ml-3 " value="">
                        </div>
                      </form>
                      <button id="saveedu" name="" class="btn btn-primary mb-5 ml-5">Save</button>
                      <button id="backedu" name="" class="btn btn-danger mb-5 ml-2">Back</button>

                      <table class="table table-striped table-inverse table-responsive tbledu " border="1">
                        <thead class="thead-inverse">
                          <tr>
                            <th class="text-center">Title</th>
                            <th class="w-75 text-center">Content</th>
                            <th class="w-25 text-center">Time</th>
                            <th class=" text-center">Delete</th>
                          </tr>
                        </thead>
                        <tbody id="tbleditedu">
                          <?php
                          foreach ($education as $row) {
                          ?>
                            <tr id="rowedu_<?php echo $row[0] ?>">
                              <td scope='row'>
                                <div contentEditable='true' class='editedu' id="title_<?php echo $row[0] ?>"> <?php echo $row[1] ?> </div>
                              </td>
                              <td>
                                <div contenteditable="true" class='editedu' id="content_<?php echo $row[0] ?>"> <?php echo $row[2] ?> </div>
                              </td>
                              <td>
                                <div contenteditable="true" class='editedu' id="time_<?php echo $row[0] ?>"> <?php echo $row[3] ?> </div>
                              </td>
                              <td class="text-center">
                                <i class="fas fa-trash-alt deleteedu" id="deleteedu_<?php echo $row[0] ?>"></i>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="main-timeline">
                      <?php foreach ($education as $row) { ?>
                        <div class="timeline currecnt" id="edu_<?php echo $row[0] ?>">
                          <div class="timeline-icon">
                            <img src="../images/resume.png" alt="">
                          </div>
                          <div class="timeline-content">
                            <span class="date" id="etitle_<?php echo $row[0] ?>"><?php echo $row[3] ?></span>
                            <h5 class="title" id="econtent_<?php echo $row[0] ?>"><?php echo $row[1] ?></h5>
                            <p class="description" id="etime_<?php echo $row[0] ?>">
                              <?php echo $row[2] ?>
                            </p>
                          </div>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                  <!-- /Education History -->

                  <!-- Work Skills -->
                  <div>
                    <div class="special-block-bg">
                      <div class="section-head">
                        <h4>
                          <span>My Professional </span>
                          Work Skills
                        </h4>
                        <button id="addskill" name="" class="btn btn-primary mb-5 ml-4 mt-5">Add</button>
                        <button id="editskill" name="" class="btn btn-primary mb-5 ml-4 mt-5">Edit</button>
                        <form action="" method="POST" role="form" id="formaddskill" class="col-md-6 mt-3">
                          <div class="form-group">
                            Name: <input type="text" name="" id="name_skill" placeholder="Name" class=" ml-3 " value="" style="width: 160px">
                          </div>
                          <div class="form-group">
                            Ratio: <input type="number" name="" id="ratio" placeholder="Ratio" class=" ml-3" value="" min="0" max="100" style="width: 60px">
                          </div>
                        </form>
                        <button id="saveskill" name="" class="btn btn-primary mb-5 ml-5">Save</button>
                        <button id="backskill" name="" class="btn btn-danger mb-5 ml-2">Back</button>

                        <table class="table table-striped table-inverse table-responsive tblskill ">
                          <thead class="thead-inverse">
                            <tr>
                              <th class=" text-center">Name</th>
                              <th class=" text-center">Ratio</th>
                              <th class=" text-center">Delete</th>
                            </tr>
                          </thead>
                          <tbody id="tbleditskill">
                            <?php
                            foreach ($workskill as $row) {
                            ?>
                              <tr id="rowski_<?php echo $row[0] ?>">
                                <td scope='row'>
                                  <div contentEditable='true' class='ceditskill' id="name_<?php echo $row[0] ?>"> <?php echo $row[1] ?> </div>
                                </td>
                                <td>
                                  <div contenteditable="true" class='ceditskill' id="skill_<?php echo $row[0] ?>"> <?php echo $row[2] ?> </div>
                                </td>
                                <td class="text-center">
                                  <i class="fas fa-trash-alt deleteskill" id="deleteskill_<?php echo $row[0] ?>"></i>
                                </td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                      <div class="skills-items skills-progressbar">
                        <?php foreach ($workskill as $row) { ?>
                          <div class="skill-item skilli_<?php echo $row[0] ?>">
                            <h4 id="sknname_<?php echo $row[0] ?>"><?php echo $row[1] ?></h4>
                            <div class="progress">
                              <div class="progress-bar wow fadeInLeft" id="raskill_<?php echo $row[0] ?>" data-progress="95%" style="width: <?php echo $row[2] . "%" ?>;" data-wow-duration="1.5s" data-wow-delay="1.2s"> </div>
                            </div>
                            <span id="skrskill_<?php echo $row[0] ?>"><?php echo $row[2] . "%" ?></span>
                          </div>
                        <?php } ?>
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
            <div class="portfolio-grid portfolio-trigger" id="portfolio-page">
              <button id="addproject" name="" class="btn btn-primary mb-5 ml-4 mt-5">Add</button>
              <div class="formaddpro">
                <form action="" method="POST" role="form" id="formaddpro" class="col-md-6 mt-3" onsubmit="return false">
                  <div class="form-group">
                    Title: <input type="text" name="title_pro" id="title_pro" placeholder="Title" class=" ml-3 " value="">
                  </div>
                  <div class="form-group">
                    Content: <textarea type="text" name="content_pro" id="content_pro" placeholder="Content" class=" ml-3" value="" style="height: 120px;"></textarea>
                  </div>
                  <div class="form-group">
                    Image: <input id="imageproject" type="file" name="image_pro" required="" />
                  </div>
                  <div class="form-group">
                    <button id="saveproject" name="" class="btn btn-primary mb-5 ml-5">Save</button>
                    <button id="backproject" name="" class="btn btn-danger mb-5 ml-2">Back</button>
                  </div>
                </form>

              </div>

              <div class="row projectss">
                <?php foreach ($projects as $row) { ?>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 portfolio-item branding photography all project_<?php echo $row[0] ?>">
                    <div class="portfolio-img">
                      <img src="../<?php echo $row[3] ?>" class="img-responsive" alt="">
                    </div>
                    <div class="portfolio-data ">
                      <h4><a href="#"><?php echo $row[1] ?></a></h4>
                      <p class="meta"><?php echo $row[2] ?></p>
                      <button class="btn btn-primary mt-5 ml-5 delpro" id="delpro_<?php echo $row[0] ?>" name="">Delete</button>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /Portfolio Subpage -->
      <!-- Contact Subpage -->
      <section id="contact" class="sub-page">
        <div class="sub-page-inner">
          <div class="section-title">
            <div class="main-title">
              <div class="title-main-page">
                <h4>Message</h4>
              </div>
            </div>
          </div>
          <!-- Contact  -->

          <!-- <form action="" method="POST" role="form" id="formaddpro" class="col-md-6 mt-3" onsubmit="return false">
            <div class="row">
              <div class="form-group col-md-8">
                Search: <input type="text" name="" id="search_mess" placeholder="Search" class=" ml-3 " value="" width="250px">
              </div>
              <div class="form-group col-md-4 mt-3">
                <select id="option_mess" style="width:100px">
                  <option>--</option>
                  <option>Name</option>
                  <option>Email</option>
                </select>
              </div>

            </div>

          </form> -->
          <div class="container">
            <table class="table table-striped table-inverse table-responsive">
              <thead class="thead-inverse">
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Content</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($message as $row) { ?>
                  <tr class="mess" id="mess_<?php echo $row[0] ?>">
                    <td scope="row"><?php echo $row[1] ?></td>
                    <td><?php echo $row[2] ?></td>
                    <td><?php echo $row[3] ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /Contact -->
          <!-- Social Media -->
          <div class="pt-50">
            <div class="social-media-block">
              <ul class="social-media-links">
                <li><a href="https://www.facebook.com/magicboyyyyyy/"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://github.com/duy2192"><i class="fab fa-github"></i></a></li>
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
  <script src="../js/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!--Owl Coursel-->
  <script src="../js/owl.carousel.min.js"></script>
  <!-- Typing Text -->
  <script src="../js/typed.min.js"></script>
  <!--Images LightCase-->
  <script src="../js/lightcase.min.js"></script>
  <!-- Portfolio filter -->
  <script src="../js/jquery.isotope.min.js"></script>
  <!-- Wow Animation -->
  <script src="../js/wow.min.js"></script>
  <!-- Main Script -->
  <script src="../js/script.js"></script>
  <script src="js/script.js"></script>
</body>

</html>