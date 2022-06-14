@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Appointments</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
					<li class="breadcrumb-item active">Appointments</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<script>
	function cancelAppointment(id){
		const confirm = window.confirm("Are you sure wan to cancel this Appointment ?")
		if(confirm){
			window.location = '/appointment/delete/'+ id;
		}
	}
</script>

<!-- Main content -->
<div class="content">
	<div class="container-fluid">

		@if (Auth::user()->role == 'owner')
		<h4>Create new appointment</h4>
		<form method="POST">
			@csrf
			<div class="mb-3">
				<label for="txtOwner" class="form-label">Owner ID</label>
				<input type="text" readonly class="form-control" value="{{Auth::user()->id}}">
			</div>
			<div class="mb-3">
				<label for="petId" class="form-label">Pet</label>
				<select name="petId" class="form-control">
					<option>Choose Pet</option>
					@foreach(Auth::user()->pet as $pet)
					<option value="{{$pet->id}}">{{$pet->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="mb-3">
				<label for="vetId" class="form-label">Vet Location</label>
				<select name="vetId" class="form-control">
					<option>Choose Vet Location</option>
					@foreach($vets as $vet)
					<option value="{{$vet->id}}">{{$vet->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="mb-3">
				<label for="doctorId" class="form-label">Doctor</label>
				<select name="doctorId" class="form-control">
					<option>Choose Doctor</option>
					@foreach($doctors as $doctor)
					<option value="{{$doctor->id}}">{{$doctor->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="mb-3">
				<label for="date" class="form-label">Date</label>
				<input type="text" name="date" class="form-control" required placeholder="Date (Unformatted)">
			</div>
			<button type="submit" class="btn btn-primary">Create Appointment</button>
		</form>
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
					<td><button onclick="cancelAppointment({{$item->id}})" class="btn btn-danger">Cancel</button></td>
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
					<td><a href="{{route('editAppointment', ['id' => $item->id])}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a> <button class="btn btn-danger" onclick="cancelAppointment({{$item->id}})"><i class="fa fa-trash"></i></button></td>
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