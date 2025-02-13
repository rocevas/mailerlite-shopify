<template>
    <AppLayout title="Forms">
        <Page
            title="Forms"
        >
            <LegacyCard>
                <IndexTable
                :resourceName="resourceName"
                :selectable="false"
                :itemCount="items.length"
                :headings="[
                    { title: 'Name' },
                    { title: 'Type' },
                    { title: 'Opens' },
                    { title: 'Conversion' },
                    { title: 'Created' },
                ]"
                :pagination="{
                  hasNext: metaHasNext,
                  onNext: handleNextPage
                }"
            >

                <IndexTableRow v-for="item in items" :key="item.id">
                    <IndexTableCell>{{ item.name }}</IndexTableCell>
                    <IndexTableCell>{{ item.type }}</IndexTableCell>
                    <IndexTableCell>{{ item.opens_count }}</IndexTableCell>
                    <IndexTableCell>{{ item.conversions_count }}</IndexTableCell>
                    <IndexTableCell>{{ item.created_at }}</IndexTableCell>
                </IndexTableRow>

            </IndexTable>
            </LegacyCard>
        </Page>
    </AppLayout>
</template>

<script setup>
import { ref } from 'vue';
import { Link, router, usePage } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

const page = usePage();

// Adjust the prop type to Object because the campaigns prop is an object
// with a "data" array (and possibly "links" and "meta" for pagination)
const props = defineProps({
    // Expecting a paginated response with a data property
    forms: {
        type: Object,
    },
    selectedType: {
        type: String,
        default: 'popup'
    }
});

// Extract the items array and meta info for pagination
const items = ref(props.forms.data || []);
const meta = props.forms.meta || {};
// For example, if the API returns a boolean or cursor info:
const metaHasNext = meta.next_cursor ? true : false;

// Define resource names for the table
const resourceName = {
    singular: 'automation',
    plural: 'automation'
};

function handleNextPage() {
    console.log('Load next page');
}

// Optional: helper to navigate to routes via Inertia
const goTo = (routeName, params = {}) => {
    return () => router.visit(route(routeName, params));
};
</script>
