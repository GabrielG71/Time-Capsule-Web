<template>
    <div
        class="min-h-screen flex flex-col justify-between bg-gradient-to-br from-pink-300 via-cyan-200 via-yellow-100 to-green-200 animate-[holographic_8s_ease_infinite] font-press2p overflow-x-hidden"
    >
        <Header :user="user" />

        <main class="flex-grow flex items-center justify-center px-4">
            <div
                class="window w-full max-w-md shadow-xl border-[3px] border-gray-400 bg-gradient-to-br from-indigo-100 to-purple-100 p-6"
            >
                <h1
                    class="main-title text-center text-[18px] text-purple-800 mb-6 animate-[pulse_2s_ease-in-out_infinite_alternate]"
                >
                    Forgot Password
                </h1>

                <div
                    class="dialog-box bg-gradient-to-br from-blue-50 to-purple-100 border-2 border-gray-300 p-4 shadow-inner"
                >
                    <div
                        class="mb-4 text-[8px] text-blue-900 text-center leading-[12px]"
                    >
                        Forgot your password? No problem. Just let us know your
                        email address and we will email you a password reset
                        link that will allow you to choose a new one.
                    </div>

                    <div
                        v-if="status"
                        class="mb-4 text-[8px] font-medium text-green-600 text-center"
                    >
                        {{ status }}
                    </div>

                    <form @submit.prevent="submit">
                        <div class="mb-4">
                            <InputLabel
                                for="email"
                                value="Email"
                                class="text-[8px] text-blue-900"
                            />
                            <TextInput
                                id="email"
                                type="email"
                                class="mt-1 block w-full text-[8px] font-press2p"
                                v-model="form.email"
                                required
                                autofocus
                                autocomplete="username"
                            />
                            <InputError
                                class="mt-2 text-[8px]"
                                :message="form.errors.email"
                            />
                        </div>

                        <div class="flex justify-center">
                            <button
                                type="submit"
                                class="retro-btn"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Email Password Reset Link
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>

        <Footer />
    </div>
</template>

<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import Header from "@/Components/Header.vue";
import Footer from "@/Components/Footer.vue";
import { Head, useForm } from "@inertiajs/vue3";

defineProps({
    status: {
        type: String,
    },
    user: Object,
});

const form = useForm({
    email: "",
});

const submit = () => {
    form.post(route("password.email"));
};
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
