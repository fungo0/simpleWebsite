@extends(Auth::user() ? Auth::user()->hasRole('Admin') ? 'layouts.dashboard' : 'includes.header' : 'includes.header')

@section('title', '| Permissions')
@section('content')

<div class="col-lg-10 col-lg-offset-1">
    @if (!empty($flash_message))
        <div class="alert alert-success">
            <h2><center>{{ $flash_message }}</center></h2>
        </div>
    @endif
    <h1><i class="fa fa-key"></i>Available Permissions
    <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>
    <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a></h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td>
                    <td>
                    {{-- url("permissions/{$permission->id}/edit") --}}
                    <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Add Permission</a>

</div>

@endsection
