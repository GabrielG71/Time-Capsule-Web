<template>
    <div
        class="window-header flex justify-between items-center bg-gradient-to-r from-purple-800 to-purple-400 text-white text-[11px] px-4 py-2 border-b-2 border-gray-400 font-press2p"
    >
        <div class="flex items-center gap-3">
            <span>📧</span>
            <span>Time Capsule Web - Y2K</span>
        </div>

        <div class="flex items-center gap-2 flex-wrap justify-end text-[8px]">
            <template v-if="user">
                <span class="text-pink-300">Welcome, {{ user.name }}</span>
                <button class="retro-btn py-[2px] px-2" @click="goTo('/')">
                    Home
                </button>
                <button
                    class="retro-btn py-[2px] px-2"
                    @click="goTo('/dashboard')"
                >
                    Menu
                </button>
                <button class="retro-btn py-[2px] px-2" @click="logout">
                    Logout
                </button>
            </template>

            <template v-else>
                <button class="retro-btn py-[2px] px-2" @click="goTo('/')">
                    Home
                </button>
                <button
                    class="retro-btn py-[2px] px-2"
                    @click="goTo('/register')"
                >
                    Register
                </button>
                <button class="retro-btn py-[2px] px-2" @click="goTo('/login')">
                    Login
                </button>
            </template>

            <div class="flex gap-[4px] ml-2">
                <div
                    class="w-[18px] h-[16px] bg-gray-300 border border-gray-400 text-[8px] flex items-center justify-center hover:scale-95 active:border-inset cursor-pointer"
                >
                    _
                </div>
                <div
                    class="w-[18px] h-[16px] bg-gray-300 border border-gray-400 text-[8px] flex items-center justify-center hover:scale-95 active:border-inset cursor-pointer"
                >
                    □
                </div>
                <div
                    class="w-[18px] h-[16px] bg-gray-300 border border-gray-400 text-[8px] flex items-center justify-center hover:scale-95 active:border-inset cursor-pointer"
                >
                    ×
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { router } from "@inertiajs/vue3";

const props = defineProps({
    user: {
        type: Object,
        default: null,
    },
});

const goTo = (path) => {
    if (!path.startsWith("/")) {
        path = `/${path}`;
    }
    router.visit(path);
};

const logout = () => {
    router.post("/logout");
};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap");

.font-press2p {
    font-family: "Press Start 2P", cursive;
}

.retro-btn {
    background: linear-gradient(145deg, #dda0dd, #da70d6);
    border: 2px outset #c0c0c0;
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
