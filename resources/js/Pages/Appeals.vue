<script setup>
import { Link } from '@inertiajs/vue3';
const props = defineProps({
  appeals: Array,
});
</script>

<template>
  <div
    class="relative flex justify-center items-center min-h-screen bg-dots-darker bg-center bg-gray-100 px-4"
  >
    <div class="relative overflow-x-auto">
      <div class="mb-2">
        <Link href="/" class="text-blue-500 underline hover:no-underline"
          >Добавить заявку</Link
        >
      </div>
      <table
        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
      >
        <thead
          class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
        >
          <tr>
            <th scope="col" class="px-6 py-3">id</th>
            <th scope="col" class="px-6 py-3">Имя</th>
            <th scope="col" class="px-6 py-3">Фамилия</th>
            <th scope="col" class="px-6 py-3">Номер телефона</th>
            <th scope="col" class="px-6 py-3">Ссылка</th>
          </tr>
        </thead>
        <tbody>
          <tr
            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
            v-for="appeal in appeals"
          >
            <th
              scope="row"
              class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
            >
              {{ appeal.id }}
            </th>
            <td class="px-6 py-4">{{ appeal.name }}</td>
            <td class="px-6 py-4">{{ appeal.surname }}</td>
            <td class="px-6 py-4">{{ appeal.phone }}</td>
            <td class="px-6 py-4">
              <a
                :href="appeal.link"
                target="_blank"
                class="text-blue-500 underline hover:no-underline"
                >{{ appeal.link }}</a
              >
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
