<?
header('Content-Type: application/xml; charset=UTF-8');
echo '<?xml version="1.0"?>';
?>
<rss version="2.0" xmlns:g="http://base.google.com/ns/1.0">
<channel>
<title>YOON NYC</title>
<link>http://www.yoonnyc.com</link>
<description>Yoon sweaters, cashmere sweaters, contemporary sweaters, trendy sweaters, stitches, stripes, casual essentials, pure cashmere, intarsia, pullovers, cardgian, tunics, cashmere, knitwear, sweaters, dresses, contemporary, leggings, hats, scrafs</description>
<?

foreach($static_list as $key=>$value){

$colors = explode(",",$value[static_color]);	

$sizes = explode(",",$value[static_size]);	

$i=1;

foreach($colors as $c=>$color){

foreach($sizes as $s=>$size){

$color_name = $this->Content->sql("select main_en from color_main where id='$color'","main_en");

$size_name = $this->Content->sql("select main_en from size_main where id='$size'",'main_en');

$value[static_cost] = $value[static_cost]*0.70;

echo "<item>

			<title>".trim($value[static_google_name])."</title>
			<link>https://www.yoonnyc.com/product/".$value[static_alias]."</link>
			<description>".strip_tags(trim($value[static_content]))."</description>
			<g:image_link>http://www.yoonnyc.com/files/$value[static_pic]</g:image_link>
			<g:price>".trim($value[static_cost])."</g:price>
			<g:condition>new</g:condition>
			<g:id>$value[unique_code]-$i</g:id>
			<g:availability>in stock</g:availability>
			<g:shipping>
				<g:country>US</g:country>
				<g:service>Standard Rate</g:service>
				<g:price>6 USD</g:price>
			</g:shipping>
			<g:shipping_weight>750 g</g:shipping_weight>
			<g:google_product_category>Apparel &amp; Accessories &gt; Clothing &gt; Shirts &amp; Tops &gt; Sweaters &amp; Cardigans</g:google_product_category>
			<g:gender>Female</g:gender>
			<g:age_group>Adult</g:age_group>
			<g:color>$color_name</g:color>
			<g:size>$size_name</g:size>
			<g:item_group_id>$value[unique_code]</g:item_group_id>
			<g:brand>YOONNYC</g:brand>
			<g:mpn>$value[unique_code]</g:mpn>
			<g:product_type>Apparel &amp; Accessories &gt; Clothing &gt; Shirts &amp; Tops &gt; Sweaters &amp; Cardigans</g:product_type>
			<g:tax>
			   <g:country>US</g:country>
			   <g:region>*</g:region>
			   <g:rate>0.00</g:rate>
			   <g:tax_ship>n</g:tax_ship>
			</g:tax>
</item>";

$i++;

}

}

}

?>

</channel>
</rss>