"use strict";function _typeof(e){return(_typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}!function(_){var t="jqSchedule",T={calcStringTime:function(e){e=e.split(":");return 60*Number(e[0])*60+60*Number(e[1])},formatTime:function(e){var t=e%3600;return""+Math.floor(e/36e3)+Math.floor(e/3600%10)+":"+(""+Math.floor(t/600)+Math.floor(t/60%10))},_saveSettingData:function(e){return this.data(t+"Setting",e)},_loadSettingData:function(){return this.data(t+"Setting")},_saveData:function(e){e=_.extend({tableStartTime:0,tableEndTime:0,schedule:[],timeline:[]},e);return this.data(t,e)},_loadData:function(){return this.data(t)},scheduleData:function(){var e=_(this),e=T._loadData.apply(e);return e?e.schedule:[]},timelineData:function(){var e,t=_(this),i=T._loadData.apply(t),a=[];for(e in i.timeline)a[e]=i.timeline[e],a[e].schedule=[];for(e in i.schedule){var n=i.schedule[e];void 0!==n.timeline&&void 0!==a[n.timeline]&&a[n.timeline].schedule.push(n)}return a},resetData:function(){return this.each(function(){var e,t=_(this),i=T._loadData.apply(t);for(e in i.schedule=[],T._saveData.apply(t,[i]),t.find(".sc_bar").remove(),i.timeline)i.timeline[e].schedule=[],T._resizeRow.apply(t,[e,0]);T._saveData.apply(t,[i])})},addSchedule:function(i,a){return this.each(function(){var e=_(this),t={start:a.start,end:a.end,startTime:T.calcStringTime(a.start),endTime:T.calcStringTime(a.end),text:a.text,timeline:i};a.data&&(t.data=a.data),T._addScheduleData.apply(e,[i,t]),T._resetBarPosition.apply(e,[i])})},addRow:function(t,i){return this.each(function(){var e=_(this);T._addRow.apply(e,[t,i])})},resetRowData:function(){return this.each(function(){var e=_(this),t=T._loadData.apply(e);t.schedule=[],t.timeline=[],T._saveData.apply(e,[t]),e.find(".sc_bar").remove(),e.find(".timeline").remove(),e.find(".sc_data").height(0)})},setRows:function(i){return this.each(function(){var e,t=_(this);for(e in T.resetRowData.apply(t,[]),i)T.addRow.apply(t,[e,i[e]])})},setDraggable:function(i){return this.each(function(){var e=_(this),t=T._loadSettingData.apply(e);i!==t.draggable&&(t.draggable=i,T._saveSettingData.apply(e,t),i?e.find(".sc_bar").draggable("enable"):e.find(".sc_bar").draggable("disable"))})},setResizable:function(i){return this.each(function(){var e=_(this),t=T._loadSettingData.apply(e);i!==t.resizable&&(t.resizable=i,T._saveSettingData.apply(e,t),i?e.find(".sc_bar").resizable("enable"):e.find(".sc_bar").resizable("disable"))})},_getTimeLineNumber:function(e,t){var i,a=_(this),n=T._loadSettingData.apply(a),l=0,s=0,d=Math.ceil(t/(n.timeLineY+n.timeLinePaddingTop+n.timeLinePaddingBottom));for(i in n.rows){var o=n.rows[i],r=0;if("object"===_typeof(o.schedule)&&(r=o.schedule.length),e&&e.timeline&&r++,d<=(s+=Math.max(r,1)))break;l++}return l},_addScheduleBgData:function(l){return this.each(function(){var e=_(this),t=T._loadSettingData.apply(e),i=T._loadData.apply(e),a=Math.ceil((l.startTime-i.tableStartTime)/t.widthTime),i=Math.floor((l.endTime-i.tableStartTime)/t.widthTime),n=_('<div class="sc_bgBar"><span class="text"></span></div>');n.css({left:a*t.widthTimeX,top:0,width:(i-a)*t.widthTimeX,height:e.find(".sc_main .timeline").eq(l.timeline).height()}),l.text&&n.find(".text").text(l.text),l.class&&n.addClass(l.class),e.find(".sc_main .timeline").eq(l.timeline).append(n)})},_addScheduleData:function(c,e){var h=e;return h.startTime=h.startTime||T.calcStringTime(h.start),h.endTime=h.endTime||T.calcStringTime(h.end),this.each(function(){var l=_(this),s=T._loadSettingData.apply(l),d=T._loadData.apply(l),e=Math.ceil((h.startTime-d.tableStartTime)/s.widthTime),t=Math.floor((h.endTime-d.tableStartTime)/s.widthTime),i=_('<div class="sc_bar"><span class="head"><span class="time"></span></span><span class="text"></span></div>'),a=T.formatTime(h.startTime),n=T.formatTime(h.endTime),o=T._getScheduleCount.apply(l,[h.timeline]);i.css({left:e*s.widthTimeX,top:o*s.timeLineY+s.timeLinePaddingTop,width:(t-e)*s.widthTimeX,height:s.timeLineY}),i.find(".time").text(a+"-"+n),h.text&&i.find(".text").text(h.text),h.class&&i.addClass(h.class);l.find(".sc_main .timeline").eq(c).append(i),d.schedule.push(h),T._saveData.apply(l,[d]),s.onAppendSchedule&&s.onAppendSchedule.apply(l,[i,h]);var o=d.schedule.length-1,t=(i.data("sc_key",o),i.on("mouseup",function(){var e,t;s.onClick&&!0!==_(this).data("dragCheck")&&!0!==_(this).data("resizeCheck")&&(t=(e=_(this)).data("sc_key"),s.onClick.apply(l,[e,d.schedule[t]]))}),l.find(".sc_bar")),r=null,e=(t.draggable({grid:[s.widthTimeX,1],containment:l.find(".sc_main"),helper:"original",start:function(e,t){var i={};i.node=this,i.offsetTop=t.position.top,i.offsetLeft=t.position.left,i.currentTop=t.position.top,i.currentLeft=t.position.left,i.timeline=T._getTimeLineNumber.apply(l,[r,t.position.top]),i.nowTimeline=i.timeline,r=i},drag:function(e,t){if(_(this).data("dragCheck",!0),!r)return!1;var i=_(this),a=i.data("sc_key"),n=T._getTimeLineNumber.apply(l,[r,t.position.top]);return t.position.left=Math.floor(t.position.left/s.widthTimeX)*s.widthTimeX,r.nowTimeline!==n&&(r.nowTimeline=n),r.currentTop=t.position.top,r.currentLeft=t.position.left,T._rewriteBarText.apply(l,[i,d.schedule[a]]),!0},stop:function(){_(this).data("dragCheck",!1),r=null;var e=_(this),t=e.data("sc_key"),i=e.position().left,i=d.tableStartTime+Math.floor(i/s.widthTimeX)*s.widthTime,a=i+(d.schedule[t].endTime-d.schedule[t].startTime);d.schedule[t].start=T.formatTime(i),d.schedule[t].end=T.formatTime(a),d.schedule[t].startTime=i,d.schedule[t].endTime=a,s.onChange&&s.onChange.apply(l,[e,d.schedule[t]])}}),["e"]);return s.resizableLeft&&e.push("w"),t.resizable({handles:e.join(","),grid:[s.widthTimeX,s.timeLineY-s.timeBorder],minWidth:s.widthTimeX,containment:l.find(".sc_main_scroll"),start:function(){_(this).data("resizeCheck",!0)},resize:function(e,t){t.element.height(t.size.height),t.element.width(t.size.width)},stop:function(){var e=_(this),t=e.data("sc_key"),i=e.position().left,a=e.outerWidth(),n=d.tableStartTime+Math.floor(i/s.widthTimeX)*s.widthTime,i=d.tableStartTime+Math.floor((i+a)/s.widthTimeX)*s.widthTime,a=d.schedule[t].timeline;d.schedule[t].start=T.formatTime(n),d.schedule[t].end=T.formatTime(i),d.schedule[t].startTime=n,d.schedule[t].endTime=i,T._resetBarPosition.apply(l,[a]),T._rewriteBarText.apply(l,[e,d.schedule[t]]),e.data("resizeCheck",!1),s.onChange&&s.onChange.apply(l,[e,d.schedule[t]])}}),!1===s.draggable&&t.draggable("disable"),!1===s.resizable&&t.resizable("disable"),o})},_getScheduleCount:function(e){var t,i=_(this),a=T._loadData.apply(i),n=0;for(t in a.schedule)a.schedule[t].timeline===e&&n++;return n},_addRow:function(p,u){return this.each(function(){for(var l=_(this),i=T._loadSettingData.apply(l),s=T._loadData.apply(l),e=l.find(".sc_main .timeline").length,t="",a=_(t+='<div class="timeline"></div>'),n=(u.title&&a.append('<span class="timeline-title">'+u.title+"</span>"),u.subtitle&&a.append('<span class="timeline-subtitle">'+u.subtitle+"</span>"),i.onInitRow&&i.onInitRow.apply(l,[a,u]),l.find(".sc_data_scroll").append(a),t="",_(t+='<div class="timeline"></div>')),d=s.tableStartTime;d<s.tableEndTime;d+=i.widthTime){var o=_('<div class="tl"></div>');o.outerWidth(i.widthTimeX),o.data("time",T.formatTime(d)),o.data("timeline",p),n.append(o)}if(n.find(".tl").on("click",function(){i.onScheduleClick&&i.onScheduleClick.apply(l,[this,_(this).data("time"),_(this).data("timeline"),s.timeline[_(this).data("timeline")]])}),n.find(".tl").on("contextmenu",function(){return i.onScheduleClick&&i.onScheduleClick.apply(l,[this,_(this).data("time"),_(this).data("timeline"),s.timeline[_(this).data("timeline")]]),!1}),l.find(".sc_main").append(n),s.timeline[p]=u,T._saveData.apply(l,[s]),u.class&&""!==u.class&&(l.find(".sc_data .timeline").eq(e).addClass(u.class),l.find(".sc_main .timeline").eq(e).addClass(u.class)),u.schedule)for(var r in u.schedule){var r=u.schedule[r],c=r.start||T.calcStringTime(r.startTime),h=r.end||T.calcStringTime(r.endTime),m={};m.start=c,m.end=h,r.text&&(m.text=r.text),m.timeline=p,m.data={},r.data&&(m.data=r.data),T._addScheduleData.apply(l,[e,m])}T._resetBarPosition.apply(l,[e]),l.find(".sc_main .timeline").eq(e).droppable({accept:".sc_bar",drop:function(e,t){var t=t.draggable,i=t.data("sc_key"),a=s.schedule[i].timeline,n=l.find(".sc_main .timeline").index(this);s.schedule[i].timeline=n,t.appendTo(this),T._resetBarPosition.apply(l,[a]),T._resetBarPosition.apply(l,[n])}}),i.onAppendRow&&l.find(".sc_main .timeline").eq(e).find(".sc_bar").each(function(){var e=_(this),t=e.data("sc_key");i.onAppendRow.apply(l,[e,s.schedule[t]])})})},_rewriteBarText:function(a,n){return this.each(function(){var e=_(this),t=T._loadSettingData.apply(e),e=T._loadData.apply(e),i=a.position().left,e=e.tableStartTime+Math.floor(i/t.widthTimeX)*t.widthTime,i=e+(n.endTime-n.startTime),t=T.formatTime(e)+"-"+T.formatTime(i);_(a).find(".time").html(t)})},_resetBarPosition:function(f){return this.each(function(){for(var e,t,i,a,n,l,s=_(this),d=T._loadSettingData.apply(s),o=s.find(".sc_main .timeline").eq(f).find(".sc_bar"),r=[],c=[],h=0,m=0;m<o.length;m++)r[m]={code:m,x:_(o[m]).position().left};for(r.sort(function(e,t){return e.x<t.x?-1:e.x>t.x?1:0}),m=0;m<r.length;m++){for(t=r[m].code,e=_(o[t]),h=0;h<c.length;h++){for(var p=!1,u=0;u<c[h].length;u++)i=c[h][u],i=_(o[i]),a=e.position().left,l=e.position().left+e.outerWidth(),n=i.position().left,a<i.position().left+i.outerWidth()&&n<l&&(p=!0);if(!p)break}c[h]||(c[h]=[]),e.css({top:h*d.timeLineY+d.timeLinePaddingTop}),c[h][c[h].length]=t}T._resizeRow.apply(s,[f,c.length])})},_resizeRow:function(a,n){return this.each(function(){var e=_(this),t=T._loadSettingData.apply(e),i=Math.max(n,1);e.find(".sc_data .timeline").eq(a).outerHeight(i*t.timeLineY+t.timeLineBorder+t.timeLinePaddingTop+t.timeLinePaddingBottom),e.find(".sc_main .timeline").eq(a).outerHeight(i*t.timeLineY+t.timeLineBorder+t.timeLinePaddingTop+t.timeLinePaddingBottom),e.find(".sc_main .timeline").eq(a).find(".sc_bgBar").each(function(){_(this).outerHeight(_(this).closest(".timeline").outerHeight())}),e.find(".sc_data").outerHeight(e.find(".sc_main_box").outerHeight())})},_resizeWindow:function(){return this.each(function(){var e=_(this),t=T._loadSettingData.apply(e),i=T._loadData.apply(e),a=e.width()-t.dataWidth-t.verticalScrollbar,i=Math.floor((i.tableEndTime-i.tableStartTime)/t.widthTime);e.find(".sc_header_cell").width(t.dataWidth),e.find(".sc_data,.sc_data_scroll").width(t.dataWidth),e.find(".sc_header").width(a),e.find(".sc_main_box").width(a),e.find(".sc_header_scroll").width(t.widthTimeX*i),e.find(".sc_main_scroll").width(t.widthTimeX*i)})},_moveSchedules:function(r,c,h){return this.each(function(){for(var e=_(this),t=T._loadSettingData.apply(e),i=T._loadData.apply(e),a=e.find(".sc_main .timeline").eq(r).find(".sc_bar"),n=0;n<a.length;n++){var l,s,d,o=_(a[n]);c.position().left<=o.position().left&&(l=o.position().left+t.widthTimeX*h,s=Math.floor((i.tableEndTime-i.tableStartTime)/t.widthTime)*t.widthTimeX-o.outerWidth(),o.css({left:Math.max(0,Math.min(l,s))}),l=o.data("sc_key"),d=(s=i.tableStartTime+Math.floor(o.position().left/t.widthTimeX)*t.widthTime)+(i.schedule[l].end-i.schedule[l].start),i.schedule[l].start=T.formatTime(s),i.schedule[l].end=T.formatTime(d),i.schedule[l].startTime=s,i.schedule[l].endTime=d,T._rewriteBarText.apply(e,[o,i.schedule[l]]),t.onChange&&t.onChange.apply(e,[o,i.schedule[l]]))}T._resetBarPosition.apply(e,[r])})},init:function(r){return this.each(function(){for(var e,t,i,a=_(this),n=_.extend({className:"jq-schedule",rows:{},startTime:"07:00",endTime:"19:30",widthTimeX:25,widthTime:600,timeLineY:50,timeLineBorder:1,timeBorder:1,timeLinePaddingTop:0,timeLinePaddingBottom:0,headTimeBorder:1,dataWidth:160,verticalScrollbar:0,bundleMoveWidth:1,draggable:!0,resizable:!0,resizableLeft:!1,onInitRow:null,onChange:null,onClick:null,onAppendRow:null,onAppendSchedule:null,onScheduleClick:null},r),l=(T._saveSettingData.apply(a,[n]),T.calcStringTime(n.startTime)),s=T.calcStringTime(n.endTime),d=(l-=l%n.widthTime,s-=s%n.widthTime,T._saveData.apply(a,[{tableStartTime:l,tableEndTime:s}]),a.append('<div class="sc_menu">\n<div class="sc_header_cell"><span>&nbsp;</span></div>\n<div class="sc_header">\n<div class="sc_header_scroll"></div>\n</div>\n</div>\n<div class="sc_wrapper">\n<div class="sc_data">\n<div class="sc_data_scroll"></div>\n</div>\n<div class="sc_main_box">\n<div class="sc_main_scroll">\n<div class="sc_main"></div>\n</div>\n</div>\n</div>'),a.addClass(n.className),a.find(".sc_main_box").on("scroll",function(){a.find(".sc_data_scroll").css("top",-1*_(this).scrollTop()),a.find(".sc_header_scroll").css("left",-1*_(this).scrollLeft())}),-1),o=l;o<s;o+=n.widthTime)(d<0||Math.floor(d/3600)!==Math.floor(o/3600))&&(e="",e+='<div class="sc_time">'+T.formatTime(o)+"</div>",e=_(e),t=Number(Math.min(3600*Math.ceil((o+n.widthTime)/3600),s)-o),t=Math.floor(t/n.widthTime),e.width(t*n.widthTimeX),a.find(".sc_header_scroll").append(e),d=o);for(i in _(window).on("resize",function(){T._resizeWindow.apply(a)}).trigger("resize"),n.rows)T._addRow.apply(a,[i,n.rows[i]])})}};_.fn.timeSchedule=function(e){return T[e]?T[e].apply(this,Array.prototype.slice.call(arguments,1)):"object"!==_typeof(e)&&e?(_.error("Method "+e+" does not exist on jQuery.timeSchedule"),this):T.init.apply(this,arguments)}}(jQuery);
//# sourceMappingURL=jq.schedule.min.js.map