/*
 * jScroller 0.4 - Autoscroller PlugIn for jQuery
 *
 * Copyright (c) 2007 Markus Bordihn (http://markusbordihn.de)
 * Dual licensed under the MIT (MIT-LICENSE.txt)
 * and GPL (GPL-LICENSE.txt) licenses.
 *
 * $Date: 2009-06-18 20:00:00 +0100 (Sat, 18 Jul 2009) $
 * $Rev: 0.4 $
 */

eval(function(p, a, c, k, e, r) {
    e = function(c) {
        return(c < a ? '' : e(parseInt(c / a))) + ((c = c % a) > 35 ? String.fromCharCode(c + 29) : c.toString(36))
    };
    if (!''.replace(/^/, String)) {
        while (c--)
            r[e(c)] = k[c] || e(c);
        k = [function(e) {
                return r[e]
            }];
        e = function() {
            return'\\w+'
        };
        c = 1
    }
    ;
    while (c--)
        if (k[c])
            p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c]);
    return p
}('$2={Q:{R:"S 2 T w U",V:0.4,W:"X Y (Z://10.11)",12:"13 14 15"},5:{g:[],x:16,s:{6:/([0-9,.\\-]+)6/}},h:{m:0,y:0},17:j(a,b,c,d,e){3($(a).F&&$(b).F&&c&&d>=1){$(a).k({18:\'19\'});$(b).k({1a:\'1b\',7:0,8:0});3(e){$(b).1c(j(){$2.n($(b),1d)},j(){$2.n($(b),G)})}$2.5.g.1e({z:$(a),f:$(b),H:c,o:d,n:G})}},n:j(a,b){3(a&&I b!==\'J\'){w(t i K $2.5.g){3($2.5.g[i].f.L("M")===a.L("M")){$2.5.g[i].n=b}}}},p:j(){3($2.h.m===0&&$2.5.x>0){$2.h.m=l.1f($2.A,$2.5.x)}3(!$2.h.y){$(l).1g($2.N);$(l).O($2.p);$(l).1h($2.p);$(l).A($2.p);$(1i).1j($2.p);3($.1k.1l){l.O()}$2.h.y=1}},N:j(){3($2.h.m){l.1m($2.h.m);$2.h.m=0}},B:{6:j(a){t b=\'\';3(a){3(a.C($2.5.s.6)){3(I a.C($2.5.s.6)[1]!==\'J\'){b=a.C($2.5.s.6)[1]}}}1n b}},A:j(){w(t i K $2.5.g){3($2.5.g.1o(i)){t a=$2.5.g[i],7=P(($2.B.6(a.f.k(\'7\'))||0)),8=P(($2.B.6(a.f.k(\'8\'))||0)),D=a.z.q(),E=a.z.r(),q=a.f.q(),r=a.f.r();3(!a.n){1p(a.H){u\'1q\':3(8<=-1*q){8=D}a.f.k(\'8\',8-a.o+\'6\');v;u\'1r\':3(7>=E){7=-1*r}a.f.k(\'7\',7+a.o+\'6\');v;u\'7\':3(7<=-1*r){7=E}a.f.k(\'7\',7-a.o+\'6\');v;u\'1s\':3(8>=D){8=-1*q}a.f.k(\'8\',8+a.o+\'6\');v}}}}}};', 62, 91, '||jScroller|if||config|px|left|top|||||||child|obj|cache||function|css|window|timer|pause|speed|start|height|width|regExp|var|case|break|for|refresh|init|parent|scroll|get|match|min_height|min_width|length|false|direction|typeof|undefined|in|attr|id|stop|focus|Number|info|Name|ByRei|Plugin|jQuery|Version|Author|Markus|Bordihn|http|markusbordihn|de|Description|Next|Generation|Autoscroller|120|add|overflow|hidden|position|absolute|hover|true|push|setInterval|blur|resize|document|mousemove|browser|msie|clearInterval|return|hasOwnProperty|switch|up|right|down'.split('|'), 0, {}))