<div class="form-group">
    <label for="name">Nome</label>
    {!! Form::text('name', null, ['class' => "form-control form-control-sm", 'id' => "name", 'placeholder' => "Nome"]) !!}
</div>

<div class="form-group">
    <label for="qty_passengers">Núm. Passageiros</label>
    {!! Form::number('qty_passengers', null, ['class' => "form-control form-control-sm", 'id' => "qty_passengers", 'placeholder' => "Quantidade de passageiros"]) !!}
</div>

<div class="form-group">
    <label for="brands">Marca</label>
    {!! Form::select('brand_id', $brands, null, ['class' => "form-control form-control-sm", 'id' => "brand_id"]) !!}
</div>


<div class="form-group">
    <label for="class">Classe</label>
    {!! Form::select('class', $classes, null, ['class' => "form-control form-control-sm", 'id' => "class"]) !!}
</div>

<div class="form-group">
    <!-- <button type="submit" class="btn btn-sm btn-default">Cadastrar</button> -->
    {!! Form::submit('Cadastrar', ['class' => 'btn btn-sm btn-default']) !!}
</div>