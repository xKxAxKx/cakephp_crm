<h2>Forgot your password?</h2>
<div class="container">
  <?= $this->Form->create('User');?>
  <form class="form-horizontal">
    <div class="form-group">
      <?= $this->Form->input('email', ['label' => 'Email', 'class' => 'form-control']); ?>
    </div>
      <?= $this->Form->submit('Send me reset password instructions', ['class' => 'btn btn-default']); ?>
  </form>
  <?= $this->Html->Link('Login', ['action' => 'login']); ?><br>
  <?= $this->Html->Link('Sign Up', ['action' => 'signup']); ?>
</div>
