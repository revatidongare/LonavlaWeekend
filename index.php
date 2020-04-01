
<!DOCTYPE html>
<html lang="zxx">

<?php include 'includes/head.php'; ?>

<title>Lonavala Weekend : Home</title>
<!-- <style>
.mySlides {display: none;}
</style> -->
<body class="home-3">
    <div class="all">
<?php include 'includes/navbar.php'; ?>
        <main>
            <section>
                <div class="tiva-slideshow-wrapper">
                    <?php
                    $query1 = "SELECT * FROM `slider` WHERE `slider_id`=1 && `flag`=1";
                            
                             include 'admin/config.php';
                   
                             $stmt1=$conn->prepare($query1);
                             $stmt1->execute();
                             $row1=$stmt1->fetch();

                    $query2 = "SELECT * FROM `slider` WHERE `slider_id`=2 && `flag`=1";
                            
                             include 'admin/config.php';
                   
                             $stmt2=$conn->prepare($query2);
                             $stmt2->execute();
                             $row2=$stmt2->fetch();

                    $query3 = "SELECT * FROM `slider` WHERE `slider_id`=3 && `flag`=1";
                            
                             include 'admin/config.php';
                             
                             $stmt3=$conn->prepare($query3);
                             $stmt3->execute();
                             $row3=$stmt3->fetch();
                            $conn=null;
                
                ?>
                    <div id="tiva-slideshow" class="nivoSlider">
                        <a href="#" title="Slideshow image">
                            <img class="img-fluid" src="img/slider/<?php echo $row1['image'];?>" title="#caption1" alt="Slideshow image">
                        </a>
                        <a href="#" title="Slideshow image">
                            <img class="img-fluid" src="img/slider/<?php echo $row2['image'];?>" title="#caption2" alt="Slideshow image">
                        </a>
                        <a href="#" title="Slideshow image">
                            <img class="img-fluid" src="img/slider/<?php echo $row3['image'];?>" title="#caption3" alt="Slideshow image">
                        </a>
                    </div>
                    <!--<div id="caption" class="nivo-html-caption hidden-sm hidden-xs">
                        <div class="tiva-caption m-center m-w-100">
                            <div class="right-left hidden-xs normal very_large_60">
                               
                            </div>
                        </div>
                    </div>

                     <div id="caption2" class="nivo-html-caption hidden-sm hidden-xs">
                        <div class="tiva-caption m-left">
                            <div class="roll hidden-xs normal very_large_60 text-right">
                              
                            </div>
                        </div>
                    </div>

                    <div id="caption3" class="nivo-html-caption hidden-sm hidden-xs">
                        <div class="tiva-caption m-center m-w-100">
                            <div class="right-left hidden-xs normal very_large_60">
                                
                            </div>
                        </div>
                    </div> -->

                </div>
            </section>


