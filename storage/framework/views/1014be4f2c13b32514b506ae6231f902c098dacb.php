<?php $__env->startSection('title'); ?>
	Packing List System | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<script type="text/javascript">

		function getval(sel) 
		{
			if($('#ddl_soldto').val() == '-1')
			{
				$('#txa_soldto').val("");
			}
			else
			{
				var values = $("#ddl_soldto").val().split('|');

                if(values.length == 2)
                {
                    $("#txa_soldto").val(values[0]);
                }
                else
                {
                	$('#txa_soldto').val("");
                }

				// $('#txa_soldto').val(sel.value);
			}
    	}

		function save()
		{

			var details = new Array;
			var detailsListRow = new Array;
			var detailsList = new Array;
			var cnt = 0;
			var action = '';
			var is_valid = true;

			if($('#ddl_soldto').val() == '-1')
			{
				details[0] = '';
				is_valid = false;
			}
			else
			{

				var values = $('#ddl_soldto').val().split('|');

                if(values.length == 2)
                {
                    details[0] = values[1];
                }
                else
                {
					details[0] = $("#ddl_soldto option:selected").text();
                }

			}

			if($('#ddl_carrier').val() == '-1')
			{
				details[2] = '';
				is_valid = false;
			}
			else
			{
				details[2] = $('#ddl_carrier').val();	
			}


			if($('#ddl_portdes').val() == '-1')
			{
				details[5] = '';
				is_valid = false;
			}
			else
			{
				details[5] = $('#ddl_portdes').val();	
			}

			if($('#ddl_shipinstruction').val() == '-1')
			{
				details[12] = '';
				is_valid = false;
			}
			else
			{
				details[12] = $('#ddl_shipinstruction').val();
			}

			if($('#txa_soldto').val() == '' 
				|| $('#dtp_dateship').val() == ''
				|| $('#txa_portloading').val() == ''
				|| $('#txt_controlno').val() == ''
				|| $('#dtp_invoice').val() == ''
				|| $('#dtp_remarkstime').val() == ''
				|| $('#dtp_remarkspickupdate').val() == ''
				|| $('#txt_s_no').val() == ''
				|| $('#txa_shipto').val() == ''
				|| $('#txa_casemarks').val() == ''
				|| $('#txa_note').val() == ''
				|| $('#txt_to').val() == ''
				|| $('#txt_freight').val() == '')
			{
				is_valid = false;
			}

			//[0] ddl_soldto
			details[1] = $('#txa_soldto').val();
			//[2] ddl_carrier
			details[3] = $('#dtp_dateship').val();
			details[4] = $('#txa_portloading').val();
			//[5] ddl_portdes
			details[6] = $('#txt_controlno').val();
			details[7] = $('#dtp_invoice').val();
			details[8] = $('#dtp_remarkstime').val();
			details[9] = $('#dtp_remarkspickupdate').val();
			details[10] = $('#txt_s_no').val();
			details[11] = $('#txa_shipto').val();
			//[12] ddl_shipinstruction
			details[13] = $('#txa_casemarks').val();
			details[14] = $('#txa_note').val();
			details[15] = $('#txt_to').val();
			details[16] = $('#txt_freight').val();

			if(is_valid)
			{
				if($('#recid').val() == '' || typeof $('#recid').val() === "undefined")
				{
					details[17] = '';
					action ='ADD';
				}
				else
				{
					details[17] = $('#recid').val();
					action ='UPD';
				}

				$('#tbl_viewtable tr').not(':first').each(function(i, row)
				{
					detailsListRow = new Array;
					detailsListRow[0] = $(this).find("td").eq(0).html();
					detailsListRow[1] = $(this).find("td").eq(1).html();
					detailsListRow[2] = $(this).find("td").eq(2).html();
					detailsListRow[3] = $(this).find("td").eq(3).html();
					detailsListRow[4] = $(this).find("td").eq(4).html();
					detailsListRow[5] = $(this).find("td").eq(5).html();
					detailsList[cnt] = detailsListRow;
					cnt++;
				});
				// alert(details[17]);
				$.post("<?php echo e(url('/packinglistsystem-save')); ?>", 
				{
					_token        : $('meta[name=csrf-token]').attr('content')
					, details     : details
					, detailsList : detailsList
				})
				.done(function(data)
				{
					// alert(data);
					var msg = '';

					if(action == 'ADD')
					{
						msg = 'Packing List Successfully Added.';
					}
					else
					{
						msg = 'Packing List Successfully Updated.';
					}

					$.alert(msg,
					{
						position  : ['center', [-0.40, 0]],
						type      : 'success',
						closeTime : 2000,
						autoClose : true,
						id        :'alert_suc'
					});
					if(action =='ADD')
					{
						window.location.href= "<?php echo e(url('/packinglistdetails?selecteditem=')); ?>" + data;
						$('#recid').val(data);
						$('#printid').val(data);
					}
				})
				.fail(function()
				{
					$.alert('Details contains invalid values. <br/> 1. Control No. must be unique. <br/> 2. All fields are required. <br/> Please check and try again.',
					{
						position  : ['center', [-0.40, 0]],
						type      : 'error',
						closeTime : 2000,
						autoClose : true,
						id        :'alert_suc'
					});
				});
				}
			else
			{
				$.alert('All fields are required.',
				{
					position  : ['center', [-0.40, 0]],
					type      : 'error',
					closeTime : 2000,
					autoClose : true,
					id        :'alert_suc'
				});
			}
		}

		function rowClick(ctr)
		{
			var obj_data = new Object;
			var cnt = 0;
			var item = new Array;
			var newrow = '';

			$(".srch_item"+ctr).each(function()
			{
				var id = $(this).attr('name');
				item[cnt] = $(this).text();

				cnt++;
			});

			if(item.length > 0)
			{
				var rowCount = $('#tbl_editable tr').length;
				var trcnt = parseInt($('#trcnt').val());

				if(rowCount > 25)
				{
					alert('Adding more than 25 items may have a problem during print. Please register a separate record instead.');
				}

				if(rowCount == 2 && $('#edittbl').val() == '0')
				{
					$('#edit_tbl_body_row').html('');
				}
				newrow = '<tr id="tr'+ trcnt +'">'
							+'<td><input id="boxno" type="text" class="form-control" name="boxno" value=""></td>'
							+'<td id="pono">'+item[0]+'</td>'
							+'<td id="desc">'+item[1]+'</td>'
							+'<td><input id="prodcode" type="text" class="form-control" name="boxno" value=""></td>'
							+'<td><input id="qty" type="text" class="form-control" name="boxno" value=""></td>'
							+'<td><input id="gross" type="text" class="form-control" name="boxno" value=""></td>'
							// +'<td><a href="#" onclick="edit('+ trcnt +');" value="'+ trcnt +'">Edit</a></td>'
							+'<td><a href="#" onclick="del('+ trcnt +');" value="'+ trcnt +'">Remove</a></td>'
						+'</tr>';
				$('#edit_tbl_body_row').append(newrow);
				$('#edittbl').val("1");

				$('#trcnt').val(trcnt+1);
			}
		}

		function edit(cnt)
		{
			alert(cnt);
		}

		function del(cnt)
		{
		    $('table#tbl_editable tr#'+'tr' + cnt).remove();
		}

		function reflect()
		{
		    $('#bu2-orders').modal('toggle');
			var newrow = '';
			var temp_val = '';
			var err = false;

			$('#tbl_editable tr').not(':first').each(function(i, row)
			{
				var boxno = '';
				var prodcode = '';
				var qty = '';
				var gross = '';
				var pono = '';
				var desc = '';

				pono = '<td>' + $(this).find("td").eq(1).html() + '</td>'; 
				desc = '<td>' + $(this).find("td").eq(2).html() + '</td>';

			    $(this).find('input').each(function() 
			    {
			    	if($(this).attr('id') == 'boxno')
			    	{
			    		if($(this).val().trim() == '')
			    		{
			    			boxno = '<td style="background-color: red">'+ $(this).val() +'</td>';
			    			err = true;
			    		}
			    		else
			    		{
			    			boxno = '<td>'+ $(this).val() +'</td>';	
			    		}
			    	}
			    	if($(this).attr('id') == 'prodcode')
			    	{
			    		if($(this).val().trim() == '')
			    		{
			    			prodcode = '<td style="background-color: red">'+ $(this).val() +'</td>';
			    			err = true;
			    		}
			    		else
			    		{
			    			prodcode = '<td>'+ $(this).val() +'</td>';
			    		}
			    	}
			    	if($(this).attr('id') == 'qty')
			    	{
			    		if(parseInt($(this).val()))
			    		{
			    			qty = '<td>'+ parseInt($(this).val()) +'</td>';	
			    		}
			    		else if($(this).val().trim() == '')
			    		{
			    			qty = '<td style="background-color: red">'+ $(this).val() +'</td>';
			    			err = true;
			    		}
			    		else
			    		{
			    			qty = '<td style="background-color: red">'+ $(this).val() +'</td>';
			    			err = true;
			    		}
			    	}
			    	if($(this).attr('id') == 'gross')
			    	{
			    		if($(this).val().trim() == '')
			    		{
			    			gross = '<td style="background-color: red">'+ $(this).val() +'</td>';
			    			err = true;
			    		}
			    		else
			    		{
			    			gross = '<td>'+ $(this).val() +'</td>';
			    		}
			    	}

			    })
			    newrow = newrow + '<tr>' + boxno + pono + desc + prodcode + qty + gross + '</tr>';
			});

			var view_trcontent = document.getElementById("view_tbl_body_row");
			view_trcontent.innerHTML = '';
			view_trcontent.innerHTML = newrow;

			if(err)
			{
		    	$.alert('Details contains invalid values. All fields are required.', 
		    	{
					position: ['center', [-0.42, 0]],
					type: 'danger',
					closeTime: 3000,
					autoClose: true
				});
				$("#btn_save").prop("disabled", true);
				$("#btn_print").prop("disabled", true);
				$("#btn_printout").prop("disabled", true);
			}
			else
			{
				$("#btn_save").removeAttr('disabled');
				$("#btn_print").removeAttr('disabled');
				$("#btn_printout").removeAttr('disabled');
			}
		}

		function getOrders()
		{
			var porder = $('#txt_porder').val();

			$.post("<?php echo e(url('/packinglistdetails-search')); ?>", 
			{
				_token   : $('meta[name=csrf-token]').attr('content')
				, porder : porder
				, dbconnection : $('#txt_db').val()
			})
			.done(function(datatable)
			{			
				var newcol = '';
				var newItem = '';

				$('#srch_tbl_body').html('');

				var ctr = 0;
				var arr = $.map(datatable, function(datarow) 
				{
					newcol = '';

		    		$.each( datarow, function( ckey, value ) 
		    		{
		    			if(ckey == 'PORDER')
		    			{
		    				// || ckey == 'NAME' || ckey == 'CODE' || ckey == 'KVOL' || ckey == 'PRICE'
							newcol = newcol + '<td class="srch_item'+ ctr +'" name="srch_item'+ ctr +'">'+ value +'</td>';
		    			}
		    			else
		    			{
							newcol = newcol + '<td class="srch_item'+ ctr +'" name="srch_item'+ ctr +'">'+ value +'</td>';	
		    			}
	    			});

	    			newItem = '<tr onclick="javascript: rowClick('+ ctr +');" style="cursor: pointer">'
							+ newcol
							+ '</tr>';
					$('#srch_tbl_body').append(newItem);
					ctr++;
				});	
			})
			.fail(function() 
			{
				alert('fail');
			});
		}

    function addDetails()
    {
        if($('#dbconnection').val() == 0)
       	{
			$.alert('Please select database connection.', 
			{
				position: ['center', [-0.42, 0]],
				type: 'danger',
				closeTime: 3000,
				autoClose: true
			});
	    }
        else
       	{
			window.location.href= "<?php echo e(url('/packinglistdetails?dbconnection=')); ?>" + $('#txt_db').val();
		}
    }
	
	</script>

	<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php $state = ""; $readonly = ""; ?>
	<?php foreach($userProgramAccess as $access): ?>
		<?php if($access->program_code == Config::get('constants.MODULE_CODE_PLSYSTEM')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
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
				<div class="row">
					<div class="col-md-12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-bars"></i>  PACKING LIST SYSTEM
								</div>
							</div>
							<div class="portlet-body">

								<div class="row">
									<div class="col-md-8 col-md-offset-2">
										<div class="portlet box">
											<div class="portlet-body">
												<div class="row">
													<div class="col-md-12">
														<!-- <a href="#" id="lnk_masterreport" class="btn btn-success pull-right">
															<i class="fa fa-file-o"></i> Master File Report
														</a> -->
														<a href="#" onclick="javascript: addDetails();" id="lnk_addnew" class="btn btn-primary pull-right input-sm" <?php echo($state); ?> >
															<i class="fa fa-plus"></i> Add New
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-8 col-md-offset-2">
										<div class="portlet box">
											<div class="portlet-body">
<!-- 												<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/packinglistsystem-save')); ?>">
												<?php echo csrf_field(); ?> -->
													<div class="row">
														<!-- LEFT SIDE -->
														<div class="col-md-6">

															<div class="form-group">
																<div class="col-md-12">
																	<h3>PACKING LIST</h3>
																</div>
															</div>
                                                  				<?php if(isset($packinglist)): ?>
																	<?php foreach($packinglist as $packingInfo): ?>
                              											<input type="hidden" class="form-control" id="recid" name="recid" value="<?php if(isset($packinglist)){echo $packingInfo->id; } ?>" />
                              											<input type="hidden" class="form-control" id="edittbl" name="edittbl" value="<?php if(count($packingdetails) > 0){ echo '1' ;} else{ echo '0';} ?>" />
																	<?php endforeach; ?>
                                                  				<?php endif; ?>
															<div class="form-group">
																<label class="col-md-12 input-sm">Sold To:</label>
																<div class="col-md-12">
																		<select id="ddl_soldto" name="soldtoid" class="form-control input-sm" onchange="getval(this);" <?php echo($state); ?> >
																			<option selected="selected" value="-1">-- Select --</option>
                                                  							<?php if(isset($soldto)): ?>
																				<?php foreach($soldto as $value): ?>
																					<option value="<?php echo e($value->description . '|' .$value->code); ?>" 
																						<?php if(isset($packingInfo)){ if($packingInfo->sold_to_id == $value->code){ echo 'selected';}}?> >
																						<?php echo e($value->companyname); ?>

																					</option>
																				<?php endforeach; ?>
                                                  							<?php endif; ?>
																		</select>
																</div>
																<div class="col-md-12">
																	<textarea id="txa_soldto" name="soldto" class="form-control input-sm" rows="6" maxlength="200" style="resize:none;"><?php if(isset($packinglist)){echo $packinglist[0]->sold_to; } ?></textarea>
																</div>
															</div>

															<div class="form-group">
																<div class="row">
																	<div class="col-md-6">
																		<label class="col-md-12 input-sm">Carrier:</label>
																		<div class="col-md-12">
																			<select id="ddl_carrier" class="form-control input-sm" name="carrier" <?php echo($state); ?> >
																				<option value="-1">N/A</option>
	                                                  							<?php if(isset($carrier)): ?>
																					<?php foreach($carrier as $value): ?>
																						<option value="<?php echo e($value->id); ?>" 
																						<?php if(isset($packingInfo)){ if($packingInfo->carrier == $value->id){ echo 'selected';}}?> >
																						<?php echo e($value->description); ?>

																						</option>
																					<?php endforeach; ?>
	                                                  							<?php endif; ?>
																			</select>
																		</div>
																	</div>
																	<div class="col-md-6">
																		<label class="col-md-12 input-sm">Date Ship:</label>
																		<div class="col-md-12">
																			<input id="dtp_dateship" class="form-control date-picker" readonly="true" size="16" type="text" name="dateship" value="<?php if(isset($packinglist)){echo $packingInfo->date_ship; } ?>" <?php echo($state); ?> >
																		</div>
																	</div>
																</div>
															</div>

															<div class="form-group">
																<div class="row">
																	<div class="col-md-6">
																		<label class="col-md-12 input-sm">Port of Loading:</label>
																		<div class="col-md-12">
																			<input id="txa_portloading" type="text" name="portloading" maxlength="100" class="form-control input-sm" value="<?php if(isset($packinglist)){echo $packingInfo->port_loading; } ?>" <?php echo($readonly); ?> >
																		</div>
																	</div>
																	<div class="col-md-6">
																		<label class="col-md-12 input-sm">Port of Destination:</label>
																		<div class="col-md-12">
																			<select id="ddl_portdes" class="form-control input-sm" name="portdes" <?php echo($state); ?> >
																				<option value="-1">N/A</option>
	                                                  							<?php if(isset($portOfDestination)): ?>
																					<?php foreach($portOfDestination as $value): ?>
																						<option value="<?php echo e($value->id); ?>" 
																						<?php if(isset($packingInfo)){ if($packingInfo->port_destination == $value->id){ echo 'selected';}}?> >
																						<?php echo e($value->description); ?>

																						</option>
																					<?php endforeach; ?>
	                                                  							<?php endif; ?>
																			</select>
																		</div>
																	</div>
																</div>
															</div>

														</div>

														<!-- RIGHT SIDE -->
														<div class="col-md-6">
															<div class="form-group">
																<div class="row">
																	<div class="col-md-2">
																	</div>
																	<label class="col-md-10 input-sm">Ctrl #:</label>
																	<div class="col-md-2">
																	</div>
																	<div class="col-md-10">
																		<input id="txt_controlno" type="text" class="form-control input-sm" name="controlno" maxlength="20" value="<?php if(isset($packinglist)){echo $packingInfo->control_no; } ?>" <?php echo($readonly); ?> >
																	</div>
																	<label class="col-md-12 input-sm">No. and Date of Invoice #:</label>
																	<div class="col-md-12">
																		<input id="dtp_invoice" class="form-control date-picker input-sm" readonly="true" size="16" type="text" name="invoicedate" value="<?php if(isset($packinglist)){echo $packingInfo->invoice_date; } ?>" <?php echo($state); ?> >
																	</div>
																	<label class="col-md-12 input-sm">Remarks:</label>
																	<div class="form-group">
																		<div class="row">
																			<div class="col-md-1">
																			</div>
																			<div class="col-md-3">
																				<label class="col-md-12 input-sm">Time:</label>
																			</div>
																			<div class="col-md-6">
																				<input id="dtp_remarkstime" name="remarkstime" class="form-control timepicker timepicker-no-seconds input-sm" readonly="true" size="16" type="text" value="<?php if(isset($packinglist)){echo $packingInfo->remarks_time; } ?>" <?php echo($state); ?> >
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-1">
																			</div>
																			<div class="col-md-3">
																				<label class="col-md-12 input-sm">Pick-Up Date:</label>
																			</div>
																			<div class="col-md-6">
																				<input id="dtp_remarkspickupdate" name="remarkspickupdate" class="form-control date-picker input-sm" readonly="true" size="16" type="text" data-date="<?php echo date("m/d/Y"); ?>" data-date-format="mm/dd/yyyy" value="<?php if(isset($packinglist)){echo $packingInfo->remarks_pickupdate; } ?>" <?php echo($state); ?> >
																			</div>
																			<div class="col-md-2">
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-1">
																			</div>
																			<div class="col-md-3">
																				<label class="col-md-12 input-sm">S / No.:</label>
																			</div>
																			<div class="col-md-6">
																				<input id="txt_s_no" type="text" class="form-control input-sm" name="sno" maxlength="50" value="<?php if(isset($packinglist)){echo $packingInfo->remarks_s_no; } ?>" <?php echo($readonly); ?> >
																			</div>
																			<div class="col-md-2">
																			</div>
																		</div>
																	</div>
																	<label class="col-md-12 input-sm">Ship To:</label>
																	<div class="col-md-12">
																		<textarea id="txa_shipto" name="shipto" class="form-control input-sm" rows="6" maxlength="200" style="resize:none;" <?php echo($readonly); ?> ><?php if(isset($packinglist)){echo $packinglist[0]->ship_to; } ?></textarea>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<div class="row">
														<div class="col-md-12">
															<div class="form-group">
																<label class="col-md-12 input-sm">Description of Goods:</label>
																<div class="col-md-6">
																	<select id="ddl_shipinstruction" name="shipinstruction" class="form-control input-sm" <?php echo($state); ?> >
																		<option value="-1">N/A</option>
                                                  							<?php if(isset($descOfGoods)): ?>
																				<?php foreach($descOfGoods as $value): ?>
																					<option value="<?php echo e($value->id); ?>" 
																						<?php if(isset($packingInfo)){ if($packingInfo->description_of_goods == $value->id){ echo 'selected';}}?> >
																						<?php echo e($value->description); ?>

																					</option>
																				<?php endforeach; ?>
                                                  							<?php endif; ?>
																	</select>
																</div>
																<div class="col-md-1">
																</div>
																<label class="col-md-5 input-sm">Special Instruction / Shipping Instruction</label>
															</div>
														</div>
													</div>


													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label class="col-md-12 input-sm">Case Marks:</label>
																<div class="col-md-12">
																	<textarea id="txa_casemarks" name="casemarks" class="form-control input-sm" maxlength="200" style="resize:none;" rows="6" <?php echo($readonly); ?> ><?php if(isset($packinglist)){echo $packinglist[0]->case_marks; } ?></textarea>
																</div>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label class="col-md-12 input-sm">Note / Highlight:</label>
																<div class="col-md-12">
																	<textarea id="txa_note" name="note" class="form-control input-sm" maxlength="200" style="resize:none;" rows="6" <?php echo($readonly); ?> ><?php if(isset($packinglist)){echo $packinglist[0]->note; } ?></textarea>
																</div>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<div class="row">
																	<div class="col-md-3">
																		<label class="col-md-12 input-sm">From:</label>
																		<label class="col-md-12 input-sm">To:</label>
																		<label class="col-md-12 input-sm">Freight:</label>
																	</div>
																	<div class="col-md-9">
																		<label class="col-md-12 input-sm"><strong>PRICON</strong></label>
																		<div class="col-md-12">
																			<input id="txt_to" type="text" class="form-control input-sm" name="sno" maxlength="50" value="<?php if(isset($packinglist)){echo $packingInfo->to; } ?>" <?php echo($readonly); ?> >
																			<input id="txt_freight" type="text" class="form-control input-sm" name="sno" maxlength="50" value="<?php if(isset($packinglist)){echo $packingInfo->freight; } ?>" <?php echo($readonly); ?> >
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<div class="row">
														<div class="col-md-12">
															<a href="#" id="bu2" class="btn btn-primary pull-right input-sm" <?php echo($state); ?> >
																<i class="fa fa-cubes"></i>
																Packing List Details
															</a>
														</div>
													</div>

													<br/>

													<div class="row">
														<div class="col-md-12" style="width:1230px; height:300px; overflow:auto;">
															<table class="table table-striped table-bordered table-hover" id="tbl_viewtable" style="font-size:10px">
																<thead>
																	<tr>
																		<td>Box No</td>
																		<td>PO No.</td>
																		<td>Description / Model No.</td>
																		<td>Product Code</td>
																		<td>Quantity</td>
																		<td>Gross Weight</td>
																	</tr>
																</thead>
																<tbody id="view_tbl_body_row">
	                                                  				<?php if(isset($packingdetails)): ?>
																		<?php foreach($packingdetails as $details): ?>
																		<tr>
																			<td><?php echo e($details->box_no); ?></td>
																			<td><?php echo e($details->po); ?></td>
																			<td><?php echo e($details->description); ?></td>
																			<td><?php echo e($details->item_code); ?></td>
																			<td><?php echo e($details->qty); ?></td>
																			<td><?php echo e($details->gross_weight); ?></td>
																		</tr>
																		<?php endforeach; ?>
																	<?php endif; ?>
																</tbody>
															</table>
														</div>
													</div>
													<div class="row">
														<div class="col-md-12">
															<div class="btn-group">
																<div class="col-md-3" style="width:77.5px">
																	<button type="submit" onclick="javascript: save();" id="btn_save" class="btn btn-primary input-sm" <?php echo($state); ?> ><i class="fa fa-save"></i>Save</button>
																</div>
																<div class="col-md-9" style="width:240px">
																	<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/packinglistsystem-printpdf')); ?>" target="_blank">
																		<?php echo csrf_field(); ?>

                              											<input type="hidden" class="form-control input-sm" id="printid" name="id" value="<?php if(isset($packinglist)){echo $packingInfo->id; } ?>" />
																		<button type="submit" formtarget="_blank" id="btn_print" class="btn btn-success input-sm" <?php echo($state); ?> ><i class="fa fa-print"></i>Print</button>
																		<button type="submit" formtarget="_blank" id="btn_printout" class="btn btn-warning input-sm" <?php echo($state); ?> ><i class="fa fa-print"></i>Print out</button>
																	</form>
																</div>
															</div>
															<a href="<?php echo e(url('/packinglistsystem')); ?>" class="btn grey-gallery pull-right input-sm"><i class="glyphicon glyphicon-chevron-left"></i>Back</a>
														</div>
													</div>
												<!-- </form> -->
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

	<!-- MODAL -->
		<div id="bu2-orders" class="modal fade" role="dialog" data-backdrop="static">
			<div class="modal-dialog modal-xl gray-gallery">
				<div class="modal-content ">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
						<h4 class="modal-title">YPICS <?php if(isset($dbconnection)){echo $dbconnection; } ?> - Orders</h4>
					</div>

					<div class="modal-body">
						<form class="form-horizontal">
						<?php echo csrf_field(); ?>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<div class="col-md-10">
											<input id="txt_porder" type="text" class="form-control" name="search">
											<input id="txt_db" type="hidden" class="form-control" name="dbconnection" value="<?php if(isset($dbconnection)){echo $dbconnection; } ?>">
										</div>
										<div class="col-md-2">
											<button type="button" id="btn_search" onclick="javascript: getOrders(); " class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
										</div>
									</div>
								</div>
							</div>
						</form>

						<div class="row">
							<div class="col-md-12">
								<table class="table table-bordered table-responsive table-striped table-hover" id="sample_3">
									<thead>
										<tr>
											<td>PO</td>
											<td>Description</td>
											<td>Product Code</td>
											<td>Price</td>
											<td visible="false">Qty</td>
										</tr>
									</thead>
									<tbody id="srch_tbl_body" >
									</tbody>
								</table>
							</div>
						</div>

						<div class="row"  style="width:1500px; height:500px; overflow:auto;">
							<div class="col-md-12 table-responsive">
								<div class="portlet box">
									<div class="portlet-body">
										<table class="table table-striped table-hover table-bordered" id="tbl_editable">
											<!-- to manipulate data edit this script assets/admin/pages/scripts/table-editable.js -->
											<thead id="edit_tbl_body">
												<tr>
													<td>Box No</td>
													<td>PO No.</td>
													<td>Description / Model No.</td>
													<td>Product Code</td>
													<td>Quantity</td>
													<td>Gross Weight</td>
													<!-- <td>Edit</td> -->
													<td>Remove</td>
												</tr>
											</thead>
											<tbody id="edit_tbl_body_row">
												<?php $ctr=0;?>
	                                            <?php if(isset($packingdetails)): ?>
													<?php foreach($packingdetails as $details): ?>
													<tr id="tr<?php echo $ctr; ?>" >
														<td><input id="boxno" type="text" class="form-control" name="boxno" value="<?php echo $details->box_no ?>" <?php echo($readonly); ?> ></td>
														<td id="pono"><?php echo e($details->po); ?></td>
														<td id="desc"><?php echo e($details->description); ?></td>
														<td><input id="prodcode" type="text" class="form-control" name="boxno" value="<?php echo $details->item_code ?>" <?php echo($readonly); ?> ></td>
														<td><input id="qty" type="text" class="form-control" name="boxno" value="<?php echo $details->qty ?>" <?php echo($readonly); ?>></td>
														<td><input id="gross" type="text" class="form-control" name="boxno" value="<?php echo $details->gross_weight ?>" <?php echo($readonly); ?> ></td>
														<!-- <td><a href="#" onclick="edit('+ trcnt +');" value="'+ trcnt +'">Edit</a></td> -->
														<td><a href="#" onclick="del('<?php echo $ctr; ?>');" value="<?php echo $ctr; ?>" <?php echo($state); ?> >Remove</a></td>
													</tr>
													<?php $ctr++; ?>
													<?php endforeach; ?>
												<?php endif; ?>
											</tbody>
										</table>
                              				<input type="hidden" class="form-control" id="trcnt" name="trcnt" value="<?php echo $ctr;?>" />
									</div>
								</div>
							</div>
						</div>

					</div>

					<div class="modal-footer">
						<div class="row">
							<div class="col-md-12">
								<button data-dismiss="modal" class="btn grey-gallery pull-right"><i class="fa fa-close"></i>Cancel</button>
								<button onclick="javascript: reflect();" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>Add to Details</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$( document ).ready(function() {
			$('#bu2').on('click',function(){
				$('#bu2-orders').modal('show');
			});
		});
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>