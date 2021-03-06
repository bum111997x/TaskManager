@extends('home')
@section('title','LIST CUSTOMER')
@section('content')
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand">BUM</a>
        <form class="form-inline" action="{{route('customer.search')}}" method="get">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>
    <br>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Image</th>

            <th scope="col" colspan="2" ><a href="{{route("customer.create")}}" class="btn btn-primary" >ADD</a></th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $key => $customer)
            <tr>
                <th scope="row">{{++$key}}</th>
                <td>{{$customer->name}}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->address}}</td>
                <td><img src="{{ asset('storage/images/' . $customer->image) }}" alt="" style="width: 150px; height: 100px"></td>
                <td><a href="{{route('customer.edit', $customer->id)}}" class="btn btn-primary">EDIT</a></td>
                <td><a href="{{route('customer.delete', $customer->id)}}" class="btn btn-primary">DELETE</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$customers->links()}}
@endsection
