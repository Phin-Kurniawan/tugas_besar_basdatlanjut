@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">{{$path->title}}</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item"><a href="{{route('event')}}">Events</a></li>
					<li class="breadcrumb-item active">{{$path->title}}</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
	<div class="container-fluid">

		<img src="{{$path->picture}}" style="max-width: 50%; display: block; margin: auto">
		<p>{{$path->news}}</p>
		<strong>For more information, check this <a href="{{$path->link}}">link</a></strong>
		

	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection