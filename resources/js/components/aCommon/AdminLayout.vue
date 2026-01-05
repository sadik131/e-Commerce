<template>
    <div class="bg-purple-200">
        <div class="p-6 flex flex-col gap-5">
            <!-- heding -->
            <h1 class="text-2xl font-semibold">
                <slot name="heading"/>
            </h1>
            <div>
                <slot />
            </div>
        </div>
    </div>

</template>