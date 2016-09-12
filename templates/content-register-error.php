<?php global $post; ?>
<?php while (have_posts()) : the_post(); ?>
	<?php the_content(); ?>
<?php endwhile; ?>
An error occurred in the PayPal Registration process:
<dl class="dl dl-horizontal">
<?php foreach($_GET as $this_key=>$this_value): ?>
<dt><?php echo $this_key; ?></dt>
<dd><?php echo $this_value; ?></dd>
<?php endforeach; ?>
</dl>