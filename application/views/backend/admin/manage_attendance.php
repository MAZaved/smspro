<div class="row">
    <div class="col-md-12">
<br/>
<br/>
        <?php echo form_open(base_url('index.php?admin/test_attendance'), 'method="post", role="form"') ?>
<table class="table table-bordered">
    <thead>
    <tr>

        <th><div><?php echo get_phrase('select date'); ?></div></th>
        <th><div><?php echo get_phrase('select class'); ?></div></th>
        <th><div><?php echo get_phrase('select class'); ?></div></th>
        <th><div><?php echo get_phrase('select class'); ?></div></th>
        <th><div><?php echo get_phrase('options'); ?></div></th>

    </tr>
    </thead>
    <tbody>

    <tr>
        <td>
            <select name="date" class="form-control select2-arrow"  style="width: 100%">
                <option value=""><?php echo get_phrase('select'); ?></option>
                <?php

                for ($count=1;$count<32;$count++){
                    ?>
                    <option value="<?php echo $count; ?>"><?php echo $count; ?></option>
                    <?php
                }
                ?>
            </select>
        </td>
        <td>
            <select name="month" class="form-control select2-arrow" style="width: 100%">
                <option value="1"><?php echo get_phrase('january'); ?></option>
                <option value="2"><?php echo get_phrase('february'); ?></option>
                <option value="3"><?php echo get_phrase('march'); ?></option>
                <option value="4"><?php echo get_phrase('april'); ?></option>
                <option value="5"><?php echo get_phrase('may'); ?></option>
                <option value="6"><?php echo get_phrase('june'); ?></option>
                <option value="7"><?php echo get_phrase('july'); ?></option>
                <option value="8"><?php echo get_phrase('august'); ?></option>
                <option value="9"><?php echo get_phrase('september'); ?></option>
                <option value="10"><?php echo get_phrase('october'); ?></option>
                <option value="11"><?php echo get_phrase('november'); ?></option>
                <option value="12"><?php echo get_phrase('december'); ?></option>
            </select>
        </td>
        <td>
            <select name="year" class="form-control select2-arrow"  style="width: 100%">
                <option value=""><?php echo get_phrase('select'); ?></option>
                <?php

                for ($count=2014;$count<2099;$count++){
                    ?>
                    <option value="<?php echo $count; ?>"><?php echo $count; ?></option>
                    <?php
                }
                ?>
            </select>
        </td>

    <!--        <td>-->
    <!--            <input type="date" class="datepicker" name="date" id="datep"/>-->
    <!--        </td>-->

        <td>
            <select name="class_id" class="form-control select2-arrow" style="width: 100%">
                <option value=""><?php echo get_phrase('select'); ?></option>
                <?php
                $class = $this->db->get('class')->result_array();
                foreach ($class as $row):
                    ?>
                    <option value="<?php echo $row['class_id']; ?>"><?php echo $row['name']; ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </td>
        <td>
            <button type="submit" class="btn btn-info"><?php echo get_phrase('search'); ?></button>
        </td>


    </tr>

    </tbody>



    </form>
</table>
        <br>
        <br>
        <br>
        <div
        <?php  (count($attendance_data) < 1)?'<tr><td style="text-align:center;" colspan="4">'."No Record Found!".'</td></tr>':''?>
        <?php ($term && count($attendance_data)>1) ? '<tr><td style="text-align:center;" colspan="4">'."Total Record Found: ". $total .'</td></tr>':''?>
        </div>
        <div>
            <table class="table table-bordered datatable" id="table_export">
                <?php echo form_open(base_url('index.php?admin/save_marks'), 'method="post", role="form"') ?>

                <thead>

                <tr>

                    <th><div><?php echo get_phrase('Student Name'); ?></div></th>
                    <th><div><?php echo get_phrase('select date'); ?></div></th>
                    <th><div><?php echo get_phrase('select date'); ?></div></th>

                    <th><button type="submit" class="btn btn-info"><?php echo get_phrase('Save Marks'); ?></button></th>



                </tr>
                </thead>
                <tbody>

                <?php  (count($attendance_data) < 1)?'<tr><td style="text-align:center;" colspan="4">'."No Record Found!".'</td></tr>':''?>
                <?php ($term && count($attendance_data)>1) ? '<tr><td style="text-align:center;" colspan="4">'."Total Record Found: ". $total .'</td></tr>':''?>
                <?php if($attendance_data!=null){?>
                <?php foreach ($attendance_data as $att):?>


                    <tr>
                        <td><?php echo $att->student_id; ?></td>
                        <td><?php echo $att->class_id; ?></td>
                        <td>
                            <input type="radio" name="option" id="1" value="Present" <?php if($att->status==1)echo "checked";else echo "uncheck"?> />Present<br>
                            <input type="radio" name="option" id="2" value="Absent" <?php if($att->status==2)echo "checked";else echo "uncheck"?>/>Absent<br>
                            <input type="radio" name="option" id="3" value="Undefined" <?php if($att->status==0)echo "checked";else echo "uncheck"?>/>Undefined<br>
                        </td>
                        <td><?php echo $att->class_id?></td>
                    </tr>
                <?php endforeach;}
                else{   echo "No Data Found";}?>
                </tbody>
                </form>
            </table>
        </div>


    </div>
</div>
