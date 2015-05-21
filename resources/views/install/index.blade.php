@extends('app')

@section('content')

<div class="container" style="width:600px; margin-top: 150px;" >
<form class="form-horizontal"  method="post" action="{{action('Install\InstallController@postInstall')}}" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
    <label class="col-sm-3 control-label">Server name:</label>
        <div class="col-sm-6">
            <input class="form-control" type="text" maxlength="40" value="" name="db_host"  required >
        </div>
    </div>
    <div class="form-group">
    <label class="col-sm-3 control-label">User name:</label>
        <div class="col-sm-6">
            <input class="form-control" type="text" maxlength="40" value="" name="db_user" required >
        </div>
    </div>
    <div class="form-group">
    <label class="col-sm-3 control-label">Password:</label>
        <div class="col-sm-6">
            <input class="form-control" type="text" maxlength="40" value="" name="db_password" >
        </div>
    </div>
    <div class="form-group">
    <label class="col-sm-3 control-label">Database:</label>
        <div class="col-sm-6">
            <input class="form-control" type="text" maxlength="40" value="" name="db_name" required >
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <input class="btn btn-primary" type="submit" value="Install" name="submit" >
        </div>
    </div>
    
</form>
   
<!-- Вывод уведомления об успехе -->
@if ($success)
    	<p class="alert alert-success text-center" role="alert">База данных успешно восстановлена из дампа.</br>
            <a class="alert-link" href="{{URL::to('/')}}">Перейти на главную страницу сайта.</a></p>
@endif

</div>

@endsection

@section('scripts')
<!-- jQuery -->
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<!--script src="bootstrap/js/bootstrap.min.js"></script-->

@endsection

