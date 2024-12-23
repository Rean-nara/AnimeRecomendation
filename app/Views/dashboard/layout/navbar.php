<header class="bg-white py-2 flex shadow-lg items-center">
    <button id="rotateButton" class="h-12 w-12 duration-300 flex-0">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#000000"
            stroke-width="0.00024000000000000003">
            <g id="SVGRepo_bgCarrier" stroke-width="0" />
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
            <g id="SVGRepo_iconCarrier">
                <path
                    d="M5.6 2A2.6 2.6 0 0 0 3 4.6v4.8A2.6 2.6 0 0 0 5.6 12h2.8A2.6 2.6 0 0 0 11 9.4V4.6A2.6 2.6 0 0 0 8.4 2H5.6ZM5.6 14A2.6 2.6 0 0 0 3 16.6v2.8A2.6 2.6 0 0 0 5.6 22h2.8a2.6 2.6 0 0 0 2.6-2.6v-2.8A2.6 2.6 0 0 0 8.4 14H5.6ZM15.6 2A2.6 2.6 0 0 0 13 4.6v2.8a2.6 2.6 0 0 0 2.6 2.6h2.8A2.6 2.6 0 0 0 21 7.4V4.6A2.6 2.6 0 0 0 18.4 2h-2.8ZM15.6 12a2.6 2.6 0 0 0-2.6 2.6v4.8a2.6 2.6 0 0 0 2.6 2.6h2.8a2.6 2.6 0 0 0 2.6-2.6v-4.8a2.6 2.6 0 0 0-2.6-2.6h-2.8Z"
                    fill="#011819" />
            </g>
        </svg>
    </button>
    <div class="flex-1 flex items-center justify-end mr-10 relative">
        <img src="<?= esc('/uploads/admin/' . ($profilepics)); ?>" alt="Toggle Sidebar" class="rounded-full h-14 w-14">
        <div class="relative ml-3">
            <p class="text-lg"><?= esc($username) ?></p>
            <p class="text-xs absolute top-3/4 text-gray-500">
                <?= esc($role) ?>
            </p>
        </div>
        <button class="w-4 h-4 duration-150" id="dropdownToggle">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M5.70711 9.71069C5.31658 10.1012 5.31658 10.7344 5.70711 11.1249L10.5993 16.0123C11.3805 16.7927 12.6463 16.7924 13.4271 16.0117L18.3174 11.1213C18.708 10.7308 18.708 10.0976 18.3174 9.70708C17.9269 9.31655 17.2937 9.31655 16.9032 9.70708L12.7176 13.8927C12.3271 14.2833 11.6939 14.2832 11.3034 13.8927L7.12132 9.71069C6.7308 9.32016 6.09763 9.32016 5.70711 9.71069Z"
                    fill="#0F0F0F" />
            </svg>
        </button>
        <div id="dropdownMenu"
            class="absolute shadow-lg z-[1000] w-max max-h-96 overflow-auto right-0 top-full bg-white border opacity-0 scale-95 transform transition-all duration-200 ease-out hidden">
            <div class="py-3 px-5 hover:bg-gray-50 text-gray-800 text-sm">
                <a href="<?= base_url('/dashboard/profile') ?>" class="flex gap-2">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0" />
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                        <g id="SVGRepo_iconCarrier">
                            <g id="style=fill">
                                <g id="profile">
                                    <path id="vector (Stroke)" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.75 6.5C6.75 3.6005 9.1005 1.25 12 1.25C14.8995 1.25 17.25 3.6005 17.25 6.5C17.25 9.3995 14.8995 11.75 12 11.75C9.1005 11.75 6.75 9.3995 6.75 6.5Z"
                                        fill="#1e183b" />
                                    <path id="rec (Stroke)" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.25 18.5714C4.25 15.6325 6.63249 13.25 9.57143 13.25H14.4286C17.3675 13.25 19.75 15.6325 19.75 18.5714C19.75 20.8792 17.8792 22.75 15.5714 22.75H8.42857C6.12081 22.75 4.25 20.8792 4.25 18.5714Z"
                                        fill="#1e183b" />
                                </g>
                            </g>
                        </g>
                    </svg>
                    <h1>Profile</h1>
                </a>
            </div>
            <div class="py-3 px-5 hover:bg-gray-50 text-gray-800 text-sm">
                <a href="<?= base_url('/dashboard/logout') ?>" class="flex gap-2">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        transform="rotate(180)">
                        <g id="SVGRepo_bgCarrier" stroke-width="0" />
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M17.2929 14.2929C16.9024 14.6834 16.9024 15.3166 17.2929 15.7071C17.6834 16.0976 18.3166 16.0976 18.7071 15.7071L21.6201 12.7941C21.6351 12.7791 21.6497 12.7637 21.6637 12.748C21.87 12.5648 22 12.2976 22 12C22 11.7024 21.87 11.4352 21.6637 11.252C21.6497 11.2363 21.6351 11.2209 21.6201 11.2059L18.7071 8.29289C18.3166 7.90237 17.6834 7.90237 17.2929 8.29289C16.9024 8.68342 16.9024 9.31658 17.2929 9.70711L18.5858 11H13C12.4477 11 12 11.4477 12 12C12 12.5523 12.4477 13 13 13H18.5858L17.2929 14.2929Z"
                                fill="#1e293b" />
                            <path
                                d="M5 2C3.34315 2 2 3.34315 2 5V19C2 20.6569 3.34315 22 5 22H14.5C15.8807 22 17 20.8807 17 19.5V16.7326C16.8519 16.647 16.7125 16.5409 16.5858 16.4142C15.9314 15.7598 15.8253 14.7649 16.2674 14H13C11.8954 14 11 13.1046 11 12C11 10.8954 11.8954 10 13 10H16.2674C15.8253 9.23514 15.9314 8.24015 16.5858 7.58579C16.7125 7.4591 16.8519 7.35296 17 7.26738V4.5C17 3.11929 15.8807 2 14.5 2H5Z"
                                fill="#1e293b" />
                        </g>
                    </svg>
                    <h1>Logout</h1>
                </a>
            </div>
        </div>
    </div>
</header>