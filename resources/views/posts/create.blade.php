@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Create Post
        </div>

        <div class="panel-body">
            <form action="{{ route('posts.store') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <input type="text" name="title" class="form-control" placeholder="Title:">
                <input type="text" name="description" class="form-control" placeholder="Description:">

                <input type="submit" value="Save" class="btn btn-success">
            </form>
        </div>
    </div>
@endsection

@push('scripts')

@endpush