<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
         <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
         <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet"/>
         <link href="{{asset( 'css/loader.css' )}}" rel="stylesheet">
         <script src="{{asset('js/axios.min.js')}}"></script>
    
</head>
<body class="bg-stone-100 h-screen">
    <header>
                <h1> Syed Traders </h1>
        <h3>Distributor: Unilever Bangladesh Limited</h3>
     
        

        <div id="loader" class="LoadingOverlay d-none">
            <div class="Line-progress">
                <div class="indeterminate loader-spinner"></div>
            </div>
        </div>
      
    </header>
    <nav>
        <ul>
            <li><a href="{{url('/Dashboard')}}">Dashboard</a></li>
            <li><a href="{{url('/Category')}}">Category</a></li>
            <li><a href="{{url('/Logout')}}">Logout</a></li>
        </ul>
      </nav>

    
    <main>
       
        <section class="content">
            <div class="" id="content-div">
                @yield('content')
               </div>
        </section>
    </main>

    
    <footer>
        <p>&copy; 2023 Your Company</p>
    </footer>
    <script src="{{asset('js/bootstrap.bundle.js') }}"></script>
    <script src="{{asset('js/config.js')}}"></script>
</body>
</html>
