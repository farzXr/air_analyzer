<script setup>

import {onMounted, ref, computed, onUnmounted} from "vue";
import {useWebSocket, closeWebSocket} from "./websocket.js";
import {Link} from "@inertiajs/vue3";
import parse from "postcss/lib/parse";

//const props = defineProps(['indications_list']);
//const indications = props.indications_list;

// URL WebSocket-сервера (замени на свой)

const indications = ref({
    '0': {'name': 'CH4', 'unit': 'ppm', 'value': 0},
    '1': {'name': 'CO2', 'unit': 'ppm', 'value': 30},
    '2': {'name': 'CO', 'unit': 'ppm', 'value': 60},
    '3': {'name': 'TVOC', 'unit': 'мг/м³', 'value': 50},
    '4': {'name': 'HCHO', 'unit': 'мг/м³', 'value': 80},
    '5': {'name': 'температура', 'unit': '', 'value': 50},
    '6': {'name': 'влажность', 'unit': '', 'value': 100},
    '7': {'name': 'PM', 'unit': 'мг/м³', 'value': 50}
});

const setX = ref(50*1.2); // Динамический параметр

const trianglePoints = (value) => {
    const xOffset = value * 1.2;
    return `${50 + xOffset},33 ${40 + xOffset},55 ${60 + xOffset},55`;
};

const backGradient = (value) =>{
    console.log(value)
    return `linear-gradient(to top, rgb(${39 + value}, 131, 202), rgb(228, ${254 - value*2}, ${119 - value}))`;
}

//<div class="title text-white text-9xl">Indications</div>
const socket = useWebSocket();

socket.onmessage = (event) => {
    console.log("📩 Получено сообщение:", event.data);
    const data = JSON.parse(event.data)
    indications.value["0"].value = data.ch4
    indications.value["1"].value = data.co2
    indications.value["2"].value = data.co
    indications.value["3"].value = data.tvoc
    indications.value["4"].value = data.hcho
    indications.value["5"].value = data.temperature
    indications.value["6"].value = data.humidity
    indications.value["7"].value = data.pm

    /*for (const [key, value] of Object.entries(data)){
        console.log(key, value)
        Object.entries(indications.value).forEach(([key, data]) => {
            if(key )
            console.log(`ID: ${key}, ${data.name}: ${data.value}${data.unit}`);
        });
        break
    }*/
};


</script>

<template>
   <div class="main-block">


       <div class="el indication-list mt-10 ml-56 mr-56">
           <div class="btn-block">
               <div class="flex flex-row justify-between basis-1/2 flex-wrap">
                   <Link class="btn " href="/">НАЗАД</Link>
               </div>
               <div class="temp basis-1/4"> </div>
           </div>
           <div class="title text-7xl text-transparent">.</div>
            <div class="indication-list-under ">
                <div v-for="indication in indications" class="flex flex-row text-white text-3xl basis-1/4 mt-10 justify-center">
                    <div class="indication-content">
                        <div class="border-unit">
                            <Link :href="route(indication['name'])">
                                <div class="unit" :style="{ background: backGradient(indication['value']) }">
                                    <div>{{Math.floor(indication['value'])}}</div>
                                    <div class="under-unit">{{indication['unit']}}</div>
                                </div>
                            </Link>
                        </div>
                        <div class="level">
                            <svg class="svg-lavel">

                                <defs>
                                    <linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                                        <stop offset="0%" style="stop-color:#2783ca; stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#e4fe77; stop-opacity:1" />
                                    </linearGradient>
                                </defs>

                                <rect width="40" height="10" x="45" y="15" fill="green" stroke="#000"/>
                                <rect width="40" height="10" x="90" y="15" fill="yellow" stroke="#000"/>
                                <rect width="40" height="10" x="135" y="15" fill="red" stroke="#000"/>
                                <svg width="500" height="50">
                                    <polygon :points="trianglePoints(indication['value'])" fill="lightblue" stroke="black" stroke-width="2px" />
                                </svg>
                            </svg>
                        </div>
                        <div class="">{{indication['name']}}</div>
                    </div>
                </div>
            </div>
       </div>
   </div>
</template>

<style scoped lang="scss">


    .main-block{
        display: flex;
        flex-direction: column;
    }

    .title{

    }



    .indication-list-under{
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        flex-wrap: wrap;
    }

    .indication-content{
        color: #000000;
        font-family: Courier, monospace;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        border: 1px solid;
        text-align: center;
        height: 320px;
        width: 220px;

        background: #FFFFFF;
        border-radius: 10%;
    }

    .border-unit{
        font-weight: bold;
        display: flex;
        justify-content: center;
        text-align: center;
    }

    .unit{
        border: 1px solid;
        font-size: 24pt;

        display: flex;
        flex-direction: column;
        justify-content: center;
        height: 120px;
        width: 120px;
        border-radius: 100%;
        transition: all 0.5s ease;
        box-shadow: 3px 3px 18px #000000;
        .under-unit{
            font-weight: normal;
            font-size: 14pt;
        }
    }
    .unit:hover{
        transform: scale(1.1);
        box-shadow: 5px 5px 18px #000000;
    }

    .btn{
        margin-left: 20px;
        margin-right: 20px;
        background: linear-gradient(45deg, #dbfffa, #87d5f4);
        border-radius: 10pt;

        padding-left: 10px;
        padding-right: 10px;
        box-shadow: 1px 1px 3px #000000;
    }
    .el{

    }

    .level{
        height: 50px;
        .svg-level{
            max-height: 50px;
        }
    }

    .btn-block{
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        position: relative;
        right: 30px;
        bottom: 20px;
    }

    .btn{
        background: linear-gradient(to bottom, #000000, #2783ca);
        padding: 0 20px 0 20px;
        height: 30px;
        margin-top: 20px;
        color: #757575;
        border: #FFFFFF;
        border-radius: 5px;
        font-family: ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-weight: bold;
        width: fit-content;
    }
    .btn:hover{
        background: linear-gradient(to bottom, #000000, #2783ca);
        transform: translateY(10px);
        height: 30px;
        margin-top: 20px;
        color: #FFFFFF;
        border: #FFFFFF;
        border-radius: 5px;
        transition-duration: 500ms;
        font-family: ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }
</style>
