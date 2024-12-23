<?= $this->extend('dashboard/main') ?>

<?= $this->section('content') ?>
<div class="ml-7 mt-7 flex justify-center transition-all">
    <p class="text-2xl font-bold">Admin Management</p>
</div>

<div class="flex h-11 border shadow-md bg-white w-82 ml-8 justify-between items-center rounded duration-300"
    id="table-search">
    <div class="ml-2">
        <label for="searchInput">Search:</label>
        <input type="text" onkeyup="searchData()" id="searchInput" name="searchInput"
            class="border text-stone-600 focus:outline-none">
    </div>
    <button onclick="openForm('create')"
        class="bg-green-600 rounded w-20 h-8 text-white text-xs mr-2 hover:bg-green-700 ring-green-600 focus:ring-2">
        Input Data
    </button>
</div>
<div class="overflow-x-auto w-82 h-[29rem] ml-8 duration-300" id="table">
    <table class="table-fixed w-full max-w-full text-sm text-left text-gray-400 border-collapse capitalize">
        <thead class="text-xs text-stone-400 uppercase bg-gray-800 sticky top-0 z-10">
            <tr>
                <th class="px-6 py-3 w-10">Id</th>
                <th class="px-6 py-3 w-32">Username</th>
                <th class="px-6 py-3 w-32">Fullname</th>
                <th class="px-6 py-3 w-32">Role</th>
                <th class="px-6 py-3 w-32">Email</th>
                <th class="px-6 py-3 w-24">Profile Picture</th>
                <th class="px-6 py-3 w-32 text-center">Action</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            <?php foreach ($datas as $data): ?>
                <tr class="bg-gray-800 border-b border-gray-700 hover:bg-gray-700 dataRow">
                    <td class="px-6 py-4"></td>
                    <td class="px-6 py-4"></td>
                    <td class="px-6 py-4"></td>
                    <td class="px-6 py-4"></td>
                    <td class="px-6 py-4 normal-case"></td>
                    <td class="px-6 py-4"></td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center mr-3 gap-4 opacity-0">
                            <button
                                class="bg-blue-900 w-16 h-10 rounded py-2.5 hover:text-white hover:bg-blue-700 ring-blue-900 focus:ring-2">Edit</button>
                            <button
                                class=" bg-red-900 w-16 h-10 rounded py-2.5 hover:text-white hover:bg-red-700 ring-red-900 focus:ring-2">Delete</button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- Form input -->
