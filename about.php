<?php include('header.php'); ?>

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

   


<?php
      include('call-to-action.php');
    ?>

<?php
    include('our_clients.php');
  ?>

<?php
        include('testimonial.php');
    ?>

<?php
      include('footer.php');
    ?>