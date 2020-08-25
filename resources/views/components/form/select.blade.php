<div class="form-group">
    {{ Form::label($name, $label_name) }}

    {!! Form::select($name,$lists,$value, array_merge(['class' => 'form-control'], $attributes)) !!}
</div>
