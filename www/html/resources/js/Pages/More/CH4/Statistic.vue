<script setup>
import {onBeforeMount, onMounted, ref} from "vue";
import {Link} from "@inertiajs/vue3";


let paramAxiosGet = [
    '1 HOUR',
    '4 HOUR',
    '12 HOUR',
    '1 DAY',
    '3 DAY',
    '1 WEEK',
    '2 WEEK',
    '1 MONTH',
    '3 MONTH',
    '6 MONTH',
    '1 YEAR',
]

let data = ref(null)
const getData = async function () {
    await axios.post(route('getStatistic'), {intervals: paramAxiosGet})
        .then( (response) => {
            data.value = response.data
        })
        .catch( (error) => {
            console.log('Ошибка ', error)
        })

    console.log(data.value)
}

let paramsType = [
    {key: 'average', label: 'Среднее', unit: 'ppm'},
    {key: 'maximum', label: 'Максимальное', unit: 'ppm'},
    {key: 'minimum', label: 'Минимальное', unit: 'ppm'},
    {key: 'summary', label: 'Время в red zone', unit: 'мин.'},
]

let paramsTime = [
    {key: '1 HOUR', label: 'час'},
    {key: '4 HOUR', label: '4 часа'},
    {key: '12 HOUR', label: '12 часов'},
    {key: '1 DAY', label: 'сутки'},
    {key: '3 DAY', label: '3 суток'},
    {key: '1 WEEK', label: 'неделю'},
    {key: '2 WEEK', label: '2 недели'},
    {key: '1 MONTH', label: 'месяц'},
    {key: '3 MONTH', label: '3 месяца'},
    {key: '6 MONTH', label: 'пол года'},
    {key: '1 YEAR', label: 'год'},
]

onBeforeMount( () => {
    getData();
})
</script>

<template>
    <div class="main-block">
        <div class="nav text-white">
            <div class="btn-block">
                <div class="btn-block-under">
                    <Link class="btn" :href="route('CH4')">НАЗАД</Link>
                </div>
                <div class="temp text-transparent">.</div>
            </div>
        </div>

        <div class="content text-white">
            <div class="title"></div>
            <div class="statistic">

                <div v-for="type in paramsType" class="statistic-group avg">
                    <div class="statistic-group-title text-dark">{{type.label}} CH4</div>
                    <div class="statistic-group-content">

                        <div v-for="(time, index) in paramsTime" class="stat stat1 ">
                            <div class="stat-block">
                                <div class="stat-title">{{ type.label }} за {{time.label}}</div>
                                <div v-if="data">
                                    <div class="stat-content">
                                        <div class="value">{{data[time.key][type.key]}}</div>
                                        <div class="unit">{{type.unit}}</div>
                                    </div>
                                </div>
                                <div v-else>Загрузка...</div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="footer text-white text-5xl">Footer</div>
    </div>
</template>

<style scoped lang="scss">
    .main-block{
        margin: 0;
        padding: 0;
        position: relative;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        .nav{
            max-width: 90%;
            position: relative;
            left: 10%;
            flex: 0 0 20%;
        }
        .content{
            flex: 0 0 60%;
            display: flex;
            flex-direction: column;
            justify-content: center;




            .statistic{
                display: flex;
                flex-direction: column;

                .statistic-group{
                    margin-top: 100px;
                    display: flex;
                    flex-direction: column;
                    .statistic-group-title{
                        position: relative;
                        left: 10%;
                        margin: 10px;
                        padding: 10px;
                        background: #abccff;
                        width: fit-content;
                        font-size: 24pt;
                    }
                    .statistic-group-content{
                        max-width: 90%;
                        position: relative;
                        left: 10%;
                        display: flex;
                        flex-direction: row;

                        flex-wrap: wrap;
                        .stat{
                            display: flex;
                            flex-direction: column;
                            justify-content: center;
                            background: #0a58ca;
                            padding: 10px 20px 10px 20px;
                            margin: 10px;
                            .stat-content{
                                font-size: 28pt;
                                display: flex;
                                flex-direction: row;
                                .unit{
                                    display: flex;
                                    flex-direction: column;
                                    justify-content: end;
                                    font-size: 15px;
                                    margin: 5px;
                                }
                            }
                        }
                    }
                }
            }
            .title{

            }
        }
        .footer{
            flex: 0 0 20%;
            color: transparent;
        }
    }


    .btn-block {
        display: flex;
        flex-direction: row;
        .btn-block-under{
            flex-basis: 50%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        .temp{
            flex-basis: 50%;
        }
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

</style>
