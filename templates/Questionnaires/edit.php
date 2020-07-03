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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $questionnaire->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $questionnaire->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Questionnaires'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="questionnaires form content">
            <?= $this->Form->create($questionnaire) ?>
            <fieldset>
                <legend><?= __('Edit Questionnaire') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('published', ['empty' => true]);
                    echo $this->Form->control('surveys._ids', ['options' => $surveys]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
