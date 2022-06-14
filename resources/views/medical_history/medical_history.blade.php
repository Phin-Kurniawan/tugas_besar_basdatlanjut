@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Medical History</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
					<li class="breadcrumb-item active">Medical History</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		@if (Auth::user()->role == "doctor")
		<form method="POST">
			@csrf
			<div class="mb-3">
				<label for="txtFilter" class="form-label">Filter Owner</label>
				<select name="txtFilter" class="form-control">
					<option>Choose User</option>
					@foreach($users as $user)
					<option value="{{$user->id}}">{{$user->name}}</option>
					@endforeach
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Filter</button>
		</form>
		<br>
		@endif
		<table class="display">
			<thead>
			<tr>
				<th>Name Pet</th>
				<th>Diagnostic Result</th>
			</tr>
			</thead>
			<tbody>
			@foreach($pets as $pet)
				<tr>
					<td>{{$pet->name}}</td>
					@foreach($pet->medicalHistory as $history)
						<td>{{$history->diagnostic_result}}</td>
					@endforeach
				</tr>
			@endforeach

			</tbody>

		</table>
		{{-- main content here --}}

	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection