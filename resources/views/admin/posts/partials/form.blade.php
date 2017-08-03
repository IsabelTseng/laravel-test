<div class="form-group">
    <label>標題：</label>
    {{ Form::text('title',null,['class' => 'form-control','placeholder' => '請輸入文章標題']) }}
</div>

<div class="form-group">
    <label>副標題：</label>
    {{ Form::text('sub_title',null,['class' => 'form-control','placeholder' => '請輸入文章副標題']) }}
</div>

<div class="form-group">
    <label>內容：</label>
    {{ Form::textarea('content', null, ['class' => 'form-control', 'rows' => '10'])}}
</div>

<div class="form-group">
    <label>精選？</label>
    {{Form::select('is_feature',['0' => '否','1' => '是'],null,['class' => 'form-control'])}}
</div>