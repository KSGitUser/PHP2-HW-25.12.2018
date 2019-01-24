<?php /** @var \app\models\Product $product */?>
<h1><?=$product->name?></h1>
<p><?=$product->description?></p>
<form method="post">
<input name="productId" value=<?=$product->id?> hidden="hidden">
<label> Количество: <input type="text" name="quantity"> </label>
<button type="submit">В корзину</button>
</form>
<a href="/basket/preview">Корзина</a>