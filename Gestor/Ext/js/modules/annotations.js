(function(f, A) {
    function k(a) {
        return typeof a === "number"
    }
    function l(a) {
        return a !== B && a !== null
    }
    var B, n, o, w = f.Chart, r = f.extend, x = f.each, y;
    y = {xAxis: 0, yAxis: 0, title: {style: {}, text: "", x: 0, y: 0}, shape: {params: {stroke: "#000000", fill: "transparent", strokeWidth: 2}}};
    o = ["path", "rect", "circle"];
    n = {top: 0, left: 0, center: 0.5, middle: 0.5, bottom: 1, right: 1};
    var s = A.inArray, C = f.merge, z = function() {
        this.init.apply(this, arguments)
    };
    z.prototype = {init: function(a, d) {
            this.chart = a;
            this.options = C({}, y, d)
        }, render: function(a) {
            var d =
                    this.chart, c = this.chart.renderer, b = this.group, m = this.title, e = this.shape, g = this.options, f = g.title, i = g.shape;
            if (!b)
                b = this.group = c.g();
            if (!m && f)
                m = this.title = c.label(f), m.add(b);
            if (!e && i && s(i.type, o) !== -1)
                e = this.shape = c[g.shape.type](i.params), e.add(b);
            b.add(d.annotations.group);
            this.linkObjects();
            a !== !1 && this.redraw()
        }, redraw: function() {
            var a = this.options, d = this.chart, c = this.group, b = this.title, m = this.shape, e = this.linkedObject, g = d.xAxis[a.xAxis], o = d.yAxis[a.yAxis], i = a.width, t = a.height, u = n[a.anchorY],
                    v = n[a.anchorX], h, q, j, p;
            if (e)
                h = e instanceof f.Point ? "point" : e instanceof f.Series ? "series" : null, h === "point" ? (a.xValue = e.x, a.yValue = e.y, q = e.series) : h === "series" && (q = e), c.visibility !== q.group.visibility && c.attr({visibility: q.group.visibility});
            e = (l(a.xValue) ? g.toPixels(a.xValue + g.minPointOffset) : a.x) - g.minPixelPadding;
            h = l(a.yValue) ? o.toPixels(a.yValue) : a.y;
            if (!isNaN(e) && !isNaN(h) && k(e) && k(h)) {
                b && (b.attr(a.title), b.css(a.title.style));
                if (m) {
                    b = r({}, a.shape.params);
                    if (a.units === "values") {
                        for (j in b)
                            s(j,
                                    ["width", "x"]) > -1 ? b[j] = g.translate(b[j]) : s(j, ["height", "y"]) > -1 && (b[j] = o.translate(b[j]));
                        b.width && (b.width -= g.toPixels(0) - g.left);
                        b.x && (b.x += g.minPixelPadding)
                    }
                    m.attr(b)
                }
                c.bBox = null;
                if (!k(i))
                    p = c.getBBox(), i = p.width;
                if (!k(t))
                    p || (p = c.getBBox()), t = p.height;
                if (!k(v))
                    v = n.center;
                if (!k(u))
                    u = n.center;
                e -= i * v;
                h -= t * u;
                d.animation && l(c.translateX) && l(c.translateY) ? c.animate({translateX: e, translateY: h}) : c.translate(e, h)
            }
        }, destroy: function() {
            var a = this, d = this.chart.annotations.allItems, c = d.indexOf(a);
            c > -1 && d.splice(c,
                    1);
            x(["title", "shape", "group"], function(b) {
                a[b] && (a[b].destroy(), a[b] = null)
            });
            a.group = a.title = a.shape = a.chart = a.options = null
        }, update: function(a, d) {
            r(this.options, a);
            this.linkObjects();
            this.render(d)
        }, linkObjects: function() {
            var a = this.chart, d = this.linkedObject, c = d && (d.id || d.options.id), b = this.options.linkedTo;
            if (l(b)) {
                if (!l(d) || b !== c)
                    this.linkedObject = a.get(b)
            } else
                this.linkedObject = null
        }};
    r(w.prototype, {annotations: {add: function(a, d) {
                var c = this.allItems, b = this.chart, f, e;
                Object.prototype.toString.call(a) ===
                        "[object Array]" || (a = [a]);
                for (e = a.length; e--; )
                    f = new z(b, a[e]), c.push(f), f.render(d)
            }, redraw: function() {
                x(this.allItems, function(a) {
                    a.redraw()
                })
            }}});
    w.prototype.callbacks.push(function(a) {
        var d = a.options.annotations, c;
        c = a.renderer.g("annotations");
        c.attr({zIndex: 7});
        c.add();
        a.annotations.allItems = [];
        a.annotations.chart = a;
        a.annotations.group = c;
        Object.prototype.toString.call(d) === "[object Array]" && d.length > 0 && a.annotations.add(a.options.annotations);
        f.addEvent(a, "redraw", function() {
            a.annotations.redraw()
        })
    })
})(Highcharts,
        HighchartsAdapter);
