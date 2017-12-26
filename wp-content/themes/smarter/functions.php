<?php

/* Navigation */

function register_the_menu() {
    register_nav_menu( 'primary', 'Main Navigation Menu' );
}
add_action( 'init', 'register_the_menu' );



/* Allow SVG */


add_filter('upload_mimes', 'custom_upload_mimes');

function custom_upload_mimes ( $existing_mimes=array() ) {

	// add the file extension to the array

	$existing_mimes['svg'] = 'mime/type';

        // call the modified list of extensions

	return $existing_mimes;

}



/* Custom Meta Box */




add_action('admin_menu', 'my_metabox');


function my_metabox()
{

/*------------------------Image Gallery Uploader--------------------------*/




/*-----------------------------------------------------------------------------------------*/


$page_id=get_the_ID();
$prefix = 'dbt_';
$meta_box = array(
    'id' => 'page_struct',
    'title' => 'Page Structure',
    'page' => 'page',
    'context' => 'normal',
    'priority' => 'high'
        
    );

 add_meta_box($meta_box['id'], $meta_box['title'], 'show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);


	function show_box() 
	{   
	$page_id=get_the_ID();
	$value=get_post_meta($page_id,page_struct,true);


        echo '<script type="text/javascript">
		function changer()
		{
           	var a=document.getElementById("struct").value;
			if(a=="video")
			{
			document.getElementById("video_link1").style.display="inline";
			document.getElementById("video_link2").style.display="inline";
			document.getElementById("image_link1").style.display="none";
			document.getElementById("image_link2").style.display="none";
			document.getElementById("slider_link1").style.display="none";
			document.getElementById("slider_link2").style.display="none";
			document.getElementById("none_link1").style.display="none";
			document.getElementById("none_link2").style.display="none";
			}
			if(a=="image")
			{
			document.getElementById("image_link1").style.display="inline";
			document.getElementById("image_link2").style.display="inline";
			document.getElementById("video_link1").style.display="none";
			document.getElementById("video_link2").style.display="none";
			document.getElementById("slider_link1").style.display="none";
			document.getElementById("slider_link2").style.display="none";
			document.getElementById("none_link1").style.display="none";
			document.getElementById("none_link2").style.display="none";
			}
			if(a=="slideshow")
			{
			document.getElementById("slider_link1").style.display="inline";
			document.getElementById("slider_link2").style.display="inline";
			document.getElementById("video_link1").style.display="none";
			document.getElementById("video_link2").style.display="none";
			document.getElementById("image_link1").style.display="none";
			document.getElementById("image_link2").style.display="none";
			document.getElementById("none_link1").style.display="none";
			document.getElementById("none_link2").style.display="none";
			}
			if(a=="none")
			{
			document.getElementById("none_link1").style.display="inline";
			document.getElementById("none_link2").style.display="inline";
			document.getElementById("video_link1").style.display="none";
			document.getElementById("video_link2").style.display="none";
			document.getElementById("image_link1").style.display="none";
			document.getElementById("image_link2").style.display="none";
			document.getElementById("slider_link1").style.display="none";
			document.getElementById("slider_link2").style.display="none";
			}
		}	
            </script>
        ';
?>
<script type="text/javascript">

jQuery(document).ready(function(jQuery){
 
jQuery('#image_button').click(function(e) {
 e.preventDefault();
 frame = wp.media({
 title : 'Add your title here',
 frame: 'post',
 multiple : true, // set to false if you want only one image
 library : { type : 'image'},
 button : { text : 'Add Image' },
 });
 frame.on('close',function(data) {
 var imageArray = [];
 images = frame.state().get('selection');
 images.each(function(image) {
imageArray.push(image.attributes.url); // want other attributes? Check the available ones with console.log(image.attributes);
 });
 
 jQuery("#imageurls").val(imageArray.join(",")); // Adds all image URL's comma seperated to a text input
});
 frame.open()
});
});
 </script>







<?php
$value1=get_post_meta($page_id,page_struct,true);
$value2=get_post_meta($page_id,page_struct_value,true);


if($value1=="video"){$a='selected="selected"';$a1='';$a2=$value2;}else{$a='';$a1='style="display:none;"';$a2='';}
if($value1=="image"){$b='selected="selected"';$b1='';$b2=$value2;}else{$b='';$b1='style="display:none;"';$b2='';}
if($value1=="slideshow"){$c='selected="selected"';$c1='';$c2=$value2;}else{$c='';$c1='style="display:none;"';$c2='';}
if($value1=="none"){$d='selected="selected"';$d1='';$d2=$value2;}else{$d='';$d1='style="display:none;"';$d2='';}


	echo '<table border="0" cellpadding="5" cellspacing="5">';

 	echo '<tr><td>Header Type:</td><td><select name="struct" id="struct" onchange="changer()">
	<option value="">--Select--</option>
	<option value="video" '.$a.'>Youtube Video</option>
	<option value="image" '.$b.'>Image</option>
	<option value="slideshow" '.$c.'>Slideshow</option>
	<option value="none" '.$d.'>None</option>
	</select></td>
	<td id="video_link1" '.$a1.'>
			Paste the Youtube Video Url
	</td>
	<td id="video_link2" '.$a1.'>
			<input type="text" name="struct_val_video" id="struct_val_video" value="'.$a2.'"/>
	</td>
	<td id="image_link1" '.$b1.'>
			Insert Image/ Video from Gallery
	</td>
	<td id="image_link2" '.$b1.'>
			<input type="text" name="imageurls" id="imageurls" value="'.$b2.'"/>
 			<input type= "button" class="button" name="image_button" id="image_button" value="Add Image(s)" />
	</td>
	<td id="slider_link1" '.$c1.'>
			Paste LayerSlider WP short code
	</td>
	<td id="slider_link2" '.$c1.'>
			<input type="text" name="struct_val_slider" id="struct_val_slider" value="'.$c2.'" />
	</td>
	<td id="none_link1" '.$d1.'>
			Note:
	</td>	
	<td id="none_link2" '.$d1.'>
			Navigation bar will be fixed positioned on top('.$d2.')
	</td>
		</tr>';


	echo '</table>';

	}


add_action('save_post', 'save_metabox_data');



	function save_metabox_data($page_id)
	{
		if(isset($_POST['struct']))
		{
			update_post_meta($page_id,page_struct,$_POST['struct']);

			switch ($_POST['struct']) {
   			case "video":
        		if(isset($_POST['struct_val_video'])){update_post_meta($page_id,page_struct_value,$_POST['struct_val_video']);}
       			 break;
    			case "image":
        		if(isset($_POST['imageurls'])){update_post_meta($page_id,page_struct_value,$_POST['imageurls']);}
       			 break;
    			case "slideshow":
        		if(isset($_POST['struct_val_slider'])){update_post_meta($page_id,page_struct_value,$_POST['struct_val_slider']);}
       			 break;
			case "none":
			update_post_meta($page_id,page_struct_value,"no header");
       			 break;
			}
		
		}


	}



}



?>
