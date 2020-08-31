<div class="form-group">
    {{ Form::label($name, $label_name) }}

    {{ Form::datetime($name, \Carbon\Carbon::now()->format('d-m-Y H:i'), array_merge(['class' => 'form-control'], $attributes)) }}
</div>
