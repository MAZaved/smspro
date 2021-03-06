<?php
if (!$code) {
    $code = '';
} else {
    $code = '/' . $code;
}

function sort_url($lang, $by, $sort, $sorder, $code) {
    if ($sort == $by) {
        if ($sorder == 'asc') {
            $sort = 'desc';
            $icon = ' <i class="icon-chevron-up"></i>';
        } else {
            $sort = 'asc';
            $icon = ' <i class="icon-chevron-down"></i>';
        }
    } else {
        $sort = 'asc';
        $icon = '';
    }


    $return = base_url('index.php?admin/marks/' . $by . '/' . $sort . '/' . $code);

    echo '<a href="' . $return . '">' . $lang . $icon . '</a>';
}
?>


<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('exam_list'); ?>
                </a>
            </li>
        </ul>
        <!------CONTROL TABS END------>


        <?php echo form_open(base_url('index.php?admin/marks'), 'method="post", role="form"') ?>


        <table class="table table-bordered">
            <thead>
            <tr>

                <th><div><?php echo get_phrase('select exam'); ?></div></th>
                <th><div><?php echo get_phrase('select class'); ?></div></th>
                <th><div><?php echo get_phrase('selecet section'); ?></div></th>
                <th><div><?php echo get_phrase('selecet subject'); ?></div></th>
                <th><div><?php echo get_phrase('options'); ?></div></th>

            </tr>
            </thead>
            <tbody>

            <tr>
                <td>
                    <select name="exam_id" class="form-control select2-arrow" style="width: 100%">
                        <option value=""><?php echo get_phrase('select'); ?></option>
                        <?php
                        $exam = $this->db->get('exam')->result_array();
                        foreach ($exam as $row):
                            ?>

                            <option value="<?php echo $row['exam_id']; ?>"><?php echo $row['name']; ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </td>
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
                    <select name="section_id" class="form-control select2-arrow" style="width: 100%">
                        <option value=""><?php echo get_phrase('select'); ?></option>
                        <?php
                        $section = $this->db->get('section')->result_array();
                        foreach ($section as $row):
                            ?>
                            <option value="<?php echo $row['section_id']; ?>"><?php echo $row['name']; ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </td>
                <td>
                    <select name="subject_id" class="form-control select2-arrow" style="width: 100%">
                        <option value=""><?php echo get_phrase('select'); ?></option>
                        <?php
                        $subject = $this->db->get('subject')->result_array();
                        foreach ($subject as $row):
                            ?>
                            <option value="<?php echo $row['subject_id']; ?>"><?php echo $row['name']; ?></option>
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
        <!----TABLE LISTING ENDS--->

        <div>
            <table class="table table-bordered datatable" id="table_export">
                <?php echo form_open(base_url('index.php?admin/save_marks'), 'method="post", role="form"') ?>

                <thead>

                <tr>

                    <th><?php echo sort_url(get_phrase('student name'),'exam_id', $sort_by, $sort_order, $code); ?></th>
                    <th><?php echo sort_url(get_phrase('class name'),'exam_id', $sort_by, $sort_order, $code); ?></th>
                    <th><?php echo sort_url(get_phrase('mark obtained'),'class_id', $sort_by, $sort_order, $code); ?></th>
                    <th><?php echo sort_url( get_phrase('select comment'),'comment', $sort_by, $sort_order, $code); ?></th>
                    <th><button type="submit" class="btn btn-info"><?php echo get_phrase('Save Marks'); ?></button></th>



                </tr>
                </thead>
                <tbody>

                <?php  (count($mark_data) < 1)?'<tr><td style="text-align:center;" colspan="4">'."No Record Found!".'</td></tr>':''?>
                <?php ($term && count($mark_data)>1) ? '<tr><td style="text-align:center;" colspan="4">'."Total Record Found: ". $total .'</td></tr>':''?>

                <?php foreach ($mark_data as $mark): ?>

                    <tr>

                        <td><?php echo $mark->name; ?></td>
                        <td><?php echo $mark->class_name; ?></td>
                        <td><input type="number" name="mark[<?php echo $mark->mark_id ; ?>]['mark_obtained']" value="<?php echo $mark->mark_obtained;?>" ></td>
                        <td><input type="text" name="comment" value="<?php echo $mark->comment; ?>"></td>

                    </tr>
                <?php endforeach; ?>
                </tbody>
                </form>
            </table>
        </div>
    </div>
</div>

