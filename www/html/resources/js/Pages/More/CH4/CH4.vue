<script setup>
import { Link } from "@inertiajs/vue3";
import { onMounted, ref } from "vue";
import {nextTick} from "vue";
import { Chart, LineController, CategoryScale, LinearScale, PointElement, LineElement, Filler } from "chart.js";

// ✅ Регистрируем Filler
Chart.register(LineController, CategoryScale, LinearScale, PointElement, LineElement, Filler);


let canvas = ref(null);
let chartInstance = ref(null);

let props = defineProps(['dataX', 'dataY']);
let dataX = ref(props.dataX[0]);
let dataY = ref(props.dataY[0]);

const getDataWeek = (interval) => {
    axios.get(route('api.getWeek', {interval: interval}))
        .then( (response) =>{
            console.log(dataX.value)
            dataX.value = response.data['dataX']
            dataY.value = response.data['dataY']
            console.log(dataX.value)
            createLinearChart()
        }).catch( (error) =>{
            console.error('Ошибка запроса: ', error)
        });
}



const createLinearChart = () => {
    if (!canvas.value) return;  // Проверяем, что canvas доступен

    let context = canvas.value.getContext('2d');

    // Если уже есть график, уничтожаем его перед созданием нового
    if (chartInstance.value) {
        chartInstance.value.destroy();
    }

    let data = {
        labels: dataX.value,
        datasets: [{
            label: "CH4 Levels",
            data: dataY.value,
            borderColor: "rgb(47,0,255)",
            backgroundColor: "rgb(26,95,228)",
            borderWidth: 2,
            fill: true,
            pointStyle: false

        }]
    };

    let config = {
        type: 'line',
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    };

    chartInstance.value = new Chart(context, config);
};

const getDate = function (){
    axios.get(route())
}

onMounted(() => {
    createLinearChart();
});
</script>

<template>
    <div class="main-block">
        <div class="btn-block">
            <div class="flex flex-row justify-between basis-1/3 flex-wrap">
                <Link class="btn" :href="route('indications')">НАЗАД</Link>
                <Link class="btn" :href="route('CH4.statistic')">СТАТИСТИКА</Link>
            </div>
            <div class="temp basis-1/2"> </div>
        </div>
        <div class="title text-8xl text-white basis-1/4">CH4</div>
        <!-- Контейнер для графика -->
        <div class="chart-container-parent basis-1/2">
            <div class="chart-container">
                <canvas ref="canvas"></canvas>
            </div>
            <div class="btn-chart">
                <button @click="getDataWeek('1 HOUR')" class="btn">Час</button>
                <button @click="getDataWeek('3 HOUR')" class="btn">4 часа</button>
                <button @click="getDataWeek('12 HOUR')" class="btn">12 часов</button>
                <button @click="getDataWeek('1 DAY')" class="btn">Сутки</button>
                <button @click="getDataWeek('7 DAY')" class="btn">3 суток</button>
                <button @click="getDataWeek('7 DAY')" class="btn">Неделя</button>
                <button @click="getDataWeek('14 DAY')" class="btn">2 недели</button>
                <button @click="getDataWeek('1 MONTH')" class="btn">Месяц</button>
                <button @click="getDataWeek('3 MONTH')" class="btn">3 месяца</button>
                <button @click="getDataWeek('6 MONTH')" class="btn">Пол года</button>
                <button @click="getDataWeek('1 YEAR')" class="btn">Год</button>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss">
.main-block {
    min-height: 80vh;
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    align-items: center;
}

.chart-container-parent{
    flex-basis: 50%;
    display: flex;
    flex-direction: column;
    width: 80%;
    .btn-chart{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        flex-wrap: wrap;
    }
}

.chart-container {

    height: 400px;
}

.btn-block {
    display: flex;
    flex-direction: row;
    position: relative;
    right: 30px;
    bottom: 20px;
    flex-basis: 25%;
    width: 50%;
}

.btn {
    background: linear-gradient(to bottom, #000000, #2783ca);
    padding: 0 20px;
    height: 30px;
    margin-top: 20px;
    color: #757575;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    width: fit-content;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(10px);
    color: #ffffff;
}

.title{
    text-shadow: 1px 1px 5px #FFFFFF;
    display: flex;
    text-align: start;
    flex-basis: 25%;

}


</style>
