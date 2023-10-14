<!doctype html>
<html lang="en" data-bs-theme="light">

 <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Syed Traders</title>
         <link href="{{asset( 'css/login.css' )}}" rel="stylesheet">
         <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet"/>
         <link href="{{asset( 'css/loader.css' )}}" rel="stylesheet">
         <script src="{{asset('js/axios.min.js')}}"></script>
        
        
      
 </head>
     <body class="bg-stone-100 h-screen">
        
    <div id="loader" class="LoadingOverlay d-none">
        <div class="Line-progress">
            <div class="indeterminate loader-spinner"></div>
        </div>
    </div>
  
            <div class="" id="content-div">
             @yield('content')
            </div>

           <script src="{{asset('js/bootstrap.bundle.js') }}"></script>
           <script src="{{asset('js/config.js')}}"></script>
      </body>
</html>
