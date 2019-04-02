    <footer>
		<div class="wrap-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-footer footer-1">
						<div class="footer-heading"><h1><span style="color: #fff;">NEWSPAPER</span></h1></div>
						<div class="content">
							<p>Never missed any post published in our site. Subscribe to our daily newsletter now.</p>
							<strong>Email address:</strong>
							<form action="#" method="post">
								<input type="text" name="your-name" value="" size="40" placeholder="Your Email" />
								<input type="submit" value="SUBSCRIBE" class="btn btn-3" />
							</form>
						</div>
					</div>
					<div class="col-md-4 col-footer footer-2">
						<div class="footer-heading"><h4>Categories</h4></div>
						<div class="content">
							<a href="/basketball">Basketball</a>
							<a href="/football">Football</a>
							<a href="/volleyball">Volleyball</a>
							<a href="/rugby">Rugby</a>
							<a href="/handball">Handball</a>
							<a href="/swimming">Swimming</a>
							<a href="/cricket">Cricket</a>
							<a href="/cycling">Cycling</a>
							<a href="/athletic">Athletism</a>
							<a href="{{ route('journalist.login') }}" target="_blank">Journalist</a>
						</div>
					</div>
					<div class="col-md-4 col-footer footer-3">
						<div class="footer-heading"><center><h4>Inkuru Zigezweho</h4></center></div>
						<div class="content">
							<ul>
							@foreach($titles as $title)
								<li><a href="{{ url($title->slug) }}">{{ ucfirst($title->title) }}</a></li>
							@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="copy-right">
			<p>Copyright 2019 <a href="/" rel="nofollow">Imikino.net</a>All Rights Reserved. Developed by <a href="https://www.facebook.com/spartacus.amphoteric" target="_blank" rel="nofollow">Eng. Igor Jean-Luc NDIRAMIYE</a></p>
		</div>
	</footer>