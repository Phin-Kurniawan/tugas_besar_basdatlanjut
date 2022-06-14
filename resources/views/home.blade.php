@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Home</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item active">Home</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<h4 style="text-align: center">Featured Contents</h4>
		<div class="row">
			<div style="width: 50%">
				<h5 style="text-align: center">Articles</h5>
				<div id="article" class="carousel slide" data-bs-ride="false">
					<div class="carousel-indicators">
						@foreach($articles as $article)
						@if($loop->index == 0)
						<button type="button" data-bs-target="#article" data-bs-slide-to="{{$loop->index}}" class="active"></button>
						@else
						<button type="button" data-bs-target="#article" data-bs-slide-to="{{$loop->index}}"></button>
						@endif
						@endforeach
					</div>
					<div class="carousel-inner">
						@foreach($articles as $article)
						@if ($loop->index == 0)
						<a href="{{route('articleDetails', ['article' => $article->id])}}">
						<div class="carousel-item active">
							<img src="{{asset($article->pic)}}" class="d-block w-100 carouselimg">
							<div class="carousel-caption">
								<h5>{{$article->header}}</h5>
								<p>{{$article->subtitle}}</p>
							</div>
						</div>
						</a>
						@else
						<a href="{{route('articleDetails', ['article' => $article->id])}}">
						<div class="carousel-item">
							<img src="{{asset($article->pic)}}" class="d-block w-100 carouselimg">
							<div class="carousel-caption">
								<h5>{{$article->header}}</h5>
								<p>{{$article->subtitle}}</p>
							</div>
						</div>
						</a>
						@endif
						@endforeach
						<button class="carousel-control-prev" type="button" data-bs-target="#article" data-bs-slide="prev">
							<span class="carousel-control-prev-icon"></span>
						</button>
						<button class="carousel-control-next" type="button" data-bs-target="#article" data-bs-slide="next">
							<span class="carousel-control-next-icon"></span>
						</button>
					</div>
				</div>
			</div>
			<div style="width: 50%">
				<h5 style="text-align: center">Events</h5>
				<div id="event" class="carousel slide" data-bs-ride="false">
					<div class="carousel-indicators">
						@foreach($events as $event)
						@if($loop->index == 0)
						<button type="button" data-bs-target="#event" data-bs-slide-to="{{$loop->index}}" class="active"></button>
						@else
						<button type="button" data-bs-target="#event" data-bs-slide-to="{{$loop->index}}"></button>
						@endif
						@endforeach
					</div>
					<div class="carousel-inner">
						@foreach($events as $event)
						@if ($loop->index == 0)
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
						<button class="carousel-control-prev" type="button" data-bs-target="#event" data-bs-slide="prev">
							<span class="carousel-control-prev-icon"></span>
						</button>
						<button class="carousel-control-next" type="button" data-bs-target="#event" data-bs-slide="next">
							<span class="carousel-control-next-icon"></span>
						</button>
					</div>
				</div>
			</div>
		</div>

	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection