<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import AppAlert from '@/Components/AppAlert.vue';

const formData = ref({
  name: '',
  surname: '',
  phone: '',
  message: '',
});

const form = useForm('Create/Appeal', formData.value);

const submit = () => {
  form.post('/appeal/store');
};
</script>

<template>
  <Head title="Заполните форму" />

  <div
    class="relative flex justify-center items-center min-h-screen bg-dots-darker bg-center bg-gray-100 px-4"
  >
    <AppAlert v-if="$page.props.flash.message" />

    <div v-else class="max-w-lg flex-1">
      <div class="flex justify-between mb-3">
        <h1 class="text-xl font-bold tracking-wide">Заполните форму</h1>
        <Link
          href="/appeals"
          class="flex items-center text-blue-500 text-lg underline"
          >Посмотреть заявки
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="w-5 h-5"
          >
            <path
              fill-rule="evenodd"
              d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
              clip-rule="evenodd"
            />
          </svg>
        </Link>
      </div>
      <form
        @submit.prevent="submit"
        @keyup="onInput"
        @keydown="form.clearErrors($event.target.id)"
        class="mx-auto bg-white shadow-lg rounded-lg border border-gray-100 px-4 py-6"
      >
        <div class="mb-6">
          <label for="name" class="block mb-2 text-sm font-medium text-gray-900"
            >Имя</label
          >
          <input
            v-model="form.name"
            type="text"
            id="name"
            :class="[form.errors.name ? 'border-red-500' : 'border-gray-300']"
            class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            placeholder="напишите ваше имя"
          />
          <p class="text-red-500 text-xs mt-1" v-if="form.errors.name">
            {{ form.errors.name }}
          </p>
        </div>
        <div class="mb-6">
          <label
            for="surname"
            class="block mb-2 text-sm font-medium text-gray-900"
            >Фамилия</label
          >
          <input
            v-model="form.surname"
            type="text"
            id="surname"
            :class="[
              form.errors.surname ? 'border-red-500' : 'border-gray-300',
            ]"
            class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            placeholder="напишите вашу фамилию"
          />
          <p class="text-red-500 text-xs mt-1" v-if="form.errors.surname">
            {{ form.errors.surname }}
          </p>
        </div>
        <div class="mb-6">
          <label
            for="phone"
            class="block mb-2 text-sm font-medium text-gray-900"
            >Номер телефона</label
          >
          <input
            v-model="form.phone"
            type="text"
            id="phone"
            :class="[form.errors.phone ? 'border-red-500' : 'border-gray-300']"
            class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            placeholder="напишите свой номер телефона"
          />
          <p class="text-red-500 text-xs mt-1" v-if="form.errors.phone">
            {{ form.errors.phone }}
          </p>
        </div>

        <div class="mb-6">
          <label
            for="message"
            class="block mb-2 text-sm font-medium text-gray-900"
            >Текст заявки</label
          >
          <textarea
            id="message"
            v-model="form.message"
            rows="4"
            :class="[
              form.errors.message ? 'border-red-500' : 'border-gray-300',
            ]"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border focus:ring-blue-500 focus:border-blue-500"
            placeholder="напишите текст заявки..."
          ></textarea>
          <p class="text-red-500 text-xs mt-1" v-if="form.errors.message">
            {{ form.errors.message }}
          </p>
        </div>

        <div class="text-center">
          <button
            :disabled="form.processing"
            type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center inline-flex items-center disabled:opacity-55"
          >
            <svg
              v-if="form.processing"
              aria-hidden="true"
              role="status"
              class="inline w-4 h-4 me-3 text-white animate-spin"
              viewBox="0 0 100 101"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                fill="#E5E7EB"
              />
              <path
                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                fill="currentColor"
              />
            </svg>
            Отправить
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<style>
.bg-dots-darker {
  background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
</style>
