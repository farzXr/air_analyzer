<script setup>
import {ref} from "vue";
window.Echo.channel('test-ws').listen('.test_ws', res => {
    console.log('пришло сообщение');
})

const message = ref('');

const store = () => {
    axios.post('http://localhost:8080/testWs/sendData', {message: message.value}).then(response => {
        console.log(response);
    })
}

</script>

<template>
    <div>
        <input type="text" v-model="message">
        <button @click.prevent="store" type="submit">Send</button>
    </div>
</template>

<style scoped>

</style>
