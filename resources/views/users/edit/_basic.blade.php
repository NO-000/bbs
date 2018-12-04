<div id="basic" class="container tab-pane active"><br>
    <div style="margin-top:20%">
    <form action="{{route('users.show',$user->id)}}" method="POST">

        @method('PUT')

        @csrf

        <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">用户名</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" required>
                </div>
        </div>

        <div class="form-group row">
                <label for="introduction" class="col-md-4 col-form-label text-md-right">个人简介</label>

                <div class="col-md-6">
                    <input id="introduction" type="text" class="form-control" name="introduction" value="{{$user->introduction}}">
                </div>
        </div>

        <button type="submit" class="btn btn-primary offset-md-8">保存修改</button>

    </form>
</div>
</div>
