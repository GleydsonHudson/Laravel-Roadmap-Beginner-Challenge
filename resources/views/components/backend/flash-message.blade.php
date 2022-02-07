@props(
[
'type' => session('flash.type', 'success'),
'message' => session('flash.message')
]
)
<div x-data="{{ json_encode(['show' => true, 'type' => $type, 'message' => $message]) }}"
     :class="{'bg-green-500': type == 'success', 'bg-red-700': type == 'danger', 'bg-gray-500': type != 'success' && type != 'danger' }"
     style="display: none;"
     x-show="show && message"
     x-init="
            document.addEventListener('banner-message', event => {
                style = event.detail.style;
                message = event.detail.message;
                show = true;
            });
    ">
    <div class="relative">
        <div class="absolute -top-4 right-1 md:top-8 md:right-4 lg:right-44 w-auto p-1 rounded-lg " :class="{'bg-green-600': type == 'success', 'bg-red-600': type == 'danger'}">
            <div class="flex items-center justify-between flex-wrap">

                <div class="flex items-center">
                    <span class="p-2 rounded-lg">

                        <svg x-show="type == 'success'" class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        <svg x-show="type == 'danger'" class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        <svg x-show="type != 'success' && type != 'danger'" class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>

                    <p class="font-medium text-white truncate" x-text="message"></p>
                </div>

                <div>
                    <button
                        type="button"
                        class="-mr-1 flex p-2 rounded-md focus:outline-none transition"
                        :class="{ 'hover:bg-green-600 focus:bg-green-600': type == 'success', 'hover:bg-red-600 focus:bg-red-600': type == 'danger' }"
                        aria-label="Dismiss"
                        x-on:click="show = false">
                        <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
