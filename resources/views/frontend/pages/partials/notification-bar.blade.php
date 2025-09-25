<div class="notification-bar">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="notification-content">
                    <li class="notify-wrap noti-text-wrap">
                        <div class="noti-text">
                            <p>Welcome to SmartTech Online Store</p>
                        </div>
                    </li>
                    <li class="notify-wrap user-wrap">
                        <div class="user-wrapper">
                            <a class="user-link collapsed" data-bs-toggle="collapse" href="#store-account"
                                aria-expanded="false">
                                @auth

                                    <span class="user-text">{{ auth()->user()->name }}'s account</span>
                                @else
                                    <span class="user-text">My account</span>

                                @endauth

                            </a>
                            <div class="user-drower collapse" id="store-account">
                                @auth
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="javascript:void(0)" onclick="event.preventDefault();
                                                            this.closest('form').submit();">Log Out</a>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}">Login</a>
                                    <a href="{{ route('register') }}">Register</a>
                                @endauth
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>