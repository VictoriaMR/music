<div class="container bg-f" id="category-page">
    <div class="left content-left">
        <div class="crumbs">
            <ul>
                <li>
                    <a class="mr6" href="<?php echo url();?>">
                        <span class="iconfont icon-shouye f16"></span>
                    </a>
                    <span class="icon icon-right"></span>
                </li>
                <?php if (isset($id) && isset($list[$id])){?>
                <li>
                    <a class="mr6" href="<?php echo url('category-list');?>">更多分类</a>
                    <span class="icon icon-right"></span>
                </li>
                <li>
                    <a class="active" href="<?php echo url('category-list', $id.'-'.$list[$id]['name_en']);?>"><?php echo $list[$id]['name'];?></a>
                </li>
                <?php } else {?>
                <li>
                    <a class="active" href="<?php echo url('category-list');?>">更多分类</a>
                </li>
                <?php }?>
            </ul>
        </div>
        <?php if (!empty($list)){
            foreach ($list as $value){?>
        <div class="item">
            <a class="block c39f f22 f600 active" href="<?php echo url('category-list', $value['group_id'].'-'.$value['name_en']);?>"><?php echo $value['name'];?></a>
            <?php if (!empty($value['list'])){?>
            <div class="category-list">
                <?php foreach ($value['list'] as $cVal){?>
                <a href="<?php echo url('category-info', $cVal['cate_id'].'-'.$cVal['name_en']);?>"><?php echo $cVal['name'];?></a>
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