<?php
include('header.php');
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fn'];
    $email = $_POST['em2'];
    $subject = $_POST['sb'];
    $message = $_POST['ms'];

    $sql = "INSERT INTO contact (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Your message has been sent successfully. We will get back to you soon.');</script>";
        echo "<script>window.location.replace('$_SERVER[PHP_SELF]');</script>"; 
        exit();
    } else {
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    }
}
?>
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