<!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
            <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
            <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
            <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <ul class="page-sidebar-menu page-sidebar-menu-light page-sidebar-menu-hover-submenu page-sidebar-menu-closed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                <li class="sidebar-toggler-wrapper">
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <div class="sidebar-toggler"></div>
                    <!-- END SIDEBAR TOGGLER BUTTON -->
                </li>
                <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                <li class="sidebar-search-wrapper"></li>
                <?php /* <li class="start active open">
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
                </li> */ ?>
                <li>
                    <a href="javascript:;">
                    <i class="fa fa-folder-open-o"></i>
                    <span class="title">Master Management</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
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

                <li>
                    <a href="javascript:;">
                    <i class="fa fa-refresh"></i>
                    <span class="title">Subsystems</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
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
                            
                            <?php elseif($access->program_code == "3028"): ?>
                                <?php $url = "/packinglistsystem"; $icon = "fa fa-bars"; ?>
                                <?php if($access->read_write != "0"): ?>
                                <li>
                                    <a href="<?php echo e(url($url)); ?>"><i class="<?php echo e($icon); ?>" ></i> <?php echo e($access->program_name); ?></a>
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

                <?php $url = ""; $icon = ""; ?>
                <?php foreach($userProgramAccess as $access): ?>
                    <?php if($access->program_code == "SSS"): ?>
                        <?php $url = ""; $icon = "fa fa-calendar"; ?>
                        <?php if($access->read_write != "0"): ?>
                            <li>
                                <a href="javascript:;" ><i class="<?php echo e($icon); ?>" ></i> <span class="title"><?php echo e($access->program_name); ?></span><span class="arrow "></span></a>
                                <ul class="sub-menu">
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
                    <?php endif; ?>
                <?php endforeach; ?>

                <?php $url = ""; $icon = ""; ?>
                <?php foreach($userProgramAccess as $access): ?>
                    <?php if($access->program_code == "WBS"): ?>
                        <?php $url = ""; $icon = "fa fa-cube"; ?>
                        <?php if($access->read_write != "0"): ?>
                            <li>
                                <a href="javascript:;" ><i class="<?php echo e($icon); ?>" ></i> <span class="title"><?php echo e($access->program_name); ?></span><span class="arrow "></span></a>
                                <ul class="sub-menu">
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
                    <?php endif; ?>
                <?php endforeach; ?>

                <?php $url = ""; $icon = ""; ?>
                <?php foreach($userProgramAccess as $access): ?>
                    <?php if($access->program_code == "QCDB"): ?>
                        <?php $url = ""; $icon = "fa fa-search"; ?>
                        <?php if($access->read_write != "0"): ?>
                            <li>
                                <a href="javascript:;" ><i class="<?php echo e($icon); ?>" ></i> <span class="title"><?php echo e($access->program_name); ?></span><span class="arrow "></span></a>
                                <ul class="sub-menu">
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
                    <?php endif; ?>
                <?php endforeach; ?>

                <?php $url = ""; $icon = ""; ?>
                <?php foreach($userProgramAccess as $access): ?>
                    <?php if($access->program_code == "QCMLD"): ?>
                        <?php $url = ""; $icon = "fa fa-search"; ?>
                        <?php if($access->read_write != "0"): ?>
                            <li>
                                <a href="javascript:;" ><i class="<?php echo e($icon); ?>" ></i> <span class="title"><?php echo e($access->program_name); ?></span><span class="arrow "></span></a>
                                <ul class="sub-menu">
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
                    <?php endif; ?>
                <?php endforeach; ?>


                <li>
                    <a href="javascript:;">
                    <i class="fa fa-folder-open-o"></i>
                    <span class="title">Security Management</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
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
                
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
    </div>
<!-- END SIDEBAR -->