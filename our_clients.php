<?php include('connection.php'); ?>
<section id="clients" class="wow fadeInUp">
      <div class="container">

            <header class="section-header">
                  <h3>Our Clients 
                  </h3>
            </header>
            <div class="owl-carousel clients-carousel">
            <?php  
                  $q = "select * from guest_our_clients"; 
                  $res=mysqli_query($con, $q);
                  $count=mysqli_num_rows($res);
                  while ($row=mysqli_fetch_array($res)) { ?>
            
                  <img src="admin_panel/img/intro-carousel/<?php echo $row[2]; ?>">
            
            <?php  }  ?>
            </div>

      </div>
</section>