@extends('includes.header')

@section('content')
<div class="courses_box1">
   	<div class="container">
   	  	<div class="col-md-3">@include('includes.leftcoursebox2')</div>
		<div class="col-md-9">
            @if (!empty($flash_message))
                <div class="alert alert-success">
                    <h2><center>{{ $flash_message }}</center></h2>
                </div>
            @endif
            <div style="float: right; margin: 10px"><a href="/payment"><button class="btn btn-info">Pay</button></a></div>
            <div class="course_list">
                <div class="table-header clearfix">
                    <div class="id_col">ID</div>
                    <div class="name_col"  style="width: 250px">Course Name (Lv.)</div>
                    <div class="duration_col">Duration</div>
                    <div class="date_col" style="width: 160px">Location</div>
                    <div>Action</div>
                </div>
                <ul class="table-list">
                    @foreach ($admissions as $admission)
                        <li class="clearfix">
                            <div class="id_col">{{ $admission->course->id }}</div>
                            <div class="name_col" style="width: 250px">{{ $admission->course->name }} (Lv. {{ $admission->course->level }})</div>
                            <div class="duration_col">{{ $admission->course->duration }} Hrs</div>
                            <div class="date_col">
                                {{ $admission->course->location }}
                            </div>
                            <div>
                                <a href="/courseunregister/{{ $admission->id }}"><button class="btn btn-danger">Unregister</button></a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div>
                <hr>
                <center><a href="{{ url('/material') }}"><button class="btn btn-success btn-lg">Get Course Related Material</button></a></center>
            </div>
        </div>
    </div>
</div>
@endsection