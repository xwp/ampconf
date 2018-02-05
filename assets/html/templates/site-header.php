<?php
/**
 * AMPConf static site-header template.
 *
 * @package AMPConf
 */

?>

<div id="page" class="" [class]="ampConf.mobileMenu ? 'no-scroll' : ''">

	<header class="site-header" [class]="ampConf.mobileMenu ? 'site-header is-menu-expanded' : 'site-header'">

		<div class="site-header__branding">
			<h1 class="site-header__title"><a href="home.php#development=1">Brand</a></h1>
			<p class="site-header__description">Previewing Another WordPress Blog</p>
			<button class="site-header__menu-toggle" on="tap:AMP.setState( { ampConf: { mobileMenu: ! ampConf.mobileMenu } } )" aria-controls="primary-menu" aria-expanded="false">
				<span class="screen-reader-text">Open menu</span>
			</button>
		</div>

		<nav class="site-header__nav">
			<div class="site-header__menu">
				<ul class="menu menu--header">
					<li class="menu-item"><a href="category.php#development=1">News</a></li>
					<li class="menu-item menu-item-has-children">
						<a href="category.php#development=1">Sports</a>
						<ul class="sub-menu">
							<li class="menu-item"><a href="category.php#development=1">Odds</a></li>
							<li class="menu-item"><a href="category.php#development=1">Betting</a></li>
							<li class="menu-item"><a href="category.php#development=1">NFL</a></li>
							<li class="menu-item"><a href="category.php#development=1">College Football</a></li>
							<li class="menu-item"><a href="category.php#development=1">Soccer</a></li>
							<li class="menu-item menu-item-has-children">
								<a href="category.php#development=1">More Sports</a>
								<ul class="sub-menu">
									<li class="menu-item"><a href="category.php#development=1">Volleyball</a></li>
									<li class="menu-item"><a href="category.php#development=1">Tennis</a></li>
									<li class="menu-item menu-item-has-children">
										<a href="category.php#development=1">Even More</a>
										<ul class="sub-menu">
											<li class="menu-item"><a href="category.php#development=1">Frisbee</a></li>
											<li class="menu-item"><a href="category.php#development=1">Golf</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="menu-item"><a href="category.php#development=1">Entertainment</a></li>
					<li class="menu-item"><a href="category.php#development=1">Tech</a></li>
					<li class="menu-item"><a href="category.php#development=1">Gaming</a></li>
					<li class="menu-item"><a href="category.php#development=1">Shopping</a></li>
					<li class="menu-item menu-item-search-form">
					</li>
				</ul>
			</div>
			<div class="site-header__search">
				<form method="GET" action="https://example.com/search" target="_top">
					<input type="search" placeholder="Search">
					<button name="submit"></button>
				</form>
			</div>
		</nav>
	</header>
