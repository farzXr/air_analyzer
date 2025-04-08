<script setup>
import {onMounted} from "vue";
import {Link} from "@inertiajs/vue3";



const login = function () {
    console.log("Login function called"); // Проверка, что функция вызывается
    axios.get(route('indications'))
        .then(response => {
            console.log("Response:", response.data); // Логируем ответ
        })
        .catch(error => {
            console.error("Error:", error); // Логируем ошибку
        });
}

</script>

<template>
    <div>
        <div class="main flex flex-col ml-20 mt-10">
            <div class="btn-block">
                <div class="flex flex-row justify-between basis-1/2 flex-wrap">
                    <Link class="btn " >ВХОД</Link>
                    <Link class="btn " >РЕГИСТРАЦИЯ</Link>
                    <Link class="btn " >О НАС</Link>
                    <Link class="btn " :href="route('indications')">ПОКАЗАНИЯ</Link>
                </div>
                <div class="temp basis-1/4"> </div>
            </div>
            <div class="title-block w-30 mt-30 ml-30">
                <div class="flex">
                    <div>
                        <div class="title text-9xl text">
                            <article>
                                <h1>Air-analyzer</h1>
                            </article>
                        </div>
                        <div class="under-title text"> by TECNOCRAT</div>
                    </div>
                    <div> <img class="" src="./images/image7.png"> </div>
                </div>
                <div>
                    <div class="text-9xl">&#x200b</div>
                </div>
            </div>
        </div>
        <div class="footer">
        </div>
    </div>
</template>

<style scoped>

.btn-block{
    display: flex;
    flex-direction: row;
    justify-content: space-around;
}

.btn{
    background: linear-gradient(to bottom, #000000, #2783ca);
    padding: 0 20px 0 20px;
    height: 30px;
    margin-top: 10px;
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
    margin-top: 10px;
    color: #FFFFFF;
    border: #FFFFFF;
    border-radius: 5px;
    transition-duration: 500ms;
    font-family: ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
}
.title{
     padding: 0 50px 30px 0;
     width: fit-content;
     font-size: 11rem; /* Размер текста */
     font-weight: bold; /* Жирный шрифт */
     background: linear-gradient(140deg, #ffffff, #0000ff); /* Градиент */
     -webkit-text-fill-color: transparent; /* Убираем цвет текста */
     background-clip: text; /* Для других браузеров */
     text-fill-color: transparent; /* Убираем цвет текста для других браузеров */

     box-shadow: 2px 2px 30px #00081e;
 }
.title-block{
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    margin-top: 150px;
    padding: 0 50px 30px 20px;
}
.under-title{
    color: #FFFFFF;
    text-align: end;
    font-size: 2rem; /* Размер текста */
    background: linear-gradient(140deg, #ffffff, #ffffff); /* Градиент */
    -webkit-text-fill-color: transparent; /* Убираем цвет текста */
    background-clip: text; /* Для других браузеров */
    text-fill-color: transparent; /* Убираем цвет текста для других браузеров */
    text-shadow: 1px 1px 18px #FFFFFF;
    margin: 20px -40px 20px 20px;

}

@property --＠color-1 {
    syntax: "<color>";
    inherits: false;
    initial-value: hsl(98 100% 62%);
}

@property --＠color-2 {
    syntax: "<color>";
    inherits: false;
    initial-value: hsl(204 100% 59%);
}

/* keyframes that change the color variable */
@keyframes gradient-change {
    to {
        --＠color-1: hsl(210 100% 59%);
        --＠color-2: hsl(310 100% 59%);
    }
}

article {
    /* apply variable changes over time */
    animation: gradient-change 5s linear infinite alternate;

    background: linear-gradient(
        /*
          in oklch produces more vibrant gradient results
          learn more https://developer.chrome.com/docs/css-ui/access-colors-spaces#color_interpolation
        */
        to right in oklch,
            /* use the variables in a gradient (or wherever!) */
        var(--＠color-1),
        var(--＠color-2)
    );

    /* old browser support */
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;

    /* modern browser version */
    background-clip: text;
    color: transparent;
}


@layer demo.support {
    h1 {
        padding-bottom: 40px;
        font-size: 10vmin;
        line-height: 1.1;
    }

    h1, p{
        margin: 0;
        text-wrap: balance;
    }

    h1 {
        line-height: 1.25cap;
    }

    p {
        font-family: "Dank Mono", ui-monospace, monospace;
    }



    article {
        display: grid;
        gap: 1lh;
        text-align: center;
    }
}
</style>
