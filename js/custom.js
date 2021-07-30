var updateQueryStringParam = function (key, value) {
    var baseUrl = [location.protocol, '//', location.host, location.pathname].join(''),
        urlQueryString = document.location.search,
        newParam = key + '=' + value,
        params = '?' + newParam;
    // If the "search" string exists, then build params from it
    if (urlQueryString) {
        updateRegex = new RegExp('([\?&])' + key + '[^&]*');
        removeRegex = new RegExp('([\?&])' + key + '=[^&;]+[&;]?');
        if (typeof value == 'undefined' || value == null || value == '') { // Remove param if value is empty
            params = urlQueryString.replace(removeRegex, "$1");
            params = params.replace(/[&;]$/, "");
        } else if (urlQueryString.match(updateRegex) !== null) { // If param exists already, update it

            params = urlQueryString.replace(updateRegex, "$1" + newParam);

        } else { // Otherwise, add it to end of query string

            params = urlQueryString + '&' + newParam;

        }

    }
    window.history.replaceState({}, "", baseUrl + params);
}
show_message = function (type, message) {
    let success_color = '#23B65D';
    let failed_color = '#E01A31';
    let bg_color = success_color;
    if (type === "failed") {
        bg_color = failed_color;
    }
    jQuery.toast({
        text: message,
        showHideTransition: 'slide',
        bgColor: "#" + bg_color,
        position : 'bottom-center',
        allowToastClose : false,
        hideAfter : 5000,
    })
}
jQuery(document).ready(function ($) {
    $(".add_to_cart_btn").on("click", function () {
        event.preventDefault();
        $.ajax({
            type: 'post',
            url: wc_add_to_cart_params.ajax_url,
            data: {
                action: 'woocommerce_ajax_add_to_cart',
                product_id: $(this).attr("data-product-id"), product_sku: '',
                quantity: $(this).attr("data-product-qnty")
            },
            success: function (response) {
                $(".cart_content_no").text(response["count"]);
                show_message("success", response["message"]);
            }
        });
    });
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get("form") !== "null" && urlParams.get("form") !== null) {
        $('html,body').animate({
            scrollTop: $("#" + urlParams.get("form")).offset().top
        }, 2000);
        updateQueryStringParam('form', null);
    }
    if (urlParams.get("status") !== "null" && urlParams.get("status") !== null) {
        updateQueryStringParam('status', null);
    }
    if (urlParams.get("message") !== "null" && urlParams.get("message") !== null) {
        updateQueryStringParam('message', null);
    }
});
