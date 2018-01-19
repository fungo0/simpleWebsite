@extends(Auth::user() ? Auth::user()->hasRole('Admin') ? 'layouts.dashboard' : 'includes.header' : 'includes.header')
    
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Create New Course</h1>
                <hr>

                {{-- Using the Laravel HTML Form Collective to create our form --}}
                {{ Form::open(array('route' => 'courses.store')) }}

                <div class="form-group">
                    {{ Form::label('Name', 'Course Title') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                    <br>
                    {{ Form::label('Discipline', 'Course Discipline') }}
                    @if (Auth::user()->hasRole('Admin'))
                        <br>
                    @endif
                    {{ Form::select('discipline', $disciplines) }}
                    <br>
                    {{ Form::label('Level', 'Course Level') }}
                    @if (Auth::user()->hasRole('Admin'))
                        <br>
                    @endif
                    {{ Form::selectRange('level', 1, 6) }}
                    <br>
                    {{ Form::label('Duration', 'Course Duration') }}
                    @if (Auth::user()->hasRole('Admin'))
                        <br>
                    @endif
                    {{ Form::selectRange('duration', 1, 5) }}
                    <br>
                    {{ Form::label('Location', 'Course Location') }}
                    @if (Auth::user()->hasRole('Admin'))
                        <br>
                    @endif
                    {{ Form::select('location', array('China' => 'China', 'USA' => 'USA', 'HK' => 'HK'), 'HK') }}
                    <br>
                    <br>

                    {{ Form::submit('Create Course', array('class' => 'btn btn-success btn-lg btn-block')) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection