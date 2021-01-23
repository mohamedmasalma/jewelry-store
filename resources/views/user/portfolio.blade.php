@extends('user/app')
@section('main')

<div class="page-title fix"><!--Start Title-->
	<div class="overlay section">
		<h2>Portfolio </h2>
	</div>
</div><!--End Title-->
<div class="portfolio-page page fix"><!--Start Portfolio Area-->
	<div class="container">
		<div class="row">
			<div class="portfolio-filter col-sm-12">
				<button class="filter active" data-filter="all">All</button>
				<button class="filter" data-filter=".business">Business</button>
				<button class="filter" data-filter=".photography">Photography</button>
				<button class="filter" data-filter=".print">Print</button>
				<button class="filter" data-filter=".webdesign">Web Design</button>
			</div>
			<div id="portfolio">
				<div class="mix business webdesign col-sm-4">
					<div class="port-wrap">
						<img src="img/portfolio/portfolio-1.jpg" alt="" />
						<a href="img/portfolio/portfolio-1.jpg" class="hover"><i class="fa fa-search"></i></a>
					</div>
				</div>
				<div class="mix photography print col-sm-4">
					<div class="port-wrap">
						<img src="img/portfolio/portfolio-2.jpg" alt="" />
						<a href="img/portfolio/portfolio-2.jpg" class="hover"><i class="fa fa-search"></i></a>
					</div>
				</div>
				<div class="mix print business col-sm-4">
					<div class="port-wrap">
						<img src="img/portfolio/portfolio-3.jpg" alt="" />
						<a href="img/portfolio/portfolio-3.jpg" class="hover"><i class="fa fa-search"></i></a>
					</div>
				</div>
				<div class="mix webdesign photography col-sm-4">
					<div class="port-wrap">
						<img src="img/portfolio/portfolio-4.jpg" alt="" />
						<a href="img/portfolio/portfolio-4.jpg" class="hover"><i class="fa fa-search"></i></a>
					</div>
				</div>
				<div class="mix business webdesign col-sm-4">
					<div class="port-wrap">
						<img src="img/portfolio/portfolio-5.jpg" alt="" />
						<a href="img/portfolio/portfolio-5.jpg" class="hover"><i class="fa fa-search"></i></a>
					</div>
				</div>
				<div class="mix photography print col-sm-4">
					<div class="port-wrap">
						<img src="img/portfolio/portfolio-6.jpg" alt="" />
						<a href="img/portfolio/portfolio-6.jpg" class="hover"><i class="fa fa-search"></i></a>
					</div>
				</div>
				<div class="mix print business col-sm-4">
					<div class="port-wrap">
						<img src="img/portfolio/portfolio-7.jpg" alt="" />
						<a href="img/portfolio/portfolio-7.jpg" class="hover"><i class="fa fa-search"></i></a>
					</div>
				</div>
				<div class="mix webdesign photography col-sm-4">
					<div class="port-wrap">
						<img src="img/portfolio/portfolio-8.jpg" alt="" />
						<a href="img/portfolio/portfolio-8.jpg" class="hover"><i class="fa fa-search"></i></a>
					</div>
				</div>
				<div class="mix business webdesign col-sm-4">
					<div class="port-wrap">
						<img src="img/portfolio/portfolio-9.jpg" alt="" />
						<a href="img/portfolio/portfolio-9.jpg" class="hover"><i class="fa fa-search"></i></a>
					</div>
				</div>
				<div class="mix photography print col-sm-4">
					<div class="port-wrap">
						<img src="img/portfolio/portfolio-10.jpg" alt="" />
						<a href="img/portfolio/portfolio-10.jpg" class="hover"><i class="fa fa-search"></i></a>
					</div>
				</div>
				<div class="mix print business col-sm-4">
					<div class="port-wrap">
						<img src="img/portfolio/portfolio-11.jpg" alt="" />
						<a href="img/portfolio/portfolio-11.jpg" class="hover"><i class="fa fa-search"></i></a>
					</div>
				</div>
				<div class="mix webdesign photography col-sm-4">
					<div class="port-wrap">
						<img src="img/portfolio/portfolio-12.jpg" alt="" />
						<a href="img/portfolio/portfolio-12.jpg" class="hover"><i class="fa fa-search"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!--End Portfolio Area-->
@endsection