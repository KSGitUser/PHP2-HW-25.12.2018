<?php /** @var \app\models\Order $order */ ?>
<h1>Каталог</h1>
<table>
<?php foreach ($order as $item): ?>
<tr>
  <?php foreach($item as $key=>$value): ?>
    <td><?=($value === 'bd') ?: $value ?></td>
  
<?php endforeach; ?>
</tr>
<?php endforeach; ?>
</table>
