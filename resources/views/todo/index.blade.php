@extends('layouts.app')

<?php
$button = 'Add new';
?>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            @foreach ($todos as $section)
            <div class="panel panel-default">
                <div class="panel-heading">{{ $section->name }}</div>
                @if (count($section['todos']) > 0)
                    @foreach ($section['todos'] as $todo)
                    <div class="panel-body">
                        <div class="col-lg-10">
                            {{ $todo->body }}
                        </div>
                        <div class="col-lg-1">
                            <a class="btn btn-default" href="/{{ $todo->id }}">Edit</a>
                        </div>
                        <div class="col-lg-1">
                            <form method="POST" action="/{{ $todo->id }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-default">Delete</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="panel-body">
                        Nothing yet.
                    </div>
                @endif
                @unset($todo)
            </div>
            @endforeach
            <div class="panel panel-default">
                <div class="panel-heading">Add todo</div>
                @include ('todo.form')
            </div>
        </div>
    </div>
</div>
@endsection
