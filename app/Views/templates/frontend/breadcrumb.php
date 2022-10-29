<?php $request = service('request'); ?>
<section>
    <div class="sptb-2 bannerimg">
        <div class="header-text mb-0">
            <div class="container">
                <div class="text-center text-white py-7">
                    <h1 class="">
                        <?php 
                            if(!empty($title[3])) :
                                echo $title[3];
                            elseif(!empty($title[2])) :
                                echo $title[2];
                            else :
                                echo $title[1];
                            endif;
                        ?>
                    </h1>
                    <ol class="breadcrumb text-center">

                        <li class="breadcrumb-item"><a href="<?=base_url()?>">หน้าหลัก</a></li>

                        <?php if(!empty($title[3])) : ?>
                            <li class="breadcrumb-item" aria-current="page"><a href="<?=$url[1]?>"><?=$title[1]?></a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="<?=$url[2]?>"><?=$title[2]?></a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page"><?=$title[3]?></li>
                        <?php elseif(!empty($title[2])) : ?>
                            <li class="breadcrumb-item" aria-current="page"><a href="<?=$url[1]?>"><?=$title[1]?></a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page"><?=$title[2]?></li>
                        <?php elseif(!empty($title[1])) : ?>
                            <li class="breadcrumb-item active text-white" aria-current="page"><?=$title[1]?></li>
                        <?php endif ?>
                        
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>


</div>
</div>
