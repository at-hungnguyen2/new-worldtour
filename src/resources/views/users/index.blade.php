@extends('layouts.master')
@section('main-header')
    <h1>
        {{ __('LIST USERS') }}
        <small></small>
    </h1>
@endsection
@section('main-content')
	@if(isset($users))
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">{{ __("User's Table Data") }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-tools">
                            <form action="" class="pull-right">
                                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm pull-right"
                                   id="btn-add-user">
                                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                                    {{ __('Add User') }}
                                </a>
                                <div class="input-group input-group-sm search-group">
                                    <input class="form-control" type="search" name="search"
                                           value="{{ request('search') }}"
                                           placeholder="type here for search">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div id="table_wrapper" class="table-responsive form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="table" class=" table table-bordered dataTable table-hover"
                                   role="grid"
                                   aria-describedby="table_info">
                                <thead>
                                <tr>
                                    <th class="col-md-1">{{ __('id') }}</th>
                                    <th class="col-md-3">{{ __('Name') }}</th>
                                    <th class="col-md-3">{{ __('Email') }}</th>
                                    <th class="col-md-1 text-center">{{ __('Gender') }}</th>
                                    <th class="col-md-1 text-center">{{ __('Role') }}</th>
                                    <th class="col-md-1 text-center">{{ __('Team') }}</th>
                                    <th class="col-md-2 text-center">{{ __('Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="text-center">
                                        	<i class="{{ ($user->gender == 1) ? 'fa fa-mars':'fa fa-venus' }}"></i>
                                        </td>
                                        <td class="text-center">
                                            <i class="{{ ($user->role == 1) ? 'fa fa-black-tie':'fa fa-user' }}"></i>
                                        </td>
                                        <td class="text-center">
                                            {{ $user->team_id }}
                                        </td>
                                        <td class="text-center"><a href="{{ route('users.show', $user->id) }}"
                                               class="btn btn-sm btn-info"><i
                                                        class="fa fa-search-plus"></i></a>
                                            <a href="{{ route('users.edit', $user->id) }}"
                                               class="btn btn-sm btn-success"><i
                                                        class="fa fa-edit"></i></a>
                                            <form method="POST" action="{{ route('users.destroy', $user->id) }}"
                                                  class="inline delete-item">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                <button class="btn btn-danger btn-sm btn-confirm"
                                                        data-confirm="{{ __('Are you sure to delete this user?') }}"
                                                        data-title="{{ __('Delete User') }}" type="submit">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="box-tools">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    @else
        <h1>{{ __('Nothing to show!') }}</h1>
    @endif
@endsection
