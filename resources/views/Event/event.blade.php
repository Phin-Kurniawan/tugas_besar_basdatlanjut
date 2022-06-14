@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Events</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
					<li class="breadcrumb-item active">Events</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<script>
function delEvent(id){
	if(confirm('Are you sure you want to delete this event?')){
		window.location = '/event/delete/' + id;
	}
}
</script>

<!-- Main content -->
<div class="content">
	<div class="container-fluid">

		@if(Auth::user()->role == 'owner')
		@php
		$featuredEvents = $path->where('featured', 'true');
		@endphp
		{{-- Carousel for featured events --}}
		<h3>Featured Events</h3>
		<div class="w-50" style="margin: auto">
			<div id="articleCarousel" class="carousel slide" data-bs-ride="true">
				<div class="carousel-indicators">
					@foreach($featuredEvents as $featured)
						@if($loop->index == 0)
						<button type="button" data-bs-target="#articleCarousel" data-bs-slide-to="{{$loop->index}}" class="active"></button>
						@else
						<button type="button" data-bs-target="#articleCarousel" data-bs-slide-to="{{$loop->index}}"></button>
						@endif
					@endforeach	
				</div>
				<div class="carousel-inner">
					@foreach($featuredEvents as $event)
						@if($loop->index == 0)
						<a href="{{route('eventDetails', ['event' => $event->id])}}">
							<div class="carousel-item active">
								<img src="{{$event->picture}}" class="d-block w-100 carouselimg">
								<div class="carousel-caption">
									<h5>{{$event->title}}</h5>
									<p>{{$event->date}}</p>
								</div>
							</div>
						</a>
						@else
						<a href="{{route('eventDetails', ['event' => $event->id])}}">
							<div class="carousel-item">
								<img src="{{$event->picture}}" class="d-block w-100 carouselimg">
								<div class="carousel-caption">
									<h5>{{$event->title}}</h5>
									<p>{{$event->date}}</p>
								</div>
							</div>
						</a>
						@endif
					@endforeach
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#articleCarousel" data-bs-slide="prev">
					<span class="carousel-control-prev-icon"></span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#articleCarousel" data-bs-slide="next">
					<span class="carousel-control-next-icon"></span>
				</button>
			</div>
		</div>

		<h4>All Events</h4>
		{{-- Cards for all articles --}}
		<div style="margin: auto; max-width:80%;">
			<div class="row row-cols-*">
				@foreach($path as $event)
				<div class="card cardwidth">
					<a href="{{route('eventDetails', ['event' => $event->id])}}" style="text-decoration: none; color:black">
						<img src="{{$event->picture}}" class="card-img-top">
						<div class="card-body h-100">
							<h5 class="card-title">{{$event->title}}</h5>
							<p class="card-text">{{$event->date}}</p>
						</div>
					</a>
				</div>
				@endforeach
			</div>
		@else
			{{-- Admin Page --}}
			<h1>Add new event</h1>
			<form method="POST">
				@csrf
				<div class="mb-3">
					<label for="txtTitle" class="form-label">Title</label>
					<input type="text" class="form-control" name="txtTitle" required placeholder="Event Title">
				</div>
				<div class="mb-3">
					<label for="txtNews" class="form-label">News</label>
					<input type="text" class="form-control" name="txtNews" required placeholder="Event News (details)">
				</div>
				<div class="mb-3">
					<label for="txtDate" class="form-label">Date</label>
					<input type="text" class="form-control" name="txtDate" required placeholder="Event Date (unformated)">
				</div>
				<div class="mb-3">
					<label for="txtPicture" class="form-label">Picture</label>
					<input type="text" class="form-control" name="txtPicture" required placeholder="Event picture URL">
				</div>
				<div class="mb-3">
					<label for="txtLink" class="form-label">Link</label>
					<input type="text" class="form-control" name="txtLink" required placeholder="Event website URL">
				</div>
				<div class="mb-3">
					<input name="isFeatured" value="true" type="checkbox">
					<label for="isFeatured" class="form-label">Make this event featured</label>
				</div>
				<button type="submit" class="btn btn-primary">Add Event</button>
			</form>
			<br>
			<table class="display">
				<thead>
					<tr>
						<th>Title</th>
						<th>News</th>
						<th>Picture</th>
						<th>URL</th>
						<th>Featured</th>
						<th>Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				@foreach($path as $event)
					<tr>
						<td>{{$event->title}}</td>
						<td>{{$event->news}}</td>
						<td><img src="{{$event->picture}}" style="max-width: 100px"></td>
						<td>{{$event->link}}</td>
						<td>{{$event->featured}}</td>
						<td>{{$event->date}}</td>
						<td><a class="btn btn-warning" href="{{route('editEvent', ['event' => $event->id])}}"><i class="fa fa-pencil"></i></a> <button class="btn btn-danger" onclick="delEvent({{$event->id}})"><i class="fa fa-trash"></i></button></td>
					</tr>
				@endforeach
				</tbody>
			</table>
		@endif

	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection