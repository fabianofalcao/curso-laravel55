<div class="form-group">
    <label for="name">Nome</label>
    {!! Form::text('name', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Nome']) !!}
</div>
<div class="form-group">
    <label for="email">E-mail</label>
    {!! Form::email('email', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'E-mail']) !!}
</div>
<div class="form-group">
    <label for="password">Senha</label>
    {!! Form::password('password', ['class' => 'form-control form-control-sm', 'placeholder' => 'Senha']) !!}
</div>
<div class="form-group">
    <label for="password_confirmation">Confrmar Senha</label>
    {!! Form::password('password_confirmation', ['class' => 'form-control form-control-sm', 'placeholder' => 'Confirmar Senha']) !!}
</div>
<div class="form-group">
    <label for="image">Foto</label>
    {!! Form::file('image', ['class' => 'form-control form-control-sm']) !!}
</div>
<div class="form-group">
    {!! Form::checkbox('is_admin', true, null, ['id' => 'is_admin']) !!}
    <label for="is_admin">É adminstrador?</label>
</div>

<div class="form-group">
    <button class="btn btn-search">Enviar</button>
</div>