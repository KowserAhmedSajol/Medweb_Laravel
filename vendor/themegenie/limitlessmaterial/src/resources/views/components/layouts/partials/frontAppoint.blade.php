  <!-- Appointment Section -->

  <section class="full-height" id="appointemnt">

<div class="container mt-5 pb-3 animate__animated animate__backInLeft animate__delay-.5s">
    <h2 class="text-center pb-5">Make Appointemnt</h2>

    <div class="card">
        <div class="card-body">



            <form class="row mt-5">

                <div class="row">
                    <div class="col-lg-6">
                        <label for="inputCategory" class="form-label">Specialist</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Select Specialist</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="inputDoctor" class="form-label">Doctor</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Select Doctor</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label for="inputName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="inputName">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPhone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="inputPhone">
                    </div>
                </div>


                <div class="row mt-2">
                    <div class="col-lg-6">
                        <label for="inputCity" class="form-label">City</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="col-lg-4">
                        <label for="inputState" class="form-label">State</label>
                        <select id="inputState" class="form-select">
                            <option selected>Choose</option>
                            <option>State 1</option>
                            <option>State 2</option>
                            <option>State 3</option>
                            <option>State 4</option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label for="inputZip" class="form-label">Zip</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-12">
                        <label for="message" class="form-label">Message</label>
                        <textarea type="text" class="form-control" id="inputmessage"
                            placeholder="Message"></textarea>
                    </div>
                </div>


                <div class="row">
                    <div class="mt-4 text-center">
                        <a href="login_modals.html" type="submit" class="btn btn-danger">Make An Appointment</a>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>

</section>



<!-- Appointment Section end -->