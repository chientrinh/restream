<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <section>
                    <a href="{{ route('login.restream') }}" class="text-blue-500 rounded">Login</a>
                </section>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
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
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Selected ingest') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Get user's selected ingest id") }}
                        </p>
                    </header>

                    <div class="flex flex-col mt-6 space-y-6 sm:space-y-0 sm:flex-row sm:space-x-6">
                        <div class="w-1/2">
                            <p>
                                "Authorization: Bearer [access token]" https://api.restream.io/v2/user/ingest
                            </p>
                        </div>
                        <div class="w-1/2">
                            <p>
                                {{ $ingestServer }}
                            </p>
                        </div>
                    </div>
                </section>
            </div>


            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Stream key') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Get a user's stream key") }}
                        </p>
                    </header>

                    <div class="flex flex-col mt-6 space-y-6 sm:space-y-0 sm:flex-row sm:space-x-6">
                        <div class="w-1/2">
                            <p>
                                curl -H "Authorization: Bearer [access token]" https://api.restream.io/v2/user/streamKey
                            </p>
                        </div>
                        <div class="w-1/2">
                            <p>
                                {{ $streamKey }}
                            </p>
                        </div>
                    </div>
                </section>
            </div>


            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Channels') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("List user's channels") }}
                        </p>
                    </header>

                    <div class="flex flex-col mt-6 space-y-6 sm:space-y-0 sm:flex-row sm:space-x-6">
                        <div class="w-1/2">
                            <p>
                                curl -H "Authorization: Bearer [access token]"
                                https://api.restream.io/v2/user/channel/all
                            </p>
                        </div>
                        <div class="w-1/2">
                            <p>
                                {{ $channels }}
                            </p>
                        </div>
                    </div>
                </section>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Channel') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Get user channel by id') }}
                        </p>
                    </header>

                    <div class="flex flex-col mt-6 space-y-6 sm:space-y-0 sm:flex-row sm:space-x-6">
                        <div class="w-1/2">
                            <p>
                                curl -H "Authorization: Bearer [access token]"
                                https://api.restream.io/v2/user/channel/123456
                            </p>
                        </div>
                        <div class="w-1/2">
                            <p>
                                {{ $channel }}
                            </p>
                        </div>
                    </div>
                </section>
            </div>


            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Channel Meta') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Get user channel meta by id') }}
                        </p>
                    </header>

                    <div class="flex flex-col mt-6 space-y-6 sm:space-y-0 sm:flex-row sm:space-x-6">
                        <div class="w-1/2">
                            <p>
                                curl -H "Authorization: Bearer [access token]"
                                https://api.restream.io/v2/user/channel-meta/123456
                            </p>
                        </div>
                        <div class="w-1/2">
                            <p>
                                {{ $channelMeta }}
                            </p>
                        </div>
                    </div>
                </section>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Chat URL') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Get a user's chat URL") }}
                        </p>
                    </header>

                    <div class="flex flex-col mt-6 space-y-6 sm:space-y-0 sm:flex-row sm:space-x-6">
                        <div class="w-1/2">
                            <p>
                                curl -H "Authorization: Bearer [access token]"
                                https://api.restream.io/v2/user/webchat/url
                            </p>
                        </div>
                        <div class="w-1/2">
                            <p>
                                {{ $chatUrl }}
                            </p>
                        </div>
                    </div>
                </section>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Upcoming events') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("List of user's events") }}
                        </p>
                    </header>

                    <div class="flex flex-col mt-6 space-y-6 sm:space-y-0 sm:flex-row sm:space-x-6">
                        <div class="w-1/2">
                            <p>
                                curl -H "Authorization: Bearer [access token]"
                                https://api.restream.io/v2/user/events/upcoming?source=1&scheduled=true
                            </p>
                        </div>
                        <div class="w-1/2">
                            <p>
                                {{ $upcomingEvents }}
                            </p>
                        </div>
                    </div>
                </section>
            </div>


            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('In Progress events') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("List of user's events") }}
                        </p>
                    </header>

                    <div class="flex flex-col mt-6 space-y-6 sm:space-y-0 sm:flex-row sm:space-x-6">
                        <div class="w-1/2">
                            <p>
                                curl -H "Authorization: Bearer [access token]"
                                https://api.restream.io/v2/user/events/upcoming?source=1&scheduled=true
                            </p>
                        </div>
                        <div class="w-1/2">
                            <p>
                                {{ $inProgressEvents }}
                            </p>
                        </div>
                    </div>
                </section>
            </div>


            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Events history') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("List of user's finished and missed events") }}
                        </p>
                    </header>

                    <div class="flex flex-col mt-6 space-y-6 sm:space-y-0 sm:flex-row sm:space-x-6">
                        <div class="w-1/2">
                            <p>
                                curl -H "Authorization: Bearer [access token]"
                                https://api.restream.io/v2/user/events/upcoming?source=1&scheduled=true
                            </p>
                        </div>
                        <div class="w-1/2">
                            <p>
                                {{ $eventsHistory }}
                            </p>
                        </div>
                    </div>
                </section>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Event') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Get user event by id') }}
                        </p>
                    </header>

                    <div class="flex flex-col mt-6 space-y-6 sm:space-y-0 sm:flex-row sm:space-x-6">
                        <div class="w-1/2">
                            <p>
                                curl -H "Authorization: Bearer [access token]"
                                https://api.restream.io/v2/user/events/2527849f-f961-4b1d-8ae0-8eae4f068327
                            </p>
                        </div>
                        <div class="w-1/2">
                            <p>
                                {{ $event }}
                            </p>
                        </div>
                    </div>
                </section>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Streaming updates') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Listen for streaming-related updates events') }}
                        </p>
                    </header>

                    <div class="flex flex-col mt-6 space-y-6 sm:space-y-0 sm:flex-row sm:space-x-6">
                        <div class="w-1/2">
                            <p>
                                wss://streaming.api.restream.io/ws?accessToken=${accessToken}
                            </p>
                        </div>
                        <div id="liveStream" class="w-1/2 h-64 overflow-auto">

                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
</x-app-layout>


<script>
    const accessToken = '{{ $accessToken }}';
    const url = `wss://streaming.api.restream.io/ws?accessToken=${accessToken}`;
    const connection = new WebSocket(url);

    connection.onmessage = (message) => {
        const update = JSON.parse(message.data);

        const videoElement = document.getElementById('liveStream');
        videoElement.innerHTML += `<p>${JSON.stringify(update)}</p>`;
    };

    connection.onerror = console.error;
</script>
