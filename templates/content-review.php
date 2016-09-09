<?php global $post; ?>
<?php while (have_posts()) : the_post(); ?>
	<?php the_content(); ?>
<?php endwhile; ?>
<?php
$reg_options = array(
					  "reg-gf"=> "IEEE Non-Member Full Conference",
					  "reg-gw"=> "IEEE Non-Member ERROR Workshop",
					  "reg-g1"=> "IEEE Non-Member Mon, Oct. 24 2016",
					  "reg-g2"=> "IEEE Non-Member Tues, Oct. 25 2016",
					  "reg-g3"=> "IEEE Non-Member Weds, Oct. 26 2016",
					  "reg-mf"=> "IEEE Member Full Conference",
					  "reg-mw"=> "IEEE Member ERROR Workshop",
					  "reg-m1"=> "IEEE Member Mon, Oct. 24 2016",
					  "reg-m2"=> "IEEE Member Tues, Oct. 25 2016",
					  "reg-m3"=> "IEEE Member Weds, Oct. 26 2016",
					  "reg-sf"=> "Student IEEE Member Full Conference",
					  "reg-sw"=> "Student IEEE Member ERROR Workshop",
					  "reg-s1"=> "Student IEEE Member Mon, Oct. 24 2016",
					  "reg-s2"=> "Student IEEE Member Tues, Oct. 25 2016",
					  "reg-s3"=> "Student IEEE Member Weds, Oct. 26 2016",
					  "reg-nf"=> "Student Non-Member Full Conference",
					  "reg-nw"=> "Student Non-Member ERROR Workshop",
					  "reg-n1"=> "Student Non-Member Mon, Oct. 24 2016",
					  "reg-n2"=> "Student Non-Member Tues, Oct. 25 2016",
					  "reg-n3"=> "Student Non-Member Weds, Oct. 26 2016",
					  "reg-lf"=> "IEEE Life/Retired Full Conference",
					  "reg-lw"=> "IEEE Life/Retired ERROR Workshop",
					  "reg-l1"=> "IEEE Life/Retired Mon, Oct. 24 2016",
					  "reg-l2"=> "IEEE Life/Retired Tues, Oct. 25 2016",
					  "reg-l3"=> "IEEE Life/Retired Weds, Oct. 26 2016",
					);
$all_reg_options=array();
foreach ($reg_options as $this_option_key=>$this_option){
	if ( $reg_option = get_query_var( $this_option_key ) ) $all_reg_options[$this_option] = $reg_option;
}
// Build description variable for confirmation
$description = array_keys( $all_reg_options ) ;
array_unshift( $description , get_query_var( "badge-affil" ) ) ;
array_unshift( $description , get_query_var( "badge-name" ) ) ;
$description = implode( "::" , $description );
htmlentities($description);
?>
<div class="row">
<div class="col-sm-offset-3 col-sm-6">
<div class="alert alert-info text-center">
<p><big><strong><?php echo get_query_var( "badge-name" ) ;?></strong></big></p>
<p><big><em><?php echo get_query_var( "badge-affil" ) ;?></em></big></p>
</div>
</div>
</div>
<table class="table table-striped">
<tr><th>Registration Option</th><th>Amount</th></tr>
<?php
$total=0;
foreach ($all_reg_options as $this_reg_key=>$this_reg_value){
?>
<tr><td><?php echo $this_reg_key; ?></td>
<td>$<?php echo $this_reg_value; ?></td></tr>
<?php
	$total += $this_reg_value;
} 
$nooptions = ($total) ? "" : "<tr><td colspan='2'>No Options Selected</td></tr>";
echo ($total) ? "" : "<tr><td colspan='2'>No Options Selected</td></tr>";
$disabled = ($total) ? "" : " disabled " ;
?>
</table>

<form id="paypal-total" action="https://payflowlink.paypal.com" method="POST">
<input name="LOGIN" type="hidden" value="Physics" />
<input name="PARTNER" type="hidden" value="PayPal" />
<input name="DESCRIPTION" type="hidden" value="<?php echo $description ;?>" />
<input name="AMOUNT" type="hidden" value="<?php echo $total; ?>" />
<input type="hidden" name="lc" value="US">
<input name="TYPE" type="hidden" value="S" />
<?php 
// Back, Clear, Submit Buttons
?>
<div class="row"><div class="col-sm-4">
<button type="button" class="aligncenter btn btn-sm btn-warning" onclick="window.history.back()"><i class='fa fa-arrow-circle-left' aria-hidden='true'></i> Change Options</button>
</div>
<div class="col-sm-4">
<a href="/register/" class="aligncenter btn btn-sm btn-danger"><i class="fa fa-times-circle" aria-hidden="true"></i> Start Over</a>
</div>
<div class="col-sm-4"><button type="submit" class="aligncenter btn btn-sm btn-info" <?php echo $disabled; ?> ><i class="fa fa-paypal" aria-hidden="true"></i> Pay with PayPal</button>
<img class="aligncenter img-responsive" src="<?php echo get_template_directory_uri() . "/assets/img/paypal-cc-badges-ppmcvdam.png"; ?>" ; ?>
</div>
</div>
 