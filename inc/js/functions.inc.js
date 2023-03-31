; (function (window, $) {
    "use strict";

    var defaultConfig = {

        container: '#toasts',
        autoDismissDelay: 4000,
        transitionDuration: 500,

    };

    $.toast = function (config) {
        var size = arguments.length;
        var isString = typeof (config) === 'string';

        if (isString && size === 1) {
            config = {
                message: config
            };
        }

        if (isString && size === 2) {
            config = {
                message: arguments[1],
                type: arguments[0]
            };
        }

        return new toast(config);
    };

    var toast = function (config) {
        config = $.extend({}, defaultConfig, config);
        // show "x" or not
        var close = config.autoDismiss ? '' : '&times;';

        // toast template
        var toast = $([
            '<div class="toast ' + config.type + '">',
            '<p>' + config.message + '</p>',
            '<div class="close">' + close + '</div>',
            '</div>'
        ].join(''));

        // handle dismiss
        toast.find('.close').on('click', function () {
            var toast = $(this).parent();

            toast.addClass('hide');

            setTimeout(function () {
                toast.remove();
            }, config.transitionDuration);
        });

        // append toast to toasts container
        $(config.container).append(toast);

        // transition in
        setTimeout(function () {
            toast.addClass('show');
        }, config.transitionDuration);

        // if auto-dismiss, start counting
        if (config.autoDismiss) {
            setTimeout(function () {
                toast.find('.close').click();
            }, config.autoDismissDelay);
        }

        return this;
    };

})(window, jQuery);

/* ---- start demo code ---- */

var count = 1;
var types = ['default', 'error', 'warning', 'info'];

function showToast(e) {
    var data = e;
    $.toast(data);

    /* switch(data.type){
        case 'types':
        $.toast(data.kind, data.msg);
        break;
        case 'html':
        $.toast('<div class="custom-toast"><img src="https://dysfunc.github.io/animat.io/images/ron_burgundy.png"><p>You stay classy San Deigo</p></div>');
        break;

        case 'auto':
        $.toast({
            autoDismiss: true,
            message: 'This is my auto-dismiss toast message'
        });

        break;
        
        default:
        $.toast('Hello there!');
    } */
}
function ajaxCall() {
    this.send = function (data, url, method, success, type) {
        type = 'json';
        var successRes = function (data) {
            success(data);
        }
        var errorRes = function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
        jQuery.ajax({
            url: url,
            type: method,
            data: data,
            success: successRes,
            error: errorRes,
            dataType: type,
            timeout: 120000
        });
    }
}

function locationInfo() {
    var rootUrl = "https://geodata.phplift.net/api/index.php";
    var call = new ajaxCall();
    this.getCities = function (id) {
        jQuery(".cities option:gt(0)").remove();
        var url = rootUrl + '?type=getCities&countryId=' + '&stateId=' + id;
        var method = "post";
        var data = {};
        jQuery('.cities').find("option:eq(0)").html("Please wait..");
        call.send(data, url, method, function (data) {
            jQuery('.cities').find("option:eq(0)").html("Select City");
            var listlen = Object.keys(data['result']).length;
            if (listlen > 0) {
                jQuery.each(data['result'], function (key, val) {
                    var option = jQuery('');
                    option.attr('value', val.name).text(val.name);
                    jQuery('.cities').append(option);
                });
            }
            jQuery(".cities").prop("disabled", false);
        });
    };

    this.getStates = function (id) {
        jQuery(".states option:gt(0)").remove();
        jQuery(".cities option:gt(0)").remove();
        var stateClasses = jQuery('#stateId').attr('class');


        var url = rootUrl + '?type=getStates&countryId=' + id;
        var method = "post";
        var data = {};
        jQuery('.states').find("option:eq(0)").html("Please wait..");
        call.send(data, url, method, function (data) {
            jQuery('.states').find("option:eq(0)").html("Select State");

            jQuery.each(data['result'], function (key, val) {
                var option = jQuery('');
                option.attr('value', val.name).text(val.name);
                option.attr('stateid', val.id);
                jQuery('.states').append(option);
            });
            jQuery(".states").prop("disabled", false);

        });
    };

    this.getCountries = function () {
        var url = rootUrl + '?type=getCountries';
        var method = "post";
        var data = {};
        jQuery('.countries').find("option:eq(0)").html("Please wait..");
        call.send(data, url, method, function (data) {
            jQuery('.countries').find("option:eq(0)").html("Select Country");

            jQuery.each(data['result'], function (key, val) {
                var option = jQuery('<option>');

                option.attr('value', val.name).text(val.name);
                option.attr('countryid', val.id);

                jQuery('.countries').append(option);
            });
            // jQuery(".countries").prop("disabled",false);

        });
    };

}

function AddLogs(_Category,_Event){
    
    $.post("../inc/functions.inc.php", { function_name: "AddLogs",
        Category:_Category,
        Event:_Event
    },(d)=>{});
}