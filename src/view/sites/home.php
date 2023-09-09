<?php $TEMPLATE = 'main'; ?>


<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Space Nerds</h1>
        </div>
    </div>
</div>

<iframe id="title-video" width="560" height="315" src="https://www.youtube.com/embed/LE0jrUBRHkk?si=3DTHJcqWig-ZrDlg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>


<canvas style="background-color: #0a1128" id="kaleidoscope"></canvas>
<script>const exports = {};</script>
<script src="/public/assets/js/kaleidoscope.js"></script>
<script>
    window.onload = function () {
        new Kaleidoscope({
            selector: '#kaleidoscope',
            edge: 6,
            shapes: [
                'circle',
                // 'square',
                // 'wave',
                'star',
                // 'drop',
                // 'oval',
                // 'triangle',
                // 'star',
                // 'circle',
                // 'square'
            ],
            minSize: 5,
            maxSize: 100,
            color: ['#001F54', '#034078', '#1282A2', '#F9F4E0'],
            globalCompositeOperation: 'multiply',
            quantity: 50,
            speed: 5,
        });
    };
</script>
<style>
    * {
        color: white;
    }

    h1 {
        text-align: center;
    }

    #kaleidoscope {
        position: absolute;
        display: block;
        top: 0;
        left: 0;
        z-index: -100;
    }

    #title-video {
        position: relative;
        display: block;
        margin: auto;
        width: 80vw;
        height: 45vw;
        max-height: 60vh;
    }
</style>


<div class="container">
    <div class="row">
        <div class="col-4">
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
            clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
        </div>
    </div>
</div>