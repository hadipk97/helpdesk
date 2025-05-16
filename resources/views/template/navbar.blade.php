<nav class="bg-white navbar-light border-bottom p-3">



    <div class="d-flex flex-row justify-content-between align-items-center">
        <div>
            <button type="button" id="sidebarCollapse" class="btn btn-link btn-lg">
                <i class="fas fa-align-left"></i>
            </button>
        </div>


        <div class="d-flex flex-row align-items-center">
            <div>
                <input type="text" class="form-control" placeholder="Search...">
            </div>
            <div>
                <i class="h4 fas fa-bell ml-4 text-primary fw-semibold"></i>
            </div>
            <div>
                <a class="ml-2 " href="{{ route('profile') }}">

                    <span class="h6 text-dark fw-bold">Hi,
                        @if (Auth::check())
                        {{ Auth::user()->username }}
                        @endif
                    </span>

                </a>
            </div>
            <div>
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="rounded-circle mx-4" width="40">
            </div>
        </div>
    </div>

</nav>