<h2>ユーザ設定変更</h2>

<?= $this->element('Users/form', ['submitLabel' => '更新する']); ?>

<br>

<h2>アカウント削除</h2>
<div class="container">
  <div style="margin-bottom: 30px;">
  <?= $this->Form->postLink(
    'ユーザを削除する',
    ['action' => 'delete', $currentUser['id']],
    ['class' => 'btn btn-danger', 'confirm' => '本当に削除してよろしいですか?']
  ); ?>
  </div>
</div>
