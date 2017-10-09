@extends('layouts.master')
@section('main-header')
    <h1>{{ __('CREATE TEAM PAGE') }}
        <small></small>
    </h1>
@endsection
@section('main-content')
    <div class="row center">
        @include('flash::message')
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{ __('Create Team') }}</h3>
                </div>
                <form action="{{ route('teams.store') }}" enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}
                    <div class="col-md-2"></div>
                    <div class="box-body col-md-8">
                        <div class="form-group col-md-12 {{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col-md-2"><label>{{ __('Name') }}</label></div>
                            <div class="col-md-10"><input type="text" class="form-control" name="name"
                                                          value="{{ old('name') }}">
                                @if($errors->first('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-12 {{ $errors->has('home_stadium_id') ? ' has-error' : '' }}">
                            <div class="col-md-2"><label>{{ __('Home Stadium') }}</label></div>
                            <div class="col-md-10"><select class="form-control" name="home_stadium_id">
                                    <option value="">{{ __('Choose Home Stadium') }}</option>
                                    @foreach($stadiums as $stadium)
                                        <option {{ (old('home_stadium_id') == $stadium->id) ? 'selected' : '' }} value="{{ $stadium->id }}">{{ $stadium->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('home_stadium_id'))
                                    <span class="help-block">{{ $errors->first('home_stadium_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-12 {{ $errors->has('description') ? ' has-error' : '' }}">
                            <div class="col-md-2"><label>{{ __('Slogan') }}</label></div>
                            <div class="col-md-10"><textarea class="col-md-10 form-control" name="slogan"> {{ old('slogan', "") }}
                            </textarea>
                                @if($errors->first('slogan'))
                                    <span class="help-block">{{ $errors->first('slogan') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-12 {{ $errors->has('avatar') ? ' has-error' : '' }}">
                            <div class="col-md-2"><label>{{ __('Logo') }}</label></div>
                            <div class="col-md-10"><input class="form-control" type="file" name="avatar">
                                @if($errors->first('avatar'))
                                    <span class="help-block">{{ $errors->first('avatar') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary pull-left"
                                       value="{{ __('Create') }}">
                                <input type="reset" class="btn btn-danger pull-right"
                                       value="{{ __('Reset') }}">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer text-center"></div>
                </form>
            </div>
        </div>
    </div>
@endsection
