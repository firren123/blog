/*---start 插件---*/
//input框晃动
jQuery.fn.shake=function(a,c,b){
    this.each(function(){
        $(this).css({position:"relative"});
        for(var d=1;d<=a;d++){
            $(this).animate({left:(c*-1)},(((b/a)/4))).animate({left:c},((b/a)/2)).animate({left:0},(((b/a)/4)))
        }
    });
    return this;
};

//中间位置
jQuery.fn.center=function(){
    var a=this;
    return this.each(function(){
        a.css("position","absolute").css("top",($(window).height()-a.height())/4+$(window).scrollTop()+"px").css("left",($(window).width()-a.width())/2+$(window).scrollLeft()+"px")
    })
};

/* input 默认值*/
jQuery.fn.hint=function(){
    return this.each(function(){
        var A=$(this);
        var B=A.attr("title");
        if(!B){
            return
        }
        A.blur(function(){
            if(!A.val()||A.val()==B){
                A.css("color", "#ccc");
                A.val(B)
            }
        });
        A.focus(function(){
            if(A.val()==B){
                A.val("")
            }
            A.css("color", "#000");
        });
        A.blur();
    })
};

/*字数检查*/
jQuery.fn.textlimit=function(counter_el, thelimit, speed) {
	var charDelSpeed = speed || 15;
	var toggleCharDel = speed != -1;
	var toggleTrim = true;

	var that = this[0];
	updateCounter();

	function updateCounter(){
		jQuery(counter_el).text(thelimit - that.value.length);
	};
	
	this.keypress (function(e){ if( this.value.length >= thelimit && e.charCode != '0' ) e.preventDefault() })
	.keyup (function(e){ 
		updateCounter();
		if( this.value.length >= thelimit && toggleTrim ){
			if(toggleCharDel){
				// first, trim the text a bit so the char trimming won't take forever
				that.value = that.value.substr(0,thelimit+100);
				var init = setInterval
					(
						function(){
							if( that.value.length <= thelimit){ init = clearInterval(init); updateCounter() }
							else{ that.value = that.value.substring(0,that.value.length-1);
							jQuery(counter_el).text('loading...'+(thelimit - that.value.length));
							};
						} ,charDelSpeed
					);
			}
			else this.value = that.value.substr(0,thelimit);
		}
	});
};
/*--- end  插件---*/


/*---Dialog 插件---*/
//begging of the Dialog
(function(a){
    a.fn.makeDialog=function(){
        return this.each(
            function(){
               var b=a(this);
               b.hide().css("z-index",100)
               .bind("dlg-launch",null,function(){
					var t = b.attr("id"); 
                    if(a("#"+t+"_mask").length==0){
                        var c=a(window);
                        a("body").prepend(a("<div>&nbsp;</div>").css({FILTER:  "alpha(opacity=90)", position:"fixed",top:0,left:0,height:c.height(),width:c.width(),display:"block","z-index":20,"background-color":"#FFFFFF",opacity:0.5}).attr("id",b.attr("id")+"_mask"))
						//a("body").prepend(a("<div>&nbsp;</div>").css({FILTER:  "alpha(opacity=90)", position:"absolute",top:0,left:0,height:$(document.body).outerHeight(true),width:c.width(),display:"block","z-index":20,"background-color":"#FFFFFF",opacity:0.5}).attr("id",b.attr("id")+"_mask"));
						if(t == 'dlg-confirm'){ 
							a("#"+t+"_mask").css('z-index',99);
						}
                    }
                    b.center().show()
                })
               .drag(function(d,c){
                   a(this).css({top:c.offsetY,left:c.offsetX})
                   })
               .bind("dlg-close",null,function(){
                   b.trigger("dlg-stop-progress");
                   a("#"+b.attr("id")+"_mask").remove();
                   b.hide()})
               .bind("dlg-start-progress",null,function(){a(this).find(".js_progress").startProgress(a(this).attr("id"))})
               .bind("dlg-stop-progress",null,function(){a.stopProgress(a(this).attr("id"))})
            }
    )};
    
    a.fn.startProgress=function(b){
        return this.each(function(){
        var j=a(this);
        var e=j.position();
        var h=e.top+"px";
        var i=e.left+"px";
        var d=j.innerHeight();
        var f=j.innerWidth();
        var g=f+"px";
        var c=d+"px";
        j.prepend(a("<div>&nbsp;</div>").css({position:"absolute",top:h,left:i,height:c,width:g,display:"block","z-index":40,"background-color":"#FFFFFF",opacity:0.5}).attr("id",b+"_progress").append(a('<img src="/images/loading_32x32.gif" alt="Loading">').css({position:"relative",top:(d/2-32)+"px",left:(f/2-16)+"px",height:"32px",width:"32px",display:"block","z-index":50})))
        })
    };
    
    a.stopProgress=function(b){
		a("#"+b+"_progress").remove();
    }
    }
)(jQuery);
/*-- end of Dialog*/


