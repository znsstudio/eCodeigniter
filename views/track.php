<? $this->load->view('header'); ?>

<div id="mine">
<table border="0" cellpadding="0" cellspacing="0" width="400">
<form name="myform" action="/track" method="POST" enctype="multipart/form-data">
<tbody><tr><td colspan="2" height="50"><b><font size="3" face="arial">Check order status</font></b></td></tr>
<tr><td height="25">Order number</td><td><input type="text" name="transaction_id" id="transaction_id" size="30" value=""> </td></tr>
<tr><td width="250" height="30"></td><td height="25"> enter below code to right box</td></tr>
<tr><td height="25"><img src="http://www.yoonnyc.com/pic_captcha.php"></td><td><input type="text" name="captcha_code" id="captcha_code" size="30" value=""> </td></tr>
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
      
		function check_5Bkz1z4aexK4(submit_form) { 
			
			HataMesaji = "";
			Sayac = 0;
			
			
				
			if(submit_form.transaction_id.value==""){
				
				HataMesaji += "- Please enter order number to continue.\n";
				Sayac++;
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
<tr><td></td><td height="50"><input style="padding:5px" type="button" value="check order" onclick="check_5Bkz1z4aexK4(this.form)"></td></tr></tbody></table>

</form>

<p>

<?=$msg?>

</div>

<? $this->load->view('footer'); ?>