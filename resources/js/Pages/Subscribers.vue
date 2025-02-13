<template>
    <AppLayout title="Subscribers">
        <Page
            title="Subscribers"
        >
            <LegacyCard>
                <IndexTable
                :resourceName="resourceName"
                :selectable="false"
                :itemCount="items.length"
                :headings="[
                    { title: 'Email' },
                    { title: 'Sent' },
                    { title: 'Open' },
                    { title: 'Clicks' },
                    { title: 'Subscribed' },
                    { title: 'Status' },
                ]"
                :pagination="{
                  hasNext: metaHasNext,
                  onNext: handleNextPage
                }"
            >

                <IndexTableRow v-for="item in items" :key="item.id">
                    <IndexTableCell>{{ item.email }}</IndexTableCell>
                    <IndexTableCell>{{ item.sent }}</IndexTableCell>
                    <IndexTableCell>{{ item.opens_count }}</IndexTableCell>
                    <IndexTableCell>{{ item.clicks_count }}</IndexTableCell>
                    <IndexTableCell>
                        {{ item.subscribed_at }}</IndexTableCell>
                    <IndexTableCell>
                        <Badge
                            tone="success"
                            progress="complete"
                        >
                            Subscribed
                        </Badge>
                    </IndexTableCell>
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

// Adjust the prop type to Object because the subscribers prop is an object
// with a "data" array (and possibly "links" and "meta" for pagination)
const props = defineProps({
    // Expecting a paginated response with a data property
    subscribers: {
        type: Object,
    },
});

// Extract the items array and meta info for pagination
const items = ref(props.subscribers.data || []);
const meta = props.subscribers.meta || {};
// For example, if the API returns a boolean or cursor info:
const metaHasNext = meta.next_cursor ? true : false;

// Define resource names for the table
const resourceName = {
    singular: 'subscriber',
    plural: 'subscribers'
};

function handleNextPage() {
    console.log('Load next page');
}

// Optional: helper to navigate to routes via Inertia
const goTo = (routeName, params = {}) => {
    return () => router.visit(route(routeName, params));
};
</script>