//begging of the drag
(function(d){
    d.fn.drag=function(i,e,h){
        var g=typeof i=="string"?i:"",f=d.isFunction(i)?i:d.isFunction(e)?e:null;
        if(g.indexOf("drag")!==0){
            g="drag"+g
        }

        h=(i==f?e:h)||{};		
        return f?this.bind(g,h,f):this.trigger(g)
    };
    var b=d.event,a=b.special,
    c=a.drag={defaults:{which:1,distance:0,not:":input",handle:null,relative:false,drop:true,click:false},datakey:"dragdata",livekey:"livedrag",
        add:function(g){
            var f=d.data(this,c.datakey),e=g.data||{};
            f.related+=1;
            if(!f.live&&g.selector){
                f.live=true;
                b.add(this,"draginit."+c.livekey,c.delegate)
            }
            d.each(c.defaults,function(h,i){
                if(e[h]!==undefined){f[h]=e[h]}
            })
        },
        remove:function(){
            d.data(this,c.datakey).related-=1
        },
        setup:function(){
            if(d.data(this,c.datakey)){
                return
            }
            var e=d.extend({related:0},c.defaults);
            d.data(this,c.datakey,e);
            b.add(this,"mousedown",c.init,e);
            if(this.attachEvent){
                this.attachEvent("ondragstart",c.dontstart)
            }
        },
        teardown:function(){
            if(d.data(this,c.datakey).related){
                return
            }
            d.removeData(this,c.datakey);
            b.remove(this,"mousedown",c.init);
            b.remove(this,"draginit",c.delegate);
            c.textselect(true);
            if(this.detachEvent){
                this.detachEvent("ondragstart",c.dontstart)
            }
        },
        init:function(g){
            var e=g.data,f;
            if(e.which>0&&g.which!=e.which){
                return
            }
            if(d(g.target).is(e.not)){
                return
            }
            if(e.handle&&!d(g.target).closest(e.handle,g.currentTarget).length){
                return
            }
            e.propagates=1;
            e.interactions=[c.interaction(this,e)];
            e.target=g.target;
            e.pageX=g.pageX;
            e.pageY=g.pageY;
            e.dragging=null;
            f=c.hijack(g,"draginit",e);
            if(!e.propagates){
                return
            }
            f=c.flatten(f);
            if(f&&f.length){
                e.interactions=[];
                d.each(f,function(){
                    e.interactions.push(c.interaction(this,e))
                })
            }
            e.propagates=e.interactions.length;
            if(e.drop!==false&&a.drop){
                a.drop.handler(g,e)
            }
            c.textselect(false);
            b.add(document,"mousemove mouseup",c.handler,e);
            return false
        },
        interaction:function(f,e){
            return{drag:f,callback:new c.callback(),droppable:[],offset:d(f)[e.relative?"position":"offset"]()||{top:0,left:0}}
        },
        handler:function(f){
            var e=f.data;
            switch(f.type){
                case !e.dragging&&"mousemove":
                    if(Math.pow(f.pageX-e.pageX,2)+Math.pow(f.pageY-e.pageY,2)<Math.pow(e.distance,2)){
                        break
                    }
                    f.target=e.target;
                    c.hijack(f,"dragstart",e);
                    if(e.propagates){
                        e.dragging=true
                    }
                case"mousemove":
                    if(e.dragging){
                        c.hijack(f,"drag",e);
                        if(e.propagates){
                            if(e.drop!==false&&a.drop){
                                a.drop.handler(f,e)
                            }
                            break
                        }
                        f.type="mouseup"
                    }
                case"mouseup":
                    b.remove(document,"mousemove mouseup",c.handler);
                    if(e.dragging){
                        if(e.drop!==false&&a.drop){
                            a.drop.handler(f,e)
                        }
                        c.hijack(f,"dragend",e)
                    }
                    c.textselect(true);
                    if(e.click===false&&e.dragging){
                        jQuery.event.triggered=true;
                        setTimeout(function(){jQuery.event.triggered=false},20);
                        e.dragging=false
                    }
                    break
            }
        },
        delegate:function(g){
            var e=[],h,f=d.data(this,"events")||{};
            d.each(f.live||[],function(j,k){
                if(k.preType.indexOf("drag")!==0){
                    return
                }
                h=d(g.target).closest(k.selector,g.currentTarget)[0];
                if(!h){
                    return
                }
                b.add(h,k.origType+"."+c.livekey,k.origHandler,k.data);
                if(d.inArray(h,e)<0){
                    e.push(h)
                }
            });
            if(!e.length){
                return false
            }
            return d(e).bind("dragend."+c.livekey,function(){b.remove(this,"."+c.livekey)})
        },
        hijack:function(f,m,p,n,h){
            if(!p){
                return
            }
            var o={event:f.originalEvent,type:f.type},k=m.indexOf("drop")?"drag":"drop",r,j=n||0,g,e,q,l=!isNaN(n)?n:p.interactions.length;
            f.type=m;
            f.originalEvent=null;
            p.results=[];
            do{
                if(g=p.interactions[j]){
                    if(m!=="dragend"&&g.cancelled){
                        continue
                    }
                    q=c.properties(f,p,g);
                    g.results=[];
                    d(h||g[k]||p.droppable).each(function(s,i){
                        q.target=i;
                        r=i?b.handle.call(i,f,q):null;
                        if(r===false){
                            if(k=="drag"){
                                g.cancelled=true;
                                p.propagates-=1
                            }
                            if(m=="drop"){
                                g[k][s]=null
                            }
                        }else{
                            if(m=="dropinit"){
                                g.droppable.push(c.element(r)||i)
                            }
                        }
                        if(m=="dragstart"){
                            g.proxy=d(c.element(r)||g.drag)[0]
                        }
                        g.results.push(r);
                        delete f.result;
                        if(m!=="dropinit"){
                            return r
                        }
                    });
                    p.results[j]=c.flatten(g.results);
                    if(m=="dropinit"){
                        g.droppable=c.flatten(g.droppable)
                    }
                    if(m=="dragstart"&&!g.cancelled){
                        q.update()
                    }
                }
            }while(++j<l);
            f.type=o.type;
            f.originalEvent=o.event;
            return c.flatten(p.results)
        },
        properties:function(g,e,f){
            var h=f.callback;
            h.drag=f.drag;
            h.proxy=f.proxy||f.drag;
            h.startX=e.pageX;
            h.startY=e.pageY;
            h.deltaX=g.pageX-e.pageX;
            h.deltaY=g.pageY-e.pageY;
            h.originalX=f.offset.left;
            h.originalY=f.offset.top;
            h.offsetX=g.pageX-(e.pageX-h.originalX);
            h.offsetY=g.pageY-(e.pageY-h.originalY);
            h.drop=c.flatten((f.drop||[]).slice());
            h.available=c.flatten((f.droppable||[]).slice());
            return h
        },
        element:function(e){
            if(e&&(e.jquery||e.nodeType==1)){
                return e
            }},
        flatten:function(e){
            return d.map(e,function(f){
                return f&&f.jquery?d.makeArray(f):f&&f.length?c.flatten(f):f
            })
        },
        textselect:function(e){
            d(document)[e?"unbind":"bind"]("selectstart",c.dontstart)
            .attr("unselectable",e?"off":"on")
            .css("MozUserSelect",e?"":"none")
        },
        dontstart:function(){
            return false
        },
        callback:function(){}
    };
    c.callback.prototype={update:function(){
        if(a.drop&&this.available.length){
            d.each(this.available,function(e){
                a.drop.locate(this,e)
            })
        }
    }};
    a.draginit=a.dragstart=a.dragend=c
})(jQuery);
//end of drag

