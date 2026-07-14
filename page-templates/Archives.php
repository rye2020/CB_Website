<?php
/*
Template Name: Archives
*/
get_header(); ?>
<style scoped>
    #map-container {
		background: white; 
		width: 100%;}
	#jrmarchive {
		background: white; }
	#secondary {
		background: white; 
		float: right;}
           </style>

<?php the_post(); ?>

<h1 class="entry-title"><?php the_title(); ?></h1>
		
<?php get_search_form(); ?>
<div id="map-container">
	<div id="jmarchive" style="float:left; clear:both; background: white;"> 
		<ul>
			<h1><li>Posts</li></h1> 
                <h2>Archives by Year:</h2>
        <ul>
            <?php wp_get_archives('type=yearly'); ?>
        </ul>
		
		<h2>Archives by Month:</h2>
		<ul>
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
		
		<h2>Archives by Subject:</h2>
		<ul>
			 <?php wp_list_categories(); ?>
		</ul>
		</ul>
 		<ul>
  			<?php wp_list_pages('title_li=Pages-LastModified&sort_column=post_modified&show_date=modified&sort_order=DESC&title_li=<h2>' . __('Pages - Last Modified') . '</h2>&exclude=2287,892,3629,3622,3659,3376,3959'); ?>
		</ul>
		</div>

<?php get_sidebar(); ?>
	</div><!-- #map-container -->

<?php get_footer(); ?>
