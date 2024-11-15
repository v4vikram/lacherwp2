<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<!-- Desktop header -->
		<header class="block xl:block" id="desktop-header">
			<!-- top -->
			<div class="top-wrapper bg-yellow py-[10px] text-center">
				<div class="custom-width">
					<p class="text-black text-[14px] font-semibold font-philosopher">Pre-School Sale 🔥 Up to
						25% Off –
						Educational Toys for
						Early Learning!</p>
				</div>
			</div>

			<div class="wrapper-for-sticky">
				<!-- middle -->
				<div class="middle-wrapper py-[10px] bg-white" id="middle-wrapper">
					<div class="custom-width">
						<div class="flex justify-between items-center">
							<div class="logo col-span-1. w-[25%] xl:w-[10%]">
								<a href="<?php echo site_url(); ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/logo.svg"
										alt="lacher-logo" class="w-[130px] header-logo">
								</a>
							</div>
							<div class="search-container col-span-7. w-[100%] xl:w-[55%] ml-auto hidden lg:block relative">

								<form action="" method="post" class="search-form" id="searchForm">
									<div class="custom-dropdown">
										<button type="button" class="dropdown-toggle">
											<span id="selectedCategory">Select Category</span>
											<img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown-hamburger.png"
												alt="dropdown-hamburger" class="pl-2">
										</button>
										<div class="dropdown-menu" id="categoryDropdown">
											<span class="cat-search-item" data-category="all">All
												Categories</span>
											<?php
											// Fetch WooCommerce product categories
											$categories = get_terms(array(
												'taxonomy' => 'product_cat',
												'hide_empty' => true,
											));
											foreach ($categories as $category) {
												echo '<span class="cat-search-item" data-category="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</span>';
											}
											?>
										</div>
									</div>

									<input type="text" id="productSearch" placeholder="Type Your Products ..." />

									<button type="submit"
										class="search-button hover:bg-greenHover transition duration-300">
										<i class="fas fa-search"></i>
									</button>
								</form>

								<div id="searchResults"></div>

							</div>

							<div class="middle-right-side col-snap-4. w-[28%]">
								<div class="contact-support flex items-center justify-end gap-x-5">
									<!-- Support box with phone number -->
									<a href="tel:918971457054"
										class="support-box hidden items-center py-[7px] px-[20px] rounded-full xl:flex">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/phone.svg"
											alt="phone" class="w-[25px] mr-[5px]">
										<!-- <i class="fas fa-phone-alt"></i> -->
										<div>
											<p>24/7 support</p>
											<p>&nbsp;+91 8971457054</p>
										</div>
									</a>

									<!-- Circular icons -->
									<div class="icon-container">
										<div class="circle-icon flex items-center">
											<i class="fas fa-heart"></i>
										</div>
										<div class="circle-icon flex items-center">
											<i class="fas fa-shopping-basket"></i>
										</div>
										<div class="circle-icon flex items-center">
											<div id="toggle-hamburger">
												<i class="fas fa-bars"></i>
											</div>
										</div>
									</div>
								</div>

							</div>

						</div>
					</div>
				</div>

				<!-- bottom -->
				<div class="bottom-wrapper bg-darkGrreen py-[0px] hidden xl:block">
					<div class="custom-width">
						<nav class="flex items-center justify-between">
							<ul class="">
								<li> <a href="#" class="">Categories <i class="fas fa-angle-down text-white"></i></a>
									<ul class="sub-menu">
										<li><a href="#">Category 1</a></li>
										<li><a href="#">Category 1</a></li>
										<li><a href="#">Category 1</a></li>
									</ul>
								</li>
								<li> <a href="about.html" class="">About</a></li>
								<li> <a href="#" class="">Child Development</a></li>
								<li> <a href="#" class="">Sustainability</a></li>
								<li> <a href="faq.html" class="">Faq</a></li>
								<li> <a href="blog.html" class="">Blog</a></li>
								<li> <a href="contact.html" class="">Contact</a></li>
							</ul>
							<div
								class="flex items-center space-x-4. bg-yellow rounded-full space-x-2 py-[10px] px-[12px]">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/fire.svg"
									alt="green-fire-icon" class="w-[24px]">
								<a href="#" class="bg-yellow-400 text-green font-bold">Super Deals
									Product</a>
							</div>
						</nav>
					</div>
				</div>
			</div>

			<!-- only phone -->
			<!-- <div class="bg-lightGray py-[5px]">
		<div class="custom-width block md:hidden mt-[0px]">
			<div class="icon-container flex justify-between items-center">
				<div class="circle-icon flex">
					<a href="#"><i class="fas fa-search"></i></a>
				</div>
				<div class="flex justify-between items-center gap-x-2">
					<div class="circle-icon flex items-center">
						<i class="fas fa-heart"></i>
					</div>
					<div class="circle-icon flex items-center">
						<i class="fas fa-shopping-basket"></i>
					</div>
				</div>
			</div>
		</div>
	   </div> -->
		</header>

		