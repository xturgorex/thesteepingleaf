<?php
/**
 * Single product short description
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post;

if ( ! $post->post_excerpt ) return;
?>
<div itemprop="description">
	<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
</div>
<div class="meta-info ingredients"><span class="meta-key ingredients"><img src="/wp-content/themes/store-child-01/images/ingredients.png"</span><span class="meta-value ingredients"> <?php
$ingredientsvalues = get_the_terms( $product->id, 'pa_ingredients');

      foreach ( $ingredientsvalues as $ingredientsvalue ) {
       echo $ingredientsvalue->name;
        }
?></span></div>
<div id="variety-caffeine"><div class="meta-info variety"><span class="meta-key variety">Variety</span><span class="meta-value variety"> <?php
$varietyvalues = get_the_terms( $product->id, 'pa_variety');

      foreach ( $varietyvalues as $varietyvalue ) {
       echo $varietyvalue->name;
        }
?></span></div>
<div class="meta-info caffeine"><span class="meta-key caffeine">Caffeine</span><img class="meta-value caffeine" src="/wp-content/themes/store-child-01/images/caff-<?php
$caffeinevalues = get_the_terms( $product->id, 'pa_caffeine');

      foreach ( $caffeinevalues as $caffeinevalue ) {
       echo $caffeinevalue->name;
        }
?>.png"></div></div>
<div id="steeptime-price"><div class="meta-info steep-time"><span class="meta-key steep-time">Steep Time</span><span class="meta-value steep-time"> <?php
$steeptimevalues = get_the_terms( $product->id, 'pa_steep-time');

      foreach ( $steeptimevalues as $steeptimevalue ) {
       echo $steeptimevalue->name;
        }
?></span></div>



	<div class="meta-info pricetag"><span class="meta-key pricetag">Price</span></div>


</div>