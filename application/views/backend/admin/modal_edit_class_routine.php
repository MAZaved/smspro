<?php
$data		=	$this->db->get_where('class_routine' , array('class_routine_id' => $param2) )->result_array();
foreach ( $data as $row) {
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        <i class="entypo-plus-circled"></i>
                        <?php echo get_phrase('edit_class_routine'); ?>
                    </div>
                </div>
                <div class="panel-body">

                    <?php echo form_open(base_url() . 'index.php?admin/test_class_routine/do_update/' . $row['class_routine_id'], array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top')); ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('day'); ?></label>
                        <div class="col-sm-5">
                            <select name="day" class="form-control select2-arrow" style="width: 100%">
                                <option value="<?php echo $row['day']; ?>"
                                        selected><?php echo get_phrase(''); ?></option>
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
                        <label class="col-sm-3 control-label"><?php echo get_phrase('subject_name'); ?></label>
                        <div class="col-sm-5">
                            <select name="time_start" class="form-control select2-arrow" style="width: 100%">
                                <option value="<?php echo $row['subject_id']; ?>"><?php echo get_phrase('select'); ?></option>
                                <?php
                                $subjects = $this->db->get('subject')->result_array();
                                foreach ($subjects as $row) {
                                    ?>
                                    <option value="<?php echo $row['subject_id']; ?>"><?php echo $row['name']; ?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('class_id'); ?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="class_id" value="<?php echo $edit_data['class_id']; ?>" placeholder="<?php /*echo $this->crud_model->get_class_name($class_id);*/?>" readonly/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('time_start_hour'); ?></label>
                        <div class="col-sm-5">
                            <select name="time_start" class="form-control select2-arrow" style="width: 100%">
                                <option value="<?php echo $row['time_start']; ?>"><?php echo get_phrase('select'); ?></option>
                                <?php

                                for ($count = 0; $count < 23; $count++) {
                                    ?>
                                    <option value="<?php echo $count; ?>"><?php echo $count; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('time_start_minute'); ?></label>
                        <div class="col-sm-5">
                            <select name="time_start_min" class="form-control select2-arrow" style="width: 100%">
                                <option value="<?php echo $row['time_start_min']; ?>"><?php echo get_phrase('select'); ?></option>
                                <?php

                                for ($count = 00; $count < 60; $count++) {
                                    ?>
                                    <option value="<?php echo $count; ?>"><?php echo $count; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('time_end_hour'); ?></label>
                        <div class="col-sm-5">
                            <select name="time_end" class="form-control select2-arrow" style="width: 100%">
                                <option value="<?php echo $row['time_end']; ?>"><?php echo get_phrase('select'); ?></option>
                                <?php

                                for ($count = 0; $count < 24; $count++) {
                                    ?>
                                    <option value="<?php echo $count; ?>"><?php echo $count; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('time_end_minute'); ?></label>
                        <div class="col-sm-5">
                            <select name="time_end_min" class="form-control select2-arrow"
                                    aria-valuenow="<?php echo $row['time_end_min'] ?>" style="width: 100%">
                                <option value="<?php echo $row['time_end_min']; ?>"><?php echo get_phrase('select'); ?></option>
                                <?php

                                for ($count = 0; $count < 60; $count++) {
                                    ?>
                                    <option value="<?php echo $count; ?>"><?php echo $count; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <input type="text" class="" value="<?php echo $edit_data['class_id']; ?>"></input>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('edit_class'); ?></button>
                        </div>
                    </div>
                    <?php echo $edit_data['class_id']; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php
}
?>


