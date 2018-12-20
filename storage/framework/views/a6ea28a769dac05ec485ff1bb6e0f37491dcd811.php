<?php
/*******************************************************************************
     Copyright (c) <Company Name> All rights reserved.

     FILE NAME: PoIsoGiInput.blade.php
     MODULE NAME:  [3008-1] PO Status - ISO GI Input
     CREATED BY: MESPINOSA
     DATE CREATED: 2016.05.03
     REVISION HISTORY :

     VERSION     ROUND    DATE           PIC          DESCRIPTION
     100-00-01   1     2016.05.03     MESPINOSA       Initial Draft
*******************************************************************************/
?>


<?php $__env->startSection('title'); ?>
	PO Status(ISOGI Input) | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	
	<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php ini_set('max_input_vars', 999999);?>
	<?php $state = ""; $readonly = ""; ?>
	<?php foreach($userProgramAccess as $access): ?>
		<?php if($access->program_code == Config::get('constants.MODULE_CODE_SSS')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
			<?php if($access->read_write == "2"): ?>
			<?php $state = "disabled"; $readonly = "readonly"; ?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; ?>
	
	<div class="clearfix">
	</div>

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
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-pencil"></i> ISOGI INPUT
								</div>
							</div>
							<div class="portlet-body portlet-empty">
								<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/post-poisogiinput')); ?>">
								<?php echo csrf_field(); ?>

								<div class="row">
									<div class="col-md-12">
										<a href="<?php echo e(url('/postatus?po=')); ?> <?php if(isset($po)){ echo $po; } ?>" class="btn btn-sm yellow pull-right"><i class="fa fa-mail-reply"></i> Back</a>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<label class="col-sm-2">
											<button class="btn btn-sm grey-gallery" disabled>PART NAME:</button>
										</label>
										<span class="col-sm-10" style="font-size: 20px" > <strong><?php if(isset($code)){ echo $code; } ?> </strong></span>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="scroller" data-rail-visible="1" style="height: 500px">
											<table class="table table-striped table-bordered table-hover" id="sample_2">
												<thead>
													<tr>
														<!-- <th>
															PO DATE
														</th> -->
														<th>
															PO
														</th>
														<th>
															CODE
														</th>
														<th>
															NAME
														</th>
														<th>
															PO BAL
														</th>
														<th>
															PO QTY
														</th>
														<th>
															DUE DATE
														</th>
														<th>
															PO REQ
														</th>
														<th>
															BAL REQ
														</th>
														<th>
															ALLOC
														</th>
														<th>
															ALLOCATIONCAL
														</th>
														<th>
															CUSTOMER NAME
														</th>
													</tr>
												</thead>

												<tbody id="table" >
													<?php foreach($t1 as $t1_value): ?>
													<tr>
														<!-- <td><?php echo e($t1_value->PODATE); ?></td> -->
														<td><?php echo e($t1_value->PO); ?></td>
														<td><?php echo e($t1_value->CODE); ?></td>
														<td><?php echo e($t1_value->NAME); ?></td>
														<td style="text-align: right"><?php echo e($t1_value->POBAL); ?></td>
														<td style="text-align: right"><?php echo e($t1_value->POQTY); ?></td>
														<td><?php echo e($t1_value->DUEDATE); ?></td>
														<td style="text-align: right"><?php echo e($t1_value->POREQ); ?></td>
														<td style="text-align: right"><?php echo e($t1_value->BALREQ); ?></td>
														<td style="text-align: right"><?php echo e($t1_value->ALLOC); ?></td>
														<td style="text-align: right"><?php echo e($t1_value->ALLOCAL); ?></td>
														<td><?php echo e($t1_value->CUSTOMER); ?></td>
													</tr>
													<?php endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<br/>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<div class="col-md-1">
												<h4><span class="label label-info">PICK UP DATE</span></h4>
											</div>
											<div class="col-md-4">
												<div class="input-group input-large date-picker input-daterange" data-date="<?php echo date("m/d/Y"); ?>" data-date-format="mm/dd/yyyy">
													<input type="text" class="form-control" name="from" value="<?php if(isset($datefrom)){ echo $datefrom;} ?>">
														<span class="input-group-addon"> to </span>
													<input type="text" class="form-control" name="to" value="<?php if(isset($dateto)){ echo $dateto;} ?>">
												</div>
											</div>
											<div class="col-md-7">
												<button type="submit" class="btn btn-info" id="btn_search"><i class="fa fa-search"></i> Search</button>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="scroller" data-rail-visible="1" style="height: 500px">
											<table class="table table-striped table-bordered table-hover" id="sample_3">
												<thead>
													<tr>
														<th>
															PARTS PO
														</th>
														<th>
															CODE
														</th>
														<th>
															NAME
														</th>
														<th>
															PU QTY
														</th>
														<th>
															SUP CODE
														</th>
														<th>
															SUP NAME
														</th>
														<th>
															PICK UP DATE
														</th>
														<th>
															REMARKS
														</th>
														<th>
															PO
														</th>
														<th>
															PRODUCT NAME
														</th>
														<th>
															PR
														</th>
													</tr>
												</thead>

												<tbody id="table" >
													<?php foreach($t2 as $t2_value): ?>
													<tr>
														<td><?php echo e($t2_value->PO); ?></td>
														<td><?php echo e($t2_value->CODE); ?></td>
														<td><?php echo e($t2_value->NAME); ?></td>
														<td style="text-align: right;"><?php echo e($t2_value->PUQTY); ?></td>
														<td style="text-align: center;"><?php echo e($t2_value->SUPCODE); ?></td>
														<td><?php echo e($t2_value->SUPNAME); ?></td>
														<td style="text-align: center;"><?php echo e($t2_value->PICKUPDATE); ?></td>
														<td><?php echo e($t2_value->REMARKS); ?></td>
														<td><?php echo e($t2_value->ISO_PO); ?></td>
														<td><?php echo e($t2_value->PRODNAME); ?></td>
														<td><?php echo e($t2_value->PR); ?></td>
													</tr>
													<?php endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
									<input class="form-control form-control-inline input-medium col-sm-3" type="hidden" name="po" value="<?php if(isset($po)){ echo $po; } ?>"/>
									<input class="form-control form-control-inline input-medium col-sm-3" type="hidden" name="code" value="<?php if(isset($code)){ echo $code; } ?>"/>
								</form>


								<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/print-poisogiinput')); ?>">
								<?php echo csrf_field(); ?>

									<input class="form-control form-control-inline input-medium col-sm-3" type="hidden" name="po" value="<?php if(isset($po)){ echo $po; } ?>"/>
									<input class="form-control form-control-inline input-medium col-sm-3" type="hidden" name="code" value="<?php if(isset($code)){ echo $code; } ?>"/>
									<div class="row">
										<div class="col-md-12">
											<button type"button" class="btn btn-success pull-right" <?php echo($state); ?> ><i class="fa fa-print" ></i> PRINT</button>
										</div>
									</div>
								</form>

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


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>