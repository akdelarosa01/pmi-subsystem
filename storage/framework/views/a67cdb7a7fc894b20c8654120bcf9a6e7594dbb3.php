<?php $__env->startSection('title'); ?>
	YPICS Invoicing | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php $state = ""; $readonly = ""; ?>
	<?php foreach($userProgramAccess as $access): ?>
		<?php if($access->program_code == Config::get('constants.MODULE_CODE_INVCING')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
			<?php if($access->read_write == "2"): ?>
			<?php $state = "disabled"; $readonly = "readonly"; ?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; ?>


	<div class="clearfix"></div>

	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">

				<!-- BEGIN PAGE CONTENT-->
                <!-- BEGIN PAGE CONTENT-->
				<div class="row">
					<div class="col-md-12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<div class="portlet box blue" >
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-file-text"></i>  YPICS Invoicing
								</div>
                                <div class="actions">
                                    <a href="javascript:;" class="btn blue" id="btn_save">
                                        <i class="fa fa-floppy-o"></i> Save
                                    </a>
                                    <a href="javascript:;" class="btn red" id="btn_clear">
                                        <i class="fa fa-eraser"></i> clear
                                    </a>
                                    <a href="javascript:;" class="btn blue-hoki">
                                        <i class="fa fa-print"></i> Print
                                    </a>
                                    <a href="<?php echo e(url('/ypicsinvoicing')); ?>" class="btn grey-gallery pull-right">
                                        <i class="fa fa-reply"></i> Back
                                    </a>
                                </div>
							</div>
							<div class="portlet-body">

								<div class="row">

									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong>From Packing List</strong>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="portlet box">
                                                    <div class="portlet-body">
                                                        <form class="form-horizontal">
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-3">Item No.</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control input-sm" id="itemno" name="itemno" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-3">Packing List Ctrl</label>
                                                                <div class="col-sm-9">
                                                                    <select id="packinglist_ctrl" name="packinglist_ctrl" class="form-control input-sm" disabled="true">
                                                                        <option value="option">option</option>
                                                                        <option value="option">option</option>
                                                                        <option value="option">option</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-3">Products</label>
                                                                <div class="col-sm-9">
                                                                    <select id="products" name="products" class="form-control input-sm" disabled="true">
                                                                        <option value="option">option</option>
                                                                        <option value="option">option</option>
                                                                        <option value="option">option</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-12">Sold To Address</label>
                                                                <div class="col-sm-12">
                                                                    <textarea name="soldto_address" id="soldto_address" class="form-control input-sm" style="resize:none; height:175px" readonly></textarea>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-4">

                                                <div class="portlet box">
                                                    <div class="portlet-body">
                                                        <form class="form-horizontal">
                                                            <div class="form-group">
                                                                <label class="col-sm-12">Ship To Address</label>
                                                                <div class="col-sm-12">
                                                                    <textarea name="soldto_address" id="soldto_address" class="form-control input-sm" style="resize:none; height:175px" readonly></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-3">Shipped From</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control input-sm" id="shippedfrom" name="shippedfrom" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-3">Ship To</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control input-sm" id="shipto" name="shipto" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-3">Carrier</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control input-sm" id="carrier" name="carrier" readonly>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="portlet box">
                                                    <div class="portlet-body">
                                                        <form class="form-horizontal">
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-3">Gross Weight</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control input-sm" id="gross_weight" name="gross_weight" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-3">Terms of Payment</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control input-sm" id="terms_of_payment" name="terms_of_payment" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-3">P.O. No.</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control input-sm" id="po_no" name="po_no" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-3">Description</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control input-sm" id="description" name="description" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-3">Country Origin</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control input-sm" id="country_origin" name="country_origin" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-3">Quantity</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control input-sm" id="quantity" name="quantity" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-3">Unit Price</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control input-sm" id="unitprice" name="unitprice" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-3">Amount</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control input-sm" id="amount" name="amount" readonly>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong>For Input</strong>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="portlet box">
                                                    <div class="portlet-body">
                                                        <form class="form-horizontal">
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-3">Revision No.</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control input-sm" id="revision_no" name="revision_no" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-3">Transaction No.</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control input-sm" id="transaction_no" name="transaction_no" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-3">For BIR No.</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control input-sm" id="for_bir_no" name="for_bir_no" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-3">Pick-up Date</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control input-sm date-picker" type="text" value="" name="pickup_date" id="pickup_date"/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-3">Invoice Date</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control input-sm date-picker" type="text" value="" name="invoice_date" id="invoice_date"/>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="portlet box">
                                                    <div class="portlet-body">
                                                        <form class="form-horizontal">
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-3">Freight</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control input-sm" id="freight" name="freight" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-3">Via</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control input-sm" id="via" name="via" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-3">Sailing On</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control input-sm date-picker" type="text" value="" name="sailing_on" id="sailing_on"/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-3">No# of Packaging</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control input-sm" id="no_of_packaging" name="no_of_packaging" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-3">AWB No.</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control input-sm" id="awb_no" name="awb_no" readonly>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="portlet box">
                                                    <div class="portlet-body">
                                                        <form class="form-horizontal">
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-3">Prepared By</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control input-sm" id="prepared_by" name="prepared_by" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-12">Remarks</label>
                                                                <div class="col-sm-12">
                                                                    <textarea name="remarks" id="remarks" class="form-control input-sm" style="resize:none; height:50px" readonly></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-12">Note / Hightlight</label>
                                                                <div class="col-sm-12">
                                                                    <textarea name="note_hightlight" id="note_hightlight" class="form-control input-sm" style="resize:none; height:50px" readonly></textarea>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 table-reponsive">
                                                <table class="table table-hover table-bordered table-striped" id="tblsummary">
                                                    <thead>
                                                        <tr>
                                                            <td></td>
                                                            <td>Item No.#</td>
                                                            <td>Control No.</td>
                                                            <td>P.O. No..</td>
                                                            <td>Quantity</td>
                                                            <td>Price</td>
                                                            <td>Amount</td>
                                                            <td>Draft Shipment</td>
                                                            <td>Ship Date</td>
                                                            <td>Shipped From</td>
                                                            <td>Invoice Date</td>
                                                            <td>Products</td>
                                                            <td>Sold to Address</td>
                                                            <td>Ship To Address</td>
                                                            <td>Carrier</td>
                                                            <td>Gross Weight</td>
                                                            <td>Terms of Payment</td>
                                                            <td>Description</td>
                                                            <td>Country Origin</td>
                                                            <td>Revision No.</td>
                                                            <td>Transaction No.</td>
                                                            <td>For BIR No.</td>
                                                            <td>Pick-up Date</td>
                                                            <td>Freight</td>
                                                            <td>Via</td>
                                                            <td>Sailing on</td>
                                                            <td>No. of Packaging</td>
                                                            <td>AWB No.</td>
                                                            <td>Prepared By</td>
                                                            <td>Remarks</td>
                                                            <td>Note/Highlight</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <?php /* <div class="row">
                                            <div class="col-md-12 text-center">
                                                <a href="javascript:;" class="btn blue" id="btn_save">
                                                    <i class="fa fa-floppy-o"></i> Save
                                                </a>
                                                <a href="javascript:;" class="btn red" id="btn_clear">
                                                    <i class="fa fa-eraser"></i> clear
                                                </a>
												<a href="javascript:;" class="btn blue-hoki">
                                                    <i class="fa fa-print"></i> Print
                                                </a>
                                                <a href="<?php echo e(url('/ypicsinvoicing')); ?>" class="btn grey-gallery pull-right">
                                                    <i class="fa fa-reply"></i> Back
                                                </a>
                                            </div>
                                        </div> */ ?>

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


<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script type="text/javascript">
        $('#tblsummary').dataTable();
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>