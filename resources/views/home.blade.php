@include('template.header')

@include('component.navbar')
<br>
<div class="container">

    <h1>HOMEPAGE</h1>

    {{-- <a class="btn btn-success" href="{{ url('login') }}">Login</a> --}}
    <a class="btn btn-warning" href="{{ url('todos') }}">Todo</a>
</div>

@include('template.footer')
