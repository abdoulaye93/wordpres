<div class="wrap">
    <?php settings_errors(); ?>

    <form method="post" action="options.php">
        <?php
        settings_fields( 'paydunya_woocommerce_psr_gateway_options_group' );
        do_settings_sections( 'paydunya_woocommerce_psr_gateway' );
        submit_button();
        ?>
    </form>
</div>