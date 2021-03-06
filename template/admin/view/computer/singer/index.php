<div class="container-fluid">
    <form action="<?php echo url('singer');?>" class="form-inline">
        <div class="row-item">
            <input type="hidden" name="status" value="<?php echo $status;?>">
            <div class="btn-group" role="group">
                <button type="button" data-id="-1" class="btn <?php echo ($status == 1 || $status == 0) ? 'btn-default' : 'btn-primary';?>">全部</button>
                <button type="button" data-id="0" class="btn <?php echo $status == 0 ? 'btn-primary' : 'btn-default';?>">未启用</button>
                <button type="button" data-id="1" class="btn <?php echo $status == 1 ? 'btn-primary' : 'btn-default';?>">已启用</button>
            </div>
        </div>
        <div class="col-md-12 pt10">
            <div class="form-group mt10 mr20">
                <label for="name">ID:</label>
                <input type="text" class="form-control" name="id" value="<?php echo $id;?>" placeholder="ID" autocomplete="off">
            </div>
            <div class="mr20 form-group mt10">
                <label for="name">名称:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name;?>" placeholder="名称关键字" autocomplete="off">
            </div>
            <div class="mr20 form-group mt10">
                <button class="btn btn-info" type="submit"><i class="glyphicon glyphicon-search"></i> 查询</button>
            </div>
        </div>
        <div class="clear"></div>
    </form>
    <table class="table table-hover mt20" id="data-list">
        <tbody>
            <tr>
                <th width="120">ID</th>
                <th width="120">分组</th>
                <th width="150">头像</th>
                <th width="250">名称(ZH)</th>
                <th width="250">名称(EN)</th>
                <th width="150">状态</th>
                <th width="200">添加时间</th>
                <th>操作</th>
            </tr>
            <?php if (empty($list)){ ?>
            <tr>
                <td colspan="10">
                    <div class="tc orange">暂无数据</div>
                </td>
            </tr>
            <?php } else {?>
            <?php foreach ($list as $key => $value) { ?>
            <tr data-id="<?php echo $value['singer_id'];?>">
                <td><?php echo $value['singer_id'];?></td>
                <td><?php echo $value['group'];?></td>
                <td>
                    <div class="avatar-hover">
                        <img data-original="<?php echo $value['avatar']?mediaUrl($value['avatar'], 400):'';?>" src="<?php echo siteUrl('image/common/noimg.svg');?>" class="lazyload upload" data-cate="singer">
                    </div>
                </td>
                <td><?php echo $value['name'];?></td>
                <td><?php echo $value['name_en'];?></td>
                <td>
                    <div class="switch_botton" data-status="<?php echo $value['status'];?>">
                        <div class="switch_status <?php echo $value['status'] == 1 ? 'on' : 'off';?>"></div>
                    </div>
                </td>
                <td><?php echo $value['add_time'];?></td>
                <td>
                    <button class="btn btn-primary btn-xs modify mt2" type="button"><i class="glyphicon glyphicon-edit"></i> 修改</button>
                    <button class="btn btn-info btn-xs info mt2" type="button"><i class="glyphicon glyphicon-bookmark"></i> 详情</button>
                </td>
            </tr>
            <?php } ?>
            <?php }?>
        </tbody>
    </table>
    <?php echo adminPage($size, $total);?>
</div>
<div id="dealbox" class="hidden">
    <div class="mask"></div>
    <div class="centerShow">
        <form class="form-horizontal">
            <input type="hidden" name="singer_id" class="no_show" value="0">
            <input type="hidden" name="opn" value="editInfo">
            <button type="button" class="close" aria-hidden="true">&times;</button>
            <div class="f24 dealbox-title">歌手管理</div>
            <div class="input-group">
                <div class="input-group-addon"><span>名称(ZH)</span></div>
                <input type="text" class="form-control" name="name" required="required" maxlength="30" autocomplete="off" placeholder="歌手中文名称">
            </div>
            <div class="input-group">
                <div class="input-group-addon"><span>名称(EN)</span></div>
                <input type="text" class="form-control" name="name_en" required="required" maxlength="30" autocomplete="off" placeholder="歌手英文名称">
            </div>
            <div class="input-group">
                <div class="input-group-addon"><span>分组</span></div>
                <input type="text" class="form-control" name="group" required="required" maxlength="30" autocomplete="off">
            </div>
            <div class="input-group">
                <div class="input-group-addon"><span>状态</span></div>
                <div class="switch_botton ml20" data-status="0">
                    <div class="switch_status off"></div>
                </div>
                <input type="hidden" name="status" value="0">
            </div>
            <button type="button" class="btn btn-primary btn-lg btn-block save">确认</button>
        </form>
    </div>
</div>