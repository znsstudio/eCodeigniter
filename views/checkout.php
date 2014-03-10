<? $this->load->view('header'); ?>

<div id="mine">
<center><table border="0" cellpadding="0" cellspacing="0" width="100%">
<form name="myform" action="/pay" method="POST" enctype="multipart/form-data">
<tbody><tr><td valign="top" width="40%">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody><tr><td colspan="2" height="50"><b><font size="3" face="arial">SHIPPING INFORMATION</font></b></td></tr>
<tr><td height="25">Fullname</td><td><input type="text" name="member_fullname" id="member_fullname" size="30" value=""> </td></tr>
<tr><td height="25">Email</td><td><input type="text" name="member_email" id="member_email" size="30" value=""> </td></tr>
<input type="hidden" name="guest_checkout_index" value="1">
<tr><td colspan="2" height="2"></td></tr><tr><td valign="top">Address</td><td><textarea name="member_address" id="member_address" cols="30" rows="5"></textarea></td></tr>
<tr><td height="25">City</td><td><input type="text" name="member_city" id="member_city" size="30" value=""> </td></tr>
<tr><td height="25">State</td><td><select name="state_id" id="state_id" size="1"><option value="67">Alabama</option>
<option value="68">Alaska</option>
<option value="69">Arizona</option>
<option value="70">Arkansas</option>
<option value="71">California</option>
<option value="72">Colorado</option>
<option value="73">Connecticut</option>
<option value="74">Delaware</option>
<option value="75">Florida</option>
<option value="76">Georgia</option>
<option value="77">Hawaii</option>
<option value="78">Idaho</option>
<option value="79">Illinois</option>
<option value="80">Indiana</option>
<option value="81">Iowa</option>
<option value="82">Kansas</option>
<option value="83">Kentucky</option>
<option value="84">Louisiana</option>
<option value="85">Maine</option>
<option value="86">Maryland</option>
<option value="87">Massachusetts</option>
<option value="88">Michigan</option>
<option value="89">Minnesota</option>
<option value="90">Mississippi</option>
<option value="91">Missouri</option>
<option value="92">Montana</option>
<option value="93">Nebraska</option>
<option value="94">Nevada</option>
<option value="95">New Hampshire</option>
<option value="96">New Jersey</option>
<option value="97">New Mexico</option>
<option value="98">New York</option>
<option value="99">North Carolina</option>
<option value="100">North Dakota</option>
<option value="101">Ohio</option>
<option value="102">Oklahoma</option>
<option value="103">Oregon</option>
<option value="104">Pennsylvania</option>
<option value="105">Rhode Island</option>
<option value="106">South Carolina</option>
<option value="107">South Dakota</option>
<option value="108">Tennessee</option>
<option value="109">Texas</option>
<option value="110">Utah</option>
<option value="111">Vermont</option>
<option value="112">Virginia</option>
<option value="113">Washington</option>
<option value="114">West Virginia</option>
<option value="115">Wisconsin</option>
<option value="116">Wyoming</option>
</select></td></tr>
<tr><td height="25">Zip Code</td><td><input type="text" name="member_zip" id="member_zip" size="5" value="" maxlength="5"> </td></tr>
<tr><td height="25">Phone no</td><td><input type="text" name="member_phone" id="member_phone" size="30" value=""> </td></tr>
</tbody></table>
</td><td valign="top" width="60%">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody><tr><td colspan="2" height="50"><b><font size="3" face="arial">BILLING INFORMATION</font></b></td></tr>
<tr><td colspan="2" height="30">
<div style="float:left"><input type="checkbox" id="billing_check" value="1" onclick="makesame()"></div> 
<div style="float:left;padding-top:2px">Check box if billing information same as shipping information.</div>
</td></tr>
<tr><td height="25">Fullname</td><td><input type="text" name="b_member_fullname" id="b_member_fullname" size="30" value=""> </td></tr>
<tr><td colspan="2" height="2"></td></tr><tr><td valign="top">Address</td><td><textarea name="b_member_address" id="b_member_address" cols="30" rows="5"></textarea></td></tr>
<tr><td height="25">City</td><td><input type="text" name="b_member_city" id="b_member_city" size="30" value=""> </td></tr>
<tr><td height="25">State</td><td><select name="b_state_id" id="b_state_id" size="1"><option value="67">Alabama</option>
<option value="68">Alaska</option>
<option value="69">Arizona</option>
<option value="70">Arkansas</option>
<option value="71">California</option>
<option value="72">Colorado</option>
<option value="73">Connecticut</option>
<option value="74">Delaware</option>
<option value="75">Florida</option>
<option value="76">Georgia</option>
<option value="77">Hawaii</option>
<option value="78">Idaho</option>
<option value="79">Illinois</option>
<option value="80">Indiana</option>
<option value="81">Iowa</option>
<option value="82">Kansas</option>
<option value="83">Kentucky</option>
<option value="84">Louisiana</option>
<option value="85">Maine</option>
<option value="86">Maryland</option>
<option value="87">Massachusetts</option>
<option value="88">Michigan</option>
<option value="89">Minnesota</option>
<option value="90">Mississippi</option>
<option value="91">Missouri</option>
<option value="92">Montana</option>
<option value="93">Nebraska</option>
<option value="94">Nevada</option>
<option value="95">New Hampshire</option>
<option value="96">New Jersey</option>
<option value="97">New Mexico</option>
<option value="98">New York</option>
<option value="99">North Carolina</option>
<option value="100">North Dakota</option>
<option value="101">Ohio</option>
<option value="102">Oklahoma</option>
<option value="103">Oregon</option>
<option value="104">Pennsylvania</option>
<option value="105">Rhode Island</option>
<option value="106">South Carolina</option>
<option value="107">South Dakota</option>
<option value="108">Tennessee</option>
<option value="109">Texas</option>
<option value="110">Utah</option>
<option value="111">Vermont</option>
<option value="112">Virginia</option>
<option value="113">Washington</option>
<option value="114">West Virginia</option>
<option value="115">Wisconsin</option>
<option value="116">Wyoming</option>
</select></td></tr>
<tr><td height="25">Zip Code</td><td><input type="text" name="b_member_zip" id="b_member_zip" size="5" value="" maxlength="5"> </td></tr>
<tr><td height="25">Phone no</td><td><input type="text" name="b_member_phone" id="b_member_phone" size="30" value=""> </td></tr>
</tbody></table>
</td></tr>
<tr><td valign="top" width="40%">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody><tr><td colspan="2" height="50"><b><font size="3" face="arial">SHOPPING CART</font></b></td></tr>
<tr><td height="25">Total Payment</td><td>$<?=money_format('%i',$this->session->userdata('basket_total_pay'))?></td></tr>
</tbody></table>
</td><td valign="top" width="60%">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody><tr><td colspan="2" height="50"><b><font size="3" face="arial">PAYMENT INFORMATION</font></b></td></tr>
<tr><td height="25">Name on card</td><td><input type="text" name="card_name" id="card_name" size="30" value=""> </td></tr>
<tr><td height="25">Card type</td><td><select name="cardtype_id" id="cardtype_id" size="1"><option value="1">Visa</option>
<option value="2">MasterCard</option>
<option value="3">American Express</option>
</select></td></tr>
<tr><td width="200">Card no</td><td><input type="text" name="card_number" size="30" maxlength="16"></td></tr><tr><td height="25">Expire Date</td><td><select name="exp_month" size="1">
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select> / <select name="exp_year" size="1"><option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
<option value="2016">2016</option>
<option value="2017">2017</option>
<option value="2018">2018</option>
<option value="2019">2019</option>
<option value="2020">2020</option>
<option value="2021">2021</option>
<option value="2022">2022</option>
<option value="2023">2023</option>
</select>
</td></tr><tr><td height="20">Security 3 or 4 digit</td><td><input type="text" name="card_cvc" size="4" maxlength="4">  </td></tr>
<script>
<!--
// Email Validation. Written by PerlScriptsJavaScripts.com
function check_email(e) {
ok = "1234567890qwertyuiop[]asdfghjklzxcvbnm.@-_QWERTYUIOPASDFGHJKLZXCVBNM";
for(i=0; i < e.length ;i++){
if(ok.indexOf(e.charAt(i))<0){ 
return (false);
}	
} 
re = /(@.*@)|(\.\.)|(^\.)|(^@)|(@$)|(\.$)|(@\.)/;
re_two = /^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
if (!e.match(re) && e.match(re_two)) {
return (-1);		
} 
}
// -->
</script>
<script language="javascript">
      
		function check_PDU3F6U3m8db(submit_form) { 
			
			HataMesaji = "";
			Sayac = 0;
			
			
				
			if(submit_form.member_fullname.value==""){
				
				HataMesaji += "- Please enter fullname.\n";
				Sayac++;
			}
		
				
				
			if(submit_form.member_address.value==""){
				
				HataMesaji += "- Please enter delivery address.\n";
				Sayac++;
			}
		
				
				
			if(submit_form.member_city.value==""){
				
				HataMesaji += "- Please enter city.\n";
				Sayac++;
			}
		
				
				
			if(submit_form.member_zip.value==""){
				
				HataMesaji += "- Please enter zip code.\n";
				Sayac++;
			}
		
				
				
			if(isNaN(submit_form.member_zip.value)){

				HataMesaji += "- Incorrect zip code.\n";
				Sayac++;			
	
				
			}
			else
			{
			
			
			
			}
		
				
				
			if(isNaN(submit_form.b_member_zip.value)){

				HataMesaji += "- Incorrect billing zip code.\n";
				Sayac++;			
	
				
			}
			else
			{
			
			
			
			}
		
		
		
			if(HataMesaji != "")
			{
				if(Sayac > 1)
					tmp = "";
				else
					tmp = "";
					
				alert(HataMesaji)
				
			}
			else
			{
					
			submit_form.submit();
			
			}
		
		}      
      
      </script>
<tr><td></td><td height="50"><input style="padding:5px" type="button" value="PAY NOW" onclick="check_PDU3F6U3m8db(this.form)"></td></tr></tbody></table>

</td></tr></form>
</tbody></table></center>
</div>


<? $this->load->view('footer'); ?>