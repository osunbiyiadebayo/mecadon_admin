<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $hand->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $hand->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Hands'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="hands form large-9 medium-8 columns content">
    <?= $this->Form->create($hand) ?>
    <fieldset>
        <legend><?= __('Edit Hand') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
