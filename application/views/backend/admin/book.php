<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('book_list');?>
                </a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_book');?>
                </a></li>
            <li>
                <a href="#borrow" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('borrow_book');?>
                </a></li>
            <li>
                <a href="#borrow_history" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('borrow_history');?>
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
                        <th><div><?php echo get_phrase('book_name');?></div></th>
                        <th><div><?php echo get_phrase('author');?></div></th>
                        <th><div><?php echo get_phrase('Description');?></div></th>
                        <th><div><?php echo get_phrase('price');?></div></th>
                        <th><div><?php echo get_phrase('available');?></div></th>
                        <th><div><?php echo get_phrase('class');?></div></th>
                        <th><div><?php echo get_phrase('status');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($books as $row):
                        $class_id=$row['class_id'];
                        $c_name=  $this->db->get_where('class' , array('class_id' => $class_id))->result_array();

                        foreach ($c_name as $c)
                        {
                            $class_name=$c['name'];
                        }
                        ?>

                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['author'];?></td>
                            <td><?php echo $row['description'];?></td>
                            <td><?php echo $row['price'];?></td>
                            <td><?php echo $row['available'];?></td>
                            <td><?php echo $class_name;?></td>
                            <td><?php echo $row['status'];?></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                        <!-- EDITING LINK -->
                                        <li>
                                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_book/<?php echo $row['book_id'];?>');">
                                                <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                            </a>
                                        </li>
                                        <li class="divider"></li>

                                        <!-- DELETION LINK -->
                                        <li>
                                            <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/book/delete/<?php echo $row['book_id'];?>');">
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
                    <?php echo form_open(base_url() . 'index.php?admin/book/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('book_name');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('author');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="author" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="description" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('price');?></label>
                            <div class="col-sm-5">

                                <input type="number" class="form-control" name="price"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('class');?></label>
                            <div class="col-sm-5">
                                <select name="class_id" class="form-control">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $class = $this->db->get('class')->result_array();
                                    foreach($class as $row2):
                                        ?>
                                        <option value="<?php echo $row2['class_id'];?>"
                                            <?php if($row['class_id'] == $row2['class_id'])echo 'selected';?>>
                                            <?php echo $row2['name'];?>
                                        </option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('quantity');?></label>
                            <div class="col-sm-5">

                                <input type="text" class="form-control" name="available"  data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('status');?></label>
                            <div class="col-sm-5">

                                <input type="text" class="form-control" name="status"  />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('add_book');?></button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <!----CREATION FORM ENDS-->


        <!----BORROW FORM STARTS---->
            <div class="tab-pane box" id="borrow" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open(base_url() . 'index.php?admin/book/borrow/' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('student_id');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="student_id" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('book');?></label>
                            <div class="col-sm-5">
                                <select name="book_id" class="form-control">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $book = $this->db->get('book')->result_array();
                                    foreach($book as $row2):
                                        ?>
                                        <option value="<?php echo $row2['book_id'];?>">
                                            <?php echo $row2['name'];?>
                                        </option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>

                            </div>
                        </div>

                        <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('borrow_book');?></button>
                        </div>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
            <!----BORROW FORM ENDS-->

            <!----BORROW HISTORY FORM STARTS---->
            <div class="tab-pane box" id="borrow_history" style="padding: 5px">
                <table class="table table-bordered datatable" id="table_export">
                    <thead>
                    <tr>
                        <th><div>#</div></th>
                        <th><div><?php echo get_phrase('book_name');?></div></th>
                        <th><div><?php echo get_phrase('student_name');?></div></th>
                        <th><div><?php echo get_phrase('borrow_date');?></div></th>
                        <th><div><?php echo get_phrase('return_date');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($book_borrow as $row):
                        $book_id=$row['book_id'];
                        $book_name=  $this->db->get_where('book' , array('book_id' => $book_id))->result_array();

                        foreach ($book_name as $book)
                        {
                            $book_name=$book['name'];
                        }
                        $stud_id=$row['student_id'];
                        $student_name=  $this->db->get_where('student' , array('student_id' => $stud_id))->result_array();

                        foreach ($student_name as $students)
                        {
                            $stud_name=$students['name'];
                        }
                        ?>

                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo $book_name;?></td>
                            <td><?php echo $stud_name;?></td>
                            <td><?php echo $row['borrow_date'];?></td>
                            <td><?php echo $row['return_date'];?></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                        <!-- EDITING LINK -->
                                        <li>
                                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_book/<?php echo $row['book_id'];?>');">
                                                <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                            </a>
                                        </li>
                                        <li class="divider"></li>

                                        <!-- DELETION LINK -->
                                        <li>
                                            <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/book/delete/<?php echo $row['book_id'];?>');">
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
            <!----BORROW HISTORY FORM ENDS-->

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