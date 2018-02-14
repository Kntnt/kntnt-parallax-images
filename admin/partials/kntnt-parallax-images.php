<div class="wrap">
  <h2><?php echo $this->title; ?></h2>
  <form method="post">
    <?php echo wp_nonce_field($this->ns); ?>
    <table class="form-table">
      <tbody>
        <?php foreach ($fields as $id => $field): ?>
          <tr valign="top">
            <th scope="row"><?php echo $field['label'] ?></th>
            <td>
                <input id="<?php echo $id ?>" type="text" name="<?php echo "{$this->ns}[$id]" ?>" value="<?php echo $values[$id]; ?>">
                <br>
                <span class="description"><?php echo $field['description']; ?></span>
            </td>
          </tr>           
        <?php endforeach; ?>
      </tbody>
    </table>
    <p class="submit"><input id="submit" class="button button-primary" type="submit" name="submit" value="<?php _e('Save Changes', 'kntnt-parallax-images'); ?>"></p>
  </form>
</div>
