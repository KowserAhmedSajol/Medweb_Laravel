 <!-- contact Section -->

 <section class="full-height" id="contact">


<div class="container pb-5">
    <h2 class="text-center pb-5">Contact Us</h2>
    <div class="row">
        <div class="col-xl-12">
            <div class="card border-0 rounded-3 shadow-lg overflow-hidden">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="contact-info col-sm-6 shadow-lg overflow-hidden">
                            <div class="info container">
                                <i class="fa-solid fa-location-dot"></i>
                                <div class="topic">Address</div>
                                <p>Rajuk Rajib Shopping Complex, Sector-7, Uttara, Dhaka</p>
                                <i class="fa-solid fa-phone"></i>
                                <div class="topic">Let's Talk</div>
                                <p>01712988806 <br> 01988858108</p>
                                <i class="fa-solid fa-envelope"></i>
                                <div class="topic">General Support</div>
                                <p>sk.karib35@gmail.com <br> kowsersojol@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-sm-6 p-4">
                            <div class="text-center">
                                <div class="h4 pb-5 fw-light">Connected with us</div>
                            </div>

                            <form action="user/uni-user-contact-process.php" method="post">

                                <fieldset>

                                    <!-- Name Input -->

                                    <div class="form-floating mb-3">
                                        <input name="name" class="form-control" type="text" placeholder="Name"
                                            required>
                                        <label for="name">Name</label>
                                    </div>

                                    <!-- Email Input -->
                                    <div class="form-floating mb-3">
                                        <input name="email" class="form-control" type="email"
                                            placeholder="Email Address" required>
                                        <label for="email">Email Address</label>
                                    </div>

                                    <!-- Phone No. Input -->
                                    <div class="form-floating mb-3">
                                        <input name="phone" class="form-control" id="phoneNumber" type="text"
                                            placeholder="Phone Number" required>
                                        <label for="phone">Phone Number</label>
                                    </div>

                                    <!-- Message Input -->
                                    <div class="form-floating mb-3">
                                        <textarea name="message" class="form-control" id="message" type="text"
                                            placeholder="Message" style="height: 10rem;" required></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </fieldset>

                                <!-- Submit button -->
                                <div class="text-center">
                                    <button class="btn btn-danger btn-md" id="submitButton"
                                        type="submit">Submit</button>
                                </div>
                            </form>
                            <!-- End of contact form -->

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</section>

<!-- contact end -->