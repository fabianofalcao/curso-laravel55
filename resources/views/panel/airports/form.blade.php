<div class="form-group">
    <label for="name">Nome</label>
    {!! Form::text('name', null, ['class' => 'form-control form-control-sm']) !!}
</div>

<div class="form-group">
    <label for="latitude">Latitude</label>
    {!! Form::text('latitude', null, ['class' => 'form-control form-control-sm']) !!}
</div>

<div class="form-group">
    <label for="longitude">Longitude</label>
    {!! Form::text('longitude', null, ['class' => 'form-control form-control-sm']) !!}
</div>

<div class="form-group">
    <label for="address">Endereço</label>
    {!! Form::text('address', null, ['class' => 'form-control form-control-sm']) !!}
</div>

<div class="form-group">
    <label for="number">Número</label>
    {!! Form::number('number', null, ['class' => 'form-control form-control-sm']) !!}
</div>

<div class="form-group">
    <label for="district">Bairro</label>
    {!! Form::text('district', null, ['class' => 'form-control form-control-sm']) !!}
</div>

<div class="form-group">
    <label for="zip_code">Código Postal</label>
    {!! Form::text('zip_code', null, ['class' => 'form-control form-control-sm']) !!}
</div>

<div class="form-group">
    <label for="complement">Complemento</label>
    {!! Form::text('complement', null, ['class' => 'form-control form-control-sm']) !!}
</div>

<div class="form-group">
    <button class="btn btn-search">Enviar</button>
</div>