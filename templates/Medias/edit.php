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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $media->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $media->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Medias'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="medias form content">
            <?= $this->Form->create($media) ?>
            <fieldset>
                <legend><?= __('Edit Media') ?></legend>
                <?php
                    echo $this->Form->control('titre');
                    echo $this->Form->control('url');
                    echo $this->Form->control('type');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
