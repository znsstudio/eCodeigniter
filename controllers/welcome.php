<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -ing
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();

        $basket_sesid = $this->session->userdata('basket_sesid');

        if($basket_sesid==""){

        	$basket_sesid = $this->Content->mixed_code('20');

        	$this->session->set_userdata('basket_sesid', $basket_sesid);

        	$this->db->query("insert into basket_promo(basket_sesid,promo_code,promo_amount) values('$basket_sesid','ENDYEAR','60')");

        }
        
		$site_id = $this->Content->sql("select site_id from site_urls where site_urls='$_SERVER[HTTP_HOST]'","site_id");

		$data['site'] = $this->Content->sqlrow("select page_title,shipping_cost,basket_tax,page_keyword,page_desc from site_info where id='$site_id' ","page_title");

		$data['menu'] = $this->Content->menu($site_id,"en");

		$this->site_id = $site_id;

		$data['basket_check'] = $this->Content->sql("select count(id) as basket_check from basket_info where basket_sesid='$basket_sesid'",'basket_check');

		$data['site_id'] = $site_id;

		$this->data=$data;

    }


    function design_show(){

    	$this->load->view('design',$this->data);

    }


    function update_stock(){


    	foreach($this->Content->sqllistrow("select * from static_info where id=101453") as $key=>$value){

    		foreach(explode(",",$value[static_color]) as $kc=>$color){

    			foreach(explode(",",$value[static_size]) as $ks=>$size){

    				$this->db->query("insert into static_stock(static_id,static_code,static_color,static_size,static_stock) values('$value[id]','$value[unique_code]','$color','$size','100')");

    			}

    		}


    	}


    }

	public function index()
	{

		$this->data['static_list_index']=$this->Content->sqllistrow("select * from static_info where main_id='70' and status_id=1 order by rand() limit 5");	
		
		$this->data['static_list_accessory']=$this->Content->sqllistrow("select * from static_info where main_id='60' and status_id=1 order by rand() limit 5");	

		$this->load->view('index',$this->data);

	}


	public function search()
	{

		$alias = $this->input->post('q');	

		if(strlen($alias)>2){

			$site_id = $this->site_id;

			$this->data['static_list_index']=$this->Content->sqllistrow("select * from static_info where static_name like '%$alias%' and main_id=70 order by id asc");

			$this->data['category_list']=$this->Content->sqllistrow("select id,main_en as main_name,main_alias from category_main where main_id='70'");

			$this->data['type_list']=$this->Content->sqllistrow("select id,main_en as main_name,main_alias from type_main where main_id='70'");

			$this->data['main_alias'] = $alias;

		}

		$this->load->view('products',$this->data);

	}


	public function products($alias)
	{

		$site_id = $this->site_id;

		$main_id = $this->Content->sql("select id from static_main where main_alias='$alias'","id");

		if($this->uri->segment(3,"none")=="category"){

			$category_alias = 	$this->uri->segment(4,0);

			$category_id = $this->Content->sql("select id from category_main where main_alias='$category_alias' and main_id='$main_id' and status_id=1","id");

			$this->data['static_list_index']=$this->Content->sqllistrow("select * from static_info where category_id='$category_id' and main_id='$main_id' and status_id=1 order by id asc");

		} elseif ($this->uri->segment(3,"none")=="type"){

			$type_alias = 	$this->uri->segment(4,0);

			$type_id = $this->Content->sql("select id from type_main where main_alias='$type_alias' and main_id='$main_id'","id");

			$this->data['static_list_index']=$this->Content->sqllistrow("select * from static_info where type_id='$type_id' and main_id='$main_id'  and status_id=1 order by id asc");

		} else {
		
			$this->data['static_list_index']=$this->Content->sqllistrow("select * from static_info where main_id='$main_id'  and status_id=1 order by id asc");

		}

		$this->data['category_list']=$this->Content->sqllistrow("select id,main_en as main_name,main_alias from category_main where main_id='$main_id'");

		$this->data['type_list']=$this->Content->sqllistrow("select id,main_en as main_name,main_alias from type_main where main_id='$main_id'");

		$this->data['main_alias'] = $alias;

		$this->load->view('products',$this->data);

	}


	public function category($alias,$begin="0")
	{

		$site_id = $this->site_id;

		$category_id = $this->Content->sql("select id from category_main where main_alias='$alias'","id");
		
		$this->data['static_list']=$this->Content->sqllistrow("select * from static_info where category_id='$category_id' order by id desc limit $begin,10");

		$this->load->view('products',$this->data);

	}

	public function subcategory($alias,$begin="0")
	{

		$site_id = $this->site_id;

		$category_id = $this->Content->sql("select id from sub_main where main_alias='$alias'","id");
		
		$this->data['static_list']=$this->Content->sqllistrow("select * from static_info where sub_id='$sub_id' order by id desc limit $begin,10");

		$this->load->view('products',$this->data);

	}

	public function product($alias){

		$article = $this->Content->sqllistrow("select * from static_info where static_alias='$alias'");

		$static_id = $article['0']['id'];

		$this->data['static_list'] = $article;

		$category_id = $article['0']['category_id'];

		$related_articles = $this->Content->sqllistrow("select id,static_name,static_pic,static_alias from static_info where main_id=70 and static_pic!='' order by rand() limit 0,9");

		$this->data['related_articles'] = $related_articles;

		$related_photos = $this->Content->sqllistrow("select id,static_pic,static_alias from static_info where static_id='$static_id' order by row_no asc");

		$this->data['photo_list'] = $related_photos;

		$static_color = $article['0']['static_color'];

		$static_size = $article['0']['static_size'];

		$this->data[static_count]=$this->Content->select_count("static_count",1,20,""," style='padding:10px;border:solid 1px black;height:48px'");

		$this->data[static_color]=$this->Content->select_printf("select id,main_en from color_main where id in($static_color)","static_color",""," style='padding:10px;border:solid 1px black;height:48px;width:150px;margin-right:3px' ","choose_color");

		$this->data[static_size]=$this->Content->select_printf("select id,main_en from size_main where id in($static_size)","static_size",""," style='padding:10px;border:solid 1px black;height:48px;width:75px;margin-right:1px' ","choose_size");

		$this->data['category_name'] = $this->Content->sql("select main_en from category_main where id='$category_id'","main_en");

		$this->load->view('product',$this->data);

	}


	public function ajax($alias){

		$article = $this->Content->sqllistrow("select * from static_info where static_alias='$alias'");

		$static_id = $article['0']['id'];

		$this->data['static_list'] = $article;

		$category_id = $article['0']['category_id'];

		$related_articles = $this->Content->sqllistrow("select id,static_name,static_pic,static_alias from static_info where main_id=70 and static_pic!='' order by rand() limit 0,9");

		$this->data['related_articles'] = $related_articles;

		$related_photos = $this->Content->sqllistrow("select id,static_pic,static_alias from static_info where static_id='$static_id'");

		$this->data['photo_list'] = $related_photos;

		$static_color = $article['0']['static_color'];

		$static_size = $article['0']['static_size'];

		$this->data[static_count]=$this->Content->select_count("static_count",1,20,""," style='padding:10px;border:solid 1px black;height:48px'");

		$this->data[static_color]=$this->Content->select_printf("select id,main_en from color_main where id in($static_color)","static_color",""," style='padding:10px;border:solid 1px black;height:48px;width:150px;margin-right:3px' ","choose_color");

		$this->data[static_size]=$this->Content->select_printf("select id,main_en from size_main where id in($static_size)","static_size",""," style='padding:10px;border:solid 1px black;height:48px;width:75px;margin-right:1px' ","choose_size");

		$this->data['category_name'] = $this->Content->sql("select main_en from category_main where id='$category_id'","main_en");

		$this->load->view('ajax',$this->data);

	}



	public function addbag(){

		$basket_sesid = $this->session->userdata('basket_sesid');

		$static_id = $this->input->post('static_id');

		$static_color = $this->input->post('static_color');

		$static_size = $this->input->post('static_size');

		$static_count = $this->input->post('static_count');

		$check = $this->Content->sql("select id from static_stock where static_id='$static_id' and static_color='$static_color' and static_size='$static_size' and static_stock>='$static_count'","id");

		$article = $this->Content->sqllistrow("select * from static_info where id='$static_id'");
	
		$static_cost = $article['0']['static_cost'];

		$static_tax = $article['0']['static_tax'];

		$static_alias = $article['0']['static_alias'];

		if($check>0){

			$this->db->query("insert into basket_info(basket_sesid,static_id,basket_cost,basket_tax,basket_color,basket_size,basket_count) values('$basket_sesid','$static_id','$static_cost','$static_tax','$static_color','$static_size','$static_count')");		

			redirect('/basket', 'redirect');	

		}
		else
		{

			redirect("/product/$static_alias/soldout", 'redirect');

		}	


	}

	public function basket(){

			$seo = $this->data['site'];

			$basket_sesid = $this->session->userdata('basket_sesid');

			$this->db->query("replace into basket_main(basket_sesid) values('$basket_sesid')");

			$this->data['basket_id'] = $this->Content->sql("select id from basket_main where basket_sesid='$basket_sesid'","id");

			$this->data["basket_index"] = $this->Content->sqllistrow("select basket_color,basket_size,basket_info.static_id,basket_info.id,static_info.static_name,static_info.static_pic,basket_cost*basket_count as basket_total,basket_count,basket_count*(basket_cost*(1-basket_tax)) as product_cost,basket_count*(basket_tax*basket_cost) as product_tax,static_pic,static_alias from basket_info,static_info where basket_sesid='$basket_sesid' and basket_info.static_id=static_info.id");  				
			
			$basket_total=$this->Content->sql("select sum(basket_cost*basket_count) as basket_sum from basket_info where basket_sesid='$basket_sesid'","basket_sum");
			
			$basket_count=$this->Content->sql("select sum(basket_count) as basket_count_total from basket_info where basket_sesid='$basket_sesid'","basket_count_total");

			$basket_shipping=$seo[shipping_cost]*$basket_count;
	
			if($basket_total>0){
			
			$basket_shipping = 0;
			
			}

			$basket_shipping = 0;
	
			$tax_total=$basket_shipping+$basket_total;
  
			$basket_tax=$tax_total*$seo[basket_tax];
			
			$basket_total_pay = $basket_total + $basket_shipping + $basket_tax;
			
			$this->data["basket_total"] = $basket_total;  
			
			$this->data["basket_shipping"] = $basket_shipping;
			
			$this->data["basket_tax"] = $basket_tax;
	


			$promo=$this->Content->sqlrow("select id,promo_code,promo_amount from basket_promo where basket_sesid='$basket_sesid' order by id desc limit 0,1");
			
			if(count($promo)>0){

			$total_pay=$basket_total_pay;	

			$basket_total_pay=((100-$promo[promo_amount])/100)*$basket_total_pay;	

			$promo_sale=$total_pay-$basket_total_pay;		

			$this->data["promo_sale"] = $promo_sale;
			
			}
	


			$this->data["basket_total_pay"]=$basket_total_pay;  	
			
			$this->session->set_userdata('basket_total_pay',$basket_total_pay);	

			$this->load->view('basket',$this->data);

	}

	public function paypal(){

		if($this->input->get('st')=="Completed"){

				$this->data['msg'] = 'Your payment processed thank you for payment';

				$this->load->view('msg',$this->data);

				$this->session->unset_userdata('basket_total_pay');	

				$this->session->unset_userdata('basket_sesid');					

		}
		else
		{

				$this->data['msg'] = 'Please try again';

				$this->load->view('msg',$this->data);	


		}	

	}


	public function pay($paypal="Cancelled",$paypal_no="0"){

			// calculation part

			$seo = $this->data['site'];

			$basket_sesid = $this->session->userdata('basket_sesid');

			$this->data["basket_index"] = $this->Content->sqllistrow("select basket_color,basket_size,basket_info.static_id,basket_info.id,static_info.static_name,static_info.static_pic,basket_cost*basket_count as basket_total,basket_count,basket_count*(basket_cost*(1-basket_tax)) as product_cost,basket_count*(basket_tax*basket_cost) as product_tax,static_pic,static_alias from basket_info,static_info where basket_sesid='$basket_sesid' and basket_info.static_id=static_info.id");  				
			
			$basket_total=$this->Content->sql("select sum(basket_cost*basket_count) as basket_sum from basket_info where basket_sesid='$basket_sesid'","basket_sum");
			
			$basket_count=$this->Content->sql("select sum(basket_count) as basket_count_total from basket_info where basket_sesid='$basket_sesid'","basket_count_total");


			$basket_shipping=$seo[shipping_cost]*$basket_count;
	
			if($basket_total>0){
			
			$basket_shipping = 0;
			
			}

			$basket_shipping = 0;
	
			$tax_total=$basket_shipping+$basket_total;
  
			$basket_tax=$tax_total*$seo[basket_tax];
			
			$basket_total_pay = $basket_total + $basket_shipping + $basket_tax;
			
			$this->data["basket_total"] = $basket_total;  
			
			$this->data["basket_shipping"] = $basket_shipping;
			
			$this->data["basket_tax"] = $basket_tax;
	
			$promo=$this->Content->sqlrow("select id,promo_code,promo_amount from basket_promo where basket_sesid='$basket_sesid' order by id desc limit 0,1");
			
			if(count($promo)>0){

			$total_pay=$basket_total_pay;	

			$basket_total_pay=((100-$promo[promo_amount])/100)*$basket_total_pay;	

			$promo_sale=$total_pay-$basket_total_pay;		

			$this->data["promo_sale"] = $promo_sale;
			
			}

			$this->data["basket_total_pay"]=$basket_total_pay;  	
			
			$this->session->set_userdata('basket_total_pay',$basket_total_pay);	

			// payment

			if($paypal=="Completed"){

				$response->approved = "true";

			}
			else
			{	

				$exp_year=substr($this->input->post('exp_year'),2,2);	

				$exp_month=substr($this->input->post('exp_month'),0,2);	

				require_once '/home/yoonnyc/www/anet_php_sdk/AuthorizeNet.php'; 
				define("AUTHORIZENET_API_LOGIN_ID", "6Gb2ztYQ6Leg");
				define("AUTHORIZENET_TRANSACTION_KEY", "469N5sfU62kZ6cNf");
				define("AUTHORIZENET_SANDBOX", true);
				$sale = new AuthorizeNetAIM;
				$sale->amount = $this->session->userdata('basket_total_pay');
				$sale->card_num = $this->input->post('card_number');
				$sale->exp_date = "$exp_month/$exp_year";
				$sale->setSandbox(false);
				$response = $sale->authorizeAndCapture();	

			}


			if ($response->approved) {

				$transaction_id = $response->transaction_id;
			
				$_POST[transaction_id]=$transaction_id;
				
				$_POST[order_date]=date("Y-m-d H:i:s");
				
				$_POST[order_sesid]=$this->session->userdata[basket_sesid];
				
				$_POST[order_amount]=$basket_total_pay;

				$_POST[member_id]=$this->session->userdata('member_id');

				$this->Content->insert('order_info',$_POST);

				$member_email = $this->input->post('member_email');

				if($this->Content->sql("select id from member_info where member_email='$member_email'","id")==0){

					@$this->Content->insert('member_info',$_POST);

				}

				$this->session->unset_userdata('basket_total_pay');	

				$this->session->unset_userdata('basket_sesid');	

				// emailings

				// $this->Content->email("johanna@yoonnyc.com","New Order","New order by $transaction_id amount of $basket_total_pay, please check admin panel for further details");

				$this->Content->email("azeroocom@gmail.com","New Order","New order by $transaction_id amount of $basket_total_pay, please check admin panel for further details");
				
				$this->Content->email($this->input->post('member_email'),"Order Confirmation","Your order by number $transaction_id amount of $basket_total_pay has been processed. Please check our website im 24 hours for further details");
								
				$this->data['msg'] = 'Your payment processed thank you for payment';

				$this->load->view('msg',$this->data);	

			
			}
			else
			{
			
				redirect("/checkout/paymenterror", 'redirect');
			
			}

	}


	public function check_payment(){

		$this->Content->email("azeroocom@gmail.com","New Order","New order by $transaction_id amount of $basket_total_pay, please check admin panel for further details");
							
	}


	public function applycode(){

			$basket_sesid = $this->session->userdata('basket_sesid');

			$promo_code = $this->input->post('promo_code');

			$promo=$this->Content->sqlrow("select main_code,main_value from promo_main where main_code='$promo_code' and status_id=1");

			if(count($promo)>0){
			
				$this->db->query("insert into basket_promo(basket_sesid,promo_code,promo_amount) values('$basket_sesid','$promo[main_code]','$promo[main_value]')");
				
				redirect("/basket", 'redirect');	
			
			}
			else
			{
			
			
				redirect("/basket/promoerror", 'redirect');
			
			}

	}


	public function deletebasket($delete_id){

			$basket_sesid = $this->session->userdata('basket_sesid');

			$this->db->query("delete from basket_info where basket_sesid='$basket_sesid' and id='$delete_id'");
				
			redirect("/basket", 'redirect');	

	}


	public function login(){

			$member_id = $this->session->userdata('member_id');

			if($member_id>0){

				if($this->data['basket_check']>0){
			
					redirect("/basket", 'redirect');

				}	
				else
				{

					redirect("/member", 'redirect');

				}	
			
			}
			else
			{
			
				$this->load->view('login',$this->data);
			
			}


	}


	public function signin(){

			$basket_sesid = $this->session->userdata('basket_sesid');	

			$member_email = $this->input->post('member_email');

			$member_pass = $this->input->post('member_pass');

			$member_id=$this->Content->sql("select id from member_info where member_email='$member_email' and member_pass='$member_pass' and status_id=1","id");

			if($member_id>0){

				if($this->Content->sql("select id from order_info where member_id='$member_id'","id")==0){

					$promo_date = date("Y-m-d H:i:s");

					$this->db->query("insert into basket_promo(basket_sesid,promo_code,promo_amount,promo_date) values('$basket_sesid','NEWORDER','20','$promo_date')");

				}

				$this->session->set_userdata('member_id',$member_id);

				if($this->data['basket_check']>0){

					redirect("/basket", 'redirect');

				}	
				else
				{

					redirect("/member", 'redirect');

				}	
			
			}
			else
			{
			
			
				redirect("/login/signinerror", 'redirect');
			
			}

	}


	public function destroy(){

		$this->session->sess_destroy();

		redirect("/login", 'redirect');

	}

	public function signup(){
			
	
		$this->load->view('signup',$this->data);
			

	}


	public function member($views="member",$order_id="0"){
			

		$member_id = $this->session->userdata('member_id');

		if($member_id>0){

		if($order_id>0){

			$this->data['orders'] = $this->Content->sqllistrow("select * from order_info where member_id='$member_id' and id='$order_id'");	

			$order_sesid = $this->Content->sql("select order_sesid from order_info where id='$order_id'","order_sesid");

			// basket_datra

			$seo = $this->data['site'];

			$this->data["basket_index"] = $this->Content->sqllistrow("select basket_color,basket_size,basket_info.static_id,basket_info.id,static_info.static_name,static_info.static_pic,basket_cost*basket_count as basket_total,basket_count,basket_count*(basket_cost*(1-basket_tax)) as product_cost,basket_count*(basket_tax*basket_cost) as product_tax,static_pic,static_alias from basket_info,static_info where basket_sesid='$order_sesid' and basket_info.static_id=static_info.id");  				
			
			$basket_total=$this->Content->sql("select sum(basket_cost*basket_count) as basket_sum from basket_info where basket_sesid='$order_sesid'","basket_sum");
			
			$basket_count=$this->Content->sql("select sum(basket_count) as basket_count_total from basket_info where basket_sesid='$order_sesid'","basket_count_total");


			$basket_shipping=$seo[shipping_cost]*$basket_count;
	
			if($basket_total>0){
			
			$basket_shipping = 0;
			
			}

			$basket_shipping = 0;
	
			$tax_total=$basket_shipping+$basket_total;
  
			$basket_tax=$tax_total*$seo[basket_tax];
			
			$basket_total_pay = $basket_total + $basket_shipping + $basket_tax;
			
			$this->data["basket_total"] = $basket_total;  
			
			$this->data["basket_shipping"] = $basket_shipping;
			
			$this->data["basket_tax"] = $basket_tax;
	


			$promo=$this->Content->sqlrow("select id,promo_code,promo_amount from basket_promo where basket_sesid='$order_sesid' order by id desc limit 0,1");
			
			if(count($promo)>0){

			$total_pay=$basket_total_pay;	

			$basket_total_pay=((100-$promo[promo_amount])/100)*$basket_total_pay;	

			$promo_sale=$total_pay-$basket_total_pay;		

			$this->data["promo_sale"] = $promo_sale;
			
			}
	


			$this->data["basket_total_pay"]=$basket_total_pay;  	
			

		}
		else
		{

			$this->data['orders'] = $this->Content->sqllistrow("select * from order_info where member_id='$member_id'");	

		}	

		$this->load->view($views,$this->data);

		}
		else
		{

			redirect("/login", 'redirect');

		}	
			

	}



	public function register(){

		$this->load->helper('email');

		$member_fullname = $this->input->post('member_fullname');

		$member_email = $this->input->post('member_email');

		$member_pass = $this->input->post('member_pass');

		foreach($_POST as $key=>$value){

			if(ereg("member_",$key)){

				$insert[$key]=$value;

				$this->session->set_userdata($key,$value);

			}

		}


		if($member_fullname!="" and $member_pass!="" and valid_email($member_email)){

			$promo_date = date("Y-m-d H:i:s");

			$this->db->query("insert into basket_promo(basket_sesid,promo_code,promo_amount,promo_date) values('$basket_sesid','NEWORDER','20',''$promo_date)");

			$this->db->insert("member_info",$insert);

			foreach($_POST as $key=>$value){

				if(ereg("member_",$key)){

					$insert[$key]=$value;

					$this->session->unset_userdata($key,$value);

				}

			}

			$this->session->set_userdata('member_id',$this->Content->sql("select id from member_info order by id desc limit 0,1"));	

			redirect("/basket", 'redirect');

		}
		else
		{

			redirect("/signup/error", 'redirect');

		}	

	}

	public function checkout(){

		$this->load->view('checkout',$this->data);		

	}

	public function reviewadd(){

		$static_id = $this->input->post('static_id');

		$article = $this->Content->sqllistrow("select * from static_info where id='$static_id'");
	
		$static_alias = $article['0']['static_alias'];

		$review_fullname = $this->input->post('review_fullname');

		$review_email = $this->input->post('review_email');

		$review_content = $this->input->post('review_content');

		$discount_code = $this->Content->mixed_code('8');

		// sending email

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
        $this->email->subject("Your special discount is attached");
        $this->email->message("Your code is $discount_code");
        
        // $this->email->send();

        // insert

        $this->db->query("insert into review_info(static_id,review_fullname,review_email,review_content,review_date) values('$static_id','$review_fullname','$review_email','$review_content','$review_date')");

		redirect("/product/$static_alias", 'redirect');	

	}

	public function lookbook($lookbook_alias){

		$category_id = $this->Content->sql("select id from category_main where main_alias='$lookbook_alias'","id");

		$this->data['category_id'] = $category_id;

		$this->data['arr'] = $this->Content->sqllistrow("select * from static_info where category_id='$category_id' order by id desc");

		$this->data['categor_name'] = $this->Content->sql("select main_en from category_main where id='$category_id'","main_en");

		$this->load->view('lookbook',$this->data);

	}


	public function contactus(){

		if($this->input->post('captcha_code')!=""){

			foreach($this->input->post(NULL, TRUE) as $key=>$value){

				if(ereg("your_",$key)){

					$msg[]="$key = > $value";

				}

			}	

			$msg = implode("<p>",$msg);


			$this->Content->email("azeroocom@gmail.com","New Contact Inquiry",$msg);
                        
                        $this->Content->email("rosa@yoonnyc.com","New Contact Inquiry",$msg);

			$this->data['msg'] = 'Your contact inquiry has been received<p>We will contact you very soon.<p>Thank you very much';

			$this->load->view('msg_contactus',$this->data);	


		}
		else
		{	

			$this->load->view('contactus',$this->data);

		}

	}

	public function page($page_alias){

		$this->data['page_content'] = $this->Content->sqllistrow("select * from page_info where main_alias='$page_alias' order by id desc");

		$this->load->view('page',$this->data);

	}


	public function sign_up(){


		if($this->input->post('captcha_code')!=""){

			$this->data['msg'] = 'Now you will receive news about our latest products, as well as promotion codes for sales, and much more fun stuff!';

			$this->Content->insert('member_info',$_POST);

			$this->load->view('msg_newsletter',$this->data);	


		}
		else
		{	

			$this->load->view('sign_up',$this->data);

		}


	}


	public function forgot_password(){


		if($this->input->post('captcha_code')!=""){

			$member_email = $this->input->post('member_email');

			$customer = $this->Content->sqlrow("select member_email,member_pass from member_info where member_email='$member_email'");

			// print_r($customer);

			$this->Content->email($customer[member_email],"Your login details","email : $customer[member_email] <p> password : $customer[member_pass]");

			$this->data['msg'] = 'We have sent email to address you gaven us, please check in 2-10 minutes.';

			$this->load->view('msg',$this->data);	


		}
		else
		{	

			$this->load->view('forgot_password',$this->data);

		}



	}


	public function track(){

		$transaction_id = $this->input->post('transaction_id');

  			$delivery = $this->Content->sqlrow("select id,order_note,delivery_date,delivery_code from order_info where transaction_id='$transaction_id'");

		  	if($delivery[id]>0){
		  			
			  	if($delivery[delivery_code]!=""){

			  		$this->data['msg']="<center><h3>Good News! Your order has been shipped.</h3> Delivery code is <b>$delivery[delivery_code]</b> shipped on $delivery[delivery_date]<p>Other notes : $delivery[order_note]";		  						

			  	}
			  	else
			  	{	

			  		$this->data['msg']=$delivery[order_note];
						
			  	}

			}
			else
			{

				if($this->input->post('captcha_code')!=""){

					$this->data['msg']="Please enter code or code you have entered is wrong";

				}

			}	

			$this->load->view('track',$this->data);

	}


	public function stores(){

		$this->data['store_states'] = $this->Content->sqllistrow("select store_state from store_info where store_state!='' group by store_state asc");

		$this->load->view('stores',$this->data);

	}

	public function storelist(){

		$store_state = $this->input->post('store_state');

		$this->data['storelist'] = $this->Content->sqllistrow("select * from store_info where store_state='$store_state'");

		$this->load->view('storelist',$this->data);

	}


	public function article($alias){

		$article = $this->Content->sqllistrow("select * from static_info where static_alias='$alias'");

		$static_id = $article['0']['id'];

		$this->data['artilce'] = $article;

		$category_id = $artice['0']['category_id'];

		$related_articles = $this->Content->sqllistrow("select id,static_name from static_info where category_id='$category_id'");

		$this->data['related_articles'] = $related_articles;

		$related_photos = $this->Content->sqllistrow("select id,static_pic from static_info where static_id='$static_id'");

		$this->data['related_photos'] = $related_photos;

		$this->load->view('article',$this->data);

	}

	
	public function photos(){

		$site_id = $this->site_id;

		$this->data['static_list']=$this->Content->sqllistrow("select * from static_info where main_id='2' and site_id='$site_id' order by rand() limit 100");

		$this->load->view('photos',$this->data);

	}

	public function videos(){

		$site_id = $this->site_id;

		$this->data['static_list']=$this->Content->sqllistrow("select * from static_info where main_id='1' and site_id='$site_id' order by rand() limit 100");

		$this->load->view('videos',$this->data);

	}


	public function photo($static_id){

		$site_id = $this->site_id;

		$this->data['static_list']=$this->Content->sqllistrow("select * from static_info where id='$static_id'");

		$this->load->view('photo',$this->data);

	}


	public function gallery(){


		$this->load->view('gallery',$this->data);

	}

	public function privacy(){


		$this->load->view('privacy',$this->data);

	}


	public function sitemap(){

		$this->data['static_list'] = $this->Content->sqllistrow("select * from static_info where main_id=70 ");

		$this->load->view('sitemap',$this->data);

	}


	public function rss(){

		$this->data['static_list'] = $this->Content->sqllistrow("select * from static_info where main_id=70");

		$this->load->view('rss',$this->data);

	}


	public function google_rss(){

		$this->data['static_list'] = $this->Content->sqllistrow("select * from static_info where main_id=70");

		$this->load->view('google_rss',$this->data);

	}


	public function show_stock()
	{

		$stock = $this->Content->sqllistrow("select static_pic,static_name,static_stock_main_copy.static_code,xs,s,m,l,total  as total_product,static_stock_main_copy.static_color from static_info,static_stock_main_copy where main_id='70' and status_id=1 and static_info.unique_code=static_stock_main_copy.static_code and total>4 order by total desc");	

    // $stock = $this->Content->sqllistrow("select static_pic,static_name,static_stock_main_copy.static_code,sum(total) as total_product from static_info,static_stock_main_copy where main_id='70' and status_id=1 and static_info.unique_code=static_stock_main_copy.static_code and total>4 group by static_stock_main_copy.static_code order by total desc;");

		echo "<table>";

		foreach($stock as $key=>$value){

			echo "<tr>";

			echo "<td width=160><img src=pic.php?file_name=files/$value[static_pic]&thumb=155></td>";

			echo "<td width=150>$value[static_name]</td>";

			echo "<td width=150>$value[static_code]</td>";

			echo "<td width=150>$value[static_color]</td>";

			echo "<td width=50>$value[xs]</td>";

			echo "<td width=50>$value[s]</td>";

			echo "<td width=50>$value[m]</td>";

			echo "<td width=50>$value[l]</td>";

			echo "<td width=50>$value[total_product]</td>";

			echo "</tr>";

		}	

		echo "</table>";

	}

	public function thumbnail($file_name){

		if(file_exists("/home/yoonnyc/www/files/$file_name.jpg")){

			redirect("https://www.yoonnyc.com/files/$file_name"."_thumb.jpg", 'redirect');

		}
		else
		{	

			$config['image_library'] = 'gd2';
			$config['source_image']	= "/home/yoonnyc/www/files/$file_name.jpg";
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = FALSE;
			$config['width']	 = 100;
			$config['height']	= 100;

			$this->load->library('image_lib', $config); 

			$this->image_lib->resize();		

			redirect("https://www.yoonnyc.com/files/$file_name"."_thumb.jpg", 'redirect');

		}

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */