import { router } from '@inertiajs/vue3'
import { ofetch } from 'ofetch'

const token: HTMLMetaElement = document?.head?.querySelector('meta[name="csrf-token"]') as HTMLMetaElement

const apiFetch = ofetch.create({
    credentials: 'include',
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': token?.content,
        Accept: 'application/json',
    },
    onResponseError: (error) => {
        if ([401, 419].includes(error.response?.status)) {
            router.visit(route('login'))
        }
    },
})

export default apiFetch
