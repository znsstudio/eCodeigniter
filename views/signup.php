<? 

$this->data['title']="Sign Up";

$this->load->view("header",$data); 

?>

<table  border="0" cellpadding="0" cellspacing="0" height="300" width="100%"> 

<tr>

<form action=/register method=post>

<td height=40 width=250 style=padding-left:30px>

<?

if($this->uri->segment(2)=="signuperror"){

?>

<div style=padding-top:5px;padding-bottom:5px;color:red;font-size:12px>Incorrect email or password</div>

<?

}

?>

<h1>Sign Up</h1>

<table  border="0" cellpadding="0" cellspacing="0" width="500"> 

<tr><td height=35 width=150> Fullname </td> <td> <input type=text name=member_fullname size=30 value="<?=$this->session->userdata('member_fullname')?>"> </td> </tr>

<tr><td height=35> e-mail </td> <td> <input type=text name=member_email size=30 value="<?=$this->session->userdata('member_email')?>"> </td> </tr>

<tr><td height=35> Password </td> <td> <input type=password name=member_pass size=30 value="<?=$this->session->userdata('member_pass')?>"> </td> </tr>

<tr><td height=35>  </td> <td> <input type=submit  value="REGISTER" style="padding:5px"> </td> </tr>

</table>

</td>

</form>

<td valign=top align=right>

<img src=/img/signup.jpg>

</td>

</tr>

</table>


<? $this->load->view("footer"); ?>