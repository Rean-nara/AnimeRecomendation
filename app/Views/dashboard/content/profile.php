<?= $this->extend('dashboard/main') ?>

<?= $this->section('content') ?>
<div class="flex justify-center mt-5">
    <div class="w-[27rem] relative">
        <div class="relative flex items-center gap-10">
            <div class="relative h-44 w-44 rounded-full overflow-hidden">
                <!-- overlay -->
                <div id="activeEditPP"
                    class="hidden absolute bg-slate-900 rounded-full rotate-90 h-52 w-52 -right-[1.2rem] -bottom-32 opacity-0 hover:opacity-90 transition-opacity duration-300 z-20">
                    <p class="text-stone-200 text-sm bottom-24 -left-8 absolute -rotate-90" id="profileteks">
                        Click edit button first!</p>
                    <button class="absolute left-[2.7rem] bottom-[5.5rem] -rotate-90" id="changeProfile"><img
                            src="<?= esc('/assets/icon/camera-svgrepo-com.svg') ?>" alt="camera"
                            class="w-8 h-8"></button>
                </div>
                <!-- profile picture -->
                <img src="<?= esc('/uploads/admin/' . ($profilepics)); ?>" alt="Profile Pics" class="h-44 w-44"
                    id="profilePics">
            </div>
            <div class="flex flex-col">
                <h1 class="text-5xl"><?= esc(($username)); ?></h1>
                <h2 class="text-4xl text-blue-700"><?= esc(($email)); ?></h2>
            </div>
        </div>
        <p class="text-xs mt-4 text-red-600" id="context">*Click edit to enable edit mode</p>
        <h1 class="flex justify-center text-2xl mr-52 mt-8">Account Information</h1>
        <div class="w-full h-full">
            <div class="flex justify-left mt-5 flex-wrap w-full h-full ">
                <form action="/dashboard/profile/edit" class="flex flex-wrap gap-4 w-full" method="post"
                    enctype="multipart/form-data">
                    <div class="flex gap-y-2 flex-col w-full">
                        <div class="flex w-full gap-[1.60rem] items-center">
                            <input type="hidden" name="id_admin" id="id_admin" value="<?= esc($id_admin) ?>">
                            <label for="username" class="text-lg font-medium text-stone-700">Username<span
                                    class="text-red-700">*</span></label>
                            <input type="text" name="username" id="username" value="<?= esc(($username)) ?>" readonly
                                class="border border-gray-300 rounded-lg p-1 w-full focus:outline-none text-lg text-stone-700">
                        </div>
                        <div class="flex w-full gap-[3.7rem] items-center">
                            <label for="email" class="text-lg font-medium text-stone-700">Email<span
                                    class="text-red-700">*</span></label>
                            <input type="email" name="email" id="email" value="<?= esc(($email)) ?>" readonly
                                class="border border-gray-300 rounded-lg p-1 w-full focus:outline-none text-lg text-stone-700">
                        </div>
                        <div class="flex w-full gap-[1.2rem] items-center">
                            <label for="fullname" class="w-32 text-lg font-medium text-stone-700">Full name<span
                                    class="text-red-700">*</span></label>
                            <input type="text" name="fullname" id="fullname" value="<?= esc(($fullname)) ?>" readonly
                                class="border border-gray-300 rounded-lg p-1 w-full focus:outline-none text-lg text-stone-700">
                        </div>
                        <div class="absolute left-1 top-28 w-44 h-24 opacity-0 z-10">
                            <input type="hidden" id="old_pp" name="old_pp" value="<?= esc($profilepics) ?>">
                            <input type="file" id="new_pp" name="new_pp" accept="image/*" onchange="loadImage(event)">
                        </div>
                        <div class="flex justify-end w-full">
                            <button type="button" onclick="editable(event)" id="submit"
                                class="bg-blue-600 text-white font-medium px-6 py-2 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    //Toggle sidebar
    const button = document.getElementById("rotateButton");
    const sidebar = document.getElementById("sidebar");
    const main = document.getElementById("main");
    const table = document.getElementById("table");
    const stable = document.getElementById("table-search");
    let isSidebarOpen = true;

    button.addEventListener("click", () => {
        isSidebarOpen = !isSidebarOpen;
        button.style.transform = isSidebarOpen ? "rotate(-0deg)" : "rotate(+180deg)";
        main.style.marginLeft = isSidebarOpen ? "0" : "14rem";
        if (isSidebarOpen) {
            sidebar.classList.remove("-translate-x-0");
            sidebar.classList.add("-translate-x-56");
        } else {
            sidebar.classList.remove("-translate-x-56");
            sidebar.classList.add("-translate-x-0");
        }
    });

    // Toggle dropdown visibility
    const dropdownToggle = document.getElementById("dropdownToggle");
    const dropdownMenu = document.getElementById("dropdownMenu");

    dropdownToggle.addEventListener("click", () => {
        const isHidden = dropdownMenu.classList.contains("hidden");

        if (isHidden) {
            dropdownMenu.classList.remove("hidden", "opacity-0", "scale-95");
            dropdownMenu.classList.add("opacity-100", "scale-100");
        } else {
            dropdownMenu.classList.add("opacity-0", "scale-95");
            dropdownMenu.classList.remove("opacity-100", "scale-100");
            setTimeout(() => {
                dropdownMenu.classList.add("hidden");
            }, 200);
        }
    });

    //Change Profile Picture
    function changeProfile() {
        document.getElementById("new_pp").click();
    }

    //Preview Profile Picture
    function loadImage(event) {
        const output = document.getElementById("profilePics");
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function () {
            URL.revokeObjectURL(output.src);
        };
    }

    function editable(event) {
        if (event) event.preventDefault();
        const username = document.getElementById("username");
        const email = document.getElementById("email");
        const fullname = document.getElementById("fullname");
        const profileteks = document.getElementById("profileteks");
        const new_pp = document.getElementById("new_pp");
        const changeProfile = document.getElementById("changeProfile");
        const submit = document.getElementById("submit");
        const activeEditPP = document.getElementById("activeEditPP");
        const context = document.getElementById("context");

        username.removeAttribute("readonly");
        email.removeAttribute("readonly");
        fullname.removeAttribute("readonly");
        profileteks.innerText = "Click to change photo";
        new_pp.classList.remove("hidden");
        changeProfile.setAttribute("onclick", "changeProfile()");
        submit.innerText = "Save Changes";
        submit.setAttribute("type", "submit");
        submit.removeAttribute("onclick", "editable(event)");
        activeEditPP.classList.remove("hidden");
        context.classList.add("opacity-0");
    }
</script>
<?= $this->endSection() ?>