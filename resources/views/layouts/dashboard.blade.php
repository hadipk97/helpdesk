<html>

<head>

@include('template.header')

</head>


<body id="body-pd" class="d-flex">
    {{-- Sidebar --}}
    <aside id="sidebar" class="sidebar">
        @yield('sidebar')
    </aside>

    <main role="main" class="main-content flex-grow-1">
        @include('template.navbar')
        @yield('content')
    </main>
</body>
@include('template.footer')
</html>