<!-- why choose section -->
            <section>
                <div class="best-store">
                    <div class="container" style="padding-top: 2.5rem; padding-bottom: 2.5rem;">
                        <div class="title text-center">
                            <div class="page-title color">
                                <!-- <h3 class="title-main">Why choose us</h3> -->
                                <div class="title title-icon">
                                    <h2 class="title-h2">Why choose us</h2>
                                    <!-- <p class="description">Cras mattis consectetur purus sit amet fermentum. Praesent commodo cursus magna, vel
                                        scelerisque nisl consectetur et.</p> -->
                                </div>
                            </div>
                        </div>

                        <div class="home-core-content m-top mobie-sm-text-center m-bottom-30">
                            <div class="group">
                                <div class="home-core-group row flex-wrap">
                                    <div class="col-lg-4 col-md-6 col-sm-12 core-item zoomIn animated d-flex" data-animate="zoomIn" data-delay="100">
                                        <div>
                                            <img src="img/icon/villa.png" alt="">
                                        </div>
                                        <div class="core-caption-group">
                                            <h5 class="core-title title-black">3BHK VILLA</h5>
                                            <p class="core-caption">
                                                <!-- Maharashtra Knowledge Corporation Limited (MKCL) was promoted by the Department of Higher and Technical Education , Government of Maharashtra , India and was incorporated under the Companies Act, 1956. -->
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12 core-item zoomIn animated d-flex" data-animate="zoomIn" data-delay="200">
                                        <div>
                                            <img src="img/icon/ac.png" alt="">
                                        </div>
                                        <div class="core-caption-group">
                                            <h5 class="core-title title-black">AC ROOMS</h5>
                                            <p class="core-caption">
                                                <!-- An acronym for Education to Home, ETH has embarked on the mission of bringing education to millions of learners transcending the barriers of geographies, economic levels and languages. -->
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12 core-item zoomIn animated d-flex" data-animate="zoomIn" data-delay="300">
                                        <div>
                                            <img src="img/icon/swimming.png" alt="">
                                        </div>
                                        <div class="core-caption-group">
                                            <h5 class="core-title title-black">SWIMMING POOL</h5>
                                            <p class="core-caption">
                                                <!-- The Skill development initiative aims to connect with the youth by upgrading their skills as per their competencies. -->
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12 core-item zoomIn animated d-flex" data-animate="zoomIn" data-delay="400">
                                        <div>
                                            <img src="img/icon/guard.png" alt="">
                                        </div>
                                        <div class="core-caption-group">
                                            <h5 class="core-title title-black">SECURITY GUARD </h5>
                                            <p class="core-caption">
                                                <!-- Global certification to make your resume powerful and to make your path easy for finding a good job. -->
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12 core-item zoomIn animated d-flex" data-animate="zoomIn" data-delay="500">
                                        <div>
                                            <img src="img/icon/car.png" alt="">
                                        </div>
                                        <div class="core-caption-group">
                                            <h5 class="core-title title-black"> PARKING</h5>
                                            <p class="core-caption">
                                                <!-- Build your future with us . We are waiting to serve you with our expert solutions                        Offer internship to the students who r ready to achieve their goal with their high technical and commercial expertise. -->
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12 core-item zoomIn animated d-flex" data-animate="zoomIn" data-delay="600">
                                        <div>
                                            <img src="img/icon/garden.png" alt="">
                                        </div>
                                        <div class="core-caption-group">
                                            <h5 class="core-title title-black">SITOUT SPACE</h5>
                                            <p class="core-caption">
                                               <!-- Providing ample number of practice test for the students  to boost their confidence before they appear for the  final examination. -->
                     
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

<!-- our campus -->
            <section>
                <div class="section deal-layout">
                    <div class="container" align="align-center">
                        <div class="inner">
                            <div class="row">

                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 col-sm-12">
                        <center><h2>Our Campus</h2></center>
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <video style= "width: 95%; height: 85%; "controls>
      
                            <source src="img/video.mp4" type=video/mp4>
                        </video>
                    </div>
                        </div>
                    </div>
                                
                    </div>
                </div>
            </section>

