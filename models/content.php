<?

class Content extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function email($to,$subject,$msg){

                $msg = str_replace("###msg###",$msg,file_get_contents("/home/yoonnyc/www/email_template.tpl"));

                $this->load->library('email');

                $this->email->initialize(array(
                  'mailtype' => 'html',  
                  'protocol' => 'smtp',
                  'smtp_host' => 'www.yoonnyc.com',
                  'smtp_user' => 'customer@yoonnyc.com',
                  'smtp_pass' => '0773140980',
                  'smtp_port' => 25
                ));

                $this->email->from('customer@yoonnyc.com', 'YOON NYC');
                $this->email->to($to);
                $this->email->subject($subject);
                $this->email->message($msg);
                
                $this->email->send();

    }


    function insert($table_name,$data_array){

        $fields = $this->db->list_fields($table_name);

        foreach($data_array as $key=>$value){

            if(in_array($key,$fields)){

                $insert[$key]=$data_array[$key];

            }
        }

        $this->db->insert($table_name,$insert);

    }


    function select_count($input_name, $begin, $end, $value = "",$other = "")
    {

        $result = "<select name='$input_name' $other size=1>\n";

        for ($i = $begin; $i <= $end; $i++) {

            if ($value == $i) {
                $msg = " selected";
            } else {
                $msg = "";
            }

            $result .= "<option value=$i $msg>$i</option>\n";

        }

        $result .= "</select>\n";

        return $result;

    }


    function select_printf($query, $name, $keyvalue = "", $other = "", $wordus ="please_select")
    {

        $query = $this->db->query($query);

        $result = $query->result_array();

        $retvalue = "<select name=\"$name\" id=\"$name\" $other  size=1>";

        $retvalue .= "<option value=0>SELECT</option>\n";

        foreach($result as $key=>$value){

            if ($key == $keyvalue) {
                $selecto = " selected";
            } else {
                $selecto = "";
            }

            $retvalue .= "<option $selecto value=\"$value[id]\">" . $value['main_en'] . "</option>\n";

        }

        $retvalue .= "</select>";

        return $retvalue;

    }

    function sql($sql_code,$field_name){

        $query = $this->db->query($sql_code);

        $query = $query->row_array(); 

        $result = $query[$field_name];

        return $result;

    }

    function sqlrow($sql_code){

        $query = $this->db->query($sql_code);

        $query = $query->row_array(); 

        return $query;

    }  

    function sqllistrow($sql_code){

        $query = $this->db->query($sql_code);

        $query = $query->result_array(); 

        return $query;

    }


    function send_password($member_email){

        $query = $this->db->query("select * from member_info where member_email='$member_email'");
        
        $check = $query->row_array();

        if($check['id']>0){

            $check['new_password'] = $this->mixed_code();

            $this->db->query("update member_info set activation_code='$check[new_password]',member_pass=md5('$check[new_password]') where id='$check[id]'");

        }

        return $check; 

    }


    function become_member(){

        $member_email = $this->input->post('member_email');

        $query = $this->db->query("select * from member_info where member_email='$member_email'");
        
        $check = $query->row_array();

        if($check['id']==0){

           $data = array(
               'member_email' => $this->input->post('member_email'),
               'member_pass' => md5($this->input->post('member_pass')),
               'member_fullname' => $this->input->post('member_fullname'),
               'activation_code' => $this->input->post('member_pass')
            );

            $this->db->insert('member_info', $data);     
            
        }   

        return $check; 

    } 


    function check_member(){

        $member_email = $this->input->post('member_email');

        $member_pass  = md5($this->input->post('member_pass'));

        $query = $this->db->query("select * from member_info where member_email='$member_email' and member_pass='$member_pass'");

        // echo $this->db->last_query();
        
        $check = $query->row_array();

        return $check; 

    }     


    function mixed_code($string_count = "12")
    {

        $verify_string = '';
        for ($i = 0; $i < $string_count; $i++) {
            $get_todo = mt_rand(1, 3);
            if ($get_todo == 1) {
                $verify_string .= chr(mt_rand(65, 90));
            }
            if ($get_todo == 2) {
                $verify_string .= chr(mt_rand(97, 122));
            }
            if ($get_todo == 3) {
                $verify_string .= chr(mt_rand(48, 57));
            }
        }

        return $verify_string;

    }


    function topic($table_name,$table_id)
    {
       
        $language_code = $this->config->item('language_code');

        $query_sql="select main_$language_code as main_name from $table_name where id='$table_id'";

        $query = $this->db->query($query_sql);

        $topic = $query->row();
        
        $topic = $topic->main_name;

        return $topic;
    
    }


    function product_list($field_name,$field_value)
    {
       
        $query = $this->db->query("select * from static_info where $field_name='$field_value' and status_id=1 order by rand() limit 6");
        
        return $query->result_array();
    
    }


    function get_sub($category_id)
    {
       
        $query = $this->db->query("select * from sub_main where category_id='$category_id'");
        
        return $query->result_array();
    
    }


    function get_categories($department_code)
    {
       
        $query = $this->db->query("select * from category_main where site_code='$department_code'");
        
        return $query->result_array();
    
    }


    function get_statics($field_name,$field_value,$begin=0,$pagelimit=12)
    {
       
        $query = $this->db->query("select * from static_info where $field_name='$field_value' and status_id=1 order by id desc limit $begin,$pagelimit");
        
        return $query->result_array();
    
    }

    function total_statics($field_name,$field_value)
    {
       
        $query = $this->db->query("select count(id) as total_count from static_info where $field_name='$field_value' and status_id=1 order by id desc");
        
        return $query->row();
    
    }

    function search_statics()
    {
       
        $category_id = $this->input->post('category_id');

        $search_keyword = $this->input->post('search_keyword');

        if($category_id==0){

          $query = $this->db->query("select * from static_info where static_tags like '%$search_keyword%' and status_id=1 order by id desc limit 12");
        
        }
        else
        {

          $query = $this->db->query("select * from static_info where static_tags like '%$search_keyword%' and status_id=1 order by id desc limit 12");
      
        }  

        return $query->result_array();
    
    }

    function get_static($product_id)
    {
       
        $query = $this->db->query("select * from static_info where id='$product_id' and status_id=1 order by id desc limit 0,1");
        
        return $query->row_array();
    
    }

    function menu($site_id=1,$language_code="en"){

           $query = $this->db->query("select id,main_$language_code as main_name,main_link,page_id,static_id,module_id,category_id,sub_id,seo_link  from menu_main where  status_id=1  order by row_no asc");

            $menu['menu_main']=$query->result_array();

            $querys = $this->db->query("select id,main_$language_code as main_name,main_link,page_id,static_id,menu_id,module_id,category_id,sub_id,seo_link  from menu_info where  status_id=1  order by row_no asc");

            $menu['menu_info']=$querys->result_array();

            foreach($menu['menu_main'] as $key=>$value){

            foreach($menu['menu_info'] as $keys=>$values){

            if($value[id]==$values[menu_id]){

                $check_id=$value['id'];

                $check[$check_id]=1;

            }    

            } 

            }

            $menu['menu_check']=$check;

            return $menu;  

    }
 

    public function send_email($subject,$content)
    {

        $this->load->library('email');

        $this->email->initialize(array(
          'protocol' => 'smtp',
          'smtp_host' => 'www.yoonnyc.com',
          'smtp_user' => 'customer@yoonnyc.com',
          'smtp_pass' => '0773140980',
          'smtp_port' => 25,
          'crlf' => "\r\n",
          'newline' => "\r\n"
        ));

        $this->email->from('customer@yoonnyc.com', 'YOON NYC');
        $this->email->to('azeroocom@gmail.com');
        $this->email->subject($subject);
        $this->email->message($content);
        $this->email->send();

        echo $this->email->print_debugger();

    }  

}

?>