@extends('app')
@section('content')
<h1>Edit Student</h1>

<form  action="{{url('school')}}/{{$school->id}}" method="PATCH">
        @csrf

        <input placeholder="School Name" class="form-control" type="text" value="{{$school->name}}" name="name"><br>

        <br>
        <input class="btn btn-info" type="submit" value="Update School">
</form>
@endsection