//start of drop
(function(d){
    d.fn.drop=function(i,e,h){
        var g=typeof i=="string"?i:"",f=d.isFunction(i)?i:d.isFunction(e)?e:null;
        if(g.indexOf("drop")!==0){
            g="drop"+g
        }
        
        h=(i==f?e:h)||{};
        return f?this.bind(g,h,f):this.trigger(g)
    };
    d.drop=function(e){
        e=e||{};
        b.multi=e.multi===true?Infinity:e.multi===false?1:!isNaN(e.multi)?e.multi:b.multi;
        b.delay=e.delay||b.delay;
        b.tolerance=d.isFunction(e.tolerance)?e.tolerance:e.tolerance===null?null:b.tolerance;
        b.mode=e.mode||b.mode||"intersect"
    };
    var c=d.event,a=c.special,
        b=d.event.special.drop={multi:1,delay:20,mode:"overlap",targets:[],datakey:"dropdata",livekey:"livedrop",
            add:function(f){
                var e=d.data(this,b.datakey);
                e.related+=1;
                if(!e.live&&f.selector){
                    e.live=true;
                    c.add(this,"dropinit."+b.livekey,b.delegate)
                }},
            remove:function(){
                d.data(this,b.datakey).related-=1
                },
            setup:function(){
                if(d.data(this,b.datakey)){
                    return
                }
                var e={related:0,active:[],anyactive:0,winner:0,location:{}};
                d.data(this,b.datakey,e);
                b.targets.push(this)
            },
            teardown:function(){
                if(d.data(this,b.datakey).related){
                    return
                }
                d.removeData(this,b.datakey);
                c.remove(this,"dropinit",b.delegate);
                var e=this;
                b.targets=d.grep(b.targets,function(f){return(f!==e)})
            },
            handler:function(g,e){
                var f,h;
                if(!e){
                    return
                }
                switch(g.type){
                    case"mousedown":
                        h=d(b.targets);
                        if(typeof e.drop=="string"){
                            h=h.filter(e.drop)
                        }
                        h.each(function(){
                            var i=d.data(this,b.datakey);
                            i.active=[];
                            i.anyactive=0;
                            i.winner=0
                        });
                        e.droppable=h;
                        b.delegates=[];
                        a.drag.hijack(g,"dropinit",e);
                        b.delegates=d.unique(a.drag.flatten(b.delegates));
                    break;
                    case"mousemove":b.event=g;
                        if(!b.timer){b.tolerate(e)
                        }
                    break;
                    case"mouseup":
                        b.timer=clearTimeout(b.timer);
                        if(e.propagates){
                            a.drag.hijack(g,"drop",e);
                            a.drag.hijack(g,"dropend",e);
                            d.each(b.delegates||[],function(){
                                c.remove(this,"."+b.livekey)
                            })
                        }
                    break
                }
            },
            delegate:function(g){
                var e=[],h,f=d.data(this,"events")||{};
                d.each(f.live||[],function(j,k){
                    if(k.preType.indexOf("drop")!==0){
                        return
                    }
                    h=d(g.currentTarget).find(k.selector);
                    if(!h.length){
                        return
                    }
                    h.each(function(){
                        c.add(this,k.origType+"."+b.livekey,k.origHandler,k.data);
                        if(d.inArray(this,e)<0){
                            e.push(this)
                        }
                    })
                });
                b.delegates.push(e);
                return e.length?d(e):false
            },
            locate:function(k,h){
                var l=d.data(k,b.datakey),g=d(k),i=g.offset()||{},e=g.outerHeight(),j=g.outerWidth(),f={elem:k,width:j,height:e,top:i.top,left:i.left,right:i.left+j,bottom:i.top+e};
                if(l){
                    l.location=f;
                    l.index=h;
                    l.elem=k
                }
                return f
            },
            contains:function(e,f){
                return((f[0]||f.left)>=e.left&&(f[0]||f.right)<=e.right&&(f[1]||f.top)>=e.top&&(f[1]||f.bottom)<=e.bottom)
            },
            modes:{intersect:function(f,e,g){
                return this.contains(g,[f.pageX,f.pageY])?1000000000:this.modes.overlap.apply(this,arguments)
            },
            overlap:function(f,e,g){
                return Math.max(0,Math.min(g.bottom,e.bottom)-Math.max(g.top,e.top))*Math.max(0,Math.min(g.right,e.right)-Math.max(g.left,e.left))
            },
            fit:function(f,e,g){return this.contains(g,e)?1:0},
            middle:function(f,e,g){return this.contains(g,[e.left+e.width*0.5,e.top+e.height*0.5])?1:0}},
            sort:function(f,e){return(e.winner-f.winner)||(f.index-e.index)},
            tolerate:function(q){
                var k,e,n,j,l,m,g,p=0,f,h=q.interactions.length,r=[b.event.pageX,b.event.pageY],o=b.tolerance||b.modes[b.mode];
                do{
                    if(f=q.interactions[p]){
                        if(!f){
                            return
                        }
                        f.drop=[];
                        l=[];
                        m=f.droppable.length;
                        if(o){
                            n=b.locate(f.proxy)
                        }
                        k=0;
                        do{
                            if(g=f.droppable[k]){
                                j=d.data(g,b.datakey);
                                e=j.location;
                                if(!e){
                                    continue
                                }
                                j.winner=o?o.call(b,b.event,n,e):b.contains(e,r)?1:0;
                                l.push(j)
                            }
                        }while(++k<m);
                        l.sort(b.sort);
                        k=0;
                        do{
                            if(j=l[k]){
                                if(j.winner&&f.drop.length<b.multi){
                                    if(!j.active[p]&&!j.anyactive){
                                        if(a.drag.hijack(b.event,"dropstart",q,p,j.elem)[0]!==false){
                                            j.active[p]=1;
                                            j.anyactive+=1
                                        }else{
                                            j.winner=0
                                        }
                                    }
                                    if(j.winner){
                                        f.drop.push(j.elem)
                                    }
                                }else{
                                    if(j.active[p]&&j.anyactive==1){
                                        a.drag.hijack(b.event,"dropend",q,p,j.elem);
                                        j.active[p]=0;
                                        j.anyactive-=1
                                    }
                                }
                            }
                        }while(++k<m)
                    }
                }while(++p<h);
                if(b.last&&r[0]==b.last.pageX&&r[1]==b.last.pageY){
                    delete b.timer
                }else{
                    b.timer=setTimeout(function(){b.tolerate(q)},b.delay)
                }
                b.last=b.event
            }
        };
        a.dropinit=a.dropstart=a.dropend=b
})(jQuery);
//end of drop
