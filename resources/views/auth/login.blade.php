@include('template.header')

@include('component.navbar')

<div class="container">

    @if (session()->has('success'))
        <div class="alert alert-success mt-5 mx-auto" role="alert" style="width: 500px">
            {{ session('success') }}
        </div>
    @endif

    <div class="my-5">
        <div class="card mx-auto" style="width: 500px">
            {{-- <img src="..." class="card-img-top" alt="..."> --}}
            <div class="card-body">
                <h5 class="card-title">LOGIN</h5>

                {{-- notif --}}
                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif



                <div class="mt-4">
                    <form action="{{ url('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="email"
                                class="form-control @error('email')
                            is-invalid
                        @enderror"
                                id="email" placeholder="Email" name="email" required autofocus
                                value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" placeholder="Password"
                                name="password" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm text-end">Login</button>

                        {{-- <a href="{{ url('/') }}" class="btn btn-secondary btn-sm">Home</a> --}}
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@include('template.footer')
