<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($anime['title']) ?></title>
  <link rel="stylesheet" href="<?= esc('/assets/css/styles.css') ?>">
  <link href="<?= esc('/assets/icon/favicon.ico') ?>" rel="icon" type="image/x-icon">
  <link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>
</head>

<body>
  <!-- Navbar -->
  <div class="relative h-32 w-full">
    <img src="<?= esc('/uploads/data/' . $anime['navbar_cover']) ?>" alt="Navbar_Cover"
      class="h-32 w-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-t from-slate-800"></div>
  </div>
  <div class="h-10 bg-slate-800 text-stone-200">
    <div class="container mx-auto flex items-center justify-around space-x-6 h-10">
      <a href="<?= base_url('/anime') ?>" class="hover:font-bold">Home</a>
      <a href="<?= base_url('/anime/anime-list') ?>" class="hover:font-bold">Anime List</a>
    </div>
  </div>
  <!-- Content -->
  <div class="flex h-max mx-36 mt-8">
    <img src="<?= esc('/uploads/data/' . $anime['poster']) ?>" alt="poster" class="h-80 w-80 bg-center bg-no-repeat">
    <div class="ml-8 mt-5">
      <table class="table-auto w-full text-left capitalize">
        <tbody>
          <td>Title</td>
          <td>:</td>
          <td>
            <?= esc($anime['title']) ?>
          </td>
        </tbody>
        <tbody>
          <td>Japanese Title</td>
          <td> :</td>
          <td>
            <?= esc($anime['japanese_title']) ?>
          </td>
        </tbody>
        <tbody>
          <td>Genre</td>
          <td> :</td>
          <td>
            <?= esc($anime['genre']) ?>
          </td>
        </tbody>
        <tbody>
          <td>Score</td>
          <td> :</td>
          <td>
            <?= esc($anime['score']) ?>
          </td>
        </tbody>
        <tbody>
          <td>Type</td>
          <td> :</td>
          <td>
            <?= esc($anime['type']) ?>
          </td>
        </tbody>
        <tbody>
          <td>Status</td>
          <td> :</td>
          <td>
            <?= esc($anime['status']) ?>
          </td>
        </tbody>
        <tbody>
          <td>Total Episode</td>
          <td> :</td>
          <td>
            <?= esc($anime['total_episode']) ?>
          </td>
        </tbody>
        <tbody>
          <td>Duration</td>
          <td> :</td>
          <td>
            <?= esc($anime['duration']) ?>
          </td>
        </tbody>
        <tbody>
          <td>Release Date</td>
          <td> :</td>
          <td>
            <?= esc($anime['release_date']) ?>
          </td>
        </tbody>
        <tbody>
          <td>Studio</td>
          <td> :</td>
          <td>
            <?= esc($anime['studio']) ?>
          </td>
        </tbody>
        <tbody>
          <td>Producer</td>
          <td> :</td>
          <td>
            <?= esc($anime['producer']) ?>
          </td>
        </tbody>
      </table>
    </div>
  </div>
  <div class="mx-36 mt-2">
    <h1>Synopsis:</h1>
    <p class="text-justify">
      <?= esc($anime['synopsis']) ?>
    </p>
  </div>
</body>

</html>