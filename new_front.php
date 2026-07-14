<?php 
/*
* Template Name: New_front
*
* 28 March 2016 v2.0 adding infographic
*/ 

 get_header(NF-header);  // get the header for the new front page
 
 ?>
<style scoped>
   /*   h1 { text-align:center;
           font-family: Georgia;
           font-size: 500%;
           display: block;}  */
      #site-title, #site-description {
      	   display: block;} 
/* Search Form */
#branding #searchform {
	position: absolute;
	top: 7.8em;
	right: 7.6%;
	text-align: right;
}
</style>
<!--<h1>U.S. Covered Bonds</h1>-->
</div>
<div id="infogpdf" class="fluidMedia">
  <!-- <object data="http://www.us-covered-bonds.com/wp-content/uploads/2016/03/Covered-Bonds-Infographic.pdf#page=1&view=FitV&toolbar=0&navpanes=0&scrollbar=0" 
           type="application/pdf" 
           width="100%" 
           height="1200"> 

   <p>
     "It appears you don't have a PDF plugin for this browser.  To download this file, <a href="http://www.us-covered-bonds.com/wp-content/uploads/2016/03/Covered-Bonds-Infographic.pdf">click here.</a>
   </p>
   </object>  -->
<iframe src="http://www.us-covered-bonds.com/wp-content/uploads/2016/03/Covered-Bonds-Infographic.pdf#page=1&view=FitV&toolbar=0&navpanes=0&scrollbar=0"  style="display:block; width:100%!important; height:100%!important;" frameborder="0"  seamless name="iframe_a" ></iframe>
</div>
<?php
  get_footer();
 ?>