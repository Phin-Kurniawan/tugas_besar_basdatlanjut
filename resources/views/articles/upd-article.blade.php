@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Update Article</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item"><a href="{{route('articles')}}">Articles</a></li>
					<li class="breadcrumb-item active">Update Article</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
	<div class="container-fluid">

		<form method="POST" enctype="multipart/form-data" action="{{route('editArticle', ['article' => $article->id])}}">
			@csrf
			<div class="mb-3">
				<label class="form-label" for="txtHeader">Header</label>
				<input type="text" name="txtHeader" class="form-control" required value="{{$article->header}}">
			</div>
			<div class="mb-3">
				<label class="form-label" for="txtSubtitle">Subtitle</label>
				<input type="txt" name="txtSubtitle" class="form-control" required value="{{$article->subtitle}}">
			</div>
			<div class="mb-3">
				@if($article->featured == "true")
				<input type="checkbox" name="isFeatured" value="true" checked>
				<label class="form-label" for="isFeatured">Featured Article</label>
				@else
				<input type="checkbox" name="isFeatured" value="true">
				<label class="form-label" for="isFeatured">Featured Article</label>
				@endif
			</div>
			<div class="mb-3">
				<p>Currently applied image:</p>
				<img src="{{asset($article->pic)}}" style="max-width: 150px">
				<br>
				<label class="form-label" for="articlePic">Article Picture</label>
				<input type="file" accept="image/jpeg image/png" class="form-control" name="articlePic">
			</div>
			<div class="mb-3">
				<p>Currently applied content</p>
				<iframe src="{{asset($article->content_path)}}" style="width: 500px"></iframe>
				<br>
				<label class="form-label" for="articleContent">Article Content (HTML)</label>
				<input type="file" accept=".html" class="form-control" name="articleContent">
			</div>
			<button type="submit" name="txtSubmit" class="btn btn-primary">Update Article</button>
		</form>

	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection