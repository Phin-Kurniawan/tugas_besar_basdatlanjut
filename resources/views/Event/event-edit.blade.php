@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Edit Event</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item"><a href="{{route('event')}}">Events</a></li>
					<li class="breadcrumb-item active">Events</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
	<div class="container-fluid">

		<form method="POST">
			@csrf
			<div class="mb-3">
				<label for="txtTitle" class="form-label">Title</label>
				<input type="text" class="form-control" name="txtTitle" required placeholder="Event Title" value="{{$path->title}}">
			</div>
			<div class="mb-3">
				<label for="txtNews" class="form-label">News</label>
				<input type="text" class="form-control" name="txtNews" required placeholder="Event News (details)" value="{{$path->news}}">
			</div>
			<div class="mb-3">
				<label for="txtDate" class="form-label">Date</label>
				<input type="text" class="form-control" name="txtDate" required placeholder="Event Date (unformated)" value="{{$path->date}}">
			</div>
			<div class="mb-3">
				<p>Currently applied photo:</p>
				<img src="{{$path->picture}}" style="max-width: 120px">
				<br>
				<label for="txtPicture" class="form-label">Picture</label>
				<input type="text" class="form-control" name="txtPicture" required placeholder="Event picture URL" value="{{$path->picture}}">
			</div>
			<div class="mb-3">
				<label for="txtLink" class="form-label">Link</label>
				<input type="text" class="form-control" name="txtLink" required placeholder="Event website URL" value="{{$path->link}}">
			</div>
			<div class="mb-3">
				@if ($path->featured == "true")
					<input name="isFeatured" value="true" type="checkbox" checked>
					<label for="isFeatured" class="form-label">Make this event featured</label>
				@else
					<input name="isFeatured" value="true" type="checkbox">
					<label for="isFeatured" class="form-label">Make this event featured</label>
				@endif
			</div>
			<button type="submit" class="btn btn-primary">Edit Event</button>
		</form>

	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection