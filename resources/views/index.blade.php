@extends('home')
@section('content')


    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th></th>
            <th scope="col" ><a href="{{route("customer.create")}}" class="btn btn-primary">ADD</a></th>
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
                <td><a href="{{route('customer.edit', $customer->id)}}" class="btn btn-primary">EDIT</a></td>
                <td><a href="{{route('customer.delete', $customer->id)}}" class="btn btn-primary">DELETE</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
