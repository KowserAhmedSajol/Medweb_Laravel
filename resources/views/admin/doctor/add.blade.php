<x-sg-master>
    <!-- add new doctor -->

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Add New Doctor</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">

            <form action="{{ route('doctor_insert')}}" method="post" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <div class="form-group">
                        <label>Doctor Type:</label>
                        <input name="specialist" type="text" class="form-control" placeholder="Doctor Type" required>
                    </div>

                    <div class="form-group">
                        <label>Doctor Name:</label>
                        <input name="name" type="text" class="form-control" placeholder="Doctor Name" required>
                    </div>

                    <div class="form-group">
                        <label>Experiences Summary:</label>
                        <input name="Experiences_Summary" type="text" class="form-control" placeholder="EX : MBBS (DMC), FCPS (Surgery)" required>
                    </div>


                    <div class="form-group">
                        <label>Email:</label>
                        <input name="email" type="email" class="form-control" placeholder="Email" required>
                    </div>

                    <div class="form-group">
                        <label>Practice Days:</label>
                        <input name="Practice_Days" type="text" class="form-control" placeholder="EX : Monday, Wednesday, Saturday 3:00PM to 8:00PM" required>
                    </div>

                    <!-- file uploader -->

                    <div class="form-group">
                    <label>Upload Image:</label>
                    <input name="image" type="file" class="file-input" data-fouc>
                    </div>
                </fieldset>


                <div class="text-center mt-2">
                    <button type="submit" class="btn btn-primary">Save<i class="icon-paperplane ml-2"></i></button>
                </div>
            </form>
            

            
        </div>
    </div>



<!-- add new doctor end -->
</x-sg-master>

