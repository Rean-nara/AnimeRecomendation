<?php

/**
 * @var \CodeIgniter\Pager\PagerRenderer $pager
 */

$pager->setSurroundCount(2);
?>

<nav aria-label="<?= lang('Pager.pageNavigation') ?>" class="flex justify-center mt-4">
    <ul class="flex space-x-2">
        <?php foreach ($pager->links() as $link): ?>
            <li>
                <a href="<?= $link['uri'] ?>"
                    class="px-4 py-2 w-12 h-12 flex justify-center items-center <?= $link['active'] ? ' bg-slate-800 text-stone-200' : 'bg-gray-200 text-gray-700 hover:bg-slate-800 hover:text-stone-200' ?> rounded-full">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</nav>