$(document).ready(function() {


$("[data-mask]").each(function() {
        $(this).mask($(this).data("mask"))
    });

});    