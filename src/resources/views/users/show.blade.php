@extends('layouts.master')
@section('main-header')
    <h1>{{ __('DETAIL USER') }}
        <small></small>
    </h1>
@endsection
@section('main-content')
    @if(isset($user))
        <div class="panel-body inf-content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">{{ __('User Information') }}</h3>
                        </div>
                        <div class="box-body">
                            <div class="col-md-4 text-center">
                                <img alt="" title="" class="img-circle img-thumbnail isTooltip"
                                     src="{{ $user->image }}"
                                     data-original-title="Usuario">
                            </div>
                            <div class="col-md-8">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-responsive table-user-information has-description">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                                    {{ __('Identification') }}
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{ $user->id }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-user  text-primary"></span>
                                                    {{ __('Name') }}
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{ $user->name }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-bookmark text-primary"></span>
                                                    {{ __('Gender') }}
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{ $user->gender == \App\User::MALE ? __('Male') : __('Female') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-bookmark text-primary"></span>
                                                    {{ __('Team') }}
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{ $user->team_id }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-eye-open text-primary"></span>
                                                    {{ __('User Type') }}
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{ $user->role == \App\User::ADMIN ? __('Admin') : __('Normal User') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-envelope text-primary"></span>
                                                    {{ __('Email') }}
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{ $user->email }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-calendar text-primary"></span>
                                                    {{ __('Birthday') }}
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{ $user->birthday }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-home text-primary"></span>
                                                    {{ __('Address') }}
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{ $user->address }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-phone text-primary"></span>
                                                    {{ __('Phone Number') }}
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{ $user->phone_number }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-calendar text-primary"></span>
                                                    created
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{ $user->created_at }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-calendar text-primary"></span>
                                                    {{ __('Updated At') }}
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{ $user->updated_at }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="text-primary"></span>
                                                    {{ __('Action') }}
                                                </strong>
                                            </td>
                                            <td>
                                                <a href="{{ route('users.edit', $user->id) }}"><span
                                                            class="btn btn-sm btn-primary">{{ __('Edit') }}</span></a>
                                                <a href="{{ route('users.index') }}"><span
                                                            class="btn btn-sm btn-danger">{{ __('Go to List') }}</span></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <h1>{{ __('Nothing to show!') }}</h1>
    @endif
@endsection