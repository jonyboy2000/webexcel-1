(function(){var k=void 0,aa=encodeURIComponent,m=window,o=String,p=Math,ba="push",ca="cookie",q="charAt",r="indexOf",t="gaGlobal",da="getTime",v="toString",w="window",x="length",y="document",z="split",A="location",ea="protocol",fa="href",C="substring",D="join",E="toLowerCase";var ga="_gat",ha="_gaq",ia="4.9.2",ja="_gaUserPrefs",ka="ioo",F="&",H="=",I="__utma=",la="__utmb=",ma="__utmc=",na="__utmk=",J="__utmv=",K="__utmz=",oa="__utmx=",pa="GASO=";var qa=function(){var c=this,f=[],b="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_";c.set=function(b){f[b]=!0};c.Kc=function(){for(var c=[],e=0;e<f[x];e++)f[e]&&(c[p.floor(e/6)]^=1<<e%6);for(e=0;e<c[x];e++)c[e]=b[q](c[e]||0);return c[D]("")+"~"}},ra=new qa;function L(c){ra.set(c)};var sa=function(c,f){var b=this;b.window=c;b.document=f;b.setTimeout=function(b,e){setTimeout(b,e)};b.Kb=function(b){return navigator.userAgent[r](b)>=0};b.Uc=function(){return b.Kb("Firefox")&&![].reduce};b.mb=function(c){if(!c||!b.Kb("Firefox"))return c;for(var c=c.replace(/\n|\r/g," "),e=0,f=c[x];e<f;++e){var g=c.charCodeAt(e)&255;if(g==10||g==13)c=c[C](0,e)+"?"+c[C](e+1)}return c}},M=new sa(m,document);var ta=function(c){return function(f,b,i){c[f]=function(){L(b);return i.apply(c,arguments)};return i}},ua=function(c,f,b,i){c.addEventListener?c.addEventListener(f,b,!!i):c.attachEvent&&c.attachEvent("on"+f,b)},va=function(c){return Object.prototype[v].call(Object(c))=="[object Array]"},O=function(c){return k==c||"-"==c||""==c},P=function(c,f,b){var i="-",e;!O(c)&&!O(f)&&!O(b)&&(e=c[r](f),e>-1&&(b=c[r](b,e),b<0&&(b=c[x]),i=c[C](e+f[r](H)+1,b)));return i},wa=function(c){var f=!1,b=0,i,e;if(!O(c)){f=
!0;for(i=0;i<c[x];i++)e=c[q](i),b+="."==e?1:0,f=f&&b<=1&&(0==i&&"-"==e||".0123456789"[r](e)>-1)}return f},Q=function(c,f){var b=aa;return b instanceof Function?f?encodeURI(c):b(c):(L(68),escape(c))},za=function(c,f){var b=decodeURIComponent,i,c=c[z]("+")[D](" ");if(b instanceof Function)try{i=f?decodeURI(c):b(c)}catch(e){L(17),i=unescape(c)}else L(68),i=unescape(c);return i},R=function(c,f){return c[r](f)>-1};
function Aa(c){if(!c||""==c)return"";for(;c[q](0)[x]>0&&" \n\r\t"[r](c[q](0))>-1;)c=c[C](1);for(;c[q](c[x]-1)[x]>0&&" \n\r\t"[r](c[q](c[x]-1))>-1;)c=c[C](0,c[x]-1);return c}var T=function(c,f){c[ba]||L(94);c[c[x]]=f},Ba=function(c){var f=1,b=0,i;if(!O(c)){f=0;for(i=c[x]-1;i>=0;i--)b=c.charCodeAt(i),f=(f<<6&268435455)+b+(b<<14),b=f&266338304,f=b!=0?f^b>>21:f}return f},Ca=function(){return p.round(p.random()*2147483647)},Da=function(){};var Ea=function(c,f){this.fb=c;this.gb=f},Fa=function(){function c(b){for(var c=[],b=b[z](","),e,f=0;f<b[x];f++)e=b[f][z](":"),c[ba](new Ea(e[0],e[1]));return c}var f=this;f.Aa="utm_campaign";f.Ba="utm_content";f.Ca="utm_id";f.Da="utm_medium";f.Ea="utm_nooverride";f.Fa="utm_source";f.Ga="utm_term";f.Ha="gclid";f.U=0;f.w=0;f.Ja=15768E6;f.Ka=18E5;f.s=63072E6;f.V=[];f.W=[];f.qc="cse";f.rc="q";f.Ra=50;f.J=c("daum:q,eniro:search_word,naver:query,pchome:q,images.google:q,google:q,yahoo:p,yahoo:q,msn:q,bing:q,aol:query,aol:encquery,aol:q,lycos:query,ask:q,altavista:q,netscape:query,cnn:query,about:terms,mamma:q,alltheweb:q,voila:rdata,virgilio:qs,live:q,baidu:wd,alice:qs,yandex:text,najdi:q,mama:query,seznam:q,search:q,wp:szukaj,onet:qt,szukacz:q,yam:k,kvasir:q,sesam:q,ozu:q,terra:query,mynet:q,ekolay:q,rambler:query,rambler:words");
f.f="/";f.L=100;f.ha="/__utm.gif";f.ka=1;f.la=1;f.u="|";f.ja=1;f.Ia=1;f.Ta=1;f.b="auto";f.A=1;f.Yb=10;f.tc=10;f.uc=0.2;f.o=k};var Ga=function(c){function f(a,d,b,j){var h="",c=0,h=P(a,"2"+d,";");if(!O(h)){a=h[r]("^"+b+".");if(a<0)return["",0];h=h[C](a+b[x]+2);h[r]("^")>0&&(h=h[z]("^")[0]);b=h[z](":");h=b[1];c=parseInt(b[0],10);!j&&c<e.m&&(h="")}O(h)&&(h="");return[h,c]}function b(a,d){return"^"+[[d,a[1]][D]("."),a[0]][D](":")}function i(a){var d=new Date,a=new Date(d[da]()+a);return"expires="+a.toGMTString()+"; "}var e=this,l=c;e.m=(new Date)[da]();var g=[I,la,ma,K,J,oa,pa];e.g=function(){var a=M[y][ca];return l.o?e.Fc(a,
l.o):a};e.Fc=function(a,d){for(var b=[],j,h=0;h<g[x];h++)j=f(a,g[h],d)[0],O(j)||(b[b[x]]=g[h]+j+";");return b[D]("")};e.l=function(a,d,b){var j=b>0?i(b):"";l.o&&(d=e.Gc(M[y][ca],a,l.o,d,b),a="2"+a,j=b>0?i(l.s):"");a+=d;a=M.mb(a);a[x]>2E3&&(L(69),a=a[C](0,2E3));j=a+"; path="+l.f+"; "+j+e.eb();M[y].cookie=j};e.Gc=function(a,d,c,j,h){var g="",h=h||l.s,j=b([j,e.m+h*1],c),g=P(a,"2"+d,";");if(!O(g))return a=b(f(a,d,c,!0),c),g=g[z](a)[D](""),g=j+g;return j};e.eb=function(){return O(l.b)?"":"domain="+l.b+
";"}};var Ha=function(c){function f(a){a=va(a)?a[D]("."):"";return O(a)?"-":a}function b(a,n){var d=[],b;if(!O(a)&&(d=a[z]("."),n))for(b=0;b<d[x];b++)wa(d[b])||(d[b]="-");return d}function i(a,d,n){var b=h.I,j,c;for(j=0;j<b[x];j++)c=b[j][0],c+=O(d)?d:d+b[j][4],b[j][2](P(a,c,n))}var e,l,g,a,d,u,j,h=this,s,n=c;h.i=new Ga(c);h.za=function(){return k==s||s==h.K()};h.g=function(){return h.i.g()};h.ea=function(){return d?d:"-"};h.Na=function(a){d=a};h.fa=function(a){s=wa(a)?a*1:"-"};h.da=function(){return f(u)};
h.X=function(a){u=b(a)};h.sc=function(){h.i.l(J,"",-1)};h.Nb=function(){return s?s:"-"};h.eb=function(){return O(n.b)?"":"domain="+n.b+";"};h.ba=function(){return f(e)};h.La=function(a){e=b(a,1)};h.z=function(){return f(l)};h.$=function(a){l=b(a,1)};h.ca=function(){return f(g)};h.Ma=function(a){g=b(a,1)};h.qa=function(){return f(a)};h.ab=function(d){a=b(d);for(d=0;d<a[x];d++)d<4&&!wa(a[d])&&(a[d]="-")};h.zc=function(){return j};h.xc=function(a){j=a};h.Mb=function(){e=[];l=[];g=[];a=[];d=k;u=[];s=
k};h.K=function(){for(var a="",d=0;d<h.I[x];d++)a+=h.I[d][1]();return Ba(a)};h.Z=function(a){var d=h.g(),n=!1;d&&(i(d,a,";"),h.fa(o(h.K())),n=!0);return n};h.Ob=function(a){i(a,"",F);h.fa(P(a,na,F))};h.Pb=function(){var a=h.I,d=[],n;for(n=0;n<a[x];n++)T(d,a[n][0]+a[n][1]());T(d,na+h.K());return d[D](F)};h.Qb=function(a,d){var b=h.I,j=n.f;h.Z(a);n.f=d;for(var c=0;c<b[x];c++)if(!O(b[c][1]()))b[c][3]();n.f=j};h.Oa=function(){h.i.l(I,h.ba(),n.s)};h.aa=function(){h.i.l(la,h.z(),n.Ka)};h.Pa=function(){h.i.l(ma,
h.ca(),0)};h.ra=function(){h.i.l(K,h.qa(),n.Ja)};h.Qa=function(){h.i.l(oa,h.ea(),n.s)};h.Y=function(){h.i.l(J,h.da(),n.s)};h.yc=function(){h.i.l(pa,h.zc(),0)};h.I=[[I,h.ba,h.La,h.Oa,"."],[la,h.z,h.$,h.aa,""],[ma,h.ca,h.Ma,h.Pa,""],[oa,h.ea,h.Na,h.Qa,""],[K,h.qa,h.ab,h.ra,"."],[J,h.da,h.X,h.Y,"."]]};var Ia="https:"==M[y][A][ea]?"https://ssl.google-analytics.com/":"http://www.google-analytics.com/",Ja=Ia+"p/__utm.gif",La=function(){var c=this;c.xb=function(f,b,i,e,l){b[x]<=2036||l?c.ya(f+"?"+b,e):b[x]<=8192?M.Uc()?c.ya(f+"?"+i+"&err=ff2post&len="+b[x],e):c.Xc(b,e):c.ya(f+"?"+i+"&err=len&max=8192&len="+b[x],e)};c.ya=function(c,b){var i=new Image(1,1);i.src=c;i.onload=function(){i.onload=null;(b||Da)()}};c.Xc=function(f,b){c.Wc(f,b)||c.Jb(f,b)};c.Wc=function(c,b){var i,e=M[w].XDomainRequest;if(e)i=
new e,i.open("POST",Ja);else if(e=M[w].XMLHttpRequest)e=new e,"withCredentials"in e&&(i=e,i.open("POST",Ja,!0),i.setRequestHeader("Content-Type","text/plain"));if(i)return i.onreadystatechange=function(){i.readyState==4&&(b&&b(),i=null)},i.send(c),!0;return!1};c.Jb=function(f,b){var i=M[y];if(i.body){f=aa(f);try{var e=i.createElement('<iframe name="'+f+'"></iframe>')}catch(l){e=i.createElement("iframe"),e.name=f}e.height="0";e.width="0";e.style.display="none";e.style.visibility="hidden";var g=i[A],
g=g[ea]+"//"+g.host+"/favicon.ico",g=Ia+"u/post_iframe.html#"+aa(g),a=function(){e.src="";e.parentNode&&e.parentNode.removeChild(e)};ua(M[w],"beforeunload",a);var d=!1,u=0,j=function(){if(!d){try{if(u>9||e.contentWindow[A].host==i[A].host){d=!0;a();var c=M[w],g="beforeunload",n=a;c.removeEventListener?c.removeEventListener(g,n,!1):c.detachEvent&&c.detachEvent("on"+g,n);b&&b();return}}catch(f){}u++;M.setTimeout(j,200)}};ua(e,"load",j);i.body.appendChild(e);e.src=g}else M.setTimeout(function(){c.Jb(f,
b)},100)}};var Ma=function(c){var f=this,b=c,i=new Ha(b),e=new La,l=!V.Ec(),g=function(){};f.Mc=function(){return"https:"==M[y][A][ea]?"https://ssl.google-analytics.com/__utm.gif":"http://www.google-analytics.com/__utm.gif"};f.B=function(a,d,c,j,h,s){var n=b.A,N=M[y][A];i.Z(c);var B=i.z()[z](".");if(B[1]<500||j){if(h){var S=(new Date)[da](),Y;Y=(S-B[3])*(b.uc/1E3);Y>=1&&(B[2]=p.min(p.floor(B[2]*1+Y),b.tc),B[3]=S)}if(j||!h||B[2]>=1){!j&&h&&(B[2]=B[2]*1-1);j=B[1]*1+1;B[1]=j;h="utmwv="+ia;S="&utms="+j;Y="&utmn="+
Ca();j=h+"e"+S+Y;a=h+S+Y+(O(N.hostname)?"":"&utmhn="+Q(N.hostname))+(b.L==100?"":"&utmsp="+Q(b.L))+a;if(0==n||2==n)N=2==n?g:s||g,l&&e.xb(b.ha,a,j,N,!0);if(1==n||2==n)d="&utmac="+d,j+=d,a+=d+"&utmcc="+f.Lc(c),V.wb&&(c="&aip=1",j+=c,a+=c),a+="&utmu="+ra.Kc(),l&&e.xb(f.Mc(),a,j,s)}}i.$(B[D]("."));i.aa()};f.Lc=function(a){for(var d=[],b=[I,K,J,oa],c=i.g(),h,g=0;g<b[x];g++)if(h=P(c,b[g]+a,";"),!O(h)){if(b[g]==J){h=h[z](a+".")[1][z]("|")[0];if(O(h))continue;h=a+"."+h}T(d,b[g]+h+";")}return Q(d[D]("+"))}};var W=function(){var c=this;c.N=[];c.Sa=function(f){for(var b,i=c.N,e=0;e<i[x];e++)b=f==i[e].q?i[e]:b;return b};c.Sb=function(f,b,i,e,l,g,a,d){var u=c.Sa(f);k==u?(u=new W.Nc(f,b,i,e,l,g,a,d),T(c.N,u)):(u.nb=b,u.tb=i,u.sb=e,u.qb=l,u.ob=g,u.rb=a,u.pb=d);return u}};W.Ic=function(c,f,b,i,e,l){var g=this;g.Bb=c;g.ua=f;g.n=b;g.yb=i;g.zb=e;g.Ab=l;g.ga=function(){return"&"+["utmt=item","tid="+Q(g.Bb),"ipc="+Q(g.ua),"ipn="+Q(g.n),"iva="+Q(g.yb),"ipr="+Q(g.zb),"iqt="+Q(g.Ab)][D]("&utm")}};
W.Nc=function(c,f,b,i,e,l,g,a){var d=this;d.q=c;d.nb=f;d.tb=b;d.sb=i;d.qb=e;d.ob=l;d.rb=g;d.pb=a;d.M=[];d.Rb=function(a,b,c,g,n){var e=d.Jc(a),f=d.q;k==e?T(d.M,new W.Ic(f,a,b,c,g,n)):(e.Bb=f,e.ua=a,e.n=b,e.yb=c,e.zb=g,e.Ab=n)};d.Jc=function(a){for(var b,c=d.M,g=0;g<c[x];g++)b=a==c[g].ua?c[g]:b;return b};d.ga=function(){return"&"+["utmt=tran","id="+Q(d.q),"st="+Q(d.nb),"to="+Q(d.tb),"tx="+Q(d.sb),"sp="+Q(d.qb),"ci="+Q(d.ob),"rg="+Q(d.rb),"co="+Q(d.pb)][D]("&utmt")}};var Na=function(c){function f(){var b,a,d;a="ShockwaveFlash";var c="$version",j=M[w].navigator;if((j=j?j.plugins:k)&&j[x]>0)for(b=0;b<j[x]&&!d;b++)a=j[b],R(a.name,"Shockwave Flash")&&(d=a.description[z]("Shockwave Flash ")[1]);else{a=a+"."+a;try{b=new ActiveXObject(a+".7"),d=b.GetVariable(c)}catch(e){}if(!d)try{b=new ActiveXObject(a+".6"),d="WIN 6,0,21,0",b.le="always",d=b.GetVariable(c)}catch(f){}if(!d)try{b=new ActiveXObject(a),d=b.GetVariable(c)}catch(n){}d&&(d=d[z](" ")[1][z](","),d=d[0]+"."+
d[1]+" r"+d[2])}return d?d:i}var b=this,i="-",e=M[w].screen,l=M[w].navigator;b.Hb=e?e.width+"x"+e.height:i;b.Gb=e?e.colorDepth+"-bit":i;b.Sc=Q(M[y].characterSet?M[y].characterSet:M[y].charset?M[y].charset:i);b.Fb=(l&&l.language?l.language:l&&l.browserLanguage?l.browserLanguage:i)[E]();b.Eb=l&&l.javaEnabled()?1:0;b.Tc=c?f():i;b.$b=function(){return F+"utm"+["cs="+Q(b.Sc),"sr="+b.Hb,"sc="+b.Gb,"ul="+b.Fb,"je="+b.Eb,"fl="+Q(b.Tc)][D]("&utm")};b.Zb=function(){for(var c=M[w].navigator,a=M[w].history[x],
c=c.appName+c.version+b.Fb+c.platform+c.userAgent+b.Eb+b.Hb+b.Gb+(M[y][ca]?M[y][ca]:"")+(M[y].referrer?M[y].referrer:""),d=c[x];a>0;)c+=a--^d++;return Ba(c)}};var X=function(c,f,b,i){function e(a){var d="",d=a[z]("://")[1][E]();R(d,"/")&&(d=d[z]("/")[0]);return d}var l=i,g=this;g.a=c;g.lb=f;g.m=b;g.jb=function(a){var d=g.ta();return new X.v(P(a,l.Ca+H,F),P(a,l.Fa+H,F),P(a,l.Ha+H,F),g.R(a,l.Aa,"(not set)"),g.R(a,l.Da,"(not set)"),g.R(a,l.Ga,d&&!O(d.G)?za(d.G):k),g.R(a,l.Ba,k))};g.kb=function(a){var d=e(a),b;b=a;var c="";b=b[z]("://")[1][E]();R(b,"/")&&(b=b[z]("/")[1],R(b,"?")&&(c=b[z]("?")[0]));b=c;if(R(d,"google")&&(a=a[z]("?")[D](F),R(a,F+l.rc+H)&&b==
l.qc))return!0;return!1};g.ta=function(){var a,d=g.lb,b,c=l.J;if(!O(d)&&"0"!=d&&R(d,"://")&&!g.kb(d)){a=e(d);for(var h=0;h<c[x];h++)if(b=c[h],R(a,b.fb[E]())&&(d=d[z]("?")[D](F),R(d,F+b.gb+H)))return a=d[z](F+b.gb+H)[1],R(a,F)&&(a=a[z](F)[0]),new X.v(k,b.fb,k,"(organic)","organic",a,k)}};g.R=function(a,d,b){a=P(a,d+H,F);return b=!O(a)?za(a):!O(b)?b:"-"};g.vc=function(a){var d=l.V,b=!1;if(a&&"organic"==a.P)for(var a=za(a.G)[E](),c=0;c<d[x];c++)b=b||d[c][E]()==a;return b};g.ib=function(){var a="",d=
"",a=g.lb;if(!O(a)&&"0"!=a&&R(a,"://")&&!g.kb(a))return a=a[z]("://")[1],R(a,"/")&&(d=a[C](a[r]("/")),d=d[z]("?")[0],a=a[z]("/")[0][E]()),0==a[r]("www.")&&(a=a[C](4)),new X.v(k,a,k,"(referral)","referral",k,d)};g.hb=function(a){var d="";l.U&&(d=a&&a.hash?a[fa][C](a[fa][r]("#")):"",d=""!=d?d+F:d);d+=a.search;return d};g.sa=function(){return new X.v(k,"(direct)",k,"(direct)","(none)",k,k)};g.wc=function(a){var d=!1,b=l.W;if(a&&"referral"==a.P)for(var a=Q(a.Q)[E](),c=0;c<b[x];c++)d=d||R(a,b[c][E]());
return d};g.h=function(a){return k!=a&&a.bb()};g.ke=function(a){var a=P(a,K+g.a+".",";"),d=a[z]("."),a=new X.v;a.cb(d.slice(4)[D]("."));if(!g.h(a))return!0;d=M[y][A];d=g.hb(d);d=g.jb(d);g.h(d)||(d=g.ta(),g.h(d)||(d=g.ib()));return g.h(d)&&a.H()[E]()!=d.H()[E]()};g.Lb=function(a,d){if(l.Ia){var b="",c="-",e,f=0,n,i,B=g.a;if(a){i=a.g();b=g.hb(M[y][A]);if(l.w&&a.za()&&(c=a.qa(),!O(c)&&!R(c,";"))){a.ra();return}c=P(i,K+B+".",";");e=g.jb(b);if(g.h(e)&&(b=P(b,l.Ea+H,F),"1"==b&&!O(c)))return;if(!g.h(e)){e=
g.ta();b=g.vc(e);if(!O(c)&&b)return;b&&(e=g.sa())}if(!g.h(e)&&d){e=g.ib();b=g.wc(e);if(!O(c)&&b)return;b&&(e=g.sa())}g.h(e)||O(c)&&d&&(e=g.sa());if(g.h(e)&&(O(c)||(f=c[z]("."),n=new X.v,n.cb(f.slice(4)[D](".")),n=n.H()[E]()==e.H()[E](),f=f[3]*1),!n||d))i=P(i,I+B+".",";"),n=i.lastIndexOf("."),i=n>9?i[C](n+1)*1:0,f++,i=0==i?1:i,a.ab([B,g.m,i,f,e.H()][D](".")),a.ra()}}}};
X.v=function(c,f,b,i,e,l,g){var a=this;a.q=c;a.Q=f;a.wa=b;a.n=i;a.P=e;a.G=l;a.Cb=g;a.H=function(){var b=[],c=[["cid",a.q],["csr",a.Q],["gclid",a.wa],["ccn",a.n],["cmd",a.P],["ctr",a.G],["cct",a.Cb]],e,g;if(a.bb())for(e=0;e<c[x];e++)O(c[e][1])||(g=c[e][1][z]("+")[D]("%20"),g=g[z](" ")[D]("%20"),T(b,"utm"+c[e][0]+H+g));return M.mb(b[D]("|"))};a.bb=function(){return!(O(a.q)&&O(a.Q)&&O(a.wa))};a.cb=function(b){var c=function(a){return za(P(b,"utm"+a+H,"|"))};a.q=c("cid");a.Q=c("csr");a.wa=c("gclid");
a.n=c("ccn");a.P=c("cmd");a.G=c("ctr");a.Cb=c("cct")}};var Oa=function(c,f,b,i){var e=this,l=f,g=H,a=c,d=i;e.S=b;e.va="";e.r={};e.Vb=function(){var a;a=P(e.S.g(),J+l+".",";")[z](l+".")[1];if(!O(a)){a=a[z]("|");var b=e.r,d=a[1],c;if(!O(d))for(var d=d[z](","),n=0;n<d[x];n++)c=d[n],O(c)||(c=c[z](g),c[x]==4&&(b[c[0]]=[c[1],c[2],1]));e.va=a[0];e.T()}};e.T=function(){e.Hc();var a=e.va,b,d,c="";for(b in e.r)(d=e.r[b])&&1===d[2]&&(c+=b+g+d[0]+g+d[1]+g+1+",");O(c)||(a+="|"+c);O(a)?e.S.sc():(e.S.X(l+"."+a),e.S.Y())};e.Xb=function(a){e.va=a;e.T()};e.Wb=function(b,
d,c,g){1!=g&&2!=g&&3!=g&&(g=3);var n=!1;d&&c&&b>0&&b<=a.Ra&&(d=Q(d),c=Q(c),d[x]+c[x]<=64&&(e.r[b]=[d,c,g],e.T(),n=!0));return n};e.Ub=function(a){if((a=e.r[a])&&1===a[2])return a[1]};e.Tb=function(a){var b=e.r;b[a]&&(delete b[a],e.T())};e.Hc=function(){d.t(8);d.t(9);d.t(11);var a=e.r,b,c;for(c in a)if(b=a[c])d.j(8,c,b[0]),d.j(9,c,b[1]),(b=b[2])&&3!=b&&d.j(11,c,""+b)}};var Pa=function(){function c(a,b,c,d){k==g[a]&&(g[a]={});k==g[a][b]&&(g[a][b]=[]);g[a][b][c]=d}function f(a,b,c){if(k!=g[a]&&k!=g[a][b])return g[a][b][c]}function b(a,b){if(k!=g[a]&&k!=g[a][b]){g[a][b]=k;var c=!0,d;for(d=0;d<u[x];d++)if(k!=g[a][u[d]]){c=!1;break}c&&(g[a]=k)}}function i(a){var b="",c=!1,d,e;for(d=0;d<u[x];d++)if(e=a[u[d]],k!=e){c&&(b+=u[d]);for(var c=[],g=k,f=k,f=0;f<e[x];f++)if(k!=e[f]){g="";f!=S&&k==e[f-1]&&(g+=f[v]()+n);var i;i=e[f];for(var N="",l=k,U=k,ya=k,l=0;l<i[x];l++)U=i[q](l),
ya=B[U],N+=k!=ya?ya:U;i=N;g+=i;T(c,g)}e=j+c[D](s)+h;b+=e;c=!1}else c=!0;return b}var e=this,l=ta(e),g={},a="k",d="v",u=[a,d],j="(",h=")",s="*",n="!",N="'",B={};B[N]="'0";B[h]="'1";B[s]="'2";B[n]="'3";var S=1;e.Oc=function(a){return k!=g[a]};e.C=function(){var a="",b;for(b in g)k!=g[b]&&(a+=b[v]()+i(g[b]));return a};e.cc=function(a){if(a==k)return e.C();var b=a.C(),c;for(c in g)k!=g[c]&&!a.Oc(c)&&(b+=c[v]()+i(g[c]));return b};e.j=l("_setKey",89,function(b,d,n){if(typeof n!="string")return!1;c(b,a,
d,n);return!0});e.ma=l("_setValue",90,function(a,b,n){if(typeof n!="number"&&(k==Number||!(n instanceof Number))||p.round(n)!=n||n==NaN||n==Infinity)return!1;c(a,d,b,n[v]());return!0});e.ac=l("_getKey",87,function(b,c){return f(b,a,c)});e.bc=l("_getValue",88,function(a,b){return f(a,d,b)});e.t=l("_clearKey",85,function(c){b(c,a)});e.ia=l("_clearValue",86,function(a){b(a,d)})};var Qa=function(c,f){var b=this,i=ta(b);b.qe=f;b.Yc=c;b.Wa=i("_trackEvent",91,function(c,i,g){return f.Wa(b.Yc,c,i,g)})};var Ra=function(c,f){var b=this,i=M[w].external,e=M[w].performance,l=10;b.ub=new Pa;b.Bc=function(){var b,a="timing",c="onloadT";i&&i[c]!=k&&i.isValidLoadTime?b=i[c]:e&&e[a]&&(b=e[a].loadEventStart-e[a].fetchStart);return b};b.Dc=function(){return c.D()&&c.Va()%100<l};b.Cc=function(){var e="&utmt=event&utme="+Q(b.ub.C())+c.na();f.B(e,c.p,c.a,!1,!0)};b.Ac=function(b){b=p.min(p.floor(b/100),5E3);return b>0?b+"00":"0"};b.vb=function(){var c=b.Bc();if(c==k||isNaN(c))return!1;if(c<=0)return!0;if(c>2147483648)return!1;
var a=b.ub;a.t(14);a.ia(14);var d=b.Ac(c);a.j(14,1,d)&&a.ma(14,1,c)&&b.Cc();i&&i.isValidLoadTime!=k&&i.setPageReadyTime();return!1};b.Ua=function(){if(!b.Dc())return!1;if(M[w].top!=M[w])return!1;b.vb()&&ua(M[w],"load",b.vb,!1);return!0}};var $=function(){};$.Pc=function(c){var f="gaso=",b=M[y][A].hash;c=b&&1==b[r](f)?P(b,f,F):(b=M[w].name)&&0<=b[r](f)?P(b,f,F):P(c.g(),pa,";");return c};$.Rc=function(c,f){var b=(f||"www")+".google.com",b="https://"+b+"/analytics/reporting/overlay_js?gaso="+c+F+Ca(),i="_gasojs",e=M[y].createElement("script");e.type="text/javascript";e.src=b;if(i)e.id=i;(M[y].getElementsByTagName("head")[0]||M[y].getElementsByTagName("body")[0]).appendChild(e)};
$.load=function(c,f){if(!$.Qc){var b=$.Pc(f),i=b&&b.match(/^(?:\|([-0-9a-z.]{1,30})\|)?([-.\w]{10,1200})$/i);if(i)f.xc(b),f.yc(),V._gasoDomain=c.b,V._gasoCPath=c.f,$.Rc(i[2],i[1]);$.Qc=!0}};var Sa=function(c,f,b){function i(){if("auto"==j.b){var a=M[y].domain;"www."==a[C](0,4)&&(a=a[C](4));j.b=a}j.b=j.b[E]()}function e(){i();var a=j.b,b=a[r]("www.google.")*a[r](".google.")*a[r]("google.");return b||"/"!=j.f||a[r]("google.org")>-1}function l(b,c,d){if(O(b)||O(c)||O(d))return"-";b=P(b,I+a.a+".",c);O(b)||(b=b[z]("."),b[5]=""+(b[5]?b[5]*1+1:1),b[3]=b[4],b[4]=d,b=b[D]("."));return b}function g(){return"file:"!=M[y][A][ea]&&e()}var a=this,d=ta(a),u=k,j=new Fa,h=!1,s=k;a.n=c;a.m=p.round((new Date)[da]()/
1E3);a.p=f||"UA-XXXXX-X";a.Ya=M[y].referrer;a.oa=k;a.d=k;a.F=!1;a.O=k;a.e=k;a.Za=k;a.pa=k;a.a=k;a.k=k;j.o=b?Q(b):k;a.hc=function(){return Ca()^a.O.Zb()&2147483647};a.gc=function(){if(!j.b||""==j.b||"none"==j.b)return j.b="",1;i();return j.Ta?Ba(j.b):1};a.fc=function(a,b){if(O(a))a="-";else{b+=j.f&&"/"!=j.f?j.f:"";var c=a[r](b),a=c>=0&&c<=8?"0":"["==a[q](0)&&"]"==a[q](a[x]-1)?"-":a}return a};a.na=function(b){var c="";c+=j.ja?a.O.$b():"";c+=j.ka&&!O(M[y].title)?"&utmdt="+Q(M[y].title):"";var d;d=k;
M[w]&&M[w][t]&&M[w][t].hid?d=M[w][t].hid:(d=Ca(),M[w].gaGlobal=M[w][t]?M[w][t]:{},M[w][t].hid=d);c+="&utmhid="+d+"&utmr="+Q(o(a.oa))+"&utmp="+Q(a.kc(b));return c};a.kc=function(a){var b=M[y][A];a&&L(13);return a=k!=a&&""!=a?Q(a,!0):Q(b.pathname+b.search,!0)};a.pc=function(b){if(a.D()){var c="";a.e!=k&&a.e.C()[x]>0&&(c+="&utme="+Q(a.e.C()));c+=a.na(b);u.B(c,a.p,a.a)}};a.ec=function(){var b=new Ha(j);return b.Z(a.a)?b.Pb():k};a.$a=d("_getLinkerUrl",52,function(b,c){var d=b[z]("#"),e=b,f=a.ec();if(f)if(c&&
1>=d[x])e+="#"+f;else if(!c||1>=d[x])1>=d[x]?e+=(R(b,"?")?F:"?")+f:e=d[0]+(R(b,"?")?F:"?")+f+"#"+d[1];return e});a.ic=function(){var b=a.m,c=a.k,d=c.g(),e=a.a+"",f=M[w]?M[w][t]:k,g,i=R(d,I+e+"."),h=R(d,la+e),u=R(d,ma+e),s,G=[],Z="",Ka=!1,d=O(d)?"":d;if(j.w){g=M[y][A]&&M[y][A].hash?M[y][A][fa][C](M[y][A][fa][r]("#")):"";j.U&&!O(g)&&(Z=g+F);Z+=M[y][A].search;!O(Z)&&R(Z,I)&&(c.Ob(Z),c.za()||c.Mb(),s=c.ba());g=c.ea;var xa=c.Na,U=c.Qa;O(g())||(xa(za(g())),R(g(),";")||U());g=c.da;xa=c.X;U=c.Y;O(g())||(xa(g()),
R(g(),";")||U())}O(s)?i?(s=!h||!u)?(s=l(d,";",o(b)),a.F=!0):(s=P(d,I+e+".",";"),G=P(d,la+e,";")[z](".")):(s=[e,a.hc(),b,b,b,1][D]("."),Ka=a.F=!0):O(c.z())||O(c.ca())?(s=l(Z,F,o(b)),a.F=!0):(G=c.z()[z]("."),e=G[0]);s=s[z](".");M[w]&&f&&f.dh==e&&!j.o&&(s[4]=f.sid?f.sid:s[4],Ka&&(s[3]=f.sid?f.sid:s[4],f.vid&&(b=f.vid[z]("."),s[1]=b[0],s[2]=b[1])));c.La(s[D]("."));G[0]=e;G[1]=G[1]?G[1]:0;G[2]=k!=G[2]?G[2]:j.Yb;G[3]=G[3]?G[3]:s[4];c.$(G[D]("."));c.Ma(e);O(c.Nb())||c.fa(c.K());c.Oa();c.aa();c.Pa()};a.jc=
function(){u=new Ma(j)};a.getName=d("_getName",58,function(){return a.n});a.c=d("_initData",2,function(){var b;if(!h){if(!a.O)a.O=new Na(j.la);a.a=a.gc();a.k=new Ha(j);a.e=new Pa;s=new Oa(j,o(a.a),a.k,a.e);a.jc()}if(g()){if(!h)a.oa=a.fc(a.Ya,M[y].domain),b=new X(o(a.a),a.oa,a.m,j);a.ic(b);s.Vb()}if(!h)g()&&b.Lb(a.k,a.F),a.Za=new Pa,$.load(j,a.k),h=!0});a.Va=d("_visitCode",54,function(){a.c();var b=P(a.k.g(),I+a.a+".",";"),b=b[z](".");return b[x]<4?"":b[1]});a.gd=d("_cookiePathCopy",30,function(b){a.c();
a.k&&a.k.Qb(a.a,b)});a.D=function(){return a.Va()%1E4<j.L*100};a.ie=d("_trackPageview",1,function(b){if(g())a.c(),M[w].name&&L(12),a.pc(b),a.F=!1});a.je=d("_trackTrans",18,function(){var b=a.a,c=[],d,e,f;a.c();if(a.d&&a.D()){for(d=0;d<a.d.N[x];d++){e=a.d.N[d];T(c,e.ga());for(f=0;f<e.M[x];f++)T(c,e.M[f].ga())}for(d=0;d<c[x];d++)u.B(c[d],a.p,b,!0)}});a.de=d("_setTrans",20,function(){var b,c,d,e;b=M[y].getElementById?M[y].getElementById("utmtrans"):M[y].utmform&&M[y].utmform.utmtrans?M[y].utmform.utmtrans:
k;a.c();if(b&&b.value){a.d=new W;e=b.value[z]("UTM:");j.u=!j.u||""==j.u?"|":j.u;for(b=0;b<e[x];b++){e[b]=Aa(e[b]);c=e[b][z](j.u);for(d=0;d<c[x];d++)c[d]=Aa(c[d]);"T"==c[0]?a.Xa(c[1],c[2],c[3],c[4],c[5],c[6],c[7],c[8]):"I"==c[0]&&a.dc(c[1],c[2],c[3],c[4],c[5],c[6])}}});a.Xa=d("_addTrans",21,function(b,c,d,e,f,g,i,h){a.d=a.d?a.d:new W;return a.d.Sb(b,c,d,e,f,g,i,h)});a.dc=d("_addItem",19,function(b,c,d,e,f,g){var i;a.d=a.d?a.d:new W;(i=a.d.Sa(b))||(i=a.Xa(b,"","","","","","",""));i.Rb(c,d,e,f,g)});
a.fe=d("_setVar",22,function(b){b&&""!=b&&e()&&(a.c(),s.Xb(Q(b)),a.D()&&u.B("&utmt=var",a.p,a.a))});a.Pd=d("_setCustomVar",10,function(b,c,d,e){a.c();return s.Wb(b,c,d,e)});a.kd=d("_deleteCustomVar",35,function(b){a.c();s.Tb(b)});a.td=d("_getVisitorCustomVar",50,function(b){a.c();return s.Ub(b)});a.Xd=d("_setMaxCustomVariables",71,function(a){j.Ra=a});a.link=d("_link",101,function(b,c){if(j.w&&b)a.c(),M[y][A].href=a.$a(b,c)});a.wd=d("_linkByPost",102,function(b,c){if(j.w&&b&&b.action)a.c(),b.action=
a.$a(b.action,c)});a.ge=d("_setXKey",83,function(b,c,d){a.e.j(b,c,d)});a.he=d("_setXValue",84,function(b,c,d){a.e.ma(b,c,d)});a.ud=d("_getXKey",76,function(b,c){return a.e.ac(b,c)});a.vd=d("_getXValue",77,function(b,c){return a.e.bc(b,c)});a.ed=d("_clearXKey",72,function(b){a.e.t(b)});a.fd=d("_clearXValue",73,function(b){a.e.ia(b)});a.jd=d("_createXObj",75,function(){a.c();return new Pa});a.lc=d("_sendXEvent",78,function(b){var c="";a.c();a.D()&&(c+="&utmt=event&utme="+Q(a.e.cc(b))+a.na(),u.B(c,a.p,
a.a,!1,!0))});a.hd=d("_createEventTracker",74,function(b){a.c();return new Qa(b,a)});a.Wa=d("_trackEvent",4,function(b,c,d,e){a.c();var f=a.Za;k!=b&&k!=c&&""!=b&&""!=c?(f.t(5),f.ia(5),(b=f.j(5,1,b)&&f.j(5,2,c)&&(k==d||f.j(5,3,d))&&(k==e||f.ma(5,1,e)))&&a.lc(f)):b=!1;return b});a.Ua=d("_trackPageLoadTime",100,function(){a.c();if(!a.pa)a.pa=new Ra(a,u);return a.pa.Ua()});a.nd=function(){return j};a.Sd=d("_setDomainName",6,function(a){j.b=a});a.ad=d("_addOrganic",14,function(a,b,c){j.J.splice(c?0:j.J[x],
0,new Ea(a,b))});a.dd=d("_clearOrganic",70,function(){j.J=[]});a.Zc=d("_addIgnoredOrganic",15,function(a){T(j.V,a)});a.bd=d("_clearIgnoredOrganic",97,function(){j.V=[]});a.$c=d("_addIgnoredRef",31,function(a){T(j.W,a)});a.cd=d("_clearIgnoredRef",32,function(){j.W=[]});a.zd=d("_setAllowHash",8,function(a){j.Ta=a?1:0});a.Kd=d("_setCampaignTrack",36,function(a){j.Ia=a?1:0});a.Ld=d("_setClientInfo",66,function(a){j.ja=a?1:0});a.md=d("_getClientInfo",53,function(){return j.ja});a.Md=d("_setCookiePath",
9,function(a){j.f=a});a.ee=d("_setTransactionDelim",82,function(a){j.u=a});a.Od=d("_setCookieTimeout",25,function(b){a.mc(b*1E3)});a.mc=d("_setCampaignCookieTimeout",29,function(a){j.Ja=a});a.Qd=d("_setDetectFlash",61,function(a){j.la=a?1:0});a.od=d("_getDetectFlash",65,function(){return j.la});a.Rd=d("_setDetectTitle",62,function(a){j.ka=a?1:0});a.pd=d("_getDetectTitle",56,function(){return j.ka});a.Ud=d("_setLocalGifPath",46,function(a){j.ha=a});a.qd=d("_getLocalGifPath",57,function(){return j.ha});
a.Wd=d("_setLocalServerMode",92,function(){j.A=0});a.$d=d("_setRemoteServerMode",63,function(){j.A=1});a.Vd=d("_setLocalRemoteServerMode",47,function(){j.A=2});a.rd=d("_getServiceMode",59,function(){return j.A});a.ae=d("_setSampleRate",45,function(a){j.L=a});a.be=d("_setSessionTimeout",27,function(b){a.nc(b*1E3)});a.nc=d("_setSessionCookieTimeout",26,function(a){j.Ka=a});a.Ad=d("_setAllowLinker",11,function(a){j.w=a?1:0});a.yd=d("_setAllowAnchor",7,function(a){j.U=a?1:0});a.Hd=d("_setCampNameKey",
41,function(a){j.Aa=a});a.Dd=d("_setCampContentKey",38,function(a){j.Ba=a});a.Ed=d("_setCampIdKey",39,function(a){j.Ca=a});a.Fd=d("_setCampMediumKey",40,function(a){j.Da=a});a.Gd=d("_setCampNOKey",42,function(a){j.Ea=a});a.Id=d("_setCampSourceKey",43,function(a){j.Fa=a});a.Jd=d("_setCampTermKey",44,function(a){j.Ga=a});a.Cd=d("_setCampCIdKey",37,function(a){j.Ha=a});a.ld=d("_getAccount",64,function(){return a.p});a.xd=d("_setAccount",3,function(b){a.p=b});a.Yd=d("_setNamespace",48,function(a){j.o=
a?Q(a):k});a.sd=d("_getVersion",60,function(){return ia});a.Bd=d("_setAutoTrackOutbound",79,Da);a.ce=d("_setTrackOutboundSubdomains",81,Da);a.Td=d("_setHrefExamineLimit",80,Da);a.Zd=d("_setReferrerOverride",49,function(b){a.Ya=b});a.Nd=d("_setCookiePersistence",24,function(b){a.oc(b)});a.oc=d("_setVisitorCookieTimeout",28,function(a){j.s=a})};var Ta=function(){var c=this,f=ta(c);c.wb=!1;c.Ib={};c.Vc=0;c._gasoDomain=k;c._gasoCPath=k;c.ne=f("_getTracker",0,function(b,f){return c.xa(b,k,f)});c.xa=f("_createTracker",55,function(b,c,e){c&&L(23);e&&L(67);c==k&&(c="~"+V.Vc++);return V.Ib[c]=new Sa(c,b,e)});c.Db=f("_getTrackerByName",51,function(b){b=b||"";return V.Ib[b]||V.xa(k,b)});c.Ec=function(){var b=m[ja];return b&&b[ka]&&b[ka]()};c.me=f("_anonymizeIp",16,function(){c.wb=!0})};var Va=function(){var c=this,f=ta(c);c.oe=f("_createAsyncTracker",33,function(b,c){return V.xa(b,c||"")});c.pe=f("_getAsyncTracker",34,function(b){return V.Db(b)});c.push=function(){L(5);for(var b=arguments,c=0,e=0;e<b[x];e++)try{if(typeof b[e]==="function")b[e]();else{var f="",g=b[e][0],a=g.lastIndexOf(".");a>0&&(f=g[C](0,a),g=g[C](a+1));var d=f==ga?V:f==ha?Ua:V.Db(f);d[g].apply(d,b[e].slice(1))}}catch(u){c++}return c}};var V=new Ta;var Wa=m[ga];Wa&&typeof Wa._getTracker=="function"?V=Wa:m[ga]=V;var Ua=new Va;a:{var Xa=m[ha],Ya=!1;if(Xa&&typeof Xa[ba]=="function"&&(Ya=va(Xa),!Ya))break a;m[ha]=Ua;Ya&&Ua[ba].apply(Ua,Xa)};})()

