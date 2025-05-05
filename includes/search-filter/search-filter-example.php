<?php
/**
 * Search & Filter Pro
 *
 * Sample Results Template
 *
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      https://searchandfilter.com
 * @copyright 2018 Search & Filter
 *
 * Note: these templates are not full page templates, rather
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think
 * of it as a template part
 *
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs
 * and using template tags -
 *
 * http://codex.wordpress.org/Template_Tags
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $query->have_posts() ) {
	?>
	
	<!-- Found <?php // echo $query->found_posts; ?> Results<br />
	Seite <?php // echo $query->query['paged']; ?> of <?php // echo $query->max_num_pages; ?><br /> -->
	
	<!-- <div class="pagination">
		
		<div class="nav-previous"><?php // next_posts_link( 'Weiter', $query->max_num_pages ); ?></div>
		<div class="nav-next"><?php // previous_posts_link( 'Zurück' ); ?></div>
		<?php 
			/* example code for using the wp_pagenavi plugin */
		// if ( function_exists( 'wp_pagenavi' ) ) {
			// echo '<br />';
			// wp_pagenavi( array( 'query' => $query ) );
		//}
		?>
	</div>
	-->
	<?php
	while ( $query->have_posts() ) {
		$query->the_post();

		$post_id = get_the_ID();
		$file = get_field("file", $post_id);

		$subtype = $file["subtype"];
		// $filesize = round($file["filesize"]/1000000, 1)." MB";
		$filesize = round($file["filesize"]/1024,0)." KB";
		$download = $file["url"];

		?>
			<div class="search-filter--wrapper">
				<div class="file-wrapper <? echo($subtype) ?>">
					<div class="file-title">
						<h2>
							<!--<a href="<?php // the_permalink(); ?>">-->
							<?php the_title(); ?>
							<!--</a>-->
						</h2>
					</div>
					<span class="file-size">
						<p><? echo($filesize); ?></p>
					</span>
					<div class="file-download avia-button-wrap">
						<a href="<? echo($download); ?>" class="noLightbox avia-button avia-icon_select-yes-left-icon avia-size-small avia-position-left avia-color-theme-color" download>
								<span class="avia_button_icon avia_button_icon_left" aria-hidden="true" data-av_icon="" data-av_iconfont="entypo-fontello"></span>
								<span class="avia_iconbox_title">Download</span>
						</a>
					</div>
				</div>
			</div>
		
<!--		<hr />-->
		<?php
	}
	?>
	<div class="pagination">
		<div class="pagination_page">
			Seite <?php echo $query->query['paged']; ?> von <?php echo $query->max_num_pages; ?><br />
		</div>
		<div class="pagination_controls">
			<div class="nav-previous"><?php next_posts_link( 'Zurück', $query->max_num_pages ); ?></div>
			<div class="nav-next"><?php previous_posts_link( 'Weiter' ); ?></div>
			<?php
				/* example code for using the wp_pagenavi plugin */
			if ( function_exists( 'wp_pagenavi' ) ) {
				echo '<br />';
				wp_pagenavi( array( 'query' => $query ) );
			}
			?>
		</div>
	</div>
	<?php
} else {
	echo 'Es wurden keine Suchergebnisse gefunden';
}
?>
