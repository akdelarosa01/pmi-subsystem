

<?php $__env->startSection('title'); ?>
	Order Data Check | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php $state = ""; $readonly = ""; ?>
	<?php foreach($userProgramAccess as $access): ?>
		<?php if($access->program_code == Config::get('constants.MODULE_CODE_CHECK')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
			<?php if($access->read_write == "2"): ?>
			<?php $state = "disabled"; $readonly = "readonly"; ?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; ?>


	<div class="clearfix"></div>

	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu page-sidebar-menu-light page-sidebar-menu-hover-submenu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
					<form class="sidebar-search " action="extra_search.html" method="POST">
						<a href="javascript:;" class="remove">
						<i class="icon-close"></i>
						</a>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li class="start active open">
					<a href="javascript:;">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="index.html">
							<i class="icon-bar-chart"></i>
							Default Dashboard</a>
						</li>
						<li>
							<a href="index_2.html">
							<i class="icon-bulb"></i>
							New Dashboard #1</a>
						</li>
						<li  class="active">
							<a href="index_3.html">
							<i class="icon-graph"></i>
							New Dashboard #2</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-basket"></i>
					<span class="title">eCommerce</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="ecommerce_index.html">
							<i class="icon-home"></i>
							Dashboard</a>
						</li>
						<li>
							<a href="ecommerce_orders.html">
							<i class="icon-basket"></i>
							Orders</a>
						</li>
						<li>
							<a href="ecommerce_orders_view.html">
							<i class="icon-tag"></i>
							Order View</a>
						</li>
						<li>
							<a href="ecommerce_products.html">
							<i class="icon-handbag"></i>
							Products</a>
						</li>
						<li>
							<a href="ecommerce_products_edit.html">
							<i class="icon-pencil"></i>
							Product Edit</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-rocket"></i>
					<span class="title">Page Layouts</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="layout_horizontal_sidebar_menu.html">
							Horizontal & Sidebar Menu</a>
						</li>
						<li>
							<a href="index_horizontal_menu.html">
							Dashboard & Mega Menu</a>
						</li>
						<li>
							<a href="layout_horizontal_menu1.html">
							Horizontal Mega Menu 1</a>
						</li>
						<li>
							<a href="layout_horizontal_menu2.html">
							Horizontal Mega Menu 2</a>
						</li>
						<li>
							<a href="layout_fontawesome_icons.html">
							<span class="badge badge-roundless badge-danger">new</span>Layout with Fontawesome Icons</a>
						</li>
						<li>
							<a href="layout_glyphicons.html">
							Layout with Glyphicon</a>
						</li>
						<li>
							<a href="layout_full_height_portlet.html">
							<span class="badge badge-roundless badge-success">new</span>Full Height Portlet</a>
						</li>
						<li>
							<a href="layout_full_height_content.html">
							<span class="badge badge-roundless badge-warning">new</span>Full Height Content</a>
						</li>
						<li>
							<a href="layout_search_on_header1.html">
							Search Box On Header 1</a>
						</li>
						<li>
							<a href="layout_search_on_header2.html">
							Search Box On Header 2</a>
						</li>
						<li>
							<a href="layout_sidebar_search_option1.html">
							Sidebar Search Option 1</a>
						</li>
						<li>
							<a href="layout_sidebar_search_option2.html">
							Sidebar Search Option 2</a>
						</li>
						<li>
							<a href="layout_sidebar_reversed.html">
							<span class="badge badge-roundless badge-warning">new</span>Right Sidebar Page</a>
						</li>
						<li>
							<a href="layout_sidebar_fixed.html">
							Sidebar Fixed Page</a>
						</li>
						<li>
							<a href="layout_sidebar_closed.html">
							Sidebar Closed Page</a>
						</li>
						<li>
							<a href="layout_ajax.html">
							Content Loading via Ajax</a>
						</li>
						<li>
							<a href="layout_disabled_menu.html">
							Disabled Menu Links</a>
						</li>
						<li>
							<a href="layout_blank_page.html">
							Blank Page</a>
						</li>
						<li>
							<a href="layout_boxed_page.html">
							Boxed Page</a>
						</li>
						<li>
							<a href="layout_language_bar.html">
							Language Switch Bar</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-diamond"></i>
					<span class="title">UI Features</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="ui_general.html">
							General Components</a>
						</li>
						<li>
							<a href="ui_buttons.html">
							Buttons</a>
						</li>
						<li>
							<a href="ui_confirmations.html">
							Popover Confirmations</a>
						</li>
						<li>
							<a href="ui_icons.html">
							<span class="badge badge-roundless badge-danger">new</span>Font Icons</a>
						</li>
						<li>
							<a href="ui_colors.html">
							Flat UI Colors</a>
						</li>
						<li>
							<a href="ui_typography.html">
							Typography</a>
						</li>
						<li>
							<a href="ui_tabs_accordions_navs.html">
							Tabs, Accordions & Navs</a>
						</li>
						<li>
							<a href="ui_tree.html">
							<span class="badge badge-roundless badge-danger">new</span>Tree View</a>
						</li>
						<li>
							<a href="ui_page_progress_style_1.html">
							<span class="badge badge-roundless badge-warning">new</span>Page Progress Bar</a>
						</li>
						<li>
							<a href="ui_blockui.html">
							Block UI</a>
						</li>
						<li>
							<a href="ui_bootstrap_growl.html">
							<span class="badge badge-roundless badge-warning">new</span>Bootstrap Growl Notifications</a>
						</li>
						<li>
							<a href="ui_notific8.html">
							Notific8 Notifications</a>
						</li>
						<li>
							<a href="ui_toastr.html">
							Toastr Notifications</a>
						</li>
						<li>
							<a href="ui_alert_dialog_api.html">
							<span class="badge badge-roundless badge-danger">new</span>Alerts & Dialogs API</a>
						</li>
						<li>
							<a href="ui_session_timeout.html">
							Session Timeout</a>
						</li>
						<li>
							<a href="ui_idle_timeout.html">
							User Idle Timeout</a>
						</li>
						<li>
							<a href="ui_modals.html">
							Modals</a>
						</li>
						<li>
							<a href="ui_extended_modals.html">
							Extended Modals</a>
						</li>
						<li>
							<a href="ui_tiles.html">
							Tiles</a>
						</li>
						<li>
							<a href="ui_datepaginator.html">
							<span class="badge badge-roundless badge-success">new</span>Date Paginator</a>
						</li>
						<li>
							<a href="ui_nestable.html">
							Nestable List</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-puzzle"></i>
					<span class="title">UI Components</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="components_pickers.html">
							Date & Time Pickers</a>
						</li>
						<li>
							<a href="components_context_menu.html">
							Context Menu</a>
						</li>
						<li>
							<a href="components_dropdowns.html">
							Custom Dropdowns</a>
						</li>
						<li>
							<a href="components_form_tools.html">
							Form Widgets & Tools</a>
						</li>
						<li>
							<a href="components_form_tools2.html">
							Form Widgets & Tools 2</a>
						</li>
						<li>
							<a href="components_editors.html">
							Markdown & WYSIWYG Editors</a>
						</li>
						<li>
							<a href="components_ion_sliders.html">
							Ion Range Sliders</a>
						</li>
						<li>
							<a href="components_noui_sliders.html">
							NoUI Range Sliders</a>
						</li>
						<li>
							<a href="components_jqueryui_sliders.html">
							jQuery UI Sliders</a>
						</li>
						<li>
							<a href="components_knob_dials.html">
							Knob Circle Dials</a>
						</li>
					</ul>
				</li>
				<!-- BEGIN ANGULARJS LINK -->
				<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="AngularJS version demo">
					<a href="angularjs" target="_blank">
					<i class="icon-paper-plane"></i>
					<span class="title">
					AngularJS Version </span>
					</a>
				</li>
				<!-- END ANGULARJS LINK -->
				<li class="heading">
					<h3 class="uppercase">Features</h3>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-settings"></i>
					<span class="title">Form Stuff</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="form_controls_md.html">
							<span class="badge badge-roundless badge-danger">new</span>Material Design<br>
							Form Controls</a>
						</li>
						<li>
							<a href="form_controls.html">
							Bootstrap<br>
							Form Controls</a>
						</li>
						<li>
							<a href="form_icheck.html">
							iCheck Controls</a>
						</li>
						<li>
							<a href="form_layouts.html">
							Form Layouts</a>
						</li>
						<li>
							<a href="form_editable.html">
							<span class="badge badge-roundless badge-warning">new</span>Form X-editable</a>
						</li>
						<li>
							<a href="form_wizard.html">
							Form Wizard</a>
						</li>
						<li>
							<a href="form_validation.html">
							Form Validation</a>
						</li>
						<li>
							<a href="form_image_crop.html">
							<span class="badge badge-roundless badge-danger">new</span>Image Cropping</a>
						</li>
						<li>
							<a href="form_fileupload.html">
							Multiple File Upload</a>
						</li>
						<li>
							<a href="form_dropzone.html">
							Dropzone File Upload</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-briefcase"></i>
					<span class="title">Data Tables</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="table_basic.html">
							Basic Datatables</a>
						</li>
						<li>
							<a href="table_tree.html">
							Tree Datatables</a>
						</li>
						<li>
							<a href="table_responsive.html">
							Responsive Datatables</a>
						</li>
						<li>
							<a href="table_managed.html">
							Managed Datatables</a>
						</li>
						<li>
							<a href="table_editable.html">
							Editable Datatables</a>
						</li>
						<li>
							<a href="table_advanced.html">
							Advanced Datatables</a>
						</li>
						<li>
							<a href="table_ajax.html">
							Ajax Datatables</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-wallet"></i>
					<span class="title">Portlets</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="portlet_general.html">
							General Portlets</a>
						</li>
						<li>
							<a href="portlet_general2.html">
							<span class="badge badge-roundless badge-danger">new</span>New Portlets #1</a>
						</li>
						<li>
							<a href="portlet_general3.html">
							<span class="badge badge-roundless badge-danger">new</span>New Portlets #2</a>
						</li>
						<li>
							<a href="portlet_ajax.html">
							Ajax Portlets</a>
						</li>
						<li>
							<a href="portlet_draggable.html">
							Draggable Portlets</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-bar-chart"></i>
					<span class="title">Charts</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="charts_amcharts.html">
							amChart</a>
						</li>
						<li>
							<a href="charts_flotcharts.html">
							Flotchart</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-docs"></i>
					<span class="title">Pages</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="page_timeline.html">
							<i class="icon-paper-plane"></i>
							<span class="badge badge-warning">2</span>New Timeline</a>
						</li>
						<li>
							<a href="extra_profile.html">
							<i class="icon-user-following"></i>
							<span class="badge badge-success badge-roundless">new</span>New User Profile</a>
						</li>
						<li>
							<a href="page_todo.html">
							<i class="icon-check"></i>
							Todo</a>
						</li>
						<li>
							<a href="inbox.html">
							<i class="icon-envelope"></i>
							<span class="badge badge-danger">4</span>Inbox</a>
						</li>
						<li>
							<a href="extra_faq.html">
							<i class="icon-question"></i>
							FAQ</a>
						</li>
						<li>
							<a href="page_calendar.html">
							<i class="icon-calendar"></i>
							<span class="badge badge-danger">14</span>Calendar</a>
						</li>
						<li>
							<a href="page_coming_soon.html">
							<i class="icon-flag"></i>
							Coming Soon</a>
						</li>
						<li>
							<a href="page_blog.html">
							<i class="icon-speech"></i>
							Blog</a>
						</li>
						<li>
							<a href="page_blog_item.html">
							<i class="icon-link"></i>
							Blog Post</a>
						</li>
						<li>
							<a href="page_news.html">
							<i class="icon-eye"></i>
							<span class="badge badge-success">9</span>News</a>
						</li>
						<li>
							<a href="page_news_item.html">
							<i class="icon-bell"></i>
							News View</a>
						</li>
						<li>
							<a href="page_timeline_old.html">
							<i class="icon-paper-plane"></i>
							<span class="badge badge-warning">2</span>Old Timeline</a>
						</li>
						<li>
							<a href="extra_profile_old.html">
							<i class="icon-user"></i>
							Old User Profile</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-present"></i>
					<span class="title">Extra</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="page_about.html">
							About Us</a>
						</li>
						<li>
							<a href="page_contact.html">
							Contact Us</a>
						</li>
						<li>
							<a href="extra_search.html">
							Search Results</a>
						</li>
						<li>
							<a href="extra_invoice.html">
							Invoice</a>
						</li>
						<li>
							<a href="page_portfolio.html">
							Portfolio</a>
						</li>
						<li>
							<a href="extra_pricing_table.html">
							Pricing Tables</a>
						</li>
						<li>
							<a href="extra_404_option1.html">
							404 Page Option 1</a>
						</li>
						<li>
							<a href="extra_404_option2.html">
							404 Page Option 2</a>
						</li>
						<li>
							<a href="extra_404_option3.html">
							404 Page Option 3</a>
						</li>
						<li>
							<a href="extra_500_option1.html">
							500 Page Option 1</a>
						</li>
						<li>
							<a href="extra_500_option2.html">
							500 Page Option 2</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-folder"></i>
					<span class="title">Multi Level Menu</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="javascript:;">
							<i class="icon-settings"></i> Item 1 <span class="arrow"></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="javascript:;">
									<i class="icon-user"></i>
									Sample Link 1 <span class="arrow"></span>
									</a>
									<ul class="sub-menu">
										<li>
											<a href="#"><i class="icon-power"></i> Sample Link 1</a>
										</li>
										<li>
											<a href="#"><i class="icon-paper-plane"></i> Sample Link 1</a>
										</li>
										<li>
											<a href="#"><i class="icon-star"></i> Sample Link 1</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-camera"></i> Sample Link 1</a>
								</li>
								<li>
									<a href="#"><i class="icon-link"></i> Sample Link 2</a>
								</li>
								<li>
									<a href="#"><i class="icon-pointer"></i> Sample Link 3</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="javascript:;">
							<i class="icon-globe"></i> Item 2 <span class="arrow"></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="#"><i class="icon-tag"></i> Sample Link 1</a>
								</li>
								<li>
									<a href="#"><i class="icon-pencil"></i> Sample Link 1</a>
								</li>
								<li>
									<a href="#"><i class="icon-graph"></i> Sample Link 1</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">
							<i class="icon-bar-chart"></i>
							Item 3 </a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-user"></i>
					<span class="title">Login Options</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="login.html">
							Login Form 1</a>
						</li>
						<li>
							<a href="login_2.html">
							Login Form 2</a>
						</li>
						<li>
							<a href="login_3.html">
							Login Form 3</a>
						</li>
						<li>
							<a href="login_soft.html">
							Login Form 4</a>
						</li>
						<li>
							<a href="extra_lock.html">
							Lock Screen 1</a>
						</li>
						<li>
							<a href="extra_lock2.html">
							Lock Screen 2</a>
						</li>
					</ul>
				</li>
				<li class="heading">
					<h3 class="uppercase">More</h3>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-logout"></i>
					<span class="title">Quick Sidebar</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="quick_sidebar_push_content.html">
							Push Content</a>
						</li>
						<li>
							<a href="quick_sidebar_over_content.html">
							Over Content</a>
						</li>
						<li>
							<a href="quick_sidebar_over_content_transparent.html">
							Over Content & Transparent</a>
						</li>
						<li>
							<a href="quick_sidebar_on_boxed_layout.html">
							Boxed Layout</a>
						</li>
					</ul>
				</li>

				<li class="last ">
					<a href="javascript:;">
					<i class="icon-pointer"></i>
					<span class="title">Maps</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="maps_google.html">
							Google Maps</a>
						</li>
						<li>
							<a href="maps_vector.html">
							Vector Maps</a>
						</li>
					</ul>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">

				<!-- BEGIN PAGE CONTENT-->
				<div class="row">
					<div class="col-md-12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-clipboard"></i>  ORDER DATA CHECK
								</div>
							</div>
							<div class="portlet-body">

								<div class="row">

									<div class="col-md-7">
										<div class="row">
											<div class="col-md-12">

												<div class="portlet box blue-hoki">

													<div class="portlet-body">
														<div class="row">
															<div class="col-md-12">
																<form method="POST" enctype="multipart/form-data" action="<?php echo e(url('/readfiles')); ?>" class="form-horizontal" id="readfileform" >
																	<?php echo e(csrf_field()); ?>


																	<div class="form-group">
																		<label class="control-label col-md-4">MLP01UF</label>
																		<div class="col-md-5">
																			<input type="file" class="filestyle" data-buttonName="btn-primary" name="mlp01uf" id="mlp01uf" <?php echo e($readonly); ?>>
																		</div>
																	</div>

																	<div class="form-group">
																		<label class="control-label col-md-4">MLP02UF</label>
																		<div class="col-md-5">
																			<input type="file" class="filestyle" data-buttonName="btn-primary" name="mlp02uf" id="mlp02uf" <?php echo e($readonly); ?>>
																		</div>
																	</div>

																	<div class="form-group">
																		<label class="control-label col-md-4">Output Directory</label>
																		<div class="col-md-5">
																			<input type="text" class="form-control" value="/public/Order_Data_Check/" disabled="disable">
																		</div>
																	</div>

																	<div class="form-group">
																		<div class="col-md-9">
																			<button type="submit" class="btn btn-md btn-warning pull-right" <?php echo e($state); ?>>
																				<i class="fa fa-refresh"></i> Process
																			</button>
																		</div>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>

												<div class="portlet box blue">
													<div class="portlet-title">
														<div class="caption">
															DETAIL SUMMARY
														</div>
													</div>
													<div class="portlet-body">
														<div class="row">
															<div class="col-md-6">
																<table class="table table-hover table-bordered">
																	<thead>
																		<tr style="color: #d6f5f3;background-color: #0ba8e2;">
																			<td colspan="3">
																				RECEIVED DATA DETAILS
																			</td>
																		</tr>
																	</thead>
																	<tbody>
																		<tr>
																			<td width="100px">TS</td>
																			<td>TS PO:</td>
																			<?php if(Session::has('TSPO')): ?>
																				<td style="font-weight: 900">
																					<?php echo e(Session::get('TSPO')); ?>

																				</td>
																			<?php else: ?>
																				<td style="font-weight: 900">0</td>
																			<?php endif; ?>
																		</tr>
																		<tr>
																			<td>CN</td>
																			<td>CN PO:</td>
																			<?php if(Session::has('CNPO')): ?>
																				<td style="font-weight: 900">
																					<?php echo e(Session::get('CNPO')); ?>

																				</td>
																			<?php else: ?>
																				<td style="font-weight: 900">0</td>
																			<?php endif; ?>
																		</tr>
																		<tr>
																			<td colspan="2">TOTAL:</td>
																			<?php if(Session::has('TSPO')): ?>
																				<td style="font-weight: 900">
																					<?php echo e(Session::get('TSPO')); ?>

																				</td>
																			<?php elseif(Session::has('CNPO')): ?>
																				<td style="font-weight: 900">
																					<?php echo e(Session::get('CNPO')); ?>

																				</td>
																			<?php else: ?>
																				<td style="font-weight: 900">0</td>
																			<?php endif; ?>
																		</tr>
																	</tbody>
																</table>
															</div>
															<div class="col-md-6">
																<table class="table table-hover table-bordered">
																	<thead>
																		<tr style="color: #d6f5f3;background-color: #0ba8e2;">
																			<td colspan="2">
																				RECEIVED DATA DETAILS
																			</td>
																		</tr>
																	</thead>
																	<tbody>
																		<tr>
																			<td width="200px">RS PO</td>
																			<td style="font-weight: 900">0</td>
																		</tr>
																		<tr>
																			<td>NORMAL PO</td>
																			<?php if(Session::has('NormalPO')): ?>
																				<?php $NormalPO = Session::get('NormalPO'); ?>
																				<td style="font-weight: 900">
																					<?php echo e($NormalPO); ?>

																				</td>
																			<?php else: ?>
																				<td style="font-weight: 900">0</td>
																			<?php endif; ?>
																		</tr>
																		<tr>
																			<td>NEW PRODUCT</td>
																			<?php if(Session::has('Products')): ?>
																				<?php $Products = Session::get('Products'); ?>
																				<td style="font-weight: 900"><?php echo e($Products['nonexist']); ?></td>
																			<?php else: ?>
																				<td style="font-weight: 900">0</td>
																			<?php endif; ?>
																		</tr>
																		<tr>
																			<td>RS GENERATED</td>
																			<td style="font-weight: 900">0</td>
																		</tr>
																		<tr>
																			<td>FOR ORDER ENTRY</td>
																			<?php if(Session::has('TSPO') && Session::has('Products') && Session::has('Products')): ?>
																				<?php
																					$prodExist = Session::get('Products');
																					$prodNotExist = Session::get('Products');
																					$orderts = $prodExist['exist'] + $prodNotExist['nonexist'];
																				?>
																				<td style="font-weight: 900">
																					<?php echo e($orderts); ?>

																				</td>
																			<?php else: ?>
																				<td style="font-weight: 900">0</td>
																			<?php endif; ?>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>

												<div class="portlet box blue">
													<div class="portlet-title">
														<div class="caption">
															NUMBER OF DATA LOADING TO TPICS
														</div>
													</div>
													<div class="portlet-body">
														<div class="table-responsive">
															<table class="table table-hover table-bordered table-condensed">
																<thead>
																	<tr style="color: #d6f5f3;background-color: #0ba8e2;">
																		<td></td>
																		<td>ITEM NAME MASTER</td>
																		<td>ITEM MASTER</td>
																		<td>UNIT PRICE MASTER</td>
																		<td>PRICE MASTER</td>
																		<td>BOM MASTER</td>
																		<td>ORDER ENTRY</td>
																	</tr>
																</thead>
																<tbody>
																	<tr align="right">
																		<td>PART</td>
																	<?php if(Session::has('ItemNamePartCount') && Session::has('ItemPartCount') && Session::has('UnitCount') && Session::has('BOMCount') && Session::has('Order')): ?>
																		<?php
																			$BOMCount = Session::get('BOMCount');
																			$UnitCount = Session::get('UnitCount');
																			$ItemNamePartCount = Session::get('ItemNamePartCount');
																			$ItemPartCount = Session::get('ItemPartCount');
																		?>
																		<td style="font-weight: 900"><?php echo e($ItemNamePartCount); ?></td>
																		<td style="font-weight: 900"><?php echo e($ItemPartCount); ?></td>
																		<td style="font-weight: 900"><?php echo e($UnitCount); ?></td>
																		<td style="font-weight: 900"></td>
																		<td style="font-weight: 900"><?php echo e($BOMCount); ?></td>
																		<td style="font-weight: 900"></td>
																	<?php else: ?>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																	<?php endif; ?>

																	</tr>
																	<tr align="right">
																		<td>PROD</td>
																	<?php if(Session::has('ItemNameProdCount') && Session::has('ItemProdCount') && Session::has('PriceCount') && Session::has('Order')): ?>
																		<?php
																			$PriceCount = Session::get('PriceCount');
																			$ItemNameProdCount = Session::get('ItemNameProdCount');
																			$ItemProdCount = Session::get('ItemProdCount');
																			$prod_order = Session::get('Order');
																			$orderts = $prod_order['exist'] + $prod_order['non_exist'];
																		?>
																		<td style="font-weight: 900"><?php echo e($ItemNameProdCount); ?></td>
																		<td style="font-weight: 900"><?php echo e($ItemProdCount); ?></td>
																		<td style="font-weight: 900"></td>
																		<td style="font-weight: 900"><?php echo e($PriceCount); ?></td>
																		<td style="font-weight: 900"></td>
																		<td style="font-weight: 900"><?php echo e($orderts); ?></td>
																	<?php else: ?>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																	<?php endif; ?>

																	</tr>
																</tbody>
															</table>
														</div>
													</div>
												</div>

											</div>
										</div>

										<div class="row">
											<div class="col-md-12 text-center">
												<?php if(Session::has('TSPO')): ?>
													<a href="<?php echo e(url('/momscheck')); ?>" class="btn btn-sm blue">MOMS Check</a>
												<?php endif; ?>
											</div>
										</div>
										<!--<div class="row"></div>
										<div class="row"></div>-->
									</div>





									<div class="col-md-5">
										<div class="row">
											<div class="col-md-12">

												<div class="portlet box blue">
													<div class="portlet-body">
													<!-- MLP01UF -->
														<table class="table table-hover table-bordered">
															<thead>
																<tr style="color: #d6f5f3;background-color: #0ba8e2;">
																	<td colspan="2">
																		MLP01UF
																	</td>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td width="100px">
																		START:
																	</td>
																	<td style="font-weight: 900">
																		<?php if(Session::has('partStartPO')): ?>
																			<?php echo e(Session::get('partStartPO')); ?>

																		<?php endif; ?>
																	</td>
																</tr>
																<tr>
																	<td>
																		END:
																	</td>
																	<td style="font-weight: 900">
																		<?php if(Session::has('partEndPO')): ?>
																			<?php echo e(Session::get('partEndPO')); ?>

																		<?php endif; ?>
																	</td>
																</tr>
															</tbody>
														</table>
													<!-- MLP02UF -->
														<table class="table table-hover table-bordered">
															<thead>
																<tr style="color: #d6f5f3;background-color: #0ba8e2;">
																	<td colspan="2">
																		MLP02UF
																	</td>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td width="100px">
																		START:
																	</td>
																	<td style="font-weight: 900">
																		<?php if(Session::has('prodStartPO')): ?>
																			<?php echo e(Session::get('prodStartPO')); ?>

																		<?php endif; ?>
																	</td>
																</tr>
																<tr>
																	<td>
																		END:
																	</td>
																	<td style="font-weight: 900">
																		<?php if(Session::has('prodEndPO')): ?>
																			<?php echo e(Session::get('prodEndPO')); ?>

																		<?php endif; ?>
																	</td>
																</tr>
															</tbody>
														</table>
													<!-- MLP DATA COMPARISON -->
														<table class="table table-hover table-bordered">
															<thead>
																<tr style="color: #d6f5f3;background-color: #0ba8e2;">
																	<td colspan="2">
																		MLP DATA COMPARISON
																	</td>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td width="100px">
																		START:
																	</td>
																	<td style="font-weight: 900">
																	<?php
																		if (Session::has('partStartPO') && Session::has('prodStartPO')) {
																			if (Session::has('partStartPO') == Session::has('prodStartPO')) {
																				echo "OK";
																			} else {
																				echo "NG";
																			}
																		} else {

																		}
																	?>
																	</td>
																</tr>
																<tr>
																	<td>
																		END:
																	</td>
																	<td style="font-weight: 900">
																	<?php
																		if (Session::has('partEndPO') && Session::has('prodEndPO')) {
																			if (Session::has('partEndPO') && Session::has('prodEndPO')) {
																				echo "OK";
																			} else {
																				echo "NG";
																			}
																		} else {

																		}
																	?>
																	</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>

												<div class="portlet box blue">
													<div class="portlet-title">
														<div class="caption">
															DATA UNMATCH YPICS vs R3
														</div>
													</div>
													<div class="portlet-body">
														<div id="msg" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
														<table class="table table-hover table-bordered">
															<thead>
																<tr style="color: #d6f5f3;background-color: #0ba8e2;">
																	<td>NAME</td>
																	<td>QUANTITY</td>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<?php if(Session::has('Item') && Session::has('Unit') && Session::has('Price') && Session::has('BOM')): ?>
																		<?php
																			$BOM = Session::get('BOM');
																			$Price = Session::get('Price');
																			$Item = Session::get('Item');
																			$Unit = Session::get('Unit');
																		?>
																	<?php endif; ?>
																	<?php if(Session::has('Price') && $Price['unmatch'] > 0): ?>
																		<td>SALES PRICE</td>
																		<td style="font-weight: 900">
																			<?php $sales = Session::get('uSalescount'); ?>
																			<a href="<?php echo e(url('/umSalesexcel')); ?>" class="btn btn-sm blue"><?php echo e($sales); ?></a>
																		</td>
																	<?php else: ?>
																		<td>SALES PRICE</td>
																		<td style="font-weight: 900">0</td>
																	<?php endif; ?>
																</tr>
																<tr>
																	<?php if(Session::has('uUnitcount') && Session::get('uUnitcount') > 0): ?>
																		<td>UNIT PRICE</td>
																		<td style="font-weight: 900">
																			<?php $unit = Session::get('uUnitcount');?>
																			<a href="<?php echo e(url('/umUnitexcel')); ?>" class="btn btn-sm blue"><?php echo e($unit); ?></a>
																		</td>
																	<?php else: ?>
																		<td>UNIT PRICE</td>
																		<td style="font-weight: 900">0</td>
																	<?php endif; ?>
																</tr>
																<tr>
																	<?php if(Session::has('BOM') && Session::get('uBOMcount') > 0): ?>
																		<td>BOM</td>
																		<td style="font-weight: 900">
																			<?php $bomcount = Session::get('uBOMcount');?>
																			<a href="<?php echo e(url('/umBOMexcel')); ?>" class="btn btn-sm blue"><?php echo e($bomcount); ?></a>
																		</td>
																	<?php else: ?>
																		<td>BOM</td>
																		<td style="font-weight: 900">0</td>
																	<?php endif; ?>
																</tr>
																<tr>
																	<?php if(Session::has('BOM') && Session::get('uUsagecount') > 0): ?>
																		<td>USAGE</td>
																		<td style="font-weight: 900">
																			<?php $usagecount = Session::get('uUsagecount');?>
																			<a href="<?php echo e(url('/umUsageexcel')); ?>" class="btn btn-sm blue"><?php echo e($usagecount); ?></a>
																		</td>
																	<?php else: ?>
																		<td>USAGE</td>
																		<td style="font-weight: 900">0</td>
																	<?php endif; ?>
																</tr>
																<tr>
																	<?php if(Session::has('uSuppcount') && Session::get('uSuppcount') > 0): ?>
																		<td>SUPPLIER</td>
																		<td style="font-weight: 900">
																			<?php $supplier = Session::get('uSuppcount'); ?>
																			<a href="<?php echo e(url('/umSuppexcel')); ?>" class="btn btn-sm blue"><?php echo e($supplier); ?></a>
																		</td>
																	<?php else: ?>
																		<td>SUPPLIER</td>
																		<td style="font-weight: 900">0</td>
																	<?php endif; ?>
																</tr>
																<tr>
																	<?php if(Session::has('Item') && Session::get('uPartNamecount') > 0): ?>
																		<td>PART NAME</td>
																		<td style="font-weight: 900">
																			<?php $partnamecount = Session::get('uPartNamecount'); ?>
																			<a href="<?php echo e(url('/umPartNameexcel')); ?>" class="btn btn-sm blue"><?php echo e($partnamecount); ?></a>
																		</td>
																	<?php else: ?>
																		<td>PART NAME</td>
																		<td style="font-weight: 900">0</td>
																	<?php endif; ?>
																</tr>
																<tr>
																	<?php if(Session::has('uProdNamecount') && Session::get('uProdNamecount') > 0): ?>
																		<td>PRODUCT NAME</td>
																		<td style="font-weight: 900">
																			<?php $prodName = Session::get('uProdNamecount'); ?>
																			<a href="<?php echo e(url('/umProdNameexcel')); ?>" class="btn btn-sm blue"><?php echo e($prodName); ?></a>
																		</td>
																	<?php else: ?>
																		<td>PRODUCT NAME</td>
																		<td style="font-weight: 900">0</td>
																	<?php endif; ?>
																</tr>
																<tr>
																	<?php if(Session::has('uProdDNcount') && Session::get('uProdDNcount') > 0): ?>
																		<td>PRODUCT DN</td>
																		<td style="font-weight: 900">
																			<?php $prodDN = Session::get('uProdDNcount'); ?>
																			<a href="<?php echo e(url('/umProdDNexcel')); ?>" class="btn btn-sm blue"><?php echo e($prodDN); ?></a>
																		</td>
																	<?php else: ?>
																		<td>PRODUCT DN</td>
																		<td style="font-weight: 900">0</td>
																	<?php endif; ?>
																</tr>
																<tr>
																	<?php if(Session::has('uPartDNcount') && Session::get('uPartDNcount') > 0): ?>
																		<td>PARTS DN</td>
																		<td style="font-weight: 900">
																			<?php $partDN = Session::get('uPartDNcount');?>
																			<a href="<?php echo e(url('/umPartDNexcel')); ?>" class="btn btn-sm blue"><?php echo e($partDN); ?></a>
																		</td>
																	<?php else: ?>
																		<td>PARTS DN</td>
																		<td style="font-weight: 900">0</td>
																	<?php endif; ?>
																</tr>
															</tbody>
														</table>
													</div>
												</div>

											</div>
										</div>
										<!--<div class="row"></div>-->
									</div>

								</div>

							</div>
						</div>
						<!-- END EXAMPLE TABLE PORTLET-->
					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
		</div>
		<!-- END CONTENT -->

	</div>
	<!-- END CONTAINER -->

	<div id="processdone" class="modal fade" role="dialog" data-backdrop="static">
		<div class="modal-dialog modal-sm gray-gallery">
			<div class="modal-content ">
				<div class="modal-body">
					<center><h3>Process successful!</h3></center>
				</div>
				<div class="modal-footer">
					<form method="POST" action="<?php echo e(url('/order_data_generate_report')); ?>" class="form-horizontal" target="_blank" id="processform">
						<?php echo e(csrf_field()); ?>

						<?php if(Session::has('partStartPO')): ?>
							<input type="hidden" name="ml01start" value="<?php echo e(Session::get('partStartPO')); ?>">
						<?php endif; ?>
						<?php if(Session::has('partEndPO')): ?>
							<input type="hidden" name="ml01end" value="<?php echo e(Session::get('partEndPO')); ?>">
						<?php endif; ?>
						<?php if(Session::has('prodStartPO')): ?>
							<input type="hidden" name="ml02start" value="<?php echo e(Session::get('prodStartPO')); ?>">
						<?php endif; ?>
						<?php if(Session::has('prodEndPO')): ?>
							<input type="hidden" name="ml02end" value="<?php echo e(Session::get('prodEndPO')); ?>">
						<?php endif; ?>
						<?php
							if (Session::has('partStartPO') && Session::has('prodStartPO')) {
								if (Session::get('partStartPO') == Session::get('prodStartPO')) {
						?>
									<input type="hidden" name="matchstart" value="OK">
						<?php
								} else {
						?>
									<input type="hidden" name="matchstart" value="NG">
						<?php
								}
							}
							if (Session::has('partEndPO') && Session::has('prodEndPO')) {
								if (Session::get('partEndPO') == Session::get('prodEndPO')) {
						?>
									<input type="hidden" name="matchend" value="OK">
						<?php
								} else {
						?>
									<input type="hidden" name="matchend" value="NG">
						<?php
								}
							}
						?>

						<?php if(Session::has('ItemNamePartCount') && Session::has('ItemPartCount') && Session::has('UnitCount') && Session::has('BOMCount') && Session::has('Order') && Session::has('NormalPO') && Session::has('Products') && Session::has('ItemNameProdCount') && Session::has('ItemProdCount') && Session::has('PriceCount')): ?>
							<input type="hidden" name="tspo" value="<?php echo e(Session::get('TSPO')); ?>">
							<input type="hidden" name="normalpo" value="<?php echo e(Session::get('NormalPO')); ?>">
							<?php
								$PriceCount = Session::get('PriceCount');
								$ItemNameProdCount = Session::get('ItemNameProdCount');
								$ItemProdCount = Session::get('ItemProdCount');
								$BOMCount = Session::get('BOMCount');
								$UnitCount = Session::get('UnitCount');
								$ItemNamePartCount = Session::get('ItemNamePartCount');
								$ItemPartCount = Session::get('ItemPartCount');
								
								$Order = Session::get('Order');
								$prod_order = Session::get('Order');
								$Products = Session::get('Products');
								$orderts = $prod_order['exist'] + $prod_order['non_exist'];
								$dataentryts = $Products['exist'] + $Products['nonexist'];
							?>
							<input type="hidden" name="dataentryts" value="<?php echo e($dataentryts); ?>">
							<input type="hidden" name="newprod" value="<?php echo e($Products['nonexist']); ?>">
							<input type="hidden" name="itemnameparts" value="<?php echo e($ItemNamePartCount); ?>">
							<input type="hidden" name="itemmasterparts" value="<?php echo e($ItemPartCount); ?>">
							<input type="hidden" name="unitprice" value="<?php echo e($UnitCount); ?>">
							<input type="hidden" name="itemnameprod" value="<?php echo e($ItemNameProdCount); ?>">
							<input type="hidden" name="itemmasterprod" value="<?php echo e($ItemProdCount); ?>">
							<input type="hidden" name="price" value="<?php echo e($PriceCount); ?>">
							<input type="hidden" name="bom" value="<?php echo e($BOMCount); ?>">
							<input type="hidden" name="orderts" value="<?php echo e($orderts); ?>">
						<?php endif; ?>

						<?php if(Session::has('CNPO')): ?>
							<input type="hidden" name="cnpo" value="<?php echo e(Session::get('CNPO')); ?>">
						<?php endif; ?>

						<?php if(Session::has('MLP01name')): ?>
							<input type="hidden" name="mlp01name" value="<?php echo e(Session::get('MLP01name')); ?>">
						<?php endif; ?>

						<?php if(Session::has('MLP02name')): ?>
							<input type="hidden" name="mlp02name" value="<?php echo e(Session::get('MLP02name')); ?>">
						<?php endif; ?>

						<input type="hidden" name="poforrs" value="">
						<input type="hidden" name="rsgen" value="">
						<input type="hidden" name="ordercn" value="">

						<button type="submit" class="btn btn-success">OK</button>
						<button type="button" data-dismiss="modal" class="btn btn-danger">Cancel</button>
					</form>

				</div>
			</div>
		</div>
	</div>

	<!-- AJAX LOADER -->
	<div id="loading" class="modal fade" role="dialog" data-backdrop="static">
		<div class="modal-dialog modal-sm gray-gallery">
			<div class="modal-content ">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<img src="assets/images/ajax-loader.gif" class="img-responsive">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- NEW PRODUCT -->
	<div id="newproduct" class="modal fade" role="dialog" data-backdrop="static">
		<div class="modal-dialog modal-sm gray-gallery">
			<div class="modal-content ">
				<div class="modal-body">
					<?php if(Session::has('Products')): ?>
						<?php $Products = Session::get('Products'); ?>
						<p>Today's new product is <?php echo e($Products['nonexist']); ?>.</p>
					<?php else: ?>
						<p>Today's new product is 0.</p>
					<?php endif; ?>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-primary">OK</button>
				</div>
			</div>
		</div>
	</div>

	<?php if(Session::has('TSPO')): ?>
		<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			$( document ).ready(function() {
				$('#processdone').modal('show');

			});
		</script>
	<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
	<script src="<?php echo e(asset('assets/global/scripts/orderdatacheck.js')); ?>" type="text/javascript"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>