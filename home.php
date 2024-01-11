<?php 
include 'admin/db_connect.php'; 
?>
<style>
body{
    background: linear-gradient(rgba(0,0,0,0.8), #000), url(assets/img/1703386860_ngate.jpg);
    background-attachment: fixed;
    background-position: center;    

}
#portfolio .img-fluid{
    width:100%
}
.intro{
     padding-top: 10rem;
    padding-bottom: calc(10rem - 4.5rem);
    margin-bottom: 80px;
}
</style>
        <header class="intro">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 ">
                    	<h3 class="text-white">Welcome to <?php echo $_SESSION['setting_name']; ?></h3>
                        <hr class="divider my-4" />
                        <a class="btn btn-primary  btn-block btn-lg" href="index.php?page=appoint">Make Appointment</a>

                    </div>
                    
                </div>
            </div>
        </header>
	<!-- <section class="page-section" id="menu">
        
    </section> -->
    <!-- <div id="portfolio" class="container">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-lg-12 text-center">
                    <h2 class="mb-4">Medical Specialties</h2>
                    <hr class="divider">

                    </div>
                </div>
                <div class="row no-gutters">
                    <?php
                    $cats = $conn->query("SELECT * FROM medical_specialty order by id asc");
                                while($row=$cats->fetch_assoc()):
                    ?>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="index.php?page=doctors&sid=<?php echo $row['id'] ?>">
                            <img class="img-fluid" src="assets/img/<?php echo $row['img_path'] ?>" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-name"><?php echo $row['name'] ?></div>
                                <div class="project-category text-white">Find Doctor</div>
                            </div>
                        </a>
                    </div>
                    <?php endwhile; ?>
                    
                </div>
            </div>
        </div> -->
    <script>
        
        $('.view_prod').click(function(){
            uni_modal_right('Product','view_prod.php?id='+$(this).attr('data-id'))
        })
    </script>
	
