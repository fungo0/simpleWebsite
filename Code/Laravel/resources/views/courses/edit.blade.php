@extends('includes.header')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Edit Course</h1>
            <hr>
            {{ Form::model($course, array('route' => array('courses.update', $course->id), 'method' => 'PUT')) }}
            <div class="form-group">
                {{ Form::label('Name', 'Course Title') }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}
                <br>
                {{ Form::label('Level', 'Course Level') }}
                {{ Form::selectRange('level', 1, 6) }}
                <br>
                {{ Form::label('Duration', 'Course Duration') }}
                {{ Form::selectRange('duration', 1, 5) }}
                <br>
                {{ Form::label('Location', 'Course Location') }}
                {{ Form::select('location', array('China' => 'China', 'USA' => 'USA', 'HK' => 'HK'), 'HK') }}
                <br>
                <br>

                {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>

@endsection