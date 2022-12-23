<div class="modal fade" id="activate-user-{{$user->id}}">
    <div class="modal-dialog">
        <div class="modal-content border border-danger">
            <div class="modal-header border-0 border-bottom border-danger">
                <h4 class="text-danger">Activate User</h4>
            </div>
            <div class="modal-body">
                <h6 class="text-danger fw-bold text-start">Are you sure Activate your accont?</h6> 
                <div class="mt-1">
                    <div class="row">
                        <div class="col text-start">
                            <span>Name: {{$user->name}}</span><br>
                            <span>Working Duration: {{$user->how_long}}year</span><br>
                            <span>
                                Role:   
                                    @if ($user->roke_id===1)
                                        Admin</h3>
                                    @else
                                        General</h3>
                                    @endif
                            </span>
                        </div>
                        <div class="col d-flex justify-content-center">
                            @if ($user->image)
                                <img src="{{asset('storage/user/'.$user->image)}}" alt="{{$user->image}}" class="img-mid">
                            @else
                                <img src="{{asset('storage/no_picture.jpg')}}" alt="No Image" class="img-mid">
                            @endif
                            
                        </div>
                    </div>
                    
                    
                </div>
            </div>
            <div class="modal-footer border-0">
                <div class="row">
                    <div class="col-auto">
                        <button type="button" data-bs-dismiss="modal" class="form-control">
                            Cancel
                        </button>
                    </div>
                    <div class="col-auto">
                        <form action="{{route('admin.activate',$user->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger text-white" class="form-control">
                                Activate
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>