<div id="modal-input"
    class="w-[26rem] p-6 h-[30rem] z-50 absolute duration-300 border bg-white shadow-lg rounded-lg left-1/2 top-16 -translate-x-2/4 overflow-y-hidden overflow-x-hidden hidden ">
    <div class=" mb-5 text-center">
        <button onclick="hidePopup('modal-input')" type="button"
            class="absolute top-3 end-3 h-8 w-8 hover:bg-gray-300 rounded-lg">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0" />
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                <g id="SVGRepo_iconCarrier">
                    <path d="M16 8L8 16M8.00001 8L16 16" stroke="#9ca3af" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </g>
            </svg>
        </button>
        <h1 class="text-2xl font-semibold text-gray-800" id="form-title">Create/Edit Admin</h1>
    </div>
    <form action="/create" class="flex flex-wrap gap-2" method="post" enctype="multipart/form-data" id="form">
        <div class="flex gap-4">
            <input type="hidden" name="id_admin" id="id_admin">
            <div class="flex flex-col w-1/2">
                <label for="username" class="text-sm font-medium text-gray-600 mb-1 w-max">Username:<span
                        class="text-red-600 text-base">*</span></label>
                <input type="text" name="username" id="username" placeholder="Type here..."
                    class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
            </div>
            <div class="flex flex-col w-1/2">
                <label for="fullname" class="text-sm font-medium text-gray-600 mb-1 w-max">Fullname:<span
                        class="text-red-600 text-base">*</span></label>
                <input type="text" name="fullname" id="fullname" placeholder="Type here..."
                    class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
            </div>
        </div>
        <div class="flex gap-4">
            <div class="flex flex-col w-1/2">
                <label for="password" class="text-sm font-medium text-gray-600 mb-1 w-max" id="label-password">New
                    Password:<span class="text-red-600 text-base">*</span></label>
                <input type="password" name="password" id="password" placeholder="Type here..."
                    class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
                <p class="text-xs text-gray-600">Min length: 5 characters</p>
            </div>
            <div class="flex flex-col w-1/2">
                <label for="confpassword" class="text-sm font-medium text-gray-600 mb-1 w-max">Password
                    Confirmation:<span class="text-red-600 text-base">*</span></label>
                <input type="password" name="confpassword" id="confpassword" placeholder="Type here..."
                    class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
            </div>
        </div>
        <div class="flex gap-4">
            <div class="flex flex-col w-[10.32rem]">
                <label for="role" class="text-sm font-medium text-gray-600 mb-1 w-max">Role:<span
                        class="text-red-600 text-base">*</span></label>
                <select name="role" id="role"
                    class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm cursor-pointer">
                    <option value="Admin">Admin</option>
                    <option value="Superuser">Superuser</option>
                </select>
            </div>
            <div class="flex flex-col w-1/2">
                <label for="email" class="text-sm font-medium text-gray-600 mb-1 w-max">Email:<span
                        class="text-red-600 text-base">*</span></label>
                <input type="email" name="email" id="email" placeholder="Type here..."
                    class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
            </div>
        </div>
        <div class="flex">
            <div class="flex flex-col w-[10.32rem]">
                <label for="new_pp" class="text-sm font-medium text-gray-600 mb-1 w-max">Profile Picture:<span
                        class="text-red-600 text-base">*</span></label>
                <input type="hidden" name="old_pp" id="old_pp">
                <div class="relative">
                    <input type="file" name="new_pp" id="new_pp"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10 file:cursor-pointer"
                        accept="image/*" onchange="updateFileLabel(this, 'profilepics-label')">
                    <div
                        class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm flex items-center justify-between cursor-pointer">
                        <span id="profilepics-label" class="text-gray-600 line-clamp-4" onload="openForm()"></span>
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.5535 2.49392C12.4114 2.33852 12.2106 2.25 12 2.25C11.7894 2.25 11.5886 2.33852 11.4465 2.49392L7.44648 6.86892C7.16698 7.17462 7.18822 7.64902 7.49392 7.92852C7.79963 8.20802 8.27402 8.18678 8.55352 7.88108L11.25 4.9318V16C11.25 16.4142 11.5858 16.75 12 16.75C12.4142 16.75 12.75 16.4142 12.75 16V4.9318L15.4465 7.88108C15.726 8.18678 16.2004 8.20802 16.5061 7.92852C16.8118 7.64902 16.833 7.17462 16.5535 6.86892L12.5535 2.49392Z"
                                fill="#1C274C" />
                            <path
                                d="M3.75 15C3.75 14.5858 3.41422 14.25 3 14.25C2.58579 14.25 2.25 14.5858 2.25 15V15.0549C2.24998 16.4225 2.24996 17.5248 2.36652 18.3918C2.48754 19.2919 2.74643 20.0497 3.34835 20.6516C3.95027 21.2536 4.70814 21.5125 5.60825 21.6335C6.47522 21.75 7.57754 21.75 8.94513 21.75H15.0549C16.4225 21.75 17.5248 21.75 18.3918 21.6335C19.2919 21.5125 20.0497 21.2536 20.6517 20.6516C21.2536 20.0497 21.5125 19.2919 21.6335 18.3918C21.75 17.5248 21.75 16.4225 21.75 15.0549V15C21.75 14.5858 21.4142 14.25 21 14.25C20.5858 14.25 20.25 14.5858 20.25 15C20.25 16.4354 20.2484 17.4365 20.1469 18.1919C20.0482 18.9257 19.8678 19.3142 19.591 19.591C19.3142 19.8678 18.9257 20.0482 18.1919 20.1469C17.4365 20.2484 16.4354 20.25 15 20.25H9C7.56459 20.25 6.56347 20.2484 5.80812 20.1469C5.07435 20.0482 4.68577 19.8678 4.40901 19.591C4.13225 19.3142 3.9518 18.9257 3.85315 18.1919C3.75159 17.4365 3.75 16.4354 3.75 15Z"
                                fill="#1C274C" />
                        </svg>
                    </div>
                </div>
                <p class="text-xs text-gray-600">Max size: 100KB (JPG, JPEG, PNG Only)</p>
            </div>
        </div>
        <div class="w-full flex justify-end">
            <button type="submit" id="form_submit"
                class="bg-blue-600 text-white font-medium px-6 py-2 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                Submit
            </button>
        </div>
    </form>
