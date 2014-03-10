<? $this->load->view("header"); ?>

<font size=2><b>STORE LOCATOR</font>



<p>

<script>

function loadstate(store_state){

 $.post("/storelist",{store_state:store_state, action:'store_state'},function(result){

    $("#store_state").html(result);

  });

}

</script>

<style>

#store_state 

{

width:300px;

height:450px;

overflow:auto;

}



#state_list 

{

width:200px;

height:450px;

overflow:auto;

margin-right:20px;

}



</style>

<table  border="0" cellpadding="0" cellspacing="0"> 



<tr>

			

<td width=100 height=40>



States



</td>



<td width=300 height=40>



Shops / Showrooms



</td>



</tr>



<tr>

			

<td width=100 height=40>



<div id=state_list>

<?

foreach($store_states as $key=>$value){
	
echo "<a href=javascript:loadstate('$value[store_state]')>$value[store_state]</a> <br>";

}

?>

</div>



</td>



<td width=300 height=40>



<div id=store_state>





</div>



</td>



</tr>



</table>



<? $this->load->view("footer"); ?>