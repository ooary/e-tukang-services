<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Tukang <span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
  {{Form::text('nama_tukang',null, ['class' => 'form-control col-md-7 col-xs-12',
  'data-parsley-required' => 'true',
  'data-parsley-required-message' => 'Nama Tukang  Harus di isi',
  'data-parsley-trigger'          => 'change focusout',
  'placeholder'=>'Nama Tukang'
  ])}}
</div>
</div>
<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Keahlian <span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
  {{Form::text('keahlian',null, ['class' => 'form-control col-md-7 col-xs-12',
  'data-parsley-required' => 'true',
  'data-parsley-required-message' => 'Keahlian  Harus di isi',
  'data-parsley-trigger'          => 'change focusout',
  'placeholder'=>'Keahlian'
  ])}}
</div>
</div>
<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
   {{Form::email('email',null,
            ['class' => 'form-control col-md-7 col-xs-12',
             'data-parsley-required' => 'true',
             'data-parsley-required-message' => 'Email Harus di Isi',
             'data-parsley-trigger'          => 'change focusout',
             'data-parsley-type'             => 'email',
             'placeholder'=>'Email'
            ])}}
</div>
</div>
<div class="item form-group">
<label for="password" class="control-label col-md-3">Password</label>
<div class="col-md-6 col-sm-6 col-xs-12">
  <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required" placeholder="password">
</div>
</div>
<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">No Handphone <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      {{Form::number('no_hp',null, ['class' => 'form-control col-md-7 col-xs-12',
      'data-parsley-required' => 'true',
      'data-parsley-required-message' => 'No Handphone Harus di isi',
      'data-parsley-trigger'          => 'change focusout'
      ])}}
    </div>
</div>
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Alamat <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    {{Form::textarea('alamat',null,['class' => 'form-control col-md-7 col-xs-12','rows'=>'2','cols'=>'10','data-parsley-required' => 'true','data-parsley-required-message' => 'Alamat Harus di Isi'])}}
  </div>
</div>
<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Upah Jasa <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      {{Form::number('upah_jasa',null, ['class' => 'form-control col-md-7 col-xs-12',
      'data-parsley-required' => 'true',
      'data-parsley-required-message' => 'Upah Jasa Harus di isi',
      'data-parsley-trigger'          => 'change focusout'
      ])}}
    </div>
</div>
<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Topup <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      {{Form::number('topup',null, ['class' => 'form-control col-md-7 col-xs-12',
      'data-parsley-required' => 'true',
      'data-parsley-required-message' => 'Topup Harus di isi',
      'data-parsley-trigger'          => 'change focusout'
      ])}}
    </div>
</div>

<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Foto <span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input type="file" name="foto">
</div>
</div>
<div class="ln_solid"></div>
<div class="form-group">
  <div class="col-md-6 col-md-offset-3">
  <a href="{{url('tukang')}}" class="btn btn-primary">Cancel</a>
  <button id="send" type="submit" class="btn btn-success">Simpan</button>
  </div>
</div>