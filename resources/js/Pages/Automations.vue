<template>
    <AppLayout title="Automations">
        <Page
            title="Automations"
        >
            <LegacyCard>
                <IndexTable
                :resourceName="resourceName"
                :selectable="false"
                :itemCount="items.length"
                :headings="[
                    { title: 'Name' },
                    { title: 'Sent' },
                    { title: 'Opened' },
                    { title: 'Clicked' },
                    { title: 'Status' },
                    { title: 'Created' },
                ]"
                :pagination="{
                  hasNext: metaHasNext,
                  onNext: handleNextPage
                }"
            >

                <IndexTableRow v-for="item in items" :key="item.id">
                    <IndexTableCell>{{ item.name }}</IndexTableCell>
                    <IndexTableCell>{{ item.stats.sent }}</IndexTableCell>
                    <IndexTableCell>{{ item.stats.opens_count }}</IndexTableCell>
                    <IndexTableCell>{{ item.stats.clicks_count }}</IndexTableCell>
                    <IndexTableCell>
                        <Badge v-if="!item.enabled" progress="partiallyComplete" tone="warning">
                            Inactive
                        </Badge>
                        <Badge v-else
                            tone="success"
                            progress="complete"
                        >
                            Active
                        </Badge>
                    </IndexTableCell>
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
    automations: {
        type: Object,
    }
});

// Extract the items array and meta info for pagination
const items = ref(props.automations.data || []);
const meta = props.automations.meta || {};
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
