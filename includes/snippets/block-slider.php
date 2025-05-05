<?php

$sliderType = block_value('slider_type');

if ($sliderType == 'industry') {
	$relatedPosts = get_field('related_industries');
}
elseif ($sliderType == 'product') {
	$relatedPosts = get_field('related_products');
}
elseif ($sliderType == 'application') {
	$relatedPosts = get_field('related_applications');
}
elseif ($sliderType == 'solution') {
	$relatedPosts = get_field('related_solutions');
}

if ($sliderType == 'solution') {
	$sliderClass = 'slider--tiles__large';
}
else {
	$sliderClass = 'slider--tiles__small';
}
?>

<?php if ($relatedPosts): $i = 0 ?>
	<div class="gb-grid-wrapper slider--ec slider slider--tiles <?= $sliderClass ?> grid--wrapper grid--row <?php block_field('className'); ?>">
		<?php foreach ($relatedPosts as $relatedPost):
			$i++;
			$permalink = get_permalink($relatedPost->ID);
			$title = get_the_title($relatedPost->ID);
			$postId = get_the_ID($relatedPost->ID);
			$image = get_field('slider_teaser-img', $relatedPost->ID) ?: get_the_post_thumbnail_url($relatedPost->ID);
			// fields for solutions
			$teaser = get_field('slider_teaser-text', $relatedPost->ID);
			$list = get_field('slider_list-items', $relatedPost->ID);
			?>

			<div class="gb-grid-column post--<?= $relatedPost->ID; ?> <?= $sliderType ?> type-<?= $sliderType ?>">
				<div class="gb-container slick-slide__inner" <?php if ($sliderClass == 'slider--tiles__small'): ?>style="background-image: url(<?= $image ?>)<?php endif; ?>">
					<a class="gb-container-link" href="<?= $permalink ?>"></a>
					<div class="gb-container slider--tiles__wrapper grid--col">
						<div class="gb-container slider--tiles__svg">
							<?php if ($sliderClass == 'slider--tiles__large'): ?>
								<img src="<?= $image ?>" alt="<?= $title ?>">
							<?php else: ?>
								<svg xmlns="http://www.w3.org/2000/svg" width="400" height="265" viewBox="0 0 400 265">
									<path fill="none"
									      d="M6458-20068h399.55v265H6458z"
									      transform="translate(-6458 20068)"></path>
									<path d="M6858-19803.337h-400v-116.011l400 111.008v5Z"
									      fill="#0097e0"
									      transform="translate(-6458 20068)"></path>
								</svg>
							<?php endif; ?>
						</div>
						<div class="gb-container slider--tiles__text">
							<?php if ($sliderClass == 'slider--tiles__large'): ?>
								<div class="slider--tiles__counter">
									<?= $i ?>
								</div>
							<?php endif; ?>
							<h3 class="gb-headline slider--title gb-headline-text">
								<?= $title ?>
							</h3>
							<?php if ($sliderClass == 'slider--tiles__small'): ?>
								<p class="gb-headline slider--readmore">
									<span class="gb-icon">
										<svg viewBox="0 0 19.287 35"
										     height="1em"
										     width="1em"
										     xmlns="http://www.w3.org/2000/svg">
										<path d="M14.258 17.488.692 3.922a2.136 2.136 0 0 1-.67-1.615A2.293 2.293 0 0 1 .738.692a2.23 2.23 0 0 1 3.23 0L18.18 14.858a3.7 3.7 0 0 1 0 5.26L3.968 34.329A2.164 2.164 0 0 1 2.329 35a2.312 2.312 0 0 1-1.637-.716 2.23 2.23 0 0 1 0-3.23Z"
										      fill="currentColor">
										</path>
										</svg>
									</span>
									<span class="gb-headline-text">
											<a href="<?= $permalink ?>">read more</a>
									</span>
								</p>
							<?php else: ?>
								<p class="slider--teaser">
									<?= $teaser ?>
								</p>
								<div class="slider--list">
									<?= $list ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>
