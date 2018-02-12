<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Search_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function record_term($term)
    {
        $code = md5($term);
        $this->db->where('code', $code);
        $exists = $this->db->count_all_results('search_control');
        if ($exists < 1) {
            $this->db->insert('search_control', array('code' => $code, 'term' => $term));
        }
        return $code;
    }

    function get_term($code)
    {
        $this->db->select('term');
        $result = $this->db->get_where('search_control', array('code' => $code));
        $result = $result->row();
        return $result->term;
    }

    function clear_cache()
    {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    function get_type_name_by_id($type, $type_id = '', $field = 'name')
    {
        return $this->db->get_where($type, array($type . '_id' => $type_id))->row()->$field;
    }

    ////////STUDENT/////////////
    function get_students($class_id)
    {
        $query = $this->db->get_where('student', array('class_id' => $class_id));
        return $query->result_array();
    }

    function get_student_info($student_id)
    {
        $query = $this->db->get_where('student', array('student_id' => $student_id));
        return $query->result_array();
    }

    /////////TEACHER/////////////
    function get_teachers()
    {
        $query = $this->db->get('teacher');
        return $query->result_array();
    }

    function get_teacher_name($teacher_id)
    {
        $query = $this->db->get_where('teacher', array('teacher_id' => $teacher_id));
        $res = $query->result_array();
        foreach ($res as $row)
            return $row['name'];
    }

    function get_teacher_info($teacher_id)
    {
        $query = $this->db->get_where('teacher', array('teacher_id' => $teacher_id));
        return $query->result_array();
    }

    //////////SUBJECT/////////////
    function get_subjects()
    {
        $query = $this->db->get('subject');
        return $query->result_array();
    }

    function get_subject_info($subject_id)
    {
        $query = $this->db->get_where('subject', array('subject_id' => $subject_id));
        return $query->result_array();
    }

    function get_subjects_by_class($class_id)
    {
        $query = $this->db->get_where('subject', array('class_id' => $class_id));
        return $query->result_array();
    }

    function get_subject_name_by_id($subject_id)
    {
        $query = $this->db->get_where('subject', array('subject_id' => $subject_id))->row();
        return $query->name;
    }

    ////////////CLASS///////////
    function get_class_name($class_id)
    {
        $query = $this->db->get_where('class', array('class_id' => $class_id));
        $res = $query->result_array();
        foreach ($res as $row)
            return $row['name'];
    }

    function get_class_name_numeric($class_id)
    {
        $query = $this->db->get_where('class', array('class_id' => $class_id));
        $res = $query->result_array();
        foreach ($res as $row)
            return $row['name_numeric'];
    }

    function get_classes()
    {
        $query = $this->db->get('class');
        return $query->result_array();
    }

    function get_class_info($class_id)
    {
        $query = $this->db->get_where('class', array('class_id' => $class_id));
        return $query->result_array();
    }

    //////////EXAMS/////////////
    function get_exams()
    {
        $query = $this->db->get('exam');
        return $query->result_array();
    }

    function get_exam_info($exam_id)
    {
        $query = $this->db->get_where('exam', array('exam_id' => $exam_id));
        return $query->result_array();
    }

    //////////GRADES/////////////
    function get_grades()
    {
        $query = $this->db->get('grade');
        return $query->result_array();
    }

    function get_grade_info($grade_id)
    {
        $query = $this->db->get_where('grade', array('grade_id' => $grade_id));
        return $query->result_array();
    }

    function get_obtained_marks($exam_id, $class_id, $subject_id, $student_id)
    {
        $marks = $this->db->get_where('mark', array(
            'subject_id' => $subject_id,
            'exam_id' => $exam_id,
            'class_id' => $class_id,
            'student_id' => $student_id))->result_array();

        foreach ($marks as $row) {
            echo $row['mark_obtained'];
        }
    }

    function get_highest_marks($exam_id, $class_id, $subject_id)
    {
        $this->db->where('exam_id', $exam_id);
        $this->db->where('class_id', $class_id);
        $this->db->where('subject_id', $subject_id);
        $this->db->select_max('mark_obtained');
        $highest_marks = $this->db->get('mark')->result_array();
        foreach ($highest_marks as $row) {
            echo $row['mark_obtained'];
        }
    }

    function get_grade($mark_obtained)
    {
        $query = $this->db->get('grade');
        $grades = $query->result_array();
        foreach ($grades as $row) {
            if ($mark_obtained >= $row['mark_from'] && $mark_obtained <= $row['mark_upto'])
                return $row;
        }
    }

    function create_log($data)
    {
        $data['timestamp'] = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));
        $data['ip'] = $_SERVER["REMOTE_ADDR"];
        $location = new SimpleXMLElement(file_get_contents('http://freegeoip.net/xml/' . $_SERVER["REMOTE_ADDR"]));
        $data['location'] = $location->City . ' , ' . $location->CountryName;
        $this->db->insert('log', $data);
    }

    function get_system_settings()
    {
        $query = $this->db->get('settings');
        return $query->result_array();
    }

    ////////BACKUP RESTORE/////////
    function create_backup($type)
    {
        $this->load->dbutil();


        $options = array(
            'format' => 'txt', // gzip, zip, txt
            'add_drop' => TRUE, // Whether to add DROP TABLE statements to backup file
            'add_insert' => TRUE, // Whether to add INSERT data to backup file
            'newline' => "\n"               // Newline character used in backup file
        );


        if ($type == 'all') {
            $tables = array('');
            $file_name = 'system_backup';
        } else {
            $tables = array('tables' => array($type));
            $file_name = 'backup_' . $type;
        }

        $backup = &$this->dbutil->backup(array_merge($options, $tables));


        $this->load->helper('download');
        force_download($file_name . '.sql', $backup);
    }

    /////////RESTORE TOTAL DB/ DB TABLE FROM UPLOADED BACKUP SQL FILE//////////
    function restore_backup()
    {
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/backup.sql');
        $this->load->dbutil();


        $prefs = array(
            'filepath' => 'uploads/backup.sql',
            'delete_after_upload' => TRUE,
            'delimiter' => ';'
        );
        $restore = &$this->dbutil->restore($prefs);
        unlink($prefs['filepath']);
    }

    /////////DELETE DATA FROM TABLES///////////////
    function truncate($type)
    {
        if ($type == 'all') {
            $this->db->truncate('student');
            $this->db->truncate('mark');
            $this->db->truncate('teacher');
            $this->db->truncate('subject');
            $this->db->truncate('class');
            $this->db->truncate('exam');
            $this->db->truncate('grade');
        } else {
            $this->db->truncate($type);
        }
    }

    ////////IMAGE URL//////////
    function get_image_url($type = '', $id = '')
    {
        if (file_exists('uploads/' . $type . '_image/' . $id . '.jpg'))
            $image_url = base_url() . 'uploads/' . $type . '_image/' . $id . '.jpg';
        else
            $image_url = base_url() . 'uploads/user.jpg';

        return $image_url;
    }

    ////////STUDY MATERIAL//////////
    function save_study_material_info()
    {
        $data['timestamp'] = strtotime($this->input->post('timestamp'));
        $data['title'] = $this->input->post('title');
        $data['description'] = $this->input->post('description');
        $data['file_name'] = $_FILES["file_name"]["name"];
        $data['file_type'] = $this->input->post('file_type');
        $data['class_id'] = $this->input->post('class_id');

        $this->db->insert('document', $data);

        $document_id = $this->db->insert_id();
        move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/document/" . $_FILES["file_name"]["name"]);
    }

    function select_study_material_info()
    {
        $this->db->order_by("timestamp", "desc");
        return $this->db->get('document')->result_array();
    }

    function select_study_material_info_for_student()
    {
        $student_id = $this->session->userdata('student_id');
        $class_id = $this->db->get_where('student', array('student_id' => $student_id))->row()->class_id;
        $this->db->order_by("timestamp", "desc");
        return $this->db->get_where('document', array('class_id' => $class_id))->result_array();
    }

    function update_study_material_info($document_id)
    {
        $data['timestamp'] = strtotime($this->input->post('timestamp'));
        $data['title'] = $this->input->post('title');
        $data['description'] = $this->input->post('description');
        $data['class_id'] = $this->input->post('class_id');

        $this->db->where('document_id', $document_id);
        $this->db->update('document', $data);
    }

    function delete_study_material_info($document_id)
    {
        $this->db->where('document_id', $document_id);
        $this->db->delete('document');
    }

    ////////private message//////
    function send_new_private_message()
    {
        $message = $this->input->post('message');
        $timestamp = strtotime(date("Y-m-d H:i:s"));

        $reciever = $this->input->post('reciever');
        $sender = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');

        //check if the thread between those 2 users exists, if not create new thread
        $num1 = $this->db->get_where('message_thread', array('sender' => $sender, 'reciever' => $reciever))->num_rows();
        $num2 = $this->db->get_where('message_thread', array('sender' => $reciever, 'reciever' => $sender))->num_rows();

        if ($num1 == 0 && $num2 == 0) {
            $message_thread_code = substr(md5(rand(100000000, 20000000000)), 0, 15);
            $data_message_thread['message_thread_code'] = $message_thread_code;
            $data_message_thread['sender'] = $sender;
            $data_message_thread['reciever'] = $reciever;
            $this->db->insert('message_thread', $data_message_thread);
        }
        if ($num1 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $sender, 'reciever' => $reciever))->row()->message_thread_code;
        if ($num2 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $reciever, 'reciever' => $sender))->row()->message_thread_code;


        $data_message['message_thread_code'] = $message_thread_code;
        $data_message['message'] = $message;
        $data_message['sender'] = $sender;
        $data_message['timestamp'] = $timestamp;
        $this->db->insert('message', $data_message);

        // notify email to email reciever
        //$this->email_model->notify_email('new_message_notification', $this->db->insert_id());

        return $message_thread_code;
    }

    function send_reply_message($message_thread_code)
    {
        $message = $this->input->post('message');
        $timestamp = strtotime(date("Y-m-d H:i:s"));
        $sender = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');


        $data_message['message_thread_code'] = $message_thread_code;
        $data_message['message'] = $message;
        $data_message['sender'] = $sender;
        $data_message['timestamp'] = $timestamp;
        $this->db->insert('message', $data_message);

        // notify email to email reciever
        //$this->email_model->notify_email('new_message_notification', $this->db->insert_id());
    }

    function mark_thread_messages_read($message_thread_code)
    {
        // mark read only the oponnent messages of this thread, not currently logged in user's sent messages
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $this->db->where('sender !=', $current_user);
        $this->db->where('message_thread_code', $message_thread_code);
        $this->db->update('message', array('read_status' => 1));
    }

    function count_unread_message_of_thread($message_thread_code)
    {
        $unread_message_counter = 0;
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $messages = $this->db->get_where('message', array('message_thread_code' => $message_thread_code))->result_array();
        foreach ($messages as $row) {
            if ($row['sender'] != $current_user && $row['read_status'] == '0')
                $unread_message_counter++;
        }
        return $unread_message_counter;
    }

    function get_marks($search = false, $sort_by = '', $sort_order = 'DESC', $limit = 0, $offset = 0)
    {

        if ($search) {
            if (!empty($search->term)) {
                //support multiple words
                $term = explode(' ', $search->term);

                foreach ($term as $t) {
                    $not = '';
                    $operator = 'OR';
                    if (substr($t, 0, 1) == '-') {
                        $not = 'NOT ';
                        $operator = 'AND';
                        //trim the - sign off
                        $t = substr($t, 1, strlen($t));
                    }

                    $like = '';
                    $like .= "( `comment` " . $not . "LIKE '%" . $t . "%' )";

                    $this->db->where($like);
                }
            }

            if (!empty($search->class_id)) {
                $this->db->where('class_id >=', $search->class_id);
            }
            if (!empty($search->subject_id)) {
                $this->db->where('subject_id >=', $search->subject_id);
            }

            if (!empty($search->exam_id)) {
                $this->db->where('exam_id >=', $search->exam_id);
            }


        }


        if ($limit > 0) {
            $this->db->limit($limit, $offset);
        }
        if (!empty($sort_by)) {
            $this->db->order_by($sort_by, $sort_order);
        }
        $this->db->join('student t', 't.class_id=m.class_id');
        $this->db->join('class c', 'c.class_id=m.class_id');


        $this->db->select('t.name,c.name class_name,m.*');
        return $this->db->get('mark m')->result();

    }

    function get_marks_count($search = false)
    {


        if ($search) {
            if (!empty($search->term)) {
                //support multiple words
                $term = explode(' ', $search->term);

                foreach ($term as $t) {
                    $not = '';
                    $operator = 'OR';
                    if (substr($t, 0, 1) == '-') {
                        $not = 'NOT ';
                        $operator = 'AND';
                        //trim the - sign off
                        $t = substr($t, 1, strlen($t));
                    }

                    $like = '';
                    $like .= "( `comment` " . $not . "LIKE '%" . $t . "%' )";
                    $this->db->where($like);
                }
            }


            if (!empty($search->class_id)) {
                $this->db->where('class_id >=', $search->class_id);
            }
            if (!empty($search->subject_id)) {
                $this->db->where('subject_id >=', $search->subject_id);
            }

            if (!empty($search->exam_id)) {
                $this->db->where('exam_id >=', $search->exam_id);
            }


        }
        $this->db->join('student t', 't.class_id=m.class_id');
        $this->db->join('class c', 'c.class_id=m.class_id');
        $this->db->select('m.*');
        return $this->db->get('mark m')->result();
    }


    function marksheet($data)
    {

        if(!$data['mark_id']) {


            $this->db->where('class_id', $data['class_id']);
            $students = $this->db->get('student')->result_array();

            foreach ($students as $row) {
                $data['student_id'] = $row['student_id'];


                $this->db->insert('mark', $data);
            }

        }else{
            $this->db->where('mark_id', $data['mark_id']);
            $this->db->update('mark', $data);
        }
    }
    function attendancesheet($data)
    {

        if(!$data['attendance_id']) {


            $this->db->where('class_id', $data['class_id']);
            $students = $this->db->get('student')->result_array();

            foreach ($students as $row) {
                $data['student_id'] = $row['student_id'];


                $this->db->insert('attendance', $data);
            }

        }else{
            $this->db->where('attendance_id', $data['attendance_id']);
            $this->db->update('attendace', $data);
        }
    }

    function get_attendance($search = false, $sort_by = '', $sort_order = 'DESC', $limit = 0, $offset = 0)
    {

        if ($search) {
            if (!empty($search->term)) {
                //support multiple words
                $term = explode(' ', $search->term);

                foreach ($term as $t) {
                    $not = '';
                    $operator = 'OR';
                    if (substr($t, 0, 1) == '-') {
                        $not = 'NOT ';
                        $operator = 'AND';
                        //trim the - sign off
                        $t = substr($t, 1, strlen($t));
                    }

                    $like = '';
                    $like .= "( `comment` " . $not . "LIKE '%" . $t . "%' )";

                    $this->db->where($like);
                }
            }

            if (!empty($search->class_id)) {
                $this->db->where('class_id >=', $search->class_id);
            }

            if (!empty($search->date)) {
                $this->db->where('date >=', $search->date);
            }


        }


        if ($limit > 0) {
            $this->db->limit($limit, $offset);
        }
        if (!empty($sort_by)) {
            $this->db->order_by($sort_by, $sort_order);
        }


        //$this->db->select('t.name,c.name class_name,m.*');
        return $this->db->get('attendance')->result_array();

    }

    function _attendance()
    {
//        $date=$this->input->post('date');
          $class=$this->input->post('class_id');
          echo $class;exit();
//        $this->db->where('date',$date);
//        $this->db->where('class',$class);
//        echo $date;
//        $query= $this->db->query("SELECT * FROM 'attendace' WHERE  `date`='$date'");
//        return $query->result_array();
        return $this->db->get_where('attendance',array('class_id' => $class))->result_array();
        //return $this->db->get('attendance')->result_array();
    }

    function get_attendance_count($search = false)
    {


        if ($search) {
            if (!empty($search->term)) {
                //support multiple words
                $term = explode(' ', $search->term);

                foreach ($term as $t) {
                    $not = '';
                    $operator = 'OR';
                    if (substr($t, 0, 1) == '-') {
                        $not = 'NOT ';
                        $operator = 'AND';
                        //trim the - sign off
                        $t = substr($t, 1, strlen($t));
                    }

                    $like = '';
                    $like .= "( `comment` " . $not . "LIKE '%" . $t . "%' )";
                    $this->db->where($like);
                }
            }


            if (!empty($search->class_id)) {
                $this->db->where('class_id >=', $search->class_id);
            }
            if (!empty($search->date)) {
                $this->db->where('date >=', $search->date);
            }


        }

        return $this->db->get('attendance')->result_array();
    }

    function tabulation_search($stud_id,$sec_id,$exam_id)
    {
        //$this->db->where('section_id',$sec_id);
        //$this->db->or_where('mark',$sec_id);
        $query = $this->db->query("SELECT * FROM `mark` where `section_id` = '$sec_id' AND `exam_id`='$exam_id'");
        return $query->result();
        //  return $this->db->get('mark')->result_array();
    }
}
