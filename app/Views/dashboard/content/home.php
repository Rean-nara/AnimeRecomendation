<?= $this->extend('dashboard/main') ?>

<?= $this->section('content') ?>
<div class="ml-7 mt-7">
    <p class="text-xl capitalize">Welcome, <?= esc($username) ?></p>
</div>
<div class="flex items-center ml-7 mt-28">
    <p class="text-justify text-lg">
        Welcome to the Admin Dashboard! This exclusive area is designed specifically for
        administrators to efficiently create, manage, and organize posts for the anime recommendation
        website. Here, you have full control to update, delete, and add more content.
    </p>
    <img src="<?= esc('/assets/icon/home-dashboard.svg') ?>" class="w-40 h-40 ml-10 mr-5">
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
</script>
<?= $this->endSection() ?>