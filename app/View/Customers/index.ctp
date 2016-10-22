<div class="container">
  <h2>顧客情報一覧</h2>
  <p>お客様情報が表示されます。</p>
  <?= $this->Html->link('顧客登録', ['action' => 'add'], ['class' => 'btn btn-info pull-right']) ;?>
  <div class='form-inline' style="margin-top:50px;">
    <?= $this->Form->create('Customer', ['novalidate' => true, 'type' => 'data', 'controller' => 'customers', 'url' => 'search']); ?>
    <div class="form-group">
      <?= $this->Form->input('family_name', ['label' => '姓','class' => 'form-control']); ?>
    </div>

    <div class="form-group">
      <?= $this->Form->input('given_name', ['label' => '名','class' => 'form-control']); ?>
    </div>

    <div class="form-group">
      <?= $this->Form->input('email', ['label' => '電子メール','class' => 'form-control',  'style' => 'width:280px;']); ?>
    </div>
    <div class="form-group">
      <?= $this->Form->input('name', ['label' => '会社名','class' => 'form-control', 'style' => 'width:250px;']); ?>
    </div>
    <div class="form-group">
      <?= $this->Form->input('body', ['label' => 'コメント','class' => 'form-control', 'style' => 'width:250px;']); ?>
    </div>
  </div>
  <div class="text-center" style="margin-top:15px;">
    <div class="btn-group">
      <?= $this->Form->end(['label' => '検索','class' => 'btn btn-info']); ?>
    </div>
    <div class="btn-group">
      <?= $this->Html->link('リセット',['action' => 'index'], ['class' => 'btn btn-info']); ?>
    </div>
  </div>

  <hr>

  <table class="table table-striped">
    <thead class="text-info">
      <th>姓</th>
      <th>名</th>
      <th>メールアドレス</th>
      <th>会社名</th>
      <th>役職名</th>
      <th>コメント数</th>
      <th>リンク</th>
    </thead>
    <tbody>
      <?php foreach($customers as $customer) : ?>
        <tr>
          <td>
            <?= $customer['Customer']['family_name'];?>
          </td>
          <td>
            <?= $customer['Customer']['given_name'];?>
          </td>
          <td>
            <?= $customer['Customer']['email'];?>
          </td>
          <td>
            <?= $customer['Company']['name'];?>
          </td>
          <td>
            <?= $customer['Post']['position_name'];?>
          </td>
          <td>
            <?= count($customer['Comment']);?>
          </td>
          <td>
            <?=$this->Html->link('詳細', ['action' => 'view', $customer['Customer']['id']], ['class' => 'btn btn-default btn-xs']);?>
          </td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>

  <ul class="pagination">
    <li><?= $this->Paginator->prev('<< 前へ'); ?></li>
    <li><?= $this->Paginator->numbers(); ?></li>
    <li><?= $this->Paginator->next('次へ >>'); ?></li>
  </ul>
</div>
