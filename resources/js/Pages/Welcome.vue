<template>
    <div
        class="min-h-screen bg-gradient-to-br from-pink-300 via-cyan-200 via-yellow-100 to-green-200 animate-[holographic_8s_ease_infinite] font-press2p overflow-x-hidden relative"
    >
        <Header :user="user" />

        <main
            class="window mx-auto mt-10 max-w-4xl shadow-xl border-[3px] border-gray-400 bg-gradient-to-br from-indigo-100 to-purple-100"
        >
            <h1
                class="main-title text-center text-[18px] text-purple-800 mb-4 animate-[pulse_2s_ease-in-out_infinite_alternate]"
            >
                Time Capsule Web
            </h1>

            <div
                class="dialog-box bg-gradient-to-br from-blue-50 to-purple-100 border-2 border-gray-300 p-4 text-[8px] text-blue-900 max-w-xl mx-auto shadow-inner"
            >
                <div
                    class="dialog-header underline text-[12px] text-indigo-900 mb-2"
                >
                    Welcome to the Future! ✨
                </div>
                <div class="dialog-text mb-4 leading-[14px]">
                    Greetings, time traveler! You've entered the most radical
                    digital time capsule experience on the World Wide Web.
                    Create your own time capsule, send messages to the future,
                    or discover treasures from the past.
                </div>
                <div class="flex justify-center flex-wrap gap-3">
                    <button class="retro-btn">Create Capsule</button>
                    <button class="retro-btn">View Capsules</button>
                    <button class="retro-btn">Time Travel</button>
                </div>
            </div>
        </main>

        <Footer />
    </div>
</template>

<script setup>
import Header from "../Components/Header.vue";
import Footer from "../Components/Footer.vue";

defineProps({
    user: Object,
});
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap");

@keyframes holographic {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

@keyframes pulse {
    from {
        text-shadow: 2px 2px 0px #ffb6c1;
    }
    to {
        text-shadow: 2px 2px 8px #ff69b4, 0 0 12px #ff1493;
    }
}

.font-press2p {
    font-family: "Press Start 2P", cursive;
}

.retro-btn {
    background: linear-gradient(145deg, #dda0dd, #da70d6);
    border: 2px outset #c0c0c0;
    padding: 8px 16px;
    font-family: "Press Start 2P", cursive;
    font-size: 8px;
    color: #000080;
    cursor: pointer;
    transition: all 0.1s;
    box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
}

.retro-btn:hover {
    background: linear-gradient(145deg, #ee82ee, #da70d6);
    transform: translateY(-1px);
}

.retro-btn:active {
    border: 2px inset #c0c0c0;
    transform: translateY(1px);
}
</style>
