@extends('layouts.auth')

@section('title', 'Login')

@section('content')
	<div class="container" style="height: 100vh; padding-top: 150px">
		<div class="row">
			<div class="col-md-offset-3 col-md-6" style="box-shadow: 5px 5px 10px; background-color: white	">
				<div class="ibox-content">
			        {{ Form::open(['route' => 'login', 'class'=>'form-horizontal']) }}
			            <h1 class="text-center">Sign in</h1>
			            
				        @if (!$errors->isEmpty())
	                        <div class="alert alert-danger alert-dismissionable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                               {!! $errors->first() !!}
                            </div>
                            
	                    @endif
			            <div class="form-group"><label class="col-lg-2 control-label">Email</label>

			                <div class="col-lg-10"><input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus > 
			                </div>
			            </div>
			            <div class="form-group"><label class="col-lg-2 control-label">Password</label>

			                <div class="col-lg-10"><input type="password" placeholder="Password" required class="form-control" name="password"></div>
			            </div>
			            <div class="form-group">
			                <div class="col-lg-offset-2 col-lg-10">
			                    <div class="checkbox checkbox-success"><label> <input type="checkbox"><i></i> Remember me </label></div>
			                </div>
			            </div>
			            <div class="form-group">
			                <div class="col-lg-offset-2 col-lg-10">
			                    <button class="btn btn-sm btn-white" type="submit">Sign in</button>
			                </div>
			            </div>
			        </form>
			    </div>
		    </div>
	    </div>
    </div>
    
@endsection

@section('scripts')
<script src="{!! asset('js/plugins/iCheck/icheck.min.js') !!}" type="text/javascript"></script>
<script>
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });    
</script>
@endsection