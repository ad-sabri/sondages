<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Survey $survey
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="surveys view content">
            <h3><?= __('Sondage '). h($survey->id)
				.' - '. __('créé par ').ucfirst($survey->user->nickname)
				.' ('. h($survey->created).')' ?></h3>
            <table>
				<tr>
                    <th><?= __('Média').' :' ?></th>
                    <td><?= $this->Html->link(__('Afficher'), [
						'controller' => 'medias',
						'action' => 'showMedia',
						$survey->media_id], ['class' => 'side-nav-item']) ?></td>
                </tr>
                <tr>
                    <th><?= __('Question').' :' ?></th>
                    <td><?= h($survey->question) ?></td>
                </tr>
				<tr>
                    <th><?= __('Réponses').' :' ?></th>
                    <td><?= count($survey->responses).' réponses' ?></td>
                </tr>
            </table>
            <div class="related">
                <h4></h4>
                <?php if (!empty($survey->responses)) : ?>
                <div class="table-responsive">
                    <table>
                        <?php foreach ($survey->responses as $responses) : ?>
                        <tr>
                            <td><?= h($responses->id) ?></td>
                            <td><?= h($responses->title) ?></td>
                            <td><?= h($responses->count).' votes' ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