<!-- gallery -->
            <div class="section gallery-wrap">
                <div class="content">
                    <div class="title title-icon">
                         <h2 class="title-h2 title text-center">Gallery</h2>                                    
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12 gallery-item clearfix m-bottom-30">
                            <div class="gallery-item-inner clearfix animated">
                                <div class="entry-thumbnail">
                                    <div class="entry-thumbnail-overlay placeholder-image"></div>
                                </div>

                                <div class="gallery-content">
                                    <div class="gallery-action" data-toggle="modal" data-target="#myModal">
                                        <a href="#" class="gsf-link">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>

                                    <div class="gallery-meta">
                                        <h3 class="gallery-title text-uppercase">
                                            <a>Swimming Pool</a>
                                        </h3>
                                        <!-- <div class="gallery-cat text-italic">
                                            <a  rel="tag">Organic Farm</a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fadeIn zoomIn animated" id="myModal" data-animate="zoomIn" data-delay="50">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="close" data-dismiss="modal">
                                            <i class="float-right" aria-hidden="true">×</i>
                                        </div>

                                        <div class="modal-body fadeInDownBig">
                                            <img src="img/gallery/1.jpg" alt="" class="w-100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 gallery-item clearfix m-bottom-30">
                            <div class="gallery-item-inner clearfix animated">
                                <div class="entry-thumbnail">
                                    <div class="entry-thumbnail-overlay placeholder-image img2"></div>
                                </div>

                                <div class="gallery-content">
                                    <div class="gallery-action" data-toggle="modal" data-target="#myModal1">
                                        <a href="#" class="gsf-link">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>

                                    <div class="gallery-meta">
                                        <h3 class="gallery-title text-uppercase">
                                            <a>Villa</a>
                                        </h3>
                                        <!-- <div class="gallery-cat text-italic">
                                            <a  rel="tag">Meat</a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fadeIn zoomIn animated" id="myModal1" data-animate="zoomIn" data-delay="50">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="close" data-dismiss="modal">
                                            <i class="float-right" aria-hidden="true">×</i>
                                        </div>

                                        <div class="modal-body fadeInDownBig">
                                            <img src="img/gallery/2.jpg" alt="" class="w-100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 gallery-item clearfix m-bottom-30">
                            <div class="gallery-item-inner clearfix animated">
                                <div class="entry-thumbnail">
                                    <div class="entry-thumbnail-overlay placeholder-image img3"></div>
                                </div>

                                <div class="gallery-content">
                                    <div class="gallery-action" data-toggle="modal" data-target="#myModal2">
                                        <a href="#" class="gsf-link">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>

                                    <div class="gallery-meta">
                                        <h3 class="gallery-title text-uppercase">
                                            <a >Villa Room</a>
                                        </h3>
                                       <!--  <div class="gallery-cat text-italic">
                                            <a rel="tag">Meat</a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fadeIn zoomIn animated" id="myModal2" data-animate="zoomIn" data-delay="50">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="close" data-dismiss="modal">
                                            <i class="float-right" aria-hidden="true">×</i>
                                        </div>

                                        <div class="modal-body fadeInDownBig">
                                            <img src="img/gallery/3.jpg" alt="" class="w-100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 "></div>
                        <a class="btn button button-main" href="gallery.php"> See More</a>
                        </div>
                    </div>

                </div>
            </div>
