<template>
    <AppLayout title="Campaigns">
        <Page
            title="Campaigns"
        >
            <Tabs :tabs="tabs" :selected="selected" @select="handleTabChange" />

            <LegacyCard>
                <IndexTable
                :resourceName="resourceName"
                :selectable="false"
                :itemCount="items.length"
                :headings="[
                    { title: 'Name' },
                    { title: 'Type' },
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
                    <IndexTableCell>{{ item.type }}</IndexTableCell>
                    <IndexTableCell>
                        <Badge
                            tone="success"
                            progress="complete"
                        >
                            {{ item.status }}
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
    campaigns: {
        type: Object,
    },
    selectedStatus: {
        type: String,
        default: 'draft'
    }
});

// Extract the items array and meta info for pagination
const items = ref(props.campaigns.data || []);
const meta = props.campaigns.meta || {};
// For example, if the API returns a boolean or cursor info:
const metaHasNext = meta.next_cursor ? true : false;

// Define resource names for the table
const resourceName = {
    singular: 'campaign',
    plural: 'campaign'
};

// Define your tabs with a filter value for each
const tabs = ref([
    { content: 'Sent', filter: 'sent' },
    { content: 'Draft', filter: 'draft' },
    { content: 'Outbox', filter: 'ready' }
]);

// The currently selected tab index; default to the one matching the current filter
const selected = ref(
    tabs.value.findIndex((tab) => tab.filter === props.selectedStatus) || 0
);

// When the tab changes, get the filter and trigger a route visit
function handleTabChange(newTabIndex) {
    selected.value = newTabIndex;
    const status = tabs.value[newTabIndex].filter;
    // Inertia visit to the campaigns route with query parameter "status"
    router.visit(route('campaigns.index', { status }));
}

function handleNextPage() {
    console.log('Load next page');
}

// Optional: helper to navigate to routes via Inertia
const goTo = (routeName, params = {}) => {
    return () => router.visit(route(routeName, params));
};
</script>
