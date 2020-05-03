<template>
    <div>
        <div id="dashboards">
            <div class="dashboard">

                <div class="scene">
                    <div class="cube">
                        <div id="general" class="cube__face cube__face--front">General Dashboard</div>
                        <div id="morning" class="cube__face cube__face--back">Morning Dashboard</div>
                        <div class="cube__face cube__face--right"></div>
                        <div class="cube__face cube__face--left"></div>
                        <div id="day" class="cube__face cube__face--top">Day Dashboard</div>
                        <div id="night" class="cube__face cube__face--bottom">
                            <digital-clock :blink="true" :displaySeconds="true" />
                        </div>
                    </div>
                </div>

<!--                <div class="clearfix"></div>-->

            </div>
        </div>


        <p>Hi</p>
    </div>
</template>

<script>
    export default {
        name: "DashboardComponent.vue"
    }
</script>

<style scoped>

    #dashboards {
        margin: 0 auto;
    }

    .scene {
        width: 600px;
        height: 350px;
        margin: 50px 80px auto 100px;
        perspective: 300px;
        float: left;
    }

    .cube {
        width: 600px;
        height: 300px;
        position: relative;
        transform-style: preserve-3d;
        transform: translateZ(-110px);
        transition: transform 1s;
    }

    .cube.show-front {
        transform: translateZ(-110px) rotateY(0deg);
    }

    .cube.show-right {
        transform: translateZ(-110px) rotateY(-90deg);
    }

    .cube.show-back {
        transform: translateZ(-110px) rotateX(-180deg);
    }

    .cube.show-left {
        transform: translateZ(-110px) rotateY(90deg);
    }

    .cube.show-top {
        transform: translateZ(-110px) rotateX(-90deg);
    }

    .cube.show-bottom {
        transform: translateZ(-110px) rotateX(90deg);
    }

    .cube__face {
        position: absolute;
        line-height: 300px;
        font-size: 40px;
        font-weight: bold;
        color: white;
        text-align: center;
    }

    .cube__face--front {
        background: hsla(0, 12%, 51%, 0.95);
        width: 600px;
        height: 300px;
    }

    .cube__face--right {
        background: hsla(60, 8%, 20%, 0.7);
        width: 300px;
        height: 300px;
    }

    .cube__face--back {
        background: hsla(40, 53%, 36%, 0.95);
        width: 600px;
        height: 300px;
    }

    .cube__face--left {
        background: hsla(60, 8%, 20%, 0.7);
        width: 300px;
        height: 300px;
    }

    .cube__face--top {
        background: hsla(242, 17%, 73%, 0.95);
        width: 600px;
        height: 300px;
    }

    .cube__face--bottom {
        background: hsla(300, 10%, 25%, 0.95);
        width: 600px;
        height: 300px;
    }

    .cube__face--front {
        transform: rotateY(0deg) translateZ(150px);
    }

    .cube__face--right {
        transform: rotateY(90deg) translateZ(450px);
    }

    .cube__face--back {
        transform: rotateY(180deg) translateZ(150px) rotate(180deg);;
    }

    .cube__face--left {
        transform: rotateY(-90deg) translateZ(150px);
    }

    .cube__face--top {
        transform: rotateX(90deg) translateZ(150px);
    }

    .cube__face--bottom {
        transform: rotateX(-90deg) translateZ(150px);
    }

    label {
        margin-right: 10px;
    }

</style>
