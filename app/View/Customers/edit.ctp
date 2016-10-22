<h2>顧客情報編集</h2>
<?= $this->element('Customers/form', ['submitLabel' => '更新する']); ?>
<div class="container" style="margin-top:15px;">
  <?= $this->Form->postLink(
    '顧客を削除する',
    ['action' => 'delete', $customer['Customer']['id']],
    ['class' => 'btn btn-danger', 'confirm' => '本当に削除してよろしいですか?']
  ); ?>
</div>
