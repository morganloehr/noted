<?php 
/* 
Template Name:Template Blog 
*/

get_header();  ?> 

<a id="back_to_top" href="#">
	<span class="fa-stack">
		<i class="fa fa-arrow-up" style=""></i>
	</span>
</a>
<div class="content " style="min-height: 802px; padding-top: 0px;">
	<div class="content_inner">
		<div class="title_outer title_without_animation" data-height="120">
			<div class="title title_size_small  position_left " style="height:120px;">
				<div class="image not_responsive"></div>
			</div>
		</div>
		<div class="container">
			<div class="container_inner blog_template_holder clearfix"> 
				<div class="search-social-icons clearfix">
					<ul>
						<li>
							<form id="demo-2" role="search" method="get">
								<input type="search" name="s" id="search" placeholder="Search">
							</form>
						</li>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube"></i></a></li>
						<li><a href="#"><i class="fa fa-rss"></i></a></li>
					</ul>
				</div><!--search-social-icons ends-->
				<div class="top-blog-section">
					<div class="full_section_inner clearfix">
						<div class="vc_col-sm-6 large-blog-post">
						<?php 
						$large_blog	= get_theme_mod('noted_blog_large_setting');
						$small_blog1	= get_theme_mod('noted_blog_small_setting1');
						$small_blog2	= get_theme_mod('noted_blog_small_setting2');
						$large_post	=	get_post($large_blog);
						$small_post1	=	get_post($small_blog1);
						$small_post2	=	get_post($small_blog2);
						
						$lrgImg = wp_get_attachment_image_src( get_post_thumbnail_id($large_post->ID),'full',true);
						$smallImg1 = wp_get_attachment_image_src( get_post_thumbnail_id($small_post1->ID),'full',true);
						$smallImg2 = wp_get_attachment_image_src( get_post_thumbnail_id($small_post2->ID),'full',true);
						
						?>
							<article class="format-standard has-post-thumbnail ">
								<div class="post_image" style="background:url('<?php echo $lrgImg[0];?>') no-repeat;">
									<a href="<?php echo get_the_permalink($large_post->ID);?>" target="_self" title="<?php the_title();?> ">
										<!-- <img width="1920" height="1084" src="http://www.notedcontent.com/wp-content/uploads/2015/09/offset_185762.png" class="attachment-full wp-post-image" alt="offset_185762"> -->	
										<?php echo get_the_post_thumbnail($large_post->ID,'full');?>				
									</a>
								</div>
								<div class="post_text">
									<div class="post_text_inner">
										<h5><a href="<?php echo get_the_permalink($large_post->ID);?>" target="_self" title="<?php the_title();?>"><?php echo $large_post->post_title;?></a></h5>
										<p class="post_excerpt"><?php echo $large_post->post_content;?></p>
									</div>
								</div>
							</article> <!--single post ends-->
						</div><!--large-blog-post ends-->
						<div class="vc_col-sm-6 small-blog-post">
							<article class="format-standard has-post-thumbnail ">
								<div class="post_image" style="background:url('<?php echo $smallImg1[0];?>') no-repeat;">
									<a href="<?php echo get_the_permalink($small_post1->ID);?>" target="_self" title="<?php the_title();?> ">
										<!-- <img width="1920" height="1084" src="http://www.notedcontent.com/wp-content/uploads/2015/09/offset_185762.png" class="attachment-full wp-post-image" alt="offset_185762">	 --><?php echo get_the_post_thumbnail($small_post1->ID,'full');?>
									</a>
								</div>
								<div class="post_text">
									<div class="post_text_inner">
										<h5><a href="<?php echo get_the_permalink($small_post1->ID);?>" target="_self" title="<?php the_title();?>"><?php echo $small_post1->post_title;?></a></h5>
										<p class="post_excerpt"><?php echo $small_post1->post_content;?></p>
									</div>
								</div>
							</article> <!--single post ends-->
							<article class="format-standard has-post-thumbnail ">
								<div class="post_image" style="background:url('<?php echo $smallImg2[0];?>') no-repeat;">
									<a href="<?php echo get_the_permalink($small_post2->ID);?>" target="_self" title="<?php the_title();?> ">
										<!-- <img width="1920" height="1084" src="http://www.notedcontent.com/wp-content/uploads/2015/09/offset_185762.png" class="attachment-full wp-post-image" alt="offset_185762">	 -->		<?php echo get_the_post_thumbnail($small_post2->ID,'full');?>	
									</a>
								</div>
								<div class="post_text">
									<div class="post_text_inner">
										<h5><a href="<?php echo get_the_permalink($small_post2->ID);?>" target="_self" title="<?php the_title();?>"><?php echo $small_post2->post_title;?></a></h5>
										<p class="post_excerpt"><?php echo $small_post2->post_content;?></p>
									</div>
								</div>
							</article> <!--single post ends-->

						</div><!--small-blog-post ends-->
					</div>
				</div><!--top-blog-sectione ends-->
				<div class="bottom-blog-section">					
					<div class="full_section_inner clearfix">
						<div class="vc_col-sm-4 practical">
							<h3>Practical How To's</h3>
							<div class="full_section_inner clearfix">
							<?php 
								$i = 1;
								$practical_args = array(
									'post_type' => 'post',
									'posts_per_page'	=> 4,
									'post__not_in'=>array($large_blog,$small_blog1,$small_blog2),
									'tax_query' => array(
										array(
											'taxonomy' => 'category',
											'field'    => 'slug', 
											'terms'    => 'practical'
										),
									),
								);
								$practical_query = new WP_Query( $practical_args ); //echo'<pre>'; print_r($practical_query);
								?>
								<?php while($practical_query->have_posts()):$practical_query->the_post();
									
								?>
								<div class="vc_col-sm-6">
									<article class="format-standard has-post-thumbnail ">
										<div class="post_image">
											<a href="<?php the_permalink();?>" target="_self" title="<?php the_title();?> ">
												<!-- <img width="1920" height="1084" src="http://www.notedcontent.com/wp-content/uploads/2015/09/offset_185762.png" class="attachment-full wp-post-image" alt="offset_185762"> -->	
												<?php echo get_the_post_thumbnail($practical_query->ID,'thumbnail');?>				
											</a>
										</div>
										<div class="post_text">
											<div class="post_text_inner">
												<h5><a href="<?php the_permalink();?>" target="_self" title="<?php the_title();?>"><?php the_title();?></a></h5>
											</div>
										</div>
									</article> <!--single post ends-->
								</div>
							<?php	
								 
								if($i % 2 == 0){
									echo "<div class='clearfix'></div>";
								}
							 $i++; endwhile;?>
								
							</div>
						</div><!--practical ends-->
						<div class="vc_col-sm-4 strategy">
							<h3>Strategy</h3>
							<div class="full_section_inner clearfix">
							<?php 
								$i = 1;
								$strategy_args = array(
									'post_type' => 'post',
									'posts_per_page'	=> 4,
									'post__not_in'=>array($large_blog,$small_blog1,$small_blog2),
									'tax_query' => array(
										array(
											'taxonomy' => 'category',
											'field'    => 'slug',
											'terms'    => 'strategy'
										),
									),
								);
								$strategy_query = new WP_Query( $strategy_args ); 
								?>
								<?php while($strategy_query->have_posts()):$strategy_query->the_post();?>
								<div class="vc_col-sm-6">
									<article class="format-standard has-post-thumbnail ">
										<div class="post_image">
											<a href="<?php the_permalink();?>" target="_self" title="<?php the_title();?> ">
												<!-- <img width="1920" height="1084" src="http://www.notedcontent.com/wp-content/uploads/2015/09/offset_185762.png" class="attachment-full wp-post-image" alt="offset_185762">	 -->		
												<?php echo get_the_post_thumbnail($strategy_query->ID,'thumbnail');?>		
											</a>
										</div>
										<div class="post_text">
											<div class="post_text_inner">
												<h5><a href="<?php the_permalink();?>" target="_self" title="<?php the_title();?>"><?php the_title();?></a></h5>
											</div>
										</div>
									</article> <!--single post ends-->
								</div>
								<?php	
								 
									if($i % 2 == 0){
										echo "<div class='clearfix'></div>";
									}
								 $i++; endwhile;?>
							</div>
						</div><!--strategy ends-->
						<div class="vc_col-sm-4 inspirational">
						<h3>Inspirational anecdotes</h3>
							<div class="full_section_inner clearfix">
							<?php 
								$i = 1;
								$inspirational_args = array(
									'post_type' => 'post',
									'posts_per_page'	=> 4,
									'post__not_in'=>array($large_blog,$small_blog1,$small_blog2),
									'tax_query' => array(
										array(
											'taxonomy' => 'category',
											'field'    => 'slug',
											'terms'    => 'inspirational'
										),
									),
								);
								$inspirational_query = new WP_Query( $inspirational_args ); 
								?>
								<?php while($inspirational_query->have_posts()):$inspirational_query->the_post();?>
								<div class="vc_col-sm-6">
									<article class="format-standard has-post-thumbnail ">
										<div class="post_image">
											<a href="<?php the_permalink();?>" target="_self" title="<?php the_title();?> ">
												<!-- <img width="1920" height="1084" src="http://www.notedcontent.com/wp-content/uploads/2015/09/offset_185762.png" class="attachment-full wp-post-image" alt="offset_185762"> -->
													<?php echo get_the_post_thumbnail($inspirational_query->ID, 'thumbnail');?>							
											</a>
										</div>
										<div class="post_text">
											<div class="post_text_inner">
												<h5><a href="<?php the_permalink();?>" target="_self" title="<?php the_title();?>"><?php the_title();?></a></h5>
											</div>
										</div>
									</article> <!--single post ends-->
								</div>
								<?php									 
									if($i % 2 == 0){
										echo "<div class='clearfix'></div>";
									}
								 $i++; endwhile;?>
							</div>
						</div><!--inspirational ends-->
					</div><!--full_section_inner ends-->
				</div><!--bottom-blog-section ends-->
			</div>
		</div><!--container ends-->
	</div>
</div>

	
<?php get_footer(); ?>