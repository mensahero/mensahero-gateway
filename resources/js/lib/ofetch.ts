import { ofetch } from 'ofetch'
import { router } from '@inertiajs/vue3'

const apiFetch = ofetch.create({
    credentials: 'include',
    headers: {
        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ?? '',
        Accept: 'application/json',
        'Content-Type': 'application/json',
    },
    onResponseError: (error) => {
        if ([401, 419].includes(error.response?.status)) {
            router.visit(route('login'))
        }
    },
})

export default apiFetch
