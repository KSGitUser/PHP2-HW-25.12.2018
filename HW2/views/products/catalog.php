<?php /** @var \app\models\Product $product */?>
<h1>Каталог</h1>
<table>
<?php foreach ($product as $item): ?>

<tr>

  <?php foreach ($item as $key => $value): ?>
  <td><a href="/product/card/?id=<?=$item->id?>"><?=($value === 'bd') ?: $value?></a></td>
  
<?php endforeach;?>

</tr>

<?php endforeach;?>
</table>