</div>
<!-- Popup Delete -->
<div id="modal-delete" class="fixed w-max hidden z-50 top-[30%] right-[37%] h-max">
    <div class="relative p-4 rounded-lg shadow bg-white">
        <button type="button" onclick="hidePopup('modal-delete')"
            class="absolute top-3 end-3 h-8 w-8 hover:bg-gray-600 rounded-lg">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0" />
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                <g id="SVGRepo_iconCarrier">
                    <path d="M16 8L8 16M8.00001 8L16 16" stroke="#9ca3af" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </g>
            </svg>
        </button>
        <svg class="w-20 h-20 mb-4 mx-auto" viewBox="-0.5 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0" />
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
            <g id="SVGRepo_iconCarrier">
                <path
                    d="M10.8809 16.15C10.8809 16.0021 10.9101 15.8556 10.967 15.7191C11.024 15.5825 11.1073 15.4586 11.2124 15.3545C11.3175 15.2504 11.4422 15.1681 11.5792 15.1124C11.7163 15.0567 11.8629 15.0287 12.0109 15.03C12.2291 15.034 12.4413 15.1021 12.621 15.226C12.8006 15.3499 12.9399 15.5241 13.0211 15.7266C13.1024 15.9292 13.122 16.1512 13.0778 16.3649C13.0335 16.5786 12.9272 16.7745 12.7722 16.9282C12.6172 17.0818 12.4204 17.1863 12.2063 17.2287C11.9922 17.2711 11.7703 17.2494 11.5685 17.1663C11.3666 17.0833 11.1938 16.9426 11.0715 16.7618C10.9492 16.5811 10.8829 16.3683 10.8809 16.15ZM11.2408 13.42L11.1008 8.20001C11.0875 8.07453 11.1008 7.94766 11.1398 7.82764C11.1787 7.70761 11.2424 7.5971 11.3268 7.5033C11.4112 7.40949 11.5144 7.33449 11.6296 7.28314C11.7449 7.2318 11.8697 7.20526 11.9958 7.20526C12.122 7.20526 12.2468 7.2318 12.3621 7.28314C12.4773 7.33449 12.5805 7.40949 12.6649 7.5033C12.7493 7.5971 12.813 7.70761 12.8519 7.82764C12.8909 7.94766 12.9042 8.07453 12.8909 8.20001L12.7609 13.42C12.7609 13.6215 12.6809 13.8149 12.5383 13.9574C12.3958 14.0999 12.2024 14.18 12.0009 14.18C11.7993 14.18 11.606 14.0999 11.4635 13.9574C11.321 13.8149 11.2408 13.6215 11.2408 13.42Z"
                    fill="#666666" />
                <path
                    d="M12 21.5C17.1086 21.5 21.25 17.3586 21.25 12.25C21.25 7.14137 17.1086 3 12 3C6.89137 3 2.75 7.14137 2.75 12.25C2.75 17.3586 6.89137 21.5 12 21.5Z"
                    stroke="#666666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </g>
        </svg>
        <h3 class="mb-5 text-lg text-gray-600" id="titleData">Are you sure you want
            to delete title</b>?</h3>
        <div class="flex justify-center space-x-4" id="deleteData">
            <button
                class="text-sm  text-stone-200 bg-red-700 hover:bg-red-900 focus:ring-2 focus:ring-red-900 flex items-center px-5 py-2.5 rounded-lg">Yes,
                I'm Sure</button>
            <button onclick="hidePopup('modal-delete')"
                class="text-sm  text-stone-400 bg-gray-800 border-gray-600 hover:bg-gray-700 hover:text-stone-200 focus:ring-2 focus:ring-gray-700 flex items-center px-5 py-2.5 rounded-lg border">No,
                Cancel</button>
        </div>
    </div>
