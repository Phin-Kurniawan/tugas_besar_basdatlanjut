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
				<th>Owner</th>
				<th>Pet name</th>
				<th>Vet Name</th>
				<th>Vet Address</th>
				<th>Doctor</th>
				<th>Date</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			@foreach($appointment as $item)
				<tr>
					<td>{{$item->user->name}}</td>
					<td>{{$item->pet->name}}</td>
					<td>{{$item->vet->name}}</td>
					<td>{{$item->vet->address}}</td>
					<td>{{$item->doctor->name}}</td>
					<td>{{$item->date}}</td>
					<td><a href="">Cancel</a></td>
				</tr>
			@endforeach

			</tbody>

		</table>
		{{-- main content here --}}

	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection