@extends('layouts.app')

<?php
$patch = true;
$button = 'Update';
?>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit todo</div>
                @include ('todo.form')
            </div>
        </div>
    </div>
</div>
@endsection
