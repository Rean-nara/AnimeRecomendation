<div id="sidebar"
    class="h-full fixed top-0 left-0 w-56 bg-slate-800 text-stone-200 transform -translate-x-56 transition-transform duration-300 ">
    <!-- Konten sidebar -->
    <div class="flex items-center h-full flex-col">
        <div class="flex-[0.5] mt-14">
            <h1 class="font-bold">Anime Recommendation</h1>
        </div>
        <div class="flex-1">
            <div class="flex mb-7">
                <svg class="w-5 h-5" viewBox="0 0 1024 1024" fill="#ffffff" class="icon" version="1.1"
                    xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                    <g id="SVGRepo_bgCarrier" stroke-width="0" />
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M972 520.8c-6.4 0-12-2.4-16.8-7.2L530.4 86.4c-4.8-4.8-11.2-8-18.4-8-6.4 0-12.8 2.4-18.4 8L68.8 512c-4.8 4.8-10.4 7.2-16.8 7.2s-12-2.4-16-6.4c-4.8-4-7.2-8.8-7.2-15.2-0.8-7.2 2.4-14.4 7.2-19.2L458.4 52.8c14.4-14.4 32.8-22.4 52.8-22.4s38.4 8 52.8 22.4L988.8 480c4.8 4.8 7.2 11.2 7.2 18.4 0 7.2-4 13.6-8.8 17.6-4.8 3.2-10.4 4.8-15.2 4.8z"
                            fill="" />
                        <path
                            d="M637.6 998.4v-33.6h-33.6V904c0-51.2-41.6-92-92-92-51.2 0-92 41.6-92 92v60.8h-33.6v33.6H196.8c-40.8 0-73.6-32.8-73.6-73.6V509.6c0-13.6 10.4-24 24-24s24 10.4 24 24v415.2c0 14.4 11.2 25.6 25.6 25.6h175.2v-45.6c0-77.6 63.2-140 140-140s140 63.2 140 140v45.6h175.2c14.4 0 25.6-11.2 25.6-25.6V509.6c0-13.6 10.4-24 24-24s24 10.4 24 24v415.2c0 40.8-32.8 73.6-73.6 73.6H637.6z"
                            fill="" />
                        <path d="M604 998.4v-48h48v48h-48z m-232 0v-48h48v48h-48z" fill="" />
                    </g>
                </svg>
                <a href="<?= base_url('dashboard') ?>"
                    class="cursor-pointer hover:font-bold ml-3 <?= service('uri')->getSegment(1) === 'dashboard' && service('uri')->getTotalSegments() === 1 ? 'font-bold' : '' ?>">
                    <p>Dashboard</p>
                </a>
            </div>
            <div class="flex mb-7">
                <svg class="w-5 h-5" viewBox="0 -0.5 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" class="si-glyph si-glyph-code" fill="#ffffff">
                    <g id="SVGRepo_bgCarrier" stroke-width="0" />
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                    <g id="SVGRepo_iconCarrier">
                        <title>815</title>
                        <defs> </defs>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(0.000000, 1.000000)" fill="#fcfcfc">
                                <path
                                    d="M11.74,10.993 C11.918,10.993 12.096,10.928 12.233,10.798 L15.712,7.482 C15.983,7.221 15.983,6.802 15.712,6.543 L12.233,3.225 C11.961,2.966 11.521,2.966 11.249,3.225 C10.978,3.486 10.978,3.906 11.249,4.163 L14.236,7.013 L11.249,9.861 C10.978,10.12 10.978,10.541 11.249,10.799 C11.385,10.928 11.563,10.993 11.74,10.993 L11.74,10.993 Z"
                                    class="si-glyph-fill"> </path>
                                <path
                                    d="M4.301,10.883 C4.121,10.883 3.942,10.821 3.804,10.693 L0.287,7.425 C0.012,7.17 0.012,6.756 0.287,6.502 L3.804,3.234 C4.078,2.978 4.524,2.978 4.799,3.234 C5.072,3.49 5.072,3.903 4.799,4.158 L1.779,6.963 L4.799,9.767 C5.072,10.023 5.072,10.437 4.799,10.693 C4.661,10.82 4.48,10.883 4.301,10.883 L4.301,10.883 Z"
                                    class="si-glyph-fill"> </path>
                                <path
                                    d="M6.685,13.889 C6.928,13.832 7.131,13.64 7.188,13.379 L9.934,0.885 C10.012,0.531 9.793,0.188 9.446,0.117 C9.096,0.047 8.753,0.277 8.676,0.631 L5.93,13.125 C5.852,13.477 6.072,13.82 6.418,13.891 C6.51,13.909 6.601,13.907 6.685,13.889 L6.685,13.889 Z"
                                    class="si-glyph-fill"> </path>
                            </g>
                        </g>
                    </g>
                </svg>
                <a href="<?= base_url('/dashboard/manage/data') ?>"
                    class="cursor-pointer hover:font-bold ml-3 <?= service('uri')->getSegment(1) === 'dashboard' && service('uri')->getSegment(2) === 'manage' && service('uri')->getSegment(3) === 'data' ? 'font-bold' : '' ?>">
                    <p>Post Management</p>
                </a>
            </div>
            <?php if (session('role') === 'Superuser'): ?>
                <div class="flex">
                    <svg fill="#e7e5e4" class="w-5 h-5" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" enable-background="new 0 0 24 24"
                        xml:space="preserve">
                        <g id="SVGRepo_bgCarrier" stroke-width="0" />
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                        <g id="SVGRepo_iconCarrier">
                            <g id="user-admin">
                                <path
                                    d="M22.3,16.7l1.4-1.4L20,11.6l-5.8,5.8c-0.5-0.3-1.1-0.4-1.7-0.4C10.6,17,9,18.6,9,20.5s1.6,3.5,3.5,3.5s3.5-1.6,3.5-3.5 c0-0.6-0.2-1.2-0.4-1.7l1.9-1.9l2.3,2.3l1.4-1.4l-2.3-2.3l1.1-1.1L22.3,16.7z M12.5,22c-0.8,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5 s1.5,0.7,1.5,1.5S13.3,22,12.5,22z" />
                                <path
                                    d="M2,19c0-3.9,3.1-7,7-7c2,0,3.9,0.9,5.3,2.4l1.5-1.3c-0.9-1-1.9-1.8-3.1-2.3C14.1,9.7,15,7.9,15,6c0-3.3-2.7-6-6-6 S3,2.7,3,6c0,1.9,0.9,3.7,2.4,4.8C2.2,12.2,0,15.3,0,19v5h8v-2H2V19z M5,6c0-2.2,1.8-4,4-4s4,1.8,4,4s-1.8,4-4,4S5,8.2,5,6z" />
                            </g>
                        </g>
                    </svg>
                    <a href="<?= base_url('/dashboard/manage/admin') ?>"
                        class="cursor-pointer hover:font-bold ml-3 <?= service('uri')->getSegment(1) === 'dashboard' && service('uri')->getSegment(2) === 'manage' && service('uri')->getSegment(3) === 'admin' ? 'font-bold' : '' ?>">
                        <p>Admin Management</p>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>