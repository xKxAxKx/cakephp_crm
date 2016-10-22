<div class="container">
  <?= $this->Form->create('User'); ?>
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
      <?= $this->Form->input('image_url', ['type'=>'text', 'label' => 'プロフィール画像', 'class' => 'form-control']); ?>
    </div>
    <?php if($currentUser) :?>
      <div class="form-group">
        <?= $this->Form->input('encrypted_password',
          [
            'value' => '',
            'label' => '新しいパスワード(入力しない限り変更しません)',
            'type' => 'password',
            'class' => 'form-control'
          ]
        ); ?>
      </div>
      <div class="form-group">
        <?= $this->Form->input('password_confirm',
          [
            'label' => '新しいパスワード再入力',
            'type' => 'password',
            'class' => 'form-control'
          ]);
        ?>
      </div>
      <div class="form-group">
        <?= $this->Form->input('password_current',
          [
            'label' => '現在のパスワード(設定を変更する場合、現在のパスワード入力が必要です)',
            'type' => 'password',
            'class' => 'form-control'
          ]);
        ?>
      </div>
    <?php else :?>
      <div class="form-group">
        <?= $this->Form->input('encrypted_password',
          [
            'label' => 'パスワード', 'type' => 'password', 'class' => 'form-control'
          ]);
        ?>
      </div>
      <div class="form-group">
        <?= $this->Form->input('password_confirm', ['label' => 'パスワード再入力', 'type' => 'password', 'class' => 'form-control']); ?>
      </div>
    <?php endif;?>
    <?php if($currentUser) :?>
      <?= $this->Form->hidden('id'); ?>
    <?php endif; ?>
    <?= $this->Form->submit($submitLabel, ['class' => 'btn btn-primary', 'style' => 'margin-bottom:10px;']); ?>
  </form>
  <?php if($currentUser) :?>
    <?= $this->Html->Link('戻る', ['controller'=> 'customers', 'action' => '/'], ['class' => 'btn btn-default', 'style' => 'float:left;']); ?>
  <?php else :?>
    <?= $this->Html->Link('Login', ['action' => 'login']); ?>
  <?php endif; ?>
</div>
