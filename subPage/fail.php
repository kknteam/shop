                <?php  if (count($fail) > 0) : ?>
                  <div class="error">
                    <?php foreach ($fail as $error) : ?>
                      <p><?php echo $error ?></p>
                    <?php endforeach ?>
                  </div>
                <?php  endif ?>   