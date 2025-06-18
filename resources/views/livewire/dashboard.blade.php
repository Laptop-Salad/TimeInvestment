<div>
    <x-header>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <x-slot name="actions">
            <x-dropdown>
                <x-slot:trigger>
                    <x-button>
                        <i class="fa-regular fa-plus me-2"></i>
                        New Investment
                    </x-button>
                </x-slot:trigger>

                <x-dropdown.item wire:click="$dispatch('show-activity-form')">
                    <i class="fa-regular fa-person-walking w-8"></i>
                    New Activity
                </x-dropdown.item>
                <x-dropdown.item wire:click="$dispatch('show-investment-form')">
                    <i class="fa-regular fa-chart-mixed-up-circle-dollar w-8"></i>
                    New Investment
                </x-dropdown.item>
            </x-dropdown>
        </x-slot>
    </x-header>

    <livewire:investment.table />

    <x-modals.small
      x-model="$wire.show_welcome_message"
      title="Welcome to TimeInvestment!"
      width="max-w-4xl"
    >
        <p>
            We're thrilled to have you on board. Time Investment is designed to help you track how much time you invest in your hobbies, work, or studies and give you a clear picture of where that effort is going.
            <br><br>
            By visualizing your time, our goal is to keep you motivated and mindful, helping you make the most of every minute.
            <br><br>
            Let’s get started!
        </p>

        <div class="flex justify-end">
            <x-ti.button size="sm" wire:click="dismissWelcomeMessage">
                Get Started!
            </x-ti.button>
        </div>
    </x-modals.small>

    <x-modals.small
      x-model="$wire.show_activities_introduction"
      title="Introducing Goals"
      width="max-w-4xl"
    >
        <p>
            Activities allow you to group investments together to keep track of your work towards something specific. This could be
            towards your career, studies or anything else.
        </p>

        <div class="flex justify-end">
            <x-ti.button size="sm" wire:click="dismissActivitiesIntroduction">
                Get Started!
            </x-ti.button>
        </div>
    </x-modals.small>
</div>
