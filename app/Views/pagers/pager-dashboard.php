<?php

/**
 * @var \CodeIgniter\Pager\PagerRenderer $pager
 */

$pager->setSurroundCount(1);
?>

<nav aria-label="<?= lang('Pager.pageNavigation') ?>"
    class="flex h-max border shadow-md bg-white w-full ml-8 justify-center rounded duration-300 py-4">
    <ul class="flex gap-1">
        <?php if ($pager->hasPrevious()): ?>
            <li>
                <a href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>"
                    class="px-4 py-2 w-12 h-12 flex justify-center items-center bg-gray-200 text-gray-700 hover:bg-slate-800 hover:text-stone-200 rounded-md">
                    <span aria-hidden="true"><?= lang('Pager.first') ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php foreach ($pager->links() as $link): ?>
            <li>
                <a href="<?= $link['uri'] ?>"
                    class="px-4 py-2 w-12 h-12 flex justify-center items-center <?= $link['active'] ? ' bg-slate-800 text-stone-200' : 'bg-gray-200 text-gray-700 hover:bg-slate-800 hover:text-stone-200' ?> rounded-md">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>
        <?php if ($pager->hasNext()): ?>
            <li>
                <a href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>"
                    class="px-4 py-2 w-12 h-12 flex justify-center items-center bg-gray-200 text-gray-700 hover:bg-slate-800 hover:text-stone-200 rounded-md">
                    <span aria-hidden="true"><?= lang('Pager.last') ?></span>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</nav>