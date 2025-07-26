<template>
    <div
        class="taskbar fixed bottom-0 left-0 right-0 bg-gradient-to-b from-gray-300 to-gray-400 border-t-2 border-gray-300 h-[30px] flex items-center px-2 gap-2 shadow-[0_-2px_4px_rgba(0,0,0,0.2)] text-[8px] font-bold"
    >
        <button
            class="start-btn bg-gradient-to-br from-gray-300 to-gray-400 border-2 border-gray-300 px-3 py-1 hover:scale-95 active:border-inset"
        >
            Start
        </button>
        <span>Time Capsule Web - Microsoft Internet Explorer</span>
        <span
            class="ml-auto bg-gray-300 border border-gray-400 px-2 py-1"
            id="taskbar-time"
            >{{ currentTime }}</span
        >
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";

const currentTime = ref("");

const updateTime = () => {
    const now = new Date();
    currentTime.value = now.toLocaleTimeString("pt-BR", {
        hour: "2-digit",
        minute: "2-digit",
    });
};

onMounted(() => {
    updateTime();
    setInterval(updateTime, 1000);
});
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap");

.start-btn {
    font-family: "Press Start 2P", cursive;
    font-size: 8px;
}
</style>
