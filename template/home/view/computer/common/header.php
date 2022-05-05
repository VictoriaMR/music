<!DOCTYPE html>
<html lang="zh">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta http-equiv="Cache-Control" content="no-cache"/>
	<meta content="telephone=no,email=no" name="format-detection"/>
	<title><?php echo $_title??'';?></title>
	<meta name="keywords" content="<?php echo $_keyword??'';?>">
	<meta name="description" content="<?php echo $_desc??'';?>">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo siteUrl('apple-touch-icon.png');?>">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo siteUrl('favicon-32x32.png');?>">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo siteUrl('favicon-16x16.png');?>">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="stylesheet" type="text/css" href="<?php echo siteUrl(html()->getCommonCss());?>"/>
	<?php if (!empty($file = html()->getCss())){?><link rel="stylesheet" charset="utf-8" type="text/css" href="<?php echo siteUrl($file);?>">
	<?php }?><script type="text/javascript" src="<?php echo siteUrl(html()->getCommonJs());?>"></script>
	<?php if (!empty($file = html()->getJs())){?><script type="text/javascript" charset="utf-8" src="<?php echo siteUrl($file);?>"></script>
<?php }?></head>
<body>
<script type="text/javascript">
const URI = '<?php echo APP_DOMAIN;?>';
</script>
<div class="top-nav">
	<div class="container">
		<div class="left f14">
			<strong>APE</strong>、<strong>FLAC</strong>、<strong>WAV</strong>、<strong>DSD</strong>、<strong>Hi-Res</strong>、<strong>DTS</strong>
			<span>高品质无损音乐下载</span>
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
					<a href="<?php echo url('category');?>" class="pl10" title="更多音乐分类">更多分类</a>
				</li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
</div>
<header class="container">
	<div id="top-header">
		<div class="logo">
			<img src="<?php echo siteUrl('image/computer/logo.png');?>">
		</div>
		<div class="right free-share">
			<span class="f38 fb cw">FREE</span>
		</div>
	</div>
</header>