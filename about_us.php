<!DOCTYPE html>
<html lang="zxx">

<?php include 'includes/head.php';?>

<title>Lonavla Weekend : Reservation</title>

<body class="home-3">
    <div class="all">

<?php include 'includes/navbar.php';?>
        <main>
            <div class="page-title-breadcrumbs">
                <div class="breadcrumbs-container container">
                    <div class="breadcrumbs_wrapper">
                        <div class="page-title-container">
                            <h1 class="text-center">About Us</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section main-contact-us">
                <div class="container">
                    <div class="row">

                        <!-- <div class="col-md-4 col-sm-12">
                            <div class="page-title color m-bottom-2">
                                <h3 class="title-main">Contact Form</h3>
                                <div class="title title-icon">
                                    <h2 class="title-h2">Search Rooms</h2>
                                    <p class="description">Send email so that we can get in touch with you.</p>
                                </div>
                            </div>

                            <div id="review">
                                <form method="post" action="#" class="new-review-form">
                                    <fieldset class="spr-form-contact">
                                        <div class="spr-form-contact-checkin">
                                            <input type="Date" class="spr-form-input spr-form-input-text form-control" value="" name="check-in-date" placeholder="Check-In Date" required>
                                        </div>
                                        <div class="spr-form-contact-checkout">
                                            <input type="Date" class="spr-form-input spr-form-input-text form-control" value="" name="checkout-date" placeholder="Check-Out Date" required>
                                        </div>
                                        <div class="spr-form-contact-phone">
                                             <label for="sel1">Select Category (select one):</label>
                                            <input class="spr-form-input spr-form-input-text form-control" value="" name="phone" placeholder="Category" required>
                                            <select class="form-control" id="sel1">
                                                     <option>1BHK</option>
                                                     <option>2BHK</option>
                                                     <option>3BHK</option>
                                            </select>
                                        </div>
                                        <div class="spr-form-contact-name"></div>
                                        <div class="spr-form-contact-adult" style="margin-top: 1rem;">
                                            <input class="spr-form-input spr-form-input-text form-control" value="" name="Date" placeholder="No. Of Adults" required>
                                        </div>
                                        <div class="spr-form-contact-child">
                                            <input class="spr-form-input spr-form-input-text form-control" value="" name="Date" placeholder="No. Of Child" required>
                                        </div>
                                    </fieldset>
                                    <div class="submit">
                                        <button class="add-to-cart" type="submit" name="contact">
                                            <span class="btn view button-main">Check Availability</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div> -->
<!-- <div class="col-md-1"></div> -->
                        <div class="col-lg-12 col-md-12 col-sm-12 m-b-50">
                            <div class="page-title color m-bottom-2">
                                <!-- <h3 class="title-main">About Us</h3> -->
                                <div class="title title-icon">
                                    <h2 class="title-h2">Description</h2>
                                    <p class=""><br>

                                        Welcome to the arms of nature, where you will experience the real cold breeze of Lonavala,
We understand your needs and so we make sure that we provide you with nothing but the best.
We provide well-furnished rooms and villas to make your stay more comfortable and peaceful 
In order to make you decide the temperature of your room , we provide air conditioner in every room We understand that no place is comfortable without safety and so we have our security and care taker's team to manage the hotel and to make your stay memorable and safe. Our motive is to make your stay a memorable ride.
So come and enjoy the happening place in Lonavala. To highlight the nature we have our own nature campus for you 
To give you the feel of nature and to give you some restful space With the swimming pool in the middle of the villas, we make your stay more cool and adventurous With proper parking facilities, we make sure that your ride is safe with us .

                                        <!-- Your thoughts and emotions are the drama that you created in your mind. You must be able to end it somewhere So here is a place @ Lonavala, A story to share & an experience to talk About…. ….in monsoon showers, Chilling breeze find the warmth in soft candle lights, With family, friends and loads of laughter……. Create memories!  -->
                                        <br><b>Nearby Places :-</b> 
                                        <br>Bhaja Caves – 4 KMS <br>Visapur Fort – 6 KMS, <br>Lohagad Fort – 7.5 KMS <br>Ekvira Devi temple – 8 KMS <br>Wax Museum – 8 KMS <br>Wet n Joy water park – 9 KMS <br>Magic mountain amusement park – 9 KMS <br>Della Adventure Park – 13 KMS <br>Paragliding point – 15 KMS…..and many more.  <!-- OVI'S Apartments is set in Lonavala, 9 km from Bhushi Dam, 13 km from Lion's Point, as well as 13 km from Tiger Point. This is the perfect destination for weekend getaways and family holidays. With a view of the beautiful Sahyadri Mountains and the waterfalls , our hotel invites you to breathe more easily from the moment you unpack. -->
                                    </p>
                                </div>
                            </div>
                        <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="content">
                                        <p class="title-black">Rates Classic Room: </p>
                                         <?php
                                            $query1 = "SELECT * FROM `room_type` WHERE `id`=1";
                                            include 'admin/config.php';
                                            $stmt1=$conn->prepare($query1);
                                            $res1=$stmt1->execute();
                                            $row1=$stmt1->fetch();
                                        ?>
                                       <p> 1 Classic Room : RS. <?php echo $row1['room_rate']; ?></p>
                                       <p>Weekend Price: RS. <?php echo $row1['weekend_rate'];?></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="content">
                                        <p class="title-black">Rates Suite Room: </p>
                                        <?php
                                            $query2 = "SELECT * FROM `room_type` WHERE `id`=2";
                                            include 'admin/config.php';
                                            
                                            $stmt2=$conn->prepare($query2);
                                            $res2=$stmt2->execute();
                                            $row2=$stmt2->fetch();
                                        ?>
                                        <p>2 Suite Room: RS. <?php echo $row2['room_rate']; ?></p>
                                        <p>Weekend Price: RS. <?php echo $row2['weekend_rate'];?></p>
                                       <!--  <p>3 BHK: RS.</p> -->
                                    </div>
                                </div>
                            </div>
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
</body>

</html>