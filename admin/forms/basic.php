<h4>Basics</h4>
<ul>
    <li class="p-2 basic_frm_holder">
        <?php wp_enqueue_media(); ?>
        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
            <input type="hidden" name="action" value="basic_form">
            <table class="form-table basic_frm" role="presentation">
                <tbody>
                <tr>
                    <th scope="row">
                        <label for="opt_site_name">Site Name</label>
                    </th>
                    <td>
                        <input type="text" name="opt_site_name"
                               value="<?php echo get_theme_options("opt_site_name"); ?>"
                               placeholder="Short Site Name [Hint: Pizza Hut]" required/>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="opt_site_email">Site Email</label>
                    </th>
                    <td>
                        <input type="email" name="opt_site_email"
                               value="<?php echo get_theme_options("opt_site_email"); ?>"
                               placeholder="Site Email Id [Hint:Shown on the site]" required/>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="opt_admin_email">Admin Email</label>
                    </th>
                    <td>
                        <input type="email" name="opt_admin_email"
                               value="<?php echo get_theme_options("opt_admin_email"); ?>"
                               placeholder="Admin Email Id [Hint:Form mails will land here.]" required/>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="opt_org_address">Organisation Address</label>
                    </th>
                    <td>
                                    <textarea name="opt_org_address"
                                              placeholder="Organisation Address"><?php echo get_theme_options("opt_org_address"); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="opt_phone_no">Phone No</label>
                    </th>
                    <td>
                        <input type="text" name="opt_phone_no"
                               value="<?php echo get_theme_options("opt_phone_no"); ?>"
                               placeholder="Eg:(+1) 234-456-7890 | Use for Display Purpose" required/>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="opt_phone_no_pain_plain">Phone No</label>
                    </th>
                    <td>
                        <input type="text" name="opt_phone_no_pain_plain"
                               value="<?php echo get_theme_options("opt_phone_no_pain_plain"); ?>"
                               placeholder="Eg:234-456-7890 | Used For Dialing Purpose" required/>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="opt_timing_desc">Phone Light Desc</label>
                    </th>
                    <td>
                        <input type="text" name="opt_timing_desc"
                               value="<?php echo get_theme_options("opt_timing_desc"); ?>"
                               placeholder="Eg:Available 24/7" required/>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="opt_open_from">Open From</label>
                    </th>
                    <td>
                        <input type="text" name="opt_open_from"
                               value="<?php echo get_theme_options("opt_open_from"); ?>"
                               placeholder="Eg:Monday-Friday" required/>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="opt_timing_from">Timing From</label>
                    </th>
                    <td>
                        <input type="text" name="opt_timing_from"
                               value="<?php echo get_theme_options("opt_timing_from"); ?>"
                               placeholder="Eg:08:00am - 09:00pm" required/>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="opt_open_from">Website Tab Icon</label>
                    </th>
                    <td>
                        <img id='tab-icon-preview' style="width: 50%;"
                             src='<?php echo wp_get_attachment_url(get_theme_options("opt_ico_img_id")); ?>'
                        >
                        <input data-bind-id="opt_ico_img_id" data-bind-image-id="tab-icon-preview"
                               type="button"
                               class="button upload_image_button w-auto"
                               value="<?php _e('Upload image'); ?>"/>
                        <input type='hidden' id="opt_ico_img_id" name='opt_ico_img_id'
                               value='<?php echo get_theme_options("opt_ico_img_id"); ?>'>
                        <button class="button button-primary clear_img"
                                data-bind-id="opt_ico_img_id" type="button"
                                data-bind-image-id="tab-icon-preview">Clear</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="opt_open_from">Text Logo</label>
                    </th>
                    <td>
                        <input type="text" name="opt_text_logo"
                               value="<?php echo get_theme_options("opt_text_logo"); ?>"
                               placeholder="Eg:Pizza Delecious" required/>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="opt_open_from">Logo</label>
                    </th>
                    <td>
                        <input type='hidden' name='image_attachment_id' id='image_attachment_id' value=''>
                        <img id='image-preview'
                             src='<?php echo wp_get_attachment_url(get_theme_options("opt_logo_img_id")); ?>'
                        >
                        <input data-bind-id="opt_logo_img_id" data-bind-image-id="image-preview"
                               type="button" style="width: 50%;"
                               class="button upload_image_button w-auto"
                               value="<?php _e('Upload image'); ?>"/>
                        <input type='hidden' name='opt_logo_img_id'
                               value='<?php echo get_theme_options("opt_logo_img_id"); ?>'>
                        <button class="button button-primary clear_img"
                                type="button"
                                data-bind-id="opt_logo_img_id"
                                data-bind-image-id="image-preview">Clear</button>

                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="opt_org_loc_no">Phone No</label>
                    </th>
                    <td>
                        <input type="text" name="opt_org_loc_no"
                               value="<?php echo get_theme_options("opt_org_loc_no"); ?>"
                               placeholder="Eg:Google Map Link" required/>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="opt_twitter_lnk">Twitter Page</label>
                    </th>
                    <td>
                        <input type="text" name="opt_twitter_lnk"
                               value="<?php echo get_theme_options("opt_twitter_lnk"); ?>"
                               placeholder="Eg:Twitter Page" required/>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="opt_facebook_lnk">Facebook Page</label>
                    </th>
                    <td>
                        <input type="text" name="opt_facebook_lnk"
                               value="<?php echo get_theme_options("opt_facebook_lnk"); ?>"
                               placeholder="Eg:Facebook Page" required/>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="opt_insta_lnk">Instagram Page</label>
                    </th>
                    <td>
                        <input type="text" name="opt_insta_lnk"
                               value="<?php echo get_theme_options("opt_insta_lnk"); ?>"
                               placeholder="Eg:Instagram Page" required/>
                    </td>
                </tr>


                </tbody>
            </table>
            <p class="submit"><input type="submit" class="button button-primary"
                                     value="Save Settings"></p>
        </form>
</ul>