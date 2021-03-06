<?php
/**
 * Credit Card - Checkout form.
 *
 * @author  EBANX.com
 * @package WooCommerce_EBANX/Templates
 * @version 2.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<div id="ebanx-credit-cart-form" class="ebanx-payment-container ebanx-language-<?php echo $language ?>">
    <section class="ebanx-form-row">
    	<?php if (!empty($cards)): ?>
    		<?php foreach ($cards as $k => $card): ?>
                <div class="ebanx-credit-card-option">
                    <label class="ebanx-credit-card-label">
        				<input type="radio" <?php if ($k===0): ?>checked="checked"<?php endif; ?> class="input-radio <?php echo trim($card->brand . "-" . $card->masked_number); ?>" value="<?php echo $card->token; ?>" name="ebanx-credit-card-use" />
        				<span class="ebanx-credit-card-brand">
                            <img src="<?php echo PLUGIN_DIR_URL . "assets/images/icons/$card->brand.png" ?>" height="20" style="height: 20px; margin-left: 0; margin-right: 7px; float: none;" alt="<?php echo $card->brand ?>">
                        </span>
                        <span class="ebanx-credit-card-bin">&bull;&bull;&bull;&bull; <?php echo substr($card->masked_number, -4) ?></span>
        			</label>
                    <div class="clear"></div>
        			<div class="ebanx-container-credit-card" style="<?php if ($k!==0): ?>display: none;<?php endif; ?>">
        				<section class="ebanx-form-row">
        					<section class="ebanx-form-row">
        					    <label for="ebanx-card-cvv"><?php _e('Código de verificación', 'woocommerce-gateway-ebanx') ?> <span class="required">*</span></label>

            					<input class="input-text wc-credit-card-form-card-cvc" type="text" autocomplete="off" placeholder="<?php _e('CVV', 'woocommerce-gateway-ebanx');?>" style="float: none;" />
            					<input type="hidden" autocomplete="off" value="<?php echo $card->brand; ?>" class="ebanx-card-brand-use" />
            					<input type="hidden" autocomplete="off" value="<?php echo $card->masked_number; ?>" class="ebanx-card-masked-number-use" />
        					</section>

                            <?php include WC_EBANX::get_templates_path() . '/instalments.php'; ?>
        				</section>
        			</div>
                </div>
    		<?php endforeach;?>

            <div class="ebanx-credit-card-option">
                <label class="ebanx-credit-card-label">
        			<input type="radio" class="input-radio" value="new" <?php if (empty($cards)): ?>checked="checked"<?php endif; ?> name="ebanx-credit-card-use"> <?php _e('Otra tarjeta de crédito', 'woocommerce-gateway-ebanx'); ?>
                </label>
    			<div class="ebanx-container-credit-card" id="ebanx-container-new-credit-card" style="<?php if (!empty($cards)): ?>display: none;<?php endif; ?>">
    				<?php include_once 'card-template.php';?>
    			</div>
            </div>
    	<?php else: ?>
            <div id="ebanx-container-new-credit-card">
        		<?php include_once 'card-template.php';?>
            </div>
    	<?php endif;?>
    </section>
</div>
