<div class="container">
  <?= $this->Form->create('Customer'); ?>
  <form class="form-horizontal">
    <div class="form-group">
      <?= $this->Form->input('family_name', ['label' => '姓', 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">
      <?= $this->Form->input('given_name', ['label' => '名', 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">
      <?= $this->Form->input('email', ['label' => '電子メール', 'type' => 'email', 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">
      <?= $this->Form->input('company_id',
        [
          'label' => '会社名',
          'type'=>'select',
          'options' => $company,
          'empty' => '会社名を選択してください',
          'class' => 'form-control'
        ]
      ); ?>
    </div>
    <div class="form-group">
      <?= $this->Form->input('post_id',
        [
          'label' => '役職',
          'type' => 'select',
          'options' => $post,
          'empty' => '役職を選択してください',
          'class' => 'form-control'
        ]
      ); ?>
    </div>
    <?php if($submitLabel == '更新する') :?>
      <?= $this->Form->hidden('id'); ?>
    <?php endif; ?>
    <?= $this->Form->submit($submitLabel, ['class' => 'btn btn-primary']); ?>
  </form>
</div>
