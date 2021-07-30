<h4 class="active">Homepage</h4>
<ul>
    <li class="p-2 basic_frm_holder">
        <?php wp_enqueue_media(); ?>
        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
            <input type="hidden" name="action" value="homepage_form">
            <table class="form-table basic_frm" role="presentation">
                <tbody>
                <tr>
                    <th scope="row">
                        <label for="opt_welcome_img">Welcome Image</label>
                    </th>
                    <td>

                        <img id='welcome-image-preview' style="width: 50%;"
                             src='<?php echo wp_get_attachment_url(get_theme_options("opt_welcome_img_id")); ?>'
                        >
                        <input data-bind-id="opt_welcome_img_id" data-bind-image-id="welcome-image-preview"
                               type="button"
                               class="button upload_image_button w-auto"
                               value="<?php _e('Upload image'); ?>"/>
                        <input type='hidden' name='opt_welcome_img_id'
                               value='<?php echo get_theme_options("opt_welcome_img_id"); ?>'>
                        <button class="button button-primary clear_img"
                                type="button"
                                data-bind-id="opt_welcome_img_id" data-bind-image-id="welcome-image-preview">Clear
                        </button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="opt_welcome_heading">Welcome Heading</label>
                    </th>
                    <td>
                        <input type="text" name="opt_welcome_heading"
                               value="<?php echo get_theme_options("opt_welcome_heading"); ?>"
                               placeholder="Welcome to Pizza World Restaurant" required/>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="opt_welcome_desc">Welcome Description</label>
                    </th>
                    <td>
                        <textarea rows="10" placeholder="Pizza World Desc" required
                                  name="opt_welcome_desc"><?php echo get_theme_options("opt_welcome_desc"); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="opt_menu_list_status">Menu List Status</label>
                    </th>
                    <td>
                        <input type="radio" class="w-auto" name="opt_menu_list_status"
                            <?php print_radio_status('opt_menu_list_status', "1", true); ?> value="1">
                        <label><?php echo __("Enable", DOMAIN); ?></label><br>
                        <input type="radio" class="w-auto" name="opt_menu_list_status"
                            <?php print_radio_status('opt_menu_list_status', "0"); ?> value="0">
                        <label><?php echo __("Disabled", DOMAIN); ?></label><br>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="opt_open_from">Blog HomePg Status</label>
                    </th>
                    <td>
                        <input type="radio" class="w-auto" name="opt_blog_home_status"
                            <?php print_radio_status('opt_blog_home_status', "1", true); ?> value="1">
                        <label><?php echo __("Enable", DOMAIN); ?></label><br>
                        <input type="radio" class="w-auto" name="opt_blog_home_status"
                            <?php print_radio_status('opt_blog_home_status', "0"); ?> value="0">
                        <label><?php echo __("Disabled", DOMAIN); ?></label><br>
                    </td>
                </tr>
                <tr>

                <tr>
                    <th scope="row">
                        <label for="opt_blog_heading">Blog Heading</label>
                    </th>
                    <td>
                        <input type="text" name="opt_blog_heading"
                               value="<?php echo get_theme_options("opt_blog_heading"); ?>"
                               placeholder="Recent From Blog" required/>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="opt_blog_desc">Blog Description</label>
                    </th>
                    <td>
                        <textarea rows="10" placeholder="Short Desc" required
                                  name="opt_blog_desc"><?php echo get_theme_options("opt_blog_desc"); ?></textarea>
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label for="opt_about_desc">About US</label>
                    </th>
                    <td>
                        <textarea rows="10" placeholder="About us Desc" required
                                  name="opt_about_desc"><?php echo get_theme_options("opt_about_desc"); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="opt_popular_sect_status">Popular Section Status</label>
                    </th>
                    <td>
                        <input type="radio" class="w-auto" name="opt_popular_sect_status"
                            <?php print_radio_status('opt_popular_sect_status', "1", true); ?> value="1">
                        <label><?php echo __("Enable", DOMAIN); ?></label><br>
                        <input type="radio" class="w-auto" name="opt_popular_sect_status"
                            <?php print_radio_status('opt_popular_sect_status', "0"); ?> value="0">
                        <label><?php echo __("Disabled", DOMAIN); ?></label><br>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="opt_popular_heading">Popular Heading</label>
                    </th>
                    <td>
                        <input type="text" name="opt_popular_heading"
                               value="<?php echo get_theme_options("opt_popular_heading"); ?>"
                               placeholder="Our Menu Pricing" required/>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="opt_popular_desc">Popular Description</label>
                    </th>
                    <td>
                        <textarea rows="10" placeholder="Popular Desc" required
                                  name="opt_popular_desc"><?php echo get_theme_options("opt_popular_desc"); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="opt_menu_heading">Menu Heading</label>
                    </th>
                    <td>
                        <input type="text" name="opt_menu_heading"
                               value="<?php echo get_theme_options("opt_menu_heading"); ?>"
                               placeholder="Our Menu Pricing" required/>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="opt_menu_desc">Menu Description</label>
                    </th>
                    <td>
                        <textarea rows="10" placeholder="Popular Desc" required
                                  name="opt_menu_desc"><?php echo get_theme_options("opt_menu_desc"); ?></textarea>
                    </td>
                </tr>
                <?php foreach (range(1, 4) as $item) { ?>
                    <tr>
                        <th scope="row">
                            <label for="opt_stat_<?php echo $item; ?>_icon">Stat <?php echo $item; ?> Icon</label>
                        </th>
                        <td>
                            <input type="text" placeholder="Stat <?php echo $item; ?> Icon" required
                                   name="opt_stat_<?php echo $item; ?>_icon"
                                   value='<?php echo get_theme_options("opt_stat_" . $item . "_icon"); ?>'/>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="opt_stat_<?php echo $item; ?>_name">Stat <?php echo $item; ?> Name</label>
                        </th>
                        <td>
                            <input type="text" placeholder="Stat <?php echo $item; ?> Name" required
                                   name="opt_stat_<?php echo $item; ?>_name"
                                   value='<?php echo get_theme_options("opt_stat_" . $item . "_name"); ?>'/>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="opt_stat_<?php echo $item; ?>_count">Stat <?php echo $item; ?> Count</label>
                        </th>
                        <td>
                            <input type="text" placeholder="Stat <?php echo $item; ?> Count" required
                                   name="opt_stat_<?php echo $item; ?>_count"
                                   value='<?php echo get_theme_options("opt_stat_" . $item . "_count"); ?>'/>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <p class="submit"><input type="submit" class="button button-primary"
                                     value="Save Content"></p>
        </form>
    </li>
</ul>