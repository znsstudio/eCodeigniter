<? $this->load->view("header"); ?>

<?

foreach($page_content as $key=>$value){

echo $value['content_en'];

}

?>

<? $this->load->view("footer"); ?>
