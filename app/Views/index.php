<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Recommendation</title>
    <link rel="stylesheet" href="<?= esc('/assets/css/styles.css') ?>">
    <link href="<?= esc('/assets/icon/favicon.ico') ?>" rel="icon" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>
</head>

<body>
    <!-- navbar -->
    <div class="relative h-32 w-full">
        <img src="<?= esc('/assets/img/banner.jpg') ?>" alt="" class="h-32 w-full object-cover bg-center bg-no-repeat">
        <div class="absolute inset-0 bg-gradient-to-t from-slate-800"></div>
    </div>
    <div class="h-10 bg-cover bg-center cover bg-slate-800 text-stone-200">
        <div class="flex items-center justify-around h-10">
            <a href="<?= base_url('/') ?>" class="font-bold">Home</a>
            <a href="<?= base_url('/anime/anime-list') ?>" class="hover:font-bold">Anime List</a>
            <!-- input genre 1 -->
            <div class="relative w-[7.25rem] flex justify-end">
                <div class="flex items-center cursor-pointer" id="triggerGenre1"
                    onclick="toggleDropdown('genreOpen1', 'triggerGenre1')">
                    <button type="text" name="genre1" id="genre1">Genre</button>
                    <img src="<?= esc('assets/icon/dropdown-svgrepo-com.svg') ?>" alt="" class="h-4 w-4 ml-2">
                </div>
                <div class="absolute top-full w-max bg-slate-800 shadow-lg border border-slate-400 rounded-md z-20 hidden left-0"
                    id="genreOpen1">
                    <ul class="h-max max-h-48 overflow-y-auto text-stone-200 flex flex-col divide-y divide-slate-400">
                        <li>
                            <button onclick="selectGenre('genre1','genreOpen1','Action')" id="Action"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 rounded-t-sm px-3 py-1 flex items-center gap-1 active-Action">Action
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Action">
                            </button>
                        </li>
                        <li>
                            <button onclick="selectGenre('genre1','genreOpen1','Adventure')" id="Adventure"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 px-3 py-1 flex items-center gap-1 active-Adventure">
                                Adventure
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Adventure">
                            </button>
                        </li>
                        <li>
                            <button onclick="selectGenre('genre1','genreOpen1','Comedy')" id="Comedy"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 px-3 py-1 flex items-center gap-1 active-Comedy">
                                Comedy
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Comedy">
                            </button>
                        </li>
                        <li>
                            <button onclick="selectGenre('genre1','genreOpen1','Drama')" id="Drama"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 px-3 py-1 flex items-center gap-1 active-Drama">
                                Drama
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Drama">
                            </button>
                        </li>
                        <li>
                            <button onclick="selectGenre('genre1','genreOpen1','Fantasy')" id="Fantasy"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 px-3 py-1 flex items-center gap-1 active-Fantasy">
                                Fantasy
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Fantasy">
                            </button>
                        </li>
                        <li>
                            <button onclick="selectGenre('genre1','genreOpen1','Horror')" id="Horror"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 px-3 py-1 flex items-center gap-1 active-Horror">
                                Horror
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Horror">
                            </button>
                        </li>
                        <li>
                            <button onclick="selectGenre('genre1','genreOpen1','Mystery')" id="Mystery"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 px-3 py-1 flex items-center gap-1 active-Mystery">
                                Mystery
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Mystery">
                            </button>
                        </li>
                        <li>
                            <button onclick="selectGenre('genre1','genreOpen1','Romance')" id="Romance"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 px-3 py-1 flex items-center gap-1 active-Romance">
                                Romance
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Romance">
                            </button>
                        </li>
                        <li>
                            <button onclick="selectGenre('genre1','genreOpen1','Sci-Fi')" id="Sci-Fi"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 px-3 py-1 flex items-center gap-1 active-Sci-Fi">
                                Sci-Fi
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Sci-Fi">
                            </button>
                        </li>
                        <li>
                            <button onclick="selectGenre('genre1','genreOpen1','Slice_of_Life')" id="Slice_of_Life"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 px-3 py-1 flex items-center gap-1  active-Slice_of_Life">
                                Slice of Life
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Slice_of_Life">
                            </button>
                        </li>
                        <li>
                            <button onclick="selectGenre('genre1','genreOpen1','Sports')" id="Sports"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 px-3 py-1 flex items-center gap-1 active-Sports">
                                Sports
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Sports">
                            </button>
                        </li>
                        <li>
                            <button onclick="selectGenre('genre1','genreOpen1','Super_Power')" id="Super_Power"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 rounded-b-sm px-3 py-1 flex items-center gap-1  active-Super_Power">
                                Super Power
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Super_Power">
                            </button>
                        </li>
                        <li>
                            <button onclick="selectGenre('genre1','genreOpen1','Supernatural')" id="Supernatural"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 px-3 py-1 flex items-center gap-1  active-Supernatural">
                                Supernatural
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Supernatural">
                            </button>
                        </li>
                        <li>
                            <button onclick="selectGenre('genre1','genreOpen1','Thriller')" id="Thriller"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 rounded-b-sm px-3 py-1 flex items-center gap-1  active-Thriller">
                                Thriller
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Thriller">
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- input genre 2 -->
            <div class="relative w-[7.25rem]">
                <div class="flex items-center cursor-pointer" id="triggerGenre2"
                    onclick="toggleDropdown('genreOpen2', 'triggerGenre2')">
                    <button type="text" name="genre2" id="genre2">Genre</button>
                    <img src="<?= esc('assets/icon/dropdown-svgrepo-com.svg') ?>" alt="" class="h-4 w-4 ml-2">
                </div>
                <div class="absolute top-full w-max bg-slate-800 shadow-lg border border-slate-400 rounded-md z-20 hidden -left-8"
                    id="genreOpen2">
                    <ul class="h-max max-h-48 overflow-y-auto text-stone-200 flex flex-col divide-y divide-slate-400">
                        <li>
                            <button onclick="selectGenre('genre2','genreOpen2','Action')" id="Action"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 rounded-t-sm px-3 py-1 flex items-center gap-1 active-Action">Action
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Action">
                            </button>
                        </li>
                        <li>
                            <button onclick="selectGenre('genre2','genreOpen2','Adventure')" id="Adventure"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 px-3 py-1 flex items-center gap-1 active-Adventure">
                                Adventure
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Adventure">
                            </button>
                        </li>
                        <li>
                            <button onclick="selectGenre('genre2','genreOpen2','Comedy')" id="Comedy"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 px-3 py-1 flex items-center gap-1 active-Comedy">
                                Comedy
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Comedy">
                            </button>
                        </li>
                        <li>
                            <button onclick="selectGenre('genre2','genreOpen2','Drama')" id="Drama"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 px-3 py-1 flex items-center gap-1 active-Drama">
                                Drama
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Drama">
                            </button>
                        </li>
                        <li>
                            <button onclick="selectGenre('genre2','genreOpen2','Fantasy')" id="Fantasy"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 px-3 py-1 flex items-center gap-1 active-Fantasy">
                                Fantasy
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Fantasy">
                            </button>
                        </li>
                        <li>
                            <button onclick="selectGenre('genre2','genreOpen2','Horror')" id="Horror"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 px-3 py-1 flex items-center gap-1 active-Horror">
                                Horror
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Horror">
                            </button>
                        </li>
                        <li>
                            <button onclick="selectGenre('genre2','genreOpen2','Mystery')" id="Mystery"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 px-3 py-1 flex items-center gap-1 active-Mystery">
                                Mystery
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Mystery">
                            </button>
                        </li>
                        <li>
                            <button onclick="selectGenre('genre2','genreOpen2','Romance')" id="Romance"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 px-3 py-1 flex items-center gap-1 active-Romance">
                                Romance
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Romance">
                            </button>
                        </li>
                        <li>
                            <button onclick="selectGenre('genre2','genreOpen2','Sci-Fi')" id="Sci-Fi"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 px-3 py-1 flex items-center gap-1 active-Sci-Fi">
                                Sci-Fi
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Sci-Fi">
                            </button>
                        </li>
                        <li>
                            <button onclick="selectGenre('genre2','genreOpen2','Slice_of_Life')" id="Slice_of_Life"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 px-3 py-1 flex items-center gap-1  active-Slice_of_Life">
                                Slice of Life
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Slice_of_Life">
                            </button>
                        </li>
                        <li>
                            <button onclick="selectGenre('genre2','genreOpen2','Sports')" id="Sports"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 px-3 py-1 flex items-center gap-1 active-Sports">
                                Sports
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Sports">
                            </button>
                        </li>
                        <li>
                            <button onclick="selectGenre('genre2','genreOpen2','Super_Power')" value="Super_Power"
                                id="Super_Power"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 rounded-b-sm px-3 py-1 flex items-center gap-1  active-Super_Power">
                                Super Power
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Super_Power">
                            </button>
                        </li>
                        <li>
                            <button onclick="selectGenre('genre2','genreOpen2','Supernatural')" id="Supernatural"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 px-3 py-1 flex items-center gap-1  active-Supernatural">
                                Supernatural
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Supernatural">
                            </button>
                        </li>
                        <li>
                            <button onclick="selectGenre('genre2','genreOpen2','Thriller')" id="Thriller"
                                class="w-full text-left text-stone-200 hover:bg-slate-500 rounded-b-sm px-3 py-1 flex items-center gap-1  active-Thriller">
                                Thriller
                                <img src="<?= esc('/assets/icon/select-svgrepo-com.svg') ?>" alt="check"
                                    class="h-4 w-4 hidden genre-Thriller">
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-wrap justify-around h-max min-h-[20.55rem]" id="animeContainer">
        <?php foreach ($anime as $data): ?>
            <div class="relative flex flex-col justify-items-center items-center max-w-sm bg-slate-800 border border-gray-200
        rounded-lg text-stone-200 w-72 mt-8 shadow-xl shadow-indigo-500/50 group overflow-hidden break-inside-avoid">
                <a href=" <?= base_url('anime/' . urlencode(strtolower($data['title']))) ?>">
                    <img src="<?= esc('/uploads/data/' . $data['poster']); ?>" alt="poster" class="h-60 w-64 object-cover
                bg-center bg-no-repeat mt-4">
                </a>
                <h1 class="text-xl font-bold text-center mx-4 line-clamp-1">
                    <?= esc($data['title']); ?>
                </h1>
                <p class=" text-xs mb-2 font-bold mx-4 text-center line-clamp-1">
                    <?= esc($data['genre']); ?>
                </p>
                <div
                    class="absolute inset-x-0 bottom-0 bg-slate-900 p-4 opacity-0 transition-all duration-300 ease-in-out transform translate-y-full group-hover:opacity-100 group-hover:translate-y-0">
                    <p class="text-sm text-justify line-clamp-4">
                        <?= esc($data['synopsis']); ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div id="pagerContainer">
        <?php echo $pager->links('default', 'custom_pager') ?>
    </div>

    <footer class="h-12 flex items-center mt-8 justify-center bg-slate-900">
        <h1 class="text-lg text-stone-200">Created by Rean © 2024</h1>
    </footer>
    <script>
        // Toggle dropdown genre
        function toggleDropdown(dropdownId, triggerId) {
            const genreDropdown = document.getElementById(dropdownId);
            const triggerDropdown = document.getElementById(triggerId);
            genreDropdown.classList.toggle("hidden")
            document.addEventListener("click", (event) => hideDropdownClick(event, dropdownId, triggerId));
            document.addEventListener("keydown", (event) => hideDropdownEsc(event, dropdownId));
        }
        // Hide dropdown by click
        function hideDropdownClick(event, dropdownId, triggerId) {
            const genreDropdown = document.getElementById(dropdownId);
            const triggerDropdown = document.getElementById(triggerId);
            if (genreDropdown && triggerDropdown) {
                if (!genreDropdown.contains(event.target) && !triggerDropdown.contains(event.target)) {
                    genreDropdown.classList.add("hidden");
                }
            }
        }

        // Hide dropdown by esc
        function hideDropdownEsc(event, dropdownId) {
            const genreDropdown = document.getElementById(dropdownId);
            if (event.key === "Escape") {
                genreDropdown.classList.add("hidden");
            }
        }

        // Select Genre
        let selectedGenre1 = ""
        let selectedGenre2 = ""
        function selectGenre(type, dropdownId, genre) {
            const genreType = document.getElementById(type);
            const listGenre = document.querySelectorAll(`#${dropdownId} button`);
            const selectedGenre = document.querySelectorAll(`#${dropdownId} .active-${genre}`);
            const allIcon = document.querySelectorAll(`#${dropdownId} img`);
            const genreIcons = document.querySelectorAll(`#${dropdownId} .genre-${genre}`);
            if ((type === "genre1" && selectedGenre1 === genre) || (type === "genre2" && selectedGenre2 === genre)) {
                if (type === "genre1") {
                    selectedGenre1 = null;
                } else if (type === "genre2") {
                    selectedGenre2 = null
                }
                genreType.textContent = "Genre";
                genreType.classList.remove("font-bold");
                genreIcons.forEach(icon => icon.classList.add("hidden"));
                selectedGenre.forEach(genre => genre.classList.remove("bg-slate-700"));
                toggleDropdown(dropdownId);
                fetchAnimeByGenres();
                return;
            }
            allIcon.forEach(icon => icon.classList.add("hidden"));
            listGenre.forEach(genre => genre.classList.remove("bg-slate-700"));
            if (type === "genre1") {
                selectedGenre1 = genre;
            } else if (type === "genre2") {
                selectedGenre2 = genre;
            }
            genreType.textContent = genre.replace(/_/g, ' ');
            genreType.classList.add("font-bold");
            selectedGenre.forEach(genre => genre.classList.add("bg-slate-700"));
            genreIcons.forEach(icon => icon.classList.remove("hidden"));
            toggleDropdown(dropdownId);
            fetchAnimeByGenres();
        }

        // Display by genre
        function fetchAnimeByGenres(page = 1) {
            const data = {
                genre1: selectedGenre1,
                genre2: selectedGenre2,
                page: parseInt(page, 10)
            };

            fetch('<?= base_url('/anime') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(data => {
                    const animeContainer = document.getElementById('animeContainer');
                    animeContainer.innerHTML = '';

                    if (data.data.length > 0) {
                        data.data.forEach(anime => {
                            const animeCard = `
                    <div class="relative flex flex-col justify-items-center items-center max-w-sm bg-slate-800 border border-gray-200 rounded-lg text-stone-200 w-72 mt-8 shadow-xl shadow-indigo-500/50 group overflow-hidden break-inside-avoid">
                        <a href="/anime/detail/${anime.id_anime}">
                            <img src="/uploads/data/${anime.poster}" alt="poster" class="h-60 w-64 object-cover bg-center bg-no-repeat mt-4">
                        </a>
                        <h1 class="text-xl font-bold text-center mx-4 line-clamp-1">${anime.title}</h1>
                        <p class="text-xs mb-2 font-bold mx-4 text-center">${anime.genre}</p>
                        <div class="absolute inset-x-0 bottom-0 bg-slate-900 p-4 opacity-0 transition-all duration-300 ease-in-out transform translate-y-full group-hover:opacity-100 group-hover:translate-y-0">
                            <p class="text-sm text-justify line-clamp-4">${anime.synopsis}</p>
                        </div>
                    </div>`;
                            animeContainer.innerHTML += animeCard;
                        });
                        const pagerContainer = document.getElementById('pagerContainer');
                        pagerContainer.innerHTML = data.pager;
                        attachPaginationEvent();

                    } else {
                        animeContainer.innerHTML = "<div class='flex items-center'><p>No anime found for the selected genres.</p></div>";
                    }
                })
                .catch(error => console.error('Error fetching anime:', error));
        }
        // Pager
        function attachPaginationEvent() {
            const paginationLinks = document.querySelectorAll('#pagerContainer a');
            paginationLinks.forEach(link => {
                link.addEventListener('click', function (event) {
                    event.preventDefault();
                    const page = this.href.split('page=')[1];
                    fetchAnimeByGenres(page);
                });
            });
        }
        attachPaginationEvent();
    </script>
</body>

</html>