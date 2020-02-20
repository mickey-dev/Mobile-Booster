<?php 

/* Template Name: How it Works */

get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div id="page-how">
	<div id="area-covered">
		<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 title">
				<?php echo the_content(); ?>
			</div>

			<div class="col-xs-12 col-sm-12 content">
			<?php 

			$data1 = get_post_meta( get_the_ID(), 'the_group1', false );

			if ($data1) { ?>
				<div class="col-xs-12 col-sm-6 item satu">
				<?php 

				foreach ( $data1 as $data ) { ?>

			        <div class="image">
			        	<?php
				    		$image =  $data['image'];
					        $img_url = wp_get_attachment_url( $image );
					        printf('<img src="%s" alt="">', $img_url);
				        ?> 
			        </div>

					<div class="title"> <?php echo $data['title'] ?> </div>
					<div class="desc"> <?php echo $data['desc'] ?> </div>

					<?php }
				?>
				</div>
			<?php }

			$data2 = get_post_meta( get_the_ID(), 'the_group2', false );

			if (data2) { ?>
				<div class="col-xs-12 col-sm-6 item dua">
				<?php 

				foreach ( $data2 as $data ) { ?>

					<div class="image">
						<?php
							$image =  $data['image'];
					        $img_url = wp_get_attachment_url( $image );
					        printf('<img src="%s" alt="">', $img_url); 
				        ?>
					</div>

					<div class="title"> <?php echo $data['title'] ?> </div>
					<div class="desc"> <?php echo $data['desc'] ?> </div>

					<?php }
				?>

				</div>
			<?php }

			?>
			</div>
		</div>
	</div>	
	</div>

	<?php how_it_works(); ?>

</div>
<?php endwhile; endif; ?>

<style>
	.btn-see { display: none !important;  }
	.btn-shop { display: block !important;  }
</style>

<?php get_footer(); ?>

