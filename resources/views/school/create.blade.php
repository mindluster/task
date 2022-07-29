@extends('app')
@section('content')
<h1>Create a Student</h1>


<form  action="{{url('school')}}" method="post">
        @csrf
        <input placeholder="school Name" class="form-control" type="text" name="name"><br>

        <br>
        <input class="btn btn-info" type="submit" value="Store School">
</form>
@endsection
