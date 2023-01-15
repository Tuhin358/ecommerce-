<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +8801763-083439</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> tarifulislam2400@gmail.com</a></li>
						<li><a href="https://www.google.com/maps/place/Mirpur-6+Kacha+Bazar/@23.8107541,90.3609885,17z/data=!4m12!1m6!3m5!1s0x3755c1278786faf7:0x96093e4667c57e7a!2sMirpur-6+Kacha+Bazar!8m2!3d23.8107492!4d90.3631772!3m4!1s0x3755c1278786faf7:0x96093e4667c57e7a!8m2!3d23.8107492!4d90.3631772"><i class="fa fa-map-marker"></i> Dhaka,Bangladesh</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="#"><i class=""></i>&#2547;  BDT</a></li>
                        @php
                        $customer_id=Session::get('id')

                        @endphp

                        @if($customer_id!=NULL)
                        <li><a href="{{route('customer.logout') }}"><i class="fa fa-user-o"></i> Logout </a></li>
                        @else
                        <li><a href="{{route('login.checkout') }}"><i class="fa fa-user-o"></i> Login </a></li>

                        @endif

					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="{{route('frond.index') }}" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form action="{{route('search') }}" method="GET">
									<select class="input-select" name="category">

                                        <option value="ALL" {{request('category') =="ALL" ? 'selected' : ''}}>All Category</option>

                                        @foreach ($categories as $category )

                                          <option value="{{$category->id }}" {{request('category') == $category->id ? 'selected' : ''}} >{{$category->name}}</option>
                                        @endforeach
									</select>
									<input class="input" name="product" placeholder="Search here" value="{{request('product')}}">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Your Wishlist</span>
										<div class="qty">2</div>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->

                                @php
                                    $cart_array=cartArray();
                                @endphp

								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>

										<div class="qty"><?=count($cart_array) ?></div>

									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
                                            @foreach($cart_array as $v_add_cart)

                                            @php

                                            $images=$v_add_cart['attributes'][0];
                                            $images=explode('|',$images);
                                            $images=$images[0];

                                            @endphp

											<div class="product-widget">
												<div class="product-img">
													<img src="{{asset('/image/'.$images)}}" >
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">{{$v_add_cart['name'] }}</a></h3>
													<h4 class="product-price"><span class="qty">{{$v_add_cart['quantity'] }}x</span>&#2547;{{$v_add_cart['price'] }}</h4>
												</div>
												<a class="delete" href="{{route('delete.cart',$v_add_cart['id']) }}"><i class="fa fa-close"></i></a>
											</div>

                                            @endforeach


										</div>
										<div class="cart-summary">
											<small><?=count($cart_array)?>Item(s) selected</small>
											<h5>SUBTOTAL: {{Cart::getTotal()}}</h5>
										</div>
										<div class="cart-btns">
											{{--  <a href="{{route('login.checkout') }}">View Cart</a>  --}}
                                            @php
                                            $customer_id=Session::get('id')

                                            @endphp
                                            @if($customer_id=NULL)
                                            <a style="width:100%; background-color:#D10024;" href="{{route('checkout')}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                            @else
                                            <a style="width:100%; background-color:#D10024;" href="{{route('login.checkout')}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>

                                            @endif

										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
