@extends('back.layout')

@section('css')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
@endsection

@section('main')

<?php 
//print_r($user); 
?>

        <form method="post" action="{{ route('updateprofile') }}">
                              {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border text-center">
                            <h3 class="box-title text-bold">Update/remove profile</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <div class="row">
                                  <div class="col-md-4 col-sm-4 col-xs-12"></div>
                                    <div class="col-md-4 col-sm-4 col-xs-12 text-center">
									    @if (session('user-updated'))
									       @component('back.components.alert')
									           @slot('type')
									               success
									           @endslot
									           {!! session('user-updated') !!}
									       @endcomponent
									    @endif                                   
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" value="@if(old('name')){{old('name')}}@else{{auth()->user()->name}}@endif" class="form-control f-verify input-size" />
                                            {!! $errors->first('name', '<small class="help-block red">:message</small>') !!}
				                            </span>		
                                        </div>
                                    </div>
                                  <div class="col-md-4 col-sm-4 col-xs-12"></div>
                                </div>

                                <div class="row">
                                  <div class="col-md-4 col-sm-4 col-xs-12"></div>
                                    <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                        <div class="form-group">
                                            <label>Email(Login)</label>
                                            <input type="text" name="email" value="@if(old('email')){{old('email')}}@else{{auth()->user()->email}}@endif" class="form-control f-verify input-size" />
                                            {!! $errors->first('email', '<small class="help-block red">:message</small>') !!}
                                        </div>
                                    </div>
                                  <div class="col-md-4 col-sm-4 col-xs-12"></div>
                                </div>

                                <div class="row">
                                  <div class="col-md-4 col-sm-4 col-xs-12"></div>
                                    <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                        <div class="form-group">
                                            <label>New password(if you need)</label>
                                            <input type="password" name="password" value="" class="form-control f-verify input-size" /> 
                                            {!! $errors->first('password', '<small class="help-block red">:message</small>') !!}
                                        </div>
                                    </div>
                                  <div class="col-md-4 col-sm-4 col-xs-12"></div>
                                </div>

                                <div class="row">
                                  <div class="col-md-4 col-sm-4 col-xs-12"></div>
                                    <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                        <div class="form-group">
                                            <label>New password(repeat)</label>
                                            <input type="password" name="password_confirmation" value="" class="form-control f-verify input-size" />
                                            {!! $errors->first('password_confirmation', '<small class="help-block red">:message</small>') !!}
                                        </div>
                                    </div>
                                  <div class="col-md-4 col-sm-4 col-xs-12"></div>
                                </div>
                            </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12"></div>
                                <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                    <button class="btn btn-success input-size">Save</button>                
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12"></div>
                            </div>
                        </div>
                        </form>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12"></div>
                                <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                    <button type="button" class="btn btn-danger input-size">Remove</button>
        <form method="post" action="{{ route('destroyprofile') }}" name="form_destroy" style="display: none;">
                              {{ csrf_field() }}    
        </form>  
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                

@endsection

@section('js')
    <script src="{{ asset('public/js/mine.js') }}"></script>
    <script>
       var swalTitle = '@lang('Really destroy user ?')';
       var confirmButtonText = '@lang('Yes')';
       var cancelButtonText = '@lang('No')';     
       $(document).ready(function(){
          $(".btn.btn-danger").click(function(){
             //form_destroy.submit(); 
             BaseRecord.userdestroy(swalTitle, confirmButtonText, cancelButtonText);
          }); 
       });
    </script>
@endsection    
