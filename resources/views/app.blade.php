<!DOCTYPE html>
<html lang="en" ng-app="adsManagementApp">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Диплом № 2 | Доска объявлений</title>

    <!-- Bootstrap -->
   <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"> 
    <!--link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"-->

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="{{ asset('/css/user.css') }}">
    <!--link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css"-->

@yield('headExtra')
  
  </head>
  <body>

@yield('content')

@yield('scripts')

</body>
</html>