</div>
<!-- Pager -->
<div id="pagerContainer" class="w-82">
    <?php echo $pager->links('default', 'custom_pager_dashboard') ?>
</div>
<!-- bg overlay -->
<div id="modal-overlay" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden z-40 transition-opacity">
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
    const pagerContainer = document.getElementById("pagerContainer");
    let isSidebarOpen = true;

    button.addEventListener("click", () => {
        isSidebarOpen = !isSidebarOpen;
        button.style.transform = isSidebarOpen ? "rotate(-0deg)" : "rotate(+180deg)";
        main.style.marginLeft = isSidebarOpen ? "0" : "14rem";
        if (isSidebarOpen) {
            sidebar.classList.remove("-translate-x-0");
            sidebar.classList.add("-translate-x-56");
            table.classList.add("w-82");
            table.classList.remove("w-68");
            stable.classList.add("w-82");
            stable.classList.remove("w-68");
            pagerContainer.classList.add("w-82");
            pagerContainer.classList.remove("w-68");
        } else {
            sidebar.classList.remove("-translate-x-56");
            sidebar.classList.add("-translate-x-0");
            table.classList.remove("w-82");
            table.classList.add("w-68");
            stable.classList.add("w-68");
            stable.classList.remove("w-82");
            pagerContainer.classList.add("w-68");
            pagerContainer.classList.remove("w-82");
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

    //Popup delete data
    function btnDeleteData(id, title) {
        const modalDelete = document.getElementById("modal-delete");
        const titleData = document.getElementById("titleData");
        const deleteData = document.getElementById("deleteData");
        const overlay = document.getElementById("modal-overlay");
        const baseUrl = "<?= base_url(); ?>";
        if (modalDelete.classList.contains("hidden")) {
            modalDelete.classList.remove("hidden");
            overlay.classList.remove("hidden");
        } else {
            modalDelete.classList.add("hidden");
            overlay.classList.add("hidden");
        }
        titleData.innerHTML = `Are you sure you want to fire <b>${title}</b>?`;
        deleteData.innerHTML = `<a href="${baseUrl}dashboard/manage/admin/delete/${id}">
        <button class="text-sm text-stone-200 bg-red-700 hover:bg-red-900 focus:ring-2 focus:ring-red-900 flex items-center px-5 py-2.5 rounded-lg">
            Yes, I'm Sure
        </button></a>
        <button onclick="hidePopup('modal-delete')"
                class="text-sm  text-stone-400 bg-gray-800 border-gray-600 hover:bg-gray-700 hover:text-stone-200 focus:ring-2 focus:ring-gray-700 flex items-center px-5 py-2.5 rounded-lg border">No,
                Cancel
        </button>`;
    }

    //Close Popup
    function hidePopup(id) {
        const hidePopup = document.getElementById(id);
        const overlay = document.getElementById("modal-overlay");
        if (!hidePopup.classList.contains("hidden")) {
            hidePopup.classList.add("hidden");
            overlay.classList.add("hidden");
        } else {
            hidePopup.classList.delete("hidden");
            overlay.classList.delete("hidden");
        }
    }
    // Pop up input/edit data
    function openForm(mode, d_id_admin = null, d_username = "", d_fullname = "", d_role = "", d_email = "", d_profilepics = "") {
        const input = document.getElementById("modal-input");
        const f_title = document.getElementById("form-title");
        const form = document.getElementById("form");
        const id_admin = document.getElementById("id_admin");
        const username = document.getElementById("username");
        const fullname = document.getElementById("fullname");
        const role = document.getElementById("role");
        const email = document.getElementById("email");
        const profilepics = document.getElementById("old_pp");
        const submit = document.getElementById("form_submit");
        const overlay = document.getElementById("modal-overlay");
        const labelProfilePics = document.getElementById("profilepics-label");
        const isVisible = input.classList.contains("hidden");
        const labelpassword = document.getElementById("label-password");
        //if its create button, then its form for create
        if (mode == "create") {
            f_title.innerText = "Create Admin";
            form.action = "/dashboard/manage/create/admin";
            id_admin.value = "";
            username.value = "";
            fullname.value = "";
            labelpassword.innerHTML = 'Password:<span class="text-red-600 text-base">*</span>'
            role.value = "";
            email.value = "";
            profilepics.value = "";
            submit.innerText = "Create";
            labelProfilePics.innerHTML = "Choose a file...";
        }
        //if its edit button, then its form for edit
        else if (mode == "edit") {
            f_title.innerText = "Edit Admin";
            form.action = "/dashboard/manage/edit/admin";
            id_admin.value = d_id_admin;
            username.value = d_username;
            fullname.value = d_fullname;
            role.value = d_role;
            labelpassword.innerHTML = 'Changes Password:<span class="text-red-600 text-base">*</span>'
            email.value = d_email;
            profilepics.value = d_profilepics;
            submit.innerText = "Save Changes";
            labelProfilePics.value = d_profilepics;
            labelProfilePics.innerText = d_profilepics;
        }

        if (isVisible) {
            input.classList.remove("hidden");
            overlay.classList.add("block");
            overlay.classList.remove("hidden");
        } else {
            overlay.classList.add("hidden");
            overlay.classList.remove("block");
        }
    }

    // label input file update
    function updateFileLabel(input, labelId) {
        const label = document.getElementById(labelId);
        if (input.files && input.files[0]) {
            label.textContent = input.files[0].name;
        } else {
            label.textContent = "Choose a file...";
        }
    }

    //Get data from database use fetch
    function fetchTableData(page = 1, search = '') {
        const data = {
            page: parseInt(page, 10),
            search: search.trim()
        }
        fetch('<?= base_url('/dashboard/manage/admin') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
            .then(response => response.json())
            .then(data => {
                const tableBody = document.getElementById('tableBody');
                tableBody.innerHTML = data.data.map(admin => `
                    <tr class="bg-gray-800 border-b border-gray-700 hover:bg-gray-700 dataRow">
                    <td class="px-6 py-4">${admin.id_admin}</td>
                    <td class="px-6 py-4">${admin.username}</td>
                    <td class="px-6 py-4">${admin.fullname}</td>
                    <td class="px-6 py-4">${admin.role}</td>
                    <td class="px-6 py-4 normal-case">${admin.email}</td>
                    <td class="px-6 py-4">
                        <img src="/uploads/admin/${admin.profilepics}" alt="Profilepics"
                            class="h-12 w-12 rounded">
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center mr-3 gap-4">
                            <button
                                onclick="openForm('edit', ${admin.id_admin}, '${admin.username}', '${admin.fullname}', '${admin.role}', '${admin.email}', '${admin.profilepics}')"
                                class="bg-blue-900 w-16 h-10 rounded py-2.5 hover:text-white hover:bg-blue-700 ring-blue-900 focus:ring-2">Edit</button>
                            <button onclick="btnDeleteData(${admin.id_admin}, '${admin.username}')"
                                class="bg-red-900 w-16 h-10 rounded py-2.5 hover:text-white hover:bg-red-700 ring-red-900 focus:ring-2">Delete</button>
                        </div>
                    </td>
                    </tr>
                    `).join('');
                const pagerContainer = document.getElementById('pagerContainer');
                pagerContainer.innerHTML = data.pager;
                attachPaginationEvent();
            })
            .catch(error => console.error('Error fetching table data:', error));
    }
    //Search data
    function searchData() {
        const searchInput = document.getElementById("searchInput").value;
        fetchTableData(1, searchInput);
        console.log(searchInput);
    }
    // Pager
    function attachPaginationEvent() {
        const paginationLinks = document.querySelectorAll('#pagerContainer a');
        paginationLinks.forEach(link => {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                const page = this.href.split('page=')[1];
                const searchInput = document.getElementById("searchInput").value;
                fetchTableData(page, searchInput);
            });
        });
    }
    attachPaginationEvent()
    fetchTableData();
</script>
<?= $this->endSection() ?>