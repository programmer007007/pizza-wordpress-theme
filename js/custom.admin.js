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
};

jQuery(document).ready(function ($) {
    $('section h4').click(function (event) {
        event.preventDefault();
        $(this).addClass('active');
        $(this).siblings().removeClass('active');

        var ph = $(this).parent().height();
        var ch = $(this).next().height();

        if (ch > ph) {
            $(this).parent().css({
                'min-height': ch + 'px'
            });

        } else {
            $(this).parent().css({
                'height': 'auto'
            });

        }
    });

    function tabParentHeight() {
        var ph = $('section').height();
        var ch = $('section ul').height();
        if (ch > ph) {
            $('section').css({
                'height': ch + 'px'
            });

        } else {
            $(this).parent().css({
                'height': 'auto'
            });

        }
    }

    $(window).resize(function () {
        tabParentHeight();
    });
    $(document).resize(function () {
        tabParentHeight();
    });
    tabParentHeight();
    var field = 'from';
    var url = window.location.href;
    const urlParams = new URLSearchParams(window.location.search);
    if (url.indexOf('?' + field + '=') != -1) {
        value = urlParams.get(field);
        $("input:hidden[name=action][value=" + value + "]").parent().parent().parent().prev().click();
    } else if (url.indexOf('&' + field + '=') != -1) {
        value = urlParams.get(field);
        $("input:hidden[name=action][value=" + value + "]").parent().parent().parent().prev().click();
    }
    $("h4").each(function () {
        if ($(this).text() === "Homepage" && !urlParams.has("status")) {
            $(this).click();
        }
    });
    updateQueryStringParam('status', null);
    updateQueryStringParam('from', null);
    var file_frame;
    jQuery('.upload_image_button').on('click', function (event) {
        event.preventDefault();
        var current_obj = $(this);
        // Create the media frame.
        file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Select a image to upload',
            button: {
                text: 'Use this image',
            },
            multiple: false // Set to true to allow multiple files to be selected
        });
        // When an image is selected, run a callback.
        file_frame.on('select', function () {
            // We set multiple to false so only get one image from the uploader
            attachment = file_frame.state().get('selection').first().toJSON();
            // Do something with attachment.id and/or attachment.url here
            if ($(current_obj).attr('data-bind-image-id') !== undefined) {
                $('#' + $(current_obj).attr("data-bind-image-id")).attr('src', attachment.url);
            }
            if ($(current_obj).attr('data-bind-id') !== undefined) {
                $("input:hidden[name=" + $(current_obj).attr("data-bind-id") + "]").val(attachment.id);
            }

        });
        // Finally, open the modal
        file_frame.open();
    });
});
jQuery(document).ready(function ($) {
    var urlParams = new URLSearchParams(window.location.search);
    $(".clear_img").on("click", function () {
        let imgID = $(this).attr("data-bind-id");
        let imgPreviewId = $(this).attr("data-bind-image-id");
        $("#" + imgPreviewId).attr("src", "");
        $("#" + imgID).val("");
    });

});
