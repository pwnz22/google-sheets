<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <div
    class="p-4 mb-4 text-blue-800 border border-blue-300 rounded-lg bg-blue-50"
    role="alert"
  >
    <div class="flex items-center">
      <svg
        class="flex-shrink-0 w-4 h-4 me-2"
        aria-hidden="true"
        xmlns="http://www.w3.org/2000/svg"
        fill="currentColor"
        viewBox="0 0 20 20"
      >
        <path
          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"
        />
      </svg>
      <span class="sr-only">Info</span>
      <h3 class="text-lg font-medium">Данные успешно отправлены</h3>
    </div>
    <div class="mt-2 mb-4 text-sm">
      Если хотите заново заполнить форму, нажмите кнопку ниже
    </div>
    <div class="flex">
      <Link
        href="/"
        as="button"
        class="text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center"
      >
        <svg
          class="me-2 h-3 w-3"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          fill="currentColor"
          viewBox="0 0 20 14"
        >
          <path
            d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"
          />
        </svg>
        Отправить заново
      </Link>
      <Link
        href="/appeals"
        type="button"
        class="text-blue-800 bg-transparent border border-blue-800 hover:bg-blue-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-xs px-3 py-1.5 text-center"
        aria-label="Close"
      >
        Посмотреть заявки
      </Link>
    </div>
  </div>
</template>
