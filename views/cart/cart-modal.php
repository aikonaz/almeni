<?php
use yii\helpers\Url;
?>
<?php if(!empty($session['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Фото</th>
                    <th>Наименование</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th><span class="glyphicon glyphicon-remove" arial-hidden="true"></span></th>
                </tr>
            </thead>
            <tbody>
               <?php foreach ($session['cart'] as $id => $item): ?>
                 <tr>
                   <td><?= \yii\helpers\Html::img($item['img'], ['alt' => $item['name'], 'height' => 50]) ?></td>
                     <td><a href="<?= Url::to(['product/view', 'id' => $id])?>"><?= $item['name']?></a></td>
                   <td><?= $item['qty']?></td>
                   <td><?= $item['price']?></td>
                   <td><span class="glyphicon glyphicon-remove text-danger del-item" arial-hidden="true" data-id="<?= $id?>"></span></td>
                     </tr>
               <?php endforeach; ?>
                 <tr>
                     <td colspan="4"><strong>Итого:</strong></td>
                     <td><?= $session['cart.qty']?><strong> шт.</strong></td>
                 </tr>
                 <tr>
                     <td colspan="4"><strong>На сумму:</strong> </td>
                     <td><?= $session['cart.sum']?> <strong>cом</strong></td>
                 </tr>
            </tbody>
        </table>
    </div>
  <?php else: ?>
    <h3 align="center"> Корзина пуста </h3>

<?php endif; ?>
