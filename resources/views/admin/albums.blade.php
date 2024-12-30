@php


	//dump($albums);


@endphp

@extends('admin.layout')
@section('content')
<section class="content">
      <div class="container-fluid">


      @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
      @endif

      <a href="{{route('admin.albums.create')}}"
        class="btn btn-primary" style="margin-bottom: 10px;"
        >Create New Album</a>

        <!-- Small boxes (Stat box) -->
        <div class="row">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Cover Image</th>
	  <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
	@foreach($albums as $album)
    <tr>
      <th scope="row">1</th>
      <td>{{$album->title}}</td>
      <td>{{$album->description}}</td>
	  <td>----</td>
      <td>

	  <a href="{{route('admin.albums.edit',$album->id )}}">Edit</a>
	  <a href="{{route('admin.albums.delete',$album->id )}}">Delete</a>
	  </td>
    </tr>
@endforeach
  </tbody>
</table>
</div>
</div>
</section>
@endsection
