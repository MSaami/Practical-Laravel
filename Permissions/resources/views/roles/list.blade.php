@extends('panel.main')
@section('panel')
		<div class="card">
			<div class="card-header">
				@lang('users.add role')
			</div>
			<div class="card-body">
			<form method="post" action="{{route('roles.store')}}">
					@csrf
					<div class="row">
						<div class="col-md-5">
							<input type="text" name="name" class="form-control  " placeholder=" @lang('users.role name') ">
							@if($errors->has('name'))
							<small class="form-text text-danger"> {{$errors->first('name')}} </small>
							@endif
						</div>
						<div class="col-md-5">
							<input type="text"  name="persian_name" class="form-control " placeholder=" @lang('users.role persian name') ">
							@if($errors->has('persian_name'))
							<small class="form-text text-danger"> {{$errors->first('persian_name')}} </small>
							@endif
						</div>
						<div class="col-md-2">
							<button class="btn btn-primary btn-sm">
							@lang('users.add')
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="card mt-5">
			<div class="card-header">
				@lang('users.show roles')
			</div>
			<div class="card-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">@lang('users.role name')</th>
							<th scope="col"> @lang('users.role persian name') </th>
							<th scope="col"> @lang('users.operation') </th>
						</tr>
					</thead>
					<tbody>
						@forelse ($roles as $role)
						<tr>
							<td> {{$role->name}} </td>
							<td> {{$role->persian_name}} </td>
						<td> <a href="{{route('roles.edit' , $role->id)}}"> @lang('users.edit') </a> </td>
						</tr>
						@empty
						<p>
							@lang('users.there are not any role')
							</p>	
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
@endsection