<div class="form-group">
    {{ Form::label($name, $label_name) }}
    {{ Form::text($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
</div>
