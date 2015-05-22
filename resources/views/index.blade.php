@extends('app')

@section('headExtra')
@endsection

@section('content')
<div class="container-fluid" >
<div ng-controller="mainController">
  
@include('site/informer') 

<div class="col-sm-4 col-sm-offset-1 " style="padding: 30px;">

@include('site/form')
    
</div>
<div class="col-sm-6 " >
        
@include('site/table')            
    
</div>
        
</div>
</div>
@endsection

@section('scripts')
<!-- jQuery -->
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<!--script src="bootstrap/js/bootstrap.min.js"></script-->

<!-- AngularJS -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-sanitize.min.js"></script>
<script src="{{ asset('angularjs/adsManagementApp.js') }}"></script>
<script src="{{ asset('angularjs/Services/dataService.js') }}"></script>
<script src="{{ asset('angularjs/Services/actionService.js') }}"></script>
<script src="{{ asset('angularjs/Services/informService.js') }}"></script>
<script src="{{ asset('angularjs/Controllers/mainController.js') }}"></script>
@endsection