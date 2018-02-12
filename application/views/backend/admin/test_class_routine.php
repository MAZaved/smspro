<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('class_list');?>
                </a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_class');?>
                </a></li>
        </ul>
        <!------CONTROL TABS END------>

        <div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">

                <table class="table table-bordered datatable" id="table_export">
                    <thead>
                    <tr>
                        <th><div>#</div></th>
                        <th><div><?php echo get_phrase('sunday');?></div></th>
                        <th><div><?php echo get_phrase('monday');?></div></th>
                        <th><div><?php echo get_phrase('tuesday');?></div></th>
                        <th><div><?php echo get_phrase('wednesday');?></div></th>
                        <th><div><?php echo get_phrase('thursday');?></div></th>
                        <th><div><?php echo get_phrase('friday');?></div></th>
                        <th><div><?php echo get_phrase('satureday');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($test_class_routine as $row):
                        if($row['day']=='sunday'){ ?>
                    <tr>
                        <td><?php echo $row['day'];?></td>
                        <td><?php echo $row['subject_id'].'('.$row['time_start'].':'.$row['time_start_min'].'-'.$row['time_end'].':'.$row['time_end_min'].')';?>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle"
                                        data-toggle="dropdown">
                                     <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#"
                                           onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_class_routine/<?php echo $row['class_routine_id']; ?>');">
                                            <i class="entypo-pencil"></i>
                                            <?php echo get_phrase('edit'); ?>
                                        </a>
                                    </li>
                                    <li class="divider"></li>

                                    <!-- DELETION LINK -->
                                    <li>
                                        <a href="#"
                                           onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/test_class_routine/delete/<?php echo $row['class_routine_id']; ?>');">
                                            <i class="entypo-trash"></i>
                                            <?php echo get_phrase('delete'); ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        <?php } ?>
                    </tr>
                        <?php if($row['day']=='monday'){
                            ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><?php echo $row['subject_id'].'('.$row['time_start'].':'.$row['time_start_min'].'-'.$row['time_end'].':'.$row['time_end_min'].')';?>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle"
                                            data-toggle="dropdown">
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                        <!-- EDITING LINK -->
                                        <li>
                                            <a href="#"
                                               onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_class_routine/<?php echo $row['class_routine_id']; ?>');">
                                                <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit'); ?>
                                            </a>
                                        </li>
                                        <li class="divider"></li>

                                        <!-- DELETION LINK -->
                                        <li>
                                            <a href="#"
                                               onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/test_class_routine/delete/<?php echo $row['class_routine_id']; ?>');">
                                                <i class="entypo-trash"></i>
                                                <?php echo get_phrase('delete'); ?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    <?php } ?>
                        </tr>
                        <?php if($row['day']=='tuesday'){
                        ?>
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $row['subject_id'].'('.$row['time_start'].':'.$row['time_start_min'].'-'.$row['time_end'].':'.$row['time_end_min'].')';?>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle"
                                        data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#"
                                           onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_class_routine/<?php echo $row['class_routine_id']; ?>');">
                                            <i class="entypo-pencil"></i>
                                            <?php echo get_phrase('edit'); ?>
                                        </a>
                                    </li>
                                    <li class="divider"></li>

                                    <!-- DELETION LINK -->
                                    <li>
                                        <a href="#"
                                           onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/test_class_routine/delete/<?php echo $row['class_routine_id']; ?>');">
                                            <i class="entypo-trash"></i>
                                            <?php echo get_phrase('delete'); ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    <?php } ?>
                        </tr>
                        <?php if($row['day']=='wednesday'){
                        ?>
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $row['subject_id'].'('.$row['time_start'].':'.$row['time_start_min'].'-'.$row['time_end'].':'.$row['time_end_min'].')';?>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle"
                                        data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#"
                                           onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_class_routine/<?php echo $row['class_routine_id']; ?>');">
                                            <i class="entypo-pencil"></i>
                                            <?php echo get_phrase('edit'); ?>
                                        </a>
                                    </li>
                                    <li class="divider"></li>

                                    <!-- DELETION LINK -->
                                    <li>
                                        <a href="#"
                                           onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/test_class_routine/delete/<?php echo $row['class_routine_id']; ?>');">
                                            <i class="entypo-trash"></i>
                                            <?php echo get_phrase('delete'); ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    <?php } ?>
                        </tr>
                        <?php if($row['day']=='thursday'){
                        ?>
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $row['subject_id'].'('.$row['time_start'].':'.$row['time_start_min'].'-'.$row['time_end'].':'.$row['time_end_min'].')';?>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle"
                                        data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#"
                                           onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_class_routine/<?php echo $row['class_routine_id']; ?>');">
                                            <i class="entypo-pencil"></i>
                                            <?php echo get_phrase('edit'); ?>
                                        </a>
                                    </li>
                                    <li class="divider"></li>

                                    <!-- DELETION LINK -->
                                    <li>
                                        <a href="#"
                                           onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/test_class_routine/delete/<?php echo $row['class_routine_id']; ?>');">
                                            <i class="entypo-trash"></i>
                                            <?php echo get_phrase('delete'); ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </td>
                        <td></td>
                        <td></td>
                    <?php } ?>
                        </tr>
                        <?php if($row['day']=='friday'){
                        ?>
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $row['subject_id'].'('.$row['time_start'].':'.$row['time_start_min'].'-'.$row['time_end'].':'.$row['time_end_min'].')';?>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle"
                                        data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#"
                                           onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_class_routine/<?php echo $row['class_routine_id']; ?>');">
                                            <i class="entypo-pencil"></i>
                                            <?php echo get_phrase('edit'); ?>
                                        </a>
                                    </li>
                                    <li class="divider"></li>

                                    <!-- DELETION LINK -->
                                    <li>
                                        <a href="#"
                                           onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/test_class_routine/delete/<?php echo $row['class_routine_id']; ?>');">
                                            <i class="entypo-trash"></i>
                                            <?php echo get_phrase('delete'); ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </td>
                        <td></td>
                    <?php } ?>
                        </tr>
                        <?php endforeach;
                        foreach ($test_class_routine as $row):
                        if($row['day']=='satureday'){
                        ?>
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $row['subject_id'].'('.$row['time_start'].':'.$row['time_start_min'].'-'.$row['time_end'].':'.$row['time_end_min'].')';?>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle"
                                        data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#"
                                           onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_class_routine/<?php echo $row['class_routine_id']; ?>');">
                                            <i class="entypo-pencil"></i>
                                            <?php echo get_phrase('edit'); ?>
                                        </a>
                                    </li>
                                    <li class="divider"></li>

                                    <!-- DELETION LINK -->
                                    <li>
                                        <a href="#"
                                           onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/test_class_routine/delete/<?php echo $row['class_routine_id']; ?>');">
                                            <i class="entypo-trash"></i>
                                            <?php echo get_phrase('delete'); ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </td>
                    <?php } ?>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <!----TABLE LISTING ENDS--->


            <!----CREATION FORM STARTS---->
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open(base_url() . 'index.php?admin/test_class_routine/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('day');?></label>
                            <div class="col-sm-5">
                                <select name="day" class="form-control select2-arrow" style="width: 100%">
                                    <option value="" selected><?php echo get_phrase('select');?></option>
                                    <option value="saturday"><?php echo get_phrase('satureday'); ?></option>
                                    <option value="sunday"><?php echo get_phrase('sunday'); ?></option>
                                    <option value="monday"><?php echo get_phrase('monday'); ?></option>
                                    <option value="tuesday"><?php echo get_phrase('tuesday'); ?></option>
                                    <option value="wednesday"><?php echo get_phrase('wednesday'); ?></option>
                                    <option value="thursday"><?php echo get_phrase('thursday'); ?></option>
                                    <option value="friday"><?php echo get_phrase('friday'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('subject_name');?></label>
                            <!--                            <div class="col-sm-5">-->
                            <!--                                <input type="text" class="form-control" name="subject_id" value="1" data-validate="required" data-message-required="--><?php //echo get_phrase('value_required');?><!--"/>-->
                            <!--                            </div>-->
                            <div class="col-sm-5">
                                <select name="subject_id" class="form-control select2-arrow"  style="width: 100%">
                                    <option value=""><?php echo get_phrase('select'); ?></option>
                                    <?php
                                    $subjects = $this->db->get('subject')->result_array();
                                    foreach ($subjects as $row)
                                    {?>
                                        <option value="<?php echo $row['subject_id'];?>"><?php echo $row['name'];?></option>

                                    <?php   }   ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('teacher_name');?></label>
                            <!--                            <div class="col-sm-5">-->
                            <!--                                <input type="text" class="form-control" name="subject_id" value="1" data-validate="required" data-message-required="--><?php //echo get_phrase('value_required');?><!--"/>-->
                            <!--                            </div>-->
                            <div class="col-sm-5">
                                <select name="teacher_id" class="form-control select2-arrow"  style="width: 100%">
                                    <option value=""><?php echo get_phrase('select'); ?></option>
                                    <?php
                                    $teachers = $this->db->get('teacher')->result_array();
                                    foreach ($teachers as $row)
                                    {?>
                                        <option value="<?php echo $row['teacher_id'];?>"><?php echo $row['name'];?></option>

                                    <?php   }   ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('class_id');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="class_id" value="<?php echo $class_id?>" placeholder="<?php echo $this->crud_model->get_class_name($class_id);?>" readonly data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('time_start_hour');?></label>
                            <div class="col-sm-5">
                                <select name="time_start" class="form-control select2-arrow"  style="width: 100%">
                                    <option value=""><?php echo get_phrase('select'); ?></option>
                                    <?php

                                    for ($count=0;$count<23;$count++){
                                        ?>
                                        <option value="<?php echo $count; ?>"><?php echo $count; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('time_start_minute');?></label>
                            <div class="col-sm-5">
                                <select name="time_start_min" class="form-control select2-arrow"  style="width: 100%">
                                    <option value=""><?php echo get_phrase('select'); ?></option>
                                    <?php

                                    for ($count=00;$count<60;$count++){
                                        ?>
                                        <option value="<?php echo $count; ?>"><?php echo $count; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('time_end_hour');?></label>
                            <div class="col-sm-5">
                                <select name="time_end" class="form-control select2-arrow"  style="width: 100%">
                                    <option value=""><?php echo get_phrase('select'); ?></option>
                                    <?php

                                    for ($count=0;$count<24;$count++){
                                        ?>
                                        <option value="<?php echo $count; ?>"><?php echo $count; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('time_end_minute');?></label>
                            <div class="col-sm-5">
                                <select name="time_end_min" class="form-control select2-arrow"  style="width: 100%">
                                    <option value=""><?php echo get_phrase('select'); ?></option>
                                    <?php

                                    for ($count=0;$count<60;$count++){
                                        ?>
                                        <option value="<?php echo $count; ?>"><?php echo $count; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('add_class_routine');?></button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

            <!----CREATION FORM ENDS-->
        </div>
    </div>
</div>



<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->
<script type="text/javascript">

    jQuery(document).ready(function($)
    {


        var datatable = $("#table_export").dataTable();

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });

</script>