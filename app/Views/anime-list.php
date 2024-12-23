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
            <a href="<?= base_url('/') ?>" class="hover:font-bold">Home</a>
            <a href="<? base_url('/anime/anime-list') ?>" class="font-bold">Anime List</a>
        </div>
    </div>
    <div class="mx-9 mt-8">
        <!-- button -->
        <div class="flex h-max justify-center flex-wrap gap-4">
            <button class="bg-slate-800 w-12 h-12 text-lg text-stone-200 hover:bg-slate-700"
                onclick="select('A')">A</button>
            <button class="bg-slate-800 w-12 h-12 text-lg text-stone-200 hover:bg-slate-700"
                onclick="select('B')">B</button>
            <button class="bg-slate-800 w-12 h-12 text-lg text-stone-200 hover:bg-slate-700"
                onclick="select('C')">C</button>
            <button class="bg-slate-800 w-12 h-12 text-lg text-stone-200 hover:bg-slate-700"
                onclick="select('D')">D</button>
            <button class="bg-slate-800 w-12 h-12 text-lg text-stone-200 hover:bg-slate-700"
                onclick="select('E')">E</button>
            <button class="bg-slate-800 w-12 h-12 text-lg text-stone-200 hover:bg-slate-700"
                onclick="select('F')">F</button>
            <button class="bg-slate-800 w-12 h-12 text-lg text-stone-200 hover:bg-slate-700"
                onclick="select('G')">G</button>
            <button class="bg-slate-800 w-12 h-12 text-lg text-stone-200 hover:bg-slate-700"
                onclick="select('H')">H</button>
            <button class="bg-slate-800 w-12 h-12 text-lg text-stone-200 hover:bg-slate-700"
                onclick="select('J')">I</button>
            <button class="bg-slate-800 w-12 h-12 text-lg text-stone-200 hover:bg-slate-700"
                onclick="select('K')">K</button>
            <button class="bg-slate-800 w-12 h-12 text-lg text-stone-200 hover:bg-slate-700"
                onclick="select('L')">L</button>
            <button class="bg-slate-800 w-12 h-12 text-lg text-stone-200 hover:bg-slate-700"
                onclick="select('M')">M</button>
            <button class="bg-slate-800 w-12 h-12 text-lg text-stone-200 hover:bg-slate-700"
                onclick="select('N')">N</button>
            <button class="bg-slate-800 w-12 h-12 text-lg text-stone-200 hover:bg-slate-700"
                onclick="select('O')">O</button>
            <button class="bg-slate-800 w-12 h-12 text-lg text-stone-200 hover:bg-slate-700"
                onclick="select('Q')">P</button>
            <button class="bg-slate-800 w-12 h-12 text-lg text-stone-200 hover:bg-slate-700"
                onclick="select('Q')">Q</button>
            <button class="bg-slate-800 w-12 h-12 text-lg text-stone-200 hover:bg-slate-700"
                onclick="select('R')">R</button>
            <button class="bg-slate-800 w-12 h-12 text-lg text-stone-200 hover:bg-slate-700"
                onclick="select('S')">S</button>
            <button class="bg-slate-800 w-12 h-12 text-lg text-stone-200 hover:bg-slate-700"
                onclick="select('T')">T</button>
            <button class="bg-slate-800 w-12 h-12 text-lg text-stone-200 hover:bg-slate-700"
                onclick="select('U')">U</button>
            <button class="bg-slate-800 w-12 h-12 text-lg text-stone-200 hover:bg-slate-700"
                onclick="select('V')">V</button>
            <button class="bg-slate-800 w-12 h-12 text-lg text-stone-200 hover:bg-slate-700"
                onclick="select('W')">W</button>
            <button class="bg-slate-800 w-12 h-12 text-lg text-stone-200 hover:bg-slate-700"
                onclick="select('X')">X</button>
            <button class="bg-slate-800 w-12 h-12 text-lg text-stone-200 hover:bg-slate-700"
                onclick="select('Y')">Y</button>
            <button class="bg-slate-800 w-12 h-12 text-lg text-stone-200 hover:bg-slate-700"
                onclick="select('Z')">Z</button>
        </div>
        <!-- List -->
        <h1 class="mt-8 flex justify-center text-xl" id="listAlphabet">A</h1>
        <hr class="bg-slate-800 rounded h-[3px]">
        <div class="mt-4 min-h-[11.6rem]">
            <ul class="flex flex-wrap text-lg list-disc list-inside" id="listContainer">
                <?php foreach ($anime as $data): ?>
                    <li class="w-1/3">
                        <a href=" <?= base_url('anime/' . urlencode($data['title'])) ?>">
                            <?= esc($data['title']); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div id="pagerContainer">
        <?php echo $pager->links('default', 'custom_pager') ?>
    </div>
    <footer class="h-12 flex items-center mt-4 justify-center bg-slate-900">
        <h1 class="text-lg text-stone-200">Created by Rean © 2024</h1>
    </footer>
    <script>
        let clickedButton = ""
        function select(alphabet) {
            const listAlphabet = document.getElementById("listAlphabet");
            clickedButton = alphabet;
            listAlphabet.textContent = alphabet;
            fetchListByAlphabet();
        }
        // Display by alphabet
        function fetchListByAlphabet(page = 1) {
            const data = {
                alphabet: clickedButton,
                page: parseInt(page, 10)
            };
            fetch('<?= base_url('/anime/anime-list') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(data => {
                    const listContainer = document.getElementById('listContainer');
                    listContainer.innerHTML = '';

                    if (data.data.length > 0) {
                        data.data.forEach(anime => {
                            const listCard = `
                             <li class="w-1/3">
                                <a href="/anime/detail/${anime.id_anime}">
                                ${anime.title}</a>
                            </li>`;
                            listContainer.innerHTML += listCard;
                        });
                        const pagerContainer = document.getElementById('pagerContainer');
                        pagerContainer.innerHTML = data.pager;
                        attachPaginationEvent();
                    } else {
                        listContainer.innerHTML = "<p>No anime found for the selected alphabet.</p>";
                    }
                })
                .catch(error => console.error('Error fetching anime:', error));
        }
        //pager
        function attachPaginationEvent() {
            const paginationLinks = document.querySelectorAll('#pagerContainer a');
            paginationLinks.forEach(link => {
                link.addEventListener('click', function (event) {
                    event.preventDefault();
                    const page = this.href.split('page=')[1];
                    fetchListByAlphabet(page);
                });
            });
        }
        attachPaginationEvent();
    </script>
</body>

</html>