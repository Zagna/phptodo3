@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Section list</div>
                @foreach ($sections as $section)
                    <div class="panel-body">
                        <div class="col-lg-10">
                            {{ $section->name }}
                        </div>
                        <div class="col-lg-1">
                            <a class="btn btn-default" href="/sections/{{ $section->id }}">Edit</a>
                        </div>
                        <div class="col-lg-1">
                            <form method="POST" action="/sections/{{ $section->id }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-default">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Add Section</div>
                <div class="panel-body">
                    <form method="POST" action="/sections">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Section">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add new</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
