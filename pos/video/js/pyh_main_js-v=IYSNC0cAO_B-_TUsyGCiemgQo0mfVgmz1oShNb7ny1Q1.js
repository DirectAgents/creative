function CreateChart() {
    if (typeof loadCrimeChart != "undefined" && loadCrimeChart && typeof AmCharts != "undefined" && AmCharts) {
        var t, n, i = crimeData;
        AmCharts.ready(function() {
            t = new AmCharts.AmPieChart;
            t.dataProvider = i;
            t.titleField = "crime";
            t.valueField = "occurences";
            t.colors = ["#3AB9D2", "#8A0C68", "#303678", "#A8D61A"];
            t.labelRadius = 10;
            t.labelText = "[[percents]]%";
            n = new AmCharts.AmLegend;
            n.align = "center";
            n.markerType = "square";
            n.labelText = "[[title]]:";
            n.valueAlign = "left";
            n.valueWidth = 20;
            n.textClickEnabled = !0;
            t.addLegend(n);
            n.clickTimeout = 0;
            n.lastClick = 0;
            n.doubleClickDuration = 300;
            n.doSingleClick = function() {
                return !1
            };
            n.doDoubleClick = function() {
                return !1
            };
            n.myClickHandler = function(t) {
                var i = (new Date).getTime();
                i - n.lastClick < n.doubleClickDuration ? (n.clickTimeout && clearTimeout(n.clickTimeout), n.lastClick = 0, n.doDoubleClick(t)) : n.clickTimeout = setTimeout(function() {
                    n.doSingleClick(t)
                }, n.doubleClickDuration);
                n.lastClick = i
            };
            n.addListener("clickLabel", n.myClickHandler);
            t.write("chartCrime")
        })
    }
}

function ShowError(n, t) {
    if ($("#error-modal").length > 0) {
        var i = $("#error-modal");
        i.find("#error-title").html(n);
        i.find("#error-content").html(t);
        $("#error-modal").modal("show")
    }
}

function PostGTMEvent(n, t) {
    dataLayer && dataLayer.push({
        event: n + (t == "" ? "Success" : "Error"),
        errorData: t
    })
}

function executeFunctionByName(n, t) {
    var r = n,
        i = t[r];
    typeof i != "undefined" && i.call()
}

function captureExactTargetEmail(n, t) {
    n && t && (emailCaptured = n, $.ajax({
        url: "/shared_services/CaptureExtactTargetLeadEmail",
        data: {
            email: n,
            action: t
        },
        type: "post",
        success: function(n) {
            n.success || (timeoutID = null)
        },
        error: function() {
            timeoutID = null
        }
    }))
}
var timeoutID = null,
    emailCaptured = "";
