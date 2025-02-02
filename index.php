<?php
include('header.php');
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fn'];
    $email = $_POST['em2'];
    $subject = $_POST['sb'];
    $message = $_POST['ms'];

    // Prepare an insert statement
    $sql = "INSERT INTO contact (name, email, subject, message) VALUES (?, ?, ?, ?)";
    
    if ($stmt = mysqli_prepare($con, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $subject, $message);
        
        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Your message has been sent successfully. We will get back to you soon.');</script>";
            echo "<script>window.location.replace('$_SERVER[PHP_SELF]');</script>";
            exit();
        } else {
            echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    // Close connection
    mysqli_close($con);
}
?>

<br><br><br>
<section id="intro">
    <div class="intro-container">
        <div id="introCarousel" class="carousel slide carousel-fade" data-ride="carousel">

            <ol class="carousel-indicators"></ol>
            <div class="carousel-inner" role="listbox">
                <?php
                    $q = "select * from guest_slider_images";
                    $result = mysqli_query($con, $q );
                    $count = mysqli_num_rows($result);
                    $i = 1;
                    while ($a = mysqli_fetch_array($result)) {
                ?>
                <div class="carousel-item <?php if ($i == 1) { echo "active"; } ?>"
                    style="background-image: url('admin_panel/img/intro-carousel/<?php echo $a[3]; ?>">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2>
                                <?php echo $a[1]; ?>
                            </h2>
                            <p>
                                <?php echo $a[2]; ?>
                            </p>

                            <a href="#services" class="btn-get-started scrollto">Explore More</a>
                        </div>
                    </div>
                </div>
                <?php
                $i++;
            }
            ?>

                <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
        </div>
</section>

