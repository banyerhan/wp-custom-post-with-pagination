<?php /* Template Name: Blog lists */ ?>
<?php get_header(); ?>

<?php
    $the_query = new WP_Query( array(
        'posts_per_page'=> 7,
        'post_type'=>'post',
        'order' => 'ASC', // add more in here
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1) 
    ); 
?>

<main class="site-content" role="main" itemscope="itemscope" itemprop="mainContentOfPage">
	<div class="entry-content">
	   <?php 
		if (ICL_LANGUAGE_CODE =='mm'): { // it is used for WPML
		   echo '<h1>ဘလော့ဂ်များ</h1>';
		    }
		  elseif (ICL_LANGUAGE_CODE =='en'): {
		  echo '<h1>Blogs</h1>';
		  }
		  endif; ?>
		  
    <div class="row">
   	    <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
	        <div class="column">
	             <?php
                echo '<div class="post-inner">';
			        echo '<h2 class="post-title">';?>
			        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>

			        <?php
			        echo '</h2>';
			        echo '<div class="post-img">'.the_post_thumbnail().'</div>';
			        echo '<div class="post-excerpt">'.the_excerpt().'</div>';
			      ?>
            </div>
        <?php endwhile; ?>
    </div>
			
        <div class="pagni">
			 <?php 
			$big = 9985539251; // need an unlikely integer
			 echo paginate_links( array(
			'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $the_query->max_num_pages
			 ) );
			wp_reset_postdata();
			?>
	   </div>
        
    </div>
</main>

<?php get_footer(); ?>
