<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Questionnaire[]|\Cake\Collection\CollectionInterface $questionnaires
 */
?>
<div class="questionnaires index content">
    <?= $this->Html->link(__('New Questionnaire'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Questionnaires') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('published') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($questionnaires as $questionnaire): ?>
                <tr>
                    <td><?= $this->Number->format($questionnaire->id) ?></td>
                    <td><?= h($questionnaire->title) ?></td>
                    <td><?= h($questionnaire->published) ?></td>
                    <td><?= h($questionnaire->created) ?></td>
                    <td><?= h($questionnaire->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $questionnaire->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $questionnaire->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $questionnaire->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionnaire->id)]) ?>
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
