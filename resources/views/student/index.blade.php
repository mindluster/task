
@extends('app')
@section('content')


<h1>All the Students</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>School title</td>
            <td>Order</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($students as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->school_name }}</td>
            <td >{{ $value->order }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td class="text-center">

                <a class="btn btn-small btn-success" href="{{ URL::to('student/' . $value->id) }}">Show this Student</a>

                <a class="btn btn-small btn-info" href="{{ URL::to('student/' . $value->id . '/edit') }}">Edit this Student</a>
                <a  onclick="return confirm('Are you sure?')" class="btn btn-small btn-danger" href="{{ URL::to('student/delete/'. $value->id ) }}">Delete</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
