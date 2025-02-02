<?php  include('connection.php');
?>
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-info">
                    <h2><b>
                            Employeeshub
                        </b></h2>
                    <p>
                        Join the growing number of organizations that have transformed their employee management
                        experience with EmployeesHub. Experience the power of a well-connected workforce. "Sign up
                        today!"
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>
                        USEFUL LINKS
                    </h4>
                    <ul>

                        <?php   $q = "select * from guest_header";
              $res = mysqli_query($con, $q);
              while ($row = mysqli_fetch_array($res)) { ?>
                        <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo $row[1];?>">

                                <?php  echo $row[2]; ?>

                            </a></li>
                        <?php  }  ?>

                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>contact us</h4>
                    <p>A108 Adam Street<br>
                        Rajkot-Gj 360007<br>
                        India <br>
                        <strong>Phone:</strong>
                        +91 1234 567 890 <br>
                        <strong>Email:</strong>
                        schavda684@rku.ac.in <br>
                    </p>

                </div>

                <div class="col-lg-3 col-md-6 footer-newsletter">
                    <h4>
                        Our Newsletter
                    </h4>
                    <p>
                        Stay in the loop with the our newsletter - your gateway to the latest trends, insights, and
                        updates in the world of [industry or focus area]. We bring the most relevant and cutting-edge
                        information directly to your inbox, ensuring you're always ahead of the curve.
                    </p>

                    <?php include('sub.php'); ?>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <a href=" http://localhost/Employee%20Management%20System/index.php">
                <strong>
                    EmployeesHub
                </strong>
            </a> All Rights
            Reserved
        </div>
    </div>
</footer>


<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- <script src="lib/jquery/jquery.min.js"></script> -->
<!-- <script src="lib/jquery/jquery-migrate.min.js"></script> -->
<script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/superfish/hoverIntent.js"></script>
<script src="lib/superfish/superfish.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/isotope/isotope.pkgd.min.js"></script>
<script src="lib/lightbox/js/lightbox.min.js"></script>
<script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>

<script src="js/subscribe.js"></script>

<script src="js/main.js"></script>

</body>

</html>