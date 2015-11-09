<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="icon" type="image/ico" href="favicon.ico"/>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		{{ HTML::script('js/functions.js') }}
		{{ HTML::script('js/jquery.slimscroll.min.js') }}
		<title>
		    @yield('title')
		</title>

		{{ HTML::style('css/default.css') }}
	</head>



	<body>
		<div id="header_cov"></div>
		<div id="header">
			<a id="arrow_l" href=""> </a>
			<div id="games_cont">

				<a href="" title="W3">{{ HTML::image('img/game.png', 'W3', array('class' => 'game')) }}</a>
				<a href="" title="W3">{{ HTML::image('img/game.png', 'W3', array('class' => 'game')) }}</a>
				<a href="" title="W3">{{ HTML::image('img/game.png', 'W3', array('class' => 'game')) }}</a>
				<a href="" title="W3">{{ HTML::image('img/game.png', 'W3', array('class' => 'game')) }}</a>
			</div>
			<a id="arrow_r" href=""> </a>
			<div id="login_cont">
			    @if(Auth::guest())
			        {{ link_to_route('login.post', 'Přihlásit se') }}
			         | {{ link_to_route('user.create', 'Registrace') }}
                @else
                    {{ link_to_route('logout', 'Odhlásit se') }}
                @endif
            </div>
            @if(!Auth::guest())
                <a href="{{route('user.show', Auth::user()->id) }}">{{ HTML::image('img/avatar.png', 'Upravit profil', array('id' => 'avatar')) }}</a>
            @endif

		</div>
		<div id="content_area">
			<div id="menu_l_cov">
				<div class="menu_in">
                    <h2>Menu</h2>
                    <ul>
                        <li>
                            {{ link_to_route('home', 'Home') }}
                        </li>
                        <li>
                            {{ link_to_route('teams.index', 'Seznam týmů') }}
                        </li>
                        <li>
                            {{ link_to_route('invitations.index', 'Moje týmy a pozvánky') }}
                        </li>
                    </ul>
                </div>
			</div>

			<div id="content_cov"></div>
			<div id="content">
				<div id="content_inner">

					@yield('content')

				</div>
			</div>
			<div id="menu_r_cov">
				<div class="menu_in">
                </div>
			</div>
		</div>
		<div id="footer">
			<br>
			<br>
			<endora></endora>
		    {{ HTML::image('img/logo.png', 'logo Silicon Hill', array('id' => 'logo')) }}
		</div>
	</body>

</html>