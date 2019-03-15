@extends('layouts.app')

@section('content')
<a href="{{route('posts.index')}}" class="btn btn-danger">Back</a>

   <form action="{{route('posts.store')}}" method="POST">
       @csrf
       <p>{{$post->title}}</p>
     
   </form>

@endsection