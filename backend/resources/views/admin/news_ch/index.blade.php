@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">後臺</a></li>
      <li class="breadcrumb-item active" aria-current="page">中文新聞報導管理</li>
    </ol>
  </nav>

  <a href="/admin/news_ch/create" class="btn btn-success mb-3">新增新聞</a>

  <table id="example" class="table table-striped table-bordered" style="width:100%">

    <thead>
        <tr>
            <th>排序</th>
            <th>標題</th>
            <th>日期</th>
            <th>圖片</th>
            <th>新聞內容</th>
            <th>最後修改時間</th>
            <th>功能</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($news_ch_list as $news_ch)
        <tr>
            <td>{{$news_ch->sort}}</td>
            <td>{{$news_ch->title}}</td>
            <td>{{$news_ch->date}}</td>
            <td><img width="200" src="{{$news_ch->image}}" alt=""></td>
            <td>{{$news_ch->info}}</td>
            <td>{{$news_ch->created_at}}</td>
        <td>
            <a href="news_ch/edit/{{$news_ch->id}}" class="btn btn-sm btn-primary">編輯</a>
            <button class="btn btn-danger btn-sm btn-delete" data-newschid="{{$news_ch->id}}">刪除</button>
            {{-- <a id="delete" href="news/destroy/{{$news->id}}" class="btn btn-sm btn-danger">刪除</a> --}}
        </td>
        </tr>
        @endforeach


    </tbody>
</table>
</div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#example').DataTable({"order": [[ 5, "desc" ]],
        language: {
            "processing":   "處理中...",
            "loadingRecords": "載入中...",
            "lengthMenu":   "顯示 _MENU_ 項結果",
            "zeroRecords":  "沒有符合的結果",
            "info":         "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
            "infoEmpty":    "顯示第 0 至 0 項結果，共 0 項",
            "infoFiltered": "(從 _MAX_ 項結果中過濾)",
            "infoPostFix":  "",
            "search":       "搜尋:",
            "paginate": {
                "first":    "第一頁",
                "previous": "上一頁",
                "next":     "下一頁",
                "last":     "最後一頁"
            },
            "aria": {
                "sortAscending":  ": 升冪排列",
                "sortDescending": ": 降冪排列"
            }
        }
    });

        $('#example').on("click", ".btn-delete", function(){
            var news_ch_id = this.dataset.newschid;
            var r = confirm("你確定要刪除此筆資料?");
            if (r == true) {
                window.location.href = `/admin/news_ch/destroy/${news_ch_id}`
            }
        });
            } );

    </script>

@endsection
