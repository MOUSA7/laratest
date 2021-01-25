@extends('layouts.app')

@section('content')

    <div class="container">

        <form class="form-inline float-right" method="get"  action="{{ URL::action('PostController@search') }}">
            <input class="form-control mr-sm-2" type="search" name="title" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0"  type="submit">Search</button>
        </form>
        <br>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>title</th>
                <th>content</th>
                <th>slug</th>
                <th>Country</th>
                <th>City</th>
                <th>status</th>
                <th>Created_at</th>
                <th>actions</th>
            </tr>
            </thead>

            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{Str::limit($post->content,15)}}</td>
                    <td><a href="{{url('posts/show',$post->slug)}}">view post</a></td>
                    <td>{{$post->country ? $post->country->name:'UNCategorized'}}</td>
                    <td>City</td>
                    <td>{{$post->status}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{route('posts.delete',$post->id)}}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>


    </div>
@endsection
