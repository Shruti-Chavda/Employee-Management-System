<?php include('header.php'); ?>


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