$(function() {
    var n, t, i;
    $("form").each(function() {
        var n = $(this);
        $(this).validate({
            submitHandler: function(n) {
                var r, t, i;
                $(n).data("ajax-submit") == !1 ? (r = $(n), t = r.find("button[type='submit']").first(), $(t).length && ($(t).addClass("disabled"), $(t).attr("disabled", "disabled"), i = $(t).html(), $(t).html("Please Wait..."), n.submit())) : ($gtmEvent = $(n).data("gtm-event"), $successDynamicEvent = $(n).data("script-success-event"), $errorDynamicEvent = $(n).data("script-error-event"), i = "", $.ajax({
                    url: n.action,
                    type: "post",
                    data: $(n).serialize(),
                    beforeSend: function() {
                        var t = $(n).find("button[type='submit']").first();
                        $(t).length && ($(t).addClass("disabled"), $(t).attr("disabled", "disabled"), i = $(t).html(), $(t).html("Please Wait..."));
                        //timeoutID != null && clearTimeout(timeoutID);
                       alert(data)
                        // window.setTimeout(function(){

                     // Move to a new location or you can do something else
                    //window.location.href = "http://www.directagents.com/preview/ADT/form.php";

                    //}, 2000)
                    },
                    success: function(n) {
                        
                        if (n.Success) {
                            if (executeFunctionByName($successDynamicEvent, window), typeof $gtmEvent != "undefined" && $gtmEvent != "" && PostGTMEvent($gtmEvent, ""), n.data && n.data.type == "redirect") {
                                window.location.href = n.data.url;
                                return
                            }
                            n.msg && ShowError("Protect Your Home", n.msg)
                        } else typeof $gtmEvent != "undefined" && $gtmEvent != "" && PostGTMEvent($gtmEvent, n.msg), n.msg && ShowError("Protect Your Home", n.msg), executeFunctionByName($errorDynamicEvent, window), this.error()
                    },
                    error: function() {
                        var t = $(n).find("button[type='submit']").first();
                        $(t).length && ($(t).removeClass("disabled"), $(t).removeAttr("disabled"), $(t).html(i))
                    },
                    complete: function() {}
                }))
            },
            rules: {
                Zip: {
                    minlength: 5
                },
                Phone: {
                    minlength: 10
                }
            },
            success: function(n, t) {
                var i = $(t),
                    u = i.prop("name"),
                    r = i.parents("form").find("[name='" + u + "']");
                r.length > 0 && $(r).each(function(n, i) {
                    $(i).tooltip("hide");
                    $(t).removeClass("error")
                })
            },
            highlight: function(n, t, i) {
                $(n).data("error-ux-ignore") || ($(n).addClass(t).removeClass(i), $(n).addClass(t))
            },
            unhighlight: function(n, t, i) {
                $(n).data("error-ux-ignore") || ($(n).addClass(t).addClass(i), $(n).removeClass(t), $(n).tooltip("destroy"))
            },
            errorPlacement: function(n, t) {
                if (!$(t).data("error-ux-ignore")) {
                    var i = $(t),
                        u = i.prop("name"),
                        r = i.parents("form").find("[name='" + u + "']");
                    r.length > 0 && $(r).each(function(t, i) {
                        $(i).attr("data-original-title", n.text());
                        $(i).addClass("error");
                        $(i).tooltip("show");
                        $(i).tooltip("hide")
                    })
                }
            },
            invalidHandler: function(n, t) {
                if (typeof $gtmEvent != "undefined" && $gtmEvent != "") {
                    var i = "";
                    $.each(t.errorList, function(n, t) {
                        i += t.element.placeholder + ":" + t.message + ", "
                    });
                    i.length > 0 && (i = i.substring(0, i.length - 2));
                    PostGTMEvent($gtmEvent, i)
                }
            }
        })
    });
    typeof showError != "undefined" && showError == !0 && ShowError(errorTitle, errorMsg);
    CreateChart();
    $("#open-menu").click(function() {
        classie.toggle(document.body, "cbp-spmenu-push-toleft");
        classie.toggle(document.getElementById("main-menu"), "cbp-spmenu-open")
    });
    $(".goto").length > 0 && $(".goto a").click(function(n) {
        n.preventDefault();
        var t = $(this).attr("href");
        $("html, body").animate({
            scrollTop: $(t).offset().top - parseInt($("body .content-section").css("margin-top").replace("px"))
        }, 1e3)
    });
    $("[data-mask]").each(function() {
        $(this).mask($(this).data("mask"))
    });
    $("#blog-title").length > 0 && (n = document.getElementById("blog-title"), t = $(n).css("height"), n.scrollHeight <= parseInt(t.replace("px", "")) ? $("#blog-title span").hide() : $("#blog-title span").show());
    $(".faq-list").length > 0 && (i = $(".faq-list"), $.each(i, function(n, t) {
        var i = $(t);
        i.find(".categories li").click(function() {
            var n = $(this).data("ref"),
                t = i.find(".faq[data-ref='" + n + "']").first();
            $("html, body").animate({
                scrollTop: t.offset().top - $("header.sticky").height() - 10
            }, "slow")
        });
        i.find(".back-top").click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, "slow")
        })
    }));
    $("#CustomerRegisterForm input[type=email]").on("focusout", function() {
        if (timeoutID == null && emailCaptured == "") {
            var n = $(this);
            timeoutID = setTimeout(function() {
                if (n.valid()) {
                    var t = n.val();
                    captureExactTargetEmail(t, "Web_AbandonmentIncoming")
                }
            }, 2e4)
        }
    });
    $.each($(".lead-form-rep-layout .dynamic-layout .default-col"), function() {
        $.trim($(this).html()) === "" && $.trim($(this).text()) === "" && $(".lead-form-rep-layout .dynamic-layout .default-col").hide()
    });
    $(".offer.reverse.lead-form-rep .column-2").length > 0 && $(window).width() <= 767 && $(".lead-form.white").length > 0 && $(".offer.reverse.lead-form-rep .column-2").click(function() {
        $("html, body").animate({
            scrollTop: $(".lead-form.white").offset().top - $("header.sticky").height() - 10
        }, "slow")
    })
})