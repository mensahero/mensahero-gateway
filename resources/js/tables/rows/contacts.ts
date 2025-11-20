import { IContact } from '@/types/contacts/contacts'
import type { Row } from '@tanstack/table-core'
import { useClipboard } from '@vueuse/core'

const { copy } = useClipboard()
const toast = useToast()

export const contactRows = (row: Row<IContact>) => {
    return [
        {
            type: 'label',
            label: 'Actions',
        },
        {
            label: 'Copy Mobile',
            onSelect: async () => {
                await copy(row.original.mobile)

                toast.add({
                    title: 'Mobile copied to clipboard!',
                    color: 'success',
                    icon: 'i-lucide-circle-check',
                    duration: 2000,
                })
            },
        },
        {
            label: 'Send SMS',
        },
        {
            type: 'separator',
        },
        {
            label: 'Delete Contact',
        },
    ]
}
