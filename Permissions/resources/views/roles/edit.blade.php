@extends('panel.main')
@section('panel')
<div class="card">
    <div class="card-header">
        @lang('users.edit role')
    </div>
    <div class="card-body">
    <form method="post" action="{{route('roles.update' , $role->id)}}">
            @csrf
            <div class="form-row">
                <div class="col">
                <input type="text" name="name" class="form-control" value="{{$role->name}}" placeholder=" @lang('users.role name') ">
                    @if($errors->has('name'))
                    <small class="form-text text-danger"> {{$errors->first('name')}} </small>
                    @endif
                </div>
                <div class="col">
                <input type="text" name="persian_name" class="form-control"  value="{{$role->persian_name}}" placeholder=" @lang('users.role persian name') ">
							@if($errors->has('persian_name'))
							<small class=" form-text text-danger"> {{$errors->first('persian_name')}} </small>
                    @endif
                </div>
            </div>
            <div class="form-group mt-5">
                <span>
                    @lang('users.add permission to role')
                </span>
                <hr>
            </div>
            <div class="form-group">
        @forelse ($permissions as $permission)
        <div class="custom-control custom-checkbox custom-control-inline">
        <input type="checkbox" name='permissions[]' {{$role->permissions->contains($permission) ? 'checked' : ''}} value="{{$permission->name}}" class="custom-control-input" id="{{'permission' . $permission->id}}">
        <label class="custom-control-label" for="{{'permission' . $permission->id}}">{{$permission->persian_name}}</label>
        </div>
        @empty
           <p>
               @lang('users.there are not any role')
               </p> 
        @endforelse
            </div>
            <div class="form-group">
                <button class="btn btn-primary">@lang('users.edit')</button>
            </div>
        </form>
    </div>
</div>
@endsection
