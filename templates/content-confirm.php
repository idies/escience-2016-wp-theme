<?php global $post; ?>
<?php while (have_posts()) : the_post(); ?>
	<?php the_content(); ?>
<?php endwhile; ?>
<p class="lead">Thank you for Registering for the 2016 eScience Conference in Baltimore, MD. Please check your email for your PayPal receipt. If any issues arise, please contact the <a href="mailto:escience-2016-info@lists.johnshopkins.edu" target="_blank"><strong>eScience helpdesk</strong></a> and include your Paypal transaction ID.</p>
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
<div class="well well-sm text-center">
<?php
$description = get_query_var( 'DESCRIPTION' );
html_entity_decode ( $description );
echo implode("<br>" , ( explode( "::" , $description ) ) );
?>
</div>
</div>
</div>