<div class="card__group">
    <?php for ($i = 0; $i  < count($files); $i++) : ?>
        <?php
        $src = $files[$i]["src"];
        $file_name = $files[$i]["file_name"];
        $ext_name =  $files[$i]["ext"];
        $rendered = false;
        $path = $files[$i]["path"];
        $is_dir = $files[$i]["is_dir"];
        $is_file = $files[$i]["is_file"];
        $filesize = 0;
        $date = date("d-m-Y", $files[$i]["created_at"]);
        $time = date("h:i:s a", $files[$i]["created_at"]);
        $size_in_mb = $files[$i]["size"] / 1024 / 1024;
        $filesize =  number_format((float) ($size_in_mb >= 1024 ? $size_in_mb / 1024 : $size_in_mb), 2, '.', '');

        $label_id = random_int(0, 100000) . $src;
        ?>

        <div class="card">
            <input type="checkbox" id="<?php echo $label_id ?>" name="select[]" class="select" value="<?php echo $path ?>" data-name="<?php echo $src ?>" data-is-dir="<?php echo $is_dir ? "true" : "false"; ?>">
            <!-- Rendered if item is directory/folder. -->
            <label for="<?php echo $label_id ?>">
                <?php if ($is_dir) : ?>
                    <img src="<?php echo "/app/assets/icons/folder.png" ?>" class="card-img-top" alt="<?php echo $src  ?>">
                    <?php $rendered = true ?>
                <?php endif; ?>

                <!-- Rendered if supported image extension found. -->
                <?php if (in_array($ext_name, IMG_EXTS)) : ?>
                    <img src="<?php echo $path
                                ?>" class="card-img-top" alt="<?php echo $src  ?>">
                    <?php $rendered = true ?>
                <?php endif; ?>

                <!-- Rendered if supported video extension found. -->
                <?php if (in_array($ext_name, VIDEOS_EXTS)) : ?>
                    <video style="width: 100%;" controls src="<?php echo $path ?>"></video>
                    <?php $rendered = true ?>
                <?php endif; ?>
                <?php if (in_array($ext_name, AUDIO_EXTS)) : ?>
                    <img src="<?php echo "/app/assets/icons/audio.svg"
                                ?>" style="width: 70%;" class="card-img-top" alt="<?php echo $src  ?>">
                    <audio style="width: 95%;" controls src="<?php echo $path ?>"></audio>
                    <?php $rendered = true ?>
                <?php endif; ?>

                <!--  -->
                <?php for ($j = 0; $j < count($json); $j++) : ?>
                    <?php if (in_array($ext_name, $json[$j]["exts"]) && !$rendered) : ?>
                        <img style="height: 200px;" src="<?php echo "/app/assets/icons/" . $json[$j]["name"] . '.' . $json[$j]["iconExt"]
                                                            ?>" class="card-img-top" alt="<?php echo $src  ?>">
                        <?php $rendered = true ?>
                    <?php endif ?>
                <?php endfor; ?>

                <!-- Special type of file match. eg: config files, etc -->
                <?php if ($ext_name == strtolower($src) && !in_array($ext_name, EXCL_EXTS) &&  !$rendered) : ?>
                    <img src="<?php echo "/app/assets/icons/document.svg" ?>" class="card-img-top" alt="<?php echo $src  ?>">
                    <?php $rendered = true ?>
                <?php endif; ?>

                <!-- Wilde card match: Means, Any above rules didn't matched -->
                <?php if (!$rendered) : ?>
                    <div style="padding: 2rem;">
                        <svg class="unknown" xmlns="http://www.w3.org/2000/svg" style="height: 200px;" viewBox="0 0 233 278">
                            <g id="Group_1" data-name="Group 1" transform="translate(-155 -599)">
                                <g id="Path_3" data-name="Path 3" transform="translate(155 599)" fill="#fff" stroke-linecap="round">
                                    <path d="M 207 272 L 26 272 C 14.97195816040039 272 6 263.0280456542969 6 252 L 6 26 C 6 14.97195816040039 14.97195816040039 6 26 6 L 150.9785308837891 6 L 227 96.18296051025391 L 227 252 C 227 263.0280456542969 218.0280456542969 272 207 272 Z" stroke="none" />
                                    <path d="M 26 12 C 18.28034973144531 12 12 18.28036499023438 12 26 L 12 252 C 12 259.7196655273438 18.28034973144531 266 26 266 L 207 266 C 214.7196502685547 266 221 259.7196655273438 221 252 L 221 98.37451171875 L 148.1889038085938 12 L 26 12 M 26 0 L 153.7680511474609 0 L 233 93.991455078125 L 233 252 C 233 266.3594055175781 221.3594055175781 278 207 278 L 26 278 C 11.64059448242188 278 0 266.3594055175781 0 252 L 0 26 C 0 11.64059448242188 11.64059448242188 0 26 0 Z" stroke="none" fill="<?php echo randomColor() ?>" />
                                </g>
                                <text id="_.<?php echo $ext_name ?>" data-name=".<?php echo $ext_name ?>" transform="translate(180 850)" font-size="50" font-family="Arial-BoldMT, Arial" font-weight="700">
                                    <tspan fill="<?php echo randomColor(50, 150) ?>" x="0" y="0">.
                                        <?php echo $ext_name  ?>
                                    </tspan>
                                </text>
                            </g>
                        </svg>
                    </div>
                <?php endif; ?>
            </label>

            <!-- Buttons -->
            <div style="width: 100%;">
                <p class="filename"><?php echo $file_name ?></p>
                <div class="collapse stats" id="collapseExample">
                    <p><b>Date:</b> <?php echo $date ?></p>
                    <p><b>Time:</b> <?php echo $time ?></p>
                    <?php if (!$is_dir) : ?>
                        <p><b>Size:</b> <?php echo ($filesize); ?> MB</p>
                        <p><b>Extension:</b> .<?php echo ($ext_name); ?></p>
                    <?php endif ?>
                </div>
                <?php if ($is_dir) : ?>
                    <a href="?dir=<?php echo $path ?>" class="btn btn-primary open" style="width: 100%;border-radius: 0;">Open</a>
                <?php else : ?>
                    <div class="btn__container">
                        <a href='<?php echo $path ?>' download class="btn btn-success download"><?php require "/app/assets/php/download.php" ?> &nbsp; <span>download</span> </a>
                        <a href="<?php echo $path ?>" target="_blank" class="btn btn-primary open">Open</a>
                    </div>
                <?php endif ?>
            </div>

        </div>
    <?php endfor; ?>
</div>