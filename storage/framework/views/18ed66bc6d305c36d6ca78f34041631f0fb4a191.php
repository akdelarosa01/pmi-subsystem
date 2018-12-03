<?php $__env->startSection('title'); ?>
	WBS | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php $state = ""; $readonly = ""; ?>
	<?php foreach($userProgramAccess as $access): ?>
		<?php if($access->program_code == Config::get('constants.MODULE_CODE_WBS')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
			<?php if($access->read_write == "2"): ?>
			<?php $state = "disabled"; $readonly = "readonly"; ?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; ?>


	<div class="clearfix"></div>

	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<?php echo $__env->make('includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">

				<!-- BEGIN PAGE CONTENT-->
				<div class="row">
					<div class="col-md-12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<div class="portlet box blue" >
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-navicon"></i>  WBS Reports
								</div>
							</div>
							<div class="portlet-body">
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
												<div class="dashboard-stat yellow-gold">
													<div class="visual">
														<i class="fa fa-clipboard"></i>
													</div>
													<div class="details">
														<div class="number">
															Material Kitting & Issuance
														</div>
													</div>
													<a class="more showmodal" href="javascript:;" data-sub="MAT_KIT">
													View Report <i class="m-icon-swapright m-icon-white"></i>
													</a>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
												<div class="dashboard-stat yellow-casablanca">
													<div class="visual">
														<i class="glyphicon glyphicon-paste"></i>
													</div>
													<div class="details">
														<div class="number">
															Sakidashi Issuance
														</div>
													</div>
													<a class="more showmodal" href="javascript:;" data-sub="SAK_ISS">
													View Report <i class="m-icon-swapright m-icon-white"></i>
													</a>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
												<div class="dashboard-stat green">
													<div class="visual">
														<i class="glyphicon glyphicon-list-alt"></i>
													</div>
													<div class="details">
														<div class="number">
															Physical Inventory
														</div>
													</div>
													<a class="more showmodal" href="javascript:;" data-sub="PHY_IN">
													View Report <i class="m-icon-swapright m-icon-white"></i>
													</a>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
												<div class="dashboard-stat red-flamingo">
													<div class="visual">
														<i class="glyphicon glyphicon glyphicon-th-large"></i>
													</div>
													<div class="details">
														<div class="number">
															Warehouse Material Issuance
														</div>
													</div>
													<a class="more showmodal" href="javascript:;" data-sub="WMI">
													View Report <i class="m-icon-swapright m-icon-white"></i>
													</a>
												</div>
											</div>

										</div>

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

	<!-- Material Kitting Modal -->
	<div id="matkitModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content blue">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Search</h4>
				</div>
				<div class="modal-body">
					<div class="col-md-12">
						<form class="form-horizontal">
							<div class="form-group">
                                <label for="mkl_from" class="col-md-3 control-label">Issuance Date</label>
                                <div class="col-md-7">
                                    <div class="input-group input-large date-picker input-daterange" data-date="<?php echo date("Y-m-d"); ?>" data-date-format="yyyy-mm-dd">
                                        <input type="text" class="form-control input-sm reset" name="mkl_from" id="mkl_from"/>
                                        <span class="input-group-addon">to </span>
                                        <input type="text" class="form-control input-sm reset" name="mkl_to" id="mkl_to"/>
                                    </div>
                                </div>
                            </div>
							<div class="form-group">
								<label for="mkl_pono" class="col-md-3 control-label">Po No.</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm" id="mkl_pono" placeholder="Po No" name="mkl_pono" autofocus <?php echo($readonly); ?> />
								</div>
							</div>
							<div class="form-group">
								<label for="mkl_issno" class="col-md-3 control-label">Issuance No.</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm" id="mkl_issno" placeholder="Issuance No" name="mkl_issno" <?php echo($readonly); ?> />
								</div>
							</div>

							<div class="form-group">
								<label for="mkl_device" class="col-md-3 control-label">Device Code</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm" id="mkl_device" placeholder="Device Code" name="mkl_device" <?php echo($readonly); ?> />
								</div>
							</div>

							<div class="form-group">
								<label for="mkl_item" class="col-md-3 control-label">Part Code</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm" id="mkl_item" placeholder="Part Code" name="mkl_item" <?php echo($readonly); ?> />
								</div>
							</div>
						</form>
						
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn blue-madison mkl_reports" data-mode="pdf"><i class="fa fa-file-pdf-o"></i> Generate PDF</button>
					<button type="button" class="btn green mkl_reports" data-mode="excel"><i class="fa fa-file-excel-o"></i> Generate Excel</button>
					<button type="button" style="font-size:12px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Sakidashi Modal -->
	<div id="sakidashiModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content blue">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Search</h4>
				</div>
				<div class="modal-body">
					<div class="col-md-12">
						<form class="form-horizontal">
							<div class="form-group">
                                <label for="saki_from" class="col-md-3 control-label">Issuance Date</label>
                                <div class="col-md-7">
                                    <div class="input-group input-large date-picker input-daterange" data-date="<?php echo date("Y-m-d"); ?>" data-date-format="yyyy-mm-dd">
                                        <input type="text" class="form-control input-sm reset" name="saki_from" id="saki_from"/>
                                        <span class="input-group-addon">to </span>
                                        <input type="text" class="form-control input-sm reset" name="saki_to" id="saki_to"/>
                                    </div>
                                </div>
                            </div>
							<div class="form-group">
								<label for="saki_pono" class="col-md-3 control-label">Po No.</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm" id="saki_pono" placeholder="Po No" name="saki_pono" autofocus <?php echo($readonly); ?> />
								</div>
							</div>
							<div class="form-group">
								<label for="saki_issno" class="col-md-3 control-label">Issuance No.</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm" id="saki_issno" placeholder="Issuance No" name="saki_issno" <?php echo($readonly); ?> />
								</div>
							</div>

							<div class="form-group">
								<label for="saki_device" class="col-md-3 control-label">Device Code</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm" id="saki_device" placeholder="Device Code" name="saki_device" <?php echo($readonly); ?> />
								</div>
							</div>

							<div class="form-group">
								<label for="saki_item" class="col-md-3 control-label">Part Code</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm" id="saki_item" placeholder="Part Code" name="saki_item" <?php echo($readonly); ?> />
								</div>
							</div>
						</form>
						
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn blue-madison saki_reports" data-mode="pdf"><i class="fa fa-file-pdf-o"></i> Generate PDF</button>
					<button type="button" class="btn green saki_reports" data-mode="excel"><i class="fa fa-file-excel-o"></i> Generate Excel</button>
					<button type="button" style="font-size:12px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
				</div>
			</div>
		</div>
	</div>


	<!-- MSG -->
	<div id="msg" class="modal fade" role="dialog" data-backdrop="static">
		<div class="modal-dialog modal-sm gray-gallery">
			<div class="modal-content ">
				<div class="modal-header">
					<h4 id="title" class="modal-title"></h4>
				</div>
				<div class="modal-body">
					<p id="err_msg"></p>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-danger" id="phy_exportToExcel_close">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div id="wmimsg" class="modal fade" role="dialog" data-backdrop="static">
		<div class="modal-dialog modal-sm gray-gallery">
			<div class="modal-content ">
				<div class="modal-header">
					<h4 id="wmititle" class="modal-title"></h4>
				</div>
				<div class="modal-body">
					<p id="wmi_err_msg"></p>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-danger" id="wmi_exportToExcel_close">Close</button>
				</div>
			</div>
		</div>
	</div>

	<div id="physicalModal" class="modal fade" role="dialog" data-backdrop="static">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Search</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal">
						<div class="form-group">
	            			<label for="mkl_from" class="col-md-3 control-label">Return Date</label>
	                        <div class="col-md-7">
	                            <div class="input-group input-large date-picker input-daterange" data-date="<?php echo date("Y-m-d"); ?>" data-date-format="yyyy-mm-dd">
	                                <input type="text" class="form-control input-sm reset" name="phy_from" id="phy_from"/>
	                                <span class="input-group-addon">to </span>
	                                <input type="text" class="form-control input-sm reset" name="phy_to" id="phy_to"/>
	                            </div>
	                        </div>
	            		</div>
	            		<div class="form-group">
	            			<label for="" class="control-label col-sm-3">Location</label>
	            			<div class="col-sm-8">
	            				<input type="text" class="form-control input-sm" id="phy_location" name="phy_location">
	            			</div>
	            		</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" id="phy_exportToExcel" class="btn green"><i class="fa fa-file-excel-o"></i> Generate Excel</button>
					<button type="button" style="font-size:12px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
				</div>
			</div>
		</div>
	</div>

	<div id="wmiModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content blue">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Search</h4>
				</div>
				<div class="modal-body">
					<div class="col-md-12">
						<form class="form-horizontal">
							<div class="form-group">
                                <label for="saki_from" class="col-md-3 control-label">Issuance Date</label>
                                <div class="col-md-7">
                                    <div class="input-group input-large date-picker input-daterange" data-date="<?php echo date("Y-m-d"); ?>" data-date-format="yyyy-mm-dd">
                                        <input type="text" class="form-control input-sm reset" name="wmi_from" id="wmi_from"/>
                                        <span class="input-group-addon">to </span>
                                        <input type="text" class="form-control input-sm reset" name="wmi_to" id="wmi_to"/>
                                    </div>
                                </div>
                            </div>
							<div class="form-group">
								<label for="saki_pono" class="col-md-3 control-label">Po No.</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm" id="wmi_pono" placeholder="Po No" name="wmi_pono" autofocus <?php echo($readonly); ?> />
								</div>
							</div>
							<div class="form-group">
								<label for="saki_issno" class="col-md-3 control-label">Issuance No.</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm" id="wmi_issno" placeholder="Issuance No" name="wmi_issno" <?php echo($readonly); ?> />
								</div>
							</div>

							<div class="form-group">
								<label for="saki_item" class="col-md-3 control-label">Part Code</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm" id="wmi_item" placeholder="Part Code" name="wmi_item" <?php echo($readonly); ?> />
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="modal-footer">
					<!-- <button type="button" id="wmi_export_to_pdf" class="btn blue-madison" data-mode="pdf"><i class="fa fa-file-pdf-o"></i> Generate PDF</button> -->
					<button type="button" id="wmi_export_to_excel" class="btn green" data-mode="excel"><i class="fa fa-file-excel-o"></i> Generate Excel</button>
					<button type="button" style="font-size:12px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
				</div>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
	<script type="text/javascript">
		$('.showmodal').on('click', function() {
			var sub = $(this).attr('data-sub');
			if (sub == 'MAT_RCV') {}
			if (sub == 'IQC') {}
			if (sub == 'MAT_KIT') {
				$('#matkitModal').modal('show');
			}
			if (sub == 'SAK_ISS') {
				$('#sakidashiModal').modal('show');
			}
			if (sub == 'PHY_IN'){
				$('#physicalModal').modal('show');
			}
			if(sub == 'WMI'){
				$('#wmiModal').modal('show');
			}
			if (sub == 'PART_REC') {}
			if (sub == 'PRD_MATREQ') {}
			if (sub == 'WHS_MATISS') {}
		});

		$('.mkl_reports').on('click', function() {
			var mode = $(this).attr('data-mode');
			var mkl_from = $('#mkl_from').val();
			var mkl_to = $('#mkl_to').val();
			var mkl_pono = $('#mkl_pono').val();
			var mkl_issno = $('#mkl_issno').val();
			var mkl_device = $('#mkl_device').val();
			var mkl_item = $('#mkl_item').val();
			var url = '<?php echo e(url("/wbsreportmklreport")); ?>';

			if (mkl_from == '' || mkl_to == '') {
				failedMsg("Please fill out the dates.")
			} else {
				if (mode == 'excel') {
					mkl_saki_report(url,'excel',mkl_from,mkl_to,mkl_pono,mkl_issno,mkl_device,mkl_item);
				} else {
					mkl_saki_report(url,'pdf',mkl_from,mkl_to,mkl_pono,mkl_issno,mkl_device,mkl_item);
				}
			}
			
		});

		$('.saki_reports').on('click', function() {
			var mode = $(this).attr('data-mode');
			var saki_from = $('#saki_from').val();
			var saki_to = $('#saki_to').val();
			var saki_pono = $('#saki_pono').val();
			var saki_issno = $('#saki_issno').val();
			var saki_device = $('#saki_device').val();
			var saki_item = $('#saki_item').val();
			var url = '<?php echo e(url("/wbsreportsakireport")); ?>';

			if (saki_from == '' || saki_to == '') {
				failedMsg("Please fill out the dates.")
			} else {
				if (mode == 'excel') {
					mkl_saki_report(url,'excel',saki_from,saki_to,saki_pono,saki_issno,saki_device,saki_item);
				} else {
					mkl_saki_report(url,'pdf',saki_from,saki_to,saki_pono,saki_issno,saki_device,saki_item);
				}
			}
			
		});

		$('#phy_exportToExcel').on('click',function(){
			var datefrom = $('#phy_from').val();
			var dateto = $('#phy_to').val();
			var location = $('#phy_location').val();

			if(datefrom == '' || dateto == ''){
				$('#physicalModal').modal('hide');
				$('#msg').modal('show');
				$('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
				$('#err_msg').html("Date from and date to is required!");	
			}else{
				var url = "<?php echo e(url('/wbsreportphyreport?datefrom=')); ?>" + datefrom + "&dateto=" + dateto+ "&location=" + location;
				window.location.href = url;	
			}	
		});
		$('#phy_exportToExcel_close').on('click',function(){
			$('#physicalModal').modal('show');
			$('#msg').modal('hide');
		});

		$('#wmi_export_to_excel').on('click',function(){
			var datefrom = $('#wmi_from').val();
			var dateto = $('#wmi_to').val();
			var pono = $('#wmi_pono').val();
			var issno = $('#wmi_issno').val();
			var item = $('#wmi_item').val();

			if(datefrom == '' || dateto == ''){
				$('#wmiModal').modal('hide');
				$('#wmimsg').modal('show');
				$('#wmititle').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
				$('#wmi_err_msg').html("Date from and date to is required!");	
			}else{
				var url = "<?php echo e(url('/wbsreportwmireport?datefrom=')); ?>" + datefrom + "&dateto=" + dateto+ "&pono=" + pono+ "&issno=" + issno+ "&item=" + item;
				window.location.href = url;		}	
		});
		$('#wmi_exportToExcel_close').on('click',function(){
			$('#wmiModal').modal('show');
			$('#wmimsg').modal('hide');
		});

		

	
		function mkl_saki_report(route,mode,from,to,pono,issno,device,item) {
			var token = "<?php echo e(Session::token()); ?>";
            var ufrom = '';
            var uto = '';
            var upono = '';
            var uissno = '';
            var udevice = '';
            var uitem = '';
            if (from != '') {
            	ufrom = '&&from='+from;
            }
            if (to != '') {
            	uto = '&&to='+to;
            }
            if (pono != '') {
            	upono = '&&pono='+pono;
            }
            if (issno != '') {
            	uissno = '&&issno='+issno;
            }
            if (device != '') {
            	udevice = '&&device='+device;
            }
            if (item != '') {
            	uitem = '&&item='+item;
            }
	        var url = route+'?_token='+token+'&&mode='+mode+ufrom+uto+upono+uissno+udevice+uitem;

	        window.location.href= url;
		}

		function successMsg(msg) {
			$('#msg').modal('show');
			$('#title').html('<strong><i class="fa fa-check"></i></strong> Success!')
			$('#err_msg').html(msg);
		}

		function failedMsg(msg) {
			$('#msg').modal('show');
			$('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
			$('#err_msg').html(msg);
		}
	</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>