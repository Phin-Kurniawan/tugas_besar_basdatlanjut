@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Articles</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
					<li class="breadcrumb-item active">Articles</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<script>
function delArticle(id){
	if (confirm("Are you sure to delete this article?")){
		window.location = '/articles/delete/' + id;
	}
}
</script>

<!-- Main content -->
<div class="content">
	<div class="container-fluid">

		@if(Auth::user()->role == 'admin')
		{{-- Admin view --}}
		<form method="POST" enctype="multipart/form-data" action="{{route('addArticle')}}">
			@csrf
			<div class="mb-3">
				<label class="form-label" for="txtHeader">Header</label>
				<input type="text" name="txtHeader" class="form-control" required>
			</div>
			<div class="mb-3">
				<label class="form-label" for="txtSubtitle">Subtitle</label>
				<input type="txt" name="txtSubtitle" class="form-control" required>
			</div>
			<div class="mb-3">
				<input type="checkbox" name="isFeatured" value="true">
				<label class="form-label" for="isFeatured">Featured Article</label>
			</div>
			<div class="mb-3">
				<label class="form-label" for="articlePic">Article Picture</label>
				<input type="file" accept="image/jpeg image/png" class="form-control" name="articlePic" required>
			</div>
			<div class="mb-3">
				<label class="form-label" for="articleContent">Article Content (HTML)</label>
				<input type="file" accept=".html" class="form-control" name="articleContent" required>
			</div>
			<button type="submit" name="txtSubmit" class="btn btn-primary">Add Article</button>
		</form>
		<br>
		<table class="display">
			<thead>
				<tr>
					<th>Header</th>
					<th>Subtitle</th>
					<th>Is Featured</th>
					<th>Article Picture</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($articles as $article)
					<tr>
						<td>{{$article->header}}</td>
						<td>{{$article->subtitle}}</td>
						<td>{{$article->featured}}</td>
						<td><img src="{{asset($article->pic)}}" style="max-width: 150px"></td>
						<td><a class="btn btn-warning" href="{{route('editArticle', ['article' => $article->id])}}"><i class="fa fa-pencil"></i></a> <button class="btn btn-danger" onclick="delArticle({{$article->id}})"><i class="fa fa-trash"></i></button></td>
					</tr>
				@endforeach
			</tbody>
		</table>
		@else
		@php
		$featuredArticles = $articles->where('featured', 'true');
		@endphp
		{{-- Carousel for featured articles --}}
		<h3>Featured Articles / Tutorials</h3>
		<div class="w-75" style="margin: auto">
			<div id="articleCarousel" class="carousel slide" data-bs-ride="true">
				<div class="carousel-indicators">
					@foreach($featuredArticles as $featured)
						@if($loop->index == 0)
						<button type="button" data-bs-target="#articleCarousel" data-bs-slide-to="{{$loop->index}}" class="active"></button>
						@else
						<button type="button" data-bs-target="#articleCarousel" data-bs-slide-to="{{$loop->index}}"></button>
						@endif
					@endforeach	
				</div>
				<div class="carousel-inner">
					@foreach($featuredArticles as $article)
						@if($loop->index == 0)
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
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#articleCarousel" data-bs-slide="prev">
					<span class="carousel-control-prev-icon"></span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#articleCarousel" data-bs-slide="next">
					<span class="carousel-control-next-icon"></span>
				</button>
			</div>
		</div>

		{{-- Cards for all articles --}}
		<div style="margin: auto; max-width:80%;">
			<div class="row row-cols-*">
				@foreach($articles as $article)
				<div class="card cardwidth">
					<a href="{{route('articleDetails', ['article' => $article->id])}}" style="text-decoration: none; color:black">
						<img src="{{asset($article->pic)}}" class="card-img-top">
						<div class="card-body h-100">
							<h5 class="card-title">{{$article->header}}</h5>
							<p class="card-text">{{$article->subtitle}}</p>
						</div>
					</a>
				</div>
				@endforeach
			</div>
		@endif
		

	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection