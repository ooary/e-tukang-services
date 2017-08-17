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
<br>
<div class="ln_solid"></div>
<div class="form-group">
  <div class="col-md-6 col-md-offset-3">
  <a href="{{url('tukang')}}" class="btn btn-primary">Cancel</a>
  <button id="send" type="submit" class="btn btn-success">Simpan</button>
  </div>
</div>