<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!DOCTYPE html>

<html lang="zxx">

<?php include 'includes/head.php'; ?>

<body class="home-3">
    <div class="all">

<?php include 'includes/navbar.php'; ?>
<?php     
    if (isset($_GET['p'])) {
            if($_GET['p'] == 3){ ?>
             <script>alert("Mail & SMS sent");</script>
                <!--<script>swal("mail sent", "SMS sent" , "success");</script>-->
           <?php } 
            elseif ($_GET['p'] == 101) { ?>
                <script>alert("something went wrong");</script>
                <!-- <script>swal("mail not sent", "SMS not sent" , "warning");</script> -->
                          
            <?php }           
         
    }  ?>
        <main>
            <div class="page-title-breadcrumbs">
                <div class="breadcrumbs-container container">
                    <div class="breadcrumbs_wrapper">
                        <div class="page-title-container">
                            <h1 class="text-center">Contact Us</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section main-contact-us">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 col-sm-12 m-b-50">
                            <div class="page-title color m-bottom-2">
                                <h3 class="title-main">About Us</h3>
                                <div class="title title-icon">
                                    <h2 class="title-h2">Who we are</h2>
                                    <p class="description">OVI'S Apartments is set in Lonavala, 9 km from Bhushi Dam, 13 km from Lion's Point, as well as 13 km from Tiger Point. This is the perfect destination for weekend getaways and family holidays. With a view of the beautiful Sahyadri Mountains and the waterfalls , our hotel invites you to breathe more easily from the moment you unpack.
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="content">
                                        <p class="title-black">Address: </p>
                                       <p> Opp lane of karishma Dhaba, Sadapur - Malavali Road, Gate no 259-306, Parishreya & Mizzle, Lonavla, Maharashtra 410401</p>
                                        <p>Open 24 Hrs.</p>
                                        <p>contact@lonavalaweekend.com</p>
                                        <p>+91 9762241142<br>+91 8381081112<br><!-- WhatsApp 9172201667 --></p>
                                    </div>
                                </div>

                               <!--  <div class="col-md-6 col-sm-12">
                                    <div class="content">
                                        <p class="title-black">MANUFACTURED BY:</p>
                                        <p>AUGMENTED FOODS INDIA PVT.LTD.</p>
                                        <p>Survey No. 28/1 Damodar Nagar, Old Mundhawa-Kharadi Pune 411014</p>
                                        <p>Monday to Friday : 10AM to 6PM</p>
                                        <p>tivathem@gmail.com</p>
                                        <p>(1200)-0989-568-331</p>
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <div class="col-md-5 col-sm-12">
                            <div class="page-title color m-bottom-2">
                                <h3 class="title-main">Contact Form</h3>
                                <div class="title title-icon">
                                    <h2 class="title-h2">Get In Touch</h2>
                                    <p class="description">Send email so that we can get in touch with you.</p>
                                </div>
                            </div>

                            <div id="review">
                                <form method="post" action="back.php" class="new-review-form">
                                    <fieldset class="spr-form-contact">
                                        <div class="spr-form-contact-name">
                                            <input class="spr-form-input spr-form-input-text form-control" value="" id="name" name="name" placeholder="Name" required>
                                        </div>
                                        <div class="spr-form-contact-email">
                                            <input class="spr-form-input spr-form-input-text form-control" value="" id="mail" name="email" placeholder="Email" required>
                                        </div>
                                        <div class="spr-form-contact-phone">
                                            <input class="spr-form-input spr-form-input-text form-control" value="" id="phone" name="phone" placeholder="Phone" required>
                                        </div>
                                        <div class="spr-form-contact-subject">
                                            <input class="spr-form-input spr-form-input-text form-control" value="" id="subject" name="subject" placeholder="Subject" required>
                                        </div>
                                        <div class="spr-form-contact-subject">
                                            <label>Checkin date</label>
                                            <input type="date" altFormat= "yyyy-mm-dd" class="spr-form-input spr-form-input-text form-control" value="" onchange="TDate()" name="from_date" placeholder="Check in Date" id="from_date" required>
                                        </div>
                                        <div class="spr-form-contact-subject">
                                            <label>Checkout date</label>
                                            <input type="date" altFormat= "yyyy-mm-dd" class="spr-form-input spr-form-input-text form-control" value="" onchange="TEndDate()" name="to_date" placeholder="Checkout Date" id="to_date" required>
                                        </div>
                                        <script>
                                function TDate() {
                                    var UserDate = document.getElementById("from_date").value;
                                    var ToDate = new Date();

                                    if (new Date(UserDate).getDate() <= ToDate.getDate()) {
                                        alert("The Date must be Bigger date");
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
                                        <div class="spr-form-contact-name">
                                            <input class="spr-form-input spr-form-input-text form-control" id="guest_num" value="" name="guest_num" placeholder="No. Of Guest" required>
                                        </div>
                                        <div class="spr-form-contact-name">
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
            </div>

			<div class="contact-map">
				<div class="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15112.068405422953!2d73.44962917899574!3d18.752773146385426!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be80129493c514b%3A0x290fcd38b01a8cbe!2sOvi&#39;s%20Holiday%20Homes!5e0!3m2!1sen!2sin!4v1582905416209!5m2!1sen!2sin" width="100%" height="380" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
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

</body>

</html>