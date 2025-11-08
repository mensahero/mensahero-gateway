<template>
    <div class="min-h-screen bg-white dark:bg-gray-900">
        <!-- Navigation Header -->
        <UHeader class="border-b border-gray-200 bg-white/95 backdrop-blur-md dark:border-gray-800 dark:bg-gray-900/95 sticky top-0 z-50">
            <template #title>
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-gradient-to-br from-red-600 to-red-700">
                        <span class="text-xl font-bold text-white">M</span>
                    </div>
                    <span class="text-xl font-bold text-gray-900 dark:text-white">Mensahero</span>
                </div>
            </template>

            <template #right>
                <div class="flex items-center gap-3">
                    <UButton
                        variant="ghost"
                        size="sm"
                        class="hidden sm:inline-flex text-gray-700 dark:text-gray-300"
                        @click="router.visit(route('login'))"
                    >
                        Login
                    </UButton>
                    <UButton
                        size="sm"
                        class="bg-red-600 hover:bg-red-700 text-white"
                        @click="router.visit(route('register'))"
                    >
                        Get Started
                    </UButton>
                </div>
            </template>
        </UHeader>

        <!-- Hero Section -->
        <section class="relative overflow-hidden bg-gradient-to-b from-gray-50 to-white dark:from-gray-800 dark:to-gray-900">
            <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
            <UContainer class="relative py-24 sm:py-32">
                <div class="mx-auto max-w-4xl text-center">
                    <UBadge variant="subtle" class="mb-6 bg-red-50 text-red-700 dark:bg-red-900/30 dark:text-red-400">
                        <UIcon name="i-heroicons-code-bracket" class="mr-1 h-4 w-4" />
                        Open Source • Reliable • Fast • Local
                    </UBadge>

                    <h1 class="mb-6 text-5xl font-extrabold tracking-tight text-gray-900 sm:text-7xl dark:text-white">
                        Empowering Communication,
                        <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                            One Message at a Time
                        </span>
                    </h1>

                    <p class="mx-auto mb-10 max-w-2xl text-xl leading-relaxed text-gray-600 dark:text-gray-300">
                        An open-source SMS Gateway and Messaging Platform built to connect people, businesses, and communities across the Philippines and beyond. Free, transparent, and community-driven.
                    </p>

                    <div class="flex flex-col items-center justify-center gap-4 sm:flex-row">
                        <UButton
                            size="xl"
                            class="bg-red-600 hover:bg-red-700 text-white shadow-lg shadow-red-600/30"
                            @click="router.visit(route('register'))"
                        >
                            <UIcon name="i-heroicons-rocket-launch" class="mr-2 h-5 w-5" />
                            Start Free Trial
                        </UButton>
                        <UButton
                            size="xl"
                            variant="outline"
                            class="border-gray-300 text-gray-700 dark:border-gray-600 dark:text-gray-300"
                            to="https://github.com/mensahero/mensahero-gateway"
                            target="_blank"
                        >
                            <UIcon name="simple-icons:github" class="mr-2 h-5 w-5" />
                            View on GitHub
                        </UButton>
                    </div>

                    <!-- Trust Indicators -->
                    <div class="mt-16 flex flex-wrap items-center justify-center gap-8 text-sm text-gray-500 dark:text-gray-400">
                        <div class="flex items-center gap-2">
                            <UIcon name="i-heroicons-check-circle-solid" class="h-5 w-5 text-green-500" />
                            Open Source
                        </div>
                        <div class="flex items-center gap-2">
                            <UIcon name="i-heroicons-shield-check-solid" class="h-5 w-5 text-green-500" />
                            MIT Licensed
                        </div>
                        <div class="flex items-center gap-2">
                            <UIcon name="i-heroicons-users-solid" class="h-5 w-5 text-green-500" />
                            Community Driven
                        </div>
                        <div class="flex items-center gap-2">
                            <UIcon name="i-heroicons-heart-solid" class="h-5 w-5 text-green-500" />
                            Made in PH
                            <UIcon name="circle-flags:ph" class="h-5 w-5" />
                        </div>
                    </div>
                </div>
            </UContainer>
        </section>

        <!-- Features Section -->
        <section class="bg-white py-24 dark:bg-gray-900">
            <UContainer>
                <div class="mb-20 text-center">
                    <h2 class="mb-4 text-4xl font-bold text-gray-900 sm:text-5xl dark:text-white">
                        Why Choose Mensahero?
                    </h2>
                    <p class="mx-auto max-w-2xl text-xl text-gray-600 dark:text-gray-300">
                        Open-source, transparent, and built by developers for developers. Our platform makes message delivery simple, scalable, and secure.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                    <UCard class="group border-2 border-gray-100 transition-all hover:border-red-200 hover:shadow-xl dark:border-gray-800 dark:hover:border-red-900">
                        <div class="p-6">
                            <div class="mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-red-500 to-red-600 shadow-lg shadow-red-600/30 transition-transform group-hover:scale-110">
                                <UIcon name="i-heroicons-bolt" class="h-7 w-7 text-white" />
                            </div>
                            <h3 class="mb-3 text-2xl font-bold text-gray-900 dark:text-white">Lightning Fast API</h3>
                            <p class="text-gray-600 dark:text-gray-300">
                                Send and receive SMS via our RESTful API with sub-second response times. Built for high-volume messaging.
                            </p>
                        </div>
                    </UCard>

                    <UCard class="group border-2 border-gray-100 transition-all hover:border-yellow-200 hover:shadow-xl dark:border-gray-800 dark:hover:border-yellow-900">
                        <div class="p-6">
                            <div class="mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-yellow-500 to-yellow-600 shadow-lg shadow-yellow-600/30 transition-transform group-hover:scale-110">
                                <UIcon name="i-heroicons-puzzle-piece" class="h-7 w-7 text-white" />
                            </div>
                            <h3 class="mb-3 text-2xl font-bold text-gray-900 dark:text-white">Easy Integration</h3>
                            <p class="text-gray-600 dark:text-gray-300">
                                Seamlessly integrate with your applications, CRMs, and automation tools. Multiple SDKs available.
                            </p>
                        </div>
                    </UCard>

                    <UCard class="group border-2 border-gray-100 transition-all hover:border-blue-200 hover:shadow-xl dark:border-gray-800 dark:hover:border-blue-900">
                        <div class="p-6">
                            <div class="mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 shadow-lg shadow-blue-600/30 transition-transform group-hover:scale-110">
                                <UIcon name="i-heroicons-shield-check" class="h-7 w-7 text-white" />
                            </div>
                            <h3 class="mb-3 text-2xl font-bold text-gray-900 dark:text-white">Secure Routing</h3>
                            <p class="text-gray-600 dark:text-gray-300">
                                End-to-end encryption and secure message routing. Your data is protected at every step.
                            </p>
                        </div>
                    </UCard>

                    <UCard class="group border-2 border-gray-100 transition-all hover:border-green-200 hover:shadow-xl dark:border-gray-800 dark:hover:border-green-900">
                        <div class="p-6">
                            <div class="mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-green-500 to-green-600 shadow-lg shadow-green-600/30 transition-transform group-hover:scale-110">
                                <UIcon name="i-heroicons-chart-bar" class="h-7 w-7 text-white" />
                            </div>
                            <h3 class="mb-3 text-2xl font-bold text-gray-900 dark:text-white">Delivery Analytics</h3>
                            <p class="text-gray-600 dark:text-gray-300">
                                Real-time delivery tracking and comprehensive analytics to monitor your messaging performance.
                            </p>
                        </div>
                    </UCard>

                    <UCard class="group border-2 border-gray-100 transition-all hover:border-purple-200 hover:shadow-xl dark:border-gray-800 dark:hover:border-purple-900">
                        <div class="p-6">
                            <div class="mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-purple-500 to-purple-600 shadow-lg shadow-purple-600/30 transition-transform group-hover:scale-110">
                                <UIcon name="i-heroicons-arrows-right-left" class="h-7 w-7 text-white" />
                            </div>
                            <h3 class="mb-3 text-2xl font-bold text-gray-900 dark:text-white">Two-Way Messaging</h3>
                            <p class="text-gray-600 dark:text-gray-300">
                                Send and receive messages. Build interactive experiences with bidirectional SMS communication.
                            </p>
                        </div>
                    </UCard>

                    <UCard class="group border-2 border-gray-100 transition-all hover:border-indigo-200 hover:shadow-xl dark:border-gray-800 dark:hover:border-indigo-900">
                        <div class="p-6">
                            <div class="mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-500 to-indigo-600 shadow-lg shadow-indigo-600/30 transition-transform group-hover:scale-110">
                                <UIcon name="i-heroicons-code-bracket-square" class="h-7 w-7 text-white" />
                            </div>
                            <h3 class="mb-3 text-2xl font-bold text-gray-900 dark:text-white">Open Source</h3>
                            <p class="text-gray-600 dark:text-gray-300">
                                Fully transparent codebase on GitHub. Contribute, customize, and build with confidence. No vendor lock-in.
                            </p>
                        </div>
                    </UCard>
                </div>
            </UContainer>
        </section>

        <!-- Open Source Section -->
        <section class="border-y border-gray-200 bg-white py-24 dark:border-gray-800 dark:bg-gray-900">
            <UContainer>
                <div class="grid items-center gap-12 lg:grid-cols-2">
                    <div>
                        <UBadge variant="subtle" class="mb-6 bg-indigo-50 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-400">
                            <UIcon name="simple-icons:github" class="mr-1 h-4 w-4" />
                            Open Source Project
                        </UBadge>
                        <h2 class="mb-6 text-4xl font-bold text-gray-900 dark:text-white">
                            Built in the Open, For Everyone
                        </h2>
                        <p class="mb-6 text-lg text-gray-600 dark:text-gray-300">
                            Mensahero is completely open-source and free to use. We believe in transparency, community collaboration, and empowering developers worldwide.
                        </p>
                        <ul class="mb-8 space-y-3">
                            <li class="flex items-start gap-3">
                                <UIcon name="i-heroicons-check-circle-solid" class="mt-1 h-5 w-5 flex-shrink-0 text-green-500" />
                                <span class="text-gray-600 dark:text-gray-300">
                                    <strong class="text-gray-900 dark:text-white">MIT Licensed</strong> - Use it freely for personal or commercial projects
                                </span>
                            </li>
                            <li class="flex items-start gap-3">
                                <UIcon name="i-heroicons-check-circle-solid" class="mt-1 h-5 w-5 flex-shrink-0 text-green-500" />
                                <span class="text-gray-600 dark:text-gray-300">
                                    <strong class="text-gray-900 dark:text-white">Full Transparency</strong> - Every line of code is visible and auditable
                                </span>
                            </li>
                            <li class="flex items-start gap-3">
                                <UIcon name="i-heroicons-check-circle-solid" class="mt-1 h-5 w-5 flex-shrink-0 text-green-500" />
                                <span class="text-gray-600 dark:text-gray-300">
                                    <strong class="text-gray-900 dark:text-white">Community Driven</strong> - Contribute features, report bugs, and shape the roadmap
                                </span>
                            </li>
                            <li class="flex items-start gap-3">
                                <UIcon name="i-heroicons-check-circle-solid" class="mt-1 h-5 w-5 flex-shrink-0 text-green-500" />
                                <span class="text-gray-600 dark:text-gray-300">
                                    <strong class="text-gray-900 dark:text-white">Self-Hostable</strong> - Deploy on your own infrastructure for complete control
                                </span>
                            </li>
                        </ul>
                        <div class="flex flex-wrap gap-4">
                            <UButton
                                size="lg"
                                class="bg-gray-900 text-white hover:bg-gray-800 dark:bg-gray-700 dark:hover:bg-gray-600"
                                to="https://github.com/mensahero/mensahero-gateway"
                                target="_blank"
                            >
                                <UIcon name="simple-icons:github" class="mr-2 h-5 w-5" />
                                Star on GitHub
                            </UButton>
                            <UButton
                                size="lg"
                                variant="outline"
                                class="border-gray-300 text-gray-700 dark:border-gray-600 dark:text-gray-300"
                                to="https://github.com/mensahero/mensahero-gateway/fork"
                                target="_blank"
                            >
                                <UIcon name="i-heroicons-code-bracket-square" class="mr-2 h-5 w-5" />
                                Fork & Contribute
                            </UButton>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="rounded-2xl bg-gradient-to-br from-gray-900 to-gray-800 p-8 shadow-2xl">
                            <div class="mb-4 flex items-center gap-2">
                                <div class="flex gap-1.5">
                                    <div class="h-3 w-3 rounded-full bg-red-500"></div>
                                    <div class="h-3 w-3 rounded-full bg-yellow-500"></div>
                                    <div class="h-3 w-3 rounded-full bg-green-500"></div>
                                </div>
                                <span class="ml-4 text-sm text-gray-400">mensahero-gateway</span>
                            </div>
                            <div class="space-y-2 font-mono text-sm">
                                <div class="text-gray-400"># Clone the repository</div>
                                <div class="text-green-400">git clone https://github.com/mensahero/mensahero-gateway.git</div>
                                <div class="mt-4 text-gray-400"># Install dependencies</div>
                                <div class="text-blue-400">composer install && npm install</div>
                                <div class="mt-4 text-gray-400"># Start developing</div>
                                <div class="text-purple-400">php artisan serve</div>
                                <div class="text-purple-400">bun run dev</div>
                                <div class="mt-6 rounded-lg bg-gray-950 p-4">
                                    <div class="text-yellow-400">🚀 Server running on http://localhost:8000</div>
                                    <div class="text-cyan-400">⚡ Vite dev server running on http://localhost:5173</div>
                                </div>
                            </div>
                        </div>
                        <div class="absolute -right-4 -top-4 rounded-xl bg-red-600 px-4 py-2 text-sm font-bold text-white shadow-lg">
                            Free Forever
                        </div>
                    </div>
                </div>
            </UContainer>
        </section>

        <!-- Use Cases Section -->
        <section class="bg-gradient-to-b from-gray-50 to-white py-24 dark:from-gray-800 dark:to-gray-900">
            <UContainer>
                <div class="mb-20 text-center">
                    <h2 class="mb-4 text-4xl font-bold text-gray-900 sm:text-5xl dark:text-white">
                        Perfect For Every Business
                    </h2>
                    <p class="mx-auto max-w-2xl text-xl text-gray-600 dark:text-gray-300">
                        Whether you're a startup or enterprise, Mensahero powers your communication needs
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
                    <div class="rounded-2xl bg-white p-8 shadow-lg dark:bg-gray-800">
                        <div class="mb-4 flex items-center gap-3">
                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-red-100 dark:bg-red-900/30">
                                <UIcon name="i-heroicons-building-storefront" class="h-6 w-6 text-red-600 dark:text-red-400" />
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">E-commerce</h3>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300">
                            Send order confirmations, delivery updates, and promotional messages to customers instantly.
                        </p>
                    </div>

                    <div class="rounded-2xl bg-white p-8 shadow-lg dark:bg-gray-800">
                        <div class="mb-4 flex items-center gap-3">
                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-yellow-100 dark:bg-yellow-900/30">
                                <UIcon name="i-heroicons-building-office" class="h-6 w-6 text-yellow-600 dark:text-yellow-400" />
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Banking & Finance</h3>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300">
                            Secure OTP delivery, transaction alerts, and account notifications for financial institutions.
                        </p>
                    </div>

                    <div class="rounded-2xl bg-white p-8 shadow-lg dark:bg-gray-800">
                        <div class="mb-4 flex items-center gap-3">
                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 dark:bg-green-900/30">
                                <UIcon name="i-heroicons-heart" class="h-6 w-6 text-green-600 dark:text-green-400" />
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Healthcare</h3>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300">
                            Appointment reminders, test results, and patient communication for healthcare providers.
                        </p>
                    </div>

                    <div class="rounded-2xl bg-white p-8 shadow-lg dark:bg-gray-800">
                        <div class="mb-4 flex items-center gap-3">
                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 dark:bg-blue-900/30">
                                <UIcon name="i-heroicons-code-bracket" class="h-6 w-6 text-blue-600 dark:text-blue-400" />
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Developers</h3>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300">
                            Build communication features into your apps with our developer-friendly API and SDKs.
                        </p>
                    </div>
                </div>
            </UContainer>
        </section>

        <!-- CTA Section -->
        <section class="bg-gradient-to-r from-red-600 to-red-700 py-20">
            <UContainer>
                <div class="text-center">
                    <h2 class="mb-6 text-4xl font-bold text-white sm:text-5xl">
                        Join the Open Source Community
                    </h2>
                    <p class="mx-auto mb-10 max-w-2xl text-xl text-red-100">
                        Start building with Mensahero today. Free, open-source, and community-supported.
                    </p>
                    <div class="flex flex-col items-center justify-center gap-4 sm:flex-row">
                        <UButton
                            size="xl"
                            class="bg-white text-red-600 hover:bg-gray-100 shadow-xl"
                            @click="router.visit(route('register'))"
                        >
                            <UIcon name="i-heroicons-rocket-launch" class="mr-2 h-5 w-5" />
                            Get Started Free
                        </UButton>
                        <UButton
                            size="xl"
                            variant="outline"
                            class="border-2 border-white text-white hover:bg-white/10"
                            to="https://github.com/mensahero/mensahero-gateway"
                            target="_blank"
                        >
                            <UIcon name="simple-icons:github" class="mr-2 h-5 w-5" />
                            View on GitHub
                        </UButton>
                    </div>
                    <p class="mt-6 text-sm text-red-100">
                        No credit card required • Self-host or use our cloud • Always free and open
                    </p>
                </div>
            </UContainer>
        </section>

        <!-- Footer -->
        <UFooter class="border-t border-gray-200 dark:border-gray-800">
            <template #left>
                <div class="flex items-center gap-3">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-to-br from-red-600 to-red-700">
                        <span class="text-sm font-bold text-white">M</span>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-900 dark:text-white">Mensahero</p>
                        <p class="flex items-center gap-1 text-xs text-gray-500 dark:text-gray-400">
                            © {{ new Date().getFullYear() }} • Made with pride in the Philippines
                            <UIcon name="circle-flags:ph" class="h-4 w-4" />
                        </p>
                    </div>
                </div>
            </template>

            <template #right>
                <div class="flex items-center gap-2">
                    <UButton
                        to="https://github.com/mensahero/mensahero-gateway"
                        target="_blank"
                        icon="simple-icons:github"
                        aria-label="GitHub"
                        color="neutral"
                        variant="ghost"
                    />
                    <UBadge variant="subtle" class="bg-yellow-50 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400">
                        <UIcon name="i-heroicons-star" class="mr-1 h-3 w-3" />
                        Star us on GitHub
                    </UBadge>
                </div>
            </template>
        </UFooter>
    </div>
</template>

<script setup lang="ts">
import { router } from '@inertiajs/vue3'
</script>

<style scoped>
.bg-grid-pattern {
    background-image:
        linear-gradient(to right, rgba(0, 0, 0, 0.1) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(0, 0, 0, 0.1) 1px, transparent 1px);
    background-size: 40px 40px;
}
</style>
