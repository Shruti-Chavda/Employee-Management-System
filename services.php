<?php include('header.php'); ?>

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