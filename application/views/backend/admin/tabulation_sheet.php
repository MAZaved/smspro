<div class="row">
    <div class="col-md-12">
        <br/>
        <br/>
        <?php echo form_open(base_url('index.php?admin/search_tabulation/search'), 'method="post", role="form"') ?>
        <table class="table table-bordered">
            <thead>
            <tr>

                <th style="width: 40%"><div><?php echo get_phrase('student id'); ?></div></th>
                <th style="width: 40%"><div><?php echo get_phrase('select section'); ?></div></th>
                <th style="width: 20%"><div><?php echo get_phrase('select exam'); ?></div></th>
                <th style="width: 20%"><div><?php echo get_phrase('options'); ?></div></th>

            </tr>
            </thead>
            <tbody>

            <tr>

                <!--        <td>-->
                <!--            <input type="date" class="datepicker" name="date" id="datep"/>-->
                <!--        </td>-->

                <td>
                    <div class="form-group">
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="student_id"/>
                        </div>
                    </div>
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
                    <select name="exam_id" class="form-control select2-arrow" style="width: 100%">
                        <option value=""><?php echo get_phrase('select'); ?></option>
                        <?php
                        $exams = $this->db->get('exam')->result_array();
                        foreach ($exams as $row):
                            ?>
                            <option value="<?php echo $row['exam_id']; ?>"><?php echo $row['name']; ?></option>
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

        <div>
        <table class="table table-bordered datatable" id="table_export">
            <thead>
            <tr>
                <th><div><?php echo get_phrase('student_id');?></div></th>
                <th><div><?php echo get_phrase('subject_id');?></div></th>
                <th><div><?php echo get_phrase('mark Obtained');?></div></th>
            </tr>
            </thead>
            <tbody>
            <?php
            //print_r($tabulation);
           // foreach ($tabulation as $row){?>
                <tr>
                    <td><?php echo $row['student_id']; ?></td>
                    <td><?php echo $row['student_id']; ?></td>
                    <td><?php echo $row['student_id']; ?></td>

                </tr>
            </tbody>
        </table>
    </div>

        <?php //print_r($tabulation);?>

    </div>
</div>
</div>
