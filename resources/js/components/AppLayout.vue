<script setup lang="ts">
import { router, usePage } from '@inertiajs/vue3'
import type { BreadcrumbItem } from '@nuxt/ui'
import { onMounted, watch } from 'vue'

const props = defineProps<{
    breadcrumbItems: BreadcrumbItem[]
}>()

const toast = useToast()
const inertiaPage = usePage()

// onMounted(() => {
//     if (inertiaPage.flash.notification) {
//         toast.add({
//             title: inertiaPage.flash.notification?.title,
//             description: inertiaPage.flash.notification.message,
//             color: inertiaPage.flash.notification?.color,
//             icon: inertiaPage.flash.notification?.icon,
//         })
//     }
// })
//
// watch(
//     () => inertiaPage.flash.notification,
//     (notification) => {
//         if (notification) {
//             toast.add({
//                 title: notification.title,
//                 description: notification.message,
//                 color: notification.color,
//                 icon: notification.icon,
//             })
//         }
//     },
// )
router.on('flash', (event) => {
    console.log(event)
    if (event.detail.flash.notification) {
        toast.add({
            title: event.detail.flash.notification?.title,
            description: event.detail.flash.notification.message,
            color: event.detail.flash.notification?.color,
            icon: event.detail.flash.notification?.icon,
        })
    }
})
</script>

<template>
    <UDashboardPanel>
        <template #header>
            <UDashboardNavbar>
                <template #title>
                    <UDashboardSidebarCollapse as="button" :disabled="false" />
                    <UBreadcrumb :items="props.breadcrumbItems" />
                </template>
                <template #right>
                    <slot name="action" />
                </template>
            </UDashboardNavbar>
        </template>

        <template #body>
            <slot />
        </template>
    </UDashboardPanel>
</template>

<style scoped></style>
