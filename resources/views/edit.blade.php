@extends('home')
@section('content')
    <div class="container">
        <div class="row" >
            <div class="col-md-4">
                <form method="post" action="{{route('customer.update',$customer->id)}}">
                    @csrf
                    <div class="form-group">
                        <label for="Name">Name:</label>
                        <input type="text" class="form-control" id="Name" name="name" value="{{$customer->name}}">
                    </div>
                    <div class="form-group">
                        <label for="Phone">Phone:</label>
                        <input type="text" class="form-control" id="Phone" name="phone" value="{{$customer->phone}}">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email:</label>
                        <input type="text" class="form-control" id="Email" name="email" value="{{$customer->email}}">
                    </div>
                    <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" class="form-control" id="Address" name="address" value="{{$customer->address}}">
                    </div>
                    <button type="submit" class="btn btn-primary">UPDATE</button>
                </form>
            </div>
        </div>
    </div>



@endsection
