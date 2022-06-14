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

		<form method="POST">
			@csrf
			<div class="mb-3">
				<label for="date" class="form-label">Date</label>
				<input type="text" class="form-control" name="date" required placeholder="Date (Unformatted)" value="{{$appointment->date}}">
			</div>
			<button type="submit" class="btn btn-primary">Change Date</button>
		</form>
		
		{{-- main content here --}}

	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection