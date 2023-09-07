<?php $TEMPLATE = 'main'; ?>


<link rel="stylesheet" href="/public/assets/css/schedule.css">

<h1>Schedule</h1>

<style>

    #logs{
        border: solid 1px #bbb;
        padding: 16px;
        background: #eee;
    }
    #logs .table{
        margin-bottom: 0;
    }
    #logs .table td,
    #logs .table th{
        border: none;
    }
    #schedule .sc_bar_insert{
        background-color: #ff678a;
    }
    #schedule .example2{
        background-color: #3eb698;
    }
    #schedule .example3{
        color: #2c0000;
        font-weight: bold;
        background-color: #c7ae50;
    }
    #schedule .sc_bar.sc_bar_photo .head,
    #schedule .sc_bar.sc_bar_photo .text{
        padding-left: 60px;
    }
    #schedule .sc_bar.sc_bar_photo .photo{
        position: absolute;
        left: 10px;
        top: 10px;
        width: 38px;
    }
    #schedule .sc_bar.sc_bar_photo .photo img{
        max-width: 100%;
    }
</style>


<div class="container">

    <div style="padding: 0 0 12px;">
        <button id="event_timelineData" class="btn btn-info" style="margin-bottom: 12px;">timelineData()</button>
        <button id="event_scheduleData" class="btn btn-info" style="margin-bottom: 12px;">scheduleData()</button>
        <button id="event_setDraggable" class="btn btn-info" style="margin-bottom: 12px;">toggleDraggable</button>
        <button id="event_setResizable" class="btn btn-info" style="margin-bottom: 12px;">toggleResizable</button>
        <button id="event_resetData" class="btn btn-danger" style="margin-bottom: 12px;">resetData()</button>
        <button id="event_resetRowData" class="btn btn-danger" style="margin-bottom: 12px;">resetRowData()</button>
    </div>
    <h3>Ajax</h3>
    <div style="padding: 0 0 12px;">
        <button class="btn btn-info ajax-data" data-target="1.json" style="margin-bottom: 12px;">ajax1()</button>
        <button class="btn btn-info ajax-data" data-target="2.json" style="margin-bottom: 12px;">ajax2()</button>
        <button class="btn btn-info ajax-data" data-target="3.json" style="margin-bottom: 12px;">ajax3()</button>
    </div>
    <div style="padding: 0 0 40px;">
        <div id="schedule"></div>
        <div class="row">
            <div class="col-md-8">
                <h3>Log</h3>
            </div>
            <div class="col-md-4 text-right">
                <a class="btn btn-default" style="margin-top: 16px;" id="clear-logs">clear</a>
            </div>
        </div>
        <div style="padding: 12px 0 0;">
            <div id="logs" class="table-responsive"></div>
        </div>
    </div>


</div>



<script src="/public/assets/js/jQuery.js"></script>
<script src="/public/assets/js/jQuery-ui.js"></script>
<script src="/public/assets/js/bootstrap.js"></script>
<script src="/public/assets/js/schedule.js"></script>

<script defer type="text/javascript">
    function addLog(type, message){
        var $log = $('<tr />');
        $log.append($('<th />').text(type));
        $log.append($('<td />').text(message ? JSON.stringify(message) : ''));
        $("#logs table").prepend($log);
    }
    $(function(){
        $("#logs").append('<table class="table">');
        var isDraggable = true;
        var isResizable = true;
        var $sc = $("#schedule").timeSchedule({
            startTime: "07:00", // schedule start time(HH:ii)
            endTime: "21:00",   // schedule end time(HH:ii)
            widthTime: 60 * 10,  // cell timestamp example 10 minutes
            timeLineY: 60,       // height(px)
            verticalScrollbar: 20,   // scrollbar (px)
            timeLineBorder: 2,   // border(top and bottom)
            bundleMoveWidth: 6,  // width to move all schedules to the right of the clicked time line cell
            draggable: isDraggable,
            resizable: isResizable,
            resizableLeft: true,
            rows : {
                '0' : {
                    title : 'Title Area1',
                    schedule:[
                        {
                            start: '09:00',
                            end: '12:00',
                            text: 'Text Area',
                            data: {
                            }
                        },
                        {
                            start: '11:00',
                            end: '14:00',
                            text: 'Text Area',
                            data: {
                            }
                        }
                    ]
                },
                '1' : {
                    title : 'Title Area2',
                    schedule:[
                        {
                            start: '16:00',
                            end: '17:00',
                            text: 'Text Area',
                            data: {
                            }
                        }
                    ]
                }
            },
            onChange: function(node, data){
                addLog('onChange', data);
            },
            onInitRow: function(node, data){
                addLog('onInitRow', data);
            },
            onClick: function(node, data){
                addLog('onClick', data);
            },
            onAppendRow: function(node, data){
                addLog('onAppendRow', data);
            },
            onAppendSchedule: function(node, data){
                addLog('onAppendSchedule', data);
                if(data.data.class){
                    node.addClass(data.data.class);
                }
                if(data.data.image){
                    var $img = $('<div class="photo"><img></div>');
                    $img.find('img').attr('src', data.data.image);
                    node.prepend($img);
                    node.addClass('sc_bar_photo');
                }
            },
            onScheduleClick: function(node, time, timeline){
                var start = time;
                var end = $(this).timeSchedule('formatTime', $(this).timeSchedule('calcStringTime', time) + 3600);
                $(this).timeSchedule('addSchedule', timeline, {
                    start: start,
                    end: end,
                    text:'Insert Schedule',
                    data:{
                        class: 'sc_bar_insert'
                    }
                });
                addLog('onScheduleClick', time + ' ' + timeline);
            },
        });
        $('#event_timelineData').on('click', function(){
            addLog('timelineData', $sc.timeSchedule('timelineData'));
        });
        $('#event_scheduleData').on('click', function(){
            addLog('scheduleData', $sc.timeSchedule('scheduleData'));
        });
        $('#event_resetData').on('click', function(){
            $sc.timeSchedule('resetData');
            addLog('resetData');
        });
        $('#event_resetRowData').on('click', function(){
            $sc.timeSchedule('resetRowData');
            addLog('resetRowData');
        });
        $('#event_setDraggable').on('click', function(){
            isDraggable = !isDraggable;
            $sc.timeSchedule('setDraggable', isDraggable);
            addLog('setDraggable', isDraggable ? 'enable' : 'disable');
        });
        $('#event_setResizable').on('click', function(){
            isResizable = !isResizable;
            $sc.timeSchedule('setResizable', isResizable);
            addLog('setResizable', isResizable ? 'enable' : 'disable');
        });
        $('.ajax-data').on('click', function(){
            $.ajax({url: './data/'+$(this).attr('data-target')})
                .done( (data) => {
                    addLog('Ajax GetData', data);
                    $sc.timeSchedule('setRows', data);
                });
        });
        $('#clear-logs').on('click', function(){
            $('#logs .table').empty();
        });
    });
</script>