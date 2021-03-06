<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Products Color'), ['action' => 'edit', $productsColor->product_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Products Color'), ['action' => 'delete', $productsColor->product_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsColor->product_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products Colors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Products Color'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Colors'), ['controller' => 'Colors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Color'), ['controller' => 'Colors', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productsColors view large-9 medium-8 columns content">
    <h3><?= h($productsColor->product_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $productsColor->has('product') ? $this->Html->link($productsColor->product->name, ['controller' => 'Products', 'action' => 'view', $productsColor->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Color') ?></th>
            <td><?= $productsColor->has('color') ? $this->Html->link($productsColor->color->name, ['controller' => 'Colors', 'action' => 'view', $productsColor->color->id]) : '' ?></td>
        </tr>
    </table>
</div>
