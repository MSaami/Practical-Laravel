@extends('panel.main')
@section('panel')
<form method="post" action=" {{route('users.update' , $user->id)}} ">
    @csrf

    <div class="form-group ">
        <span> @lang('users.add role to user') </span>
        <hr>
    </div>
    <div class="form-group">
        @forelse ($roles as $role)
        <div class="custom-control custom-checkbox custom-control-inline">
        <input type="checkbox" name='roles[]' {{$user->roles->contains($role) ? 'checked' : ''}} value="{{$role->name}}" class="custom-control-input" id="{{'role' . $role->id}}">
        <label class="custom-control-label" for="{{'role' . $role->id}}">{{$role->persian_name}}</label>
        </div>
        @empty
           <p>
               @lang('users.there are not any role')
               </p> 
        @endforelse
    </div>
    <div class="form-group mt-5">
        <span> @lang('users.add permission to user') </span>
        <hr>
    </div>
    <div class="form-group">
        @forelse ($permissions as $permission)
        <div class="custom-control custom-checkbox custom-control-inline">
        <input type="checkbox" name='permissions[]' {{$user->permissions->contains($permission) ? 'checked' : ''}} value="{{$permission->name}}" class="custom-control-input" id="{{'permission' . $permission->id}}">
        <label class="custom-control-label" for="{{'permission' . $permission->id}}">{{$permission->persian_name}}</label>
        </div>
        @empty
           <p>
               @lang('users.there are not any role')
               </p> 
        @endforelse
    </div>
    <div class="form-group mt-5">
        <button class="btn btn-primary"> @lang('users.update') </button>
    </div>
</form>
@endsection
