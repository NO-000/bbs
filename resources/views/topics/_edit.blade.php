<div class="modal fade" id="edit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- 模态框头部 -->
                <div class="modal-header">
                    <h4 class="modal-title">修改话题</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form action="{{route('topics.update',$topic->id)}}" method="POST">

                    @method('PUT')

                    @csrf

                    <!-- 模态框主体 -->
                    <div class="modal-body">

                        <div class="input-group  ">
                            <div class="input-group-prepend">
                                <span class="input-group-text">标题</span>
                            </div>
                            <input type="text" class="form-control" name="title" value="{{$topic->title}}">
                        </div>
                        <br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">类型</span>
                            </div>
                            <select class="form-control" id="sel1" name="category_id">
                                <option value="2" @if ($topic->category_id == 2) selected = "selected" @endif>分享</option>
                                <option value="3" @if ($topic->category_id == 3) selected = "selected" @endif>公告</option>
                            </select>
                        </div>

                        <br>
                        <div class="form-group">
                            <label for="comment">内容:</label>
                            <textarea class="form-control" rows="5" id="textareaedit" name="content"
                                autofocus>{{$topic->content}}</textarea>
                        </div>

                    </div>

                    <!-- 模态框底部 -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                        <input type="submit" value="修改" class="btn btn-primary">
                    </div>

                </form>

            </div>
        </div>


        <script>
                $(document).ready(function () {
                    var editor = new Simditor({
                        textarea: $('#textareaedit'),
                        upload: {
                        url: '{{ route('topics.upload_image') }}',
                        params: { _token: '{{ csrf_token() }}' },
                        fileKey: 'upload_file',
                        connectionCount: 10,
                        leaveConfirm: '文件上传中，关闭此页面将取消上传。'
                    },
                    pasteImage: true,
                })
            });
            </script>
