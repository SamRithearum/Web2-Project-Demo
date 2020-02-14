<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MVC-Project Demo</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Fontfaces CSS-->
        <link href="/css/font-face.css" rel="stylesheet" media="all">
        <link href="/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
        <!-- Main CSS-->
        <link href="/css/theme.css" rel="stylesheet" media="all">
        <link href="/css/main.css" rel="stylesheet" media="all">
        <link href="/css/util.css" rel="stylesheet" media="all">
        <link type="text/css" href="/css/jquery.datetimepicker.css" rel="stylesheet" media="all">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/images/logo.jpg" style="height:45px; width:auto;" alt="CMCB-Logo"> - MVC-Project Demo
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <div class="image">
                                    <img src="/images/user.png" style="height:40px;" alt="{{ Auth::user()->name }}" />
                                </div>
                            </li>
                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if (Auth::user()->role == 'superadmin')
                                    <a class="dropdown-item" href="/user/users">{{'Manage Users'}}</a>
                                    <a class="dropdown-item" href="/">{{'Panel Discussion'}}</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4 page-content--bgf7">
            @yield('content')
        </main>
    </div>

<script src="{{ asset('js/jquery.js') }}"></script>
<script>

$(document).on( "click", '.edit_button',function(e) {
    console.log('This function execute')
        var id = $(this).data('myid');
        var note = $(this).data('mynote');

    $(".add_note_id").val(id);
    $(".add_note_detail").val(note);
});
</script>

<!-- Date time Picker -->
<script src="/js/jquery.datetimepicker.full.js"></script>

<script type="text/javascript">
jQuery(document).ready(function($) {
    $(function() {
        $('#datetimepicker').datetimepicker();
        $('#datetimepicker2').datetimepicker();
    });
});
</script>
<script type="text/javascript">
$(document).on('keypress', '#alphabetOnly', function (event) {
    var regex = new RegExp("^[a-zA-Z]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});
</script>
<script type="text/javascript">
$(document).on('keypress', '#alphabet', function (event) {
    var regex = new RegExp("^[a-zA-Z ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});
</script>
<script>
	jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
	});
</script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        if($("input[name='showOthers']").is(':checked')){
            $('#others').show();
        }else{
            $('#others').hide();
        }
        $("input[name='showOthers']").change(function() {
            if(this.checked) {
                $('#others').show();
            }
            else{
                $('#others').hide();
            }
        });
	});

</script>
<SCRIPT language=Javascript>
    <!--
    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }
    //-->
            
            
$("div#awareOther").hide();
$("#aware").change(function() {
    // jQuery
    var selectedVal = $(this).find(':selected').val();
    if (selectedVal == 'other') {
        $("div#awareOther").show();
    }
    else {
        $("div#awareOther").hide();
    }
});
</SCRIPT>
</body>
</html>
