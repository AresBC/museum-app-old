<?php $TEMPLATE = 'main'; ?>


<div class="container" style="height: 100vh">
    <div class="row">
        <div class="col-12" style="margin: 5rem 0 3rem">
            <h1>Space Nerd - Museum</h1>
        </div>
        <div class="col-12">
            <iframe id="title-video" width="560" height="315"
                    src="https://www.youtube.com/embed/LE0jrUBRHkk?autoplay=1;controls=0;mute=0"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
        </div>
    </div>
</div>


<canvas style="background-color: #0a1128" id="kaleidoscope"></canvas>
<script>const exports = {};</script>
<script src="/public/assets/js/kaleidoscope.js"></script>
<script>
    window.onload = function () {
        new Kaleidoscope({
            selector: '#kaleidoscope',
            // edge: 6,
            edge: 3,
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
            quantity: 20,
            // quantity: 50,
            // speed: 5,
            speed: 0.5,
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
        position: fixed;
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
        max-width: 80vh;
        max-height: 45vh;
    }

    #rocket {
        display: block;
        height: 80vh;
        margin: 10vh auto;
    }
</style>


<div style="background-color: #080e21; padding: 50vh 0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>
                    Die neue Arianne 6 Ausstellung
                </h2>
            </div>
            <div class="col-12">
                <p>
                    In unserer neuen Ausstellung geht es um die Arianne 6 der esa.
                    <br>
                    <br>
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                    labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
                    et
                    ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                </p>
            </div>
        </div>
    </div>
</div>

<img id="rocket" src="/public/assets/img/ariane.png" alt="Ariane">

<div style="background-color: #080e21; padding: 30vh 0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>
                    Ausstellung zum Thema "Softwarefehler in der Luft- und Raumfahrt"
                </h2>
            </div>
            <div class="col-12">
                <p>
                    Beim Kampfflugzeug F-16 brachte der Autopilot das Flugzeug in Rückenlage, wenn der Äquator
                    überflogen
                    wurde. Dies kam daher, dass man keine „negativen“ Breitengrade als Eingabedaten bedacht hatte.
                    Dieser
                    Fehler wurde sehr spät während der Entwicklung der F-16 mithilfe eines Simulators entdeckt und
                    beseitigt.
                </p>
                <p>
                    Am 4. Juni 1996 sprengte sich die erste Ariane-5-Rakete (Startnummer V88) der Europäischen
                    Raumfahrtbehörde 40 Sekunden nach dem Start in vier Kilometern Höhe automatisch. Der Programmcode
                    für
                    (unter anderem) die Vorstart-Ausrichtung war von der Ariane 4 übernommen worden, lief unnötigerweise
                    auch nach dem Start weiter und funktioniert dabei nur in einem von der Ariane 4 nicht
                    überschreitbaren
                    Bereich der Horizontalgeschwindigkeit. Als dieser Bereich von der Ariane 5 verlassen wurde, da sie
                    höhere Horizontalgeschwindigkeiten erreicht als die Ariane 4, schlug der Fehler auf die
                    Trägheits-Steuersysteme durch und diese schalteten sich weitgehend ab. Bei der Programmierung war es
                    zu
                    einem Fehler bei der Typumwandlung gekommen. Als von Float nach Integer umgewandelt wurde und der
                    Wert
                    32.768 erreichte, entstand ein Überlauf.[2] Dieser Überlauf hätte durch die verwendete
                    Programmiersprache Ada eigentlich entdeckt und behandelt werden können. Diese
                    Sicherheitsfunktionalität
                    ließen die Verantwortlichen jedoch abschalten. Der Schaden betrug etwa 370 Millionen US-Dollar.
                </p>
                <p>
                    1999 verpasste die NASA-Sonde Mars Climate Orbiter den Landeanflug auf den Mars, weil die
                    Programmierer
                    unterschiedliche Maßsysteme verwendeten (ein Team verwendete das metrische und das andere das
                    angloamerikanische) und beim Datenaustausch es so zu falschen Berechnungen kam. Eine Software wurde
                    so
                    programmiert, dass sie sich nicht an die vereinbarte Schnittstelle hielt, in der die metrische
                    Einheit
                    Newton × Sekunde festgelegt war.[3] Die NASA verlor dadurch die Sonde.
                </p>
                <p>
                    Beim Start der als Nachfolger der Delta 2 geplanten neuen Delta-3-Rakete 1998 geriet diese 75
                    Sekunden
                    nach dem Start in Schräglage zur Flugrichtung und musste gesprengt werden. Die Steuersoftware war
                    aus
                    der Delta 2 übernommen worden, was aber zu einer falschen Interpretation bezüglich einer
                    4-Hz-Eigenschwingung in Rollrichtung innerhalb der hydraulischen Steuersysteme der Booster-Raketen
                    führte.
                </p>
                <p>
                    Das mehrere hundert Millionen Euro teure Weltraumteleskop Hitomi geriet Ende März 2016 nach einer
                    Verkettung von Softwarefehlern in zu schnelle Rotation und ging verloren. Die Software war
                    fälschlicherweise von einer unerwünschten langsamen Rotation des Satelliten ausgegangen und
                    versuchte,
                    die scheinbare Drehung durch Gegenmaßnahmen zu kompensieren. Die Signale der redundanten
                    Kontrollsysteme
                    wurden falsch gedeutet, und schließlich wurde der Satellit immer stärker in Rotation versetzt, bis
                    er
                    wegen der zu groß werdenden Fliehkräfte schließlich zerbrach.
                </p>
            </div>
        </div>
    </div>
</div>