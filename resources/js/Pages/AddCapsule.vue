<template>
    <div
        class="min-h-screen flex flex-col justify-between bg-gradient-to-br from-pink-300 via-yellow-100 to-green-200 font-press2p"
    >
        <Header :user="$page.props.auth.user" />

        <main class="flex-grow flex items-center justify-center px-4">
            <div
                class="w-full max-w-md bg-white bg-opacity-90 border-2 border-gray-400 rounded-xl p-6 shadow-lg text-center"
            >
                <div class="text-left mb-4">
                    <button class="retro-btn" @click="goBack">
                        ⬅️ Back to Menu
                    </button>
                </div>

                <h1 class="text-purple-800 text-[10px] mb-6">
                    Create a New Capsule 🧪
                </h1>

                <form
                    @submit.prevent="submitForm"
                    enctype="multipart/form-data"
                    class="space-y-4 text-left text-[8px] text-gray-800"
                >
                    <div>
                        <label for="title" class="block mb-1">Title</label>
                        <input
                            id="title"
                            v-model="form.title"
                            type="text"
                            required
                            class="w-full px-2 py-1 border border-gray-300 rounded"
                        />
                    </div>

                    <div>
                        <label for="content" class="block mb-1">Message</label>
                        <textarea
                            id="content"
                            v-model="form.content"
                            rows="4"
                            required
                            class="w-full px-2 py-1 border border-gray-300 rounded"
                        ></textarea>
                    </div>

                    <div>
                        <label for="file" class="block mb-1"
                            >Attach a file (optional)</label
                        >
                        <input
                            id="file"
                            type="file"
                            @change="handleFileUpload"
                            class="w-full text-[7px]"
                        />
                    </div>

                    <div>
                        <label for="send_date" class="block mb-1"
                            >Send Date</label
                        >
                        <input
                            id="send_date"
                            v-model="form.send_date"
                            type="date"
                            required
                            class="w-full px-2 py-1 border border-gray-300 rounded"
                        />
                    </div>

                    <div class="flex justify-center pt-2">
                        <button type="submit" class="retro-btn">
                            Save Capsule 💾
                        </button>
                    </div>
                </form>
            </div>
        </main>

        <Footer />
    </div>
</template>

<script setup>
import { router, useForm } from "@inertiajs/vue3";
import Header from "../Components/Header.vue";
import Footer from "../Components/Footer.vue";

const form = useForm({
    title: "",
    content: "",
    file: null,
    send_date: "",
});

const handleFileUpload = (e) => {
    form.file = e.target.files[0];
};

const submitForm = () => {
    form.post("/capsules", {
        forceFormData: true,
    });
};

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
