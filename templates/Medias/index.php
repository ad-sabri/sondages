<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Media[]|\Cake\Collection\CollectionInterface $medias
 */
?>
<div class="medias index content">
    <?= $this->Html->link(__('New Media'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Medias') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('titre') ?></th>
                    <th><?= $this->Paginator->sort('url') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($medias as $media): ?>
                <tr>
                    <td><?= $this->Number->format($media->id) ?></td>
                    <td><?= h($media->titre) ?></td>
                    <td><?= h($media->url) ?></td>
                    <td><?= h($media->type) ?></td>
                    <td><?= h($media->created) ?></td>
                    <td><?= h($media->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $media->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $media->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $media->id], ['confirm' => __('Are you sure you want to delete # {0}?', $media->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