<main id="main">
    <section id="featured-services">
        <div class="container">
            <div class="row">

                <?php
                    $q = "select * from guest_benefits";
                    $result = mysqli_query($con, $q);
                    $count = mysqli_num_rows($result);
                    while ($a = mysqli_fetch_array($result)) {
                ?>
                <div class="col-lg-4 box">

                    <i class="<?php echo $a[1]; ?>"></i>
                    <h4 class="title">
                        <?php echo $a[2]; ?></a>
                    </h4>
                    <p class="description">
                        <?php echo $a[3]; ?>
                    </p>

                </div>
                <?php  } ?>
            </div>
        </div>
    </section>

    <section id="about">
        <div class="container p-5">

            <header class="section-header">
                <h3>ABOUT US</h3>
                <p>Your one-stop destination for efficient employee management and productivity optimization.</p>
            </header>

            <div class="row about-cols">
                <?php
                    $q = "select * from guest_about_us";
                    $result = mysqli_query($con, $q);
                    $count=mysqli_num_rows($result);
                    while ($a = mysqli_fetch_array($result)) { ?>
                <div class="col-md-4 wow fadeInUp">
                    <div class="about-col">
                        <div class="img">
                            <img src="admin_panel/img/intro-carousel/<?php echo $a[3]; ?>" class="img-fluid">
                            <div class="icon"><i class="<?php echo $a[4]; ?>"></i></div>
                        </div>
                        <h2 class="title"><a href="#">
                                <?php echo $a[1]; ?>
                            </a></h2>
                        <p>
                            <?php echo $a[2]; ?>
                        </p>
                    </div>
                </div>
                <?php }
        ?>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container p-5">

            <header class="section-header wow fadeInUp">
                <h3>services</h3>
                <p>Collectively contribute to a streamlined and efficient Employee Management System, enhancing
                    communication, transparency, and productivity within the organization. </p>
            </header>

            <div class="row">
                <?php
              $q = "select * from guest_services";
              $res = mysqli_query($con, $q);
              while ($row = mysqli_fetch_array($res)) { ?>
                <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
                    <div class="icon"><i class="<?php echo $row[3]; ?>"></i></div>
                    <h4 class="title"><a>
                            <?php echo $row[1]; ?>
                        </a></h4>
                    <p class="description">
                        <?php echo $row[2]; ?>
                    </p>
                </div>
                <?php  }  ?>

            </div>
        </div>
    </section>


    <?php include "call-to-action.php"; ?>

    <section id="skills">
        <div class="container">

            <header class="section-header">
                <h3>
                    our skills
                </h3>
                <p>
                    At Employeeshub, our platform is crafted with precision and expertise, leveraging a robust set of
                    programming languages to ensure a seamless and powerful user experience. Our skilled development
                    team utilizes a variety of languages to bring you a feature-rich and reliable Employee Management
                    System.
                </p>
            </header>


            <div class="skills-content">

                <?php
              $q = "select * from guest_our_skills";
              $res = mysqli_query($con, $q);
              while ($row = mysqli_fetch_array($res)) { ?>

                <div class="progress">
                    <div class="progress-bar bg-<?php echo $row[3]; ?>" role="progressbar"
                        aria-valuenow="<?php echo $row[2]; ?>" aria-valuemin="0" aria-valuemax="<?php echo $row[2]; ?>">
                        <span class="skill">
                            <?php echo $row[1]; ?><i class="val">
                                <?php echo $row[2],"%"; ?>
                            </i>

                        </span>
                    </div>
                </div>
                <?php  } 
              ?>

    </section>


    <section id="facts" class="wow fadeIn">
        <div class="container">

            <header class="section-header">
                <h3>
                    facts
                </h3>
                <p>
                    These facts not only showcase our past achievements but also reflect our ongoing commitment to
                    delivering outstanding services and solutions for our clients. Join us on our journey of innovation
                    and success!
                </p>
            </header>

            <div class="row counters">

                <?php
              $q = "select * from guest_facts";
              $res = mysqli_query($con, $q);
              while ($row = mysqli_fetch_array($res)) { 
            ?>
                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">

                        <?php echo $row[1]; ?>
                    </span>
                    <p>
                        <?php echo $row[2]; ?>
                    </p>

                </div>

                <?php  } ?>
                <div class="facts-img">
                    <img src="img/facts-img.png" alt="fact-img" class="img-fluid">
                </div>

            </div>
    </section>


    <section id="portfolio" class="section-bg">
        <div class="container p-5">

            <header class="section-header">
                <h3 class="section-title">
                    Our Portfolio
                </h3>
            </header>


            <div class="row">
                <div class="col-lg-12">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">
                            all
                        </li>
                        <li data-filter=".filter-app">
                            app
                        </li>
                        <li data-filter=".filter-db">
                            db
                        </li>
                        <li data-filter=".filter-web">
                            web

                    </ul>
                </div>
            </div>

            <div class="row portfolio-container">

                <?php  $q = "select * from guest_our_portfolio";
              $res = mysqli_query($con, $q);
              while ($row = mysqli_fetch_array($res)) {  ?>

                <div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo $row['category']; ?> wow fadeInUp">
                    <div class="portfolio-wrap">
                        <figure>
                            <img src="admin_panel/img/intro-carousel/<?php echo $row[3]; ?>" class="img-fluid" alt="">
                            <a href="admin_panel/img/intro-carousel/<?php echo $row[3]; ?>" data-lightbox="portfolio"
                                data-title="<?php echo $row[1]; ?>" class="link-preview" title="Preview"><i
                                    class="ion ion-eye"></i></a>
                            <a href="#" class="link-details" title="More Details"><i
                                    class="ion ion-android-open"></i></a>
                        </figure>

                        <div class="portfolio-info">
                            <h4>
                                <?php echo $row[1]; ?> </a>
                            </h4>
                            <p>
                                <?php echo $row[2]; ?>
                            </p>
                        </div>
                    </div>

                </div>
                <?php } ?>
            </div>

        </div>
    </section>

    <?php include "our_clients.php"; ?>

    <?php include "testimonial.php"; ?>


    <section id="team">
        <div class="container p-5">
            <div class="section-header wow fadeInUp">
                <h3>
                    team
                </h3>
                <p>
                    Our strength lies in the synergy of a dynamic and dedicated team. Comprising skilled professionals
                    from various domains, we unite under a common goal - to deliver innovative solutions that exceed
                    expectations.
                </p>
            </div>

            <div class="row">
                <?php  $q = "select * from guest_team";
              $res = mysqli_query($con, $q);
              while ($row = mysqli_fetch_array($res)) { ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp">
                    <div class="member">
                        <img src="admin_panel/img/intro-carousel/<?php echo $row[3]; ?>" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>
                                    <?php echo $row[1]; ?>
                                </h4>
                                <span>
                                    <?php  echo $row[2];  ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php  }  ?>

            </div>

        </div>
    </section>

    <section id="contact" class="section-bg wow fadeInUp">
        <div class="container p-5">
            <div class="section-header">
                <h3>
                    contact us
                </h3>
                <p>
                    If you prefer face-to-face interaction, we'd love to welcome you to our office, our doors are always
                    open for meetings and discussions. Please schedule an appointment to ensure we're available to give
                    you the attention you deserve.
                </p>
            </div>

            <div class="row contact-info">
                <?php  $q = "select * from guest_contact";
              $res = mysqli_query($con, $q);
              while ($row = mysqli_fetch_array($res)) { ?>
                <div class="col-md-4">
                    <div class="contact-address">
                        <i class="<?php echo $row[1]; ?>"></i>
                        <h3>
                            <?php echo $row[2]; ?>
                        </h3>
                        <address>
                            <?php echo $row[3]; ?>
                        </address>

                    </div>
                </div>
                <?php } ?>
            </div>

            <div class="form4">

                <form action="index.php" method="post" id="form4">

                    <div>
                        <label>
                            Name
                        </label>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="text" name="fn" class="form-control" id="fn1" placeholder="Your Name" />
                            <span id="fn_err"></span>
                        </div>
                    </div>

                    <div>
                        <label>
                            Email
                        </label>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="text" name="em2" class="form-control" id="em3" placeholder="Your Email" />
                            <span id="em1_err"></span>
                        </div>
                    </div>

                    <div>
                    <label>
                        Subject
                    </label>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <input type="text" name="sb" class="form-control" id="sb1" placeholder="Your subject" />
                    <span id="sb_err"></span>
                </div>
            </div>


            <div>
                <label>
                    Message
                </label>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <input type="text" name="ms" class="form-control" id="ms1" placeholder="Your message" />
                    <span id="msg_err"></span>
                </div>
            </div>
            <div class="text-center"><input type="submit" value="Send Message" id="btnn" name="btn"></input>
            </div>
        </div>
        </form>
        </div>

    </section>
    
<?php include "footer.php";
?>