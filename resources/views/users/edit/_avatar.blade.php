<div id="avatar" class="container tab-pane col-md-8" ><br>
    {{-- <div style="margin-top:15%"> --}}
        <form action="{{route('users.update',$user->id)}}" enctype="multipart/form-data" method="POST">

                @method('PUT')

                @csrf

                <div class="m-auto justify-content-center text-center"><img class="img-thumbnail center-block" src="{{asset(Storage::url($user->avatar))}}" alt="" width="200" height="200"></div>
                <hr>
                <input id="avatar" type="file" class="file" name="avatar"  >

              </form>
    {{-- </div> --}}
  </div>

  {{-- <script>
      $("#avatar").fileinput({
                     language: 'zh', //设置语言
                     uploadUrl:'{{route('users.update',$user->id)}}',
                    allowedFileExtensions: ['jpg', 'gif', 'png'],//接收的文件后缀
                   //uploadExtraData:{"id": 1, "fileName":'123.mp3'},
                    uploadAsync: true, //默认异步上传
                    showUpload:true, //是否显示上传按钮
                    showRemove :true, //显示移除按钮
                    showPreview :true, //是否显示预览
                    showCaption:false,//是否显示标题
                    browseClass:"btn btn-primary", //按钮样式
                   dropZoneEnabled: false,//是否显示拖拽区域
                   //minImageWidth: 50, //图片的最小宽度
                   //minImageHeight: 50,//图片的最小高度
                   //maxImageWidth: 1000,//图片的最大宽度
                   //maxImageHeight: 1000,//图片的最大高度
                    //maxFileSize:0,//单位为kb，如果为0表示不限制文件大小
                   //minFileCount: 0,
                    maxFileCount:10, //表示允许同时上传的最大文件个数
                    enctype:'multipart/form-data',
                   validateInitialCount:true,
                    previewFileIcon: "<iclass='glyphicon glyphicon-king'></i>",
                   msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！",
               }).on("fileuploaded", function (event, data, previewId, index){

    });


    $("#avatar").fileinput({
                         showUpload : true,
                         showRemove : false,
                         uploadUrl:"${ctx}/upload/one/8",
                         language : 'zh',
                         allowedPreviewTypes : [ 'pdf' ],
                         allowedFileTypes : ['pdf'],
                         autoReplace:true,
                        maxFileCount:1,
                        browseClass: "btn btn-primary", //按钮样式
                        dropZoneEnabled: true,//shidou显示拖拽
                        initialPreviewAsData: true,
                        initialPreviewFileType: 'pdf',
                        <c:if test="${periodicalResource.attachment!=null&&periodicalResource.attachment!=''}">initialPreview:["${periodicalResource.attachment}"]</c:if>
                    }).on("fileuploaded", function (event, data) {
                        $("#attachment").val(data.response.attachment);
                    });

  </script> --}}
