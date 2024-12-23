/** @type {import('tailwindcss').Config} */
module.exports = {
  important: true,
  content: ["./app/views/index.php", "./app/views/anime-detail.php", "./app/views/anime-list.php", "./app/views/dashboard/main.php", "./app/views/dashboard/login.php", "./app/views/pagers/pager.php", "./app/views/pagers/pager-dashboard.php", "./app/views/dashboard/layout/sidebar.php", "./app/views/dashboard/layout/navbar.php", "./app/views/dashboard/content/home.php", "./app/views/dashboard/content/manage-data.php", "./app/views/dashboard/content/profile.php", "./app/views/dashboard/content/manage-admin.php"],
  theme: {
    extend: {
      width: {
        82: "82rem",
        68: "68rem",
      },
      spacing: {
        31: "31rem",
        38: "38rem",
      },
      keyframes: {
        fadeSlideDown: {
          "0%": {
            opacity: 0,
            transform: "translate3d(0, -100%, 0)",
          },
          "100%": {
            opacity: 1,
            transform: "translate3d(0, 0, 0)",
          },
        },
        fadeSlideUp: {
          "0%": {
            opacity: 1,
          },
          "100%": {
            opacity: 0,
            transform: "translate3d(0, -100%, 0)",
          },
        },
      },
      animation: {
        slideDown: "fadeSlideDown ease-in 1s 1",
        slideUp: "fadeSlideUp 1s ease-in-out 0.5s 1",
      },
    },
  },
  plugins: [],
};
