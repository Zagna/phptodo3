@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">User list</div>
                @foreach ($users as $user)
                    <div class="panel-body">
                        <div class="col-lg-8">
                            {{ $user->name }}
                        </div>
                        <div class="col-lg-2">
							@if (!$user->hasRole('editor'))
                            <form method="POST" action="/roles/promote/{{ $user->id }}">
                                <button type="submit" class="btn btn-default">Promote to Editor</button>
							@else
							<form method="POST" action="/roles/demote/{{ $user->id }}">
								<button type="submit" class="btn btn-default">Demote from Editor</button>
							@endif
								<input name="role" type="hidden" value="editor">
								{{ csrf_field() }}
                                {{ method_field('PATCH') }}
                            </form>
                        </div>
                        <div class="col-lg-2">
                            @if (!$user->hasRole('admin'))
                            <form method="POST" action="/roles/promote/{{ $user->id }}">
                                <button type="submit" class="btn btn-default">Promote to Admin</button>
							@else
							<form method="POST" action="/roles/demote/{{ $user->id }}">
								<button type="submit" class="btn btn-default">Demote from Admin</button>
							@endif
								<input name="role" type="hidden" value="admin">
								{{ csrf_field() }}
                                {{ method_field('PATCH') }}
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
