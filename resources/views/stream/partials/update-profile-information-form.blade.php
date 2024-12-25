<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("List user's profile details.") }}
        </p>
    </header>

    <div class="flex flex-col mt-6 space-y-6 sm:space-y-0 sm:flex-row sm:space-x-6">
        <div class="w-1/2">
            <p>
                curl -H "Authorization: Bearer [access token]" https://api.restream.io/v2/user/profile
            </p>
        </div>
        <div class="w-1/2">
            <p>
                {{ $profile }}
            </p>
        </div>
    </div>
</section>
