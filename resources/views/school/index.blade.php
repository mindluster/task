
@extends('app')
@section('content')


<h1>All the Schools</h1>


<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($schools as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td class="text-center">

                <a class="btn btn-small btn-success" href="{{ URL::to('school/' . $value->id) }}">Show this School</a>

                <a class="btn btn-small btn-info" href="{{ URL::to('school/' . $value->id . '/edit') }}">Edit this School</a>
                <a  onclick="return confirm('Are you sure?')" class="btn btn-small btn-danger" href="{{ URL::to('school/delete/'. $value->id ) }}">Delete</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
