<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Media $media
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Media'), ['action' => 'edit', $media->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Media'), ['action' => 'delete', $media->id], ['confirm' => __('Are you sure you want to delete # {0}?', $media->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Medias'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Media'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="medias view content">
            <h3><?= h($media->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Titre') ?></th>
                    <td><?= h($media->titre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Url') ?></th>
                    <td><?= h($media->url) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($media->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($media->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($media->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($media->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Surveys') ?></h4>
                <?php if (!empty($media->surveys)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Question') ?></th>
                            <th><?= __('Media Id') ?></th>
                            <th><?= __('Picture') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($media->surveys as $surveys) : ?>
                        <tr>
                            <td><?= h($surveys->id) ?></td>
                            <td><?= h($surveys->user_id) ?></td>
                            <td><?= h($surveys->question) ?></td>
                            <td><?= h($surveys->media_id) ?></td>
                            <td><?= h($surveys->picture) ?></td>
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
