<div class="container">
  <h2>検索結果</h2>
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
</div>
