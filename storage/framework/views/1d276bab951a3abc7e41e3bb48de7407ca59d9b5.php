<!--BEGIN HEADER-->
<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<a href="<?php echo e(url('/home')); ?>" class="page-logo hidden-sm hidden-xs">
			<img src="assets/images/PRICON-LOGO.png" alt="logo" class="img-responsive" />
			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</a>
		<!-- END LOGO -->
		<!-- BEGIN HORIZANTAL MENU -->
		<!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
		<!-- DOC: This is desktop version of the horizontal menu. The mobile version is defined(duplicated) sidebar menu below. So the horizontal menu has 2 seperate versions -->
		<div class="hor-menu hidden-sm hidden-xs">
			<ul class="nav navbar-nav">
				<!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
				<li class="mega-menu-dropdown">
					<a href="javascript:;" class="dropdown-toggle" >
						Hi, <?php echo e(Auth::user()->firstname); ?>!
					</a>
				</li>
				<li class="mega-menu-dropdown">
					<a class="dropdown-toggle" >
						<span id="date_time"></span>
					</a>
				</li>
			</ul>
		</div>
		<!-- END HORIZANTAL MENU -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">

				<li class="classic-menu-dropdown dropdown-extended">
					<a data-toggle="dropdown" href="javascript:;" data-hover="megamenu-dropdown" data-close-others="true">
						<i class="fa fa-folder-open-o"></i> <span class="hidden-xs hidden-sm">MASTER MANAGEMENT</span> <i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-right">
						<?php $url = ""; $icon = ""; ?>
						<?php foreach($userProgramAccess as $access): ?>
							<?php if($access->program_code == "2001"): ?>
								<?php $url = "/usermaster"; $icon = "fa fa-user"; ?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "2003"): ?>
								<?php $url = "/productlines"; $icon = "fa fa-cart-plus"; ?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "2002"): ?>
								<?php $url = "/suppliermaster"; $icon = "fa fa-cubes"; ?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "2004"): ?>
								<?php $url = "/justificationmaster"; $icon = "fa fa-comment"; ?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "2005"): ?>
								<?php $url = "/dropdown"; $icon = "fa fa-th-list"; ?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "2006"): ?>
								<?php $url = "/sold-to"; $icon = "fa fa-tag"; ?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</li>

				<li class="classic-menu-dropdown dropdown-extended" >
					<a data-toggle="dropdown" href="javascript:;" data-hover="megamenu-dropdown" data-close-others="true">
						<i class="fa fa-cogs"></i> <span class="hidden-xs hidden-sm">OPERATION MANAGEMENT</span> <i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu" style="min-width: 300px">
						<?php $url = ""; $icon = ""; ?>
						<?php foreach($userProgramAccess as $access): ?>
							<?php if($access->program_code == "3001"): ?>
								<?php $url = "/orderdatacheck"; $icon = "fa fa-clipboard";?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "3002"): ?>
								<?php $url = "/orderdatareport"; $icon = "fa fa-area-chart"; ?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "3003"): ?>
								<?php $url = "/mra"; $icon = "fa fa-puzzle-piece"; ?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "3004"): ?>
								<?php $url = "/partsrejectionrate"; $icon = "fa fa-refresh"; ?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "3005"): ?>
								<?php $url = "/invoicedatacheck"; $icon = "fa fa-file"; ?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "3006"): ?>
								<?php $url = "/materiallist"; $icon = "fa fa-list-ol"; ?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "3007"): ?>
								<?php $url = "/mrpcalculation"; $icon = "fa fa-calculator"; ?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "3008"): ?>
								<?php $url = ""; $icon = "fa fa-calendar"; ?>
								<?php if($access->read_write != "0"): ?>
								<li class="dropdown-submenu">
									<a href="" ><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
									<ul class="dropdown-menu">
										<li>
											<a href="<?php echo e(url('/postatus')); ?>">
												<i class="fa fa-line-chart"></i>
												PO STATUS
											</a>
										</li>

										<li>
											<a href="<?php echo e(url('/partsstatus')); ?>">
												<i class="fa fa-certificate"></i>
												PARTS STATUS
											</a>
										</li>
										<li>
											<a href="<?php echo e(url('/deliverywarning')); ?>">
												<i class="fa fa-truck"></i>
												DELIVERY WARNING
											</a>
										</li>
										<li>
											<a href="<?php echo e(url('/dataupdate')); ?>">
												<i class="fa fa-edit"></i>
												DATA UPDATE
											</a>
										</li>
										<li>
											<a href="<?php echo e(url('/answerinputmanagement')); ?>">
												<i class="fa fa-clipboard"></i>
												ANSWER INPUT MANAGEMENT
											</a>
										</li>
										<li>
											<a href="<?php echo e(url('/sampledoujiinput')); ?>">
												<i class="fa fa-clipboard"></i>
												SAMPLE DOUJI INPUT
											</a>
										</li>
									</ul>
								</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "3009"): ?>
								<?php $url = "/prchange"; $icon = "fa fa-file-o"; ?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "3010"): ?>
								<?php $url = "/prbalance"; $icon = "fa fa-clipboard"; ?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "3011"): ?>
								<?php $url = "/inventoryquery"; $icon = "fa fa-cubes"; ?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "3012"): ?>
								<?php $url = "/materialreceiving"; $icon = "fa fa-navicon"; ?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "3013"): ?>
								<?php $url = "/packinglistsystem"; $icon = "fa fa-bars"; ?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</li>

				<li class="classic-menu-dropdown dropdown-extended">
					<a data-toggle="dropdown" href="javascript:;" data-hover="megamenu-dropdown" data-close-others="true">
						<i class="fa fa-key"></i> <span class="hidden-xs hidden-sm">SECURITY MANAGEMENT</span> <i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu pull-left">
						<?php foreach($userProgramAccess as $access): ?>
							<?php if($access->program_code == "4001"): ?>
								<?php $url = "/changepassword"; $icon = "fa fa-lock";?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "4002"): ?>
								<?php $url = "/wbssetiing"; $icon = "fa fa-barcode"; ?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "4003"): ?>
								<?php $url = "/transactionsetting"; $icon = "fa fa-exchange"; ?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "4004"): ?>
								<?php $url = "/companysetting"; $icon = "fa fa-building"; ?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "4005"): ?>
								<?php $url = "/plsetting"; $icon = "fa fa-wrench"; ?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</li>

				<li class="classic-menu-dropdown">
					<a href="<?php echo e(url('/logout')); ?>">
						<i class="icon-logout"></i>
					</a>
				</li>

				<!-- END QUICK SIDEBAR TOGGLER -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!--END HEADER-->