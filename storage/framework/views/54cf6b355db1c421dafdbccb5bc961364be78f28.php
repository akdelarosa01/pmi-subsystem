<?php
/*******************************************************************************
     Copyright (c) <Company Name> All rights reserved.

     FILE NAME: PoPartsStatus.blade.php
     MODULE NAME:  [3008-1] PO Status : Parts Status
     CREATED BY: MESPINOSA
     DATE CREATED: 2016.05.03
     REVISION HISTORY :

     VERSION     ROUND    DATE           PIC          DESCRIPTION
     100-00-01   1     2016.05.03     MESPINOSA       Initial Draft
*******************************************************************************/
?>
	

	<?php $__env->startSection('title'); ?>
	PO Status (Parts Status) | Pricon Microelectronics, Inc.
	<?php $__env->stopSection(); ?>

	<?php $__env->startSection('content'); ?>
	
	<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php $state = ""; $readonly = ""; ?>
	<?php foreach($userProgramAccess as $access): ?>
		<?php if($access->program_code == Config::get('constants.MODULE_CODE_SSS')): ?>
			<?php if($access->read_write == "2"): ?>
				<?php $state = "disabled"; $readonly = "readonly"; ?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; ?>

	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script type="text/javascript">

	</script>
	<div class="clearfix"></div>

	<!-- BEGIN CONTAINER -->
	<div class="page-container">
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
									<i class="fa fa-bar-chart-o"></i> PARTS REQUIREMENTS INFORMATION
								</div>
							</div>
							<div class="portlet-body portlet-empty">
								<form  class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/print-popartstatus')); ?>">
								<?php echo csrf_field(); ?>

								<div class="row">
									<div class="col-md-12">
										<a href="<?php echo e(url('/postatus?po=')); ?> <?php if(isset($po)) { if($po == 'X') { echo '';} else {echo $po;}} ?>" class="btn btn-sm yellow pull-right"><i class="fa fa-mail-reply"></i> Back</a>
										<h3>PARTS REQUIREMENTS INFORMATION</h3>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label class="col-sm-3">
											<button class="btn btn-sm grey-gallery" disabled>PART CODE:</button>
										</label>
										<div class="col-sm-9" style="font-size: 20px"><strong>
											<?php foreach($parts as $part): ?>
												<?php echo e($part->CODE); ?>

												<?php break;?>
											<?php endforeach; ?>
										</strong></div>
									</div>
									<div class="col-md-6">
										<label class="col-sm-3">
											<button class="btn btn-sm grey-gallery" disabled>PART NAME:</button>
										</label>
										<div class="col-sm-9" style="font-size: 20px"><strong>
											<?php if(isset($part)){echo $part->NAME; } ?>
										</strong></div>
									</div>
								</div>
								<input type="hidden" class="form-control" name="has_part" value="<?php if(isset($has_part)) {echo $has_part;} ?>" >
								<input type="hidden" class="form-control" name="code" value="<?php if(isset($part)){echo $part->CODE; } ?>" >
								<div class="row">
									<div class="col-md-6">
										<div class="portlet box blue">
											<div class="portlet-body portlet-empty">
												<div class="col-md-12">
													<h4><strong>SUPPLIER</strong></h4>
												</div>
												<div class="row">
													<div class="col-md-1">
													</div>
													<div class="col-md-11">
														<h4>STATUS:</h4>
													</div>
												</div>
												<br/>
												<div class="row">
													<div class="col-md-3">
													</div>
													<div class="col-md-5">
														ASSY100
													</div>
													<div class="col-md-1">
														<div class="pull-right"><?php if(isset($part)){echo $part->ASSY100; } ?></div>
													</div>
													<div class="col-md-3">
													</div>
												</div>
												<br/>
												<div class="row">
													<div class="col-md-3">
													</div>
													<div class="col-md-5">
														WHS2100
													</div>
													<div class="col-md-1">
														<div class="pull-right"><?php if(isset($part)){echo $part->WHS100; } ?></div>
													</div>
													<div class="col-md-3">
													</div>
												</div>
												<br/>
												<div class="row">
													<div class="col-md-3">
													</div>
													<div class="col-md-5">
														WHS2102
													</div>
													<div class="col-md-1">
														<div class="pull-right"><?php if(isset($part)){echo $part->WHS102; } ?></div>
													</div>
													<div class="col-md-3">
													</div>
												</div>
												<br/>
												<div class="row">
													<div class="col-md-3">
													</div>
													<div class="col-md-5">
														<strong>TOTAL STOCK</strong>
													</div>
													<div class="col-md-1">
														<div class="pull-right"><?php if(isset($part)){echo $part->TOTAL; } ?></div>
													</div>
													<div class="col-md-3">
													</div>
												</div>
												<br/>
												<div class="row">
													<div class="col-md-3">
													</div>
													<div class="col-md-5">
														GROSS REQUIREMENTS
													</div>
													<div class="col-md-1">
														<div class="pull-right"><?php if(isset($part)){echo $part->GROSS_REQ; } ?></div>
													</div>
													<div class="col-md-3">
													</div>
												</div>
												<br/>
												<div class="row">
													<div class="col-md-3">
													</div>
													<div class="col-md-5">
														<strong>EXCESS/SHORTAGE</strong>
													</div>
													<div class="col-md-1">
														<div class="pull-right"><?php if(isset($part)){echo $part->EXCESS; } ?></div>
													</div>
													<div class="col-md-3">
													</div>
												</div>
												<br/>
												<div class="row">
													<div class="col-md-3">
													</div>
													<div class="col-md-5">
														<div style="font-size: 10px">
															{PR BLANCE IS NOT INCLUDED}
														</div>
														PR BALANCE
													</div>
													<div class="col-md-1">
														<div class="pull-right"><?php if(isset($part)){echo $part->PR_BAL; } ?></div>
													</div>
													<div class="col-md-3">
													</div>
												</div>
												<br/>
												<div class="row">
													<div class="col-md-3">
													</div>
													<div class="col-md-5">
														<strong>AVAILABLE STOCK</strong>
													</div>
													<div class="col-md-1">
														<div class="pull-right"><?php if(isset($part)){echo $part->STOCK; } ?></div>
													</div>
													<div class="col-md-3">
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="portlet box blue">
											<div class="portlet-body portlet-empty" >
												<div class="table-responsive scroller" style="overflow: scroll; height: 368px">
													<table class="table table-striped table-bordered table-hover" style="font-size: 12px">
														<thead>
															<tr>
																<th>
																	PR_Issued
																</th>
																<th>
																	PR
																</th>
																<th>
																	YEC_PU
																</th>
																<th>
																	FI
																</th>
																<th>
																	DeliQty
																</th>
																<th>
																	DeliAccum
																</th>															
															</tr>
														</thead>

														<tbody id="table" >
															<?php foreach($t1 as $t1detail): ?>
															<tr>
																<td><?php echo e($t1detail->PR_ISSUED); ?></td>
																<td><?php echo e($t1detail->PR); ?></td>
																<td><?php echo e($t1detail->YEC_PU); ?></td>
																<td><?php echo e($t1detail->FI); ?></td>
																<td style="text-align: right"><?php echo e($t1detail->DELIQTY); ?></td>
																<td style="text-align: right"><?php echo e($t1detail->DELIACCUM); ?></td>
															</tr>
															<?php endforeach; ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>

								</div>
								
								<br/>

								<div class="row">
									<div class="col-md-12">
										<div class="table-responsive scroller" style="overflow: scroll; height: 280px">
											<table class="table table-striped table-bordered table-hover" ><!--id="sample_3"-->
												<thead>
													<tr>
														<th>
															PO DATE
														</th>
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
													<?php $cnt = 0; ?>
													<?php foreach($t2 as $t2detail): ?>
													<tr>
														<td><?php echo e($t2detail->PODATE); ?></td>
														<td><?php echo e($t2detail->PO); ?></td>
														<td><?php echo e($t2detail->CODE); ?></td>
														<td><?php echo e($t2detail->NAME); ?></td>
														<td style="text-align: right"><?php echo e($t2detail->POBAL); ?></td>
														<td style="text-align: right"><?php echo e($t2detail->POQTY); ?></td>
														<td><?php echo e($t2detail->DUEDATE); ?></td>
														<td style="text-align: right"><?php echo e($t2detail->POREQ); ?></td>
														<td style="text-align: right"><?php echo e($t2detail->BALREQ); ?></td>
														<td style="text-align: right"><?php echo e($t2detail->ALLOC); ?></td>
														<td style="text-align: right"><?php echo e($t2detail->ALLOCAL); ?></td>
														<td><?php echo e($t2detail->CUSTOMERNAME); ?></td>
													</tr>
														<?php $cnt++; ?>
													<?php endforeach; ?>
												</tbody>
											</table>
										</div>
										<p>Count: <?php echo $cnt;?></p>
									</div>
								</div>


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