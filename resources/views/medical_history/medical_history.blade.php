@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Find Vets</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
					<li class="breadcrumb-item active">Find Vets</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
	<div class="container-fluid">

		<table>
			<thead>
			<tr>
				<th>Name Pet</th>
				<th>Diagnostic Result</th>
			</tr>
			</thead>
			<tbody>
			@foreach($ as $item)
				<tr>
					<td>{{Auth::user()->pet}}</td>
					<td>{{$item->address}}</td>
				</tr>
			@endforeach

			</tbody>

		</table>
		{{-- main content here --}}

	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection