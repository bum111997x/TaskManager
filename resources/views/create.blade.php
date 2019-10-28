@extends('home')
@section('title','CREATE CUSTOMER INFO')
@section('content')
        <div class="container">
            <div class="row" >
                <div class="col-md-4">
                    <form method="post" action="{{route('customer.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="Name">Name:</label>
                            <input type="text" class="form-control" id="Name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="Phone">Phone:</label>
                            <input type="text" class="form-control" id="Phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="Email">Email:</label>
                            <input type="text" class="form-control" id="Email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="Address">Address</label>
                            <input type="text" class="form-control" id="Address" name="address">
                        </div>
                        <div class="form-group">
                            <label for="inputFileName">File Name</label>
                            <input type="text"
                                   class="form-control"
                                   id="inputFileName"
                                   name="inputFileName">
                            <input type="file"
                                   class="form-control-file"
                                   id="inputFile"
                                   name="inputFile">
                        </div>
                        <button type="submit" class="btn btn-primary">ADD</button>
                    </form>
                </div>
            </div>
        </div>



@endsection
