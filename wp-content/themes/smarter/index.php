<?php get_header(); ?>

<!-- Navigation -->
         <div class="sticky-wrap">
            <div id="nav">
               <div class="navbar navbar-default">
                  <div class="container">
                     <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="http://www.smartercensus.com/">
                        <img src="<?php bloginfo('template_directory'); ?>/images/census_logo.jpg" alt=""></a>
                     </div>
                     <div class="collapse navbar-collapse">


<a href="#contact_form_pop"  class="btn btn-border navbar-btn pull-right external fancybox" style="float:right">Get in touch</a>

                   <ul class="nav navbar-nav" id="top-nav">
               
 <li class="active">
                              <a href="#slides">Home</a>
                           </li>
                           <li>
                              <a href="#service">What it does</a>
                           </li>
                           <li>
                              <a href="#work">How it works</a>
                           </li>
                           <li>
                              <a href="#pricing">Check out More</a>
                           </li>
			<li>
                              <a href="#skills">Our Proud Partners</a>
                           </li>
		        




 

  </ul>

        
                        




            
                     <!--/.nav-collapse -->
                  </div>
               </div>
            </div>
            <!-- .nav-wrapper -->
         </div>
         <!-- end:Navigation -->


 <section id="main-wrapp"> 
<section id="head-con">


<?php
$value1=get_post_meta($page_id,page_struct,true);
$value2=get_post_meta($page_id,page_struct_value,true);


	if($value1=="none")
	{

	}
	if($value1=="image")
	{
?>
	<img src="<?php echo $value2; ?>" alt="" width="1600px" height="927px" id="slides"> 

<?php
	}


	
	if($value1=="video")
	{


	$url = $value2;
	preg_match(
        	'/[\\?\\&]v=([^\\?\\&]+)/',
       		 $url,
       		 $matches
   		 );
	$url_id = $matches[1];
 
?>
<div class="row text-center">

<iframe id="fl3" src="//www.youtube.com/embed/<?php echo $url_id; ?>?rel=0;HD=1;showinfo=0;controls=0;yt:stretch=16:9;autoplay=1;" width="1366" height="768" frameborder="0" ></iframe>
	
</div>
<?php
	}

	
	if($value1=="slideshow")
	{
	
	
	echo do_shortcode($value2);
	
	}
/*	else
	{

?>

<!-- start:Slider -->
         <div id="slides">
            <ul class="slides-container">
               <li>
                  <img src="<?php bloginfo('template_directory'); ?>/images/Optimized-census_img_1.jpg" alt="" width="1600px" height="927px">
                  <div class="caption-wrap">
                     <div class="slide-caption">
                       
                        <h1>Not Just Smart Census
                           <br>but
                           <br>Smarter
                        </h1>
                       
                     </div>
                  </div>
                  <!-- .caption wrap -->
               </li>
               <li>
                  <img src="<?php bloginfo('template_directory'); ?>/images/Optimized-census_img_2.jpg" alt="" width="1600px" height="927px">
                  <div class="caption-wrap">
                     <div class="slide-caption">
                       
                        <h2>Co-ordinate the technical and statistical affairs of government</h2>
                       
                     </div>
                  </div>
                  <!-- .caption wrap -->
               </li>
            </ul>
            <nav class="slides-navigation">
               <a href="#" class="next">
               <i class="fa fa-angle-right"></i>
               </a>
               <a href="#" class="prev">
               <i class="fa fa-angle-left"></i>
               </a>
            </nav>
         </div>
         <!-- end:Content -->



	<?php } 


*/
	?>


</section>



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php the_content(__('(more...)')); ?>
 <?php endwhile; else: ?>
<?php _e('Sorry, no posts matched your criteria.'); ?><?php endif; ?>





</section>


<?php get_footer(); ?>