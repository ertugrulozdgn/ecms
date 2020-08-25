<div class="form-group">
    {{ Form::label($name, $label_name) }}
    {{ Form::file($name, array_merge(['class' => 'form-control'], $attributes)) }}
</div>
