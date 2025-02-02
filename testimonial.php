<?php include "connection.php"; ?>
<section id="testimonials" class="section-bg wow fadeInUp">
    <div class="container">

        <header class="section-header">
            <h3>Testimonials</h3>
        </header>

        <div class="owl-carousel testimonials-carousel">


            <?php
    $q = "SELECT * FROM guest_testimonial";
    $res = mysqli_query($con, $q);
    while ($row = mysqli_fetch_array($res)) {
?>

            <div class="testimonial-item">

                <img src="admin_panel/img/intro-carousel/<?php  echo $row[4]; ?>" class="testimonial-img" alt="">
                <h3>
                    <?php echo $row[1];  ?>
                </h3>
                <h4>
                    <?php echo $row[2];  ?>
                </h4>
                <p>
                    <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
                    <?php echo $row[3];  ?>
                    <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
                </p>
            </div> <?php } ?>
        </div>

    </div>
</section>