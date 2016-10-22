<div class="container">
  <h2>顧客詳細</h2>
  <dl>
    <dt>お名前</dt>
    <dd><?=$customer['Customer']['family_name'];?> <?=$customer['Customer']['given_name'];?></dd>
  </dl>
  <dl>
    <dt>電子メール</dt>
    <dd><?=$customer['Customer']['email'];?></dd>
  </dl>
  <dl>
    <dt>会社名</dt>
    <dd><?=$customer['Company']['name'];?></dd>
  </dl>
  <dl>
    <dt>役職名</dt>
    <dd><?=$customer['Post']['position_name'];?></dd>
  </dl>
  <?=$this->Html->link('編集', ['action' => 'edit', $customer['Customer']['id']], ['class' => 'btn btn-default btn-xs']);?>
  <?=$this->Html->link('戻る', ['action' => '/'],['class' => 'btn btn-default btn-xs']);?>
</div>

<hr>

<div class="container" style="margin-bottom:30px;">
  <h2>対応履歴</h2>
  <table>
  <?php foreach($comments as $comment) :?>
    <tbody>
      <tr>
        <td rowspan="6" style="width:7%;">
          <?= $this->Html->Image($comment['User']['image_url'], ['style' => 'width: 100%']); ?>
        </td>
      </tr>
      <tr>
        <td>
          <h5><?= $comment['User']['family_name'];?> <?= $comment['User']['given_name'];?></h5>
        </td>
      </tr>
      <tr>
        <td>
          <?= $comment['Comment']['body'];?>
        </td>
      </tr>
      <tr>
        <td>
          投稿日時:<?= $comment['Comment']['created'];?>
          <?=$this->Form->postLink('削除する',
            ['controller' => 'comments', 'action' => 'delete', $comment['Comment']['id']],
            ['confirm' => '本当に削除しますか？']
          );?>
        </td>
      </tr>
    </tbody>
  <?php endforeach; ?>
  </table>
  <br>
  <?= $this->Form->create(false, ['url' => ['controller' => 'comments', 'action' => 'add']]);?>
  <form class="form-horizontal">
    <div class="form-group">
      <?= $this->Form->input('body', ['label' => '対応内容', 'type'=>'textarea', 'class' => 'form-control']); ?>
    </div>
    <?= $this->Form->hidden('user_id', ['value' => $currentUser['id']]); ?>
    <?= $this->Form->hidden('customer_id', ['value' => $customer['Customer']['id']]); ?>
    <?= $this->Form->submit('登録する', ['class' => 'btn btn-primary']); ?>
  </form>
</div>
