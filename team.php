<?php include('header.php');
include('connection.php'); ?>


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