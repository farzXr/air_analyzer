<script setup>
import {onMounted, ref} from "vue";

    let data = ref();
    const getData = async function (){
        const response = await fetch('http://localhost:8080/testWs/getData');
        data.value = await response.json();
        console.log(data)
    }

    onMounted(() => {
        getData();
    })
</script>

<template>
    <div>
        <div v-for="item in data">{{item.id}}:{{item.message}}</div>
    </div>
</template>

<style scoped>

</style>
