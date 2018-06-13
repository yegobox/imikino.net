    <nav id="menu" class="navbar container">
		<div class="navbar-header">
			<button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
			<a class="" href="/">
				<img style="height:50px;width:150px;" src="{{ asset('images/logo2.png') }}" alt="logo"/>
				<!--<div style="font-family:cursive;font-size:20px;font-style:italic;text-shadow: 5px 4px 4px grey;" class="logo">
					<span style="color:lightskyblue">Imi</span><span style="color:gold">kino</span><span style="color:seagreen">.net</span>
				</div>-->
			</a>
		</div>
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul id="navmain" class="nav navbar-nav">
				<li><a href="/">Home</a></li>
				<li><a href="/rwanda">Rwanda</a></li>
				<li><a href="/africa">Africa</a></li>
				<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Ibwotamasimbi <i class="fa fa-arrow-circle-o-down"></i></a>
					<div style="background-color: #B0FABF;" class="dropdown-menu">
						<div class="dropdown-inner">
							<ul class="list-unstyled">
								<li><a href="/england">England</a></li>
								<li><a href="/spain">Spain</a></li>
								<li><a href="/france">France</a></li>
								<li><a href="/italy">Italy</a></li>
								<li><a href="/germany">Germany</a></li>
								<li><a href="/america">America</a></li>
								<li><a href="/asia">Asia</a></li>
								<li><a href="/other">Ahasigaye hose</a></li>
							</ul>
						</div>
					</div>
				</li>
				
				<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">More Sports <i class="fa fa-arrow-circle-o-down"></i></a>
					<div id="sport" class="dropdown-menu" style="margin-left: -203.625px;background-color: #B0FABF">
						<div class="dropdown-inner">
							<ul class="list-unstyled">
								<li><a href="/basketball">Basketball</a></li>
								<li><a href="/football">Football</a></li>
								<li><a href="/volleyball">Volleyball</a></li>
							</ul>
							<ul class="list-unstyled">
								<li><a href="/rugby">Rugby</a></li>
								<li><a href="/handball">Handball</a></li>
								<li><a href="/swimming">Swimming</a></li>
							</ul>
							<ul class="list-unstyled">
								<li><a href="/cricket">Cricket</a></li>
								<li><a href="/cycling">Cycling</a></li>
								<li><a href="/athletic">Athletic sports</a></li>
							</ul>
						</div>
					</div>
				</li>
			</ul>
			<ul class="list-inline navbar-right top-social">
				<li><a href="https://www.facebook.com/imikino.net/" target="_blank" rel="nofollow"><i class="fa fa-facebook"></i></a></li>
				<li><a href="https://twitter.com/ImikinoCom" target="_blank" rel="nofollow"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
				<li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
				<li><a href="{{ route('journalist.login') }}" target="_blank"><i class="fa fa-users"></i></a></li>
				<li><a href="{{ route('login') }}" target="_blank"><i class="fa fa-user"></i></a></li>
			</ul>
		</div>
	</nav>