@extends('app')
@section('content')
<h1>Create a Student</h1>


<form  action="{{url('student')}}" method="post">
        @csrf
        <input placeholder="Student Name" class="form-control" type="text" name="name"><br>

        <label>Choose School</label>
        <select class="form-control" name="school_id">
            @foreach($schools as $school)
              <option value="  {{$school->id}}">  {{$school->name}}</option>
            @endforeach
        </select>
        <br>
        <input class="btn btn-info" type="submit" value="Store Student">
</form>
@endsection
