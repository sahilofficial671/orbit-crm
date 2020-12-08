<div class="topbar shadow-sm">
    <div class="topbar-left">
        <a href="http://127.0.0.1:8000" class="brand">
            <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-grid-1x2 icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M6 1H1v14h5V1zm9 0h-5v5h5V1zm0 9h-5v5h5v-5zM0 1a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm9 0a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1V1zm1 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1h-5z"></path>
            </svg>
            Orbit CRM
        </a>
    </div>
    <div class="topbar-middle"></div>
    <div class="topbar-right">
        <ul class="topbar-btns">
            <li>
                <div class="dropdown user">
                    <div class="dropdown-toggle dropdown-button" type="button" id="sideProfileSettings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if (Auth::user()->image)
                        <img src="{{Auth::user()->image}}" alt="">
                        @else
                            <span class="ti-user"></span>
                        @endif
                    </div>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sideProfileSettings">
                        <a href="{{route('user.profile.index')}}" class="dropdown-item">
                            <div class="icon">
                                <span class="ti-user"></span>
                            </div>
                            <div class="label">Edit Profile</div>
                        </a>
                        <a href="{{route('user.password.index')}}" class="dropdown-item">
                            <div class="icon">
                                <span class="ti-lock"></span>
                            </div>
                            <div class="label"> Change Password </div>
                        </a>
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <div class="icon">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5A.5.5 0 0 0 4 8z"/>
                                </svg>
                            </div>
                            <div class="label">{{ __('Logout') }}</div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </div>
                </div> {{-- closed dropdown --}}
            </li>
            <li>
                <div class="dropdown d-block d-sm-none">
                    <div id="sidebarToggle" class="dropdown-button">
                        <span class="ti-layout-grid2"></span>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
