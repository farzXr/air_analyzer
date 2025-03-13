<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const columnNames = ref([]);  // Названия колонок
const tableData = ref([]);  // Данные таблицы
const paginationLinks = ref("");  // HTML-ссылки для пагинации

// Функция для загрузки данных
const fetchData = async (url = "/co/api/table") => {
    try {
        const response = await axios.get(url);
        columnNames.value = response.data.columnNames;
        tableData.value = response.data.allTable.data;
        paginationLinks.value = response.data.allTable.links; // Ожидается, что сервер возвращает HTML-ссылки
    } catch (error) {
        console.error("Ошибка загрузки данных:", error);
    }
};

// Загружаем данные при монтировании компонента
onMounted(() => {
    fetchData();
});
</script>

<template>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th v-for="col in columnNames" :key="col">{{ col }}</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(row, index) in tableData" :key="index">
                <th v-for="col in columnNames" :key="col" :scope="col === 'id' ? 'row' : ''">
                    {{ row[col] }}
                </th>
            </tr>
            </tbody>
        </table>

        <!-- Пагинация -->
        <div class="pagination" v-html="paginationLinks" style="display: flex; justify-content: center"></div>
    </div>
</template>
