<template>
    <AppLayout title="Connect">
        <Page
            title="Connect"
            >
            <Card roundedAbove="sm">
                <BlockStack gap="200">
                    <Text as="h2" variant="headingSm">
                        Connect to MailerLite
                    </Text>
                    <FormLayout>
                        <TextField label="Api key" name="mailerlite_api_key" v-model="form.mailerlite_api_key" autoComplete="off" autoFocus />
                    </FormLayout>
                    <BlockStack gap="200">
                        <Text>
                            To generate MailerLite APi key <a href="https://dashboard.mailerlite.com/integrations/api" target="_blank">click here</a>
                        </Text>
                    </BlockStack>
                    <InlineStack align="end">
                        <ButtonGroup>
                            <Button
                                variant="primary"
                                accessibilityLabel="Add tracking number"
                                @click="save"
                            >
                                Connect
                            </Button>
                        </ButtonGroup>
                    </InlineStack>
                </BlockStack>
            </Card>
        </Page>
    </AppLayout>
</template>

<script setup>
import {Link, router, useForm, usePage} from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
const page = usePage();

const props = defineProps({
    offers: Object,
})
const goTo = (routeName, params = {}) => {
    return () => router.visit(route(routeName, params));
};

const form = useForm({
    mailerlite_api_key: page.props.auth.user.mailerlite_api_key,
});

const save = () => {
    form.post(route('connect.store'), {
        errorBag: 'createTeam',
        preserveScroll: true,
    });
};
</script>
