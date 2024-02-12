<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Laravel Blog</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/amazeui/css/amazeui.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/common.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--
    <script src="{{ mix('js/app.js') }}" defer></script>-->
    <!-- select2 cdn-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>

<body>
    <div id="app">
    <!--<header class="am-topbar am-topbar-fixed-top">-->
        <div class="am-container">
            <h1 class="am-topbar-brand">
                <a href="/">Blog</a>
            </h1>

            <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-secondary am-show-sm-only"
                    data-am-collapse="{target: '#collapse-head'}"><span class="am-sr-only">導航切換</span> <span
                    class="am-icon-bars"></span></button>

            <div class="am-collapse am-topbar-collapse" id="collapse-head">
                <ul class="am-nav am-nav-pills am-topbar-nav">
                    <li><a href="{{route('issues.index')}}">活動</a></li>
                    
                    <li><a href="/about">關於</a></li>
                </ul>

                <div class="am-topbar-right">
                    @guest
                        <a href="{{ route('login') }}" class="am-btn am-btn-secondary am-topbar-btn am-btn-sm">
                            <span class="am-icon-user"></span> 登入
                        </a>
                        <a href="{{ route('register') }}" class="am-btn am-btn-secondary am-topbar-btn am-btn-sm">
                            <span class="am-icon-user"></span> 註冊
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="am-btn am-btn-secondary am-topbar-btn am-btn-sm">
                            <span class="am-icon-user"></span> {{ auth()->user()->name }}
                        </a>
                    @endguest

                    @auth
                        <a href="{{ route('logout') }}" class="am-btn am-btn-secondary am-topbar-btn am-btn-sm"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="am-icon-sign-out"></span> 登出
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endauth

               
                </div>
            </div>
        </div>
    <!--</header>-->

    @yield('content')

    <footer class="footer">
        <p class="am-padding-left">Copy Right : Calvin Chia</p>
    </footer>
</div>

    <!--[if lt IE 9]>
    <script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script src="assets/vendor/amazeui/js/amazeui.ie8polyfill.min.js"></script>
    <![endif]-->

    <!--[if (gte IE 9)|!(IE)]><!-->
    <!--<![endif]-->
    <script src="{{ asset('assets/js/laravel.js') }}"></script>
    <script src="{{ asset('assets/js/common.js') }}"></script>
</body>
</html>
