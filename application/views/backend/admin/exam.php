<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('exam_list');?>
                </a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_exam');?>
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
                        <th><div><?php echo get_phrase('exam_name');?></div></th>
                        <th><div><?php echo get_phrase('date');?></div></th>
                        <th><div><?php echo get_phrase('time');?></div></th>
                        <th><div><?php echo get_phrase('subject');?></div></th>
                        <th><div><?php echo get_phrase('class');?></div></th>
                        <th><div><?php echo get_phrase('invisilator');?></div></th>
                        <th><div><?php echo get_phrase('comment');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($exams as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['date'];?></td>
                            <td><?php echo $row['time'];?></td>
                            <td><?php echo $row['subject_id'];?></td>
                            <td><?php echo $row['class_id'];?></td>
                            <td><?php echo $row['invisilator_id'];?></td>
                            <td><?php echo $row['comment'];?></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                        <!-- EDITING LINK -->
                                        <li>
                                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_exam/<?php echo $row['exam_id'];?>');">
                                                <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                            </a>
                                        </li>
                                        <li class="divider"></li>

                                        <!-- DELETION LINK -->
                                        <li>
                                            <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/exam/delete/<?php echo $row['exam_id'];?>');">
                                                <i class="entypo-trash"></i>
                                                <?php echo get_phrase('delete');?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <!----TABLE LISTING ENDS--->


            <!----CREATION FORM STARTS---->
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open(base_url() . 'index.php?admin/exam/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('subject');?></label>
                            <div class="col-sm-5">
                                <select name="subject_id" class="form-control select2" style="width:100%;" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>>
                                    <?php
                                    $subjects = $this->db->get('subject')->result_array();?>
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    foreach($subjects as $row):
                                        ?>

                                        <option value="<?php echo $row['subject_id'];?>"><?php echo $row['name'];?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('class');?></label>
                            <div class="col-sm-5">
                                <select name="class_id" class="form-control select2" style="width:100%;" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>>
                                    <?php
                                    $classes = $this->db->get('class')->result_array();?>
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    foreach($classes as $row):
                                        ?>

                                        <option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('date');?></label>
                            <div class="col-sm-5">
                                <input type="date" class="form-control" name="date" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('time');?></label>
                            <div class="col-sm-5">
                                <input type="time" class="form-control" name="time" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('invisilator');?></label>
                            <div class="col-sm-5">
                                <select name="invisilator_id" class="form-control select2" style="width:100%;" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>>
                                    <?php
                                    $teachers = $this->db->get('teacher')->result_array();?>
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    foreach($teachers as $row):
                                        ?>

                                        <option value="<?php echo $row['teacher_id'];?>"><?php echo $row['name'];?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('comment');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="comment"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('add_exam');?></button>
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