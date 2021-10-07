@include('header')

<body class="antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <div class="absolute top-5 left-5 text-2xl">
            <a href='/'>HOME</a>
        </div>
        @if(session()->has('message'))
        <div class="success_message">
            <strong>{{ session()->get('message') }}</strong>
        </div>
        @endif
        @yield('content')
    </div>
</body>

@include('footer')
