@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Edit Appointment</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item"><a href="{{route('appointment')}}">Appointments</a></li>
					<li class="breadcrumb-item active">Edit Appointment</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<script>
function delAppointment(id){
	if(confirm('Are you sure you want to delete this appointment?')){
		window.location = '/appointment/delete/' + id;
	}
}
</script>

<!-- Main content -->
<div class="content">
	<div class="container-fluid">

		@if (Auth::user()->role == 'owner')
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
		@else
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
					<td><a href="{{route('editAppointment', ['id' => $item->id])}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a> <button class="btn btn-danger" onclick="delAppointment({{$item->id}})"><i class="fa fa-trash"></i></button></td>
				</tr>
			@endforeach

			</tbody>

		</table>
		@endif
		
		{{-- main content here --}}

	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection