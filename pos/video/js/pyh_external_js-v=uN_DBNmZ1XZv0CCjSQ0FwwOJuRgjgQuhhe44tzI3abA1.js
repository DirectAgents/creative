function onYouTubeIframeAPIReady() {
    $(".youtube-video").each(function(n, t) {
        var i = $(t);
        i.attr("id", "y-video" + n);
        players.push(new YT.Player(i.attr("id"), {
            height: "390",
            width: "640",
            videoId: i.data("video-id"),
            events: {
                onReady: onReady
            },
            playerVars: {
                wmode: "opaque",
                autoplay: 0
            }
        }))
    })
}

function onReady(n) {
    n.target.addEventListener("onStateChange", function(n) {
        console.log("State is:", n.data)
    })
}

function ConfirmPurchase() {
    var n = GetProductsArray();
    currentPurchaseInfo && n && typeof dataLayer != "undefined" && dataLayer && dataLayer.push({
        event: "gaTrackEC-purchaseConfirm",
        ecommerce: {
            purchase: {
                actionField: {
                    id: currentPurchaseInfo.TransactionID,
                    revenue: currentPurchaseInfo.SubTotal,
                    tax: currentPurchaseInfo.Tax
                },
                products: n
            }
        }
    })
}

function AddToCart() {
    var n = GetProductsArray();
    n.length > 0 && typeof dataLayer != "undefined" && dataLayer && dataLayer.push({
        event: "gaTrackEC-addToCart",
        ecommerce: {
            add: {
                products: n
            }
        }
    })
}

function RemoveFromCart() {}

function TrackStep(n) {
    var t = 0,
        i, r;
    typeof n != "undefined" ? t = n : (i = $("#purchase-path-current-step"), $(i).length && (t = $(i).val()));
    r = GetProductsArray();
    r.length > 0 && typeof dataLayer != "undefined" && dataLayer && dataLayer.push({
        event: "gaTrackEC-checkoutStep-" + t,
        ecommerce: {
            checkout: {
                actionField: {
                    step: t
                },
                products: r
            }
        }
    })
}

function TrackProductDetail() {
    var n = GetProductsArray();
    n.length > 0 && typeof dataLayer != "undefined" && dataLayer && dataLayer.push({
        event: "gaTrackEC-productDetail",
        ecommerce: {
            detail: {
                products: n
            }
        }
    })
}

function GetProductsArray() {
    var i = [],
        n, t;
    if (GetPurchaseObject(), currentPurchaseInfo && currentPurchaseInfo.Products != null && currentPurchaseInfo.Products.length > 0)
        for (n = 0; n < currentPurchaseInfo.Products.length; n++) t = currentPurchaseInfo.Products[n], i.push({
            id: t.ID,
            name: t.Name,
            price: t.Price,
            quantity: 1
        });
    return i
}

function GetPurchaseObject() {
    $.ajax({
        url: "/pyh_services/GetJSONPurchaseInfo",
        type: "post",
        async: !1,
        success: function(n) {
            currentPurchaseInfo = JSON.parse(n)
        }
    })
}
var AmCharts, tag, firstScriptTag, players, currentPurchaseInfo;
if (! function(n, t) {
        "object" == typeof module && "object" == typeof module.exports ? module.exports = n.document ? t(n, !0) : function(n) {
            if (!n.document) throw new Error("jQuery requires a window with a document");
            return t(n)
        } : t(n)
    }("undefined" != typeof window ? window : this, function(n, t) {
        function ri(n) {
            var t = "length" in n && n.length,
                r = i.type(n);
            return "function" === r || i.isWindow(n) ? !1 : 1 === n.nodeType && t ? !0 : "array" === r || 0 === t || "number" == typeof t && t > 0 && t - 1 in n
        }

        function ui(n, t, r) {
            if (i.isFunction(t)) return i.grep(n, function(n, i) {
                return !!t.call(n, i, n) !== r
            });
            if (t.nodeType) return i.grep(n, function(n) {
                return n === t !== r
            });
            if ("string" == typeof t) {
                if (re.test(t)) return i.filter(t, n, r);
                t = i.filter(t, n)
            }
            return i.grep(n, function(n) {
                return i.inArray(n, t) >= 0 !== r
            })
        }

        function hr(n, t) {
            do n = n[t]; while (n && 1 !== n.nodeType);
            return n
        }

        function ee(n) {
            var t = fi[n] = {};
            return i.each(n.match(h) || [], function(n, i) {
                t[i] = !0
            }), t
        }

        function cr() {
            u.addEventListener ? (u.removeEventListener("DOMContentLoaded", a, !1), n.removeEventListener("load", a, !1)) : (u.detachEvent("onreadystatechange", a), n.detachEvent("onload", a))
        }

        function a() {
            (u.addEventListener || "load" === event.type || "complete" === u.readyState) && (cr(), i.ready())
        }

        function yr(n, t, r) {
            if (void 0 === r && 1 === n.nodeType) {
                var u = "data-" + t.replace(vr, "-$1").toLowerCase();
                if (r = n.getAttribute(u), "string" == typeof r) {
                    try {
                        r = "true" === r ? !0 : "false" === r ? !1 : "null" === r ? null : +r + "" === r ? +r : ar.test(r) ? i.parseJSON(r) : r
                    } catch (f) {}
                    i.data(n, t, r)
                } else r = void 0
            }
            return r
        }

        function ei(n) {
            for (var t in n)
                if (("data" !== t || !i.isEmptyObject(n[t])) && "toJSON" !== t) return !1;
            return !0
        }

        function pr(n, t, r, u) {
            if (i.acceptData(n)) {
                var s, e, h = i.expando,
                    l = n.nodeType,
                    o = l ? i.cache : n,
                    f = l ? n[h] : n[h] && h;
                if (f && o[f] && (u || o[f].data) || void 0 !== r || "string" != typeof t) return f || (f = l ? n[h] = c.pop() || i.guid++ : h), o[f] || (o[f] = l ? {} : {
                    toJSON: i.noop
                }), ("object" == typeof t || "function" == typeof t) && (u ? o[f] = i.extend(o[f], t) : o[f].data = i.extend(o[f].data, t)), e = o[f], u || (e.data || (e.data = {}), e = e.data), void 0 !== r && (e[i.camelCase(t)] = r), "string" == typeof t ? (s = e[t], null == s && (s = e[i.camelCase(t)])) : s = e, s
            }
        }

        function wr(n, t, u) {
            if (i.acceptData(n)) {
                var o, s, h = n.nodeType,
                    f = h ? i.cache : n,
                    e = h ? n[i.expando] : i.expando;
                if (f[e]) {
                    if (t && (o = u ? f[e] : f[e].data)) {
                        for (i.isArray(t) ? t = t.concat(i.map(t, i.camelCase)) : (t in o) ? t = [t] : (t = i.camelCase(t), t = (t in o) ? [t] : t.split(" ")), s = t.length; s--;) delete o[t[s]];
                        if (u ? !ei(o) : !i.isEmptyObject(o)) return
                    }(u || (delete f[e].data, ei(f[e]))) && (h ? i.cleanData([n], !0) : r.deleteExpando || f != f.window ? delete f[e] : f[e] = null)
                }
            }
        }

        function vt() {
            return !0
        }

        function it() {
            return !1
        }

        function dr() {
            try {
                return u.activeElement
            } catch (n) {}
        }

        function gr(n) {
            var i = nu.split("|"),
                t = n.createDocumentFragment();
            if (t.createElement)
                while (i.length) t.createElement(i.pop());
            return t
        }

        function f(n, t) {
            var e, u, s = 0,
                r = typeof n.getElementsByTagName !== o ? n.getElementsByTagName(t || "*") : typeof n.querySelectorAll !== o ? n.querySelectorAll(t || "*") : void 0;
            if (!r)
                for (r = [], e = n.childNodes || n; null != (u = e[s]); s++) !t || i.nodeName(u, t) ? r.push(u) : i.merge(r, f(u, t));
            return void 0 === t || t && i.nodeName(n, t) ? i.merge([n], r) : r
        }

        function we(n) {
            oi.test(n.type) && (n.defaultChecked = n.checked)
        }

        function eu(n, t) {
            return i.nodeName(n, "table") && i.nodeName(11 !== t.nodeType ? t : t.firstChild, "tr") ? n.getElementsByTagName("tbody")[0] || n.appendChild(n.ownerDocument.createElement("tbody")) : n
        }

        function ou(n) {
            return n.type = (null !== i.find.attr(n, "type")) + "/" + n.type, n
        }

        function su(n) {
            var t = ve.exec(n.type);
            return t ? n.type = t[1] : n.removeAttribute("type"), n
        }

        function li(n, t) {
            for (var u, r = 0; null != (u = n[r]); r++) i._data(u, "globalEval", !t || i._data(t[r], "globalEval"))
        }

        function hu(n, t) {
            if (1 === t.nodeType && i.hasData(n)) {
                var u, f, o, s = i._data(n),
                    r = i._data(t, s),
                    e = s.events;
                if (e) {
                    delete r.handle;
                    r.events = {};
                    for (u in e)
                        for (f = 0, o = e[u].length; o > f; f++) i.event.add(t, u, e[u][f])
                }
                r.data && (r.data = i.extend({}, r.data))
            }
        }

        function be(n, t) {
            var u, e, f;
            if (1 === t.nodeType) {
                if (u = t.nodeName.toLowerCase(), !r.noCloneEvent && t[i.expando]) {
                    f = i._data(t);
                    for (e in f.events) i.removeEvent(t, e, f.handle);
                    t.removeAttribute(i.expando)
                }
                "script" === u && t.text !== n.text ? (ou(t).text = n.text, su(t)) : "object" === u ? (t.parentNode && (t.outerHTML = n.outerHTML), r.html5Clone && n.innerHTML && !i.trim(t.innerHTML) && (t.innerHTML = n.innerHTML)) : "input" === u && oi.test(n.type) ? (t.defaultChecked = t.checked = n.checked, t.value !== n.value && (t.value = n.value)) : "option" === u ? t.defaultSelected = t.selected = n.defaultSelected : ("input" === u || "textarea" === u) && (t.defaultValue = n.defaultValue)
            }
        }

        function cu(t, r) {
            var f, u = i(r.createElement(t)).appendTo(r.body),
                e = n.getDefaultComputedStyle && (f = n.getDefaultComputedStyle(u[0])) ? f.display : i.css(u[0], "display");
            return u.detach(), e
        }

        function yt(n) {
            var r = u,
                t = ai[n];
            return t || (t = cu(n, r), "none" !== t && t || (ot = (ot || i("<iframe frameborder='0' width='0' height='0'/>")).appendTo(r.documentElement), r = (ot[0].contentWindow || ot[0].contentDocument).document, r.write(), r.close(), t = cu(n, r), ot.detach()), ai[n] = t), t
        }

        function au(n, t) {
            return {
                get: function() {
                    var i = n();
                    if (null != i) return i ? void delete this.get : (this.get = t).apply(this, arguments)
                }
            }
        }

        function pu(n, t) {
            if (t in n) return t;
            for (var r = t.charAt(0).toUpperCase() + t.slice(1), u = t, i = yu.length; i--;)
                if (t = yu[i] + r, t in n) return t;
            return u
        }

        function wu(n, t) {
            for (var f, r, o, e = [], u = 0, s = n.length; s > u; u++) r = n[u], r.style && (e[u] = i._data(r, "olddisplay"), f = r.style.display, t ? (e[u] || "none" !== f || (r.style.display = ""), "" === r.style.display && et(r) && (e[u] = i._data(r, "olddisplay", yt(r.nodeName)))) : (o = et(r), (f && "none" !== f || !o) && i._data(r, "olddisplay", o ? f : i.css(r, "display"))));
            for (u = 0; s > u; u++) r = n[u], r.style && (t && "none" !== r.style.display && "" !== r.style.display || (r.style.display = t ? e[u] || "" : "none"));
            return n
        }

        function bu(n, t, i) {
            var r = no.exec(t);
            return r ? Math.max(0, r[1] - (i || 0)) + (r[2] || "px") : t
        }

        function ku(n, t, r, u, f) {
            for (var e = r === (u ? "border" : "content") ? 4 : "width" === t ? 1 : 0, o = 0; 4 > e; e += 2) "margin" === r && (o += i.css(n, r + w[e], !0, f)), u ? ("content" === r && (o -= i.css(n, "padding" + w[e], !0, f)), "margin" !== r && (o -= i.css(n, "border" + w[e] + "Width", !0, f))) : (o += i.css(n, "padding" + w[e], !0, f), "padding" !== r && (o += i.css(n, "border" + w[e] + "Width", !0, f)));
            return o
        }

        function du(n, t, u) {
            var o = !0,
                f = "width" === t ? n.offsetWidth : n.offsetHeight,
                e = k(n),
                s = r.boxSizing && "border-box" === i.css(n, "boxSizing", !1, e);
            if (0 >= f || null == f) {
                if (f = d(n, t, e), (0 > f || null == f) && (f = n.style[t]), pt.test(f)) return f;
                o = s && (r.boxSizingReliable() || f === n.style[t]);
                f = parseFloat(f) || 0
            }
            return f + ku(n, t, u || (s ? "border" : "content"), o, e) + "px"
        }

        function e(n, t, i, r, u) {
            return new e.prototype.init(n, t, i, r, u)
        }

        function nf() {
            return setTimeout(function() {
                rt = void 0
            }), rt = i.now()
        }

        function kt(n, t) {
            var r, i = {
                    height: n
                },
                u = 0;
            for (t = t ? 1 : 0; 4 > u; u += 2 - t) r = w[u], i["margin" + r] = i["padding" + r] = n;
            return t && (i.opacity = i.width = n), i
        }

        function tf(n, t, i) {
            for (var u, f = (st[t] || []).concat(st["*"]), r = 0, e = f.length; e > r; r++)
                if (u = f[r].call(i, t, n)) return u
        }

        function fo(n, t, u) {
            var f, a, p, v, s, w, h, b, l = this,
                y = {},
                o = n.style,
                c = n.nodeType && et(n),
                e = i._data(n, "fxshow");
            u.queue || (s = i._queueHooks(n, "fx"), null == s.unqueued && (s.unqueued = 0, w = s.empty.fire, s.empty.fire = function() {
                s.unqueued || w()
            }), s.unqueued++, l.always(function() {
                l.always(function() {
                    s.unqueued--;
                    i.queue(n, "fx").length || s.empty.fire()
                })
            }));
            1 === n.nodeType && ("height" in t || "width" in t) && (u.overflow = [o.overflow, o.overflowX, o.overflowY], h = i.css(n, "display"), b = "none" === h ? i._data(n, "olddisplay") || yt(n.nodeName) : h, "inline" === b && "none" === i.css(n, "float") && (r.inlineBlockNeedsLayout && "inline" !== yt(n.nodeName) ? o.zoom = 1 : o.display = "inline-block"));
            u.overflow && (o.overflow = "hidden", r.shrinkWrapBlocks() || l.always(function() {
                o.overflow = u.overflow[0];
                o.overflowX = u.overflow[1];
                o.overflowY = u.overflow[2]
            }));
            for (f in t)
                if (a = t[f], ro.exec(a)) {
                    if (delete t[f], p = p || "toggle" === a, a === (c ? "hide" : "show")) {
                        if ("show" !== a || !e || void 0 === e[f]) continue;
                        c = !0
                    }
                    y[f] = e && e[f] || i.style(n, f)
                } else h = void 0;
            if (i.isEmptyObject(y)) "inline" === ("none" === h ? yt(n.nodeName) : h) && (o.display = h);
            else {
                e ? "hidden" in e && (c = e.hidden) : e = i._data(n, "fxshow", {});
                p && (e.hidden = !c);
                c ? i(n).show() : l.done(function() {
                    i(n).hide()
                });
                l.done(function() {
                    var t;
                    i._removeData(n, "fxshow");
                    for (t in y) i.style(n, t, y[t])
                });
                for (f in y) v = tf(c ? e[f] : 0, f, l), f in e || (e[f] = v.start, c && (v.end = v.start, v.start = "width" === f || "height" === f ? 1 : 0))
            }
        }

        function eo(n, t) {
            var r, f, e, u, o;
            for (r in n)
                if (f = i.camelCase(r), e = t[f], u = n[r], i.isArray(u) && (e = u[1], u = n[r] = u[0]), r !== f && (n[f] = u, delete n[r]), o = i.cssHooks[f], o && "expand" in o) {
                    u = o.expand(u);
                    delete n[f];
                    for (r in u) r in n || (n[r] = u[r], t[r] = e)
                } else t[f] = e
        }

        function rf(n, t, r) {
            var h, e, o = 0,
                l = bt.length,
                f = i.Deferred().always(function() {
                    delete c.elem
                }),
                c = function() {
                    if (e) return !1;
                    for (var s = rt || nf(), t = Math.max(0, u.startTime + u.duration - s), h = t / u.duration || 0, i = 1 - h, r = 0, o = u.tweens.length; o > r; r++) u.tweens[r].run(i);
                    return f.notifyWith(n, [u, i, t]), 1 > i && o ? t : (f.resolveWith(n, [u]), !1)
                },
                u = f.promise({
                    elem: n,
                    props: i.extend({}, t),
                    opts: i.extend(!0, {
                        specialEasing: {}
                    }, r),
                    originalProperties: t,
                    originalOptions: r,
                    startTime: rt || nf(),
                    duration: r.duration,
                    tweens: [],
                    createTween: function(t, r) {
                        var f = i.Tween(n, u.opts, t, r, u.opts.specialEasing[t] || u.opts.easing);
                        return u.tweens.push(f), f
                    },
                    stop: function(t) {
                        var i = 0,
                            r = t ? u.tweens.length : 0;
                        if (e) return this;
                        for (e = !0; r > i; i++) u.tweens[i].run(1);
                        return t ? f.resolveWith(n, [u, t]) : f.rejectWith(n, [u, t]), this
                    }
                }),
                s = u.props;
            for (eo(s, u.opts.specialEasing); l > o; o++)
                if (h = bt[o].call(u, n, s, u.opts)) return h;
            return i.map(s, tf, u), i.isFunction(u.opts.start) && u.opts.start.call(n, u), i.fx.timer(i.extend(c, {
                elem: n,
                anim: u,
                queue: u.opts.queue
            })), u.progress(u.opts.progress).done(u.opts.done, u.opts.complete).fail(u.opts.fail).always(u.opts.always)
        }

        function af(n) {
            return function(t, r) {
                "string" != typeof t && (r = t, t = "*");
                var u, f = 0,
                    e = t.toLowerCase().match(h) || [];
                if (i.isFunction(r))
                    while (u = e[f++]) "+" === u.charAt(0) ? (u = u.slice(1) || "*", (n[u] = n[u] || []).unshift(r)) : (n[u] = n[u] || []).push(r)
            }
        }

        function vf(n, t, r, u) {
            function e(s) {
                var h;
                return f[s] = !0, i.each(n[s] || [], function(n, i) {
                    var s = i(t, r, u);
                    return "string" != typeof s || o || f[s] ? o ? !(h = s) : void 0 : (t.dataTypes.unshift(s), e(s), !1)
                }), h
            }
            var f = {},
                o = n === bi;
            return e(t.dataTypes[0]) || !f["*"] && e("*")
        }

        function ki(n, t) {
            var u, r, f = i.ajaxSettings.flatOptions || {};
            for (r in t) void 0 !== t[r] && ((f[r] ? n : u || (u = {}))[r] = t[r]);
            return u && i.extend(!0, n, u), n
        }

        function ao(n, t, i) {
            for (var o, e, u, f, s = n.contents, r = n.dataTypes;
                "*" === r[0];) r.shift(), void 0 === e && (e = n.mimeType || t.getResponseHeader("Content-Type"));
            if (e)
                for (f in s)
                    if (s[f] && s[f].test(e)) {
                        r.unshift(f);
                        break
                    }
            if (r[0] in i) u = r[0];
            else {
                for (f in i) {
                    if (!r[0] || n.converters[f + " " + r[0]]) {
                        u = f;
                        break
                    }
                    o || (o = f)
                }
                u = u || o
            }
            if (u) return (u !== r[0] && r.unshift(u), i[u])
        }

        function vo(n, t, i, r) {
            var h, u, f, s, e, o = {},
                c = n.dataTypes.slice();
            if (c[1])
                for (f in n.converters) o[f.toLowerCase()] = n.converters[f];
            for (u = c.shift(); u;)
                if (n.responseFields[u] && (i[n.responseFields[u]] = t), !e && r && n.dataFilter && (t = n.dataFilter(t, n.dataType)), e = u, u = c.shift())
                    if ("*" === u) u = e;
                    else if ("*" !== e && e !== u) {
                if (f = o[e + " " + u] || o["* " + u], !f)
                    for (h in o)
                        if (s = h.split(" "), s[1] === u && (f = o[e + " " + s[0]] || o["* " + s[0]])) {
                            f === !0 ? f = o[h] : o[h] !== !0 && (u = s[0], c.unshift(s[1]));
                            break
                        }
                if (f !== !0)
                    if (f && n.throws) t = f(t);
                    else try {
                        t = f(t)
                    } catch (l) {
                        return {
                            state: "parsererror",
                            error: f ? l : "No conversion from " + e + " to " + u
                        }
                    }
            }
            return {
                state: "success",
                data: t
            }
        }

        function di(n, t, r, u) {
            var f;
            if (i.isArray(t)) i.each(t, function(t, i) {
                r || po.test(n) ? u(n, i) : di(n + "[" + ("object" == typeof i ? t : "") + "]", i, r, u)
            });
            else if (r || "object" !== i.type(t)) u(n, t);
            else
                for (f in t) di(n + "[" + f + "]", t[f], r, u)
        }

        function pf() {
            try {
                return new n.XMLHttpRequest
            } catch (t) {}
        }

        function go() {
            try {
                return new n.ActiveXObject("Microsoft.XMLHTTP")
            } catch (t) {}
        }

        function wf(n) {
            return i.isWindow(n) ? n : 9 === n.nodeType ? n.defaultView || n.parentWindow : !1
        }
        var c = [],
            l = c.slice,
            ir = c.concat,
            ii = c.push,
            rr = c.indexOf,
            ct = {},
            df = ct.toString,
            tt = ct.hasOwnProperty,
            r = {},
            ur = "1.11.3",
            i = function(n, t) {
                return new i.fn.init(n, t)
            },
            gf = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,
            ne = /^-ms-/,
            te = /-([\da-z])/gi,
            ie = function(n, t) {
                return t.toUpperCase()
            },
            p, or, sr, h, fi, lt, o, lr, ar, vr, ot, ai, uf, ef, of, gt, gi, ti, nr, tr, bf, kf;
        i.fn = i.prototype = {
            jquery: ur,
            constructor: i,
            selector: "",
            length: 0,
            toArray: function() {
                return l.call(this)
            },
            get: function(n) {
                return null != n ? 0 > n ? this[n + this.length] : this[n] : l.call(this)
            },
            pushStack: function(n) {
                var t = i.merge(this.constructor(), n);
                return t.prevObject = this, t.context = this.context, t
            },
            each: function(n, t) {
                return i.each(this, n, t)
            },
            map: function(n) {
                return this.pushStack(i.map(this, function(t, i) {
                    return n.call(t, i, t)
                }))
            },
            slice: function() {
                return this.pushStack(l.apply(this, arguments))
            },
            first: function() {
                return this.eq(0)
            },
            last: function() {
                return this.eq(-1)
            },
            eq: function(n) {
                var i = this.length,
                    t = +n + (0 > n ? i : 0);
                return this.pushStack(t >= 0 && i > t ? [this[t]] : [])
            },
            end: function() {
                return this.prevObject || this.constructor(null)
            },
            push: ii,
            sort: c.sort,
            splice: c.splice
        };
        i.extend = i.fn.extend = function() {
            var r, e, t, f, o, s, n = arguments[0] || {},
                u = 1,
                c = arguments.length,
                h = !1;
            for ("boolean" == typeof n && (h = n, n = arguments[u] || {}, u++), "object" == typeof n || i.isFunction(n) || (n = {}), u === c && (n = this, u--); c > u; u++)
                if (null != (o = arguments[u]))
                    for (f in o) r = n[f], t = o[f], n !== t && (h && t && (i.isPlainObject(t) || (e = i.isArray(t))) ? (e ? (e = !1, s = r && i.isArray(r) ? r : []) : s = r && i.isPlainObject(r) ? r : {}, n[f] = i.extend(h, s, t)) : void 0 !== t && (n[f] = t));
            return n
        };
        i.extend({
            expando: "jQuery" + (ur + Math.random()).replace(/\D/g, ""),
            isReady: !0,
            error: function(n) {
                throw new Error(n);
            },
            noop: function() {},
            isFunction: function(n) {
                return "function" === i.type(n)
            },
            isArray: Array.isArray || function(n) {
                return "array" === i.type(n)
            },
            isWindow: function(n) {
                return null != n && n == n.window
            },
            isNumeric: function(n) {
                return !i.isArray(n) && n - parseFloat(n) + 1 >= 0
            },
            isEmptyObject: function(n) {
                for (var t in n) return !1;
                return !0
            },
            isPlainObject: function(n) {
                var t;
                if (!n || "object" !== i.type(n) || n.nodeType || i.isWindow(n)) return !1;
                try {
                    if (n.constructor && !tt.call(n, "constructor") && !tt.call(n.constructor.prototype, "isPrototypeOf")) return !1
                } catch (u) {
                    return !1
                }
                if (r.ownLast)
                    for (t in n) return tt.call(n, t);
                for (t in n);
                return void 0 === t || tt.call(n, t)
            },
            type: function(n) {
                return null == n ? n + "" : "object" == typeof n || "function" == typeof n ? ct[df.call(n)] || "object" : typeof n
            },
            globalEval: function(t) {
                t && i.trim(t) && (n.execScript || function(t) {
                    n.eval.call(n, t)
                })(t)
            },
            camelCase: function(n) {
                return n.replace(ne, "ms-").replace(te, ie)
            },
            nodeName: function(n, t) {
                return n.nodeName && n.nodeName.toLowerCase() === t.toLowerCase()
            },
            each: function(n, t, i) {
                var u, r = 0,
                    f = n.length,
                    e = ri(n);
                if (i) {
                    if (e) {
                        for (; f > r; r++)
                            if (u = t.apply(n[r], i), u === !1) break
                    } else
                        for (r in n)
                            if (u = t.apply(n[r], i), u === !1) break
                } else if (e) {
                    for (; f > r; r++)
                        if (u = t.call(n[r], r, n[r]), u === !1) break
                } else
                    for (r in n)
                        if (u = t.call(n[r], r, n[r]), u === !1) break; return n
            },
            trim: function(n) {
                return null == n ? "" : (n + "").replace(gf, "")
            },
            makeArray: function(n, t) {
                var r = t || [];
                return null != n && (ri(Object(n)) ? i.merge(r, "string" == typeof n ? [n] : n) : ii.call(r, n)), r
            },
            inArray: function(n, t, i) {
                var r;
                if (t) {
                    if (rr) return rr.call(t, n, i);
                    for (r = t.length, i = i ? 0 > i ? Math.max(0, r + i) : i : 0; r > i; i++)
                        if (i in t && t[i] === n) return i
                }
                return -1
            },
            merge: function(n, t) {
                for (var r = +t.length, i = 0, u = n.length; r > i;) n[u++] = t[i++];
                if (r !== r)
                    while (void 0 !== t[i]) n[u++] = t[i++];
                return n.length = u, n
            },
            grep: function(n, t, i) {
                for (var u, f = [], r = 0, e = n.length, o = !i; e > r; r++) u = !t(n[r], r), u !== o && f.push(n[r]);
                return f
            },
            map: function(n, t, i) {
                var u, r = 0,
                    e = n.length,
                    o = ri(n),
                    f = [];
                if (o)
                    for (; e > r; r++) u = t(n[r], r, i), null != u && f.push(u);
                else
                    for (r in n) u = t(n[r], r, i), null != u && f.push(u);
                return ir.apply([], f)
            },
            guid: 1,
            proxy: function(n, t) {
                var u, r, f;
                return "string" == typeof t && (f = n[t], t = n, n = f), i.isFunction(n) ? (u = l.call(arguments, 2), r = function() {
                    return n.apply(t || this, u.concat(l.call(arguments)))
                }, r.guid = n.guid = n.guid || i.guid++, r) : void 0
            },
            now: function() {
                return +new Date
            },
            support: r
        });
        i.each("Boolean Number String Function Array Date RegExp Object Error".split(" "), function(n, t) {
            ct["[object " + t + "]"] = t.toLowerCase()
        });
        p = function(n) {
            function r(n, t, i, r) {
                var p, s, a, c, w, y, d, v, nt, g;
                if ((t ? t.ownerDocument || t : h) !== o && k(t), t = t || o, i = i || [], c = t.nodeType, "string" != typeof n || !n || 1 !== c && 9 !== c && 11 !== c) return i;
                if (!r && l) {
                    if (11 !== c && (p = hr.exec(n)))
                        if (a = p[1]) {
                            if (9 === c) {
                                if (s = t.getElementById(a), !s || !s.parentNode) return i;
                                if (s.id === a) return i.push(s), i
                            } else if (t.ownerDocument && (s = t.ownerDocument.getElementById(a)) && et(t, s) && s.id === a) return i.push(s), i
                        } else {
                            if (p[2]) return b.apply(i, t.getElementsByTagName(n)), i;
                            if ((a = p[3]) && u.getElementsByClassName) return b.apply(i, t.getElementsByClassName(a)), i
                        }
                    if (u.qsa && (!e || !e.test(n))) {
                        if (v = d = f, nt = t, g = 1 !== c && n, 1 === c && "object" !== t.nodeName.toLowerCase()) {
                            for (y = ft(n), (d = t.getAttribute("id")) ? v = d.replace(cr, "\\$&") : t.setAttribute("id", v), v = "[id='" + v + "'] ", w = y.length; w--;) y[w] = v + vt(y[w]);
                            nt = dt.test(n) && ti(t.parentNode) || t;
                            g = y.join(",")
                        }
                        if (g) try {
                            return b.apply(i, nt.querySelectorAll(g)), i
                        } catch (tt) {} finally {
                            d || t.removeAttribute("id")
                        }
                    }
                }
                return oi(n.replace(lt, "$1"), t, i, r)
            }

            function gt() {
                function n(r, u) {
                    return i.push(r + " ") > t.cacheLength && delete n[i.shift()], n[r + " "] = u
                }
                var i = [];
                return n
            }

            function c(n) {
                return n[f] = !0, n
            }

            function v(n) {
                var t = o.createElement("div");
                try {
                    return !!n(t)
                } catch (i) {
                    return !1
                } finally {
                    t.parentNode && t.parentNode.removeChild(t);
                    t = null
                }
            }

            function ni(n, i) {
                for (var u = n.split("|"), r = n.length; r--;) t.attrHandle[u[r]] = i
            }

            function wi(n, t) {
                var i = t && n,
                    r = i && 1 === n.nodeType && 1 === t.nodeType && (~t.sourceIndex || li) - (~n.sourceIndex || li);
                if (r) return r;
                if (i)
                    while (i = i.nextSibling)
                        if (i === t) return -1;
                return n ? 1 : -1
            }

            function lr(n) {
                return function(t) {
                    var i = t.nodeName.toLowerCase();
                    return "input" === i && t.type === n
                }
            }

            function ar(n) {
                return function(t) {
                    var i = t.nodeName.toLowerCase();
                    return ("input" === i || "button" === i) && t.type === n
                }
            }

            function tt(n) {
                return c(function(t) {
                    return t = +t, c(function(i, r) {
                        for (var u, f = n([], i.length, t), e = f.length; e--;) i[u = f[e]] && (i[u] = !(r[u] = i[u]))
                    })
                })
            }

            function ti(n) {
                return n && "undefined" != typeof n.getElementsByTagName && n
            }

            function bi() {}

            function vt(n) {
                for (var t = 0, r = n.length, i = ""; r > t; t++) i += n[t].value;
                return i
            }

            function ii(n, t, i) {
                var r = t.dir,
                    u = i && "parentNode" === r,
                    e = ki++;
                return t.first ? function(t, i, f) {
                    while (t = t[r])
                        if (1 === t.nodeType || u) return n(t, i, f)
                } : function(t, i, o) {
                    var s, h, c = [a, e];
                    if (o) {
                        while (t = t[r])
                            if ((1 === t.nodeType || u) && n(t, i, o)) return !0
                    } else
                        while (t = t[r])
                            if (1 === t.nodeType || u) {
                                if (h = t[f] || (t[f] = {}), (s = h[r]) && s[0] === a && s[1] === e) return c[2] = s[2];
                                if (h[r] = c, c[2] = n(t, i, o)) return !0
                            }
                }
            }

            function ri(n) {
                return n.length > 1 ? function(t, i, r) {
                    for (var u = n.length; u--;)
                        if (!n[u](t, i, r)) return !1;
                    return !0
                } : n[0]
            }

            function vr(n, t, i) {
                for (var u = 0, f = t.length; f > u; u++) r(n, t[u], i);
                return i
            }

            function yt(n, t, i, r, u) {
                for (var e, o = [], f = 0, s = n.length, h = null != t; s > f; f++)(e = n[f]) && (!i || i(e, r, u)) && (o.push(e), h && t.push(f));
                return o
            }

            function ui(n, t, i, r, u, e) {
                return r && !r[f] && (r = ui(r)), u && !u[f] && (u = ui(u, e)), c(function(f, e, o, s) {
                    var l, c, a, p = [],
                        y = [],
                        w = e.length,
                        k = f || vr(t || "*", o.nodeType ? [o] : o, []),
                        v = !n || !f && t ? k : yt(k, p, n, o, s),
                        h = i ? u || (f ? n : w || r) ? [] : e : v;
                    if (i && i(v, h, o, s), r)
                        for (l = yt(h, y), r(l, [], o, s), c = l.length; c--;)(a = l[c]) && (h[y[c]] = !(v[y[c]] = a));
                    if (f) {
                        if (u || n) {
                            if (u) {
                                for (l = [], c = h.length; c--;)(a = h[c]) && l.push(v[c] = a);
                                u(null, h = [], l, s)
                            }
                            for (c = h.length; c--;)(a = h[c]) && (l = u ? nt(f, a) : p[c]) > -1 && (f[l] = !(e[l] = a))
                        }
                    } else h = yt(h === e ? h.splice(w, h.length) : h), u ? u(null, e, h, s) : b.apply(e, h)
                })
            }

            function fi(n) {
                for (var o, u, r, s = n.length, h = t.relative[n[0].type], c = h || t.relative[" "], i = h ? 1 : 0, l = ii(function(n) {
                        return n === o
                    }, c, !0), a = ii(function(n) {
                        return nt(o, n) > -1
                    }, c, !0), e = [function(n, t, i) {
                        var r = !h && (i || t !== ht) || ((o = t).nodeType ? l(n, t, i) : a(n, t, i));
                        return o = null, r
                    }]; s > i; i++)
                    if (u = t.relative[n[i].type]) e = [ii(ri(e), u)];
                    else {
                        if (u = t.filter[n[i].type].apply(null, n[i].matches), u[f]) {
                            for (r = ++i; s > r; r++)
                                if (t.relative[n[r].type]) break;
                            return ui(i > 1 && ri(e), i > 1 && vt(n.slice(0, i - 1).concat({
                                value: " " === n[i - 2].type ? "*" : ""
                            })).replace(lt, "$1"), u, r > i && fi(n.slice(i, r)), s > r && fi(n = n.slice(r)), s > r && vt(n))
                        }
                        e.push(u)
                    }
                return ri(e)
            }

            function yr(n, i) {
                var u = i.length > 0,
                    f = n.length > 0,
                    e = function(e, s, h, c, l) {
                        var y, d, w, k = 0,
                            v = "0",
                            g = e && [],
                            p = [],
                            nt = ht,
                            tt = e || f && t.find.TAG("*", l),
                            it = a += null == nt ? 1 : Math.random() || .1,
                            rt = tt.length;
                        for (l && (ht = s !== o && s); v !== rt && null != (y = tt[v]); v++) {
                            if (f && y) {
                                for (d = 0; w = n[d++];)
                                    if (w(y, s, h)) {
                                        c.push(y);
                                        break
                                    }
                                l && (a = it)
                            }
                            u && ((y = !w && y) && k--, e && g.push(y))
                        }
                        if (k += v, u && v !== k) {
                            for (d = 0; w = i[d++];) w(g, p, s, h);
                            if (e) {
                                if (k > 0)
                                    while (v--) g[v] || p[v] || (p[v] = gi.call(c));
                                p = yt(p)
                            }
                            b.apply(c, p);
                            l && !e && p.length > 0 && k + i.length > 1 && r.uniqueSort(c)
                        }
                        return l && (a = it, ht = nt), g
                    };
                return u ? c(e) : e
            }
            var it, u, t, st, ei, ft, pt, oi, ht, w, rt, k, o, s, l, e, d, ct, et, f = "sizzle" + 1 * new Date,
                h = n.document,
                a = 0,
                ki = 0,
                si = gt(),
                hi = gt(),
                ci = gt(),
                wt = function(n, t) {
                    return n === t && (rt = !0), 0
                },
                li = -2147483648,
                di = {}.hasOwnProperty,
                g = [],
                gi = g.pop,
                nr = g.push,
                b = g.push,
                ai = g.slice,
                nt = function(n, t) {
                    for (var i = 0, r = n.length; r > i; i++)
                        if (n[i] === t) return i;
                    return -1
                },
                bt = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
                i = "[\\x20\\t\\r\\n\\f]",
                ut = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",
                vi = ut.replace("w", "w#"),
                yi = "\\[" + i + "*(" + ut + ")(?:" + i + "*([*^$|!~]?=)" + i + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + vi + "))|)" + i + "*\\]",
                kt = ":(" + ut + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + yi + ")*)|.*)\\)|)",
                tr = new RegExp(i + "+", "g"),
                lt = new RegExp("^" + i + "+|((?:^|[^\\\\])(?:\\\\.)*)" + i + "+$", "g"),
                ir = new RegExp("^" + i + "*," + i + "*"),
                rr = new RegExp("^" + i + "*([>+~]|" + i + ")" + i + "*"),
                ur = new RegExp("=" + i + "*([^\\]'\"]*?)" + i + "*\\]", "g"),
                fr = new RegExp(kt),
                er = new RegExp("^" + vi + "$"),
                at = {
                    ID: new RegExp("^#(" + ut + ")"),
                    CLASS: new RegExp("^\\.(" + ut + ")"),
                    TAG: new RegExp("^(" + ut.replace("w", "w*") + ")"),
                    ATTR: new RegExp("^" + yi),
                    PSEUDO: new RegExp("^" + kt),
                    CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + i + "*(even|odd|(([+-]|)(\\d*)n|)" + i + "*(?:([+-]|)" + i + "*(\\d+)|))" + i + "*\\)|)", "i"),
                    bool: new RegExp("^(?:" + bt + ")$", "i"),
                    needsContext: new RegExp("^" + i + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + i + "*((?:-\\d)?\\d*)" + i + "*\\)|)(?=[^-]|$)", "i")
                },
                or = /^(?:input|select|textarea|button)$/i,
                sr = /^h\d$/i,
                ot = /^[^{]+\{\s*\[native \w/,
                hr = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
                dt = /[+~]/,
                cr = /'|\\/g,
                y = new RegExp("\\\\([\\da-f]{1,6}" + i + "?|(" + i + ")|.)", "ig"),
                p = function(n, t, i) {
                    var r = "0x" + t - 65536;
                    return r !== r || i ? t : 0 > r ? String.fromCharCode(r + 65536) : String.fromCharCode(r >> 10 | 55296, 1023 & r | 56320)
                },
                pi = function() {
                    k()
                };
            try {
                b.apply(g = ai.call(h.childNodes), h.childNodes);
                g[h.childNodes.length].nodeType
            } catch (pr) {
                b = {
                    apply: g.length ? function(n, t) {
                        nr.apply(n, ai.call(t))
                    } : function(n, t) {
                        for (var i = n.length, r = 0; n[i++] = t[r++];);
                        n.length = i - 1
                    }
                }
            }
            u = r.support = {};
            ei = r.isXML = function(n) {
                var t = n && (n.ownerDocument || n).documentElement;
                return t ? "HTML" !== t.nodeName : !1
            };
            k = r.setDocument = function(n) {
                var a, c, r = n ? n.ownerDocument || n : h;
                return r !== o && 9 === r.nodeType && r.documentElement ? (o = r, s = r.documentElement, c = r.defaultView, c && c !== c.top && (c.addEventListener ? c.addEventListener("unload", pi, !1) : c.attachEvent && c.attachEvent("onunload", pi)), l = !ei(r), u.attributes = v(function(n) {
                    return n.className = "i", !n.getAttribute("className")
                }), u.getElementsByTagName = v(function(n) {
                    return n.appendChild(r.createComment("")), !n.getElementsByTagName("*").length
                }), u.getElementsByClassName = ot.test(r.getElementsByClassName), u.getById = v(function(n) {
                    return s.appendChild(n).id = f, !r.getElementsByName || !r.getElementsByName(f).length
                }), u.getById ? (t.find.ID = function(n, t) {
                    if ("undefined" != typeof t.getElementById && l) {
                        var i = t.getElementById(n);
                        return i && i.parentNode ? [i] : []
                    }
                }, t.filter.ID = function(n) {
                    var t = n.replace(y, p);
                    return function(n) {
                        return n.getAttribute("id") === t
                    }
                }) : (delete t.find.ID, t.filter.ID = function(n) {
                    var t = n.replace(y, p);
                    return function(n) {
                        var i = "undefined" != typeof n.getAttributeNode && n.getAttributeNode("id");
                        return i && i.value === t
                    }
                }), t.find.TAG = u.getElementsByTagName ? function(n, t) {
                    return "undefined" != typeof t.getElementsByTagName ? t.getElementsByTagName(n) : u.qsa ? t.querySelectorAll(n) : void 0
                } : function(n, t) {
                    var i, r = [],
                        f = 0,
                        u = t.getElementsByTagName(n);
                    if ("*" === n) {
                        while (i = u[f++]) 1 === i.nodeType && r.push(i);
                        return r
                    }
                    return u
                }, t.find.CLASS = u.getElementsByClassName && function(n, t) {
                    if (l) return t.getElementsByClassName(n)
                }, d = [], e = [], (u.qsa = ot.test(r.querySelectorAll)) && (v(function(n) {
                    s.appendChild(n).innerHTML = "<a id='" + f + "'><\/a><select id='" + f + "-\f]' msallowcapture=''><option selected=''><\/option><\/select>";
                    n.querySelectorAll("[msallowcapture^='']").length && e.push("[*^$]=" + i + "*(?:''|\"\")");
                    n.querySelectorAll("[selected]").length || e.push("\\[" + i + "*(?:value|" + bt + ")");
                    n.querySelectorAll("[id~=" + f + "-]").length || e.push("~=");
                    n.querySelectorAll(":checked").length || e.push(":checked");
                    n.querySelectorAll("a#" + f + "+*").length || e.push(".#.+[+~]")
                }), v(function(n) {
                    var t = r.createElement("input");
                    t.setAttribute("type", "hidden");
                    n.appendChild(t).setAttribute("name", "D");
                    n.querySelectorAll("[name=d]").length && e.push("name" + i + "*[*^$|!~]?=");
                    n.querySelectorAll(":enabled").length || e.push(":enabled", ":disabled");
                    n.querySelectorAll("*,:x");
                    e.push(",.*:")
                })), (u.matchesSelector = ot.test(ct = s.matches || s.webkitMatchesSelector || s.mozMatchesSelector || s.oMatchesSelector || s.msMatchesSelector)) && v(function(n) {
                    u.disconnectedMatch = ct.call(n, "div");
                    ct.call(n, "[s!='']:x");
                    d.push("!=", kt)
                }), e = e.length && new RegExp(e.join("|")), d = d.length && new RegExp(d.join("|")), a = ot.test(s.compareDocumentPosition), et = a || ot.test(s.contains) ? function(n, t) {
                    var r = 9 === n.nodeType ? n.documentElement : n,
                        i = t && t.parentNode;
                    return n === i || !(!i || 1 !== i.nodeType || !(r.contains ? r.contains(i) : n.compareDocumentPosition && 16 & n.compareDocumentPosition(i)))
                } : function(n, t) {
                    if (t)
                        while (t = t.parentNode)
                            if (t === n) return !0;
                    return !1
                }, wt = a ? function(n, t) {
                    if (n === t) return rt = !0, 0;
                    var i = !n.compareDocumentPosition - !t.compareDocumentPosition;
                    return i ? i : (i = (n.ownerDocument || n) === (t.ownerDocument || t) ? n.compareDocumentPosition(t) : 1, 1 & i || !u.sortDetached && t.compareDocumentPosition(n) === i ? n === r || n.ownerDocument === h && et(h, n) ? -1 : t === r || t.ownerDocument === h && et(h, t) ? 1 : w ? nt(w, n) - nt(w, t) : 0 : 4 & i ? -1 : 1)
                } : function(n, t) {
                    if (n === t) return rt = !0, 0;
                    var i, u = 0,
                        o = n.parentNode,
                        s = t.parentNode,
                        f = [n],
                        e = [t];
                    if (!o || !s) return n === r ? -1 : t === r ? 1 : o ? -1 : s ? 1 : w ? nt(w, n) - nt(w, t) : 0;
                    if (o === s) return wi(n, t);
                    for (i = n; i = i.parentNode;) f.unshift(i);
                    for (i = t; i = i.parentNode;) e.unshift(i);
                    while (f[u] === e[u]) u++;
                    return u ? wi(f[u], e[u]) : f[u] === h ? -1 : e[u] === h ? 1 : 0
                }, r) : o
            };
            r.matches = function(n, t) {
                return r(n, null, null, t)
            };
            r.matchesSelector = function(n, t) {
                if ((n.ownerDocument || n) !== o && k(n), t = t.replace(ur, "='$1']"), !(!u.matchesSelector || !l || d && d.test(t) || e && e.test(t))) try {
                    var i = ct.call(n, t);
                    if (i || u.disconnectedMatch || n.document && 11 !== n.document.nodeType) return i
                } catch (f) {}
                return r(t, o, null, [n]).length > 0
            };
            r.contains = function(n, t) {
                return (n.ownerDocument || n) !== o && k(n), et(n, t)
            };
            r.attr = function(n, i) {
                (n.ownerDocument || n) !== o && k(n);
                var f = t.attrHandle[i.toLowerCase()],
                    r = f && di.call(t.attrHandle, i.toLowerCase()) ? f(n, i, !l) : void 0;
                return void 0 !== r ? r : u.attributes || !l ? n.getAttribute(i) : (r = n.getAttributeNode(i)) && r.specified ? r.value : null
            };
            r.error = function(n) {
                throw new Error("Syntax error, unrecognized expression: " + n);
            };
            r.uniqueSort = function(n) {
                var r, f = [],
                    t = 0,
                    i = 0;
                if (rt = !u.detectDuplicates, w = !u.sortStable && n.slice(0), n.sort(wt), rt) {
                    while (r = n[i++]) r === n[i] && (t = f.push(i));
                    while (t--) n.splice(f[t], 1)
                }
                return w = null, n
            };
            st = r.getText = function(n) {
                var r, i = "",
                    u = 0,
                    t = n.nodeType;
                if (t) {
                    if (1 === t || 9 === t || 11 === t) {
                        if ("string" == typeof n.textContent) return n.textContent;
                        for (n = n.firstChild; n; n = n.nextSibling) i += st(n)
                    } else if (3 === t || 4 === t) return n.nodeValue
                } else
                    while (r = n[u++]) i += st(r);
                return i
            };
            t = r.selectors = {
                cacheLength: 50,
                createPseudo: c,
                match: at,
                attrHandle: {},
                find: {},
                relative: {
                    ">": {
                        dir: "parentNode",
                        first: !0
                    },
                    " ": {
                        dir: "parentNode"
                    },
                    "+": {
                        dir: "previousSibling",
                        first: !0
                    },
                    "~": {
                        dir: "previousSibling"
                    }
                },
                preFilter: {
                    ATTR: function(n) {
                        return n[1] = n[1].replace(y, p), n[3] = (n[3] || n[4] || n[5] || "").replace(y, p), "~=" === n[2] && (n[3] = " " + n[3] + " "), n.slice(0, 4)
                    },
                    CHILD: function(n) {
                        return n[1] = n[1].toLowerCase(), "nth" === n[1].slice(0, 3) ? (n[3] || r.error(n[0]), n[4] = +(n[4] ? n[5] + (n[6] || 1) : 2 * ("even" === n[3] || "odd" === n[3])), n[5] = +(n[7] + n[8] || "odd" === n[3])) : n[3] && r.error(n[0]), n
                    },
                    PSEUDO: function(n) {
                        var i, t = !n[6] && n[2];
                        return at.CHILD.test(n[0]) ? null : (n[3] ? n[2] = n[4] || n[5] || "" : t && fr.test(t) && (i = ft(t, !0)) && (i = t.indexOf(")", t.length - i) - t.length) && (n[0] = n[0].slice(0, i), n[2] = t.slice(0, i)), n.slice(0, 3))
                    }
                },
                filter: {
                    TAG: function(n) {
                        var t = n.replace(y, p).toLowerCase();
                        return "*" === n ? function() {
                            return !0
                        } : function(n) {
                            return n.nodeName && n.nodeName.toLowerCase() === t
                        }
                    },
                    CLASS: function(n) {
                        var t = si[n + " "];
                        return t || (t = new RegExp("(^|" + i + ")" + n + "(" + i + "|$)")) && si(n, function(n) {
                            return t.test("string" == typeof n.className && n.className || "undefined" != typeof n.getAttribute && n.getAttribute("class") || "")
                        })
                    },
                    ATTR: function(n, t, i) {
                        return function(u) {
                            var f = r.attr(u, n);
                            return null == f ? "!=" === t : t ? (f += "", "=" === t ? f === i : "!=" === t ? f !== i : "^=" === t ? i && 0 === f.indexOf(i) : "*=" === t ? i && f.indexOf(i) > -1 : "$=" === t ? i && f.slice(-i.length) === i : "~=" === t ? (" " + f.replace(tr, " ") + " ").indexOf(i) > -1 : "|=" === t ? f === i || f.slice(0, i.length + 1) === i + "-" : !1) : !0
                        }
                    },
                    CHILD: function(n, t, i, r, u) {
                        var s = "nth" !== n.slice(0, 3),
                            o = "last" !== n.slice(-4),
                            e = "of-type" === t;
                        return 1 === r && 0 === u ? function(n) {
                            return !!n.parentNode
                        } : function(t, i, h) {
                            var v, k, c, l, y, w, b = s !== o ? "nextSibling" : "previousSibling",
                                p = t.parentNode,
                                g = e && t.nodeName.toLowerCase(),
                                d = !h && !e;
                            if (p) {
                                if (s) {
                                    while (b) {
                                        for (c = t; c = c[b];)
                                            if (e ? c.nodeName.toLowerCase() === g : 1 === c.nodeType) return !1;
                                        w = b = "only" === n && !w && "nextSibling"
                                    }
                                    return !0
                                }
                                if (w = [o ? p.firstChild : p.lastChild], o && d) {
                                    for (k = p[f] || (p[f] = {}), v = k[n] || [], y = v[0] === a && v[1], l = v[0] === a && v[2], c = y && p.childNodes[y]; c = ++y && c && c[b] || (l = y = 0) || w.pop();)
                                        if (1 === c.nodeType && ++l && c === t) {
                                            k[n] = [a, y, l];
                                            break
                                        }
                                } else if (d && (v = (t[f] || (t[f] = {}))[n]) && v[0] === a) l = v[1];
                                else
                                    while (c = ++y && c && c[b] || (l = y = 0) || w.pop())
                                        if ((e ? c.nodeName.toLowerCase() === g : 1 === c.nodeType) && ++l && (d && ((c[f] || (c[f] = {}))[n] = [a, l]), c === t)) break; return l -= u, l === r || l % r == 0 && l / r >= 0
                            }
                        }
                    },
                    PSEUDO: function(n, i) {
                        var e, u = t.pseudos[n] || t.setFilters[n.toLowerCase()] || r.error("unsupported pseudo: " + n);
                        return u[f] ? u(i) : u.length > 1 ? (e = [n, n, "", i], t.setFilters.hasOwnProperty(n.toLowerCase()) ? c(function(n, t) {
                            for (var r, f = u(n, i), e = f.length; e--;) r = nt(n, f[e]), n[r] = !(t[r] = f[e])
                        }) : function(n) {
                            return u(n, 0, e)
                        }) : u
                    }
                },
                pseudos: {
                    not: c(function(n) {
                        var t = [],
                            r = [],
                            i = pt(n.replace(lt, "$1"));
                        return i[f] ? c(function(n, t, r, u) {
                            for (var e, o = i(n, null, u, []), f = n.length; f--;)(e = o[f]) && (n[f] = !(t[f] = e))
                        }) : function(n, u, f) {
                            return t[0] = n, i(t, null, f, r), t[0] = null, !r.pop()
                        }
                    }),
                    has: c(function(n) {
                        return function(t) {
                            return r(n, t).length > 0
                        }
                    }),
                    contains: c(function(n) {
                        return n = n.replace(y, p),
                            function(t) {
                                return (t.textContent || t.innerText || st(t)).indexOf(n) > -1
                            }
                    }),
                    lang: c(function(n) {
                        return er.test(n || "") || r.error("unsupported lang: " + n), n = n.replace(y, p).toLowerCase(),
                            function(t) {
                                var i;
                                do
                                    if (i = l ? t.lang : t.getAttribute("xml:lang") || t.getAttribute("lang")) return i = i.toLowerCase(), i === n || 0 === i.indexOf(n + "-");
                                while ((t = t.parentNode) && 1 === t.nodeType);
                                return !1
                            }
                    }),
                    target: function(t) {
                        var i = n.location && n.location.hash;
                        return i && i.slice(1) === t.id
                    },
                    root: function(n) {
                        return n === s
                    },
                    focus: function(n) {
                        return n === o.activeElement && (!o.hasFocus || o.hasFocus()) && !!(n.type || n.href || ~n.tabIndex)
                    },
                    enabled: function(n) {
                        return n.disabled === !1
                    },
                    disabled: function(n) {
                        return n.disabled === !0
                    },
                    checked: function(n) {
                        var t = n.nodeName.toLowerCase();
                        return "input" === t && !!n.checked || "option" === t && !!n.selected
                    },
                    selected: function(n) {
                        return n.parentNode && n.parentNode.selectedIndex, n.selected === !0
                    },
                    empty: function(n) {
                        for (n = n.firstChild; n; n = n.nextSibling)
                            if (n.nodeType < 6) return !1;
                        return !0
                    },
                    parent: function(n) {
                        return !t.pseudos.empty(n)
                    },
                    header: function(n) {
                        return sr.test(n.nodeName)
                    },
                    input: function(n) {
                        return or.test(n.nodeName)
                    },
                    button: function(n) {
                        var t = n.nodeName.toLowerCase();
                        return "input" === t && "button" === n.type || "button" === t
                    },
                    text: function(n) {
                        var t;
                        return "input" === n.nodeName.toLowerCase() && "text" === n.type && (null == (t = n.getAttribute("type")) || "text" === t.toLowerCase())
                    },
                    first: tt(function() {
                        return [0]
                    }),
                    last: tt(function(n, t) {
                        return [t - 1]
                    }),
                    eq: tt(function(n, t, i) {
                        return [0 > i ? i + t : i]
                    }),
                    even: tt(function(n, t) {
                        for (var i = 0; t > i; i += 2) n.push(i);
                        return n
                    }),
                    odd: tt(function(n, t) {
                        for (var i = 1; t > i; i += 2) n.push(i);
                        return n
                    }),
                    lt: tt(function(n, t, i) {
                        for (var r = 0 > i ? i + t : i; --r >= 0;) n.push(r);
                        return n
                    }),
                    gt: tt(function(n, t, i) {
                        for (var r = 0 > i ? i + t : i; ++r < t;) n.push(r);
                        return n
                    })
                }
            };
            t.pseudos.nth = t.pseudos.eq;
            for (it in {
                    radio: !0,
                    checkbox: !0,
                    file: !0,
                    password: !0,
                    image: !0
                }) t.pseudos[it] = lr(it);
            for (it in {
                    submit: !0,
                    reset: !0
                }) t.pseudos[it] = ar(it);
            return bi.prototype = t.filters = t.pseudos, t.setFilters = new bi, ft = r.tokenize = function(n, i) {
                var e, f, s, o, u, h, c, l = hi[n + " "];
                if (l) return i ? 0 : l.slice(0);
                for (u = n, h = [], c = t.preFilter; u;) {
                    (!e || (f = ir.exec(u))) && (f && (u = u.slice(f[0].length) || u), h.push(s = []));
                    e = !1;
                    (f = rr.exec(u)) && (e = f.shift(), s.push({
                        value: e,
                        type: f[0].replace(lt, " ")
                    }), u = u.slice(e.length));
                    for (o in t.filter)(f = at[o].exec(u)) && (!c[o] || (f = c[o](f))) && (e = f.shift(), s.push({
                        value: e,
                        type: o,
                        matches: f
                    }), u = u.slice(e.length));
                    if (!e) break
                }
                return i ? u.length : u ? r.error(n) : hi(n, h).slice(0)
            }, pt = r.compile = function(n, t) {
                var r, u = [],
                    e = [],
                    i = ci[n + " "];
                if (!i) {
                    for (t || (t = ft(n)), r = t.length; r--;) i = fi(t[r]), i[f] ? u.push(i) : e.push(i);
                    i = ci(n, yr(e, u));
                    i.selector = n
                }
                return i
            }, oi = r.select = function(n, i, r, f) {
                var s, e, o, a, v, c = "function" == typeof n && n,
                    h = !f && ft(n = c.selector || n);
                if (r = r || [], 1 === h.length) {
                    if (e = h[0] = h[0].slice(0), e.length > 2 && "ID" === (o = e[0]).type && u.getById && 9 === i.nodeType && l && t.relative[e[1].type]) {
                        if (i = (t.find.ID(o.matches[0].replace(y, p), i) || [])[0], !i) return r;
                        c && (i = i.parentNode);
                        n = n.slice(e.shift().value.length)
                    }
                    for (s = at.needsContext.test(n) ? 0 : e.length; s--;) {
                        if (o = e[s], t.relative[a = o.type]) break;
                        if ((v = t.find[a]) && (f = v(o.matches[0].replace(y, p), dt.test(e[0].type) && ti(i.parentNode) || i))) {
                            if (e.splice(s, 1), n = f.length && vt(e), !n) return b.apply(r, f), r;
                            break
                        }
                    }
                }
                return (c || pt(n, h))(f, i, !l, r, dt.test(n) && ti(i.parentNode) || i), r
            }, u.sortStable = f.split("").sort(wt).join("") === f, u.detectDuplicates = !!rt, k(), u.sortDetached = v(function(n) {
                return 1 & n.compareDocumentPosition(o.createElement("div"))
            }), v(function(n) {
                return n.innerHTML = "<a href='#'><\/a>", "#" === n.firstChild.getAttribute("href")
            }) || ni("type|href|height|width", function(n, t, i) {
                if (!i) return n.getAttribute(t, "type" === t.toLowerCase() ? 1 : 2)
            }), u.attributes && v(function(n) {
                return n.innerHTML = "<input/>", n.firstChild.setAttribute("value", ""), "" === n.firstChild.getAttribute("value")
            }) || ni("value", function(n, t, i) {
                if (!i && "input" === n.nodeName.toLowerCase()) return n.defaultValue
            }), v(function(n) {
                return null == n.getAttribute("disabled")
            }) || ni(bt, function(n, t, i) {
                var r;
                if (!i) return n[t] === !0 ? t.toLowerCase() : (r = n.getAttributeNode(t)) && r.specified ? r.value : null
            }), r
        }(n);
        i.find = p;
        i.expr = p.selectors;
        i.expr[":"] = i.expr.pseudos;
        i.unique = p.uniqueSort;
        i.text = p.getText;
        i.isXMLDoc = p.isXML;
        i.contains = p.contains;
        var fr = i.expr.match.needsContext,
            er = /^<(\w+)\s*\/?>(?:<\/\1>|)$/,
            re = /^.[^:#\[\.,]*$/;
        i.filter = function(n, t, r) {
            var u = t[0];
            return r && (n = ":not(" + n + ")"), 1 === t.length && 1 === u.nodeType ? i.find.matchesSelector(u, n) ? [u] : [] : i.find.matches(n, i.grep(t, function(n) {
                return 1 === n.nodeType
            }))
        };
        i.fn.extend({
            find: function(n) {
                var t, r = [],
                    u = this,
                    f = u.length;
                if ("string" != typeof n) return this.pushStack(i(n).filter(function() {
                    for (t = 0; f > t; t++)
                        if (i.contains(u[t], this)) return !0
                }));
                for (t = 0; f > t; t++) i.find(n, u[t], r);
                return r = this.pushStack(f > 1 ? i.unique(r) : r), r.selector = this.selector ? this.selector + " " + n : n, r
            },
            filter: function(n) {
                return this.pushStack(ui(this, n || [], !1))
            },
            not: function(n) {
                return this.pushStack(ui(this, n || [], !0))
            },
            is: function(n) {
                return !!ui(this, "string" == typeof n && fr.test(n) ? i(n) : n || [], !1).length
            }
        });
        var ft, u = n.document,
            ue = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/,
            fe = i.fn.init = function(n, t) {
                var r, f;
                if (!n) return this;
                if ("string" == typeof n) {
                    if (r = "<" === n.charAt(0) && ">" === n.charAt(n.length - 1) && n.length >= 3 ? [null, n, null] : ue.exec(n), !r || !r[1] && t) return !t || t.jquery ? (t || ft).find(n) : this.constructor(t).find(n);
                    if (r[1]) {
                        if (t = t instanceof i ? t[0] : t, i.merge(this, i.parseHTML(r[1], t && t.nodeType ? t.ownerDocument || t : u, !0)), er.test(r[1]) && i.isPlainObject(t))
                            for (r in t) i.isFunction(this[r]) ? this[r](t[r]) : this.attr(r, t[r]);
                        return this
                    }
                    if (f = u.getElementById(r[2]), f && f.parentNode) {
                        if (f.id !== r[2]) return ft.find(n);
                        this.length = 1;
                        this[0] = f
                    }
                    return this.context = u, this.selector = n, this
                }
                return n.nodeType ? (this.context = this[0] = n, this.length = 1, this) : i.isFunction(n) ? "undefined" != typeof ft.ready ? ft.ready(n) : n(i) : (void 0 !== n.selector && (this.selector = n.selector, this.context = n.context), i.makeArray(n, this))
            };
        fe.prototype = i.fn;
        ft = i(u);
        or = /^(?:parents|prev(?:Until|All))/;
        sr = {
            children: !0,
            contents: !0,
            next: !0,
            prev: !0
        };
        i.extend({
            dir: function(n, t, r) {
                for (var f = [], u = n[t]; u && 9 !== u.nodeType && (void 0 === r || 1 !== u.nodeType || !i(u).is(r));) 1 === u.nodeType && f.push(u), u = u[t];
                return f
            },
            sibling: function(n, t) {
                for (var i = []; n; n = n.nextSibling) 1 === n.nodeType && n !== t && i.push(n);
                return i
            }
        });
        i.fn.extend({
            has: function(n) {
                var t, r = i(n, this),
                    u = r.length;
                return this.filter(function() {
                    for (t = 0; u > t; t++)
                        if (i.contains(this, r[t])) return !0
                })
            },
            closest: function(n, t) {
                for (var r, f = 0, o = this.length, u = [], e = fr.test(n) || "string" != typeof n ? i(n, t || this.context) : 0; o > f; f++)
                    for (r = this[f]; r && r !== t; r = r.parentNode)
                        if (r.nodeType < 11 && (e ? e.index(r) > -1 : 1 === r.nodeType && i.find.matchesSelector(r, n))) {
                            u.push(r);
                            break
                        }
                return this.pushStack(u.length > 1 ? i.unique(u) : u)
            },
            index: function(n) {
                return n ? "string" == typeof n ? i.inArray(this[0], i(n)) : i.inArray(n.jquery ? n[0] : n, this) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
            },
            add: function(n, t) {
                return this.pushStack(i.unique(i.merge(this.get(), i(n, t))))
            },
            addBack: function(n) {
                return this.add(null == n ? this.prevObject : this.prevObject.filter(n))
            }
        });
        i.each({
            parent: function(n) {
                var t = n.parentNode;
                return t && 11 !== t.nodeType ? t : null
            },
            parents: function(n) {
                return i.dir(n, "parentNode")
            },
            parentsUntil: function(n, t, r) {
                return i.dir(n, "parentNode", r)
            },
            next: function(n) {
                return hr(n, "nextSibling")
            },
            prev: function(n) {
                return hr(n, "previousSibling")
            },
            nextAll: function(n) {
                return i.dir(n, "nextSibling")
            },
            prevAll: function(n) {
                return i.dir(n, "previousSibling")
            },
            nextUntil: function(n, t, r) {
                return i.dir(n, "nextSibling", r)
            },
            prevUntil: function(n, t, r) {
                return i.dir(n, "previousSibling", r)
            },
            siblings: function(n) {
                return i.sibling((n.parentNode || {}).firstChild, n)
            },
            children: function(n) {
                return i.sibling(n.firstChild)
            },
            contents: function(n) {
                return i.nodeName(n, "iframe") ? n.contentDocument || n.contentWindow.document : i.merge([], n.childNodes)
            }
        }, function(n, t) {
            i.fn[n] = function(r, u) {
                var f = i.map(this, t, r);
                return "Until" !== n.slice(-5) && (u = r), u && "string" == typeof u && (f = i.filter(u, f)), this.length > 1 && (sr[n] || (f = i.unique(f)), or.test(n) && (f = f.reverse())), this.pushStack(f)
            }
        });
        h = /\S+/g;
        fi = {};
        i.Callbacks = function(n) {
            n = "string" == typeof n ? fi[n] || ee(n) : i.extend({}, n);
            var o, u, h, f, e, c, t = [],
                r = !n.once && [],
                l = function(i) {
                    for (u = n.memory && i, h = !0, e = c || 0, c = 0, f = t.length, o = !0; t && f > e; e++)
                        if (t[e].apply(i[0], i[1]) === !1 && n.stopOnFalse) {
                            u = !1;
                            break
                        }
                    o = !1;
                    t && (r ? r.length && l(r.shift()) : u ? t = [] : s.disable())
                },
                s = {
                    add: function() {
                        if (t) {
                            var r = t.length;
                            ! function e(r) {
                                i.each(r, function(r, u) {
                                    var f = i.type(u);
                                    "function" === f ? n.unique && s.has(u) || t.push(u) : u && u.length && "string" !== f && e(u)
                                })
                            }(arguments);
                            o ? f = t.length : u && (c = r, l(u))
                        }
                        return this
                    },
                    remove: function() {
                        return t && i.each(arguments, function(n, r) {
                            for (var u;
                                (u = i.inArray(r, t, u)) > -1;) t.splice(u, 1), o && (f >= u && f--, e >= u && e--)
                        }), this
                    },
                    has: function(n) {
                        return n ? i.inArray(n, t) > -1 : !(!t || !t.length)
                    },
                    empty: function() {
                        return t = [], f = 0, this
                    },
                    disable: function() {
                        return t = r = u = void 0, this
                    },
                    disabled: function() {
                        return !t
                    },
                    lock: function() {
                        return r = void 0, u || s.disable(), this
                    },
                    locked: function() {
                        return !r
                    },
                    fireWith: function(n, i) {
                        return !t || h && !r || (i = i || [], i = [n, i.slice ? i.slice() : i], o ? r.push(i) : l(i)), this
                    },
                    fire: function() {
                        return s.fireWith(this, arguments), this
                    },
                    fired: function() {
                        return !!h
                    }
                };
            return s
        };
        i.extend({
            Deferred: function(n) {
                var u = [
                        ["resolve", "done", i.Callbacks("once memory"), "resolved"],
                        ["reject", "fail", i.Callbacks("once memory"), "rejected"],
                        ["notify", "progress", i.Callbacks("memory")]
                    ],
                    f = "pending",
                    r = {
                        state: function() {
                            return f
                        },
                        always: function() {
                            return t.done(arguments).fail(arguments), this
                        },
                        then: function() {
                            var n = arguments;
                            return i.Deferred(function(f) {
                                i.each(u, function(u, e) {
                                    var o = i.isFunction(n[u]) && n[u];
                                    t[e[1]](function() {
                                        var n = o && o.apply(this, arguments);
                                        n && i.isFunction(n.promise) ? n.promise().done(f.resolve).fail(f.reject).progress(f.notify) : f[e[0] + "With"](this === r ? f.promise() : this, o ? [n] : arguments)
                                    })
                                });
                                n = null
                            }).promise()
                        },
                        promise: function(n) {
                            return null != n ? i.extend(n, r) : r
                        }
                    },
                    t = {};
                return r.pipe = r.then, i.each(u, function(n, i) {
                    var e = i[2],
                        o = i[3];
                    r[i[1]] = e.add;
                    o && e.add(function() {
                        f = o
                    }, u[1 ^ n][2].disable, u[2][2].lock);
                    t[i[0]] = function() {
                        return t[i[0] + "With"](this === t ? r : this, arguments), this
                    };
                    t[i[0] + "With"] = e.fireWith
                }), r.promise(t), n && n.call(t, t), t
            },
            when: function(n) {
                var t = 0,
                    u = l.call(arguments),
                    r = u.length,
                    e = 1 !== r || n && i.isFunction(n.promise) ? r : 0,
                    f = 1 === e ? n : i.Deferred(),
                    h = function(n, t, i) {
                        return function(r) {
                            t[n] = this;
                            i[n] = arguments.length > 1 ? l.call(arguments) : r;
                            i === o ? f.notifyWith(t, i) : --e || f.resolveWith(t, i)
                        }
                    },
                    o, c, s;
                if (r > 1)
                    for (o = new Array(r), c = new Array(r), s = new Array(r); r > t; t++) u[t] && i.isFunction(u[t].promise) ? u[t].promise().done(h(t, s, u)).fail(f.reject).progress(h(t, c, o)) : --e;
                return e || f.resolveWith(s, u), f.promise()
            }
        });
        i.fn.ready = function(n) {
            return i.ready.promise().done(n), this
        };
        i.extend({
            isReady: !1,
            readyWait: 1,
            holdReady: function(n) {
                n ? i.readyWait++ : i.ready(!0)
            },
            ready: function(n) {
                if (n === !0 ? !--i.readyWait : !i.isReady) {
                    if (!u.body) return setTimeout(i.ready);
                    i.isReady = !0;
                    n !== !0 && --i.readyWait > 0 || (lt.resolveWith(u, [i]), i.fn.triggerHandler && (i(u).triggerHandler("ready"), i(u).off("ready")))
                }
            }
        });
        i.ready.promise = function(t) {
            if (!lt)
                if (lt = i.Deferred(), "complete" === u.readyState) setTimeout(i.ready);
                else if (u.addEventListener) u.addEventListener("DOMContentLoaded", a, !1), n.addEventListener("load", a, !1);
            else {
                u.attachEvent("onreadystatechange", a);
                n.attachEvent("onload", a);
                var r = !1;
                try {
                    r = null == n.frameElement && u.documentElement
                } catch (e) {}
                r && r.doScroll && ! function f() {
                    if (!i.isReady) {
                        try {
                            r.doScroll("left")
                        } catch (n) {
                            return setTimeout(f, 50)
                        }
                        cr();
                        i.ready()
                    }
                }()
            }
            return lt.promise(t)
        };
        o = "undefined";
        for (lr in i(r)) break;
        r.ownLast = "0" !== lr;
        r.inlineBlockNeedsLayout = !1;
        i(function() {
                var f, t, n, i;
                n = u.getElementsByTagName("body")[0];
                n && n.style && (t = u.createElement("div"), i = u.createElement("div"), i.style.cssText = "position:absolute;border:0;width:0;height:0;top:0;left:-9999px", n.appendChild(i).appendChild(t), typeof t.style.zoom !== o && (t.style.cssText = "display:inline;margin:0;border:0;padding:1px;width:1px;zoom:1", r.inlineBlockNeedsLayout = f = 3 === t.offsetWidth, f && (n.style.zoom = 1)), n.removeChild(i))
            }),
            function() {
                var n = u.createElement("div");
                if (null == r.deleteExpando) {
                    r.deleteExpando = !0;
                    try {
                        delete n.test
                    } catch (t) {
                        r.deleteExpando = !1
                    }
                }
                n = null
            }();
        i.acceptData = function(n) {
            var t = i.noData[(n.nodeName + " ").toLowerCase()],
                r = +n.nodeType || 1;
            return 1 !== r && 9 !== r ? !1 : !t || t !== !0 && n.getAttribute("classid") === t
        };
        ar = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/;
        vr = /([A-Z])/g;
        i.extend({
            cache: {},
            noData: {
                "applet ": !0,
                "embed ": !0,
                "object ": "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
            },
            hasData: function(n) {
                return n = n.nodeType ? i.cache[n[i.expando]] : n[i.expando], !!n && !ei(n)
            },
            data: function(n, t, i) {
                return pr(n, t, i)
            },
            removeData: function(n, t) {
                return wr(n, t)
            },
            _data: function(n, t, i) {
                return pr(n, t, i, !0)
            },
            _removeData: function(n, t) {
                return wr(n, t, !0)
            }
        });
        i.fn.extend({
            data: function(n, t) {
                var f, u, e, r = this[0],
                    o = r && r.attributes;
                if (void 0 === n) {
                    if (this.length && (e = i.data(r), 1 === r.nodeType && !i._data(r, "parsedAttrs"))) {
                        for (f = o.length; f--;) o[f] && (u = o[f].name, 0 === u.indexOf("data-") && (u = i.camelCase(u.slice(5)), yr(r, u, e[u])));
                        i._data(r, "parsedAttrs", !0)
                    }
                    return e
                }
                return "object" == typeof n ? this.each(function() {
                    i.data(this, n)
                }) : arguments.length > 1 ? this.each(function() {
                    i.data(this, n, t)
                }) : r ? yr(r, n, i.data(r, n)) : void 0
            },
            removeData: function(n) {
                return this.each(function() {
                    i.removeData(this, n)
                })
            }
        });
        i.extend({
            queue: function(n, t, r) {
                var u;
                if (n) return (t = (t || "fx") + "queue", u = i._data(n, t), r && (!u || i.isArray(r) ? u = i._data(n, t, i.makeArray(r)) : u.push(r)), u || [])
            },
            dequeue: function(n, t) {
                t = t || "fx";
                var r = i.queue(n, t),
                    e = r.length,
                    u = r.shift(),
                    f = i._queueHooks(n, t),
                    o = function() {
                        i.dequeue(n, t)
                    };
                "inprogress" === u && (u = r.shift(), e--);
                u && ("fx" === t && r.unshift("inprogress"), delete f.stop, u.call(n, o, f));
                !e && f && f.empty.fire()
            },
            _queueHooks: function(n, t) {
                var r = t + "queueHooks";
                return i._data(n, r) || i._data(n, r, {
                    empty: i.Callbacks("once memory").add(function() {
                        i._removeData(n, t + "queue");
                        i._removeData(n, r)
                    })
                })
            }
        });
        i.fn.extend({
            queue: function(n, t) {
                var r = 2;
                return "string" != typeof n && (t = n, n = "fx", r--), arguments.length < r ? i.queue(this[0], n) : void 0 === t ? this : this.each(function() {
                    var r = i.queue(this, n, t);
                    i._queueHooks(this, n);
                    "fx" === n && "inprogress" !== r[0] && i.dequeue(this, n)
                })
            },
            dequeue: function(n) {
                return this.each(function() {
                    i.dequeue(this, n)
                })
            },
            clearQueue: function(n) {
                return this.queue(n || "fx", [])
            },
            promise: function(n, t) {
                var r, f = 1,
                    e = i.Deferred(),
                    u = this,
                    o = this.length,
                    s = function() {
                        --f || e.resolveWith(u, [u])
                    };
                for ("string" != typeof n && (t = n, n = void 0), n = n || "fx"; o--;) r = i._data(u[o], n + "queueHooks"), r && r.empty && (f++, r.empty.add(s));
                return s(), e.promise(t)
            }
        });
        var at = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
            w = ["Top", "Right", "Bottom", "Left"],
            et = function(n, t) {
                return n = t || n, "none" === i.css(n, "display") || !i.contains(n.ownerDocument, n)
            },
            b = i.access = function(n, t, r, u, f, e, o) {
                var s = 0,
                    c = n.length,
                    h = null == r;
                if ("object" === i.type(r)) {
                    f = !0;
                    for (s in r) i.access(n, t, s, r[s], !0, e, o)
                } else if (void 0 !== u && (f = !0, i.isFunction(u) || (o = !0), h && (o ? (t.call(n, u), t = null) : (h = t, t = function(n, t, r) {
                        return h.call(i(n), r)
                    })), t))
                    for (; c > s; s++) t(n[s], r, o ? u : u.call(n[s], s, t(n[s], r)));
                return f ? n : h ? t.call(n) : c ? t(n[0], r) : e
            },
            oi = /^(?:checkbox|radio)$/i;
        ! function() {
            var t = u.createElement("input"),
                n = u.createElement("div"),
                i = u.createDocumentFragment();
            if (n.innerHTML = "  <link/><table><\/table><a href='/a'>a<\/a><input type='checkbox'/>", r.leadingWhitespace = 3 === n.firstChild.nodeType, r.tbody = !n.getElementsByTagName("tbody").length, r.htmlSerialize = !!n.getElementsByTagName("link").length, r.html5Clone = "<:nav><\/:nav>" !== u.createElement("nav").cloneNode(!0).outerHTML, t.type = "checkbox", t.checked = !0, i.appendChild(t), r.appendChecked = t.checked, n.innerHTML = "<textarea>x<\/textarea>", r.noCloneChecked = !!n.cloneNode(!0).lastChild.defaultValue, i.appendChild(n), n.innerHTML = "<input type='radio' checked='checked' name='t'/>", r.checkClone = n.cloneNode(!0).cloneNode(!0).lastChild.checked, r.noCloneEvent = !0, n.attachEvent && (n.attachEvent("onclick", function() {
                    r.noCloneEvent = !1
                }), n.cloneNode(!0).click()), null == r.deleteExpando) {
                r.deleteExpando = !0;
                try {
                    delete n.test
                } catch (f) {
                    r.deleteExpando = !1
                }
            }
        }(),
        function() {
            var t, i, f = u.createElement("div");
            for (t in {
                    submit: !0,
                    change: !0,
                    focusin: !0
                }) i = "on" + t, (r[t + "Bubbles"] = i in n) || (f.setAttribute(i, "t"), r[t + "Bubbles"] = f.attributes[i].expando === !1);
            f = null
        }();
        var si = /^(?:input|select|textarea)$/i,
            oe = /^key/,
            se = /^(?:mouse|pointer|contextmenu)|click/,
            br = /^(?:focusinfocus|focusoutblur)$/,
            kr = /^([^.]*)(?:\.(.+)|)$/;
        i.event = {
            global: {},
            add: function(n, t, r, u, f) {
                var w, y, b, p, s, c, l, a, e, k, d, v = i._data(n);
                if (v) {
                    for (r.handler && (p = r, r = p.handler, f = p.selector), r.guid || (r.guid = i.guid++), (y = v.events) || (y = v.events = {}), (c = v.handle) || (c = v.handle = function(n) {
                            if (typeof i !== o && (!n || i.event.triggered !== n.type)) return i.event.dispatch.apply(c.elem, arguments)
                        }, c.elem = n), t = (t || "").match(h) || [""], b = t.length; b--;) w = kr.exec(t[b]) || [], e = d = w[1], k = (w[2] || "").split(".").sort(), e && (s = i.event.special[e] || {}, e = (f ? s.delegateType : s.bindType) || e, s = i.event.special[e] || {}, l = i.extend({
                        type: e,
                        origType: d,
                        data: u,
                        handler: r,
                        guid: r.guid,
                        selector: f,
                        needsContext: f && i.expr.match.needsContext.test(f),
                        namespace: k.join(".")
                    }, p), (a = y[e]) || (a = y[e] = [], a.delegateCount = 0, s.setup && s.setup.call(n, u, k, c) !== !1 || (n.addEventListener ? n.addEventListener(e, c, !1) : n.attachEvent && n.attachEvent("on" + e, c))), s.add && (s.add.call(n, l), l.handler.guid || (l.handler.guid = r.guid)), f ? a.splice(a.delegateCount++, 0, l) : a.push(l), i.event.global[e] = !0);
                    n = null
                }
            },
            remove: function(n, t, r, u, f) {
                var y, o, s, b, p, a, c, l, e, w, k, v = i.hasData(n) && i._data(n);
                if (v && (a = v.events)) {
                    for (t = (t || "").match(h) || [""], p = t.length; p--;)
                        if (s = kr.exec(t[p]) || [], e = k = s[1], w = (s[2] || "").split(".").sort(), e) {
                            for (c = i.event.special[e] || {}, e = (u ? c.delegateType : c.bindType) || e, l = a[e] || [], s = s[2] && new RegExp("(^|\\.)" + w.join("\\.(?:.*\\.|)") + "(\\.|$)"), b = y = l.length; y--;) o = l[y], !f && k !== o.origType || r && r.guid !== o.guid || s && !s.test(o.namespace) || u && u !== o.selector && ("**" !== u || !o.selector) || (l.splice(y, 1), o.selector && l.delegateCount--, c.remove && c.remove.call(n, o));
                            b && !l.length && (c.teardown && c.teardown.call(n, w, v.handle) !== !1 || i.removeEvent(n, e, v.handle), delete a[e])
                        } else
                            for (e in a) i.event.remove(n, e + t[p], r, u, !0);
                    i.isEmptyObject(a) && (delete v.handle, i._removeData(n, "events"))
                }
            },
            trigger: function(t, r, f, e) {
                var l, a, o, p, c, h, w, y = [f || u],
                    s = tt.call(t, "type") ? t.type : t,
                    v = tt.call(t, "namespace") ? t.namespace.split(".") : [];
                if (o = h = f = f || u, 3 !== f.nodeType && 8 !== f.nodeType && !br.test(s + i.event.triggered) && (s.indexOf(".") >= 0 && (v = s.split("."), s = v.shift(), v.sort()), a = s.indexOf(":") < 0 && "on" + s, t = t[i.expando] ? t : new i.Event(s, "object" == typeof t && t), t.isTrigger = e ? 2 : 3, t.namespace = v.join("."), t.namespace_re = t.namespace ? new RegExp("(^|\\.)" + v.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, t.result = void 0, t.target || (t.target = f), r = null == r ? [t] : i.makeArray(r, [t]), c = i.event.special[s] || {}, e || !c.trigger || c.trigger.apply(f, r) !== !1)) {
                    if (!e && !c.noBubble && !i.isWindow(f)) {
                        for (p = c.delegateType || s, br.test(p + s) || (o = o.parentNode); o; o = o.parentNode) y.push(o), h = o;
                        h === (f.ownerDocument || u) && y.push(h.defaultView || h.parentWindow || n)
                    }
                    for (w = 0;
                        (o = y[w++]) && !t.isPropagationStopped();) t.type = w > 1 ? p : c.bindType || s, l = (i._data(o, "events") || {})[t.type] && i._data(o, "handle"), l && l.apply(o, r), l = a && o[a], l && l.apply && i.acceptData(o) && (t.result = l.apply(o, r), t.result === !1 && t.preventDefault());
                    if (t.type = s, !e && !t.isDefaultPrevented() && (!c._default || c._default.apply(y.pop(), r) === !1) && i.acceptData(f) && a && f[s] && !i.isWindow(f)) {
                        h = f[a];
                        h && (f[a] = null);
                        i.event.triggered = s;
                        try {
                            f[s]()
                        } catch (b) {}
                        i.event.triggered = void 0;
                        h && (f[a] = h)
                    }
                    return t.result
                }
            },
            dispatch: function(n) {
                n = i.event.fix(n);
                var e, f, t, r, o, s = [],
                    h = l.call(arguments),
                    c = (i._data(this, "events") || {})[n.type] || [],
                    u = i.event.special[n.type] || {};
                if (h[0] = n, n.delegateTarget = this, !u.preDispatch || u.preDispatch.call(this, n) !== !1) {
                    for (s = i.event.handlers.call(this, n, c), e = 0;
                        (r = s[e++]) && !n.isPropagationStopped();)
                        for (n.currentTarget = r.elem, o = 0;
                            (t = r.handlers[o++]) && !n.isImmediatePropagationStopped();)(!n.namespace_re || n.namespace_re.test(t.namespace)) && (n.handleObj = t, n.data = t.data, f = ((i.event.special[t.origType] || {}).handle || t.handler).apply(r.elem, h), void 0 !== f && (n.result = f) === !1 && (n.preventDefault(), n.stopPropagation()));
                    return u.postDispatch && u.postDispatch.call(this, n), n.result
                }
            },
            handlers: function(n, t) {
                var f, e, u, o, h = [],
                    s = t.delegateCount,
                    r = n.target;
                if (s && r.nodeType && (!n.button || "click" !== n.type))
                    for (; r != this; r = r.parentNode || this)
                        if (1 === r.nodeType && (r.disabled !== !0 || "click" !== n.type)) {
                            for (u = [], o = 0; s > o; o++) e = t[o], f = e.selector + " ", void 0 === u[f] && (u[f] = e.needsContext ? i(f, this).index(r) >= 0 : i.find(f, this, null, [r]).length), u[f] && u.push(e);
                            u.length && h.push({
                                elem: r,
                                handlers: u
                            })
                        }
                return s < t.length && h.push({
                    elem: this,
                    handlers: t.slice(s)
                }), h
            },
            fix: function(n) {
                if (n[i.expando]) return n;
                var e, o, s, r = n.type,
                    f = n,
                    t = this.fixHooks[r];
                for (t || (this.fixHooks[r] = t = se.test(r) ? this.mouseHooks : oe.test(r) ? this.keyHooks : {}), s = t.props ? this.props.concat(t.props) : this.props, n = new i.Event(f), e = s.length; e--;) o = s[e], n[o] = f[o];
                return n.target || (n.target = f.srcElement || u), 3 === n.target.nodeType && (n.target = n.target.parentNode), n.metaKey = !!n.metaKey, t.filter ? t.filter(n, f) : n
            },
            props: "altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
            fixHooks: {},
            keyHooks: {
                props: "char charCode key keyCode".split(" "),
                filter: function(n, t) {
                    return null == n.which && (n.which = null != t.charCode ? t.charCode : t.keyCode), n
                }
            },
            mouseHooks: {
                props: "button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
                filter: function(n, t) {
                    var i, e, r, f = t.button,
                        o = t.fromElement;
                    return null == n.pageX && null != t.clientX && (e = n.target.ownerDocument || u, r = e.documentElement, i = e.body, n.pageX = t.clientX + (r && r.scrollLeft || i && i.scrollLeft || 0) - (r && r.clientLeft || i && i.clientLeft || 0), n.pageY = t.clientY + (r && r.scrollTop || i && i.scrollTop || 0) - (r && r.clientTop || i && i.clientTop || 0)), !n.relatedTarget && o && (n.relatedTarget = o === n.target ? t.toElement : o), n.which || void 0 === f || (n.which = 1 & f ? 1 : 2 & f ? 3 : 4 & f ? 2 : 0), n
                }
            },
            special: {
                load: {
                    noBubble: !0
                },
                focus: {
                    trigger: function() {
                        if (this !== dr() && this.focus) try {
                            return this.focus(), !1
                        } catch (n) {}
                    },
                    delegateType: "focusin"
                },
                blur: {
                    trigger: function() {
                        if (this === dr() && this.blur) return (this.blur(), !1)
                    },
                    delegateType: "focusout"
                },
                click: {
                    trigger: function() {
                        if (i.nodeName(this, "input") && "checkbox" === this.type && this.click) return (this.click(), !1)
                    },
                    _default: function(n) {
                        return i.nodeName(n.target, "a")
                    }
                },
                beforeunload: {
                    postDispatch: function(n) {
                        void 0 !== n.result && n.originalEvent && (n.originalEvent.returnValue = n.result)
                    }
                }
            },
            simulate: function(n, t, r, u) {
                var f = i.extend(new i.Event, r, {
                    type: n,
                    isSimulated: !0,
                    originalEvent: {}
                });
                u ? i.event.trigger(f, null, t) : i.event.dispatch.call(t, f);
                f.isDefaultPrevented() && r.preventDefault()
            }
        };
        i.removeEvent = u.removeEventListener ? function(n, t, i) {
            n.removeEventListener && n.removeEventListener(t, i, !1)
        } : function(n, t, i) {
            var r = "on" + t;
            n.detachEvent && (typeof n[r] === o && (n[r] = null), n.detachEvent(r, i))
        };
        i.Event = function(n, t) {
            return this instanceof i.Event ? (n && n.type ? (this.originalEvent = n, this.type = n.type, this.isDefaultPrevented = n.defaultPrevented || void 0 === n.defaultPrevented && n.returnValue === !1 ? vt : it) : this.type = n, t && i.extend(this, t), this.timeStamp = n && n.timeStamp || i.now(), void(this[i.expando] = !0)) : new i.Event(n, t)
        };
        i.Event.prototype = {
            isDefaultPrevented: it,
            isPropagationStopped: it,
            isImmediatePropagationStopped: it,
            preventDefault: function() {
                var n = this.originalEvent;
                this.isDefaultPrevented = vt;
                n && (n.preventDefault ? n.preventDefault() : n.returnValue = !1)
            },
            stopPropagation: function() {
                var n = this.originalEvent;
                this.isPropagationStopped = vt;
                n && (n.stopPropagation && n.stopPropagation(), n.cancelBubble = !0)
            },
            stopImmediatePropagation: function() {
                var n = this.originalEvent;
                this.isImmediatePropagationStopped = vt;
                n && n.stopImmediatePropagation && n.stopImmediatePropagation();
                this.stopPropagation()
            }
        };
        i.each({
            mouseenter: "mouseover",
            mouseleave: "mouseout",
            pointerenter: "pointerover",
            pointerleave: "pointerout"
        }, function(n, t) {
            i.event.special[n] = {
                delegateType: t,
                bindType: t,
                handle: function(n) {
                    var u, f = this,
                        r = n.relatedTarget,
                        e = n.handleObj;
                    return (!r || r !== f && !i.contains(f, r)) && (n.type = e.origType, u = e.handler.apply(this, arguments), n.type = t), u
                }
            }
        });
        r.submitBubbles || (i.event.special.submit = {
            setup: function() {
                return i.nodeName(this, "form") ? !1 : void i.event.add(this, "click._submit keypress._submit", function(n) {
                    var r = n.target,
                        t = i.nodeName(r, "input") || i.nodeName(r, "button") ? r.form : void 0;
                    t && !i._data(t, "submitBubbles") && (i.event.add(t, "submit._submit", function(n) {
                        n._submit_bubble = !0
                    }), i._data(t, "submitBubbles", !0))
                })
            },
            postDispatch: function(n) {
                n._submit_bubble && (delete n._submit_bubble, this.parentNode && !n.isTrigger && i.event.simulate("submit", this.parentNode, n, !0))
            },
            teardown: function() {
                return i.nodeName(this, "form") ? !1 : void i.event.remove(this, "._submit")
            }
        });
        r.changeBubbles || (i.event.special.change = {
            setup: function() {
                return si.test(this.nodeName) ? (("checkbox" === this.type || "radio" === this.type) && (i.event.add(this, "propertychange._change", function(n) {
                    "checked" === n.originalEvent.propertyName && (this._just_changed = !0)
                }), i.event.add(this, "click._change", function(n) {
                    this._just_changed && !n.isTrigger && (this._just_changed = !1);
                    i.event.simulate("change", this, n, !0)
                })), !1) : void i.event.add(this, "beforeactivate._change", function(n) {
                    var t = n.target;
                    si.test(t.nodeName) && !i._data(t, "changeBubbles") && (i.event.add(t, "change._change", function(n) {
                        !this.parentNode || n.isSimulated || n.isTrigger || i.event.simulate("change", this.parentNode, n, !0)
                    }), i._data(t, "changeBubbles", !0))
                })
            },
            handle: function(n) {
                var t = n.target;
                if (this !== t || n.isSimulated || n.isTrigger || "radio" !== t.type && "checkbox" !== t.type) return n.handleObj.handler.apply(this, arguments)
            },
            teardown: function() {
                return i.event.remove(this, "._change"), !si.test(this.nodeName)
            }
        });
        r.focusinBubbles || i.each({
            focus: "focusin",
            blur: "focusout"
        }, function(n, t) {
            var r = function(n) {
                i.event.simulate(t, n.target, i.event.fix(n), !0)
            };
            i.event.special[t] = {
                setup: function() {
                    var u = this.ownerDocument || this,
                        f = i._data(u, t);
                    f || u.addEventListener(n, r, !0);
                    i._data(u, t, (f || 0) + 1)
                },
                teardown: function() {
                    var u = this.ownerDocument || this,
                        f = i._data(u, t) - 1;
                    f ? i._data(u, t, f) : (u.removeEventListener(n, r, !0), i._removeData(u, t))
                }
            }
        });
        i.fn.extend({
            on: function(n, t, r, u, f) {
                var o, e;
                if ("object" == typeof n) {
                    "string" != typeof t && (r = r || t, t = void 0);
                    for (o in n) this.on(o, t, r, n[o], f);
                    return this
                }
                if (null == r && null == u ? (u = t, r = t = void 0) : null == u && ("string" == typeof t ? (u = r, r = void 0) : (u = r, r = t, t = void 0)), u === !1) u = it;
                else if (!u) return this;
                return 1 === f && (e = u, u = function(n) {
                    return i().off(n), e.apply(this, arguments)
                }, u.guid = e.guid || (e.guid = i.guid++)), this.each(function() {
                    i.event.add(this, n, u, r, t)
                })
            },
            one: function(n, t, i, r) {
                return this.on(n, t, i, r, 1)
            },
            off: function(n, t, r) {
                var u, f;
                if (n && n.preventDefault && n.handleObj) return u = n.handleObj, i(n.delegateTarget).off(u.namespace ? u.origType + "." + u.namespace : u.origType, u.selector, u.handler), this;
                if ("object" == typeof n) {
                    for (f in n) this.off(f, t, n[f]);
                    return this
                }
                return (t === !1 || "function" == typeof t) && (r = t, t = void 0), r === !1 && (r = it), this.each(function() {
                    i.event.remove(this, n, r, t)
                })
            },
            trigger: function(n, t) {
                return this.each(function() {
                    i.event.trigger(n, t, this)
                })
            },
            triggerHandler: function(n, t) {
                var r = this[0];
                if (r) return i.event.trigger(n, t, r, !0)
            }
        });
        var nu = "abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",
            he = / jQuery\d+="(?:null|\d+)"/g,
            tu = new RegExp("<(?:" + nu + ")[\\s/>]", "i"),
            hi = /^\s+/,
            iu = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,
            ru = /<([\w:]+)/,
            uu = /<tbody/i,
            ce = /<|&#?\w+;/,
            le = /<(?:script|style|link)/i,
            ae = /checked\s*(?:[^=]|=\s*.checked.)/i,
            fu = /^$|\/(?:java|ecma)script/i,
            ve = /^true\/(.*)/,
            ye = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,
            s = {
                option: [1, "<select multiple='multiple'>", "<\/select>"],
                legend: [1, "<fieldset>", "<\/fieldset>"],
                area: [1, "<map>", "<\/map>"],
                param: [1, "<object>", "<\/object>"],
                thead: [1, "<table>", "<\/table>"],
                tr: [2, "<table><tbody>", "<\/tbody><\/table>"],
                col: [2, "<table><tbody><\/tbody><colgroup>", "<\/colgroup><\/table>"],
                td: [3, "<table><tbody><tr>", "<\/tr><\/tbody><\/table>"],
                _default: r.htmlSerialize ? [0, "", ""] : [1, "X<div>", "<\/div>"]
            },
            pe = gr(u),
            ci = pe.appendChild(u.createElement("div"));
        s.optgroup = s.option;
        s.tbody = s.tfoot = s.colgroup = s.caption = s.thead;
        s.th = s.td;
        i.extend({
            clone: function(n, t, u) {
                var e, c, s, o, h, l = i.contains(n.ownerDocument, n);
                if (r.html5Clone || i.isXMLDoc(n) || !tu.test("<" + n.nodeName + ">") ? s = n.cloneNode(!0) : (ci.innerHTML = n.outerHTML, ci.removeChild(s = ci.firstChild)), !(r.noCloneEvent && r.noCloneChecked || 1 !== n.nodeType && 11 !== n.nodeType || i.isXMLDoc(n)))
                    for (e = f(s), h = f(n), o = 0; null != (c = h[o]); ++o) e[o] && be(c, e[o]);
                if (t)
                    if (u)
                        for (h = h || f(n), e = e || f(s), o = 0; null != (c = h[o]); o++) hu(c, e[o]);
                    else hu(n, s);
                return e = f(s, "script"), e.length > 0 && li(e, !l && f(n, "script")), e = h = c = null, s
            },
            buildFragment: function(n, t, u, e) {
                for (var c, o, b, h, p, w, a, k = n.length, v = gr(t), l = [], y = 0; k > y; y++)
                    if (o = n[y], o || 0 === o)
                        if ("object" === i.type(o)) i.merge(l, o.nodeType ? [o] : o);
                        else if (ce.test(o)) {
                    for (h = h || v.appendChild(t.createElement("div")), p = (ru.exec(o) || ["", ""])[1].toLowerCase(), a = s[p] || s._default, h.innerHTML = a[1] + o.replace(iu, "<$1><\/$2>") + a[2], c = a[0]; c--;) h = h.lastChild;
                    if (!r.leadingWhitespace && hi.test(o) && l.push(t.createTextNode(hi.exec(o)[0])), !r.tbody)
                        for (o = "table" !== p || uu.test(o) ? "<table>" !== a[1] || uu.test(o) ? 0 : h : h.firstChild, c = o && o.childNodes.length; c--;) i.nodeName(w = o.childNodes[c], "tbody") && !w.childNodes.length && o.removeChild(w);
                    for (i.merge(l, h.childNodes), h.textContent = ""; h.firstChild;) h.removeChild(h.firstChild);
                    h = v.lastChild
                } else l.push(t.createTextNode(o));
                for (h && v.removeChild(h), r.appendChecked || i.grep(f(l, "input"), we), y = 0; o = l[y++];)
                    if ((!e || -1 === i.inArray(o, e)) && (b = i.contains(o.ownerDocument, o), h = f(v.appendChild(o), "script"), b && li(h), u))
                        for (c = 0; o = h[c++];) fu.test(o.type || "") && u.push(o);
                return h = null, v
            },
            cleanData: function(n, t) {
                for (var u, e, f, s, a = 0, h = i.expando, l = i.cache, v = r.deleteExpando, y = i.event.special; null != (u = n[a]); a++)
                    if ((t || i.acceptData(u)) && (f = u[h], s = f && l[f])) {
                        if (s.events)
                            for (e in s.events) y[e] ? i.event.remove(u, e) : i.removeEvent(u, e, s.handle);
                        l[f] && (delete l[f], v ? delete u[h] : typeof u.removeAttribute !== o ? u.removeAttribute(h) : u[h] = null, c.push(f))
                    }
            }
        });
        i.fn.extend({
            text: function(n) {
                return b(this, function(n) {
                    return void 0 === n ? i.text(this) : this.empty().append((this[0] && this[0].ownerDocument || u).createTextNode(n))
                }, null, n, arguments.length)
            },
            append: function() {
                return this.domManip(arguments, function(n) {
                    if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                        var t = eu(this, n);
                        t.appendChild(n)
                    }
                })
            },
            prepend: function() {
                return this.domManip(arguments, function(n) {
                    if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                        var t = eu(this, n);
                        t.insertBefore(n, t.firstChild)
                    }
                })
            },
            before: function() {
                return this.domManip(arguments, function(n) {
                    this.parentNode && this.parentNode.insertBefore(n, this)
                })
            },
            after: function() {
                return this.domManip(arguments, function(n) {
                    this.parentNode && this.parentNode.insertBefore(n, this.nextSibling)
                })
            },
            remove: function(n, t) {
                for (var r, e = n ? i.filter(n, this) : this, u = 0; null != (r = e[u]); u++) t || 1 !== r.nodeType || i.cleanData(f(r)), r.parentNode && (t && i.contains(r.ownerDocument, r) && li(f(r, "script")), r.parentNode.removeChild(r));
                return this
            },
            empty: function() {
                for (var n, t = 0; null != (n = this[t]); t++) {
                    for (1 === n.nodeType && i.cleanData(f(n, !1)); n.firstChild;) n.removeChild(n.firstChild);
                    n.options && i.nodeName(n, "select") && (n.options.length = 0)
                }
                return this
            },
            clone: function(n, t) {
                return n = null == n ? !1 : n, t = null == t ? n : t, this.map(function() {
                    return i.clone(this, n, t)
                })
            },
            html: function(n) {
                return b(this, function(n) {
                    var t = this[0] || {},
                        u = 0,
                        e = this.length;
                    if (void 0 === n) return 1 === t.nodeType ? t.innerHTML.replace(he, "") : void 0;
                    if (!("string" != typeof n || le.test(n) || !r.htmlSerialize && tu.test(n) || !r.leadingWhitespace && hi.test(n) || s[(ru.exec(n) || ["", ""])[1].toLowerCase()])) {
                        n = n.replace(iu, "<$1><\/$2>");
                        try {
                            for (; e > u; u++) t = this[u] || {}, 1 === t.nodeType && (i.cleanData(f(t, !1)), t.innerHTML = n);
                            t = 0
                        } catch (o) {}
                    }
                    t && this.empty().append(n)
                }, null, n, arguments.length)
            },
            replaceWith: function() {
                var n = arguments[0];
                return this.domManip(arguments, function(t) {
                    n = this.parentNode;
                    i.cleanData(f(this));
                    n && n.replaceChild(t, this)
                }), n && (n.length || n.nodeType) ? this : this.remove()
            },
            detach: function(n) {
                return this.remove(n, !0)
            },
            domManip: function(n, t) {
                n = ir.apply([], n);
                var h, u, c, o, v, s, e = 0,
                    l = this.length,
                    p = this,
                    w = l - 1,
                    a = n[0],
                    y = i.isFunction(a);
                if (y || l > 1 && "string" == typeof a && !r.checkClone && ae.test(a)) return this.each(function(i) {
                    var r = p.eq(i);
                    y && (n[0] = a.call(this, i, r.html()));
                    r.domManip(n, t)
                });
                if (l && (s = i.buildFragment(n, this[0].ownerDocument, !1, this), h = s.firstChild, 1 === s.childNodes.length && (s = h), h)) {
                    for (o = i.map(f(s, "script"), ou), c = o.length; l > e; e++) u = s, e !== w && (u = i.clone(u, !0, !0), c && i.merge(o, f(u, "script"))), t.call(this[e], u, e);
                    if (c)
                        for (v = o[o.length - 1].ownerDocument, i.map(o, su), e = 0; c > e; e++) u = o[e], fu.test(u.type || "") && !i._data(u, "globalEval") && i.contains(v, u) && (u.src ? i._evalUrl && i._evalUrl(u.src) : i.globalEval((u.text || u.textContent || u.innerHTML || "").replace(ye, "")));
                    s = h = null
                }
                return this
            }
        });
        i.each({
            appendTo: "append",
            prependTo: "prepend",
            insertBefore: "before",
            insertAfter: "after",
            replaceAll: "replaceWith"
        }, function(n, t) {
            i.fn[n] = function(n) {
                for (var u, r = 0, f = [], e = i(n), o = e.length - 1; o >= r; r++) u = r === o ? this : this.clone(!0), i(e[r])[t](u), ii.apply(f, u.get());
                return this.pushStack(f)
            }
        });
        ai = {};
        ! function() {
            var n;
            r.shrinkWrapBlocks = function() {
                if (null != n) return n;
                n = !1;
                var t, i, r;
                return i = u.getElementsByTagName("body")[0], i && i.style ? (t = u.createElement("div"), r = u.createElement("div"), r.style.cssText = "position:absolute;border:0;width:0;height:0;top:0;left:-9999px", i.appendChild(r).appendChild(t), typeof t.style.zoom !== o && (t.style.cssText = "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:1px;width:1px;zoom:1", t.appendChild(u.createElement("div")).style.width = "5px", n = 3 !== t.offsetWidth), i.removeChild(r), n) : void 0
            }
        }();
        var lu = /^margin/,
            pt = new RegExp("^(" + at + ")(?!px)[a-z%]+$", "i"),
            k, d, ke = /^(top|right|bottom|left)$/;
        n.getComputedStyle ? (k = function(t) {
            return t.ownerDocument.defaultView.opener ? t.ownerDocument.defaultView.getComputedStyle(t, null) : n.getComputedStyle(t, null)
        }, d = function(n, t, r) {
            var e, o, s, u, f = n.style;
            return r = r || k(n), u = r ? r.getPropertyValue(t) || r[t] : void 0, r && ("" !== u || i.contains(n.ownerDocument, n) || (u = i.style(n, t)), pt.test(u) && lu.test(t) && (e = f.width, o = f.minWidth, s = f.maxWidth, f.minWidth = f.maxWidth = f.width = u, u = r.width, f.width = e, f.minWidth = o, f.maxWidth = s)), void 0 === u ? u : u + ""
        }) : u.documentElement.currentStyle && (k = function(n) {
            return n.currentStyle
        }, d = function(n, t, i) {
            var o, f, e, r, u = n.style;
            return i = i || k(n), r = i ? i[t] : void 0, null == r && u && u[t] && (r = u[t]), pt.test(r) && !ke.test(t) && (o = u.left, f = n.runtimeStyle, e = f && f.left, e && (f.left = n.currentStyle.left), u.left = "fontSize" === t ? "1em" : r, r = u.pixelLeft + "px", u.left = o, e && (f.left = e)), void 0 === r ? r : r + "" || "auto"
        });
        ! function() {
            var f, t, l, o, s, e, h;
            if (f = u.createElement("div"), f.innerHTML = "  <link/><table><\/table><a href='/a'>a<\/a><input type='checkbox'/>", l = f.getElementsByTagName("a")[0], t = l && l.style) {
                t.cssText = "float:left;opacity:.5";
                r.opacity = "0.5" === t.opacity;
                r.cssFloat = !!t.cssFloat;
                f.style.backgroundClip = "content-box";
                f.cloneNode(!0).style.backgroundClip = "";
                r.clearCloneStyle = "content-box" === f.style.backgroundClip;
                r.boxSizing = "" === t.boxSizing || "" === t.MozBoxSizing || "" === t.WebkitBoxSizing;
                i.extend(r, {
                    reliableHiddenOffsets: function() {
                        return null == e && c(), e
                    },
                    boxSizingReliable: function() {
                        return null == s && c(), s
                    },
                    pixelPosition: function() {
                        return null == o && c(), o
                    },
                    reliableMarginRight: function() {
                        return null == h && c(), h
                    }
                });

                function c() {
                    var i, r, f, t;
                    r = u.getElementsByTagName("body")[0];
                    r && r.style && (i = u.createElement("div"), f = u.createElement("div"), f.style.cssText = "position:absolute;border:0;width:0;height:0;top:0;left:-9999px", r.appendChild(f).appendChild(i), i.style.cssText = "-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;display:block;margin-top:1%;top:1%;border:1px;padding:1px;width:4px;position:absolute", o = s = !1, h = !0, n.getComputedStyle && (o = "1%" !== (n.getComputedStyle(i, null) || {}).top, s = "4px" === (n.getComputedStyle(i, null) || {
                        width: "4px"
                    }).width, t = i.appendChild(u.createElement("div")), t.style.cssText = i.style.cssText = "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:0", t.style.marginRight = t.style.width = "0", i.style.width = "1px", h = !parseFloat((n.getComputedStyle(t, null) || {}).marginRight), i.removeChild(t)), i.innerHTML = "<table><tr><td><\/td><td>t<\/td><\/tr><\/table>", t = i.getElementsByTagName("td"), t[0].style.cssText = "margin:0;border:0;padding:0;display:none", e = 0 === t[0].offsetHeight, e && (t[0].style.display = "", t[1].style.display = "none", e = 0 === t[0].offsetHeight), r.removeChild(f))
                }
            }
        }();
        i.swap = function(n, t, i, r) {
            var f, u, e = {};
            for (u in t) e[u] = n.style[u], n.style[u] = t[u];
            f = i.apply(n, r || []);
            for (u in t) n.style[u] = e[u];
            return f
        };
        var vi = /alpha\([^)]*\)/i,
            de = /opacity\s*=\s*([^)]*)/,
            ge = /^(none|table(?!-c[ea]).+)/,
            no = new RegExp("^(" + at + ")(.*)$", "i"),
            to = new RegExp("^([+-])=(" + at + ")", "i"),
            io = {
                position: "absolute",
                visibility: "hidden",
                display: "block"
            },
            vu = {
                letterSpacing: "0",
                fontWeight: "400"
            },
            yu = ["Webkit", "O", "Moz", "ms"];
        i.extend({
            cssHooks: {
                opacity: {
                    get: function(n, t) {
                        if (t) {
                            var i = d(n, "opacity");
                            return "" === i ? "1" : i
                        }
                    }
                }
            },
            cssNumber: {
                columnCount: !0,
                fillOpacity: !0,
                flexGrow: !0,
                flexShrink: !0,
                fontWeight: !0,
                lineHeight: !0,
                opacity: !0,
                order: !0,
                orphans: !0,
                widows: !0,
                zIndex: !0,
                zoom: !0
            },
            cssProps: {
                float: r.cssFloat ? "cssFloat" : "styleFloat"
            },
            style: function(n, t, u, f) {
                if (n && 3 !== n.nodeType && 8 !== n.nodeType && n.style) {
                    var o, h, e, s = i.camelCase(t),
                        c = n.style;
                    if (t = i.cssProps[s] || (i.cssProps[s] = pu(c, s)), e = i.cssHooks[t] || i.cssHooks[s], void 0 === u) return e && "get" in e && void 0 !== (o = e.get(n, !1, f)) ? o : c[t];
                    if (h = typeof u, "string" === h && (o = to.exec(u)) && (u = (o[1] + 1) * o[2] + parseFloat(i.css(n, t)), h = "number"), null != u && u === u && ("number" !== h || i.cssNumber[s] || (u += "px"), r.clearCloneStyle || "" !== u || 0 !== t.indexOf("background") || (c[t] = "inherit"), !(e && "set" in e && void 0 === (u = e.set(n, u, f))))) try {
                        c[t] = u
                    } catch (l) {}
                }
            },
            css: function(n, t, r, u) {
                var s, f, e, o = i.camelCase(t);
                return t = i.cssProps[o] || (i.cssProps[o] = pu(n.style, o)), e = i.cssHooks[t] || i.cssHooks[o], e && "get" in e && (f = e.get(n, !0, r)), void 0 === f && (f = d(n, t, u)), "normal" === f && t in vu && (f = vu[t]), "" === r || r ? (s = parseFloat(f), r === !0 || i.isNumeric(s) ? s || 0 : f) : f
            }
        });
        i.each(["height", "width"], function(n, t) {
            i.cssHooks[t] = {
                get: function(n, r, u) {
                    if (r) return ge.test(i.css(n, "display")) && 0 === n.offsetWidth ? i.swap(n, io, function() {
                        return du(n, t, u)
                    }) : du(n, t, u)
                },
                set: function(n, u, f) {
                    var e = f && k(n);
                    return bu(n, u, f ? ku(n, t, f, r.boxSizing && "border-box" === i.css(n, "boxSizing", !1, e), e) : 0)
                }
            }
        });
        r.opacity || (i.cssHooks.opacity = {
            get: function(n, t) {
                return de.test((t && n.currentStyle ? n.currentStyle.filter : n.style.filter) || "") ? .01 * parseFloat(RegExp.$1) + "" : t ? "1" : ""
            },
            set: function(n, t) {
                var r = n.style,
                    u = n.currentStyle,
                    e = i.isNumeric(t) ? "alpha(opacity=" + 100 * t + ")" : "",
                    f = u && u.filter || r.filter || "";
                r.zoom = 1;
                (t >= 1 || "" === t) && "" === i.trim(f.replace(vi, "")) && r.removeAttribute && (r.removeAttribute("filter"), "" === t || u && !u.filter) || (r.filter = vi.test(f) ? f.replace(vi, e) : f + " " + e)
            }
        });
        i.cssHooks.marginRight = au(r.reliableMarginRight, function(n, t) {
            if (t) return i.swap(n, {
                display: "inline-block"
            }, d, [n, "marginRight"])
        });
        i.each({
            margin: "",
            padding: "",
            border: "Width"
        }, function(n, t) {
            i.cssHooks[n + t] = {
                expand: function(i) {
                    for (var r = 0, f = {}, u = "string" == typeof i ? i.split(" ") : [i]; 4 > r; r++) f[n + w[r] + t] = u[r] || u[r - 2] || u[0];
                    return f
                }
            };
            lu.test(n) || (i.cssHooks[n + t].set = bu)
        });
        i.fn.extend({
            css: function(n, t) {
                return b(this, function(n, t, r) {
                    var f, e, o = {},
                        u = 0;
                    if (i.isArray(t)) {
                        for (f = k(n), e = t.length; e > u; u++) o[t[u]] = i.css(n, t[u], !1, f);
                        return o
                    }
                    return void 0 !== r ? i.style(n, t, r) : i.css(n, t)
                }, n, t, arguments.length > 1)
            },
            show: function() {
                return wu(this, !0)
            },
            hide: function() {
                return wu(this)
            },
            toggle: function(n) {
                return "boolean" == typeof n ? n ? this.show() : this.hide() : this.each(function() {
                    et(this) ? i(this).show() : i(this).hide()
                })
            }
        });
        i.Tween = e;
        e.prototype = {
            constructor: e,
            init: function(n, t, r, u, f, e) {
                this.elem = n;
                this.prop = r;
                this.easing = f || "swing";
                this.options = t;
                this.start = this.now = this.cur();
                this.end = u;
                this.unit = e || (i.cssNumber[r] ? "" : "px")
            },
            cur: function() {
                var n = e.propHooks[this.prop];
                return n && n.get ? n.get(this) : e.propHooks._default.get(this)
            },
            run: function(n) {
                var t, r = e.propHooks[this.prop];
                return this.pos = this.options.duration ? t = i.easing[this.easing](n, this.options.duration * n, 0, 1, this.options.duration) : t = n, this.now = (this.end - this.start) * t + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), r && r.set ? r.set(this) : e.propHooks._default.set(this), this
            }
        };
        e.prototype.init.prototype = e.prototype;
        e.propHooks = {
            _default: {
                get: function(n) {
                    var t;
                    return null == n.elem[n.prop] || n.elem.style && null != n.elem.style[n.prop] ? (t = i.css(n.elem, n.prop, ""), t && "auto" !== t ? t : 0) : n.elem[n.prop]
                },
                set: function(n) {
                    i.fx.step[n.prop] ? i.fx.step[n.prop](n) : n.elem.style && (null != n.elem.style[i.cssProps[n.prop]] || i.cssHooks[n.prop]) ? i.style(n.elem, n.prop, n.now + n.unit) : n.elem[n.prop] = n.now
                }
            }
        };
        e.propHooks.scrollTop = e.propHooks.scrollLeft = {
            set: function(n) {
                n.elem.nodeType && n.elem.parentNode && (n.elem[n.prop] = n.now)
            }
        };
        i.easing = {
            linear: function(n) {
                return n
            },
            swing: function(n) {
                return .5 - Math.cos(n * Math.PI) / 2
            }
        };
        i.fx = e.prototype.init;
        i.fx.step = {};
        var rt, wt, ro = /^(?:toggle|show|hide)$/,
            gu = new RegExp("^(?:([+-])=|)(" + at + ")([a-z%]*)$", "i"),
            uo = /queueHooks$/,
            bt = [fo],
            st = {
                "*": [function(n, t) {
                    var f = this.createTween(n, t),
                        s = f.cur(),
                        r = gu.exec(t),
                        e = r && r[3] || (i.cssNumber[n] ? "" : "px"),
                        u = (i.cssNumber[n] || "px" !== e && +s) && gu.exec(i.css(f.elem, n)),
                        o = 1,
                        h = 20;
                    if (u && u[3] !== e) {
                        e = e || u[3];
                        r = r || [];
                        u = +s || 1;
                        do o = o || ".5", u /= o, i.style(f.elem, n, u + e); while (o !== (o = f.cur() / s) && 1 !== o && --h)
                    }
                    return r && (u = f.start = +u || +s || 0, f.unit = e, f.end = r[1] ? u + (r[1] + 1) * r[2] : +r[2]), f
                }]
            };
        i.Animation = i.extend(rf, {
            tweener: function(n, t) {
                i.isFunction(n) ? (t = n, n = ["*"]) : n = n.split(" ");
                for (var r, u = 0, f = n.length; f > u; u++) r = n[u], st[r] = st[r] || [], st[r].unshift(t)
            },
            prefilter: function(n, t) {
                t ? bt.unshift(n) : bt.push(n)
            }
        });
        i.speed = function(n, t, r) {
            var u = n && "object" == typeof n ? i.extend({}, n) : {
                complete: r || !r && t || i.isFunction(n) && n,
                duration: n,
                easing: r && t || t && !i.isFunction(t) && t
            };
            return u.duration = i.fx.off ? 0 : "number" == typeof u.duration ? u.duration : u.duration in i.fx.speeds ? i.fx.speeds[u.duration] : i.fx.speeds._default, (null == u.queue || u.queue === !0) && (u.queue = "fx"), u.old = u.complete, u.complete = function() {
                i.isFunction(u.old) && u.old.call(this);
                u.queue && i.dequeue(this, u.queue)
            }, u
        };
        i.fn.extend({
            fadeTo: function(n, t, i, r) {
                return this.filter(et).css("opacity", 0).show().end().animate({
                    opacity: t
                }, n, i, r)
            },
            animate: function(n, t, r, u) {
                var o = i.isEmptyObject(n),
                    e = i.speed(t, r, u),
                    f = function() {
                        var t = rf(this, i.extend({}, n), e);
                        (o || i._data(this, "finish")) && t.stop(!0)
                    };
                return f.finish = f, o || e.queue === !1 ? this.each(f) : this.queue(e.queue, f)
            },
            stop: function(n, t, r) {
                var u = function(n) {
                    var t = n.stop;
                    delete n.stop;
                    t(r)
                };
                return "string" != typeof n && (r = t, t = n, n = void 0), t && n !== !1 && this.queue(n || "fx", []), this.each(function() {
                    var o = !0,
                        t = null != n && n + "queueHooks",
                        e = i.timers,
                        f = i._data(this);
                    if (t) f[t] && f[t].stop && u(f[t]);
                    else
                        for (t in f) f[t] && f[t].stop && uo.test(t) && u(f[t]);
                    for (t = e.length; t--;) e[t].elem !== this || null != n && e[t].queue !== n || (e[t].anim.stop(r), o = !1, e.splice(t, 1));
                    (o || !r) && i.dequeue(this, n)
                })
            },
            finish: function(n) {
                return n !== !1 && (n = n || "fx"), this.each(function() {
                    var t, f = i._data(this),
                        r = f[n + "queue"],
                        e = f[n + "queueHooks"],
                        u = i.timers,
                        o = r ? r.length : 0;
                    for (f.finish = !0, i.queue(this, n, []), e && e.stop && e.stop.call(this, !0), t = u.length; t--;) u[t].elem === this && u[t].queue === n && (u[t].anim.stop(!0), u.splice(t, 1));
                    for (t = 0; o > t; t++) r[t] && r[t].finish && r[t].finish.call(this);
                    delete f.finish
                })
            }
        });
        i.each(["toggle", "show", "hide"], function(n, t) {
            var r = i.fn[t];
            i.fn[t] = function(n, i, u) {
                return null == n || "boolean" == typeof n ? r.apply(this, arguments) : this.animate(kt(t, !0), n, i, u)
            }
        });
        i.each({
            slideDown: kt("show"),
            slideUp: kt("hide"),
            slideToggle: kt("toggle"),
            fadeIn: {
                opacity: "show"
            },
            fadeOut: {
                opacity: "hide"
            },
            fadeToggle: {
                opacity: "toggle"
            }
        }, function(n, t) {
            i.fn[n] = function(n, i, r) {
                return this.animate(t, n, i, r)
            }
        });
        i.timers = [];
        i.fx.tick = function() {
            var r, n = i.timers,
                t = 0;
            for (rt = i.now(); t < n.length; t++) r = n[t], r() || n[t] !== r || n.splice(t--, 1);
            n.length || i.fx.stop();
            rt = void 0
        };
        i.fx.timer = function(n) {
            i.timers.push(n);
            n() ? i.fx.start() : i.timers.pop()
        };
        i.fx.interval = 13;
        i.fx.start = function() {
            wt || (wt = setInterval(i.fx.tick, i.fx.interval))
        };
        i.fx.stop = function() {
            clearInterval(wt);
            wt = null
        };
        i.fx.speeds = {
            slow: 600,
            fast: 200,
            _default: 400
        };
        i.fn.delay = function(n, t) {
                return n = i.fx ? i.fx.speeds[n] || n : n, t = t || "fx", this.queue(t, function(t, i) {
                    var r = setTimeout(t, n);
                    i.stop = function() {
                        clearTimeout(r)
                    }
                })
            },
            function() {
                var n, t, f, i, e;
                t = u.createElement("div");
                t.setAttribute("className", "t");
                t.innerHTML = "  <link/><table><\/table><a href='/a'>a<\/a><input type='checkbox'/>";
                i = t.getElementsByTagName("a")[0];
                f = u.createElement("select");
                e = f.appendChild(u.createElement("option"));
                n = t.getElementsByTagName("input")[0];
                i.style.cssText = "top:1px";
                r.getSetAttribute = "t" !== t.className;
                r.style = /top/.test(i.getAttribute("style"));
                r.hrefNormalized = "/a" === i.getAttribute("href");
                r.checkOn = !!n.value;
                r.optSelected = e.selected;
                r.enctype = !!u.createElement("form").enctype;
                f.disabled = !0;
                r.optDisabled = !e.disabled;
                n = u.createElement("input");
                n.setAttribute("value", "");
                r.input = "" === n.getAttribute("value");
                n.value = "t";
                n.setAttribute("type", "radio");
                r.radioValue = "t" === n.value
            }();
        uf = /\r/g;
        i.fn.extend({
            val: function(n) {
                var t, r, f, u = this[0];
                return arguments.length ? (f = i.isFunction(n), this.each(function(r) {
                    var u;
                    1 === this.nodeType && (u = f ? n.call(this, r, i(this).val()) : n, null == u ? u = "" : "number" == typeof u ? u += "" : i.isArray(u) && (u = i.map(u, function(n) {
                        return null == n ? "" : n + ""
                    })), t = i.valHooks[this.type] || i.valHooks[this.nodeName.toLowerCase()], t && "set" in t && void 0 !== t.set(this, u, "value") || (this.value = u))
                })) : u ? (t = i.valHooks[u.type] || i.valHooks[u.nodeName.toLowerCase()], t && "get" in t && void 0 !== (r = t.get(u, "value")) ? r : (r = u.value, "string" == typeof r ? r.replace(uf, "") : null == r ? "" : r)) : void 0
            }
        });
        i.extend({
            valHooks: {
                option: {
                    get: function(n) {
                        var t = i.find.attr(n, "value");
                        return null != t ? t : i.trim(i.text(n))
                    }
                },
                select: {
                    get: function(n) {
                        for (var o, t, s = n.options, u = n.selectedIndex, f = "select-one" === n.type || 0 > u, h = f ? null : [], c = f ? u + 1 : s.length, e = 0 > u ? c : f ? u : 0; c > e; e++)
                            if (t = s[e], !(!t.selected && e !== u || (r.optDisabled ? t.disabled : null !== t.getAttribute("disabled")) || t.parentNode.disabled && i.nodeName(t.parentNode, "optgroup"))) {
                                if (o = i(t).val(), f) return o;
                                h.push(o)
                            }
                        return h
                    },
                    set: function(n, t) {
                        for (var f, r, u = n.options, o = i.makeArray(t), e = u.length; e--;)
                            if (r = u[e], i.inArray(i.valHooks.option.get(r), o) >= 0) try {
                                r.selected = f = !0
                            } catch (s) {
                                r.scrollHeight
                            } else r.selected = !1;
                        return f || (n.selectedIndex = -1), u
                    }
                }
            }
        });
        i.each(["radio", "checkbox"], function() {
            i.valHooks[this] = {
                set: function(n, t) {
                    if (i.isArray(t)) return n.checked = i.inArray(i(n).val(), t) >= 0
                }
            };
            r.checkOn || (i.valHooks[this].get = function(n) {
                return null === n.getAttribute("value") ? "on" : n.value
            })
        });
        var ut, ff, v = i.expr.attrHandle,
            yi = /^(?:checked|selected)$/i,
            g = r.getSetAttribute,
            dt = r.input;
        i.fn.extend({
            attr: function(n, t) {
                return b(this, i.attr, n, t, arguments.length > 1)
            },
            removeAttr: function(n) {
                return this.each(function() {
                    i.removeAttr(this, n)
                })
            }
        });
        i.extend({
            attr: function(n, t, r) {
                var u, f, e = n.nodeType;
                if (n && 3 !== e && 8 !== e && 2 !== e) return typeof n.getAttribute === o ? i.prop(n, t, r) : (1 === e && i.isXMLDoc(n) || (t = t.toLowerCase(), u = i.attrHooks[t] || (i.expr.match.bool.test(t) ? ff : ut)), void 0 === r ? u && "get" in u && null !== (f = u.get(n, t)) ? f : (f = i.find.attr(n, t), null == f ? void 0 : f) : null !== r ? u && "set" in u && void 0 !== (f = u.set(n, r, t)) ? f : (n.setAttribute(t, r + ""), r) : void i.removeAttr(n, t))
            },
            removeAttr: function(n, t) {
                var r, u, e = 0,
                    f = t && t.match(h);
                if (f && 1 === n.nodeType)
                    while (r = f[e++]) u = i.propFix[r] || r, i.expr.match.bool.test(r) ? dt && g || !yi.test(r) ? n[u] = !1 : n[i.camelCase("default-" + r)] = n[u] = !1 : i.attr(n, r, ""), n.removeAttribute(g ? r : u)
            },
            attrHooks: {
                type: {
                    set: function(n, t) {
                        if (!r.radioValue && "radio" === t && i.nodeName(n, "input")) {
                            var u = n.value;
                            return n.setAttribute("type", t), u && (n.value = u), t
                        }
                    }
                }
            }
        });
        ff = {
            set: function(n, t, r) {
                return t === !1 ? i.removeAttr(n, r) : dt && g || !yi.test(r) ? n.setAttribute(!g && i.propFix[r] || r, r) : n[i.camelCase("default-" + r)] = n[r] = !0, r
            }
        };
        i.each(i.expr.match.bool.source.match(/\w+/g), function(n, t) {
            var r = v[t] || i.find.attr;
            v[t] = dt && g || !yi.test(t) ? function(n, t, i) {
                var u, f;
                return i || (f = v[t], v[t] = u, u = null != r(n, t, i) ? t.toLowerCase() : null, v[t] = f), u
            } : function(n, t, r) {
                if (!r) return n[i.camelCase("default-" + t)] ? t.toLowerCase() : null
            }
        });
        dt && g || (i.attrHooks.value = {
            set: function(n, t, r) {
                return i.nodeName(n, "input") ? void(n.defaultValue = t) : ut && ut.set(n, t, r)
            }
        });
        g || (ut = {
            set: function(n, t, i) {
                var r = n.getAttributeNode(i);
                return r || n.setAttributeNode(r = n.ownerDocument.createAttribute(i)), r.value = t += "", "value" === i || t === n.getAttribute(i) ? t : void 0
            }
        }, v.id = v.name = v.coords = function(n, t, i) {
            var r;
            if (!i) return (r = n.getAttributeNode(t)) && "" !== r.value ? r.value : null
        }, i.valHooks.button = {
            get: function(n, t) {
                var i = n.getAttributeNode(t);
                if (i && i.specified) return i.value
            },
            set: ut.set
        }, i.attrHooks.contenteditable = {
            set: function(n, t, i) {
                ut.set(n, "" === t ? !1 : t, i)
            }
        }, i.each(["width", "height"], function(n, t) {
            i.attrHooks[t] = {
                set: function(n, i) {
                    if ("" === i) return (n.setAttribute(t, "auto"), i)
                }
            }
        }));
        r.style || (i.attrHooks.style = {
            get: function(n) {
                return n.style.cssText || void 0
            },
            set: function(n, t) {
                return n.style.cssText = t + ""
            }
        });
        ef = /^(?:input|select|textarea|button|object)$/i;
        of = /^(?:a|area)$/i;
        i.fn.extend({
            prop: function(n, t) {
                return b(this, i.prop, n, t, arguments.length > 1)
            },
            removeProp: function(n) {
                return n = i.propFix[n] || n, this.each(function() {
                    try {
                        this[n] = void 0;
                        delete this[n]
                    } catch (t) {}
                })
            }
        });
        i.extend({
            propFix: {
                "for": "htmlFor",
                "class": "className"
            },
            prop: function(n, t, r) {
                var f, u, o, e = n.nodeType;
                if (n && 3 !== e && 8 !== e && 2 !== e) return o = 1 !== e || !i.isXMLDoc(n), o && (t = i.propFix[t] || t, u = i.propHooks[t]), void 0 !== r ? u && "set" in u && void 0 !== (f = u.set(n, r, t)) ? f : n[t] = r : u && "get" in u && null !== (f = u.get(n, t)) ? f : n[t]
            },
            propHooks: {
                tabIndex: {
                    get: function(n) {
                        var t = i.find.attr(n, "tabindex");
                        return t ? parseInt(t, 10) : ef.test(n.nodeName) || of.test(n.nodeName) && n.href ? 0 : -1
                    }
                }
            }
        });
        r.hrefNormalized || i.each(["href", "src"], function(n, t) {
            i.propHooks[t] = {
                get: function(n) {
                    return n.getAttribute(t, 4)
                }
            }
        });
        r.optSelected || (i.propHooks.selected = {
            get: function(n) {
                var t = n.parentNode;
                return t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex), null
            }
        });
        i.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function() {
            i.propFix[this.toLowerCase()] = this
        });
        r.enctype || (i.propFix.enctype = "encoding");
        gt = /[\t\r\n\f]/g;
        i.fn.extend({
            addClass: function(n) {
                var o, t, r, u, s, f, e = 0,
                    c = this.length,
                    l = "string" == typeof n && n;
                if (i.isFunction(n)) return this.each(function(t) {
                    i(this).addClass(n.call(this, t, this.className))
                });
                if (l)
                    for (o = (n || "").match(h) || []; c > e; e++)
                        if (t = this[e], r = 1 === t.nodeType && (t.className ? (" " + t.className + " ").replace(gt, " ") : " ")) {
                            for (s = 0; u = o[s++];) r.indexOf(" " + u + " ") < 0 && (r += u + " ");
                            f = i.trim(r);
                            t.className !== f && (t.className = f)
                        }
                return this
            },
            removeClass: function(n) {
                var o, t, r, u, s, f, e = 0,
                    c = this.length,
                    l = 0 === arguments.length || "string" == typeof n && n;
                if (i.isFunction(n)) return this.each(function(t) {
                    i(this).removeClass(n.call(this, t, this.className))
                });
                if (l)
                    for (o = (n || "").match(h) || []; c > e; e++)
                        if (t = this[e], r = 1 === t.nodeType && (t.className ? (" " + t.className + " ").replace(gt, " ") : "")) {
                            for (s = 0; u = o[s++];)
                                while (r.indexOf(" " + u + " ") >= 0) r = r.replace(" " + u + " ", " ");
                            f = n ? i.trim(r) : "";
                            t.className !== f && (t.className = f)
                        }
                return this
            },
            toggleClass: function(n, t) {
                var r = typeof n;
                return "boolean" == typeof t && "string" === r ? t ? this.addClass(n) : this.removeClass(n) : this.each(i.isFunction(n) ? function(r) {
                    i(this).toggleClass(n.call(this, r, this.className, t), t)
                } : function() {
                    if ("string" === r)
                        for (var t, f = 0, u = i(this), e = n.match(h) || []; t = e[f++];) u.hasClass(t) ? u.removeClass(t) : u.addClass(t);
                    else(r === o || "boolean" === r) && (this.className && i._data(this, "__className__", this.className), this.className = this.className || n === !1 ? "" : i._data(this, "__className__") || "")
                })
            },
            hasClass: function(n) {
                for (var i = " " + n + " ", t = 0, r = this.length; r > t; t++)
                    if (1 === this[t].nodeType && (" " + this[t].className + " ").replace(gt, " ").indexOf(i) >= 0) return !0;
                return !1
            }
        });
        i.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), function(n, t) {
            i.fn[t] = function(n, i) {
                return arguments.length > 0 ? this.on(t, null, n, i) : this.trigger(t)
            }
        });
        i.fn.extend({
            hover: function(n, t) {
                return this.mouseenter(n).mouseleave(t || n)
            },
            bind: function(n, t, i) {
                return this.on(n, null, t, i)
            },
            unbind: function(n, t) {
                return this.off(n, null, t)
            },
            delegate: function(n, t, i, r) {
                return this.on(t, n, i, r)
            },
            undelegate: function(n, t, i) {
                return 1 === arguments.length ? this.off(n, "**") : this.off(t, n || "**", i)
            }
        });
        var pi = i.now(),
            wi = /\?/,
            oo = /(,)|(\[|{)|(}|])|"(?:[^"\\\r\n]|\\["\\\/bfnrt]|\\u[\da-fA-F]{4})*"\s*:?|true|false|null|-?(?!0\d)\d+(?:\.\d+|)(?:[eE][+-]?\d+|)/g;
        i.parseJSON = function(t) {
            if (n.JSON && n.JSON.parse) return n.JSON.parse(t + "");
            var f, r = null,
                u = i.trim(t + "");
            return u && !i.trim(u.replace(oo, function(n, t, i, u) {
                return f && t && (r = 0), 0 === r ? n : (f = i || t, r += !u - !i, "")
            })) ? Function("return " + u)() : i.error("Invalid JSON: " + t)
        };
        i.parseXML = function(t) {
            var r, u;
            if (!t || "string" != typeof t) return null;
            try {
                n.DOMParser ? (u = new DOMParser, r = u.parseFromString(t, "text/xml")) : (r = new ActiveXObject("Microsoft.XMLDOM"), r.async = "false", r.loadXML(t))
            } catch (f) {
                r = void 0
            }
            return r && r.documentElement && !r.getElementsByTagName("parsererror").length || i.error("Invalid XML: " + t), r
        };
        var nt, y, so = /#.*$/,
            sf = /([?&])_=[^&]*/,
            ho = /^(.*?):[ \t]*([^\r\n]*)\r?$/gm,
            co = /^(?:GET|HEAD)$/,
            lo = /^\/\//,
            hf = /^([\w.+-]+:)(?:\/\/(?:[^\/?#]*@|)([^\/?#:]*)(?::(\d+)|)|)/,
            cf = {},
            bi = {},
            lf = "*/".concat("*");
        try {
            y = location.href
        } catch (ns) {
            y = u.createElement("a");
            y.href = "";
            y = y.href
        }
        nt = hf.exec(y.toLowerCase()) || [];
        i.extend({
            active: 0,
            lastModified: {},
            etag: {},
            ajaxSettings: {
                url: y,
                type: "GET",
                isLocal: /^(?:about|app|app-storage|.+-extension|file|res|widget):$/.test(nt[1]),
                global: !0,
                processData: !0,
                async: !0,
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                accepts: {
                    "*": lf,
                    text: "text/plain",
                    html: "text/html",
                    xml: "application/xml, text/xml",
                    json: "application/json, text/javascript"
                },
                contents: {
                    xml: /xml/,
                    html: /html/,
                    json: /json/
                },
                responseFields: {
                    xml: "responseXML",
                    text: "responseText",
                    json: "responseJSON"
                },
                converters: {
                    "* text": String,
                    "text html": !0,
                    "text json": i.parseJSON,
                    "text xml": i.parseXML
                },
                flatOptions: {
                    url: !0,
                    context: !0
                }
            },
            ajaxSetup: function(n, t) {
                return t ? ki(ki(n, i.ajaxSettings), t) : ki(i.ajaxSettings, n)
            },
            ajaxPrefilter: af(cf),
            ajaxTransport: af(bi),
            ajax: function(n, t) {
                function w(n, t, s, h) {
                    var v, it, nt, y, w, c = t;
                    2 !== e && (e = 2, k && clearTimeout(k), a = void 0, b = h || "", u.readyState = n > 0 ? 4 : 0, v = n >= 200 && 300 > n || 304 === n, s && (y = ao(r, u, s)), y = vo(r, y, u, v), v ? (r.ifModified && (w = u.getResponseHeader("Last-Modified"), w && (i.lastModified[f] = w), w = u.getResponseHeader("etag"), w && (i.etag[f] = w)), 204 === n || "HEAD" === r.type ? c = "nocontent" : 304 === n ? c = "notmodified" : (c = y.state, it = y.data, nt = y.error, v = !nt)) : (nt = c, (n || !c) && (c = "error", 0 > n && (n = 0))), u.status = n, u.statusText = (t || c) + "", v ? g.resolveWith(o, [it, c, u]) : g.rejectWith(o, [u, c, nt]), u.statusCode(p), p = void 0, l && d.trigger(v ? "ajaxSuccess" : "ajaxError", [u, r, v ? it : nt]), tt.fireWith(o, [u, c]), l && (d.trigger("ajaxComplete", [u, r]), --i.active || i.event.trigger("ajaxStop")))
                }
                "object" == typeof n && (t = n, n = void 0);
                t = t || {};
                var s, c, f, b, k, l, a, v, r = i.ajaxSetup({}, t),
                    o = r.context || r,
                    d = r.context && (o.nodeType || o.jquery) ? i(o) : i.event,
                    g = i.Deferred(),
                    tt = i.Callbacks("once memory"),
                    p = r.statusCode || {},
                    it = {},
                    rt = {},
                    e = 0,
                    ut = "canceled",
                    u = {
                        readyState: 0,
                        getResponseHeader: function(n) {
                            var t;
                            if (2 === e) {
                                if (!v)
                                    for (v = {}; t = ho.exec(b);) v[t[1].toLowerCase()] = t[2];
                                t = v[n.toLowerCase()]
                            }
                            return null == t ? null : t
                        },
                        getAllResponseHeaders: function() {
                            return 2 === e ? b : null
                        },
                        setRequestHeader: function(n, t) {
                            var i = n.toLowerCase();
                            return e || (n = rt[i] = rt[i] || n, it[n] = t), this
                        },
                        overrideMimeType: function(n) {
                            return e || (r.mimeType = n), this
                        },
                        statusCode: function(n) {
                            var t;
                            if (n)
                                if (2 > e)
                                    for (t in n) p[t] = [p[t], n[t]];
                                else u.always(n[u.status]);
                            return this
                        },
                        abort: function(n) {
                            var t = n || ut;
                            return a && a.abort(t), w(0, t), this
                        }
                    };
                if (g.promise(u).complete = tt.add, u.success = u.done, u.error = u.fail, r.url = ((n || r.url || y) + "").replace(so, "").replace(lo, nt[1] + "//"), r.type = t.method || t.type || r.method || r.type, r.dataTypes = i.trim(r.dataType || "*").toLowerCase().match(h) || [""], null == r.crossDomain && (s = hf.exec(r.url.toLowerCase()), r.crossDomain = !(!s || s[1] === nt[1] && s[2] === nt[2] && (s[3] || ("http:" === s[1] ? "80" : "443")) === (nt[3] || ("http:" === nt[1] ? "80" : "443")))), r.data && r.processData && "string" != typeof r.data && (r.data = i.param(r.data, r.traditional)), vf(cf, r, t, u), 2 === e) return u;
                l = i.event && r.global;
                l && 0 == i.active++ && i.event.trigger("ajaxStart");
                r.type = r.type.toUpperCase();
                r.hasContent = !co.test(r.type);
                f = r.url;
                r.hasContent || (r.data && (f = r.url += (wi.test(f) ? "&" : "?") + r.data, delete r.data), r.cache === !1 && (r.url = sf.test(f) ? f.replace(sf, "$1_=" + pi++) : f + (wi.test(f) ? "&" : "?") + "_=" + pi++));
                r.ifModified && (i.lastModified[f] && u.setRequestHeader("If-Modified-Since", i.lastModified[f]), i.etag[f] && u.setRequestHeader("If-None-Match", i.etag[f]));
                (r.data && r.hasContent && r.contentType !== !1 || t.contentType) && u.setRequestHeader("Content-Type", r.contentType);
                u.setRequestHeader("Accept", r.dataTypes[0] && r.accepts[r.dataTypes[0]] ? r.accepts[r.dataTypes[0]] + ("*" !== r.dataTypes[0] ? ", " + lf + "; q=0.01" : "") : r.accepts["*"]);
                for (c in r.headers) u.setRequestHeader(c, r.headers[c]);
                if (r.beforeSend && (r.beforeSend.call(o, u, r) === !1 || 2 === e)) return u.abort();
                ut = "abort";
                for (c in {
                        success: 1,
                        error: 1,
                        complete: 1
                    }) u[c](r[c]);
                if (a = vf(bi, r, t, u)) {
                    u.readyState = 1;
                    l && d.trigger("ajaxSend", [u, r]);
                    r.async && r.timeout > 0 && (k = setTimeout(function() {
                        u.abort("timeout")
                    }, r.timeout));
                    try {
                        e = 1;
                        a.send(it, w)
                    } catch (ft) {
                        if (!(2 > e)) throw ft;
                        w(-1, ft)
                    }
                } else w(-1, "No Transport");
                return u
            },
            getJSON: function(n, t, r) {
                return i.get(n, t, r, "json")
            },
            getScript: function(n, t) {
                return i.get(n, void 0, t, "script")
            }
        });
        i.each(["get", "post"], function(n, t) {
            i[t] = function(n, r, u, f) {
                return i.isFunction(r) && (f = f || u, u = r, r = void 0), i.ajax({
                    url: n,
                    type: t,
                    dataType: f,
                    data: r,
                    success: u
                })
            }
        });
        i._evalUrl = function(n) {
            return i.ajax({
                url: n,
                type: "GET",
                dataType: "script",
                async: !1,
                global: !1,
                throws: !0
            })
        };
        i.fn.extend({
            wrapAll: function(n) {
                if (i.isFunction(n)) return this.each(function(t) {
                    i(this).wrapAll(n.call(this, t))
                });
                if (this[0]) {
                    var t = i(n, this[0].ownerDocument).eq(0).clone(!0);
                    this[0].parentNode && t.insertBefore(this[0]);
                    t.map(function() {
                        for (var n = this; n.firstChild && 1 === n.firstChild.nodeType;) n = n.firstChild;
                        return n
                    }).append(this)
                }
                return this
            },
            wrapInner: function(n) {
                return this.each(i.isFunction(n) ? function(t) {
                    i(this).wrapInner(n.call(this, t))
                } : function() {
                    var t = i(this),
                        r = t.contents();
                    r.length ? r.wrapAll(n) : t.append(n)
                })
            },
            wrap: function(n) {
                var t = i.isFunction(n);
                return this.each(function(r) {
                    i(this).wrapAll(t ? n.call(this, r) : n)
                })
            },
            unwrap: function() {
                return this.parent().each(function() {
                    i.nodeName(this, "body") || i(this).replaceWith(this.childNodes)
                }).end()
            }
        });
        i.expr.filters.hidden = function(n) {
            return n.offsetWidth <= 0 && n.offsetHeight <= 0 || !r.reliableHiddenOffsets() && "none" === (n.style && n.style.display || i.css(n, "display"))
        };
        i.expr.filters.visible = function(n) {
            return !i.expr.filters.hidden(n)
        };
        var yo = /%20/g,
            po = /\[\]$/,
            yf = /\r?\n/g,
            wo = /^(?:submit|button|image|reset|file)$/i,
            bo = /^(?:input|select|textarea|keygen)/i;
        i.param = function(n, t) {
            var r, u = [],
                f = function(n, t) {
                    t = i.isFunction(t) ? t() : null == t ? "" : t;
                    u[u.length] = encodeURIComponent(n) + "=" + encodeURIComponent(t)
                };
            if (void 0 === t && (t = i.ajaxSettings && i.ajaxSettings.traditional), i.isArray(n) || n.jquery && !i.isPlainObject(n)) i.each(n, function() {
                f(this.name, this.value)
            });
            else
                for (r in n) di(r, n[r], t, f);
            return u.join("&").replace(yo, "+")
        };
        i.fn.extend({
            serialize: function() {
                return i.param(this.serializeArray())
            },
            serializeArray: function() {
                return this.map(function() {
                    var n = i.prop(this, "elements");
                    return n ? i.makeArray(n) : this
                }).filter(function() {
                    var n = this.type;
                    return this.name && !i(this).is(":disabled") && bo.test(this.nodeName) && !wo.test(n) && (this.checked || !oi.test(n))
                }).map(function(n, t) {
                    var r = i(this).val();
                    return null == r ? null : i.isArray(r) ? i.map(r, function(n) {
                        return {
                            name: t.name,
                            value: n.replace(yf, "\r\n")
                        }
                    }) : {
                        name: t.name,
                        value: r.replace(yf, "\r\n")
                    }
                }).get()
            }
        });
        i.ajaxSettings.xhr = void 0 !== n.ActiveXObject ? function() {
            return !this.isLocal && /^(get|post|head|put|delete|options)$/i.test(this.type) && pf() || go()
        } : pf;
        var ko = 0,
            ni = {},
            ht = i.ajaxSettings.xhr();
        return n.attachEvent && n.attachEvent("onunload", function() {
            for (var n in ni) ni[n](void 0, !0)
        }), r.cors = !!ht && "withCredentials" in ht, ht = r.ajax = !!ht, ht && i.ajaxTransport(function(n) {
            if (!n.crossDomain || r.cors) {
                var t;
                return {
                    send: function(r, u) {
                        var e, f = n.xhr(),
                            o = ++ko;
                        if (f.open(n.type, n.url, n.async, n.username, n.password), n.xhrFields)
                            for (e in n.xhrFields) f[e] = n.xhrFields[e];
                        n.mimeType && f.overrideMimeType && f.overrideMimeType(n.mimeType);
                        n.crossDomain || r["X-Requested-With"] || (r["X-Requested-With"] = "XMLHttpRequest");
                        for (e in r) void 0 !== r[e] && f.setRequestHeader(e, r[e] + "");
                        f.send(n.hasContent && n.data || null);
                        t = function(r, e) {
                            var s, c, h;
                            if (t && (e || 4 === f.readyState))
                                if (delete ni[o], t = void 0, f.onreadystatechange = i.noop, e) 4 !== f.readyState && f.abort();
                                else {
                                    h = {};
                                    s = f.status;
                                    "string" == typeof f.responseText && (h.text = f.responseText);
                                    try {
                                        c = f.statusText
                                    } catch (l) {
                                        c = ""
                                    }
                                    s || !n.isLocal || n.crossDomain ? 1223 === s && (s = 204) : s = h.text ? 200 : 404
                                }
                            h && u(s, c, h, f.getAllResponseHeaders())
                        };
                        n.async ? 4 === f.readyState ? setTimeout(t) : f.onreadystatechange = ni[o] = t : t()
                    },
                    abort: function() {
                        t && t(void 0, !0)
                    }
                }
            }
        }), i.ajaxSetup({
            accepts: {
                script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
            },
            contents: {
                script: /(?:java|ecma)script/
            },
            converters: {
                "text script": function(n) {
                    return i.globalEval(n), n
                }
            }
        }), i.ajaxPrefilter("script", function(n) {
            void 0 === n.cache && (n.cache = !1);
            n.crossDomain && (n.type = "GET", n.global = !1)
        }), i.ajaxTransport("script", function(n) {
            if (n.crossDomain) {
                var t, r = u.head || i("head")[0] || u.documentElement;
                return {
                    send: function(i, f) {
                        t = u.createElement("script");
                        t.async = !0;
                        n.scriptCharset && (t.charset = n.scriptCharset);
                        t.src = n.url;
                        t.onload = t.onreadystatechange = function(n, i) {
                            (i || !t.readyState || /loaded|complete/.test(t.readyState)) && (t.onload = t.onreadystatechange = null, t.parentNode && t.parentNode.removeChild(t), t = null, i || f(200, "success"))
                        };
                        r.insertBefore(t, r.firstChild)
                    },
                    abort: function() {
                        t && t.onload(void 0, !0)
                    }
                }
            }
        }), gi = [], ti = /(=)\?(?=&|$)|\?\?/, i.ajaxSetup({
            jsonp: "callback",
            jsonpCallback: function() {
                var n = gi.pop() || i.expando + "_" + pi++;
                return this[n] = !0, n
            }
        }), i.ajaxPrefilter("json jsonp", function(t, r, u) {
            var f, o, e, s = t.jsonp !== !1 && (ti.test(t.url) ? "url" : "string" == typeof t.data && !(t.contentType || "").indexOf("application/x-www-form-urlencoded") && ti.test(t.data) && "data");
            if (s || "jsonp" === t.dataTypes[0]) return (f = t.jsonpCallback = i.isFunction(t.jsonpCallback) ? t.jsonpCallback() : t.jsonpCallback, s ? t[s] = t[s].replace(ti, "$1" + f) : t.jsonp !== !1 && (t.url += (wi.test(t.url) ? "&" : "?") + t.jsonp + "=" + f), t.converters["script json"] = function() {
                return e || i.error(f + " was not called"), e[0]
            }, t.dataTypes[0] = "json", o = n[f], n[f] = function() {
                e = arguments
            }, u.always(function() {
                n[f] = o;
                t[f] && (t.jsonpCallback = r.jsonpCallback, gi.push(f));
                e && i.isFunction(o) && o(e[0]);
                e = o = void 0
            }), "script")
        }), i.parseHTML = function(n, t, r) {
            if (!n || "string" != typeof n) return null;
            "boolean" == typeof t && (r = t, t = !1);
            t = t || u;
            var f = er.exec(n),
                e = !r && [];
            return f ? [t.createElement(f[1])] : (f = i.buildFragment([n], t, e), e && e.length && i(e).remove(), i.merge([], f.childNodes))
        }, nr = i.fn.load, i.fn.load = function(n, t, r) {
            if ("string" != typeof n && nr) return nr.apply(this, arguments);
            var u, o, s, f = this,
                e = n.indexOf(" ");
            return e >= 0 && (u = i.trim(n.slice(e, n.length)), n = n.slice(0, e)), i.isFunction(t) ? (r = t, t = void 0) : t && "object" == typeof t && (s = "POST"), f.length > 0 && i.ajax({
                url: n,
                type: s,
                dataType: "html",
                data: t
            }).done(function(n) {
                o = arguments;
                f.html(u ? i("<div>").append(i.parseHTML(n)).find(u) : n)
            }).complete(r && function(n, t) {
                f.each(r, o || [n.responseText, t, n])
            }), this
        }, i.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function(n, t) {
            i.fn[t] = function(n) {
                return this.on(t, n)
            }
        }), i.expr.filters.animated = function(n) {
            return i.grep(i.timers, function(t) {
                return n === t.elem
            }).length
        }, tr = n.document.documentElement, i.offset = {
            setOffset: function(n, t, r) {
                var e, o, s, h, u, c, v, l = i.css(n, "position"),
                    a = i(n),
                    f = {};
                "static" === l && (n.style.position = "relative");
                u = a.offset();
                s = i.css(n, "top");
                c = i.css(n, "left");
                v = ("absolute" === l || "fixed" === l) && i.inArray("auto", [s, c]) > -1;
                v ? (e = a.position(), h = e.top, o = e.left) : (h = parseFloat(s) || 0, o = parseFloat(c) || 0);
                i.isFunction(t) && (t = t.call(n, r, u));
                null != t.top && (f.top = t.top - u.top + h);
                null != t.left && (f.left = t.left - u.left + o);
                "using" in t ? t.using.call(n, f) : a.css(f)
            }
        }, i.fn.extend({
            offset: function(n) {
                if (arguments.length) return void 0 === n ? this : this.each(function(t) {
                    i.offset.setOffset(this, n, t)
                });
                var t, f, u = {
                        top: 0,
                        left: 0
                    },
                    r = this[0],
                    e = r && r.ownerDocument;
                if (e) return t = e.documentElement, i.contains(t, r) ? (typeof r.getBoundingClientRect !== o && (u = r.getBoundingClientRect()), f = wf(e), {
                    top: u.top + (f.pageYOffset || t.scrollTop) - (t.clientTop || 0),
                    left: u.left + (f.pageXOffset || t.scrollLeft) - (t.clientLeft || 0)
                }) : u
            },
            position: function() {
                if (this[0]) {
                    var n, r, t = {
                            top: 0,
                            left: 0
                        },
                        u = this[0];
                    return "fixed" === i.css(u, "position") ? r = u.getBoundingClientRect() : (n = this.offsetParent(), r = this.offset(), i.nodeName(n[0], "html") || (t = n.offset()), t.top += i.css(n[0], "borderTopWidth", !0), t.left += i.css(n[0], "borderLeftWidth", !0)), {
                        top: r.top - t.top - i.css(u, "marginTop", !0),
                        left: r.left - t.left - i.css(u, "marginLeft", !0)
                    }
                }
            },
            offsetParent: function() {
                return this.map(function() {
                    for (var n = this.offsetParent || tr; n && !i.nodeName(n, "html") && "static" === i.css(n, "position");) n = n.offsetParent;
                    return n || tr
                })
            }
        }), i.each({
            scrollLeft: "pageXOffset",
            scrollTop: "pageYOffset"
        }, function(n, t) {
            var r = /Y/.test(t);
            i.fn[n] = function(u) {
                return b(this, function(n, u, f) {
                    var e = wf(n);
                    return void 0 === f ? e ? t in e ? e[t] : e.document.documentElement[u] : n[u] : void(e ? e.scrollTo(r ? i(e).scrollLeft() : f, r ? f : i(e).scrollTop()) : n[u] = f)
                }, n, u, arguments.length, null)
            }
        }), i.each(["top", "left"], function(n, t) {
            i.cssHooks[t] = au(r.pixelPosition, function(n, r) {
                if (r) return (r = d(n, t), pt.test(r) ? i(n).position()[t] + "px" : r)
            })
        }), i.each({
            Height: "height",
            Width: "width"
        }, function(n, t) {
            i.each({
                padding: "inner" + n,
                content: t,
                "": "outer" + n
            }, function(r, u) {
                i.fn[u] = function(u, f) {
                    var e = arguments.length && (r || "boolean" != typeof u),
                        o = r || (u === !0 || f === !0 ? "margin" : "border");
                    return b(this, function(t, r, u) {
                        var f;
                        return i.isWindow(t) ? t.document.documentElement["client" + n] : 9 === t.nodeType ? (f = t.documentElement, Math.max(t.body["scroll" + n], f["scroll" + n], t.body["offset" + n], f["offset" + n], f["client" + n])) : void 0 === u ? i.css(t, r, o) : i.style(t, r, u, o)
                    }, t, e ? u : void 0, e, null)
                }
            })
        }), i.fn.size = function() {
            return this.length
        }, i.fn.andSelf = i.fn.addBack, "function" == typeof define && define.amd && define("jquery", [], function() {
            return i
        }), bf = n.jQuery, kf = n.$, i.noConflict = function(t) {
            return n.$ === i && (n.$ = kf), t && n.jQuery === i && (n.jQuery = bf), i
        }, typeof t === o && (n.jQuery = n.$ = i), i
    }), function(n) {
        typeof define == "function" && define.amd ? define(["jquery"], n) : n(jQuery)
    }(function(n) {
        n.extend(n.fn, {
            validate: function(t) {
                if (!this.length) {
                    t && t.debug && window.console && console.warn("Nothing selected, can't validate, returning nothing.");
                    return
                }
                var i = n.data(this[0], "validator");
                if (i) return i;
                if (this.attr("novalidate", "novalidate"), i = new n.validator(t, this[0]), n.data(this[0], "validator", i), i.settings.onsubmit) {
                    this.on("click.validate", ":submit", function(t) {
                        i.settings.submitHandler && (i.submitButton = t.target);
                        n(this).hasClass("cancel") && (i.cancelSubmit = !0);
                        n(this).attr("formnovalidate") !== undefined && (i.cancelSubmit = !0)
                    });
                    this.on("submit.validate", function(t) {
                        function r() {
                            var u, r;
                            return i.settings.submitHandler ? (i.submitButton && (u = n("<input type='hidden'/>").attr("name", i.submitButton.name).val(n(i.submitButton).val()).appendTo(i.currentForm)), r = i.settings.submitHandler.call(i, i.currentForm, t), i.submitButton && u.remove(), r !== undefined) ? r : !1 : !0
                        }
                        return (i.settings.debug && t.preventDefault(), i.cancelSubmit) ? (i.cancelSubmit = !1, r()) : i.form() ? i.pendingRequest ? (i.formSubmitted = !0, !1) : r() : (i.focusInvalid(), !1)
                    })
                }
                return i
            },
            valid: function() {
                var t, i, r;
                return n(this[0]).is("form") ? t = this.validate().form() : (r = [], t = !0, i = n(this[0].form).validate(), this.each(function() {
                    t = i.element(this) && t;
                    r = r.concat(i.errorList)
                }), i.errorList = r), t
            },
            rules: function(t, i) {
                var r = this[0],
                    e, s, f, u, o, h;
                if (t) {
                    e = n.data(r.form, "validator").settings;
                    s = e.rules;
                    f = n.validator.staticRules(r);
                    switch (t) {
                        case "add":
                            n.extend(f, n.validator.normalizeRule(i));
                            delete f.messages;
                            s[r.name] = f;
                            i.messages && (e.messages[r.name] = n.extend(e.messages[r.name], i.messages));
                            break;
                        case "remove":
                            return i ? (h = {}, n.each(i.split(/\s/), function(t, i) {
                                h[i] = f[i];
                                delete f[i];
                                i === "required" && n(r).removeAttr("aria-required")
                            }), h) : (delete s[r.name], f)
                    }
                }
                return u = n.validator.normalizeRules(n.extend({}, n.validator.classRules(r), n.validator.attributeRules(r), n.validator.dataRules(r), n.validator.staticRules(r)), r), u.required && (o = u.required, delete u.required, u = n.extend({
                    required: o
                }, u), n(r).attr("aria-required", "true")), u.remote && (o = u.remote, delete u.remote, u = n.extend(u, {
                    remote: o
                })), u
            }
        });
        n.extend(n.expr[":"], {
            blank: function(t) {
                return !n.trim("" + n(t).val())
            },
            filled: function(t) {
                return !!n.trim("" + n(t).val())
            },
            unchecked: function(t) {
                return !n(t).prop("checked")
            }
        });
        n.validator = function(t, i) {
            this.settings = n.extend(!0, {}, n.validator.defaults, t);
            this.currentForm = i;
            this.init()
        };
        n.validator.format = function(t, i) {
            return arguments.length === 1 ? function() {
                var i = n.makeArray(arguments);
                return i.unshift(t), n.validator.format.apply(this, i)
            } : (arguments.length > 2 && i.constructor !== Array && (i = n.makeArray(arguments).slice(1)), i.constructor !== Array && (i = [i]), n.each(i, function(n, i) {
                t = t.replace(new RegExp("\\{" + n + "\\}", "g"), function() {
                    return i
                })
            }), t)
        };
        n.extend(n.validator, {
            defaults: {
                messages: {},
                groups: {},
                rules: {},
                errorClass: "error",
                validClass: "valid",
                errorElement: "label",
                focusCleanup: !1,
                focusInvalid: !0,
                errorContainer: n([]),
                errorLabelContainer: n([]),
                onsubmit: !0,
                ignore: ":hidden",
                ignoreTitle: !1,
                onfocusin: function(n) {
                    this.lastActive = n;
                    this.settings.focusCleanup && (this.settings.unhighlight && this.settings.unhighlight.call(this, n, this.settings.errorClass, this.settings.validClass), this.hideThese(this.errorsFor(n)))
                },
                onfocusout: function(n) {
                    !this.checkable(n) && (n.name in this.submitted || !this.optional(n)) && this.element(n)
                },
                onkeyup: function(t, i) {
                    (i.which !== 9 || this.elementValue(t) !== "") && n.inArray(i.keyCode, [16, 17, 18, 20, 35, 36, 37, 38, 39, 40, 45, 144, 225]) === -1 && (t.name in this.submitted || t === this.lastElement) && this.element(t)
                },
                onclick: function(n) {
                    n.name in this.submitted ? this.element(n) : n.parentNode.name in this.submitted && this.element(n.parentNode)
                },
                highlight: function(t, i, r) {
                    t.type === "radio" ? this.findByName(t.name).addClass(i).removeClass(r) : n(t).addClass(i).removeClass(r)
                },
                unhighlight: function(t, i, r) {
                    t.type === "radio" ? this.findByName(t.name).removeClass(i).addClass(r) : n(t).removeClass(i).addClass(r)
                }
            },
            setDefaults: function(t) {
                n.extend(n.validator.defaults, t)
            },
            messages: {
                required: "This field is required.",
                remote: "Please fix this field.",
                email: "Please enter a valid email address.",
                url: "Please enter a valid URL.",
                date: "Please enter a valid date.",
                dateISO: "Please enter a valid date ( ISO ).",
                number: "Please enter a valid number.",
                digits: "Please enter only digits.",
                creditcard: "Please enter a valid credit card number.",
                equalTo: "Please enter the same value again.",
                maxlength: n.validator.format("Please enter no more than {0} characters."),
                minlength: n.validator.format("Please enter at least {0} characters."),
                rangelength: n.validator.format("Please enter a value between {0} and {1} characters long."),
                range: n.validator.format("Please enter a value between {0} and {1}."),
                max: n.validator.format("Please enter a value less than or equal to {0}."),
                min: n.validator.format("Please enter a value greater than or equal to {0}.")
            },
            autoCreateRanges: !1,
            prototype: {
                init: function() {
                    function i(t) {
                        var r = n.data(this.form, "validator"),
                            u = "on" + t.type.replace(/^validate/, ""),
                            i = r.settings;
                        i[u] && !n(this).is(i.ignore) && i[u].call(r, this, t)
                    }
                    this.labelContainer = n(this.settings.errorLabelContainer);
                    this.errorContext = this.labelContainer.length && this.labelContainer || n(this.currentForm);
                    this.containers = n(this.settings.errorContainer).add(this.settings.errorLabelContainer);
                    this.submitted = {};
                    this.valueCache = {};
                    this.pendingRequest = 0;
                    this.pending = {};
                    this.invalid = {};
                    this.reset();
                    var r = this.groups = {},
                        t;
                    n.each(this.settings.groups, function(t, i) {
                        typeof i == "string" && (i = i.split(/\s/));
                        n.each(i, function(n, i) {
                            r[i] = t
                        })
                    });
                    t = this.settings.rules;
                    n.each(t, function(i, r) {
                        t[i] = n.validator.normalizeRule(r)
                    });
                    n(this.currentForm).on("focusin.validate focusout.validate keyup.validate", ":text, [type='password'], [type='file'], select, textarea, [type='number'], [type='search'], [type='tel'], [type='url'], [type='email'], [type='datetime'], [type='date'], [type='month'], [type='week'], [type='time'], [type='datetime-local'], [type='range'], [type='color'], [type='radio'], [type='checkbox']", i).on("click.validate", "select, option, [type='radio'], [type='checkbox']", i);
                    if (this.settings.invalidHandler) n(this.currentForm).on("invalid-form.validate", this.settings.invalidHandler);
                    n(this.currentForm).find("[required], [data-rule-required], .required").attr("aria-required", "true")
                },
                form: function() {
                    return this.checkForm(), n.extend(this.submitted, this.errorMap), this.invalid = n.extend({}, this.errorMap), this.valid() || n(this.currentForm).triggerHandler("invalid-form", [this]), this.showErrors(), this.valid()
                },
                checkForm: function() {
                    this.prepareForm();
                    for (var n = 0, t = this.currentElements = this.elements(); t[n]; n++) this.check(t[n]);
                    return this.valid()
                },
                element: function(t) {
                    var u = this.clean(t),
                        i = this.validationTargetFor(u),
                        r = !0;
                    return this.lastElement = i, i === undefined ? delete this.invalid[u.name] : (this.prepareElement(i), this.currentElements = n(i), r = this.check(i) !== !1, r ? delete this.invalid[i.name] : this.invalid[i.name] = !0), n(t).attr("aria-invalid", !r), this.numberOfInvalids() || (this.toHide = this.toHide.add(this.containers)), this.showErrors(), r
                },
                showErrors: function(t) {
                    if (t) {
                        n.extend(this.errorMap, t);
                        this.errorList = [];
                        for (var i in t) this.errorList.push({
                            message: t[i],
                            element: this.findByName(i)[0]
                        });
                        this.successList = n.grep(this.successList, function(n) {
                            return !(n.name in t)
                        })
                    }
                    this.settings.showErrors ? this.settings.showErrors.call(this, this.errorMap, this.errorList) : this.defaultShowErrors()
                },
                resetForm: function() {
                    n.fn.resetForm && n(this.currentForm).resetForm();
                    this.submitted = {};
                    this.lastElement = null;
                    this.prepareForm();
                    this.hideErrors();
                    var t, i = this.elements().removeData("previousValue").removeAttr("aria-invalid");
                    if (this.settings.unhighlight)
                        for (t = 0; i[t]; t++) this.settings.unhighlight.call(this, i[t], this.settings.errorClass, "");
                    else i.removeClass(this.settings.errorClass)
                },
                numberOfInvalids: function() {
                    return this.objectLength(this.invalid)
                },
                objectLength: function(n) {
                    var t = 0;
                    for (var i in n) t++;
                    return t
                },
                hideErrors: function() {
                    this.hideThese(this.toHide)
                },
                hideThese: function(n) {
                    n.not(this.containers).text("");
                    this.addWrapper(n).hide()
                },
                valid: function() {
                    return this.size() === 0
                },
                size: function() {
                    return this.errorList.length
                },
                focusInvalid: function() {
                    if (this.settings.focusInvalid) try {
                        n(this.findLastActive() || this.errorList.length && this.errorList[0].element || []).filter(":visible").focus().trigger("focusin")
                    } catch (t) {}
                },
                findLastActive: function() {
                    var t = this.lastActive;
                    return t && n.grep(this.errorList, function(n) {
                        return n.element.name === t.name
                    }).length === 1 && t
                },
                elements: function() {
                    var t = this,
                        i = {};
                    return n(this.currentForm).find("input, select, textarea").not(":submit, :reset, :image, :disabled").not(this.settings.ignore).filter(function() {
                        return (!this.name && t.settings.debug && window.console && console.error("%o has no name assigned", this), this.name in i || !t.objectLength(n(this).rules())) ? !1 : (i[this.name] = !0, !0)
                    })
                },
                clean: function(t) {
                    return n(t)[0]
                },
                errors: function() {
                    var t = this.settings.errorClass.split(" ").join(".");
                    return n(this.settings.errorElement + "." + t, this.errorContext)
                },
                reset: function() {
                    this.successList = [];
                    this.errorList = [];
                    this.errorMap = {};
                    this.toShow = n([]);
                    this.toHide = n([]);
                    this.currentElements = n([])
                },
                prepareForm: function() {
                    this.reset();
                    this.toHide = this.errors().add(this.containers)
                },
                prepareElement: function(n) {
                    this.reset();
                    this.toHide = this.errorsFor(n)
                },
                elementValue: function(t) {
                    var i, u = n(t),
                        r = t.type;
                    return r === "radio" || r === "checkbox" ? this.findByName(t.name).filter(":checked").val() : r === "number" && typeof t.validity != "undefined" ? t.validity.badInput ? !1 : u.val() : (i = u.val(), typeof i == "string") ? i.replace(/\r/g, "") : i
                },
                check: function(t) {
                    t = this.validationTargetFor(this.clean(t));
                    var r = n(t).rules(),
                        s = n.map(r, function(n, t) {
                            return t
                        }).length,
                        o = !1,
                        h = this.elementValue(t),
                        u, f, i;
                    for (f in r) {
                        i = {
                            method: f,
                            parameters: r[f]
                        };
                        try {
                            if (u = n.validator.methods[f].call(this, h, t, i.parameters), u === "dependency-mismatch" && s === 1) {
                                o = !0;
                                continue
                            }
                            if (o = !1, u === "pending") {
                                this.toHide = this.toHide.not(this.errorsFor(t));
                                return
                            }
                            if (!u) return this.formatAndAdd(t, i), !1
                        } catch (e) {
                            this.settings.debug && window.console && console.log("Exception occurred when checking element " + t.id + ", check the '" + i.method + "' method.", e);
                            e instanceof TypeError && (e.message += ".  Exception occurred when checking element " + t.id + ", check the '" + i.method + "' method.");
                            throw e;
                        }
                    }
                    if (!o) return this.objectLength(r) && this.successList.push(t), !0
                },
                customDataMessage: function(t, i) {
                    return n(t).data("msg" + i.charAt(0).toUpperCase() + i.substring(1).toLowerCase()) || n(t).data("msg")
                },
                customMessage: function(n, t) {
                    var i = this.settings.messages[n];
                    return i && (i.constructor === String ? i : i[t])
                },
                findDefined: function() {
                    for (var n = 0; n < arguments.length; n++)
                        if (arguments[n] !== undefined) return arguments[n];
                    return undefined
                },
                defaultMessage: function(t, i) {
                    return this.findDefined(this.customMessage(t.name, i), this.customDataMessage(t, i), !this.settings.ignoreTitle && t.title || undefined, n.validator.messages[i], "<strong>Warning: No message defined for " + t.name + "<\/strong>")
                },
                formatAndAdd: function(t, i) {
                    var r = this.defaultMessage(t, i.method),
                        u = /\$?\{(\d+)\}/g;
                    typeof r == "function" ? r = r.call(this, i.parameters, t) : u.test(r) && (r = n.validator.format(r.replace(u, "{$1}"), i.parameters));
                    this.errorList.push({
                        message: r,
                        element: t,
                        method: i.method
                    });
                    this.errorMap[t.name] = r;
                    this.submitted[t.name] = r
                },
                addWrapper: function(n) {
                    return this.settings.wrapper && (n = n.add(n.parent(this.settings.wrapper))), n
                },
                defaultShowErrors: function() {
                    for (var i, t, n = 0; this.errorList[n]; n++) t = this.errorList[n], this.settings.highlight && this.settings.highlight.call(this, t.element, this.settings.errorClass, this.settings.validClass), this.showLabel(t.element, t.message);
                    if (this.errorList.length && (this.toShow = this.toShow.add(this.containers)), this.settings.success)
                        for (n = 0; this.successList[n]; n++) this.showLabel(this.successList[n]);
                    if (this.settings.unhighlight)
                        for (n = 0, i = this.validElements(); i[n]; n++) this.settings.unhighlight.call(this, i[n], this.settings.errorClass, this.settings.validClass);
                    this.toHide = this.toHide.not(this.toShow);
                    this.hideErrors();
                    this.addWrapper(this.toShow).show()
                },
                validElements: function() {
                    return this.currentElements.not(this.invalidElements())
                },
                invalidElements: function() {
                    return n(this.errorList).map(function() {
                        return this.element
                    })
                },
                showLabel: function(t, i) {
                    var u, o, e, r = this.errorsFor(t),
                        s = this.idOrName(t),
                        f = n(t).attr("aria-describedby");
                    r.length ? (r.removeClass(this.settings.validClass).addClass(this.settings.errorClass), r.html(i)) : (r = n("<" + this.settings.errorElement + ">").attr("id", s + "-error").addClass(this.settings.errorClass).html(i || ""), u = r, this.settings.wrapper && (u = r.hide().show().wrap("<" + this.settings.wrapper + "/>").parent()), this.labelContainer.length ? this.labelContainer.append(u) : this.settings.errorPlacement ? this.settings.errorPlacement(u, n(t)) : u.insertAfter(t), r.is("label") ? r.attr("for", s) : r.parents("label[for='" + s + "']").length === 0 && (e = r.attr("id").replace(/(:|\.|\[|\]|\$)/g, "\\$1"), f ? f.match(new RegExp("\\b" + e + "\\b")) || (f += " " + e) : f = e, n(t).attr("aria-describedby", f), o = this.groups[t.name], o && n.each(this.groups, function(t, i) {
                        i === o && n("[name='" + t + "']", this.currentForm).attr("aria-describedby", r.attr("id"))
                    })));
                    !i && this.settings.success && (r.text(""), typeof this.settings.success == "string" ? r.addClass(this.settings.success) : this.settings.success(r, t));
                    this.toShow = this.toShow.add(r)
                },
                errorsFor: function(t) {
                    var r = this.idOrName(t),
                        u = n(t).attr("aria-describedby"),
                        i = "label[for='" + r + "'], label[for='" + r + "'] *";
                    return u && (i = i + ", #" + u.replace(/\s+/g, ", #")), this.errors().filter(i)
                },
                idOrName: function(n) {
                    return this.groups[n.name] || (this.checkable(n) ? n.name : n.id || n.name)
                },
                validationTargetFor: function(t) {
                    return this.checkable(t) && (t = this.findByName(t.name)), n(t).not(this.settings.ignore)[0]
                },
                checkable: function(n) {
                    return /radio|checkbox/i.test(n.type)
                },
                findByName: function(t) {
                    return n(this.currentForm).find("[name='" + t + "']")
                },
                getLength: function(t, i) {
                    switch (i.nodeName.toLowerCase()) {
                        case "select":
                            return n("option:selected", i).length;
                        case "input":
                            if (this.checkable(i)) return this.findByName(i.name).filter(":checked").length
                    }
                    return t.length
                },
                depend: function(n, t) {
                    return this.dependTypes[typeof n] ? this.dependTypes[typeof n](n, t) : !0
                },
                dependTypes: {
                    boolean: function(n) {
                        return n
                    },
                    string: function(t, i) {
                        return !!n(t, i.form).length
                    },
                    "function": function(n, t) {
                        return n(t)
                    }
                },
                optional: function(t) {
                    var i = this.elementValue(t);
                    return !n.validator.methods.required.call(this, i, t) && "dependency-mismatch"
                },
                startRequest: function(n) {
                    this.pending[n.name] || (this.pendingRequest++, this.pending[n.name] = !0)
                },
                stopRequest: function(t, i) {
                    this.pendingRequest--;
                    this.pendingRequest < 0 && (this.pendingRequest = 0);
                    delete this.pending[t.name];
                    i && this.pendingRequest === 0 && this.formSubmitted && this.form() ? (n(this.currentForm).submit(), this.formSubmitted = !1) : !i && this.pendingRequest === 0 && this.formSubmitted && (n(this.currentForm).triggerHandler("invalid-form", [this]), this.formSubmitted = !1)
                },
                previousValue: function(t) {
                    return n.data(t, "previousValue") || n.data(t, "previousValue", {
                        old: null,
                        valid: !0,
                        message: this.defaultMessage(t, "remote")
                    })
                },
                destroy: function() {
                    this.resetForm();
                    n(this.currentForm).off(".validate").removeData("validator")
                }
            },
            classRuleSettings: {
                required: {
                    required: !0
                },
                email: {
                    email: !0
                },
                url: {
                    url: !0
                },
                date: {
                    date: !0
                },
                dateISO: {
                    dateISO: !0
                },
                number: {
                    number: !0
                },
                digits: {
                    digits: !0
                },
                creditcard: {
                    creditcard: !0
                }
            },
            addClassRules: function(t, i) {
                t.constructor === String ? this.classRuleSettings[t] = i : n.extend(this.classRuleSettings, t)
            },
            classRules: function(t) {
                var i = {},
                    r = n(t).attr("class");
                return r && n.each(r.split(" "), function() {
                    this in n.validator.classRuleSettings && n.extend(i, n.validator.classRuleSettings[this])
                }), i
            },
            normalizeAttributeRule: function(n, t, i, r) {
                /min|max/.test(i) && (t === null || /number|range|text/.test(t)) && (r = Number(r), isNaN(r) && (r = undefined));
                r || r === 0 ? n[i] = r : t === i && t !== "range" && (n[i] = !0)
            },
            attributeRules: function(t) {
                var r = {},
                    f = n(t),
                    e = t.getAttribute("type"),
                    u, i;
                for (u in n.validator.methods) u === "required" ? (i = t.getAttribute(u), i === "" && (i = !0), i = !!i) : i = f.attr(u), this.normalizeAttributeRule(r, e, u, i);
                return r.maxlength && /-1|2147483647|524288/.test(r.maxlength) && delete r.maxlength, r
            },
            dataRules: function(t) {
                var r = {},
                    f = n(t),
                    e = t.getAttribute("type"),
                    i, u;
                for (i in n.validator.methods) u = f.data("rule" + i.charAt(0).toUpperCase() + i.substring(1).toLowerCase()), this.normalizeAttributeRule(r, e, i, u);
                return r
            },
            staticRules: function(t) {
                var i = {},
                    r = n.data(t.form, "validator");
                return r.settings.rules && (i = n.validator.normalizeRule(r.settings.rules[t.name]) || {}), i
            },
            normalizeRules: function(t, i) {
                return n.each(t, function(r, u) {
                    if (u === !1) {
                        delete t[r];
                        return
                    }
                    if (u.param || u.depends) {
                        var f = !0;
                        switch (typeof u.depends) {
                            case "string":
                                f = !!n(u.depends, i.form).length;
                                break;
                            case "function":
                                f = u.depends.call(i, i)
                        }
                        f ? t[r] = u.param !== undefined ? u.param : !0 : delete t[r]
                    }
                }), n.each(t, function(r, u) {
                    t[r] = n.isFunction(u) ? u(i) : u
                }), n.each(["minlength", "maxlength"], function() {
                    t[this] && (t[this] = Number(t[this]))
                }), n.each(["rangelength", "range"], function() {
                    var i;
                    t[this] && (n.isArray(t[this]) ? t[this] = [Number(t[this][0]), Number(t[this][1])] : typeof t[this] == "string" && (i = t[this].replace(/[\[\]]/g, "").split(/[\s,]+/), t[this] = [Number(i[0]), Number(i[1])]))
                }), n.validator.autoCreateRanges && (t.min != null && t.max != null && (t.range = [t.min, t.max], delete t.min, delete t.max), t.minlength != null && t.maxlength != null && (t.rangelength = [t.minlength, t.maxlength], delete t.minlength, delete t.maxlength)), t
            },
            normalizeRule: function(t) {
                if (typeof t == "string") {
                    var i = {};
                    n.each(t.split(/\s/), function() {
                        i[this] = !0
                    });
                    t = i
                }
                return t
            },
            addMethod: function(t, i, r) {
                n.validator.methods[t] = i;
                n.validator.messages[t] = r !== undefined ? r : n.validator.messages[t];
                i.length < 3 && n.validator.addClassRules(t, n.validator.normalizeRule(t))
            },
            methods: {
                required: function(t, i, r) {
                    if (!this.depend(r, i)) return "dependency-mismatch";
                    if (i.nodeName.toLowerCase() === "select") {
                        var u = n(i).val();
                        return u && u.length > 0
                    }
                    return this.checkable(i) ? this.getLength(t, i) > 0 : t.length > 0
                },
                email: function(n, t) {
                    return this.optional(t) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/.test(n)
                },
                url: function(n, t) {
                    return this.optional(t) || /^(?:(?:(?:https?|ftp):)?\/\/)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})).?)(?::\d{2,5})?(?:[/?#]\S*)?$/i.test(n)
                },
                date: function(n, t) {
                    return this.optional(t) || !/Invalid|NaN/.test(new Date(n).toString())
                },
                dateISO: function(n, t) {
                    return this.optional(t) || /^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/.test(n)
                },
                number: function(n, t) {
                    return this.optional(t) || /^(?:-?\d+|-?\d{1,3}(?:,\d{3})+)?(?:\.\d+)?$/.test(n)
                },
                digits: function(n, t) {
                    return this.optional(t) || /^\d+$/.test(n)
                },
                creditcard: function(n, t) {
                    if (this.optional(t)) return "dependency-mismatch";
                    if (/[^0-9 \-]+/.test(n)) return !1;
                    var f = 0,
                        i = 0,
                        u = !1,
                        r, e;
                    if (n = n.replace(/\D/g, ""), n.length < 13 || n.length > 19) return !1;
                    for (r = n.length - 1; r >= 0; r--) e = n.charAt(r), i = parseInt(e, 10), u && (i *= 2) > 9 && (i -= 9), f += i, u = !u;
                    return f % 10 == 0
                },
                minlength: function(t, i, r) {
                    var u = n.isArray(t) ? t.length : this.getLength(t, i);
                    return this.optional(i) || u >= r
                },
                maxlength: function(t, i, r) {
                    var u = n.isArray(t) ? t.length : this.getLength(t, i);
                    return this.optional(i) || u <= r
                },
                rangelength: function(t, i, r) {
                    var u = n.isArray(t) ? t.length : this.getLength(t, i);
                    return this.optional(i) || u >= r[0] && u <= r[1]
                },
                min: function(n, t, i) {
                    return this.optional(t) || n >= i
                },
                max: function(n, t, i) {
                    return this.optional(t) || n <= i
                },
                range: function(n, t, i) {
                    return this.optional(t) || n >= i[0] && n <= i[1]
                },
                equalTo: function(t, i, r) {
                    var u = n(r);
                    if (this.settings.onfocusout) u.off(".validate-equalTo").on("blur.validate-equalTo", function() {
                        n(i).valid()
                    });
                    return t === u.val()
                },
                remote: function(t, i, r) {
                    if (this.optional(i)) return "dependency-mismatch";
                    var f = this.previousValue(i),
                        u, e;
                    return (this.settings.messages[i.name] || (this.settings.messages[i.name] = {}), f.originalMessage = this.settings.messages[i.name].remote, this.settings.messages[i.name].remote = f.message, r = typeof r == "string" && {
                        url: r
                    } || r, f.old === t) ? f.valid : (f.old = t, u = this, this.startRequest(i), e = {}, e[i.name] = t, n.ajax(n.extend(!0, {
                        mode: "abort",
                        port: "validate" + i.name,
                        dataType: "json",
                        data: e,
                        context: u.currentForm,
                        success: function(r) {
                            var o = r === !0 || r === "true",
                                s, e, h;
                            u.settings.messages[i.name].remote = f.originalMessage;
                            o ? (h = u.formSubmitted, u.prepareElement(i), u.formSubmitted = h, u.successList.push(i), delete u.invalid[i.name], u.showErrors()) : (s = {}, e = r || u.defaultMessage(i, "remote"), s[i.name] = f.message = n.isFunction(e) ? e(t) : e, u.invalid[i.name] = !0, u.showErrors(s));
                            f.valid = o;
                            u.stopRequest(i, o)
                        }
                    }, r)), "pending")
                }
            }
        });
        var t = {},
            i;
        n.ajaxPrefilter ? n.ajaxPrefilter(function(n, i, r) {
            var u = n.port;
            n.mode === "abort" && (t[u] && t[u].abort(), t[u] = r)
        }) : (i = n.ajax, n.ajax = function(r) {
            var f = ("mode" in r ? r : n.ajaxSettings).mode,
                u = ("port" in r ? r : n.ajaxSettings).port;
            return f === "abort" ? (t[u] && t[u].abort(), t[u] = i.apply(this, arguments), t[u]) : i.apply(this, arguments)
        })
    }), function(n) {
        "use strict";

        function u(n) {
            return new RegExp("(^|\\s+)" + n + "(\\s+|$)")
        }

        function f(n, u) {
            var f = t(n, u) ? r : i;
            f(n, u)
        }
        var t, i, r;
        "classList" in document.documentElement ? (t = function(n, t) {
            return n.classList.contains(t)
        }, i = function(n, t) {
            n.classList.add(t)
        }, r = function(n, t) {
            n.classList.remove(t)
        }) : (t = function(n, t) {
            return u(t).test(n.className)
        }, i = function(n, i) {
            t(n, i) || (n.className = n.className + " " + i)
        }, r = function(n, t) {
            n.className = n.className.replace(u(t), " ")
        });
        n.classie = {
            hasClass: t,
            addClass: i,
            removeClass: r,
            toggleClass: f,
            has: t,
            add: i,
            remove: r,
            toggle: f
        }
    }(window), typeof jQuery == "undefined") throw new Error("Bootstrap's JavaScript requires jQuery"); + function(n) {
    "use strict";
    var t = n.fn.jquery.split(" ")[0].split(".");
    if (t[0] < 2 && t[1] < 9 || t[0] == 1 && t[1] == 9 && t[2] < 1) throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher");
}(jQuery); + function(n) {
    "use strict";

    function t() {
        var i = document.createElement("bootstrap"),
            n = {
                WebkitTransition: "webkitTransitionEnd",
                MozTransition: "transitionend",
                OTransition: "oTransitionEnd otransitionend",
                transition: "transitionend"
            };
        for (var t in n)
            if (i.style[t] !== undefined) return {
                end: n[t]
            };
        return !1
    }
    n.fn.emulateTransitionEnd = function(t) {
        var i = !1,
            u = this,
            r;
        n(this).one("bsTransitionEnd", function() {
            i = !0
        });
        return r = function() {
            i || n(u).trigger(n.support.transition.end)
        }, setTimeout(r, t), this
    };
    n(function() {
        (n.support.transition = t(), n.support.transition) && (n.event.special.bsTransitionEnd = {
            bindType: n.support.transition.end,
            delegateType: n.support.transition.end,
            handle: function(t) {
                if (n(t.target).is(this)) return t.handleObj.handler.apply(this, arguments)
            }
        })
    })
}(jQuery); + function(n) {
    "use strict";

    function u(i) {
        return this.each(function() {
            var r = n(this),
                u = r.data("bs.alert");
            u || r.data("bs.alert", u = new t(this));
            typeof i == "string" && u[i].call(r)
        })
    }
    var i = '[data-dismiss="alert"]',
        t = function(t) {
            n(t).on("click", i, this.close)
        },
        r;
    t.VERSION = "3.3.4";
    t.TRANSITION_DURATION = 150;
    t.prototype.close = function(i) {
        function e() {
            r.detach().trigger("closed.bs.alert").remove()
        }
        var f = n(this),
            u = f.attr("data-target"),
            r;
        (u || (u = f.attr("href"), u = u && u.replace(/.*(?=#[^\s]*$)/, "")), r = n(u), i && i.preventDefault(), r.length || (r = f.closest(".alert")), r.trigger(i = n.Event("close.bs.alert")), i.isDefaultPrevented()) || (r.removeClass("in"), n.support.transition && r.hasClass("fade") ? r.one("bsTransitionEnd", e).emulateTransitionEnd(t.TRANSITION_DURATION) : e())
    };
    r = n.fn.alert;
    n.fn.alert = u;
    n.fn.alert.Constructor = t;
    n.fn.alert.noConflict = function() {
        return n.fn.alert = r, this
    };
    n(document).on("click.bs.alert.data-api", i, t.prototype.close)
}(jQuery); + function(n) {
    "use strict";

    function i(i) {
        return this.each(function() {
            var u = n(this),
                r = u.data("bs.button"),
                f = typeof i == "object" && i;
            r || u.data("bs.button", r = new t(this, f));
            i == "toggle" ? r.toggle() : i && r.setState(i)
        })
    }
    var t = function(i, r) {
            this.$element = n(i);
            this.options = n.extend({}, t.DEFAULTS, r);
            this.isLoading = !1
        },
        r;
    t.VERSION = "3.3.4";
    t.DEFAULTS = {
        loadingText: "loading..."
    };
    t.prototype.setState = function(t) {
        var r = "disabled",
            i = this.$element,
            f = i.is("input") ? "val" : "html",
            u = i.data();
        t = t + "Text";
        u.resetText == null && i.data("resetText", i[f]());
        setTimeout(n.proxy(function() {
            i[f](u[t] == null ? this.options[t] : u[t]);
            t == "loadingText" ? (this.isLoading = !0, i.addClass(r).attr(r, r)) : this.isLoading && (this.isLoading = !1, i.removeClass(r).removeAttr(r))
        }, this), 0)
    };
    t.prototype.toggle = function() {
        var t = !0,
            i = this.$element.closest('[data-toggle="buttons"]'),
            n;
        i.length ? (n = this.$element.find("input"), n.prop("type") == "radio" && (n.prop("checked") && this.$element.hasClass("active") ? t = !1 : i.find(".active").removeClass("active")), t && n.prop("checked", !this.$element.hasClass("active")).trigger("change")) : this.$element.attr("aria-pressed", !this.$element.hasClass("active"));
        t && this.$element.toggleClass("active")
    };
    r = n.fn.button;
    n.fn.button = i;
    n.fn.button.Constructor = t;
    n.fn.button.noConflict = function() {
        return n.fn.button = r, this
    };
    n(document).on("click.bs.button.data-api", '[data-toggle^="button"]', function(t) {
        var r = n(t.target);
        r.hasClass("btn") || (r = r.closest(".btn"));
        i.call(r, "toggle");
        t.preventDefault()
    }).on("focus.bs.button.data-api blur.bs.button.data-api", '[data-toggle^="button"]', function(t) {
        n(t.target).closest(".btn").toggleClass("focus", /^focus(in)?$/.test(t.type))
    })
}(jQuery); + function(n) {
    "use strict";

    function i(i) {
        return this.each(function() {
            var u = n(this),
                r = u.data("bs.carousel"),
                f = n.extend({}, t.DEFAULTS, u.data(), typeof i == "object" && i),
                e = typeof i == "string" ? i : f.slide;
            r || u.data("bs.carousel", r = new t(this, f));
            typeof i == "number" ? r.to(i) : e ? r[e]() : f.interval && r.pause().cycle()
        })
    }
    var t = function(t, i) {
            this.$element = n(t);
            this.$indicators = this.$element.find(".carousel-indicators");
            this.options = i;
            this.paused = null;
            this.sliding = null;
            this.interval = null;
            this.$active = null;
            this.$items = null;
            this.options.keyboard && this.$element.on("keydown.bs.carousel", n.proxy(this.keydown, this));
            this.options.pause != "hover" || "ontouchstart" in document.documentElement || this.$element.on("mouseenter.bs.carousel", n.proxy(this.pause, this)).on("mouseleave.bs.carousel", n.proxy(this.cycle, this))
        },
        u, r;
    t.VERSION = "3.3.4";
    t.TRANSITION_DURATION = 600;
    t.DEFAULTS = {
        interval: 5e3,
        pause: "hover",
        wrap: !0,
        keyboard: !0
    };
    t.prototype.keydown = function(n) {
        if (!/input|textarea/i.test(n.target.tagName)) {
            switch (n.which) {
                case 37:
                    this.prev();
                    break;
                case 39:
                    this.next();
                    break;
                default:
                    return
            }
            n.preventDefault()
        }
    };
    t.prototype.cycle = function(t) {
        return t || (this.paused = !1), this.interval && clearInterval(this.interval), this.options.interval && !this.paused && (this.interval = setInterval(n.proxy(this.next, this), this.options.interval)), this
    };
    t.prototype.getItemIndex = function(n) {
        return this.$items = n.parent().children(".item"), this.$items.index(n || this.$active)
    };
    t.prototype.getItemForDirection = function(n, t) {
        var i = this.getItemIndex(t),
            f = n == "prev" && i === 0 || n == "next" && i == this.$items.length - 1,
            r, u;
        return f && !this.options.wrap ? t : (r = n == "prev" ? -1 : 1, u = (i + r) % this.$items.length, this.$items.eq(u))
    };
    t.prototype.to = function(n) {
        var i = this,
            t = this.getItemIndex(this.$active = this.$element.find(".item.active"));
        if (!(n > this.$items.length - 1) && !(n < 0)) return this.sliding ? this.$element.one("slid.bs.carousel", function() {
            i.to(n)
        }) : t == n ? this.pause().cycle() : this.slide(n > t ? "next" : "prev", this.$items.eq(n))
    };
    t.prototype.pause = function(t) {
        return t || (this.paused = !0), this.$element.find(".next, .prev").length && n.support.transition && (this.$element.trigger(n.support.transition.end), this.cycle(!0)), this.interval = clearInterval(this.interval), this
    };
    t.prototype.next = function() {
        if (!this.sliding) return this.slide("next")
    };
    t.prototype.prev = function() {
        if (!this.sliding) return this.slide("prev")
    };
    t.prototype.slide = function(i, r) {
        var e = this.$element.find(".item.active"),
            u = r || this.getItemForDirection(i, e),
            l = this.interval,
            f = i == "next" ? "left" : "right",
            a = this,
            o, s, h, c;
        return u.hasClass("active") ? this.sliding = !1 : (o = u[0], s = n.Event("slide.bs.carousel", {
            relatedTarget: o,
            direction: f
        }), this.$element.trigger(s), s.isDefaultPrevented()) ? void 0 : (this.sliding = !0, l && this.pause(), this.$indicators.length && (this.$indicators.find(".active").removeClass("active"), h = n(this.$indicators.children()[this.getItemIndex(u)]), h && h.addClass("active")), c = n.Event("slid.bs.carousel", {
            relatedTarget: o,
            direction: f
        }), n.support.transition && this.$element.hasClass("slide") ? (u.addClass(i), u[0].offsetWidth, e.addClass(f), u.addClass(f), e.one("bsTransitionEnd", function() {
            u.removeClass([i, f].join(" ")).addClass("active");
            e.removeClass(["active", f].join(" "));
            a.sliding = !1;
            setTimeout(function() {
                a.$element.trigger(c)
            }, 0)
        }).emulateTransitionEnd(t.TRANSITION_DURATION)) : (e.removeClass("active"), u.addClass("active"), this.sliding = !1, this.$element.trigger(c)), l && this.cycle(), this)
    };
    u = n.fn.carousel;
    n.fn.carousel = i;
    n.fn.carousel.Constructor = t;
    n.fn.carousel.noConflict = function() {
        return n.fn.carousel = u, this
    };
    r = function(t) {
        var o, r = n(this),
            u = n(r.attr("data-target") || (o = r.attr("href")) && o.replace(/.*(?=#[^\s]+$)/, "")),
            e, f;
        u.hasClass("carousel") && (e = n.extend({}, u.data(), r.data()), f = r.attr("data-slide-to"), f && (e.interval = !1), i.call(u, e), f && u.data("bs.carousel").to(f), t.preventDefault())
    };
    n(document).on("click.bs.carousel.data-api", "[data-slide]", r).on("click.bs.carousel.data-api", "[data-slide-to]", r);
    n(window).on("load", function() {
        n('[data-ride="carousel"]').each(function() {
            var t = n(this);
            i.call(t, t.data())
        })
    })
}(jQuery); + function(n) {
    "use strict";

    function r(t) {
        var i, r = t.attr("data-target") || (i = t.attr("href")) && i.replace(/.*(?=#[^\s]+$)/, "");
        return n(r)
    }

    function i(i) {
        return this.each(function() {
            var u = n(this),
                r = u.data("bs.collapse"),
                f = n.extend({}, t.DEFAULTS, u.data(), typeof i == "object" && i);
            !r && f.toggle && /show|hide/.test(i) && (f.toggle = !1);
            r || u.data("bs.collapse", r = new t(this, f));
            typeof i == "string" && r[i]()
        })
    }
    var t = function(i, r) {
            this.$element = n(i);
            this.options = n.extend({}, t.DEFAULTS, r);
            this.$trigger = n('[data-toggle="collapse"][href="#' + i.id + '"],[data-toggle="collapse"][data-target="#' + i.id + '"]');
            this.transitioning = null;
            this.options.parent ? this.$parent = this.getParent() : this.addAriaAndCollapsedClass(this.$element, this.$trigger);
            this.options.toggle && this.toggle()
        },
        u;
    t.VERSION = "3.3.4";
    t.TRANSITION_DURATION = 350;
    t.DEFAULTS = {
        toggle: !0
    };
    t.prototype.dimension = function() {
        var n = this.$element.hasClass("width");
        return n ? "width" : "height"
    };
    t.prototype.show = function() {
        var f, r, e, u, o, s;
        if (!this.transitioning && !this.$element.hasClass("in") && (r = this.$parent && this.$parent.children(".panel").children(".in, .collapsing"), !r || !r.length || (f = r.data("bs.collapse"), !f || !f.transitioning)) && (e = n.Event("show.bs.collapse"), this.$element.trigger(e), !e.isDefaultPrevented())) {
            if (r && r.length && (i.call(r, "hide"), f || r.data("bs.collapse", null)), u = this.dimension(), this.$element.removeClass("collapse").addClass("collapsing")[u](0).attr("aria-expanded", !0), this.$trigger.removeClass("collapsed").attr("aria-expanded", !0), this.transitioning = 1, o = function() {
                    this.$element.removeClass("collapsing").addClass("collapse in")[u]("");
                    this.transitioning = 0;
                    this.$element.trigger("shown.bs.collapse")
                }, !n.support.transition) return o.call(this);
            s = n.camelCase(["scroll", u].join("-"));
            this.$element.one("bsTransitionEnd", n.proxy(o, this)).emulateTransitionEnd(t.TRANSITION_DURATION)[u](this.$element[0][s])
        }
    };
    t.prototype.hide = function() {
        var r, i, u;
        if (!this.transitioning && this.$element.hasClass("in") && (r = n.Event("hide.bs.collapse"), this.$element.trigger(r), !r.isDefaultPrevented())) {
            if (i = this.dimension(), this.$element[i](this.$element[i]())[0].offsetHeight, this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded", !1), this.$trigger.addClass("collapsed").attr("aria-expanded", !1), this.transitioning = 1, u = function() {
                    this.transitioning = 0;
                    this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")
                }, !n.support.transition) return u.call(this);
            this.$element[i](0).one("bsTransitionEnd", n.proxy(u, this)).emulateTransitionEnd(t.TRANSITION_DURATION)
        }
    };
    t.prototype.toggle = function() {
        this[this.$element.hasClass("in") ? "hide" : "show"]()
    };
    t.prototype.getParent = function() {
        return n(this.options.parent).find('[data-toggle="collapse"][data-parent="' + this.options.parent + '"]').each(n.proxy(function(t, i) {
            var u = n(i);
            this.addAriaAndCollapsedClass(r(u), u)
        }, this)).end()
    };
    t.prototype.addAriaAndCollapsedClass = function(n, t) {
        var i = n.hasClass("in");
        n.attr("aria-expanded", i);
        t.toggleClass("collapsed", !i).attr("aria-expanded", i)
    };
    u = n.fn.collapse;
    n.fn.collapse = i;
    n.fn.collapse.Constructor = t;
    n.fn.collapse.noConflict = function() {
        return n.fn.collapse = u, this
    };
    n(document).on("click.bs.collapse.data-api", '[data-toggle="collapse"]', function(t) {
        var u = n(this);
        u.attr("data-target") || t.preventDefault();
        var f = r(u),
            e = f.data("bs.collapse"),
            o = e ? "toggle" : u.data();
        i.call(f, o)
    })
}(jQuery); + function(n) {
    "use strict";

    function r(t) {
        t && t.which === 3 || (n(e).remove(), n(i).each(function() {
            var r = n(this),
                i = u(r),
                f = {
                    relatedTarget: this
                };
            i.hasClass("open") && ((i.trigger(t = n.Event("hide.bs.dropdown", f)), t.isDefaultPrevented()) || (r.attr("aria-expanded", "false"), i.removeClass("open").trigger("hidden.bs.dropdown", f)))
        }))
    }

    function u(t) {
        var i = t.attr("data-target"),
            r;
        return i || (i = t.attr("href"), i = i && /#[A-Za-z]/.test(i) && i.replace(/.*(?=#[^\s]*$)/, "")), r = i && n(i), r && r.length ? r : t.parent()
    }

    function o(i) {
        return this.each(function() {
            var r = n(this),
                u = r.data("bs.dropdown");
            u || r.data("bs.dropdown", u = new t(this));
            typeof i == "string" && u[i].call(r)
        })
    }
    var e = ".dropdown-backdrop",
        i = '[data-toggle="dropdown"]',
        t = function(t) {
            n(t).on("click.bs.dropdown", this.toggle)
        },
        f;
    t.VERSION = "3.3.4";
    t.prototype.toggle = function(t) {
        var f = n(this),
            i, o, e;
        if (!f.is(".disabled, :disabled")) {
            if (i = u(f), o = i.hasClass("open"), r(), !o) {
                if ("ontouchstart" in document.documentElement && !i.closest(".navbar-nav").length) n('<div class="dropdown-backdrop"/>').insertAfter(n(this)).on("click", r);
                if (e = {
                        relatedTarget: this
                    }, i.trigger(t = n.Event("show.bs.dropdown", e)), t.isDefaultPrevented()) return;
                f.trigger("focus").attr("aria-expanded", "true");
                i.toggleClass("open").trigger("shown.bs.dropdown", e)
            }
            return !1
        }
    };
    t.prototype.keydown = function(t) {
        var e, o, s, h, f, r;
        if (/(38|40|27|32)/.test(t.which) && !/input|textarea/i.test(t.target.tagName) && (e = n(this), t.preventDefault(), t.stopPropagation(), !e.is(".disabled, :disabled"))) {
            if (o = u(e), s = o.hasClass("open"), !s && t.which != 27 || s && t.which == 27) return t.which == 27 && o.find(i).trigger("focus"), e.trigger("click");
            (h = " li:not(.disabled):visible a", f = o.find('[role="menu"]' + h + ', [role="listbox"]' + h), f.length) && (r = f.index(t.target), t.which == 38 && r > 0 && r--, t.which == 40 && r < f.length - 1 && r++, ~r || (r = 0), f.eq(r).trigger("focus"))
        }
    };
    f = n.fn.dropdown;
    n.fn.dropdown = o;
    n.fn.dropdown.Constructor = t;
    n.fn.dropdown.noConflict = function() {
        return n.fn.dropdown = f, this
    };
    n(document).on("click.bs.dropdown.data-api", r).on("click.bs.dropdown.data-api", ".dropdown form", function(n) {
        n.stopPropagation()
    }).on("click.bs.dropdown.data-api", i, t.prototype.toggle).on("keydown.bs.dropdown.data-api", i, t.prototype.keydown).on("keydown.bs.dropdown.data-api", '[role="menu"]', t.prototype.keydown).on("keydown.bs.dropdown.data-api", '[role="listbox"]', t.prototype.keydown)
}(jQuery); + function(n) {
    "use strict";

    function i(i, r) {
        return this.each(function() {
            var f = n(this),
                u = f.data("bs.modal"),
                e = n.extend({}, t.DEFAULTS, f.data(), typeof i == "object" && i);
            u || f.data("bs.modal", u = new t(this, e));
            typeof i == "string" ? u[i](r) : e.show && u.show(r)
        })
    }
    var t = function(t, i) {
            this.options = i;
            this.$body = n(document.body);
            this.$element = n(t);
            this.$dialog = this.$element.find(".modal-dialog");
            this.$backdrop = null;
            this.isShown = null;
            this.originalBodyPad = null;
            this.scrollbarWidth = 0;
            this.ignoreBackdropClick = !1;
            this.options.remote && this.$element.find(".modal-content").load(this.options.remote, n.proxy(function() {
                this.$element.trigger("loaded.bs.modal")
            }, this))
        },
        r;
    t.VERSION = "3.3.4";
    t.TRANSITION_DURATION = 300;
    t.BACKDROP_TRANSITION_DURATION = 150;
    t.DEFAULTS = {
        backdrop: !0,
        keyboard: !0,
        show: !0
    };
    t.prototype.toggle = function(n) {
        return this.isShown ? this.hide() : this.show(n)
    };
    t.prototype.show = function(i) {
        var r = this,
            u = n.Event("show.bs.modal", {
                relatedTarget: i
            });
        if (this.$element.trigger(u), !this.isShown && !u.isDefaultPrevented()) {
            this.isShown = !0;
            this.checkScrollbar();
            this.setScrollbar();
            this.$body.addClass("modal-open");
            this.escape();
            this.resize();
            this.$element.on("click.dismiss.bs.modal", '[data-dismiss="modal"]', n.proxy(this.hide, this));
            this.$dialog.on("mousedown.dismiss.bs.modal", function() {
                r.$element.one("mouseup.dismiss.bs.modal", function(t) {
                    n(t.target).is(r.$element) && (r.ignoreBackdropClick = !0)
                })
            });
            this.backdrop(function() {
                var f = n.support.transition && r.$element.hasClass("fade"),
                    u;
                r.$element.parent().length || r.$element.appendTo(r.$body);
                r.$element.show().scrollTop(0);
                r.adjustDialog();
                f && r.$element[0].offsetWidth;
                r.$element.addClass("in").attr("aria-hidden", !1);
                r.enforceFocus();
                u = n.Event("shown.bs.modal", {
                    relatedTarget: i
                });
                f ? r.$dialog.one("bsTransitionEnd", function() {
                    r.$element.trigger("focus").trigger(u)
                }).emulateTransitionEnd(t.TRANSITION_DURATION) : r.$element.trigger("focus").trigger(u)
            })
        }
    };
    t.prototype.hide = function(i) {
        (i && i.preventDefault(), i = n.Event("hide.bs.modal"), this.$element.trigger(i), this.isShown && !i.isDefaultPrevented()) && (this.isShown = !1, this.escape(), this.resize(), n(document).off("focusin.bs.modal"), this.$element.removeClass("in").attr("aria-hidden", !0).off("click.dismiss.bs.modal").off("mouseup.dismiss.bs.modal"), this.$dialog.off("mousedown.dismiss.bs.modal"), n.support.transition && this.$element.hasClass("fade") ? this.$element.one("bsTransitionEnd", n.proxy(this.hideModal, this)).emulateTransitionEnd(t.TRANSITION_DURATION) : this.hideModal())
    };
    t.prototype.enforceFocus = function() {
        n(document).off("focusin.bs.modal").on("focusin.bs.modal", n.proxy(function(n) {
            this.$element[0] === n.target || this.$element.has(n.target).length || this.$element.trigger("focus")
        }, this))
    };
    t.prototype.escape = function() {
        if (this.isShown && this.options.keyboard) this.$element.on("keydown.dismiss.bs.modal", n.proxy(function(n) {
            n.which == 27 && this.hide()
        }, this));
        else this.isShown || this.$element.off("keydown.dismiss.bs.modal")
    };
    t.prototype.resize = function() {
        if (this.isShown) n(window).on("resize.bs.modal", n.proxy(this.handleUpdate, this));
        else n(window).off("resize.bs.modal")
    };
    t.prototype.hideModal = function() {
        var n = this;
        this.$element.hide();
        this.backdrop(function() {
            n.$body.removeClass("modal-open");
            n.resetAdjustments();
            n.resetScrollbar();
            n.$element.trigger("hidden.bs.modal")
        })
    };
    t.prototype.removeBackdrop = function() {
        this.$backdrop && this.$backdrop.remove();
        this.$backdrop = null
    };
    t.prototype.backdrop = function(i) {
        var e = this,
            f = this.$element.hasClass("fade") ? "fade" : "",
            r, u;
        if (this.isShown && this.options.backdrop) {
            r = n.support.transition && f;
            this.$backdrop = n('<div class="modal-backdrop ' + f + '" />').appendTo(this.$body);
            this.$element.on("click.dismiss.bs.modal", n.proxy(function(n) {
                if (this.ignoreBackdropClick) {
                    this.ignoreBackdropClick = !1;
                    return
                }
                n.target === n.currentTarget && (this.options.backdrop == "static" ? this.$element[0].focus() : this.hide())
            }, this));
            if (r && this.$backdrop[0].offsetWidth, this.$backdrop.addClass("in"), !i) return;
            r ? this.$backdrop.one("bsTransitionEnd", i).emulateTransitionEnd(t.BACKDROP_TRANSITION_DURATION) : i()
        } else !this.isShown && this.$backdrop ? (this.$backdrop.removeClass("in"), u = function() {
            e.removeBackdrop();
            i && i()
        }, n.support.transition && this.$element.hasClass("fade") ? this.$backdrop.one("bsTransitionEnd", u).emulateTransitionEnd(t.BACKDROP_TRANSITION_DURATION) : u()) : i && i()
    };
    t.prototype.handleUpdate = function() {
        this.adjustDialog()
    };
    t.prototype.adjustDialog = function() {
        var n = this.$element[0].scrollHeight > document.documentElement.clientHeight;
        this.$element.css({
            paddingLeft: !this.bodyIsOverflowing && n ? this.scrollbarWidth : "",
            paddingRight: this.bodyIsOverflowing && !n ? this.scrollbarWidth : ""
        })
    };
    t.prototype.resetAdjustments = function() {
        this.$element.css({
            paddingLeft: "",
            paddingRight: ""
        })
    };
    t.prototype.checkScrollbar = function() {
        var n = window.innerWidth,
            t;
        n || (t = document.documentElement.getBoundingClientRect(), n = t.right - Math.abs(t.left));
        this.bodyIsOverflowing = document.body.clientWidth < n;
        this.scrollbarWidth = this.measureScrollbar()
    };
    t.prototype.setScrollbar = function() {
        var n = parseInt(this.$body.css("") || 0, 10);
        this.originalBodyPad = document.body.style.paddingRight || "";
        this.bodyIsOverflowing && this.$body.css("", n + this.scrollbarWidth)
    };
    t.prototype.resetScrollbar = function() {
        this.$body.css("", this.originalBodyPad)
    };
    t.prototype.measureScrollbar = function() {
        var n = document.createElement("div"),
            t;
        return n.className = "modal-scrollbar-measure", this.$body.append(n), t = n.offsetWidth - n.clientWidth, this.$body[0].removeChild(n), t
    };
    r = n.fn.modal;
    n.fn.modal = i;
    n.fn.modal.Constructor = t;
    n.fn.modal.noConflict = function() {
        return n.fn.modal = r, this
    };
    n(document).on("click.bs.modal.data-api", '[data-toggle="modal"]', function(t) {
        var r = n(this),
            f = r.attr("href"),
            u = n(r.attr("data-target") || f && f.replace(/.*(?=#[^\s]+$)/, "")),
            e = u.data("bs.modal") ? "toggle" : n.extend({
                remote: !/#/.test(f) && f
            }, u.data(), r.data());
        r.is("a") && t.preventDefault();
        u.one("show.bs.modal", function(n) {
            if (!n.isDefaultPrevented()) u.one("hidden.bs.modal", function() {
                r.is(":visible") && r.trigger("focus")
            })
        });
        i.call(u, e, this)
    })
}(jQuery); + function(n) {
    "use strict";

    function r(i) {
        return this.each(function() {
            var u = n(this),
                r = u.data("bs.tooltip"),
                f = typeof i == "object" && i;
            (r || !/destroy|hide/.test(i)) && (r || u.data("bs.tooltip", r = new t(this, f)), typeof i == "string" && r[i]())
        })
    }
    var t = function(n, t) {
            this.type = null;
            this.options = null;
            this.enabled = null;
            this.timeout = null;
            this.hoverState = null;
            this.$element = null;
            this.init("tooltip", n, t)
        },
        i;
    t.VERSION = "3.3.4";
    t.TRANSITION_DURATION = 150;
    t.DEFAULTS = {
        animation: !0,
        placement: "top",
        selector: !1,
        template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"><\/div><div class="tooltip-inner"><\/div><\/div>',
        trigger: "hover focus",
        title: "",
        delay: 0,
        html: !1,
        container: !1,
        viewport: {
            selector: "body",
            padding: 0
        }
    };
    t.prototype.init = function(t, i, r) {
        var f, e, u, o, s;
        if (this.enabled = !0, this.type = t, this.$element = n(i), this.options = this.getOptions(r), this.$viewport = this.options.viewport && n(this.options.viewport.selector || this.options.viewport), this.$element[0] instanceof document.constructor && !this.options.selector) throw new Error("`selector` option must be specified when initializing " + this.type + " on the window.document object!");
        for (f = this.options.trigger.split(" "), e = f.length; e--;)
            if (u = f[e], u == "click") this.$element.on("click." + this.type, this.options.selector, n.proxy(this.toggle, this));
            else if (u != "manual") {
            o = u == "hover" ? "mouseenter" : "focusin";
            s = u == "hover" ? "mouseleave" : "focusout";
            this.$element.on(o + "." + this.type, this.options.selector, n.proxy(this.enter, this));
            this.$element.on(s + "." + this.type, this.options.selector, n.proxy(this.leave, this))
        }
        this.options.selector ? this._options = n.extend({}, this.options, {
            trigger: "manual",
            selector: ""
        }) : this.fixTitle()
    };
    t.prototype.getDefaults = function() {
        return t.DEFAULTS
    };
    t.prototype.getOptions = function(t) {
        return t = n.extend({}, this.getDefaults(), this.$element.data(), t), t.delay && typeof t.delay == "number" && (t.delay = {
            show: t.delay,
            hide: t.delay
        }), t
    };
    t.prototype.getDelegateOptions = function() {
        var t = {},
            i = this.getDefaults();
        return this._options && n.each(this._options, function(n, r) {
            i[n] != r && (t[n] = r)
        }), t
    };
    t.prototype.enter = function(t) {
        var i = t instanceof this.constructor ? t : n(t.currentTarget).data("bs." + this.type);
        if (i && i.$tip && i.$tip.is(":visible")) {
            i.hoverState = "in";
            return
        }
        if (i || (i = new this.constructor(t.currentTarget, this.getDelegateOptions()), n(t.currentTarget).data("bs." + this.type, i)), clearTimeout(i.timeout), i.hoverState = "in", !i.options.delay || !i.options.delay.show) return i.show();
        i.timeout = setTimeout(function() {
            i.hoverState == "in" && i.show()
        }, i.options.delay.show)
    };
    t.prototype.leave = function(t) {
        var i = t instanceof this.constructor ? t : n(t.currentTarget).data("bs." + this.type);
        if (i || (i = new this.constructor(t.currentTarget, this.getDelegateOptions()), n(t.currentTarget).data("bs." + this.type, i)), clearTimeout(i.timeout), i.hoverState = "out", !i.options.delay || !i.options.delay.hide) return i.hide();
        i.timeout = setTimeout(function() {
            i.hoverState == "out" && i.hide()
        }, i.options.delay.hide)
    };
    t.prototype.show = function() {
        var c = n.Event("show.bs." + this.type),
            l, p, h;
        if (this.hasContent() && this.enabled) {
            if (this.$element.trigger(c), l = n.contains(this.$element[0].ownerDocument.documentElement, this.$element[0]), c.isDefaultPrevented() || !l) return;
            var u = this,
                r = this.tip(),
                a = this.getUID(this.type);
            this.setContent();
            r.attr("id", a);
            this.$element.attr("aria-describedby", a);
            this.options.animation && r.addClass("fade");
            var i = typeof this.options.placement == "function" ? this.options.placement.call(this, r[0], this.$element[0]) : this.options.placement,
                v = /\s?auto?\s?/i,
                y = v.test(i);
            y && (i = i.replace(v, "") || "top");
            r.detach().css({
                top: 0,
                left: 0,
                display: "block"
            }).addClass(i).data("bs." + this.type, this);
            this.options.container ? r.appendTo(this.options.container) : r.insertAfter(this.$element);
            var f = this.getPosition(),
                o = r[0].offsetWidth,
                s = r[0].offsetHeight;
            if (y) {
                var w = i,
                    b = this.options.container ? n(this.options.container) : this.$element.parent(),
                    e = this.getPosition(b);
                i = i == "bottom" && f.bottom + s > e.bottom ? "top" : i == "top" && f.top - s < e.top ? "bottom" : i == "right" && f.right + o > e.width ? "left" : i == "left" && f.left - o < e.left ? "right" : i;
                r.removeClass(w).addClass(i)
            }
            p = this.getCalculatedOffset(i, f, o, s);
            this.applyPlacement(p, i);
            h = function() {
                var n = u.hoverState;
                u.$element.trigger("shown.bs." + u.type);
                u.hoverState = null;
                n == "out" && u.leave(u)
            };
            n.support.transition && this.$tip.hasClass("fade") ? r.one("bsTransitionEnd", h).emulateTransitionEnd(t.TRANSITION_DURATION) : h()
        }
    };
    t.prototype.applyPlacement = function(t, i) {
        var r = this.tip(),
            l = r[0].offsetWidth,
            e = r[0].offsetHeight,
            o = parseInt(r.css("margin-top"), 10),
            s = parseInt(r.css("margin-left"), 10),
            h, f, u;
        isNaN(o) && (o = 0);
        isNaN(s) && (s = 0);
        t.top = t.top + o;
        t.left = t.left + s;
        n.offset.setOffset(r[0], n.extend({
            using: function(n) {
                r.css({
                    top: Math.round(n.top),
                    left: Math.round(n.left)
                })
            }
        }, t), 0);
        r.addClass("in");
        h = r[0].offsetWidth;
        f = r[0].offsetHeight;
        i == "top" && f != e && (t.top = t.top + e - f);
        u = this.getViewportAdjustedDelta(i, t, h, f);
        u.left ? t.left += u.left : t.top += u.top;
        var c = /top|bottom/.test(i),
            a = c ? u.left * 2 - l + h : u.top * 2 - e + f,
            v = c ? "offsetWidth" : "offsetHeight";
        r.offset(t);
        this.replaceArrow(a, r[0][v], c)
    };
    t.prototype.replaceArrow = function(n, t, i) {
        this.arrow().css(i ? "left" : "top", 50 * (1 - n / t) + "%").css(i ? "top" : "left", "")
    };
    t.prototype.setContent = function() {
        var n = this.tip(),
            t = this.getTitle();
        n.find(".tooltip-inner")[this.options.html ? "html" : "text"](t);
        n.removeClass("fade in top bottom left right")
    };
    t.prototype.hide = function(i) {
        function e() {
            u.hoverState != "in" && r.detach();
            u.$element.removeAttr("aria-describedby").trigger("hidden.bs." + u.type);
            i && i()
        }
        var u = this,
            r = n(this.$tip),
            f = n.Event("hide.bs." + this.type);
        if (this.$element.trigger(f), !f.isDefaultPrevented()) return r.removeClass("in"), n.support.transition && r.hasClass("fade") ? r.one("bsTransitionEnd", e).emulateTransitionEnd(t.TRANSITION_DURATION) : e(), this.hoverState = null, this
    };
    t.prototype.fixTitle = function() {
        var n = this.$element;
        (n.attr("title") || typeof n.attr("data-original-title") != "string") && n.attr("data-original-title", n.attr("title") || "").attr("title", "")
    };
    t.prototype.hasContent = function() {
        return this.getTitle()
    };
    t.prototype.getPosition = function(t) {
        t = t || this.$element;
        var u = t[0],
            r = u.tagName == "BODY",
            i = u.getBoundingClientRect();
        i.width == null && (i = n.extend({}, i, {
            width: i.right - i.left,
            height: i.bottom - i.top
        }));
        var f = r ? {
                top: 0,
                left: 0
            } : t.offset(),
            e = {
                scroll: r ? document.documentElement.scrollTop || document.body.scrollTop : t.scrollTop()
            },
            o = r ? {
                width: n(window).width(),
                height: n(window).height()
            } : null;
        return n.extend({}, i, e, o, f)
    };
    t.prototype.getCalculatedOffset = function(n, t, i, r) {
        return n == "bottom" ? {
            top: t.top + t.height,
            left: t.left + t.width / 2 - i / 2
        } : n == "top" ? {
            top: t.top - r,
            left: t.left + t.width / 2 - i / 2
        } : n == "left" ? {
            top: t.top + t.height / 2 - r / 2,
            left: t.left - i
        } : {
            top: t.top + t.height / 2 - r / 2,
            left: t.left + t.width
        }
    };
    t.prototype.getViewportAdjustedDelta = function(n, t, i, r) {
        var f = {
                top: 0,
                left: 0
            },
            e, u, o, s, h, c;
        return this.$viewport ? (e = this.options.viewport && this.options.viewport.padding || 0, u = this.getPosition(this.$viewport), /right|left/.test(n) ? (o = t.top - e - u.scroll, s = t.top + e - u.scroll + r, o < u.top ? f.top = u.top - o : s > u.top + u.height && (f.top = u.top + u.height - s)) : (h = t.left - e, c = t.left + e + i, h < u.left ? f.left = u.left - h : c > u.width && (f.left = u.left + u.width - c)), f) : f
    };
    t.prototype.getTitle = function() {
        var t = this.$element,
            n = this.options;
        return t.attr("data-original-title") || (typeof n.title == "function" ? n.title.call(t[0]) : n.title)
    };
    t.prototype.getUID = function(n) {
        do n += ~~(Math.random() * 1e6); while (document.getElementById(n));
        return n
    };
    t.prototype.tip = function() {
        return this.$tip = this.$tip || n(this.options.template)
    };
    t.prototype.arrow = function() {
        return this.$arrow = this.$arrow || this.tip().find(".tooltip-arrow")
    };
    t.prototype.enable = function() {
        this.enabled = !0
    };
    t.prototype.disable = function() {
        this.enabled = !1
    };
    t.prototype.toggleEnabled = function() {
        this.enabled = !this.enabled
    };
    t.prototype.toggle = function(t) {
        var i = this;
        t && (i = n(t.currentTarget).data("bs." + this.type), i || (i = new this.constructor(t.currentTarget, this.getDelegateOptions()), n(t.currentTarget).data("bs." + this.type, i)));
        i.tip().hasClass("in") ? i.leave(i) : i.enter(i)
    };
    t.prototype.destroy = function() {
        var n = this;
        clearTimeout(this.timeout);
        this.hide(function() {
            n.$element.off("." + n.type).removeData("bs." + n.type)
        })
    };
    i = n.fn.tooltip;
    n.fn.tooltip = r;
    n.fn.tooltip.Constructor = t;
    n.fn.tooltip.noConflict = function() {
        return n.fn.tooltip = i, this
    }
}(jQuery); + function(n) {
    "use strict";

    function r(i) {
        return this.each(function() {
            var u = n(this),
                r = u.data("bs.popover"),
                f = typeof i == "object" && i;
            (r || !/destroy|hide/.test(i)) && (r || u.data("bs.popover", r = new t(this, f)), typeof i == "string" && r[i]())
        })
    }
    var t = function(n, t) {
            this.init("popover", n, t)
        },
        i;
    if (!n.fn.tooltip) throw new Error("Popover requires tooltip.js");
    t.VERSION = "3.3.4";
    t.DEFAULTS = n.extend({}, n.fn.tooltip.Constructor.DEFAULTS, {
        placement: "right",
        trigger: "click",
        content: "",
        template: '<div class="popover" role="tooltip"><div class="arrow"><\/div><h3 class="popover-title"><\/h3><div class="popover-content"><\/div><\/div>'
    });
    t.prototype = n.extend({}, n.fn.tooltip.Constructor.prototype);
    t.prototype.constructor = t;
    t.prototype.getDefaults = function() {
        return t.DEFAULTS
    };
    t.prototype.setContent = function() {
        var n = this.tip(),
            i = this.getTitle(),
            t = this.getContent();
        n.find(".popover-title")[this.options.html ? "html" : "text"](i);
        n.find(".popover-content").children().detach().end()[this.options.html ? typeof t == "string" ? "html" : "append" : "text"](t);
        n.removeClass("fade top bottom left right in");
        n.find(".popover-title").html() || n.find(".popover-title").hide()
    };
    t.prototype.hasContent = function() {
        return this.getTitle() || this.getContent()
    };
    t.prototype.getContent = function() {
        var t = this.$element,
            n = this.options;
        return t.attr("data-content") || (typeof n.content == "function" ? n.content.call(t[0]) : n.content)
    };
    t.prototype.arrow = function() {
        return this.$arrow = this.$arrow || this.tip().find(".arrow")
    };
    i = n.fn.popover;
    n.fn.popover = r;
    n.fn.popover.Constructor = t;
    n.fn.popover.noConflict = function() {
        return n.fn.popover = i, this
    }
}(jQuery); + function(n) {
    "use strict";

    function t(i, r) {
        this.$body = n(document.body);
        this.$scrollElement = n(i).is(document.body) ? n(window) : n(i);
        this.options = n.extend({}, t.DEFAULTS, r);
        this.selector = (this.options.target || "") + " .nav li > a";
        this.offsets = [];
        this.targets = [];
        this.activeTarget = null;
        this.scrollHeight = 0;
        this.$scrollElement.on("scroll.bs.scrollspy", n.proxy(this.process, this));
        this.refresh();
        this.process()
    }

    function i(i) {
        return this.each(function() {
            var u = n(this),
                r = u.data("bs.scrollspy"),
                f = typeof i == "object" && i;
            r || u.data("bs.scrollspy", r = new t(this, f));
            typeof i == "string" && r[i]()
        })
    }
    t.VERSION = "3.3.4";
    t.DEFAULTS = {
        offset: 10
    };
    t.prototype.getScrollHeight = function() {
        return this.$scrollElement[0].scrollHeight || Math.max(this.$body[0].scrollHeight, document.documentElement.scrollHeight)
    };
    t.prototype.refresh = function() {
        var t = this,
            i = "offset",
            r = 0;
        this.offsets = [];
        this.targets = [];
        this.scrollHeight = this.getScrollHeight();
        n.isWindow(this.$scrollElement[0]) || (i = "position", r = this.$scrollElement.scrollTop());
        this.$body.find(this.selector).map(function() {
            var f = n(this),
                u = f.data("target") || f.attr("href"),
                t = /^#./.test(u) && n(u);
            return t && t.length && t.is(":visible") && [
                [t[i]().top + r, u]
            ] || null
        }).sort(function(n, t) {
            return n[0] - t[0]
        }).each(function() {
            t.offsets.push(this[0]);
            t.targets.push(this[1])
        })
    };
    t.prototype.process = function() {
        var i = this.$scrollElement.scrollTop() + this.options.offset,
            f = this.getScrollHeight(),
            e = this.options.offset + f - this.$scrollElement.height(),
            t = this.offsets,
            r = this.targets,
            u = this.activeTarget,
            n;
        if (this.scrollHeight != f && this.refresh(), i >= e) return u != (n = r[r.length - 1]) && this.activate(n);
        if (u && i < t[0]) return this.activeTarget = null, this.clear();
        for (n = t.length; n--;) u != r[n] && i >= t[n] && (t[n + 1] === undefined || i < t[n + 1]) && this.activate(r[n])
    };
    t.prototype.activate = function(t) {
        this.activeTarget = t;
        this.clear();
        var r = this.selector + '[data-target="' + t + '"],' + this.selector + '[href="' + t + '"]',
            i = n(r).parents("li").addClass("active");
        i.parent(".dropdown-menu").length && (i = i.closest("li.dropdown").addClass("active"));
        i.trigger("activate.bs.scrollspy")
    };
    t.prototype.clear = function() {
        n(this.selector).parentsUntil(this.options.target, ".active").removeClass("active")
    };
    var r = n.fn.scrollspy;
    n.fn.scrollspy = i;
    n.fn.scrollspy.Constructor = t;
    n.fn.scrollspy.noConflict = function() {
        return n.fn.scrollspy = r, this
    };
    n(window).on("load.bs.scrollspy.data-api", function() {
        n('[data-spy="scroll"]').each(function() {
            var t = n(this);
            i.call(t, t.data())
        })
    })
}(jQuery); + function(n) {
    "use strict";

    function r(i) {
        return this.each(function() {
            var u = n(this),
                r = u.data("bs.tab");
            r || u.data("bs.tab", r = new t(this));
            typeof i == "string" && r[i]()
        })
    }
    var t = function(t) {
            this.element = n(t)
        },
        u, i;
    t.VERSION = "3.3.4";
    t.TRANSITION_DURATION = 150;
    t.prototype.show = function() {
        var t = this.element,
            f = t.closest("ul:not(.dropdown-menu)"),
            i = t.data("target"),
            u;
        if (i || (i = t.attr("href"), i = i && i.replace(/.*(?=#[^\s]*$)/, "")), !t.parent("li").hasClass("active")) {
            var r = f.find(".active:last a"),
                e = n.Event("hide.bs.tab", {
                    relatedTarget: t[0]
                }),
                o = n.Event("show.bs.tab", {
                    relatedTarget: r[0]
                });
            (r.trigger(e), t.trigger(o), o.isDefaultPrevented() || e.isDefaultPrevented()) || (u = n(i), this.activate(t.closest("li"), f), this.activate(u, u.parent(), function() {
                r.trigger({
                    type: "hidden.bs.tab",
                    relatedTarget: t[0]
                });
                t.trigger({
                    type: "shown.bs.tab",
                    relatedTarget: r[0]
                })
            }))
        }
    };
    t.prototype.activate = function(i, r, u) {
        function o() {
            f.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !1);
            i.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded", !0);
            e ? (i[0].offsetWidth, i.addClass("in")) : i.removeClass("fade");
            i.parent(".dropdown-menu").length && i.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !0);
            u && u()
        }
        var f = r.find("> .active"),
            e = u && n.support.transition && (f.length && f.hasClass("fade") || !!r.find("> .fade").length);
        f.length && e ? f.one("bsTransitionEnd", o).emulateTransitionEnd(t.TRANSITION_DURATION) : o();
        f.removeClass("in")
    };
    u = n.fn.tab;
    n.fn.tab = r;
    n.fn.tab.Constructor = t;
    n.fn.tab.noConflict = function() {
        return n.fn.tab = u, this
    };
    i = function(t) {
        t.preventDefault();
        r.call(n(this), "show")
    };
    n(document).on("click.bs.tab.data-api", '[data-toggle="tab"]', i).on("click.bs.tab.data-api", '[data-toggle="pill"]', i)
}(jQuery); + function(n) {
    "use strict";

    function i(i) {
        return this.each(function() {
            var u = n(this),
                r = u.data("bs.affix"),
                f = typeof i == "object" && i;
            r || u.data("bs.affix", r = new t(this, f));
            typeof i == "string" && r[i]()
        })
    }
    var t = function(i, r) {
            this.options = n.extend({}, t.DEFAULTS, r);
            this.$target = n(this.options.target).on("scroll.bs.affix.data-api", n.proxy(this.checkPosition, this)).on("click.bs.affix.data-api", n.proxy(this.checkPositionWithEventLoop, this));
            this.$element = n(i);
            this.affixed = null;
            this.unpin = null;
            this.pinnedOffset = null;
            this.checkPosition()
        },
        r;
    t.VERSION = "3.3.4";
    t.RESET = "affix affix-top affix-bottom";
    t.DEFAULTS = {
        offset: 0,
        target: window
    };
    t.prototype.getState = function(n, t, i, r) {
        var u = this.$target.scrollTop(),
            f = this.$element.offset(),
            e = this.$target.height();
        if (i != null && this.affixed == "top") return u < i ? "top" : !1;
        if (this.affixed == "bottom") return i != null ? u + this.unpin <= f.top ? !1 : "bottom" : u + e <= n - r ? !1 : "bottom";
        var o = this.affixed == null,
            s = o ? u : f.top,
            h = o ? e : t;
        return i != null && u <= i ? "top" : r != null && s + h >= n - r ? "bottom" : !1
    };
    t.prototype.getPinnedOffset = function() {
        if (this.pinnedOffset) return this.pinnedOffset;
        this.$element.removeClass(t.RESET).addClass("affix");
        var n = this.$target.scrollTop(),
            i = this.$element.offset();
        return this.pinnedOffset = i.top - n
    };
    t.prototype.checkPositionWithEventLoop = function() {
        setTimeout(n.proxy(this.checkPosition, this), 1)
    };
    t.prototype.checkPosition = function() {
        var i, e, o;
        if (this.$element.is(":visible")) {
            var s = this.$element.height(),
                r = this.options.offset,
                f = r.top,
                u = r.bottom,
                h = n(document.body).height();
            if (typeof r != "object" && (u = f = r), typeof f == "function" && (f = r.top(this.$element)), typeof u == "function" && (u = r.bottom(this.$element)), i = this.getState(h, s, f, u), this.affixed != i) {
                if (this.unpin != null && this.$element.css("top", ""), e = "affix" + (i ? "-" + i : ""), o = n.Event(e + ".bs.affix"), this.$element.trigger(o), o.isDefaultPrevented()) return;
                this.affixed = i;
                this.unpin = i == "bottom" ? this.getPinnedOffset() : null;
                this.$element.removeClass(t.RESET).addClass(e).trigger(e.replace("affix", "affixed") + ".bs.affix")
            }
            i == "bottom" && this.$element.offset({
                top: h - s - u
            })
        }
    };
    r = n.fn.affix;
    n.fn.affix = i;
    n.fn.affix.Constructor = t;
    n.fn.affix.noConflict = function() {
        return n.fn.affix = r, this
    };
    n(window).on("load", function() {
        n('[data-spy="affix"]').each(function() {
            var r = n(this),
                t = r.data();
            t.offset = t.offset || {};
            t.offsetBottom != null && (t.offset.bottom = t.offsetBottom);
            t.offsetTop != null && (t.offset.top = t.offsetTop);
            i.call(r, t)
        })
    })
}(jQuery);
AmCharts || (AmCharts = {});
AmCharts.inheriting = {};
AmCharts.Class = function(n) {
    var t = function() {
            arguments[0] !== AmCharts.inheriting && (this.events = {}, this.construct.apply(this, arguments))
        },
        i;
    n.inherits ? (t.prototype = new n.inherits(AmCharts.inheriting), t.base = n.inherits.prototype, delete n.inherits) : (t.prototype.createEvents = function() {
        for (var n = 0, t = arguments.length; n < t; n++) this.events[arguments[n]] = []
    }, t.prototype.listenTo = function(n, t, i) {
        n.events[t].push({
            handler: i,
            scope: this
        })
    }, t.prototype.addListener = function(n, t, i) {
        this.events[n].push({
            handler: t,
            scope: i
        })
    }, t.prototype.removeListener = function(n, t, i) {
        for (n = n.events[t], t = n.length - 1; 0 <= t; t--) n[t].handler === i && n.splice(t, 1)
    }, t.prototype.fire = function(n, t) {
        for (var r, u = this.events[n], i = 0, f = u.length; i < f; i++) r = u[i], r.handler.call(r.scope, t)
    });
    for (i in n) t.prototype[i] = n[i];
    return t
};
AmCharts.charts = [];
AmCharts.addChart = function(n) {
    AmCharts.charts.push(n)
};
AmCharts.removeChart = function(n) {
    for (var i = AmCharts.charts, t = i.length - 1; 0 <= t; t--) i[t] == n && i.splice(t, 1)
};
AmCharts.IEversion = 0; - 1 != navigator.appVersion.indexOf("MSIE") && document.documentMode && (AmCharts.IEversion = Number(document.documentMode));
(document.addEventListener || window.opera) && (AmCharts.isNN = !0, AmCharts.isIE = !1, AmCharts.dx = .5, AmCharts.dy = .5);
document.attachEvent && (AmCharts.isNN = !1, AmCharts.isIE = !0, 9 > AmCharts.IEversion && (AmCharts.dx = 0, AmCharts.dy = 0));
window.chrome && (AmCharts.chrome = !0);
AmCharts.handleResize = function() {
    for (var t, i = AmCharts.charts, n = 0; n < i.length; n++) t = i[n], t && t.div && t.handleResize()
};
AmCharts.handleMouseUp = function(n) {
    for (var r, i = AmCharts.charts, t = 0; t < i.length; t++) r = i[t], r && r.handleReleaseOutside(n)
};
AmCharts.handleMouseMove = function(n) {
    for (var r, i = AmCharts.charts, t = 0; t < i.length; t++) r = i[t], r && r.handleMouseMove(n)
};
AmCharts.resetMouseOver = function() {
    for (var i, t = AmCharts.charts, n = 0; n < t.length; n++) i = t[n], i && (i.mouseIsOver = !1)
};
AmCharts.onReadyArray = [];
AmCharts.ready = function(n) {
    AmCharts.onReadyArray.push(n)
};
AmCharts.handleLoad = function() {
    for (var t = AmCharts.onReadyArray, n = 0; n < t.length; n++) t[n]()
};
AmCharts.useUTC = !1;
AmCharts.updateRate = 40;
AmCharts.uid = 0;
AmCharts.getUniqueId = function() {
    return AmCharts.uid++, "AmChartsEl-" + AmCharts.uid
};
AmCharts.isNN && (document.addEventListener("mousemove", AmCharts.handleMouseMove, !0), window.addEventListener("resize", AmCharts.handleResize, !0), document.addEventListener("mouseup", AmCharts.handleMouseUp, !0), window.addEventListener("load", AmCharts.handleLoad, !0));
AmCharts.isIE && (document.attachEvent("onmousemove", AmCharts.handleMouseMove), window.attachEvent("onresize", AmCharts.handleResize), document.attachEvent("onmouseup", AmCharts.handleMouseUp), window.attachEvent("onload", AmCharts.handleLoad));
AmCharts.clear = function() {
    var t = AmCharts.charts,
        n;
    if (t)
        for (n = 0; n < t.length; n++) t[n].clear();
    AmCharts.charts = null;
    AmCharts.isNN && (document.removeEventListener("mousemove", AmCharts.handleMouseMove, !0), window.removeEventListener("resize", AmCharts.handleResize, !0), document.removeEventListener("mouseup", AmCharts.handleMouseUp, !0), window.removeEventListener("load", AmCharts.handleLoad, !0));
    AmCharts.isIE && (document.detachEvent("onmousemove", AmCharts.handleMouseMove), window.detachEvent("onresize", AmCharts.handleResize), document.detachEvent("onmouseup", AmCharts.handleMouseUp), window.detachEvent("onload", AmCharts.handleLoad))
};
AmCharts.AmChart = AmCharts.Class({
    construct: function() {
        this.version = "2.11.3";
        AmCharts.addChart(this);
        this.createEvents("dataUpdated", "init", "rendered", "drawn");
        this.height = this.width = "100%";
        this.dataChanged = !0;
        this.chartCreated = !1;
        this.previousWidth = this.previousHeight = 0;
        this.backgroundColor = "#FFFFFF";
        this.borderAlpha = this.backgroundAlpha = 0;
        this.color = this.borderColor = "#000000";
        this.fontFamily = "Verdana";
        this.fontSize = 11;
        this.numberFormatter = {
            precision: -1,
            decimalSeparator: ".",
            thousandsSeparator: ","
        };
        this.percentFormatter = {
            precision: 2,
            decimalSeparator: ".",
            thousandsSeparator: ","
        };
        this.labels = [];
        this.allLabels = [];
        this.titles = [];
        this.marginRight = this.marginLeft = this.autoMarginOffset = 0;
        this.timeOuts = [];
        var t = document.createElement("div"),
            n = t.style;
        n.overflow = "hidden";
        n.position = "relative";
        n.textAlign = "left";
        this.chartDiv = t;
        t = document.createElement("div");
        n = t.style;
        n.overflow = "hidden";
        n.position = "relative";
        n.textAlign = "left";
        this.legendDiv = t;
        this.balloon = new AmCharts.AmBalloon;
        this.balloon.chart = this;
        this.titleHeight = 0;
        this.prefixesOfBigNumbers = [{
            number: 1e3,
            prefix: "k"
        }, {
            number: 1e6,
            prefix: "M"
        }, {
            number: 1e9,
            prefix: "G"
        }, {
            number: 1e12,
            prefix: "T"
        }, {
            number: 1e15,
            prefix: "P"
        }, {
            number: 1e18,
            prefix: "E"
        }, {
            number: 1e21,
            prefix: "Z"
        }, {
            number: 1e24,
            prefix: "Y"
        }];
        this.prefixesOfSmallNumbers = [{
            number: 1e-24,
            prefix: "y"
        }, {
            number: 1e-21,
            prefix: "z"
        }, {
            number: 1e-18,
            prefix: "a"
        }, {
            number: 1e-15,
            prefix: "f"
        }, {
            number: 1e-12,
            prefix: "p"
        }, {
            number: 1e-9,
            prefix: "n"
        }, {
            number: 1e-6,
            prefix: "μ"
        }, {
            number: .001,
            prefix: "m"
        }];
        this.panEventsEnabled = !1;
        AmCharts.bezierX = 3;
        AmCharts.bezierY = 6;
        this.product = "amcharts"
    },
    drawChart: function() {
        this.drawBackground();
        this.redrawLabels();
        this.drawTitles()
    },
    drawBackground: function() {
        var t;
        AmCharts.remove(this.background);
        var i = this.container,
            n = this.backgroundColor,
            u = this.backgroundAlpha,
            f = this.set,
            r = this.updateWidth();
        this.realWidth = r;
        t = this.updateHeight();
        this.realHeight = t;
        9 > AmCharts.IEversion && 0 < AmCharts.IEversion && (u = .001);
        this.background = n = AmCharts.polygon(i, [0, r - 1, r - 1, 0], [0, 0, t - 1, t - 1], n, u, 1, this.borderColor, this.borderAlpha);
        f.push(n);
        (n = this.backgroundImage) && (this.path && (n = this.path + n), this.bgImg = i = i.image(n, 0, 0, r, t), f.push(i))
    },
    drawTitles: function() {
        var u = this.titles,
            f, r, t, e, i, n;
        if (AmCharts.ifArray(u))
            for (f = 20, r = 0; r < u.length; r++) t = u[r], n = t.color, void 0 === n && (n = this.color), e = t.size, isNaN(t.alpha), i = this.marginLeft, n = AmCharts.text(this.container, t.text, n, this.fontFamily, e), n.translate(i + (this.realWidth - this.marginRight - i) / 2, f), i = !0, void 0 !== t.bold && (i = t.bold), i && n.attr({
                "font-weight": "bold"
            }), f += e + 6, this.freeLabelsSet.push(n)
    },
    write: function(n) {
        var u = this.balloon,
            t, r;
        u && !u.chart && (u.chart = this);
        n = "object" != typeof n ? document.getElementById(n) : n;
        n.innerHTML = "";
        this.div = n;
        n.style.overflow = "hidden";
        n.style.textAlign = "left";
        var u = this.chartDiv,
            e = this.legendDiv,
            i = this.legend,
            f = e.style,
            o = u.style;
        if (this.measure(), i) switch (i.position) {
            case "bottom":
                n.appendChild(u);
                n.appendChild(e);
                break;
            case "top":
                n.appendChild(e);
                n.appendChild(u);
                break;
            case "absolute":
                t = document.createElement("div");
                r = t.style;
                r.position = "relative";
                r.width = n.style.width;
                r.height = n.style.height;
                n.appendChild(t);
                f.position = "absolute";
                o.position = "absolute";
                void 0 !== i.left && (f.left = i.left + "px");
                void 0 !== i.right && (f.right = i.right + "px");
                void 0 !== i.top && (f.top = i.top + "px");
                void 0 !== i.bottom && (f.bottom = i.bottom + "px");
                i.marginLeft = 0;
                i.marginRight = 0;
                t.appendChild(u);
                t.appendChild(e);
                break;
            case "right":
                t = document.createElement("div");
                r = t.style;
                r.position = "relative";
                r.width = n.style.width;
                r.height = n.style.height;
                n.appendChild(t);
                f.position = "relative";
                o.position = "absolute";
                t.appendChild(u);
                t.appendChild(e);
                break;
            case "left":
                t = document.createElement("div");
                r = t.style;
                r.position = "relative";
                r.width = n.style.width;
                r.height = n.style.height;
                n.appendChild(t);
                f.position = "absolute";
                o.position = "relative";
                t.appendChild(u);
                t.appendChild(e);
                break;
            case "outside":
                n.appendChild(u)
        } else n.appendChild(u);
        this.listenersAdded || (this.addListeners(), this.listenersAdded = !0);
        this.initChart()
    },
    createLabelsSet: function() {
        AmCharts.remove(this.labelsSet);
        this.labelsSet = this.container.set();
        this.freeLabelsSet.push(this.labelsSet)
    },
    initChart: function() {
        var n, t;
        this.divIsFixed = AmCharts.findIfFixed(this.chartDiv);
        this.previousHeight = this.divRealHeight;
        this.previousWidth = this.divRealWidth;
        this.destroy();
        n = 0;
        document.attachEvent && !window.opera && (n = 1);
        this.dmouseX = this.dmouseY = 0;
        t = document.getElementsByTagName("html")[0];
        t && window.getComputedStyle && (t = window.getComputedStyle(t, null)) && (this.dmouseY = AmCharts.removePx(t.getPropertyValue("margin-top")), this.dmouseX = AmCharts.removePx(t.getPropertyValue("margin-left")));
        this.mouseMode = n;
        this.container = new AmCharts.AmDraw(this.chartDiv, this.realWidth, this.realHeight);
        (AmCharts.VML || AmCharts.SVG) && (n = this.container, this.set = n.set(), this.gridSet = n.set(), this.graphsBehindSet = n.set(), this.bulletBehindSet = n.set(), this.columnSet = n.set(), this.graphsSet = n.set(), this.trendLinesSet = n.set(), this.axesLabelsSet = n.set(), this.axesSet = n.set(), this.cursorSet = n.set(), this.scrollbarsSet = n.set(), this.bulletSet = n.set(), this.freeLabelsSet = n.set(), this.balloonsSet = n.set(), this.balloonsSet.setAttr("id", "balloons"), this.zoomButtonSet = n.set(), this.linkSet = n.set(), this.drb(), this.renderFix())
    },
    measure: function() {
        var n = this.div,
            u = this.chartDiv,
            i = n.offsetWidth,
            r = n.offsetHeight,
            f = this.container;
        n.clientHeight && (i = n.clientWidth, r = n.clientHeight);
        var t = AmCharts.removePx(AmCharts.getStyle(n, "padding-left")),
            e = AmCharts.removePx(AmCharts.getStyle(n, "padding-right")),
            o = AmCharts.removePx(AmCharts.getStyle(n, "padding-top")),
            s = AmCharts.removePx(AmCharts.getStyle(n, "padding-bottom"));
        isNaN(t) || (i -= t);
        isNaN(e) || (i -= e);
        isNaN(o) || (r -= o);
        isNaN(s) || (r -= s);
        t = n.style;
        n = t.width;
        t = t.height; - 1 != n.indexOf("px") && (i = AmCharts.removePx(n)); - 1 != t.indexOf("px") && (r = AmCharts.removePx(t));
        n = AmCharts.toCoordinate(this.width, i);
        t = AmCharts.toCoordinate(this.height, r);
        (n != this.previousWidth || t != this.previousHeight) && (u.style.width = n + "px", u.style.height = t + "px", f && f.setSize(n, t), this.balloon.setBounds(2, 2, n - 2, t));
        this.realWidth = n;
        this.realHeight = t;
        this.divRealWidth = i;
        this.divRealHeight = r
    },
    destroy: function() {
        this.chartDiv.innerHTML = "";
        this.clearTimeOuts()
    },
    clearTimeOuts: function() {
        var t = this.timeOuts,
            n;
        if (t)
            for (n = 0; n < t.length; n++) clearTimeout(t[n]);
        this.timeOuts = []
    },
    clear: function(n) {
        AmCharts.callMethod("clear", [this.chartScrollbar, this.scrollbarV, this.scrollbarH, this.chartCursor]);
        this.chartCursor = this.scrollbarH = this.scrollbarV = this.chartScrollbar = null;
        this.clearTimeOuts();
        this.container && (this.container.remove(this.chartDiv), this.container.remove(this.legendDiv));
        n || AmCharts.removeChart(this)
    },
    setMouseCursor: function(n) {
        "auto" == n && AmCharts.isNN && (n = "default");
        this.chartDiv.style.cursor = n;
        this.legendDiv.style.cursor = n
    },
    redrawLabels: function() {
        var t, n;
        for (this.labels = [], t = this.allLabels, this.createLabelsSet(), n = 0; n < t.length; n++) this.drawLabel(t[n])
    },
    drawLabel: function(n) {
        if (this.container) {
            var i = n.y,
                r = n.text,
                t = n.align,
                e = n.size,
                o = n.color,
                u = n.rotation,
                s = n.alpha,
                h = n.bold,
                f = AmCharts.toCoordinate(n.x, this.realWidth),
                i = AmCharts.toCoordinate(i, this.realHeight);
            f || (f = 0);
            i || (i = 0);
            void 0 === o && (o = this.color);
            isNaN(e) && (e = this.fontSize);
            t || (t = "start");
            "left" == t && (t = "start");
            "right" == t && (t = "end");
            "center" == t && (t = "middle", u ? i = this.realHeight - i + i / 2 : f = this.realWidth / 2 - f);
            void 0 === s && (s = 1);
            void 0 === u && (u = 0);
            i += e / 2;
            r = AmCharts.text(this.container, r, o, this.fontFamily, e, t, h, s);
            r.translate(f, i);
            0 !== u && r.rotate(u);
            n.url && (r.setAttr("cursor", "pointer"), r.click(function() {
                AmCharts.getURL(n.url)
            }));
            this.labelsSet.push(r);
            this.labels.push(r)
        }
    },
    addLabel: function(n, t, i, r, u, f, e, o, s, h) {
        n = {
            x: n,
            y: t,
            text: i,
            align: r,
            size: u,
            color: f,
            alpha: o,
            rotation: e,
            bold: s,
            url: h
        };
        this.container && this.drawLabel(n);
        this.allLabels.push(n)
    },
    clearLabels: function() {
        for (var t = this.labels, n = t.length - 1; 0 <= n; n--) t[n].remove();
        this.labels = [];
        this.allLabels = []
    },
    updateHeight: function() {
        var n = this.divRealHeight,
            t = this.legend,
            i;
        return t && (i = this.legendDiv.offsetHeight, t = t.position, ("top" == t || "bottom" == t) && (n -= i, 0 > n && (n = 0), this.chartDiv.style.height = n + "px")), n
    },
    updateWidth: function() {
        var n = this.divRealWidth,
            f = this.divRealHeight,
            t = this.legend;
        if (t) {
            var i = this.legendDiv,
                r = i.offsetWidth,
                e = i.offsetHeight,
                i = i.style,
                u = this.chartDiv.style,
                t = t.position;
            ("right" == t || "left" == t) && (n -= r, 0 > n && (n = 0), u.width = n + "px", "left" == t ? u.left = r + "px" : i.left = n + "px", i.top = (f - e) / 2 + "px")
        }
        return n
    },
    getTitleHeight: function() {
        var t = 0,
            i = this.titles,
            n;
        if (0 < i.length)
            for (t = 15, n = 0; n < i.length; n++) t += i[n].size + 6;
        return t
    },
    addTitle: function(n, t, i, r, u) {
        return isNaN(t) && (t = this.fontSize + 2), n = {
            text: n,
            size: t,
            color: i,
            alpha: r,
            bold: u
        }, this.titles.push(n), n
    },
    addListeners: function() {
        var n = this,
            t = n.chartDiv;
        AmCharts.isNN && (n.panEventsEnabled && "ontouchstart" in document.documentElement && (t.addEventListener("touchstart", function(t) {
            n.handleTouchMove.call(n, t);
            n.handleTouchStart.call(n, t)
        }, !0), t.addEventListener("touchmove", function(t) {
            n.handleTouchMove.call(n, t)
        }, !0), t.addEventListener("touchend", function(t) {
            n.handleTouchEnd.call(n, t)
        }, !0)), t.addEventListener("mousedown", function(t) {
            n.handleMouseDown.call(n, t)
        }, !0), t.addEventListener("mouseover", function(t) {
            n.handleMouseOver.call(n, t)
        }, !0), t.addEventListener("mouseout", function(t) {
            n.handleMouseOut.call(n, t)
        }, !0));
        AmCharts.isIE && (t.attachEvent("onmousedown", function(t) {
            n.handleMouseDown.call(n, t)
        }), t.attachEvent("onmouseover", function(t) {
            n.handleMouseOver.call(n, t)
        }), t.attachEvent("onmouseout", function(t) {
            n.handleMouseOut.call(n, t)
        }))
    },
    dispDUpd: function() {
        var n;
        this.dispatchDataUpdated && (this.dispatchDataUpdated = !1, n = "dataUpdated", this.fire(n, {
            type: n,
            chart: this
        }));
        this.chartCreated || (n = "init", this.fire(n, {
            type: n,
            chart: this
        }));
        this.chartRendered || (n = "rendered", this.fire(n, {
            type: n,
            chart: this
        }), this.chartRendered = !0);
        n = "drawn";
        this.fire(n, {
            type: n,
            chart: this
        })
    },
    drb: function() {
        var t = this.product,
            u = t + ".com",
            i = window.location.hostname.split("."),
            n;
        if (2 <= i.length && (n = i[i.length - 2] + "." + i[i.length - 1]), AmCharts.remove(this.bbset), n != u) {
            var u = u + "/?utm_source=swf&utm_medium=demo&utm_campaign=jsDemo" + t,
                r = "chart by ",
                i = 145;
            for ("ammap" == t && (r = "tool by ", i = 125), n = AmCharts.rect(this.container, i, 20, "#FFFFFF", 1), r = AmCharts.text(this.container, r + t + ".com", "#000000", "Verdana", 11, "start"), r.translate(7, 9), n = this.container.set([n, r]), "ammap" == t && n.translate(this.realWidth - i, 0), this.bbset = n, this.linkSet.push(n), n.setAttr("cursor", "pointer"), n.click(function() {
                    window.location.href = "http://" + u
                }), t = 0; t < n.length; t++) n[t].attr({
                cursor: "pointer"
            })
        }
    },
    validateSize: function() {
        var n = this,
            i, t;
        n.measure();
        i = n.legend;
        (n.realWidth != n.previousWidth || n.realHeight != n.previousHeight) && 0 < n.realWidth && 0 < n.realHeight && (n.sizeChanged = !0, i && (clearTimeout(n.legendInitTO), t = setTimeout(function() {
            i.invalidateSize()
        }, 100), n.timeOuts.push(t), n.legendInitTO = t), n.marginsUpdated = "xy" != n.chartType ? !1 : !0, clearTimeout(n.initTO), t = setTimeout(function() {
            n.initChart()
        }, 150), n.timeOuts.push(t), n.initTO = t);
        n.renderFix();
        i && i.renderFix()
    },
    invalidateSize: function() {
        this.previousHeight = this.previousWidth = NaN;
        this.invalidateSizeReal()
    },
    invalidateSizeReal: function() {
        var n = this,
            t;
        n.marginsUpdated = !1;
        clearTimeout(n.validateTO);
        t = setTimeout(function() {
            n.validateSize()
        }, 5);
        n.timeOuts.push(t);
        n.validateTO = t
    },
    validateData: function(n) {
        this.chartCreated && (this.dataChanged = !0, this.marginsUpdated = "xy" != this.chartType ? !1 : !0, this.initChart(n))
    },
    validateNow: function() {
        this.listenersAdded = !1;
        this.write(this.div)
    },
    showItem: function(n) {
        n.hidden = !1;
        this.initChart()
    },
    hideItem: function(n) {
        n.hidden = !0;
        this.initChart()
    },
    hideBalloon: function() {
        var n = this;
        n.hoverInt = setTimeout(function() {
            n.hideBalloonReal.call(n)
        }, 80)
    },
    cleanChart: function() {},
    hideBalloonReal: function() {
        var n = this.balloon;
        n && n.hide()
    },
    showBalloon: function(n, t, i, r, u) {
        var f = this;
        clearTimeout(f.balloonTO);
        f.balloonTO = setTimeout(function() {
            f.showBalloonReal.call(f, n, t, i, r, u)
        }, 1)
    },
    showBalloonReal: function(n, t, i, r, u) {
        this.handleMouseMove();
        var f = this.balloon;
        f.enabled && (f.followCursor(!1), f.changeColor(t), i || f.setPosition(r, u), f.followCursor(i), n && f.showBalloon(n))
    },
    handleTouchMove: function(n) {
        this.hideBalloon();
        var t = this.chartDiv;
        n.touches && (n = n.touches.item(0), this.mouseX = n.pageX - AmCharts.findPosX(t), this.mouseY = n.pageY - AmCharts.findPosY(t))
    },
    handleMouseOver: function() {
        AmCharts.resetMouseOver();
        this.mouseIsOver = !0
    },
    handleMouseOut: function() {
        AmCharts.resetMouseOver();
        this.mouseIsOver = !1
    },
    handleMouseMove: function(n) {
        var i, r, t, u, f;
        if (this.mouseIsOver && (t = this.chartDiv, n || (n = window.event), n)) {
            this.posX = AmCharts.findPosX(t);
            this.posY = AmCharts.findPosY(t);
            switch (this.mouseMode) {
                case 1:
                    i = n.clientX - this.posX;
                    r = n.clientY - this.posY;
                    this.divIsFixed || (t = document.body, t && (u = t.scrollLeft, y1 = t.scrollTop), (t = document.documentElement) && (f = t.scrollLeft, y2 = t.scrollTop), u = Math.max(u, f), f = Math.max(y1, y2), i += u, r += f);
                    break;
                case 0:
                    this.divIsFixed ? (i = n.clientX - this.posX, r = n.clientY - this.posY) : (i = n.pageX - this.posX, r = n.pageY - this.posY)
            }
            n.touches && (n = n.touches.item(0), i = n.pageX - this.posX, r = n.pageY - this.posY);
            this.mouseX = i - this.dmouseX;
            this.mouseY = r - this.dmouseY
        }
    },
    handleTouchStart: function(n) {
        this.handleMouseDown(n)
    },
    handleTouchEnd: function(n) {
        AmCharts.resetMouseOver();
        this.handleReleaseOutside(n)
    },
    handleReleaseOutside: function() {},
    handleMouseDown: function(n) {
        AmCharts.resetMouseOver();
        this.mouseIsOver = !0;
        n && n.preventDefault && n.preventDefault()
    },
    addLegend: function(n, t) {
        AmCharts.extend(n, new AmCharts.AmLegend);
        var i;
        i = "object" != typeof t ? document.getElementById(t) : t;
        this.legend = n;
        n.chart = this;
        i ? (n.div = i, n.position = "outside", n.autoMargins = !1) : n.div = this.legendDiv;
        i = this.handleLegendEvent;
        this.listenTo(n, "showItem", i);
        this.listenTo(n, "hideItem", i);
        this.listenTo(n, "clickMarker", i);
        this.listenTo(n, "rollOverItem", i);
        this.listenTo(n, "rollOutItem", i);
        this.listenTo(n, "rollOverMarker", i);
        this.listenTo(n, "rollOutMarker", i);
        this.listenTo(n, "clickLabel", i)
    },
    removeLegend: function() {
        this.legend = void 0;
        this.legendDiv.innerHTML = ""
    },
    handleResize: function() {
        (AmCharts.isPercents(this.width) || AmCharts.isPercents(this.height)) && this.invalidateSizeReal();
        this.renderFix()
    },
    renderFix: function() {
        if (!AmCharts.VML) {
            var n = this.container;
            n && n.renderFix()
        }
    },
    getSVG: function() {
        if (AmCharts.hasSVG) return this.container
    }
});
AmCharts.Slice = AmCharts.Class({
    construct: function() {}
});
AmCharts.SerialDataItem = AmCharts.Class({
    construct: function() {}
});
AmCharts.GraphDataItem = AmCharts.Class({
    construct: function() {}
});
AmCharts.Guide = AmCharts.Class({
    construct: function() {}
});
AmCharts.toBoolean = function(n, t) {
    if (void 0 === n) return t;
    switch (String(n).toLowerCase()) {
        case "true":
        case "yes":
        case "1":
            return !0;
        case "false":
        case "no":
        case "0":
        case null:
            return !1;
        default:
            return Boolean(n)
    }
};
AmCharts.removeFromArray = function(n, t) {
    for (var i = n.length - 1; 0 <= i; i--) n[i] == t && n.splice(i, 1)
};
AmCharts.getStyle = function(n, t) {
    var i = "";
    return document.defaultView && document.defaultView.getComputedStyle ? i = document.defaultView.getComputedStyle(n, "").getPropertyValue(t) : n.currentStyle && (t = t.replace(/\-(\w)/g, function(n, t) {
        return t.toUpperCase()
    }), i = n.currentStyle[t]), i
};
AmCharts.removePx = function(n) {
    return Number(n.substring(0, n.length - 2))
};
AmCharts.getURL = function(n, t) {
    if (n)
        if ("_self" != t && t)
            if ("_top" == t && window.top) window.top.location.href = n;
            else if ("_parent" == t && window.parent) window.parent.location.href = n;
    else {
        var i = document.getElementsByName(t)[0];
        i ? i.src = n : window.open(n)
    } else window.location.href = n
};
AmCharts.formatMilliseconds = function(n, t) {
    if (-1 != n.indexOf("fff")) {
        var i = t.getMilliseconds(),
            r = String(i);
        10 > i && (r = "00" + i);
        10 <= i && 100 > i && (r = "0" + i);
        n = n.replace(/fff/g, r)
    }
    return n
};
AmCharts.ifArray = function(n) {
    return n && 0 < n.length ? !0 : !1
};
AmCharts.callMethod = function(n, t) {
    for (var i, e, u, f, r = 0; r < t.length; r++)
        if (i = t[r], i && (i[n] && i[n](), e = i.length, 0 < e))
            for (u = 0; u < e; u++) f = i[u], f && f[n] && f[n]()
};
AmCharts.toNumber = function(n) {
    return "number" == typeof n ? n : Number(String(n).replace(/[^0-9\-.]+/g, ""))
};
AmCharts.toColor = function(n) {
    var t, i;
    if ("" !== n && void 0 !== n)
        if (-1 != n.indexOf(","))
            for (n = n.split(","), t = 0; t < n.length; t++) i = n[t].substring(n[t].length - 6, n[t].length), n[t] = "#" + i;
        else n = n.substring(n.length - 6, n.length), n = "#" + n;
    return n
};
AmCharts.toCoordinate = function(n, t, i) {
    var r;
    return void 0 !== n && (n = String(n), i && i < t && (t = i), r = Number(n), -1 != n.indexOf("!") && (r = t - Number(n.substr(1))), -1 != n.indexOf("%") && (r = t * Number(n.substr(0, n.length - 1)) / 100)), r
};
AmCharts.fitToBounds = function(n, t, i) {
    return n < t && (n = t), n > i && (n = i), n
};
AmCharts.isDefined = function(n) {
    return void 0 === n ? !1 : !0
};
AmCharts.stripNumbers = function(n) {
    return n.replace(/[0-9]+/g, "")
};
AmCharts.extractPeriod = function(n) {
    var t = AmCharts.stripNumbers(n),
        i = 1;
    return t != n && (i = Number(n.slice(0, n.indexOf(t)))), {
        period: t,
        count: i
    }
};
AmCharts.resetDateToMin = function(n, t, i, r) {
    void 0 === r && (r = 1);
    var c, h, s, o, e, f, u;
    AmCharts.useUTC ? (c = n.getUTCFullYear(), h = n.getUTCMonth(), s = n.getUTCDate(), o = n.getUTCHours(), e = n.getUTCMinutes(), f = n.getUTCSeconds(), u = n.getUTCMilliseconds(), n = n.getUTCDay()) : (c = n.getFullYear(), h = n.getMonth(), s = n.getDate(), o = n.getHours(), e = n.getMinutes(), f = n.getSeconds(), u = n.getMilliseconds(), n = n.getDay());
    switch (t) {
        case "YYYY":
            c = Math.floor(c / i) * i;
            h = 0;
            s = 1;
            u = f = e = o = 0;
            break;
        case "MM":
            h = Math.floor(h / i) * i;
            s = 1;
            u = f = e = o = 0;
            break;
        case "WW":
            0 === n && 0 < r && (n = 7);
            s = s - n + r;
            u = f = e = o = 0;
            break;
        case "DD":
            u = f = e = o = 0;
            break;
        case "hh":
            o = Math.floor(o / i) * i;
            u = f = e = 0;
            break;
        case "mm":
            e = Math.floor(e / i) * i;
            u = f = 0;
            break;
        case "ss":
            f = Math.floor(f / i) * i;
            u = 0;
            break;
        case "fff":
            u = Math.floor(u / i) * i
    }
    return AmCharts.useUTC ? (n = new Date, n.setUTCFullYear(c, h, s), n.setUTCHours(o, e, f, u)) : n = new Date(c, h, s, o, e, f, u), n
};
AmCharts.getPeriodDuration = function(n, t) {
    void 0 === t && (t = 1);
    var i;
    switch (n) {
        case "YYYY":
            i = 316224e5;
            break;
        case "MM":
            i = 26784e5;
            break;
        case "WW":
            i = 6048e5;
            break;
        case "DD":
            i = 864e5;
            break;
        case "hh":
            i = 36e5;
            break;
        case "mm":
            i = 6e4;
            break;
        case "ss":
            i = 1e3;
            break;
        case "fff":
            i = 1
    }
    return i * t
};
AmCharts.roundTo = function(n, t) {
    if (0 > t) return n;
    var i = Math.pow(10, t);
    return Math.round(n * i) / i
};
AmCharts.toFixed = function(n, t) {
    var i = String(Math.round(n * Math.pow(10, t))),
        r, u;
    if (0 < t) {
        if (r = i.length, r < t)
            for (u = 0; u < t - r; u++) i = "0" + i;
        return r = i.substring(0, i.length - t), "" === r && (r = 0), r + "." + i.substring(i.length - t, i.length)
    }
    return String(i)
};
AmCharts.intervals = {
    s: {
        nextInterval: "ss",
        contains: 1e3
    },
    ss: {
        nextInterval: "mm",
        contains: 60,
        count: 0
    },
    mm: {
        nextInterval: "hh",
        contains: 60,
        count: 1
    },
    hh: {
        nextInterval: "DD",
        contains: 24,
        count: 2
    },
    DD: {
        nextInterval: "",
        contains: Infinity,
        count: 3
    }
};
AmCharts.getMaxInterval = function(n, t) {
    var i = AmCharts.intervals;
    return n >= i[t].contains ? (n = Math.round(n / i[t].contains), t = i[t].nextInterval, AmCharts.getMaxInterval(n, t)) : "ss" == t ? i[t].nextInterval : t
};
AmCharts.formatDuration = function(n, t, i, r, u, f) {
    var e = AmCharts.intervals,
        s = f.decimalSeparator,
        o;
    if (n >= e[t].contains) return o = n - Math.floor(n / e[t].contains) * e[t].contains, "ss" == t && (o = AmCharts.formatNumber(o, f), 1 == o.split(s)[0].length && (o = "0" + o)), ("mm" == t || "hh" == t) && 10 > o && (o = "0" + o), i = o + "" + r[t] + "" + i, n = Math.floor(n / e[t].contains), t = e[t].nextInterval, AmCharts.formatDuration(n, t, i, r, u, f);
    if ("ss" == t && (n = AmCharts.formatNumber(n, f), 1 == n.split(s)[0].length && (n = "0" + n)), ("mm" == t || "hh" == t) && 10 > n && (n = "0" + n), i = n + "" + r[t] + "" + i, e[u].count > e[t].count)
        for (n = e[t].count; n < e[u].count; n++) t = e[t].nextInterval, "ss" == t || "mm" == t || "hh" == t ? i = "00" + r[t] + "" + i : "DD" == t && (i = "0" + r[t] + "" + i);
    return ":" == i.charAt(i.length - 1) && (i = i.substring(0, i.length - 1)), i
};
AmCharts.formatNumber = function(n, t, i, r, u) {
    var h, c, f, s, o, e;
    if (n = AmCharts.roundTo(n, t.precision), isNaN(i) && (i = t.precision), h = t.decimalSeparator, t = t.thousandsSeparator, c = 0 > n ? "-" : "", n = Math.abs(n), s = String(n), o = !1, -1 != s.indexOf("e") && (o = !0), 0 <= i && !o && (s = AmCharts.toFixed(n, i)), f = "", o) f = s;
    else {
        for (s = s.split("."), o = String(s[0]), e = o.length; 0 <= e; e -= 3) f = e != o.length ? 0 !== e ? o.substring(e - 3, e) + t + f : o.substring(e - 3, e) + f : o.substring(e - 3, e);
        void 0 !== s[1] && (f = f + h + s[1]);
        void 0 !== i && 0 < i && "0" != f && (f = AmCharts.addZeroes(f, h, i))
    }
    return f = c + f, "" === c && !0 === r && 0 !== n && (f = "+" + f), !0 === u && (f += "%"), f
};
AmCharts.addZeroes = function(n, t, i) {
    return n = n.split(t), void 0 === n[1] && 0 < i && (n[1] = "0"), n[1].length < i ? (n[1] += "0", AmCharts.addZeroes(n[0] + t + n[1], t, i)) : void 0 !== n[1] ? n[0] + t + n[1] : n[0]
};
AmCharts.scientificToNormal = function(n) {
    var t, i, r;
    if (n = String(n).split("e"), "-" == n[1].substr(0, 1)) {
        for (t = "0.", i = 0; i < Math.abs(Number(n[1])) - 1; i++) t += "0";
        t += n[0].split(".").join("")
    } else
        for (r = 0, t = n[0].split("."), t[1] && (r = t[1].length), t = n[0].split(".").join(""), i = 0; i < Math.abs(Number(n[1])) - r; i++) t += "0";
    return t
};
AmCharts.toScientific = function(n, t) {
    if (0 === n) return "0";
    var i = Math.floor(Math.log(Math.abs(n)) * Math.LOG10E);
    return Math.pow(10, i), mantissa = String(mantissa).split(".").join(t), String(mantissa) + "e" + i
};
AmCharts.randomColor = function() {
    return "#" + ("00000" + (16777216 * Math.random() << 0).toString(16)).substr(-6)
};
AmCharts.hitTest = function(n, t, i) {
    var r = !1,
        f = n.x,
        e = n.x + n.width,
        o = n.y,
        s = n.y + n.height,
        u = AmCharts.isInRectangle;
    return r || (r = u(f, o, t)), r || (r = u(f, s, t)), r || (r = u(e, o, t)), r || (r = u(e, s, t)), r || !0 === i || (r = AmCharts.hitTest(t, n, !0)), r
};
AmCharts.isInRectangle = function(n, t, i) {
    return n >= i.x - 5 && n <= i.x + i.width + 5 && t >= i.y - 5 && t <= i.y + i.height + 5 ? !0 : !1
};
AmCharts.isPercents = function(n) {
    if (-1 != String(n).indexOf("%")) return !0
};
AmCharts.dayNames = "Sunday Monday Tuesday Wednesday Thursday Friday Saturday".split(" ");
AmCharts.shortDayNames = "Sun Mon Tue Wed Thu Fri Sat".split(" ");
AmCharts.monthNames = "January February March April May June July August September October November December".split(" ");
AmCharts.shortMonthNames = "Jan Feb Mar Apr May Jun Jul Aug Sep Oct Nov Dec".split(" ");
AmCharts.getWeekNumber = function(n) {
    n = new Date(n);
    n.setHours(0, 0, 0);
    n.setDate(n.getDate() + 4 - (n.getDay() || 7));
    var t = new Date(n.getFullYear(), 0, 1);
    return Math.ceil(((n - t) / 864e5 + 1) / 7)
};
AmCharts.formatDate = function(n, t) {
    var l, e, s, h, o, u, f, c, i = AmCharts.getWeekNumber(n),
        y, a, v, p, r;
    return AmCharts.useUTC ? (l = n.getUTCFullYear(), e = n.getUTCMonth(), s = n.getUTCDate(), h = n.getUTCDay(), o = n.getUTCHours(), u = n.getUTCMinutes(), f = n.getUTCSeconds(), c = n.getUTCMilliseconds()) : (l = n.getFullYear(), e = n.getMonth(), s = n.getDate(), h = n.getDay(), o = n.getHours(), u = n.getMinutes(), f = n.getSeconds(), c = n.getMilliseconds()), y = String(l).substr(2, 2), a = e + 1, 9 > e && (a = "0" + a), v = s, 10 > s && (v = "0" + s), p = "0" + h, t = t.replace(/W/g, i), i = o, 24 == i && (i = 0), r = i, 10 > r && (r = "0" + r), t = t.replace(/JJ/g, r), t = t.replace(/J/g, i), i = o, 0 === i && (i = 24), r = i, 10 > r && (r = "0" + r), t = t.replace(/HH/g, r), t = t.replace(/H/g, i), i = o, 11 < i && (i -= 12), r = i, 10 > r && (r = "0" + r), t = t.replace(/KK/g, r), t = t.replace(/K/g, i), i = o, 0 === i && (i = 12), 12 < i && (i -= 12), r = i, 10 > r && (r = "0" + r), t = t.replace(/LL/g, r), t = t.replace(/L/g, i), i = u, 10 > i && (i = "0" + i), t = t.replace(/NN/g, i), t = t.replace(/N/g, u), u = f, 10 > u && (u = "0" + u), t = t.replace(/SS/g, u), t = t.replace(/S/g, f), f = c, 10 > f && (f = "00" + f), 100 > f && (f = "0" + f), u = c, 10 > u && (u = "00" + u), t = t.replace(/QQQ/g, f), t = t.replace(/QQ/g, u), t = t.replace(/Q/g, c), t = 12 > o ? t.replace(/A/g, "am") : t.replace(/A/g, "pm"), t = t.replace(/YYYY/g, "@IIII@"), t = t.replace(/YY/g, "@II@"), t = t.replace(/MMMM/g, "@XXXX@"), t = t.replace(/MMM/g, "@XXX@"), t = t.replace(/MM/g, "@XX@"), t = t.replace(/M/g, "@X@"), t = t.replace(/DD/g, "@RR@"), t = t.replace(/D/g, "@R@"), t = t.replace(/EEEE/g, "@PPPP@"), t = t.replace(/EEE/g, "@PPP@"), t = t.replace(/EE/g, "@PP@"), t = t.replace(/E/g, "@P@"), t = t.replace(/@IIII@/g, l), t = t.replace(/@II@/g, y), t = t.replace(/@XXXX@/g, AmCharts.monthNames[e]), t = t.replace(/@XXX@/g, AmCharts.shortMonthNames[e]), t = t.replace(/@XX@/g, a), t = t.replace(/@X@/g, e + 1), t = t.replace(/@RR@/g, v), t = t.replace(/@R@/g, s), t = t.replace(/@PPPP@/g, AmCharts.dayNames[h]), t = t.replace(/@PPP@/g, AmCharts.shortDayNames[h]), t = t.replace(/@PP@/g, p), t.replace(/@P@/g, h)
};
AmCharts.findPosX = function(n) {
    var t = n,
        i = n.offsetLeft;
    if (n.offsetParent) {
        for (; n = n.offsetParent;) i += n.offsetLeft;
        for (;
            (t = t.parentNode) && t != document.body;) i -= t.scrollLeft || 0
    }
    return i
};
AmCharts.findPosY = function(n) {
    var t = n,
        i = n.offsetTop;
    if (n.offsetParent) {
        for (; n = n.offsetParent;) i += n.offsetTop;
        for (;
            (t = t.parentNode) && t != document.body;) i -= t.scrollTop || 0
    }
    return i
};
AmCharts.findIfFixed = function(n) {
    if (n.offsetParent)
        for (; n = n.offsetParent;)
            if ("fixed" == AmCharts.getStyle(n, "position")) return !0;
    return !1
};
AmCharts.findIfAuto = function(n) {
    return n.style && "auto" == AmCharts.getStyle(n, "overflow") ? !0 : n.parentNode ? AmCharts.findIfAuto(n.parentNode) : !1
};
AmCharts.findScrollLeft = function(n, t) {
    return n.scrollLeft && (t += n.scrollLeft), n.parentNode ? AmCharts.findScrollLeft(n.parentNode, t) : t
};
AmCharts.findScrollTop = function(n, t) {
    return n.scrollTop && (t += n.scrollTop), n.parentNode ? AmCharts.findScrollTop(n.parentNode, t) : t
};
AmCharts.formatValue = function(n, t, i, r, u, f, e, o) {
    var h, c, s;
    if (t)
        for (void 0 === u && (u = ""), h = 0; h < i.length; h++) c = i[h], s = t[c], void 0 !== s && (s = f ? AmCharts.addPrefix(s, o, e, r) : AmCharts.formatNumber(s, r), n = n.replace(RegExp("\\[\\[" + u + "" + c + "\\]\\]", "g"), s));
    return n
};
AmCharts.formatDataContextValue = function(n, t) {
    var u, r, i;
    if (n)
        for (u = n.match(/\[\[.*?\]\]/g), r = 0; r < u.length; r++) i = u[r], i = i.substr(2, i.length - 4), void 0 !== t[i] && (n = n.replace(RegExp("\\[\\[" + i + "\\]\\]", "g"), t[i]));
    return n
};
AmCharts.massReplace = function(n, t) {
    var i, r;
    for (i in t) t.hasOwnProperty(i) && (r = t[i], void 0 === r && (r = ""), n = n.replace(i, r));
    return n
};
AmCharts.cleanFromEmpty = function(n) {
    return n.replace(/\[\[[^\]]*\]\]/g, "")
};
AmCharts.addPrefix = function(n, t, i, r, u) {
    var s = AmCharts.formatNumber(n, r),
        h = "",
        f, e, o;
    if (0 === n) return "0";
    if (0 > n && (h = "-"), n = Math.abs(n), 1 < n) {
        for (f = t.length - 1; - 1 < f; f--)
            if (n >= t[f].number && (e = n / t[f].number, o = Number(r.precision), 1 > o && (o = 1), i = AmCharts.roundTo(e, o), o = AmCharts.formatNumber(i, {
                    precision: -1,
                    decimalSeparator: r.decimalSeparator,
                    thousandsSeparator: r.thousandsSeparator
                }), !u || e == i)) {
                s = h + "" + o + "" + t[f].prefix;
                break
            }
    } else
        for (f = 0; f < i.length; f++)
            if (n <= i[f].number) {
                e = n / i[f].number;
                o = Math.abs(Math.round(Math.log(e) * Math.LOG10E));
                e = AmCharts.roundTo(e, o);
                s = h + "" + e + "" + i[f].prefix;
                break
            } return s
};
AmCharts.remove = function(n) {
    n && n.remove()
};
AmCharts.copyProperties = function(n, t) {
    for (var i in n) n.hasOwnProperty(i) && "events" != i && void 0 !== n[i] && "function" != typeof n[i] && (t[i] = n[i])
};
AmCharts.recommended = function() {
    var n = "js";
    return document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#BasicStructure", "1.1") || swfobject && swfobject.hasFlashPlayerVersion("8") && (n = "flash"), n
};
AmCharts.getEffect = function(n) {
    return ">" == n && (n = "easeOutSine"), "<" == n && (n = "easeInSine"), "elastic" == n && (n = "easeOutElastic"), n
};
AmCharts.extend = function(n, t) {
    for (var i in t) void 0 !== t[i] && (n.hasOwnProperty(i) || (n[i] = t[i]))
};
AmCharts.fixNewLines = function(n) {
    if (9 > AmCharts.IEversion && 0 < AmCharts.IEversion) {
        var t = RegExp("\\n", "g");
        n && (n = n.replace(t, "<br />"))
    }
    return n
};
AmCharts.deleteObject = function(n, t) {
    if (n && ((void 0 === t || null === t) && (t = 20), 0 !== t))
        if ("[object Array]" === Object.prototype.toString.call(n))
            for (var i = 0; i < n.length; i++) AmCharts.deleteObject(n[i], t - 1), n[i] = null;
        else try {
            for (i in n) n[i] && ("object" == typeof n[i] && AmCharts.deleteObject(n[i], t - 1), "function" != typeof n[i] && (n[i] = null))
        } catch (r) {}
};
AmCharts.changeDate = function(n, t, i, r, u) {
    var f = -1;
    void 0 === r && (r = !0);
    void 0 === u && (u = !1);
    !0 === r && (f = 1);
    switch (t) {
        case "YYYY":
            n.setFullYear(n.getFullYear() + i * f);
            r || u || n.setDate(n.getDate() + 1);
            break;
        case "MM":
            n.setMonth(n.getMonth() + i * f);
            r || u || n.setDate(n.getDate() + 1);
            break;
        case "DD":
            n.setDate(n.getDate() + i * f);
            break;
        case "WW":
            n.setDate(n.getDate() + 7 * i * f + 1);
            break;
        case "hh":
            n.setHours(n.getHours() + i * f);
            break;
        case "mm":
            n.setMinutes(n.getMinutes() + i * f);
            break;
        case "ss":
            n.setSeconds(n.getSeconds() + i * f);
            break;
        case "fff":
            n.setMilliseconds(n.getMilliseconds() + i * f)
    }
    return n
};
AmCharts.Bezier = AmCharts.Class({
    construct: function(n, t, i, r, u, f, e, o, s, h) {
        for ("object" == typeof e && (e = e[0]), "object" == typeof o && (o = o[0]), f = {
                fill: e,
                "fill-opacity": o,
                "stroke-width": f
            }, void 0 !== s && 0 < s && (f["stroke-dasharray"] = s), isNaN(u) || (f["stroke-opacity"] = u), r && (f.stroke = r), r = "M" + Math.round(t[0]) + "," + Math.round(i[0]), u = [], s = 0; s < t.length; s++) u.push({
            x: Number(t[s]),
            y: Number(i[s])
        });
        1 < u.length && (t = this.interpolate(u), r += this.drawBeziers(t));
        h ? r += h : AmCharts.VML || (r += "M0,0 L0,0");
        this.path = n.path(r).attr(f)
    },
    interpolate: function(n) {
        var t = [],
            u;
        t.push({
            x: n[0].x,
            y: n[0].y
        });
        var e = n[1].x - n[0].x,
            r = n[1].y - n[0].y,
            o = AmCharts.bezierX,
            s = AmCharts.bezierY;
        for (t.push({
                x: n[0].x + e / o,
                y: n[0].y + r / s
            }), u = 1; u < n.length - 1; u++) {
            var f = n[u - 1],
                i = n[u],
                r = n[u + 1],
                e = r.x - i.x,
                r = r.y - f.y,
                f = i.x - f.x;
            f > e && (f = e);
            t.push({
                x: i.x - f / o,
                y: i.y - r / s
            });
            t.push({
                x: i.x,
                y: i.y
            });
            t.push({
                x: i.x + f / o,
                y: i.y + r / s
            })
        }
        return r = n[n.length - 1].y - n[n.length - 2].y, e = n[n.length - 1].x - n[n.length - 2].x, t.push({
            x: n[n.length - 1].x - e / o,
            y: n[n.length - 1].y - r / s
        }), t.push({
            x: n[n.length - 1].x,
            y: n[n.length - 1].y
        }), t
    },
    drawBeziers: function(n) {
        for (var i = "", t = 0; t < (n.length - 1) / 3; t++) i += this.drawBezierMidpoint(n[3 * t], n[3 * t + 1], n[3 * t + 2], n[3 * t + 3]);
        return i
    },
    drawBezierMidpoint: function(n, t, i, r) {
        var u = Math.round,
            e = this.getPointOnSegment(n, t, .75),
            o = this.getPointOnSegment(r, i, .75),
            s = (r.x - n.x) / 16,
            h = (r.y - n.y) / 16,
            f = this.getPointOnSegment(n, t, .375);
        return n = this.getPointOnSegment(e, o, .375), n.x -= s, n.y -= h, t = this.getPointOnSegment(o, e, .375), t.x += s, t.y += h, i = this.getPointOnSegment(r, i, .375), s = this.getMiddle(f, n), e = this.getMiddle(e, o), o = this.getMiddle(t, i), f = " Q" + u(f.x) + "," + u(f.y) + "," + u(s.x) + "," + u(s.y), f += " Q" + u(n.x) + "," + u(n.y) + "," + u(e.x) + "," + u(e.y), f += " Q" + u(t.x) + "," + u(t.y) + "," + u(o.x) + "," + u(o.y), f + (" Q" + u(i.x) + "," + u(i.y) + "," + u(r.x) + "," + u(r.y))
    },
    getMiddle: function(n, t) {
        return {
            x: (n.x + t.x) / 2,
            y: (n.y + t.y) / 2
        }
    },
    getPointOnSegment: function(n, t, i) {
        return {
            x: n.x + (t.x - n.x) * i,
            y: n.y + (t.y - n.y) * i
        }
    }
});
AmCharts.Cuboid = AmCharts.Class({
    construct: function(n, t, i, r, u, f, e, o, s, h, c, l, a) {
        this.set = n.set();
        this.container = n;
        this.h = Math.round(i);
        this.w = Math.round(t);
        this.dx = r;
        this.dy = u;
        this.colors = f;
        this.alpha = e;
        this.bwidth = o;
        this.bcolor = s;
        this.balpha = h;
        this.colors = f;
        a ? 0 > t && 0 === c && (c = 180) : 0 > i && 270 == c && (c = 90);
        this.gradientRotation = c;
        0 === r && 0 === u && (this.cornerRadius = l);
        this.draw()
    },
    draw: function() {
        var tt = this.set,
            a, v, w, b, k, d, y, g, nt;
        tt.clear();
        var u = this.container,
            t = this.w,
            n = this.h,
            i = this.dx,
            r = this.dy,
            o = this.colors,
            c = this.alpha,
            s = this.bwidth,
            h = this.bcolor,
            f = this.balpha,
            l = this.gradientRotation,
            it = this.cornerRadius,
            p = o,
            e = o;
        for ("object" == typeof o && (p = o[0], e = o[o.length - 1]), (0 < i || 0 < r) && (y = e, e = AmCharts.adjustLuminosity(p, -.2), e = AmCharts.adjustLuminosity(p, -.2), a = AmCharts.polygon(u, [0, i, t + i, t, 0], [0, r, r, 0, 0], e, c, 0, 0, 0, l), 0 < f && (nt = AmCharts.line(u, [0, i, t + i], [0, r, r], h, f, s)), v = AmCharts.polygon(u, [0, 0, t, t, 0], [0, n, n, 0, 0], e, c, 0, 0, 0, 0, l), v.translate(i, r), 0 < f && (w = AmCharts.line(u, [i, i], [r, r + n], h, 1, s)), b = AmCharts.polygon(u, [0, 0, i, i, 0], [0, n, n + r, r, 0], e, c, 0, 0, 0, l), k = AmCharts.polygon(u, [t, t, t + i, t + i, t], [0, n, n + r, r, 0], e, c, 0, 0, 0, l), 0 < f && (d = AmCharts.line(u, [t, t + i, t + i, t], [0, r, n + r, n], h, f, s)), e = AmCharts.adjustLuminosity(y, .2), y = AmCharts.polygon(u, [0, i, t + i, t, 0], [n, n + r, n + r, n, n], e, c, 0, 0, 0, l), 0 < f && (g = AmCharts.line(u, [0, i, t + i], [n, n + r, n + r], h, f, s))), 1 > Math.abs(n) && (n = 0), 1 > Math.abs(t) && (t = 0), u = 0 === n ? AmCharts.line(u, [0, t], [0, 0], h, f, s) : 0 === t ? AmCharts.line(u, [0, 0], [0, n], h, f, s) : 0 < it ? AmCharts.rect(u, t, n, o, c, s, h, f, it, l) : AmCharts.polygon(u, [0, 0, t, t, 0], [0, n, n, 0, 0], o, c, s, h, f, l), n = 0 > n ? [a, nt, v, w, b, k, d, y, g, u] : [y, g, v, w, b, k, a, nt, d, u], a = 0; a < n.length; a++)(v = n[a]) && tt.push(v)
    },
    width: function(n) {
        this.w = n;
        this.draw()
    },
    height: function(n) {
        this.h = n;
        this.draw()
    },
    animateHeight: function(n, t) {
        var i = this;
        i.easing = t;
        i.totalFrames = 1e3 * n / AmCharts.updateRate;
        i.rh = i.h;
        i.frame = 0;
        i.height(1);
        setTimeout(function() {
            i.updateHeight.call(i)
        }, AmCharts.updateRate)
    },
    updateHeight: function() {
        var n = this,
            t;
        n.frame++;
        t = n.totalFrames;
        n.frame <= t && (t = n.easing(0, n.frame, 1, n.rh - 1, t), n.height(t), setTimeout(function() {
            n.updateHeight.call(n)
        }, AmCharts.updateRate))
    },
    animateWidth: function(n, t) {
        var i = this;
        i.easing = t;
        i.totalFrames = 1e3 * n / AmCharts.updateRate;
        i.rw = i.w;
        i.frame = 0;
        i.width(1);
        setTimeout(function() {
            i.updateWidth.call(i)
        }, AmCharts.updateRate)
    },
    updateWidth: function() {
        var n = this,
            t;
        n.frame++;
        t = n.totalFrames;
        n.frame <= t && (t = n.easing(0, n.frame, 1, n.rw - 1, t), n.width(t), setTimeout(function() {
            n.updateWidth.call(n)
        }, AmCharts.updateRate))
    }
});
AmCharts.AmLegend = AmCharts.Class({
    construct: function() {
        this.createEvents("rollOverMarker", "rollOverItem", "rollOutMarker", "rollOutItem", "showItem", "hideItem", "clickMarker", "rollOverItem", "rollOutItem", "clickLabel");
        this.position = "bottom";
        this.borderColor = this.color = "#000000";
        this.borderAlpha = 0;
        this.markerLabelGap = 5;
        this.verticalGap = 10;
        this.align = "left";
        this.horizontalGap = 0;
        this.spacing = 10;
        this.markerDisabledColor = "#AAB3B3";
        this.markerType = "square";
        this.markerSize = 16;
        this.markerBorderThickness = 1;
        this.marginBottom = this.marginTop = 0;
        this.marginLeft = this.marginRight = 20;
        this.autoMargins = !0;
        this.valueWidth = 50;
        this.switchable = !0;
        this.switchType = "x";
        this.switchColor = "#FFFFFF";
        this.rollOverColor = "#CC0000";
        this.reversedOrder = !1;
        this.labelText = "[[title]]";
        this.valueText = "[[value]]";
        this.useMarkerColorForLabels = !1;
        this.rollOverGraphAlpha = 1;
        this.textClickEnabled = !1;
        this.equalWidths = !0;
        this.dateFormat = "DD-MM-YYYY";
        this.backgroundColor = "#FFFFFF";
        this.backgroundAlpha = 0;
        this.showEntries = !0
    },
    setData: function(n) {
        this.data = n;
        this.invalidateSize()
    },
    invalidateSize: function() {
        this.destroy();
        this.entries = [];
        this.valueLabels = [];
        AmCharts.ifArray(this.data) && this.drawLegend()
    },
    drawLegend: function() {
        var n = this.chart,
            t = this.position,
            i = this.width,
            o = n.divRealWidth,
            f = n.divRealHeight,
            r = this.div,
            u = this.data,
            e;
        if (isNaN(this.fontSize) && (this.fontSize = n.fontSize), "right" == t || "left" == t ? (this.maxColumns = 1, this.marginLeft = this.marginRight = 10) : this.autoMargins && (this.marginRight = n.marginRight, this.marginLeft = n.marginLeft, e = n.autoMarginOffset, "bottom" == t ? (this.marginBottom = e, this.marginTop = 0) : (this.marginTop = e, this.marginBottom = 0)), i = void 0 !== i ? AmCharts.toCoordinate(i, o) : n.realWidth, "outside" == t ? (i = r.offsetWidth, f = r.offsetHeight, r.clientHeight && (i = r.clientWidth, f = r.clientHeight)) : (r.style.width = i + "px", r.className = "amChartsLegend"), this.divWidth = i, this.container = new AmCharts.AmDraw(r, i, f), this.lx = 0, this.ly = 8, t = this.markerSize, t > this.fontSize && (this.ly = t / 2 - 1), 0 < t && (this.lx += t + this.markerLabelGap), this.titleWidth = 0, (t = this.title) && (n = AmCharts.text(this.container, t, this.color, n.fontFamily, this.fontSize, "start", !0), n.translate(this.marginLeft, this.marginTop + this.verticalGap + this.ly + 1), n = n.getBBox(), this.titleWidth = n.width + 15, this.titleHeight = n.height + 6), this.index = this.maxLabelWidth = 0, this.showEntries) {
            for (n = 0; n < u.length; n++) this.createEntry(u[n]);
            for (n = this.index = 0; n < u.length; n++) this.createValue(u[n])
        }
        this.arrangeEntries();
        this.updateValues()
    },
    arrangeEntries: function() {
        var t = this.position,
            f = this.marginLeft + this.titleWidth,
            l = this.marginRight,
            g = this.marginTop,
            tt = this.marginBottom,
            r = this.horizontalGap,
            nt = this.div,
            u = this.divWidth,
            e = this.maxColumns,
            w = this.verticalGap,
            b = this.spacing,
            it = u - l - f,
            k = 0,
            d = 0,
            o = this.container,
            p = o.set(),
            s, n, i, h, c, v, y, a;
        for (this.set = p, o = o.set(), p.push(o), s = this.entries, i = 0; i < s.length; i++) n = s[i].getBBox(), h = n.width, h > k && (k = h), n = n.height, n > d && (d = n);
        for (c = h = 0, v = r, i = 0; i < s.length; i++) y = s[i], this.reversedOrder && (y = s[s.length - i - 1]), n = y.getBBox(), this.equalWidths ? a = r + c * (k + b + this.markerLabelGap) : (a = v, v = v + n.width + r + b), a + n.width > it && 0 < i && 0 !== c && (h++, c = 0, a = r, v = a + n.width + r + b, skipNewRow = !0), y.translate(a, (d + w) * h), c++, !isNaN(e) && c >= e && (c = 0, h++), o.push(y);
        n = o.getBBox();
        e = n.height + 2 * w - 1;
        "left" == t || "right" == t ? (u = n.width + 2 * r, nt.style.width = u + f + l + "px") : u = u - f - l - 1;
        l = AmCharts.polygon(this.container, [0, u, u, 0], [0, 0, e, e], this.backgroundColor, this.backgroundAlpha, 1, this.borderColor, this.borderAlpha);
        p.push(l);
        p.translate(f, g);
        l.toBack();
        f = r;
        ("top" == t || "bottom" == t || "absolute" == t || "outside" == t) && ("center" == this.align ? f = r + (u - n.width) / 2 : "right" == this.align && (f = r + u - n.width));
        o.translate(f, w + 1);
        this.titleHeight > e && (e = this.titleHeight);
        t = e + g + tt + 1;
        0 > t && (t = 0);
        nt.style.height = Math.round(t) + "px"
    },
    createEntry: function(n) {
        var e, r, u, f, o, i, t, s, h;
        if (!1 !== n.visibleInLegend) {
            e = this.chart;
            r = n.markerType;
            r || (r = this.markerType);
            u = n.color;
            f = n.alpha;
            n.legendKeyColor && (u = n.legendKeyColor());
            n.legendKeyAlpha && (f = n.legendKeyAlpha());
            !0 === n.hidden && (u = this.markerDisabledColor);
            o = this.createMarker(r, u, f);
            this.addListeners(o, n);
            f = this.container.set([o]);
            this.switchable && f.setAttr("cursor", "pointer");
            i = this.switchType;
            i && (t = "x" == i ? this.createX() : this.createV(), t.dItem = n, !0 !== n.hidden ? "x" == i ? t.hide() : t.show() : "x" != i && t.hide(), this.switchable || t.hide(), this.addListeners(t, n), n.legendSwitch = t, f.push(t));
            i = this.color;
            n.showBalloon && this.textClickEnabled && void 0 !== this.selectedColor && (i = this.selectedColor);
            this.useMarkerColorForLabels && (i = u);
            !0 === n.hidden && (i = this.markerDisabledColor);
            var u = AmCharts.massReplace(this.labelText, {
                    "[[title]]": n.title
                }),
                c = this.fontSize,
                l = this.markerSize;
            o && l <= c && (s = 0, ("bubble" == r || "circle" == r) && (s = l / 2), r = s + this.ly - c / 2 + (c + 2 - l) / 2, o.translate(s, r), t && t.translate(s, r));
            u && (u = AmCharts.fixNewLines(u), h = AmCharts.text(this.container, u, i, e.fontFamily, c, "start"), h.translate(this.lx, this.ly), f.push(h), e = h.getBBox().width, this.maxLabelWidth < e && (this.maxLabelWidth = e));
            this.entries[this.index] = f;
            n.legendEntry = this.entries[this.index];
            n.legendLabel = h;
            this.index++
        }
    },
    addListeners: function(n, t) {
        var i = this;
        n && n.mouseover(function() {
            i.rollOverMarker(t)
        }).mouseout(function() {
            i.rollOutMarker(t)
        }).click(function() {
            i.clickMarker(t)
        })
    },
    rollOverMarker: function(n) {
        this.switchable && this.dispatch("rollOverMarker", n);
        this.dispatch("rollOverItem", n)
    },
    rollOutMarker: function(n) {
        this.switchable && this.dispatch("rollOutMarker", n);
        this.dispatch("rollOutItem", n)
    },
    clickMarker: function(n) {
        this.switchable ? !0 === n.hidden ? this.dispatch("showItem", n) : this.dispatch("hideItem", n) : this.textClickEnabled && this.dispatch("clickMarker", n)
    },
    rollOverLabel: function(n) {
        n.hidden || (this.textClickEnabled && n.legendLabel && n.legendLabel.attr({
            fill: this.rollOverColor
        }), this.dispatch("rollOverItem", n))
    },
    rollOutLabel: function(n) {
        if (!n.hidden) {
            if (this.textClickEnabled && n.legendLabel) {
                var t = this.color;
                void 0 !== this.selectedColor && n.showBalloon && (t = this.selectedColor);
                this.useMarkerColorForLabels && (t = n.lineColor, void 0 === t && (t = n.color));
                n.legendLabel.attr({
                    fill: t
                })
            }
            this.dispatch("rollOutItem", n)
        }
    },
    clickLabel: function(n) {
        this.textClickEnabled ? n.hidden || this.dispatch("clickLabel", n) : this.switchable && (!0 === n.hidden ? this.dispatch("showItem", n) : this.dispatch("hideItem", n))
    },
    dispatch: function(n, t) {
        this.fire(n, {
            type: n,
            dataItem: t,
            target: this,
            chart: this.chart
        })
    },
    createValue: function(n) {
        var t = this,
            r = t.fontSize,
            u, f, i;
        if (!1 !== n.visibleInLegend) {
            if (u = t.maxLabelWidth, t.equalWidths || (t.valueAlign = "left"), "left" == t.valueAlign && (u = n.legendEntry.getBBox().width), f = u, t.valueText) {
                i = t.color;
                t.useMarkerColorForValues && (i = n.color, n.legendKeyColor && (i = n.legendKeyColor()));
                !0 === n.hidden && (i = t.markerDisabledColor);
                var o = t.valueText,
                    u = u + t.lx + t.markerLabelGap + t.valueWidth,
                    e = "end";
                "left" == t.valueAlign && (u -= t.valueWidth, e = "start");
                i = AmCharts.text(t.container, o, i, t.chart.fontFamily, r, e);
                i.translate(u, t.ly);
                t.entries[t.index].push(i);
                f += t.valueWidth + 2 * t.markerLabelGap;
                i.dItem = n;
                t.valueLabels.push(i)
            }
            t.index++;
            i = t.markerSize;
            i < r + 7 && (i = r + 7, AmCharts.VML && (i += 3));
            r = t.container.rect(t.markerSize, 0, f, i, 0, 0).attr({
                stroke: "none",
                fill: "#ffffff",
                "fill-opacity": .005
            });
            r.dItem = n;
            t.entries[t.index - 1].push(r);
            r.mouseover(function() {
                t.rollOverLabel(n)
            }).mouseout(function() {
                t.rollOutLabel(n)
            }).click(function() {
                t.clickLabel(n)
            })
        }
    },
    createV: function() {
        var n = this.markerSize;
        return AmCharts.polygon(this.container, [n / 5, n / 2, n - n / 5, n / 2], [n / 3, n - n / 5, n / 5, n / 1.7], this.switchColor)
    },
    createX: function() {
        var n = this.markerSize - 3,
            t = {
                stroke: this.switchColor,
                "stroke-width": 3
            },
            i = this.container,
            r = AmCharts.line(i, [3, n], [3, n]).attr(t),
            n = AmCharts.line(i, [3, n], [n, 3]).attr(t);
        return this.container.set([r, n])
    },
    createMarker: function(n, t, i) {
        var r = this.markerSize,
            e = this.container,
            u, o = this.markerBorderColor,
            f, s;
        o || (o = t);
        f = this.markerBorderThickness;
        s = this.markerBorderAlpha;
        switch (n) {
            case "square":
                u = AmCharts.polygon(e, [0, r, r, 0], [0, 0, r, r], t, i, f, o, s);
                break;
            case "circle":
                u = AmCharts.circle(e, r / 2, t, i, f, o, s);
                u.translate(r / 2, r / 2);
                break;
            case "line":
                u = AmCharts.line(e, [0, r], [r / 2, r / 2], t, i, f);
                break;
            case "dashedLine":
                u = AmCharts.line(e, [0, r], [r / 2, r / 2], t, i, f, 3);
                break;
            case "triangleUp":
                u = AmCharts.polygon(e, [0, r / 2, r, r], [r, 0, r, r], t, i, f, o, s);
                break;
            case "triangleDown":
                u = AmCharts.polygon(e, [0, r / 2, r, r], [0, r, 0, 0], t, i, f, o, s);
                break;
            case "bubble":
                u = AmCharts.circle(e, r / 2, t, i, f, o, s, !0);
                u.translate(r / 2, r / 2)
        }
        return u
    },
    validateNow: function() {
        this.invalidateSize()
    },
    updateValues: function() {
        for (var f = this.valueLabels, e = this.chart, t, n, i, u, r = 0; r < f.length; r++) t = f[r], n = t.dItem, void 0 !== n.type ? (i = n.currentDataItem, i ? (u = this.valueText, n.legendValueText && (u = n.legendValueText), n = u, n = e.formatString(n, i), t.text(n)) : t.text(" ")) : (i = e.formatString(this.valueText, n), t.text(i))
    },
    renderFix: function() {
        if (!AmCharts.VML) {
            var n = this.container;
            n && n.renderFix()
        }
    },
    destroy: function() {
        this.div.innerHTML = "";
        AmCharts.remove(this.set)
    }
});
AmCharts.AmBalloon = AmCharts.Class({
    construct: function() {
        this.enabled = !0;
        this.fillColor = "#CC0000";
        this.fillAlpha = 1;
        this.borderThickness = 2;
        this.borderColor = "#FFFFFF";
        this.borderAlpha = 1;
        this.cornerRadius = 6;
        this.maximumWidth = 220;
        this.horizontalPadding = 8;
        this.verticalPadding = 5;
        this.pointerWidth = 10;
        this.pointerOrientation = "V";
        this.color = "#FFFFFF";
        this.textShadowColor = "#000000";
        this.adjustBorderColor = !1;
        this.showBullet = !0;
        this.show = this.follow = !1;
        this.bulletSize = 3;
        this.textAlign = "middle"
    },
    draw: function() {
        var u = this.pointToX,
            h = this.pointToY,
            f = this.textAlign,
            w, r, a;
        if (!isNaN(u)) {
            var c = this.chart,
                l = c.container,
                o = this.set;
            if (AmCharts.remove(o), AmCharts.remove(this.pointer), this.set = o = l.set(), c.balloonsSet.push(o), this.show) {
                var e = this.l,
                    s = this.t,
                    k = this.r,
                    y = this.b,
                    n = this.textShadowColor;
                this.color == n && (n = void 0);
                var p = this.balloonColor,
                    d = this.fillColor,
                    v = this.borderColor;
                void 0 != p && (this.adjustBorderColor ? v = p : d = p);
                var nt = this.horizontalPadding,
                    p = this.verticalPadding,
                    i = this.pointerWidth,
                    g = this.pointerOrientation,
                    b = this.cornerRadius,
                    t = c.fontFamily,
                    a = this.fontSize;
                void 0 == a && (a = c.fontSize);
                c = AmCharts.text(l, this.text, this.color, t, a, f);
                o.push(c);
                void 0 != n && (w = AmCharts.text(l, this.text, n, t, a, f, !1, .4), o.push(w));
                t = c.getBBox();
                n = t.height + 2 * p;
                t = t.width + 2 * nt;
                window.opera && (n += 2);
                a = a / 2 + p;
                switch (f) {
                    case "middle":
                        r = t / 2;
                        break;
                    case "left":
                        r = nt;
                        break;
                    case "right":
                        r = t - nt
                }
                c.translate(r, a);
                w && w.translate(r + 1, a + 1);
                "H" != g ? (r = u - t / 2, f = h < s + n + 10 && "down" != g ? h + i : h - n - i) : (2 * i > n && (i = n / 2), f = h - n / 2, r = u < e + (k - e) / 2 ? u + i : u - t - i);
                f + n >= y && (f = y - n);
                f < s && (f = s);
                r < e && (r = e);
                r + t > k && (r = k - t);
                0 < b || 0 === i ? (v = AmCharts.rect(l, t, n, d, this.fillAlpha, this.borderThickness, v, this.borderAlpha, this.cornerRadius), this.showBullet && (l = AmCharts.circle(l, this.bulletSize, d, this.fillAlpha), l.translate(u, h), this.pointer = l)) : (y = [], b = [], "H" != g ? (e = u - r, e > t - i && (e = t - i), e < i && (e = i), y = [0, e - i, u - r, e + i, t, t, 0, 0], b = h < s + n + 10 && "down" != g ? [0, 0, h - f, 0, 0, n, n, 0] : [n, n, h - f, n, n, 0, 0, n]) : (s = h - f, s > n - i && (s = n - i), s < i && (s = i), b = [0, s - i, h - f, s + i, n, n, 0, 0], y = u < e + (k - e) / 2 ? [0, 0, r < u ? 0 : u - r, 0, 0, t, t, 0] : [t, t, r + t > u ? t : u - r, t, t, 0, 0, t]), v = AmCharts.polygon(l, y, b, d, this.fillAlpha, this.borderThickness, v, this.borderAlpha));
                o.push(v);
                v.toFront();
                w && w.toFront();
                c.toFront();
                u = 1;
                9 > AmCharts.IEversion && this.follow && (u = 6);
                o.translate(r - u, f);
                o = c.getBBox();
                this.bottom = f + o.y + o.height + 2 * p + 2;
                this.yPos = o.y + f
            }
        }
    },
    followMouse: function() {
        var n, t, i;
        if (this.follow && this.show && (n = this.chart.mouseX, t = this.chart.mouseY - 3, this.pointToX = n, this.pointToY = t, n != this.previousX || t != this.previousY))
            if (this.previousX = n, this.previousY = t, 0 === this.cornerRadius) this.draw();
            else if (i = this.set, i) {
            var r = i.getBBox(),
                n = n - r.width / 2,
                u = t - r.height - 10;
            n < this.l && (n = this.l);
            n > this.r - r.width && (n = this.r - r.width);
            u < this.t && (u = t + 10);
            i.translate(n, u)
        }
    },
    changeColor: function(n) {
        this.balloonColor = n
    },
    setBounds: function(n, t, i, r) {
        this.l = n;
        this.t = t;
        this.r = i;
        this.b = r
    },
    showBalloon: function(n) {
        this.text = n;
        this.show = !0;
        this.draw()
    },
    hide: function() {
        this.follow = this.show = !1;
        this.destroy()
    },
    setPosition: function(n, t, i) {
        this.pointToX = n;
        this.pointToY = t;
        i && (n == this.previousX && t == this.previousY || this.draw());
        this.previousX = n;
        this.previousY = t
    },
    followCursor: function(n) {
        var t = this,
            i, r;
        (t.follow = n) ? (t.pShowBullet = t.showBullet, t.showBullet = !1) : void 0 !== t.pShowBullet && (t.showBullet = t.pShowBullet);
        clearInterval(t.interval);
        i = t.chart.mouseX;
        r = t.chart.mouseY;
        !isNaN(i) && n && (t.pointToX = i, t.pointToY = r - 3, t.interval = setInterval(function() {
            t.followMouse.call(t)
        }, 40))
    },
    destroy: function() {
        clearInterval(this.interval);
        AmCharts.remove(this.set);
        this.set = null;
        AmCharts.remove(this.pointer);
        this.pointer = null
    }
});
AmCharts.AmCoordinateChart = AmCharts.Class({
    inherits: AmCharts.AmChart,
    construct: function() {
        AmCharts.AmCoordinateChart.base.construct.call(this);
        this.createEvents("rollOverGraphItem", "rollOutGraphItem", "clickGraphItem", "doubleClickGraphItem", "rightClickGraphItem", "clickGraph");
        this.plotAreaFillColors = "#FFFFFF";
        this.plotAreaFillAlphas = 0;
        this.plotAreaBorderColor = "#000000";
        this.plotAreaBorderAlpha = 0;
        this.startAlpha = 1;
        this.startDuration = 0;
        this.startEffect = "elastic";
        this.sequencedAnimation = !0;
        this.colors = "#FF6600 #FCD202 #B0DE09 #0D8ECF #2A0CD0 #CD0D74 #CC0000 #00CC00 #0000CC #DDDDDD #999999 #333333 #990000".split(" ");
        this.balloonDateFormat = "MMM DD, YYYY";
        this.valueAxes = [];
        this.graphs = []
    },
    initChart: function() {
        AmCharts.AmCoordinateChart.base.initChart.call(this);
        this.createValueAxes();
        AmCharts.VML && (this.startAlpha = 1);
        var n = this.legend;
        n && n.setData(this.graphs)
    },
    createValueAxes: function() {
        if (0 === this.valueAxes.length) {
            var n = new AmCharts.ValueAxis;
            this.addValueAxis(n)
        }
    },
    parseData: function() {
        this.processValueAxes();
        this.processGraphs()
    },
    parseSerialData: function() {
        var h, c, p, i, w, g, nt, b, f, t, u, k, l, e, a, d, tt, r, v;
        AmCharts.AmSerialChart.base.parseData.call(this);
        var s = this.graphs,
            n, o = {},
            y = this.seriesIdField;
        if (y || (y = this.categoryField), this.chartData = [], h = this.dataProvider, h)
            for (c = !1, i = this.categoryAxis, i && (c = i.parseDates, w = i.forceShowField, p = i.categoryFunction), c && (n = AmCharts.extractPeriod(i.minPeriod), g = n.period, nt = n.count), b = {}, this.lookupTable = b, f = 0; f < h.length; f++) {
                for (t = {}, u = h[f], n = u[this.categoryField], t.category = p ? p(n, u, i) : String(n), w && (t.forceShow = u[w]), b[u[y]] = t, c && (n = i.categoryFunction ? i.categoryFunction(n, u, i) : n instanceof Date ? "fff" == i.minPeriod ? AmCharts.useUTC ? new Date(n.getUTCFullYear(), n.getUTCMonth(), n.getUTCDate(), n.getUTCHours(), n.getUTCMinutes(), n.getUTCSeconds(), n.getUTCMilliseconds()) : new Date(n.getFullYear(), n.getMonth(), n.getDate(), n.getHours(), n.getMinutes(), n.getSeconds(), n.getMilliseconds()) : new Date(n) : new Date(n), n = AmCharts.resetDateToMin(n, g, nt), t.category = n, t.time = n.getTime()), k = this.valueAxes, t.axes = {}, t.x = {}, l = 0; l < k.length; l++)
                    for (e = k[l].id, t.axes[e] = {}, t.axes[e].graphs = {}, a = 0; a < s.length; a++) n = s[a], d = n.id, tt = n.periodValue, n.valueAxis.id == e && (t.axes[e].graphs[d] = {}, r = {}, r.index = f, v = u, n.dataProvider && (v = o), r.values = this.processValues(v, n, tt), this.processFields(n, r, v), r.category = t.category, r.serialDataItem = t, r.graph = n, t.axes[e].graphs[d] = r);
                this.chartData[f] = t
            }
        for (o = 0; o < s.length; o++) n = s[o], n.dataProvider && this.parseGraphData(n)
    },
    processValues: function(n, t, i) {
        var u = {},
            r, f = !1;
        return "candlestick" != t.type && "ohlc" != t.type || "" === i || (f = !0), r = Number(n[t.valueField + i]), isNaN(r) || (u.value = r), f && (i = "Open"), r = Number(n[t.openField + i]), isNaN(r) || (u.open = r), f && (i = "Close"), r = Number(n[t.closeField + i]), isNaN(r) || (u.close = r), f && (i = "Low"), r = Number(n[t.lowField + i]), isNaN(r) || (u.low = r), f && (i = "High"), r = Number(n[t.highField + i]), isNaN(r) || (u.high = r), u
    },
    parseGraphData: function(n) {
        var e = n.dataProvider,
            t = n.seriesIdField,
            r;
        for (t || (t = this.seriesIdField), t || (t = this.categoryField), r = 0; r < e.length; r++) {
            var u = e[r],
                f = this.lookupTable[String(u[t])],
                i = n.valueAxis.id;
            f && (i = f.axes[i].graphs[n.id], i.serialDataItem = f, i.values = this.processValues(u, n, n.periodValue), this.processFields(n, i, u))
        }
    },
    addValueAxis: function(n) {
        n.chart = this;
        this.valueAxes.push(n);
        this.validateData()
    },
    removeValueAxesAndGraphs: function() {
        for (var t = this.valueAxes, n = t.length - 1; - 1 < n; n--) this.removeValueAxis(t[n])
    },
    removeValueAxis: function(n) {
        for (var i = this.graphs, r, t = i.length - 1; 0 <= t; t--) r = i[t], r && r.valueAxis == n && this.removeGraph(r);
        for (i = this.valueAxes, t = i.length - 1; 0 <= t; t--) i[t] == n && i.splice(t, 1);
        this.validateData()
    },
    addGraph: function(n) {
        this.graphs.push(n);
        this.chooseGraphColor(n, this.graphs.length - 1);
        this.validateData()
    },
    removeGraph: function(n) {
        for (var i = this.graphs, t = i.length - 1; 0 <= t; t--) i[t] == n && (i.splice(t, 1), n.destroy());
        this.validateData()
    },
    processValueAxes: function() {
        for (var i = this.valueAxes, t, n = 0; n < i.length; n++) t = i[n], t.chart = this, t.id || (t.id = "valueAxis" + n + "_" + (new Date).getTime()), (!0 === this.usePrefixes || !1 === this.usePrefixes) && (t.usePrefixes = this.usePrefixes)
    },
    processGraphs: function() {
        for (var i = this.graphs, n, t = 0; t < i.length; t++) n = i[t], n.chart = this, n.valueAxis || (n.valueAxis = this.valueAxes[0]), n.id || (n.id = "graph" + t + "_" + (new Date).getTime())
    },
    formatString: function(n, t) {
        var r = t.graph,
            i = r.valueAxis;
        return i.duration && t.values.value && (i = AmCharts.formatDuration(t.values.value, i.duration, "", i.durationUnits, i.maxInterval, i.numberFormatter), n = n.split("[[value]]").join(i)), n = AmCharts.massReplace(n, {
            "[[title]]": r.title,
            "[[description]]": t.description,
            "<br>": "\n"
        }), n = AmCharts.fixNewLines(n), AmCharts.cleanFromEmpty(n)
    },
    getBalloonColor: function(n, t) {
        var r = n.lineColor,
            f = n.balloonColor,
            i = n.fillColors,
            u;
        return "object" == typeof i ? r = i[0] : void 0 !== i && (r = i), t.isNegative && (i = n.negativeLineColor, u = n.negativeFillColors, "object" == typeof u ? i = u[0] : void 0 !== u && (i = u), void 0 !== i && (r = i)), void 0 !== t.color && (r = t.color), void 0 === f && (f = r), f
    },
    getGraphById: function(n) {
        return this.getObjById(this.graphs, n)
    },
    getValueAxisById: function(n) {
        return this.getObjById(this.valueAxes, n)
    },
    getObjById: function(n, t) {
        for (var u, r, i = 0; i < n.length; i++) r = n[i], r.id == t && (u = r);
        return u
    },
    processFields: function(n, t, i) {
        var u, r, e, f;
        for (n.itemColors && (u = n.itemColors, r = t.index, t.color = r < u.length ? u[r] : AmCharts.randomColor()), u = "lineColor color alpha fillColors description bullet customBullet bulletSize bulletConfig url labelColor".split(" "), r = 0; r < u.length; r++) e = u[r], f = n[e + "Field"], f && (f = i[f], AmCharts.isDefined(f) && (t[e] = f));
        t.dataContext = i
    },
    chooseGraphColor: function(n, t) {
        if (void 0 === n.lineColor) {
            var i;
            i = this.colors.length > t ? this.colors[t] : AmCharts.randomColor();
            n.lineColor = i
        }
    },
    handleLegendEvent: function(n) {
        var r = n.type,
            t, i;
        if (n = n.dataItem) {
            t = n.hidden;
            i = n.showBalloon;
            switch (r) {
                case "clickMarker":
                    i ? this.hideGraphsBalloon(n) : this.showGraphsBalloon(n);
                    break;
                case "clickLabel":
                    i ? this.hideGraphsBalloon(n) : this.showGraphsBalloon(n);
                    break;
                case "rollOverItem":
                    t || this.highlightGraph(n);
                    break;
                case "rollOutItem":
                    t || this.unhighlightGraph();
                    break;
                case "hideItem":
                    this.hideGraph(n);
                    break;
                case "showItem":
                    this.showGraph(n)
            }
        }
    },
    highlightGraph: function(n) {
        var u = this.graphs,
            t, i = .2,
            r;
        if (this.legend && (i = this.legend.rollOverGraphAlpha), 1 != i)
            for (t = 0; t < u.length; t++) r = u[t], r != n && r.changeOpacity(i)
    },
    unhighlightGraph: function() {
        var n, t;
        if (this.legend && (n = this.legend.rollOverGraphAlpha), 1 != n)
            for (n = this.graphs, t = 0; t < n.length; t++) n[t].changeOpacity(1)
    },
    showGraph: function(n) {
        n.hidden = !1;
        this.dataChanged = !0;
        this.marginsUpdated = !1;
        this.chartCreated && this.initChart()
    },
    hideGraph: function(n) {
        this.dataChanged = !0;
        this.marginsUpdated = !1;
        n.hidden = !0;
        this.chartCreated && this.initChart()
    },
    hideGraphsBalloon: function(n) {
        n.showBalloon = !1;
        this.updateLegend()
    },
    showGraphsBalloon: function(n) {
        n.showBalloon = !0;
        this.updateLegend()
    },
    updateLegend: function() {
        this.legend && this.legend.invalidateSize()
    },
    resetAnimation: function() {
        var t = this.graphs,
            n;
        if (t)
            for (n = 0; n < t.length; n++) t[n].animationPlayed = !1
    },
    animateAgain: function() {
        this.resetAnimation();
        this.validateNow()
    }
});
AmCharts.AmRectangularChart = AmCharts.Class({
    inherits: AmCharts.AmCoordinateChart,
    construct: function() {
        AmCharts.AmRectangularChart.base.construct.call(this);
        this.createEvents("zoomed");
        this.marginRight = this.marginBottom = this.marginTop = this.marginLeft = 20;
        this.verticalPosition = this.horizontalPosition = this.depth3D = this.angle = 0;
        this.heightMultiplier = this.widthMultiplier = 1;
        this.zoomOutText = "Show all";
        this.zoomOutButton = {
            backgroundColor: "#b2e1ff",
            backgroundAlpha: 1
        };
        this.trendLines = [];
        this.autoMargins = !0;
        this.marginsUpdated = !1;
        this.autoMarginOffset = 10
    },
    initChart: function() {
        AmCharts.AmRectangularChart.base.initChart.call(this);
        this.updateDxy();
        var n = !0;
        !this.marginsUpdated && this.autoMargins && (this.resetMargins(), n = !1);
        this.updateMargins();
        this.updatePlotArea();
        this.updateScrollbars();
        this.updateTrendLines();
        this.updateChartCursor();
        this.updateValueAxes();
        n && (this.scrollbarOnly || this.updateGraphs())
    },
    drawChart: function() {
        if (AmCharts.AmRectangularChart.base.drawChart.call(this), this.drawPlotArea(), AmCharts.ifArray(this.chartData)) {
            var n = this.chartCursor;
            n && n.draw();
            n = this.zoomOutText;
            "" !== n && n && this.drawZoomOutButton()
        }
    },
    resetMargins: function() {
        var i = {},
            n, r, t, u;
        if ("serial" == this.chartType) {
            for (r = this.valueAxes, n = 0; n < r.length; n++) t = r[n], t.ignoreAxisWidth || (t.setOrientation(this.rotate), t.fixAxisPosition(), i[t.position] = !0);
            (n = this.categoryAxis) && !n.ignoreAxisWidth && (n.setOrientation(!this.rotate), n.fixAxisPosition(), n.fixAxisPosition(), i[n.position] = !0)
        } else {
            for (t = this.xAxes, r = this.yAxes, n = 0; n < t.length; n++) u = t[n], u.ignoreAxisWidth || (u.setOrientation(!0), u.fixAxisPosition(), i[u.position] = !0);
            for (n = 0; n < r.length; n++) t = r[n], t.ignoreAxisWidth || (t.setOrientation(!1), t.fixAxisPosition(), i[t.position] = !0)
        }
        i.left && (this.marginLeft = 0);
        i.right && (this.marginRight = 0);
        i.top && (this.marginTop = 0);
        i.bottom && (this.marginBottom = 0);
        this.fixMargins = i
    },
    measureMargins: function() {
        for (var f = this.valueAxes, t = this.autoMarginOffset, e = this.fixMargins, s = this.realWidth, h = this.realHeight, i = t, r = t, u = s - t, n = h - t, o = 0; o < f.length; o++) n = this.getAxisBounds(f[o], i, u, r, n), i = n.l, u = n.r, r = n.t, n = n.b;
        (f = this.categoryAxis) && (n = this.getAxisBounds(f, i, u, r, n), i = n.l, u = n.r, r = n.t, n = n.b);
        e.left && i < t && (this.marginLeft = Math.round(-i + t));
        e.right && u > s - t && (this.marginRight = Math.round(u - s + t));
        e.top && r < t + this.titleHeight && (this.marginTop = Math.round(this.marginTop - r + t + this.titleHeight));
        e.bottom && n > h - t && (this.marginBottom = Math.round(n - h + t));
        this.initChart()
    },
    getAxisBounds: function(n, t, i, r, u) {
        if (!n.ignoreAxisWidth) {
            var f = n.labelsSet,
                e = n.tickLength;
            if (n.inside && (e = 0), f) switch (f = n.getBBox(), n.position) {
                case "top":
                    n = f.y;
                    r > n && (r = n);
                    break;
                case "bottom":
                    n = f.y + f.height;
                    u < n && (u = n);
                    break;
                case "right":
                    n = f.x + f.width + e + 3;
                    i < n && (i = n);
                    break;
                case "left":
                    n = f.x - e;
                    t > n && (t = n)
            }
        }
        return {
            l: t,
            t: r,
            r: i,
            b: u
        }
    },
    drawZoomOutButton: function() {
        var n = this,
            i = n.container.set();
        n.zoomButtonSet.push(i);
        var r = n.color,
            u = n.fontSize,
            t = n.zoomOutButton;
        for (t && (t.fontSize && (u = t.fontSize), t.color && (r = t.color)), r = AmCharts.text(n.container, n.zoomOutText, r, n.fontFamily, u, "start"), u = r.getBBox(), r.translate(29, 6 + u.height / 2), t = AmCharts.rect(n.container, u.width + 40, u.height + 15, t.backgroundColor, t.backgroundAlpha), i.push(t), n.zbBG = t, void 0 !== n.pathToImages && (t = n.container.image(n.pathToImages + "lens.png", 0, 0, 16, 16), t.translate(7, u.height / 2 - 1), t.toFront(), i.push(t)), r.toFront(), i.push(r), t = i.getBBox(), i.translate(n.marginLeftReal + n.plotAreaWidth - t.width, n.marginTopReal), i.hide(), i.mouseover(function() {
                n.rollOverZB()
            }).mouseout(function() {
                n.rollOutZB()
            }).click(function() {
                n.clickZB()
            }).touchstart(function() {
                n.rollOverZB()
            }).touchend(function() {
                n.rollOutZB();
                n.clickZB()
            }), t = 0; t < i.length; t++) i[t].attr({
            cursor: "pointer"
        });
        n.zbSet = i
    },
    rollOverZB: function() {
        this.zbBG.show()
    },
    rollOutZB: function() {
        this.zbBG.hide()
    },
    clickZB: function() {
        this.zoomOut()
    },
    zoomOut: function() {
        this.updateScrollbar = !0;
        this.zoom()
    },
    drawPlotArea: function() {
        var t = this.dx,
            r = this.dy,
            e = this.marginLeftReal,
            o = this.marginTopReal,
            i = this.plotAreaWidth - 1,
            u = this.plotAreaHeight - 1,
            n = this.plotAreaFillColors,
            f = this.plotAreaFillAlphas,
            s = this.plotAreaBorderColor,
            h = this.plotAreaBorderAlpha;
        this.trendLinesSet.clipRect(e, o, i, u);
        "object" == typeof f && (f = f[0]);
        n = AmCharts.polygon(this.container, [0, i, i, 0], [0, 0, u, u], n, f, 1, s, h, this.plotAreaGradientAngle);
        n.translate(e + t, o + r);
        n.node.setAttribute("class", "amChartsPlotArea");
        this.set.push(n);
        0 !== t && 0 !== r && (n = this.plotAreaFillColors, "object" == typeof n && (n = n[0]), n = AmCharts.adjustLuminosity(n, -.15), i = AmCharts.polygon(this.container, [0, t, i + t, i, 0], [0, r, r, 0, 0], n, f, 1, s, h), i.translate(e, o + u), this.set.push(i), t = AmCharts.polygon(this.container, [0, 0, t, t, 0], [0, u, u + r, r, 0], n, f, 1, s, h), t.translate(e, o), this.set.push(t))
    },
    updatePlotArea: function() {
        var n = this.updateWidth(),
            t = this.updateHeight(),
            i = this.container;
        this.realWidth = n;
        this.realWidth = t;
        i && this.container.setSize(n, t);
        n = n - this.marginLeftReal - this.marginRightReal - this.dx;
        t = t - this.marginTopReal - this.marginBottomReal;
        1 > n && (n = 1);
        1 > t && (t = 1);
        this.plotAreaWidth = Math.round(n);
        this.plotAreaHeight = Math.round(t)
    },
    updateDxy: function() {
        this.dx = Math.round(this.depth3D * Math.cos(this.angle * Math.PI / 180));
        this.dy = Math.round(-this.depth3D * Math.sin(this.angle * Math.PI / 180));
        this.d3x = Math.round(this.columnSpacing3D * Math.cos(this.angle * Math.PI / 180));
        this.d3y = Math.round(-this.columnSpacing3D * Math.sin(this.angle * Math.PI / 180))
    },
    updateMargins: function() {
        var n = this.getTitleHeight();
        this.titleHeight = n;
        this.marginTopReal = this.marginTop - this.dy + n;
        this.marginBottomReal = this.marginBottom;
        this.marginLeftReal = this.marginLeft;
        this.marginRightReal = this.marginRight
    },
    updateValueAxes: function() {
        for (var i = this.valueAxes, r = this.marginLeftReal, u = this.marginTopReal, f = this.plotAreaHeight, e = this.plotAreaWidth, n, t = 0; t < i.length; t++) n = i[t], n.axisRenderer = AmCharts.RecAxis, n.guideFillRenderer = AmCharts.RecFill, n.axisItemRenderer = AmCharts.RecItem, n.dx = this.dx, n.dy = this.dy, n.viW = e - 1, n.viH = f - 1, n.marginsChanged = !0, n.viX = r, n.viY = u, this.updateObjectSize(n)
    },
    updateObjectSize: function(n) {
        n.width = (this.plotAreaWidth - 1) * this.widthMultiplier;
        n.height = (this.plotAreaHeight - 1) * this.heightMultiplier;
        n.x = this.marginLeftReal + this.horizontalPosition;
        n.y = this.marginTopReal + this.verticalPosition
    },
    updateGraphs: function() {
        for (var i = this.graphs, n, t = 0; t < i.length; t++) n = i[t], n.x = this.marginLeftReal + this.horizontalPosition, n.y = this.marginTopReal + this.verticalPosition, n.width = this.plotAreaWidth * this.widthMultiplier, n.height = this.plotAreaHeight * this.heightMultiplier, n.index = t, n.dx = this.dx, n.dy = this.dy, n.rotate = this.rotate, n.chartType = this.chartType
    },
    updateChartCursor: function() {
        var n = this.chartCursor;
        n && (n.x = this.marginLeftReal, n.y = this.marginTopReal, n.width = this.plotAreaWidth - 1, n.height = this.plotAreaHeight - 1, n.chart = this)
    },
    updateScrollbars: function() {},
    addChartCursor: function(n) {
        AmCharts.callMethod("destroy", [this.chartCursor]);
        n && (this.listenTo(n, "changed", this.handleCursorChange), this.listenTo(n, "zoomed", this.handleCursorZoom));
        this.chartCursor = n
    },
    removeChartCursor: function() {
        AmCharts.callMethod("destroy", [this.chartCursor]);
        this.chartCursor = null
    },
    zoomTrendLines: function() {
        for (var i = this.trendLines, n, t = 0; t < i.length; t++) n = i[t], n.valueAxis.recalculateToPercents ? n.set && n.set.hide() : (n.x = this.marginLeftReal + this.horizontalPosition, n.y = this.marginTopReal + this.verticalPosition, n.draw())
    },
    addTrendLine: function(n) {
        this.trendLines.push(n)
    },
    removeTrendLine: function(n) {
        for (var i = this.trendLines, t = i.length - 1; 0 <= t; t--) i[t] == n && i.splice(t, 1)
    },
    adjustMargins: function(n, t) {
        var i = n.scrollbarHeight;
        "top" == n.position ? t ? this.marginLeftReal += i : this.marginTopReal += i : t ? this.marginRightReal += i : this.marginBottomReal += i
    },
    getScrollbarPosition: function(n, t, i) {
        n.position = t ? "bottom" == i || "left" == i ? "bottom" : "top" : "top" == i || "right" == i ? "bottom" : "top"
    },
    updateChartScrollbar: function(n, t) {
        if (n) {
            n.rotate = t;
            var i = this.marginTopReal,
                r = this.marginLeftReal,
                u = n.scrollbarHeight,
                f = this.dx,
                e = this.dy;
            "top" == n.position ? t ? (n.y = i, n.x = r - u) : (n.y = i - u + e, n.x = r + f) : t ? (n.y = i + e, n.x = r + this.plotAreaWidth + f) : (n.y = i + this.plotAreaHeight + 1, n.x = this.marginLeftReal)
        }
    },
    showZB: function(n) {
        var t = this.zbSet;
        t && (n ? t.show() : t.hide(), this.zbBG.hide())
    },
    handleReleaseOutside: function(n) {
        AmCharts.AmRectangularChart.base.handleReleaseOutside.call(this, n);
        (n = this.chartCursor) && n.handleReleaseOutside()
    },
    handleMouseDown: function(n) {
        AmCharts.AmRectangularChart.base.handleMouseDown.call(this, n);
        var t = this.chartCursor;
        t && t.handleMouseDown(n)
    },
    handleCursorChange: function() {}
});
AmCharts.TrendLine = AmCharts.Class({
    construct: function() {
        this.createEvents("click");
        this.isProtected = !1;
        this.dashLength = 0;
        this.lineColor = "#00CC00";
        this.lineThickness = this.lineAlpha = 1
    },
    draw: function() {
        var n = this;
        n.destroy();
        var e = n.chart,
            f = e.container,
            i, t, u, s, r = n.categoryAxis,
            c = n.initialDate,
            l = n.initialCategory,
            a = n.finalDate,
            v = n.finalCategory,
            o = n.valueAxis,
            h = n.valueAxisX,
            y = n.initialXValue,
            p = n.finalXValue,
            w = n.initialValue,
            b = n.finalValue,
            k = o.recalculateToPercents;
        r && (c && (i = r.dateToCoordinate(c)), l && (i = r.categoryToCoordinate(l)), a && (t = r.dateToCoordinate(a)), v && (t = r.categoryToCoordinate(v)));
        h && !k && (isNaN(y) || (i = h.getCoordinate(y)), isNaN(p) || (t = h.getCoordinate(p)));
        o && !k && (isNaN(w) || (u = o.getCoordinate(w)), isNaN(b) || (s = o.getCoordinate(b)));
        isNaN(i) || isNaN(t) || isNaN(u) || isNaN(u) || (e.rotate ? (r = [u, s], t = [i, t]) : (r = [i, t], t = [u, s]), u = n.lineColor, i = AmCharts.line(f, r, t, u, n.lineAlpha, n.lineThickness, n.dashLength), t = AmCharts.line(f, r, t, u, .005, 5), f = f.set([i, t]), f.translate(e.marginLeftReal, e.marginTopReal), e.trendLinesSet.push(f), n.line = i, n.set = f, t.mouseup(function() {
            n.handleLineClick()
        }).mouseover(function() {
            n.handleLineOver()
        }).mouseout(function() {
            n.handleLineOut()
        }), t.touchend && t.touchend(function() {
            n.handleLineClick()
        }))
    },
    handleLineClick: function() {
        var n = {
            type: "click",
            trendLine: this,
            chart: this.chart
        };
        this.fire(n.type, n)
    },
    handleLineOver: function() {
        var n = this.rollOverColor;
        void 0 !== n && this.line.attr({
            stroke: n
        })
    },
    handleLineOut: function() {
        this.line.attr({
            stroke: this.lineColor
        })
    },
    destroy: function() {
        AmCharts.remove(this.set)
    }
});
AmCharts.AmSerialChart = AmCharts.Class({
    inherits: AmCharts.AmRectangularChart,
    construct: function() {
        AmCharts.AmSerialChart.base.construct.call(this);
        this.createEvents("changed");
        this.columnSpacing = 5;
        this.columnSpacing3D = 0;
        this.columnWidth = .8;
        this.updateScrollbar = !0;
        var n = new AmCharts.CategoryAxis;
        n.chart = this;
        this.categoryAxis = n;
        this.chartType = "serial";
        this.zoomOutOnDataUpdate = !0;
        this.skipZoom = !1;
        this.minSelectedTime = 0
    },
    initChart: function() {
        var n, i, t;
        for (AmCharts.AmSerialChart.base.initChart.call(this), this.updateCategoryAxis(), this.dataChanged && (this.updateData(), this.dataChanged = !1, this.dispatchDataUpdated = !0), n = this.chartCursor, n && n.updateData(), n = this.countColumns(), i = this.graphs, t = 0; t < i.length; t++) i[t].columnCount = n;
        this.updateScrollbar = !0;
        this.drawChart();
        this.autoMargins && !this.marginsUpdated && (this.marginsUpdated = !0, this.measureMargins())
    },
    validateData: function(n) {
        this.marginsUpdated = !1;
        this.zoomOutOnDataUpdate && !n && (this.endTime = this.end = this.startTime = this.start = NaN);
        AmCharts.AmSerialChart.base.validateData.call(this)
    },
    drawChart: function() {
        var i, t, n;
        AmCharts.AmSerialChart.base.drawChart.call(this);
        i = this.chartData;
        AmCharts.ifArray(i) ? (n = this.chartScrollbar, n && n.draw(), 0 < this.realWidth && 0 < this.realHeight && (i = i.length - 1, n = this.categoryAxis, n.parseDates && !n.equalSpacing ? (n = this.startTime, t = this.endTime, isNaN(n) || isNaN(t)) && (n = this.firstTime, t = this.lastTime) : (n = this.start, t = this.end, isNaN(n) || isNaN(t)) && (n = 0, t = i), this.endTime = this.startTime = this.end = this.start = void 0, this.zoom(n, t))) : this.cleanChart();
        this.dispDUpd();
        this.chartCreated = !0
    },
    cleanChart: function() {
        AmCharts.callMethod("destroy", [this.valueAxes, this.graphs, this.categoryAxis, this.chartScrollbar, this.chartCursor])
    },
    updateCategoryAxis: function() {
        var n = this.categoryAxis;
        n.id = "categoryAxis";
        n.rotate = this.rotate;
        n.axisRenderer = AmCharts.RecAxis;
        n.guideFillRenderer = AmCharts.RecFill;
        n.axisItemRenderer = AmCharts.RecItem;
        n.setOrientation(!this.rotate);
        n.x = this.marginLeftReal;
        n.y = this.marginTopReal;
        n.dx = this.dx;
        n.dy = this.dy;
        n.width = this.plotAreaWidth - 1;
        n.height = this.plotAreaHeight - 1;
        n.viW = this.plotAreaWidth - 1;
        n.viH = this.plotAreaHeight - 1;
        n.viX = this.marginLeftReal;
        n.viY = this.marginTopReal;
        n.marginsChanged = !0
    },
    updateValueAxes: function() {
        var r, t, i, n;
        for (AmCharts.AmSerialChart.base.updateValueAxes.call(this), r = this.valueAxes, t = 0; t < r.length; t++) i = r[t], n = this.rotate, i.rotate = n, i.setOrientation(n), n = this.categoryAxis, (!n.startOnAxis || n.parseDates) && (i.expandMinMax = !0)
    },
    updateData: function() {
        this.parseData();
        for (var i = this.graphs, n = this.chartData, t = 0; t < i.length; t++) i[t].data = n;
        0 < n.length && (this.firstTime = this.getStartTime(n[0].time), this.lastTime = this.getEndTime(n[n.length - 1].time))
    },
    getStartTime: function(n) {
        var t = this.categoryAxis;
        return AmCharts.resetDateToMin(new Date(n), t.minPeriod, 1, t.firstDayOfWeek).getTime()
    },
    getEndTime: function(n) {
        var t = AmCharts.extractPeriod(this.categoryAxis.minPeriod);
        return AmCharts.changeDate(new Date(n), t.period, t.count, !0).getTime() - 1
    },
    updateMargins: function() {
        AmCharts.AmSerialChart.base.updateMargins.call(this);
        var n = this.chartScrollbar;
        n && (this.getScrollbarPosition(n, this.rotate, this.categoryAxis.position), this.adjustMargins(n, this.rotate))
    },
    updateScrollbars: function() {
        this.updateChartScrollbar(this.chartScrollbar, this.rotate)
    },
    zoom: function(n, t) {
        var i = this.categoryAxis;
        i.parseDates && !i.equalSpacing ? this.timeZoom(n, t) : this.indexZoom(n, t)
    },
    timeZoom: function(n, t) {
        var r = this.maxSelectedTime,
            i, u, o;
        if (isNaN(r) || (t != this.endTime && t - n > r && (n = t - r, this.updateScrollbar = !0), n != this.startTime && t - n > r && (t = n + r, this.updateScrollbar = !0)), i = this.minSelectedTime, 0 < i && t - n < i && (o = Math.round(n + (t - n) / 2), i = Math.round(i / 2), n = o - i, t = o + i), u = this.chartData, o = this.categoryAxis, AmCharts.ifArray(u) && (n != this.startTime || t != this.endTime)) {
            var f = o.minDuration(),
                i = this.firstTime,
                e = this.lastTime;
            n || (n = i, isNaN(r) || (n = e - r));
            t || (t = e);
            n > e && (n = e);
            t < i && (t = i);
            n < i && (n = i);
            t > e && (t = e);
            t < n && (t = n + f);
            t - n < f / 5 && (t < e ? t = n + f / 5 : n = t - f / 5);
            this.startTime = n;
            this.endTime = t;
            r = u.length - 1;
            f = this.getClosestIndex(u, "time", n, !0, 0, r);
            u = this.getClosestIndex(u, "time", t, !1, f, r);
            o.timeZoom(n, t);
            o.zoom(f, u);
            this.start = AmCharts.fitToBounds(f, 0, r);
            this.end = AmCharts.fitToBounds(u, 0, r);
            this.zoomAxesAndGraphs();
            this.zoomScrollbar();
            n != i || t != e ? this.showZB(!0) : this.showZB(!1);
            this.updateColumnsDepth();
            this.dispatchTimeZoomEvent()
        }
    },
    indexZoom: function(n, t) {
        var i = this.maxSelectedSeries,
            r;
        isNaN(i) || (t != this.end && t - n > i && (n = t - i, this.updateScrollbar = !0), n != this.start && t - n > i && (t = n + i, this.updateScrollbar = !0));
        (n != this.start || t != this.end) && (r = this.chartData.length - 1, isNaN(n) && (n = 0, isNaN(i) || (n = r - i)), isNaN(t) && (t = r), t < n && (t = n), t > r && (t = r), n > r && (n = r - 1), 0 > n && (n = 0), this.start = n, this.end = t, this.categoryAxis.zoom(n, t), this.zoomAxesAndGraphs(), this.zoomScrollbar(), 0 !== n || t != this.chartData.length - 1 ? this.showZB(!0) : this.showZB(!1), this.updateColumnsDepth(), this.dispatchIndexZoomEvent())
    },
    updateGraphs: function() {
        var t, n, i;
        for (AmCharts.AmSerialChart.base.updateGraphs.call(this), t = this.graphs, n = 0; n < t.length; n++) i = t[n], i.columnWidth = this.columnWidth, i.categoryAxis = this.categoryAxis
    },
    updateColumnsDepth: function() {
        var n, t = this.graphs,
            i, r, u;
        for (AmCharts.remove(this.columnsSet), this.columnsArray = [], n = 0; n < t.length; n++)
            if (i = t[n], r = i.columnsArray, r)
                for (u = 0; u < r.length; u++) this.columnsArray.push(r[u]);
        if (this.columnsArray.sort(this.compareDepth), 0 < this.columnsArray.length) {
            for (t = this.container.set(), this.columnSet.push(t), n = 0; n < this.columnsArray.length; n++) t.push(this.columnsArray[n].column.set);
            i && t.translate(i.x, i.y);
            this.columnsSet = t
        }
    },
    compareDepth: function(n, t) {
        return n.depth > t.depth ? 1 : -1
    },
    zoomScrollbar: function() {
        var n = this.chartScrollbar,
            t = this.categoryAxis;
        n && this.updateScrollbar && (t.parseDates && !t.equalSpacing ? n.timeZoom(this.startTime, this.endTime) : n.zoom(this.start, this.end), this.updateScrollbar = !0)
    },
    updateTrendLines: function() {
        for (var i = this.trendLines, n, t = 0; t < i.length; t++) n = i[t], n.chart = this, n.valueAxis || (n.valueAxis = this.valueAxes[0]), n.categoryAxis = this.categoryAxis
    },
    zoomAxesAndGraphs: function() {
        if (!this.scrollbarOnly) {
            for (var t = this.valueAxes, n = 0; n < t.length; n++) t[n].zoom(this.start, this.end);
            for (t = this.graphs, n = 0; n < t.length; n++) t[n].zoom(this.start, this.end);
            this.zoomTrendLines();
            (n = this.chartCursor) && n.zoom(this.start, this.end, this.startTime, this.endTime)
        }
    },
    countColumns: function() {
        for (var t = 0, s = this.valueAxes.length, e = this.graphs.length, n, f, o = !1, i, u, r = 0; r < s; r++) {
            if (f = this.valueAxes[r], u = f.stackType, "100%" == u || "regular" == u)
                for (o = !1, i = 0; i < e; i++) n = this.graphs[i], n.hidden || n.valueAxis != f || "column" != n.type || (!o && n.stackable && (t++, o = !0), n.stackable || t++, n.columnIndex = t - 1);
            if ("none" == u || "3d" == u)
                for (i = 0; i < e; i++) n = this.graphs[i], n.hidden || n.valueAxis != f || "column" != n.type || (n.columnIndex = t, t++);
            if ("3d" == u) {
                for (r = 0; r < e; r++) n = this.graphs[r], n.depthCount = t;
                t = 1
            }
        }
        return t
    },
    parseData: function() {
        AmCharts.AmSerialChart.base.parseData.call(this);
        this.parseSerialData()
    },
    getCategoryIndexByValue: function(n) {
        for (var i = this.chartData, r, t = 0; t < i.length; t++) i[t].category == n && (r = t);
        return r
    },
    handleCursorChange: function(n) {
        this.updateLegendValues(n.index)
    },
    handleCursorZoom: function(n) {
        this.updateScrollbar = !0;
        this.zoom(n.start, n.end)
    },
    handleScrollbarZoom: function(n) {
        this.updateScrollbar = !1;
        this.zoom(n.start, n.end)
    },
    dispatchTimeZoomEvent: function() {
        var n;
        if (this.prevStartTime != this.startTime || this.prevEndTime != this.endTime) {
            n = {
                type: "zoomed"
            };
            n.startDate = new Date(this.startTime);
            n.endDate = new Date(this.endTime);
            n.startIndex = this.start;
            n.endIndex = this.end;
            this.startIndex = this.start;
            this.endIndex = this.end;
            this.startDate = n.startDate;
            this.endDate = n.endDate;
            this.prevStartTime = this.startTime;
            this.prevEndTime = this.endTime;
            var t = this.categoryAxis,
                i = AmCharts.extractPeriod(t.minPeriod).period,
                t = t.dateFormatsObject[i];
            n.startValue = AmCharts.formatDate(n.startDate, t);
            n.endValue = AmCharts.formatDate(n.endDate, t);
            n.chart = this;
            n.target = this;
            this.fire(n.type, n)
        }
    },
    dispatchIndexZoomEvent: function() {
        var t, n;
        (this.prevStartIndex != this.start || this.prevEndIndex != this.end) && (this.startIndex = this.start, this.endIndex = this.end, t = this.chartData, !AmCharts.ifArray(t) || isNaN(this.start) || isNaN(this.end) || (n = {
            chart: this,
            target: this,
            type: "zoomed"
        }, n.startIndex = this.start, n.endIndex = this.end, n.startValue = t[this.start].category, n.endValue = t[this.end].category, this.categoryAxis.parseDates && (this.startTime = t[this.start].time, this.endTime = t[this.end].time, n.startDate = new Date(this.startTime), n.endDate = new Date(this.endTime)), this.prevStartIndex = this.start, this.prevEndIndex = this.end, this.fire(n.type, n)))
    },
    updateLegendValues: function(n) {
        for (var r = this.graphs, i, t = 0; t < r.length; t++) i = r[t], i.currentDataItem = isNaN(n) ? void 0 : this.chartData[n].axes[i.valueAxis.id].graphs[i.id];
        this.legend && this.legend.updateValues()
    },
    getClosestIndex: function(n, t, i, r, u, f) {
        0 > u && (u = 0);
        f > n.length - 1 && (f = n.length - 1);
        var e = u + Math.round((f - u) / 2),
            o = n[e][t];
        return 1 >= f - u ? r ? u : (r = n[f][t], Math.abs(n[u][t] - i) < Math.abs(r - i) ? u : f) : i == o ? e : i < o ? this.getClosestIndex(n, t, i, r, u, e) : this.getClosestIndex(n, t, i, r, e, f)
    },
    zoomToIndexes: function(n, t) {
        var r, i;
        this.updateScrollbar = !0;
        r = this.chartData;
        r && (i = r.length, 0 < i && (0 > n && (n = 0), t > i - 1 && (t = i - 1), i = this.categoryAxis, i.parseDates && !i.equalSpacing ? this.zoom(r[n].time, this.getEndTime(r[t].time)) : this.zoom(n, t)))
    },
    zoomToDates: function(n, t) {
        var r, i;
        this.updateScrollbar = !0;
        i = this.chartData;
        this.categoryAxis.equalSpacing ? (r = this.getClosestIndex(i, "time", n.getTime(), !0, 0, i.length), i = this.getClosestIndex(i, "time", t.getTime(), !1, 0, i.length), this.zoom(r, i)) : this.zoom(n.getTime(), t.getTime())
    },
    zoomToCategoryValues: function(n, t) {
        this.updateScrollbar = !0;
        this.zoom(this.getCategoryIndexByValue(n), this.getCategoryIndexByValue(t))
    },
    formatString: function(n, t) {
        var u = t.graph,
            i, r, f;
        return -1 != n.indexOf("[[category]]") && (i = t.serialDataItem.category, this.categoryAxis.parseDates && (r = this.balloonDateFormat, f = this.chartCursor, f && (r = f.categoryBalloonDateFormat), -1 != n.indexOf("[[category]]") && (r = AmCharts.formatDate(i, r), -1 != r.indexOf("fff") && (r = AmCharts.formatMilliseconds(r, i)), i = r)), n = n.replace(/\[\[category\]\]/g, String(i))), u = u.numberFormatter, u || (u = this.numberFormatter), i = t.graph.valueAxis, (r = i.duration) && !isNaN(t.values.value) && (i = AmCharts.formatDuration(t.values.value, r, "", i.durationUnits, i.maxInterval, u), n = n.replace(RegExp("\\[\\[value\\]\\]", "g"), i)), i = "value open low high close total".split(" "), r = this.percentFormatter, n = AmCharts.formatValue(n, t.percents, i, r, "percents\\."), n = AmCharts.formatValue(n, t.values, i, u, "", this.usePrefixes, this.prefixesOfSmallNumbers, this.prefixesOfBigNumbers), n = AmCharts.formatValue(n, t.values, ["percents"], r), -1 != n.indexOf("[[") && (n = AmCharts.formatDataContextValue(n, t.dataContext)), AmCharts.AmSerialChart.base.formatString.call(this, n, t)
    },
    addChartScrollbar: function(n) {
        AmCharts.callMethod("destroy", [this.chartScrollbar]);
        n && (n.chart = this, this.listenTo(n, "zoomed", this.handleScrollbarZoom));
        this.rotate ? void 0 === n.width && (n.width = n.scrollbarHeight) : void 0 === n.height && (n.height = n.scrollbarHeight);
        this.chartScrollbar = n
    },
    removeChartScrollbar: function() {
        AmCharts.callMethod("destroy", [this.chartScrollbar]);
        this.chartScrollbar = null
    },
    handleReleaseOutside: function(n) {
        AmCharts.AmSerialChart.base.handleReleaseOutside.call(this, n);
        AmCharts.callMethod("handleReleaseOutside", [this.chartScrollbar])
    }
});
AmCharts.AmRadarChart = AmCharts.Class({
    inherits: AmCharts.AmCoordinateChart,
    construct: function() {
        AmCharts.AmRadarChart.base.construct.call(this);
        this.marginRight = this.marginBottom = this.marginTop = this.marginLeft = 0;
        this.chartType = "radar";
        this.radius = "35%"
    },
    initChart: function() {
        AmCharts.AmRadarChart.base.initChart.call(this);
        this.dataChanged && (this.updateData(), this.dataChanged = !1, this.dispatchDataUpdated = !0);
        this.drawChart()
    },
    updateData: function() {
        this.parseData();
        for (var t = this.graphs, n = 0; n < t.length; n++) t[n].data = this.chartData
    },
    updateGraphs: function() {
        for (var i = this.graphs, n, t = 0; t < i.length; t++) n = i[t], n.index = t, n.width = this.realRadius, n.height = this.realRadius, n.x = this.marginLeftReal, n.y = this.marginTopReal, n.chartType = this.chartType
    },
    parseData: function() {
        AmCharts.AmRadarChart.base.parseData.call(this);
        this.parseSerialData()
    },
    updateValueAxes: function() {
        for (var i = this.valueAxes, n, t = 0; t < i.length; t++) n = i[t], n.axisRenderer = AmCharts.RadAxis, n.guideFillRenderer = AmCharts.RadarFill, n.axisItemRenderer = AmCharts.RadItem, n.autoGridCount = !1, n.x = this.marginLeftReal, n.y = this.marginTopReal, n.width = this.realRadius, n.height = this.realRadius
    },
    drawChart: function() {
        AmCharts.AmRadarChart.base.drawChart.call(this);
        var n = this.updateWidth(),
            r = this.updateHeight(),
            t = this.marginTop + this.getTitleHeight(),
            i = this.marginLeft,
            r = r - t - this.marginBottom;
        if (this.marginLeftReal = i + (n - i - this.marginRight) / 2, this.marginTopReal = t + r / 2, this.realRadius = AmCharts.toCoordinate(this.radius, n, r), this.updateValueAxes(), this.updateGraphs(), n = this.chartData, AmCharts.ifArray(n)) {
            if (0 < this.realWidth && 0 < this.realHeight) {
                for (n = n.length - 1, i = this.valueAxes, t = 0; t < i.length; t++) i[t].zoom(0, n);
                for (i = this.graphs, t = 0; t < i.length; t++) i[t].zoom(0, n);
                (n = this.legend) && n.invalidateSize()
            }
        } else this.cleanChart();
        this.dispDUpd();
        this.chartCreated = !0
    },
    formatString: function(n, t) {
        var i = t.graph;
        return -1 != n.indexOf("[[category]]") && (n = n.replace(/\[\[category\]\]/g, String(t.serialDataItem.category))), i = i.numberFormatter, i || (i = this.numberFormatter), n = AmCharts.formatValue(n, t.values, ["value"], i, "", this.usePrefixes, this.prefixesOfSmallNumbers, this.prefixesOfBigNumbers), -1 != n.indexOf("[[") && (n = AmCharts.formatDataContextValue(n, t.dataContext)), AmCharts.AmRadarChart.base.formatString.call(this, n, t)
    },
    cleanChart: function() {
        AmCharts.callMethod("destroy", [this.valueAxes, this.graphs])
    }
});
AmCharts.AxisBase = AmCharts.Class({
    construct: function() {
        this.viY = this.viX = this.y = this.x = this.dy = this.dx = 0;
        this.axisThickness = 1;
        this.axisColor = "#000000";
        this.axisAlpha = 1;
        this.gridCount = this.tickLength = 5;
        this.gridAlpha = .15;
        this.gridThickness = 1;
        this.gridColor = "#000000";
        this.dashLength = 0;
        this.labelFrequency = 1;
        this.showLastLabel = this.showFirstLabel = !0;
        this.fillColor = "#FFFFFF";
        this.fillAlpha = 0;
        this.labelsEnabled = !0;
        this.labelRotation = 0;
        this.autoGridCount = !0;
        this.valueRollOverColor = "#CC0000";
        this.offset = 0;
        this.guides = [];
        this.visible = !0;
        this.counter = 0;
        this.guides = [];
        this.ignoreAxisWidth = this.inside = !1;
        this.minGap = 75;
        this.titleBold = !0
    },
    zoom: function(n, t) {
        this.start = n;
        this.end = t;
        this.dataChanged = !0;
        this.draw()
    },
    fixAxisPosition: function() {
        var n = this.position;
        "H" == this.orientation ? ("left" == n && (n = "bottom"), "right" == n && (n = "top")) : ("bottom" == n && (n = "left"), "top" == n && (n = "right"));
        this.position = n
    },
    draw: function() {
        var n = this.chart,
            t, i;
        void 0 === this.titleColor && (this.titleColor = n.color);
        isNaN(this.titleFontSize) && (this.titleFontSize = n.fontSize + 1);
        this.allLabels = [];
        this.counter = 0;
        this.destroy();
        this.fixAxisPosition();
        this.labels = [];
        t = n.container;
        i = t.set();
        n.gridSet.push(i);
        this.set = i;
        t = t.set();
        n.axesLabelsSet.push(t);
        this.labelsSet = t;
        this.axisLine = new this.axisRenderer(this);
        this.autoGridCount && ("V" == this.orientation ? (n = this.height / 35, 3 > n && (n = 3)) : n = this.width / this.minGap, this.gridCount = Math.max(n, 1));
        this.axisWidth = this.axisLine.axisWidth;
        this.addTitle()
    },
    setOrientation: function(n) {
        this.orientation = n ? "H" : "V"
    },
    addTitle: function() {
        var t = this.title,
            n;
        t && (n = this.chart, this.titleLabel = AmCharts.text(n.container, t, this.titleColor, n.fontFamily, this.titleFontSize, "middle", this.titleBold))
    },
    positionTitle: function() {
        var r = this.titleLabel,
            t, u, n, i, f;
        if (r) {
            i = this.labelsSet;
            n = {};
            0 < i.length() ? n = i.getBBox() : (n.x = 0, n.y = 0, n.width = this.viW, n.height = this.viH);
            i.push(r);
            i = n.x;
            f = n.y;
            AmCharts.VML && (this.rotate ? i -= this.x : f -= this.y);
            var l = n.width,
                n = n.height,
                s = this.viW,
                h = this.viH;
            r.getBBox();
            var e = 0,
                o = this.titleFontSize / 2,
                c = this.inside;
            switch (this.position) {
                case "top":
                    t = s / 2;
                    u = f - 10 - o;
                    break;
                case "bottom":
                    t = s / 2;
                    u = f + n + 10 + o;
                    break;
                case "left":
                    t = i - 10 - o;
                    c && (t -= 5);
                    u = h / 2;
                    e = -90;
                    break;
                case "right":
                    t = i + l + 10 + o - 3;
                    c && (t += 7);
                    u = h / 2;
                    e = -90
            }
            this.marginsChanged ? (r.translate(t, u), this.tx = t, this.ty = u) : r.translate(this.tx, this.ty);
            this.marginsChanged = !1;
            0 !== e && r.rotate(e)
        }
    },
    pushAxisItem: function(n, t) {
        var i = n.graphics();
        0 < i.length() && (t ? this.labelsSet.push(i) : this.set.push(i));
        (i = n.getLabel()) && this.labelsSet.push(i)
    },
    addGuide: function(n) {
        this.guides.push(n)
    },
    removeGuide: function(n) {
        for (var i = this.guides, t = 0; t < i.length; t++) i[t] == n && i.splice(t, 1)
    },
    handleGuideOver: function(n) {
        clearTimeout(this.chart.hoverInt);
        var t = n.graphics.getBBox(),
            r = t.x + t.width / 2,
            t = t.y + t.height / 2,
            i = n.fillColor;
        void 0 === i && (i = n.lineColor);
        this.chart.showBalloon(n.balloonText, i, !0, r, t)
    },
    handleGuideOut: function() {
        this.chart.hideBalloon()
    },
    addEventListeners: function(n, t) {
        var i = this;
        n.mouseover(function() {
            i.handleGuideOver(t)
        });
        n.mouseout(function() {
            i.handleGuideOut(t)
        })
    },
    getBBox: function() {
        var n = this.labelsSet.getBBox();
        return AmCharts.VML || (n = {
            x: n.x + this.x,
            y: n.y + this.y,
            width: n.width,
            height: n.height
        }), n
    },
    destroy: function() {
        AmCharts.remove(this.set);
        AmCharts.remove(this.labelsSet);
        var n = this.axisLine;
        n && AmCharts.remove(n.set);
        AmCharts.remove(this.grid0)
    }
});
AmCharts.ValueAxis = AmCharts.Class({
    inherits: AmCharts.AxisBase,
    construct: function() {
        this.createEvents("axisChanged", "logarithmicAxisFailed", "axisSelfZoomed", "axisZoomed");
        AmCharts.ValueAxis.base.construct.call(this);
        this.dataChanged = !0;
        this.gridCount = 8;
        this.stackType = "none";
        this.position = "left";
        this.unitPosition = "right";
        this.recalculateToPercents = this.includeHidden = this.includeGuidesInMinMax = this.integersOnly = !1;
        this.durationUnits = {
            DD: "d. ",
            hh: ":",
            mm: ":",
            ss: ""
        };
        this.scrollbar = !1;
        this.baseValue = 0;
        this.radarCategoriesEnabled = !0;
        this.gridType = "polygons";
        this.useScientificNotation = !1;
        this.axisTitleOffset = 10;
        this.minMaxMultiplier = 1
    },
    updateData: function() {
        0 >= this.gridCount && (this.gridCount = 1);
        this.totals = [];
        this.data = this.chart.chartData;
        "xy" != this.chart.chartType && (this.stackGraphs("smoothedLine"), this.stackGraphs("line"), this.stackGraphs("column"), this.stackGraphs("step"));
        this.recalculateToPercents && this.recalculate();
        this.synchronizationMultiplier && this.synchronizeWith ? this.foundGraphs = !0 : (this.foundGraphs = !1, this.getMinMax())
    },
    draw: function() {
        var u, p, v, e, t, s, c, b, l;
        if (AmCharts.ValueAxis.base.draw.call(this), u = this.chart, p = this.set, "duration" == this.type && (this.duration = "ss"), !0 === this.dataChanged && (this.updateData(), this.dataChanged = !1), this.logarithmic && (0 >= this.getMin(0, this.data.length - 1) || 0 >= this.minimum)) this.fire("logarithmicAxisFailed", {
            type: "logarithmicAxisFailed",
            chart: u
        });
        else {
            this.grid0 = null;
            var n, r, tt = u.dx,
                it = u.dy,
                rt = !1,
                o = this.logarithmic,
                a = u.chartType;
            if (isNaN(this.min) || isNaN(this.max) || !this.foundGraphs || Infinity == this.min || -Infinity == this.max) rt = !0;
            else {
                var ut = this.labelFrequency,
                    ft = this.showFirstLabel,
                    et = this.showLastLabel,
                    d = 1,
                    i = 0,
                    h = Math.round((this.max - this.min) / this.step) + 1,
                    w;
                if (!0 === o ? (w = Math.log(this.max) * Math.LOG10E - Math.log(this.minReal) * Math.LOG10E, this.stepWidth = this.axisWidth / w, 2 < w && (h = Math.ceil(Math.log(this.max) * Math.LOG10E) + 1, i = Math.round(Math.log(this.minReal) * Math.LOG10E), h > this.gridCount && (d = Math.ceil(h / this.gridCount)))) : this.stepWidth = this.axisWidth / (this.max - this.min), n = 0, 1 > this.step && -1 < this.step && (n = this.getDecimals(this.step)), this.integersOnly && (n = 0), n > this.maxDecCount && (n = this.maxDecCount), v = this.precision, isNaN(v) || (n = v), this.max = AmCharts.roundTo(this.max, this.maxDecCount), this.min = AmCharts.roundTo(this.min, this.maxDecCount), e = {}, e.precision = n, e.decimalSeparator = u.numberFormatter.decimalSeparator, e.thousandsSeparator = u.numberFormatter.thousandsSeparator, this.numberFormatter = e, s = this.guides, c = s.length, 0 < c) {
                    for (b = this.fillAlpha, r = this.fillAlpha = 0; r < c; r++) {
                        var f = s[r],
                            y = NaN,
                            g = f.above;
                        isNaN(f.toValue) || (y = this.getCoordinate(f.toValue), t = new this.axisItemRenderer(this, y, "", !0, NaN, NaN, f), this.pushAxisItem(t, g));
                        l = NaN;
                        isNaN(f.value) || (l = this.getCoordinate(f.value), t = new this.axisItemRenderer(this, l, f.label, !0, NaN, (y - l) / 2, f), this.pushAxisItem(t, g));
                        isNaN(y - l) || (t = new this.guideFillRenderer(this, l, y, f), this.pushAxisItem(t, g), t = t.graphics(), f.graphics = t, f.balloonText && this.addEventListeners(t, f))
                    }
                    this.fillAlpha = b
                }
                for (s = !1, r = i; r < h; r += d) t = AmCharts.roundTo(this.step * r + this.min, n), -1 != String(t).indexOf("e") && (s = !0, String(t).split("e"));
                for (this.duration && (this.maxInterval = AmCharts.getMaxInterval(this.max, this.duration)), r = i; r < h; r += d)
                    if ((i = this.step * r + this.min, i = AmCharts.roundTo(i, this.maxDecCount + 1), !this.integersOnly || Math.round(i) == i) && (isNaN(v) || Number(AmCharts.toFixed(i, v)) == i) && (!0 === o && (0 === i && (i = this.minReal), 2 < w && (i = Math.pow(10, r)), s = -1 != String(i).indexOf("e") ? !0 : !1), this.useScientificNotation && (s = !0), this.usePrefixes && (s = !1), s ? (t = -1 == String(i).indexOf("e") ? i.toExponential(15) : String(i), t = t.split("e"), n = Number(t[0]), t = Number(t[1]), n = AmCharts.roundTo(n, 14), 10 == n && (n = 1, t += 1), t = n + "e" + t, 0 === i && (t = "0"), 1 == i && (t = "1")) : (o && (n = String(i).split("."), e.precision = n[1] ? n[1].length : -1), t = this.usePrefixes ? AmCharts.addPrefix(i, u.prefixesOfBigNumbers, u.prefixesOfSmallNumbers, e, !0) : AmCharts.formatNumber(i, e, e.precision)), this.duration && (t = AmCharts.formatDuration(i, this.duration, "", this.durationUnits, this.maxInterval, e)), this.recalculateToPercents ? t += "%" : (n = this.unit) && (t = "left" == this.unitPosition ? n + t : t + n), Math.round(r / ut) != r / ut && (t = void 0), (0 !== r || ft) && (r != h - 1 || et) || (t = " "), n = this.getCoordinate(i), this.labelFunction && (t = this.labelFunction(i, t, this)), t = new this.axisItemRenderer(this, n, t), this.pushAxisItem(t), i == this.baseValue && "radar" != a)) {
                        var k, nt, c = this.viW,
                            b = this.viH,
                            i = this.viX;
                        t = this.viY;
                        "H" == this.orientation ? 0 <= n && n <= c + 1 && (k = [n, n, n + tt], nt = [b, 0, it]) : 0 <= n && n <= b + 1 && (k = [0, c, c + tt], nt = [n, n, n + it]);
                        k && (n = AmCharts.fitToBounds(2 * this.gridAlpha, 0, 1), n = AmCharts.line(u.container, k, nt, this.gridColor, n, 1, this.dashLength), n.translate(i, t), this.grid0 = n, u.axesSet.push(n), n.toBack())
                    }
                r = this.baseValue;
                this.min > this.baseValue && this.max > this.baseValue && (r = this.min);
                this.min < this.baseValue && this.max < this.baseValue && (r = this.max);
                o && r < this.minReal && (r = this.minReal);
                this.baseCoord = this.getCoordinate(r);
                u = {
                    type: "axisChanged",
                    target: this,
                    chart: u
                };
                u.min = o ? this.minReal : this.min;
                u.max = this.max;
                this.fire("axisChanged", u);
                this.axisCreated = !0
            }
            o = this.axisLine.set;
            u = this.labelsSet;
            this.positionTitle();
            "radar" != a ? (a = this.viX, r = this.viY, p.translate(a, r), u.translate(a, r)) : o.toFront();
            !this.visible || rt ? (p.hide(), o.hide(), u.hide()) : (p.show(), o.show(), u.show())
        }
    },
    getDecimals: function(n) {
        var t = 0;
        return isNaN(n) || (n = String(n), -1 != n.indexOf("e-") ? t = Number(n.split("-")[1]) : -1 != n.indexOf(".") && (t = n.split(".")[1].length)), t
    },
    stackGraphs: function(n) {
        var e = this.stackType,
            v, y;
        "stacked" == e && (e = "regular");
        "line" == e && (e = "none");
        "100% stacked" == e && (e = "100%");
        this.stackType = e;
        var o = [],
            s = [],
            h = [],
            c = [],
            u, l = this.chart.graphs,
            t, i, r, f, p = this.baseValue,
            a = !1;
        if (("line" == n || "step" == n || "smoothedLine" == n) && (a = !0), a && ("regular" == e || "100%" == e))
            for (f = 0; f < l.length; f++) r = l[f], r.hidden || (i = r.type, r.chart == this.chart && r.valueAxis == this && n == i && r.stackable && (t && (r.stackGraph = t), t = r));
        for (t = this.start; t <= this.end; t++)
            for (v = 0, f = 0; f < l.length; f++)(r = l[f], r.hidden || (i = r.type, r.chart != this.chart || r.valueAxis != this || n != i || !r.stackable || (i = this.data[t].axes[this.id].graphs[r.id], u = i.values.value, isNaN(u)))) || (y = this.getDecimals(u), v < y && (v = y), isNaN(c[t]) ? c[t] = Math.abs(u) : c[t] += Math.abs(u), c[t] = AmCharts.roundTo(c[t], v), r = r.fillToGraph, a && r && (r = this.data[t].axes[this.id].graphs[r.id]) && (i.values.open = r.values.value), "regular" == e && (a && (isNaN(o[t]) ? (o[t] = u, i.values.close = u, i.values.open = this.baseValue) : (i.values.close = isNaN(u) ? o[t] : u + o[t], i.values.open = o[t], o[t] = i.values.close)), "column" != n || isNaN(u) || (i.values.close = u, 0 > u ? (i.values.close = u, isNaN(s[t]) ? i.values.open = p : (i.values.close += s[t], i.values.open = s[t]), s[t] = i.values.close) : (i.values.close = u, isNaN(h[t]) ? i.values.open = p : (i.values.close += h[t], i.values.open = h[t]), h[t] = i.values.close))));
        for (t = this.start; t <= this.end; t++)
            for (f = 0; f < l.length; f++) r = l[f], r.hidden || (i = r.type, r.chart == this.chart && r.valueAxis == this && n == i && r.stackable && (i = this.data[t].axes[this.id].graphs[r.id], u = i.values.value, isNaN(u) || (o = 100 * (u / c[t]), i.values.percents = o, i.values.total = c[t], "100%" == e && (isNaN(s[t]) && (s[t] = 0), isNaN(h[t]) && (h[t] = 0), 0 > o ? (i.values.close = AmCharts.fitToBounds(o + s[t], -100, 100), i.values.open = s[t], s[t] = i.values.close) : (i.values.close = AmCharts.fitToBounds(o + h[t], -100, 100), i.values.open = h[t], h[t] = i.values.close)))))
    },
    recalculate: function() {
        for (var s = this.chart.graphs, t, i, e, r, u, f = 0; f < s.length; f++)
            if (t = s[f], t.valueAxis == this) {
                i = "value";
                ("candlestick" == t.type || "ohlc" == t.type) && (i = "open");
                var o, n, h = this.end + 2,
                    h = AmCharts.fitToBounds(this.end + 1, 0, this.data.length - 1),
                    r = this.start;
                for (0 < r && r--, n = this.start, t.compareFromStart && (n = 0), e = n; e <= h && (n = this.data[e].axes[this.id].graphs[t.id], o = n.values[i], isNaN(o)); e++);
                for (i = r; i <= h; i++) {
                    n = this.data[i].axes[this.id].graphs[t.id];
                    n.percents = {};
                    r = n.values;
                    for (u in r) n.percents[u] = "percents" != u ? 100 * (r[u] / o) - 100 : r[u]
                }
            }
    },
    getMinMax: function() {
        for (var i = !1, r = this.chart, n = r.graphs, u, t = 0; t < n.length; t++) u = n[t].type, ("line" == u || "step" == u || "smoothedLine" == u) && this.expandMinMax && (i = !0);
        if (i && (0 < this.start && this.start--, this.end < this.data.length - 1 && this.end++), "serial" == r.chartType && (!0 !== r.categoryAxis.parseDates || i || this.end < this.data.length - 1 && this.end++), i = this.minMaxMultiplier, this.min = this.getMin(this.start, this.end), this.max = this.getMax(), i = (this.max - this.min) * (i - 1), this.min -= i, this.max += i, i = this.guides.length, this.includeGuidesInMinMax && 0 < i)
            for (r = 0; r < i; r++) n = this.guides[r], n.toValue < this.min && (this.min = n.toValue), n.value < this.min && (this.min = n.value), n.toValue > this.max && (this.max = n.toValue), n.value > this.max && (this.max = n.value);
        isNaN(this.minimum) || (this.min = this.minimum);
        isNaN(this.maximum) || (this.max = this.maximum);
        this.min > this.max && (i = this.max, this.max = this.min, this.min = i);
        isNaN(this.minTemp) || (this.min = this.minTemp);
        isNaN(this.maxTemp) || (this.max = this.maxTemp);
        this.minReal = this.min;
        this.maxReal = this.max;
        0 === this.min && 0 === this.max && (this.max = 9);
        this.min > this.max && (this.min = this.max - 1);
        i = this.min;
        r = this.max;
        n = this.max - this.min;
        t = 0 === n ? Math.pow(10, Math.floor(Math.log(Math.abs(this.max)) * Math.LOG10E)) / 10 : Math.pow(10, Math.floor(Math.log(Math.abs(n)) * Math.LOG10E)) / 10;
        isNaN(this.maximum) && isNaN(this.maxTemp) && (this.max = Math.ceil(this.max / t) * t + t);
        isNaN(this.minimum) && isNaN(this.minTemp) && (this.min = Math.floor(this.min / t) * t - t);
        0 > this.min && 0 <= i && (this.min = 0);
        0 < this.max && 0 >= r && (this.max = 0);
        "100%" == this.stackType && (this.min = 0 > this.min ? -100 : 0, this.max = 0 > this.max ? 0 : 100);
        n = this.max - this.min;
        t = Math.pow(10, Math.floor(Math.log(Math.abs(n)) * Math.LOG10E)) / 10;
        this.step = Math.ceil(n / this.gridCount / t) * t;
        n = Math.pow(10, Math.floor(Math.log(Math.abs(this.step)) * Math.LOG10E));
        n = n.toExponential(0).split("e");
        t = Number(n[1]);
        9 == Number(n[0]) && t++;
        n = this.generateNumber(1, t);
        t = Math.ceil(this.step / n);
        5 < t && (t = 10);
        5 >= t && 2 < t && (t = 5);
        this.step = Math.ceil(this.step / (n * t)) * n * t;
        1 > n ? (this.maxDecCount = Math.abs(Math.log(Math.abs(n)) * Math.LOG10E), this.maxDecCount = Math.round(this.maxDecCount), this.step = AmCharts.roundTo(this.step, this.maxDecCount + 1)) : this.maxDecCount = 0;
        this.min = this.step * Math.floor(this.min / this.step);
        this.max = this.step * Math.ceil(this.max / this.step);
        0 > this.min && 0 <= i && (this.min = 0);
        0 < this.max && 0 >= r && (this.max = 0);
        1 < this.minReal && 1 < this.max - this.minReal && (this.minReal = Math.floor(this.minReal));
        n = Math.pow(10, Math.floor(Math.log(Math.abs(this.minReal)) * Math.LOG10E));
        0 === this.min && (this.minReal = n);
        0 === this.min && 1 < this.minReal && (this.minReal = 1);
        0 < this.min && 0 < this.minReal - this.step && (this.minReal = this.min + this.step < this.minReal ? this.min + this.step : this.min);
        n = Math.log(r) * Math.LOG10E - Math.log(i) * Math.LOG10E;
        this.logarithmic && (2 < n ? (this.minReal = this.min = Math.pow(10, Math.floor(Math.log(Math.abs(i)) * Math.LOG10E)), this.max = Math.pow(10, Math.ceil(Math.log(Math.abs(r)) * Math.LOG10E))) : (r = Math.pow(10, Math.floor(Math.log(Math.abs(this.min)) * Math.LOG10E)) / 10, i = Math.pow(10, Math.floor(Math.log(Math.abs(i)) * Math.LOG10E)) / 10, r < i && (this.minReal = this.min = 10 * i)))
    },
    generateNumber: function(n, t) {
        for (var i = "", u = 0 > t ? Math.abs(t) - 1 : Math.abs(t), r = 0; r < u; r++) i += "0";
        return 0 > t ? Number("0." + i + String(n)) : Number(String(n) + i)
    },
    getMin: function(n, t) {
        for (var r, f, e, i, u, o, s = n; s <= t; s++) {
            f = this.data[s].axes[this.id].graphs;
            for (e in f)
                if (f.hasOwnProperty(e) && (i = this.chart.getGraphById(e), i.includeInMinMax && (!i.hidden || this.includeHidden)))
                    if (isNaN(r) && (r = Infinity), this.foundGraphs = !0, i = f[e].values, this.recalculateToPercents && (i = f[e].percents), this.minMaxField) u = i[this.minMaxField], u < r && (r = u);
                    else
                        for (o in i) i.hasOwnProperty(o) && "percents" != o && "total" != o && (u = i[o], u < r && (r = u))
        }
        return r
    },
    getMax: function() {
        for (var t, r, u, n, i, f, e = this.start; e <= this.end; e++) {
            r = this.data[e].axes[this.id].graphs;
            for (u in r)
                if (r.hasOwnProperty(u) && (n = this.chart.getGraphById(u), n.includeInMinMax && (!n.hidden || this.includeHidden)))
                    if (isNaN(t) && (t = -Infinity), this.foundGraphs = !0, n = r[u].values, this.recalculateToPercents && (n = r[u].percents), this.minMaxField) i = n[this.minMaxField], i > t && (t = i);
                    else
                        for (f in n) n.hasOwnProperty(f) && "percents" != f && "total" != f && (i = n[f], i > t && (t = i))
        }
        return t
    },
    dispatchZoomEvent: function(n, t) {
        var i = {
            type: "axisZoomed",
            startValue: n,
            endValue: t,
            target: this,
            chart: this.chart
        };
        this.fire(i.type, i)
    },
    zoomToValues: function(n, t) {
        if (t < n) {
            var i = t;
            t = n;
            n = i
        }
        n < this.min && (n = this.min);
        t > this.max && (t = this.max);
        i = {
            type: "axisSelfZoomed"
        };
        i.chart = this.chart;
        i.valueAxis = this;
        i.multiplier = this.axisWidth / Math.abs(this.getCoordinate(t) - this.getCoordinate(n));
        i.position = "V" == this.orientation ? this.reversed ? this.getCoordinate(n) : this.getCoordinate(t) : this.reversed ? this.getCoordinate(t) : this.getCoordinate(n);
        this.fire(i.type, i)
    },
    coordinateToValue: function(n) {
        if (isNaN(n)) return NaN;
        var i = this.axisWidth,
            t = this.stepWidth,
            u = this.reversed,
            f = this.rotate,
            r = this.min,
            e = this.minReal;
        return !0 === this.logarithmic ? Math.pow(10, (f ? !0 === u ? (i - n) / t : n / t : !0 === u ? n / t : (i - n) / t) + Math.log(e) * Math.LOG10E) : !0 === u ? f ? r - (n - i) / t : n / t + r : f ? n / t + r : r - (n - i) / t
    },
    getCoordinate: function(n) {
        if (isNaN(n)) return NaN;
        var t = this.rotate,
            f = this.reversed,
            r = this.axisWidth,
            i = this.stepWidth,
            u = this.min,
            e = this.minReal;
        return !0 === this.logarithmic ? (n = Math.log(n) * Math.LOG10E - Math.log(e) * Math.LOG10E, t = t ? !0 === f ? r - i * n : i * n : !0 === f ? i * n : r - i * n) : t = !0 === f ? t ? r - i * (n - u) : i * (n - u) : t ? i * (n - u) : r - i * (n - u), t = this.rotate ? t + (this.x - this.viX) : t + (this.y - this.viY), Math.round(t)
    },
    synchronizeWithAxis: function(n) {
        this.synchronizeWith = n;
        this.removeListener(this.synchronizeWith, "axisChanged", this.handleSynchronization);
        this.listenTo(this.synchronizeWith, "axisChanged", this.handleSynchronization)
    },
    handleSynchronization: function(n) {
        var t = this.synchronizeWith;
        n = t.min;
        var r = t.max,
            t = t.step,
            i = this.synchronizationMultiplier;
        i && (this.min = n * i, this.max = r * i, this.step = t * i, n = Math.pow(10, Math.floor(Math.log(Math.abs(this.step)) * Math.LOG10E)), n = Math.abs(Math.log(Math.abs(n)) * Math.LOG10E), this.maxDecCount = n = Math.round(n), this.draw())
    }
});
AmCharts.CategoryAxis = AmCharts.Class({
    inherits: AmCharts.AxisBase,
    construct: function() {
        AmCharts.CategoryAxis.base.construct.call(this);
        this.minPeriod = "DD";
        this.equalSpacing = this.parseDates = !1;
        this.position = "bottom";
        this.startOnAxis = !1;
        this.firstDayOfWeek = 1;
        this.gridPosition = "middle";
        this.markPeriodChange = this.boldPeriodBeginning = !0;
        this.safeDistance = 30;
        this.centerLabelOnFullPeriod = !0;
        this.periods = [{
            period: "ss",
            count: 1
        }, {
            period: "ss",
            count: 5
        }, {
            period: "ss",
            count: 10
        }, {
            period: "ss",
            count: 30
        }, {
            period: "mm",
            count: 1
        }, {
            period: "mm",
            count: 5
        }, {
            period: "mm",
            count: 10
        }, {
            period: "mm",
            count: 30
        }, {
            period: "hh",
            count: 1
        }, {
            period: "hh",
            count: 3
        }, {
            period: "hh",
            count: 6
        }, {
            period: "hh",
            count: 12
        }, {
            period: "DD",
            count: 1
        }, {
            period: "DD",
            count: 2
        }, {
            period: "DD",
            count: 3
        }, {
            period: "DD",
            count: 4
        }, {
            period: "DD",
            count: 5
        }, {
            period: "WW",
            count: 1
        }, {
            period: "MM",
            count: 1
        }, {
            period: "MM",
            count: 2
        }, {
            period: "MM",
            count: 3
        }, {
            period: "MM",
            count: 6
        }, {
            period: "YYYY",
            count: 1
        }, {
            period: "YYYY",
            count: 2
        }, {
            period: "YYYY",
            count: 5
        }, {
            period: "YYYY",
            count: 10
        }, {
            period: "YYYY",
            count: 50
        }, {
            period: "YYYY",
            count: 100
        }];
        this.dateFormats = [{
            period: "fff",
            format: "JJ:NN:SS"
        }, {
            period: "ss",
            format: "JJ:NN:SS"
        }, {
            period: "mm",
            format: "JJ:NN"
        }, {
            period: "hh",
            format: "JJ:NN"
        }, {
            period: "DD",
            format: "MMM DD"
        }, {
            period: "WW",
            format: "MMM DD"
        }, {
            period: "MM",
            format: "MMM"
        }, {
            period: "YYYY",
            format: "YYYY"
        }];
        this.nextPeriod = {};
        this.nextPeriod.fff = "ss";
        this.nextPeriod.ss = "mm";
        this.nextPeriod.mm = "hh";
        this.nextPeriod.hh = "DD";
        this.nextPeriod.DD = "MM";
        this.nextPeriod.MM = "YYYY"
    },
    draw: function() {
        var e, a, s, h, y, k, f, d, g;
        if (AmCharts.CategoryAxis.base.draw.call(this), this.generateDFObject(), e = this.chart.chartData, this.data = e, AmCharts.ifArray(e)) {
            var t, p = this.chart,
                o = this.start,
                c = this.labelFrequency,
                v = 0;
            t = this.end - o + 1;
            var f = this.gridCount,
                w = this.showFirstLabel,
                u = this.showLastLabel,
                r, n = "",
                n = AmCharts.extractPeriod(this.minPeriod);
            r = AmCharts.getPeriodDuration(n.period, n.count);
            a = this.rotate;
            var i = this.firstDayOfWeek,
                l = this.boldPeriodBeginning,
                e = AmCharts.resetDateToMin(new Date(e[e.length - 1].time + 1.05 * r), this.minPeriod, 1, i).getTime(),
                b;
            if (this.endTime > e && (this.endTime = e), this.parseDates && !this.equalSpacing) {
                if (this.timeDifference = this.endTime - this.startTime, o = this.choosePeriod(0), c = o.period, a = o.count, s = AmCharts.getPeriodDuration(c, a), s < r && (c = n.period, a = n.count, s = r), h = c, "WW" == h && (h = "DD"), this.stepWidth = this.getStepWidth(this.timeDifference), f = Math.ceil(this.timeDifference / s) + 5, d = n = AmCharts.resetDateToMin(new Date(this.startTime - s), c, a, i).getTime(), h == c && 1 == a && this.centerLabelOnFullPeriod && (y = s * this.stepWidth), this.cellWidth = r * this.stepWidth, t = Math.round(n / s), o = -1, t / 2 == Math.round(t / 2) && (o = -2, n -= s), g = p.firstTime, 0 < this.gridCount)
                    for (t = o; t <= f; t++) e = g + s * (t + .1 + Math.floor((d - g) / s)), e = AmCharts.resetDateToMin(new Date(e), c, a, i).getTime(), r = (e - this.startTime) * this.stepWidth, k = !1, this.nextPeriod[h] && (k = this.checkPeriodChange(this.nextPeriod[h], 1, e, n)), b = !1, k && this.markPeriodChange ? (n = this.dateFormatsObject[this.nextPeriod[h]], b = !0) : n = this.dateFormatsObject[h], l || (b = !1), n = AmCharts.formatDate(new Date(e), n), (t != o || w) && (t != f || u) || (n = " "), this.labelFunction && (n = this.labelFunction(n, new Date(e), this)), n = new this.axisItemRenderer(this, r, n, !1, y, 0, !1, b), this.pushAxisItem(n), n = e
            } else if (this.parseDates) {
                if (this.parseDates && this.equalSpacing) {
                    if (v = this.start, this.startTime = this.data[this.start].time, this.endTime = this.data[this.end].time, this.timeDifference = this.endTime - this.startTime, o = this.choosePeriod(0), c = o.period, a = o.count, s = AmCharts.getPeriodDuration(c, a), s < r && (c = n.period, a = n.count, s = r), h = c, "WW" == h && (h = "DD"), this.stepWidth = this.getStepWidth(t), f = Math.ceil(this.timeDifference / s) + 5, n = AmCharts.resetDateToMin(new Date(this.startTime - s), c, a, i).getTime(), this.cellWidth = this.getStepWidth(t), t = Math.round(n / s), o = -1, t / 2 == Math.round(t / 2) && (o = -2, n -= s), r = this.start, r / 2 == Math.round(r / 2) && r--, 0 > r && (r = 0), y = this.end + 2, y >= this.data.length && (y = this.data.length), s = !1, s = !w, this.previousPos = -1e3, 20 < this.labelRotation && (this.safeDistance = 5), this.data[r].time != AmCharts.resetDateToMin(new Date(this.data[r].time), c, a, i).getTime())
                        for (i = 0, d = n, t = r; t < y; t++) e = this.data[t].time, this.checkPeriodChange(c, a, e, d) && (i++, 2 <= i && (r = t, t = y), d = e);
                    for (t = r; t < y; t++)(e = this.data[t].time, this.checkPeriodChange(c, a, e, n)) && (r = this.getCoordinate(t - this.start), k = !1, this.nextPeriod[h] && (k = this.checkPeriodChange(this.nextPeriod[h], 1, e, n)), b = !1, k && this.markPeriodChange ? (n = this.dateFormatsObject[this.nextPeriod[h]], b = !0) : n = this.dateFormatsObject[h], n = AmCharts.formatDate(new Date(e), n), (t != o || w) && (t != f || u) || (n = " "), s ? s = !1 : (l || (b = !1), r - this.previousPos > this.safeDistance * Math.cos(this.labelRotation * Math.PI / 180) && (this.labelFunction && (n = this.labelFunction(n, new Date(e), this)), n = new this.axisItemRenderer(this, r, n, void 0, void 0, void 0, void 0, b), i = n.graphics(), this.pushAxisItem(n), i = i.getBBox().width, AmCharts.isModern || (i -= r), this.previousPos = r + i)), n = e)
                }
            } else if (this.cellWidth = this.getStepWidth(t), t < f && (f = t), v += this.start, this.stepWidth = this.getStepWidth(t), 0 < f)
                for (l = Math.floor(t / f), r = v, r / 2 == Math.round(r / 2) && r--, 0 > r && (r = 0), f = 0, t = r; t <= this.end + 2; t++)(0 <= t && t < this.data.length ? (h = this.data[t], n = h.category) : n = "", t / l == Math.round(t / l) || h.forceShow) && (r = this.getCoordinate(t - v), i = 0, "start" == this.gridPosition && (r -= this.cellWidth / 2, i = this.cellWidth / 2), (t != o || w) && (t != this.end || u) || (n = void 0), Math.round(f / c) != f / c && (n = void 0), f++, y = this.cellWidth, a && (y = NaN), this.labelFunction && (n = this.labelFunction(n, h, this)), n = AmCharts.fixNewLines(n), n = new this.axisItemRenderer(this, r, n, !0, y, i, void 0, !1, i), this.pushAxisItem(n));
            for (t = 0; t < this.data.length; t++)(w = this.data[t]) && (u = this.parseDates && !this.equalSpacing ? Math.round((w.time - this.startTime) * this.stepWidth + this.cellWidth / 2) : this.getCoordinate(t - v), w.x[this.id] = u);
            for (w = this.guides.length, t = 0; t < w; t++) u = this.guides[t], i = i = i = f = l = NaN, o = u.above, u.toCategory && (i = p.getCategoryIndexByValue(u.toCategory), isNaN(i) || (l = this.getCoordinate(i - v), n = new this.axisItemRenderer(this, l, "", !0, NaN, NaN, u), this.pushAxisItem(n, o))), u.category && (i = p.getCategoryIndexByValue(u.category), isNaN(i) || (f = this.getCoordinate(i - v), i = (l - f) / 2, n = new this.axisItemRenderer(this, f, u.label, !0, NaN, i, u), this.pushAxisItem(n, o))), u.toDate && (this.equalSpacing ? (i = p.getClosestIndex(this.data, "time", u.toDate.getTime(), !1, 0, this.data.length - 1), isNaN(i) || (l = this.getCoordinate(i - v))) : l = (u.toDate.getTime() - this.startTime) * this.stepWidth, n = new this.axisItemRenderer(this, l, "", !0, NaN, NaN, u), this.pushAxisItem(n, o)), u.date && (this.equalSpacing ? (i = p.getClosestIndex(this.data, "time", u.date.getTime(), !1, 0, this.data.length - 1), isNaN(i) || (f = this.getCoordinate(i - v))) : f = (u.date.getTime() - this.startTime) * this.stepWidth, i = (l - f) / 2, n = "H" == this.orientation ? new this.axisItemRenderer(this, f, u.label, !1, 2 * i, NaN, u) : new this.axisItemRenderer(this, f, u.label, !1, NaN, i, u), this.pushAxisItem(n, o)), l = new this.guideFillRenderer(this, f, l, u), f = l.graphics(), this.pushAxisItem(l, o), u.graphics = f, f.index = t, u.balloonText && this.addEventListeners(f, u)
        }
        this.axisCreated = !0;
        p = this.x;
        v = this.y;
        this.set.translate(p, v);
        this.labelsSet.translate(p, v);
        this.positionTitle();
        (p = this.axisLine.set) && p.toFront()
    },
    choosePeriod: function(n) {
        var i = AmCharts.getPeriodDuration(this.periods[n].period, this.periods[n].count),
            r = Math.ceil(this.timeDifference / i),
            t = this.periods;
        return this.timeDifference < i && 0 < n ? t[n - 1] : r <= this.gridCount ? t[n] : n + 1 < t.length ? this.choosePeriod(n + 1) : t[n]
    },
    getStepWidth: function(n) {
        var t;
        return this.startOnAxis ? (t = this.axisWidth / (n - 1), 1 == n && (t = this.axisWidth)) : t = this.axisWidth / n, t
    },
    getCoordinate: function(n) {
        return n *= this.stepWidth, this.startOnAxis || (n += this.stepWidth / 2), Math.round(n)
    },
    timeZoom: function(n, t) {
        this.startTime = n;
        this.endTime = t
    },
    minDuration: function() {
        var n = AmCharts.extractPeriod(this.minPeriod);
        return AmCharts.getPeriodDuration(n.period, n.count)
    },
    checkPeriodChange: function(n, t, i, r) {
        i = new Date(i);
        var f = new Date(r),
            u = this.firstDayOfWeek;
        return r = t, "DD" == n && (t = 1), i = AmCharts.resetDateToMin(i, n, t, u).getTime(), t = AmCharts.resetDateToMin(f, n, t, u).getTime(), "DD" == n && i - t <= AmCharts.getPeriodDuration(n, r) ? !1 : i != t ? !0 : !1
    },
    generateDFObject: function() {
        var n, t;
        for (this.dateFormatsObject = {}, n = 0; n < this.dateFormats.length; n++) t = this.dateFormats[n], this.dateFormatsObject[t.period] = t.format
    },
    xToIndex: function(n) {
        var i = this.data,
            t = this.chart,
            f = t.rotate,
            u = this.stepWidth,
            r;
        return this.parseDates && !this.equalSpacing ? (n = this.startTime + Math.round(n / u) - this.minDuration() / 2, t = t.getClosestIndex(i, "time", n, !1, this.start, this.end + 1)) : (this.startOnAxis || (n -= u / 2), t = this.start + Math.round(n / u)), t = AmCharts.fitToBounds(t, 0, i.length - 1), i[t] && (r = i[t].x[this.id]), f ? r > this.height + 1 && t-- : r > this.width + 1 && t--, 0 > r && t++, AmCharts.fitToBounds(t, 0, i.length - 1)
    },
    dateToCoordinate: function(n) {
        return this.parseDates && !this.equalSpacing ? (n.getTime() - this.startTime) * this.stepWidth : this.parseDates && this.equalSpacing ? (n = this.chart.getClosestIndex(this.data, "time", n.getTime(), !1, 0, this.data.length - 1), this.getCoordinate(n - this.start)) : NaN
    },
    categoryToCoordinate: function(n) {
        return this.chart ? (n = this.chart.getCategoryIndexByValue(n), this.getCoordinate(n - this.start)) : NaN
    },
    coordinateToDate: function(n) {
        return this.equalSpacing ? (n = this.xToIndex(n), new Date(this.data[n].time)) : new Date(this.startTime + n / this.stepWidth)
    }
});
AmCharts.RecAxis = AmCharts.Class({
    construct: function(n) {
        var l = n.chart,
            t = n.axisThickness,
            i = n.axisColor,
            o = n.axisAlpha,
            r = n.offset,
            s = n.dx,
            h = n.dy,
            u = n.viX,
            f = n.viY,
            e = n.viH,
            a = n.viW,
            c = l.container;
        "H" == n.orientation ? (i = AmCharts.line(c, [0, a], [0, 0], i, o, t), this.axisWidth = n.width, "bottom" == n.position ? (n = t / 2 + r + e + f - 1, t = u) : (n = -t / 2 - r + f + h, t = s + u)) : (this.axisWidth = n.height, "right" == n.position ? (i = AmCharts.line(c, [0, 0, -s], [0, e, e - h], i, o, t), n = f + h, t = t / 2 + r + s + a + u - 1) : (i = AmCharts.line(c, [0, 0], [0, e], i, o, t), n = f, t = -t / 2 - r + u));
        i.translate(t, n);
        l.axesSet.push(i);
        this.set = i
    }
});
AmCharts.RecItem = AmCharts.Class({
    construct: function(n, t, i, r, u, f, e, o, s) {
        var dt, p, lt, it, st, y;
        t = Math.round(t);
        void 0 == i && (i = "");
        s || (s = 0);
        void 0 == r && (r = !0);
        dt = n.chart.fontFamily;
        p = n.fontSize;
        void 0 == p && (p = n.chart.fontSize);
        lt = n.color;
        void 0 == lt && (lt = n.chart.color);
        it = n.chart.container;
        st = it.set();
        this.set = st;
        var rt = n.axisThickness,
            gt = n.axisColor,
            yt = n.axisAlpha,
            c = n.tickLength,
            at = n.gridAlpha,
            vt = n.gridThickness,
            wt = n.gridColor,
            bt = n.dashLength,
            ni = n.fillColor,
            pt = n.fillAlpha,
            ti = n.labelsEnabled,
            k = n.labelRotation,
            kt = n.counter,
            a = n.inside,
            nt = n.dx,
            v = n.dy,
            ii = n.orientation,
            d = n.position,
            ct = n.previousCoord,
            g = n.viH,
            ut = n.viW,
            ft = n.offset,
            et, w;
        e ? (ti = !0, isNaN(e.tickLength) || (c = e.tickLength), void 0 != e.lineColor && (wt = e.lineColor), void 0 != e.color && (lt = e.color), isNaN(e.lineAlpha) || (at = e.lineAlpha), isNaN(e.dashLength) || (bt = e.dashLength), isNaN(e.lineThickness) || (vt = e.lineThickness), !0 === e.inside && (a = !0), isNaN(e.labelRotation) || (k = e.labelRotation), isNaN(e.fontSize) || (p = e.fontSize), e.position && (d = e.position)) : "" === i && (c = 0);
        w = "start";
        u && (w = "middle");
        var b = k * Math.PI / 180,
            ot, l = 0,
            h = 0,
            ht = 0,
            tt = ot = 0;
        "V" == ii && (k = 0);
        ti && (y = AmCharts.text(it, i, lt, dt, p, w, o), tt = y.getBBox().width);
        "H" == ii ? (0 <= t && t <= ut + 1 && (0 < c && 0 < yt && t + s <= ut + 1 && (et = AmCharts.line(it, [t + s, t + s], [0, c], gt, yt, vt), st.push(et)), 0 < at && (w = AmCharts.line(it, [t, t + nt, t + nt], [g, g + v, v], wt, at, vt, bt), st.push(w))), h = 0, l = t, e && 90 == k && (l -= p), !1 === r ? (w = "start", h = "bottom" == d ? a ? h + c : h - c : a ? h - c : h + c, l += 3, u && (l += u / 2, w = "middle"), 0 < k && (w = "middle")) : w = "middle", 1 == kt && 0 < pt && !e && ct < ut && (r = AmCharts.fitToBounds(t, 0, ut), ct = AmCharts.fitToBounds(ct, 0, ut), ot = r - ct, 0 < ot && (fill = AmCharts.rect(it, ot, n.height, ni, pt), fill.translate(r - ot + nt, v), st.push(fill))), "bottom" == d ? (h += g + p / 2 + ft, a ? 0 < k ? (h = g - tt / 2 * Math.sin(b) - c - 3, l += tt / 2 * Math.cos(b)) : h -= c + p + 3 + 3 : 0 < k ? (h = g + tt / 2 * Math.sin(b) + c + 3, l -= tt / 2 * Math.cos(b)) : h += c + rt + 3 + 3) : (h += v + p / 2 - ft, l += nt, a ? 0 < k ? (h = tt / 2 * Math.sin(b) + c + 3, l -= tt / 2 * Math.cos(b)) : h += c + 3 : 0 < k ? (h = -(tt / 2) * Math.sin(b) - c - 6, l += tt / 2 * Math.cos(b)) : h -= c + p + 3 + rt + 3), "bottom" == d ? ot = (a ? g - c - 1 : g + rt - 1) + ft : (ht = nt, ot = (a ? v : v - c - rt + 1) - ft), f && (l += f), v = l, 0 < k && (v += tt / 2 * Math.cos(b)), y && (d = 0, a && (d = tt / 2 * Math.cos(b)), v + d > ut + 2 || 0 > v)) && (y.remove(), y = null) : (0 <= t && t <= g + 1 && (0 < c && 0 < yt && t + s <= g + 1 && (et = AmCharts.line(it, [0, c], [t + s, t + s], gt, yt, vt), st.push(et)), 0 < at && (w = AmCharts.line(it, [0, nt, ut + nt], [t, t + v, t + v], wt, at, vt, bt), st.push(w))), w = "end", (!0 === a && "left" == d || !1 === a && "right" == d) && (w = "start"), h = t - p / 2, 1 == kt && 0 < pt && !e && (r = AmCharts.fitToBounds(t, 0, g), ct = AmCharts.fitToBounds(ct, 0, g), b = r - ct, fill = AmCharts.polygon(it, [0, n.width, n.width, 0], [0, 0, b, b], ni, pt), fill.translate(nt, r - b + v), st.push(fill)), h += p / 2, "right" == d ? (l += nt + ut + ft, h += v, a ? (l -= c + 4, f || (h -= p / 2 + 3)) : (l += c + 4 + rt, h -= 2)) : a ? (l += c + 4 - ft, f || (h -= p / 2 + 3), e && (l += nt, h += v)) : (l += -c - rt - 6 - ft, h -= 2), et && ("right" == d ? (ht += nt + ft + ut, ot += v, ht = a ? ht - rt : ht + rt) : (ht -= ft, a || (ht -= c + rt))), f && (h += f), a = -3, "right" == d && (a += v), y && (h > g + 1 || h < a) && (y.remove(), y = null));
        et && et.translate(ht, ot);
        !1 === n.visible && (et && et.remove(), y && (y.remove(), y = null));
        y && (y.attr({
            "text-anchor": w
        }), y.translate(l, h), 0 !== k && y.rotate(-k), n.allLabels.push(y), " " != i && (this.label = y));
        n.counter = 0 === kt ? 1 : 0;
        n.previousCoord = t;
        0 === this.set.node.childNodes.length && this.set.remove()
    },
    graphics: function() {
        return this.set
    },
    getLabel: function() {
        return this.label
    }
});
AmCharts.RecFill = AmCharts.Class({
    construct: function(n, t, i, r) {
        var o = n.dx,
            s = n.dy,
            h = n.orientation,
            e = 0,
            u, f;
        i < t && (u = t, t = i, i = u);
        f = r.fillAlpha;
        isNaN(f) && (f = 0);
        u = n.chart.container;
        r = r.fillColor;
        "V" == h ? (t = AmCharts.fitToBounds(t, 0, n.viH), i = AmCharts.fitToBounds(i, 0, n.viH)) : (t = AmCharts.fitToBounds(t, 0, n.viW), i = AmCharts.fitToBounds(i, 0, n.viW));
        i -= t;
        isNaN(i) && (i = 4, e = 2, f = 0);
        0 > i && "object" == typeof r && (r = r.join(",").split(",").reverse());
        "V" == h ? (n = AmCharts.rect(u, n.width, i, r, f), n.translate(o, t - e + s)) : (n = AmCharts.rect(u, i, n.height, r, f), n.translate(t - e + o, s));
        this.set = u.set([n])
    },
    graphics: function() {
        return this.set
    },
    getLabel: function() {}
});
AmCharts.RadAxis = AmCharts.Class({
    construct: function(n) {
        var i = n.chart,
            y = n.axisThickness,
            p = n.axisColor,
            a = n.axisAlpha,
            o = n.x,
            s = n.y,
            f, c, u;
        this.set = i.container.set();
        i.axesSet.push(this.set);
        var v = n.axisTitleOffset,
            w = n.radarCategoriesEnabled,
            b = n.chart.fontFamily,
            h = n.fontSize;
        if (void 0 === h && (h = n.chart.fontSize), f = n.color, void 0 === f && (f = n.chart.color), i)
            for (this.axisWidth = n.height, n = i.chartData, c = n.length, u = 0; u < c; u++) {
                var t = 180 - 360 / c * u,
                    r = o + this.axisWidth * Math.sin(t / 180 * Math.PI),
                    e = s + this.axisWidth * Math.cos(t / 180 * Math.PI);
                if (0 < a && (r = AmCharts.line(i.container, [o, r], [s, e], p, a, y), this.set.push(r)), w) {
                    var l = "start",
                        r = o + (this.axisWidth + v) * Math.sin(t / 180 * Math.PI),
                        e = s + (this.axisWidth + v) * Math.cos(t / 180 * Math.PI);
                    (180 == t || 0 === t) && (l = "middle", r -= 5);
                    0 > t && (l = "end", r -= 10);
                    180 == t && (e -= 5);
                    0 === t && (e += 5);
                    t = AmCharts.text(i.container, n[u].category, f, b, h, l);
                    t.translate(r + 5, e);
                    this.set.push(t);
                    t.getBBox()
                }
            }
    }
});
AmCharts.RadItem = AmCharts.Class({
    construct: function(n, t, i, r, u, f, e) {
        var h, o, s, a, g, nt, l, w, tt, it, b, v;
        void 0 === i && (i = "");
        h = n.chart.fontFamily;
        o = n.fontSize;
        void 0 === o && (o = n.chart.fontSize);
        s = n.color;
        void 0 === s && (s = n.chart.color);
        a = n.chart.container;
        this.set = r = a.set();
        var et = n.axisColor,
            ot = n.axisAlpha,
            y = n.tickLength,
            c = n.gridAlpha,
            p = n.gridThickness,
            k = n.gridColor,
            rt = n.dashLength,
            ut = n.fillColor,
            d = n.fillAlpha,
            ft = n.labelsEnabled;
        if (u = n.counter, g = n.inside, nt = n.gridType, t -= n.height, f = n.x, tt = n.y, e ? (ft = !0, isNaN(e.tickLength) || (y = e.tickLength), void 0 != e.lineColor && (k = e.lineColor), isNaN(e.lineAlpha) || (c = e.lineAlpha), isNaN(e.dashLength) || (rt = e.dashLength), isNaN(e.lineThickness) || (p = e.lineThickness), !0 === e.inside && (g = !0)) : i || (c /= 3, y /= 2), it = "end", b = -1, g && (it = "start", b = 1), ft && (v = AmCharts.text(a, i, s, h, o, it), v.translate(f + (y + 3) * b, t), r.push(v), this.label = v, w = AmCharts.line(a, [f, f + y * b], [t, t], et, ot, p), r.push(w)), t = n.y - t, i = [], h = [], 0 < c) {
            if ("polygons" == nt) {
                for (l = n.data.length, o = 0; o < l; o++) s = 180 - 360 / l * o, i.push(t * Math.sin(s / 180 * Math.PI)), h.push(t * Math.cos(s / 180 * Math.PI));
                i.push(i[0]);
                h.push(h[0]);
                c = AmCharts.line(a, i, h, k, c, p, rt)
            } else c = AmCharts.circle(a, t, "#FFFFFF", 0, p, k, c);
            c.translate(f, tt);
            r.push(c)
        }
        if (1 == u && 0 < d && !e) {
            if (e = n.previousCoord, "polygons" == nt) {
                for (o = l; 0 <= o; o--) s = 180 - 360 / l * o, i.push(e * Math.sin(s / 180 * Math.PI)), h.push(e * Math.cos(s / 180 * Math.PI));
                l = AmCharts.polygon(a, i, h, ut, d)
            } else l = AmCharts.wedge(a, 0, 0, 0, -360, t, t, e, 0, {
                fill: ut,
                "fill-opacity": d,
                stroke: 0,
                "stroke-opacity": 0,
                "stroke-width": 0
            });
            r.push(l);
            l.translate(f, tt)
        }!1 === n.visible && (w && w.hide(), v && v.hide());
        n.counter = 0 === u ? 1 : 0;
        n.previousCoord = t
    },
    graphics: function() {
        return this.set
    },
    getLabel: function() {
        return this.label
    }
});
AmCharts.RadarFill = AmCharts.Class({
    construct: function(n, t, i, r) {
        var f, u, o, s, e;
        t -= n.axisWidth;
        i -= n.axisWidth;
        f = Math.max(t, i);
        t = i = Math.min(t, i);
        i = n.chart.container;
        var h = r.fillAlpha,
            c = r.fillColor,
            f = Math.abs(f - n.y);
        if (t = Math.abs(t - n.y), u = Math.max(f, t), t = Math.min(f, t), f = u, u = -r.angle, r = -r.toAngle, isNaN(u) && (u = 0), isNaN(r) && (r = -360), this.set = i.set(), void 0 === c && (c = "#000000"), isNaN(h) && (h = 0), "polygons" == n.gridType) {
            for (r = [], o = [], s = n.data.length, e = 0; e < s; e++) u = 180 - 360 / s * e, r.push(f * Math.sin(u / 180 * Math.PI)), o.push(f * Math.cos(u / 180 * Math.PI));
            for (r.push(r[0]), o.push(o[0]), e = s; 0 <= e; e--) u = 180 - 360 / s * e, r.push(t * Math.sin(u / 180 * Math.PI)), o.push(t * Math.cos(u / 180 * Math.PI));
            this.fill = AmCharts.polygon(i, r, o, c, h)
        } else this.fill = AmCharts.wedge(i, 0, 0, u, r - u, f, f, t, 0, {
            fill: c,
            "fill-opacity": h,
            stroke: 0,
            "stroke-opacity": 0,
            "stroke-width": 0
        });
        this.set.push(this.fill);
        this.fill.translate(n.x, n.y)
    },
    graphics: function() {
        return this.set
    },
    getLabel: function() {}
});
AmCharts.AmGraph = AmCharts.Class({
    construct: function() {
        this.createEvents("rollOverGraphItem", "rollOutGraphItem", "clickGraphItem", "doubleClickGraphItem", "rightClickGraphItem", "clickGraph");
        this.type = "line";
        this.stackable = !0;
        this.columnCount = 1;
        this.columnIndex = 0;
        this.centerCustomBullets = this.showBalloon = !0;
        this.maxBulletSize = 50;
        this.minBulletSize = 0;
        this.balloonText = "[[value]]";
        this.hidden = this.scrollbar = this.animationPlayed = !1;
        this.columnWidth = .8;
        this.pointPosition = "middle";
        this.depthCount = 1;
        this.includeInMinMax = !0;
        this.negativeBase = 0;
        this.visibleInLegend = !0;
        this.showAllValueLabels = !1;
        this.showBalloonAt = "close";
        this.lineThickness = 1;
        this.dashLength = 0;
        this.connect = !0;
        this.lineAlpha = 1;
        this.bullet = "none";
        this.bulletBorderThickness = 2;
        this.bulletAlpha = this.bulletBorderAlpha = 1;
        this.bulletSize = 8;
        this.hideBulletsCount = this.bulletOffset = 0;
        this.labelPosition = "top";
        this.cornerRadiusTop = 0;
        this.cursorBulletAlpha = 1;
        this.gradientOrientation = "vertical";
        this.dy = this.dx = 0;
        this.periodValue = "";
        this.y = this.x = 0
    },
    draw: function() {
        var n = this.chart,
            i = n.container,
            t, r, u;
        this.container = i;
        this.destroy();
        t = i.set();
        r = i.set();
        this.behindColumns ? (n.graphsBehindSet.push(t), n.bulletBehindSet.push(r)) : (n.graphsSet.push(t), n.bulletSet.push(r));
        this.bulletSet = r;
        this.scrollbar || (u = n.marginLeftReal, n = n.marginTopReal, t.translate(u, n), r.translate(u, n));
        i = i.set();
        AmCharts.remove(this.columnsSet);
        t.push(i);
        this.set = t;
        this.columnsSet = i;
        this.columnsArray = [];
        this.ownColumns = [];
        this.allBullets = [];
        this.animationArray = [];
        AmCharts.ifArray(this.data) && (t = !1, "xy" == this.chartType ? this.xAxis.axisCreated && this.yAxis.axisCreated && (t = !0) : this.valueAxis.axisCreated && (t = !0), !this.hidden && t && this.createGraph())
    },
    createGraph: function() {
        var n = this,
            t = n.chart;
        if ("inside" == n.labelPosition && (n.labelPosition = "bottom"), n.startAlpha = t.startAlpha, n.seqAn = t.sequencedAnimation, n.baseCoord = n.valueAxis.baseCoord, n.fillColors || (n.fillColors = n.lineColor), void 0 === n.fillAlphas && (n.fillAlphas = 0), void 0 === n.bulletColor && (n.bulletColor = n.lineColor, n.bulletColorNegative = n.negativeLineColor), void 0 === n.bulletAlpha && (n.bulletAlpha = n.lineAlpha), n.bulletBorderColor || (n.bulletBorderAlpha = 0), clearTimeout(n.playedTO), !isNaN(n.valueAxis.min) && !isNaN(n.valueAxis.max)) {
            switch (n.chartType) {
                case "serial":
                    n.createSerialGraph();
                    "candlestick" == n.type && 1 > n.valueAxis.minMaxMultiplier && n.positiveClip(n.set);
                    break;
                case "radar":
                    n.createRadarGraph();
                    break;
                case "xy":
                    n.createXYGraph();
                    n.positiveClip(n.set)
            }
            n.playedTO = setTimeout(function() {
                n.setAnimationPlayed.call(n)
            }, 500 * n.chart.startDuration)
        }
    },
    setAnimationPlayed: function() {
        this.animationPlayed = !0
    },
    createXYGraph: function() {
        var o = [],
            s = [],
            e = this.xAxis,
            h = this.yAxis,
            i;
        for (this.pmh = h.viH + 1, this.pmw = e.viW + 1, this.pmy = this.pmx = 0, i = this.start; i <= this.end; i++) {
            var n = this.data[i].axes[e.id].graphs[this.id],
                t = n.values,
                r = t.x,
                u = t.y,
                t = e.getCoordinate(r),
                f = h.getCoordinate(u);
            isNaN(r) || isNaN(u) || !(o.push(t), s.push(f), (r = this.createBullet(n, t, f, i)) || (r = 0), u = this.labelText) || (n = this.createLabel(n, t, f, u), this.allBullets.push(n), this.positionLabel(t, f, n, this.labelPosition, r))
        }
        this.drawLineGraph(o, s);
        this.launchAnimation()
    },
    createRadarGraph: function() {
        for (var c = this.valueAxis.stackType, f = [], e = [], o, s, t, n, i, u, h, r = this.start; r <= this.end; r++) t = this.data[r].axes[this.valueAxis.id].graphs[this.id], n = "none" == c || "3d" == c ? t.values.value : t.values.close, isNaN(n) ? (this.drawLineGraph(f, e), f = [], e = []) : (i = this.y - (this.valueAxis.getCoordinate(n) - this.height), u = 180 - 360 / (this.end - this.start + 1) * r, n = i * Math.sin(u / 180 * Math.PI), i *= Math.cos(u / 180 * Math.PI), f.push(n), e.push(i), (u = this.createBullet(t, n, i, r)) || (u = 0), h = this.labelText, h && (t = this.createLabel(t, n, i, h), this.allBullets.push(t), this.positionLabel(n, i, t, this.labelPosition, u)), isNaN(o) && (o = n), isNaN(s) && (s = i));
        f.push(o);
        e.push(s);
        this.drawLineGraph(f, e);
        this.launchAnimation()
    },
    positionLabel: function(n, t, i, r, u) {
        var f = i.getBBox();
        switch (r) {
            case "left":
                n -= (f.width + u) / 2 + 2;
                break;
            case "top":
                t -= (u + f.height) / 2 + 1;
                break;
            case "right":
                n += (f.width + u) / 2 + 2;
                break;
            case "bottom":
                t += (u + f.height) / 2 + 1
        }
        i.translate(n, t)
    },
    createSerialGraph: function() {
        var pr = this.chart,
            fu = this.id,
            ii = this.index,
            ei = this.data,
            ft = this.chart.container,
            r = this.valueAxis,
            a = this.type,
            c = this.columnWidth,
            v = this.width,
            p = this.height,
            se = this.y,
            y = this.rotate,
            bi = this.columnCount,
            wr = AmCharts.toCoordinate(this.cornerRadiusTop, c / 2),
            eu = this.connect,
            k = [],
            d = [],
            ou, br, lf, af, ri = this.chart.graphs.length,
            ir, g = this.dx / this.depthCount,
            vt = this.dy / this.depthCount,
            b = r.stackType,
            ot = this.labelPosition,
            kr = this.start,
            ki = this.end,
            oi = this.scrollbar,
            vf = this.categoryAxis,
            su = this.baseCoord,
            rr = this.negativeBase,
            lt = this.columnIndex,
            nt = this.lineThickness,
            st = this.lineAlpha,
            he = this.lineColor,
            di = this.dashLength,
            gi = this.set,
            yf, si, or, li, dt, yu, gt, o, pt, bu, ku, wf, bf, iu, du, gu, nf, at, tf, rf, uf, ff, ef, of, yi, sf, hf, cf, wi;
        "above" == ot && (ot = "top");
        "below" == ot && (ot = "bottom");
        yf = ot;
        si = 270;
        "horizontal" == this.gradientOrientation && (si = 0);
        this.gradientRotation = si;
        var yt = this.chart.columnSpacing,
            nr = vf.cellWidth,
            pf = (nr * c - bi) / bi;
        yt > pf && (yt = pf);
        var hi, i, dr, hu = p + 1,
            cu = v + 1,
            gr = 0,
            lu = 0,
            au, vu, nu, tu, ce = this.fillColors,
            ur = this.negativeFillColors,
            ci = this.negativeLineColor,
            fr = this.fillAlphas,
            er = this.negativeFillAlphas;
        if ("object" == typeof fr && (fr = fr[0]), "object" == typeof er && (er = er[0]), or = r.getCoordinate(r.min), r.logarithmic && (or = r.getCoordinate(r.minReal)), this.minCoord = or, this.resetBullet && (this.bullet = "none"), !oi && ("line" == a || "smoothedLine" == a || "step" == a) && (1 == ei.length && "step" != a && "none" == this.bullet && (this.bullet = "round", this.resetBullet = !0), ur || void 0 != ci) && (li = rr, li > r.max && (li = r.max), li < r.min && (li = r.min), r.logarithmic && (li = r.minReal), dt = r.getCoordinate(li), yu = r.getCoordinate(r.max), y ? (hu = p, cu = Math.abs(yu - dt), au = p, vu = Math.abs(or - dt), tu = lu = 0, r.reversed ? (gr = 0, nu = dt) : (gr = dt, nu = 0)) : (cu = v, hu = Math.abs(yu - dt), vu = v, au = Math.abs(or - dt), nu = gr = 0, r.reversed ? (tu = se, lu = dt) : tu = dt + 1)), gt = Math.round, this.pmx = gt(gr), this.pmy = gt(lu), this.pmh = gt(hu), this.pmw = gt(cu), this.nmx = gt(nu), this.nmy = gt(tu), this.nmh = gt(au), this.nmw = gt(vu), 9 > AmCharts.IEversion && 0 < AmCharts.IEversion && (this.nmy = this.nmx = 0, this.nmh = this.height), c = "column" == a ? (nr * c - yt * (bi - 1)) / bi : nr * c, 1 > c && (c = 1), "line" == a || "step" == a || "smoothedLine" == a) {
            if (0 < kr)
                for (o = kr - 1; - 1 < o; o--)
                    if (hi = ei[o], i = hi.axes[r.id].graphs[fu], dr = i.values.value, !isNaN(dr)) {
                        kr = o;
                        break
                    }
            if (ki < ei.length - 1)
                for (o = ki + 1; o < ei.length; o++)
                    if (hi = ei[o], i = hi.axes[r.id].graphs[fu], dr = i.values.value, !isNaN(dr)) {
                        ki = o;
                        break
                    }
        }
        ki < ei.length - 1 && ki++;
        var tt = [],
            it = [],
            sr = !1;
        for (("line" == a || "step" == a || "smoothedLine" == a) && (this.stackable && "regular" == b || "100%" == b || this.fillToGraph) && (sr = !0), o = kr; o <= ki; o++) {
            hi = ei[o];
            i = hi.axes[r.id].graphs[fu];
            i.index = o;
            var u, f, s, rt, ui = NaN,
                t = NaN,
                n = NaN,
                h = NaN,
                e = NaN,
                hr = NaN,
                ai = NaN,
                cr = NaN,
                vi = NaN,
                ut = NaN,
                et = NaN,
                ni = NaN,
                ti = NaN,
                l = NaN,
                pu = NaN,
                wu = NaN,
                ht = NaN,
                at = void 0,
                fi = ce,
                lr = fr,
                wt = he,
                ct, bt;
            if (void 0 != i.color && (fi = i.color), i.fillColors && (fi = i.fillColors), isNaN(i.alpha) || (lr = i.alpha), pt = i.values, r.recalculateToPercents && (pt = i.percents), pt) {
                if (l = this.stackable && "none" != b && "3d" != b ? pt.close : pt.value, ("candlestick" == a || "ohlc" == a) && (l = pt.close, wu = pt.low, ai = r.getCoordinate(wu), pu = pt.high, vi = r.getCoordinate(pu)), ht = pt.open, n = r.getCoordinate(l), isNaN(ht) || (e = r.getCoordinate(ht)), !oi) switch (this.showBalloonAt) {
                    case "close":
                        i.y = n;
                        break;
                    case "open":
                        i.y = e;
                        break;
                    case "high":
                        i.y = vi;
                        break;
                    case "low":
                        i.y = ai
                }
                var ui = hi.x[vf.id],
                    kt = Math.floor(nr / 2),
                    ar = kt;
                "start" == this.pointPosition && (ui -= nr / 2, kt = 0, ar = nr);
                oi || (i.x = ui); - 1e5 > ui && (ui = -1e5);
                ui > v + 1e5 && (ui = v + 1e5);
                y ? (t = n, h = e, e = n = ui, isNaN(ht) && !this.fillToGraph && (h = su), hr = ai, cr = vi) : (h = t = ui, isNaN(ht) && !this.fillToGraph && (e = su));
                l < ht && (i.isNegative = !0, ur && (fi = ur), er && (lr = er), void 0 != ci && (wt = ci));
                switch (a) {
                    case "line":
                        isNaN(l) ? eu || (this.drawLineGraph(k, d, tt, it), k = [], d = [], tt = [], it = []) : (i.isNegative = l < rr ? !0 : !1, k.push(t), d.push(n), ut = t, et = n, ni = t, ti = n, !sr || isNaN(e) || isNaN(h) || (tt.push(h), it.push(e)));
                        break;
                    case "smoothedLine":
                        isNaN(l) ? eu || (this.drawSmoothedGraph(k, d, tt, it), k = [], d = [], tt = [], it = []) : (i.isNegative = l < rr ? !0 : !1, k.push(t), d.push(n), ut = t, et = n, ni = t, ti = n, !sr || isNaN(e) || isNaN(h) || (tt.push(h), it.push(e)));
                        break;
                    case "step":
                        isNaN(l) ? eu || (br = NaN, this.drawLineGraph(k, d, tt, it), k = [], d = [], tt = [], it = []) : (i.isNegative = l < rr ? !0 : !1, y ? (isNaN(ou) || (k.push(ou), d.push(n - kt)), d.push(n - kt), k.push(t), d.push(n + ar), k.push(t), !sr || isNaN(e) || isNaN(h) || (tt.push(lf), it.push(e - kt), tt.push(h), it.push(e - kt), tt.push(h), it.push(e + ar))) : (isNaN(br) || (d.push(br), k.push(t - kt)), k.push(t - kt), d.push(n), k.push(t + ar), d.push(n), !sr || isNaN(e) || isNaN(h) || (tt.push(h - kt), it.push(af), tt.push(h - kt), it.push(e), tt.push(h + ar), it.push(e))), ou = t, br = n, lf = h, af = e, ut = t, et = n, ni = t, ti = n);
                        break;
                    case "column":
                        ct = wt;
                        void 0 != i.lineColor && (ct = i.lineColor);
                        isNaN(l) || (l < rr ? (i.isNegative = !0, ur && (fi = ur), void 0 != ci && (ct = ci)) : i.isNegative = !1, bu = r.min, ku = r.max, l < bu && ht < bu || l > ku && ht > ku || (y ? ("3d" == b ? (f = n - .5 * (c + yt) + yt / 2 + vt * lt, u = h + g * lt) : (f = n - (bi / 2 - lt) * (c + yt) + yt / 2, u = h), s = c, ut = t, et = f + c / 2, ni = t, ti = f + c / 2, f + s > p && (s = p - f), 0 > f && (s += f, f = 0), rt = t - h, wf = u, u = AmCharts.fitToBounds(u, 0, v), rt += wf - u, rt = AmCharts.fitToBounds(rt, -u, v - u + g * lt), f < p && 0 < s && (at = new AmCharts.Cuboid(ft, rt, s, g - pr.d3x, vt - pr.d3y, fi, lr, nt, ct, st, si, wr, y), "bottom" != ot) && ((ot = r.reversed ? "left" : "right", 0 > l) ? ot = r.reversed ? "right" : "left" : ("regular" == b || "100%" == b) && (ut += this.dx))) : ("3d" == b ? (u = t - .5 * (c + yt) + yt / 2 + g * lt, f = e + vt * lt) : (u = t - (bi / 2 - lt) * (c + yt) + yt / 2, f = e), s = c, ut = u + c / 2, et = n, ni = u + c / 2, ti = n, u + s > v + lt * g && (s = v - u + lt * g), 0 > u && (s += u, u = 0), rt = n - e, bf = f, f = AmCharts.fitToBounds(f, this.dy, p), rt += bf - f, rt = AmCharts.fitToBounds(rt, -f + vt * lt, p - f), u < v + lt * g && 0 < s && ((at = new AmCharts.Cuboid(ft, s, rt, g - pr.d3x, vt - pr.d3y, fi, lr, nt, ct, this.lineAlpha, si, wr, y), 0 > l && "middle" != ot) ? ot = "bottom" : (ot = yf, "regular" == b || "100%" == b) && (et += this.dy)))), at && (bt = at.set, bt.translate(u, f), this.columnsSet.push(bt), (i.url || this.showHandOnHover) && bt.setAttr("cursor", "pointer"), !oi) && ("none" == b && (ir = y ? (this.end + 1 - o) * ri - ii : ri * o + ii), "3d" == b && (y ? (ir = (ri - ii) * (this.end + 1 - o), ut += g * this.columnIndex, ni += g * this.columnIndex, i.y += g * this.columnIndex) : (ir = (ri - ii) * (o + 1), ut += 3, et += vt * this.columnIndex + 7, ti += vt * this.columnIndex, i.y += vt * this.columnIndex)), ("regular" == b || "100%" == b) && (ot = "middle", ir = y ? 0 < pt.value ? (this.end + 1 - o) * ri + ii : (this.end + 1 - o) * ri - ii : 0 < pt.value ? ri * o + ii : ri * o - ii), this.columnsArray.push({
                            column: at,
                            depth: ir
                        }), i.x = y ? f + s / 2 : u + s / 2, this.ownColumns.push(at), this.animateColumns(at, o, t, h, n, e), this.addListeners(bt, i)));
                        break;
                    case "candlestick":
                        isNaN(ht) || isNaN(l) || (ct = wt, void 0 != i.lineColor && (ct = i.lineColor), y ? (f = n - c / 2, u = h, s = c, f + s > p && (s = p - f), 0 > f && (s += f, f = 0), f < p && 0 < s) && (l > ht ? (gu = [t, cr], nf = [h, hr]) : (gu = [h, cr], nf = [t, hr]), !isNaN(cr) && !isNaN(hr) && n < p && 0 < n && (iu = AmCharts.line(ft, gu, [n, n], ct, st, nt), du = AmCharts.line(ft, nf, [n, n], ct, st, nt)), rt = t - h, at = new AmCharts.Cuboid(ft, rt, s, g, vt, fi, fr, nt, ct, st, si, wr, y)) : (u = t - c / 2, f = e + nt / 2, s = c, u + s > v && (s = v - u), 0 > u && (s += u, u = 0), rt = n - e, u < v && 0 < s) && (at = new AmCharts.Cuboid(ft, s, rt, g, vt, fi, lr, nt, ct, st, si, wr, y), l > ht ? (tf = [n, vi], rf = [e, ai]) : (tf = [e, vi], rf = [n, ai]), !isNaN(vi) && !isNaN(ai) && t < v && 0 < t && (iu = AmCharts.line(ft, [t, t], tf, ct, st, nt), du = AmCharts.line(ft, [t, t], rf, ct, st, nt))), at && (bt = at.set, gi.push(bt), bt.translate(u, f - nt / 2), (i.url || this.showHandOnHover) && bt.setAttr("cursor", "pointer"), iu && (gi.push(iu), gi.push(du)), ut = t, et = n, ni = t, ti = n, oi || (i.x = y ? f + s / 2 : u + s / 2, this.animateColumns(at, o, t, h, n, e), this.addListeners(bt, i))));
                        break;
                    case "ohlc":
                        if (!(isNaN(ht) || isNaN(pu) || isNaN(wu) || isNaN(l))) {
                            if (l < ht && (i.isNegative = !0, void 0 != ci && (wt = ci)), y) {
                                var kf = n - c / 2,
                                    kf = AmCharts.fitToBounds(kf, 0, p),
                                    df = AmCharts.fitToBounds(n, 0, p),
                                    gf = n + c / 2,
                                    gf = AmCharts.fitToBounds(gf, 0, p);
                                ff = AmCharts.line(ft, [h, h], [kf, df], wt, st, nt, di);
                                0 < n && n < p && (uf = AmCharts.line(ft, [hr, cr], [n, n], wt, st, nt, di));
                                ef = AmCharts.line(ft, [t, t], [df, gf], wt, st, nt, di)
                            } else {
                                var ne = t - c / 2,
                                    ne = AmCharts.fitToBounds(ne, 0, v),
                                    te = AmCharts.fitToBounds(t, 0, v),
                                    ie = t + c / 2,
                                    ie = AmCharts.fitToBounds(ie, 0, v);
                                ff = AmCharts.line(ft, [ne, te], [e, e], wt, st, nt, di);
                                0 < t && t < v && (uf = AmCharts.line(ft, [t, t], [ai, vi], wt, st, nt, di));
                                ef = AmCharts.line(ft, [te, ie], [n, n], wt, st, nt, di)
                            }
                            gi.push(ff);
                            gi.push(uf);
                            gi.push(ef);
                            ut = t;
                            et = n;
                            ni = t;
                            ti = n
                        }
                }
                if (!oi && !isNaN(l) && (of = this.hideBulletsCount, this.end - this.start <= of || 0 === of)) {
                    if (yi = this.createBullet(i, ni, ti, o), yi || (yi = 0), sf = this.labelText, sf) {
                        var w = this.createLabel(i, 0, 0, sf),
                            pi = 0,
                            tr = 0,
                            re = w.getBBox(),
                            ru = re.width,
                            uu = re.height;
                        switch (ot) {
                            case "left":
                                pi = -(ru / 2 + yi / 2 + 3);
                                break;
                            case "top":
                                tr = -(uu / 2 + yi / 2 + 3);
                                break;
                            case "right":
                                pi = yi / 2 + 2 + ru / 2;
                                break;
                            case "bottom":
                                y && "column" == a ? (ut = su, 0 > l ? (pi = -6, w.attr({
                                    "text-anchor": "end"
                                })) : (pi = 6, w.attr({
                                    "text-anchor": "start"
                                }))) : (tr = yi / 2 + uu / 2, w.x = -(ru / 2 + 2));
                                break;
                            case "middle":
                                "column" == a && (y ? (tr = -(uu / 2) + this.fontSize / 2, pi = -(t - h) / 2 - g, 0 > rt && (pi += g), Math.abs(t - h) < ru && !this.showAllValueLabels && (w.remove(), w = null)) : (tr = -(n - e) / 2, 0 > rt && (tr -= vt), Math.abs(n - e) < uu && !this.showAllValueLabels && (w.remove(), w = null)))
                        }
                        w && (isNaN(et) || isNaN(ut) ? (w.remove(), w = null) : (ut += pi, et += tr, w.translate(ut, et), y) ? (0 > et || et > p) && (w.remove(), w = null) : (hf = 0, "3d" == b && (hf = g * lt), (0 > ut || ut > v + hf) && (w.remove(), w = null)), w && this.allBullets.push(w))
                    }
                    if (("column" == a && "regular" == b || "100%" == b) && (cf = r.totalText, cf)) {
                        wi = this.createLabel(i, 0, 0, cf, r.totalTextColor);
                        this.allBullets.push(wi);
                        var ue = wi.getBBox(),
                            fe = ue.width,
                            ee = ue.height,
                            vr, yr, oe = r.totals[o];
                        oe && oe.remove();
                        y ? (yr = n, vr = 0 > l ? t - fe / 2 - 2 : t + fe / 2 + 3) : (vr = t, yr = 0 > l ? n + ee / 2 : n - ee / 2 - 3);
                        wi.translate(vr, yr);
                        r.totals[o] = wi;
                        y ? (0 > yr || yr > p) && wi.remove() : (0 > vr || vr > v) && wi.remove()
                    }
                }
            }
        }("line" == a || "step" == a || "smoothedLine" == a) && ("smoothedLine" == a ? this.drawSmoothedGraph(k, d, tt, it) : this.drawLineGraph(k, d, tt, it), oi || this.launchAnimation());
        this.bulletsHidden && this.hideBullets()
    },
    animateColumns: function(n, t, i) {
        var r = this;
        i = r.chart.startDuration;
        0 < i && !r.animationPlayed && (r.seqAn ? (n.set.hide(), r.animationArray.push(n), n = setTimeout(function() {
            r.animate.call(r)
        }, 1e3 * (i / (r.end - r.start + 1)) * (t - r.start)), r.timeOuts.push(n)) : r.animate(n))
    },
    createLabel: function(n, t, i, r, u) {
        var f = this.chart,
            e = n.labelColor;
        return void 0 === e && (e = this.color), void 0 === e && (e = f.color), void 0 !== u && (e = u), u = this.fontSize, void 0 === u && (this.fontSize = u = f.fontSize), n = f.formatString(r, n, this), n = AmCharts.cleanFromEmpty(n), f = AmCharts.text(this.container, n, e, f.fontFamily, u), f.translate(t, i), this.bulletSet.push(f), f
    },
    positiveClip: function(n) {
        n.clipRect(this.pmx, this.pmy, this.pmw, this.pmh)
    },
    negativeClip: function(n) {
        n.clipRect(this.nmx, this.nmy, this.nmw, this.nmh)
    },
    drawLineGraph: function(n, t, i, r) {
        var u = this;
        if (1 < n.length) {
            var s = u.set,
                o = u.container,
                h = o.set(),
                c = o.set();
            s.push(c);
            s.push(h);
            var f = u.lineAlpha,
                e = u.lineThickness,
                w = u.dashLength,
                s = u.fillAlphas,
                p = u.lineColor,
                b = u.fillColors,
                a = u.negativeLineColor,
                v = u.negativeFillColors,
                y = u.negativeFillAlphas,
                l = u.baseCoord;
            0 !== u.negativeBase && (l = u.valueAxis.getCoordinate(u.negativeBase));
            p = AmCharts.line(o, n, t, p, f, e, w, !1, !0);
            h.push(p);
            h.click(function() {
                u.handleGraphClick()
            });
            void 0 !== a && (f = AmCharts.line(o, n, t, a, f, e, w, !1, !0), c.push(f));
            (0 < s || 0 < y) && (f = n.join(";").split(";"), e = t.join(";").split(";"), "serial" == u.chartType && (0 < i.length ? (i.reverse(), r.reverse(), f = n.concat(i), e = t.concat(r)) : u.rotate ? (e.push(e[e.length - 1]), f.push(l), e.push(e[0]), f.push(l), e.push(e[0]), f.push(f[0])) : (f.push(f[f.length - 1]), e.push(l), f.push(f[0]), e.push(l), f.push(n[0]), e.push(e[0]))), 0 < s && (n = AmCharts.polygon(o, f, e, b, s, 0, 0, 0, this.gradientRotation), h.push(n)), v || void 0 !== a) && (isNaN(y) && (y = s), v || (v = a), o = AmCharts.polygon(o, f, e, v, y, 0, 0, 0, this.gradientRotation), c.push(o), c.click(function() {
                u.handleGraphClick()
            }));
            u.applyMask(c, h)
        }
    },
    applyMask: function(n, t) {
        var i = n.length();
        "serial" != this.chartType || this.scrollbar || (this.positiveClip(t), 0 < i && this.negativeClip(n))
    },
    drawSmoothedGraph: function(n, t, i, r) {
        if (1 < n.length) {
            var f = this.set,
                e = this.container,
                s = e.set(),
                h = e.set();
            f.push(h);
            f.push(s);
            var u = this.lineAlpha,
                o = this.lineThickness,
                f = this.dashLength,
                y = this.fillAlphas,
                p = this.fillColors,
                c = this.negativeLineColor,
                l = this.negativeFillColors,
                w = this.negativeFillAlphas,
                a = this.baseCoord,
                v = new AmCharts.Bezier(e, n, t, this.lineColor, u, o, p, 0, f);
            s.push(v.path);
            void 0 !== c && (u = new AmCharts.Bezier(e, n, t, c, u, o, p, 0, f), h.push(u.path));
            0 < y && (o = n.join(";").split(";"), v = t.join(";").split(";"), u = "", 0 < i.length ? (i.reverse(), r.reverse(), o = n.concat(i), v = t.concat(r)) : (this.rotate ? (u += " L" + a + "," + t[t.length - 1], u += " L" + a + "," + t[0]) : (u += " L" + n[n.length - 1] + "," + a, u += " L" + n[0] + "," + a), u += " L" + n[0] + "," + t[0]), i = new AmCharts.Bezier(e, o, v, NaN, 0, 0, p, y, f, u), s.push(i.path), l || void 0 !== c) && (w || (w = y), l || (l = c), n = new AmCharts.Bezier(e, n, t, NaN, 0, 0, l, w, f, u), h.push(n.path));
            this.applyMask(h, s)
        }
    },
    launchAnimation: function() {
        var n = this,
            t = n.chart.startDuration,
            i, r;
        0 < t && !n.animationPlayed && (i = n.set, r = n.bulletSet, AmCharts.VML || (i.attr({
            opacity: n.startAlpha
        }), r.attr({
            opacity: n.startAlpha
        })), i.hide(), r.hide(), n.seqAn ? (t = setTimeout(function() {
            n.animateGraphs.call(n)
        }, 1e3 * n.index * t), n.timeOuts.push(t)) : n.animateGraphs())
    },
    animateGraphs: function() {
        var n = this.chart,
            t = this.set,
            i = this.bulletSet,
            r = this.x,
            u = this.y,
            f;
        t.show();
        i.show();
        f = n.startDuration;
        n = n.startEffect;
        t && (this.rotate ? (t.translate(-1e3, u), i.translate(-1e3, u)) : (t.translate(r, -1e3), i.translate(r, -1e3)), t.animate({
            opacity: 1,
            translate: r + "," + u
        }, f, n), i.animate({
            opacity: 1,
            translate: r + "," + u
        }, f, n))
    },
    animate: function(n) {
        var t = this.chart,
            i = this.container,
            r = this.animationArray;
        !n && 0 < r.length && (n = r[0], r.shift());
        i = i[AmCharts.getEffect(t.startEffect)];
        t = t.startDuration;
        n && (this.rotate ? n.animateWidth(t, i) : n.animateHeight(t, i), n.set.show())
    },
    legendKeyColor: function() {
        var t = this.legendColor,
            n = this.lineAlpha;
        return void 0 === t && (t = this.lineColor, 0 === n && (n = this.fillColors) && (t = "object" == typeof n ? n[0] : n)), t
    },
    legendKeyAlpha: function() {
        var n = this.legendAlpha;
        return void 0 === n && (n = this.lineAlpha, 0 === n && this.fillAlphas && (n = this.fillAlphas), 0 === n && (n = this.bulletAlpha), 0 === n && (n = 1)), n
    },
    createBullet: function(n, t, i, r) {
        var f, o, u, a, s;
        if (r = this.container, a = this.bulletOffset, f = this.bulletSize, isNaN(n.bulletSize) || (f = n.bulletSize), isNaN(this.maxValue) || (o = n.values.value, isNaN(o) || (f = o / this.maxValue * this.maxBulletSize)), f < this.minBulletSize && (f = this.minBulletSize), this.rotate ? t += a : i -= a, a = 0, "none" != this.bullet || n.bullet) {
            s = this.bulletColor;
            n.isNegative && void 0 !== this.bulletColorNegative && (s = this.bulletColorNegative);
            void 0 !== n.color && (s = n.color);
            o = this.bullet;
            n.bullet && (o = n.bullet);
            var h = this.bulletBorderThickness,
                e = this.bulletBorderColor,
                l = this.bulletBorderAlpha,
                c = this.bulletAlpha,
                v = n.alpha;
            isNaN(v) || (c = v);
            switch (o) {
                case "round":
                    u = AmCharts.circle(r, f / 2, s, c, h, e, l);
                    break;
                case "square":
                    u = AmCharts.polygon(r, [0, f, f, 0], [0, 0, f, f], s, c, h, e, l);
                    t -= f / 2;
                    i -= f / 2;
                    a = -f / 2;
                    break;
                case "triangleUp":
                    u = AmCharts.triangle(r, f, 0, s, c, h, e, l);
                    break;
                case "triangleDown":
                    u = AmCharts.triangle(r, f, 180, s, c, h, e, l);
                    break;
                case "triangleLeft":
                    u = AmCharts.triangle(r, f, 270, s, c, h, e, l);
                    break;
                case "triangleRight":
                    u = AmCharts.triangle(r, f, 90, s, c, h, e, l);
                    break;
                case "bubble":
                    u = AmCharts.circle(r, f / 2, s, c, h, e, l, !0)
            }
        }
        return h = o = 0, (this.customBullet || n.customBullet) && (e = this.customBullet, n.customBullet && (e = n.customBullet), e && (u && u.remove(), "function" == typeof e ? (u = new e, u.chart = this.chart, n.bulletConfig && (u.availableSpace = i, u.graph = this, n.bulletConfig.minCoord = this.minCoord - i, u.bulletConfig = n.bulletConfig), u.write(r), u = u.set) : (this.chart.path && (e = this.chart.path + e), u = r.image(e, 0, 0, f, f), this.centerCustomBullets && (t -= f / 2, i -= f / 2, o -= f / 2, h -= f / 2)))), u && ((n.url || this.showHandOnHover) && u.setAttr("cursor", "pointer"), "serial" == this.chartType && (t - o < a || t - o > this.width || i < -f / 2 || i - h > this.height) && (u.remove(), u = null), u && (this.bulletSet.push(u), u.translate(t, i), this.addListeners(u, n), this.allBullets.push(u))), f
    },
    showBullets: function() {
        var t = this.allBullets,
            n;
        for (this.bulletsHidden = !1, n = 0; n < t.length; n++) t[n].show()
    },
    hideBullets: function() {
        var t = this.allBullets,
            n;
        for (this.bulletsHidden = !0, n = 0; n < t.length; n++) t[n].hide()
    },
    addListeners: function(n, t) {
        var i = this;
        n.mouseover(function() {
            i.handleRollOver(t)
        }).mouseout(function() {
            i.handleRollOut(t)
        }).touchend(function() {
            i.handleRollOver(t)
        }).touchstart(function() {
            i.handleRollOver(t)
        }).click(function() {
            i.handleClick(t)
        }).dblclick(function() {
            i.handleDoubleClick(t)
        }).contextmenu(function() {
            i.handleRightClick(t)
        })
    },
    handleRollOver: function(n) {
        var i, t, r;
        n && (i = this.chart, t = {
            type: "rollOverGraphItem",
            item: n,
            index: n.index,
            graph: this,
            target: this,
            chart: this.chart
        }, this.fire("rollOverGraphItem", t), i.fire("rollOverGraphItem", t), clearTimeout(i.hoverInt), t = this.showBalloon, i.chartCursor && "serial" == this.chartType && (t = !1, !i.chartCursor.valueBalloonsEnabled && this.showBalloon && (t = !0)), t && (t = i.formatString(this.balloonText, n, n.graph), r = this.balloonFunction, r && (t = r(n, n.graph)), t = AmCharts.cleanFromEmpty(t), n = i.getBalloonColor(this, n), i.balloon.showBullet = !1, i.balloon.pointerOrientation = "V", i.showBalloon(t, n, !0)))
    },
    handleRollOut: function(n) {
        this.chart.hideBalloon();
        n && (n = {
            type: "rollOutGraphItem",
            item: n,
            index: n.index,
            graph: this,
            target: this,
            chart: this.chart
        }, this.fire("rollOutGraphItem", n), this.chart.fire("rollOutGraphItem", n))
    },
    handleClick: function(n) {
        if (n) {
            var t = {
                type: "clickGraphItem",
                item: n,
                index: n.index,
                graph: this,
                target: this,
                chart: this.chart
            };
            this.fire("clickGraphItem", t);
            this.chart.fire("clickGraphItem", t);
            AmCharts.getURL(n.url, this.urlTarget)
        }
        this.handleGraphClick()
    },
    handleGraphClick: function() {
        var n = {
            type: "clickGraph",
            graph: this,
            target: this,
            chart: this.chart
        };
        this.fire("clickGraph", n);
        this.chart.fire("clickGraph", n)
    },
    handleRightClick: function(n) {
        n && (n = {
            type: "rightClickGraphItem",
            item: n,
            index: n.index,
            graph: this,
            target: this,
            chart: this.chart
        }, this.fire("rightClickGraphItem", n), this.chart.fire("rightClickGraphItem", n))
    },
    handleDoubleClick: function(n) {
        n && (n = {
            type: "doubleClickGraphItem",
            item: n,
            index: n.index,
            graph: this,
            target: this,
            chart: this.chart
        }, this.fire("doubleClickGraphItem", n), this.chart.fire("doubleClickGraphItem", n))
    },
    zoom: function(n, t) {
        this.start = n;
        this.end = t;
        this.draw()
    },
    changeOpacity: function(n) {
        var t = this.set,
            i, r;
        if (t && t.setAttr("opacity", n), t = this.ownColumns)
            for (i = 0; i < t.length; i++) r = t[i].set, r && r.setAttr("opacity", n);
        (t = this.bulletSet) && t.setAttr("opacity", n)
    },
    destroy: function() {
        var n, t;
        if (AmCharts.remove(this.set), AmCharts.remove(this.bulletSet), n = this.timeOuts, n)
            for (t = 0; t < n.length; t++) clearTimeout(n[t]);
        this.timeOuts = []
    }
});
AmCharts.ChartCursor = AmCharts.Class({
    construct: function() {
        this.createEvents("changed", "zoomed", "onHideCursor", "draw", "selected");
        this.enabled = !0;
        this.cursorAlpha = 1;
        this.selectionAlpha = .2;
        this.cursorColor = "#CC0000";
        this.categoryBalloonAlpha = 1;
        this.color = "#FFFFFF";
        this.type = "cursor";
        this.zoomed = !1;
        this.zoomable = !0;
        this.pan = !1;
        this.animate = !0;
        this.categoryBalloonDateFormat = "MMM DD, YYYY";
        this.categoryBalloonEnabled = this.valueBalloonsEnabled = !0;
        this.rolledOver = !1;
        this.cursorPosition = "middle";
        this.bulletsEnabled = this.skipZoomDispatch = !1;
        this.bulletSize = 8;
        this.selectWithoutZooming = this.oneBalloonOnly = !1
    },
    draw: function() {
        var t = this,
            i, n, r;
        if (t.destroy(), i = t.chart, n = i.container, t.rotate = i.rotate, t.container = n, n = n.set(), n.translate(t.x, t.y), t.set = n, i.cursorSet.push(n), n = new AmCharts.AmBalloon, n.chart = i, t.categoryBalloon = n, n.cornerRadius = 0, n.borderThickness = 0, n.borderAlpha = 0, n.showBullet = !1, r = t.categoryBalloonColor, void 0 === r && (r = t.cursorColor), n.fillColor = r, n.fillAlpha = t.categoryBalloonAlpha, n.borderColor = r, n.color = t.color, t.rotate && (n.pointerOrientation = "H"), t.valueBalloonsEnabled)
            for (n = 0; n < i.graphs.length; n++) r = new AmCharts.AmBalloon, r.chart = i, AmCharts.copyProperties(i.balloon, r), i.graphs[n].valueBalloon = r;
        "cursor" == t.type ? t.createCursor() : t.createCrosshair();
        t.interval = setInterval(function() {
            t.detectMovement.call(t)
        }, 40)
    },
    updateData: function() {
        var n = this.chart;
        this.data = n.chartData;
        this.firstTime = n.firstTime;
        this.lastTime = n.lastTime
    },
    createCursor: function() {
        var s = this.chart,
            a = this.cursorAlpha,
            h = s.categoryAxis,
            p = h.position,
            c = h.inside,
            l = h.axisThickness,
            i = this.categoryBalloon,
            v, y, f = s.dx,
            e = s.dy,
            n = this.x,
            t = this.y,
            r = this.width,
            u = this.height,
            s = s.rotate,
            o = h.tickLength;
        i.pointerWidth = o;
        s ? (v = [0, r, r + f], y = [0, 0, e]) : (v = [f, 0, 0], y = [e, 0, u]);
        this.line = a = AmCharts.line(this.container, v, y, this.cursorColor, a, 1);
        this.set.push(a);
        s ? (c && (i.pointerWidth = 0), "right" == p ? c ? i.setBounds(n, t + e, n + r + f, t + u + e) : i.setBounds(n + r + f + l, t + e, n + r + 1e3, t + u + e) : c ? i.setBounds(n, t, r + n, u + t) : i.setBounds(-1e3, -1e3, n - o - l, t + u + 15)) : (i.maxWidth = r, h.parseDates && (o = 0, i.pointerWidth = 0), "top" == p ? c ? i.setBounds(n + f, t + e, r + f + n, u + t) : i.setBounds(n + f, -1e3, r + f + n, t + e - o - l) : c ? i.setBounds(n, t, r + n, u + t - o) : i.setBounds(n, t + u + o + l - 1, n + r, t + u + o + l));
        this.hideCursor()
    },
    createCrosshair: function() {
        var n = this.cursorAlpha,
            t = this.container,
            i = AmCharts.line(t, [0, 0], [0, this.height], this.cursorColor, n, 1),
            n = AmCharts.line(t, [0, this.width], [0, 0], this.cursorColor, n, 1);
        this.set.push(i);
        this.set.push(n);
        this.vLine = i;
        this.hLine = n;
        this.hideCursor()
    },
    detectMovement: function() {
        var n = this.chart,
            t, i;
        n.mouseIsOver ? (t = n.mouseX - this.x, i = n.mouseY - this.y, 0 < t && t < this.width && 0 < i && i < this.height ? (this.drawing ? this.rolledOver || n.setMouseCursor("crosshair") : this.pan && (this.rolledOver || n.setMouseCursor("move")), this.rolledOver = !0, this.setPosition()) : this.rolledOver && (this.handleMouseOut(), this.rolledOver = !1)) : this.rolledOver && (this.handleMouseOut(), this.rolledOver = !1)
    },
    getMousePosition: function() {
        var n, t = this.width,
            i = this.height;
        return n = this.chart, this.rotate ? (n = n.mouseY - this.y, 0 > n && (n = 0), n > i && (n = i)) : (n = n.mouseX - this.x, 0 > n && (n = 0), n > t && (n = t)), n
    },
    updateCrosshair: function() {
        var n = this.chart,
            t = n.mouseX - this.x,
            i = n.mouseY - this.y,
            r = this.vLine,
            u = this.hLine,
            t = AmCharts.fitToBounds(t, 0, this.width),
            i = AmCharts.fitToBounds(i, 0, this.height);
        0 < this.cursorAlpha && (r.show(), u.show(), r.translate(t, 0), u.translate(0, i));
        this.zooming && (n.hideXScrollbar && (t = NaN), n.hideYScrollbar && (i = NaN), this.updateSelectionSize(t, i));
        n.mouseIsOver || this.zooming || this.hideCursor()
    },
    updateSelectionSize: function(n, t) {
        AmCharts.remove(this.selection);
        var i = this.selectionPosX,
            r = this.selectionPosY,
            e = 0,
            o = 0,
            u = this.width,
            f = this.height;
        isNaN(n) || (i > n && (e = n, u = i - n), i < n && (e = i, u = n - i), i == n && (e = n, u = 0));
        isNaN(t) || (r > t && (o = t, f = r - t), r < t && (o = r, f = t - r), r == t && (o = t, f = 0));
        0 < u && 0 < f && (i = AmCharts.rect(this.container, u, f, this.cursorColor, this.selectionAlpha), i.translate(e + this.x, o + this.y), this.selection = i)
    },
    arrangeBalloons: function() {
        var i = this.valueBalloons,
            r = this.x,
            u = this.y,
            f = this.height + u,
            n, t;
        for (i.sort(this.compareY), n = 0; n < i.length; n++) t = i[n].balloon, t.setBounds(r, u, r + this.width, f), t.draw(), f = t.yPos - 3;
        this.arrangeBalloons2()
    },
    compareY: function(n, t) {
        return n.yy < t.yy ? 1 : -1
    },
    arrangeBalloons2: function() {
        var r = this.valueBalloons,
            e, u, i, t, n, f;
        for (r.reverse(), u = this.x, t = 0; t < r.length; t++) n = r[t].balloon, e = n.bottom, f = n.bottom - n.yPos, 0 < t && e - f < i + 3 && (n.setBounds(u, i + 3, u + this.width, i + f + 3), n.draw()), n.set && n.set.show(), i = n.bottom
    },
    showBullets: function() {
        var f, t, r, n, u, i, e, o;
        for (AmCharts.remove(this.allBullets), f = this.container, t = f.set(), this.set.push(t), this.set.show(), this.allBullets = t, t = this.chart.graphs, r = 0; r < t.length; r++) n = t[r], !n.hidden && n.balloonText && (u = this.data[this.index].axes[n.valueAxis.id].graphs[n.id], i = u.y, isNaN(i) || (e = u.x, this.rotate ? (o = i, i = e) : o = e, n = AmCharts.circle(f, this.bulletSize / 2, this.chart.getBalloonColor(n, u), n.cursorBulletAlpha), n.translate(o, i), this.allBullets.push(n)))
    },
    destroy: function() {
        this.clear();
        AmCharts.remove(this.selection);
        this.selection = null;
        var n = this.categoryBalloon;
        n && n.destroy();
        this.destroyValueBalloons();
        AmCharts.remove(this.set)
    },
    clear: function() {
        clearInterval(this.interval)
    },
    destroyValueBalloons: function() {
        var t = this.valueBalloons,
            n;
        if (t)
            for (n = 0; n < t.length; n++) t[n].balloon.hide()
    },
    zoom: function(n, t, i, r) {
        var u = this.chart,
            f, e, o;
        this.destroyValueBalloons();
        this.zooming = !1;
        this.rotate ? this.selectionPosY = f = u.mouseY : this.selectionPosX = f = u.mouseX;
        this.start = n;
        this.end = t;
        this.startTime = i;
        this.endTime = r;
        this.zoomed = !0;
        e = u.categoryAxis;
        u = this.rotate;
        f = this.width;
        o = this.height;
        e.parseDates && !e.equalSpacing ? (n = r - i + e.minDuration(), n = u ? o / n : f / n) : n = u ? o / (t - n) : f / (t - n);
        this.stepWidth = n;
        this.setPosition();
        this.hideCursor()
    },
    hideObj: function(n) {
        n && n.hide()
    },
    hideCursor: function(n) {
        void 0 === n && (n = !0);
        this.hideObj(this.set);
        this.hideObj(this.categoryBalloon);
        this.hideObj(this.line);
        this.hideObj(this.vLine);
        this.hideObj(this.hLine);
        this.hideObj(this.allBullets);
        this.destroyValueBalloons();
        this.selectWithoutZooming || AmCharts.remove(this.selection);
        this.previousIndex = NaN;
        n && this.fire("onHideCursor", {
            type: "onHideCursor",
            chart: this.chart,
            target: this
        });
        this.drawing || this.chart.setMouseCursor("auto")
    },
    setPosition: function(n, t) {
        if (void 0 === t && (t = !0), "cursor" == this.type) {
            if (AmCharts.ifArray(this.data)) {
                if (isNaN(n) && (n = this.getMousePosition()), (n != this.previousMousePosition || !0 === this.zoomed || this.oneBalloonOnly) && !isNaN(n)) {
                    var i = this.chart.categoryAxis.xToIndex(n);
                    (i != this.previousIndex || this.zoomed || "mouse" == this.cursorPosition || this.oneBalloonOnly) && (this.updateCursor(i, t), this.zoomed = !1)
                }
                this.previousMousePosition = n
            }
        } else this.updateCrosshair()
    },
    updateCursor: function(n, t) {
        var h = this.chart,
            s = h.mouseX - this.x,
            g = h.mouseY - this.y;
        if (this.drawingNow && (AmCharts.remove(this.drawingLine), this.drawingLine = AmCharts.line(this.container, [this.x + this.drawStartX, this.x + s], [this.y + this.drawStartY, this.y + g], this.cursorColor, 1, 1)), this.enabled) {
            void 0 === t && (t = !0);
            this.index = n;
            var e = h.categoryAxis,
                r = h.dx,
                o = h.dy,
                c = this.x,
                l = this.y,
                b = this.width,
                nt = this.height,
                k = this.data[n];
            if (k) {
                var i = k.x[e.id],
                    v = h.rotate,
                    a = e.inside,
                    w = this.stepWidth,
                    f = this.categoryBalloon,
                    y = this.firstTime,
                    u = this.lastTime,
                    ut = this.cursorPosition,
                    it = e.position,
                    p = this.zooming,
                    ft = this.panning,
                    tt = h.graphs,
                    rt = e.axisThickness;
                if (h.mouseIsOver || p || ft || this.forceShow)
                    if (this.forceShow = !1, ft) {
                        var r = this.panClickPos,
                            h = this.panClickEndTime,
                            p = this.panClickStartTime,
                            d = this.panClickEnd,
                            c = this.panClickStart,
                            s = (v ? r - g : r - s) / w;
                        (!e.parseDates || e.equalSpacing) && (s = Math.round(s));
                        0 !== s && (r = {
                            type: "zoomed",
                            target: this
                        }, r.chart = this.chart, e.parseDates && !e.equalSpacing ? (h + s > u && (s = u - h), p + s < y && (s = y - p), r.start = p + s, r.end = h + s, this.fire(r.type, r)) : d + s >= this.data.length || 0 > c + s || (r.start = c + s, r.end = d + s, this.fire(r.type, r)))
                    } else {
                        if ("start" == ut && (i -= e.cellWidth / 2), "mouse" == ut && h.mouseIsOver && (i = v ? g - 2 : s - 2), v) {
                            if (0 > i)
                                if (p) i = 0;
                                else {
                                    this.hideCursor();
                                    return
                                }
                            if (i > nt + 1)
                                if (p) i = nt + 1;
                                else {
                                    this.hideCursor();
                                    return
                                }
                        } else {
                            if (0 > i)
                                if (p) i = 0;
                                else {
                                    this.hideCursor();
                                    return
                                }
                            if (i > b)
                                if (p) i = b;
                                else {
                                    this.hideCursor();
                                    return
                                }
                        }
                        if (0 < this.cursorAlpha && (y = this.line, v ? y.translate(0, i + o) : y.translate(i, 0), y.show()), this.linePos = v ? i + o : i, p && (v ? this.updateSelectionSize(NaN, i) : this.updateSelectionSize(i, NaN)), y = !0, p && (y = !1), this.categoryBalloonEnabled && y ? (v ? (a && ("right" == it ? f.setBounds(c, l + o, c + b + r, l + i + o) : f.setBounds(c, l + o, c + b + r, l + i)), "right" == it ? a ? f.setPosition(c + b + r, l + i + o) : f.setPosition(c + b + r + rt, l + i + o) : a ? f.setPosition(c, l + i) : f.setPosition(c - rt, l + i)) : "top" == it ? a ? f.setPosition(c + i + r, l + o) : f.setPosition(c + i + r, l + o - rt + 1) : a ? f.setPosition(c + i, l + nt) : f.setPosition(c + i, l + nt + rt - 1), (u = this.categoryBalloonFunction) ? f.showBalloon(u(k.category)) : e.parseDates ? (e = AmCharts.formatDate(k.category, this.categoryBalloonDateFormat), -1 != e.indexOf("fff") && (e = AmCharts.formatMilliseconds(e, k.category)), f.showBalloon(e)) : f.showBalloon(k.category)) : f.hide(), tt && this.bulletsEnabled && this.showBullets(), this.destroyValueBalloons(), tt && this.valueBalloonsEnabled && y && h.balloon.enabled) {
                            if (this.valueBalloons = y = [], this.oneBalloonOnly) {
                                for (o = Infinity, e = 0; e < tt.length; e++) u = tt[e], u.showBalloon && !u.hidden && u.balloonText && (w = k.axes[u.valueAxis.id].graphs[u.id], f = w.y, isNaN(f) || (v ? Math.abs(s - f) < o && (o = Math.abs(s - f), d = u) : Math.abs(g - f) < o && (o = Math.abs(g - f), d = u)));
                                this.mostCloseGraph && (d = this.mostCloseGraph)
                            }
                            for (e = 0; e < tt.length; e++)(u = tt[e], this.oneBalloonOnly && u != d || !u.showBalloon || u.hidden || !u.balloonText || (w = k.axes[u.valueAxis.id].graphs[u.id], f = w.y, isNaN(f))) || (a = w.x, i = !0, v ? (o = f, 0 > a || a > nt) && (i = !1) : (o = a, a = f, 0 > o || o > b + r) && (i = !1), i && (i = u.valueBalloon, it = h.getBalloonColor(u, w), i.setBounds(c, l, c + b, l + nt), i.pointerOrientation = "H", i.changeColor(it), void 0 !== u.balloonAlpha && (i.fillAlpha = u.balloonAlpha), void 0 !== u.balloonTextColor && (i.color = u.balloonTextColor), i.setPosition(o + c, a + l), o = h.formatString(u.balloonText, w, u), (a = u.balloonFunction) && (o = a(w, u)), "" !== o && i.showBalloon(o), !v && i.set && i.set.hide(), y.push({
                                yy: f,
                                balloon: i
                            })));
                            v || this.arrangeBalloons()
                        }
                        t ? (r = {
                            type: "changed"
                        }, r.index = n, r.target = this, r.chart = this.chart, r.zooming = p, r.mostCloseGraph = d, r.position = v ? g : s, r.target = this, h.fire("changed", r), this.fire("changed", r), this.skipZoomDispatch = !1) : (this.skipZoomDispatch = !0, h.updateLegendValues(n));
                        this.previousIndex = n
                    }
            }
        } else this.hideCursor()
    },
    enableDrawing: function(n) {
        this.enabled = !n;
        this.hideCursor();
        this.rolledOver = !1;
        this.drawing = n
    },
    isZooming: function(n) {
        n && n != this.zooming && this.handleMouseDown("fake");
        n || n == this.zooming || this.handleMouseUp()
    },
    handleMouseOut: function() {
        if (this.enabled)
            if (this.zooming) this.setPosition();
            else {
                this.index = void 0;
                var n = {
                    type: "changed",
                    index: void 0,
                    target: this
                };
                n.chart = this.chart;
                this.fire("changed", n);
                this.hideCursor()
            }
    },
    handleReleaseOutside: function() {
        this.handleMouseUp()
    },
    handleMouseUp: function() {
        var r = this.chart,
            u = this.data,
            n, i, t, f, e, o;
        r && (i = r.mouseX - this.x, t = r.mouseY - this.y, this.drawingNow && (this.drawingNow = !1, AmCharts.remove(this.drawingLine), n = this.drawStartX, f = this.drawStartY, (2 < Math.abs(n - i) || 2 < Math.abs(f - t)) && (n = {
            type: "draw",
            target: this,
            chart: r,
            initialX: n,
            initialY: f,
            finalX: i,
            finalY: t
        }, this.fire(n.type, n))), this.enabled && 0 < u.length && (this.pan ? this.rolledOver = !1 : this.zoomable && this.zooming && (n = this.selectWithoutZooming ? {
            type: "selected"
        } : {
            type: "zoomed"
        }, n.target = this, n.chart = r, "cursor" == this.type ? (this.rotate ? this.selectionPosY = t : this.selectionPosX = t = i, 2 > Math.abs(t - this.initialMouse) && this.fromIndex == this.index || (this.index < this.fromIndex ? (n.end = this.fromIndex, n.start = this.index) : (n.end = this.index, n.start = this.fromIndex), t = r.categoryAxis, t.parseDates && !t.equalSpacing && (n.start = u[n.start].time, n.end = r.getEndTime(u[n.end].time)), this.skipZoomDispatch || this.fire(n.type, n))) : (e = this.initialMouseX, o = this.initialMouseY, 3 > Math.abs(i - e) && 3 > Math.abs(t - o) || (u = Math.min(e, i), f = Math.min(o, t), i = Math.abs(e - i), t = Math.abs(o - t), r.hideXScrollbar && (u = 0, i = this.width), r.hideYScrollbar && (f = 0, t = this.height), n.selectionHeight = t, n.selectionWidth = i, n.selectionY = f, n.selectionX = u, this.skipZoomDispatch || this.fire(n.type, n))), this.selectWithoutZooming || AmCharts.remove(this.selection)), this.panning = this.zooming = this.skipZoomDispatch = !1))
    },
    showCursorAt: function(n) {
        var t = this.chart.categoryAxis;
        n = t.parseDates ? t.dateToCoordinate(n) : t.categoryToCoordinate(n);
        this.previousMousePosition = NaN;
        this.forceShow = !0;
        this.setPosition(n, !1)
    },
    handleMouseDown: function(n) {
        if (this.zoomable || this.pan || this.drawing) {
            var u = this.rotate,
                r = this.chart,
                t = r.mouseX - this.x,
                i = r.mouseY - this.y;
            (0 < t && t < this.width && 0 < i && i < this.height || "fake" == n) && (this.setPosition(), this.selectWithoutZooming && AmCharts.remove(this.selection), this.drawing ? (this.drawStartY = i, this.drawStartX = t, this.drawingNow = !0) : this.pan ? (this.zoomable = !1, r.setMouseCursor("move"), this.panning = !0, this.panClickPos = u ? i : t, this.panClickStart = this.start, this.panClickEnd = this.end, this.panClickStartTime = this.startTime, this.panClickEndTime = this.endTime) : this.zoomable && ("cursor" == this.type ? (this.fromIndex = this.index, u ? (this.initialMouse = i, this.selectionPosY = this.linePos) : (this.initialMouse = t, this.selectionPosX = this.linePos)) : (this.initialMouseX = t, this.initialMouseY = i, this.selectionPosX = t, this.selectionPosY = i), this.zooming = !0))
        }
    }
});
AmCharts.SimpleChartScrollbar = AmCharts.Class({
    construct: function() {
        this.createEvents("zoomed");
        this.backgroundColor = "#D4D4D4";
        this.backgroundAlpha = 1;
        this.selectedBackgroundColor = "#EFEFEF";
        this.scrollDuration = this.selectedBackgroundAlpha = 1;
        this.resizeEnabled = !0;
        this.hideResizeGrips = !1;
        this.scrollbarHeight = 20;
        this.updateOnReleaseOnly = !1;
        9 > document.documentMode && (this.updateOnReleaseOnly = !0);
        this.dragIconWidth = 11;
        this.dragIconHeight = 18
    },
    draw: function() {
        var n = this,
            t, e, r, c, l;
        n.destroy();
        n.interval = setInterval(function() {
            n.updateScrollbar.call(n)
        }, 40);
        var i = n.chart.container,
            u = n.rotate,
            o = n.chart,
            f = i.set();
        if (n.set = f, o.scrollbarsSet.push(f), u ? (t = n.scrollbarHeight, e = o.plotAreaHeight) : (e = n.scrollbarHeight, t = o.plotAreaWidth), n.width = t, (n.height = e) && t) {
            r = AmCharts.rect(i, t, e, n.backgroundColor, n.backgroundAlpha);
            n.bg = r;
            f.push(r);
            r = AmCharts.rect(i, t, e, "#000", .005);
            f.push(r);
            n.invisibleBg = r;
            r.click(function() {
                n.handleBgClick()
            }).mouseover(function() {
                n.handleMouseOver()
            }).mouseout(function() {
                n.handleMouseOut()
            }).touchend(function() {
                n.handleBgClick()
            });
            r = AmCharts.rect(i, t, e, n.selectedBackgroundColor, n.selectedBackgroundAlpha);
            n.selectedBG = r;
            f.push(r);
            t = AmCharts.rect(i, t, e, "#000", .005);
            n.dragger = t;
            f.push(t);
            t.mousedown(function(t) {
                n.handleDragStart(t)
            }).mouseup(function() {
                n.handleDragStop()
            }).mouseover(function() {
                n.handleDraggerOver()
            }).mouseout(function() {
                n.handleMouseOut()
            }).touchstart(function(t) {
                n.handleDragStart(t)
            }).touchend(function() {
                n.handleDragStop()
            });
            t = o.pathToImages;
            u ? (r = t + "dragIconH.gif", t = n.dragIconWidth, u = n.dragIconHeight) : (r = t + "dragIcon.gif", u = n.dragIconWidth, t = n.dragIconHeight);
            e = i.image(r, 0, 0, u, t);
            var r = i.image(r, 0, 0, u, t),
                s = 10,
                h = 20;
            o.panEventsEnabled && (s = 25, h = n.scrollbarHeight);
            c = AmCharts.rect(i, s, h, "#000", .005);
            l = AmCharts.rect(i, s, h, "#000", .005);
            l.translate(-(s - u) / 2, -(h - t) / 2);
            c.translate(-(s - u) / 2, -(h - t) / 2);
            u = i.set([e, l]);
            i = i.set([r, c]);
            n.iconLeft = u;
            f.push(n.iconLeft);
            n.iconRight = i;
            f.push(i);
            u.mousedown(function() {
                n.leftDragStart()
            }).mouseup(function() {
                n.leftDragStop()
            }).mouseover(function() {
                n.iconRollOver()
            }).mouseout(function() {
                n.iconRollOut()
            }).touchstart(function() {
                n.leftDragStart()
            }).touchend(function() {
                n.leftDragStop()
            });
            i.mousedown(function() {
                n.rightDragStart()
            }).mouseup(function() {
                n.rightDragStop()
            }).mouseover(function() {
                n.iconRollOver()
            }).mouseout(function() {
                n.iconRollOut()
            }).touchstart(function() {
                n.rightDragStart()
            }).touchend(function() {
                n.rightDragStop()
            });
            AmCharts.ifArray(o.chartData) ? f.show() : f.hide();
            n.hideDragIcons()
        }
        f.translate(n.x, n.y);
        n.clipDragger(!1)
    },
    updateScrollbarSize: function(n, t) {
        var i = this.dragger,
            r, u, f, e;
        this.rotate ? (r = 0, u = n, f = this.width + 1, e = t - n, i.setAttr("height", t - n), i.setAttr("y", u)) : (r = n, u = 0, f = t - n, e = this.height + 1, i.setAttr("width", t - n), i.setAttr("x", r));
        this.clipAndUpdate(r, u, f, e)
    },
    updateScrollbar: function() {
        var n, c = !1,
            r, t, f = this.x,
            e = this.y,
            u = this.dragger,
            o = this.getDBox();
        r = o.x + f;
        t = o.y + e;
        var l = o.width,
            o = o.height,
            a = this.rotate,
            i = this.chart,
            s = this.width,
            h = this.height,
            v = i.mouseX,
            y = i.mouseY;
        n = this.initialMouse;
        i.mouseIsOver && (this.dragging && (i = this.initialCoord, a ? (n = i + (y - n), 0 > n && (n = 0), i = h - o, n > i && (n = i), u.setAttr("y", n)) : (n = i + (v - n), 0 > n && (n = 0), i = s - l, n > i && (n = i), u.setAttr("x", n))), this.resizingRight && (a ? (n = y - t, n + t > h + e && (n = h - t + e), 0 > n ? (this.resizingRight = !1, c = this.resizingLeft = !0) : (0 === n && (n = .1), u.setAttr("height", n))) : (n = v - r, n + r > s + f && (n = s - r + f), 0 > n ? (this.resizingRight = !1, c = this.resizingLeft = !0) : (0 === n && (n = .1), u.setAttr("width", n)))), this.resizingLeft && (a ? (r = t, t = y, t < e && (t = e), t > h + e && (t = h + e), n = !0 === c ? r - t : o + r - t, 0 > n ? (this.resizingRight = !0, this.resizingLeft = !1, u.setAttr("y", r + o - e)) : (0 === n && (n = .1), u.setAttr("y", t - e), u.setAttr("height", n))) : (t = v, t < f && (t = f), t > s + f && (t = s + f), n = !0 === c ? r - t : l + r - t, 0 > n ? (this.resizingRight = !0, this.resizingLeft = !1, u.setAttr("x", r + l - f)) : (0 === n && (n = .1), u.setAttr("x", t - f), u.setAttr("width", n)))), this.clipDragger(!0))
    },
    clipDragger: function(n) {
        var t = this.getDBox(),
            i = t.x,
            r = t.y,
            u = t.width,
            t = t.height,
            f = !1;
        this.rotate ? (i = 0, u = this.width + 1, this.clipY != r || this.clipH != t) && (f = !0) : (r = 0, t = this.height + 1, this.clipX != i || this.clipW != u) && (f = !0);
        f && (this.clipAndUpdate(i, r, u, t), n && (this.updateOnReleaseOnly || this.dispatchScrollbarEvent()))
    },
    maskGraphs: function() {},
    clipAndUpdate: function(n, t, i, r) {
        this.clipX = n;
        this.clipY = t;
        this.clipW = i;
        this.clipH = r;
        this.selectedBG.clipRect(n, t, i, r);
        this.updateDragIconPositions();
        this.maskGraphs(n, t, i, r)
    },
    dispatchScrollbarEvent: function() {
        var n;
        if (this.skipEvent) this.skipEvent = !1;
        else {
            n = this.chart;
            n.hideBalloon();
            var t = this.getDBox(),
                r = t.x,
                u = t.y,
                i = t.width,
                t = t.height;
            this.rotate ? (r = u, i = this.height / t) : i = this.width / i;
            n = {
                type: "zoomed",
                position: r,
                chart: n,
                target: this,
                multiplier: i
            };
            this.fire(n.type, n)
        }
    },
    updateDragIconPositions: function() {
        var i = this.getDBox(),
            u = i.x,
            f = i.y,
            e = this.iconLeft,
            o = this.iconRight,
            n, t, r = this.scrollbarHeight;
        this.rotate ? (n = this.dragIconWidth, t = this.dragIconHeight, e.translate((r - t) / 2, f - n / 2), o.translate((r - t) / 2, f + i.height - n / 2)) : (n = this.dragIconHeight, t = this.dragIconWidth, e.translate(u - t / 2, (r - n) / 2), o.translate(u + -t / 2 + i.width, (r - n) / 2))
    },
    showDragIcons: function() {
        this.resizeEnabled && (this.iconLeft.show(), this.iconRight.show())
    },
    hideDragIcons: function() {
        this.resizingLeft || this.resizingRight || this.dragging || (this.hideResizeGrips && (this.iconLeft.hide(), this.iconRight.hide()), this.removeCursors())
    },
    removeCursors: function() {
        this.chart.setMouseCursor("auto")
    },
    relativeZoom: function(n, t) {
        this.dragger.stop();
        this.multiplier = n;
        this.position = t;
        this.updateScrollbarSize(t, this.rotate ? t + this.height / n : t + this.width / n)
    },
    destroy: function() {
        this.clear();
        AmCharts.remove(this.set)
    },
    clear: function() {
        clearInterval(this.interval)
    },
    handleDragStart: function() {
        var t = this.chart,
            n;
        this.dragger.stop();
        this.removeCursors();
        this.dragging = !0;
        n = this.getDBox();
        this.rotate ? (this.initialCoord = n.y, this.initialMouse = t.mouseY) : (this.initialCoord = n.x, this.initialMouse = t.mouseX)
    },
    handleDragStop: function() {
        this.updateOnReleaseOnly && (this.updateScrollbar(), this.skipEvent = !1, this.dispatchScrollbarEvent());
        this.dragging = !1;
        this.mouseIsOver && this.removeCursors();
        this.updateScrollbar()
    },
    handleDraggerOver: function() {
        this.handleMouseOver()
    },
    leftDragStart: function() {
        this.dragger.stop();
        this.resizingLeft = !0
    },
    leftDragStop: function() {
        this.resizingLeft = !1;
        this.mouseIsOver || this.removeCursors();
        this.updateOnRelease()
    },
    rightDragStart: function() {
        this.dragger.stop();
        this.resizingRight = !0
    },
    rightDragStop: function() {
        this.resizingRight = !1;
        this.mouseIsOver || this.removeCursors();
        this.updateOnRelease()
    },
    iconRollOut: function() {
        this.removeCursors()
    },
    iconRollOver: function() {
        this.rotate ? this.chart.setMouseCursor("n-resize") : this.chart.setMouseCursor("e-resize");
        this.handleMouseOver()
    },
    getDBox: function() {
        return this.dragger.getBBox()
    },
    handleBgClick: function() {
        var t, n, r, i, u, f;
        if (!this.resizingRight && !this.resizingLeft) {
            this.zooming = !0;
            r = this.scrollDuration;
            i = this.dragger;
            t = this.getDBox();
            u = t.height;
            f = t.width;
            n = this.chart;
            var o = this.y,
                s = this.x,
                e = this.rotate;
            e ? (t = "y", n = n.mouseY - u / 2 - o, n = AmCharts.fitToBounds(n, 0, this.height - u)) : (t = "x", n = n.mouseX - f / 2 - s, n = AmCharts.fitToBounds(n, 0, this.width - f));
            this.updateOnReleaseOnly ? (this.skipEvent = !1, i.setAttr(t, n), this.dispatchScrollbarEvent(), this.clipDragger()) : (n = Math.round(n), e ? i.animate({
                y: n
            }, r, ">") : i.animate({
                x: n
            }, r, ">"))
        }
    },
    updateOnRelease: function() {
        this.updateOnReleaseOnly && (this.updateScrollbar(), this.skipEvent = !1, this.dispatchScrollbarEvent())
    },
    handleReleaseOutside: function() {
        this.set && ((this.resizingLeft || this.resizingRight || this.dragging) && (this.updateOnRelease(), this.removeCursors()), this.mouseIsOver = this.dragging = this.resizingRight = this.resizingLeft = !1, this.hideDragIcons(), this.updateScrollbar())
    },
    handleMouseOver: function() {
        this.mouseIsOver = !0;
        this.showDragIcons()
    },
    handleMouseOut: function() {
        this.mouseIsOver = !1;
        this.hideDragIcons()
    }
});
AmCharts.ChartScrollbar = AmCharts.Class({
    inherits: AmCharts.SimpleChartScrollbar,
    construct: function() {
        AmCharts.ChartScrollbar.base.construct.call(this);
        this.graphLineColor = "#BBBBBB";
        this.graphLineAlpha = 0;
        this.graphFillColor = "#BBBBBB";
        this.graphFillAlpha = 1;
        this.selectedGraphLineColor = "#888888";
        this.selectedGraphLineAlpha = 0;
        this.selectedGraphFillColor = "#888888";
        this.selectedGraphFillAlpha = 1;
        this.gridCount = 0;
        this.gridColor = "#FFFFFF";
        this.gridAlpha = .7;
        this.skipEvent = this.autoGridCount = !1;
        this.color = "#FFFFFF";
        this.scrollbarCreated = !1
    },
    init: function() {
        var n = this.categoryAxis,
            t = this.chart;
        n || (this.categoryAxis = n = new AmCharts.CategoryAxis);
        n.chart = t;
        n.id = "scrollbar";
        n.dateFormats = t.categoryAxis.dateFormats;
        n.boldPeriodBeginning = t.categoryAxis.boldPeriodBeginning;
        n.axisItemRenderer = AmCharts.RecItem;
        n.axisRenderer = AmCharts.RecAxis;
        n.guideFillRenderer = AmCharts.RecFill;
        n.inside = !0;
        n.fontSize = this.fontSize;
        n.tickLength = 0;
        n.axisAlpha = 0;
        this.graph && (n = this.valueAxis, n || (this.valueAxis = n = new AmCharts.ValueAxis, n.visible = !1, n.scrollbar = !0, n.axisItemRenderer = AmCharts.RecItem, n.axisRenderer = AmCharts.RecAxis, n.guideFillRenderer = AmCharts.RecFill, n.labelsEnabled = !1, n.chart = t), t = this.unselectedGraph, t || (t = new AmCharts.AmGraph, t.scrollbar = !0, this.unselectedGraph = t, t.negativeBase = this.graph.negativeBase), t = this.selectedGraph, t || (t = new AmCharts.AmGraph, t.scrollbar = !0, this.selectedGraph = t, t.negativeBase = this.graph.negativeBase));
        this.scrollbarCreated = !0
    },
    draw: function() {
        var n = this,
            u, t, s, h, p, w, i, y;
        AmCharts.ChartScrollbar.base.draw.call(n);
        n.scrollbarCreated || n.init();
        var e = n.chart,
            o = e.chartData,
            f = n.categoryAxis,
            c = n.rotate,
            s = n.x,
            h = n.y,
            l = n.width,
            a = n.height,
            r = e.categoryAxis,
            v = n.set;
        if (f.setOrientation(!c), f.parseDates = r.parseDates, f.rotate = c, f.equalSpacing = r.equalSpacing, f.minPeriod = r.minPeriod, f.startOnAxis = r.startOnAxis, f.viW = l, f.viH = a, f.width = l, f.height = a, f.gridCount = n.gridCount, f.gridColor = n.gridColor, f.gridAlpha = n.gridAlpha, f.color = n.color, f.autoGridCount = n.autoGridCount, f.parseDates && !f.equalSpacing && f.timeZoom(e.firstTime, e.lastTime), f.zoom(0, o.length - 1), r = n.graph) {
            for (u = n.valueAxis, t = r.valueAxis, u.id = t.id, u.rotate = c, u.setOrientation(c), u.width = l, u.height = a, u.viW = l, u.viH = a, u.dataProvider = o, u.reversed = t.reversed, u.logarithmic = t.logarithmic, u.gridAlpha = 0, u.axisAlpha = 0, v.push(u.set), c ? u.y = h : u.x = s, s = Infinity, h = -Infinity, p = 0; p < o.length; p++) {
                w = o[p].axes[t.id].graphs[r.id].values;
                for (i in w) w.hasOwnProperty(i) && "percents" != i && "total" != i && (y = w[i], y < s && (s = y), y > h && (h = y))
            }
            Infinity != s && (u.minimum = s); - Infinity != h && (u.maximum = h + .1 * (h - s));
            s == h && (u.minimum -= 1, u.maximum += 1);
            void 0 !== n.minimum && (u.minimum = n.minimum);
            void 0 !== n.maximum && (u.maximum = n.maximum);
            u.zoom(0, o.length - 1);
            i = n.unselectedGraph;
            i.id = r.id;
            i.rotate = c;
            i.chart = e;
            i.chartType = e.chartType;
            i.data = o;
            i.valueAxis = u;
            i.chart = r.chart;
            i.categoryAxis = n.categoryAxis;
            i.valueField = r.valueField;
            i.openField = r.openField;
            i.closeField = r.closeField;
            i.highField = r.highField;
            i.lowField = r.lowField;
            i.lineAlpha = n.graphLineAlpha;
            i.lineColor = n.graphLineColor;
            i.fillAlphas = n.graphFillAlpha;
            i.fillColors = n.graphFillColor;
            i.connect = r.connect;
            i.hidden = r.hidden;
            i.width = l;
            i.height = a;
            t = n.selectedGraph;
            t.id = r.id;
            t.rotate = c;
            t.chart = e;
            t.chartType = e.chartType;
            t.data = o;
            t.valueAxis = u;
            t.chart = r.chart;
            t.categoryAxis = f;
            t.valueField = r.valueField;
            t.openField = r.openField;
            t.closeField = r.closeField;
            t.highField = r.highField;
            t.lowField = r.lowField;
            t.lineAlpha = n.selectedGraphLineAlpha;
            t.lineColor = n.selectedGraphLineColor;
            t.fillAlphas = n.selectedGraphFillAlpha;
            t.fillColors = n.selectedGraphFillColor;
            t.connect = r.connect;
            t.hidden = r.hidden;
            t.width = l;
            t.height = a;
            e = n.graphType;
            e || (e = r.type);
            i.type = e;
            t.type = e;
            o = o.length - 1;
            i.zoom(0, o);
            t.zoom(0, o);
            t.set.click(function() {
                n.handleBackgroundClick()
            }).mouseover(function() {
                n.handleMouseOver()
            }).mouseout(function() {
                n.handleMouseOut()
            });
            i.set.click(function() {
                n.handleBackgroundClick()
            }).mouseover(function() {
                n.handleMouseOver()
            }).mouseout(function() {
                n.handleMouseOut()
            });
            v.push(i.set);
            v.push(t.set)
        }
        v.push(f.set);
        v.push(f.labelsSet);
        n.bg.toBack();
        n.invisibleBg.toFront();
        n.dragger.toFront();
        n.iconLeft.toFront();
        n.iconRight.toFront()
    },
    timeZoom: function(n, t) {
        this.startTime = n;
        this.endTime = t;
        this.timeDifference = t - n;
        this.skipEvent = !0;
        this.zoomScrollbar()
    },
    zoom: function(n, t) {
        this.start = n;
        this.end = t;
        this.skipEvent = !0;
        this.zoomScrollbar()
    },
    dispatchScrollbarEvent: function() {
        var t, r, f, n, u, e;
        if (this.skipEvent) this.skipEvent = !1;
        else {
            t = this.chart.chartData;
            n = this.dragger.getBBox();
            r = n.x;
            f = n.y;
            var i = n.width,
                u = n.height,
                n = this.chart;
            this.rotate ? (r = f, f = u) : f = i;
            i = {
                type: "zoomed",
                target: this
            };
            i.chart = n;
            u = this.categoryAxis;
            e = this.stepWidth;
            u.parseDates && !u.equalSpacing ? (t = n.firstTime, u.minDuration(), n = Math.round(r / e) + t, t = this.dragging ? n + this.timeDifference : Math.round((r + f) / e) + t, n > t && (n = t), n != this.startTime || t != this.endTime) && (this.startTime = n, this.endTime = t, i.start = n, i.end = t, i.startDate = new Date(n), i.endDate = new Date(t), this.fire(i.type, i)) : (u.startOnAxis || (r += e / 2), f -= this.stepWidth / 2, n = u.xToIndex(r), r = u.xToIndex(r + f), n != this.start || this.end != r) && (u.startOnAxis && (this.resizingRight && n == r && r++, this.resizingLeft && n == r && (0 < n ? n-- : r = 1)), this.start = n, this.end = this.dragging ? this.start + this.difference : r, i.start = this.start, i.end = this.end, u.parseDates && (t[this.start] && (i.startDate = new Date(t[this.start].time)), t[this.end] && (i.endDate = new Date(t[this.end].time))), this.fire(i.type, i))
        }
    },
    zoomScrollbar: function() {
        var i, r, t, n;
        i = this.chart;
        t = i.chartData;
        n = this.categoryAxis;
        n.parseDates && !n.equalSpacing ? (t = n.stepWidth, n = i.firstTime, i = t * (this.startTime - n), r = t * (this.endTime - n)) : (i = t[this.start].x[n.id], r = t[this.end].x[n.id], t = n.stepWidth, n.startOnAxis || (n = t / 2, i -= n, r += n));
        this.stepWidth = t;
        this.updateScrollbarSize(i, r)
    },
    maskGraphs: function(n, t, i, r) {
        var u = this.selectedGraph;
        u && u.set.clipRect(n, t, i, r)
    },
    handleDragStart: function() {
        AmCharts.ChartScrollbar.base.handleDragStart.call(this);
        this.difference = this.end - this.start;
        this.timeDifference = this.endTime - this.startTime;
        0 > this.timeDifference && (this.timeDifference = 0)
    },
    handleBackgroundClick: function() {
        AmCharts.ChartScrollbar.base.handleBackgroundClick.call(this);
        this.dragging || (this.difference = this.end - this.start, this.timeDifference = this.endTime - this.startTime, 0 > this.timeDifference && (this.timeDifference = 0))
    }
});
AmCharts.circle = function(n, t, i, r, u, f, e, o) {
    return (void 0 == u || 0 === u) && (u = 1), void 0 === f && (f = "#000000"), void 0 === e && (e = 0), r = {
        fill: i,
        stroke: f,
        "fill-opacity": r,
        "stroke-width": u,
        "stroke-opacity": e
    }, n = n.circle(0, 0, t).attr(r), o && n.gradient("radialGradient", [i, AmCharts.adjustLuminosity(i, -.6)]), n
};
AmCharts.text = function(n, t, i, r, u, f, e, o) {
    return f || (f = "middle"), "right" == f && (f = "end"), AmCharts.isIE && 9 > AmCharts.IEversion && (t = t.replace("&amp;", "&"), t = t.replace("&", "&amp;")), i = {
        fill: i,
        "font-family": r,
        "font-size": u,
        opacity: o
    }, !0 === e && (i["font-weight"] = "bold"), i["text-anchor"] = f, n.text(t, i)
};
AmCharts.polygon = function(n, t, i, r, u, f, e, o, s) {
    var l, h, c;
    for (isNaN(f) && (f = 0), isNaN(o) && (o = u), h = r, l = !1, "object" == typeof h && 1 < h.length && (l = !0, h = h[0]), void 0 === e && (e = h), u = {
            fill: h,
            stroke: e,
            "fill-opacity": u,
            "stroke-width": f,
            "stroke-opacity": o
        }, f = AmCharts.dx, e = AmCharts.dy, o = Math.round, h = "M" + (o(t[0]) + f) + "," + (o(i[0]) + e), c = 1; c < t.length; c++) h += " L" + (o(t[c]) + f) + "," + (o(i[c]) + e);
    return n = n.path(h + " Z").attr(u), l && n.gradient("linearGradient", r, s), n
};
AmCharts.rect = function(n, t, i, r, u, f, e, o, s, h) {
    var c, v, l, a;
    return isNaN(f) && (f = 0), void 0 === s && (s = 0), void 0 === h && (h = 270), isNaN(u) && (u = 0), c = r, v = !1, "object" == typeof c && (c = c[0], v = !0), void 0 === e && (e = c), void 0 === o && (o = u), t = Math.round(t), i = Math.round(i), l = 0, a = 0, 0 > t && (t = Math.abs(t), l = -t), 0 > i && (i = Math.abs(i), a = -i), l += AmCharts.dx, a += AmCharts.dy, u = {
        fill: c,
        stroke: e,
        "fill-opacity": u,
        "stroke-opacity": o
    }, n = n.rect(l, a, t, i, s, f).attr(u), v && n.gradient("linearGradient", r, h), n
};
AmCharts.triangle = function(n, t, i, r, u, f, e, o) {
    (void 0 === f || 0 === f) && (f = 1);
    void 0 === e && (e = "#000");
    void 0 === o && (o = 0);
    r = {
        fill: r,
        stroke: e,
        "fill-opacity": u,
        "stroke-width": f,
        "stroke-opacity": o
    };
    t /= 2;
    var s;
    return 0 === i && (s = " M" + -t + "," + t + " L0," + -t + " L" + t + "," + t + " Z"), 180 == i && (s = " M" + -t + "," + -t + " L0," + t + " L" + t + "," + -t + " Z"), 90 == i && (s = " M" + -t + "," + -t + " L" + t + ",0 L" + -t + "," + t + " Z"), 270 == i && (s = " M" + -t + ",0 L" + t + "," + t + " L" + t + "," + -t + " Z"), n.path(s).attr(r)
};
AmCharts.line = function(n, t, i, r, u, f, e, o, s, h) {
    for (f = {
            fill: "none",
            "stroke-width": f
        }, void 0 !== e && 0 < e && (f["stroke-dasharray"] = e), isNaN(u) || (f["stroke-opacity"] = u), r && (f.stroke = r), r = Math.round, h && (r = AmCharts.doNothing), h = AmCharts.dx, u = AmCharts.dy, e = "M" + (r(t[0]) + h) + "," + (r(i[0]) + u), o = 1; o < t.length; o++) e += " L" + (r(t[o]) + h) + "," + (r(i[o]) + u);
    return AmCharts.VML ? n.path(e, void 0, !0).attr(f) : (s && (e += " M0,0 L0,0"), n.path(e).attr(f))
};
AmCharts.doNothing = function(n) {
    return n
};
AmCharts.wedge = function(n, t, i, r, u, f, e, o, s, h, c) {
    var l = Math.round,
        tt, rt;
    f = l(f);
    e = l(e);
    o = l(o);
    var g = l(e / f * o),
        it = AmCharts.VML,
        v = -359.5 - f / 100; - 359.94 > v && (v = -359.94);
    u <= v && (u = v);
    var a = 1 / 180 * Math.PI,
        v = t + Math.cos(r * a) * o,
        y = i + Math.sin(-r * a) * g,
        p = t + Math.cos(r * a) * f,
        w = i + Math.sin(-r * a) * e,
        b = t + Math.cos((r + u) * a) * f,
        k = i + Math.sin((-r - u) * a) * e,
        d = t + Math.cos((r + u) * a) * o,
        a = i + Math.sin((-r - u) * a) * g,
        ut = {
            fill: AmCharts.adjustLuminosity(h.fill, -.2),
            "stroke-opacity": 0
        },
        nt = 0;
    if (180 < Math.abs(u) && (nt = 1), r = n.set(), it && (v = l(10 * v), p = l(10 * p), b = l(10 * b), d = l(10 * d), y = l(10 * y), w = l(10 * w), k = l(10 * k), a = l(10 * a), t = l(10 * t), s = l(10 * s), i = l(10 * i), f *= 10, e *= 10, o *= 10, g *= 10, 1 > Math.abs(u) && 1 >= Math.abs(b - p) && 1 >= Math.abs(k - w) && (tt = !0)), u = "", 0 < s && (it ? (path = " M" + v + "," + (y + s) + " L" + p + "," + (w + s), tt || (path += " A" + (t - f) + "," + (s + i - e) + "," + (t + f) + "," + (s + i + e) + "," + p + "," + (w + s) + "," + b + "," + (k + s)), path += " L" + d + "," + (a + s), 0 < o && (tt || (path += " B" + (t - o) + "," + (s + i - g) + "," + (t + o) + "," + (s + i + g) + "," + d + "," + (s + a) + "," + v + "," + (s + y)))) : (path = " M" + v + "," + (y + s) + " L" + p + "," + (w + s), path += " A" + f + "," + e + ",0," + nt + ",1," + b + "," + (k + s) + " L" + d + "," + (a + s), 0 < o && (path += " A" + o + "," + g + ",0," + nt + ",0," + v + "," + (y + s))), path += " Z", rt = n.path(path, void 0, void 0, "1000,1000").attr(ut), r.push(rt), rt = n.path(" M" + v + "," + y + " L" + v + "," + (y + s) + " L" + p + "," + (w + s) + " L" + p + "," + w + " L" + v + "," + y + " Z", void 0, void 0, "1000,1000").attr(ut), s = n.path(" M" + b + "," + k + " L" + b + "," + (k + s) + " L" + d + "," + (a + s) + " L" + d + "," + a + " L" + b + "," + k + " Z", void 0, void 0, "1000,1000").attr(ut), r.push(rt), r.push(s)), it ? (tt || (u = " A" + l(t - f) + "," + l(i - e) + "," + l(t + f) + "," + l(i + e) + "," + l(p) + "," + l(w) + "," + l(b) + "," + l(k)), f = " M" + l(v) + "," + l(y) + " L" + l(p) + "," + l(w) + u + " L" + l(d) + "," + l(a)) : f = " M" + v + "," + y + " L" + p + "," + w + (" A" + f + "," + e + ",0," + nt + ",1," + b + "," + k) + " L" + d + "," + a, 0 < o && (it ? tt || (f += " B" + (t - o) + "," + (i - g) + "," + (t + o) + "," + (i + g) + "," + d + "," + a + "," + v + "," + y) : f += " A" + o + "," + g + ",0," + nt + ",0," + v + "," + y), n = n.path(f + " Z", void 0, void 0, "1000,1000").attr(h), c) {
        for (t = [], i = 0; i < c.length; i++) t.push(AmCharts.adjustLuminosity(h.fill, c[i]));
        0 < t.length && n.gradient("linearGradient", t)
    }
    return r.push(n), r
};
AmCharts.adjustLuminosity = function(n, t) {
    n = String(n).replace(/[^0-9a-f]/gi, "");
    6 > n.length && (n = String(n[0]) + String(n[0]) + String(n[1]) + String(n[1]) + String(n[2]) + String(n[2]));
    t = t || 0;
    for (var u = "#", i, r = 0; 3 > r; r++) i = parseInt(n.substr(2 * r, 2), 16), i = Math.round(Math.min(Math.max(0, i + i * t), 255)).toString(16), u += ("00" + i).substr(i.length);
    return u
};
AmCharts.AmPieChart = AmCharts.Class({
    inherits: AmCharts.AmChart,
    construct: function() {
        this.createEvents("rollOverSlice", "rollOutSlice", "clickSlice", "pullOutSlice", "pullInSlice", "rightClickSlice");
        AmCharts.AmPieChart.base.construct.call(this);
        this.colors = "#FF0F00 #FF6600 #FF9E01 #FCD202 #F8FF01 #B0DE09 #04D215 #0D8ECF #0D52D1 #2A0CD0 #8A0CCF #CD0D74 #754DEB #DDDDDD #999999 #333333 #000000 #57032A #CA9726 #990000 #4B0C25".split(" ");
        this.pieAlpha = 1;
        this.pieBrightnessStep = 30;
        this.groupPercent = 0;
        this.groupedTitle = "Other";
        this.groupedPulled = !1;
        this.groupedAlpha = 1;
        this.marginLeft = 0;
        this.marginBottom = this.marginTop = 10;
        this.marginRight = 0;
        this.minRadius = 10;
        this.hoverAlpha = 1;
        this.depth3D = 0;
        this.startAngle = 90;
        this.angle = this.innerRadius = 0;
        this.outlineColor = "#FFFFFF";
        this.outlineAlpha = 0;
        this.outlineThickness = 1;
        this.startRadius = "500%";
        this.startDuration = this.startAlpha = 1;
        this.startEffect = "bounce";
        this.sequencedAnimation = !1;
        this.pullOutRadius = "20%";
        this.pullOutDuration = 1;
        this.pullOutEffect = "bounce";
        this.pullOnHover = this.pullOutOnlyOne = !1;
        this.labelsEnabled = !0;
        this.labelRadius = 30;
        this.labelTickColor = "#000000";
        this.labelTickAlpha = .2;
        this.labelText = "[[title]]: [[percents]]%";
        this.hideLabelsPercent = 0;
        this.balloonText = "[[title]]: [[percents]]% ([[value]])\n[[description]]";
        this.urlTarget = "_self";
        this.previousScale = 1;
        this.autoMarginOffset = 10;
        this.gradientRatio = []
    },
    initChart: function() {
        AmCharts.AmPieChart.base.initChart.call(this);
        this.dataChanged && (this.parseData(), this.dispatchDataUpdated = !0, this.dataChanged = !1, this.legend && this.legend.setData(this.chartData));
        this.drawChart()
    },
    handleLegendEvent: function(n) {
        var i = n.type,
            t;
        if (n = n.dataItem) {
            t = n.hidden;
            switch (i) {
                case "clickMarker":
                    t || this.clickSlice(n);
                    break;
                case "clickLabel":
                    t || this.clickSlice(n);
                    break;
                case "rollOverItem":
                    t || this.rollOverSlice(n, !1);
                    break;
                case "rollOutItem":
                    t || this.rollOutSlice(n);
                    break;
                case "hideItem":
                    this.hideSlice(n);
                    break;
                case "showItem":
                    this.showSlice(n)
            }
        }
    },
    invalidateVisibility: function() {
        this.recalculatePercents();
        this.initChart();
        var n = this.legend;
        n && n.invalidateSize()
    },
    drawChart: function() {
        var n = this,
            v, r, b, k, i, a, c, s, w, u, g;
        if (AmCharts.AmPieChart.base.drawChart.call(n), v = n.chartData, AmCharts.ifArray(v)) {
            if (0 < n.realWidth && 0 < n.realHeight) {
                AmCharts.VML && (n.startAlpha = 1);
                var l = n.startDuration,
                    nt = n.container,
                    t = n.updateWidth();
                n.realWidth = t;
                r = n.updateHeight();
                n.realHeight = r;
                var f = AmCharts.toCoordinate,
                    e = f(n.marginLeft, t),
                    o = f(n.marginRight, t),
                    y = f(n.marginTop, r) + n.getTitleHeight(),
                    h = f(n.marginBottom, r);
                for (n.chartDataLabels = [], n.ticks = [], a = AmCharts.toNumber(n.labelRadius), c = n.measureMaxLabel(), n.labelText && n.labelsEnabled || (a = c = 0), b = void 0 === n.pieX ? (t - e - o) / 2 + e : f(n.pieX, n.realWidth), k = void 0 === n.pieY ? (r - y - h) / 2 + y : f(n.pieY, r), i = f(n.radius, t, r), n.pullOutRadiusReal = AmCharts.toCoordinate(n.pullOutRadius, i), i || (t = 0 <= a ? t - e - o - 2 * c : t - e - o, r = r - y - h, i = Math.min(t, r), r < t && (i /= 1 - n.angle / 90, i > t && (i = t)), n.pullOutRadiusReal = AmCharts.toCoordinate(n.pullOutRadius, i), i = 0 <= a ? i - 1.8 * (a + n.pullOutRadiusReal) : i - 1.8 * n.pullOutRadiusReal, i /= 2), i < n.minRadius && (i = n.minRadius), n.pullOutRadiusReal = f(n.pullOutRadius, i), f = f(n.innerRadius, i), f >= i && (f = i - 1), r = AmCharts.fitToBounds(n.startAngle, 0, 360), 0 < n.depth3D && (r = 270 <= r ? 270 : 90), y = i - i * n.angle / 90, h = 0; h < v.length; h++)
                    if (t = v[h], !0 !== t.hidden && 0 < t.percents) {
                        var o = 360 * -t.percents / 100,
                            c = Math.cos((r + o / 2) / 180 * Math.PI),
                            d = Math.sin((-r - o / 2) / 180 * Math.PI) * (y / i),
                            e = {
                                fill: t.color,
                                stroke: n.outlineColor,
                                "stroke-width": n.outlineThickness,
                                "stroke-opacity": n.outlineAlpha
                            };
                        if (t.url && (e.cursor = "pointer"), e = AmCharts.wedge(nt, b, k, r, o, i, y, f, n.depth3D, e, n.gradientRatio), n.addEventListeners(e, t), t.startAngle = r, v[h].wedge = e, 0 < l && (s = n.startAlpha, n.chartCreated && (s = t.alpha), e.setAttr("opacity", s)), t.ix = c, t.iy = d, t.wedge = e, t.index = h, n.labelsEnabled && n.labelText && t.percents >= n.hideLabelsPercent) {
                            u = r + o / 2;
                            0 >= u && (u += 360);
                            o = a;
                            isNaN(t.labelRadius) || (o = t.labelRadius);
                            var c = b + c * (i + o),
                                d = k + d * (i + o),
                                p, s = 0;
                            0 <= o ? (90 >= u && 0 <= u ? (w = 0, p = "start", s = 8) : 360 >= u && 270 < u ? (w = 1, p = "start", s = 8) : 270 >= u && 180 < u ? (w = 2, p = "end", s = -8) : 180 >= u && 90 < u && (w = 3, p = "end", s = -8), t.labelQuarter = w) : p = "middle";
                            u = n.formatString(n.labelText, t);
                            g = t.labelColor;
                            void 0 === g && (g = n.color);
                            u = AmCharts.text(nt, u, g, n.fontFamily, n.fontSize, p);
                            u.translate(c + 1.5 * s, d);
                            t.tx = c + 1.5 * s;
                            t.ty = d;
                            0 <= o ? e.push(u) : n.freeLabelsSet.push(u);
                            t.label = u;
                            n.chartDataLabels[h] = u;
                            t.tx = c;
                            t.tx2 = c + s
                        }
                        n.graphsSet.push(e);
                        (0 === t.alpha || 0 < l && !n.chartCreated) && e.hide();
                        r -= 360 * t.percents / 100;
                        0 >= r && (r += 360)
                    }
                v = setTimeout(function() {
                    n.showLabels.call(n)
                }, 1e3 * l);
                n.timeOuts.push(v);
                0 < a && !n.labelRadiusField && n.arrangeLabels();
                n.pieXReal = b;
                n.pieYReal = k;
                n.radiusReal = i;
                n.innerRadiusReal = f;
                0 < a && n.drawTicks();
                n.chartCreated ? n.pullSlices(!0) : (l = setTimeout(function() {
                    n.pullSlices.call(n)
                }, 1200 * l), n.timeOuts.push(l));
                n.chartCreated || n.startSlices();
                n.setDepths()
            }(l = n.legend) && l.invalidateSize()
        } else n.cleanChart();
        n.dispDUpd();
        n.chartCreated = !0
    },
    setDepths: function() {
        for (var i = this.chartData, t = 0; t < i.length; t++) {
            var n = i[t],
                r = n.wedge,
                n = n.startAngle;
            90 >= n && 0 <= n || 360 >= n && 270 < n ? r.toFront() : (270 >= n && 180 < n || 180 >= n && 90 < n) && r.toBack()
        }
    },
    addEventListeners: function(n, t) {
        var i = this;
        n.mouseover(function() {
            i.rollOverSlice(t, !0)
        }).mouseout(function() {
            i.rollOutSlice(t)
        }).click(function() {
            i.clickSlice(t)
        }).contextmenu(function() {
            i.handleRightClick(t)
        })
    },
    formatString: function(n, t) {
        return n = AmCharts.formatValue(n, t, ["value"], this.numberFormatter, "", this.usePrefixes, this.prefixesOfSmallNumbers, this.prefixesOfBigNumbers), n = AmCharts.formatValue(n, t, ["percents"], this.percentFormatter), n = AmCharts.massReplace(n, {
            "[[title]]": t.title,
            "[[description]]": t.description,
            "<br>": "\n"
        }), -1 != n.indexOf("[[") && (n = AmCharts.formatDataContextValue(n, t.dataContext)), n = AmCharts.fixNewLines(n), AmCharts.cleanFromEmpty(n)
    },
    drawTicks: function() {
        for (var r = this.chartData, n = 0; n < r.length; n++)
            if (this.chartDataLabels[n]) {
                var t = r[n],
                    i = t.ty,
                    u = this.radiusReal,
                    i = AmCharts.line(this.container, [this.pieXReal + t.ix * u, t.tx, t.tx2], [this.pieYReal + t.iy * u, i, i], this.labelTickColor, this.labelTickAlpha);
                t.wedge.push(i);
                this.ticks[n] = i
            }
    },
    arrangeLabels: function() {
        for (var i = this.chartData, r = i.length, t, n = r - 1; 0 <= n; n--) t = i[n], 0 !== t.labelQuarter || t.hidden || this.checkOverlapping(n, t, 0, !0, 0);
        for (n = 0; n < r; n++) t = i[n], 1 != t.labelQuarter || t.hidden || this.checkOverlapping(n, t, 1, !1, 0);
        for (n = r - 1; 0 <= n; n--) t = i[n], 2 != t.labelQuarter || t.hidden || this.checkOverlapping(n, t, 2, !0, 0);
        for (n = 0; n < r; n++) t = i[n], 3 != t.labelQuarter || t.hidden || this.checkOverlapping(n, t, 3, !1, 0)
    },
    checkOverlapping: function(n, t, i, r, u) {
        var e, f, o = this.chartData,
            s = o.length,
            h = t.label;
        if (h) {
            if (!0 === r)
                for (f = n + 1; f < s; f++)(e = this.checkOverlappingReal(t, o[f], i)) && (f = s);
            else
                for (f = n - 1; 0 <= f; f--)(e = this.checkOverlappingReal(t, o[f], i)) && (f = 0);
            !0 === e && 100 > u && (e = t.ty + 3 * t.iy, t.ty = e, h.translate(t.tx2, e), this.checkOverlapping(n, t, i, r, u + 1))
        }
    },
    checkOverlappingReal: function(n, t, i) {
        var f = !1,
            u = n.label,
            r = t.label;
        return n.labelQuarter != i || n.hidden || t.hidden || !r || (u = u.getBBox(), i = {}, i.width = u.width, i.height = u.height, i.y = n.ty, i.x = n.tx, n = r.getBBox(), r = {}, r.width = n.width, r.height = n.height, r.y = t.ty, r.x = t.tx, AmCharts.hitTest(i, r) && (f = !0)), f
    },
    startSlices: function() {
        for (var n = 0; n < this.chartData.length; n++) 0 < this.startDuration && this.sequencedAnimation ? this.setStartTO(n) : this.startSlice(this.chartData[n])
    },
    setStartTO: function(n) {
        var t = this;
        n = setTimeout(function() {
            t.startSequenced.call(t)
        }, 500 * (t.startDuration / t.chartData.length) * n);
        t.timeOuts.push(n)
    },
    pullSlices: function(n) {
        for (var r = this.chartData, i, t = 0; t < r.length; t++) i = r[t], i.pulled && this.pullSlice(i, 1, n)
    },
    startSequenced: function() {
        for (var t = this.chartData, n = 0; n < t.length; n++)
            if (!t[n].started) {
                this.startSlice(this.chartData[n]);
                break
            }
    },
    startSlice: function(n) {
        var t, i, r;
        n.started = !0;
        t = n.wedge;
        i = this.startDuration;
        t && 0 < i && (0 < n.alpha && t.show(), r = AmCharts.toCoordinate(this.startRadius, this.radiusReal), t.translate(Math.round(n.ix * r), Math.round(n.iy * r)), t.animate({
            opacity: n.alpha,
            translate: "0,0"
        }, i, this.startEffect))
    },
    showLabels: function() {
        for (var i = this.chartData, t, n = 0; n < i.length; n++) 0 < i[n].alpha && (t = this.chartDataLabels[n], t && t.show(), (t = this.ticks[n]) && t.show())
    },
    showSlice: function(n) {
        isNaN(n) ? n.hidden = !1 : this.chartData[n].hidden = !1;
        this.hideBalloon();
        this.invalidateVisibility()
    },
    hideSlice: function(n) {
        isNaN(n) ? n.hidden = !0 : this.chartData[n].hidden = !0;
        this.hideBalloon();
        this.invalidateVisibility()
    },
    rollOverSlice: function(n, t) {
        var i;
        isNaN(n) || (n = this.chartData[n]);
        clearTimeout(this.hoverInt);
        this.pullOnHover && this.pullSlice(n, 1);
        i = this.innerRadiusReal + (this.radiusReal - this.innerRadiusReal) / 2;
        n.pulled && (i += this.pullOutRadiusReal);
        1 > this.hoverAlpha && n.wedge && n.wedge.attr({
            opacity: this.hoverAlpha
        });
        var r = n.ix * i + this.pieXReal,
            i = n.iy * i + this.pieYReal,
            u = this.formatString(this.balloonText, n),
            f = AmCharts.adjustLuminosity(n.color, -.15);
        this.showBalloon(u, f, t, r, i);
        r = {
            type: "rollOverSlice",
            dataItem: n,
            chart: this
        };
        this.fire(r.type, r)
    },
    rollOutSlice: function(n) {
        isNaN(n) || (n = this.chartData[n]);
        n.wedge && n.wedge.attr({
            opacity: n.alpha
        });
        this.hideBalloon();
        n = {
            type: "rollOutSlice",
            dataItem: n,
            chart: this
        };
        this.fire(n.type, n)
    },
    clickSlice: function(n) {
        isNaN(n) || (n = this.chartData[n]);
        this.hideBalloon();
        n.pulled ? this.pullSlice(n, 0) : this.pullSlice(n, 1);
        AmCharts.getURL(n.url, this.urlTarget);
        n = {
            type: "clickSlice",
            dataItem: n,
            chart: this
        };
        this.fire(n.type, n)
    },
    handleRightClick: function(n) {
        isNaN(n) || (n = this.chartData[n]);
        n = {
            type: "rightClickSlice",
            dataItem: n,
            chart: this
        };
        this.fire(n.type, n)
    },
    pullSlice: function(n, t, i) {
        var f = n.ix,
            e = n.iy,
            u = this.pullOutDuration,
            r;
        !0 === i && (u = 0);
        i = n.wedge;
        r = this.pullOutRadiusReal;
        i && i.animate({
            translate: t * f * r + "," + t * e * r
        }, u, this.pullOutEffect);
        1 == t ? (n.pulled = !0, this.pullOutOnlyOne && this.pullInAll(n.index), n = {
            type: "pullOutSlice",
            dataItem: n,
            chart: this
        }) : (n.pulled = !1, n = {
            type: "pullInSlice",
            dataItem: n,
            chart: this
        });
        this.fire(n.type, n)
    },
    pullInAll: function(n) {
        for (var i = this.chartData, t = 0; t < this.chartData.length; t++) t != n && i[t].pulled && this.pullSlice(i[t], 0)
    },
    pullOutAll: function(n) {
        n = this.chartData;
        for (var t = 0; t < n.length; t++) n[t].pulled || this.pullSlice(n[t], 1)
    },
    parseData: function() {
        var u = [],
            f, o, e, i, n, t, r;
        if (this.chartData = u, f = this.dataProvider, void 0 !== f) {
            for (o = f.length, e = 0, i = 0; i < o; i++) n = {}, r = f[i], n.dataContext = r, n.value = Number(r[this.valueField]), (t = r[this.titleField]) || (t = ""), n.title = t, n.pulled = AmCharts.toBoolean(r[this.pulledField], !1), (t = r[this.descriptionField]) || (t = ""), n.description = t, n.labelRadius = Number(r[this.labelRadiusField]), n.url = r[this.urlField], n.visibleInLegend = AmCharts.toBoolean(r[this.visibleInLegendField], !0), t = r[this.alphaField], n.alpha = void 0 !== t ? Number(t) : this.pieAlpha, t = r[this.colorField], void 0 !== t && (n.color = AmCharts.toColor(t)), n.labelColor = AmCharts.toColor(r[this.labelColorField]), e += n.value, n.hidden = !1, u[i] = n;
            for (i = f = 0; i < o; i++) n = u[i], n.percents = 100 * (n.value / e), n.percents < this.groupPercent && f++;
            for (1 < f && (this.groupValue = 0, this.removeSmallSlices(), u.push({
                    title: this.groupedTitle,
                    value: this.groupValue,
                    percents: 100 * (this.groupValue / e),
                    pulled: this.groupedPulled,
                    color: this.groupedColor,
                    url: this.groupedUrl,
                    description: this.groupedDescription,
                    alpha: this.groupedAlpha
                })), i = 0; i < u.length; i++) this.pieBaseColor ? t = AmCharts.adjustLuminosity(this.pieBaseColor, i * this.pieBrightnessStep / 100) : (t = this.colors[i], void 0 === t && (t = AmCharts.randomColor())), void 0 === u[i].color && (u[i].color = t);
            this.recalculatePercents()
        }
    },
    recalculatePercents: function() {
        for (var i = this.chartData, r = 0, n, t = 0; t < i.length; t++) n = i[t], !n.hidden && 0 < n.value && (r += n.value);
        for (t = 0; t < i.length; t++) n = this.chartData[t], n.percents = !n.hidden && 0 < n.value ? 100 * n.value / r : 0
    },
    removeSmallSlices: function() {
        for (var t = this.chartData, n = t.length - 1; 0 <= n; n--) t[n].percents < this.groupPercent && (this.groupValue += t[n].value, t.splice(n, 1))
    },
    animateAgain: function() {
        var n = this,
            t;
        n.startSlices();
        t = setTimeout(function() {
            n.pullSlices.call(n)
        }, 1200 * n.startDuration);
        n.timeOuts.push(t)
    },
    measureMaxLabel: function() {
        for (var r = this.chartData, t = 0, n = 0; n < r.length; n++) {
            var i = this.formatString(this.labelText, r[n]),
                i = AmCharts.text(this.container, i, this.color, this.fontFamily, this.fontSize),
                u = i.getBBox().width;
            u > t && (t = u);
            i.remove()
        }
        return t
    }
});
AmCharts.AmXYChart = AmCharts.Class({
    inherits: AmCharts.AmRectangularChart,
    construct: function() {
        AmCharts.AmXYChart.base.construct.call(this);
        this.createEvents("zoomed");
        this.maxZoomFactor = 20;
        this.chartType = "xy"
    },
    initChart: function() {
        AmCharts.AmXYChart.base.initChart.call(this);
        this.dataChanged && (this.updateData(), this.dataChanged = !1, this.dispatchDataUpdated = !0);
        this.updateScrollbar = !0;
        this.drawChart();
        this.autoMargins && !this.marginsUpdated && (this.marginsUpdated = !0, this.measureMargins());
        var n = this.marginLeftReal,
            t = this.marginTopReal,
            i = this.plotAreaWidth,
            r = this.plotAreaHeight;
        this.graphsSet.clipRect(n, t, i, r);
        this.bulletSet.clipRect(n, t, i, r);
        this.trendLinesSet.clipRect(n, t, i, r)
    },
    createValueAxes: function() {
        var i = [],
            f = [],
            r, n, t, u;
        for (this.xAxes = i, this.yAxes = f, r = this.valueAxes, t = 0; t < r.length; t++) n = r[t], u = n.position, ("top" == u || "bottom" == u) && (n.rotate = !0), n.setOrientation(n.rotate), u = n.orientation, "V" == u && f.push(n), "H" == u && i.push(n);
        for (0 === f.length && (n = new AmCharts.ValueAxis, n.rotate = !1, n.setOrientation(!1), r.push(n), f.push(n)), 0 === i.length && (n = new AmCharts.ValueAxis, n.rotate = !0, n.setOrientation(!0), r.push(n), i.push(n)), t = 0; t < r.length; t++) this.processValueAxis(r[t], t);
        for (i = this.graphs, t = 0; t < i.length; t++) this.processGraph(i[t], t)
    },
    drawChart: function() {
        if (AmCharts.AmXYChart.base.drawChart.call(this), AmCharts.ifArray(this.chartData) ? (this.chartScrollbar && this.updateScrollbars(), this.zoomChart()) : this.cleanChart(), this.hideXScrollbar) {
            var n = this.scrollbarH;
            n && (this.removeListener(n, "zoomed", this.handleHSBZoom), n.destroy());
            this.scrollbarH = null
        }
        this.hideYScrollbar && ((n = this.scrollbarV) && (this.removeListener(n, "zoomed", this.handleVSBZoom), n.destroy()), this.scrollbarV = null);
        (!this.autoMargins || this.marginsUpdated) && (this.dispDUpd(), this.chartCreated = !0, this.zoomScrollbars())
    },
    cleanChart: function() {
        AmCharts.callMethod("destroy", [this.valueAxes, this.graphs, this.scrollbarV, this.scrollbarH, this.chartCursor])
    },
    zoomChart: function() {
        this.toggleZoomOutButton();
        this.zoomObjects(this.valueAxes);
        this.zoomObjects(this.graphs);
        this.zoomTrendLines();
        this.dispatchAxisZoom()
    },
    toggleZoomOutButton: function() {
        1 == this.heightMultiplier && 1 == this.widthMultiplier ? this.showZB(!1) : this.showZB(!0)
    },
    dispatchAxisZoom: function() {
        for (var u = this.valueAxes, n, t, i, f, r = 0; r < u.length; r++) n = u[r], isNaN(n.min) || isNaN(n.max) || ("V" == n.orientation ? (t = n.coordinateToValue(-this.verticalPosition), i = n.coordinateToValue(-this.verticalPosition + this.plotAreaHeight)) : (t = n.coordinateToValue(-this.horizontalPosition), i = n.coordinateToValue(-this.horizontalPosition + this.plotAreaWidth)), isNaN(t) || isNaN(i) || (t > i && (f = i, i = t, t = f), n.dispatchZoomEvent(t, i)))
    },
    zoomObjects: function(n) {
        for (var r = n.length, i, t = 0; t < r; t++) i = n[t], this.updateObjectSize(i), i.zoom(0, this.chartData.length - 1)
    },
    updateData: function() {
        var u, e;
        this.parseData();
        for (var i = this.chartData, s = i.length - 1, r = this.graphs, o = this.dataProvider, f = 0, t, n = 0; n < r.length; n++)
            if (t = r[n], t.data = i, t.zoom(0, s), t = t.valueField)
                for (u = 0; u < o.length; u++) e = o[u][t], e > f && (f = e);
        for (n = 0; n < r.length; n++) t = r[n], t.maxValue = f;
        (i = this.chartCursor) && (i.updateData(), i.type = "crosshair", i.valueBalloonsEnabled = !1)
    },
    zoomOut: function() {
        this.verticalPosition = this.horizontalPosition = 0;
        this.heightMultiplier = this.widthMultiplier = 1;
        this.zoomChart();
        this.zoomScrollbars()
    },
    processValueAxis: function(n) {
        n.chart = this;
        n.minMaxField = "H" == n.orientation ? "x" : "y";
        n.minTemp = NaN;
        n.maxTemp = NaN;
        this.listenTo(n, "axisSelfZoomed", this.handleAxisSelfZoom)
    },
    processGraph: function(n) {
        n.xAxis || (n.xAxis = this.xAxes[0]);
        n.yAxis || (n.yAxis = this.yAxes[0])
    },
    parseData: function() {
        var r, e, s, f, h, n, v, i, o, t;
        AmCharts.AmXYChart.base.parseData.call(this);
        this.chartData = [];
        for (var c = this.dataProvider, l = this.valueAxes, a = this.graphs, u = 0; u < c.length; u++) {
            for (r = {
                    axes: {},
                    x: {},
                    y: {}
                }, e = c[u], s = 0; s < l.length; s++)
                for (f = l[s].id, r.axes[f] = {}, r.axes[f].graphs = {}, h = 0; h < a.length; h++) n = a[h], v = n.id, (n.xAxis.id == f || n.yAxis.id == f) && (i = {}, i.serialDataItem = r, i.index = u, o = {}, t = Number(e[n.valueField]), isNaN(t) || (o.value = t), t = Number(e[n.xField]), isNaN(t) || (o.x = t), t = Number(e[n.yField]), isNaN(t) || (o.y = t), i.values = o, this.processFields(n, i, e), i.serialDataItem = r, i.graph = n, r.axes[f].graphs[v] = i);
            this.chartData[u] = r
        }
    },
    formatString: function(n, t) {
        var i = t.graph.numberFormatter;
        return i || (i = this.numberFormatter), n = AmCharts.formatValue(n, t.values, ["value", "x", "y"], i), -1 != n.indexOf("[[") && (n = AmCharts.formatDataContextValue(n, t.dataContext)), AmCharts.AmSerialChart.base.formatString.call(this, n, t)
    },
    addChartScrollbar: function(n) {
        var i, t;
        AmCharts.callMethod("destroy", [this.chartScrollbar, this.scrollbarH, this.scrollbarV]);
        n && (this.chartScrollbar = n, this.scrollbarHeight = n.scrollbarHeight, i = "backgroundColor backgroundAlpha selectedBackgroundColor selectedBackgroundAlpha scrollDuration resizeEnabled hideResizeGrips scrollbarHeight updateOnReleaseOnly".split(" "), this.hideYScrollbar || (t = new AmCharts.SimpleChartScrollbar, t.skipEvent = !0, t.chart = this, this.listenTo(t, "zoomed", this.handleVSBZoom), AmCharts.copyProperties(n, t, i), t.rotate = !0, this.scrollbarV = t), this.hideXScrollbar || (t = new AmCharts.SimpleChartScrollbar, t.skipEvent = !0, t.chart = this, this.listenTo(t, "zoomed", this.handleHSBZoom), AmCharts.copyProperties(n, t, i), t.rotate = !1, this.scrollbarH = t))
    },
    updateTrendLines: function() {
        for (var i = this.trendLines, n, t = 0; t < i.length; t++) n = i[t], n.chart = this, n.valueAxis || (n.valueAxis = this.yAxes[0]), n.valueAxisX || (n.valueAxisX = this.xAxes[0])
    },
    updateMargins: function() {
        AmCharts.AmXYChart.base.updateMargins.call(this);
        var n = this.scrollbarV;
        n && (this.getScrollbarPosition(n, !0, this.yAxes[0].position), this.adjustMargins(n, !0));
        (n = this.scrollbarH) && (this.getScrollbarPosition(n, !1, this.xAxes[0].position), this.adjustMargins(n, !1))
    },
    updateScrollbars: function() {
        var n = this.scrollbarV;
        n && (this.updateChartScrollbar(n, !0), n.draw());
        (n = this.scrollbarH) && (this.updateChartScrollbar(n, !1), n.draw())
    },
    zoomScrollbars: function() {
        var n = this.scrollbarH;
        n && n.relativeZoom(this.widthMultiplier, -this.horizontalPosition / this.widthMultiplier);
        (n = this.scrollbarV) && n.relativeZoom(this.heightMultiplier, -this.verticalPosition / this.heightMultiplier)
    },
    fitMultiplier: function(n) {
        return n > this.maxZoomFactor && (n = this.maxZoomFactor), n
    },
    handleHSBZoom: function(n) {
        var t = this.fitMultiplier(n.multiplier),
            i;
        n = -n.position * t;
        i = -(this.plotAreaWidth * t - this.plotAreaWidth);
        n < i && (n = i);
        this.widthMultiplier = t;
        this.horizontalPosition = n;
        this.zoomChart()
    },
    handleVSBZoom: function(n) {
        var t = this.fitMultiplier(n.multiplier),
            i;
        n = -n.position * t;
        i = -(this.plotAreaHeight * t - this.plotAreaHeight);
        n < i && (n = i);
        this.heightMultiplier = t;
        this.verticalPosition = n;
        this.zoomChart()
    },
    handleAxisSelfZoom: function(n) {
        var t, i;
        "H" == n.valueAxis.orientation ? (t = this.fitMultiplier(n.multiplier), n = -n.position * t, i = -(this.plotAreaWidth * t - this.plotAreaWidth), n < i && (n = i), this.horizontalPosition = n, this.widthMultiplier = t) : (t = this.fitMultiplier(n.multiplier), n = -n.position * t, i = -(this.plotAreaHeight * t - this.plotAreaHeight), n < i && (n = i), this.verticalPosition = n, this.heightMultiplier = t);
        this.zoomChart();
        this.zoomScrollbars()
    },
    handleCursorZoom: function(n) {
        var t = this.widthMultiplier * this.plotAreaWidth / n.selectionWidth,
            i = this.heightMultiplier * this.plotAreaHeight / n.selectionHeight,
            t = this.fitMultiplier(t),
            i = this.fitMultiplier(i);
        this.horizontalPosition = (this.horizontalPosition - n.selectionX) * t / this.widthMultiplier;
        this.verticalPosition = (this.verticalPosition - n.selectionY) * i / this.heightMultiplier;
        this.widthMultiplier = t;
        this.heightMultiplier = i;
        this.zoomChart();
        this.zoomScrollbars()
    },
    removeChartScrollbar: function() {
        AmCharts.callMethod("destroy", [this.scrollbarH, this.scrollbarV]);
        this.scrollbarV = this.scrollbarH = null
    },
    handleReleaseOutside: function(n) {
        AmCharts.AmXYChart.base.handleReleaseOutside.call(this, n);
        AmCharts.callMethod("handleReleaseOutside", [this.scrollbarH, this.scrollbarV])
    }
});
AmCharts.AmDraw = AmCharts.Class({
    construct: function(n, t, i) {
        if (AmCharts.SVG_NS = "http://www.w3.org/2000/svg", AmCharts.SVG_XLINK = "http://www.w3.org/1999/xlink", AmCharts.hasSVG = !!document.createElementNS && !!document.createElementNS(AmCharts.SVG_NS, "svg").createSVGRect, 1 > t && (t = 10), 1 > i && (i = 10), this.div = n, this.width = t, this.height = i, this.rBin = document.createElement("div"), AmCharts.hasSVG) {
            AmCharts.SVG = !0;
            var r = this.createSvgElement("svg");
            r.style.position = "absolute";
            r.style.width = t + "px";
            r.style.height = i + "px";
            AmCharts.rtl && (r.setAttribute("direction", "rtl"), r.style.left = "auto", r.style.right = "0px");
            r.setAttribute("version", "1.1");
            n.appendChild(r);
            this.container = r;
            this.R = new AmCharts.SVGRenderer(this)
        } else AmCharts.isIE && AmCharts.VMLRenderer && (AmCharts.VML = !0, AmCharts.vmlStyleSheet || (document.namespaces.add("amvml", "urn:schemas-microsoft-com:vml"), t = document.createStyleSheet(), t.addRule(".amvml", "behavior:url(#default#VML); display:inline-block; antialias:true"), AmCharts.vmlStyleSheet = t), this.container = n, this.R = new AmCharts.VMLRenderer(this), this.R.disableSelection(n))
    },
    createSvgElement: function(n) {
        return document.createElementNS(AmCharts.SVG_NS, n)
    },
    circle: function(n, t, i, r) {
        var u = new AmCharts.AmDObject("circle", this);
        return u.attr({
            r: i,
            cx: n,
            cy: t
        }), this.addToContainer(u.node, r), u
    },
    setSize: function(n, t) {
        0 < n && 0 < t && (this.container.style.width = n + "px", this.container.style.height = t + "px")
    },
    rect: function(n, t, i, r, u, f, e) {
        var o = new AmCharts.AmDObject("rect", this);
        return AmCharts.VML && (u = 100 * u / Math.min(i, r), i += 2 * f, r += 2 * f, o.bw = f, o.node.style.marginLeft = -f, o.node.style.marginTop = -f), 1 > i && (i = 1), 1 > r && (r = 1), o.attr({
            x: n,
            y: t,
            width: i,
            height: r,
            rx: u,
            ry: u,
            "stroke-width": f
        }), this.addToContainer(o.node, e), o
    },
    image: function(n, t, i, r, u, f) {
        var e = new AmCharts.AmDObject("image", this);
        return e.attr({
            x: t,
            y: i,
            width: r,
            height: u
        }), this.R.path(e, n), this.addToContainer(e.node, f), e
    },
    addToContainer: function(n, t) {
        t || (t = this.container);
        t.appendChild(n)
    },
    text: function(n, t, i) {
        return this.R.text(n, t, i)
    },
    path: function(n, t, i, r) {
        var u = new AmCharts.AmDObject("path", this);
        return r || (r = "100,100"), u.attr({
            cs: r
        }), i ? u.attr({
            dd: n
        }) : u.attr({
            d: n
        }), this.addToContainer(u.node, t), u
    },
    set: function(n) {
        return this.R.set(n)
    },
    remove: function(n) {
        if (n) {
            var t = this.rBin;
            t.appendChild(n);
            t.innerHTML = ""
        }
    },
    bounce: function(n, t, i, r, u) {
        return (t /= u) < 1 / 2.75 ? 7.5625 * r * t * t + i : t < 2 / 2.75 ? r * (7.5625 * (t -= 1.5 / 2.75) * t + .75) + i : t < 2.5 / 2.75 ? r * (7.5625 * (t -= 2.25 / 2.75) * t + .9375) + i : r * (7.5625 * (t -= 2.625 / 2.75) * t + .984375) + i
    },
    easeInSine: function(n, t, i, r, u) {
        return -r * Math.cos(t / u * (Math.PI / 2)) + r + i
    },
    easeOutSine: function(n, t, i, r, u) {
        return r * Math.sin(t / u * (Math.PI / 2)) + i
    },
    easeOutElastic: function(n, t, i, r, u) {
        n = 1.70158;
        var f = 0,
            e = r;
        return 0 === t ? i : 1 == (t /= u) ? i + r : (f || (f = .3 * u), e < Math.abs(r) ? (e = r, n = f / 4) : n = f / (2 * Math.PI) * Math.asin(r / e), e * Math.pow(2, -10 * t) * Math.sin(2 * (t * u - n) * Math.PI / f) + r + i)
    },
    renderFix: function() {
        var n = this.container,
            i = n.style,
            t;
        try {
            t = n.getScreenCTM() || n.createSVGMatrix()
        } catch (r) {
            t = n.createSVGMatrix()
        }
        n = 1 - t.e % 1;
        t = 1 - t.f % 1;.5 < n && (n -= 1);.5 < t && (t -= 1);
        n && (i.left = n + "px");
        t && (i.top = t + "px")
    }
});
AmCharts.AmDObject = AmCharts.Class({
    construct: function(n, t) {
        this.D = t;
        this.R = t.R;
        this.node = this.R.create(this, n);
        this.y = this.x = 0;
        this.scale = 1
    },
    attr: function(n) {
        return this.R.attr(this, n), this
    },
    getAttr: function(n) {
        return this.node.getAttribute(n)
    },
    setAttr: function(n, t) {
        return this.R.setAttr(this, n, t), this
    },
    clipRect: function(n, t, i, r) {
        this.R.clipRect(this, n, t, i, r)
    },
    translate: function(n, t, i, r) {
        r || (n = Math.round(n), t = Math.round(t));
        this.R.move(this, n, t, i);
        this.x = n;
        this.y = t;
        this.scale = i;
        this.angle && this.rotate(this.angle)
    },
    rotate: function(n) {
        this.R.rotate(this, n);
        this.angle = n
    },
    animate: function(n, t, i) {
        var r, u, f;
        for (r in n) n.hasOwnProperty(r) && (u = r, f = n[r], i = AmCharts.getEffect(i), this.R.animate(this, u, f, t, i))
    },
    push: function(n) {
        var t, i;
        n && (t = this.node, t.appendChild(n.node), i = n.clipPath, i && t.appendChild(i), (n = n.grad) && t.appendChild(n))
    },
    text: function(n) {
        this.R.setText(this, n)
    },
    remove: function() {
        this.R.remove(this)
    },
    clear: function() {
        var n = this.node;
        if (n.hasChildNodes())
            for (; 1 <= n.childNodes.length;) n.removeChild(n.firstChild)
    },
    hide: function() {
        this.setAttr("visibility", "hidden")
    },
    show: function() {
        this.setAttr("visibility", "visible")
    },
    getBBox: function() {
        return this.R.getBBox(this)
    },
    toFront: function() {
        var n = this.node,
            t;
        n && (this.prevNextNode = n.nextSibling, t = n.parentNode, t && t.appendChild(n))
    },
    toPrevious: function() {
        var n = this.node;
        n && this.prevNextNode && (n = n.parentNode) && n.insertBefore(this.prevNextNode, null)
    },
    toBack: function() {
        var n = this.node,
            t, i;
        n && (this.prevNextNode = n.nextSibling, t = n.parentNode, t && (i = t.firstChild, i && t.insertBefore(n, i)))
    },
    mouseover: function(n) {
        return this.R.addListener(this, "mouseover", n), this
    },
    mouseout: function(n) {
        return this.R.addListener(this, "mouseout", n), this
    },
    click: function(n) {
        return this.R.addListener(this, "click", n), this
    },
    dblclick: function(n) {
        return this.R.addListener(this, "dblclick", n), this
    },
    mousedown: function(n) {
        return this.R.addListener(this, "mousedown", n), this
    },
    mouseup: function(n) {
        return this.R.addListener(this, "mouseup", n), this
    },
    touchstart: function(n) {
        return this.R.addListener(this, "touchstart", n), this
    },
    touchend: function(n) {
        return this.R.addListener(this, "touchend", n), this
    },
    contextmenu: function(n) {
        return this.node.addEventListener ? this.node.addEventListener("contextmenu", n, !0) : this.R.addListener(this, "contextmenu", n), this
    },
    stop: function(n) {
        (n = this.animationX) && AmCharts.removeFromArray(this.R.animations, n);
        (n = this.animationY) && AmCharts.removeFromArray(this.R.animations, n)
    },
    length: function() {
        return this.node.childNodes.length
    },
    gradient: function(n, t, i) {
        this.R.gradient(this, n, t, i)
    }
});
AmCharts.VMLRenderer = AmCharts.Class({
    construct: function(n) {
        this.D = n;
        this.cNames = {
            circle: "oval",
            rect: "roundrect",
            path: "shape"
        };
        this.styleMap = {
            x: "left",
            y: "top",
            width: "width",
            height: "height",
            "font-family": "fontFamily",
            "font-size": "fontSize",
            visibility: "visibility"
        };
        this.animations = []
    },
    create: function(n, t) {
        var i, r, u;
        return "group" == t ? (i = document.createElement("div"), n.type = "div") : "text" == t ? (i = document.createElement("div"), n.type = "text") : "image" == t ? (i = document.createElement("img"), n.type = "image") : (n.type = "shape", n.shapeType = this.cNames[t], i = document.createElement("amvml:" + this.cNames[t]), r = document.createElement("amvml:stroke"), i.appendChild(r), n.stroke = r, u = document.createElement("amvml:fill"), i.appendChild(u), n.fill = u, u.className = "amvml", r.className = "amvml", i.className = "amvml"), i.style.position = "absolute", i.style.top = 0, i.style.left = 0, i
    },
    path: function(n, t) {
        n.node.setAttribute("src", t)
    },
    setAttr: function(n, t, i) {
        var e, f;
        if (void 0 !== i) {
            8 === document.documentMode && (e = !0);
            var o = n.node,
                u = n.type,
                r = o.style;
            if ("r" == t && (r.width = 2 * i, r.height = 2 * i), "roundrect" != n.shapeType || "width" != t && "height" != t || (i -= 1), "cursor" == t && (r.cursor = i), "cx" == t && (r.left = i - AmCharts.removePx(r.width) / 2), "cy" == t && (r.top = i - AmCharts.removePx(r.height) / 2), f = this.styleMap[t], void 0 !== f && (r[f] = i), "text" == u && ("text-anchor" == t && (n.anchor = i, f = o.clientWidth, "end" == i && (r.marginLeft = -f + "px"), "middle" == i && (r.marginLeft = -(f / 2) + "px", r.textAlign = "center"), "start" == i && (r.marginLeft = "0px")), "fill" == t && (r.color = i), "font-weight" == t && (r.fontWeight = i)), r = n.children)
                for (f = 0; f < r.length; f++) r[f].setAttr(t, i);
            "shape" == u && ("cs" == t && (o.style.width = "100px", o.style.height = "100px", o.setAttribute("coordsize", i)), "d" == t && o.setAttribute("path", this.svgPathToVml(i)), "dd" == t && o.setAttribute("path", i), u = n.stroke, n = n.fill, "stroke" == t && (e ? u.color = i : u.setAttribute("color", i)), "stroke-width" == t && (e ? u.weight = i : u.setAttribute("weight", i)), "stroke-opacity" == t && (e ? u.opacity = i : u.setAttribute("opacity", i)), "stroke-dasharray" == t && (r = "solid", 0 < i && 3 > i && (r = "dot"), 3 <= i && 6 >= i && (r = "dash"), 6 < i && (r = "longdash"), e ? u.dashstyle = r : u.setAttribute("dashstyle", r)), ("fill-opacity" == t || "opacity" == t) && (0 === i ? e ? n.on = !1 : n.setAttribute("on", !1) : e ? n.opacity = i : n.setAttribute("opacity", i)), "fill" == t && (e ? n.color = i : n.setAttribute("color", i)), "rx" == t && (e ? o.arcSize = i + "%" : o.setAttribute("arcsize", i + "%")))
        }
    },
    attr: function(n, t) {
        for (var i in t) t.hasOwnProperty(i) && this.setAttr(n, i, t[i])
    },
    text: function(n, t, i) {
        var r = new AmCharts.AmDObject("text", this.D),
            u = r.node;
        return u.style.whiteSpace = "pre", u.innerHTML = n, this.D.addToContainer(u, i), this.attr(r, t), r
    },
    getBBox: function(n) {
        return this.getBox(n.node)
    },
    getBox: function(n) {
        var h = n.offsetLeft,
            c = n.offsetTop,
            o = n.offsetWidth,
            s = n.offsetHeight,
            i, r, u, e, t, f;
        if (n.hasChildNodes()) {
            for (e = 0; e < n.childNodes.length; e++) i = this.getBox(n.childNodes[e]), t = i.x, isNaN(t) || (isNaN(r) ? r = t : t < r && (r = t)), f = i.y, isNaN(f) || (isNaN(u) ? u = f : f < u && (u = f)), t = i.width + t, isNaN(t) || (o = Math.max(o, t)), i = i.height + f, isNaN(i) || (s = Math.max(s, i));
            0 > r && (h += r);
            0 > u && (c += u)
        }
        return {
            x: h,
            y: c,
            width: o,
            height: s
        }
    },
    setText: function(n, t) {
        var i = n.node;
        i && (i.innerHTML = t);
        this.setAttr(n, "text-anchor", n.anchor)
    },
    addListener: function(n, t, i) {
        n.node["on" + t] = i
    },
    move: function(n, t, i) {
        var r = n.node,
            u = r.style;
        "text" == n.type && (i -= AmCharts.removePx(u.fontSize) / 2 - 1);
        "oval" == n.shapeType && (t -= AmCharts.removePx(u.width) / 2, i -= AmCharts.removePx(u.height) / 2);
        n = n.bw;
        isNaN(n) || (t -= n, i -= n);
        isNaN(t) || isNaN(i) || (r.style.left = t + "px", r.style.top = i + "px")
    },
    svgPathToVml: function(n) {
        var l = n.split(" "),
            r, t, e;
        for (n = "", t = Math.round, e = 0; e < l.length; e++) {
            var f = l[e],
                u = f.substring(0, 1),
                f = f.substring(1),
                i = f.split(","),
                o = t(i[0]) + "," + t(i[1]);
            if ("M" == u && (n += " m " + o), "L" == u && (n += " l " + o), "Z" == u && (n += " x e"), "Q" == u) {
                var a = r.length,
                    c = r[a - 1],
                    s = i[0],
                    h = i[1],
                    o = i[2],
                    v = i[3];
                r = t(r[a - 2] / 3 + 2 / 3 * s);
                c = t(c / 3 + 2 / 3 * h);
                s = t(2 / 3 * s + o / 3);
                h = t(2 / 3 * h + v / 3);
                n += " c " + r + "," + c + "," + s + "," + h + "," + o + "," + v
            }
            "A" == u && (n += " wa " + f);
            "B" == u && (n += " at " + f);
            r = i
        }
        return n
    },
    animate: function(n, t, i, r, u) {
        var f = this,
            e = n.node,
            o;
        "translate" == t && (o = i.split(","), t = o[1], i = e.offsetTop, e = {
            obj: n,
            frame: 0,
            attribute: "left",
            from: e.offsetLeft,
            to: o[0],
            time: r,
            effect: u
        }, f.animations.push(e), r = {
            obj: n,
            frame: 0,
            attribute: "top",
            from: i,
            to: t,
            time: r,
            effect: u
        }, f.animations.push(r), n.animationX = e, n.animationY = r);
        f.interval || (f.interval = setInterval(function() {
            f.updateAnimations.call(f)
        }, AmCharts.updateRate))
    },
    updateAnimations: function() {
        for (var t = this.animations.length - 1; 0 <= t; t--) {
            var n = this.animations[t],
                i = 1e3 * n.time / AmCharts.updateRate,
                r = n.frame + 1,
                u = n.obj,
                f = n.attribute;
            if (r <= i) {
                n.frame++;
                var e = Number(n.from),
                    o = Number(n.to) - e,
                    n = this.D[n.effect](0, r, e, o, i);
                0 === o ? this.animations.splice(t, 1) : u.node.style[f] = n
            } else u.node.style[f] = Number(n.to), this.animations.splice(t, 1)
        }
    },
    clipRect: function(n, t, i, r, u) {
        n = n.node;
        0 === t && 0 === i ? (n.style.width = r + "px", n.style.height = u + "px", n.style.overflow = "hidden") : n.style.clip = "rect(" + i + "px " + (t + r) + "px " + (i + u) + "px " + t + "px)"
    },
    rotate: function(n, t) {
        if (0 !== Number(t)) {
            var u = n.node,
                i = u.style,
                r = this.getBGColor(u.parentNode);
            i.backgroundColor = r;
            i.paddingLeft = 1;
            var r = t * Math.PI / 180,
                o = Math.cos(r),
                s = Math.sin(r),
                h = AmCharts.removePx(i.left),
                c = AmCharts.removePx(i.top),
                f = u.offsetWidth,
                u = u.offsetHeight,
                e = t / Math.abs(t);
            i.left = h + f / 2 - f / 2 * Math.cos(r) - e * u / 2 * Math.sin(r) + 3;
            i.top = c - e * f / 2 * Math.sin(r) + e * u / 2 * Math.sin(r);
            i.cssText = i.cssText + "; filter:progid:DXImageTransform.Microsoft.Matrix(M11='" + o + "', M12='" + -s + "', M21='" + s + "', M22='" + o + "', sizingmethod='auto expand');"
        }
    },
    getBGColor: function(n) {
        var t = "#FFFFFF",
            i;
        return n.style && (i = n.style.backgroundColor, "" !== i ? t = i : n.parentNode && (t = this.getBGColor(n.parentNode))), t
    },
    set: function(n) {
        var i = new AmCharts.AmDObject("group", this.D),
            t;
        if (this.D.container.appendChild(i.node), n)
            for (t = 0; t < n.length; t++) i.push(n[t]);
        return i
    },
    gradient: function(n, t, i, r) {
        var f = "",
            u, e;
        for ("radialGradient" == t && (t = "gradientradial", i.reverse()), "linearGradient" == t && (t = "gradient"), u = 0; u < i.length; u++) e = Math.round(100 * u / (i.length - 1)), f = f + (e + "% " + i[u]), u < i.length - 1 && (f += ",");
        n = n.fill;
        90 == r ? r = 0 : 270 == r ? r = 180 : 180 == r ? r = 90 : 0 === r && (r = 270);
        8 === document.documentMode ? (n.type = t, n.angle = r) : (n.setAttribute("type", t), n.setAttribute("angle", r));
        f && (n.colors.value = f)
    },
    remove: function(n) {
        n.clipPath && this.D.remove(n.clipPath);
        this.D.remove(n.node)
    },
    disableSelection: function(n) {
        void 0 !== typeof n.onselectstart && (n.onselectstart = function() {
            return !1
        });
        n.style.cursor = "default"
    }
});
AmCharts.SVGRenderer = AmCharts.Class({
    construct: function(n) {
        this.D = n;
        this.animations = []
    },
    create: function(n, t) {
        return document.createElementNS(AmCharts.SVG_NS, t)
    },
    attr: function(n, t) {
        for (var i in t) t.hasOwnProperty(i) && this.setAttr(n, i, t[i])
    },
    setAttr: function(n, t, i) {
        void 0 !== i && n.node.setAttribute(t, i)
    },
    animate: function(n, t, i, r, u) {
        var e = this,
            f = n.node;
        "translate" == t ? (f = (f = f.getAttribute("transform")) ? String(f).substring(10, f.length - 1) : "0,0", f = f.split(", ").join(" "), f = f.split(" ").join(","), 0 === f && (f = "0,0")) : f = f.getAttribute(t);
        t = {
            obj: n,
            frame: 0,
            attribute: t,
            from: f,
            to: i,
            time: r,
            effect: u
        };
        e.animations.push(t);
        n.animationX = t;
        e.interval || (e.interval = setInterval(function() {
            e.updateAnimations.call(e)
        }, AmCharts.updateRate))
    },
    updateAnimations: function() {
        for (var f = this.animations.length - 1; 0 <= f; f--) {
            var n = this.animations[f],
                e = 1e3 * n.time / AmCharts.updateRate,
                o = n.frame + 1,
                s = n.obj,
                u = n.attribute,
                r, i, t;
            o <= e ? (n.frame++, "translate" == u ? (r = n.from.split(","), u = Number(r[0]), r = Number(r[1]), i = n.to.split(","), t = Number(i[0]), i = Number(i[1]), t = 0 == t - u ? t : Math.round(this.D[n.effect](0, o, u, t - u, e)), n = 0 == i - r ? i : Math.round(this.D[n.effect](0, o, r, i - r, e)), u = "transform", n = "translate(" + t + "," + n + ")") : (r = Number(n.from), t = Number(n.to), t -= r, n = this.D[n.effect](0, o, r, t, e), 0 === t && this.animations.splice(f, 1)), this.setAttr(s, u, n)) : ("translate" == u ? (i = n.to.split(","), t = Number(i[0]), i = Number(i[1]), s.translate(t, i)) : (t = Number(n.to), this.setAttr(s, u, t)), this.animations.splice(f, 1))
        }
    },
    getBBox: function(n) {
        if (n = n.node) try {
            return n.getBBox()
        } catch (t) {}
        return {
            width: 0,
            height: 0,
            x: 0,
            y: 0
        }
    },
    path: function(n, t) {
        n.node.setAttributeNS(AmCharts.SVG_XLINK, "xlink:href", t)
    },
    clipRect: function(n, t, i, r, u) {
        var f = n.node,
            e = n.clipPath,
            o;
        e && this.D.remove(e);
        o = f.parentNode;
        o && (f = document.createElementNS(AmCharts.SVG_NS, "clipPath"), e = AmCharts.getUniqueId(), f.setAttribute("id", e), this.D.rect(t, i, r, u, 0, 0, f), o.appendChild(f), t = "#", AmCharts.baseHref && !AmCharts.isIE && (t = window.location.href + t), this.setAttr(n, "clip-path", "url(" + t + e + ")"), this.clipPathC++, n.clipPath = f)
    },
    text: function(n, t, i) {
        var r = new AmCharts.AmDObject("text", this.D),
            e, u, f;
        for (n = String(n).split("\n"), e = t["font-size"], u = 0; u < n.length; u++) f = this.create(null, "tspan"), f.appendChild(document.createTextNode(n[u])), f.setAttribute("y", (e + 2) * u + e / 2), f.setAttribute("x", 0), r.node.appendChild(f);
        return r.node.setAttribute("y", e / 2), this.attr(r, t), this.D.addToContainer(r.node, i), r
    },
    setText: function(n, t) {
        var i = n.node;
        i && (i.removeChild(i.firstChild), i.appendChild(document.createTextNode(t)))
    },
    move: function(n, t, i, r) {
        t = "translate(" + t + "," + i + ")";
        r && (t = t + " scale(" + r + ")");
        this.setAttr(n, "transform", t)
    },
    rotate: function(n, t) {
        var r = n.node.getAttribute("transform"),
            i = "rotate(" + t + ")";
        r && (i = r + " " + i);
        this.setAttr(n, "transform", i)
    },
    set: function(n) {
        var i = new AmCharts.AmDObject("g", this.D),
            t;
        if (this.D.container.appendChild(i.node), n)
            for (t = 0; t < n.length; t++) i.push(n[t]);
        return i
    },
    addListener: function(n, t, i) {
        n.node["on" + t] = i
    },
    gradient: function(n, t, i, r) {
        var o = n.node,
            f = n.grad;
        if (f && this.D.remove(f), t = document.createElementNS(AmCharts.SVG_NS, t), f = AmCharts.getUniqueId(), t.setAttribute("id", f), !isNaN(r)) {
            var u = 0,
                e = 0,
                s = 0,
                h = 0;
            90 == r ? s = 100 : 270 == r ? h = 100 : 180 == r ? u = 100 : 0 === r && (e = 100);
            t.setAttribute("x1", u + "%");
            t.setAttribute("x2", e + "%");
            t.setAttribute("y1", s + "%");
            t.setAttribute("y2", h + "%")
        }
        for (r = 0; r < i.length; r++) u = document.createElementNS(AmCharts.SVG_NS, "stop"), e = 100 * r / (i.length - 1), 0 === r && (e = 0), u.setAttribute("offset", e + "%"), u.setAttribute("stop-color", i[r]), t.appendChild(u);
        o.parentNode.appendChild(t);
        i = "#";
        AmCharts.baseHref && !AmCharts.isIE && (i = window.location.href + i);
        o.setAttribute("fill", "url(" + i + f + ")");
        n.grad = t
    },
    remove: function(n) {
        n.clipPath && this.D.remove(n.clipPath);
        n.grad && this.D.remove(n.grad);
        this.D.remove(n.node)
    }
});
AmCharts.AmDSet = AmCharts.Class({
        construct: function() {
            this.create("g")
        },
        attr: function(n) {
            this.R.attr(this.node, n)
        },
        move: function(n, t) {
            this.R.move(this.node, n, t)
        }
    }),
    function(n) {
        typeof define == "function" && define.amd ? define(["jquery"], n) : n(window.jQuery || window.Zepto)
    }(function(n) {
        "use strict";
        var u = function(t, i, r) {
                var f = this,
                    e, o, u;
                t = n(t);
                i = typeof i == "function" ? i(t.val(), undefined, t, r) : i;
                u = {
                    getCaret: function() {
                        try {
                            var n, i = 0,
                                f = t.get(0),
                                u = document.selection,
                                r = f.selectionStart;
                            return u && !~navigator.appVersion.indexOf("MSIE 10") ? (n = u.createRange(), n.moveStart("character", t.is("input") ? -t.val().length : -t.text().length), i = n.text.length) : (r || r === "0") && (i = r), i
                        } catch (e) {}
                    },
                    setCaret: function(n) {
                        try {
                            if (t.is(":focus")) {
                                var i, r = t.get(0);
                                r.setSelectionRange ? r.setSelectionRange(n, n) : r.createTextRange && (i = r.createTextRange(), i.collapse(!0), i.moveEnd("character", n), i.moveStart("character", n), i.select())
                            }
                        } catch (u) {}
                    },
                    events: function() {
                        t.on("keydown.mask", function() {
                            e = u.val()
                        }).on("keyup.mask", u.behaviour).on("paste.mask drop.mask", function() {
                            setTimeout(function() {
                                t.keydown().keyup()
                            }, 100)
                        }).on("change.mask", function() {
                            t.data("changed", !0)
                        }).on("blur.mask", function() {
                            e === t.val() || t.data("changed") || t.trigger("change");
                            t.data("changed", !1)
                        }).on("focusout.mask", function() {
                            r.clearIfNotMatch && !o.test(u.val()) && u.val("")
                        })
                    },
                    getRegexMask: function() {
                        for (var u = [], r, e, h, s, n, o, t = 0; t < i.length; t++) r = f.translation[i[t]], r ? (e = r.pattern.toString().replace(/.{1}$|^.{1}/g, ""), h = r.optional, s = r.recursive, s ? (u.push(i[t]), n = {
                            digit: i[t],
                            pattern: e
                        }) : u.push(!h && !s ? e : e + "?")) : u.push(i[t].replace(/[-\/\\^$*+?.()|[\]{}]/g, "\\$&"));
                        return o = u.join(""), n && (o = o.replace(new RegExp("(" + n.digit + "(.*" + n.digit + ")?)"), "($1)?").replace(new RegExp(n.digit, "g"), n.pattern)), new RegExp(o)
                    },
                    destroyEvents: function() {
                        t.off(["keydown", "keyup", "paste", "drop", "change", "blur", "focusout", "DOMNodeInserted", ""].join(".mask ")).removeData("changeCalled")
                    },
                    val: function(n) {
                        var i = t.is("input");
                        return arguments.length > 0 ? i ? t.val(n) : t.text(n) : i ? t.val() : t.text()
                    },
                    getMCharsBeforeCount: function(n, t) {
                        for (var u = 0, r = 0, e = i.length; r < e && r < n; r++) f.translation[i.charAt(r)] || (n = t ? n + 1 : n, u++);
                        return u
                    },
                    caretPos: function(n, t, r, e) {
                        var o = f.translation[i.charAt(Math.min(n - 1, i.length - 1))];
                        return o ? Math.min(n + r - t - e, r) : u.caretPos(n + 1, t, r, e)
                    },
                    behaviour: function(t) {
                        var i;
                        if (t = t || window.event, i = t.keyCode || t.which, n.inArray(i, f.byPassKeys) === -1) {
                            var r = u.getCaret(),
                                s = u.val(),
                                e = s.length,
                                c = r < e,
                                o = u.getMasked(),
                                h = o.length,
                                l = u.getMCharsBeforeCount(h - 1) - u.getMCharsBeforeCount(e - 1);
                            return o !== s && u.val(o), !c || i === 65 && t.ctrlKey || (i === 8 || i === 46 || (r = u.caretPos(r, e, h, l)), u.setCaret(r)), u.callbacks(t)
                        }
                    },
                    getMasked: function(n) {
                        var h = [],
                            d = u.val(),
                            t = 0,
                            c = i.length,
                            o = 0,
                            v = d.length,
                            e = 1,
                            y = "push",
                            l = -1,
                            s, p, k;
                        for (r.reverse ? (y = "unshift", e = -1, s = 0, t = c - 1, o = v - 1, p = function() {
                                return t > -1 && o > -1
                            }) : (s = c - 1, p = function() {
                                return t < c && o < v
                            }); p();) {
                            var w = i.charAt(t),
                                b = d.charAt(o),
                                a = f.translation[w];
                            a ? (b.match(a.pattern) ? (h[y](b), a.recursive && (l === -1 ? l = t : t === s && (t = l - e), s === l && (t -= e)), t += e) : a.optional && (t += e, o -= e), o += e) : (n || h[y](w), b === w && (o += e), t += e)
                        }
                        return k = i.charAt(s), c !== v + 1 || f.translation[k] || h.push(k), h.join("")
                    },
                    callbacks: function(n) {
                        var f = u.val(),
                            o = f !== e;
                        if (o === !0 && typeof r.onChange == "function") r.onChange(f, n, t, r);
                        if (o === !0 && typeof r.onKeyPress == "function") r.onKeyPress(f, n, t, r);
                        if (typeof r.onComplete == "function" && f.length === i.length) r.onComplete(f, n, t, r)
                    }
                };
                f.mask = i;
                f.options = r;
                f.remove = function() {
                    var n;
                    return u.destroyEvents(), u.val(f.getCleanVal()).removeAttr("maxlength"), n = u.getCaret(), u.setCaret(n - u.getMCharsBeforeCount(n)), t
                };
                f.getCleanVal = function() {
                    return u.getMasked(!0)
                };
                f.init = function() {
                    r = r || {};
                    f.byPassKeys = [9, 16, 17, 18, 36, 37, 38, 39, 40, 91];
                    f.translation = {
                        "0": {
                            pattern: /\d/
                        },
                        "9": {
                            pattern: /\d/,
                            optional: !0
                        },
                        "#": {
                            pattern: /\d/,
                            recursive: !0
                        },
                        A: {
                            pattern: /[a-zA-Z0-9]/
                        },
                        S: {
                            pattern: /[a-zA-Z]/
                        }
                    };
                    f.translation = n.extend({}, f.translation, r.translation);
                    f = n.extend(!0, {}, f, r);
                    o = u.getRegexMask();
                    r.maxlength !== !1 && t.attr("maxlength", i.length);
                    r.placeholder && t.attr("placeholder", r.placeholder);
                    t.attr("autocomplete", "off");
                    u.destroyEvents();
                    u.events();
                    var e = u.getCaret();
                    u.val(u.getMasked());
                    u.setCaret(e + u.getMCharsBeforeCount(e, !0))
                }()
            },
            t = {},
            i = "DOMNodeInserted.mask",
            r = function() {
                var t = n(this),
                    i = {},
                    r = "data-mask-";
                t.attr(r + "reverse") && (i.reverse = !0);
                t.attr(r + "maxlength") === "false" && (i.maxlength = !1);
                t.attr(r + "clearifnotmatch") && (i.clearIfNotMatch = !0);
                t.mask(t.attr("data-mask"), i)
            };
        n.fn.mask = function(r, f) {
            var e = this.selector,
                o = function() {
                    var t = n(this).data("mask"),
                        i = JSON.stringify;
                    if (typeof t != "object" || i(t.options) !== i(f) || t.mask !== r) return n(this).data("mask", new u(this, r, f))
                };
            this.each(o);
            e && !t[e] && (t[e] = !0, setTimeout(function() {
                n(document).on(i, e, o)
            }, 500))
        };
        n.fn.unmask = function() {
            try {
                return this.each(function() {
                    n(this).data("mask").remove().removeData("mask")
                })
            } catch (t) {}
        };
        n.fn.cleanVal = function() {
            return this.data("mask").getCleanVal()
        };
        n("*[data-mask]").each(r);
        n(document).on(i, "*[data-mask]", r)
    }),
    function(n) {
        typeof define == "function" && define.amd ? define(["jquery", "./jquery.validate"], n) : n(jQuery)
    }(function(n) {
        (function() {
            function t(n) {
                return n.replace(/<.[^<>]*?>/g, " ").replace(/&nbsp;|&#160;/gi, " ").replace(/[.(),;:!?%#$'\"_+=\/\-""']*/g, "")
            }
            n.validator.addMethod("maxWords", function(n, i, r) {
                return this.optional(i) || t(n).match(/\b\w+\b/g).length <= r
            }, n.validator.format("Please enter {0} words or less."));
            n.validator.addMethod("minWords", function(n, i, r) {
                return this.optional(i) || t(n).match(/\b\w+\b/g).length >= r
            }, n.validator.format("Please enter at least {0} words."));
            n.validator.addMethod("rangeWords", function(n, i, r) {
                var u = t(n),
                    f = /\b\w+\b/g;
                return this.optional(i) || u.match(f).length >= r[0] && u.match(f).length <= r[1]
            }, n.validator.format("Please enter between {0} and {1} words."))
        })();
        n.validator.addMethod("accept", function(t, i, r) {
            var f = typeof r == "string" ? r.replace(/\s/g, "").replace(/,/g, "|") : "image/*",
                e = this.optional(i),
                u, o;
            if (e) return e;
            if (n(i).attr("type") === "file" && (f = f.replace(/\*/g, ".*"), i.files && i.files.length))
                for (u = 0; u < i.files.length; u++)
                    if (o = i.files[u], !o.type.match(new RegExp("\\.?(" + f + ")$", "i"))) return !1;
            return !0
        }, n.validator.format("Please enter a value with a valid mimetype."));
        n.validator.addMethod("alphanumeric", function(n, t) {
            return this.optional(t) || /^\w+$/i.test(n)
        }, "Letters, numbers, and underscores only please");
        n.validator.addMethod("bankaccountNL", function(n, t) {
            if (this.optional(t)) return !0;
            if (!/^[0-9]{9}|([0-9]{2} ){3}[0-9]{3}$/.test(n)) return !1;
            for (var u = n.replace(/ /g, ""), r = 0, f = u.length, e, o, i = 0; i < f; i++) e = f - i, o = u.substring(i, i + 1), r = r + e * o;
            return r % 11 == 0
        }, "Please specify a valid bank account number");
        n.validator.addMethod("bankorgiroaccountNL", function(t, i) {
            return this.optional(i) || n.validator.methods.bankaccountNL.call(this, t, i) || n.validator.methods.giroaccountNL.call(this, t, i)
        }, "Please specify a valid bank or giro account number");
        n.validator.addMethod("bic", function(n, t) {
            return this.optional(t) || /^([A-Z]{6}[A-Z2-9][A-NP-Z1-2])(X{3}|[A-WY-Z0-9][A-Z0-9]{2})?$/.test(n)
        }, "Please specify a valid BIC code");
        n.validator.addMethod("cifES", function(n) {
            "use strict";
            var t = [],
                f, i, r, u, e, o;
            if (n = n.toUpperCase(), !n.match("((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)")) return !1;
            for (r = 0; r < 9; r++) t[r] = parseInt(n.charAt(r), 10);
            for (i = t[2] + t[4] + t[6], u = 1; u < 8; u += 2) e = (2 * t[u]).toString(), o = e.charAt(1), i += parseInt(e.charAt(0), 10) + (o === "" ? 0 : parseInt(o, 10));
            return /^[ABCDEFGHJNPQRSUVW]{1}/.test(n) ? (i += "", f = 10 - parseInt(i.charAt(i.length - 1), 10), n += f, t[8].toString() === String.fromCharCode(64 + f) || t[8].toString() === n.charAt(n.length - 1)) : !1
        }, "Please specify a valid CIF number.");
        n.validator.addMethod("cpfBR", function(n) {
            if (n = n.replace(/([~!@#$%^&*()_+=`{}\[\]\-|\\:;'<>,.\/? ])+/g, ""), n.length !== 11) return !1;
            var i = 0,
                u, f, r, t;
            if (u = parseInt(n.substring(9, 10), 10), f = parseInt(n.substring(10, 11), 10), r = function(n, t) {
                    var i = n * 10 % 11;
                    return (i === 10 || i === 11) && (i = 0), i === t
                }, n === "" || n === "00000000000" || n === "11111111111" || n === "22222222222" || n === "33333333333" || n === "44444444444" || n === "55555555555" || n === "66666666666" || n === "77777777777" || n === "88888888888" || n === "99999999999") return !1;
            for (t = 1; t <= 9; t++) i = i + parseInt(n.substring(t - 1, t), 10) * (11 - t);
            if (r(i, u)) {
                for (i = 0, t = 1; t <= 10; t++) i = i + parseInt(n.substring(t - 1, t), 10) * (12 - t);
                return r(i, f)
            }
            return !1
        }, "Please specify a valid CPF number");
        n.validator.addMethod("creditcardtypes", function(n, t, i) {
            if (/[^0-9\-]+/.test(n)) return !1;
            n = n.replace(/\D/g, "");
            var r = 0;
            return (i.mastercard && (r |= 1), i.visa && (r |= 2), i.amex && (r |= 4), i.dinersclub && (r |= 8), i.enroute && (r |= 16), i.discover && (r |= 32), i.jcb && (r |= 64), i.unknown && (r |= 128), i.all && (r = 255), r & 1 && /^(5[12345])/.test(n)) ? n.length === 16 : r & 2 && /^(4)/.test(n) ? n.length === 16 : r & 4 && /^(3[47])/.test(n) ? n.length === 15 : r & 8 && /^(3(0[012345]|[68]))/.test(n) ? n.length === 14 : r & 16 && /^(2(014|149))/.test(n) ? n.length === 15 : r & 32 && /^(6011)/.test(n) ? n.length === 16 : r & 64 && /^(3)/.test(n) ? n.length === 16 : r & 64 && /^(2131|1800)/.test(n) ? n.length === 15 : r & 128 ? !0 : !1
        }, "Please enter a valid credit card number.");
        n.validator.addMethod("currency", function(n, t, i) {
            var f = typeof i == "string",
                r = f ? i : i[0],
                e = f ? !0 : i[1],
                u;
            return r = r.replace(/,/g, ""), r = e ? r + "]" : r + "]?", u = "^[" + r + "([1-9]{1}[0-9]{0,2}(\\,[0-9]{3})*(\\.[0-9]{0,2})?|[1-9]{1}[0-9]{0,}(\\.[0-9]{0,2})?|0(\\.[0-9]{0,2})?|(\\.[0-9]{1,2})?)$", u = new RegExp(u), this.optional(t) || u.test(n)
        }, "Please specify a valid currency");
        n.validator.addMethod("dateFA", function(n, t) {
            return this.optional(t) || /^[1-4]\d{3}\/((0?[1-6]\/((3[0-1])|([1-2][0-9])|(0?[1-9])))|((1[0-2]|(0?[7-9]))\/(30|([1-2][0-9])|(0?[1-9]))))$/.test(n)
        }, n.validator.messages.date);
        n.validator.addMethod("dateITA", function(n, t) {
            var u = !1,
                i, f, e, o, r;
            return /^\d{1,2}\/\d{1,2}\/\d{4}$/.test(n) ? (i = n.split("/"), f = parseInt(i[0], 10), e = parseInt(i[1], 10), o = parseInt(i[2], 10), r = new Date(Date.UTC(o, e - 1, f, 12, 0, 0, 0)), u = r.getUTCFullYear() === o && r.getUTCMonth() === e - 1 && r.getUTCDate() === f ? !0 : !1) : u = !1, this.optional(t) || u
        }, n.validator.messages.date);
        n.validator.addMethod("dateNL", function(n, t) {
            return this.optional(t) || /^(0?[1-9]|[12]\d|3[01])[\.\/\-](0?[1-9]|1[012])[\.\/\-]([12]\d)?(\d\d)$/.test(n)
        }, n.validator.messages.date);
        n.validator.addMethod("extension", function(n, t, i) {
            return i = typeof i == "string" ? i.replace(/,/g, "|") : "png|jpe?g|gif", this.optional(t) || n.match(new RegExp("\\.(" + i + ")$", "i"))
        }, n.validator.format("Please enter a value with a valid extension."));
        n.validator.addMethod("giroaccountNL", function(n, t) {
            return this.optional(t) || /^[0-9]{1,7}$/.test(n)
        }, "Please specify a valid giro account number");
        n.validator.addMethod("iban", function(n, t) {
            if (this.optional(t)) return !0;
            var i = n.replace(/ /g, "").toUpperCase(),
                f = "",
                c = !0,
                e = "",
                l = "",
                a, o, s, v, h, y, p, r, u;
            if (a = i.substring(0, 2), y = {
                    AL: "\\d{8}[\\dA-Z]{16}",
                    AD: "\\d{8}[\\dA-Z]{12}",
                    AT: "\\d{16}",
                    AZ: "[\\dA-Z]{4}\\d{20}",
                    BE: "\\d{12}",
                    BH: "[A-Z]{4}[\\dA-Z]{14}",
                    BA: "\\d{16}",
                    BR: "\\d{23}[A-Z][\\dA-Z]",
                    BG: "[A-Z]{4}\\d{6}[\\dA-Z]{8}",
                    CR: "\\d{17}",
                    HR: "\\d{17}",
                    CY: "\\d{8}[\\dA-Z]{16}",
                    CZ: "\\d{20}",
                    DK: "\\d{14}",
                    DO: "[A-Z]{4}\\d{20}",
                    EE: "\\d{16}",
                    FO: "\\d{14}",
                    FI: "\\d{14}",
                    FR: "\\d{10}[\\dA-Z]{11}\\d{2}",
                    GE: "[\\dA-Z]{2}\\d{16}",
                    DE: "\\d{18}",
                    GI: "[A-Z]{4}[\\dA-Z]{15}",
                    GR: "\\d{7}[\\dA-Z]{16}",
                    GL: "\\d{14}",
                    GT: "[\\dA-Z]{4}[\\dA-Z]{20}",
                    HU: "\\d{24}",
                    IS: "\\d{22}",
                    IE: "[\\dA-Z]{4}\\d{14}",
                    IL: "\\d{19}",
                    IT: "[A-Z]\\d{10}[\\dA-Z]{12}",
                    KZ: "\\d{3}[\\dA-Z]{13}",
                    KW: "[A-Z]{4}[\\dA-Z]{22}",
                    LV: "[A-Z]{4}[\\dA-Z]{13}",
                    LB: "\\d{4}[\\dA-Z]{20}",
                    LI: "\\d{5}[\\dA-Z]{12}",
                    LT: "\\d{16}",
                    LU: "\\d{3}[\\dA-Z]{13}",
                    MK: "\\d{3}[\\dA-Z]{10}\\d{2}",
                    MT: "[A-Z]{4}\\d{5}[\\dA-Z]{18}",
                    MR: "\\d{23}",
                    MU: "[A-Z]{4}\\d{19}[A-Z]{3}",
                    MC: "\\d{10}[\\dA-Z]{11}\\d{2}",
                    MD: "[\\dA-Z]{2}\\d{18}",
                    ME: "\\d{18}",
                    NL: "[A-Z]{4}\\d{10}",
                    NO: "\\d{11}",
                    PK: "[\\dA-Z]{4}\\d{16}",
                    PS: "[\\dA-Z]{4}\\d{21}",
                    PL: "\\d{24}",
                    PT: "\\d{21}",
                    RO: "[A-Z]{4}[\\dA-Z]{16}",
                    SM: "[A-Z]\\d{10}[\\dA-Z]{12}",
                    SA: "\\d{2}[\\dA-Z]{18}",
                    RS: "\\d{18}",
                    SK: "\\d{20}",
                    SI: "\\d{15}",
                    ES: "\\d{20}",
                    SE: "\\d{20}",
                    CH: "\\d{5}[\\dA-Z]{12}",
                    TN: "\\d{20}",
                    TR: "\\d{5}[\\dA-Z]{17}",
                    AE: "\\d{3}\\d{16}",
                    GB: "[A-Z]{4}\\d{14}",
                    VG: "[\\dA-Z]{4}\\d{16}"
                }, h = y[a], typeof h != "undefined" && (p = new RegExp("^[A-Z]{2}\\d{2}" + h + "$", ""), !p.test(i))) return !1;
            for (o = i.substring(4, i.length) + i.substring(0, 4), r = 0; r < o.length; r++) s = o.charAt(r), s !== "0" && (c = !1), c || (f += "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ".indexOf(s));
            for (u = 0; u < f.length; u++) v = f.charAt(u), l = "" + e + "" + v, e = l % 97;
            return e === 1
        }, "Please specify a valid IBAN");
        n.validator.addMethod("integer", function(n, t) {
            return this.optional(t) || /^-?\d+$/.test(n)
        }, "A positive or negative non-decimal number please");
        n.validator.addMethod("ipv4", function(n, t) {
            return this.optional(t) || /^(25[0-5]|2[0-4]\d|[01]?\d\d?)\.(25[0-5]|2[0-4]\d|[01]?\d\d?)\.(25[0-5]|2[0-4]\d|[01]?\d\d?)\.(25[0-5]|2[0-4]\d|[01]?\d\d?)$/i.test(n)
        }, "Please enter a valid IP v4 address.");
        n.validator.addMethod("ipv6", function(n, t) {
            return this.optional(t) || /^((([0-9A-Fa-f]{1,4}:){7}[0-9A-Fa-f]{1,4})|(([0-9A-Fa-f]{1,4}:){6}:[0-9A-Fa-f]{1,4})|(([0-9A-Fa-f]{1,4}:){5}:([0-9A-Fa-f]{1,4}:)?[0-9A-Fa-f]{1,4})|(([0-9A-Fa-f]{1,4}:){4}:([0-9A-Fa-f]{1,4}:){0,2}[0-9A-Fa-f]{1,4})|(([0-9A-Fa-f]{1,4}:){3}:([0-9A-Fa-f]{1,4}:){0,3}[0-9A-Fa-f]{1,4})|(([0-9A-Fa-f]{1,4}:){2}:([0-9A-Fa-f]{1,4}:){0,4}[0-9A-Fa-f]{1,4})|(([0-9A-Fa-f]{1,4}:){6}((\b((25[0-5])|(1\d{2})|(2[0-4]\d)|(\d{1,2}))\b)\.){3}(\b((25[0-5])|(1\d{2})|(2[0-4]\d)|(\d{1,2}))\b))|(([0-9A-Fa-f]{1,4}:){0,5}:((\b((25[0-5])|(1\d{2})|(2[0-4]\d)|(\d{1,2}))\b)\.){3}(\b((25[0-5])|(1\d{2})|(2[0-4]\d)|(\d{1,2}))\b))|(::([0-9A-Fa-f]{1,4}:){0,5}((\b((25[0-5])|(1\d{2})|(2[0-4]\d)|(\d{1,2}))\b)\.){3}(\b((25[0-5])|(1\d{2})|(2[0-4]\d)|(\d{1,2}))\b))|([0-9A-Fa-f]{1,4}::([0-9A-Fa-f]{1,4}:){0,5}[0-9A-Fa-f]{1,4})|(::([0-9A-Fa-f]{1,4}:){0,6}[0-9A-Fa-f]{1,4})|(([0-9A-Fa-f]{1,4}:){1,7}:))$/i.test(n)
        }, "Please enter a valid IP v6 address.");
        n.validator.addMethod("lettersonly", function(n, t) {
            return this.optional(t) || /^[a-z]+$/i.test(n)
        }, "Letters only please");
        n.validator.addMethod("letterswithbasicpunc", function(n, t) {
            return this.optional(t) || /^[a-z\-.,()'"\s]+$/i.test(n)
        }, "Letters or punctuation only please");
        n.validator.addMethod("mobileNL", function(n, t) {
            return this.optional(t) || /^((\+|00(\s|\s?\-\s?)?)31(\s|\s?\-\s?)?(\(0\)[\-\s]?)?|0)6((\s|\s?\-\s?)?[0-9]){8}$/.test(n)
        }, "Please specify a valid mobile number");
        n.validator.addMethod("mobileUK", function(n, t) {
            return n = n.replace(/\(|\)|\s+|-/g, ""), this.optional(t) || n.length > 9 && n.match(/^(?:(?:(?:00\s?|\+)44\s?|0)7(?:[1345789]\d{2}|624)\s?\d{3}\s?\d{3})$/)
        }, "Please specify a valid mobile number");
        n.validator.addMethod("nieES", function(n) {
            "use strict";
            return (n = n.toUpperCase(), !n.match("((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)")) ? !1 : /^[T]{1}/.test(n) ? n[8] === /^[T]{1}[A-Z0-9]{8}$/.test(n) : /^[XYZ]{1}/.test(n) ? n[8] === "TRWAGMYFPDXBNJZSQVHLCKE".charAt(n.replace("X", "0").replace("Y", "1").replace("Z", "2").substring(0, 8) % 23) : !1
        }, "Please specify a valid NIE number.");
        n.validator.addMethod("nifES", function(n) {
            "use strict";
            return (n = n.toUpperCase(), !n.match("((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)")) ? !1 : /^[0-9]{8}[A-Z]{1}$/.test(n) ? "TRWAGMYFPDXBNJZSQVHLCKE".charAt(n.substring(8, 0) % 23) === n.charAt(8) : /^[KLM]{1}/.test(n) ? n[8] === String.fromCharCode(64) : !1
        }, "Please specify a valid NIF number.");
        jQuery.validator.addMethod("notEqualTo", function(t, i, r) {
            return this.optional(i) || !n.validator.methods.equalTo.call(this, t, i, r)
        }, "Please enter a different value, values must not be the same.");
        n.validator.addMethod("nowhitespace", function(n, t) {
            return this.optional(t) || /^\S+$/i.test(n)
        }, "No white space please");
        n.validator.addMethod("pattern", function(n, t, i) {
            return this.optional(t) ? !0 : (typeof i == "string" && (i = new RegExp("^(?:" + i + ")$")), i.test(n))
        }, "Invalid format.");
        n.validator.addMethod("phoneNL", function(n, t) {
            return this.optional(t) || /^((\+|00(\s|\s?\-\s?)?)31(\s|\s?\-\s?)?(\(0\)[\-\s]?)?|0)[1-9]((\s|\s?\-\s?)?[0-9]){8}$/.test(n)
        }, "Please specify a valid phone number.");
        n.validator.addMethod("phoneUK", function(n, t) {
            return n = n.replace(/\(|\)|\s+|-/g, ""), this.optional(t) || n.length > 9 && n.match(/^(?:(?:(?:00\s?|\+)44\s?)|(?:\(?0))(?:\d{2}\)?\s?\d{4}\s?\d{4}|\d{3}\)?\s?\d{3}\s?\d{3,4}|\d{4}\)?\s?(?:\d{5}|\d{3}\s?\d{3})|\d{5}\)?\s?\d{4,5})$/)
        }, "Please specify a valid phone number");
        n.validator.addMethod("phoneUS", function(n, t) {
            return n = n.replace(/\s+/g, ""), this.optional(t) || n.length > 9 && n.match(/^(\+?1-?)?(\([2-9]([02-9]\d|1[02-9])\)|[2-9]([02-9]\d|1[02-9]))-?[2-9]([02-9]\d|1[02-9])-?\d{4}$/)
        }, "Please specify a valid phone number");
        n.validator.addMethod("phonesUK", function(n, t) {
            return n = n.replace(/\(|\)|\s+|-/g, ""), this.optional(t) || n.length > 9 && n.match(/^(?:(?:(?:00\s?|\+)44\s?|0)(?:1\d{8,9}|[23]\d{9}|7(?:[1345789]\d{8}|624\d{6})))$/)
        }, "Please specify a valid uk phone number");
        n.validator.addMethod("postalCodeCA", function(n, t) {
            return this.optional(t) || /^[ABCEGHJKLMNPRSTVXY]\d[A-Z] \d[A-Z]\d$/.test(n)
        }, "Please specify a valid postal code");
        n.validator.addMethod("postalcodeBR", function(n, t) {
            return this.optional(t) || /^\d{2}.\d{3}-\d{3}?$|^\d{5}-?\d{3}?$/.test(n)
        }, "Informe um CEP válido.");
        n.validator.addMethod("postalcodeIT", function(n, t) {
            return this.optional(t) || /^\d{5}$/.test(n)
        }, "Please specify a valid postal code");
        n.validator.addMethod("postalcodeNL", function(n, t) {
            return this.optional(t) || /^[1-9][0-9]{3}\s?[a-zA-Z]{2}$/.test(n)
        }, "Please specify a valid postal code");
        n.validator.addMethod("postcodeUK", function(n, t) {
            return this.optional(t) || /^((([A-PR-UWYZ][0-9])|([A-PR-UWYZ][0-9][0-9])|([A-PR-UWYZ][A-HK-Y][0-9])|([A-PR-UWYZ][A-HK-Y][0-9][0-9])|([A-PR-UWYZ][0-9][A-HJKSTUW])|([A-PR-UWYZ][A-HK-Y][0-9][ABEHMNPRVWXY]))\s?([0-9][ABD-HJLNP-UW-Z]{2})|(GIR)\s?(0AA))$/i.test(n)
        }, "Please specify a valid UK postcode");
        n.validator.addMethod("require_from_group", function(t, i, r) {
            var u = n(r[1], i.form),
                f = u.eq(0),
                e = f.data("valid_req_grp") ? f.data("valid_req_grp") : n.extend({}, this),
                o = u.filter(function() {
                    return e.elementValue(this)
                }).length >= r[0];
            return f.data("valid_req_grp", e), n(i).data("being_validated") || (u.data("being_validated", !0), u.each(function() {
                e.element(this)
            }), u.data("being_validated", !1)), o
        }, n.validator.format("Please fill at least {0} of these fields."));
        n.validator.addMethod("skip_or_fill_minimum", function(t, i, r) {
            var u = n(r[1], i.form),
                f = u.eq(0),
                e = f.data("valid_skip") ? f.data("valid_skip") : n.extend({}, this),
                o = u.filter(function() {
                    return e.elementValue(this)
                }).length,
                s = o === 0 || o >= r[0];
            return f.data("valid_skip", e), n(i).data("being_validated") || (u.data("being_validated", !0), u.each(function() {
                e.element(this)
            }), u.data("being_validated", !1)), s
        }, n.validator.format("Please either skip these fields or fill at least {0} of them."));
        n.validator.addMethod("stateUS", function(n, t, i) {
            var u = typeof i == "undefined",
                o = u || typeof i.caseSensitive == "undefined" ? !1 : i.caseSensitive,
                f = u || typeof i.includeTerritories == "undefined" ? !1 : i.includeTerritories,
                e = u || typeof i.includeMilitary == "undefined" ? !1 : i.includeMilitary,
                r;
            return r = f || e ? f && e ? "^(A[AEKLPRSZ]|C[AOT]|D[CE]|FL|G[AU]|HI|I[ADLN]|K[SY]|LA|M[ADEINOPST]|N[CDEHJMVY]|O[HKR]|P[AR]|RI|S[CD]|T[NX]|UT|V[AIT]|W[AIVY])$" : f ? "^(A[KLRSZ]|C[AOT]|D[CE]|FL|G[AU]|HI|I[ADLN]|K[SY]|LA|M[ADEINOPST]|N[CDEHJMVY]|O[HKR]|P[AR]|RI|S[CD]|T[NX]|UT|V[AIT]|W[AIVY])$" : "^(A[AEKLPRZ]|C[AOT]|D[CE]|FL|GA|HI|I[ADLN]|K[SY]|LA|M[ADEINOST]|N[CDEHJMVY]|O[HKR]|PA|RI|S[CD]|T[NX]|UT|V[AT]|W[AIVY])$" : "^(A[KLRZ]|C[AOT]|D[CE]|FL|GA|HI|I[ADLN]|K[SY]|LA|M[ADEINOST]|N[CDEHJMVY]|O[HKR]|PA|RI|S[CD]|T[NX]|UT|V[AT]|W[AIVY])$", r = o ? new RegExp(r) : new RegExp(r, "i"), this.optional(t) || r.test(n)
        }, "Please specify a valid state");
        n.validator.addMethod("strippedminlength", function(t, i, r) {
            return n(t).text().length >= r
        }, n.validator.format("Please enter at least {0} characters"));
        n.validator.addMethod("time", function(n, t) {
            return this.optional(t) || /^([01]\d|2[0-3]|[0-9])(:[0-5]\d){1,2}$/.test(n)
        }, "Please enter a valid time, between 00:00 and 23:59");
        n.validator.addMethod("time12h", function(n, t) {
            return this.optional(t) || /^((0?[1-9]|1[012])(:[0-5]\d){1,2}(\ ?[AP]M))$/i.test(n)
        }, "Please enter a valid time in 12-hour am/pm format");
        n.validator.addMethod("url2", function(n, t) {
            return this.optional(t) || /^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)*(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(n)
        }, n.validator.messages.url);
        n.validator.addMethod("vinUS", function(n) {
            if (n.length !== 17) return !1;
            for (var e = ["A", "B", "C", "D", "E", "F", "G", "H", "J", "K", "L", "M", "N", "P", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"], h = [1, 2, 3, 4, 5, 6, 7, 8, 1, 2, 3, 4, 5, 7, 9, 2, 3, 4, 5, 6, 7, 8, 9], c = [8, 7, 6, 5, 4, 3, 2, 10, 0, 9, 8, 7, 6, 5, 4, 3, 2], s = 0, r, t, o, u, f, i = 0; i < 17; i++) {
                if (o = c[i], t = n.slice(i, i + 1), i === 8 && (f = t), isNaN(t)) {
                    for (r = 0; r < e.length; r++)
                        if (t.toUpperCase() === e[r]) {
                            t = h[r];
                            t *= o;
                            isNaN(f) && r === 8 && (f = e[r]);
                            break
                        }
                } else t *= o;
                s += t
            }
            return (u = s % 11, u === 10 && (u = "X"), u === f) ? !0 : !1
        }, "The specified vehicle identification number (VIN) is invalid.");
        n.validator.addMethod("zipcodeUS", function(n, t) {
            return this.optional(t) || /^\d{5}(-\d{4})?$/.test(n)
        }, "The specified US ZIP Code is invalid");
        n.validator.addMethod("ziprange", function(n, t) {
            return this.optional(t) || /^90[2-5]\d\{2\}-\d{4}$/.test(n)
        }, "Your ZIP-code must be in the range 902xx-xxxx to 905xx-xxxx")
    });
tag = document.createElement("script");
tag.src = "https://www.youtube.com/iframe_api";
firstScriptTag = document.getElementsByTagName("script")[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
players = [];
currentPurchaseInfo = null;
$(function() {})