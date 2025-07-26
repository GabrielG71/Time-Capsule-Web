<template>
    <div
        class="min-h-screen flex flex-col justify-between bg-gradient-to-br from-pink-300 via-yellow-100 to-green-200 font-press2p"
    >
        <Header :user="$page.props.auth.user" />

        <main class="flex-grow flex items-center justify-center px-4">
            <div class="text-center">
                <h1 class="text-purple-800 text-[12px] mb-8">
                    This is your Capsule Machine 💫
                </h1>

                <div class="flex flex-wrap justify-center gap-4">
                    <button class="retro-btn" @click="addToCapsule">
                        Add to Capsule 📦
                    </button>
                    <button class="retro-btn" @click="viewCapsules">
                        My Capsules ⏳
                    </button>
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
const viewCapsules = () => router.visit("/capsules");
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