<!-- testimonials -->
            <section>
                <div class="section testimonials">
                    <div class="container">
                        <div class="title text-center">
                            <div class="page-title color">
                                <h3 class="title-main">Testimonials</h3>
                                <div class="title title-icon">
                                    <h2 class="title-h2">What Our Clients Saying?</h2>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="m-top">
                            <div class="testimonial-carousel owl-carousel owl-theme ">
                                <div class="testimonial-item">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="item clearfix d-flex align-items-center">
                                                <div class="item-img">
                                                    
                                                    <img class="img-fluid" src="img/divya.jpg" alt="img">
                                                </div>
                                                <div class="item-content">
                                                    <p>" Hotel was good, value for money, but they don't provide tea maker and coffee maker in the room as well, they don't provide dental kit also... Hotel staff was Cooperative..."</p>
                                                    <div class="user-info d-flex align-items-baseline">
                                                        <h4 class="user-name title-black">Divya Warambhey</h4>
                                                        <!-- <span class="job font-italic">Graduate Student</span> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="item clearfix d-flex align-items-center">
                                                <div class="item-img">
                                                    <img class="img-fluid" src="img/ratnesh.jpg" alt="img">
                                                </div>
                                                <div class="item-content">
                                                    <p>"GOOD Food and ambience...satisfied with the service .... time restriction of pool and food quite disappointed us."</p>
                                                    <div class="user-info d-flex align-items-baseline">
                                                        <h4 class="user-name title-black">Ratnesh Patil</h4>
                                                        <!-- <span class="job font-italic">Graduate Student</span> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        

                                    </div>
                                </div>

                                <div class="testimonial-item">
                                    <div class="row">

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="item clearfix d-flex align-items-center">
                                                <div class="item-img">
                                                    <img class="img-fluid" src="img/kirtana.jpeg" alt="img">
                                                </div>
                                                <div class="item-content">
                                                    <p>Easy booking, Excellent pickup and drop facility, modern amenities, awesome food, beautifully designed, centrally located, good hotel staff</p>
                                                    <div class="user-info d-flex align-items-baseline">
                                                        <h4 class="user-name title-black"> Kirtana Mudaliar</h4>
                                                        <!-- <span class="job font-italic"> Student</span> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="item clearfix d-flex align-items-center">
                                                <div class="item-img">
                                                    <img class="img-fluid" src="img/akshay.jpg" alt="img">
                                                </div>
                                                <div class="item-content">
                                                    <p>Home away from home. I had a warm welcome ,courteous and cheerful staff service. Rooms are spacious comfortable and cozy. One of the best hotels in Lonavala</p>
                                                    <div class="user-info d-flex align-items-baseline">
                                                        <h4 class="user-name title-black"> Akshay Auti</h4>
                                                        <!-- <span class="job font-italic"> Student</span> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="item clearfix d-flex align-items-center">
                                                <div class="item-img">
                                                    <img class="img-fluid" src="img/niranjan.jpeg" alt="img">
                                                </div>
                                                <div class="item-content">
                                                    <p>"we have stay for 2 days in this Hotel, very nice experience ,rooms are in good conditions , food are awesome there is buffet system, garden, restaurant etc management are excellent"</p>
                                                    <div class="user-info d-flex align-items-baseline">
                                                        <h4 class="user-name title-black"> Niranjan Waghmare</h4>
                                                        <span class="job font-italic">Student </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->

                                       <!--  <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="item clearfix d-flex align-items-center">
                                                <div class="item-img">
                                                    <img class="img-fluid" src="img/vivek.jpg" alt="img">
                                                </div>
                                                <div class="item-content">
                                                    <p>I took my industrial training from this institute and my experience was amazing. I would highly recommend everyone to visit this institute for their industrial training.</p>
                                                    <div class="user-info d-flex align-items-baseline">
                                                        <h4 class="user-name title-black"> Vivek Yadav </h4>
                                                        <span class="job font-italic">  Student</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->

                                        <!-- <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="item clearfix d-flex align-items-center">
                                                <div class="item-img">
                                                    <img class="img-fluid" src="img/akshay_k.jpg" alt="img">
                                                </div>
                                                <div class="item-content">
                                                    <p>A best institue for learning some thing different. Here are lots of best courses offered by an institute, which you can pursue and give your dreams a new wings. </p>
                                                    <div class="user-info d-flex align-items-baseline">
                                                        <h4 class="user-name title-black"> Akshay Kurhekar</h4>
                                                        <span class="job font-italic">Student</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->

                                        <!-- <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="item clearfix d-flex align-items-center">
                                                <div class="item-img">
                                                    <img class="img-fluid" src="img/rohan.jpg" alt="img">
                                                </div>
                                                <div class="item-content">
                                                    <p>It is a long established fact that a reader will be distracted by the
                                                        readable content of a page when looking at its layout.</p>
                                                    <div class="user-info d-flex align-items-baseline">
                                                        <h4 class="user-name title-black"> Rohan Khandelwal</h4>
                                                        <span class="job font-italic">Engineering Student</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="main-contact-us">
            <div class="container">
            <div class="section contact-03">
                <div id="review">
                        <div class="page-title color m-bottom-2 text-center">
                            <!-- <h3 class="title-main">Contact Form</h3> -->
                            <div class="title title-icon">
                                <h2 class="title-h2">Get In Touch</h2>
                                <p class="description">Send email so that we can get in touch with you</p>
                            </div>
                        </div>
                                <form method="post" action="back.php" class="new-review-form text-center">
                                   
                                    <fieldset class="spr-form-contact">
                                         
                                        <div class="col-lg-6 col-sm-12 spr-form-contact-name">
                                            <input class="spr-form-input spr-form-input-text form-control" value="" id="name" name="name" placeholder="Name" required>
                                        </div>
                                        
                                        <div class="col-lg-6 col-sm-12 spr-form-contact-email">
                                            <input class="spr-form-input spr-form-input-text form-control" value="" id="mail" name="email" placeholder="Email" required>
                                        </div>
                                    
                                        <div class="col-lg-6 col-sm-12 spr-form-contact-phone">
                                            <input class="spr-form-input spr-form-input-text form-control" value="" id="phone" name="phone" placeholder="Phone" required>
                                        </div>
                                        <div class="col-lg-6 col-sm-12 spr-form-contact-subject">
                                            <input class="spr-form-input spr-form-input-text form-control" value="" id="subject" name="subject" placeholder="Subject" required>
                                        </div>
                                        <div class="col-lg-6 col-sm-12 spr-form-contact-subject">
                                            <label>Checkin date</label>
                                            <input type="date" altFormat= "yyyy-mm-dd" class="spr-form-input spr-form-input-text form-control" value="" onchange="TDate()" name="from_date" placeholder="Check in Date" id="from_date" required>
                                        </div>
                                        <div class="col-lg-6 col-sm-12 spr-form-contact-subject">
                                            <label>Checkout date</label>
                                            <input type="date" altFormat= "yyyy-mm-dd" class="spr-form-input spr-form-input-text form-control" value="" onchange="TEndDate()" name="to_date" placeholder="Checkout Date" id="to_date" required>
                                        </div>
                                        <script>
                                function TDate() {
                                    var UserDate = document.getElementById("from_date").value;
                                    var ToDate = new Date();

                                    if (new Date(UserDate).getDate() < ToDate.getDate()) {
                                        alert("The Date must be Bigger or Equal to today date");
                                        document.getElementById("userdate").value = "";
                                        return false;
                                    }
                                    return true;
                                }

                                function TEndDate() {
                                    var UserDate = document.getElementById("from_date").value;
                                    var UserEndDate = document.getElementById("to_date").value;
                                    var ToDate = new Date();

                                    if (new Date(UserEndDate).getDate() < new Date(UserDate).getDate()) {
                                        alert("The Date must not be less to today's date");
                                        document.getElementById("userenddate").value = "";
                                        return false;
                                    }
                                    return true;
                                }
                            </script>
                                        <div class="col-lg-6 col-sm-12 spr-form-contact-name">
                                            <input class="spr-form-input spr-form-input-text form-control" id="guest_num" value="" name="guest_num" placeholder="No. Of Guest" required>
                                        </div>
                                        <div class="col-lg-6 col-sm-12 spr-form-contact-name">
                                            <select class="spr-form-input spr-form " id="room_type" name="room_type" required>
                                                    <option selected>Select Room Type</option>
                                                    <option value="classic" style="color: black;">Classic Room</option>
                                                    <option value="suite" style="color: black;">Suite Room</option>
                                                    <option value="villa" style="color: black;">Villa</option>
                                             </select>
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <div class="spr-form-review-body">
                                            <div class="spr-form-input">    
                                                <textarea class="spr-form-input-textarea" rows="5" name="message" placeholder="Message"></textarea>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="submit">
                                        <button class="add-to-cart" type="submit" name="contact">
                                            <span class="btn view button-main">Submit Now</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </main>

<?php include 'includes/footer.php'; ?>
   
    </div>

    <!-- Back-To-Top Button -->
    <div class="back-to-top">
        <a href="#">
            <i class="fa fa-long-arrow-up"></i>
        </a>
    </div>

    <!-- Page Loader -->
    <div id="page-preloader">
        <div class="page-loading">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>

<?php include 'includes/script.php'; ?>

<!-- <script>
var slideIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none"; 
  }
  slideIndex++;
  if (slideIndex > x.length) {slideIndex = 1} 
  x[slideIndex-1].style.display = "block"; 
  setTimeout(carousel, 1000); 
}
</script> -->
 
</body>

</html>