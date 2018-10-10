@extends('layouts.app')

@section('content')

  <div class="container no-px">
    <form action="{{ route('item.store') }}" method="POST" class="col-sm-6 offset-sm-3 no-px" enctype="multipart/form-data">
      <div class="card">
        <div class="card-body">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="name">姓名</label>
            <input
                type="text"
                class="form-control"
                name="name"
                placeholder="韩梅梅"
                required
            >
          </div>

          <div class="form-group" id="photo">
            <label for="photo">个人照片</label>
            <picture-input
                width="150"
                height="200"
                margin="0"
                name="photo"
                :z-index="10"
                :crop="false"
                accept="image/jpeg,image/png"
                size="10"
                button-class="btn btn-primary"
                :custom-strings="{
                drag: '<span class=\'text-primary\'>选择</span>或<span class=\'text-primary\'>拖拽</span>照片到这里',
                tap: '<span class=\'text-primary\'>选择照片</span>',
                change: '更换照片',
            }"
            >
            </picture-input>
          </div>


          <div class="form-group">
            <label for="title">作品名称</label>
            <input
                type="text"
                class="form-control"
                name="title"
                placeholder="和平的力量"
                required
            >
          </div>

          <div class="form-group" id="image">
            <label for="photo">作品照片</label>
            <picture-input
                width="150"
                height="200"
                margin="0"
                name="image"
                :z-index="10"
                :crop="false"
                accept="image/jpeg,image/png"
                size="10"
                button-class="btn btn-primary"
                :custom-strings="{
                drag: '<span class=\'text-primary\'>选择</span>或<span class=\'text-primary\'>拖拽</span>照片到这里',
                tap: '<span class=\'text-primary\'>选择照片</span>',
                change: '更换照片',
            }"
            >
            </picture-input>
          </div>
          <div class="form-group">
            <label for="age">年龄</label>
            <div>
              <input-number :min="5" :max="18" label="年龄" name="age" v-model="age"></input-number>
            </div>
          </div>

          <div class="form-group">
            <label for="school">学校</label>
            <input
                type="text"
                class="form-control" name="school" required placeholder="广州市越秀区东川路小学">
          </div>

          <div class="form-group">
            <label for="birthday">出生年月日</label>
            <input type="date" class="form-control" name="birthday" required>
          </div>


          <div class="form-group">
            <label for="class">年级</label>
            <select class="form-control" required name="class">
              <option value="" disabled selected>请选择年级</option>
              <option value="一年级">一年级</option>
              <option value="二年级">二年级</option>
              <option value="三年级">三年级</option>
              <option value="四年级">四年级</option>
              <option value="五年级">五年级</option>
              <option value="六年级">六年级</option>
            </select>
          </div>

          <div class="form-group">
            <label for="teacher">指导老师姓名</label>
            <input
                type="text" required placeholder="李雷"
                class="form-control" name="teacher">
          </div>

          <div class="form-group">
            <label for="teacher_phone">老师电话(可不填)</label>
            <input
                type="number" placeholder="13812345678"
                class="form-control" name="teacher_phone">
          </div>

          <div class="form-group">
            <label for="teacher_email">老师邮箱(可不填)</label>
            <input
                type="email"
                class="form-control" name="teacher_email" placeholder="email@qq.com">
          </div>

          <div class="form-group">
            <label for="parents">家长姓名</label>
            <input
                type="text"
                class="form-control" name="parents" placeholder="韩梅梅">
          </div>

          <div class="form-group">
            <label for="parents_phone">家长电话</label>
            <input
                type="number" required
                class="form-control" name="parents_phone" placeholder="13812345678">
          </div>

          <div class="form-group">
            <label for="group">推荐服务队</label>
            <input
                type="text" placeholder="华森服务队"
                class="form-control" name="group" required>
          </div>

          <div class="form-group">
            <label for="">创作说明</label>
            <el-input
                type="textarea"
                :autosize="{ minRows: 3}"
                placeholder="请描述作品的寓意"
                required
                name="thought"
                >
            </el-input>
          </div>

          <div class="form-group">
            <label for="">备注(可不填)</label>
            <el-input
                type="textarea"
                :autosize="{ minRows: 2}"
                placeholder="备注"
                name="note"
                >
            </el-input>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary">提交</button>
          </div>
        </div>

      </div>
    </form>

  </div>

@stop