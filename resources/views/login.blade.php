@include('template.header')
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-12 text-black d-flex justify-content-center align-items-center">
                <div class="">
                    <div class="d-flex align-items-center">

                        <form style="width: 28rem; height: auto;" action="{{ route('logmasuk') }}" method="post">
                            @csrf
                            <h2 class="mb-3 pb-3 mt-4 text-center fw-semibold" style="font-family: 'Poppins', sans-serif !important;">Log in to your account</h2>

                            <div class="input-group input-group-lg mb-4">
                                <span class="rounded-end-0 input-group-text bg-muted">
                                    <i class="fas fa-user text-muted"></i>
                                </span>
                                <input type="text" id="username" name="username" class="form-control border-start-0" placeholder="Username" />
                            </div>

                            <div class="input-group input-group-lg mb-0">
                                <span class="rounded-end-0 input-group-text bg-muted">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input type="password" id="password" name="password" class="form-control border-start-0 border-end-0" placeholder="Password" />
                                <span class="input-group-text border-start-0 bg-white rounded-start-0" onclick="togglePassword()" style="cursor: pointer;">
                                    <i id="toggleIcon" class="fas fa-eye-slash text-muted"></i>
                                </span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-5 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                                    <label class="form-check-label text-muted" for="rememberMe">
                                        Remember me
                                    </label>
                                </div>

                                <p class="mb-0">
                                    <a class="text-muted" href="{{ route('forgotPassword') }}">Forgot password?</a>
                                </p>
                            </div>

                            <div class="pt-1 px-4 mb-4 d-flex justify-content-center">
                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                            </div>


                            <p class="text-center">Don't have an account? <a href="{{ route('register') }}" class="link-info">Register here</a></p>

                        </form>

                    </div>
                </div>



            </div>
            <div class="col-lg-6 col-12 rounded-10 d-flex flex-column align-items-center justify-content-center position-relative"
                style="background-image: url({{ asset('assets/prismakhas/bg-new.png') }}); background-size: cover; background-position: center; height: 100vh;">
                <div class="position-absolute" style="top:15px; right:15px;">

                    <ul class="nav nav-pills border-0 bg-light rounded-pill px-2 py-1 shadow-sm" style="width: max-content; font-size: 0.85rem;">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }} px-3 py-1 rounded-pill"
                                href="{{ route('login') }}" id="login-tab">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('register') ? 'active' : '' }} px-3 py-1 rounded-pill"
                                href="{{ route('register') }}" id="register-tab">Register</a>
                        </li>
                    </ul>

                </div>
                <div class="d-flex flex-column justify-content-center align-items-center mb-5 pb-5">
                    <img src="{{ asset('assets/prismakhas/logo-pk-white.png') }}" class="" alt="" width="37%">
                    <div class="text-white text-center mt-5">
                        <h1 class="fw-bold" style="font-family: 'Poppins', sans-serif !important; letter-spacing: 1px">WELCOME TO</h1>
                        <h1 class="fw-bold" style="font-family: 'Poppins', sans-serif !important; letter-spacing: 1px">HELPDESK TICKETING SYSTEM</h1>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';

            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        }
    }
</script>
@include('template.footer');