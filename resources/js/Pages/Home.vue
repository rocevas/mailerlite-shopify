<template>
    <AppLayout title="Dashboard">
        <Page
            title="Home"
        >
            <LegacyCard sectioned>
                <EmptyState
                    heading="Manage your inventory transfers"
                    :action="{ content: 'Create offer', onAction: goTo('offer.create') }"
                    image="https://cdn.shopify.com/s/files/1/0262/4071/2726/files/emptystate-files.png"
                >
                    <p>Track and receive your incoming inventory from suppliers.</p>
                    {{ page.props.auth.user }}
                    {{ // subscribers }}
                </EmptyState>
            </LegacyCard>
        </Page>
    </AppLayout>
</template>

<script setup>
import {Link, router, usePage} from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
const page = usePage();

const props = defineProps({
    subscribers: Object,
})
const goTo = (routeName, params = {}) => {
    return () => router.visit(route(routeName, params));
};
</script>
