

<option value="" class="label"><?=$this->currency['code']?> :</option>
<?php foreach ($this->currencies as $k => $v): ?>
    <?php if($k != $this->currency['code']): ?>
        <option value="<?=$k;?>"><?=$k;?></option>
    <? endif; ?>
<?php endforeach; ?>
