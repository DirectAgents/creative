$(function(){var e=0,t=$.browser.webkit||$.browser.mozilla,n=!1,r=null,i=function(){if(r!=null)return r;var e=$("body"),t=e.css("overflow-y");return e.css("overflow-y","scroll"),withScrollbar=$("body").innerWidth(),e.css("overflow-y","hidden"),withoutScrollbar=$("body").innerWidth(),e.css("overflow-y",t),r=withoutScrollbar-withScrollbar,r},s=function(e,t){return e.width()/t.width()},o=function(e,t){var n=e.offset(),r=t.offset(),i={top:Math.round(n.top)-Math.round(r.top),left:Math.round(n.left)-Math.round(r.left)};return i},u=function(){return typeof window["devicePixelRatio"]!="undefined"?window.devicePixelRatio:1};window.currentPixelRatio=u,$("a.zoom").each(function(){var e=$(this),r=e.attr("href");typeof e.attr("data-hires")!="undefined"&&window.currentPixelRatio()>1&&(r=window.hiResURL(r,u()));var i=$("<div></div>").addClass("zoom-container");$("body").append(i);var a=$("<div></div>").addClass("overlay");i.append(a);var h=$("img",e),p=$("<img />");p.addClass("copy").attr("width",h.attr("width")).attr("src",h.attr("src")),i.append(p);var d=new Image;$(d).load(function(){i.append(d);var t=$(this);t.addClass("large"),t.data("maxSize",$(e).attr("maxSize"))}),d.src=r,e.click(function(e){e.preventDefault()}),e.mousedown(function(r){r.preventDefault(),i.click(l),i.children().click(l),f(!1);var u=$("img",e),a=$("img.copy",i),h=$("img.large",i);i.show(),c();if(t){if(n)return;n=!0;var p="scale("+s(a,h)+")",d=s(h,a),v=o(u,a);a.css("-webkit-transform","translate3d("+v.left+"px, "+v.top+"px, 0px) "),h.css("-webkit-transform","translate3d("+v.left+"px, "+v.top+"px, 0px) "+p),a.css("-moz-transform","translate("+v.left+"px, "+v.top+"px) "),h.css("-moz-transform","translate("+v.left+"px, "+v.top+"px) "+p),a.css("-o-transform","translate("+v.left+"px, "+v.top+"px) "),h.css("-o-transform","translate("+v.left+"px, "+v.top+"px) "+p),h.data("small-version",u),setTimeout(function(){var e=function(){h.removeClass("animating"),a.removeClass("animating"),n=!1,a.hide()};$("img.large",i).one("webkitTransitionEnd",e),$("img.large",i).one("transitionend",e),$("img.large",i).one("oTransitionEnd",e),h.addClass("animating"),a.addClass("animating"),i.addClass("shown"),a.css("-webkit-transform","scale("+d+")"),a.css("-moz-transform","scale("+d+")"),a.css("-o-transform","scale("+d+")"),h.css("-webkit-transform","scale(1.0)"),h.css("-moz-transform","scale(1.0)"),h.css("-o-transform","scale(1.0)")},0)}else i.addClass("shown")})});var a=function(){return $("div.zoom-container").filter(":visible")},f=function(e){var t=i();$.browser.msie&&$("html").css("overflow",e?"auto":"hidden"),$("body").css("overflow",e?"auto":"hidden"),$("body").css("margin-right",e?"auto":t)},l=function(){var e=a(),r=$("img.large",e),i=$("img.copy",e),u=r.data("small-version");if(t){if(n)return;n=!0,i.show();var l=$("<div></div>");l.css({width:u.width(),height:u.height(),position:"absolute",top:"50%",left:"50%","margin-top":-(u.height()/2),"margin-left":-(u.width()/2),opacity:0}),e.append(l);var c=s(r,i);i.css("-webkit-transform","scale("+c+")"),i.css("-moz-transform","scale("+c+")"),i.css("-o-transform","scale("+c+")");var h=o(u,l);l.remove(),i.addClass("animating"),r.addClass("animating"),e.removeClass("shown");var p=s(u,r);setTimeout(function(){r.css("-webkit-transform","translate3d("+h.left+"px, "+h.top+"px, 0px) scale("+p+")"),r.css("-moz-transform","translate("+h.left+"px, "+h.top+"px) scale("+p+")"),r.css("-o-transform","translate("+h.left+"px, "+h.top+"px) scale("+p+")"),i.css("-webkit-transform","translate3d("+h.left+"px, "+h.top+"px, 0px)"),i.css("-moz-transform","translate("+h.left+"px, "+h.top+"px)"),i.css("-o-transform","translate("+h.left+"px, "+h.top+"px)");var t=function(){e.hide(),r.removeClass("animating"),i.removeClass("animating"),r.css("-webkit-transform","none"),r.css("-moz-transform","none"),r.css("-o-transform","none"),i.css("-webkit-transform","none"),i.css("-moz-transform","none"),i.css("-o-transform","none"),n=!1,f(!0)};$("img.large",e).one("webkitTransitionEnd",t),$("img.large",e).one("transitionend",t),$("img.large",e).one("oTransitionEnd",t)},0)}else f(!0),e.removeClass("shown"),e.hide()},c=function(){var t=a();if(!t.length)return;var n=$("img.large",t),r=$(window),i={width:r.width(),height:r.height()},s=n.data("maxSize").split("x"),o={width:s[0],height:s[1]},u=o.width/o.height;n.width(i.width-2*e),n.height()>i.height&&n.width(u*i.height),n.width()>o.width&&n.width(o.width),n.height()>o.height&&n.height(o.height);var f=[n,$("img.copy",t)];for(var l=0;l<f.length;l++)f[l].css("margin-top",-(f[l].height()/2)),f[l].css("margin-left",-(f[l].width()/2));t.css("top",$(window).scrollTop()),t.height(i.height)};$(window).resize(c)});