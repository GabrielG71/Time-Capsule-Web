<template>
    <div
        class="min-h-screen flex flex-col justify-between bg-gradient-to-br from-pink-300 via-yellow-100 to-green-200 font-press2p"
    >
        <Header :user="$page.props.auth.user" />

        <main class="flex-grow px-4 py-8">
            <div class="mb-6 text-left">
                <button class="retro-btn" @click="goBack">
                    ⬅️ Back to Menu
                </button>
            </div>

            <h1 class="text-center text-purple-800 text-[12px] mb-8">
                Your Capsules ⏳
            </h1>

            <div class="grid gap-4 max-w-2xl mx-auto text-[8px]">
                <div
                    v-for="capsule in capsules"
                    :key="capsule.id"
                    class="bg-white bg-opacity-90 border border-gray-400 rounded-lg p-4 shadow-md"
                >
                    <h2 class="text-purple-700 mb-2 font-bold">
                        {{ capsule.title }}
                    </h2>

                    <div class="text-gray-600 mb-2">
                        📅 Send Date: {{ capsule.send_date }}
                    </div>

                    <div class="text-gray-500 text-[7px] italic">
                        🔒 Content will be revealed on send date
                    </div>
                </div>

                <p
                    v-if="capsules.length === 0"
                    class="text-center text-gray-600"
                >
                    No capsules found.
                </p>
            </div>
        </main>

        <Footer />
    </div>
</template>

<script setup>
import Header from "../Components/Header.vue";
import Footer from "../Components/Footer.vue";
import { router } from "@inertiajs/vue3";
import { defineProps } from "vue";

defineProps({
    capsules: Array,
});

const goBack = () => {
    router.visit("/dashboard");
};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap");

.font-press2p {
    font-family: "Press Start 2P", cursive;
}

.retro-btn {
    background: linear-gradient(145deg, #f0f8ff, #e6e6fa);
    border: 2px outset #c0c0c0;
    padding: 10px 20px;
    font-size: 8px;
    color: #000080;
    cursor: pointer;
    transition: 0.1s;
    box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
}

.retro-btn:hover {
    background: linear-gradient(145deg, #e6e6fa, #dda0dd);
    transform: translateY(-1px);
}

.retro-btn:active {
    border: 2px inset #c0c0c0;
    transform: translateY(1px);
}
</style>
