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
        <h1> <a href="/Dashboard">Syed Traders</a> </h1>
        <div id="loader" class="LoadingOverlay d-none">
            <div class="Line-progress">
                <div class="indeterminate loader-spinner"></div>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="/Home">Home</a></li>
                <li><a href="/Products">Products</a></li>
                <li><a href="/Sales">Sales</a></li>
                <li><a href="/Reports">Reports</a></li>
                <li><a href="/Settings">Settings</a></li>
                <li><a href="{{url('/Logout')}}">Logout</a></li>
            </ul>
        </nav>
    </header>
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
