<script setup>
import {ref, onMounted} from "vue";

// Создаем реактивные переменные
const type = ref(localStorage.getItem("type") || "AVG 1 week");
const statistic = ref(localStorage.getItem("statistic") || "CO: 34.54ppm");

// Функция для обработки кликов по ссылкам
const fetchStatistics = async (url) => {
    try {
        const response = await fetch(url);
        const data = await response.json();

        type.value = data.type;
        statistic.value = `CO - ${data.statistic.toFixed(2)} ppm`;

        // Сохраняем в localStorage
        localStorage.setItem("type", type.value);
        localStorage.setItem("statistic", statistic.value);
    } catch (error) {
        console.error("Ошибка:", error);
    }
};

// После загрузки страницы навешиваем события на ссылки
onMounted(() => {
    document.querySelectorAll(".submenu a").forEach((link) => {
        link.addEventListener("click", (event) => {
            event.preventDefault();
            fetchStatistics(link.getAttribute("href"));
        });
    });
});
</script>

<template>
    <div style="text-align: center;">
        <h4 class="u-align-center u-text u-text-default u-text-1">{{ type }}</h4>
        <h4 class="u-align-center u-text u-text-default u-text-2">{{ statistic }}</h4>
    </div>
</template>
