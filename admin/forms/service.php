<h4>Services</h4>
<ul>
    <li class="p-2 basic_frm_holder">
        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
            <input type="hidden" name="action" value="services_form">
            <table class="form-table basic_frm" role="presentation">
                <tbody>
                <tr>
                    <th scope="row">
                        <label for="opt_open_from">Services Wrapper</label>
                    </th>
                    <td>
                        <input type="radio" class="w-auto" name="opt_service_status"
                            <?php print_radio_status('opt_service_status', "1", true); ?> value="1">
                        <label><?php echo __("Enable", DOMAIN); ?></label><br>
                        <input type="radio" class="w-auto" name="opt_service_status"
                            <?php print_radio_status('opt_service_status', "0"); ?> value="0">
                        <label><?php echo __("Disabled", DOMAIN); ?></label><br>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="opt_open_from">Services Wrapper</label>
                    </th>
                    <td>
                        <input class="mb-2p" type="text" name="opt_service_topic_heading"
                               value="<?php echo get_theme_options("opt_service_topic_heading"); ?>"
                               placeholder="Eg: Our Services">
                        <textarea rows="3" class="mb-2p"
                                  name="opt_service_topic_sub_heading"
                                  placeholder="Eg:Far far away, behind the word mountains, far from the countries
                                  Vokalia and Consonantia, there live the blind
                                  texts."><?php echo get_theme_options("opt_service_topic_sub_heading"); ?></textarea>
                    </td>
                </tr>

                <?php foreach (range(1, 3) as $item) { ?>
                    <tr>
                        <th scope="row">
                            <label for="opt_open_from">Service <?php echo $item; ?></label>
                        </th>
                        <td>
                            <input class="mb-2p" type="text" name="opt_service_icon_<?php echo $item; ?>"
                                   value="<?php echo get_theme_options("opt_service_icon_" . $item) ?>"
                                   placeholder="Icon Code Eg:flaticon-diet">
                            <input class="mb-2p" type="text" name="opt_service_h1_<?php echo $item; ?>"
                                   value="<?php echo get_theme_options("opt_service_h1_" . $item) ?>"
                                   placeholder="Icon Code Eg:HEALTHY FOODS">
                            <textarea class="mb-2p" type="text" name="opt_service_s1_<?php echo $item; ?>"
                                      placeholder="Eg:Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic."><?php echo get_theme_options("opt_service_s1_" . $item) ?>
                            </textarea>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <p class="submit"><input type="submit" class="button button-primary"
                                     value="Save Services"></p>
        </form>
    </li>
</ul>
