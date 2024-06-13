<script setup>
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Заполните форму" />

  <div
    class="relative flex justify-center items-center min-h-screen bg-dots-darker bg-center bg-gray-100 px-4"
  >
    <div class="max-w-lg flex-1">
      <h1 class="mb-4 text-xl font-bold tracking-wide">Заполните форму</h1>
      <form
        class="mx-auto bg-white shadow-lg rounded-lg border border-gray-100 px-4 py-6"
      >
        <div class="mb-6">
          <label for="name" class="block mb-2 text-sm font-medium text-gray-900"
            >Имя</label
          >
          <input
            type="text"
            id="name"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            placeholder="напишите ваше имя"
            required
          />
        </div>
        <div class="mb-6">
          <label
            for="surname"
            class="block mb-2 text-sm font-medium text-gray-900"
            >Фамилия</label
          >
          <input
            type="text"
            id="surname"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            placeholder="напишите вашу фамилию"
            required
          />
        </div>
        <div class="mb-6">
          <label
            for="phonenumber"
            class="block mb-2 text-sm font-medium text-gray-900"
            >Номер телефона</label
          >
          <input
            type="text"
            id="phonenumber"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            placeholder="напишите свой номер телефона"
            required
          />
        </div>

        <div class="mb-6">
          <label
            for="message"
            class="block mb-2 text-sm font-medium text-gray-900"
            >Текст заявки</label
          >
          <textarea
            id="message"
            rows="4"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
            placeholder="напишите текст заявки..."
          ></textarea>
        </div>

        <div class="text-center">
          <button
            type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
          >
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
