<option value="<?= $key ?>"><?=$menu["menu"]?></option>


  <p>Pilih Minuman :</p>
            <select name="menu" style="width: 300px; height: 30px; margin-top: 10px;">
                <option hidden selected>--Pilih--</option>
              <?php  foreach ($listmenu as $menu) : ?>
                    <?php if($menu['tipe'] === 'minuman') : ?>
                    <option value="<?php echo $menu['menu'] ?>"><?php echo $menu['menu'] ?></option>
                     <?php endif;?>
                <?php endforeach;?>
            </select>