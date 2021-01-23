@extends('user/app')
@section('main')

<div class="page-title fix"><!--Start Title-->
	<div class="overlay section">
		<h2>Shop List</h2>
	</div>
</div><!--End Title-->
<!-- Shop Product Area Start -->
<div class="shop-product-area section fix">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="shop-sidebar fix">
					<!-- single-sidebar start -->
					<div class="sin-shop-sidebar shop-category">
						<h2>Category</h2>
						<ul>
							<li><a href="{{route('user.shop.list')}}">All</a></li>
							@foreach($cat as $cats)
							<li><a href="{{ URL('/user/shop/list/'.$cats->id )}}">{{$cats['name']}}</a></li>
						    @endforeach
						</ul>
					</div>
					<!-- single-sidebar end -->
					<!-- single-sidebar start -->
					<div class="sin-shop-sidebar shop-add">
						<a href="#"><img src="img/shop-add-1.jpg" alt=""></a>
					</div>
					<!-- single-sidebar end -->
				
					<!-- single-sidebar start -->
					<div class="sin-shop-sidebar product-price-range">
						<h2>Price</h2>
						<div class="slider-range-container">
							<div id="slider-range"></div>
							<p>
								<input type="text" id="price-amount" readonly>
							</p>
						</div>
					</div>
					<!-- single-sidebar end -->
					<!-- single-sidebar start -->
					<div class="sin-shop-sidebar shop-add">
						<a href="#"><img src="img/shop-add-2.jpg" alt=""></a>
					</div>
					<!-- single-sidebar end -->
				
				</div>
			</div>
			<div class="col-md-9">
				<div class="row">
					<!-- Shop Tool Bar -->
					<div class="shop-tool-bar col-sm-12 fix">
						<div class="view-mode">
							<a href="{{route('user.shop')}}"><i class="fa fa-th"></i></a>
							<a href="{{route('user.shop.list')}}" class="active"><i class="fa fa-th-list"></i></a>
						</div>
						<div class="sort-by">
							<span>Sort By</span>
							<select name="sort-by">
								<option selected="selected" value="mercede">price: Lower</option>
								<option value="saab">price(low&gt;high)</option>
								<option value="mercedes">price(high &gt; low)</option>
								<option value="audi">rating(highest)</option>
							</select>
						</div>
						<div class="show-product">
							<span>Show</span>
							<select name="sort-by">
								<option selected="selected" value="mercede">16</option>
								<option value="saab">20</option>
								<option value="mercedes">24</option>
							</select>
							<span>Per Page</span>
						</div>
						
					</div>
					<div class="shop-products">
				
						<!-- Single Product -->
						@foreach($all as $pro)
						<div class="single-list-product col-sm-12">
							<div class="list-pro-image">
								<a href="{{ asset('/user/product_details/'.$pro->id )}}">
									<img src="{{URL('storage/main_imgs/img'.$pro->id.'.jpg')}}" alt="" />
								</a>
							</div>
							<div class="list-pro-des fix">
								<a class="pro-name" href="product-details.html">{{$pro['name']}}</a>
						
								<h4 class="list-pro-price"><span class="new">${{$pro['price']}}</span><span class="old">${{$pro['price']+20}}</span></h4>
								<p>{{$pro['info']}}.</p>
								<div class="list-actions-btn">
									
									<a class="favorite" href="#"><i class="fa fa-heart-o"></i></a>
								
								</div>
							</div>
						</div>
						@endforeach
						<!-- Pagination -->
						<div class="pagination">
							<ul>
								<li><a href="#"><i class="fa fa-angle-left"></i></a></li>
								<li class="active"><span>1</span></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#">6</a></li>
								<li><a href="#">7</a></li>
								<li><a href="#">8</a></li>
								<li><a href="#">9</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- Shop Product Area End -->	
@endsection