<h4>Shop Images</h4>
<ul>
    <li class="p-2 basic_frm_holder">
        <?php wp_enqueue_media(); ?>
        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
            <input type="hidden" name="action" value="shop_img_form">
            <table class="form-table basic_frm" role="presentation">
                <tbody>
                <tr>
                    <th scope="row">
                        <label for="opt_open_from">Slider Status</label>
                    </th>
                    <td>
                        <input type="radio" class="w-auto" name="opt_shop_img_status"
                            <?php print_radio_status('opt_shop_img_status', "1", true); ?> value="1">
                        <label><?php echo __("Enable", DOMAIN); ?></label><br>
                        <input type="radio" class="w-auto" name="opt_shop_img_status"
                            <?php print_radio_status('opt_shop_img_status', "0"); ?> value="0">
                        <label><?php echo __("Disabled", DOMAIN); ?></label><br>
                    </td>
                </tr>
                <?php foreach (range(1, 4) as $item) { ?>
                <tr>
                    <th scope="row">
                        <label for="opt_open_from">Shop Image <?php echo $item; ?></label>
                    </th>
                    <td>
                        <img id='shop-preview-<?php echo $item; ?>' style="width: 50%;"
                             src='<?php echo wp_get_attachment_url(get_theme_options("opt_shop_img_id_" . $item)); ?>'
                        >
                        <input data-bind-id="opt_shop_img_id_<?php echo $item; ?>"
                               data-bind-image-id="shop-preview-<?php echo $item; ?>"
                               type="button"
                               class="button upload_image_button w-auto"
                               value="<?php _e('Upload image'); ?>"/>
                        <input type='hidden' name='opt_shop_img_id_<?php echo $item; ?>'
                               value='<?php echo get_theme_options("opt_shop_img_id_" . $item); ?>'>
                        <button class="button button-primary clear_img"
                                type="button"
                                data-bind-id="opt_shop_img_id_<?php echo $item; ?>"
                                data-bind-image-id="shop-preview-<?php echo $item; ?>">Clear</button>
                    </td>
                    <?php } ?>
                </tbody>
            </table>
            <p class="submit"><input type="submit" class="button button-primary"
                                     value="Save Shop Images"></p>
        </form>
    </li>
</ul>
