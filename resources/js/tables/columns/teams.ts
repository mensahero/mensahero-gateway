import { TMembersTable } from '@/pages/Teams.vue'
import type { TableColumn } from '@nuxt/ui'
import UAvatar from '@nuxt/ui/runtime/components/Avatar.vue'
import UBadge from '@nuxt/ui/runtime/components/Badge.vue'
import dayjs from 'dayjs'
import advancedFormat from 'dayjs/plugin/advancedFormat'
import utc from 'dayjs/plugin/utc'
import { h } from 'vue'

dayjs.extend(utc)
dayjs.extend(advancedFormat)

export const columns: TableColumn<TMembersTable>[] = [
    {
        accessorKey: 'created_at',
        header: 'Date Joined / Invited',
        cell: ({ row }) => {
            return dayjs(row.getValue('created_at')).format('MMM DD, YYYY | hh:mm A')
        },
    },
    {
        accessorKey: 'status',
        header: 'Status',
        cell: ({ row }) => {
            const color = {
                Member: 'success' as const,
                Invited: 'info' as const,
            }[row.getValue('status') as string]

            return h(UBadge, { class: 'capitalize', variant: 'subtle', color }, () => row.getValue('status'))
        },
    },
    {
        accessorKey: 'name',
        header: 'Name',
        cell: ({ row }) => {
            if (!row.original.name) return null
            return h('div', { class: 'flex items-center gap-3' }, [
                h(UAvatar, {
                    alt: row.original.name,
                    size: 'lg',
                }),
                h('div', undefined, [h('p', { class: 'font-medium text-highlighted' }, row.original.name)]),
            ])
        },
    },
    {
        accessorKey: 'email',
        header: 'Email',
    },
    {
        accessorKey: 'role',
        header: 'Role',
    },
    {
        accessorKey: 'actions',
        header: 'Actions',
    },
]
