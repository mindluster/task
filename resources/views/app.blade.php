<!DOCTYPE html>
<html>
<head>
    <title>Task</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('school') }}">View All Schools </a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('student') }}">View All Students</a></li>
            <li><a href="{{ URL::to('student/create') }}">Add Student</a>
        </ul>
    </nav>
    @yield('content')
</div>
</body>
</html>
