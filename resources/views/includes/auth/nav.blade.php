<nav class="navbar navbar-expand-md navbar-light">
    <div class="container">
        <a class="navbar-brand text-white" style="text-shadow: 2px 2px black;" href="{{ route('home') }}">SDP Debate Tracker</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: white;">
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#create-debate-modal">Create Debate</a>
                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#create-discussion-modal">Create Disussion</a>
                        <a class="dropdown-item" href="{{ route('debate.export') }}">Export</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                
                @include('modals.create_debate')
                @include('modals.create_discussion')
            </ul>
        </div>
    </div>
</nav>