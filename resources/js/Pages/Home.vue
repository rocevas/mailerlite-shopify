<template>
    <AppLayout title="Dashboard">
        <Page
            title="Dashboard"
        >
            <Layout>
                <LayoutSection>
                    <Grid>
                        <GridCell :column-span="{ xs: 6, sm: 6, md: 3, lg: 3, xl: 3 }">
                            <LegacyCard title="Sent Campaigns" sectioned>
                                <BlockStack gap="200">
                                    <Text variant="heading3xl" as="h3">
                                        {{ campaigns_count }}
                                    </Text>
                                </BlockStack>
                            </LegacyCard>
                        </GridCell>
                        <GridCell :column-span="{ xs: 6, sm: 6, md: 3, lg: 3, xl: 3 }">
                            <LegacyCard title="Active Subscribers" sectioned>
                                <BlockStack gap="200">
                                    <Text variant="heading3xl" as="h3">
                                        {{ subscribers_count }}
                                    </Text>
                                </BlockStack>
                            </LegacyCard>
                        </GridCell>
                        <GridCell :column-span="{ xs: 6, sm: 6, md: 3, lg: 3, xl: 3 }">
                            <LegacyCard title="Active Automations" sectioned>
                                <BlockStack gap="200">
                                    <Text variant="heading3xl" as="h3">
                                        5
                                    </Text>
                                </BlockStack>
                            </LegacyCard>
                        </GridCell>
                        <GridCell :column-span="{ xs: 6, sm: 6, md: 3, lg: 3, xl: 3 }">
                            <LegacyCard title="Forms" sectioned>
                                <BlockStack gap="200">
                                    <Text variant="heading3xl" as="h3">
                                        {{ forms_count }}
                                    </Text>
                                </BlockStack>
                            </LegacyCard>
                        </GridCell>
                    </Grid>
                </LayoutSection>

                <LayoutSection>
                    <LegacyCard sectioned>
                        <EmptyState
                            heading="Shop info"
                            image="https://cdn.shopify.com/s/files/1/0262/4071/2726/files/emptystate-files.png"
                        >
                            {{ page.props.auth.user }}

                        </EmptyState>
                    </LegacyCard>
                </LayoutSection>
            </Layout>
        </Page>
    </AppLayout>
</template>

<script setup>
import {Link, router, usePage} from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
    // Expecting a paginated response with a data property
    subscribers_count: Number,
    campaigns_count: Number,
    automations_count: Number,
    forms_count: Number,
});

const page = usePage();

const goTo = (routeName, params = {}) => {
    return () => router.visit(route(routeName, params));
};
</script>
