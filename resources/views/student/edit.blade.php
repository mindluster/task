@extends('app')
@section('content')
<h1>Edit Student</h1>

<form  action="{{url('student')}}/{{$student->id}}" method="PATCH">
        @csrf

        <input placeholder="Student Name" class="form-control" type="text" value="{{$student->name}}" name="name"><br>

        <label>Choose School</label>
        <select class="form-control" name="school_id">
            @foreach($schools as $school)
              <option  @if($student->school_id == $school->id) selected @endif value="{{$school->id}}"> {{$school->name}}</option>
            @endforeach
        </select>
        <br>
        <input class="btn btn-info" type="submit" value="Update Student">
</form>
@endsection
