<form method="POST" action="{{url('search')}}">
    {{ csrf_field() }}
    <div class="form-inline row space">
        <?php function getValue($var){
        if (isset($var)) {
        if (strlen($var) > 0) {
        echo str_replace("%", "", $var);
        }
        }
        }?>
        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
            <input type="text" class="sharp-box space-item height-big" id="key" name="key" value="<?php if (isset($target)): echo getValue($target); endif; ?>" placeholder="Cari">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
            <input data-minchars=0 class="awesomplete awesomplete-space-item sharp-box height-big" list="regionlist" type="text" name="location" id="location" value="<?php if (isset($location)): echo getValue($location); endif; ?>" placeholder="Daerah"/>
            <datalist id="regionlist">
                <option>Bekasi</option>
                <option>Bogor</option>
                <option>Depok</option>
                <option>Jakarta Selatan</option>
                <option>Jakarta Timur</option>
                <option>Jakarta Pusat</option>
                <option>Jakarta Barat</option>
                <option>Jakarta Utara</option>
                <option>Tangerang</option>
                <option>Tangerang Selatan</option>
            </datalist>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <button class="btn btn-danger sharp-box space-item height-big" type="submit">Cari</button>
        </div>
    </div>
    <div class="form-inline row space margin-up-big">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
            <input type="number" class="sharp-box space-item height-med" id="min" name="min" value="<?php if (isset($max)): echo $min; endif; ?>" placeholder="Harga Minimal">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
            <input type="number" class="sharp-box space-item height-med" id="max" name="max" value="<?php if (isset($max)): echo $max; endif; ?>" placeholder="Harga Maksimal">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
            <select data-minchars=0 class="awesomplete awesomplete-space-item sharp-box height-med" list="agelist" type="text" name="age" id="age" value="<?php if (isset($age)): echo getValue($age); endif; ?>" placeholder="Umur">
                <option>Anak-Anak</option>
                <option>Remaja</option>
                <option>Dewasa</option>
            </select>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
            <select data-minchars=0 class="awesomplete awesomplete-space-item sharp-box height-med" list="levellist" type="text" name="level" id="level" value="<?php if (isset($level)): echo getValue($level); endif; ?>">
                <option>Pemula</option>
                <option>Menengah</option>
                <option>Mahir</option>
            </select>
        </div>
    </div>
    </form>
