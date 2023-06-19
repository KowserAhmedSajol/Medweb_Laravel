    <!-- carousel -->


    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">


            <div class="carousel-item active" data-bs-interval="10000">
                <img src="{{ asset('frontend/images/slide-1.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption animate__animated animate__backInUp animate__delay-.5s">
                    <h5>Ensure Your Medical Services</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, nam!</p>
                    <a class="btn-slide" href="#appointemnt">Appoinment Now</a>
                </div>
            </div>

            <div class="carousel-item" data-bs-interval="10000">
                <img src="{{ asset('frontend/images/slide-2.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption animate__animated animate__backInUp animate__delay-.5s">
                    <h5>Ensure Your Medical Services</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, nam!</p>
                    <a class="btn-slide" href="#appointemnt">Appoinment Now</a>
                </div>
            </div>

            <div class="carousel-item" data-bs-interval="10000">
                <img src="{{ asset('frontend/images/slide-3.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption animate__animated animate__backInUp animate__delay-.5s">
                    <h5>Ensure Your Medical Services</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, nam!</p>
                    <a class="btn-slide" href="#appointemnt">Appoinment Now</a>
                </div>
            </div>
           
        </div>
        <!--prev button-->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <!--next button-->
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- carousel end -->