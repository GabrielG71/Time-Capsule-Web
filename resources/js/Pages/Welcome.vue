<template>
    <div
        class="min-h-screen flex flex-col justify-between bg-gradient-to-br from-pink-300 via-cyan-200 via-yellow-100 to-green-200 animate-[holographic_8s_ease_infinite] font-press2p overflow-x-hidden"
    >
        <Header :user="user" />

        <main class="flex-grow flex items-center justify-center px-4">
            <div
                class="window w-full max-w-4xl shadow-xl border-[3px] border-gray-400 bg-gradient-to-br from-indigo-100 to-purple-100 p-6"
            >
                <h1
                    class="main-title text-center text-[18px] text-purple-800 mb-6 animate-[pulse_2s_ease-in-out_infinite_alternate]"
                >
                    Time Capsule Web
                </h1>

                <div
                    class="dialog-box bg-gradient-to-br from-blue-50 to-purple-100 border-2 border-gray-300 p-4 text-[8px] text-blue-900 max-w-xl mx-auto shadow-inner"
                >
                    <div
                        class="dialog-header underline text-[12px] text-indigo-900 mb-3 text-center"
                    >
                        Welcome to the Future! ✨
                    </div>
                    <div class="dialog-text mb-6 leading-[14px] text-center">
                        Yo, cyber-explorer! 🚀 You’ve just jacked into the most
                        tubular time capsule zone on the World Wide Web! Whether
                        you’re cruisin’ in from the future to peep your old
                        vibes, or droppin’ a message to your future self, this
                        is your digital time vault. Slam in your thoughts, set
                        the date, and boom 💾 — it’ll hit your inbox like a
                        blast from the past. Time-travel just went full 2000!
                    </div>
                    <div class="flex justify-center flex-wrap gap-3">
                        <button class="retro-btn" @click="addToCapsule">
                            Get Started!
                        </button>
                    </div>
                </div>
            </div>
        </main>

        <Footer />
    </div>
</template>

<script setup>
import { router } from "@inertiajs/vue3";
import Header from "../Components/Header.vue";
import Footer from "../Components/Footer.vue";

const addToCapsule = () => router.visit("/capsules/create");

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
