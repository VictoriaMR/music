<div class="container bg-f" id="singer-info-page">
    <div class="left content-left">
        <div class="crumbs">
            <ul>
                <li>
                    <a class="mr6" href="<?php echo url();?>">
                        <span class="iconfont icon-shouye f16"></span>
                    </a>
                    <span class="icon icon-right"></span>
                </li>
                <?php if (!empty($info)){?>
                <li>
                    <a class="mr6" href="<?php echo url('singer-list');?>">歌手</a>
                    <span class="icon icon-right"></span>
                </li>
                <li>
                    <a class="active" href="<?php echo url('singer-info', $id.'-'.$info['name_en']);?>"><?php echo $info['name'];?></a>
                </li>
                <?php } else {?>
                <li>
                    <a class="active" href="<?php echo url('singer-list');?>">歌手</a>
                </li>
                <?php }?>
            </ul>
        </div>
        <div class="info-content">
            
        </div>
    </div>
    <div class="left content-right">
        
    </div>
    <div class="clear"></div>
</div>