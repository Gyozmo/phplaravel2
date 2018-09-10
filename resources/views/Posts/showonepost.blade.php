@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card mb-3 shadow">
                
                <div class="card-header">{{ $posts->title }}</div>
                {{ $posts->author }}<br><br>

                <div class="card-body">
                    {{ $posts->content}}<br>
                </div>
            </div>

            <br><br>
            <form action="/addcomments" method="post">
            @csrf
            <label for="content">Content</label><br>
            <textarea name="content" id="" cols="70" rows="5"></textarea>
            <button type="submit" value="{{ $posts->id }}" name="id">Send</button>
            </form>
            <br><br>

            @foreach ($comments as $val)
            <div class="card mb-3 shadow">
                
                <div class="card-header">{{ $val->author }}</div>
                <br><br>

                <div class="card-body">
                {{ $val->content }}<br>
                <a href="/editcom/{{ $val->id }}">Edit</a><br>
                <a href="/deletecom/{{ $val->id }}">Delete</a>
                </div>
            </div>
            
            <br>
            <br><br>
            @endforeach
            

        </div>
    </div>
</div>
@endsection
