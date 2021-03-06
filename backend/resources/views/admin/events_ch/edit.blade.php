@extends('layouts/app')

@section('css')
{{-- summerNote --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">後臺</a></li>
      <li class="breadcrumb-item active" aria-current="page">中文最新活動管理</li>
      <li class="breadcrumb-item active" aria-current="page">編輯</li>
    </ol>
  </nav>

<form method="POST" action="/admin/events_ch/update/{{$events_ch->id}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="sort">排序</label>
        <input name="sort" type="text" class="form-control" id="sort" value="{{$events_ch->sort}}"required>
    </div>
    <div class="form-group">
        <label for="title">標題<small class="text-danger">(限制至多15字)</small></label>
        <input name="title" type="text" class="form-control" id="title" value="{{$events_ch->title}}" required>
    </div>
    <div class="form-group">
        <label for="sub_title">副標題<small class="text-danger">(限制至多15字)</small></label>
        <input name="sub_title" type="text" class="form-control" id="sub_title" value="{{$events_ch->sub_title}}" required>
    </div>
    <div class="form-group">
        <label for="date">日期</label>
        <input name="date" type="date" class="form-control" id="date" value="{{$events_ch->date}}"required>
    </div>
    <div class="form-group">
        <label for="image">原始主要圖片</label>
        <div><img src="{{$events_ch->image}}" alt="" style="width:200px"></div>
      </div>
      <div class="form-group">
        <label for="image">更新主要圖片<small class="text-danger">(建議圖片寬高比例為4比3)</small></label>
        <input name="image" type="file" class="form-control-file" id="image">
      </div>
      <div class="form-group">
        <label for="info">內容</label>
        <textarea name="info" class="form-control" id="info" rows="3" required>{{$events_ch->info}}</textarea>
      </div>
    <button type="submit" class="btn btn-primary">送出新增</button>
</form>
</div>

@endsection

@section('js')
{{-- summerNote --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
    $('#info').summernote();
  });
</script>
@endsection
