<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Questionnaire $questionnaire
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Questionnaire'), ['action' => 'edit', $questionnaire->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Questionnaire'), ['action' => 'delete', $questionnaire->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionnaire->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Questionnaires'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Questionnaire'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="questionnaires view content">
            <h3><?= h($questionnaire->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($questionnaire->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($questionnaire->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Published') ?></th>
                    <td><?= h($questionnaire->published) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($questionnaire->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($questionnaire->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Surveys') ?></h4>
                <?php if (!empty($questionnaire->surveys)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Question') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($questionnaire->surveys as $surveys) : ?>
                        <tr>
                            <td><?= h($surveys->id) ?></td>
                            <td><?= h($surveys->user_id) ?></td>
                            <td><?= h($surveys->question) ?></td>
                            <td><?= h($surveys->created) ?></td>
                            <td><?= h($surveys->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Surveys', 'action' => 'view', $surveys->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Surveys', 'action' => 'edit', $surveys->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Surveys', 'action' => 'delete', $surveys->id], ['confirm' => __('Are you sure you want to delete # {0}?', $surveys->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
