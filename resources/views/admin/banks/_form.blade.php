{{--@if($errors->any())--}}
    {{--<ul class="collection">--}}
        {{--@foreach($errors->all() as $error)--}}
            {{--<li class="collection-item">{{$error}}</li>--}}
        {{--@endforeach--}}
    {{--</ul>--}}
{{--@endif--}}
<?php $errorClass = $errors->first('name') ? ['class' => 'validate invalid'] : [] ?>
<div class="row">
    <div class="input-field col s6">
        {!! Form::text('name',null,$errorClass) !!}
        {!! Form::label('name','Nome',['data-error' => $errors->first('name')]) !!}
    </div>
</div>