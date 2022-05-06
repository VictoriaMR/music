<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	<meta http-equiv="Cache-Control" content="no-cache"/>
	<meta content="telephone=no,email=no" name="format-detection"/>
	<title><?php echo $_title??\App::get('base_info', 'name');?></title>
	<meta name="keywords" content="<?php echo $_keyword??'';?>">
	<meta name="description" content="<?php echo $_desc??'';?>">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo siteUrl('apple-touch-icon.png');?>">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo siteUrl('favicon-32x32.png');?>">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo siteUrl('favicon-16x16.png');?>">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="stylesheet" type="text/css" href="<?php echo siteUrl(html()->getCommonCss());?>"/>
	<?php if (!empty($file = html()->getCss())){?><link rel="stylesheet" type="text/css" href="<?php echo siteUrl($file);?>">
	<?php }?><script type="text/javascript" src="<?php echo siteUrl(html()->getCommonJs());?>"></script>
	<?php if (!empty($file = html()->getJs())){?><script type="text/javascript" src="<?php echo siteUrl($file);?>"></script>
<?php }?></head>
<body>
<script type="text/javascript">
const URI = '<?php echo APP_DOMAIN;?>';
</script>
<div class="top-nav">
	<div class="container bg-f">
		<div class="left f14">
			<strong>APE</strong>、<strong>FLAC</strong>、<strong>WAV</strong>、<strong>DSD</strong>、<strong>Hi-Res</strong>、<strong>DTS</strong><span>无损音乐下载</span>
		</div>
		<div class="right">
			<ul>
				<li>
					<a href="javascript:;" id="favorites-btn" class="plr10" title="收藏<?php echo \App::get('base_info', 'name');?>">Ctrl + D 收藏</a>
				</li>
				<li>
					<a href="<?php echo url();?>" class="plr10" title="<?php echo \App::get('base_info', 'domain');?>">首页</a>
				</li>
				<li>
					<a href="<?php echo url('category-list');?>" class="pl10" title="更多音乐分类">更多分类</a>
				</li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div class="container bg-f">
	<header id="top-header">
		<div class="logo">
			<img title="logo" src="<?php echo siteUrl('image/computer/logo.png');?>">
		</div>
		<div class="right free-share">
			<span class="f38 fb cw">FREE</span>
		</div>
	</header>
	<nav id="middle-nav">
		<div class="content-left category-item">
			<div class="left">
				<a href="<?php echo url();?>" title="首页"<?php echo isRouter('Index', 'index')?' class="active"':'';?>>
					<span class="iconfont icon-shouye f30"></span>
				</a>
			</div>
			<div class="left">
				<a class="world<?php echo isRouter('Singer', 'list')?' active':'';?>" href="<?php echo url('singer-list');?>" title="歌手">歌手</a>
			</div>
			<div class="left">
				<a class="world<?php echo isRouter('Album', 'list')?' active':'';?>" href="<?php echo url('album-list');?>" title="专辑下载">专辑下载</a>
			</div>
			<div class="left">
				<a class="world<?php echo isRouter('Song', 'list', ['ape'])?' active':'';?>" href="<?php echo url('song-list', 'ape-music');?>" title="APE音乐">APE音乐</a>
			</div>
			<div class="left">
				<a class="world<?php echo isRouter('Song', 'list', ['flac'])?' active':'';?>" href="<?php echo url('song-list', 'flac-music');?>" title="FLAC音乐">FLAC音乐</a>
			</div>
			<div class="left">
				<a class="world<?php echo isRouter('Song', 'list', ['wav'])?' active':'';?>" href="<?php echo url('song-list', 'wav-music');?>" title="WAV音乐">WAV音乐</a>
			</div>
			<div class="left">
				<a class="world<?php echo isRouter('Song', 'list', ['chinese'])?' active':'';?>" href="<?php echo url('song-list', 'chinese-music');?>" title="华语音乐">华语音乐</a>
			</div>
			<div class="left">
				<a class="world<?php echo isRouter('Song', 'list', ['western'])?' active':'';?>" href="<?php echo url('song-list', 'western-music');?>" title="欧美音乐">欧美音乐</a>
			</div>
			<div class="left">
				<a class="world<?php echo isRouter('Song', 'list', ['classic'])?' active':'';?>" href="<?php echo url('song-list', 'classic-music');?>" title="经典歌曲">经典歌曲</a>
			</div>
			<div class="clear"></div>
		</div>
		<div class="content-right search-item">
			<input type="text" name="search" class="input" placeholder="搜索歌手、歌曲名称" autocomplete="off">
			<span class="iconfont icon-sousuo"></span>
		</div>
		<div class="clear"></div>
	</nav>
</div>