<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- 模态框头部 -->
            <div class="modal-header">
                <h4 class="modal-title">新建话题</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="{{'topics.store'}}" method="POST">

                @method('POST')

                @csrf

                <!-- 模态框主体 -->
                <div class="modal-body">

                        <div class="input-group  ">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">标题</span>
                               </div>
                               <input type="text" class="form-control" name="title">
                             </div>
                        <br>
                        <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">类型</span>
                               </div>
                              <select class="form-control" id="sel1">
                                    <option value="2">分享</option>
                                    <option value="3">公告</option>
                               </select>
                             </div>

                        <br>
                             <div class="form-group">
                                    <label for="comment">内容:</label>
                                    <textarea class="form-control" rows="5" id="comment" name="content"></textarea>
                                  </div>

               </div>

                <!-- 模态框底部 -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">创建</button>
                </div>

            </form>

        </div>
    </div>
