std={};
std.browser={
    isFF:null,
    isIE:null,
    isMoz:null,
    isOpera:null,
    isAppleWebKit:null,
    isSupport:null,
    major:null,
    minor:null,
    gecko:null,
    isSafariWin:null,
    isSafariMobile:null
};
std.browser.platform={};
std.browser.applewebkit={};
std.browser.applewebkit.parseVersion=function(_1){
    var _2=_1.split(".");
    var _3=(_1[_1.length-1]=="+");
    if(_3){
        var _4="+";
    }else{
        var _4=parseInt(_2[1]);
        if(isNaN(_4)){
            _4="";
        }
    }
    return {
        major:parseInt(_2[0]),
        minor:_4,
        is_nightly:_3
    };
};
std.browser.applewebkit.getVersion=function(){
    var _5=new RegExp("\\(.*\\) AppleWebKit/(.*) \\((.*)");
    var _6=_5.exec(navigator.userAgent);
    if(_6){
        var _7=std.browser.applewebkit.parseVersion(_6[1]);
    }
    return {
        major:_7["major"],
        minor:_7["minor"],
        is_nightly:_7["is_nightly"]
        };
};
(function(){
    var i,_9;
    var ua=navigator.userAgent;
    if((std.browser.isOpera=(i=ua.indexOf("Opera"))>=0)){
        std.browser.major=parseFloat(ua.substr(i+6));
    }else{
        if((std.browser.isAppleWebKit=((i=ua.indexOf("AppleWebKit"))>=0))){
            var _b=std.browser.applewebkit.getVersion();
            std.browser.major=_b["major"];
            std.browser.minor=_b["minor"];
            std.browser.isSafariWin=navigator.platform.indexOf("Win")==0;
            std.browser.isSafariMobile=(ua.indexOf("Mobile")!=-1);
            std.browser.isChrome=(ua.indexOf("Chrome")!=-1);
        }else{
            if((std.browser.isIE=(i=ua.indexOf("MSIE "))>=0)){
                std.browser.major=parseFloat(ua.substr(i+5));
            }else{
                if(std.browser.isMoz=(_9=/^Mozilla.+ rv:([0-9]+\.[0-9]+)(\.[0-9]+(?:\.[0-9]+)?)?/.exec(ua))!=null){
                    std.browser.major=_9[1];
                    std.browser.minor=_9[2];
                    std.browser.isFF=ua.indexOf("Firefox/")!=-1;
                    _9=/Gecko\/([0-9]+)/.exec(ua);
                    if(_9){
                        std.browser.gecko=_9[1];
                    }
                }
            }
        }
    }
    std.browser.platform.isWin=navigator.platform.indexOf("Win")==0;
    std.browser.platform.isMacOS=(ua.indexOf("Mac OS")!=-1);
    std.browser.isSupport=(std.browser.isIE&&std.browser.major>=6)||(std.browser.isMoz&&std.browser.major>=1.7&&std.browser.gecko!="20060127")||(std.browser.isOpera&&std.browser.major>=9)||(std.browser.isAppleWebKit&&std.browser.major>=3);
    std.browser.isIEQuirksMode=(document.compatMode=="BackCompat"&&std.browser.isIE);
    std.browser.isBorderBox=!(document.compatMode=="CSS1Compat"&&std.browser.isIE)||(std.browser.isAppleWebKit&&std.browser.major<3);
})();
std.browser.no={};
std.browser.buggy={};
(std.browser.recalcRules=function(){
    if(std.browser.isSafariMobile){
        std.browser.no.ondblclick=true;
    }
})();
std.lang={};
std.lang.bind=function(){
    var _c=std.array.from(arguments);
    var _d=_c.shift(),_e=_c.shift();
    if(!_e||typeof (_e)!="function"){
        null.assert;
    }
    if(_c.length==0){
        return function binded(){
            return arguments.length?_e.apply(_d,arguments):_e.call(_d);
        };
    }else{
        return function binded(){
            if(arguments.length==0){
                return _e.apply(_d,_c);
            }else{
                var _f=_c.concat();
                for(var i=0;i<arguments.length;i++){
                    _f.push(arguments[i]);
                }
                return _e.apply(_d,_f);
            }
        };
    }
};
std.lang.later=function(){
    var _11=std.array.from(arguments);
    var _12=_11.shift(),obj=_11.shift(),_14=_11.shift();
    return setTimeout(function(){
        return _14.apply(obj,_11);
    },_12);
};
std.lang.defaultize=function(_15,_16){
    return typeof (_15)=="undefined"?_16:_15;
};
std.lang.evaluate=function(ref){
    return typeof (ref)=="function"?ref():ref;
};
std.lang.undef=function(val){
    return typeof (val)=="undefined";
};
std.lang.isArray=function(val){
    for(var i=0;i<arguments.length;i++){
        var val=arguments[i];
        if(typeof (val)=="undefined"||val==null||val.constructor!=Array){
            return false;
        }
    }
    return true;
};
std.lang.isString=function(val){
    return (typeof (val)=="string")||(val instanceof String);
};
std.dom={};
std.dom.element=function(_1c){
    if(_1c){
        return typeof (_1c)=="string"?document.getElementById(_1c):_1c;
    }else{
        return null;
    }
};
std.array={};
std.array.from=function(_1d){
    var arr=[];
    for(var i=0;i<_1d.length;i++){
        arr.push(_1d[i]);
    }
    return arr;
};
std.array.contains=function(_20,_21){
    for(var i=0;i<_20.length;i++){
        if(_20[i]==_21){
            return true;
        }
    }
    return false;
};
std.array.without=function(_23,_24,_25){
    var _26=new Array();
    if(_25){
        for(var i=0;i<_23.length;i++){
            if(!_25(_23[i],_24)){
                _26.push(_23[i]);
            }
        }
    }else{
        for(var i=0;i<_23.length;i++){
            if(_23[i]!=_24){
                _26.push(_23[i]);
            }
        }
    }
    return _26;
};
std.event={
    KEY_BACKSPACE:8,
    KEY_TAB:9,
    KEY_RETURN:13,
    KEY_ESC:27,
    KEY_LEFT:37,
    KEY_UP:38,
    KEY_RIGHT:39,
    KEY_DOWN:40,
    KEY_DELETE:46
};
std.event.observers=false;
std.event._observeAndCache=function(_28,_29,_2a,_2b){
    if(!this.observers){
        this.observers=[];
    }
    if(_28.addEventListener){
        this.observers.push([_28,_29,_2a,_2b]);
        _28.addEventListener(_29,_2a,_2b);
    }else{
        if(_28.attachEvent){
            this.observers.push([_28,_29,_2a,_2b]);
            _28.attachEvent("on"+_29,_2a);
        }
    }
};
std.event.unloadCache=function(){
    if(!std.event.observers){
        return;
    }
    for(var i=0;i<std.event.observers.length;i++){
        std.event.stopObserving.apply(this,std.event.observers[i]);
        std.event.observers[i][0]=null;
    }
    std.event.observers=false;
};
std.event.nativeSetObserved=function(_2d,_2e,_2f,_30,_31){
    return _2d?std.event.nativeObserve(_2e,_2f,_30,_31):std.event.nativeStopObserving(_2e,_2f,_30,_31);
};
std.event.nativeObserve=function(_32,_33,_34,_35){
    _32=typeof (_32)=="string"?document.getElementById(_32):_32;
    _32.tagName;
    _35=_35||false;
    std.event._observeAndCache(_32,_33,_34,_35);
};
std.event.nativeStopObserving=function(_36,_37,_38,_39){
    _36=typeof (_36)=="string"?document.getElementById(_36):_36;
    _39=_39||false;
    if(_36.removeEventListener){
        _36.removeEventListener(_37,_38,_39);
    }else{
        if(_36.detachEvent){
            _36.detachEvent("on"+_37,_38);
        }
    }
};
std.event.observe=function(_3a,_3b,_3c,_3d){
    if(_3b=="keypress"&&(navigator.appVersion.match(/Konqueror|Safari|KHTML/)||document.attachEvent)){
        _3b="keydown";
    }
    std.event.nativeObserve(_3a,_3b,_3c,_3d);
};
std.event.stopObserving=function(_3e,_3f,_40,_41){
    if(_3f=="keypress"&&(navigator.appVersion.match(/Konqueror|Safari|KHTML/)||document.detachEvent)){
        _3f="keydown";
    }
    std.event.nativeStopObserving(_3e,_3f,_40,_41);
};
std.event.observe(window,"unload",std.event.unloadCache,false);
std.event.listener=function(obj,_43){
    var _44=std.array.from(arguments);
    var obj=_44.shift();
    var _43=_44.shift();
    _43.prototype;
    if(typeof _43!="function"){
        throw "Invalid method: "+_43;
    }
    return function(e){
        return _43.apply(obj,[e||window.event].concat(_44));
    };
};
std.list={};
std.list.iterate=function(_46,_47){
    if(typeof (_46.forEach)=="function"){
        _46.forEach(_47);
    }else{
        for(var i=0;i<_46.length;i++){
            _47(_46[i],i);
        }
    }
};
std.list.map=function(_49,_4a){
    if(typeof (_49.map)=="function"){
        return _49.map(_4a);
    }else{
        var _4b=new Array();
        for(var i=0;i<_49.length;i++){
            _4b.push(_4a(_49[i],i));
        }
        return _4b;
    }
};
std.list.grep=function(_4d,_4e){
    if(typeof (_4d.filter)=="function"){
        return _4d.filter(_4e);
    }else{
        var _4f=new Array();
        for(var i=0;i<_4d.length;i++){
            if(_4e(_4d[i],i)){
                _4f.push(_4d[i]);
            }
        }
        return _4f;
    }
};
std.list.max=function(_51,_52){
    var max=Number.NEGATIVE_INFINITY;
    for(var i=0;i<_51.length;i++){
        if(_51[i]!=null){
            max=Math.max(max,_52(_51[i]));
        }
    }
    return max;
};
std.list.min=function(_55,_56){
    var min=Number.POSITIVE_INFINITY;
    for(var i=0;i<_55.length;i++){
        if(_55[i]!=null){
            min=Math.min(min,_56(_55[i]));
        }
    }
    return min;
};
std.list.find=function(_59,_5a){
    for(var i=0;i<_59.length;i++){
        if(_5a(_59[i],i)){
            return _59[i];
        }
    }
    return null;
};
std.list.findIndex=function(_5c,_5d){
    if(typeof (_5c.indexOf)=="function"){
        return _5c.indexOf(_5d);
    }else{
        for(var i=0;i<_5c.length;i++){
            if(_5c[i]==_5d){
                return i;
            }
        }
        return -1;
    }
};
std.hash={};
std.hash.merge=function(){
    var _5f=std.array.from(arguments);
    var _60={};
    for(var i=0;i<_5f.length;i++){
        var _62=_5f[i];
        for(var _63 in _62){
            _60[_63]=_62[_63];
        }
    }
    return _60;
};
std.hash.iterate=function(_64,_65){
    for(var k in _64){
        _65(k,_64[k]);
    }
};
std.hash.keys=function(_67){
    var _68=[];
    for(var k in _67){
        _68.push(k);
    }
    return _68;
};
std.hash.values=function(_6a){
    var _6b=[];
    for(var k in _6a){
        _6b.push(_6a[k]);
    }
    return _6b;
};
std.hash.map=function(_6d,_6e){
    var _6f={};
    for(var i=0;i<_6d.length;i++){
        var _71=_6e(_6d[i],i);
        _6f[_71[0]]=_71[1];
    }
    return _6f;
};
std.hash.size=function(_72){
    var cnt=0;
    for(var k in _72){
        cnt++;
    }
    return cnt;
};
std.hash.notEmpty=function(_75){
    for(var k in _75){
        return true;
    }
    return false;
};
std.hash.empty=function(_77){
    for(var k in _77){
        return false;
    }
    return true;
};
std.string={};
std.string._scriptFragment="(?:<script.*?>)((\n|\r|.)*?)(?:</script>)";
std.string.enclose=function(_79,_7a,end,_7c){
    return _7c?_7a+_79+end:_79;
};
std.string.stripTags=function(_7d){
    return _7d.replace(/<\/?[^>]+>/gi,"");
};
std.string.stripScripts=function(_7e){
    return _7e.replace(new RegExp(std.string._scriptFragment,"img"),"");
};
std.string.extractScripts=function(_7f){
    var _80=new RegExp(std.string._scriptFragment,"img");
    var _81=new RegExp(std.string._scriptFragment,"im");
    return std.list.map(_7f.match(_80)||[],function(_82){
        return (_82.match(_81)||["",""])[1];
    });
};
std.string.evalScripts=function(_83){
    return std.list.map(std.string.extractScripts(_83),function(_84){
        eval(_84);
    });
};
std.string.escapeHTML=function(s){
    return String(s).replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/"/g,"&quot;");
};
std.string.fullEscapeHTML=function(s){
    return std.string.escapeHTML(s).replace(/\n/g,"<br/>").replace(/  /g,"&nbsp; ");
};
std.string.autoLink=function(s){
    s=s.replace(/([\d\w-+]+:\/\/[\S]+)/g,"<a href=\"$1\" target=\"_blank\" title=\"link\">$1</a>");
    s=s.replace(/([\d\w-+]+@[\d\w-]+\.[\d\w-\.]{2,})/g,"<a href=\"mailto:$1\" title=\"email\">$1</a>");
    return s;
};
std.string.autoLink2=function(s){
    return s.replace(/\b((?:(?:http|https|ftp|news|file):\/\/)[^, \r\n"\(\)'<>]+)/g,"<a\thref=\"$1\"\ttarget=\"_blank\">$1</a>").replace(/\b([\w!#\$\%&'\*\+\-\/=\?\^`\{\|\}~\.]*[\w!#\$\%&'\*\+\-\/=\?\^`\{\|\}~]@[\w\-]+(?:\.[\w\-]+)+)/g,"<a\thref=\"mailto:$1\"\ttarget=\"_blank\">$1</a>");
};
std.string.isWhiteListURL=function(url){
    return url.indexOf("#")==0||url.match(/^(http|https|ftp|news|file|mailto||editgrid):/i);
};
std.string.unescapeHTML=function(_8a){
    var div=document.createElement("div");
    div.innerHTML=std.string.stripTags(_8a);
    return div.childNodes[0]?div.childNodes[0].nodeValue:"";
};
std.string.htmlEntities=function(s){
    var div=document.createElement("div");
    var _8e=document.createTextNode(s);
    div.appendChild(_8e);
    return div.innerHTML;
};
std.string.encodeUTF8=function(_8f){
    _8f=_8f.replace(/\r\n/g,"\n");
    var _90=[],ac=0;
    for(var n=0;n<_8f.length;n++){
        var c=_8f.charCodeAt(n);
        if(c<128){
            _90[ac++]=String.fromCharCode(c);
        }else{
            if((c>127)&&(c<2048)){
                _90[ac++]=String.fromCharCode((c>>6)|192);
                _90[ac++]=String.fromCharCode((c&63)|128);
            }else{
                _90[ac++]=String.fromCharCode((c>>12)|224);
                _90[ac++]=String.fromCharCode(((c>>6)&63)|128);
                _90[ac++]=String.fromCharCode((c&63)|128);
            }
        }
    }
    return _90.join("");
};
std.string.decodeUTF8=function(_94){
    var _95=[],i=ac=c=c1=c2=0;
    while(i<_94.length){
        c=_94.charCodeAt(i);
        if(c<128){
            _95[ac++]=String.fromCharCode(c);
            i++;
        }else{
            if((c>191)&&(c<224)){
                c2=_94.charCodeAt(i+1);
                _95[ac++]=String.fromCharCode(((c&31)<<6)|(c2&63));
                i+=2;
            }else{
                c2=_94.charCodeAt(i+1);
                c3=_94.charCodeAt(i+2);
                _95[ac++]=String.fromCharCode(((c&15)<<12)|((c2&63)<<6)|(c3&63));
                i+=3;
            }
        }
    }
    return _95.join("");
};
std.string.toArray=function(_97){
    return _97.split("");
};
std.string.camelize=function(_98){
    var _99=_98.split("-");
    if(_99.length==1){
        return _99[0];
    }
    var _9a=_98.indexOf("-")==0?_99[0].charAt(0).toUpperCase()+_99[0].substring(1):_99[0];
    for(var i=1,len=_99.length;i<len;i++){
        var s=_99[i];
        _9a+=s.charAt(0).toUpperCase()+s.substring(1);
    }
    return _9a;
};
std.string.capitalize=function(_9e){
    return _9e.charAt(0).toUpperCase()+_9e.substring(1);
};
std.string.trim=function(_9f){
    return _9f.replace(/^\s*(.*)\s*$/,"$1");
};
std.string.parsePosition=function(s){
    s=s.split(" ");
    p={
        top:0,
        bottom:0,
        left:0,
        right:0
    };
    for(var i=0;i<s.length;i++){
        switch(s[i]){
            case "top":
                if(!p.bottom){
                    p.top=1;
                }
                break;
            case "bottom":
                if(!p.top){
                    p.bottom=1;
                }
                break;
            case "left":
                if(!p.right){
                    p.left=1;
                }
                break;
            case "right":
                if(!p.left){
                    p.right=1;
                }
                break;
        }
    }
    return p;
};
std.string.printPosition=function(p){
    s=[];
    if(p.top){
        s.push("top");
    }else{
        if(p.bottom){
            s.push("bottom");
        }
    }
    if(p.left){
        s.push("left");
    }else{
        if(p.right){
            s.push("right");
        }
    }
    return s.join(" ");
};
std.string.times=function(s,_a4){
    for(var i=1;i<_a4;i<<=1){
        s=s+s;
    }
    return s.substr(0,_a4);
};
std.string.lpad=function(s,len,c){
    var _a9=std.string.times(c,len-s.length);
    return _a9+s;
};
std.string.right=function(s,len){
    return s.length<len?s:s.substr(s.length-len,len);
};
std.dom.newTree=function(_ac){
    var _ad=std.dom.newElement("div");
    _ad.innerHTML=_ac;
    return _ad.firstChild;
};
std.dom.update=function(_ae,_af){
    std.dom.element(_ae).innerHTML=std.string.stripScripts(_af);
    setTimeout(function(){
        std.string.evalScripts(_af);
    },10);
};
std.conv={};
std.conv._hexTab=[48,49,50,51,52,53,54,55,56,57,65,66,67,68,69,70];
std.conv.intToRGB=function(num){
    return String.fromCharCode(this._hexTab[(num>>20)&15],this._hexTab[(num>>16)&15],this._hexTab[(num>>12)&15],this._hexTab[(num>>8)&15],this._hexTab[(num>>4)&15],this._hexTab[num&15]);
};
std.conv.hexToInt=function(c){
    var _b2=c.toUpperCase().charCodeAt(0);
    if(48<=_b2&&_b2<=58){
        return _b2-48;
    }
    if(65<=_b2&&_b2<=70){
        return _b2-65+10;
    }
    return 0;
};
std.conv.rgbToIntArray=function(s){
    if(s===null){
        return null;
    }
    if(s===undefined||!s.charAt){
        return undefined;
    }
    return [16*std.conv.hexToInt(s.charAt(0))+std.conv.hexToInt(s.charAt(1)),16*std.conv.hexToInt(s.charAt(2))+std.conv.hexToInt(s.charAt(3)),16*std.conv.hexToInt(s.charAt(4))+std.conv.hexToInt(s.charAt(5))];
};
std.conv.rgbToInt=function(s){
    var arr=std.conv.rgbToIntArray(s);
    if(!arr){
        return undefined;
    }
    return arr[0]*65536+arr[1]*256+arr[2];
};
std.conv.rgbArrayToInt=function(r,g,b){
    return r*65536+g*256+b;
};
std.conv.anyRGBToInt=function(any){
    if(any===undefined){
        return any;
    }else{
        if(any===null||any===-1){
            return -1;
        }else{
            if(typeof any=="number"){
                return any;
            }else{
                if(typeof any=="string"){
                    return std.conv.rgbToInt(any);
                }else{
                    if(typeof any=="object"){
                        if(any.r!==undefined&&any.g!==undefined&&any.b!==undefined){
                            return std.conv.rgbArrayToInt(any.r,any.g,any.b);
                        }else{
                            if(any[0]!==undefined&&any[1]!==undefined&&any[2]!==undefined){
                                return std.conv.rgbArrayToInt(any[0],any[1],any[2]);
                            }
                        }
                    }
                }
            }
        }
    }
    throw new Error("Cannot convert ["+any+"] into an integer");
};
std.ajax={};
std.ajax._processorCount=0;
std.ajax._jsonpProcessors={};
std.ajax._emptyFunction=function(){
    };
std.ajax.obtainProcessorId=function(){
    if(std.ajax._processorCount>100000){
        std.ajax._processorCount=0;
    }
    return std.ajax._processorCount++;
};
std.ajax.registerJsonpProcessor=function(id,_bb){
    std.ajax._jsonpProcessors[id]=_bb;
};
std.ajax.removeJsonpProcessor=function(id){
    delete std.ajax._jsonpProcessors[id];
};
std.ajax.jsonp=function(_bd,_be,_bf,_c0){
    if(typeof _bf=="undefined"){
        _bf=200;
    }
    if(typeof _c0=="undefined"){
        _c0="";
    }
    std.ajax._jsonpProcessors[_bd](_bf,_c0,_be);
};
std.ajax.ScriptTagRequest=function(){
    this._jsonpId=std.ajax.obtainProcessorId();
    this._tag=null;
    this._url=null;
    this._content=null;
    this._responseSuccess=false;
    this._processError=false;
    this.onreadystatechange=null;
    this.readyState=0;
    this.responseText="";
    this.status=0;
    this.statusText="";
    this._headers=null;
    this._maxLength=std.ajax.ScriptTagRequest.MAX_LENGTH;
};
std.ajax.ScriptTagRequest.MAX_LENGTH=1800;
std.ajax.ScriptTagRequest._idPrefix=Math.random()+"."+new Date().getTime();
std.ajax.ScriptTagRequest.prototype._reset=function(){
    this._removeScriptTag();
    this._content=null;
    this._responseSuccess=false;
    this._processError=false;
    this.readyState=0;
    this.responseText="";
    this.status=0;
    this.statusText="";
    this._headers=null;
    this._maxLength=std.ajax.ScriptTagRequest.MAX_LENGTH;
};
std.ajax.ScriptTagRequest.prototype._removeScriptTag=function(){
    if(this._tag){
        document.getElementsByTagName("HEAD")[0].removeChild(this._tag);
    }
    this._tag=null;
    if(this._jsonpId){
        std.ajax.removeJsonpProcessor(this._jsonpId);
    }
};
std.ajax.ScriptTagRequest.prototype._createScriptTag=function(_c1,_c2,_c3){
    this._removeScriptTag();
    this._responseSuccess=false;
    this._processError=false;
    std.ajax.registerJsonpProcessor(this._jsonpId,std.lang.bind(this,this._processResponse));
    this._tag=document.createElement("script");
    this._tag.type="text/javascript";
    this._tag.charset="utf-8";
    var url=this._url+(this._url.indexOf("?")==-1?"?":"&")+"i="+std.ajax.ScriptTagRequest._idPrefix;
    url+="&jsonp="+this._jsonpId;
    url+="&c="+_c1;
    if(_c2){
        url+="&f=1";
    }
    if(_c3){
        url+="&l=1";
    }
    this._tag.src=url;
    std.event.observe(this._tag,"load",std.event.listener(this,this._onload));
    std.event.observe(this._tag,"error",std.event.listener(this,this._onerror));
    std.event.observe(this._tag,"readystatechange",std.event.listener(this,this._onreadystatechange));
    document.getElementsByTagName("HEAD")[0].appendChild(this._tag);
};
std.ajax.ScriptTagRequest.prototype._onload=function(){
    this._removeScriptTag();
    if(!this._responseSuccess){
        this._onerror();
    }else{
        this._sendContent();
    }
};
std.ajax.ScriptTagRequest.prototype._onerror=function(){
    this._removeScriptTag();
    if(!this._processError){
        this._processError=true;
        this.status=500;
        this.statusText="Error";
        this.readyState=4;
        this.responseText="";
        if(this.onreadystatechange&&typeof this.onreadystatechange=="function"){
            this.onreadystatechange();
        }
    }
};
std.ajax.ScriptTagRequest.prototype._onreadystatechange=function(){
    if(this._tag&&this._tag.readyState&&this._tag.readyState=="loaded"){
        this._onload();
    }
};
std.ajax.ScriptTagRequest.prototype._sendContent=function(_c5){
    if(_c5==null&&this._content==null){
        return;
    }
    var _c6=(_c5!=null);
    var _c7;
    if(_c6){
        this._content=_c5;
    }
    var c;
    if(this._content.length>this._maxLength){
        var _c9=this._getMaxLength();
        c=this._content.substring(0,_c9);
        this._content=this._content.substring(_c9);
        _c7=false;
    }else{
        c=this._content;
        this._content=null;
        _c7=true;
    }
    this._createScriptTag(c,_c6,_c7);
};
std.ajax.ScriptTagRequest.prototype._getMaxLength=function(){
    var _ca=this._maxLength;
    var _cb=this._content;
    while(true){
        if(_cb.charAt(_ca-1)=="%"){
            _ca-=1;
        }else{
            if(_cb.charAt(_ca-2)=="%"){
                _ca-=2;
            }else{
                if(_cb.charAt(_ca-3)=="%"){
                    var _cc=std.conv.hexToInt(_cb.charAt(_ca-2));
                    if(_cc<=7){
                        break;
                    }
                    if(_cc>=8&&_cc<=11){
                        _ca-=3;
                    }
                    if(_cc>=12){
                        _ca-=3;
                        break;
                    }
                }else{
                    break;
                }
            }
        }
    }
    return _ca;
};
std.ajax.ScriptTagRequest.prototype._processResponse=function(_cd,_ce,_cf){
    this._responseSuccess=true;
    if(_cd!=-1){
        this.status=_cd;
        this._headers=_ce;
        this.responseText=_cf;
        this.readyState=4;
        if(this.onreadystatechange&&typeof this.onreadystatechange=="function"){
            this.onreadystatechange();
        }
    }
};
std.ajax.ScriptTagRequest.prototype.open=function(_d0,url,_d2,_d3,_d4){
    this._reset();
    this._url=url;
    this._maxLength-=url.length;
};
std.ajax.ScriptTagRequest.prototype.send=function(_d5){
    this._reset();
    _d5=_d5==null?"":encodeURIComponent(_d5);
    this._sendContent(_d5);
};
std.ajax.ScriptTagRequest.prototype.setRequestHeader=function(){
    };
std.ajax.ScriptTagRequest.prototype.getAllResponseHeaders=function(){
    return this._headers;
};
std.ajax.ScriptTagRequest.prototype.getResponseHeader=function(key){
    if(!key){
        return null;
    }
    var _d7=null;
    key=key.toLowerCase()+":";
    var _d8=this._headers.toLowerCase();
    var i=-1;
    if((i=_d8.indexOf(key))!=-1){
        _d7=this._headers.substring(i+key.length,this._headers.indexOf("\n",i));
        _d7=std.string.trim(_d7);
    }
    return _d7;
};
std.ajax.ScriptTagRequest.prototype.abort=function(){
    this._removeScriptTag();
};
std.ajax.getTransport=function(_da){
    if(typeof _da=="string"){
        return eval(_da)();
    }
    return std.ajax.getDefaultTransport();
};
std.ajax.getScriptTagTransport=function(){
    return new std.ajax.ScriptTagRequest();
};
std.ajax.getDefaultTransport=function(){
    try{
        return new XMLHttpRequest();
    }
    catch(e){
    }
    finally{
    }
    try{
        return new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch(e){
    }
    finally{
    }
    try{
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
    catch(e){
    }
    finally{
    }
    return false;
};
std.ajax._activeRequestCount=0;
std.ajax.responders={};
std.ajax.responders._list=[];
std.ajax.responders._register=function(_db){
    if(!std.array.contains(this._list,_db)){
        this._list.push(_db);
    }
};
std.ajax.responders._unregister=function(_dc){
    this._list=std.array.without(this._list,_dc);
};
std.ajax.responders._dispatch=function(_dd,_de,_df,_e0){
    std.list.iterate(this._list,function(_e1){
        if(_e1[_dd]&&typeof _e1[_dd]=="function"){
            try{
                _e1[_dd].apply(_e1,[_de,_df,_e0]);
            }
            catch(e){
            }
        }
    });
};
std.ajax.responders._register({
    onCreate:function(){
        std.ajax._activeRequestCount++;
    },
    onComplete:function(){
        std.ajax._activeRequestCount--;
    }
});
std.ajax.Base=function(){
    };
std.ajax.Base.prototype.setOptions=function(_e2){
    this.options={
        method:"post",
        asynchronous:true,
        parameters:""
    };
    if(_e2){
        this.options=std.hash.merge(this.options,_e2);
    }
};
std.ajax.Base.prototype.responseIsSuccess=function(){
    return this.transport.status==undefined||this.transport.status==0||(this.transport.status>=200&&this.transport.status<300);
};
std.ajax.Base.prototype.responseIsFailure=function(){
    return !this.responseIsSuccess();
};
std.ajax.Request=function(url,_e4){
    this.setOptions(_e4);
    this.transport=std.ajax.getTransport(this.options.transportFactory);
    this.request(url);
};
std.ajax.Request.prototype=new std.ajax.Base();
std.ajax.Request.Events=["Uninitialized","Loading","Loaded","Interactive","Complete"];
std.ajax.Request.prototype.request=function(url){
    var _e6=this.options.parameters||"";
    if(_e6.length>0){
        _e6+="&_=";
    }
    try{
        this.url=url;
        if(this.options.method=="get"&&_e6.length>0){
            this.url+=(this.url.match(/\?/)?"&":"?")+_e6;
        }
        std.ajax.responders._dispatch("onCreate",this,this.transport);
        this.transport.open(this.options.method,this.url,this.options.asynchronous);
        if(this.options.asynchronous){
            this.transport.onreadystatechange=std.lang.bind(this,this.onStateChange);
            setTimeout(std.lang.bind(this,function(){
                this.respondToReadyState(1);
            }),10);
        }
        this.setRequestHeaders();
        var _e7=this.options.postBody?this.options.postBody:_e6;
        this.transport.send(this.options.method.toLowerCase()=="post"||this.options.method.toLowerCase()=="put"?_e7:null);
    }
    catch(e){
        this.dispatchException(e);
    }
};
std.ajax.Request.prototype.setRequestHeaders=function(){
    var _e8=[];
    if(this.options.method.toLowerCase()=="post"){
        _e8.push("Content-type",this.options.contentType?this.options.contentType:"application/x-www-form-urlencoded");
        if(this.transport.overrideMimeType&&(navigator.userAgent.match(/Gecko\/(\d{4})/)||[0,2005])[1]<2005){
            _e8.push("Connection","close");
        }
    }
    if(this.options.requestHeaders){
        _e8.push.apply(_e8,this.options.requestHeaders);
    }
    for(var i=0;i<_e8.length;i+=2){
        this.transport.setRequestHeader(_e8[i],_e8[i+1]);
    }
};
std.ajax.Request.prototype.onStateChange=function(){
    var _ea=this.transport.readyState;
    if(_ea!=1){
        this.respondToReadyState(this.transport.readyState);
    }
};
std.ajax.Request.prototype.header=function(_eb){
    try{
        return this.transport.getResponseHeader(_eb);
    }
    catch(e){
    }
};
std.ajax.Request.prototype.evalJSON=function(){
    try{
        return eval(this.header("X-JSON"));
    }
    catch(e){
    }
};
std.ajax.Request.prototype.evalResponse=function(){
    try{
        return eval(this.transport.responseText);
    }
    catch(e){
        this.dispatchException(e);
    }
};
std.ajax.Request.prototype.respondToReadyState=function(_ec){
    if(typeof (std)=="undefined"){
        return;
    }
    var _ed=std.ajax.Request.Events[_ec];
    var _ee=this.transport,_ef=this.evalJSON();
    if(_ed=="Complete"){
        try{
            (this.options["on"+this.transport.status]||this.options["on"+(this.responseIsSuccess()?"Success":"Failure")]||std.ajax._emptyFunction)(_ee,_ef);
        }
        catch(e){
            this.dispatchException(e);
        }
        if((this.header("Content-type")||"").match(/^text\/javascript/i)){
            this.evalResponse();
        }
    }
    try{
        (this.options["on"+_ed]||std.ajax._emptyFunction)(_ee,_ef);
        std.ajax.responders._dispatch("on"+_ed,this,_ee,_ef);
    }
    catch(e){
        this.dispatchException(e);
    }
    if(_ed=="Complete"){
        this.transport.onreadystatechange=std.ajax._emptyFunction;
    }
};
std.ajax.Request.prototype.dispatchException=function(_f0){
    (this.options.onException||std.ajax._emptyFunction)(this,_f0);
    std.ajax.responders._dispatch("onException",this,_f0);
};
std.ajax.Updater=function(_f1,url,_f3){
    this.containers={
        success:_f1.success?std.dom.element(_f1.success):std.dom.element(_f1),
        failure:_f1.failure?std.dom.element(_f1.failure):(_f1.success?null:std.dom.element(_f1))
        };
    this.transport=std.ajax.getTransport();
    this.setOptions(_f3);
    var _f4=this.options.onComplete||std.ajax._emptyFunction;
    this.options.onComplete=std.lang.bind(this,function(_f5,_f6){
        this.updateContent();
        _f4(_f5,_f6);
    });
    this.request(url);
};
std.ajax.Updater.prototype=new std.ajax.Request();
std.ajax.Updater.prototype.updateContent=function(){
    var _f7=this.responseIsSuccess()?this.containers.success:this.containers.failure;
    var _f8=this.transport.responseText;
    if(!this.options.evalScripts){
        _f8=std.string.stripScripts(_f8);
    }
    if(_f7){
        if(this.options.insertion){
            new this.options.insertion(_f7,_f8);
        }else{
            std.dom.update(_f7,_f8);
        }
    }
    if(this.responseIsSuccess()){
        if(this.onComplete){
            setTimeout(std.lang.bind(this,this.onComplete),10);
        }
    }
};
std.ajax.getText=function(url,_fa){
    var _fb=new std.ajax.Request(url,{
        method:_fa||"post",
        asynchronous:false
    });
    return _fb.transport.responseText;
};
std.ajax.newTree=function(url){
    var _fd=std.ajax.getText(url);
    return std.dom.newTree(_fd);
};
std.ajax.ping=function(url,_ff){
    new std.ajax.Request(url,std.hash.merge(_ff,{
        method:"post",
        asynchronous:true
    }));
};
std.ajax.loadMap=function(map,_101,_102){
    var len=0;
    var dst={};
    for(var i in map){
        len++;
    }
    for(var i in map){
        (function(idx){
            new std.ajax.Request(map[i],std.hash.merge(_102,{
                onSuccess:function(_107){
                    dst[idx]={
                        responseText:_107.responseText
                        };
                    if(!--len){
                        _101(dst);
                    }
                }
            }));
        })(i);
        }
};
std.console={};
std.console.firefoxConsole={};
std.console.firefoxConsole.log=function(_108,_109){
    switch(_108){
        case "DEBUG":
            console.debug(_109);
            break;
        case " INFO":
            console.info(_109);
            break;
        case " WARN":
            console.warn(_109);
            break;
        case "ERROR":
            console.error(_109);
            break;
    }
};
std.console.webkitConsole={};
std.console.webkitConsole.log=function(_10a,_10b){
    console.log("["+_10a+"] "+_10b);
};
std.console.operaConsole={};
std.console.operaConsole.log=function(_10c,_10d){
    opera.postError("["+_10c+"] "+_10d);
};
std.console.nullConsole={};
std.console.nullConsole.log=function(_10e,_10f){
    };
std.console.defaultConsole=(function(){
    if(typeof console!="undefined"){
        return std.browser.isAppleWebKit?std.console.webkitConsole:std.console.firefoxConsole;
    }else{
        if(typeof opera!="undefined"){
            return std.console.operaConsole;
        }
    }
    return std.console.nullConsole;
})();
std.log={};
std.log._console=std.console.defaultConsole;
std.log.debug=function(_110){
    std.log._console.log("DEBUG",_110);
};
std.log.info=function(_111){
    std.log._console.log(" INFO",_111);
};
std.log.warn=function(_112){
    std.log._console.log(" WARN",_112);
};
std.log.error=function(_113){
    std.log._console.log("ERROR",_113);
};
std.log.setConsole=function(_114){
    std.log._console=_114;
};
std.log.getConsole=function(){
    return std.log._console;
};
var eventd={};
eventd._workerFile="worker";
eventd._minInterval=2000;
eventd._workers=[];
eventd.domain="";
eventd.isSupported=function(){
    if(std.browser.isFF&&std.browser.major<1.8){
        return false;
    }
    if(std.browser.isOpera&&std.browser.major<9){
        return false;
    }
    if(std.browser.isIE&&std.browser.major<6){
        return false;
    }
    if(std.browser.isMoz&&std.browser.gecko=="20060127"){
        return false;
    }
    return true;
};
eventd.init=function(_115,_116){
    this._clients={};
    window.eventd=this;
    if(_115==-1){
        return true;
    }
    if(_116.match(/^[\d]*\.[\d]*\.[\d]*\.[\d]*(:[\d]*)?$/)){
        try{
            document.domain=_116;
        }
        catch(e){
            std.log.error(e);
            return false;
        }
        eventd.domain=document.domain;
        return true;
    }
    var arr=document.domain.split(".");
    if(_115>0&&arr.length!=1){
        while(arr.length>_115){
            arr.shift();
        }
        if(arr.length!=_115){
            return false;
        }
        try{
            document.domain=arr.join(".");
        }
        catch(e){
            std.log.error(e);
            return false;
        }
        eventd.domain=document.domain;
    }
    return eventd.domain||_116==location.host;
};
eventd.getClient=function(_118){
    return this._clients[_118];
};
eventd.setClient=function(_119,_11a){
    this._clients[_119]=_11a;
};
eventd.getStatus=function(){
    var _11b=[];
    for(var key in this._clients){
        var _11d=this._clients[key];
        _11b.push("["+_11d.token+"] "+_11d.status+", "+_11d.serverbase);
    }
    return _11b.length?_11b.join("\n"):"no created eventd client";
};
eventd.createClient=function(_11e){
    var _11f=null;
    var _120=_11e.clientFactory;
    if(typeof _120=="string"){
        _11f=eval(_120)(_11e);
    }else{
        _11f=eventd.createDefaultClient(_11e);
    }
    eventd.setClient(_11e.token,_11f);
    return _11f;
};
eventd.createDefaultClient=function(_121){
    return new eventd.Client(_121);
};
eventd.Client=function(_122){
    if(_122===undefined){
        return;
    }
    this.serverbase=_122.serverbase;
    this.scriptbase=_122.scriptbase;
    this.token=_122.token;
    this.id=_122.id||"";
    this.transportFactory=_122.transportFactory;
    this.funcGetSeq=_122.funcGetSeq;
    this.listeners={
        trigger:[],
        running:[]
    };
    this.tracer=_122.tracer;
    this.status="initializing";
};
eventd.Client.prototype.start=function(){
    this.status="starting";
    if(!this.frame){
        this.frame=std.dom.newElement("iframe",null,{},{
            display:"none"
        });
        this.frame.setAttribute("src",std.browser.isIE?"javascript:'';":"about:blank");
        document.body.appendChild(this.frame);
    }
    var url=this.serverbase+eventd._workerFile+"?domain="+eventd.domain+"&scriptbase="+this.scriptbase+"&token="+this.token+"&id="+this.id;
    this.trace("Client::start(), url = "+url);
    this.frame.src=url;
};
eventd.Client.prototype.stop=function(){
    this.trace("Client::stop()");
    this.frame.setAttribute("src",this.serverbase+"blank.html?");
};
eventd.Client.prototype.attachListener=function(name,func){
    this.listeners[name].push(func);
};
eventd.Client.prototype.detachListener=function(name,func){
    for(var i=0;i<this.listeners[name].length;i++){
        if(this.listeners[name][i]==func){
            this.listeners[name][i]=null;
        }
    }
};
eventd.Client.prototype.trigger=function(data,cb){
    for(var i=0;i<this.listeners["trigger"].length;i++){
        if(this.listeners["trigger"][i]!=null){
            this.listeners["trigger"][i](data,cb);
        }
    }
};
eventd.Client.prototype.onRunning=function(){
    this.status="running";
    for(var i=0;i<this.listeners["running"].length;i++){
        if(this.listeners["running"][i]!=null){
            this.listeners["running"][i]();
        }
    }
};
eventd.Client.prototype.trace=function(str){
    if(this.tracer){
        this.tracer("["+this.token+"] "+str);
    }
};
eventd.initWorker=function(_12e,_12f,_130,id){
    var _132=new eventd.Worker(_12e,_12f,_130,id);
    _132.start();
};
eventd.Worker=function(_133,_134,_135,id){
    if(arguments.length!=0){
        eventd._workers.push(this);
        this.serverbase="";
        this.domain=_133;
        this.scriptbase=_134;
        this.token=_135;
        this.id=id;
        this.data=null;
        this.lastSeq=null;
        this.timeout=60000;
        this._requestTimer=null;
        this._hasTimedOut=false;
        this.reqSeq=0;
        std.event.observe(window,"beforeunload",std.lang.bind(this,this._abortWorker));
    }
};
eventd.Worker.prototype.start=function(){
    if(this.domain){
        document.domain=this.domain;
    }
    this._trace("Worker::_start()");
    this._request();
};
eventd.Worker.prototype._request=function(){
    var _137=eventd._minInterval-(new Date()-this.lastRequest);
    if(_137>(0.2*eventd._minInterval)){
        this._trace("Worker::_request(), need to wait");
        setTimeout(std.lang.bind(this,this._request),_137);
        return;
    }
    this.lastRequest=new Date();
    var _138=window.parent.eventd.getClient(this.token);
    this.reqSeq++;
    this._trace("Worker::_request(), reqSeq = "+this.reqSeq+", hasClient = "+(_138&&true));
    if(_138){
        this.lastSeq=_138.funcGetSeq?_138.funcGetSeq():0;
        setTimeout(std.lang.bind(this,this._requestDelayed),0);
    }
    return;
};
eventd.Worker.prototype._requestDelayed=function(){
    var url=this.serverbase+"x/event.php?token="+this.token+"&seq="+this.lastSeq+"&id="+this.id;
    this._trace("Worker::requestDelayed(), reqSeq = "+this.reqSeq+", timeout = "+this.timeout+", url = "+url);
    try{
        this._transport=std.ajax.getTransport(this.transportFactory);
        this._transport.lastReadyState=null;
        this._transport.onreadystatechange=std.lang.bind(this,this._onResponse,this._transport,this.reqSeq);
        this._transport.open("POST",url);
        this._transport.setRequestHeader("If-Modified-Since","Sat, 1 Jan 2000 00:00:00 GMT");
        this._transport.send("");
        if(!(this._transport instanceof std.ajax.ScriptTagRequest)){
            this._requestTimer=setTimeout(std.lang.bind(this,this._onTimeout,this._transport,this.reqSeq),this.timeout);
        }
        this._onRunning();
    }
    catch(e){
        std.log.error("Error connecting to eventd: "+e);
    }
};
eventd.Worker.prototype._onTimeout=function(_13a,_13b){
    this._trace("Worker::onTimeout(), reqSeq = "+_13b);
    this._cancelTimeout();
    this._hasTimedOut=true;
    _13a.abort();
};
eventd.Worker.prototype._cancelTimeout=function(){
    if(this._requestTimer){
        clearTimeout(this._requestTimer);
        this._requestTimer=null;
    }
};
eventd.Worker.prototype._abortWorker=function(){
    if(this._transport){
        this._workerAborted=true;
        this._trace("Worker::abort()");
        this._transport.abort();
        this._cancelTimeout();
    }
};
eventd.Worker.prototype._onResponse=function(_13c,_13d){
    this._trace("Worker::_onResponse(), reqSeq = "+_13d+", readyState = "+_13c.readyState+", lastReadyState = "+_13c.lastReadyState+", workerAborted = "+(this._workerAborted?"true":"false"));
    var _13e=_13c.lastReadyState;
    _13c.lastReadyState=_13c.readyState;
    if(_13c.readyState==4&&_13e!=4){
        _13c.onreadystatechange=null;
        if(!this._workerAborted){
            if(this._hasTimedOut){
                this._hasTimedOut=false;
                this._request();
            }else{
                this._cancelTimeout();
                this.data={
                    responseText:null,
                    status:null,
                    statusText:null
                };
                try{
                    this.data.responseText=_13c.responseText;
                }
                catch(e){
                }
                try{
                    this.data.status=_13c.status;
                }
                catch(e){
                }
                try{
                    this.data.statusText=_13c.statusText;
                }
                catch(e){
                }
                this._transferData();
            }
        }
    }
};
eventd.Worker.prototype._transferData=function(){
    this._trace("Worker::_transferData(), status = "+this.data.status+", statusText = "+this.data.statusText+", responseText = "+this.data.responseText);
    var _13f=window.parent.eventd.getClient(this.token);
    if(_13f){
        _13f.trigger(this.data,std.lang.bind(this,this._transferDataCallback));
    }
    this.data=null;
};
eventd.Worker.prototype._transferDataCallback=function(){
    this._trace("Worker::_transferDataCallback()");
    this._request();
};
eventd.Worker.prototype._trace=function(str){
    var _141=window.parent.eventd.getClient(this.token);
    if(_141){
        _141.trace(str);
    }
};
eventd.Worker.prototype._onRunning=function(){
    if(!this._running){
        this._running=true;
        var _142=window.parent.eventd.getClient(this.token);
        if(_142){
            _142.onRunning();
        }
    }
};
eventd.createCrossDomainClient=function(_143){
    return new eventd.CrossDomainClient(_143);
};
eventd.CrossDomainClient=function(_144){
    eventd.Client.call(this,_144);
};
eventd.CrossDomainClient.prototype=new eventd.Client();
eventd.CrossDomainClient.prototype.start=function(){
    var _145="<html><head>"+"<script type=\"text/javascript\" src=\""+this.scriptbase+"eventd.js\"></script>"+"<script type=\"text/javascript\">window.onload = function(){ eventd.initCrossDomainWorker(\""+this.token+"\", \""+this.serverbase+"\", \""+this.transportFactory+"\"); };</script>"+"</head>"+"<body></body>"+"</html>";
    if(this.frame){
        document.body.removeChild(this.frame);
    }
    this.frame=std.dom.newElement("iframe",null,{},{
        display:"none"
    });
    if(std.browser.isOpera){
        this.frame.src="javascript:'"+_145+"'";
    }
    document.body.appendChild(this.frame);
    if(!std.browser.isOpera){
        this.frame.src="javascript:'"+_145+"'";
    }
};
eventd.initCrossDomainWorker=function(_146,_147,_148){
    var _149=new eventd.CrossDomainWorker(_146,_147,_148);
    _149.start();
};
eventd.CrossDomainWorker=function(_14a,_14b,_14c){
    eventd._workers.push(this);
    this.serverbase=_14b;
    this.domain=null;
    this.scriptbase=null;
    this.token=_14a;
    this.data=null;
    this.eventdDomain=null;
    this.transportFactory=_14c;
    this.lastSeq=null;
};
eventd.CrossDomainWorker.prototype=new eventd.Worker();

