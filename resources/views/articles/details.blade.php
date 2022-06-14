@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">{{$article->header}}</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item"><a href="{{route('articles')}}">Articles</a></li>
					<li class="breadcrumb-item active">{{$article->header}}</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
	<div class="container-fluid">

		<h4>{{$article->subtitle}}</h4>
		<img src="{{asset($article->pic)}}" style="margin: auto; max-width: 60%; display:block">
		<br>
		<iframe src="{{asset($article->content_path)}}" style="margin: auto; display:block; width: 80%; height: 500px"></iframe>

	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection