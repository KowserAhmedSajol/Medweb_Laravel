<x-sg-master>
                    <!-- Horizontal cards -->
                    <div class="mb-3 pt-2">
                        <h6 class="mb-0 font-weight-semibold">
                            Doctors
                        </h6>
    
                    </div>
                    @if(Session::has('message'))
                    <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
				    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>{{Session::get('message')}}</div>
                    @endif  

                    
                    <div class="row">
                    @foreach($doctors as $doctor)
                        <div class="col-xl-3 col-md-6">
                        
    
                            <div class="card card-body">
                                <div class="media">
                                    <div class="mr-3">
                                        <a href="#">
                                            <img src="{{asset('uploads/images/'.$doctor->image)}}" class="rounded-circle"
                                                width="42" height="42" alt="">
                                        </a>
                                    </div>
    
                                    <div class="media-body">
                                        <h6 class="mb-0">{{$doctor->name}}</h6>
                                        <span class="text-muted">{{$doctor->specialist}}</span>
                                    </div>
    
                                    <div class="ml-3 align-self-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item dropdown-toggle caret-0"
                                                    data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
    
    
                                                    <form action="admin-doctor-view.php" method="post">
                                                        <input type="hidden" name="id" value="1">
                                                        <button class="dropdown-item" type="submit"><i
                                                                class="icon-eye"></i>View Details</button>
                                                    </form>
    
    
                                                    <form action="doctor-profile-edit.php" method="post">
                                                        <input type="hidden" name="id" value="1">
                                                        <input type="hidden" name="picture" value="female-doctor.jpg">
                                                        <button class="dropdown-item" type="submit"><i
                                                                class="icon-pencil"></i>Edit Details</button>
                                                    </form>
                                                        
                                                    <form action="/doctor/delete" method="get">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$doctor->id}}">
                                                    <input type="hidden" name="image" value="{{$doctor->image}}">
                                                    <button class="dropdown-item" type="submit"
                                                    onclick="return confirm('Are You Sure?')"><i
                                                    class="icon-cross"></i>Delete</button>
                                                </form>
                                                    
    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
    
                        </div>     
                        </div> 
                        </div>
                            
    
                    <!-- /horizontal cards -->
</x-sg-master>