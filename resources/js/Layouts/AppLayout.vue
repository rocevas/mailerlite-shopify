<script setup>
import locales from '@ownego/polaris-vue/dist/locales/en.json';

defineProps({
    title: String,
});
</script>

<template>
    <AppProvider :i18n="locales">
        <slot />
    </AppProvider>
</template>
