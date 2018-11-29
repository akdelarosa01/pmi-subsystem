<!--BEGIN HEADER-->
<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<a href="<?php echo e(url('/home')); ?>" class="page-logo hidden-sm hidden-xs">
			<img src="<?php echo e(asset('assets/images/PRICON-LOGO.png')); ?>" alt="logo" class="img-responsive" />
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
					<a data-toggle="dropdown" href="javascript:;" data-close-others="true">
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
					<a data-toggle="dropdown" href="javascript:;" data-close-others="true">
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
							<?php elseif($access->program_code == "SSS"): ?>
								<?php $url = ""; $icon = "fa fa-calendar"; ?>
								<?php if($access->read_write != "0"): ?>
									<li class="dropdown-submenu">
										<a href="javascript:;" ><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
										<ul class="dropdown-menu">
											<?php foreach($ssss as $sss): ?>
												<?php if($sss->program_code == "3008"): ?>
													<?php $url = "/postatus"; $icon = "fa fa-line-chart";?>
													<?php if($sss->read_write != "0"): ?>
													<li>
														<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($sss->program_name); ?></a>
													</li>
													<?php endif; ?>
												<?php elseif($sss->program_code == "3009"): ?>
													<?php $url = "/partsstatus"; $icon = "fa fa-certificate"; ?>
													<?php if($sss->read_write != "0"): ?>
													<li>
														<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($sss->program_name); ?></a>
													</li>
													<?php endif; ?>
												<?php elseif($sss->program_code == "3010"): ?>
													<?php $url = "/deliverywarning"; $icon = "fa fa-truck"; ?>
													<?php if($sss->read_write != "0"): ?>
													<li>
														<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($sss->program_name); ?></a>
													</li>
													<?php endif; ?>
												<?php elseif($sss->program_code == "3011"): ?>
													<?php $url = "/dataupdate"; $icon = "fa fa-edit"; ?>
													<?php if($sss->read_write != "0"): ?>
													<li>
														<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($sss->program_name); ?></a>
													</li>
													<?php endif; ?>
												<?php elseif($sss->program_code == "3012"): ?>
													<?php $url = "/answerinputmanagement"; $icon = "fa fa-clipboard"; ?>
													<?php if($sss->read_write != "0"): ?>
													<li>
														<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($sss->program_name); ?></a>
													</li>
													<?php endif; ?>
												<?php elseif($sss->program_code == "3013"): ?>
													<?php $url = "/sampledoujiinput"; $icon = "fa fa-clipboard"; ?>
													<?php if($sss->read_write != "0"): ?>
													<li>
														<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($sss->program_name); ?></a>
													</li>
													<?php endif; ?>
												<?php endif; ?>
											<?php endforeach; ?>
										</ul>
									</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "3014"): ?>
								<?php $url = "/prchange"; $icon = "fa fa-file-o"; ?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "3015"): ?>
								<?php $url = "/prbalance"; $icon = "fa fa-clipboard"; ?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "3016"): ?>
								<?php $url = "/inventoryquery"; $icon = "fa fa-cubes"; ?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "WBS"): ?>
								<?php $url = ""; $icon = "fa fa-cube"; ?>
								<?php if($access->read_write != "0"): ?>
									<li class="dropdown-submenu">
										<a href="javascript:;" ><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
										<ul class="dropdown-menu">
											<?php foreach($wbss as $wbs): ?>
												<?php if($wbs->program_code == "3017"): ?>
													<?php $url = "/materialreceiving"; $icon = "fa fa-qrcode";?>
													<?php if($wbs->read_write != "0"): ?>
													<li>
														<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($wbs->program_name); ?></a>
													</li>
													<?php endif; ?>
												<?php elseif($wbs->program_code == "3018"): ?>
													<?php $url = "/iqc"; $icon = "fa fa-search"; ?>
													<?php if($wbs->read_write != "0"): ?>
													<li>
														<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($wbs->program_name); ?></a>
													</li>
													<?php endif; ?>
												<?php elseif($wbs->program_code == "3019"): ?>
													<?php $url = "/wbsmaterialkitting"; $icon = "fa fa-clipboard"; ?>
													<?php if($wbs->read_write != "0"): ?>
													<li>
														<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($wbs->program_name); ?></a>
													</li>
													<?php endif; ?>
												<?php elseif($wbs->program_code == "3020"): ?>
													<?php $url = "/wbssakidashi"; $icon = "glyphicon glyphicon-paste"; ?>
													<?php if($wbs->read_write != "0"): ?>
													<li>
														<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($wbs->program_name); ?></a>
													</li>
													<?php endif; ?>
												<?php elseif($wbs->program_code == "3021"): ?>
													<?php $url = "/wbspartsreceiving"; $icon = "glyphicon glyphicon-copy"; ?>
													<?php if($wbs->read_write != "0"): ?>
													<li>
														<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($wbs->program_name); ?></a>
													</li>
													<?php endif; ?>
												<?php elseif($wbs->program_code == "3022"): ?>
													<?php $url = "/wbsphysicalinventory"; $icon = "glyphicon glyphicon-list-alt"; ?>
													<?php if($wbs->read_write != "0"): ?>
													<li>
														<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($wbs->program_name); ?></a>
													</li>
													<?php endif; ?>
												<?php elseif($wbs->program_code == "3023"): ?>
													<?php $url = "/wbsprodmatrequest"; $icon = "glyphicon glyphicon-save-file"; ?>
													<?php if($wbs->read_write != "0"): ?>
													<li>
														<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($wbs->program_name); ?></a>
													</li>
													<?php endif; ?>
												<?php elseif($wbs->program_code == "3024"): ?>
													<?php $url = "/wbsprodmatreturn"; $icon = "fa fa-exchange"; ?>
													<?php if($wbs->read_write != "0"): ?>
													<li>
														<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($wbs->program_name); ?></a>
													</li>
													<?php endif; ?>
												<?php elseif($wbs->program_code == "3025"): ?>
													<?php $url = "/wbswhsmatissuance"; $icon = "fa fa-cubes"; ?>
													<?php if($wbs->read_write != "0"): ?>
													<li>
														<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($wbs->program_name); ?></a>
													</li>
													<?php endif; ?>
												<?php elseif($wbs->program_code == "3026"): ?>
													<?php $url = "/wbsmaterialdisposition"; $icon = "fa fa-history"; ?>
													<?php if($wbs->read_write != "0"): ?>
													<li>
														<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($wbs->program_name); ?></a>
													</li>
													<?php endif; ?>
												<?php elseif($wbs->program_code == "3027"): ?>
													<?php $url = "/wbsreports"; $icon = "fa fa-file-text-o"; ?>
													<?php if($wbs->read_write != "0"): ?>
													<li>
														<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($wbs->program_name); ?></a>
													</li>
													<?php endif; ?>
												<?php endif; ?>
											<?php endforeach; ?>
										</ul>
									</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "3028"): ?>
								<?php $url = "/packinglistsystem"; $icon = "fa fa-bars"; ?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "QCDB"): ?>
								<?php $url = ""; $icon = "fa fa-search"; ?>
								<?php if($access->read_write != "0"): ?>
									<li class="dropdown-submenu">
										<a href="javascript:;" ><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
										<ul class="dropdown-menu">
											<?php foreach($qcdbs as $qcdb): ?>
												<?php if($qcdb->program_code == "3029"): ?>
													<?php $url = "/iqcinspection"; $icon = "fa fa-search";?>
													<?php if($qcdb->read_write != "0"): ?>
													<li>
														<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($qcdb->program_name); ?></a>
													</li>
													<?php endif; ?>
												<?php elseif($qcdb->program_code == "3030"): ?>
													<?php $url = "/oqcinspection"; $icon = "fa fa-search"; ?>
													<?php if($qcdb->read_write != "0"): ?>
													<li>
														<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($qcdb->program_name); ?></a>
													</li>
													<?php endif; ?>
												<?php elseif($qcdb->program_code == "3031"): ?>
													<?php $url = "/fgs"; $icon = "fa fa-line-chart"; ?>
													<?php if($qcdb->read_write != "0"): ?>
													<li>
														<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($qcdb->program_name); ?></a>
													</li>
													<?php endif; ?>
												<?php elseif($qcdb->program_code == "3032"): ?>
													<?php $url = "/packinginspection"; $icon = "fa fa-cube"; ?>
													<?php if($qcdb->read_write != "0"): ?>
													<li>
														<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($qcdb->program_name); ?></a>
													</li>
													<?php endif; ?>
												<?php endif; ?>
											<?php endforeach; ?>
											
										</ul>
									</li>
								<?php endif; ?>

							<?php elseif($access->program_code == "QCMLD"): ?>
								<?php $url = ""; $icon = "fa fa-search"; ?>
								<?php if($access->read_write != "0"): ?>
									<li class="dropdown-submenu">
										<a href="javascript:;" ><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
										<ul class="dropdown-menu">
										<?php foreach($qcmlds as $qcmld): ?>
											<?php if($qcmld->program_code == "3033"): ?>
												<?php $url = "/oqcmolding"; $icon = "fa fa-search";?>
												<?php if($qcmld->read_write != "0"): ?>
												<li>
													<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($qcmld->program_name); ?></a>
												</li>
												<?php endif; ?>
											<?php elseif($qcmld->program_code == "3034"): ?>
												<?php $url = "/packingmolding"; $icon = "fa fa-cube"; ?>
												<?php if($qcmld->read_write != "0"): ?>
												<li>
													<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($qcmld->program_name); ?></a>
												</li>
												<?php endif; ?>
											<?php endif; ?>
										<?php endforeach; ?>
										</ul>
									</li>
								<?php endif; ?>

							<?php elseif($access->program_code == "3035"): ?>
								<?php $url = "/yieldperformance"; $icon = "fa fa-line-chart"; ?>
								<?php if($access->read_write != "0"): ?>
								<li>
									<a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
								</li>
								<?php endif; ?>
							<?php elseif($access->program_code == "3036"): ?>
								<?php $url = "/ypicsinvoicing"; $icon = "fa fa-file-text"; ?>
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
					<a data-toggle="dropdown" href="javascript:;" data-close-others="true">
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
