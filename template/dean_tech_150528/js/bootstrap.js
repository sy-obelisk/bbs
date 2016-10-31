+function (b) {
    var c = function (a) {
        b(a).on("click", '[data-dismiss="alert"]', this.close)
    };
    c.prototype.close = function (a) {
        function e() {
            h.trigger("closed.bs.alert").remove()
        }

        var d = b(this), c = d.attr("data-target");
        c || (c = (c = d.attr("href")) && c.replace(/.*(?=#[^\s]*$)/, ""));
        var h = b(c);
        a && a.preventDefault();
        h.length || (h = d.hasClass("alert") ? d : d.parent());
        h.trigger(a = b.Event("close.bs.alert"));
        a.isDefaultPrevented() || (h.removeClass("in"), b.support.transition && h.hasClass("fade") ? h.one(b.support.transition.end, e).emulateTransitionEnd(150) :
            e())
    };
    var f = b.fn.alert;
    b.fn.alert = function (a) {
        return this.each(function () {
            var e = b(this), d = e.data("bs.alert");
            d || e.data("bs.alert", d = new c(this));
            "string" == typeof a && d[a].call(e)
        })
    };
    b.fn.alert.Constructor = c;
    b.fn.alert.noConflict = function () {
        b.fn.alert = f;
        return this
    };
    b(document).on("click.bs.alert.data-api", '[data-dismiss="alert"]', c.prototype.close)
}(jQuery);
+function (b) {
    var c = function (a, e) {
        this.$element = b(a);
        this.options = b.extend({}, c.DEFAULTS, e)
    };
    c.DEFAULTS = {loadingText:"loading..."};
    c.prototype.setState = function (a) {
        var b = this.$element, d = b.is("input") ? "val" : "html", c = b.data();
        a += "Text";
        c.resetText || b.data("resetText", b[d]());
        b[d](c[a] || this.options[a]);
        setTimeout(function () {
            "loadingText" == a ? b.addClass("disabled").attr("disabled", "disabled") : b.removeClass("disabled").removeAttr("disabled")
        }, 0)
    };
    c.prototype.toggle = function () {
        var a = this.$element.closest('[data-toggle="buttons"]'),
            b = !0;
        if (a.length) {
            var d = this.$element.find("input");
            "radio" === d.prop("type") && (d.prop("checked") && this.$element.hasClass("active") ? b = !1 : a.find(".active").removeClass("active"));
            b && d.prop("checked", !this.$element.hasClass("active")).trigger("change")
        }
        b && this.$element.toggleClass("active")
    };
    var f = b.fn.button;
    b.fn.button = function (a) {
        return this.each(function () {
            var e = b(this), d = e.data("bs.button"), g = "object" == typeof a && a;
            d || e.data("bs.button", d = new c(this, g));
            "toggle" == a ? d.toggle() : a && d.setState(a)
        })
    };
    b.fn.button.Constructor = c;
    b.fn.button.noConflict = function () {
        b.fn.button = f;
        return this
    };
    b(document).on("click.bs.button.data-api", "[data-toggle^=button]", function (a) {
        var e = b(a.target);
        e.hasClass("btn") || (e = e.closest(".btn"));
        e.button("toggle");
        a.preventDefault()
    })
}(jQuery);
+function (b) {
    var c = function (a, e) {
        this.$element = b(a);
        this.$indicators = this.$element.find(".carousel-indicators");
        this.options = e;
        this.paused = this.sliding = this.interval = this.$active = this.$items = null;
        "hover" == this.options.pause && this.$element.on("mouseenter", b.proxy(this.pause, this)).on("mouseleave", b.proxy(this.cycle, this))
    };
    c.DEFAULTS = {interval:5E3, pause:"hover", wrap:!0};
    c.prototype.cycle = function (a) {
        a || (this.paused = !1);
        this.interval && clearInterval(this.interval);
        this.options.interval && !this.paused &&
        (this.interval = setInterval(b.proxy(this.next, this), this.options.interval));
        return this
    };
    c.prototype.getActiveIndex = function () {
        this.$active = this.$element.find(".item.active");
        this.$items = this.$active.parent().children();
        return this.$items.index(this.$active)
    };
    c.prototype.to = function (a) {
        var e = this, d = this.getActiveIndex();
        if (!(a > this.$items.length - 1 || 0 > a))return this.sliding ? this.$element.one("slid.bs.carousel", function () {
            e.to(a)
        }) : d == a ? this.pause().cycle() : this.slide(a > d ? "next" : "prev", b(this.$items[a]))
    };
    c.prototype.pause = function (a) {
        a || (this.paused = !0);
        this.$element.find(".next, .prev").length && b.support.transition.end && (this.$element.trigger(b.support.transition.end), this.cycle(!0));
        this.interval = clearInterval(this.interval);
        return this
    };
    c.prototype.next = function () {
        if (!this.sliding)return this.slide("next")
    };
    c.prototype.prev = function () {
        if (!this.sliding)return this.slide("prev")
    };
    c.prototype.slide = function (a, e) {
        var d = this.$element.find(".item.active"), c = e || d[a](), h = this.interval, k = "next" == a ? "left" :
            "right", l = "next" == a ? "first" : "last", f = this;
        if (!c.length) {
            if (!this.options.wrap)return;
            c = this.$element.find(".item")[l]()
        }
        this.sliding = !0;
        h && this.pause();
        l = b.Event("slide.bs.carousel", {relatedTarget:c[0], direction:k});
        if (!c.hasClass("active")) {
            this.$indicators.length && (this.$indicators.find(".active").removeClass("active"), this.$element.one("slid.bs.carousel", function () {
                var a = b(f.$indicators.children()[f.getActiveIndex()]);
                a && a.addClass("active")
            }));
            if (b.support.transition && this.$element.hasClass("slide")) {
                this.$element.trigger(l);
                if (l.isDefaultPrevented())return;
                c.addClass(a);
                c[0].offsetWidth;
                d.addClass(k);
                c.addClass(k);
                d.one(b.support.transition.end,function () {
                    c.removeClass([a, k].join(" ")).addClass("active");
                    d.removeClass(["active", k].join(" "));
                    f.sliding = !1;
                    setTimeout(function () {
                        f.$element.trigger("slid.bs.carousel")
                    }, 0)
                }).emulateTransitionEnd(600)
            } else {
                this.$element.trigger(l);
                if (l.isDefaultPrevented())return;
                d.removeClass("active");
                c.addClass("active");
                this.sliding = !1;
                this.$element.trigger("slid.bs.carousel")
            }
            h && this.cycle();
            return this
        }
    };
    var f = b.fn.carousel;
    b.fn.carousel = function (a) {
        return this.each(function () {
            var e = b(this), d = e.data("bs.carousel"), g = b.extend({}, c.DEFAULTS, e.data(), "object" == typeof a && a), h = "string" == typeof a ? a : g.slide;
            d || e.data("bs.carousel", d = new c(this, g));
            if ("number" == typeof a)d.to(a); else if (h)d[h](); else g.interval && d.pause().cycle()
        })
    };
    b.fn.carousel.Constructor = c;
    b.fn.carousel.noConflict = function () {
        b.fn.carousel = f;
        return this
    };
    b(document).on("click.bs.carousel.data-api", "[data-slide], [data-slide-to]",
        function (a) {
            var e = b(this), d, c = b(e.attr("data-target") || (d = e.attr("href")) && d.replace(/.*(?=#[^\s]+$)/, ""));
            d = b.extend({}, c.data(), e.data());
            var h = e.attr("data-slide-to");
            h && (d.interval = !1);
            c.carousel(d);
            (h = e.attr("data-slide-to")) && c.data("bs.carousel").to(h);
            a.preventDefault()
        });
    b(window).on("load", function () {
        b('[data-ride="carousel"]').each(function () {
            var a = b(this);
            a.carousel(a.data())
        })
    })
}(jQuery);
+function (b) {
    function c() {
        b(a).remove();
        b(e).each(function (a) {
            var e = f(b(this));
            e.hasClass("open") && (e.trigger(a = b.Event("hide.bs.dropdown")), a.isDefaultPrevented() || e.removeClass("open").trigger("hidden.bs.dropdown"))
        })
    }

    function f(a) {
        var e = a.attr("data-target");
        e || (e = (e = a.attr("href")) && /#/.test(e) && e.replace(/.*(?=#[^\s]*$)/, ""));
        return(e = e && b(e)) && e.length ? e : a.parent()
    }

    var a = ".dropdown-backdrop", e = "[data-toggle=dropdown]", d = function (a) {
        b(a).on("click.bs.dropdown", this.toggle)
    };
    d.prototype.toggle =
        function (a) {
            var e = b(this);
            if (!e.is(".disabled, :disabled")) {
                var d = f(e);
                a = d.hasClass("open");
                c();
                if (!a) {
                    if ("ontouchstart"in document.documentElement && !d.closest(".navbar-nav").length)b('<div class="dropdown-backdrop"/>').insertAfter(b(this)).on("click", c);
                    d.trigger(a = b.Event("show.bs.dropdown"));
                    if (a.isDefaultPrevented())return;
                    d.toggleClass("open").trigger("shown.bs.dropdown");
                    e.focus()
                }
                return!1
            }
        };
    d.prototype.keydown = function (a) {
        if (/(38|40|27)/.test(a.keyCode)) {
            var d = b(this);
            a.preventDefault();
            a.stopPropagation();
            if (!d.is(".disabled, :disabled")) {
                var c = f(d), g = c.hasClass("open");
                if (!g || g && 27 == a.keyCode)return 27 == a.which && c.find(e).focus(), d.click();
                d = b("[role=menu] li:not(.divider):visible a", c);
                d.length && (c = d.index(d.filter(":focus")), 38 == a.keyCode && 0 < c && c--, 40 == a.keyCode && c < d.length - 1 && c++, ~c || (c = 0), d.eq(c).focus())
            }
        }
    };
    var g = b.fn.dropdown;
    b.fn.dropdown = function (a) {
        return this.each(function () {
            var e = b(this), c = e.data("bs.dropdown");
            c || e.data("bs.dropdown", c = new d(this));
            "string" == typeof a && c[a].call(e)
        })
    };
    b.fn.dropdown.Constructor = d;
    b.fn.dropdown.noConflict = function () {
        b.fn.dropdown = g;
        return this
    };
    b(document).on("click.bs.dropdown.data-api", c).on("click.bs.dropdown.data-api", ".dropdown form",function (a) {
        a.stopPropagation()
    }).on("click.bs.dropdown.data-api", e, d.prototype.toggle).on("keydown.bs.dropdown.data-api", e + ", [role=menu]", d.prototype.keydown)
}(jQuery);
+function (b) {
    var c = function (a, e) {
        this.options = e;
        this.$element = b(a);
        this.$backdrop = this.isShown = null;
        this.options.remote && this.$element.load(this.options.remote)
    };
    c.DEFAULTS = {backdrop:!0, keyboard:!0, show:!0};
    c.prototype.toggle = function (a) {
        return this[this.isShown ? "hide" : "show"](a)
    };
    c.prototype.show = function (a) {
        var e = this, d = b.Event("show.bs.modal", {relatedTarget:a});
        this.$element.trigger(d);
        this.isShown || d.isDefaultPrevented() || (this.isShown = !0, this.escape(), this.$element.on("click.dismiss.modal", '[data-dismiss="modal"]',
            b.proxy(this.hide, this)), this.backdrop(function () {
            var d = b.support.transition && e.$element.hasClass("fade");
            e.$element.parent().length || e.$element.appendTo(document.body);
            e.$element.show();
            d && e.$element[0].offsetWidth;
            e.$element.addClass("in").attr("aria-hidden", !1);
            e.enforceFocus();
            var c = b.Event("shown.bs.modal", {relatedTarget:a});
            d ? e.$element.find(".modal-dialog").one(b.support.transition.end,function () {
                e.$element.focus().trigger(c)
            }).emulateTransitionEnd(300) : e.$element.focus().trigger(c)
        }))
    };
    c.prototype.hide =
        function (a) {
            a && a.preventDefault();
            a = b.Event("hide.bs.modal");
            this.$element.trigger(a);
            this.isShown && !a.isDefaultPrevented() && (this.isShown = !1, this.escape(), b(document).off("focusin.bs.modal"), this.$element.removeClass("in").attr("aria-hidden", !0).off("click.dismiss.modal"), b.support.transition && this.$element.hasClass("fade") ? this.$element.one(b.support.transition.end, b.proxy(this.hideModal, this)).emulateTransitionEnd(300) : this.hideModal())
        };
    c.prototype.enforceFocus = function () {
        b(document).off("focusin.bs.modal").on("focusin.bs.modal",
            b.proxy(function (a) {
                this.$element[0] === a.target || this.$element.has(a.target).length || this.$element.focus()
            }, this))
    };
    c.prototype.escape = function () {
        if (this.isShown && this.options.keyboard)this.$element.on("keyup.dismiss.bs.modal", b.proxy(function (a) {
            27 == a.which && this.hide()
        }, this)); else this.isShown || this.$element.off("keyup.dismiss.bs.modal")
    };
    c.prototype.hideModal = function () {
        var a = this;
        this.$element.hide();
        this.backdrop(function () {
            a.removeBackdrop();
            a.$element.trigger("hidden.bs.modal")
        })
    };
    c.prototype.removeBackdrop =
        function () {
            this.$backdrop && this.$backdrop.remove();
            this.$backdrop = null
        };
    c.prototype.backdrop = function (a) {
        var e = this.$element.hasClass("fade") ? "fade" : "";
        if (this.isShown && this.options.backdrop) {
            var d = b.support.transition && e;
            this.$backdrop = b('<div class="modal-backdrop ' + e + '" />').appendTo(document.body);
            this.$element.on("click.dismiss.modal", b.proxy(function (a) {
                a.target === a.currentTarget && ("static" == this.options.backdrop ? this.$element[0].focus.call(this.$element[0]) : this.hide.call(this))
            }, this));
            d &&
            this.$backdrop[0].offsetWidth;
            this.$backdrop.addClass("in");
            a && (d ? this.$backdrop.one(b.support.transition.end, a).emulateTransitionEnd(150) : a())
        } else!this.isShown && this.$backdrop ? (this.$backdrop.removeClass("in"), b.support.transition && this.$element.hasClass("fade") ? this.$backdrop.one(b.support.transition.end, a).emulateTransitionEnd(150) : a()) : a && a()
    };
    var f = b.fn.modal;
    b.fn.modal = function (a, e) {
        return this.each(function () {
            var d = b(this), g = d.data("bs.modal"), h = b.extend({}, c.DEFAULTS, d.data(), "object" == typeof a &&
                a);
            g || d.data("bs.modal", g = new c(this, h));
            if ("string" == typeof a)g[a](e); else h.show && g.show(e)
        })
    };
    b.fn.modal.Constructor = c;
    b.fn.modal.noConflict = function () {
        b.fn.modal = f;
        return this
    };
    b(document).on("click.bs.modal.data-api", '[data-toggle="modal"]', function (a) {
        var e = b(this), d = e.attr("href"), c = b(e.attr("data-target") || d && d.replace(/.*(?=#[^\s]+$)/, "")), d = c.data("modal") ? "toggle" : b.extend({remote:!/#/.test(d) && d}, c.data(), e.data());
        a.preventDefault();
        c.modal(d, this).one("hide", function () {
            e.is(":visible") &&
            e.focus()
        })
    });
    b(document).on("show.bs.modal", ".modal",function () {
        b(document.body).addClass("modal-open")
    }).on("hidden.bs.modal", ".modal", function () {
        b(document.body).removeClass("modal-open")
    })
}(jQuery);
+function (b) {
    var c = function (a, b) {
        this.type = this.options = this.enabled = this.timeout = this.hoverState = this.$element = null;
        this.init("tooltip", a, b)
    };
    c.DEFAULTS = {animation:!0, placement:"top", selector:!1, template:'<div class="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>', trigger:"hover focus", title:"", delay:0, html:!1, container:!1};
    c.prototype.init = function (a, e, d) {
        this.enabled = !0;
        this.type = a;
        this.$element = b(e);
        this.options = this.getOptions(d);
        a = this.options.trigger.split(" ");
        for (e = a.length; e--;)if (d = a[e], "click" == d)this.$element.on("click." + this.type, this.options.selector, b.proxy(this.toggle, this)); else if ("manual" != d) {
            var c = "hover" == d ? "mouseleave" : "blur";
            this.$element.on(("hover" == d ? "mouseenter" : "focus") + "." + this.type, this.options.selector, b.proxy(this.enter, this));
            this.$element.on(c + "." + this.type, this.options.selector, b.proxy(this.leave, this))
        }
        this.options.selector ? this._options = b.extend({}, this.options, {trigger:"manual", selector:""}) : this.fixTitle()
    };
    c.prototype.getDefaults =
        function () {
            return c.DEFAULTS
        };
    c.prototype.getOptions = function (a) {
        a = b.extend({}, this.getDefaults(), this.$element.data(), a);
        a.delay && "number" == typeof a.delay && (a.delay = {show:a.delay, hide:a.delay});
        return a
    };
    c.prototype.getDelegateOptions = function () {
        var a = {}, e = this.getDefaults();
        this._options && b.each(this._options, function (b, c) {
            e[b] != c && (a[b] = c)
        });
        return a
    };
    c.prototype.enter = function (a) {
        var e = a instanceof this.constructor ? a : b(a.currentTarget)[this.type](this.getDelegateOptions()).data("bs." + this.type);
        clearTimeout(e.timeout);
        e.hoverState = "in";
        if (!e.options.delay || !e.options.delay.show)return e.show();
        e.timeout = setTimeout(function () {
            "in" == e.hoverState && e.show()
        }, e.options.delay.show)
    };
    c.prototype.leave = function (a) {
        var e = a instanceof this.constructor ? a : b(a.currentTarget)[this.type](this.getDelegateOptions()).data("bs." + this.type);
        clearTimeout(e.timeout);
        e.hoverState = "out";
        if (!e.options.delay || !e.options.delay.hide)return e.hide();
        e.timeout = setTimeout(function () {
            "out" == e.hoverState && e.hide()
        }, e.options.delay.hide)
    };
    c.prototype.show = function () {
        var a = b.Event("show.bs." + this.type);
        if (this.hasContent() && this.enabled && (this.$element.trigger(a), !a.isDefaultPrevented())) {
            var e = this.tip();
            this.setContent();
            this.options.animation && e.addClass("fade");
            var a = "function" == typeof this.options.placement ? this.options.placement.call(this, e[0], this.$element[0]) : this.options.placement, d = /\s?auto?\s?/i, c = d.test(a);
            c && (a = a.replace(d, "") || "top");
            e.detach().css({top:0, left:0, display:"block"}).addClass(a);
            this.options.container ? e.appendTo(this.options.container) :
                e.insertAfter(this.$element);
            var d = this.getPosition(), h = e[0].offsetWidth, k = e[0].offsetHeight;
            if (c) {
                var f = this.$element.parent(), c = a, m = document.documentElement.scrollTop || document.body.scrollTop, n = "body" == this.options.container ? window.innerWidth : f.outerWidth(), p = "body" == this.options.container ? window.innerHeight : f.outerHeight(), f = "body" == this.options.container ? 0 : f.offset().left, a = "bottom" == a && d.top + d.height + k - m > p ? "top" : "top" == a && 0 > d.top - m - k ? "bottom" : "right" == a && d.right + h > n ? "left" : "left" == a && d.left -
                    h < f ? "right" : a;
                e.removeClass(c).addClass(a)
            }
            e = this.getCalculatedOffset(a, d, h, k);
            this.applyPlacement(e, a);
            this.$element.trigger("shown.bs." + this.type)
        }
    };
    c.prototype.applyPlacement = function (a, b) {
        var d, c = this.tip(), h = c[0].offsetWidth, f = c[0].offsetHeight, l = parseInt(c.css("margin-top"), 10), m = parseInt(c.css("margin-left"), 10);
        isNaN(l) && (l = 0);
        isNaN(m) && (m = 0);
        a.top += l;
        a.left += m;
        c.offset(a).addClass("in");
        l = c[0].offsetWidth;
        m = c[0].offsetHeight;
        "top" == b && m != f && (d = !0, a.top = a.top + f - m);
        /bottom|top/.test(b) ? (f =
            0, 0 > a.left && (f = -2 * a.left, a.left = 0, c.offset(a), l = c[0].offsetWidth), this.replaceArrow(f - h + l, l, "left")) : this.replaceArrow(m - f, m, "top");
        d && c.offset(a)
    };
    c.prototype.replaceArrow = function (a, b, c) {
        this.arrow().css(c, a ? 50 * (1 - a / b) + "%" : "")
    };
    c.prototype.setContent = function () {
        var a = this.tip(), b = this.getTitle();
        a.find(".tooltip-inner")[this.options.html ? "html" : "text"](b);
        a.removeClass("fade in top bottom left right")
    };
    c.prototype.hide = function () {
        function a() {
            "in" != e.hoverState && c.detach()
        }

        var e = this, c = this.tip(),
            g = b.Event("hide.bs." + this.type);
        this.$element.trigger(g);
        if (!g.isDefaultPrevented())return c.removeClass("in"), b.support.transition && this.$tip.hasClass("fade") ? c.one(b.support.transition.end, a).emulateTransitionEnd(150) : a(), this.$element.trigger("hidden.bs." + this.type), this
    };
    c.prototype.fixTitle = function () {
        var a = this.$element;
        (a.attr("title") || "string" != typeof a.attr("data-original-title")) && a.attr("data-original-title", a.attr("title") || "").attr("title", "")
    };
    c.prototype.hasContent = function () {
        return this.getTitle()
    };
    c.prototype.getPosition = function () {
        var a = this.$element[0];
        return b.extend({}, "function" == typeof a.getBoundingClientRect ? a.getBoundingClientRect() : {width:a.offsetWidth, height:a.offsetHeight}, this.$element.offset())
    };
    c.prototype.getCalculatedOffset = function (a, b, c, g) {
        return"bottom" == a ? {top:b.top + b.height, left:b.left + b.width / 2 - c / 2} : "top" == a ? {top:b.top - g, left:b.left + b.width / 2 - c / 2} : "left" == a ? {top:b.top + b.height / 2 - g / 2, left:b.left - c} : {top:b.top + b.height / 2 - g / 2, left:b.left + b.width}
    };
    c.prototype.getTitle = function () {
        var a =
            this.$element, b = this.options;
        return a.attr("data-original-title") || ("function" == typeof b.title ? b.title.call(a[0]) : b.title)
    };
    c.prototype.tip = function () {
        return this.$tip = this.$tip || b(this.options.template)
    };
    c.prototype.arrow = function () {
        return this.$arrow = this.$arrow || this.tip().find(".tooltip-arrow")
    };
    c.prototype.validate = function () {
        this.$element[0].parentNode || (this.hide(), this.options = this.$element = null)
    };
    c.prototype.enable = function () {
        this.enabled = !0
    };
    c.prototype.disable = function () {
        this.enabled = !1
    };
    c.prototype.toggleEnabled = function () {
        this.enabled = !this.enabled
    };
    c.prototype.toggle = function (a) {
        a = a ? b(a.currentTarget)[this.type](this.getDelegateOptions()).data("bs." + this.type) : this;
        a.tip().hasClass("in") ? a.leave(a) : a.enter(a)
    };
    c.prototype.destroy = function () {
        this.hide().$element.off("." + this.type).removeData("bs." + this.type)
    };
    var f = b.fn.tooltip;
    b.fn.tooltip = function (a) {
        return this.each(function () {
            var e = b(this), d = e.data("bs.tooltip"), g = "object" == typeof a && a;
            d || e.data("bs.tooltip", d = new c(this, g));
            if ("string" == typeof a)d[a]()
        })
    };
    b.fn.tooltip.Constructor = c;
    b.fn.tooltip.noConflict = function () {
        b.fn.tooltip = f;
        return this
    }
}(jQuery);
+function (b) {
    var c = function (a, b) {
        this.init("popover", a, b)
    };
    if (!b.fn.tooltip)throw Error("Popover requires tooltip.js");
    c.DEFAULTS = b.extend({}, b.fn.tooltip.Constructor.DEFAULTS, {placement:"right", trigger:"click", content:"", template:'<div class="popover"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'});
    c.prototype = b.extend({}, b.fn.tooltip.Constructor.prototype);
    c.prototype.constructor = c;
    c.prototype.getDefaults = function () {
        return c.DEFAULTS
    };
    c.prototype.setContent =
        function () {
            var a = this.tip(), b = this.getTitle(), c = this.getContent();
            a.find(".popover-title")[this.options.html ? "html" : "text"](b);
            a.find(".popover-content")[this.options.html ? "html" : "text"](c);
            a.removeClass("fade top bottom left right in");
            a.find(".popover-title").html() || a.find(".popover-title").hide()
        };
    c.prototype.hasContent = function () {
        return this.getTitle() || this.getContent()
    };
    c.prototype.getContent = function () {
        var a = this.$element, b = this.options;
        return a.attr("data-content") || ("function" == typeof b.content ?
            b.content.call(a[0]) : b.content)
    };
    c.prototype.arrow = function () {
        return this.$arrow = this.$arrow || this.tip().find(".arrow")
    };
    c.prototype.tip = function () {
        this.$tip || (this.$tip = b(this.options.template));
        return this.$tip
    };
    var f = b.fn.popover;
    b.fn.popover = function (a) {
        return this.each(function () {
            var e = b(this), d = e.data("bs.popover"), g = "object" == typeof a && a;
            d || e.data("bs.popover", d = new c(this, g));
            if ("string" == typeof a)d[a]()
        })
    };
    b.fn.popover.Constructor = c;
    b.fn.popover.noConflict = function () {
        b.fn.popover = f;
        return this
    }
}(jQuery);
+function (b) {
    var c = function (a) {
        this.element = b(a)
    };
    c.prototype.show = function () {
        var a = this.element, c = a.closest("ul:not(.dropdown-menu)"), d = a.data("target");
        d || (d = (d = a.attr("href")) && d.replace(/.*(?=#[^\s]*$)/, ""));
        if (!a.parent("li").hasClass("active")) {
            var g = c.find(".active:last a")[0], f = b.Event("show.bs.tab", {relatedTarget:g});
            a.trigger(f);
            f.isDefaultPrevented() || (d = b(d), this.activate(a.parent("li"), c), this.activate(d, d.parent(), function () {
                a.trigger({type:"shown.bs.tab", relatedTarget:g})
            }))
        }
    };
    c.prototype.activate =
        function (a, c, d) {
            function g() {
                f.removeClass("active").find("> .dropdown-menu > .active").removeClass("active");
                a.addClass("active");
                k ? (a[0].offsetWidth, a.addClass("in")) : a.removeClass("fade");
                a.parent(".dropdown-menu") && a.closest("li.dropdown").addClass("active");
                d && d()
            }

            var f = c.find("> .active"), k = d && b.support.transition && f.hasClass("fade");
            k ? f.one(b.support.transition.end, g).emulateTransitionEnd(150) : g();
            f.removeClass("in")
        };
    var f = b.fn.tab;
    b.fn.tab = function (a) {
        return this.each(function () {
            var e = b(this),
                d = e.data("bs.tab");
            d || e.data("bs.tab", d = new c(this));
            if ("string" == typeof a)d[a]()
        })
    };
    b.fn.tab.Constructor = c;
    b.fn.tab.noConflict = function () {
        b.fn.tab = f;
        return this
    };
    b(document).on("click.bs.tab.data-api", '[data-toggle="tab"], [data-toggle="pill"]', function (a) {
        a.preventDefault();
        b(this).tab("show")
    })
}(jQuery);
+function (b) {
    var c = function (a, e) {
        this.options = b.extend({}, c.DEFAULTS, e);
        this.$window = b(window).on("scroll.bs.affix.data-api", b.proxy(this.checkPosition, this)).on("click.bs.affix.data-api", b.proxy(this.checkPositionWithEventLoop, this));
        this.$element = b(a);
        this.affixed = this.unpin = null;
        this.checkPosition()
    };
    c.RESET = "affix affix-top affix-bottom";
    c.DEFAULTS = {offset:0};
    c.prototype.checkPositionWithEventLoop = function () {
        setTimeout(b.proxy(this.checkPosition, this), 1)
    };
    c.prototype.checkPosition = function () {
        if (this.$element.is(":visible")) {
            var a =
                b(document).height(), e = this.$window.scrollTop(), d = this.$element.offset(), g = this.options.offset, f = g.top, k = g.bottom;
            "object" != typeof g && (k = f = g);
            "function" == typeof f && (f = g.top());
            "function" == typeof k && (k = g.bottom());
            a = null != this.unpin && e + this.unpin <= d.top ? !1 : null != k && d.top + this.$element.height() >= a - k ? "bottom" : null != f && e <= f ? "top" : !1;
            this.affixed !== a && (this.unpin && this.$element.css("top", ""), this.affixed = a, this.unpin = "bottom" == a ? d.top - e : null, this.$element.removeClass(c.RESET).addClass("affix" + (a ? "-" + a :
                "")), "bottom" == a && this.$element.offset({top:document.body.offsetHeight - k - this.$element.height()}))
        }
    };
    var f = b.fn.affix;
    b.fn.affix = function (a) {
        return this.each(function () {
            var e = b(this), d = e.data("bs.affix"), f = "object" == typeof a && a;
            d || e.data("bs.affix", d = new c(this, f));
            if ("string" == typeof a)d[a]()
        })
    };
    b.fn.affix.Constructor = c;
    b.fn.affix.noConflict = function () {
        b.fn.affix = f;
        return this
    };
    b(window).on("load", function () {
        b('[data-spy="affix"]').each(function () {
            var a = b(this), c = a.data();
            c.offset = c.offset || {};
            c.offsetBottom &&
            (c.offset.bottom = c.offsetBottom);
            c.offsetTop && (c.offset.top = c.offsetTop);
            a.affix(c)
        })
    })
}(jQuery);
+function (b) {
    var c = function (a, e) {
        this.$element = b(a);
        this.options = b.extend({}, c.DEFAULTS, e);
        this.transitioning = null;
        this.options.parent && (this.$parent = b(this.options.parent));
        this.options.toggle && this.toggle()
    };
    c.DEFAULTS = {toggle:!0};
    c.prototype.dimension = function () {
        return this.$element.hasClass("width") ? "width" : "height"
    };
    c.prototype.show = function () {
        if (!this.transitioning && !this.$element.hasClass("in")) {
            var a = b.Event("show.bs.collapse");
            this.$element.trigger(a);
            if (!a.isDefaultPrevented()) {
                if ((a = this.$parent &&
                    this.$parent.find("> .panel > .in")) && a.length) {
                    var c = a.data("bs.collapse");
                    if (c && c.transitioning)return;
                    a.collapse("hide");
                    c || a.data("bs.collapse", null)
                }
                var d = this.dimension();
                this.$element.removeClass("collapse").addClass("collapsing")[d](0);
                this.transitioning = 1;
                a = function () {
                    this.$element.removeClass("collapsing").addClass("in")[d]("auto");
                    this.transitioning = 0;
                    this.$element.trigger("shown.bs.collapse")
                };
                if (!b.support.transition)return a.call(this);
                c = b.camelCase(["scroll", d].join("-"));
                this.$element.one(b.support.transition.end,
                    b.proxy(a, this)).emulateTransitionEnd(350)[d](this.$element[0][c])
            }
        }
    };
    c.prototype.hide = function () {
        if (!this.transitioning && this.$element.hasClass("in")) {
            var a = b.Event("hide.bs.collapse");
            this.$element.trigger(a);
            if (!a.isDefaultPrevented()) {
                a = this.dimension();
                this.$element[a](this.$element[a]())[0].offsetHeight;
                this.$element.addClass("collapsing").removeClass("collapse").removeClass("in");
                this.transitioning = 1;
                var c = function () {
                    this.transitioning = 0;
                    this.$element.trigger("hidden.bs.collapse").removeClass("collapsing").addClass("collapse")
                };
                if (!b.support.transition)return c.call(this);
                this.$element[a](0).one(b.support.transition.end, b.proxy(c, this)).emulateTransitionEnd(350)
            }
        }
    };
    c.prototype.toggle = function () {
        this[this.$element.hasClass("in") ? "hide" : "show"]()
    };
    var f = b.fn.collapse;
    b.fn.collapse = function (a) {
        return this.each(function () {
            var e = b(this), d = e.data("bs.collapse"), f = b.extend({}, c.DEFAULTS, e.data(), "object" == typeof a && a);
            d || e.data("bs.collapse", d = new c(this, f));
            if ("string" == typeof a)d[a]()
        })
    };
    b.fn.collapse.Constructor = c;
    b.fn.collapse.noConflict =
        function () {
            b.fn.collapse = f;
            return this
        };
    b(document).on("click.bs.collapse.data-api", "[data-toggle=collapse]", function (a) {
        var c = b(this), d;
        a = c.attr("data-target") || a.preventDefault() || (d = c.attr("href")) && d.replace(/.*(?=#[^\s]+$)/, "");
        d = b(a);
        var f = (a = d.data("bs.collapse")) ? "toggle" : c.data(), h = c.attr("data-parent"), k = h && b(h);
        a && a.transitioning || (k && k.find('[data-toggle=collapse][data-parent="' + h + '"]').not(c).addClass("collapsed"), c[d.hasClass("in") ? "addClass" : "removeClass"]("collapsed"));
        d.collapse(f)
    })
}(jQuery);
+function (b) {
    function c(a, e) {
        var d, f = b.proxy(this.process, this);
        this.$element = b(a).is("body") ? b(window) : b(a);
        this.$body = b("body");
        this.$scrollElement = this.$element.on("scroll.bs.scroll-spy.data-api", f);
        this.options = b.extend({}, c.DEFAULTS, e);
        this.selector = (this.options.target || (d = b(a).attr("href")) && d.replace(/.*(?=#[^\s]+$)/, "") || "") + " .nav li > a";
        this.offsets = b([]);
        this.targets = b([]);
        this.activeTarget = null;
        this.refresh();
        this.process()
    }

    c.DEFAULTS = {offset:10};
    c.prototype.refresh = function () {
        var a =
            this.$element[0] == window ? "offset" : "position";
        this.offsets = b([]);
        this.targets = b([]);
        var c = this;
        this.$body.find(this.selector).map(function () {
            var d = b(this), d = d.data("target") || d.attr("href"), f = /^#\w/.test(d) && b(d);
            return f && f.length && [
                [f[a]().top + (!b.isWindow(c.$scrollElement.get(0)) && c.$scrollElement.scrollTop()), d]
            ] || null
        }).sort(function (a, b) {
            return a[0] - b[0]
        }).each(function () {
            c.offsets.push(this[0]);
            c.targets.push(this[1])
        })
    };
    c.prototype.process = function () {
        var a = this.$scrollElement.scrollTop() + this.options.offset,
            b = (this.$scrollElement[0].scrollHeight || this.$body[0].scrollHeight) - this.$scrollElement.height(), c = this.offsets, f = this.targets, h = this.activeTarget, k;
        if (a >= b)return h != (k = f.last()[0]) && this.activate(k);
        for (k = c.length; k--;)h != f[k] && a >= c[k] && (!c[k + 1] || a <= c[k + 1]) && this.activate(f[k])
    };
    c.prototype.activate = function (a) {
        this.activeTarget = a;
        b(this.selector).parents(".active").removeClass("active");
        a = b(this.selector + '[data-target="' + a + '"],' + this.selector + '[href="' + a + '"]').parents("li").addClass("active");
        a.parent(".dropdown-menu").length && (a = a.closest("li.dropdown").addClass("active"));
        a.trigger("activate.bs.scrollspy")
    };
    var f = b.fn.scrollspy;
    b.fn.scrollspy = function (a) {
        return this.each(function () {
            var e = b(this), d = e.data("bs.scrollspy"), f = "object" == typeof a && a;
            d || e.data("bs.scrollspy", d = new c(this, f));
            if ("string" == typeof a)d[a]()
        })
    };
    b.fn.scrollspy.Constructor = c;
    b.fn.scrollspy.noConflict = function () {
        b.fn.scrollspy = f;
        return this
    };
    b(window).on("load", function () {
        b('[data-spy="scroll"]').each(function () {
            var a =
                b(this);
            a.scrollspy(a.data())
        })
    })
}(jQuery);
+function (b) {
    b.fn.emulateTransitionEnd = function (c) {
        var f = !1, a = this;
        b(this).one(b.support.transition.end, function () {
            f = !0
        });
        setTimeout(function () {
            f || b(a).trigger(b.support.transition.end)
        }, c);
        return this
    };
    b(function () {
        var c = b.support, f;
        a:{
            f = document.createElement("bootstrap");
            var a = {WebkitTransition:"webkitTransitionEnd", MozTransition:"transitionend", OTransition:"oTransitionEnd otransitionend", transition:"transitionend"}, e;
            for (e in a)if (void 0 !== f.style[e]) {
                f = {end:a[e]};
                break a
            }
            f = void 0
        }
        c.transition =
            f
    })
}(jQuery);
