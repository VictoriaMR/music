<div class="container bg-f" id="singer-page">
    <div class="left content-left">
        <div class="crumbs">
            <ul>
                <li>
                    <a class="mr6" href="<?php echo url();?>">
                        <span class="iconfont icon-shouye f16"></span>
                    </a>
                    <span class="icon icon-right"></span>
                </li>
                <?php if ($id){?>
                <li>
                    <a class="mr6" href="<?php echo url('singer-list');?>">歌手</a>
                    <span class="icon icon-right"></span>
                </li>
                <li>
                    <a class="active special" href="<?php echo url('singer-list', $id);?>"><?php echo strtoupper($id);?></a>
                </li>
                <?php } else {?>
                <li>
                    <a class="active" href="<?php echo url('singer-list');?>">歌手</a>
                </li>
                <?php }?>
            </ul>
        </div>
        <?php if (!empty($list)){
            foreach ($list as $key=>$value){?>
        <div class="item">
            <div>
                <a class="c39f f22 f600 active" href="<?php echo url('singer-list', $key);?>"><?php echo $key;?></a>
            </div>
            <?php if (!empty($value)){?>
            <div class="singer-list">
                <?php foreach ($value as $cVal){?>
                <a href="<?php echo url('singer-info', $cVal['singer_id'].'-'.$cVal['name_en']);?>" title="<?php echo $cVal['name'];?>">
                    <div class="singer-avatar">
                        <img data-original="<?php echo $cVal['avatar']?siteUrl($cVal['avatar']):'';?>" src="<?php echo siteUrl('image/noimg.svg');?>" class="lazyload">
                    </div>
                    <p><?php echo $cVal['name'];?></p>
                </a>
                <?php }?>
                <div class="clear"></div>
            </div>
            <?php }?>
        </div>
        <?php }}?>
    </div>
    <div class="left content-right">
        
    </div>
    <div class="clear"></div>
</div>