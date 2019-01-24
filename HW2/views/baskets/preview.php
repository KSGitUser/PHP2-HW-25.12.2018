<?php /** @var \app\models\Basket $basket */ ?>
<h1>Корзина</h1>
<table>
<th>
  <td>#</td>
  <td>Наименование</td>
  <td>Цена</td>
  <td>Количество</td>
</th>
<?php foreach ($basket as $array): ?>
<tr>
  <?php foreach($array['product'] as $key=>$value): ?>
    <?= ($key !== 'vendor_id')  ? "<td> {$value} </td>" : null?>  
<?php endforeach; ?>
    <td><?=$array['ammount']?></td>
</tr>
<?php endforeach; ?>

</table>
<a href="/product/"> Каталог</a>
<a href="/order/"> Оформить заказ </a>