@extends('home')
@section('title','SEARCH BY NAME')
@section('content')
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="{{route('customer.index')}}">SEARCH BY NAME</a>
        <form class="form-inline" action="{{route('customer.search')}}">
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
            <th scope="col">EDIT</th>
            <th scope="col">DELETE</th>

        </tr>
        </thead>
        <tbody>
        @foreach($DBSearch as $key => $customer)
            <tr>
                <th scope="row">{{++$key}}</th>
                <td>{{$customer->name}}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->address}}</td>
                <td></td>
                <td><a href="{{route('customer.edit', $customer->id)}}" class="btn btn-primary">EDIT</a></td>
                <td><a href="{{route('customer.delete', $customer->id)}}" class="btn btn-primary">DELETE</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$DBSearch->links()}}
@endsection
